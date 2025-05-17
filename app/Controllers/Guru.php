<?php

namespace App\Controllers;

use App\Models\ModelGuru;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Guru extends BaseController
{


    public function __construct()
    {
        helper('formatindo');
        helper('form');
        $this->ModelGuru = new ModelGuru();
    }

    public function index()
    {


        $data = [
            'title'      => 'SIAKADINKA',
            'subtitle'      => 'PTK',
            'menu'      => 'guru',
            'submenu'      => 'guru',
            'guru'    => $this->ModelGuru->AllData(),


        ];
        return view('admin/v_guru', $data);
    }

    public function add()
    {
        if ($this->validate([
            'nama_guru' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!!!'
                ]
            ],
            'niy' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!!!',

                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!!!'
                ]
            ],

        ])) {


            $data = array(
                'nama_guru' => $this->request->getPost('nama_guru'),
                'niy'     => $this->request->getPost('niy'),
                'password'  => $this->request->getPost('password'),
                'kelamin'  => $this->request->getPost('kelamin'),
                'status_aktif'  => 1,

            );

            // $foto->move('foto', $nama_file);
            $this->ModelGuru->add($data);
            session()->setFlashdata('pesan', 'Guru Berhasil Ditambah !!!');
            return redirect()->to(base_url('guru'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('guru'));
        }
    }

    public function templateGuru()
    {


        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'NIY');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Password');

        $writer = new Xlsx($spreadsheet);
        header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment:filename=datanilai.xlsx');
        header('Cache-Control:max-age=0');
        $writer->save('php://output');
        exit();
    }
    public function upload()
    {

        $db     = \Config\Database::connect();

        $ta = $db->table('tbl_ta')
            ->where('status', '1')
            ->get()->getRowArray();

        $validation = \Config\Services::validation();
        $valid = $this->validate(
            [
                'fileimport' => [
                    'label' => 'Input File',
                    'rules' => 'uploaded[fileimport]|ext_in[fileimport,xls,xlsx]',
                    'error' => [
                        'uploaded' => '{field} wajib diisi',
                        'ext_in' => '{field} harus ekstensi xls atau xlsx'
                    ]
                ]
            ]
        );

        if (!$valid) {


            $this->session->setFlashdata('pesan', $validation->getError('fileimport'));
            return redirect()->to('guru');
        } else {

            $file = $this->request->getFile('fileimport');
            $ext = $file->getClientExtension();

            if ($ext == 'xls') {
                $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $render->load($file);
            $data = $spreadsheet->getActiveSheet()->toArray();


            $jumlaherror = 0;
            $jumlahsukses = 0;
            foreach ($data as $x => $row) {
                if ($x == 0) {
                    continue;
                }

                $niy            = $row[1];
                $nama           = $row[2];
                $password       = $row[3];

                $db = \Config\Database::connect();

                $ceknonis = $db->table('tbl_guru')->getWhere(['niy' => $niy])->getResult();

                if (count($ceknonis) > 0) {
                    $jumlaherror++;
                } else {
                    $datasimpan = [
                        'niy'                  => $niy,
                        'nama_guru'            => $nama,
                        'password'              => $password,
                        'id_ta'                 => $ta['id_ta'],
                    ];

                    $db->table('tbl_guru')->insert($datasimpan);
                    $jumlahsukses++;
                }
            }
            $this->session->setFlashdata('sukses', "$jumlaherror Data tidak bisa disimpan <br> $jumlahsukses Data bisa disimpan");
            return redirect()->to('guru');
        }
    }



    public function editwalas($niy)
    {
        $data = [
            'niy' => $niy,
            'nama_guru' => $this->request->getPost('nama_guru'),
            'walas' => $this->request->getPost('walas'),

        ];
        $this->ModelGuru->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('guru'));
    }
    public function nonaktif($id_guru)
    {
        $data = [
            'id_guru' => $id_guru,
            'status_aktif' => 0,
        ];
        $this->ModelGuru->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('guru'));
    }
}
