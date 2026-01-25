<?php

namespace App\Controllers;

use App\Models\ModelSiswa;
use App\Models\ModelPendidik;
use App\Models\ModelAdmin;

class Auth extends BaseController
{
    protected $ModelSiswa;
    protected $ModelPendidik;
    protected $ModelAdmin;

    public function __construct()
    {
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelPendidik  = new ModelPendidik();
        $this->ModelAdmin = new ModelAdmin();
        helper('form');
    }

    // ================= LOGIN SISWA & Pendidik =================
    public function index()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('auth/login_user', $data);
    }

    public function loginUser()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // CEK SISWA
        $siswa = $this->ModelSiswa->where('nisn', $username)->first();
        if ($siswa && password_verify($password, $siswa['password'])) {
            session()->set([
                'id_user' => $siswa['id_siswa'],
                'nama' => $siswa['nama_siswa'],
                'username'  => $siswa['nisn'], // 🔥 WAJIB ADA
                'level' => '3',
                'logged_in' => true
            ]);
            return redirect()->to('/siswa');
        }

        // CEK Pendidik
        $guru = $this->ModelPendidik->where('niy', $username)->first();
        if ($guru && password_verify($password, $guru['password'])) {
            session()->set([
                'id_user' => $guru['id_guru'],
                'nama' => $guru['nama_guru'],
                'level' => '2',
                'logged_in' => true
            ]);
            return redirect()->to('/pendidik');
        }

        return redirect()->back()->withInput()->with('error', 'Username atau Password salah');
    }


    // ================= LOGIN ADMIN =================
    public function loginAdminPage()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('auth/login_admin', $data);
    }

    public function loginAdmin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $admin = $this->ModelAdmin->where('username', $username)->first();

        if ($admin && password_verify($password, $admin['password'])) {
            session()->set([
                'id_user' => $admin['id_user'],
                'nama'    => $admin['nama_user'],
                'level'   => '1',
                'logged_in' => true
            ]);
            return redirect()->to('/admin');
        }

        return redirect()->back()->with('error', 'Login Admin gagal');
    }

    // ================= LOGOUT =================
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth');
    }
}
