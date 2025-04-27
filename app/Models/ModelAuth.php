<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    public function login($username, $password)
    {
        return $this->db->table('tbl_user')
            ->where([
                'username' => $username,
                'password' => $password,

            ])->get()->getRowArray();
    }
    // public function login($username, $password)
    // {
    //     return $this->db->table('tbl_user')
    //         ->where([
    //             'username' => $username,
    //             'password' => $password,

    //         ])->get()->getRowArray();
    // }
    public function loginsiswa($username, $password)
    {
        return $this->db->table('tbl_siswa')
            ->where([
                'nisn' => $username,
                'password' => $password,
                'aktif' => 1,
            ])->get()->getRowArray();
    }

    public function loginguru($username, $password)
    {
        return $this->db->table('tbl_guru')
            ->where([
                'niy' => $username,
                'password' => $password,
                'status_aktif' => 1,
            ])->get()->getRowArray();
    }
}
