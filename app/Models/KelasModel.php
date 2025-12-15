<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table = 'tbl_kelas';
    protected $primaryKey = 'id_kelas';

    public function getKelas()
    {
        return $this->db->table('tbl_kelas')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_kelas.id_ta', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->where('tbl_ta.status', '1')
            ->orderBy('kelas', 'ASC')
            ->get()
            ->getResultArray();
    }
}
