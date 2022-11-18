<?php

namespace App\Controllers;

use App\Models\SupplierModel;

class SupplierController extends BaseController
{
    public function index()
    {
        $model = new SupplierModel();
        $data = [
            'supplier' => $model->getSupplier()->getResultArray(),
            'validation' => \Config\Services::validation()
        ];
        echo view('view_supplier', $data);
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
            'nohp' => [
                'rules' => 'required|max_length[15]|min_length[8]',
                'errors' => [
                    'required' => 'Nohp harus diisi',
                    'max_length' => 'Kolom nohp tidak boleh lebih dari 15 karakter',
                    'min_length' => 'Kolom nohp setidaknya terdiri dari 8 karakter'
                ]
            ],
            'alamat' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Alamat harus diisi',
                    'max_length' => 'Kolom alamat tidak boleh lebih dari 255 karakter',
                ]
            ],
            'kota' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Kota harus diisi',
                    'max_length' => 'Kolom kota tidak boleh lebih dari 100 karakter',
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $model = new SupplierModel();
            $data = array(
                'supplier_nama' => $this->request->getPost('nama'),
                'supplier_nohp' => $this->request->getPost('nohp'),
                'supplier_alamat' => $this->request->getPost('alamat'),
                'supplier_kota' => $this->request->getPost('kota')
            );
            $model->saveSupplier($data);
            session()->setFlashdata('success', 'Berhasil menyimpan data');
            return redirect()->to('admin/supplier');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('admin/supplier')->withInput()->with('validation', $validation);
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
            'nohp' => [
                'rules' => 'required|max_length[15]|min_length[8]',
                'errors' => [
                    'required' => 'Nohp harus diisi',
                    'max_length' => 'Kolom nohp tidak boleh lebih dari 15 karakter',
                    'min_length' => 'Kolom nohp setidaknya terdiri dari 8 karakter'
                ]
            ],
            'alamat' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Alamat harus diisi',
                    'max_length' => 'Kolom alamat tidak boleh lebih dari 255 karakter',
                ]
            ],
            'kota' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Kota harus diisi',
                    'max_length' => 'Kolom kota tidak boleh lebih dari 100 karakter',
                ]
            ]
        ];

        $id = $this->request->getPost('id');

        if ($this->validate($rules)) {
            $model = new SupplierModel();
            $data = array(
                'supplier_nama' => $this->request->getPost('nama'),
                'supplier_nohp' => $this->request->getPost('nohp'),
                'supplier_alamat' => $this->request->getPost('alamat'),
                'supplier_kota' => $this->request->getPost('kota')
            );
            $model->updateSupplier($data, $id);
            session()->setFlashdata('success', 'Berhasil mengedit data');
            return redirect()->to('admin/supplier');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('admin/supplier' . $id)->withInput()->with('validation', $validation);
        }
    }

    public function delete()
    {
        $model = new SupplierModel();
        $id = $this->request->getPost('id');
        $model->deleteSupplier($id);
        session()->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to('admin/supplier');
    }

    public function report()
    {
        $model = new SupplierModel();
        $data['supplier'] = $model->getSupplier()->getResultArray();
        echo view('report/report_supplier', $data);
    }
}
