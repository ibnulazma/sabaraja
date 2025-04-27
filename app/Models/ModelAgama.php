<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAgama extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_agama')
            ->orderBy('id_agama', 'DESC')
            ->get()->getResultArray();
    }
    public function add($data)
    {
        $this->db->table('tbl_agama')
            ->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_agama')
            ->where('id_agama', $data['id_agama'])
            ->update($data);
    }
    public function delete_data($data)
    {
        $this->db->table('tbl_agama')
            ->where('id_agama', $data['id_agama'])
            ->delete($data);
    }
}
