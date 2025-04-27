<?php

namespace App\Controllers;

use App\Models\ModelUser;

class User extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelUser = new ModelUser();
    }
    public function index()
    {
        $data = [
            'title' => 'SIAKADINKA',
            'subtitle' => 'User',
            'menu' => 'setting',
            'submenu' => 'setting',
            'user'  => $this->ModelUser->AllData(),
            'isi'   => 'admin/v_user'

        ];
        return view('admin/v_user', $data);
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
                'rules' => 'uploaded[foto]|max_size[foto,2024]|mime_in[foto,image/png,image/jpg,image/gif,image/jpeg,image/ico]',
                'errors' => [
                    'uploaded' => '{field} Wajib Di Isi !!!!',
                    'max_size' => '{field} Max 2024 KB !!!!',
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
                'level'      => $this->request->getPost('level'),
            );

            $foto->move('foto_user', $nama_file);
            $this->ModelUser->add($data);
            session()->setFlashdata('pesan', 'User Berhasil Ditambah !!!');
            return redirect()->to(base_url('setting/user'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('setting/user'));
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
                );
                $this->ModelUser->edit($data);
            } else {

                //menghapus fotolama
                $user = $this->ModelUser->detail_data($id_user);
                if ($user['foto'] != "") {
                    unlink('foto_user/' . $user['foto']);
                }
                //merename
                $nama_file = $foto->getRandomName();
                //jika valid
                $data = array(
                    'id_user'   => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'username'  => $this->request->getPost('username'),
                    'foto'      => $nama_file,
                );
                $foto->move('foto_user', $nama_file);
                $this->ModelUser->edit($data);
            }
            session()->setFlashdata('pesan', 'Usr Berhasil Diubah !!!');
            return redirect()->to(base_url('setting/user'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('setting/user'));
        }
    }

    public function delete($id_user)
    {
        $user = $this->ModelUser->detail_data($id_user);
        if ($user['foto'] != "") {
            unlink('foto_user/' . $user['foto']);
        }
        $data = [
            'id_user' => $id_user,
        ];
        $this->ModelUser->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to(base_url('setting/user'));
    }
}
