<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BIODATA <?= $siswa['nama_siswa'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>



<style>
    body {
        font-family: 'Times New Roman', Times, serif;

    }

    .container {
        text-align: center;
        font-weight: bold;
        font-size: 14pt;
    }

    .isi {
        font-size: 12pt;
        font-weight: 80;
    }
</style>

<body>
    <div class="container">
        <h5>BIODATA PESERTA DIDIK</h5>
    </div>


    <table class="tabel">
        <thead>
            <tr>
                <th>I. DATA PESERTA DIDIK</th>
            </tr>
        </thead>
        <tbody class="isi">
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><?= $siswa['nama_siswa'] ?></td>
            </tr>
            <tr>
                <td>NIS/NISN</td>
                <td>:</td>
                <td><?= $siswa['nis'] ?>/<?= $siswa['nisn'] ?></td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td>:</td>
                <td><?= $siswa['tempat_lahir'] ?>, <?= date('d-m-Y', strtotime($siswa['tanggal_lahir'])) ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                    <?php
                    $gender = "L";
                    if ($gender == $siswa['jenis_kelamin']) { ?>
                        Laki-laki
                    <?php } else { ?>
                        Perempuan
                    <?php  } ?>
                </td>
            </tr>
        </tbody>
    </table>























    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>