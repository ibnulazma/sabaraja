<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTinggal extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_tinggal')
            ->orderBy('id_tinggal', 'ASC')
            ->get()->getResultArray();
    }
    public function add($data)
    {
        $this->db->table('tbl_tinggal')
            ->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_tinggal')
            ->where('id_tinggal', $data['id_tinggal'])
            ->update($data);
    }
    public function delete_data($data)
    {
        $this->db->table('tbl_tinggal')
            ->where('id_tinggal', $data['id_tinggal'])
            ->delete($data);
    }
}
