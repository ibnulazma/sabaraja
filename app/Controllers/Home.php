<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPeserta;



class Home extends BaseController
{

    public function __construct()
    {
        helper('form');
        helper('terbilang');

        $this->ModelPeserta = new ModelPeserta();
    }
    public function index()
    {
        return view('v_home');
    }

    public function datasiswa()
    {

        $data = [

            'contoh'       => $this->ModelPeserta->aktif(),



        ];
        return view('v_datasiswa', $data);
    }
}
