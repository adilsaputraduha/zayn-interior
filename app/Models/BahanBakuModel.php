<?php

namespace App\Models;

use CodeIgniter\Model;

class BahanBakuModel extends Model
{
    public function getBahanBaku()
    {
        $bulder = $this->db->table('tb_bahan_baku')
            ->join('tb_supplier', 'supplier_id = bahan_baku_supplier');
        return $bulder->get();
    }
    public function saveBahanBaku($data)
    {
        $query = $this->db->table('tb_bahan_baku')->insert($data);
        return $query;
    }
    public function updateBahanBaku($data, $id)
    {
        $query = $this->db->table('tb_bahan_baku')->update($data, array('bahan_baku_id' => $id));
        return $query;
    }
    public function deleteBahanBaku($id)
    {
        $query = $this->db->table('tb_bahan_baku')->delete(array('bahan_baku_id' => $id));
        return $query;
    }
}
