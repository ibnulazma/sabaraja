<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelNilai extends Model
{
    public function DataKelas($kelas)
    {
        return $this->db->table('tbl_database')
            ->join('tbl_siswa', 'tbl_siswa.nisn = tbl_database.nisn', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_database.id_ta', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_database.id_kelas', 'left')
            ->where('tbl_kelas.kelas', $kelas)
            ->where('tbl_ta.status', '1')
            ->where('tbl_siswa.status_daftar', '3')
            ->get()
            ->getResultArray();
    }
    public function Mapel($id_guru)
    {
        return $this->db->table('tbl_mapel')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_mapel.id_guru', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_mapel.id_kelas', 'left')
            ->where('tbl_mapel.id_guru', $id_guru)
            ->get()->getResultArray();
    }


    // public function Kelas($id_mapel)
    // {
    //     return $this->db->table('tbl_id_mapel')
    //         ->join('tbl_siswa', 'tbl_siswa.id_siswa = tbl_absen.id_siswa', 'left')
    //         // ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
    //         ->where('tbl_absen.id_mapel', $id_mapel)
    //         ->where('tbl_siswa.status_daftar', '3')
    //         ->get()->getResultArray();
    // }


    public function nilaikelas($id_kelas)
    {
        return $this->db->table('tbl_nilai')
            ->select('
           tbl_siswa.id_siswa,
                tbl_siswa.nisn,
                tbl_siswa.nama_siswa,
                
                
             IFNULL(PAI,0) AS pai,
            IFNULL(PKN,0) AS pkn,
            IFNULL(`indo`,0) AS indo,
            IFNULL(`inggris`,0) AS inggris,
            IFNULL(`MTK`,0) AS mtk,
            IFNULL(`IPA`,0) AS ipa,
            IFNULL(`IPS`,0) AS ips,
            IFNULL(`SBK`,0) AS sbk,
            IFNULL(`PJOK`,0) AS pjok,
            IFNULL(`TIK`,0) AS tik,
            IFNULL(`TJWD`,0) AS tjwd,
            IFNULL(`BTQ`,0) AS btq,
            IFNULL(`FIQIH`,0) AS fiqih,
            IFNULL(`TRJMH`,0) AS trjmh,
            IFNULL(`MHD`,0) AS mhd,
            IFNULL(`PRKY`,0) AS prky,

            (IFNULL(PAI,0) + IFNULL(PKN,0) + IFNULL(`indo`,0)+ IFNULL(`inggris`,0)+ IFNULL(`MTK`,0)
            + IFNULL(`IPA`,0)+ IFNULL(`IPS`,0)+ IFNULL(`SBK`,0)+ IFNULL(`PJOK`,0)+ IFNULL(`TIK`,0)+ IFNULL(`PRKY`,0)+ IFNULL(`TJWD`,0)+ IFNULL(`BTQ`,0)+ IFNULL(`FIQIH`,0)+IFNULL(`TRJMH`,0)+ IFNULL(`MHD`,0)) AS total_nilai,
        ')
            ->join('tbl_siswa', 'tbl_siswa.nisn = tbl_nilai.nisn')
            ->join('tbl_database', 'tbl_database.id_siswa = tbl_siswa.id_siswa')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_database.id_kelas')
            ->where('tbl_database.id_kelas', $id_kelas)
            ->groupBy('tbl_siswa.nisn')
            ->orderBy('tbl_siswa.nama_siswa', 'ASC')
            ->get()
            ->getResultArray();
    }
    // public function nilaimapel($id_guru)
    // {
    //     return $this->db->table('tbl_nilai')
    //         ->join('tbl_database', 'tbl_database.nisn = tbl_nilai.nisn', 'left')
    //         ->join('tbl_siswa', 'tbl_siswa.nisn = tbl_database.nisn', 'left')
    //         ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
    //         ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
    //         ->where('tbl_siswa.status_daftar', '3')
    //         ->where('tbl_kelas.id_guru', $id_guru)
    //         ->get()->getResultArray();
    // }


    public function nilaisiswa($nisn)
    {
        return $this->db->table('tbl_nilai')
            ->join('tbl_database', 'tbl_database.nisn = tbl_nilai.nisn', 'left')
            ->join('tbl_siswa', 'tbl_siswa.nisn = tbl_database.nisn', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_database.id_kelas', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_nilai.id_ta', 'left')
            // ->where('tbl_siswa.status_daftar', '3')
            ->where('tbl_siswa.nisn', $nisn)
            ->where('tbl_ta.status', '1')
            ->get()->getRowArray();
    }



    public function cekdata($nisn)
    {
        return $this->db->table('tbl_nisn')
            ->where('nisn', $nisn)
            ->get()->getRowArray();
    }

    public function addnilai($data)
    {
        $this->db->table('tbl_nisn')
            ->insert($data);
    }
}
