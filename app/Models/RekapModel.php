<?php

namespace App\Models;

use CodeIgniter\Model;

class RekapModel extends Model
{

    protected $table                = 'tbl_siswa';
    protected $primaryKey           = 'id_siswa';
    protected $allowedFields = [
        'nama_siswa',
        'id_kelas',
        'nis',
        'nisn',
        'jenis_kelamin',
        'id_ta'

    ];
    // Dates
    public function getSiswaByKelas($id_kelas)
    {
        return $this->db->table('tbl_siswa s')
            ->select('s.nama_siswa, s.jenis_kelamin, s.nis, s.nisn')
            ->join('tbl_ta', 'tbl_ta.id_ta = s.id_ta', 'left')
            ->where('s.id_kelas', $id_kelas)
            ->where('tbl_ta. status', '1')
            ->orderBy('s.nama_siswa', 'ASC')
            ->get()
            ->getResultArray();
    }
}
