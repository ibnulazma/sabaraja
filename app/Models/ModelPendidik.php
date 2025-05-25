<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPendidik extends Model
{
    public function DataGuru()
    {
        return $this->db->table('tbl_guru')
            ->join('tbl_kelas', 'tbl_kelas.id_guru = tbl_guru.id_guru', 'left')
            ->where('niy', session()->get('username'))
            ->get()->getRowArray();
    }

    public function profile($niy)
    {
        return $this->db->table('tbl_guru')
            ->where('id_guru', $niy)
            ->get()->getRowArray();
    }
    public function add_didik($data)
    {
        $this->db->table('tambah_pendidikan')
            ->where('id_nilai', $data['id_nilai'])
            ->update($data);
    }

    public function adddidik($data)
    {
        $this->db->table('tambah_pendidikan')
            ->insert($data);
    }
    public function addkeluarga($data)
    {
        $this->db->table('tambah_keluarga')
            ->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_guru')
            ->where('niy', $data['niy'])
            ->update($data);
    }



    public function Jadwal($id_guru)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_jadwal.id_mapel', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
            ->where('tbl_jadwal.id_guru', $id_guru)
            ->get()->getResultArray();
    }

    public function Datajenjang($id_guru)
    {
        return $this->db->table('tambah_pendidikan')
            ->join('tbl_guru', 'tbl_guru.id_guru = tambah_pendidikan.id_guru', 'left')
            ->where('tambah_pendidikan.id_guru', $id_guru)
            ->get()->getResultArray();
    }

    public function Datakeluarga($id_guru)
    {
        return $this->db->table('tambah_keluarga')
            ->join('tbl_guru', 'tbl_guru.id_guru = tambah_keluarga.id_guru', 'left')
            ->where('tambah_keluarga.id_guru', $id_guru)
            ->get()->getResultArray();
    }


    public function walas($id_guru)
    {
        return $this->db->table('tbl_siswa')

            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_siswa.id_ta')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru')
            ->where('tbl_kelas.id_guru', $id_guru)
            ->where('tbl_ta.status', '1')

            ->get()->getResultArray();
    }

    // public function mutasi($id_guru)
    // {
    //     return $this->db->table('tbl_mutasi')
    //         ->join('tbl_siswa', 'tbl_siswa.id_siswa = tbl_mutasi.id_siswa')
    //         ->join('tbl_database', 'tbl_database.nisn = tbl_siswa.nisn')
    //         ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_database.id_kelas')
    //         ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru')
    //         ->where('tbl_mutasi.status_mutasi', '1')
    //         ->where('tbl_kelas.id_guru', $id_guru)
    //         ->get()->getResultArray();
    // }


    public function Mapel($id_guru)
    {
        return $this->db->table('tbl_mapel')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_mapel.id_guru', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_mapel.id_kelas', 'left')
            ->where('tbl_mapel.id_guru', $id_guru)
            ->get()->getResultArray();
    }



    public function Kelas($id_mapel)
    {
        return $this->db->table('tbl_absen')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa = tbl_absen.id_siswa', 'left')
            // ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
            ->where('tbl_absen.id_mapel', $id_mapel)
            ->get()->getResultArray();
    }


    public function addsiswa()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->where('tbl_siswa.id_kelas')
            ->get()->getResultArray();
    }


    public function nilaikelas($id_guru)
    {
        return $this->db->table('tbl_nilai')
            ->join('tbl_siswa', 'tbl_siswa.nisn = tbl_nilai.nisn', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_database.id_kelas', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_nilai.id_ta', 'left')
            // ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            // // ->where('tbl_siswa.status_daftar', '3')
            // ->where('tbl_ta.status', '1')
            ->where('tbl_kelas.id_guru', $id_guru)
            ->get()->getResultArray();
    }

    public function tambahanggota($data)
    {
        $this->db->table('tbl_nilai')

            ->insert($data);
    }
}
