<?php

namespace App\Controllers;

use App\Models\ModelAuth;

class Loginsiswa extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelAuth = new ModelAuth();
    }
    public function index()
    { {
            $data = [
                'title' => 'Login Siswa| SIAKAD SMP INKA',
                'validation'    =>  \Config\Services::validation(),
            ];

            return view('v_login-siswa', $data);
        }
    }


    public function ceklogin()
    {

        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!!!',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!!!'
                ]
            ],

        ])) {

            $nisn = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek_login = $this->ModelAuth->loginsiswa($nisn, $password);
            if ($cek_login) {
                session()->set('username', $cek_login['nisn']);
                session()->set('nama', $cek_login['nama_siswa']);
                session()->set('level', 'siswa');
                return redirect()->to(base_url('siswa'));
            } else {
                session()->setFlashdata('pesan', 'Username atau password salah');
                return redirect()->to(base_url('loginsiswa'));
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('loginsiswa'));
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('nama');
        session()->remove('level');

        return redirect()->to(base_url('home'));
    }
}
