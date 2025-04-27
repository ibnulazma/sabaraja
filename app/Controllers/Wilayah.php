<?php

namespace App\Controllers;

use App\Models\ModelWilayah;


class Wilayah extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelWilayah = new ModelWilayah();
    }



    public function dataKabupaten($id_provinsi)
    {
        $data = $this->ModelWilayah->getKabupaten($id_provinsi);
        echo '<option>--Pilih Kabupaten--</option>';
        foreach ($data as $value) {
            echo '<option value="' . $value['id_kabupaten'] . '">' . $value['city_name'] . '</option>';
        }
    }
    public function dataKecamatan($id_kabupaten)
    {
        $data = $this->ModelWilayah->getKecamatan($id_kabupaten);
        echo '<option>--Pilih Kecamatan--</option>';
        foreach ($data as $value) {
            echo '<option value="' . $value['id_kecamatan'] . '">' . $value['nama_kecamatan'] . '</option>';
        }
    }
    public function dataDesa($id_kecamatan)
    {
        $data = $this->ModelWilayah->getDesa($id_kecamatan);
        echo '<option>--Pilih Desa/Kelurahan--</option>';
        foreach ($data as $value) {
            echo '<option value="' . $value['id_desa'] . '">' . $value['desa'] . '</option>';
        }
    }
}
