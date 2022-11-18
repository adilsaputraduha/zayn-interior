<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class ReportController extends BaseController
{
    public function index()
    {
        echo view('view_report');
    }

    public function reportpemesanan()
    {
        $tanggalawalpemesanan = $this->request->getPost('tanggalawalpemesanan');
        $tanggalakhirpemesanan = $this->request->getPost('tanggalakhirpemesanan');
        $status = $this->request->getPost('status');

        $perintahQuery = '';

        if ($status == 10) {
            $perintahQuery = "SELECT pemesanan_faktur, pemesanan_pelanggan, pemesanan_tanggal, pemesanan_total_item, pemesanan_total_harga,
            pemesanan_status, pelanggan_nama 
            FROM tb_pemesanan
            JOIN tb_pelanggan ON pelanggan_id = pemesanan_pelanggan        
            WHERE pemesanan_tanggal BETWEEN '$tanggalawalpemesanan' and '$tanggalakhirpemesanan'";
        } else {
            $perintahQuery = "SELECT pemesanan_faktur, pemesanan_pelanggan, pemesanan_tanggal, pemesanan_total_item, pemesanan_total_harga,
            pemesanan_status, pelanggan_nama 
            FROM tb_pemesanan
            JOIN tb_pelanggan ON pelanggan_id = pemesanan_pelanggan        
            WHERE pemesanan_status = '$status' AND pemesanan_tanggal BETWEEN '$tanggalawalpemesanan' and '$tanggalakhirpemesanan'";
        }
        $db = \Config\Database::connect();
        $query = $db->query($perintahQuery);

        $data = [
            'pemesanan' => $query->getResultArray(),
            'tanggalawalpemesanan' => $tanggalawalpemesanan,
            'tanggalakhirpemesanan' => $tanggalakhirpemesanan,
        ];
        echo view('report/report_pemesanan', $data);
    }

    public function reportpembelian()
    {
        $tanggalawalpembelian = $this->request->getPost('tanggalawalpembelian');
        $tanggalakhirpembelian = $this->request->getPost('tanggalakhirpembelian');

        $perintahQuery = "SELECT pembelian_faktur, pembelian_tanggal, pembelian_total_item, pembelian_total_harga
        FROM tb_pembelian    
        WHERE pembelian_tanggal BETWEEN '$tanggalawalpembelian' and '$tanggalakhirpembelian'";

        $db = \Config\Database::connect();
        $query = $db->query($perintahQuery);

        $data = [
            'pembelian' => $query->getResultArray(),
            'tanggalawalpembelian' => $tanggalawalpembelian,
            'tanggalakhirpembelian' => $tanggalakhirpembelian,
        ];
        echo view('report/report_pembelian', $data);
    }

    public function reportpembayaran()
    {
        $tanggalawalpembayaran = $this->request->getPost('tanggalawalpembayaran');
        $tanggalakhirpembayaran = $this->request->getPost('tanggalakhirpembayaran');

        $perintahQuery = "SELECT pembayaran_id, pembayaran_faktur, pembayaran_tanggal, pembayaran_bayar,
        pemesanan_faktur, pelanggan_nama, pemesanan_pelanggan, pemesanan_tanggal, pemesanan_total_item, pemesanan_total_harga, pemesanan_status
        FROM tb_pembayaran JOIN tb_pemesanan ON pembayaran_faktur = pemesanan_faktur
        JOIN tb_pelanggan ON pelanggan_id = pemesanan_pelanggan
        WHERE pembayaran_tanggal BETWEEN '$tanggalawalpembayaran' and '$tanggalakhirpembayaran'";

        $db = \Config\Database::connect();
        $query = $db->query($perintahQuery);

        $data = [
            'pembayaran' => $query->getResultArray(),
            'tanggalawalpembayaran' => $tanggalawalpembayaran,
            'tanggalakhirpembayaran' => $tanggalakhirpembayaran,
        ];
        echo view('report/report_pembayaran', $data);
    }
}
