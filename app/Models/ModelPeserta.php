<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPeserta extends Model

{
    public function aktif()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_siswa.id_ta', 'left')
            ->where('tbl_ta.status', '1')
            // ->where('aktif', '1')
            ->where('status_daftar', '3')
            ->get()
            ->getResultArray();
    }
    public function verifikasi()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_siswa.id_ta', 'left')
            ->where('status_daftar', '2')
            ->where('aktif', '1')
            ->get()
            ->getResultArray();
    }


    // status_daftar 4
    public function lulusan()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            ->where('aktif', '0')
            ->where('status_daftar', '4')
            ->get()
            ->getResultArray();
    }
    // status_daftar 5
    public function keluar()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            ->where('aktif', '0')
            ->where('status_daftar', '5')
            ->get()
            ->getResultArray();
    }


    public function pertahun()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_siswa.id_ta', 'left')
            ->where('status', '1')
            ->where('status_daftar', '3')
            ->get()
            ->getResultArray();
    }
    public function jmlverifikasi()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            // ->join('tbl_ta', 'tbl_ta.id_ta = tbl_siswa.id_ta', 'left')
            ->where('status_daftar', '2')
            ->countAllResults();
    }



    public function add($data)
    {
        $this->db->table('tbl_siswa')
            ->insert($data);
    }
    public function addkelas($data)
    {
        $this->db->table('tbl_database')
            ->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_siswa')
            ->where('nisn', $data['nisn'])
            ->update($data);
    }
    public function editalamat($data)
    {
        $this->db->table('tbl_siswa')
            ->where('nisn', $data['nisn'])
            ->update($data);
    }
    public function editorangtua($data)
    {
        $this->db->table('tbl_siswa')
            ->where('nisn', $data['nisn'])
            ->update($data);
    }

    public function upload($data)
    {
        $this->db->table('tbl_siswa')
            ->insert($data);
    }
    public function kelas()
    {
        return $this->db->table('tbl_kelas')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_kelas.id_tingkat')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_kelas.id_ta', 'left')
            ->where('tbl_ta.status', '1')
            // ->where('tbl_tingkat.id_tingkat')
            ->orderBy('kelas', 'DESC')
            ->get()
            ->getResultArray();
    }
    public function cekdata($nisn)
    {
        return $this->db->table('tbl_siswa')
            ->where('nisn', $nisn)->get()->getRowArray();
    }

    public function DataPeserta($nisn)
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_database', 'tbl_database.nisn_siswa = tbl_siswa.nisn', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_database.id_kelas', 'left')
            // ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            // ->join('tbl_ta', 'tbl_ta.id_ta = tbl_siswa.id_ta', 'left')
            ->join('desa', 'desa.id_desa = tbl_siswa.desa', 'left')
            ->join('provinsi', 'provinsi.id_provinsi = tbl_siswa.provinsi', 'left')
            ->join('kecamatan', 'kecamatan.id_kecamatan = tbl_siswa.kecamatan', 'left')
            ->join('kabupaten', 'kabupaten.id_kabupaten = tbl_siswa.kabupaten', 'left')
            ->where('tbl_siswa.nisn', $nisn)
            ->get()->getRowArray();
    }

    public function Data($id_siswa)
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_siswa.id_ta', 'left')
            ->join('desa', 'desa.id_desa = tbl_siswa.desa', 'left')
            ->join('provinsi', 'provinsi.id_provinsi = tbl_siswa.provinsi', 'left')
            ->join('kecamatan', 'kecamatan.id_kecamatan = tbl_siswa.kecamatan', 'left')
            ->join('kabupaten', 'kabupaten.id_kabupaten = tbl_siswa.kabupaten', 'left')
            ->where('id_siswa', $id_siswa)
            ->where('tbl_kelas.id_guru')
            ->get()->getRowArray();
    }
    public function jumlahAktif()
    {
        return $this->db->table('tbl_siswa')
            // ->join('tbl_ta', 'tbl_ta.id_ta = tbl_siswa.id_ta', 'left')
            ->where('status_daftar', '3')
            // ->where('status', '1')
            ->countAllResults();
    }

    public function jumlahNonAktif()
    {
        return $this->db->table('tbl_siswa')
            ->where('status_daftar', '2')
            ->countAllResults();
    }



    public function jml_baru()
    {
        return $this->db->table('tbl_siswa')
            // ->join('tbl_ta', 'tbl_ta.id_ta = tbl_siswa.id_ta', 'left')
            ->where('status_daftar', '2')
            // ->where('status', '1')
            ->countAllResults();
    }


    public function rekamdidik($nisn)
    {
        return $this->db->table('tbl_database')
            // ->join('tbl_siswa', 'tbl_siswa.nisn = tbl_database.nisn', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_database.id_ta', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_database.id_kelas', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->where('tbl_database.nisn_siswa', $nisn)
            // ->where('status', '1')
            ->get()->getResultArray();
    }

    public function detail_data($nisn)
    {
        return $this->db->table('tbl_siswa')
            ->where('nisn', $nisn)
            ->get()->getRowArray();
    }

    public function naik()
    {

        return $this->db->table('tbl_siswa')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            ->where('aktif', '1')
            ->where('tbl_siswa.status_daftar', '3')
            ->get()
            ->getResultArray();
    }
    public function lulus()
    {

        return $this->db->table('tbl_siswa')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            ->where('tbl_siswa.id_tingkat', '3')
            ->where('tbl_siswa.status_daftar', '3')
            ->get()
            ->getResultArray();
    }

    public function permohonan($nisn)
    {
        return $this->db->table('tbl_siswa')

            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            ->join('provinsi', 'provinsi.id_provinsi = tbl_siswa.provinsi', 'left')
            ->join('kabupaten', 'kabupaten.id_kabupaten = tbl_siswa.kabupaten', 'left')
            ->join('kecamatan', 'kecamatan.id_kecamatan = tbl_siswa.kecamatan', 'left')
            ->join('desa', 'desa.id_desa = tbl_siswa.desa', 'left')
            ->where('tbl_siswa.nisn', $nisn)
            ->get()->getRowArray();
    }
}














// class ModelPeserta extends Model
// {
//     

//     
// }
