<?php

namespace App\Controllers;

use App\Models\ModelPendidikan;

class Pendidikan extends BaseController
{


    public function __construct()
    {
        helper('form');
        $this->ModelPendidikan = new ModelPendidikan();
    }

    public function index()
    {


        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Pendidikan',
            'pendidikan'    => $this->ModelPendidikan->AllData(),
            'isi'        => 'admin/v_pendidikan'

        ];
        return view('admin/v_pendidikan', $data);
    }

    public function add()
    {
        $data = [
            'pendidikan' => $this->request->getPost('pendidikan'),
        ];
        $this->ModelPendidikan->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        return redirect()->to(base_url('pendidikan'));
    }
    public function edit($id_pendidikan)
    {
        $data = [
            'id_pendidikan' => $id_pendidikan,
            'pendidikan' => $this->request->getPost('pendidikan'),
        ];
        $this->ModelPendidikan->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('tingkat'));
    }

    public function delete($id_pendidikan)
    {
        $data = [
            'id_pendidikan' => $id_pendidikan,
        ];
        $this->ModelPendidikan->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to(base_url('pendidikan'));
    }
}
