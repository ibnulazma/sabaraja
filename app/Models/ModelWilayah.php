<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelWilayah extends Model
{
    // =====================
    // PROVINSI
    // =====================
    public function getProvinsi()
    {
        return $this->db->table('provinsi')
            ->select('id_provinsi, prov_name')
            ->orderBy('prov_name', 'ASC')
            ->get()
            ->getResultArray();
    }

    // =====================
    // KABUPATEN / KOTA
    // =====================
    public function getKabupaten($id_provinsi)
    {
        return $this->db->table('kabupaten')
            ->select('id_kabupaten, city_name')
            ->where('id_provinsi', $id_provinsi)
            ->orderBy('city_name', 'ASC')
            ->get()
            ->getResultArray();
    }

    // =====================
    // KECAMATAN
    // =====================
    public function getKecamatan($id_kabupaten)
    {
        return $this->db->table('kecamatan')
            ->select('id_kecamatan, nama_kecamatan')
            ->where('id_kabupaten', $id_kabupaten)
            ->orderBy('nama_kecamatan', 'ASC')
            ->get()
            ->getResultArray();
    }

    // =====================
    // DESA / KELURAHAN
    // =====================
    public function getDesa($id_kecamatan)
    {
        return $this->db->table('desa')
            ->select('id_desa, desa')
            ->where('id_kecamatan', $id_kecamatan)
            ->orderBy('desa', 'ASC')
            ->get()
            ->getResultArray();
    }
}
