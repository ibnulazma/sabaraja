<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    protected $table = 'tbl_database';

    public function jumlahSiswaPerKelas()
    {
        return $this->db->table('tbl_database db')
            ->select("
                k.id_kelas,
                k.kelas,
                ta.ta,
                COUNT(s.id_siswa) AS total_siswa,
                SUM(CASE WHEN s.jenis_kelamin = 'L' THEN 1 ELSE 0 END) AS jumlah_laki,
                SUM(CASE WHEN s.jenis_kelamin = 'P' THEN 1 ELSE 0 END) AS jumlah_perempuan
            ")
            ->join('tbl_siswa s', 's.id_siswa = db.id_siswa')
            ->join('tbl_kelas k', 'k.id_kelas = db.id_kelas')
            ->join('tbl_ta ta', 'ta.id_ta = db.id_ta')
            ->where('ta.status', '1')
            ->groupBy('k.id_kelas')
            ->orderBy('k.kelas', 'ASC')
            ->get()
            ->getResultArray();
    }
}
