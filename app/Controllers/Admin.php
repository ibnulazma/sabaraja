<?php

namespace App\Controllers;

use App\Models\ModelTa;
use App\Models\ModelSekolah;
use App\Models\ModelJenjang;
use App\Models\ModelSiswa;
use App\Models\ModelPeserta;
use App\Models\ModelWilayah;
use App\Models\ModelGuru;
use App\Models\ModelKelas;
use App\Models\ModelMaintenance;
use App\Models\ModelSetting;



use Ifsnop\Mysqldump\Mysqldump;

class Admin extends BaseController
{

    public function __construct()
    {
        helper('form');
        helper('terbilang');

        $this->ModelTa      = new ModelTa();
        $this->ModelSekolah = new ModelSekolah();
        $this->ModelJenjang = new ModelJenjang();
        $this->ModelSiswa   = new ModelSiswa();
        $this->ModelPeserta = new ModelPeserta();
        $this->ModelGuru    = new ModelGuru();
        $this->ModelKelas    = new ModelKelas();
        $this->ModelSetting = new ModelSetting();
        $this->ModelWilayah = new ModelWilayah();
    }

    public function index()
    {

        $model = new \App\Models\ModelAdmin();
        session();



        $data = [
            'title'             => 'SIAKADINKA',
            'subtitle'          => 'Dashboard',
            'menu'              => 'admin',
            'submenu'           => 'admin',
            'jumlahaktif'       => $this->ModelPeserta->jumlahAktif(),
            'jumlahtidakaktif'  => $this->ModelPeserta->jumlahNonAktif(),
            'jumlahptk'         => $this->ModelGuru->jumlahGuru(),
            'grupkelas'        => $this->ModelKelas->kelas_grup(),
            // 'siswa'            => $this->ModelPeserta->verifikasi(),
            // 'provinsi'      => $this->ModelWilayah->getProvinsi(),
            'rekapkelas' => $model->jumlahSiswaPerKelas(),
            'jumlahkelas'      => $this->ModelKelas->jumlahkelas(),

            // 'pager'            => $this->ModelPeserta->pager,
            'baru'            => $this->ModelPeserta->jml_baru(),
            'profil' => $this->ModelSetting->Profile(),
            // 'tahun'  => $this->ModelTa->tahun()




        ];

        $total_laki = 0;
        $total_perempuan = 0;
        $total_siswa = 0;

        foreach ($data['rekapkelas'] as $r) {
            $total_laki += $r['jumlah_laki'];
            $total_perempuan += $r['jumlah_perempuan'];
            $total_siswa += $r['total_siswa'];
        }

        $data['total_laki'] = $total_laki;
        $data['total_perempuan'] = $total_perempuan;
        $data['total_siswa'] = $total_siswa;
        return view('admin/v_dashboard', $data);
    }

    public function setting()
    {
        session();

        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Add Siswa',
            'menu'              => 'maintenance',
            'submenu'           => 'maintenance',
            'siswa'       => $this->ModelPeserta->aktif(),
            'guru'       => $this->ModelGuru->AllData(),



        ];
        return view('admin/setting', $data);
    }

    public function daftarMurid()
    {
        session();

        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'PPDB',
            'ppdb'          => $this->ModelPpdb->AllData(),
            'sekolah'       => $this->ModelSekolah->AllData(),
            'ta'            => $this->ModelTa->statusTa(),
            'jenjang'       => $this->ModelJenjang->AllData(),
        ];
        return view('ppdb/v_index', $data);
    }


    public function toggleMaintenance()
    {
        $settingsModel = new ModelMaintenance();
        $current = $settingsModel->getMaintenance();

        $newStatus = ($current['value'] == '1') ? '0' : '1';
        $settingsModel->setMaintenance($newStatus);

        return redirect()->back()->with('success', 'Status maintenance berhasil diubah');
    }



    public function resetPasswordSiswa()
    {
        if (session()->get('level') != 1) {
            return $this->response->setJSON(['status' => 'forbidden']);
        }

        $offset = (int)$this->request->getPost('offset');

        $db = \Config\Database::connect();
        $builder = $db->table('tbl_siswa');

        $total = $builder->countAll();

        $steps = 20;

        if ($total <= 20) {
            $limit = 1; // biar progress tetap kelihatan jalan
        } else {
            $limit = ceil($total / $steps);
        }

        $data = $builder->select('id_siswa, nisn')
            ->limit($limit, $offset)
            ->get()->getResultArray();

        $updated = 0;

        foreach ($data as $row) {
            $pass = !empty(trim($row['nisn'])) ? trim($row['nisn']) : 'Kamil123';

            $builder->where('id_siswa', $row['id_siswa'])->update([
                'password' => password_hash($pass, PASSWORD_DEFAULT),
                'password_default' => 1
            ]);

            $updated++;
        }

        return $this->response->setJSON([
            'status' => 'ok',
            'updated' => $updated,
            'next' => $offset + $limit,
            'total' => $total,
            'csrf' => csrf_hash()
        ]);
    }



    public function resetPasswordGuru()
    {
        if (session()->get('level') != 1) {
            return $this->response->setJSON(['status' => 'forbidden']);
        }

        $offset = (int)$this->request->getPost('offset');


        $db = \Config\Database::connect();
        $builder = $db->table('tbl_guru');

        $total = $builder->countAll();
        $steps = 20;

        if ($total <= 20) {
            $limit = 1; // biar progress tetap kelihatan jalan
        } else {
            $limit = ceil($total / $steps);
        }

        $data = $builder->select('id_guru, nik_guru')
            ->limit($limit, $offset)
            ->get()->getResultArray();

        $updated = 0;

        foreach ($data as $row) {
            $pass = !empty(trim($row['nik_guru'])) ? trim($row['nik_guru']) : 'Kamil123';

            $builder->where('id_guru', $row['id_guru'])->update([
                'password' => password_hash($pass, PASSWORD_DEFAULT),
                'password_default' => 1
            ]);

            $updated++;
        }

        return $this->response->setJSON([
            'status' => 'ok',
            'updated' => $updated,
            'next' => $offset + $limit,
            'total' => $total,
            'csrf' => csrf_hash()
        ]);
    }
}
