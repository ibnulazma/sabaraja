<?php

namespace App\Controllers;

use App\Models\ModelTransportasi;

class Transportasi extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelTransportasi = new ModelTransportasi();
    }

    public function index()
    {

        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Add Transportasi',
            'transportasi'    => $this->ModelTransportasi->AllData(),
        ];
        return view('admin/v_transportasi', $data);
    }

    public function add()
    {
        $data = [
            'transportasi' => $this->request->getPost('transportasi'),
        ];
        $this->ModelTransportasi->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        return redirect()->to(base_url('transportasi'));
    }
    public function edit($id_transportasi)
    {
        $data = [
            'id_transportasi' => $id_transportasi,
            'transportasi' => $this->request->getPost('transportasi'),
        ];
        $this->ModelTransportasi->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('tingkat'));
    }

    public function delete($id_transportasi)
    {
        $data = [
            'id_transportasi' => $id_transportasi,
        ];
        $this->ModelTransportasi->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to(base_url('transportasi'));
    }
}
