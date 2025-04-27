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
        font-size: 20px;
        font-family: 'Times New Roman', Times, serif;
    }

    .container {
        text-align: center;
        padding: 0;
    }

    .wrapper {
        margin-bottom: 100px;

    }

    .tabel1 {
        width: 100%;
        margin-bottom: 20px;
        margin-left: 20px;

    }

    .td1 {
        width: auto;
    }

    .center {
        text-align: center;
    }


    .tanggal {
        float: right;
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


    .judul {
        font-size: 18px;
    }

    .jalan {
        font-size: 15px;
    }

    .hormat {
        margin-top: 30px;
    }

    .column {
        margin-left: 400px;
        text-align: center;
    }

    @page {
        margin: 0.5in 0.8in 0.2in 0.8in;
    }
</style>

<body>

    <div class="wrapper" style="margin-top: 20px;">
        <div class="header ">
            <div class="tanggal"></div>
            <div class="perihal">Perihal : Permohonan Pindah Sekolah</div>
            <div class="kepsek">Yth. Bapak/Ibu Kepala SMP INSAN KAMIL</div>
            <div class="tempat">di Tempat</div>

            <p class="hormat">Dengan Hormat,</p>
            <p>Yang bertanda tangan dibawah ini:</p>
            <table class="tabel1">
                <tr>
                    <td class="td1">Nama Orang Tua</td>
                    <td class="td2">:</td>
                    <td class="td3"><?= $mutasi['nama_ayah'] ?></td>
                </tr>
                <tr>
                    <td>Pekerjaan </td>
                    <td>:</td>
                    <td><?= $mutasi['kerja_ayah'] ?></td>
                </tr>
                <tr>
                    <td class="vertical">Alamat</td>
                    <td class="vertical">:</td>
                    <td><?= $mutasi['alamat'] ?> RT <?= $mutasi['rt'] ?> RW <?= $mutasi['rw'] ?> Desa/Kel. <?= $mutasi['desa'] ?> <br> <?= $mutasi['nama_kecamatan'] ?> <?= ucwords($mutasi['city_name']) ?></td>

                </tr>
            </table>
            <p>Orang Tua/Wali dari :</p>
            <table class="tabel1">
                <tr>
                    <td class="td1">Nama Peserta Didik</td>
                    <td class="td2">:</td>
                    <td class="td3"><?= $mutasi['nama_siswa'] ?></td>
                </tr>

                <tr>
                    <td>Tempat, Tanggal Lahir </td>
                    <td>:</td>
                    <td><?= $mutasi['tempat_lahir'] ?>, <?= $mutasi['tanggal_lahir'] ?></td>
                </tr>
                <tr>
                    <td>NIPD/NISN </td>
                    <td>:</td>
                    <td><?= $mutasi['nis'] ?>/<?= $mutasi['nisn'] ?></td>
                </tr>
                <tr>
                    <td>Kelas Yang Ditinggalkan</td>
                    <td>:</td>
                    <td><?= $mutasi['kelas'] ?></td>
                </tr>
            </table>
            <p>Mengajukan permohonan pindah sekolah untuk peserta didik di atas ke <b><?= strtoupper($mutasi['sekolah']) ?></b> dengan alasan <b><?= strtoupper($mutasi['alasan']) ?></b>.</p>
            <p>Atas kerjasamanya kami ucapkan terima kasih.</p>

            <div class="column">
                <p>Tangerang, <?= formatindo(date('Y-m-d')) ?></p>
                <p>Hormat Kami</p>
                <br>
                <br>
                <p>(_______________)</p>


            </div>


        </div>
    </div>

</body>

</html>