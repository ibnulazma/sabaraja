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
    }

    .table1 {
        width: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    .center {
        text-align: center;
    }
</style>

<body>


    <?php

    $db     = \Config\Database::connect();

    $ta = $db->table('tbl_ta')
        ->where('status', '1')
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
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($nilai as $key => $row) { ?>
                <tr>
                    <td class="center"><?= $no++ ?></td>
                    <td class="center"><?= $row['nisn'] ?></td>
                    <td><?= $row['nama_siswa'] ?></td>
                    <td class="center"><?= $row['pai'] ?></td>
                    <td class="center"><?= $row['pkn'] ?></td>
                    <td class="center"><?= $row['indo'] ?></td>
                    <td class="center"><?= $row['mtk'] ?></td>
                    <td class="center"><?= $row['ipa'] ?></td>
                    <td class="center"><?= $row['ips'] ?></td>
                    <td class="center"><?= $row['inggris'] ?></td>
                    <td class="center"><?= $row['sbk'] ?></td>
                    <td class="center"><?= $row['prky'] ?></td>
                    <td class="center"><?= $row['pjok'] ?></td>
                    <td class="center"><?= $row['tik'] ?></td>
                    <td class="center"><?= $row['btq'] ?></td>
                    <td class="center"><?= $row['tjwd'] ?></td>
                    <td class="center"><?= $row['trjmh'] ?></td>
                    <td class="center"><?= $row['fiqih'] ?></td>
                    <td class="center"><?= $row['mhd'] ?></td>
                    <td class="center">
                        <?php
                        $jumlah =

                            $row['pai'] + $row['pkn'] + $row['indo'] + $row['mtk'] + $row['ipa'] + $row['ips']
                            + $row['inggris'] + $row['sbk'] + $row['prky'] + $row['tik'] + $row['btq'] + $row['trjmh'] + $row['tjwd'] + $row['mhd'] + $row['fiqih'] + $row['pjok'];
                        ?>

                        <?= $jumlah ?>
                    </td>

                </tr>
            <?php } ?>
        </tbody>
    </table>


</body>

</html>