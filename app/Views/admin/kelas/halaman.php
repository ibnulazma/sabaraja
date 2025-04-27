<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <title>Print Halaman Depan</title>
</head>



<style>
    .content {
        margin-bottom: 5%;
        margin-right: 20px;
    }



    .judul {
        font-size: 18pt;
        text-align: center;
        margin-bottom: 85%;
    }

    .isi {
        font-size: 12pt;
        margin-bottom: 5px;
    }



    table {
        margin-left: 50px;
        font-size: 12pt;
        /* margin-bottom: 50%; */
        /* width: 100%; */

    }

    .tabel2 {
        width: 100%;
        line-height: 1.8em;
    }

    /* tr {
        margin-bottom: 50px;
    } */

    .titik {
        width: 50%;
    }

    .block {
        font-weight: bold;
    }

    .left {
        margin-left: 50px;
    }

    .foto {

        width: 90px;
        height: 119px;
        margin-top: 50px;
        margin-left: 50px;
        padding: 20px;
        float: left;
    }

    .ukuran {
        text-align: center;
    }

    .ttd {
        margin-top: 100px;
    }

    .left tr {
        margin-left: 10px;
    }

    .peserta {
        text-align: center;
        font-size: 12pt;
    }

    .nama {
        border: 1px solid black;
        text-align: center;
        font-size: 14pt;
        padding: 20px;

    }
</style>

<body>

    <?php foreach ($datasiswa as $key => $value) { ?>

        <div class="content">
            <div class="container text-center">
                <p class="judul "> LAPORAN <br> HASIL PENCAPAIAN KOMPETENSI PESERTA DIDIK <br>SEKOLAH MENENGAH PERTAMA <br>(SMP) </p>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <h5 class="peserta ">Nama Peserta Didik :</h5>
                <h5 class="nama"> <?= $value['nama_siswa'] ?></h5>
                <h5 class="peserta ">NISN / NIS</h5>
                <h5 class="nama"> <?= $value['nisn'] ?>/<?= $value['nis'] ?></h5>
            </div>
        </div>

    <?php } ?>
</body>

</html>