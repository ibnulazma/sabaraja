<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\RekapModel;
use App\Models\KelasModel;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class Rekap extends BaseController
{
    public function index()
    {
        $data = [
            'title'      => 'SIAKADINKA',
            'subtitle'   => 'Pusat Unduhan',
            'menu'       => 'rekap',
            'submenu'    => 'rekap',


        ];
        return view('admin/rekap', $data);
    }






    public function exportAbsensi()
    {
        $kelasModel = new KelasModel();
        $siswaModel = new RekapModel();

        $spreadsheet = new Spreadsheet();
        $sheetIndex = 0;

        $kelasList = $kelasModel->getKelas(); // semua kelas aktif

        foreach ($kelasList as $kelas) {

            // ======================
            // BUAT SHEET
            // ======================
            if ($sheetIndex > 0) {
                $spreadsheet->createSheet();
            }

            $spreadsheet->setActiveSheetIndex($sheetIndex);
            $sheet = $spreadsheet->getActiveSheet();

            // ======================
            // JUDUL
            // ======================
            $sheet->mergeCells('A1:AL1');
            $sheet->mergeCells('A2:AL2');
            $sheet->mergeCells('A3:AL3');

            $sheet->setCellValue('A1', 'DAFTAR HADIR SISWA');
            $sheet->setCellValue('A2', 'SMPS INSAN KAMIL');
            $sheet->setCellValue('A3', 'TAHUN PELAJARAN 2025/2026');

            foreach (['A1', 'A2', 'A3'] as $cell) {
                $sheet->getStyle($cell)->getFont()->setBold(true);
                $sheet->getStyle($cell)->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER);
            }

            // ======================
            // INFO ROMBEL
            // ======================
            $sheet->mergeCells('A4:AI4');
            $sheet->setCellValue(
                'A4',
                'Kelas : ' . $kelas['kelas'] .
                    ' | Semester : Ganjil | Wali Kelas : ' . ($kelas['nama_guru'] ?? '-')
            );

            // ======================
            // HEADER TABEL
            // ======================
            $sheet->mergeCells('A6:A8');
            $sheet->mergeCells('B6:B8');
            $sheet->mergeCells('C6:C8');
            $sheet->mergeCells('D6:D8');
            $sheet->mergeCells('E6:AI6');
            $sheet->mergeCells('E7:AI7');

            $sheet->setCellValue('A6', 'URUT');
            $sheet->setCellValue('B6', 'NISN / NIS');
            $sheet->setCellValue('C6', 'NAMA SISWA');
            $sheet->setCellValue('D6', 'L/P');
            $sheet->setCellValue('E6', 'Bulan Desember 2025');
            $sheet->setCellValue('E7', 'Tanggal');

            // Tanggal 1–31
            $col = 'E';
            for ($i = 1; $i <= 31; $i++) {
                // isi tanggal
                $sheet->setCellValue($col . '8', $i);

                // set lebar kolom = 3
                $sheet->getColumnDimension($col)->setWidth(3);

                $col++;
            }

            $sheet->mergeCells('AJ6:AJ7');
            $sheet->mergeCells('AK6:AK7');
            $sheet->mergeCells('AL6:AL7');

            $sheet->setCellValue('AJ6', 'H');
            $sheet->setCellValue('AK6', 'I');
            $sheet->setCellValue('AL6', 'S');

            $sheet->getColumnDimension('AJ')->setWidth(4);
            $sheet->getColumnDimension('AK')->setWidth(4);
            $sheet->getColumnDimension('AL')->setWidth(4);
            // ======================
            // STYLE HEADER
            // ======================
            $sheet->getStyle('A6:AI8')->getFont()->setBold(true);
            $sheet->getStyle('A6:AI8')->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                ->setVertical(Alignment::VERTICAL_CENTER);

            // ======================
            // DATA SISWA
            // ======================
            $siswaList = $siswaModel->getSiswaByKelas($kelas['id_kelas']);

            $row = 9;
            $no  = 1;
            $jmlL = 0;
            $jmlP = 0;

            foreach ($siswaList as $s) {
                $sheet->setCellValue('A' . $row, $no++);
                $sheet->setCellValue('B' . $row, $s['nis']);
                $sheet->setCellValue('C' . $row, $s['nama_siswa']);
                $sheet->setCellValue('D' . $row, $s['jenis_kelamin']);

                if ($s['jenis_kelamin'] == 'L') {
                    $jmlL++;
                } else {
                    $jmlP++;
                }

                $row++;
            }




            $sheet->setCellValue('A' . $row, 'Laki-laki');
            $sheet->setCellValue('D' . $row, $jmlL);

            $sheet->setCellValue('A' . ($row + 1), 'Perempuan');
            $sheet->setCellValue('D' . ($row + 1), $jmlP);
            // ======================
            // BORDER FULL
            // ======================
            $lastRow = $row - 1;

            $sheet->getStyle("A6:AL{$lastRow}")
                ->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                        ],
                    ],
                ]);

            // ======================
            // UKURAN KOLOM
            // ======================
            $sheet->getColumnDimension('A')->setWidth(6);
            $sheet->getColumnDimension('B')->setWidth(15);
            $sheet->getColumnDimension('C')->setWidth(30);
            $sheet->getColumnDimension('D')->setWidth(6);

            for ($c = 'E'; $c <= 'AI'; $c++) {
                $sheet->getColumnDimension($c)->setWidth(4);
            }

            // ======================
            // NAMA SHEET
            // ======================
            $sheet->setTitle($kelas['kelas']);

            $sheetIndex++;
        }

        // Aktifkan sheet pertama
        $spreadsheet->setActiveSheetIndex(0);

        // ======================
        // OUTPUT
        // ======================
        $filename = 'Absensi_Per_Kelas.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}
