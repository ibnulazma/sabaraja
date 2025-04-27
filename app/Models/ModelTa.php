<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTa extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_ta')
            ->orderBy('id_ta', 'ASC')
            ->get()->getResultArray();
    }
    public function add($data)
    {
        $this->db->table('tbl_ta')
            ->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_ta')
            ->where('id_ta', $data['id_ta'])
            ->update($data);
    }
    public function delete_data($data)
    {
        $this->db->table('tbl_ta')
            ->where('id_ta', $data['id_ta'])
            ->delete($data);
    }
    public function resetstatus()
    {
        $this->db->table('tbl_ta')
            ->update(['status' => 0]);
    }
    public function statusTa()
    {
        $this->db->table('tbl_ta')
            ->where('status', '0')
            ->get()
            ->getRowArray();
    }
    public function tahun()
    {
        return $this->db->table('tbl_ta')
            ->where('status', '1')
            ->get()->getRowArray();
    }

    // public function group_tahun()
    // {
    //     $builder = $this->db->table('tbl_siswa');
    //     $builder->select('tahun, COUNT("ta") AS jumlah');
    //     $builder->groupBy('tahun');
    //     $query = $builder->get();
    //     return $query;
    // }
}
