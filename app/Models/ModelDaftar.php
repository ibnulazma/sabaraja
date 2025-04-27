<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDaftar extends Model
{

    public function search($cari)
    {
        $builder   = $this->table('tbl_daftar');
        $builder->like('nama_lengkap', $cari);
        return $builder;
    }
}
