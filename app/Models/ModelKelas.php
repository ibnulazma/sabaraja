<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKelas extends Model
{

    public function AllData()
    {
        return $this->db->table('tbl_kelas')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_kelas.id_ta', 'left')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_kelas.id_tingkat', 'left')
            ->orderBy('tbl_kelas.id_tingkat', 'ASC')
            ->where('tbl_ta.status', '1')
            ->get()
            ->getResultArray();
    }

    public function jumlahkelas()
    {
        return $this->db->table('tbl_kelas')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_kelas.id_ta', 'left')
            ->where('tbl_ta.status', '1')
            ->countAllResults();
    }


    public function AllGuru()
    {
        return $this->db->table('tbl_guru')
            ->get()
            ->getResultArray();
    }


    public function Tingkat()
    {
        return $this->db->table('tbl_tingkat')
            ->get()
            ->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_kelas')
            ->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_kelas')
            ->where('id_kelas', $data['id_kelas'])
            ->update($data);
    }
    public function delete_data($data)
    {
        $this->db->table('tbl_kelas')
            ->where('id_kelas', $data['id_kelas'])
            ->delete($data);
    }


    // DetailRombel

    public function detail($id_kelas)
    {
        return $this->db->table('tbl_kelas')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_kelas.id_ta', 'left')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_kelas.id_tingkat', 'left')
            ->where('id_kelas', $id_kelas)
            ->get()
            ->getRowArray();
    }

    // Data Siswa berdasarkan kelas
    public function datasiswa($id_kelas)
    {
        return $this->db->table('tbl_database')
            ->join('tbl_siswa', 'tbl_siswa.nisn = tbl_database.nisn_siswa')
            ->join('desa', 'desa.id_desa = tbl_siswa.desa', 'left')
            ->join('kecamatan', 'kecamatan.id_kecamatan = tbl_siswa.kecamatan', 'left')
            ->join('kabupaten', 'kabupaten.id_kabupaten = tbl_siswa.kabupaten', 'left')
            ->join('provinsi', 'provinsi.id_provinsi = tbl_siswa.provinsi', 'left')
            // ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_database.id_kelas')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_database.id_ta')
            ->orderBy('nama_siswa', 'ASC')
            ->where('tbl_database.id_kelas', $id_kelas)
            // ->where('tbl_ta.status', '1')
            // ->where('tbl_siswa.status_daftar', '3')
            ->get()
            ->getResultArray();
    }

    public function datanilai($id_kelas)
    {
        return $this->db->table('tbl_nilai')
            ->join('tbl_siswa', 'tbl_siswa.nisn = tbl_nilai.nisn')
            ->join('tbl_database', 'tbl_database.nisn_siswa = tbl_siswa.nisn')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_database.id_kelas')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru')
            ->orderBy('nama_siswa', 'ASC')
            ->where('tbl_database.id_kelas', $id_kelas)
            ->get()
            ->getResultArray();
    }

    public function kelas()
    {
        return $this->db->table('tbl_kelas')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_kelas.id_tingkat')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa = tbl_siswa.id_tingkat')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru')
            // ->where('tbl_tingkat.id_tingkat')
            ->orderBy('kelas', 'DESC')
            ->get()
            ->getResultArray();
    }



    // siswa yang belum dapet kelas
    public function siswablmpuna()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            ->where('status_daftar', '3')
            ->get()
            ->getResultArray();
    }
    // 


    public function jml_siswa($id_kelas)
    {
        return $this->db->table('tbl_database')
            ->join('tbl_siswa', 'tbl_siswa.nisn = tbl_database.nisn_siswa', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_database.id_kelas', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_database.id_ta', 'left')
            ->where('tbl_siswa.status_daftar', '3')
            ->where('tbl_ta.status', '1')
            ->where('tbl_database.id_kelas', $id_kelas)
            // ->where('jenis_kelamin', 'Laki-laki')
            ->countAllResults();
    }


    public function SiswaTingkat()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            ->get()
            ->getResultArray();
    }


    public function add_data($data)
    {


        $this->db->table('tbl_database')
            ->insert($data);
    }
    // public function add_data($data)
    // {
    //     $this->db->table('tbl_siswa')
    //         ->where('id_siswa', $data['id_siswa'])
    //         ->update($data);
    // }

    public function hapus($data)
    {
        $this->db->table('tbl_database')
            ->where('nisn', $data['nisn'])
            ->delete($data);
    }

    ////////JADWAL PERKELAS

    public function JadwalKelas($id_kelas)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_jadwal.id_mapel', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_jadwal.id_tingkat', 'left')
            ->where('tbl_jadwal.id_kelas', $id_kelas)
            ->get()
            ->getResultArray();
    }

    public function DataPeserta($nisn)
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_siswa', 'tbl_siswa.nisn = tbl_database.nisn_siswa', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_siswa.id_ta', 'left')
            ->join('desa', 'desa.id_desa = tbl_siswa.desa', 'left')
            ->join('provinsi', 'provinsi.id_provinsi = tbl_siswa.provinsi', 'left')
            ->join('kecamatan', 'kecamatan.id_kecamatan = tbl_siswa.kecamatan', 'left')
            ->join('kabupaten', 'kabupaten.id_kabupaten = tbl_siswa.kabupaten', 'left')
            ->where('nisn', $nisn)
            ->get()->getRowArray();
    }


    public function BukuInduk($id_siswa)
    {
        return $this->db->table('tbl_siswa')
            ->join('provinsi', 'provinsi.id_provinsi = tbl_siswa.provinsi')
            ->join('kabupaten', 'kabupaten.id_kabupaten = tbl_siswa.kabupaten')
            ->join('kecamatan', 'kecamatan.id_kecamatan = tbl_siswa.kecamatan')
            ->join('desa', 'desa.id_desa = tbl_siswa.desa')
            ->where('id_siswa', $id_siswa)
            ->get()->getRowArray();
    }

    public function kelas_grup()
    {
        $builder = $this->db->table('tbl_database');
        $builder->join('tbl_siswa', 'tbl_siswa.nisn = tbl_database.nisn_siswa', 'left');
        $builder->join('tbl_ta', 'tbl_ta.id_ta = tbl_database.id_ta', 'left');
        $builder->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_database.id_kelas', 'left');
        $builder->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left');
        $builder->select('kelas, COUNT("kelas") AS jumlah');
        $builder->select('nama_guru');
        // $bulider->count('jenis_kelamin ,'L') as JUMLAH_L
        // $builder->select('jenis_kelamin, COUNT("L") AS L');
        // $builder->select('jenis_kelamin, COUNT("jenis_kelamin") AS jkP');
        $builder->where('tbl_ta.status', '1');
        $builder->where('tbl_siswa.status_daftar', '3');
        $builder->groupBy('kelas');
        $query = $builder->get();

        return $query;
    }



    public function halamansiswa($nisn)
    {
        return $this->db->table('tbl_database')
            ->join('tbl_siswa', 'tbl_siswa.nisn = tbl_database.nisn_siswa', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_database.id_kelas', 'left')
            ->join('desa', 'desa.id_desa = tbl_siswa.desa', 'left')
            ->join('provinsi', 'provinsi.id_provinsi = tbl_siswa.provinsi', 'left')
            ->join('kecamatan', 'kecamatan.id_kecamatan = tbl_siswa.kecamatan', 'left')
            ->join('kabupaten', 'kabupaten.id_kabupaten = tbl_siswa.kabupaten', 'left')
            ->where('tbl_siswa.nisn', $nisn)
            ->get()->getRowArray();
    }




    // public function group_tahun()
    // {
    //     $builder = $this->db->table('tbl_siswa');
    //     $builder->join('tbl_ta', 'tbl_ta.id_ta = tbl_siswa.id_ta', 'left');
    //     $builder->select('ta, COUNT("ta") AS jumlah');
    //     $builder->where('status', '1');
    //     $builder->groupBy('ta');
    //     $query = $builder->get();
    //     return $query;
    // }
}
