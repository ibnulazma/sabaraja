<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMaintenance extends Model
{
    protected $table = 'tbl_setting';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_setting', 'value'];

    public function getMaintenance()
    {
        return $this->where('nama_setting', 'maintenance')->first();
    }

    public function setMaintenance($status)
    {
        return $this->where('nama_setting', 'maintenance')
            ->set(['value' => $status])
            ->update();
    }
}
