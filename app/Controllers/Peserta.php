<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPeserta;
use App\Models\ModelKelas;
use App\Models\ModelSetting;
use App\Models\ModelWilayah;
use App\Models\ModelTinggal;
use App\Models\ModelTransportasi;
use App\Models\ModelPenghasilan;
use App\Models\ModelPekerjaan;
use App\Models\ModelPendidikan;
use App\Models\MPeserta;
use \Dompdf\Options;
use \Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use \PhpOffice\PhpSpreadsheet\Style;
use Ramsey\Uuid\Uuid;


class Peserta extends BaseController
{


    public function __construct()
    {
        helper('nomorhp');
        helper('formatindo');
        helper('form');
        helper('terbilang');
        helper('secure');
        helper('form_lock');




        $this->ModelPeserta = new ModelPeserta();
        $this->ModelKelas = new ModelKelas();
        $this->ModelSetting = new ModelSetting();
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelPekerjaan = new ModelPekerjaan();
        $this->ModelTinggal = new ModelTinggal();
        $this->ModelTransportasi = new ModelTransportasi();
        $this->ModelPenghasilan = new ModelPenghasilan();
        $this->ModelPendidikan = new ModelPendidikan();
    }











    public function index()
    {

        session();
        $data = [
            'title'      => 'SIAKADINKA',
            'subtitle'   => 'Peserta Didik',
            'menu'       => 'peserta',
            'submenu'    => 'peserta',
            'tingkat'    => $this->ModelKelas->Tingkat(),
            'peserta'    => $this->ModelPeserta->aktif(),
            'jumlverifikasi'    => $this->ModelPeserta->jmlverifikasi(),
            'naik'    => $this->ModelPeserta->naik(),
            'keluar'    => $this->ModelPeserta->keluar(),
            'lulusan'    => $this->ModelPeserta->lulusan(),
            'verifikasi'    => $this->ModelPeserta->verifikasi(),
            'lulus'    => $this->ModelPeserta->lulus(),
            'jmlverif'    => $this->ModelPeserta->koreksi(),
            'blmaktif'    => $this->ModelPeserta->blmaktif()

        ];
        return view('admin/peserta/v_peserta', $data);
    }


    public function verifikasi($hash)
    {
        $db = \Config\Database::connect();

        // Decode hash ke ID asli
        $id_siswa = decrypt_id($hash);

        // Cek apakah siswa ada
        $siswa = $db->table('tbl_siswa')->where('id_siswa', $id_siswa)->get()->getRowArray();

        if (!$siswa) {
            session()->setFlashdata('pesan', 'Siswa tidak ditemukan!');
            return redirect()->to(base_url('admin/peserta'));
        }

        // Update status verifikasi
        $db->table('tbl_siswa')->where('id_siswa', $id_siswa)->update(['status_daftar' => 3]);

        session()->setFlashdata('pesan', 'Siswa berhasil diverifikasi!');
        return redirect()->to(base_url('admin/peserta/detail_siswa/' . $hash));
    }



    public function add()
    {


        $db     = \Config\Database::connect();
        $ta = $db->table('tbl_ta')
            ->where('status', '1')
            ->get()->getRowArray();
        $nisn = $this->request->getPost('nisn');

        session();

        if ($this->validate([
            'nama_siswa' => [
                'label' => 'Nama Lengkap',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!!!'
                ]
            ],
            'nisn' => [
                'label' => 'NISN',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!!!',

                ]
            ],


        ])) {


            $db     = \Config\Database::connect();


            $data = array(
                'nama_siswa'        => $this->request->getPost('nama_siswa'),
                'jenis_kelamin'     => $this->request->getPost('jenis_kelamin'),
                'nik'               => $this->request->getPost('nik'),
                'nama_ibu'          => $this->request->getPost('nama_ibu'),
                'tempat_lahir'      => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir'     => $this->request->getPost('tanggal_lahir'),
                'nisn'          => $nisn,


                // 🔐 Password otomatis dari NISN + di-hash
                'password'      => password_hash($nisn, PASSWORD_DEFAULT),
                'id_tingkat'        =>  $this->request->getPost('id_tingkat'),
                'status_daftar'     =>  1,
                'aktif'             =>  1,
                'id_ta'             => $ta['id_ta'],
                'password_default'  => 1,
                'uuid' => Uuid::uuid4()->toString(),

            );
            $this->ModelPeserta->add($data);
            session()->setFlashdata('pesan', 'Peserta Berhasil Ditambah !!!');
            return redirect()->to(base_url('admin/peserta'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('admin/peserta'));
        }
    }


    public function detail_siswa($hash)
    {
        helper('secure');



        try {
            $id_siswa = decrypt_id($hash); // ⬅️ hasil dekripsi dipakai
        } catch (\Exception $e) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $db = \Config\Database::connect();
        $hasil = $db->table('tbl_penghasilan')->get()->getResultArray();

        $data = [
            'title'         => 'SIAKAD',
            'subtitle'      => 'Profil Siswa',
            'menu'          => 'peserta',
            'submenu'       => 'peserta',
            'provinsi'      => $this->ModelWilayah->getProvinsi(),
            'tinggal'       => $this->ModelTinggal->AllData(),
            'transportasi'  => $this->ModelTransportasi->AllData(),
            'kerja'         => $this->ModelPekerjaan->AllData(),
            'pilihkelas'    => $this->ModelPeserta->kelas(),
            'didik'         => $this->ModelPendidikan->AllData(),
            'hasil'         => $hasil,
            'hash'  => $hash,

            // 🔽 sekarang pakai ID hasil decrypt
            'siswa'         => $this->ModelPeserta->DataPeserta($id_siswa),
            'rekamdidik'    => $this->ModelPeserta->rekamdidik($id_siswa),
            'datasiswa'     => $this->ModelPeserta->linkwa($id_siswa),

            $siswa = $this->ModelPeserta->DataPeserta($id_siswa),
            'bolehEdit' => ($siswa['reset_biodata'] == 1),



            'validation'    => \Config\Services::validation(),
        ];

        if (!$data['siswa']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('admin/peserta/v_detail_siswa', $data);
    }






    public function data_siswa()
    {
        $model = new MPeserta();
        $listing = $model->get_datasiswa();

        $data = array();
        $no = $_POST['start'];
        foreach ($listing as $key) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $key->nama_lengkap;
            $row[] = $key->id_tingkat;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "data"  => $data
        );
        echo json_encode($output);
    }

    public function siswa_edit($id_siswa)
    {
        $data = [
            'id_siswa' => $id_siswa,
            'status_daftar' => 1
        ];
        $this->ModelPeserta->edit($data);
        session()->setFlashdata('pesan', 'Reset Berhasil !!!');
        return redirect()->to(base_url('peserta'));
    }
    public function keluar($id_siswa)
    {
        $data = [
            'id_siswa' => $id_siswa,
            'aktif' => 0,
            'status_daftar' => 5,
            'status' => $this->request->getPost('status'),
            'alasan' => $this->request->getPost('alasan'),
            'sekolah' => $this->request->getPost('sekolah'),
            'tgl_ajuan' => $this->request->getPost('tgl_ajuan'),
        ];
        $this->ModelPeserta->edit($data);
        session()->setFlashdata('pesan', 'Proses Keluar Berhasil !!!');
        return redirect()->to(base_url('peserta'));
    }

    public function downloadtemplate()
    {
        // $siswa = $this->ModelKelas->datasiswa($id_kelas);
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'NO');
        $sheet->setCellValue('B1', 'NISN');
        $sheet->setCellValue('C1', 'Nama');
        $sheet->setCellValue('D1', 'Jenis Kelamin');
        $sheet->setCellValue('E1', 'Tempat Lahir');
        $sheet->setCellValue('F1', 'Tanggal Lahir');
        $sheet->setCellValue('G1', 'Nama Ibu');
        $sheet->setCellValue('H1', 'NIK');
        $sheet->setCellValue('I1', 'Tingkat');

        $sheet->getStyle('A1:J1')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A1:J1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFFD700');

        // $column = 2;
        // foreach ($siswa as  $key => $value) {
        //     $sheet->setCellValue('A' . $column, ($column - 1));
        //     $sheet->setCellValue('B' . $column, $value['nama_siswa']);
        //     $sheet->setCellValue('C' . $column, $value['nisn']);
        //     $column++;
        // }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment:filename=datanilai.xlsx');
        header('Cache-Control:max-age=0');
        $writer->save('php://output');
        exit();
    }


    // ======= PROGRESS IMPORT





    // ======IMPORT EXCEL

    public function importExcel()
    {
        $db = \Config\Database::connect();
        $ta = $db->table('tbl_ta')->where('status', 1)->get()->getRowArray();
        $file = $this->request->getFile('file_excel');

        if (!$file->isValid()) {
            return $this->response->setJSON(['status' => 'error', 'msg' => 'File tidak valid']);
        }

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file->getTempName());
        $rows = $spreadsheet->getActiveSheet()->toArray();

        $db = \Config\Database::connect();
        $builder = $db->table('tbl_siswa');

        $total = count($rows) - 1; // tanpa header
        $inserted = 0;
        $skipped = 0;

        foreach ($rows as $i => $row) {
            if ($i == 0) continue; // Lewati header

            // =========================
            // SKIP BARIS KOSONG
            // =========================
            if (
                empty($row[1]) && empty($row[2]) && empty($row[3]) &&
                empty($row[4]) && empty($row[5])
            ) {
                $skipped++;
                continue;
            }

            $nisn = trim($row[1]);

            // =========================
            // CEK DUPLIKAT NISN
            // =========================
            $cek = $builder->where('nisn', $nisn)->countAllResults();
            if ($cek > 0) {
                $skipped++;
                continue;
            }

            // =========================
            // SIAPKAN DATA INSERT
            // =========================
            $data = [
                'nisn'          => $nisn,
                'nama_siswa'    => trim($row[2]),
                'jenis_kelamin' => trim($row[3]),
                'tempat_lahir'  => trim($row[4]),
                'tanggal_lahir' => date('Y-m-d', strtotime($row[5])),
                'nama_ibu'      => trim($row[6]),
                'nik'           => trim($row[7]),
                'id_tingkat'    => trim($row[8]),
                'password'      => password_hash($nisn, PASSWORD_DEFAULT), // PASSWORD DARI NISN
                'id_ta'         => $ta['id_ta'],
                'status_daftar' => 1,
                'password_default' => 1,
                'aktif' => 1,
                'uuid' => Uuid::uuid4()->toString(),
            ];

            $builder->insert($data);
            $inserted++;

            // =========================
            // KIRIM PROGRESS REALTIME
            // =========================
            echo json_encode([
                'progress' => round((($inserted + $skipped) / $total) * 100)
            ]);
            ob_flush();
            flush();
        }

        echo json_encode([
            'progress' => 100,
            'status'   => 'done',
            'inserted' => $inserted,
            'skipped'  => $skipped
        ]);
    }





    // =====IMPORT SISWA EXCEL




    public function reset($id_siswa)
    {
        $data = [
            'id_siswa' => $id_siswa,
            'status_daftar' => 1
        ];
        $this->ModelPeserta->edit($data);
        session()->setFlashdata('pesan', 'Reset Berhasil !!!');
        return redirect()->to(base_url('peserta'));
    }

    public function editbiodata($hash)
    {

        try {
            $id_siswa = decrypt_id($hash);
        } catch (\Exception $e) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $data = [

            'nama_siswa'    => $this->request->getPost('nama_siswa'),
            'tempat_lahir'  => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'nisn'          => $this->request->getPost('nisn'),
            'nama_ibu'   => $this->request->getPost('nama_ibu'),
        ];
        $this->ModelPeserta->edit($id_siswa, $data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('peserta'));
    }



    public function editdata($id_siswa)
    {
        $data = [
            'title' => 'Buku Induk Siswa-SIAKAD',
            'siswa'     => $this->ModelPeserta->DataPeserta($id_siswa)
        ];
        return view('admin/editdata', $data);
    }

    public function delete($id_siswa)
    {
        $db     = \Config\Database::connect();

        $data = [
            'id_siswa' => $id_siswa,
        ];
        $db->table('tbl_siswa')->delete($data);

        session()->setFlashdata('pesan', 'Peserta Didik Berhasil Di Hapus !!!');
        return redirect()->to(base_url('peserta'));
    }

    public function print($id_siswa)
    {
        $dompdf = new Dompdf();

        $data = [
            'title'         =>  'Biodata Siswa',
            'datasekolah'   =>  $this->ModelSetting->Profile(),
            'siswa'     => $this->ModelPeserta->Data($id_siswa),


            // 'tingkat'       => $this->ModelKelas->SiswaTingkat(),
        ];
        $html = view('admin/peserta/print', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream('data siswa kelas.pdf', array(
            "Attachment" => false
        ));
    }

    public function edit_identitas($hash)
    {
        try {
            $id_siswa = decrypt_id($hash);
        } catch (\Exception $e) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $data = [
            'id_siswa'                 => $id_siswa,
            'nama_siswa'                => $this->request->getPost('nama_siswa'),
            'nisn'                    => $this->request->getPost('nisn'),
            'nik'                    => $this->request->getPost('nik'),
            'no_kk'                    => $this->request->getPost('no_kk'),
            'tempat_lahir'           => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir'          => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin'          => $this->request->getPost('jenis_kelamin'),
        ];

        $this->ModelPeserta->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('admin/peserta/detail_siswa/'  . $hash);
    }





    public function edit_tinggal($hash)
    {

        try {
            $id_siswa = decrypt_id($hash);
        } catch (\Exception $e) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $data = [
            'id_siswa'                   => $id_siswa,
            'tinggal'               => $this->request->getPost('tinggal'),
            'transportasi'          => $this->request->getPost('transportasi'),
        ];
        $this->ModelPeserta->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('admin/peserta/detail_siswa/' . $hash);
    }


    public function edit_register($hash)
    {
        try {
            $id_siswa = decrypt_id($hash);
        } catch (\Exception $e) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $data = [
            'id_siswa'                   => $id_siswa,
            'nis'                   => $this->request->getPost('nis'),
            'anak_ke'               => $this->request->getPost('anak_ke'),
            'berat'                 => $this->request->getPost('berat'),
            'tinggi'                => $this->request->getPost('tinggi'),
            'jml_saudara'           => $this->request->getPost('jml_saudara'),
            'hobi'                  => $this->request->getPost('hobi'),
            'telp_anak'             => $this->request->getPost('telp_anak'),
            'cita_cita'             => $this->request->getPost('cita_cita'),
            'lingkar'               => $this->request->getPost('lingkar'),
            'seri_ijazah'           => $this->request->getPost('seri_ijazah'),
        ];
        $this->ModelPeserta->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('admin/peserta/detail_siswa/' . $hash);
    }

    public function edit_ortu($hash)
    {
        try {
            $id_siswa = decrypt_id($hash);
        } catch (\Exception $e) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'id_siswa'              => $id_siswa,
            'nama_ayah'         => $this->request->getPost('nama_ayah'),
            'nama_ibu'          => $this->request->getPost('nama_ibu'),
            'nik_ayah'          => $this->request->getPost('nik_ayah'),
            'nik_ibu'           => $this->request->getPost('nik_ibu'),
            'tahun_ayah'        => $this->request->getPost('tahun_ayah'),
            'tahun_ibu'         => $this->request->getPost('tahun_ibu'),
            'didik_ayah'        => $this->request->getPost('didik_ayah'),
            'didik_ibu'         => $this->request->getPost('didik_ibu'),
            'kerja_ayah'        => $this->request->getPost('kerja_ayah'),
            'kerja_ibu'         => $this->request->getPost('kerja_ibu'),
            'hasil_ayah'        => $this->request->getPost('hasil_ayah'),
            'hasil_ibu'         => $this->request->getPost('hasil_ibu'),
            'telp_ayah'         => nomorhp($this->request->getPost('telp_ayah')),
            'telp_ibu'          => nomorhp($this->request->getPost('telp_ibu')),



        ];
        $this->ModelPeserta->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('admin/peserta/detail_siswa/' . $hash);
    }


    public function edit_alamat($hash)
    {
        try {
            $id_siswa = decrypt_id($hash);
        } catch (\Exception $e) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'id_siswa'              => $id_siswa,
            'alamat'            => $this->request->getPost('alamat'),
            'rt'                => $this->request->getPost('rt'),
            'rw'                => $this->request->getPost('rw'),
            'provinsi'          => $this->request->getPost('provinsi'),
            'kabupaten'         => $this->request->getPost('kabupaten'),
            'kecamatan'         => $this->request->getPost('kecamatan'),
            'desa'              => $this->request->getPost('desa'),
            'kodepos'           => $this->request->getPost('kodepos'),
            'lokasi'           => $this->request->getPost('lokasi'),
        ];
        $this->ModelPeserta->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('admin/peserta/detail_siswa/' . $hash);
    }







    public function editfoto($id_siswa)
    {
        if ($this->validate([

            'foto_siswa' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto_siswa,1024]|mime_in[foto_siswa,image/png,image/jpg,image/gif,image/jpeg,image/ico]',
                'errors' => [
                    'max_size' => '{field} Max 1024 KB !!!!',
                    'mime_in' => 'Format {field} Harus PNG, JPG, JPEG, GIF, ICO !!!!',
                    'max_size' => 'Harus Size 1024Kb'
                ]
            ],
        ])) {

            //masukan foto ke input
            $foto = $this->request->getFile('foto_siswa');
            if ($foto->getError() == 4) {

                $data = array(
                    'nisn'   => $id_siswa,
                );
                $this->ModelPeserta->edit($data);
            } else {

                //menghapus fotolama
                $user = $this->ModelPeserta->detail_data($id_siswa);
                if ($user['foto_siswa'] != "") {
                    unlink('foto_siswa/' . $user['foto_siswa']);
                }
                //merename
                $nama_file = $foto->getRandomName();
                //jika valid
                $data = array(
                    'nisn'                  => $id_siswa,
                    'foto_siswa'            => $nama_file,
                );
                $foto->move('foto_siswa', $nama_file);
                $this->ModelPeserta->edit($data);
            }
            session()->setFlashdata('pesan', 'Foto Berhasil Diubah !!!');
            return redirect()->to(base_url('peserta/detail_siswa/' . $id_siswa));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('peserta/detail_siswa/' . $id_siswa));
        }
    }


    public function lulus()
    {
        // $siswa = $this->ModelPeserta->detail_data($id_siswa);
        $id_siswa           = $_POST['nisn'];
        $id_tingkat     = $_POST['id_tingkat'];
        $aktif          = $_POST['aktif'];
        $status_daftar  = $_POST['status_daftar'];
        $id_ta          = $_POST['id_ta'];
        $tahun_lulus  = $_POST['tahun_lulus'];


        $jml_siswa = count($id_siswa);
        for ($i = 0; $i < $jml_siswa; $i++) {
            $data = array(
                'nisn'          => $id_siswa[$i],
                'id_tingkat'    => $id_tingkat[$i],
                'aktif'         => $aktif[$i],
                'status_daftar' => $status_daftar[$i],
                'id_ta'         => $id_ta[$i],
                'tahun_lulus' =>      $tahun_lulus[$i],
            );
            $this->ModelPeserta->edit($data);
        }
        session()->setFlashdata('pesan', 'Siswa Berhasil Di Update !!!');
        return redirect()->to(base_url('peserta'));
    }
    public function naik()
    {
        // $siswa = $this->ModelPeserta->detail_data($id_siswa);
        $id_siswa           = $_POST['nisn'];
        $id_tingkat     = $_POST['id_tingkat'];
        $id_ta          = $_POST['id_ta'];


        $jml_siswa = count($id_siswa);
        for ($i = 0; $i < $jml_siswa; $i++) {
            $data = array(
                'nisn' =>       $id_siswa[$i],
                'id_tingkat' => $id_tingkat[$i],
                'id_ta' => $id_ta[$i],
            );
            $this->ModelPeserta->edit($data);
        }
        session()->setFlashdata('pesan', 'Siswa Berhasil Di Update !!!');
        return redirect()->to(base_url('peserta'));
    }

    public function eksporexcel()
    {
        $siswa = new ModelPeserta();
        $datasiswa = $siswa->AllData();

        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom 
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'NO');
        $sheet->setCellValue('B1', 'NISN');
        $sheet->setCellValue('C1', 'Nama Siswa');
        $sheet->setCellValue('D1', 'Jenis Kelamin');
        $sheet->setCellValue('E1', 'Kelas');
        $sheet->setCellValue('F1', 'No Wa Anaka');
        $sheet->setCellValue('G1', 'Nama Ibu');
        $sheet->setCellValue('H1', 'No. Wa Ibu');


        $sheet->getStyle('A1:H1')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A1:H1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFFD700');
        $column = 2;

        foreach ($datasiswa as $data) {

            $sheet->setCellValue('A' . $column, ($column - 1));
            $sheet->setCellValue('B' . $column, $data['nisn']);
            $sheet->setCellValue('C' . $column, $data['nama_siswa']);
            $sheet->setCellValue('D' . $column, $data['jenis_kelamin']);
            $sheet->setCellValue('E' . $column, $data['tingkat']);
            $sheet->setCellValue('F' . $column, $data['telp_anak']);
            $sheet->setCellValue('G' . $column, $data['nama_ibu']);
            $sheet->setCellValue('H' . $column, $data['telp_ibu']);
            $column++;
        }

        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Siswa';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function eksporpdf()
    {
        $dompdf = new Dompdf();

        $data = [
            'title'         =>  'Biodata Siswa',
            'siswa'     => $this->ModelPeserta->AllData(),

            // 'tingkat'       => $this->ModelKelas->SiswaTingkat(),
        ];
        $html = view('admin/peserta/eksporpdf', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('Legal', 'landscape');
        $dompdf->render();
        $dompdf->stream('data siswa.pdf', array(
            "Attachment" => false
        ));
    }





    public function uploadDokumen($hash)
    {
        $file = $this->request->getFile('file');
        try {
            $id_siswa = decrypt_id($hash);
        } catch (\Exception $e) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        if (!$file->isValid()) {
            return $this->response->setJSON([
                'status' => false,
                'msg' => 'File tidak valid'
            ]);
        }

        // ✅ Validasi ekstensi
        if ($file->getExtension() != 'pdf') {
            return $this->response->setJSON([
                'status' => false,
                'msg' => 'Harus file PDF'
            ]);
        }

        // ✅ Validasi ukuran maksimal 2MB
        if ($file->getSize() > 2 * 1024 * 1024) {
            return $this->response->setJSON([
                'status' => false,
                'msg' => 'Ukuran file maksimal 2MB'
            ]);
        }

        $db = \Config\Database::connect();
        $siswa = $db->table('tbl_siswa')
            ->where('id_siswa', $id_siswa)
            ->get()
            ->getRow();

        if (!$siswa) {
            return $this->response->setJSON([
                'status' => false,
                'msg' => 'Siswa tidak ditemukan'
            ]);
        }

        // ===============================
        // HAPUS FILE LAMA JIKA ADA
        // ===============================
        if (!empty($siswa->dokumen) && file_exists(FCPATH . $siswa->dokumen)) {
            unlink(FCPATH . $siswa->dokumen);
        }

        // ===============================
        // BUAT NAMA FILE BARU
        // ===============================
        $namaBersih = preg_replace('/[^A-Za-z0-9]/', '_', $siswa->nama_siswa);
        $namaFile   = $namaBersih . '.pdf';

        // simpan file
        $file->move(FCPATH . 'dokumen', $namaFile, true);

        // simpan ke database (TANPA kata "dokumen/" jika tidak mau)
        $db->table('tbl_siswa')
            ->where('id_siswa', $id_siswa)
            ->update([
                'dokumen' => $namaFile
            ]);

        return $this->response->setJSON([
            'status' => true,
            'msg' => 'Dokumen berhasil diupload'
        ]);
    }
}
