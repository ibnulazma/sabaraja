<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDokumen extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // simpan dokumen
    public function insertDokumen($data)
    {
        return $this->db->table('tbl_siswa')->insert($data);
    }

    // ambil dokumen per siswa
    public function getBySiswa($id_siswa)
    {
        return $this->db->table('siswa_dokumen')
            ->where('id_siswa', $id_siswa)
            ->orderBy('created_at', 'DESC')
            ->get()
            ->getResultArray();
    }

    // hapus dokumen (opsional)
    public function getById($id)
    {
        return $this->db->table('siswa_dokumen')
            ->where('id_dokumen', $id)
            ->get()
            ->getRowArray();
    }

    public function deleteDokumen($id)
    {
        return $this->db->table('siswa_dokumen')
            ->where('id_dokumen', $id)
            ->delete();
    }
}
