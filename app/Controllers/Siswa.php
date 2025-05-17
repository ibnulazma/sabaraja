<?php

namespace App\Controllers;

use App\Models\ModelSiswa;
use App\Models\ModelKelas;
use App\Models\ModelWilayah;
use App\Models\ModelPekerjaan;
use App\Models\ModelPendidikan;
use App\Models\ModelTinggal;
use App\Models\ModelTransportasi;
use App\Models\ModelPenghasilan;
use App\Models\ModelMapel;


class Siswa extends BaseController
{

    public function __construct()
    {
        helper('nomorhp');
        helper('formatindo');
        helper('terbilang');
        helper('form');
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelKelas = new ModelKelas();
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelPendidikan = new ModelPendidikan();
        $this->ModelPekerjaan = new ModelPekerjaan();
        $this->ModelTinggal = new ModelTinggal();
        $this->ModelTransportasi = new ModelTransportasi();
        $this->ModelPenghasilan = new ModelPenghasilan();
        $this->ModelMapel = new ModelMapel();
    }


    public function index()
    {
        session();

        $siswa = $this->ModelSiswa->DataSiswa();
        $data = [
            'title'     => 'SIAKADINKA',
            'subtitle'  => 'Dashboard',
            'menu'      => 'siswa',
            'submenu' => 'siswa',
            'siswa'     => $this->ModelSiswa->DataSiswa(),
            'datakelas'    => $this->ModelSiswa->datakelas($siswa['nisn']),
        ];
        return view('siswa/v_dashboard', $data);
    }

    public function portofolio()
    {
        session();

        $data = [
            'title'     => 'SIAKADINKA',
            'subtitle'  => 'Dashboard',
            'menu'      => 'siswa',
            'submenu' => 'siswa',
            'siswa'     => $this->ModelSiswa->DataSiswa(),

            // 'absen'         => $this->ModelSiswa->DataAbsen($mhs['id_siswa']),
            // 'ambilmapel'    => $this->ModelSiswa->AmbilMapel($siswa['id_kelas']),

        ];
        return view('siswa/portofolio', $data);
    }

    public function profile()
    {
        session();


        $data = [
            'title'     => 'SIAKADINKA',
            'subtitle'  => ' Data Peserta Didik',
            'menu'      => 'profilsiswa',
            'submenu' => 'profile',
            'siswa'     => $this->ModelSiswa->DataSiswa(),
            'provinsi'  => $this->ModelWilayah->provinsi(),
            'tinggal'  => $this->ModelTinggal->AllData(),
            'transportasi'  => $this->ModelTransportasi->AllData(),
            'kerja'     => $this->ModelPekerjaan->AllData(),
            'didik'     => $this->ModelPendidikan->AllData(),
            'hasil'     => $this->ModelPenghasilan->AllData(),
            'validation'    =>  \Config\Services::validation(),

        ];
        return view('siswa/v_profile', $data);
    }
    public function orangtua()
    {
        session();


        $data = [
            'title'     => 'SIAKADINKA',
            'subtitle'  => ' Data Peserta Didik',
            'menu'      => 'profilsiswa',
            'submenu' => 'orangtua',
            'siswa'     => $this->ModelSiswa->DataSiswa(),
            'provinsi'  => $this->ModelWilayah->provinsi(),
            'tinggal'  => $this->ModelTinggal->AllData(),
            'transportasi'  => $this->ModelTransportasi->AllData(),
            'kerja'     => $this->ModelPekerjaan->AllData(),
            'didik'     => $this->ModelPendidikan->AllData(),
            'hasil'     => $this->ModelPenghasilan->AllData(),
            'validation'    =>  \Config\Services::validation(),

        ];
        return view('siswa/orangtua', $data);
    }


    public function dataperiodik()
    {
        session();

        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Update Profile',
            'menu'          => 'profilsiswa',
            'submenu'       => 'dataperiodik',
            'nav'           => 'dataperiodik',
            'siswa'     => $this->ModelSiswa->DataSiswa(),
            'tinggal'       => $this->ModelTinggal->AllData(),
            'transportasi'  => $this->ModelTransportasi->AllData(),


        ];
        return view('siswa/periodik', $data);
    }








    public function edit_alamat($id_siswa)
    {
        session();

        $data = [
            'title'     => 'SIAKADINKA',
            'subtitle'  => 'Update Profile',
            'menu'      => 'siswa',
            'submenu'   => 'alamat',
            'nav'       => 'alamat',
            'siswa'     => $this->ModelSiswa->SiswaEdit($id_siswa),
            'provinsi'  => $this->ModelWilayah->provinsi(),
            'tinggal'  => $this->ModelTinggal->AllData(),
            'transportasi'  => $this->ModelTransportasi->AllData(),
            'validation'    =>  \Config\Services::validation(),
            'kerja'     => $this->ModelPekerjaan->AllData(),
            'didik'     => $this->ModelPendidikan->AllData(),
            'hasil'     => $this->ModelPenghasilan->AllData()
        ];
        return view('siswa/update/edit_alamat', $data);
    }
    public function edit_orangtua()
    {
        session();

        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Update Profile',
            'menu'          => 'profile',
            'submenu'       => 'orangtua',
            'nav'           => 'orangtua',
            'siswa'         => $this->ModelSiswa->DataSiswa(),
            'provinsi'      => $this->ModelWilayah->provinsi(),
            'tinggal'       => $this->ModelTinggal->AllData(),
            'transportasi'  => $this->ModelTransportasi->AllData(),
            'validation'    =>  \Config\Services::validation(),
            'kerja'         => $this->ModelPekerjaan->AllData(),
            'didik'         => $this->ModelPendidikan->AllData(),
            'hasil'         => $this->ModelPenghasilan->AllData()
        ];
        return view('siswa/edit_orangtua', $data);
    }


    public function rekamdidik()
    {
        session();

        $siswa = $this->ModelSiswa->DataSiswa();
        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Update Profile',
            'menu'          => 'profile',
            'submenu'       => 'rekamdidik',
            'nav'           => 'rekamdidik',
            'siswa'         => $this->ModelSiswa->DataSiswa(),
            'rekamdidik'    => $this->ModelSiswa->rekamdidik($siswa['nisn']),

        ];
        return view('siswa/v_rekamdidik', $data);
    }
    public function registrasi($id_siswa)
    {
        session();

        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Update Profile',
            'menu'          => 'siswa',
            'submenu'       => 'registrasi',
            'nav'           => 'registrasi',
            'siswa'         => $this->ModelSiswa->SiswaEdit($id_siswa),
            'provinsi'      => $this->ModelWilayah->provinsi(),
            'tinggal'       => $this->ModelTinggal->AllData(),
            'transportasi'  => $this->ModelTransportasi->AllData(),
            'validation'    =>  \Config\Services::validation(),
            'kerja'         => $this->ModelPekerjaan->AllData(),
            'didik'         => $this->ModelPendidikan->AllData(),
            'hasil'         => $this->ModelPenghasilan->AllData()
        ];
        return view('siswa/update/registrasi', $data);
    }
    public function uploadberkas($id_siswa)
    {
        session();

        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Update Profile',
            'menu'          => 'siswa',
            'submenu'       => 'siswa',
            'nav'           => 'berkas',
            'siswa'         => $this->ModelSiswa->SiswaEdit($id_siswa),
            'validation'    =>  \Config\Services::validation(),

        ];
        return view('siswa/update/berkas', $data);
    }

    public function periodik($id_siswa)
    {
        session();

        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Update Profile',
            'menu'          => 'siswa',
            'submenu'       => 'periodik',
            'nav'           => 'periodik',
            'siswa'         => $this->ModelSiswa->SiswaEdit($id_siswa),
            'provinsi'      => $this->ModelWilayah->provinsi(),
            'tinggal'       => $this->ModelTinggal->AllData(),
            'transportasi'  => $this->ModelTransportasi->AllData(),
            'validation'    =>  \Config\Services::validation(),
            'kerja'         => $this->ModelPekerjaan->AllData(),
            'didik'         => $this->ModelPendidikan->AllData(),
            'hasil'         => $this->ModelPenghasilan->AllData()
        ];
        return view('siswa/update/periodik', $data);
    }

    public function edit_siswa($id_siswa)
    {
        if ($this->validate([
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'rt' => [
                'label' => 'RT',
                'rules' => 'required|min_length[2]',
                'errors' => [
                    'required'          => '{field} harus diisi',
                    'min_length'        => ' {field} Harus 2 Digit',
                ]
            ],

            'rw' => [
                'label' => 'RW',
                'rules' => 'required|min_length[2]',
                'errors' => [
                    'required' => '{field} harus dipilih',
                    'min_length' => ' {field} Harus 2 Digit',
                ]
            ],
            'desa' => [
                'label' => 'Desa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'kecamatan' => [
                'label' => 'Kecamatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'kabupaten' => [
                'label' => 'Kabupaten',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'provinsi' => [
                'label' => 'Provinsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'kodepos' => [
                'label' => 'Kode Pos',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'nama_ayah' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'nik_ayah' => [
                'label' => 'NIK',
                'rules' => 'required|min_length[16]',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tahun_ayah' => [
                'label' => 'Tahun Lahir',
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required'          => '{field} harus diisi',
                    'min_length'        => '{field} Harus 4 Digit',
                ]
            ],
            'didik_ayah' => [
                'label' => 'Pendidikan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'kerja_ayah' => [
                'label' => 'Kerja',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'hasil_ayah' => [
                'label' => 'Penghasilan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'telp_ayah' => [
                'label' => 'Telepon',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',

                ]
            ],

            'tahun_ibu' => [
                'label' => 'Tahun Lahir',
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required'          => '{field} harus diisi',
                    'min_length'        => ' {field} Harus 4 Digit',

                ]
            ],
            'nik_ibu' => [
                'label' => 'NIK',
                'rules' => 'required|min_length[16]',
                'errors' => [
                    'required'          => '{field} harus diisi',
                    'min_length'        => ' {field} Harus 4 Digit',
                ]
            ],
            'didik_ibu' => [
                'label' => 'Pendidikan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',

                ]
            ],
            'hasil_ibu' => [
                'label' => 'Pengasilan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'kerja_ibu' => [
                'label' => 'Pekerjaan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',

                ]
            ],
            'telp_ibu' => [
                'label' => 'Telp/Hp',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',

                ]
            ],

            'tinggal' => [
                'label' => 'Tinggal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'transportasi' => [
                'label' => 'Transportasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],

            'berat' => [
                'label' => 'Berat Badan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tinggi' => [
                'label' => 'Tinggi Badan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'lingkar' => [
                'label' => 'Lingkar',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'anak_ke' => [
                'label' => 'Anak Ke',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jml_saudara' => [
                'label' => 'Jumlah Saudara',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tinggal' => [
                'label' => 'Tempat Tinggal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'transportasi' => [
                'label' => 'Transportasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'cita_cita' => [
                'label' => 'Cita-cita',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'hobi' => [
                'label' => 'hobi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],


            'seri_ijazah' => [
                'label' => 'No Seri Ijazah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',

                ]
            ],
            'telp_anak' => [
                'label' => 'Telp Anak',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',

                ]
            ],
        ])) {
            $data = [
                'id_siswa'          => $id_siswa,
                'no_kip'            => $this->request->getPost('no_kip'),
                'kip'               => $this->request->getPost('kip'),
                'anak_ke'           => $this->request->getPost('anak_ke'),
                'alamat'            => $this->request->getPost('alamat'),
                'rt'                => $this->request->getPost('rt'),
                'rw'                => $this->request->getPost('rw'),
                'provinsi'          => $this->request->getPost('provinsi'),
                'kabupaten'         => $this->request->getPost('kabupaten'),
                'kecamatan'         => $this->request->getPost('kecamatan'),
                'desa'              => $this->request->getPost('desa'),
                'tinggal'           => $this->request->getPost('tinggal'),
                'transportasi'      => $this->request->getPost('transportasi'),
                'kodepos'           => $this->request->getPost('kodepos'),
                'nama_ayah'         => $this->request->getPost('nama_ayah'),
                'nama_ibu'          => $this->request->getPost('nama_ibu'),
                'didik_ibu'         => $this->request->getPost('didik_ibu'),
                'didik_ayah'        => $this->request->getPost('didik_ayah'),
                'kerja_ayah'        => $this->request->getPost('kerja_ayah'),
                'kerja_ibu'         => $this->request->getPost('kerja_ibu'),
                'hasil_ibu'         => $this->request->getPost('hasil_ibu'),
                'hasil_ayah'        => $this->request->getPost('hasil_ayah'),
                'telp_ayah'         => $this->request->getPost('telp_ayah'),
                'telp_ibu'          => $this->request->getPost('telp_ibu'),
                'nik_ibu'           => $this->request->getPost('nik_ibu'),
                'nik_ayah'          => $this->request->getPost('nik_ayah'),
                'tahun_ayah'        => $this->request->getPost('tahun_ayah'),
                'tahun_ibu'         => $this->request->getPost('tahun_ibu'),
                'lingkar'           => $this->request->getPost('lingkar'),
                'telp_anak'         => $this->request->getPost('telp_anak'),
                'lingkar'           => $this->request->getPost('lingkar'),
                'berat'             => $this->request->getPost('berat'),
                'tinggi'            => $this->request->getPost('tinggi'),
                'hobi'              => $this->request->getPost('hobi'),
                'cita_cita'         => $this->request->getPost('cita_cita'),
                'seri_ijazah'       => $this->request->getPost('seri_ijazah'),
                'jml_saudara'       => $this->request->getPost('jml_saudara'),
                'status_daftar'     => 2

            ];
            $this->ModelSiswa->edit($data);
            session()->setFlashdata('pesan', 'Data Berhasil Diubah');
            return redirect()->to('siswa/profile');
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            $validation =  \Config\Services::validation();
            return redirect()->to('siswa/profile')->withInput()->with('validation', $validation);
            // return redirect()->to('siswa/profile');
        }
    }

    public function update_alamat($id_siswa)
    {
        if ($this->validate([
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'rt' => [
                'label' => 'RT',
                'rules' => 'required|min_length[2]',
                'errors' => [
                    'required'          => '{field} harus diisi',
                    'min_length'        => ' {field} Harus 2 Digit',
                ]
            ],

            'rw' => [
                'label' => 'RW',
                'rules' => 'required|min_length[2]',
                'errors' => [
                    'required' => '{field} harus dipilih',
                    'min_length' => ' {field} Harus 2 Digit',
                ]
            ],
            'desa' => [
                'label' => 'Desa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'kecamatan' => [
                'label' => 'Kecamatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'kabupaten' => [
                'label' => 'Kabupaten',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'provinsi' => [
                'label' => 'Provinsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'kodepos' => [
                'label' => 'Kode Pos',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],


        ])) {
            $data = [
                'id_siswa'          => $id_siswa,
                'no_kip'            => $this->request->getPost('no_kip'),
                'kip'               => $this->request->getPost('kip'),
                'anak_ke'           => $this->request->getPost('anak_ke'),
                'alamat'            => $this->request->getPost('alamat'),
                'rt'                => $this->request->getPost('rt'),
                'rw'                => $this->request->getPost('rw'),
                'provinsi'          => $this->request->getPost('provinsi'),
                'kabupaten'         => $this->request->getPost('kabupaten'),
                'kecamatan'         => $this->request->getPost('kecamatan'),
                'desa'              => $this->request->getPost('desa'),
                'kodepos'           => $this->request->getPost('kodepos'),
            ];
            $this->ModelSiswa->edit($data);
            session()->setFlashdata('pesan', 'Data Berhasil Diubah');
            return redirect()->to('siswa/edit_orangtua/' . $id_siswa);
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            $validation =  \Config\Services::validation();
            return redirect()->to('siswa/edit_alamat/' . $id_siswa)->withInput()->with('validation', $validation);
        }
    }

    public function update_orangtua($id_siswa)
    {
        if ($this->validate([

            'nama_ayah' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'nik_ayah' => [
                'label' => 'NIK',
                'rules' => 'required|min_length[16]',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tahun_ayah' => [
                'label' => 'Tahun Lahir',
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required'          => '{field} harus diisi',
                    'min_length'        => '{field} Harus 4 Digit',
                ]
            ],
            'didik_ayah' => [
                'label' => 'Pendidikan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],


            'telp_ayah' => [
                'label' => 'Telepon',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',

                ]
            ],

            'tahun_ibu' => [
                'label' => 'Tahun Lahir',
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required'          => '{field} harus diisi',
                    'min_length'        => ' {field} Harus 4 Digit',

                ]
            ],
            'nik_ibu' => [
                'label' => 'NIK',
                'rules' => 'required|min_length[16]',
                'errors' => [
                    'required'          => '{field} harus diisi',
                    'min_length'        => ' {field} Harus 16 Digit',
                ]
            ],
            'didik_ibu' => [
                'label' => 'Pendidikan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',

                ]
            ],

            'kerja_ibu' => [
                'label' => 'Pekerjaan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',

                ]
            ],
            'telp_ibu' => [
                'label' => 'Telp/Hp',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',

                ]
            ],


        ])) {
            $data = [
                'id_siswa'          => $id_siswa,
                'nama_ayah'         => $this->request->getPost('nama_ayah'),
                'nama_ibu'          => $this->request->getPost('nama_ibu'),
                'didik_ibu'         => $this->request->getPost('didik_ibu'),
                'didik_ayah'        => $this->request->getPost('didik_ayah'),
                'kerja_ayah'        => $this->request->getPost('kerja_ayah'),
                'kerja_ibu'         => $this->request->getPost('kerja_ibu'),
                'hasil_ibu'         => $this->request->getPost('hasil_ibu'),
                'hasil_ayah'        => $this->request->getPost('hasil_ayah'),
                'telp_ayah'         => nomorhp($this->request->getPost('telp_ayah')),
                'telp_ibu'          => nomorhp($this->request->getPost('telp_ibu')),
                'nik_ibu'           => $this->request->getPost('nik_ibu'),
                'nik_ayah'          => $this->request->getPost('nik_ayah'),
                'tahun_ayah'        => $this->request->getPost('tahun_ayah'),
                'tahun_ibu'         => $this->request->getPost('tahun_ibu'),

            ];
            $this->ModelSiswa->edit($data);
            session()->setFlashdata('pesan', 'Data Berhasil Diubah');
            return redirect()->to('siswa/periodik/' . $id_siswa);
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            $validation =  \Config\Services::validation();
            return redirect()->to('siswa/edit_orangtua/' . $id_siswa)->withInput()->with('validation', $validation);
        }
    }

    public function update_periodik($id_siswa)
    {
        if ($this->validate([



            'tinggal' => [
                'label' => 'Tinggal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'transportasi' => [
                'label' => 'Transportasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],

            'berat' => [
                'label' => 'Berat Badan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tinggi' => [
                'label' => 'Tinggi Badan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'lingkar' => [
                'label' => 'Lingkar',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'anak_ke' => [
                'label' => 'Anak Ke',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jml_saudara' => [
                'label' => 'Jumlah Saudara',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],

        ])) {
            $data = [
                'id_siswa'          => $id_siswa,
                'berat'             => $this->request->getPost('berat'),
                'anak_ke'           => $this->request->getPost('anak_ke'),
                'tinggal'           => $this->request->getPost('tinggal'),
                'transportasi'      => $this->request->getPost('transportasi'),
                'lingkar'           => $this->request->getPost('lingkar'),
                'tinggi'            => $this->request->getPost('tinggi'),
                'jml_saudara'       => $this->request->getPost('jml_saudara'),

            ];
            $this->ModelSiswa->edit($data);
            session()->setFlashdata('pesan', 'Data Berhasil Diubah');
            return redirect()->to('siswa/registrasi/' . $id_siswa);
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            $validation =  \Config\Services::validation();
            return redirect()->to('siswa/periodik/' . $id_siswa)->withInput()->with('validation', $validation);
            // return redirect()->to('siswa/profile');
        }
    }

    public function ijazah($id_siswa)
    {
        if ($this->validate([

            'ijazah' => [
                'label' => 'Foto',
                'rules' => 'max_size[ijazah,1024]|mime_in[ijazah,image/png,image/jpg,image/gif,image/jpeg,image/ico]',
                'errors' => [
                    'max_size' => '{field} Max 1024 KB !!!!',
                    'mime_in' => 'Format {field} Harus PNG, JPG, JPEG, GIF, ICO !!!!',
                    'max_size' => 'Harus Size 1024Kb'
                ]
            ],
        ])) {

            //masukan foto ke input
            $foto = $this->request->getFile('ijazah');
            if ($foto->getError() == 4) {

                $data = array(
                    'id_siswa'   => $id_siswa,
                );
                $this->ModelSiswa->edit($data);
            } else {

                //menghapus fotolama
                $user = $this->ModelSiswa->detail_data($id_siswa);
                if ($user['ijazah'] != "") {
                    unlink('ijazah/' . $user['ijazah']);
                }
                //merename
                $nama_file = $foto->getRandomName();
                //jika valid
                $data = array(
                    'id_siswa'          => $id_siswa,
                    'ijazah'            => $nama_file,
                );
                $foto->move('ijazah', $nama_file);
                $this->ModelSiswa->edit($data);
            }
            session()->setFlashdata('pesan', 'Foto Berhasil Diubah !!!');
            return redirect()->to(base_url('siswa/uploadberkas/' . $id_siswa));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('siswa/uploadberkas/' . $id_siswa));
        }
    }
    public function upload_kk($id_siswa)
    {
        if ($this->validate([

            'kartu_keluarga' => [
                'label' => 'Foto',
                'rules' => 'max_size[kartu_keluarga,1024]|mime_in[kartu_keluarga,image/png,image/jpg,image/gif,image/jpeg,image/ico]',
                'errors' => [
                    'max_size' => '{field} Max 1024 KB !!!!',
                    'mime_in' => 'Format {field} Harus PNG, JPG, JPEG, GIF, ICO !!!!',
                    'max_size' => 'Harus Size 1024Kb'
                ]
            ],
        ])) {

            //masukan foto ke input
            $foto = $this->request->getFile('kartu_keluarga');
            if ($foto->getError() == 4) {

                $data = array(
                    'id_siswa'   => $id_siswa,
                );
                $this->ModelSiswa->edit($data);
            } else {

                //menghapus fotolama
                $user = $this->ModelSiswa->detail_data($id_siswa);
                if ($user['kartu_keluarga'] != "") {
                    unlink('kartu_keluarga/' . $user['kartu_keluarga']);
                }
                //merename
                $nama_file = $foto->getRandomName();
                //jika valid
                $data = array(
                    'id_siswa'          => $id_siswa,
                    'kartu_keluarga'            => $nama_file,
                );
                $foto->move('kartu_keluarga', $nama_file);
                $this->ModelSiswa->edit($data);
            }
            session()->setFlashdata('pesan', 'Foto Berhasil Diubah !!!');
            return redirect()->to(base_url('siswa/uploadberkas/' . $id_siswa));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('siswa/uploadberkas/' . $id_siswa));
        }
    }
    public function update_registrasi($id_siswa)
    {
        if ($this->validate([
            'cita_cita' => [
                'label' => 'Cita-cita',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'hobi' => [
                'label' => 'hobi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],

            'seri_ijazah' => [
                'label' => 'No Seri Ijazah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',

                ]
            ],
            'telp_anak' => [
                'label' => 'Telp Anak',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',

                ]
            ],
            'telp_anak' => [
                'label' => 'Telp Anak',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',

                ]
            ],
            'status_daftar' => [
                'label' => 'Pernyataan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harap diceklis'
                ]
            ],
            'no_kk' => [
                'label' => 'No Kartu Keluarga',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harap diisi'
                ]
            ],

        ])) {
            $data = [
                'id_siswa'          => $id_siswa,
                'hobi'              => $this->request->getPost('hobi'),
                'no_kk'             => $this->request->getPost('no_kk'),
                'cita_cita'         => $this->request->getPost('cita_cita'),
                'seri_ijazah'       => $this->request->getPost('seri_ijazah'),
                'telp_anak'         => $this->request->getPost('telp_anak'),
                'status_daftar'         => 2,


            ];
            $this->ModelSiswa->edit($data);
            session()->setFlashdata('pesan', 'Data Berhasil Diubah');
            return redirect()->to('siswa');
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            $validation =  \Config\Services::validation();
            return redirect()->to('siswa/registrasi/' . $id_siswa)->withInput()->with('validation', $validation);
            // return redirect()->to('siswa/profile');
        }
    }

    // biodata siswa
    public function nilai()
    {
        $siswa = $this->ModelSiswa->DataSiswa();
        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Nilai P3MP',
            'menu'          =>  'nilai',
            'submenu'       =>  'nilai',
            'siswa'         => $siswa,
            'nilai'         => $this->ModelSiswa->Daftarnilai($siswa['nisn']),
        ];
        return view('siswa/v_nilai', $data);
    }

    public function absen()
    {
        $data = [
            'title'     => 'SIAKADINKA',
            'subtitle'  => 'Absen',
        ];
        return view('siswa/absen/v_absen', $data);
    }

    public function dataKabupaten($id_provinsi)
    {
        // $selected = "selected";
        // $siswa = $this->ModelSiswa->DataSiswa();
        $data = $this->ModelWilayah->getKabupaten($id_provinsi);

        echo '<option>--Pilih Kabupaten--</option>';
        foreach ($data as $value) {
            echo '<option value="' . $value['id_kabupaten'] . '">' . $value['city_name'] . '</option>';
        }

        //     if ($siswa['id_kabupaten'] == $data['kabupaten']) {
        //         $select = "selected";
        //     } else {
        //         $select = "";
        //     }
        //     echo '<option value=" '. $prov['id_provinsi'] .' " $select>" '. $prov['prov_name'] . '"</option>";

    }

    public function dataKecamatan($id_kabupaten)
    {
        $data = $this->ModelWilayah->getKecamatan($id_kabupaten);
        echo '<option>--Pilih Kecamatan--</option>';
        foreach ($data as $value) {
            echo '<option value="' . $value['id_kecamatan'] . '">' . $value['nama_kecamatan'] . '</option>';
        }
    }
    public function dataDesa($id_kecamatan)
    {
        $data = $this->ModelWilayah->getDesa($id_kecamatan);
        echo '<option>--Pilih Desa/Kelurahan--</option>';
        foreach ($data as $value) {
            echo '<option value="' . $value['id_desa'] . '">' . $value['desa'] . '</option>';
        }
    }

    public function pengajuan()
    {
        $siswa = $this->ModelSiswa->DataSiswa();
        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Pengajuan',
            'menu'          => 'pengajuan',
            'submenu'       => 'pengajuan',
            'mutasi'     => $this->ModelSiswa->mutasi($siswa['id_siswa']),
            'siswa'     => $siswa,
            'pengajuan'     => $this->ModelSiswa->pengajuan(),

        ];
        return view('siswa/v_pengajuan', $data);
    }

    public function mutasi($id_siswa)
    {
        $data = [
            'id_siswa'              => $id_siswa,
            'alasan'            => $this->request->getPost('alasan'),
            'sekolah'           => $this->request->getPost('sekolah'),
            'status_mutasi'     => 1,
            'id_ta'             => $this->request->getPost('id_ta')
        ];
        $this->ModelSiswa->insertpengajuan($data);
        return redirect()->to('siswa/pengajuan');
        // } else {
        //     $validation =  \Config\Services::validation();
        //     return redirect()->to('siswa/edit_profile/' . $id_siswa)->withInput()->with('validation', $validation);
        // }
    }
}
