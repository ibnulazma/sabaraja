<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title><?= $title ?></title>
</head>


<style>
    .judul {
        font-size: 12pt;
        text-align: center;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .orangtua {
        float: right;
        margin-top: 40px;
    }

    .penutup {
        margin-top: 20px;
    }
</style>

<body style="height: 100%; margin-right:20px; margin-left:20px;">

    <div class="container-fluid">
        <div class="judul">SURAT PERMOHONAN PINDAH SEKOLAH</div>
    </div>
    <div class="table">
        <table style="width: 100%; margin-top:10px;">
            <tr>
                <td style="width: 57%;"></td>
                <td rowspan="4">
                    <div class="tanggal">Tangerang, <?= date('d F Y') ?></div>
                    <div class="kepada">
                        Kepada<br>
                        Yth. Kepala Sekolah SMP INSAN KAMIL<br>
                        di<br>
                        Tempat
                    </div>

                </td>
            </tr>
        </table>
    </div>
    Saya yang bertanda tangan dibawah ini :

    <table style="margin-left:50px; width:100%; margin-right:10px; margin-top:20px;">
        <tr>
            <td> Nama</td>
            <td> :</td>
            <td> <?= $mutasi['nama_ayah'] ?></td>
        </tr>

        <tr>
            <td width="20%">Alamat</td>
            <td width="1%">:</td>
            <td width="50%" rowspan="2"> <?= ucwords($mutasi['alamat']) ?> RT <?= $mutasi['rt'] ?> RW <?= $mutasi['rw'] ?>, <?= $mutasi['nama_kecamatan'] ?>-<?= $mutasi['city_name'] ?></td>
        </tr>
    </table>
    Sebagai Orang Tua / Wali * Murid dari :
    <table style="margin-left:50px; width:100%; margin-right:10px;">
        <tr>
            <td> Nama Siswa</td>
            <td> :</td>
            <td> <?= $mutasi['nama_siswa'] ?></td>
        </tr>
        <tr>
            <td> NISN</td>
            <td> :</td>
            <td> <?= $mutasi['nisn'] ?></td>
        </tr>
        <tr>
            <td> Tempat/Tanggal Lahir</td>
            <td> :</td>
            <td> <?= $mutasi['tempat_lahir'] ?>, <?= date('d F Y', strtotime($mutasi['tanggal_lahir'])) ?></td>
        </tr>
        <tr>
            <td> Kelas</td>
            <td> :</td>
            <td> <?= $mutasi['kelas'] ?></td>
        </tr>


    </table>
    <div class="penutup mt-4">
        Dengan ini mengajukan permohonan pindah sekolah ke <b><?= $mutasi['sekolah'] ?></b> dengan alasan <b><?= $mutasi['alasan'] ?></b>.<br>

        Demikian, atas persetujuaan Bapak/Ibu Kepala Sekolah saya ucapkan terima kasih.
    </div>
    <div class="orangtua">
        Pemohon<br>
        Orang Tua/Wali Siswa<br><br><br><br><br>

        (___________________)
    </div>




    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>