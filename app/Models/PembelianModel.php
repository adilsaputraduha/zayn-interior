<?php

namespace App\Models;

use CodeIgniter\Model;

class PembelianModel extends Model
{
    public function getPembelian()
    {
        $bulder = $this->db->table('tb_pembelian');
        return $bulder->get();
    }

    public function getDataDetail($id)
    {
        $bulder = $this->db->table('tb_detail_pembelian')
            ->join('tb_bahan_baku', 'bahan_baku_id = detail_pembelian_bahan_baku')
            ->join('tb_supplier', 'supplier_id = bahan_baku_supplier')
            ->where(['detail_pembelian_faktur' => $id]);
        return $bulder->get();
    }

    public function saveDetail($data)
    {
        $query = $this->db->table('tb_detail_pembelian')->insert($data);
        return $query;
    }

    public function deleteDetail($id)
    {
        $query = $this->db->table('tb_detail_pembelian')->delete(array('detail_pembelian_id' => $id));
        return $query;
    }

    public function savePembelian($data)
    {
        $query = $this->db->table('tb_pembelian')->insert($data);
        return $query;
    }

    public function updatePembelian($data, $id)
    {
        $query = $this->db->table('tb_pembelian')->update($data, array('pembelian_faktur' => $id));
        return $query;
    }

    public function getDataDetailPembelian($id)
    {
        $bulder = $this->db->table('tb_pembelian')
            ->where(['pembelian_faktur' => $id]);
        return $bulder->get();
    }
}
