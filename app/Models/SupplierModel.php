<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    public function getSupplier()
    {
        $bulder = $this->db->table('tb_supplier');
        return $bulder->get();
    }
    public function saveSupplier($data)
    {
        $query = $this->db->table('tb_supplier')->insert($data);
        return $query;
    }
    public function updateSupplier($data, $id)
    {
        $query = $this->db->table('tb_supplier')->update($data, array('supplier_id' => $id));
        return $query;
    }
    public function deleteSupplier($id)
    {
        $query = $this->db->table('tb_supplier')->delete(array('supplier_id' => $id));
        return $query;
    }
}
