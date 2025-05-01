<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPenghasilan extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_penghasilan')
            // ->orderBy('penghasilan', 'ASC')
            ->get()->getResultArray();
    }
    public function add($data)
    {
        $this->db->table('tbl_penghasilan')
            ->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_penghasilan')
            ->where('id_penghasilan', $data['id_penghasilan'])
            ->update($data);
    }
    public function delete_data($data)
    {
        $this->db->table('tbl_penghasilan')
            ->where('id_penghasilan', $data['id_penghasilan'])
            ->delete($data);
    }
}
