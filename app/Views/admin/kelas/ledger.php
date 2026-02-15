<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?= $title ?> ?></title>
</head>

<style>
    body {
        margin: 0;
    }

    .table1 {
        width: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid black;
        text-align: center;
    }

    .siswa {
        text-align: left;
    }

    .center {
        text-align: center;
    }

    .ttd {
        margin-top: 30px;
        display: flex;
        justify-content: space-around;
    }
</style>

<body>


    <?php

    $db     = \Config\Database::connect();

    $ta = $db->table('tbl_ta')
        ->where('status', '1')
        ->get()->getRowArray();

    $profile = $db->table('tbl_profile')
        ->where('id_profile', '1')
        ->get()->getRowArray();

    ?>
    <div class="container">
        <center>
            <h4>LEGER NILAI P3MP KELAS <?= $kelas['kelas'] ?><br> SEMESTER <?= strtoupper($ta['semester']) ?><br>TAHUN PELAJARAN <?= $ta['ta'] ?></h4>
        </center>
    </div>
    <table class="table1">
        <thead>
            <tr>
                <th>NO</th>
                <th>NISN</th>
                <th>NAMA SISWA</th>
                <th>PAI</th>
                <th>PKN</th>
                <th>B.INDO</th>
                <th>MTK</th>
                <th>IPA</th>
                <th>IPS</th>
                <th>B.ING</th>
                <th>SBK</th>
                <th>PRKY</th>
                <th>PJOK</th>
                <th>TIK</th>
                <th>BTQ</th>
                <th>TJWD</th>
                <th>TRJM</th>
                <th>FIQIH</th>
                <th>MHD</th>
                <th>Jumlah</th>
                <th>Rank</th>
            </tr>
        </thead>
        <tbody>

            <?php $no = 1;
            foreach ($nilai as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nisn'] ?></td>
                    <td class="siswa"><?= $row['nama_siswa'] ?></td>
                    <td><?= $row['pai'] ?></td>
                    <td><?= $row['pkn'] ?></td>
                    <td><?= $row['indo'] ?></td>
                    <td><?= $row['mtk'] ?></td>
                    <td><?= $row['ipa'] ?></td>
                    <td><?= $row['ips'] ?></td>
                    <td><?= $row['inggris'] ?></td>
                    <td><?= $row['sbk'] ?></td>
                    <td><?= $row['prky'] ?></td>
                    <td><?= $row['pjok'] ?></td>
                    <td><?= $row['tik'] ?></td>
                    <td><?= $row['btq'] ?></td>
                    <td><?= $row['tjwd'] ?></td>
                    <td><?= $row['trjmh'] ?></td>
                    <td><?= $row['fiqih'] ?></td>
                    <td><?= $row['mhd'] ?></td>
                    <td><?= $row['total_nilai'] ?></td>
                    <td class="text-center"><?= $row['rank'] ?></td>

                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <div class="ttd">

        <div class="kepsek">
            <span>Mengetahui</span><br>
            <span>Kepala Sekolah</span>
            <br><br><br><br>
            <span><?= $profile['kepsek'] ?></span>
        </div>
        <div class="guru">
            <span>Tangerang, 23 Maret 2026</span><br>
            <span>Wali Kelas</span>
            <br><br><br><br>
            <span><?= $wali['nama_guru'] ?></span>
        </div>
    </div>









</body>

</html>