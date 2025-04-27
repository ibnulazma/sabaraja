<?php

namespace App\Controllers;

// use App\Models\ModelAgama;

class Ppdb extends BaseController
{


    public function __construct()
    {
        helper('form');
    }

    public function index()
    {
        $data = [
            'title'      => 'SIAKADINKA',
            'subtitle'      => 'PPDB',
            'menu' => 'ppdb',
            'submenu' => 'ppdb',
        ];
        return view('admin/ppdb/formulir', $data);
    }

    public function formulir()
    {
        $data = [
            'title'      => 'SIAKADINKA',
            'subtitle'      => 'PPDB',
            'menu' => 'ppdb',
            'submenu' => 'ppdb',


        ];
        return view('admin/ppdb/formulir', $data);
    }

    public function tambahdaftar()
    {

        $alphanumeric = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        // $arr = array();
        $lenght = strlen($alphanumeric) - 2;
        for ($i = 0; $i < 5; $i++) {
            $x = rand(0, $lenght);
            $arr[] = $alphanumeric[$x];
        }

        $data = [
            'title'      => 'SIAKADINKA',
            'subtitle'      => 'PPDB',
            'menu' => 'ppdb',
            'submenu' => 'ppdb',
            'random' => $arr,


        ];
        return view('admin/ppdb/addpendaftar', $data);
    }


    public function laporan()
    {
        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Laporan PPDB',
            'menu'          => 'ppdb',
            'submenu'       => 'ppdb',



        ];
        return view('admin/ppdb/laporan', $data);
    }
}
