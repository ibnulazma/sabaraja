<?php

namespace App\Controllers;

use App\Models\ModelTa;
use App\Models\ModelSiswa;


class Daftar extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelTa = new ModelTa();
        $this->ModelSiswa = new ModelSiswa();
    }

    public function index()
    {
        session();
        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Pendaftaran',
            'ta'            => $this->ModelTa->statusTa(),
            // 'status'        => $this->ModelSiswa->status(),
            'validation'    =>  \Config\Services::validation(),

        ];
        return view('v_daftar', $data);
    }

    // public function loginSiswa()
    // {
    //     session();
    //     $data = [
    //         'title' => 'SIAKADINKA',
    //         'subtitle' => 'Login',
    //     ];
    //     return view('v_login-siswa', $data);
    // }


    public function simpanDaftar()
    {
        if ($this->validate([
            'nik' => [
                'label' => 'NIK',
                'rules' => 'required|min_length[16]',
                'errors' => [
                    'required' => '{field} Harap Diisi',
                    'min_length' => ' {field} Harus 16 Digit',

                ]
            ],
            'nisn' => [
                'label'                 => 'NISN',
                'rules'                 => 'required|min_length[10]|is_unique[tbl_ppdb.nisn]',
                'errors'                => [
                    'required'          => '{field} Harap Diisi',
                    'min_length'        => ' {field} Harus 10 Digit',
                    'is_unique'         => ' {field} sudah terdaftar',

                ]
            ],
            'nama_lengkap' => [
                'label' => 'Nama Lengkap',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tempat_lahir' => [
                'label' => 'Tempat Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],

            'jenis_kelamin' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus dipilih'
                ]
            ],
            'tanggal' => [
                'label' => 'Tanggal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'bulan' => [
                'label' => 'Bulan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tahun' => [
                'label' => 'Tahun',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
        ])) {

            $tahun = $this->request->getPost('tahun');
            $bulan = $this->request->getPost('bulan');
            $tanggal = $this->request->getPost('tanggal');

            $data = [
                'nik'           => $this->request->getPost('nik'),
                'nisn'          => $this->request->getPost('nisn'),
                'nama_lengkap'  => $this->request->getPost('nama_lengkap'),
                'tempat_lahir'  => $this->request->getPost('tempat_lahir'),
                'jenis_kelamin'  => $this->request->getPost('jenis_kelamin'),
                'tanggal_lahir' => $tanggal . '-' . $bulan . '-' . $tahun,
                'password'      => $tanggal . $bulan .  $tahun,

            ];
            $this->ModelSiswa->add($data);
            session()->setFlashdata('pesan', 'Silahkan Login untuk melengkapi Data! ');
            return redirect()->to('home');
        } else {
            $validation =  \Config\Services::validation();
            return redirect()->to('/daftar')->withInput()->with('validation', $validation);
        }
    }

    public function apply($id_siswa)
    {
        $data = [
            'id_siswa' => $id_siswa,
            'status_daftar' => '1'
        ];
        $this->ModelSiswa->edit($data);
        session()->setFlashdata('pesan', 'Pendaftaran Berhasil Disimpan');
        return redirect()->to('/siswa');
    }
}
