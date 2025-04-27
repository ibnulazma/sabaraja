<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSekolah extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_sekolah')
            ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang = tbl_sekolah.id_jenjang', 'left')
            ->orderBy('sekolah', 'ASC')
            ->get()
            ->getResultArray();
    }
    public function detail_data($id_sekolah)
    {
        return $this->db->table('tbl_sekolah')
            ->where('id_sekolah', $id_sekolah)
            ->get()->getRowArray();
    }
    public function add($data)
    {
        $this->db->table('tbl_sekolah')
            ->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_sekolah')
            ->where('id_sekolah', $data['id_sekolah'])
            ->update($data);
    }
    public function delete_data($data)
    {
        $this->db->table('tbl_sekolah')
            ->where('id_sekolah', $data['id_sekolah'])
            ->delete($data);
    }

    public function getSekolah()
    {
        return $this->db->table('tbl_sekolah')
            ->get()
            ->getResultArray();
    }
    public function getSiswa($id_sekolah)
    {
        return $this->db->table('tbl_ppdb')
            ->where('id_sekolah', $id_sekolah)
            ->get()
            ->getResultArray();
    }
}
