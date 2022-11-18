<?php

namespace App\Controllers;

use App\Models\PelangganModel;

class PelangganController extends BaseController
{
    public function index()
    {
        $model = new PelangganModel();
        $data = [
            'pelanggan' => $model->getPelanggan()->getResultArray(),
            'validation' => \Config\Services::validation()
        ];
        echo view('view_pelanggan', $data);
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
            'jenkel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis kelamin harus diisi',
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $model = new PelangganModel();
            $data = array(
                'pelanggan_nama' => $this->request->getPost('nama'),
                'pelanggan_jenkel' => $this->request->getPost('jenkel'),
                'pelanggan_alamat' => $this->request->getPost('alamat'),
                'pelanggan_nohp' => $this->request->getPost('nohp')
            );
            $model->savePelanggan($data);
            session()->setFlashdata('success', 'Berhasil menyimpan data');
            return redirect()->to('admin/pelanggan');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('admin/pelanggan')->withInput()->with('validation', $validation);
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
            'jenkel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis kelamin harus diisi',
                ]
            ]
        ];

        $id = $this->request->getPost('id');

        if ($this->validate($rules)) {
            $model = new PelangganModel();
            $data = array(
                'pelanggan_nama' => $this->request->getPost('nama'),
                'pelanggan_jenkel' => $this->request->getPost('jenkel'),
                'pelanggan_alamat' => $this->request->getPost('alamat'),
                'pelanggan_nohp' => $this->request->getPost('nohp')
            );
            $model->updatePelanggan($data, $id);
            session()->setFlashdata('success', 'Berhasil mengedit data');
            return redirect()->to('admin/pelanggan');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('admin/pelanggan' . $id)->withInput()->with('validation', $validation);
        }
    }

    public function delete()
    {
        $model = new PelangganModel();
        $id = $this->request->getPost('id');
        $model->deletePelanggan($id);
        session()->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to('admin/pelanggan');
    }

    public function report()
    {
        $model = new PelangganModel();
        $data['pelanggan'] = $model->getPelanggan()->getResultArray();
        echo view('report/report_pelanggan', $data);
    }
}
