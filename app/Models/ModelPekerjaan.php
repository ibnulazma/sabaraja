<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPekerjaan extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_pekerjaan')
            ->orderBy('id_pekerjaan', 'ASC')
            ->get()->getResultArray();
    }
    public function add($data)
    {
        $this->db->table('tbl_pekerjaan')
            ->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_pekerjaan')
            ->where('id_pekerjaan', $data['id_pekerjaan'])
            ->update($data);
    }
    public function delete_data($data)
    {
        $this->db->table('tbl_pekerjaan')
            ->where('id_pekerjaan', $data['id_pekerjaan'])
            ->delete($data);
    }
}
