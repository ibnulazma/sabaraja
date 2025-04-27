<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJadwal extends Model
{

    public function AllData($id_tingkat)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_jadwal.id_mapel', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_jadwal.id_tingkat', 'left')
            ->where('tbl_jadwal.id_tingkat', $id_tingkat)
            ->get()
            ->getResultArray();
    }


    public function DataGuru()
    {
        return $this->db->table('tbl_guru')
            ->get()
            ->getResultArray();
    }

    public function mapel($id_tingkat)
    {
        return $this->db->table('tbl_mapel')
            ->where('id_tingkat', $id_tingkat)
            ->get()->getResultArray();
    }
    public function kelas($id_tingkat)
    {
        return $this->db->table('tbl_kelas')
            ->where('id_tingkat', $id_tingkat)
            ->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_jadwal')
            ->insert($data);
    }
}
