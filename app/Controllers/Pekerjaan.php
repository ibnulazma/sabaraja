<?php

namespace App\Controllers;

use App\Models\ModelPekerjaan;

class Pekerjaan extends BaseController
{


    public function __construct()
    {
        helper('form');
        $this->ModelPekerjaan = new ModelPekerjaan();
    }

    public function index()
    {


        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Add Pekerjaan',
            'pekerjaan'    => $this->ModelPekerjaan->AllData(),
            'isi'        => 'admin/v_tingkat'

        ];
        return view('admin/v_pekerjaan', $data);
    }

    public function add()
    {
        $data = [
            'pekerjaan' => $this->request->getPost('pekerjaan'),
        ];
        $this->ModelPekerjaan->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        return redirect()->to(base_url('pekerjaan'));
    }
    public function edit($id_pekerjaan)
    {
        $data = [
            'id_pekerjaan' => $id_pekerjaan,
            'pekerjaan' => $this->request->getPost('pekerjaan'),
        ];
        $this->ModelPekerjaan->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('tingkat'));
    }

    public function delete($id_pekerjaan)
    {
        $data = [
            'id_pekerjaan' => $id_pekerjaan,
        ];
        $this->ModelPekerjaan->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to(base_url('pekerjaan'));
    }
}
