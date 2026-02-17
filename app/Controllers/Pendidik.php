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
        helper('nomorhp');
        helper('form');
        helper('secure');





        $this->ModelPendidik = new ModelPendidik();
        $this->ModelJadwal = new ModelJadwal();
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelKelas = new ModelKelas();
        $this->ModelSurat = new ModelSurat();
        $this->siswa = new ModelSiswa();
    }

    public function index()
    {
        $kelasModel       = new \App\Models\KelasModel();
        $konfirmasiModel = new \App\Models\KonfirmasiModel();

        // contoh: id guru dari session
        $idGuru = session()->get('id_user');

        // daftar kelas yang diampu guru
        $kelas = $kelasModel->getKelasGuru($idGuru);

        // ambil semua id_kelas yang sudah FINAL
        $kelasFinal = $konfirmasiModel
            ->select('id_kelas')
            ->where('keterangan', 'final')
            ->findColumn('id_kelas');





        $guru = $this->ModelPendidik->DataGuru();

        $nilai = $this->ModelPendidik->nilaikelas($guru['id_guru']);

        $data = [
            'title' => 'SIAKAD',
            'subtitle' => 'Pendidik',
            'menu'          => 'pendidik',
            'submenu'       => 'pendidik',
            'guru'          => $this->ModelPendidik->DataGuru(),
            'rombel'        => $this->ModelPendidik->rombelWalas($guru['id_guru']),
            'nilai'         => $this->ModelPendidik->nilaikelas($guru['id_guru']),
            'walas'         => $this->ModelPendidik->rombelWalas($guru['id_guru']),
            'id_kelas'       =>  $nilai[0]['id_kelas'] ?? null,
            'kelas'      => $kelas,
            'kelasFinal' => $kelasFinal ?? []

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
            'provinsi'      => $this->ModelWilayah->getProvinsi(),
        ];
        return view('guru/edit_guru', $data);
    }


    public function update_guru($niy)
    {
        if ($this->validate([
            'nama_guru' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'kelamin' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus dipilih',

                ]
            ],

            'tmpt_lahir' => [
                'label' => 'Tempat Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',

                ]
            ],
            'tgl_lahir' => [
                'label' => 'Tanggal Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'valid_email' => 'harus sesuai format email'
                ]
            ],
            'telp_guru' => [
                'label' => 'Telp Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'alamat_guru' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'rt_guru' => [
                'label' => 'RT',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'rw_guru' => [
                'label' => 'RW',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'desa_guru' => [
                'label' => 'Desa/Kel',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],

            'kec_guru' => [
                'label' => 'Kecamatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'ibu_guru' => [
                'label' => 'Nama Ibu ',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'nik_guru' => [
                'label' => 'NIK ',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'nuptk' => [
                'label' => 'NUPTK ',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'status_pernikahan' => [
                'label' => 'Status Pernikahan ',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus dipilih'
                ]
            ],


        ])) {
            $data = [
                'niy'               => $niy,
                'nama_guru'        => $this->request->getPost('nama_guru'),
                'kelamin'          => $this->request->getPost('kelamin'),
                'tmpt_lahir'       => $this->request->getPost('tmpt_lahir'),
                'tgl_lahir'        => $this->request->getPost('tgl_lahir'),
                'email'            => $this->request->getPost('email'),
                'telp_guru'        => $this->request->getPost('telp_guru'),
                'alamat_guru'      => $this->request->getPost('alamat_guru'),
                'rt_guru'          => $this->request->getPost('rt_guru'),
                'rw_guru'          => $this->request->getPost('rw_guru'),
                'kec_guru'         => $this->request->getPost('kec_guru'),
                'desa_guru'        => $this->request->getPost('desa_guru'),
                'nik_guru'         => $this->request->getPost('nik_guru'),
                'ibu_guru'         => $this->request->getPost('ibu_guru'),
                'nuptk'           => $this->request->getPost('nuptk'),
                'npwp'           => $this->request->getPost('npwp'),
                'status_pernikahan'           => $this->request->getPost('status_pernikahan'),
                'link_wa'           => $this->request->getPost('link_wa'),

            ];
            $this->ModelPendidik->edit($data);
            session()->setFlashdata('pesan', 'Data Berhasil Diubah');
            return redirect()->to('pendidik/profile');
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            $validation =  \Config\Services::validation();
            return redirect()->to('pendidik/profile')->withInput()->with('validation', $validation);
        }
    }



    public function pendidikan()
    {
        $guru = $this->ModelPendidik->DataGuru();
        $data = [
            'title' => 'SIAKAD',
            'subtitle' => 'Pendidik',
            'menu'          => 'profile',
            'submenu'       => 'pendidikan',
            'data'          => $this->ModelPendidik->DataGuru(),
            'datapendidikan' => $this->ModelPendidik->Datajenjang($guru['id_guru'])

        ];
        return view('guru/pendidikan', $data);
    }



    public function tambahpendidikan()
    {

        $data = [
            'id_guru'           => $this->request->getPost('id_guru'),
            'nama_sekolah'      => $this->request->getPost('nama_sekolah'),
            'jenjang'           => $this->request->getPost('jenjang'),
            'tahun_lulus'       => $this->request->getPost('tahun_lulus'),
        ];
        $this->ModelPendidik->adddidik($data);
        session()->setFlashdata('pesan', 'Riwayat Pendidikan Berhasil Ditambah');
        return redirect()->to('pendidik/pendidikan');
    }

    public function tambahkeluarga()
    {

        $data = [
            'id_guru'           => $this->request->getPost('id_guru'),
            'nama_anggota'      => $this->request->getPost('nama_anggota'),
            'status_keluarga'           => $this->request->getPost('status_keluarga'),
        ];
        $this->ModelPendidik->addkeluarga($data);
        session()->setFlashdata('pesan', 'Riwayat Pendidikan Berhasil Ditambah');
        return redirect()->to('pendidik/keluarga');
    }




    public function keluarga()
    {
        $guru = $this->ModelPendidik->DataGuru();
        $data = [
            'title' => 'SIAKAD',
            'subtitle' => 'Pendidik',
            'menu'          => 'profile',
            'submenu'       => 'keluarga',
            'data'          => $this->ModelPendidik->DataGuru(),
            'datakeluarga'          => $this->ModelPendidik->Datakeluarga($guru['id_guru']),

        ];
        return view('guru/keluarga', $data);
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
                'npwp'          => $this->request->getPost('npwp'),
                'link_wa'          => $this->request->getPost('link_wa'),


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
        $id_guru = session()->get('id_user');
        $level   = session()->get('level');

        // Guard keamanan
        if ($level != 2) {
            return redirect()->to('/login');
        }

        $data = [
            'title'  => 'Rombel Wali Kelas',
            'menu' => 'rombel',
            'submenu' => 'anggotarombel',
            'rombel' => $this->ModelPendidik->rombelWalas($id_guru)
        ];

        return view('guru/rombel/anggota', $data);
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











    // =========KHUSUS NILAI============









    public function printexcel($id_kelas)
    {
        $siswa = $this->ModelKelas->datasiswa($id_kelas);

        // ambil nama kelas
        $kelas = $this->ModelKelas->getNamaKelas($id_kelas);
        $namaKelas = $kelas ? $kelas['kelas'] : 'kelas';

        // bersihkan nama file (hindari spasi & karakter aneh)
        $namaFile = 'Format_Nilai_Kelas_' . preg_replace('/[^A-Za-z0-9_\-]/', '.', $namaKelas) . '.xlsx';

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'NISN');
        $sheet->setCellValue('D1', 'PAI');
        $sheet->setCellValue('E1', 'PKN');
        $sheet->setCellValue('F1', 'B.INDO');
        $sheet->setCellValue('G1', 'MTK');
        $sheet->setCellValue('H1', 'IPA');
        $sheet->setCellValue('I1', 'IPS');
        $sheet->setCellValue('J1', 'B.INGG');
        $sheet->setCellValue('K1', 'SBK');
        $sheet->setCellValue('L1', 'PJOK');
        $sheet->setCellValue('M1', 'PRKY');
        $sheet->setCellValue('N1', 'TIK');
        $sheet->setCellValue('O1', 'TJWD');
        $sheet->setCellValue('P1', 'TRJMH');
        $sheet->setCellValue('Q1', 'FIQIH');
        $sheet->setCellValue('R1', 'MHD');
        $sheet->setCellValue('S1', 'BTQ');
        $sheet->setCellValue('T1', 'SAKIT');
        $sheet->setCellValue('U1', 'IZIN');
        $sheet->setCellValue('V1', 'ALFA');
        // dst...

        $column = 2;
        foreach ($siswa as $key => $value) {
            $sheet->setCellValue('A' . $column, ($column - 1));
            $sheet->setCellValue('B' . $column, $value['nama_siswa']);
            $sheet->setCellValue('C' . $column, $value['nisn']);
            $column++;
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $namaFile . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }


    public function upload($id_kelas)
    {
        $db = \Config\Database::connect();

        $ta = $db->table('tbl_ta')
            ->where('status', '1')
            ->get()
            ->getRowArray();

        if (!$this->validate([
            'fileimport' => [
                'rules' => 'uploaded[fileimport]|ext_in[fileimport,xls,xlsx]',
            ]
        ])) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'File tidak valid'
            ]);
        }

        $file = $this->request->getFile('fileimport');
        $ext  = $file->getClientExtension();

        $reader = ($ext == 'xls')
            ? new \PhpOffice\PhpSpreadsheet\Reader\Xls()
            : new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadsheet = $reader->load($file);
        $rows = $spreadsheet->getActiveSheet()->toArray();

        $sukses = 0;
        $gagal  = 0;

        $db->transStart();

        foreach ($rows as $i => $row) {
            if ($i == 0 || empty($row[2])) continue;

            $nisn = trim($row[2]);

            $cek = $db->table('tbl_nilai')
                ->where('nisn', $nisn)
                ->where('id_ta', $ta['id_ta'])
                ->get()
                ->getRow();

            if ($cek) {
                $gagal++;
                continue;
            }

            $db->table('tbl_nilai')->insert([
                'nisn'   => $nisn,
                'pai'    => is_numeric($row[3]) ? $row[3] : null,
                'pkn'    => is_numeric($row[4]) ? $row[4] : null,
                'indo'   => is_numeric($row[5]) ? $row[5] : null,
                'mtk'    => is_numeric($row[6]) ? $row[6] : null,
                'ipa'    => is_numeric($row[7]) ? $row[7] : null,
                'ips'    => is_numeric($row[8]) ? $row[8] : null,
                'inggris' => is_numeric($row[9]) ? $row[9] : null,
                'sbk'    => is_numeric($row[10]) ? $row[10] : null,
                'pjok'   => is_numeric($row[11]) ? $row[11] : null,
                'prky'   => is_numeric($row[12]) ? $row[12] : null,
                'tik'    => is_numeric($row[13]) ? $row[13] : null,
                'tjwd'   => is_numeric($row[14]) ? $row[14] : null,
                'trjmh'  => is_numeric($row[15]) ? $row[15] : null,
                'fiqih'  => is_numeric($row[16]) ? $row[16] : null,
                'mhd'    => is_numeric($row[17]) ? $row[17] : null,
                'btq'    => is_numeric($row[18]) ? $row[18] : null,
                'sakit'  => is_numeric($row[19]) ? $row[19] : null,
                'izin'   => is_numeric($row[20]) ? $row[20] : null,
                'alfa'   => is_numeric($row[21]) ? $row[21] : null,
                'id_ta'  => $ta['id_ta'],
            ]);

            $sukses++;
        }

        $db->transComplete();

        return $this->response->setJSON([
            'status' => true,
            'sukses' => $sukses,
            'gagal'  => $gagal
        ]);
    }


    public function nilai()
    {


        return view('guru/dashboard', []);
    }

    public function finalkanNilai()
    {
        try {

            if (!$this->request->isAJAX()) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Bukan AJAX'
                ]);
            }

            $idKelas = $this->request->getPost('id_kelas');

            $konfirmasiModel = new \App\Models\KonfirmasiModel();

            if ($konfirmasiModel->isFinal($idKelas)) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Sudah final'
                ]);
            }

            $konfirmasiModel->insert([
                'id_kelas'   => $idKelas,
                'keterangan' => 'final'
            ]);

            return $this->response->setJSON([
                'status' => 'success'
            ]);
        } catch (\Throwable $e) {

            return $this->response->setJSON([
                'status'  => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
}
