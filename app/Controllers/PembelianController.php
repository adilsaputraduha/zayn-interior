<?php

namespace App\Controllers;

use App\Models\BahanBakuModel;
use App\Models\PembelianModel;

class PembelianController extends BaseController
{
    public function index()
    {
        $model = new PembelianModel();
        $data = [
            'pembelian' => $model->getPembelian()->getResultArray(),
        ];
        echo view('view_pembelian', $data);
    }

    public function add()
    {
        $generateRandom = rand(100, 999);
        $generateDate = date('Ymd');
        $generateInvoice = 'FB-' . $generateDate . "-" . $generateRandom;

        $model = new PembelianModel();
        $modelsatu = new BahanBakuModel();
        $data = [
            'detailpembelian' => $model->getDataDetail($generateInvoice)->getResultArray(),
            'bahanbaku' => $modelsatu->getBahanBaku()->getResultArray(),
            'validation' => \Config\Services::validation(),
            'nomor' => $generateInvoice
        ];
        echo view('view_pembelian_tambah', $data);
    }

    public function update($id)
    {
        $model = new PembelianModel();
        $modelsatu = new BahanBakuModel();
        $data = [
            'pembelian' => $model->getDataDetailPembelian($id)->getResultArray(),
            'detailpembelian' => $model->getDataDetail($id)->getResultArray(),
            'bahanbaku' => $modelsatu->getBahanBaku()->getResultArray(),
            'validation' => \Config\Services::validation(),
            'nomor' => $id
        ];
        echo view('view_pembelian_update', $data);
    }

    public function detailindex()
    {
        $id = $this->request->getPost('fakturpembelian');

        $model = new PembelianModel();
        $data = [
            'detailpembelian' => $model->getDataDetail($id)->getResultArray(),
        ];
        echo view('table_pembelian', $data);
    }

    public function detailsave()
    {
        $model = new PembelianModel();
        $modeldua = new BahanBakuModel();
        $data = array(
            'detail_pembelian_faktur' => $this->request->getPost('fakturpembelian'),
            'detail_pembelian_bahan_baku' => $this->request->getPost('idbahanbaku'),
            'detail_pembelian_qty' => $this->request->getPost('qtybahanbaku'),
            'detail_pembelian_jumlah' => $this->request->getPost('jumlahbahanbaku'),
        );
        $model->saveDetail($data);

        $idbahanbaku = $this->request->getPost('idbahanbaku');
        $stokbahanbaku = $this->request->getPost('stokbahanbaku');
        $qtybahanbaku = $this->request->getPost('qtybahanbaku');
        $totalpengurangan = $stokbahanbaku - $qtybahanbaku;

        $datadua = array(
            'bahan_baku_stok' => $totalpengurangan,
        );
        $modeldua->updateBahanBaku($datadua, $idbahanbaku);
    }

    public function detaildelete()
    {
        $model = new PembelianModel();
        $id = $this->request->getPost('detailid');
        $model->deleteDetail($id);
    }

    public function save()
    {
        $model = new PembelianModel();
        $data = array(
            'pembelian_faktur' => $this->request->getPost('fakturpembelian'),
            'pembelian_tanggal' => $this->request->getPost('tanggalpembelian'),
            'pembelian_total_item' => $this->request->getPost('totalitem'),
            'pembelian_total_harga' => $this->request->getPost('totalharga'),
        );
        $model->savePembelian($data);
    }

    public function edit()
    {
        $id = $this->request->getPost('fakturpembelian');

        $model = new PembelianModel();
        $data = array(
            'pembelian_tanggal' => $this->request->getPost('tanggalpembelian'),
            'pembelian_total_item' => $this->request->getPost('totalitem'),
            'pembelian_total_harga' => $this->request->getPost('totalharga'),
        );
        $model->updatePembelian($data, $id);
    }

    public function faktur($id)
    {
        $model = new PembelianModel();

        $data = [
            'pembelian' => $model->getDataDetailPembelian($id)->getresultArray(),
            'detailpembelian' => $model->getDataDetail($id)->getResultArray(),
            'nomorpembelian' => $id
        ];

        return view('report/report_faktur_pembelian', $data);
    }
}
