<?php

namespace App\Controllers;

use App\Models\BahanBakuModel;
use App\Models\InteriorModel;
use App\Models\KategoriModel;

class InteriorController extends BaseController
{
    public function index()
    {

        $model = new InteriorModel();
        $modelsatu = new KategoriModel();
        $data = [
            'interior' => $model->getInterior()->getResultArray(),
            'kategori' => $modelsatu->getKategori()->getResultArray(),
            'validation' => \Config\Services::validation(),
        ];
        echo view('view_interior', $data);
    }

    public function add()
    {
        $generateRandom = rand(10000, 99999);
        $generateKode = 'INTR-' . $generateRandom;

        $modelsatu = new KategoriModel();
        $modeldua = new BahanBakuModel();
        $data = [
            'kategori' => $modelsatu->getKategori()->getResultArray(),
            'bahanbaku' => $modeldua->getBahanBaku()->getResultArray(),
            'validation' => \Config\Services::validation(),
            'kodeinterior' => $generateKode,
        ];
        echo view('view_interior_tambah', $data);
    }

    public function save()
    {

        $model = new InteriorModel();

        $fileGambar = $this->request->getFile('gambar');

        if ($fileGambar->getError() == 4) {
            $fileName = 'default.png';
        } else {
            $fileName = $fileGambar->getRandomName();
            // Upload image
            $fileGambar->move('uploads/', $fileName);
        };

        $data = array(
            'interior_kode' => $this->request->getPost('kode'),
            'interior_nama' => $this->request->getPost('nama'),
            'interior_kategori' => $this->request->getPost('kategori'),
            'interior_harga' => $this->request->getPost('harga'),
            'interior_stok' => $this->request->getPost('stok'),
            'interior_gambar' => $fileName,
            'interior_deskripsi' => $this->request->getPost('deskripsi'),
        );

        $model->saveInterior($data);
        session()->setFlashdata('success', 'Berhasil menyimpan data');
        return redirect()->to('admin/interior');
    }

    public function edit()
    {
        $rules = [
            'kode' => [
                'rules' => 'required|max_length[10]',
                'errors' => [
                    'required' => 'Kode harus diisi',
                    'max_length' => 'Kolom kode tidak boleh lebih dari 10 karakter'
                ]
            ],
            'nama' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'max_length' => 'Kolom nama tidak boleh lebih dari 255 karakter'
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori harus diisi',
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga harus diisi',
                ]
            ],
            'stok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Stok harus diisi',
                ]
            ],
        ];

        $id = $this->request->getPost('kode');

        if ($this->validate($rules)) {
            $model = new InteriorModel();

            $fileGambar = $this->request->getFile('gambar');

            if ($fileGambar->getError() == 4) {
                $fileName = $this->request->getPost('filelama');
            } else {
                $fileName = $fileGambar->getRandomName();
                // Upload image
                $fileGambar->move('uploads/', $fileName);
            };

            $data = array(
                'interior_nama' => $this->request->getPost('nama'),
                'interior_kategori' => $this->request->getPost('kategori'),
                'interior_harga' => $this->request->getPost('harga'),
                'interior_stok' => $this->request->getPost('stok'),
                'interior_gambar' => $fileName,
                'interior_deskripsi' => $this->request->getPost('deskripsi'),
            );

            $model->updateInterior($data, $id);
            session()->setFlashdata('success', 'Berhasil mengedit data');
            return redirect()->to('admin/interior');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('admin/interior' . $id)->withInput()->with('validation', $validation);
        }
    }

    public function delete()
    {
        $model = new InteriorModel();
        $id = $this->request->getPost('id');
        $model->deleteInterior($id);
        session()->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to('admin/interior');
    }

    public function report()
    {
        $model = new InteriorModel();
        $data['interior'] = $model->getInterior()->getResultArray();
        echo view('report/report_interior', $data);
    }

    public function detailindex()
    {
        $id = $this->request->getPost('kode');

        $model = new InteriorModel();
        $data = [
            'detailbahanbaku' => $model->getDataDetail($id)->getResultArray(),
        ];
        echo view('table_bahan_baku', $data);
    }

    public function detailsave()
    {
        $model = new InteriorModel();
        $data = array(
            'detail_interior_kode' => $this->request->getPost('kode'),
            'detail_bahan_baku' => $this->request->getPost('bahanbaku'),
            'detail_qty' => $this->request->getPost('qty'),
        );
        $model->saveDetail($data);
    }

    public function detaildelete()
    {
        $model = new InteriorModel();
        $id = $this->request->getPost('detailid');
        $model->deleteDetail($id);
    }
}
