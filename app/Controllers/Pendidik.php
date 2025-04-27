<?php

namespace App\Controllers;

use App\Models\ModelPendidik;
use App\Models\ModelJadwal;
use App\Models\ModelSiswa;
use App\Models\ModelKelas;
use App\Models\ModelSurat;
use App\Models\ModelWilayah;
use \Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pendidik extends BaseController
{

    public function __construct()

    {
        helper('gantiformat');
        helper('form');
        $this->ModelPendidik = new ModelPendidik();
        $this->ModelJadwal = new ModelJadwal();
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelKelas = new ModelKelas();
        $this->ModelSurat = new ModelSurat();
        $this->siswa = new ModelSiswa();
    }

    public function index()
    {
        $guru = $this->ModelPendidik->DataGuru();
        $data = [
            'title' => 'SIAKAD',
            'subtitle' => 'Pendidik',
            'menu'          => 'pendidik',
            'submenu'       => 'pendidik',
            'guru'          => $this->ModelPendidik->DataGuru(),
            'walas'         => $this->ModelPendidik->walas($guru['id_guru'])
        ];
        return view('guru/v_dashboard', $data);
    }

    public function profile()
    {

        $data = [
            'title' => 'SIAKAD',
            'subtitle' => 'Pendidik',
            'menu'          => 'profile',
            'submenu'       => 'profile',
            'data'          => $this->ModelPendidik->DataGuru(),
            'validation'    =>  \Config\Services::validation(),
            'provinsi'      => $this->ModelWilayah->provinsi(),
        ];
        return view('guru/edit_guru', $data);
    }
    public function pendidikan()
    {

        $data = [
            'title' => 'SIAKAD',
            'subtitle' => 'Pendidik',
            'menu'          => 'profile',
            'submenu'       => 'profile',
            'data'          => $this->ModelPendidik->DataGuru(),
            'validation'    =>  \Config\Services::validation(),
            'provinsi'      => $this->ModelWilayah->provinsi(),
        ];
        return view('guru/pendidikan', $data);
    }

    // public function jadwal()
    // {
    //     $guru = $this->ModelPendidik->DataGuru();
    //     $data = [
    //         'title' => 'SIAKAD',
    //         'subtitle' => 'Jadwal Mengajar',
    //         'menu'          => 'pendidik',
    //         'submenu'       => 'pendidik',
    //         'jadwal' => $this->ModelPendidik->Jadwal($guru['id_guru'])
    //     ];
    //     return view('guru/jadwal', $data);
    // }
    public function walas() {}

    public function presensiKelas()
    {

        $guru = $this->ModelPendidik->DataGuru();
        $data = [
            'title'         => 'SIAKAD',
            'subtitle'      => 'Absen Kelas',
            'menu'          => 'pendidik',
            'submenu'       => 'pendidik',
            'absen'         => $this->ModelPendidik->Mapel($guru['id_guru'])
        ];
        return view('guru/absen/absenkelas', $data);
    }


    public function absensikelas($id_mapel)
    {

        $data = [
            'title' => 'SIAKAD',
            'subtitle' => 'Presensi Peserta Didik',
            'menu'          => 'pendidik',
            'submenu'       => 'pendidik',
            'absen' => $this->ModelPendidik->Kelas($id_mapel)
        ];
        return view('guru/pengajuan', $data);
    }






    public function eksporexcel()
    {

        $siswa =   $this->siswa->AllData();


        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'No');
        $activeWorksheet->setCellValue('B1', 'Nama');
        $activeWorksheet->setCellValue('C1', 'Jenis Kelamin');
        $activeWorksheet->setCellValue('D1', 'Tanggal Lahir');


        $column = 2;
        foreach ($siswa as $key => $value) {
            $sheet->setCellValue('A' . $column, ($column - 1));
            $sheet->setCellValue('B' . $column, $value->nama_siswa);
            $sheet->setCellValue('C' . $column, $value->jenis_kelamin);
            $sheet->setCellValue('D' . $column, $value->tanggal_lahir);

            $column++;
        }


        $writer = new Xlsx($spreadsheet);
        header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:attachment;filename=data anak.xlsx');
        header('Cache-Control:max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function pengajuan()
    {
        $guru = $this->ModelPendidik->DataGuru();
        $data = [
            'title' => 'SIAKAD',
            'menu' => 'pengajuan',
            'submenu' => 'pengajuan',
            'subtitle' => 'Pengajuan Mutasi Peserta Didik',
            'pengajuan' => $this->ModelPendidik->mutasi($guru['id_guru']),

        ];
        return view('guru/pengajuan', $data);
    }


    public function konfirmasi($id_mutasi)
    {
        $data = [
            'id_mutasi' => $id_mutasi,
            'status_mutasi' => 2
        ];
        $this->ModelSurat->konfirmasi($data);
        session()->setFlashdata('pesan', 'Reset Berhasil !!!');
        return redirect()->to(base_url('pendidik/pengajuan'));
    }
    public function printmutasi($id_mutasi)
    {

        $dompdf = new Dompdf();
        // $siswa = $this->ModelSiswa->DataSiswa($id_siswa);
        $data = [
            'title'         =>  'Surat Permohonan Mutasi Siswa',
            'mutasi'     => $this->ModelSurat->detail_data($id_mutasi),


            // 'tingkat'       => $this->ModelKelas->SiswaTingkat(),
        ];
        $html = view('guru/print_mutasi', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream('data siswa kelas.pdf', array(
            "Attachment" => false
        ));
        exit();
    }

    public function update_profile($id_guru)
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
                'id_guru'          => $id_guru,
                'nama_guru'         => $this->request->getPost('nama_guru'),
                'kelamin'          => $this->request->getPost('kelamin'),
                'tmpt_lahir'         => $this->request->getPost('tmpt_lahir'),
                'didik_ayah'        => $this->request->getPost('didik_ayah'),
                'tgl_lahir'        => $this->request->getPost('tgl_lahir'),
                'email'         => $this->request->getPost('email'),
                'alamat_guru'         => $this->request->getPost('alamat_guru'),
                'rt_guru'        => $this->request->getPost('rt_guru'),
                'rw_guru'         => $this->request->getPost('rw_guru'),
                'desa_guru'          => $this->request->getPost('desa_guru'),
                'kec_guru'           => $this->request->getPost('kec_guru'),
                'kab_guru'           => $this->request->getPost('kab_guru'),
                'prov_guru'           => $this->request->getPost('prov_guru'),
                'telp_guru'          => $this->request->getPost('telp_guru'),


            ];
            $this->ModelPendidik->edit($data);
            session()->setFlashdata('pesan', 'Data Berhasil Diubah');
            return redirect()->to('siswa/periodik/' . $id_siswa);
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            $validation =  \Config\Services::validation();
            return redirect()->to('siswa/edit_orangtua/' . $id_siswa)->withInput()->with('validation', $validation);
        }
    }



    public function rombel()
    {
        $guru = $this->ModelPendidik->DataGuru();
        $data = [
            'title'         => 'SIAKAD',
            'subtitle'      => 'Rombongan Belajar',
            'menu'          => 'rombel',
            'submenu'       => 'anggotarombel',
            'walas'         => $this->ModelPendidik->walas($guru['id_guru'])
        ];
        return view('guru/rombel/anggota', $data);
    }


    public function nilai()
    {

        $guru = $this->ModelPendidik->DataGuru();
        $data = [
            'title' => 'SIAKAD',
            'subtitle' => 'Penilaian',
            'menu' => 'rombel',
            'submenu' => 'nilai',
            'subtitle' => 'Penilaian ',
            'nilai' => $this->ModelPendidik->nilaikelas($guru['id_guru']),
            'walas'         => $this->ModelPendidik->walas($guru['id_guru'])
        ];
        return view('guru/nilai/nilai', $data);
    }

    public function tambahanggota()
    {
        $nisn           = $_POST['nisn'];
        $id_ta     = $_POST['id_ta'];


        $jml_siswa = count($nisn);
        for ($i = 0; $i < $jml_siswa; $i++) {
            $data = array(
                'nisn' =>       $nisn[$i],
                'id_ta' => $id_ta[$i],

            );
            $this->ModelPendidik->tambahanggota($data);
        }
        session()->setFlashdata('pesan', 'Siswa Berhasil Di Update !!!');
        return redirect()->to(base_url('pendidik/nilai'));
    }

    public function simpanNilai($id_nilai)
    {
        $nilai = $this->ModelPendidik->nilaikelas($id_nilai);
        foreach ($nilai as $key => $value) {
            $data = [
                'id_nilai' => $this->request->getPost($value['id_nilai'] . 'id_nilai'),
                'id_ta' => $this->request->getPost($value['id_ta'] . 'id_ta'),
                'pai' => $this->request->getPost($value['pai'] . 'pai')
            ];
            $this->ModelPendidik->editnilai($data);
            session()->setFlashdata('pesan', 'Data Berhasil Diubah');
            return redirect()->to('siswa/periodik/' . $id_siswa);
        }
    }
}
