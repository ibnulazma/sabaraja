<?php

namespace App\Controllers;

use App\Models\ModelAuth;

class Auth extends BaseController
{
    public function __construct()
    {

        helper('form');
        $this->ModelAuth = new ModelAuth();
    }
    public function index()
    { {
            $data = [
                'title' => 'SIAKADINKA',
                'subtitle' => 'Halaman Login',
                'validation'    =>  \Config\Services::validation(),

            ];

            return view('v_login', $data);
        }
    }


    public function ceklogin()
    {
        if ($this->validate(
            [
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]

                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
            ]
        )) {

            $username   = $this->request->getPost('username');
            $password   = $this->request->getPost('password');


            $ceksiswa = $this->ModelAuth->loginsiswa($username, $password);
            if ($ceksiswa) {
                session()->set('username', $ceksiswa['nisn']);
                session()->set('nama', $ceksiswa['nama_siswa']);
                // session()->set('foto', $ceksiswa['foto_siswa']);
                session()->set('level', '3');
                return redirect()->to(base_url('siswa'));
            } else {
                session()->setFlashdata('error', 'Username or Password is Wrong');
                return redirect()->to(base_url('auth'));
            }
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('/auth')->withInput()->with('validation', $validation);
        }
    }



    public function loginguru()
    { {
            $data = [
                'title' => 'SIAKADINKA',
                'subtitle' => 'Halaman Login',
                'validation'    =>  \Config\Services::validation(),

            ];

            return view('v_loginguru', $data);
        }
    }

    public function cekloginguru()
    {
        if ($this->validate(
            [
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]

                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
            ]
        )) {

            $username   = $this->request->getPost('username');
            $password   = $this->request->getPost('password');


            $cekguru = $this->ModelAuth->loginguru($username, $password);
            if ($cekguru) {

                session()->set('username', $cekguru['niy']);
                session()->set('nama', $cekguru['nama_guru']);
                // session()->set('foto', $cekguru['foto_siswa']);
                session()->set('level', '2');
                return redirect()->to(base_url('pendidik'));
            } else {
                session()->setFlashdata('error', 'Username or Password is Wrong');
                return redirect()->to(base_url('auth/loginguru'));
            }
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('/auth/loginguru')->withInput()->with('validation', $validation);
        }
    }
    public function loginadmin()
    { {
            $data = [
                'title' => 'SIAKADINKA',
                'subtitle' => 'Halaman Login',
                'validation'    =>  \Config\Services::validation(),

            ];

            return view('v_loginadmin', $data);
        }
    }

    public function cekloginadmin()
    {

        if ($this->validate(
            [
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]

                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]

                ],
            ]

        )) {
            $username   = $this->request->getPost('username');
            $password   = $this->request->getPost('password');


            $cekadmin = $this->ModelAuth->login($username, $password);
            if ($cekadmin) {

                session()->set('username', $cekadmin['username']);
                session()->set('nama', $cekadmin['nama_user']);
                session()->set('foto', $cekadmin['foto']);
                session()->set('level', '1');
            } else {
                session()->setFlashdata('error', 'Username or Password is Wrong');
                return redirect()->to(base_url('auth/loginadmin'));
            }
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('/auth/loginadmin')->withInput()->with('validation', $validation);
            // session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            // return redirect()->to(base_url('auth'));
        }
    }

    public function kelulusan()
    {
        session(); {
            $data = [
                'title' => 'SIAKADINKA',
                'subtitle' => 'Halaman Login',
                'validation'    =>  \Config\Services::validation(),

            ];

            return view('v_loginkelulusan', $data);
        }
    }

    public function ceklulus()
    {

        if ($this->validate(
            [
                'nisn_siswa' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Silahkan Masukkan NISN !!!'
                    ]

                ],

            ]
        )) {

            $username   = $this->request->getPost('nisn_siswa');



            $ceklulus = $this->ModelAuth->loginlulus($username);
            if ($ceklulus) {

                session()->set('nisn_siswa', $ceklulus['nisn_siswa']);
                session()->set('level', '4');

                return redirect()->to(base_url('kelulusan'));
            } else {
                session()->setFlashdata('error', 'NISN Tidak Ditemukan');
                return redirect()->to(base_url('auth/kelulusan'));
            }
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('auth/kelulusan')->withInput()->with('validation', $validation);
        }
    }






    public function logout()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('nama');
        session()->remove('foto');
        session()->remove('level');
        session()->setFlashdata('pesan', 'Thanks, Are You Logged Out!!');
        return redirect()->to(base_url('auth'));
    }
}
