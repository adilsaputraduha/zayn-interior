<?php

namespace App\Controllers;

use App\Models\FrontHomeModel;
use App\Models\InteriorModel;
use App\Models\KeranjangModel;
use App\Models\PembayaranModel;
use App\Models\PemesananModel;

class FrontHomeController extends BaseController
{
    public function index()
    {
        $generateRandom = rand(100, 999);
        $generateDate = date('Ymd');
        $generateInvoice = 'FP-' . $generateDate . "-" . $generateRandom;

        $model = new InteriorModel();
        $data = [
            'interior' => $model->getInterior()->getResultArray(),
            'validation' => \Config\Services::validation(),
            'nomor' => $generateInvoice
        ];
        echo view('view_front_home', $data);
    }

    public function keranjang()
    {
        $generateRandom = rand(100, 999);
        $generateDate = date('Ymd');
        $generateInvoice = 'FP-' . $generateDate . "-" . $generateRandom;
        $userlogin = session()->get('pelangganId');

        $model = new KeranjangModel();
        $data = [
            'keranjang' => $model->getKeranjang($userlogin)->getResultArray(),
            'validation' => \Config\Services::validation(),
            'nomor' => $generateInvoice,
        ];
        echo view('view_front_keranjang', $data);
    }

    public function keranjangsave()
    {
        $model = new KeranjangModel();
        $data = array(
            'keranjang_pelanggan' => $this->request->getPost('idpelanggan'),
            'keranjang_interior' => $this->request->getPost('kode'),
            'keranjang_qty' => 1,
            'keranjang_jumlah' => $this->request->getPost('hargainterior'),
        );
        $model->saveKeranjang($data);
        session()->setFlashdata('success', 'Berhasil masuk keranjang');
        return redirect()->to('/');
    }

    public function ceklogin()
    {
        $model = new FrontHomeModel();
        $email = $this->request->getPost('emaillogin');
        $password = $this->request->getPost('passwordlogin');

        $user = $model->cekLogin($email);

        if ($user) {
            if (password_verify($password, $user['pelanggan_password'])) {
                session()->set('pelangganId', $user['pelanggan_id']);
                session()->set('pelangganNama', $user['pelanggan_nama']);
                session()->set('pelangganEmail', $user['pelanggan_email']);
                session()->set('pelangganJenkel', $user['pelanggan_jenkel']);
                session()->set('pelangganAlamat', $user['pelanggan_alamat']);
                session()->set('pelangganNoHp', $user['pelanggan_nohp']);
                session()->setFlashdata('success', 'Berhasil login');
                return redirect()->to('/');
            } else {
                session()->setFlashdata('message', 'Password salah');
                return redirect()->to('/');
            }
        } else {
            session()->setFlashdata('message', 'Email belum terdaftar');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        session()->remove('pelangganId');
        session()->remove('pelangganNama');
        session()->remove('pelangganEmail');
        session()->remove('pelangganJenkel');
        session()->remove('pelangganAlamat');
        session()->remove('pelangganNoHp');
        session()->setFlashdata('success', 'Berhasil keluar');
        return redirect()->to('/');
    }

    public function detailindex()
    {
        $id = session()->get('pelangganId');

        $model = new KeranjangModel();
        $data = [
            'keranjang' => $model->getKeranjang($id)->getResultArray(),
        ];
        echo view('table_keranjang', $data);
    }

    public function detailupdate()
    {
        $id = $this->request->getPost('kodekeranjang');

        $model = new KeranjangModel();
        $data = array(
            'keranjang_qty' => $this->request->getPost('qtyinterior'),
            'keranjang_jumlah' => $this->request->getPost('jumlahharga'),
        );
        $model->updateKeranjang($data, $id);
    }

    public function detaildelete()
    {
        $model = new KeranjangModel();
        $id = $this->request->getPost('detailid');
        $model->deleteKeranjang($id);
    }

    public function savetransaksi()
    {
        $idpelanggan = session()->get('pelangganId');
        $fakturpemesanan = $this->request->getPost('fakturpemesanan');
        $tanggalpemesanan = $this->request->getPost('tanggalpemesanan');

        $perintahQuery = "INSERT INTO tb_detail_pemesanan (detail_pemesanan_faktur, detail_pemesanan_interior,
            detail_pemesanan_qty, detail_pemesanan_jumlah) 
            SELECT '$fakturpemesanan', keranjang_interior, keranjang_qty, keranjang_jumlah FROM tb_keranjang
            WHERE keranjang_pelanggan = '$idpelanggan'";

        $db = \Config\Database::connect();
        $query = $db->query($perintahQuery);

        $perintahQuerySatu = "INSERT INTO tb_pemesanan (pemesanan_faktur, pemesanan_pelanggan, 
            pemesanan_tanggal, pemesanan_total_item, pemesanan_total_harga, pemesanan_status) 
            VALUES ('$fakturpemesanan', $idpelanggan, '$tanggalpemesanan', 
            (SELECT SUM(keranjang_qty) AS totalqty FROM tb_keranjang WHERE keranjang_pelanggan = '$idpelanggan'),
            (SELECT SUM(keranjang_jumlah) AS totaljumlah FROM tb_keranjang WHERE keranjang_pelanggan = '$idpelanggan'),
            0)";

        $dbsatu = \Config\Database::connect();
        $querysatu = $dbsatu->query($perintahQuerySatu);

        $modeldua = new KeranjangModel();
        $modeldua->deleteKeranjangByPelanggan($idpelanggan);
    }

    public function faktur($id)
    {
        $model = new PemesananModel();

        $data = [
            'pemesanan' => $model->getDataDetailPemesanan($id)->getresultArray(),
            'detailpemesanan' => $model->getDataDetail($id)->getResultArray(),
            'nomorpemesanan' => $id
        ];

        return view('report/report_faktur_pemesanan', $data);
    }


    public function pesanansaya()
    {
        $idpelanggan = session()->get('pelangganId');

        $perintahQuery = "SELECT pemesanan_faktur, pemesanan_status, pemesanan_tanggal, pemesanan_total_item,
        pemesanan_total_harga, pembayaran_bayar, pemesanan_pelanggan
        FROM tb_pemesanan LEFT JOIN tb_pembayaran ON pemesanan_faktur = pembayaran_faktur
        WHERE pemesanan_pelanggan = '$idpelanggan' GROUP BY pemesanan_faktur";

        $db = \Config\Database::connect();
        $query = $db->query($perintahQuery);

        $data = [
            'pemesanan' => $query->getResultArray(),
            'validation' => \Config\Services::validation(),
        ];
        echo view('view_front_pesanan_saya', $data);
    }

    public function pembayaran()
    {
        $fakturpemesanan = $this->request->getPost('fakturpemesanan');
        $status = $this->request->getPost('status');
        $fileGambar = $this->request->getFile('gambar');

        $fileName = $fileGambar->getRandomName();
        $fileGambar->move('uploadbukti/', $fileName);

        $model = new PembayaranModel();
        $data = array(
            'pembayaran_faktur' => $this->request->getPost('fakturpemesanan'),
            'pembayaran_tanggal' =>  date('Ymd'),
            'pembayaran_bukti' => $fileName,
            'pembayaran_bayar' => $status,
        );
        $model->savePembayaran($data);

        if ($status == 1) {
            $pemesananstatus = 1;
        } else {
            $pemesananstatus = 4;
        }
        $modelsatu = new PemesananModel();
        $datadua = array(
            'pemesanan_status' => $pemesananstatus,
        );
        $modelsatu->updatePemesanan($datadua, $fakturpemesanan);

        return redirect()->to('pesanan-saya');
    }

    public function register()
    {
        $model = new FrontHomeModel();
        $data = array(
            'pelanggan_email' => $this->request->getPost('emailregister'),
            'pelanggan_nama' => $this->request->getPost('namaregister'),
            'pelanggan_password' => password_hash($this->request->getPost('passwordregister'), PASSWORD_DEFAULT),
            'pelanggan_jenkel' => 0,
            'pelanggan_alamat' => $this->request->getPost('alamatregister'),
            'pelanggan_nohp' => $this->request->getPost('nohpregister'),
        );
        $model->saveRegister($data);
        session()->setFlashdata('success', 'Berhasil daftar');
        return redirect()->to('/');
    }

    public function pelunasan()
    {
        $fakturpemesanan = $this->request->getPost('fakturpemesanan');
        $totalharga = $this->request->getPost('totalharga');
        $fileGambar = $this->request->getFile('gambar');

        $fileName = $fileGambar->getRandomName();
        $fileGambar->move('uploadbukti/', $fileName);

        $model = new PembayaranModel();
        $data = array(
            'pembayaran_tanggal' =>  date('Ymd'),
            'pembayaran_bukti' => $fileName,
            'pembayaran_bayar' => 1,
        );
        $model->updatePembayaranDua($data, $fakturpemesanan);

        $modelsatu = new PemesananModel();
        $datadua = array(
            'pemesanan_status' => 1,
        );
        $modelsatu->updatePemesanan($datadua, $fakturpemesanan);

        return redirect()->to('pesanan-saya');
    }
}
