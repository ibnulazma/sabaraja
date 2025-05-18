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
use App\Models\ModelSetting;
use App\Models\ModelAuth;

use Ifsnop\Mysqldump\Mysqldump;

class Kelulusan extends BaseController
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
        $this->ModelAuth = new ModelAuth();
    }

    public function index()
    {
        session();
        $data = [
            'validation'    =>  \Config\Services::validation(),
        ];
        return view('lulus/index', $data);
    }



    public function logout()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('nama');
        session()->remove('foto');
        session()->remove('level');
        session()->setFlashdata('pesan', 'Thanks, Are You Logged Out!!');
        return redirect()->to(base_url('home'));
    }
}
