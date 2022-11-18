<?php

namespace App\Models;

use CodeIgniter\Model;

class InteriorModel extends Model
{
    public function getInterior()
    {
        $bulder = $this->db->table('tb_interior')
            ->join('tb_kategori', 'kategori_id = interior_kategori');
        return $bulder->get();
    }
    public function saveInterior($data)
    {
        $query = $this->db->table('tb_interior')->insert($data);
        return $query;
    }
    public function updateInterior($data, $id)
    {
        $query = $this->db->table('tb_interior')->update($data, array('interior_kode' => $id));
        return $query;
    }
    public function deleteInterior($id)
    {
        $query = $this->db->table('tb_interior')->delete(array('interior_kode' => $id));
        return $query;
    }
    public function getDataDetail($id)
    {
        $bulder = $this->db->table('tb_detail_interior')
            ->join('tb_bahan_baku', 'tb_detail_interior.detail_bahan_baku = tb_bahan_baku.bahan_baku_id')
            ->where(['detail_interior_kode' => $id]);
        return $bulder->get();
    }
    public function saveDetail($data)
    {
        $query = $this->db->table('tb_detail_interior')->insert($data);
        return $query;
    }

    public function deleteDetail($id)
    {
        $query = $this->db->table('tb_detail_interior')->delete(array('detail_id' => $id));
        return $query;
    }
}
