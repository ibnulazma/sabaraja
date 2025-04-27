<?php

namespace App\Controllers;

use App\Models\ModelAgama;

class Agama extends BaseController
{


    public function __construct()
    {
        helper('form');
        $this->ModelAgama = new ModelAgama();
    }

    public function index()
    {


        $data = [
            'title'      => 'SIAKADINKA',
            'subtitle'      => 'Agama',
            'agama'    => $this->ModelAgama->AllData(),
            'isi'        => 'admin/v_agama'

        ];
        return view('admin/v_agama', $data);
    }

    public function add()
    {
        $data = [
            'agama' => $this->request->getPost('agama'),
        ];
        $this->ModelAgama->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        return redirect()->to(base_url('agama'));
    }
    public function edit($id_agama)
    {
        $data = [
            'id_agama' => $id_agama,
            'agama' => $this->request->getPost('agama'),
        ];
        $this->ModelAgama->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('tingkat'));
    }

    public function delete($id_agama)
    {
        $data = [
            'id_agama' => $id_agama,
        ];
        $this->ModelAgama->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to(base_url('agama'));
    }
}
