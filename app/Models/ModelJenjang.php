<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJenjang extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_jenjang')
            ->get()
            ->getResultArray();
    }

    public function getAsalSekolah($id_jenjang)
    {
        return $this->db->table('tbl_sekolah')
            ->where('id_jenjang', $id_jenjang)
            ->get()
            ->getResultArray();
    }
}
