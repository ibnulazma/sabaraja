<?php

namespace App\Controllers;

use App\Models\MPeserta;


class Datatables extends BaseController
{

    public function index()
    {

        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Peserta Didik',
            'menu'      => 'akademik',
            'submenu'      => 'data',



        ];
        return view('admin/datatables/index', $data);
    }

    public function data_siswa()
    {
        $model = new MPeserta();
        // $Jk = $this->request->getPost('jenis_kelamin');



        $listing = $model->get_datatables();
        $jumlah_semua = $model->jumlah_semua();
        $jumlah_filter = $model->jumlah_filter();

        $data = array();
        $no = $_POST['start'];
        foreach ($listing as $key) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $key->nisn;
            $row[] = $key->nama_siswa;
            $row[] = $key->jenis_kelamin;
            $row[] = $key->tingkat;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $jumlah_semua->jml,
            "recordsFiltered" => $jumlah_filter->jml,
            "data"  => $data
        );
        echo json_encode($output);
    }
}
