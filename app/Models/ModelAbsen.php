<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAbsen extends Model
{

    public function AllData()
    {
        return $this->db->table('tbl_absen')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_absen.id_guru', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_absen.id_ta', 'left')
            // ->orderBy('tbl_ppdb.nama_lengkap')
            ->get()
            ->getResultArray();
    }


    public function add($data)
    {
        $this->db->table('tbl_absen')
            ->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_absen')
            ->where('id_absen', $data['id_absen'])
            ->update($data);
    }
    public function delete_data($data)
    {
        $this->db->table('tbl_absen')
            ->where('id_absen', $data['id_absen'])
            ->delete($data);
    }
    public function detail($id_absen)
    {
        return $this->db->table('tbl_absen')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_absen.id_guru', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_absen.id_ta', 'left')
            ->where('id_absen', $id_absen)
            ->get()
            ->getRowArray();
    }

    public function datasiswa($id_absen)
    {
        return $this->db->table('tbl_siswa')
            // ->join('tbl_ta', 'tbl_ta.id_ta = tbl_absen.id_ta', 'left')
            ->orderBy('nama_lengkap', 'ASC')
            ->where('id_absen', $id_absen)
            ->get()
            ->getResultArray();
    }


    public function jml_siswa($id_absen)
    {
        return $this->db->table('tbl_siswa')
            ->where('id_absen', $id_absen)
            ->countAllResults();
    }
}
