<?php

namespace App\Models;

use CodeIgniter\Model;

class KompreModel extends Model
{
    public function saveKompre($data)
    {
        $query = $this->db->table('tb_interior')->insert($data);
        return $query;
    }
}
