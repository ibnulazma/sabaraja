<?php

namespace App\Controllers;

use App\Models\ModelTinggal;

class Tinggal extends BaseController
{


    public function __construct()
    {
        helper('form');
        $this->ModelTinggal = new ModelTinggal();
    }

    public function index()
    {

        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Add Tinggal',
            'tinggal'    => $this->ModelTinggal->AllData(),


        ];
        return view('admin/v_tinggal', $data);
    }

    public function add()
    {
        $data = [
            'tinggal' => $this->request->getPost('tinggal'),
        ];
        $this->ModelTinggal->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        return redirect()->to(base_url('tinggal'));
    }
    public function edit($id_tinggal)
    {
        $data = [
            'id_tinggal' => $id_tinggal,
            'tinggal' => $this->request->getPost('tinggal'),
        ];
        $this->Modeltinggal->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('tingkat'));
    }

    public function delete($id_tinggal)
    {
        $data = [
            'id_tinggal' => $id_tinggal,
        ];
        $this->Modeltinggal->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to(base_url('tinggal'));
    }
}
