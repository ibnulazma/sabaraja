<?php

namespace App\Controllers;

use App\Models\ModelKelas;
use App\Models\ModelGuru;
use App\Models\ModelTa;
use App\Models\ModelNilai;
use App\Models\ModelPeserta;
use App\Models\ModelSetting;
use \Dompdf\Dompdf;
use \Dompdf\Options;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// use \Dompdf\Options;

// use TCPDF;


class Kelas extends BaseController
{
    public function __construct()
    {

        helper('formatindo');
        helper('form');
        helper('terbilang');
        $this->ModelKelas = new ModelKelas();
        $this->ModelGuru = new ModelGuru();
        $this->ModelTa = new ModelTa();
        $this->ModelNilai = new ModelNilai();
        $this->ModelPeserta = new ModelPeserta();
        $this->ModelSetting = new ModelSetting();
    }

    public function index()
    {

        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Rombongan Kelas',
            'menu'          => 'kelas',
            'submenu'       => 'kelas',
            'kelas'         => $this->ModelKelas->AllData(),
            'guru'          => $this->ModelGuru->walikelas(),
            'tingkat'       => $this->ModelKelas->Tingkat(),
            'grupkelas'        => $this->ModelKelas->kelas_grup(),

        ];
        return view('admin/kelas/v_rombel', $data);
    }

    public function add()
    {
        $db     = \Config\Database::connect();

        $ta = $db->table('tbl_ta')
            ->where('status', '1')
            ->get()->getRowArray();


        $data = [
            'kelas' => $this->request->getPost('kelas'),
            'id_guru' => $this->request->getPost('id_guru'),
            'id_tingkat' => $this->request->getPost('id_tingkat'),
            'id_ta' => $ta['id_ta']
        ];
        $this->ModelKelas->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        return redirect()->to(base_url('kelas'));
    }

    public function edit($id_kelas)
    {
        $data = [
            'id_kelas'  => $id_kelas,
            'id_guru'     => $this->request->getPost('id_guru'),
            'id_tingkat'     => $this->request->getPost('id_tingkat'),
            'kelas'     => $this->request->getPost('kelas'),
        ];
        $this->ModelKelas->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('kelas'));
    }

    public function delete($id_kelas)
    {
        $data = [
            'id_kelas' => $id_kelas,
        ];
        $this->ModelKelas->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to(base_url('kelas'));
    }


    // RINCIAN KELAS
    public function rincian_kelas($id_kelas)
    {

        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Kelola Daftar Peserta Didik ',
            'menu'          => 'akademik',
            'submenu'       => 'kelas',
            'kelas'         => $this->ModelKelas->detail($id_kelas),
            'jml_siswa'     => $this->ModelKelas->jml_siswa($id_kelas),
            'datasiswa'     => $this->ModelKelas->datasiswa($id_kelas),
            'tidakpunya'    => $this->ModelKelas->siswablmpuna(),
            // 'tingkat'       => $this->ModelKelas->SiswaTingkat(),
        ];
        return view('admin/kelas/v_rincian_kelas', $data);
    }

    // 

    // BUKU INDUK

    public function tambahanggota($id_kelas)
    {

        $kelas = $this->ModelKelas->detail($id_kelas);
        $id_siswa       = $_POST['id_siswa'];
        $nisn       = $_POST['nisn'];
        $id_kelas   = $_POST['id_kelas'];
        $id_ta   = $_POST['id_ta'];

        $jml_siswa = count($id_siswa);
        for ($i = 0; $i < $jml_siswa; $i++) {
            $data = array(
                'id_siswa' => $id_siswa[$i],
                'id_kelas' => $id_kelas[$i],
                'id_ta' => $id_ta[$i],
                'nisn' => $nisn[$i]
            );
            $this->ModelKelas->add_data($data);
        }
        session()->setFlashdata('pesan', 'Siswa Berhasil Di Tambahkan !!!');
        return redirect()->to(base_url('admin/kelas/rincian_kelas/' . $kelas['id_kelas']));
    }


    /////

    //ADD SISWA PERKELAS


    //HAPUS ANGGOTA KELAS

    public function hapusanggota($id_database)
    {
        $kelas = $this->ModelKelas->getKelasByDatabase($id_database);

        if (!$kelas) {
            session()->setFlashdata('pesan', 'Data kelas tidak ditemukan');
            return redirect()->back();
        }

        $this->ModelKelas->hapus($id_database);

        session()->setFlashdata('pesan', 'Siswa berhasil dihapus dari kelas');

        return redirect()->to(
            base_url('admin/kelas/rincian_kelas/' . $kelas['id_kelas'])
        );
    }




    //NILAI

    public function nilai($id_kelas)
    {

        // $kelas = $this->ModelKelas->detail($id_kelas);
        // $data = [
        //     'title'         => 'SIAKADINKA',
        //     'subtitle'      => 'Data Siswa Kelas ' . $kelas['kelas'],
        //     'menu'          => 'akademik',
        //     'submenu'       => 'kelas',
        //     'kelas'         => $kelas,
        //     'jml_siswa'     => $this->ModelKelas->jml_siswa($id_kelas),
        //     'datanilai'     => $this->ModelKelas->datanilai($id_kelas),
        // ];
        // return view('admin/kelas/v_nilai', $data);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->setOptions($options);
        $dompdf->output();

        $path = base_url('/foto/logo.png');

        $data = [
            'nilai'         => $this->ModelKelas->datanilai($id_kelas),
            'image_url'   => "<img src='data:image/png;base64,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'>"
        ];
        $html = view('admin/kelas/nilairapot', $data);
        //Atur Gambar

        $dompdf->loadHtml($html);
        $dompdf->setPaper('Legal', 'potrait');
        $dompdf->render();
        $dompdf->stream('data siswa kelas.pdf', array(
            "Attachment" => false
        ));
        exit();
    }
    // LEGER
    public function ledger($id_kelas)
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->setOptions($options);
        $dompdf->output();

        $path = base_url('/foto/logo.png');


        $kelas = $this->ModelKelas->detail($id_kelas);
        $data = [
            'nilai'         => $this->ModelNilai->nilaikelas($id_kelas),
            'kelas'         => $kelas,

        ];
        $html = view('admin/kelas/ledger', $data);
        //Atur Gambar

        $dompdf->loadHtml($html);
        $dompdf->setPaper('Legal', 'landscape');
        $dompdf->render();
        $dompdf->stream('data siswa kelas.pdf', array(
            "Attachment" => false
        ));
        exit();
    }
    // Biodata Rapot
    public function print($id_kelas)
    {
        $dompdf = new Dompdf();
        $kelas = $this->ModelKelas->detail($id_kelas);
        $data = [
            'title'         => $kelas,
            'kelas'         => $kelas,
            'datasiswa'     => $this->ModelKelas->datasiswa($id_kelas),


            // 'tingkat'       => $this->ModelKelas->SiswaTingkat(),
        ];
        $html = view('admin/kelas/biodatasiswa', $data);
        //Atur Gambar

        $dompdf->loadHtml($html);
        $dompdf->setPaper('Legal', 'potrait');
        $dompdf->render();
        $dompdf->stream('biodata rapot .pdf', array(
            "Attachment" => false
        ));
        exit();
    }







    // Halaman Depan
    public function halaman($id_kelas)
    {

        $dompdf = new Dompdf();
        $kelas = $this->ModelKelas->detail($id_kelas);
        $data = [
            'title'         =>  $kelas,
            'kelas'         => $kelas,
            'datasiswa'     => $this->ModelKelas->datasiswa($id_kelas),


            // 'tingkat'       => $this->ModelKelas->SiswaTingkat(),
        ];
        $html = view('admin/kelas/halaman', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('Legal', 'potrait');
        $dompdf->render();
        $dompdf->stream('data siswa kelas.pdf', array(
            "Attachment" => false
        ));
        exit();
    }

    // Label Nama
    public function label($id_kelas)
    {

        $dompdf = new Dompdf();
        $kelas = $this->ModelKelas->detail($id_kelas);
        $data = [
            'title'         =>   $kelas,
            'kelas'         => $kelas,
            'datasiswa'     => $this->ModelKelas->datasiswa($id_kelas),


            // 'tingkat'       => $this->ModelKelas->SiswaTingkat(),
        ];
        $html = view('admin/kelas/label', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream('data siswa kelas.pdf', array(
            "Attachment" => false
        ));
        exit();
    }


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

        // Tahun aktif
        $ta = $db->table('tbl_ta')
            ->where('status', '1')
            ->get()
            ->getRowArray();

        $kelas = $this->ModelKelas->detail($id_kelas);

        // VALIDASI FILE
        if (!$this->validate([
            'fileimport' => [
                'rules' => 'uploaded[fileimport]|ext_in[fileimport,xls,xlsx]',
                'errors' => [
                    'uploaded' => 'File wajib diupload',
                    'ext_in'   => 'File harus Excel (xls / xlsx)'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $file = $this->request->getFile('fileimport');
        $ext  = $file->getClientExtension();

        $reader = ($ext == 'xls')
            ? new \PhpOffice\PhpSpreadsheet\Reader\Xls()
            : new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadsheet = $reader->load($file);
        $rows = $spreadsheet->getActiveSheet()->toArray();

        $jumlahSukses = 0;
        $jumlahError  = 0;

        // TRANSAKSI (AMAN)
        $db->transStart();

        foreach ($rows as $i => $row) {

            // skip header
            if ($i == 0) continue;

            // skip baris kosong
            if (empty($row[1])) continue;

            $nisn     = trim($row[1]);
            $pai      = is_numeric($row[2]) ? $row[2] : null;
            $pkn        = is_numeric($row[3]) ? $row[3] : null;
            $indo           = is_numeric($row[4]) ? $row[4] : null;
            $mtk           = is_numeric($row[5]) ? $row[5] : null;
            $ipa            = is_numeric($row[6]) ? $row[6] : null;
            $ips            = is_numeric($row[7]) ? $row[7] : null;
            $inggris        = is_numeric($row[8]) ? $row[8] : null;
            $sbk            = is_numeric($row[9]) ? $row[9] : null;
            $pjok           = is_numeric($row[10]) ? $row[10] : null;
            $prky           = is_numeric($row[11]) ? $row[11] : null;
            $tik            = is_numeric($row[12]) ? $row[12] : null;
            $tjwd           = is_numeric($row[13]) ? $row[13] : null;
            $trjmh          = is_numeric($row[14]) ? $row[14] : null;
            $fiqih          = is_numeric($row[15]) ? $row[15] : null;
            $mhd            = is_numeric($row[16]) ? $row[16] : null;
            $btq            = is_numeric($row[17]) ? $row[17] : null;
            $sakit          = is_numeric($row[18]) ? $row[18] : null;
            $izin           = is_numeric($row[19]) ? $row[19] : null;
            $alfa           = is_numeric($row[20]) ? $row[20] : null;

            // CEK DUPLIKAT (nisn + tahun ajaran)
            $cek = $db->table('tbl_nilai')
                ->where('nisn', $nisn)
                ->where('id_ta', $ta['id_ta'])
                ->get()
                ->getRow();

            if ($cek) {
                $jumlahError++;
                continue;
            }

            $db->table('tbl_nilai')->insert([
                'nisn'    => $nisn,
                'pai'     => $pai,
                'pkn'       => $pkn,
                'nisn'      => $nisn,
                'pai'       => $pai,
                'pkn '      => $pkn,
                'indo'      => $indo,
                'mtk'       => $mtk,
                'ipa'       => $ipa,
                'ips'       => $ips,
                'inggris'   => $inggris,
                'sbk'       => $sbk,
                'pjok'      => $pjok,
                'prky'      => $prky,
                'tik'       => $tik,
                'tjwd'      => $tjwd,
                'trjmh '    => $trjmh,
                'fiqih '    => $fiqih,
                'mhd '      => $mhd,
                'btq '      => $btq,
                'sakit '    => $sakit,
                'izin '     => $izin,
                'alfa '     => $alfa,
                'id_ta'   => $ta['id_ta']
            ]);

            $jumlahSukses++;
        }

        $db->transComplete();

        session()->setFlashdata('swal', [
            'title' => 'Upload Nilai',
            'html'  => "Berhasil: <b>$jumlahSukses</b><br>Gagal: <b>$jumlahError</b>",
            'icon'  => ($jumlahError > 0) ? 'warning' : 'success'
        ]);

        return redirect()->to('kelas/rincian_kelas/' . $kelas['id_kelas']);
    }




    public function halamansiswa($nisn)
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->setOptions($options);
        $dompdf->output();


        $data = [
            'halaman'     => $this->ModelKelas->halamansiswa($nisn),


        ];
        $html = view('admin/kelas/halamansiswa', $data);
        //Atur Gambar

        $dompdf->loadHtml($html);
        $dompdf->setPaper('Legal', 'potrait');
        $dompdf->render();
        $dompdf->stream('data siswa kelas.pdf', array(
            "Attachment" => false
        ));
        exit();
    }

    public function biodatasiswa($nisn)
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->setOptions($options);
        $dompdf->output();


        $data = [
            'profile' => $this->ModelSetting->Profile(),
            'biodata'     => $this->ModelKelas->halamansiswa($nisn),
        ];
        $html = view('admin/kelas/biodatasiswa', $data);
        //Atur Gambar

        $dompdf->loadHtml($html);
        $dompdf->setPaper('Legal', 'potrait');
        $dompdf->render();
        $dompdf->stream('data siswa kelas.pdf', array(
            "Attachment" => false
        ));
        exit();
    }

    public function bukuinduk($id_siswa)
    {
        $data = [
            'title' => 'Buku Induk Siswa-SIAKAD',
            'siswa'     => $this->ModelPeserta->DataPeserta($id_siswa),
            'kelas'     => $this->ModelKelas->AllData()
        ];
        return view('admin/kelas/bukuinduk', $data);
    }



    public function labelsiswa($id_siswa)
    {

        $dompdf = new Dompdf();

        $data = [
            'title' => 'Buku Induk Siswa-SIAKAD',
            'label'     => $this->ModelPeserta->DataPeserta($id_siswa),
            'kelas'     => $this->ModelKelas->AllData()
        ];
        $html = view('admin/kelas/labelsiswa', $data);
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream('data siswa kelas.pdf', array(
            "Attachment" => false
        ));
        exit();
    }
}
