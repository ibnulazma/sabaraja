<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSiswa extends Model
{
    public function DataSiswa()
    {
        return $this->db->table('tbl_siswa')
            // ->join('tbl_database', 'tbl_database.nisn_siswa_siswa = tbl_siswa.nisn', 'left')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            // ->join('tbl_ta', 'tbl_ta.id_ta = tbl_database.id_ta', 'left')
            // ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_database.id_kelas_baru', 'left')
            // ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->join('provinsi', 'provinsi.id_provinsi = tbl_siswa.provinsi', 'left')
            ->join('kabupaten', 'kabupaten.id_kabupaten = tbl_siswa.kabupaten', 'left')
            ->join('kecamatan', 'kecamatan.id_kecamatan = tbl_siswa.kecamatan', 'left')
            ->join('desa', 'desa.id_desa = tbl_siswa.desa', 'left')
            ->where('tbl_siswa.nisn', session()->get('username'))
            // ->where('tbl_ta.status', '1')
            ->get()->getRowArray();
    }
    public function Dataguru()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            ->join('tbl_database', 'tbl_database.nisn_siswa = tbl_siswa.nisn', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_database.id_ta', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_database.id_kelas_baru', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->where('tbl_ta.status', '1')
            ->get()->getRowArray();
    }

    public function rekamdidik($nisn)
    {
        return $this->db->table('tbl_database')
            // ->join('tbl_siswa', 'tbl_siswa.nisn = tbl_database.nisn_siswa', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_database.id_ta', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_database.id_kelas_baru', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->where('tbl_database.nisn_siswa', $nisn)
            // ->where('status', '1')
            ->get()->getResultArray();
    }
    public function datakelas($nisn)
    {
        return $this->db->table('tbl_kelas')
            ->join('tbl_siswa', 'tbl_siswa.nisn = tbl_database.nisn_siswa', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_database.id_ta', 'left')
            ->join('tbl_database', 'tbl_database.id_kelas_baru = tbl_kelas.id_kelas', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->where('tbl_database.nisn_siswa', $nisn)
            ->where('tbl_ta.status', '1')
            ->get()->getRowArray();
    }

    public function detail_data($id_siswa)
    {
        return $this->db->table('tbl_siswa')
            ->where('id_siswa', $id_siswa)
            ->get()->getRowArray();
    }




    public function Profile()
    {
        return $this->db->table('tbl_siswa')
            // ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
            // ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->where('id_siswa')
            ->get()->getRowArray();
    }

    public function DataProfile($id_siswa)
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->where('id_siswa', $id_siswa)
            ->get()->getRowArray();
    }
    public function SiswaEdit($id_siswa)
    {
        return $this->db->table('tbl_siswa')
            ->where('id_siswa', $id_siswa)
            ->get()->getRowArray();
    }

    public function edit($data)
    {
        $this->db->table('tbl_siswa')
            ->where('id_siswa', $data['id_siswa'])
            ->update($data);
    }



    public function reset($data)
    {
        $this->db->table('tbl_siswa')
            ->where('id_siswa', $data['id_siswa'])
            ->update($data);
    }

    //PerTingkat
    public function Jadwal($id_kelas)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_jadwal.id_mapel', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
            // ->join('tbl_siswa', 'tbl_siswa.id_siswa = tbl_jadwal.id_kelas', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
            ->where('tbl_jadwal.id_kelas', $id_kelas)
            ->get()->getResultArray();
    }

    public function AmbilMapel($id_mapel)
    {
        return $this->db->table('tbl_mapel')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_mapel.id_guru', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_mapel.id_kelas', 'left')
            ->where('tbl_mapel.id_kelas', $id_mapel)
            ->get()->getResultArray();
    }


    public function TambahJadwal($data)
    {
        $this->db->table('tbl_absen')

            ->insert($data);
    }

    public function DataAbsen($id_siswa)
    {
        return $this->db->table('tbl_absen')
            ->join('tbl_jadwal', 'tbl_jadwal.id_jadwal = tbl_absen.id_jadwal', 'left')
            ->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_jadwal.id_mapel', 'left')
            ->where('id_siswa', $id_siswa)
            ->get()->getResultArray();
    }


    public function Daftarnilai($nisn)
    {
        return $this->db->table('tbl_nilai')
            ->join('tbl_siswa', 'tbl_siswa.nisn = tbl_nilai.nisn', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_nilai.id_ta', 'left')
            ->where('tbl_siswa.nisn', $nisn)
            ->where('tbl_ta.status', '1')
            ->get()->getResultArray();
    }


    // public function DaftaNila($id_siswa)
    // {
    //     return $this->db->table('tbl_nilai')

    //         ->join('tbl_siswa', 'tbl_siswa.id_nisn = tbl_nilai.nisn', 'left')
    //         ->join('tbl_', 'tbl_siswa.id_siswa = tbl_nilai.nisn', 'left')
    //         ->where('tbl_siswa.id_siswa', $id_siswa)
    //         ->get()->getResultArray();
    // }

    public function Siswa()
    {
        return $this->db->table('tbl_siswa')
            ->where('nisn', session()->get('username'))
            ->get()->getRowArray();
    }


    public function mutasi($id_siswa)
    {
        return $this->db->table('tbl_mutasi')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa = tbl_mutasi.id_siswa', 'left')
            ->where('tbl_siswa.id_siswa', $id_siswa)
            ->get()->getResultArray();
    }
    public function status_mutasi($nisn)
    {
        return $this->db->table('tbl_mutasi')
            ->join('tbl_siswa', 'tbl_siswa.nisn = tbl_mutasi.nisn', 'left')
            ->where('tbl_siswa.nisn', $nisn)
            ->get()->getResultArray();
    }

    public function pengajuan()
    {
        return $this->db->table('tbl_mutasi')
            ->where('id_mutasi')
            ->get()->getRowArray();
    }

    public function insertpengajuan($data)
    {
        $this->db->table('tbl_mutasi')
            ->insert($data);
    }
}
