<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Biodata Rapot</title>
</head>

<style>
    body {
        margin: 0;
        padding: 0;
    }

    .container {
        text-align: center;
        padding: 0;
    }

    .wrapper {
        margin-bottom: 100px;

    }

    table {
        width: 100%;
        font-size: 14px;
        margin-bottom: 20px;

    }

    .table2,
    td {
        text-align: left;
    }

    .table1 {
        border-collapse: collapse;

    }

    .table3 {
        border-collapse: collapse;

    }

    .table4 {
        border-collapse: collapse;
        width: 50%;

    }

    .table5 {
        border-collapse: collapse;
        width: 50%;

    }

    .center {
        text-align: center;
    }

    .table1,
    .th1,
    .td1 {
        border: 1px solid black;
    }

    .table3,
    .th3,
    .td3 {
        border: 1px solid black;
    }

    .table4,
    .th4,
    .td4 {
        border: 1px solid black;
    }

    .table5,
    .th5,
    .td5 {
        border: 1px solid black;
    }


    .tabel6 {
        width: 100%;
        /* margin-bottom: 100%; */
    }

    .vertical {
        vertical-align: top;
    }

    .borderbottom {
        border-bottom: 1px;
    }

    .smp {
        font-size: 30px;
        font-weight: bold;
    }

    hr {
        border: 2px solid black;
    }

    .image {
        width: 5px;
    }

    .table7 {
        width: 100%;
        border-bottom: 5px solid black;
        padding: 1px;
    }

    .judul {
        font-size: 18px;
    }

    .jalan {
        font-size: 15px;
    }

    @page {
        margin: 0.2in 0.5in 0.2in 0.5in;
    }
</style>

<body>
    <?php foreach ($nilai as $row) { ?>
        <div class="wrapper">
            <div class="header ">
                <table class="table7">
                    <tr>
                        <td class="image" width="30%"><?= $image_url ?></td>
                        <td width="40%">
                            <p class="center judul">YAYASAN SULUK INSAN KAMIL TARTILA <br>
                                <span class="smp">SMP INSAN KAMIL</span><br>
                                <span class="jalan">Jalan Raya Legok KM 06 N0 89 RT 07 RW 02 Legok-Tangerang</span>
                            </p>
                        </td>
                    </tr>
                </table>

            </div>
            <div class="container">
                <h5>HASIL PENGGALIAN POTENSI PSIKOMOTORIK MATA PELAJARAN<br>
                    (P3MP)
                </h5>

            </div>
            <table class="tabel2">
                <tr>
                    <td class="td2" width="20%">Nama Peserta Didik</td>
                    <td class="td2" width="5%">:</td>
                    <td class="td2" width="40%"><?= $row['nama_siswa'] ?></td>
                    <td class="td2" width="20%">Semester </td>
                    <td class="td2" width="5%">:</td>
                    <td>I (Ganjil)</td>
                </tr>
                <tr>
                    <td width="20%">NIS/NISN</td>
                    <td width="5%">:</td>
                    <td width="30%"><?= $row['nis'] ?>/<?= $row['nisn'] ?></td>
                    <td width="20%">Tahun Pelajaran </td>
                    <td width="5%">:</td>
                    <td>2023-2024</td>
                </tr>
                <tr>
                    <td width="20%">Kelas</td>
                    <td width="5%">:</td>
                    <td width="30%"><?= $row['kelas'] ?></td>
                </tr>

            </table>

            <table class="table1">
                <tr>
                    <th rowspan="2" class="th1">No</th>
                    <th rowspan="2" class="th1">Mata Pelajaran</th>
                    <th rowspan="2" class="th1">KKM</th>
                    <th colspan="2" class="th1">Nilai</th>
                    <th rowspan="2" class="th1">Deskripsi Kemajuan Belajar</th>
                </tr>
                <tr>
                    <th class="th1">Angka</th>
                    <th class="th1">Huruf</th>
                </tr>
                <tr>
                    <td class="td1 center">1</td>
                    <td class="td1">Pendidikan Agama Islam</td>
                    <td class="td1 center">65</td>
                    <td class="td1 center"><?= $row['pai'] ?></td>
                    <td class="td1"><?= ucwords(terbilang($row['pai'])) ?></td>
                    <td class="td1">
                        <?php
                        $kkm = '65';

                        if ($row['pai'] == $kkm) {
                            echo 'Tuntas';
                        } elseif ($row['pai'] < $kkm) {
                            echo 'Belum Tuntas';
                        } elseif ($row['pai'] > $kkm) {
                            echo 'Terlampaui';
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td class="td1 center">2</td>
                    <td class="td1">Pendidikan Kewarganegaraan</td>
                    <td class="td1 center">65</td>
                    <td class="td1 center"><?= $row['pkn'] ?></td>
                    <td class="td1"><?= ucwords(terbilang($row['pkn'])) ?></td>
                    <td class="td1">
                        <?php
                        $kkm = '65';

                        if ($row['pkn'] == $kkm) {
                            echo 'Tuntas';
                        } elseif ($row['pkn'] < $kkm) {
                            echo 'Belum Tuntas';
                        } elseif ($row['pkn'] > $kkm) {
                            echo 'Terlampaui';
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td class="td1 center">3</td>
                    <td class="td1">Bahasa Indonesia</td>
                    <td class="td1 center">65</td>
                    <td class="td1 center"><?= $row['indo'] ?></td>
                    <td class="td1"><?= ucwords(terbilang($row['indo'])) ?></td>
                    <td class="td1">
                        <?php
                        $kkm = '65';

                        if ($row['indo'] == $kkm) {
                            echo 'Tuntas';
                        } elseif ($row['indo'] < $kkm) {
                            echo 'Belum Tuntas';
                        } elseif ($row['indo'] > $kkm) {
                            echo 'Terlampaui';
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td class="td1 center">4</td>
                    <td class="td1">Matematika</td>
                    <td class="td1 center">65</td>
                    <td class="td1 center"><?= $row['mtk'] ?></td>
                    <td class="td1"><?= ucwords(terbilang($row['mtk'])) ?></td>
                    <td class="td1">
                        <?php
                        $kkm = '65';

                        if ($row['mtk'] == $kkm) {
                            echo 'Tuntas';
                        } elseif ($row['mtk'] < $kkm) {
                            echo 'Belum Tuntas';
                        } elseif ($row['mtk'] > $kkm) {
                            echo 'Terlampaui';
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td class="td1 center">5</td>
                    <td class="td1">Ilmu Pengetahuan Alam</td>
                    <td class="td1 center">65</td>
                    <td class="td1 center"><?= $row['ipa'] ?></td>
                    <td class="td1"><?= ucwords(terbilang($row['ipa'])) ?></td>
                    <td class="td1">
                        <?php
                        $kkm = '65';

                        if ($row['ipa'] == $kkm) {
                            echo 'Tuntas';
                        } elseif ($row['ipa'] < $kkm) {
                            echo 'Belum Tuntas';
                        } elseif ($row['ipa'] > $kkm) {
                            echo 'Terlampaui';
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td class="td1 center">6</td>
                    <td class="td1">Ilmu Pengetahuan Sosial</td>
                    <td class="td1 center">65</td>
                    <td class="td1 center"><?= $row['ips'] ?></td>
                    <td class="td1"><?= ucwords(terbilang($row['ips'])) ?></td>
                    <td class="td1">
                        <?php
                        $kkm = '65';

                        if ($row['ips'] == $kkm) {
                            echo 'Tuntas';
                        } elseif ($row['ips'] < $kkm) {
                            echo 'Belum Tuntas';
                        } elseif ($row['ips'] > $kkm) {
                            echo 'Terlampaui';
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td class="td1 center">7</td>
                    <td class="td1">Bahasa Inggris</td>
                    <td class="td1 center">65</td>
                    <td class="td1 center"><?= $row['inggris'] ?></td>
                    <td class="td1"><?= ucwords(terbilang($row['inggris'])) ?></td>
                    <td class="td1">
                        <?php
                        $kkm = '65';

                        if ($row['inggris'] == $kkm) {
                            echo 'Tuntas';
                        } elseif ($row['inggris'] < $kkm) {
                            echo 'Belum Tuntas';
                        } elseif ($row['inggris'] > $kkm) {
                            echo 'Terlampaui';
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td class="td1 center">8</td>
                    <td class="td1">Seni Budaya dan Kesenian</td>
                    <td class="td1 center">65</td>
                    <td class="td1 center"><?= $row['sbk'] ?></td>
                    <td class="td1"><?= ucwords(terbilang($row['sbk'])) ?></td>
                    <td class="td1">
                        <?php
                        $kkm = '65';

                        if ($row['sbk'] == $kkm) {
                            echo 'Tuntas';
                        } elseif ($row['sbk'] < $kkm) {
                            echo 'Belum Tuntas';
                        } elseif ($row['sbk'] > $kkm) {
                            echo 'Terlampaui';
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td class="td1 center">9</td>
                    <td class="td1">Prakarya</td>
                    <td class="td1 center">65</td>
                    <td class="td1 center"><?= $row['prky'] ?></td>
                    <td class="td1"><?= ucwords(terbilang($row['prky'])) ?></td>
                    <td class="td1">
                        <?php
                        $kkm = '65';

                        if ($row['prky'] == $kkm) {
                            echo 'Tuntas';
                        } elseif ($row['prky'] < $kkm) {
                            echo 'Belum Tuntas';
                        } elseif ($row['prky'] > $kkm) {
                            echo 'Terlampaui';
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td class="td1 center">10</td>
                    <td class="td1">Pendidikan Jasmani, Olah Raga dan Kesehatan</td>
                    <td class="td1 center">65</td>
                    <td class="td1 center"><?= $row['pjok'] ?></td>
                    <td class="td1"><?= ucwords(terbilang($row['pjok'])) ?></td>
                    <td class="td1">
                        <?php
                        $kkm = '65';

                        if ($row['pjok'] == $kkm) {
                            echo 'Tuntas';
                        } elseif ($row['pjok'] < $kkm) {
                            echo 'Belum Tuntas';
                        } elseif ($row['pjok'] > $kkm) {
                            echo 'Terlampaui';
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="6"><b>Kurikulum Mulok Unggulan</b></td>
                </tr>
                <tr>
                    <td class="td1 center">1</td>
                    <td class="td1">Tekonogi Informasi dan Komputer</td>
                    <td class="td1 center">65</td>
                    <td class="td1 center"><?= $row['tik'] ?></td>
                    <td class="td1"><?= ucwords(terbilang($row['tik'])) ?></td>
                    <td class="td1">
                        <?php
                        $kkm = '65';

                        if ($row['tik'] == $kkm) {
                            echo 'Tuntas';
                        } elseif ($row['tik'] < $kkm) {
                            echo 'Belum Tuntas';
                        } elseif ($row['tik'] > $kkm) {
                            echo 'Terlampaui';
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td class="td1 center">2</td>
                    <td class="td1">Baca Tulis Alquran</td>
                    <td class="td1 center">65</td>
                    <td class="td1 center"><?= $row['btq'] ?></td>
                    <td class="td1"><?= ucwords(terbilang($row['btq'])) ?></td>
                    <td class="td1">
                        <?php
                        $kkm = '65';

                        if ($row['btq'] == $kkm) {
                            echo 'Tuntas';
                        } elseif ($row['btq'] < $kkm) {
                            echo 'Belum Tuntas';
                        } elseif ($row['btq'] > $kkm) {
                            echo 'Terlampaui';
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td class="td1 center">3</td>
                    <td class="td1">Tajwid</td>
                    <td class="td1 center">65</td>
                    <td class="td1 center"><?= $row['tjwd'] ?></td>
                    <td class="td1"><?= ucwords(terbilang($row['tjwd'])) ?></td>
                    <td class="td1">
                        <?php
                        $kkm = '65';

                        if ($row['tjwd'] == $kkm) {
                            echo 'Tuntas';
                        } elseif ($row['tjwd'] < $kkm) {
                            echo 'Belum Tuntas';
                        } elseif ($row['tjwd'] > $kkm) {
                            echo 'Terlampaui';
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td class="td1 center">4</td>
                    <td class="td1">Terjemah</td>
                    <td class="td1 center">65</td>
                    <td class="td1 center"><?= $row['trjmh'] ?></td>
                    <td class="td1"><?= ucwords(terbilang($row['trjmh'])) ?></td>
                    <td class="td1">
                        <?php
                        $kkm = '65';

                        if ($row['trjmh'] == $kkm) {
                            echo 'Tuntas';
                        } elseif ($row['trjmh'] < $kkm) {
                            echo 'Belum Tuntas';
                        } elseif ($row['trjmh'] > $kkm) {
                            echo 'Terlampaui';
                        } ?></td>
                </tr>
                <tr>
                    <td class="td1 center">5</td>
                    <td class="td1">Fiqih</td>
                    <td class="td1 center">65</td>
                    <td class="td1 center"><?= $row['fiqih'] ?></td>
                    <td class="td1"><?= ucwords(terbilang($row['fiqih'])) ?></td>
                    <td class="td1">
                        <?php
                        $kkm = '65';

                        if ($row['fiqih'] == $kkm) {
                            echo 'Tuntas';
                        } elseif ($row['fiqih'] < $kkm) {
                            echo 'Belum Tuntas';
                        } elseif ($row['fiqih'] > $kkm) {
                            echo 'Terlampaui';
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td class="td1 center">6</td>
                    <td class="td1">Muhadhoroh</td>
                    <td class="td1 center">65</td>
                    <td class="td1 center"><?= $row['mhd'] ?></td>
                    <td class="td1"><?= ucwords(terbilang($row['mhd'])) ?></td>
                    <td class="td1">
                        <?php
                        $kkm = '65';

                        if ($row['mhd'] == $kkm) {
                            echo 'Tuntas';
                        } elseif ($row['mhd'] < $kkm) {
                            echo 'Belum Tuntas';
                        } elseif ($row['mhd'] > $kkm) {
                            echo 'Terlampaui';
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="td1 "><b>Jumlah</b></td>
                    <td class="td1 center">
                        <?php
                        $bagi = 16;
                        $jumlah =

                            $row['pai'] + $row['pkn'] + $row['indo'] + $row['mtk'] + $row['ipa'] + $row['ips']
                            + $row['inggris'] + $row['sbk'] + $row['prky'] + $row['tik'] + $row['btq'] + $row['trjmh'] + $row['tjwd'] + $row['mhd'] + $row['fiqih'] + $row['pjok'];
                        ?>

                        <?= $jumlah ?>

                    </td>
                    <td class="td1"></td>
                    <td class="td1"></td>
                </tr>
                <tr>
                    <td colspan="3" class="td1 "><b>Rata Rata</b></td>
                    <td class="td1 center"><?= round($jumlah / $bagi, 2) ?></td>
                    <td class="td1"></td>
                    <td class="td1"></td>
                </tr>

            </table>

            <table class="table3">
                <tr>
                    <th class="th3">No</th>
                    <th class="th3">PENGEMBANGAN DIRI</th>
                    <th class="th3">PREDIKAT</th>
                    <th class="th3">KETERANGAN</th>
                </tr>
                <tr>
                    <td class="td3 center">1</td>
                    <td class="td3"></td>
                    <td class="td3"></td>
                    <td class="td3"></td>

                </tr>
                <tr>
                    <td class="td3 center">2</td>
                    <td class="td3"></td>
                    <td class="td3"></td>
                    <td class="td3"></td>
                </tr>
                <tr>
                    <td class="td3 center">3</td>
                    <td class="td3"></td>
                    <td class="td3"></td>
                    <td class="td3"></td>
                </tr>
            </table>
            <table class="table3">
                <thead>
                    <tr>
                        <th class="th3" colspan="3">Akhlak dan Kepribadian</th>
                        <th class="th3" colspan="3">Ketidakhadiran </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="td3">1. Akhlak</td>
                        <td class="td3 center">:</td>
                        <td class="td3"></td>
                        <td class="td3">1. Sakit</td>
                        <td class="td3 center">:</td>
                        <td class="td3"><?= $row['sakit'] ?></td>
                    </tr>
                    <tr>
                        <td class="td3">2. Kepribadian</td>
                        <td class="td3 center">:</td>
                        <td class="td3"></td>
                        <td class="td3">2. Izin</td>
                        <td class="td3 center">:</td>
                        <td class="td3"><?= $row['izin'] ?></td>
                    </tr>
                    <tr>
                        <td class="td3"></td>
                        <td class="td3"></td>
                        <td class="td3"></td>
                        <td class="td3">3. Tanpa Keterangan</td>
                        <td class="td3 center">:</td>
                        <td class="td3"><?= $row['sakit'] ?></td>
                    </tr>
                </tbody>
            </table>
            <table class="table6">
                <tr>
                    <td width="35%"></td>
                    <td width="35%"></td>
                    <td>Tangerang, 25 September 2023</td>
                </tr>
                <tr>
                    <td width="35%"><b>Mengetahui,</b></td>
                    <td width="35%"></td>
                    <td width="30%"></td>
                </tr>
                <tr>
                    <td width="35%" height="80px" class="vertical"><b>Orang Tua</b></td>
                    <td width="35%" class="vertical"><b>Kepala Sekolah</b></td>
                    <td width="30%" class="vertical"><b>Wali Kelas</b></td>
                </tr>

                <tr>
                    <td width="35%"></td>
                    <td width="35%"></td>
                    <td width="30%"></td>
                </tr>

                <tr>
                    <td width="35%">(______________)</td>
                    <td width="35%">Fadilah, S.Ag</td>
                    <td width="30%"><?= $row['nama_guru'] ?></td>
                </tr>
            </table>
        </div>
    <?php } ?>
</body>

</html>