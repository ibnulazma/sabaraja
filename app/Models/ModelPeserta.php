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
            // ->where('tbl_ta.status', '1')
            ->where('aktif', '1')
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

    public function blmaktif()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_siswa.id_ta', 'left')
            ->where('status_daftar', '1')
            ->where('aktif', '1')
            ->get()
            ->getResultArray();
    }


    public function DataPeserta($id_siswa)
    {
        return $this->db->table('tbl_siswa')

            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_siswa.id_ta', 'left')

            // ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
            // ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
            // ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->join('provinsi', 'provinsi.id_provinsi = tbl_siswa.provinsi', 'left')
            ->join('kabupaten', 'kabupaten.id_kabupaten = tbl_siswa.kabupaten', 'left')
            ->join('kecamatan', 'kecamatan.id_kecamatan = tbl_siswa.kecamatan', 'left')
            ->join('desa', 'desa.id_desa = tbl_siswa.desa', 'left')
            ->where('tbl_siswa.id_siswa', $id_siswa)
            ->get()->getRowArray();
    }



    public function linkwa($id_siswa)
    {
        return $this->db->table('tbl_siswa')

            ->join('tbl_database', 'tbl_database.id_siswa = tbl_siswa.id_siswa', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_database.id_kelas', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_kelas.id_ta', 'left')
            ->where('tbl_siswa.id_siswa', $id_siswa)
            ->where('tbl_ta.status', '1')
            ->get()
            ->getRowArray();
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
            ->where('id_siswa', $data['id_siswa'])
            ->update($data);
    }
    public function editortu($data)
    {
        $this->db->table('tbl_siswa')
            ->where('id_siswa', $data['id_siswa'])
            ->update($data);
    }
    public function editalamat($data)
    {
        $this->db->table('tbl_siswa')
            ->where('id_siswa', $data['id_siswa'])
            ->update($data);
    }
    public function editorangtua($data)
    {
        $this->db->table('tbl_siswa')
            ->where('id_siswa', $data['id_siswa'])
            ->update($data);
    }
    public function editregister($data)
    {
        $this->db->table('tbl_siswa')
            ->where('id_siswa', $data['id_siswa'])
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
            ->orderBy('kelas', 'ASC')
            ->get()
            ->getResultArray();
    }



    public function cekdata($nisn)
    {
        return $this->db->table('tbl_siswa')
            ->where('nisn', $nisn)->get()->getRowArray();
    }

    public function datakelas()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.tingkat', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_tingkat = tbl_tingkat.id_kelas', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_database.id_ta', 'left')
            // ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->where('tbl_database.nisn_siswa')
            ->where('tbl_ta.status', '1')
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


    public function rekamdidik($id_siswa)
    {
        return $this->db->table('tbl_database')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa = tbl_database.id_siswa', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_database.id_ta', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_database.id_kelas', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->where('tbl_database.id_siswa', $id_siswa)
            ->get()->getResultArray();
    }



    // public function rekamdidik($nisn)
    // {
    //     $query = $this->db->table('tbl_database')
    //         ->where('tbl_database.nisn_siswa', $nisn)
    //         ->get();

    //     dd($this->db->getLastQuery()->getQuery());
    // }










    public function kelas_persiswa($nisn)
    {
        return $this->db->table('tbl_database')
            ->join('tbl_siswa', 'tbl_siswa.nisn = tbl_database.nisn_siswa', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_database.id_ta', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_database.id_kelas', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->where('tbl_database.nisn_siswa', $nisn)
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
    public function koreksi()
    {
        return $this->db->table('tbl_siswa')
            ->where('status_daftar', '2')
            ->countAllResults();
    }




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














// class ModelPeserta extends Model
// {
//     

//     
// }
