<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table = 'tbl_kelas';
    protected $primaryKey = 'id_kelas';
    protected $returnType = 'array';

    protected $allowedFields = [
        'kelas',
        'id_guru'
    ];






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




    /**
     * Ambil kelas yang diampu oleh guru (wali kelas)
     */
    public function getKelasGuru($idGuru)
    {
        return $this->select('tbl_kelas.*')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru')
            ->where('tbl_guru.id_guru', $idGuru)
            ->findAll();
    }
}
