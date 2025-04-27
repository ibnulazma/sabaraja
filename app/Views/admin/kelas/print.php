<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <title>Biodata Rapot</title>
</head>



<style>
    .content {
        margin-bottom: 30%;
        margin-right: 20px;
    }



    .judul {
        font-size: 12pt;
        text-align: center;
        margin-bottom: 20px;
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
</style>



<body>
    <?php


    foreach ($datasiswa as $key => $value) { ?>

        <!-- <img src="data:image/png;base64, '.base64_encode(file_get_contents($image_path)).'" alt="" srcset=""> -->
        <div class="content">
            <div class="container">
                <h5 class="judul text-center"> KETERANGAN TENTANG DIRI PESERTA DIDIK</h5>
            </div>
            <div class="tabel">
                <table class="tabel2">
                    <tr>
                        <td width="30%">1. Nama Lengkap</td>
                        <td width="1%">:</td>
                        <td width="60%"><?= $value['nama_siswa'] ?></td>
                    </tr>
                    <tr>
                        <td>2. No Induk Siswa</td>
                        <td>:</td>
                        <td><?= $value['nisn'] ?>/<?= $value['nis'] ?></td>
                    </tr>
                    <tr>
                        <td>3. Tempat, Tanggal Lahir</td>
                        <td>:</td>
                        <td><?= $value['tempat_lahir'] ?>, <?= formatindo(date($siswa['tanggal_lahir']))  ?> </td>
                    </tr>
                    <tr>
                        <td>4. Jenis Kelamin</td>
                        <td>:</td>
                        <td>
                            <?php $jk = 'L';
                            if ($jk == $value['jenis_kelamin']) { ?>
                                <?= strtoupper('Laki-laki') ?>
                            <?php } else { ?>
                                <?= strtoupper('Perempuan') ?>
                            <?php  } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>5. Agama</td>
                        <td>:</td>
                        <td>Islam </td>
                    </tr>
                    <tr>
                        <td>6. Alamat Lengkap</td>
                        <td>:</td>
                        <td><?= $value['alamat'] ?> </td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;a. RT/RW</td>
                        <td>:</td>
                        <td><?= $value['rt'] ?>/<?= $value['rw'] ?></td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;b. Desa/Kel</td>
                        <td>:</td>
                        <td><?= $value['desa'] ?></td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;c. Kecamatan</td>
                        <td>:</td>
                        <td><?= $value['nama_kecamatan'] ?></td>
                    </tr>
                    <tr>
                        <td>7. Diterima di sekolah ini</td>
                    </tr>
                    <tr class="left">
                        <td> &nbsp;&nbsp;&nbsp;a. Di kelas</td>
                        <td>:</td>
                        <td>7.1 </td>
                    </tr>
                    <tr class="left">
                        <td>&nbsp;&nbsp;&nbsp;b. Pada Tanggal</td>
                        <td>:</td>
                        <td>17 Juli 2023 </td>
                    </tr>
                    <tr class="">
                        <td>8. Orang Tua</td>
                    </tr>
                    <tr class="">
                        <td>&nbsp;&nbsp;&nbsp;a. Ayah</td>
                        <td>:</td>
                        <td><?= strtoupper($value['nama_ayah']) ?></td>
                    </tr>
                    <tr class="">
                        <td>&nbsp;&nbsp;&nbsp;b. Ibu</td>
                        <td>:</td>
                        <td><?= $value['nama_ibu'] ?></td>
                    </tr>
                </table>

                <div class="ttd">
                    <table style="width: 100%;">
                        <tr>
                            <td style="border: 1px solid black;text-align:center;" width="17%"> 3x4

                            </td>
                            <td width=" 10%">
                            </td>
                            <td>
                                Tangerang, 17 Juli 2023<br>
                                Kepala Sekolah <br><br><br><br><br><br>
                                <span style="text-decoration: underline; font-weight:bold; "> Fadilah, S.Ag</span>
                            </td>
                        </tr>
                        <tr>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    <?php } ?>
</body>

</html>