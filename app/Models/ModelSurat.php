<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSurat extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_mutasi')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa = tbl_mutasi.id_siswa')
            ->join('tbl_database', 'tbl_database.nisn = tbl_siswa.nisn')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_database.id_kelas')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_database.id_ta')
            ->orderBy('tbl_siswa.nama_siswa', 'ASC')
            ->where('tbl_ta.status', '1')
            ->get()
            ->getResultArray();
    }
    public function detail_data($id_mutasi)
    {
        return $this->db->table('tbl_mutasi')
            ->join('tbl_siswa', 'tbl_siswa.nisn = tbl_mutasi.nisn', 'left')
            ->join('provinsi', 'provinsi.id_provinsi = tbl_siswa.provinsi', 'left')
            ->join('kabupaten', 'kabupaten.id_kabupaten = tbl_siswa.kabupaten', 'left')
            ->join('kecamatan', 'kecamatan.id_kecamatan = tbl_siswa.kecamatan', 'left')
            ->join('desa', 'desa.id_desa = tbl_siswa.desa', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
            ->where('id_mutasi', $id_mutasi)
            ->get()->getRowArray();
    }
    public function penerimaan($id_terima)
    {
        return $this->db->table('tbl_terima')
            ->where('id_terima', $id_terima)
            ->get()->getRowArray();
    }


    public function permohonan($id_mutasi)
    {
        return $this->db->table('tbl_mutasi')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa = tbl_mutasi.id_siswa')
            ->join('tbl_database', 'tbl_database.nisn = tbl_siswa.nisn')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_database.id_kelas')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru')
            ->join('provinsi', 'provinsi.id_provinsi = tbl_siswa.provinsi', 'left')
            ->join('kabupaten', 'kabupaten.id_kabupaten = tbl_siswa.kabupaten', 'left')
            ->join('kecamatan', 'kecamatan.id_kecamatan = tbl_siswa.kecamatan', 'left')
            ->join('desa', 'desa.id_desa = tbl_siswa.desa', 'left')
            ->where('tbl_mutasi.id_mutasi', $id_mutasi)
            ->get()->getRowArray();
    }
    public function terima()
    {
        return $this->db->table('tbl_terima')

            ->get()->getResultArray();
    }
    public function addterima($data)
    {
        $this->db->table('tbl_terima')
            ->insert($data);
    }

    public function editmutasi($data)
    {
        $this->db->table('tbl_mutasi')
            ->where('id_mutasi', $data['id_mutasi'])
            ->update($data);
    }
    public function konfirmasi($data)
    {
        $this->db->table('tbl_mutasi')
            ->where('id_mutasi', $data['id_mutasi'])
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
