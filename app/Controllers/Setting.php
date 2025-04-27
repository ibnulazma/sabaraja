<?php

namespace App\Controllers;

use App\Models\ModelSetting;



use App\Controllers\BaseController;

class Setting extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelSetting = new ModelSetting();
    }


    public function index()
    {
        $profile = $this->ModelSetting->Profile();
        $data = [
            'title'     => 'SIAKADINKA',
            'subtitle'  => 'Profile Sekolah',
            'menu'      => 'setting',
            'submenu'   => 'profil',
            // 'profil' => $this->ModelSetting->Profile($profile['id_profile']),
        ];

        return view('admin/setting/profile', $data);
    }
    public function user()
    {

        $alphanumeric = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        // $arr = array();
        $lenght = strlen($alphanumeric) - 2;
        for ($i = 0; $i < 5; $i++) {
            $x = rand(0, $lenght);
            $arr[] = $alphanumeric[$x];
        }
        $data = [
            'title'     => 'SIAKADINKA',
            'subtitle'  => 'User',
            'menu'      => 'setting',
            'submenu'   => 'user',
            'user' => $this->ModelSetting->user(),
            'randompass' => $arr
        ];

        return view('admin/setting/user', $data);
    }


    public function add()
    {
        if ($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!!!'
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!!!',
                    'valid_email' => 'Harus format email'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!!!'
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/gif,image/jpeg,image/ico]',
                'errors' => [
                    'uploaded' => '{field} Wajib Di Isi !!!!',
                    'max_size' => '{field} Max 1024 KB !!!!',
                    'mime_in' => 'Format {field} Harus PNG, JPG, JPEG, GIF, ICO !!!!'
                ]
            ],
        ])) {

            //masukan foto ke input
            $foto = $this->request->getFile('foto');

            //merename 
            $nama_file = $foto->getRandomName();
            //jika valid

            $data = array(
                'nama_user' => $this->request->getPost('nama_user'),
                'username'     => $this->request->getPost('username'),
                'password'  => $this->request->getPost('password'),
                'foto'      => $nama_file,
            );

            $foto->move('foto', $nama_file);
            $this->ModelUser->add($data);
            session()->setFlashdata('pesan', 'User Berhasil Ditambah !!!');
            return redirect()->to(base_url('user'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user'));
        }
    }

    public function edit($id_user)
    {
        if ($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!!!'
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!!!'
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/gif,image/jpeg,image/ico]',
                'errors' => [
                    'max_size' => '{field} Max 1024 KB !!!!',
                    'mime_in' => 'Format {field} Harus PNG, JPG, JPEG, GIF, ICO !!!!'
                ]
            ],
        ])) {

            //masukan foto ke input
            $foto = $this->request->getFile('foto');
            if ($foto->getError() == 4) {

                $data = array(
                    'id_user'   => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'username'  => $this->request->getPost('username'),
                    'password'  => $this->request->getPost('password'),
                );
                $this->ModelUser->edit($data);
            } else {

                //menghapus fotolama
                $user = $this->ModelUser->detail_data($id_user);
                if ($user['foto'] != "") {
                    unlink('foto/' . $user['foto']);
                }
                //merename
                $nama_file = $foto->getRandomName();
                //jika valid
                $data = array(
                    'id_user'   => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'username'  => $this->request->getPost('username'),
                    'password'  => $this->request->getPost('password'),
                    'foto'      => $nama_file,
                );
                $foto->move('foto', $nama_file);
                $this->ModelUser->edit($data);
            }
            session()->setFlashdata('pesan', 'Usr Berhasil Diubah !!!');
            return redirect()->to(base_url('user'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user'));
        }
    }

    public function delete($id_user)
    {
        $user = $this->ModelUser->detail_data($id_user);
        if ($user['foto'] != "") {
            unlink('foto/' . $user['foto']);
        }
        $data = [
            'id_user' => $id_user,
        ];
        $this->ModelUser->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to(base_url('user'));
    }

    public function editprofile()
    {
        $data = [
            'id_profile'      => $this->request->getPost('id_profile'),
            'nama_sekolah'    => $this->request->getPost('nama_sekolah'),
            'alamat'          => $this->request->getPost('alamat'),
            'npsn'            => $this->request->getPost('npsn'),
            'status'          => $this->request->getPost('status'),
            'email'           => $this->request->getPost('email'),
            'kepsek'          => $this->request->getPost('kepsek'),
        ];
        $this->ModelSetting->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('setting'));
    }
}
