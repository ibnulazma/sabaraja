<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelWilayah extends Model
{

    public function provinsi()
    {
        return $this->db->table('provinsi')
            ->orderBy('id_provinsi', 'ASC')
            ->get()->getResultArray();
    }





    public function getKabupaten($id_provinsi)
    {
        return $this->db->table('kabupaten')
            ->where('id_provinsi', $id_provinsi)
            ->get()
            ->getResultArray();
    }


    public function getKecamatan($id_kabupaten)
    {
        return $this->db->table('kecamatan')
            ->where('id_kabupaten', $id_kabupaten)
            ->get()->getResultArray();
    }

    public function getDesa($id_kecamatan)
    {
        return $this->db->table('desa')
            ->where('id_kecamatan', $id_kecamatan)
            ->get()->getResultArray();
    }
}
