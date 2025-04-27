<style>
    .tabel {

        width: 100%;
    }

    th {
        border: 0.5px solid black;
    }

    td {
        border: 0.5px solid black;
        text-align: center;
    }

    .judul {
        text-align: center;
    }
</style>


<h4 class="judul">DAFTAR PESERTA DIDIK SMP INSAN KAMIL</h4>
<table class="tabel">

    <tr>
        <th>No</th>
        <th>NISN</th>
        <th>Nama</th>
        <th>JK</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Nama Ibu</th>
        <th>Kelas</th>
    </tr>


    <?php
    $no = 1;
    foreach ($siswa as $key => $value) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $value['nisn'] ?></td>
            <td><?= $value['nama_siswa'] ?></td>
            <td><?= $value['jenis_kelamin'] ?></td>
            <td><?= $value['tempat_lahir'] ?></td>
            <td><?= $value['tanggal_lahir'] ?></td>
            <td><?= $value['nama_ibu'] ?></td>
            <td><?= $value['tingkat'] ?></td>
        </tr>
    <?php } ?>


</table>