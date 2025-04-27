<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPresensi extends Model
{

    public function add($data)
    {
        $this->db->table('tbl_kehadiran')
            ->insert($data);
    }
}
