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
}
