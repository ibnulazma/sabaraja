<?php

namespace App\Models;

use CodeIgniter\Model;

class MPeserta extends Model
{

    var $column_order = array('idsiswa', 'nama_siswa', 'jenis_kelamin', 'nisn', 'tingkat');
    var $order = array('tingkat' => 'asc');

    function get_datatables()
    {
        //JK
        // if ($Jk == "") {
        //     $kondisi_JK = "";
        // } else {
        //     $kondisi_Jk = "AND jenis_kelamin";
        // }
        // search
        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $kondisi_search = "nama_siswa LIKE '%$search%' OR jenis_kelamin LIKE '%$search%' OR nisn LIKE '%$search%'";
        } else {
            $kondisi_search = "idsiswa != ''";
        }

        // order
        if ($_POST['order']) {
            $result_order = $this->column_order[$_POST['order']['0']['column']];
            $result_dir = $_POST['order']['0']['dir'];
        } else if ($this->order) {
            $order = $this->order;
            $result_order = key($order);
            $result_dir = $order[key($order)];
        }


        if ($_POST['length'] != -1);
        $db = db_connect();
        $builder = $db->table('tbl_siswa');
        $query = $builder->select('*')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            ->where($kondisi_search)
            // ->where('status_daftar','3')
            ->orderBy($result_order, $result_dir)
            ->limit($_POST['length'], $_POST['start'])
            ->get();
        return $query->getResult();
    }


    function jumlah_semua()
    {
        $sQuery = "SELECT COUNT(idsiswa) as jml FROM tbl_siswa ";
        $db = db_connect();
        $query = $db->query($sQuery)->getRow();
        return $query;
    }

    function jumlah_filter()
    {

        // if ($Jk == "") {
        //     $kondisi_JK = "";
        // } else {
        //     $kondisi_Jk = "AND jenis_kelamin";
        // }


        // kondisi_search
        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $kondisi_search = " AND (nama_siswa LIKE '%$search%'  OR jenis_kelamin LIKE '%$search%' OR nisn LIKE '%$search%')  ";
        } else {
            $kondisi_search = "";
        }
        $sQuery = "SELECT COUNT(idsiswa) as jml FROM tbl_siswa WHERE idsiswa != '' $kondisi_search";
        $db = db_connect();
        $query = $db->query($sQuery)->getRow();
        return $query;
    }
}
