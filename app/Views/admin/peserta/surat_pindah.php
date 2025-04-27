<?php

$db     = \Config\Database::connect();

$profile = $db->table('tbl_profile')
    ->get()->getRowArray();

?>

?>


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
        font-family: 'Times New Roman', Times, serif;
    }

    .container {
        text-align: center;
        padding: 0;
    }

    .wrapper {
        margin-bottom: 200px;

    }

    table {
        width: 100%;
        font-size: 12px;
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

    .akredit {
        font-size: 20px;
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
        font-size: 18px;
    }

    @page {
        margin: 0.2in 0.5in 0.2in 0.5in;
    }


    .judul1 {
        margin-bottom: 0;
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        text-decoration: underline;
        margin-top: -8px;

    }

    .nomor {
        margin-top: 0;
        text-align: center;
        font-size: 16px;
    }

    .isi {
        font-size: 16px;

    }

    .isi2 {
        font-size: 16px;
        margin-top: -50px;

    }

    .tabel {
        margin-left: 60px;
    }

    .tabel2 {
        font-size: 16px;
        /* margin-bottom: 50%; */
        /* width: 100%; */
    }

    .nama {
        font-size: 16px;
    }

    .lis {
        font-size: 16px;
    }

    .ttd {
        text-align: end;
    }

    .perihal {

        float: left
    }

    .tanggal {
        float: right
    }
</style>

<body>

    <div class="wrapper">
        <div class="header ">
            <table class="table7">
                <tr>
                    <td class="image" width="30%"><?= $image_url ?></td>
                    <td width="40%">
                        <p class="center judul">YAYASAN SULUK INSAN KAMIL TARTILA <br>
                            <span class="smp">SMP INSAN KAMIL</span><br>
                            <span class="akredit"><b>Terakreditasi B</b></span><br>
                            <span class="jalan">NPSN: <?= $profile['npsn'] ?></span><br>
                            <span class="jalan">Jalan Raya Legok KM 06 N0 89 RT 07 RW 02 Legok-Tangerang</span>
                        </p>
                    </td>
                </tr>
            </table>


        </div>
        <section>
            <h4 class="judul1">SURAT KETERANGAN PINDAH SEKOLAH</h4>
            <p class="nomor">NOMOR : ........./....../SMP-INKA/...../.....</p>
            <p class="isi">Yang bertanda tangan di bawah ini:</p>
            <div class="tabel">
                <table class="tabel2">
                    <tr>
                        <td width="30%">Nama </td>
                        <td width="1%">:</td>
                        <td width="60%"><?= $profile['kepsek'] ?></td>
                    </tr>
                    <tr>
                        <td>NIP</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td>Kepala Sekolah</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?= $profile['alamat'] ?></td>
                    </tr>
                </table>
            </div>


            <p class="isi">Menerangkan bahwa, berdasarkan permohonan orangtua/wali:</p>

            <div class="tabel">
                <table class="tabel2">
                    <tr>
                        <td width="30%">Nama Lengkap</td>
                        <td width="1%">:</td>
                        <td width="60%"><?= $keluar['nama_siswa'] ?></td>
                    </tr>
                    <tr>
                        <td width="30%">Jenis Kelamin</td>
                        <td width="1%">:</td>
                        <td width="60%"><?= $keluar['jenis_kelamin'] ?></td>
                    </tr>
                    <tr>
                        <td>TTL</td>
                        <td>:</td>
                        <td><?= $keluar['tempat_lahir'] ?>, <?= formatindo($keluar['tanggal_lahir']) ?></td>
                    </tr>
                    <tr>
                        <td>ASAL SEKOLAH</td>
                        <td>:</td>
                        <td>SMP INSAN KAMIL</td>
                    </tr>
                    <tr>
                        <td>NIPD/NISN</td>
                        <td>:</td>
                        <td><?= $keluar['nis'] ?>/<?= $keluar['nisn'] ?></td>
                    </tr>
                    <tr>
                        <td>KELAS</td>
                        <td>:</td>
                        <td><?= $keluar['tingkat'] ?> (<?= terbilang($keluar['tingkat']) ?>)</td>
                    </tr>
                    <tr>
                        <td>NAMA ORANG TUA </td>
                        <td>:</td>
                        <td><?= $keluar['nama_ayah'] ?></td>
                    </tr>
                    <tr>
                        <td>ALAMAT </td>
                        <td>:</td>
                        <td><?= $keluar['alamat'] ?> RT <?= $keluar['rt'] ?> RW <?= $keluar['rw'] ?> Desa/Kel <?= $keluar['desa'] ?></td>
                    </tr>
                    <tr>
                        <td>PINDAH/MELANJUTKAN KE </td>
                        <td>:</td>
                        <td><?= $keluar['sekolah'] ?></td>
                    </tr>
                </table>
            </div>
            <p class="nama">Nama tersebut telah pindah dari SMP Insan Kamil sesuai surat permohonan oleh bersangkutan dan orang tua/wali peserta didik.</p>
            <p class="nama">Bersama ini kami sertakan :</p>
            <ol class="lis">
                <li>Surat Permohonan Pindah</li>
                <li>Surat keluar Dari Dapodik</li>
                <li>Rapot Asli</li>
            </ol>
            <p class="nama">Demikian surat pindah/keluar ini kami buat agar dapat digunakan sebagaimana mestinya.</p>
            <div class="ttd">
                <table style="width: 100%;margin-left:500px; font-size:16px">
                    <tr>
                        <td width="30%">Tangerang, <?= formatindo($keluar['tgl_ajuan']) ?></td>
                    </tr>

                    <tr>
                        <td>Kepala SMP Insan Kamil</td>
                    </tr>
                    <br>
                    <br>
                    <br>
                    <tr>
                        <td style=" text-decoration: underline;"><b><?= $profile['kepsek'] ?></b></td>
                    </tr>
                </table>
            </div>
        </section>

    </div>


    <div class="wrapper">
        <div class="header">

            <p class="perihal">Hal :<b>Permohonan keluar Peserta Didik</b></p>

            <p class="tanggal"> Tangerang, <?= formatindo($keluar['tgl_ajuan']) ?><br>
                <span>Kepada Yth. </span><br>
                <span style="text-decoration: underline;"><b> SMP Insan Kamil</b></span><br>
                <span><?= $profile['alamat'] ?></span>
            </p>

        </div>
    </div>


    <p class="isi2">Dengan hormat,</p>
    <p>Yang bertanda tangan di bawah ini kami orang tua/wali peserta didik dari:</p>
    <div class="tabel">
        <table class="tabel2">
            <tr>
                <td width="30%">Nama Lengkap</td>
                <td width="1%">:</td>
                <td width="60%"><?= $keluar['nama_siswa'] ?></td>
            </tr>
            <tr>
                <td width="30%">Jenis Kelamin</td>
                <td width="1%">:</td>
                <td width="60%"><?= $keluar['jenis_kelamin'] ?></td>
            </tr>
            <tr>
                <td>TTL</td>
                <td>:</td>
                <td><?= $keluar['tempat_lahir'] ?>, <?= formatindo($keluar['tanggal_lahir']) ?></td>
            </tr>
            <tr>
                <td>ASAL SEKOLAH</td>
                <td>:</td>
                <td>SMP INSAN KAMIL</td>
            </tr>
            <tr>
                <td>NIPD/NISN</td>
                <td>:</td>
                <td><?= $keluar['nis'] ?>/<?= $keluar['nisn'] ?></td>
            </tr>
            <tr>
                <td>KELAS</td>
                <td>:</td>
                <td><?= $keluar['tingkat'] ?></td>
            </tr>
            <tr>
                <td>ALAMAT </td>
                <td>:</td>
                <td><?= $keluar['alamat'] ?> RT <?= $keluar['rt'] ?> RW <?= $keluar['rw'] ?> Desa/Kel <?= $keluar['desa'] ?></td>
            </tr>
        </table>
    </div>
    <p class="nama">Dengan ini mengajukan permohonan pindah sekolah dari SMP INSAN KAMIL untuk diterima di <b><?= $keluar['sekolah'] ?></b> dengan alasan <?= $keluar['alasan'] ?></p>
    <p class="nama">Bersama ini kami sertakan :</p>
    <ol class="lis">
        <li>Surat Permohonan Pindah</li>
        <li>Surat keluar Dari Dapodik</li>
        <li>Rapot Asli</li>
    </ol>
    <p class="nama">Demikian surat permohonan ini kami ajukan, kiranya dapat diterima di sekolah yang Bapak/ Ibu Pimpin dan atas perhatannya kami ucapakan terima kasih.</p>
    <div class="ttd">
        <table style="width: 100%;margin-left:500px; font-size:16px">
            <tr>
                <td>Orang Tua/Wali Peserta Didik</td>
            </tr>
            <br>
            <br>
            <br>
            <tr>
                <td style=" text-decoration: underline;"><b>....................................................</b></td>
            </tr>
        </table>
    </div>

    </div>



</body>

</html>