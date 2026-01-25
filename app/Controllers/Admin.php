<?php

namespace App\Controllers;

use App\Models\ModelTa;
use App\Models\ModelSekolah;
use App\Models\ModelJenjang;
use App\Models\ModelSiswa;
use App\Models\ModelPeserta;
use App\Models\ModelWilayah;
use App\Models\ModelGuru;
use App\Models\ModelKelas;
use App\Models\ModelMaintenance;
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
        $this->ModelWilayah = new ModelWilayah();
    }

    public function index()
    {

        $model = new \App\Models\ModelAdmin();
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
            // 'provinsi'      => $this->ModelWilayah->getProvinsi(),
            'rekapkelas' => $model->jumlahSiswaPerKelas(),
            'jumlahkelas'      => $this->ModelKelas->jumlahkelas(),

            // 'pager'            => $this->ModelPeserta->pager,
            'baru'            => $this->ModelPeserta->jml_baru(),
            'profil' => $this->ModelSetting->Profile(),
            // 'tahun'  => $this->ModelTa->tahun()




        ];

        $total_laki = 0;
        $total_perempuan = 0;
        $total_siswa = 0;

        foreach ($data['rekapkelas'] as $r) {
            $total_laki += $r['jumlah_laki'];
            $total_perempuan += $r['jumlah_perempuan'];
            $total_siswa += $r['total_siswa'];
        }

        $data['total_laki'] = $total_laki;
        $data['total_perempuan'] = $total_perempuan;
        $data['total_siswa'] = $total_siswa;
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

    public function dataKabupaten($id_provinsi)
    {

        $data = $this->ModelWilayah->getKabupaten($id_provinsi);
        echo '<option>--Pilih Kabupaten--</option>';
        foreach ($data as $value) {

            echo '<option value="' . $value['id_kabupaten'] . '">' . $value['city_name'] . '</option>';
        }
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



    public function toggleMaintenance()
    {
        $settingsModel = new ModelMaintenance();
        $current = $settingsModel->getMaintenance();

        $newStatus = ($current['value'] == '1') ? '0' : '1';
        $settingsModel->setMaintenance($newStatus);

        return redirect()->back()->with('success', 'Status maintenance berhasil diubah');
    }
}
