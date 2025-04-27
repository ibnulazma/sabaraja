<?php

namespace App\Controllers;

use App\Models\ModelJadwal;
use App\Models\ModelKelas;
use App\Models\ModelTa;
use App\Models\ModelMapel;


class Jadwal extends BaseController
{


    public function __construct()
    {
        helper('form');
        $this->ModelJadwal = new ModelJadwal();
        $this->ModelKelas = new ModelKelas();

        $this->ModelTa = new ModelTa();
        $this->ModelMapel = new ModelMapel();
    }

    public function index()
    {
        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Jadwal Pelajaran',
            'menu'          => 'akademik',
            'submenu'       => 'jadwal',
            'tingkat'   => $this->ModelKelas->Tingkat()


        ];
        return view('admin/jadwal/v_jadwal', $data);
    }








    public function rincian_jadwal($id_tingkat)
    {
        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Jadwal Pelajaran',
            'menu'          => 'akademik',
            'submenu'       => 'jadwal',

            'jadwal'        => $this->ModelJadwal->AllData($id_tingkat),
            'tingkat'       => $this->ModelMapel->detailTingkat($id_tingkat),
            'datamapel'     => $this->ModelJadwal->mapel($id_tingkat),
            'kelas'         => $this->ModelJadwal->kelas($id_tingkat),
            'guru'         => $this->ModelJadwal->DataGuru(),


        ];
        return view('admin/jadwal/v_detail', $data);
    }

    public function add($id_tingkat)
    {
        $data = [

            'id_mapel' => $this->request->getPost('id_mapel'),
            'id_kelas' => $this->request->getPost('id_kelas'),
            'id_guru' => $this->request->getPost('id_guru'),
            'hari' => $this->request->getPost('hari'),
            'waktu' => $this->request->getPost('waktu'),
            'id_tingkat' => $id_tingkat,

        ];
        $this->ModelJadwal->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        return redirect()->to(base_url('jadwal/rincian_jadwal/' . $id_tingkat));
    }
}
