<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMapel extends Model
{

    public function AllData()
    {
        return $this->db->table('tbl_mapel')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_mapel.id_guru', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_mapel.id_kelas', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_mapel.id_tahun', 'left')
            ->where('tbl_ta.status', '1')
            ->get()->getResultArray();
    }


    public function Tingkat()
    {
        return $this->db->table('tbl_tingkat')
            ->get()->getResultArray();
    }
    public function detailTingkat($id_tingkat)
    {
        return $this->db->table('tbl_tingkat')
            ->where('id_tingkat', $id_tingkat)
            ->get()->getRowArray();
    }





    public function add($data)
    {
        $this->db->table('tbl_mapel')
            ->insert($data);
    }



    public function addnilai($data)
    {
        $this->db->table('tbl_nilai')
            ->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_mapel')
            ->where('id_mapel', $data['id_mapel'])
            ->update($data);
    }


    public function delet($data)
    {
        $this->db->table('tbl_mapel')
            ->where('id_mapel', $data['id_mapel'])
            ->delete($data);
    }


    // Mapel Berdasarkan Tingkat
    public function rincianmapel($id_tingkat)
    {
        return $this->db->table('tbl_mapel')
            // ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_mapel.id_tingkat', 'left')
            ->where('tbl_mapel.id_tingkat', $id_tingkat)
            ->get()->getResultArray();
    }
}
