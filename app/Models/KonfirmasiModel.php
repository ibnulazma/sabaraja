<?php

namespace App\Models;

use CodeIgniter\Model;

class KonfirmasiModel extends Model
{
    protected $table            = 'tbl_konfirmasi';
    protected $primaryKey       = 'id_konfirmasi';

    protected $allowedFields    = [
        'id_kelas',
        'keterangan'
    ];

    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';


    protected $returnType       = 'array';

    /**
     * Cek apakah kelas sudah final
     */
    public function isFinal($idKelas)
    {
        return $this->where('id_kelas', $idKelas)
            ->where('keterangan', 'final')
            ->countAllResults() > 0;
    }

    /**
     * Ambil semua kelas yang sudah final
     */
    public function getFinalKelas()
    {
        return $this->select('tbl_konfirmasi.*, tbl_kelas.kelas')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_konfirmasi.id_kelas')
            ->where('keterangan', 'final')
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }
}
