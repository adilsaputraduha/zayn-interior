<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model
{
    public function getKeranjang($id)
    {
        $bulder = $this->db->table('tb_keranjang')
            ->join('tb_pelanggan', 'pelanggan_id = keranjang_pelanggan')
            ->join('tb_interior', 'interior_kode = keranjang_interior')
            ->where(['keranjang_pelanggan' => $id]);
        return $bulder->get();
    }
    public function saveKeranjang($data)
    {
        $query = $this->db->table('tb_keranjang')->insert($data);
        return $query;
    }
    public function updateKeranjang($data, $id)
    {
        $query = $this->db->table('tb_keranjang')->update($data, array('keranjang_id' => $id));
        return $query;
    }
    public function deleteKeranjang($id)
    {
        $query = $this->db->table('tb_keranjang')->delete(array('keranjang_id' => $id));
        return $query;
    }
    public function deleteKeranjangByPelanggan($id)
    {
        $query = $this->db->table('tb_keranjang')->delete(array('keranjang_pelanggan' => $id));
        return $query;
    }
}
