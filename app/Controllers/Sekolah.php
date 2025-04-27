<?php

namespace App\Controllers;

use App\Models\ModelSekolah;
use App\Models\ModelJenjang;

class Sekolah extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelSekolah = new ModelSekolah();
        $this->ModelJenjang = new ModelJenjang();
    }
    public function index()
    {
        $data = [

            'title' => 'SIAKADINKA',
            'subtitle' => 'Sekolah',
            'sekolah'  => $this->ModelSekolah->AllData(),
            'jenjang'  => $this->ModelJenjang->AllData(),
            'isi'   => 'admin/v_sekolah'

        ];
        return view('admin/v_sekolah', $data);
    }
    public function add()
    {
        $data = [
            'sekolah'    => $this->request->getPost('sekolah'),
            'id_jenjang'    => $this->request->getPost('id_jenjang'),

        ];
        $this->ModelSekolah->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        return redirect()->to(base_url('sekolah'));
    }

    public function edit($id_sekolah)
    {
        $data = [
            'id_sekolah'    => $id_sekolah,
            'id_jenjang'    => $this->request->getPost('id_jenjang'),
            'sekolah'       => $this->request->getPost('sekolah'),

        ];
        $this->ModelSekolah->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('sekolah'));
    }

    public function delete($id_sekolah)
    {
        $data = [
            'id_sekolah' => $id_sekolah,
        ];
        $this->ModelSekolah->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to(base_url('sekolah'));
    }
}
