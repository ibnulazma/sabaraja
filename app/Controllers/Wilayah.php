<?php

namespace App\Controllers;

use App\Models\ModelWilayah;
use CodeIgniter\RESTful\ResourceController;

class Wilayah extends ResourceController
{
    protected $model;

    public function __construct()
    {
        $this->model = new ModelWilayah();
    }

    public function provinsi()
    {
        return $this->respond($this->model->getProvinsi());
    }

    public function kabupaten($id)
    {
        return $this->respond($this->model->getKabupaten($id));
    }

    public function kecamatan($id)
    {
        return $this->respond($this->model->getKecamatan($id));
    }

    public function desa($id)
    {
        return $this->respond($this->model->getDesa($id));
    }
}
