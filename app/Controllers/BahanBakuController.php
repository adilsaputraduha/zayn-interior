<?php

namespace App\Controllers;

use App\Models\BahanBakuModel;
use App\Models\SupplierModel;

class BahanBakuController extends BaseController
{
    public function index()
    {
        $model = new BahanBakuModel();
        $modelsatu = new SupplierModel();
        $data = [
            'bahanbaku' => $model->getBahanBaku()->getResultArray(),
            'supplier' => $modelsatu->getSupplier()->getResultArray(),
            'validation' => \Config\Services::validation()
        ];
        echo view('view_bahan_baku', $data);
    }

    public function save()
    {
        $rules = [
            'nama' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'max_length' => 'Kolom nama tidak boleh lebih dari 255 karakter'
                ]
            ],
            'supplier' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi',
                ]
            ],
        ];

        if ($this->validate($rules)) {
            $model = new BahanBakuModel();
            $data = array(
                'bahan_baku_nama' => $this->request->getPost('nama'),
                'bahan_baku_supplier' => $this->request->getPost('supplier'),
                'bahan_baku_satuan' => $this->request->getPost('satuan'),
                'bahan_baku_stok' => $this->request->getPost('stok'),
                'bahan_baku_harga' => $this->request->getPost('harga'),
            );
            $model->saveBahanBaku($data);
            session()->setFlashdata('success', 'Berhasil menyimpan data');
            return redirect()->to('admin/bahanbaku');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('admin/bahanbaku')->withInput()->with('validation', $validation);
        }
    }

    public function edit()
    {
        $rules = [
            'nama' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'max_length' => 'Kolom nama tidak boleh lebih dari 255 karakter'
                ]
            ],
            'supplier' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi',
                ]
            ],
        ];

        $id = $this->request->getPost('id');

        if ($this->validate($rules)) {
            $model = new BahanBakuModel();
            $data = array(
                'bahan_baku_nama' => $this->request->getPost('nama'),
                'bahan_baku_supplier' => $this->request->getPost('supplier'),
                'bahan_baku_satuan' => $this->request->getPost('satuan'),
                'bahan_baku_stok' => $this->request->getPost('stok'),
                'bahan_baku_harga' => $this->request->getPost('harga'),
            );
            $model->updateBahanBaku($data, $id);
            session()->setFlashdata('success', 'Berhasil mengedit data');
            return redirect()->to('admin/bahanbaku');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('admin/bahanbaku' . $id)->withInput()->with('validation', $validation);
        }
    }

    public function delete()
    {
        $model = new BahanBakuModel();
        $id = $this->request->getPost('id');
        $model->deleteBahanBaku($id);
        session()->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to('admin/bahanbaku');
    }

    public function report()
    {
        $model = new BahanBakuModel();
        $data['bahanbaku'] = $model->getBahanBaku()->getResultArray();
        echo view('report/report_bahan_baku', $data);
    }
}
