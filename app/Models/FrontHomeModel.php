<?php

namespace App\Models;

use CodeIgniter\Model;

class FrontHomeModel extends Model
{
    public function cekLogin($email)
    {
        return $this->db->table('tb_pelanggan')
            ->where(array('pelanggan_email' => $email))
            ->get()->getRowArray();
    }
    public function saveRegister($data)
    {
        $query = $this->db->table('tb_pelanggan')->insert($data);
        return $query;
    }
}
