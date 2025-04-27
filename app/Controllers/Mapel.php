<?php

namespace App\Controllers;

use App\Models\ModelMapel;
use App\Models\ModelKelas;
use App\Models\ModelGuru;
use App\Models\ModelTa;


class Mapel extends BaseController
{


    public function __construct()
    {
        helper('form');
        $this->ModelMapel = new ModelMapel();
        $this->ModelKelas = new ModelKelas();
        $this->ModelGuru = new ModelGuru();
        $this->ModelTa = new ModelTa();
    }

    public function index()
    {
        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Mata Pelajaran',
            'menu'          => 'akademik',
            'submenu'       => 'mapel',
            'mapel' => $this->ModelMapel->AllData(),
            'guru' => $this->ModelGuru->AllData(),
            'kelas' => $this->ModelKelas->AllData()
        ];

        return view('admin/mapel/v_mapel', $data);
    }


    // Data Mapel Berdasarkan Tingkat
    public function rincian_mapel($id_tingkat)
    {
        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Mata Pelajaran',
            'menu'          => 'akademik',
            'submenu'       => 'mapel',
            'mapel'          => $this->ModelMapel->rincianmapel($id_tingkat),
            'tingkat'        => $this->ModelMapel->detailTingkat($id_tingkat)
        ];
        return view('admin/mapel/v_detail', $data);
    }


    //Tambah Mapel
    public function add()
    {
        $db     = \Config\Database::connect();

        $ta = $db->table('tbl_ta')
            ->where('status', '1')
            ->get()->getRowArray();
        $data = [

            'kode_mapel'    => $this->request->getPost('kode_mapel'),
            'mapel'         => $this->request->getPost('mapel'),
            'kkm'           => $this->request->getPost('kkm'),
            'id_kelas'      => $this->request->getPost('id_kelas'),
            'id_guru'       => $this->request->getPost('id_guru'),
            'id_tahun'         =>  $ta['id_ta'],
        ];
        $this->ModelMapel->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        return redirect()->to(base_url('mapel'));
    }


    public function edit($id_mapel)
    {

        $data = [
            'id_mapel' => $id_mapel,
            'kode_mapel' => $this->request->getPost('kode_mapel'),
            'mapel' => $this->request->getPost('mapel'),
            'kkm' => $this->request->getPost('kkm'),
            'id_kelas' => $this->request->getPost('id_kelas'),
            'id_guru' => $this->request->getPost('id_guru'),
        ];
        $this->ModelMapel->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        return redirect()->to(base_url('mapel'));
    }



    public function delete($id_mapel)
    {

        $data = [
            'id_mapel' => $id_mapel,
        ];
        $this->ModelMapel->delet($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        return redirect()->to(base_url('mapel'));
    }
}
