<?php

namespace App\Controllers;

use App\Models\ModelTa;
use App\Models\ModelSekolah;
use App\Models\ModelJenjang;
use App\Models\ModelSiswa;
use App\Models\ModelPeserta;
use App\Models\ModelGuru;
use App\Models\ModelKelas;
use App\Models\ModelSetting;

use Ifsnop\Mysqldump\Mysqldump;

class Admin extends BaseController
{

    public function __construct()
    {
        helper('form');
        helper('terbilang');

        $this->ModelTa      = new ModelTa();
        $this->ModelSekolah = new ModelSekolah();
        $this->ModelJenjang = new ModelJenjang();
        $this->ModelSiswa   = new ModelSiswa();
        $this->ModelPeserta = new ModelPeserta();
        $this->ModelGuru    = new ModelGuru();
        $this->ModelKelas    = new ModelKelas();
        $this->ModelSetting = new ModelSetting();
    }

    public function index()
    {
        session();
        $data = [
            'title'             => 'SIAKADINKA',
            'subtitle'          => 'Dashboard',
            'menu'              => 'admin',
            'submenu'           => 'admin',
            'jumlahaktif'       => $this->ModelPeserta->jumlahAktif(),
            'jumlahtidakaktif'  => $this->ModelPeserta->jumlahNonAktif(),
            'jumlahptk'         => $this->ModelGuru->jumlahGuru(),
            'grupkelas'        => $this->ModelKelas->kelas_grup(),
            // 'siswa'            => $this->ModelPeserta->verifikasi(),
            'jumlahkelas'      => $this->ModelKelas->jumlahkelas(),

            // 'pager'            => $this->ModelPeserta->pager,
            'baru'            => $this->ModelPeserta->jml_baru(),
            'profil' => $this->ModelSetting->Profile(),
            // 'tahun'  => $this->ModelTa->tahun()


        ];
        return view('admin/v_dashboard', $data);
    }



    public function daftarMurid()
    {
        session();

        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'PPDB',
            'ppdb'          => $this->ModelPpdb->AllData(),
            'sekolah'       => $this->ModelSekolah->AllData(),
            'ta'            => $this->ModelTa->statusTa(),
            'jenjang'       => $this->ModelJenjang->AllData(),
        ];
        return view('ppdb/v_index', $data);
    }

    public function cetak()
    {
        session();

        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'PPDB',
            'ppdb'          => $this->ModelPpdb->AllData(),
            'sekolah'       => $this->ModelSekolah->AllData(),
            'ta'            => $this->ModelTa->statusTa(),
            'jenjang'       => $this->ModelJenjang->AllData(),
        ];
        return view('ppdb/v_cetak', $data);
    }


    public function tambahSiswa()
    {
        session();

        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Add Siswa',
            'ppdb'          => $this->ModelPpdb->AllData(),
            'ta'            => $this->ModelTa->tahun(),
            'sekolah'       => $this->ModelSekolah->AllData(),
            'jenjang'       => $this->ModelJenjang->AllData(),
            'validation'    =>  \Config\Services::validation(),

        ];
        return view('ppdb/v_add', $data);
    }


    public function backup()
    {
        try {
            $tglSekarang = date('dym');
            $dump = new Mysqldump('mysql:host=localhost;dbname=db_siakad;port=3306', 'root', '');
            $dump->start('database/databasesiakad-' . $tglSekarang . '.sql');

            $pesan = "Backup berhasil";
            session()->setFlashdata('pesan', $pesan);
            return redirect()->to('admin');
        } catch (\Exception $e) {
            $pesan = "mysqldump-php error " . $e->getMessage();
            session()->setFlashdata('pesan', $pesan);
            return redirect()->to('admin');
        }
    }

    public function lembaran()
    {
        session();

        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Add Siswa',


        ];
        return view('admin/lembaran1', $data);
    }


    public function bukuinduk($id_siswa)
    {
        $data = [
            'title' => 'Buku Induk Siswa-SIAKAD',
            'siswa'     => $this->ModelPeserta->DataPeserta($id_siswa)
        ];
        return view('admin/bukuinduk', $data);
    }
}
