<?php

namespace App\Controllers;

use App\Models\ModelSetting;
use App\Models\ModelMaintenance;
use App\Models\ModelPeserta;
use App\Models\ModelGuru;
use App\Models\ModelUser;



use App\Controllers\BaseController;

class Setting extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelSetting = new ModelSetting();
        $this->ModelMaintenance = new ModelMaintenance();
        $this->ModelPeserta = new ModelPeserta();
        $this->ModelGuru = new ModelGuru();
        $this->ModelUser = new ModelUser();
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
    public function profile()
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

    public function editprofile($id_profil)
    {
        $data = [
            'id_profile'      => $id_profil,
            'nama_sekolah'    => $this->request->getPost('nama_sekolah'),
            'alamat'          => $this->request->getPost('alamat'),
            'npsn'            => $this->request->getPost('npsn'),
            'status'          => $this->request->getPost('status'),
            'email'           => $this->request->getPost('email'),
            'kepsek'          => $this->request->getPost('kepsek'),
        ];
        $this->ModelSetting->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('admin/setting'));
    }

    //=============SettingProfile


    // MAINTENANCE, RESET PASSWORD

    public function resetuser()
    {
        session();

        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Add Siswa',
            'menu'              => 'maintenance',
            'submenu'           => 'maintenance',
            'siswa'       => $this->ModelPeserta->aktif(),
            'guru'       => $this->ModelGuru->AllData(),
            'user'      => $this->ModelUser->AllData()



        ];
        return view('admin/setting/resetuser', $data);
    }

    public function toggleMaintenance()
    {
        $settingsModel = new ModelMaintenance();
        $current = $settingsModel->getMaintenance();

        $newStatus = ($current['value'] == '1') ? '0' : '1';
        $settingsModel->setMaintenance($newStatus);

        return redirect()->back()->with('success', 'Status maintenance berhasil diubah');
    }



    public function resetPasswordSiswa()
    {
        if (session()->get('level') != 1) {
            return $this->response->setJSON(['status' => 'forbidden']);
        }

        $offset = (int)$this->request->getPost('offset');

        $db = \Config\Database::connect();
        $builder = $db->table('tbl_siswa');

        $total = $builder->countAll();

        $steps = 20;

        if ($total <= 20) {
            $limit = 1; // biar progress tetap kelihatan jalan
        } else {
            $limit = ceil($total / $steps);
        }

        $data = $builder->select('id_siswa, nisn')
            ->limit($limit, $offset)
            ->get()->getResultArray();

        $updated = 0;

        foreach ($data as $row) {
            $pass = !empty(trim($row['nisn'])) ? trim($row['nisn']) : 'Kamil123';

            $builder->where('id_siswa', $row['id_siswa'])->update([
                'password' => password_hash($pass, PASSWORD_DEFAULT),
                'password_default' => 1
            ]);

            $updated++;
        }

        return $this->response->setJSON([
            'status' => 'ok',
            'updated' => $updated,
            'next' => $offset + $limit,
            'total' => $total,
            'csrf' => csrf_hash()
        ]);
    }



    public function resetPasswordGuru()
    {
        if (session()->get('level') != 1) {
            return $this->response->setJSON(['status' => 'forbidden']);
        }

        $offset = (int) $this->request->getPost('offset');
        $db = \Config\Database::connect();

        // Builder khusus hitung total
        $total = $db->table('tbl_guru')->countAllResults();

        $steps = 20;
        $limit = ($total <= $steps) ? 1 : ceil($total / $steps);

        // Builder khusus ambil data
        $data = $db->table('tbl_guru')
            ->select('id_guru, nik_guru')
            ->orderBy('id_guru', 'ASC') // WAJIB biar batch konsisten
            ->limit($limit, $offset)
            ->get()
            ->getResultArray();

        foreach ($data as $row) {
            $pass = trim($row['nik_guru']) ?: 'Kamil123';

            // Builder BARU untuk update (jangan pakai builder select!)
            $db->table('tbl_guru')
                ->where('id_guru', $row['id_guru'])
                ->update([
                    'password' => password_hash($pass, PASSWORD_DEFAULT),
                    'password_default' => 1
                ]);
        }

        return $this->response->setJSON([
            'status' => 'ok',
            'next'   => $offset + $limit,
            'total'  => $total,
            'csrf'   => csrf_hash()
        ]);
    }
}
