<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    public function getKategori()
    {
        $bulder = $this->db->table('tb_kategori');
        return $bulder->get();
    }
    public function saveKategori($data)
    {
        $query = $this->db->table('tb_kategori')->insert($data);
        return $query;
    }
    public function updateKategori($data, $id)
    {
        $query = $this->db->table('tb_kategori')->update($data, array('kategori_id' => $id));
        return $query;
    }
    public function deleteKategori($id)
    {
        $query = $this->db->table('tb_kategori')->delete(array('kategori_id' => $id));
        return $query;
    }
}
