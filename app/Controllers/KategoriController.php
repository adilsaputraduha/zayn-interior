<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class KategoriController extends BaseController
{
    public function index()
    {
        $model = new KategoriModel();
        $data = [
            'kategori' => $model->getKategori()->getResultArray(),
            'validation' => \Config\Services::validation()
        ];
        echo view('view_kategori', $data);
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
        ];

        if ($this->validate($rules)) {
            $model = new KategoriModel();
            $data = array(
                'kategori_nama' => $this->request->getPost('nama'),
            );
            $model->saveKategori($data);
            session()->setFlashdata('success', 'Berhasil menyimpan data');
            return redirect()->to('admin/kategori');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('admin/kategori')->withInput()->with('validation', $validation);
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
        ];

        $id = $this->request->getPost('id');

        if ($this->validate($rules)) {
            $model = new KategoriModel();
            $data = array(
                'kategori_nama' => $this->request->getPost('nama'),
            );
            $model->updateKategori($data, $id);
            session()->setFlashdata('success', 'Berhasil mengedit data');
            return redirect()->to('admin/kategori');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('admin/kategori' . $id)->withInput()->with('validation', $validation);
        }
    }

    public function delete()
    {
        $model = new KategoriModel();
        $id = $this->request->getPost('id');
        $model->deleteKategori($id);
        session()->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to('admin/kategori');
    }

    public function report()
    {
        $model = new KategoriModel();
        $data['kategori'] = $model->getKategori()->getResultArray();
        echo view('report/report_kategori', $data);
    }
}
