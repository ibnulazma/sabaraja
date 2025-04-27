<?php

namespace App\Controllers;

use App\Models\ModelPenghasilan;

class Penghasilan extends BaseController
{


    public function __construct()
    {
        helper('form');
        $this->ModelPenghasilan = new ModelPenghasilan();
    }

    public function index()
    {


        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Penghasilan',
            'penghasilan'    => $this->ModelPenghasilan->AllData(),
            'isi'        => 'admin/v_penghasilan'

        ];
        return view('admin/v_penghasilan', $data);
    }

    public function add()
    {
        $data = [
            'penghasilan' => $this->request->getPost('penghasilan'),
        ];
        $this->ModelPenghasilan->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        return redirect()->to(base_url('penghasilan'));
    }
    public function edit($id_penghasilan)
    {
        $data = [
            'id_penghasilan' => $id_penghasilan,
            'penghasilan' => $this->request->getPost('penghasilan'),
        ];
        $this->ModelPenghasilan->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('penghasilan'));
    }

    public function delete($id_penghasilan)
    {
        $data = [
            'id_penghasilan' => $id_penghasilan,
        ];
        $this->ModelPenghasilan->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to(base_url('penghasilan'));
    }
}
