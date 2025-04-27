<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTransportasi extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_transportasi')
            ->orderBy('id_transportasi', 'ASC')
            ->get()->getResultArray();
    }
    public function add($data)
    {
        $this->db->table('tbl_transportasi')
            ->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_transportasi')
            ->where('id_transportasi', $data['id_transportasi'])
            ->update($data);
    }
    public function delete_data($data)
    {
        $this->db->table('tbl_transportasi')
            ->where('id_transportasi', $data['id_transportasi'])
            ->delete($data);
    }
}
