<?= $this->extend('template/template-rombel') ?>
<?= $this->section('content') ?>

<style>
    .isian {
        width: 60px;
        font-size: small;
    }



    .table-freeze {
        height: 60vh;
        margin: 2rem 0;
        overflow: auto;
        scroll-snap-type: both mandatory;
        white-space: nowrap;
    }

    .table-freeze .table {
        margin: 0;
        overflow: unset;
    }

    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
    }

    th,
    td {
        padding: 1rem 2.5rem;
        text-align: left;
    }

    thead th {
        border-bottom: 1px solid #ccc;
        font-weight: 600;
        top: 0;
        z-index: 1;
    }

    th.tp {
        background-color: #fff;
        z-index: 2;
    }

    tbody th {
        left: 0;
        text-align: left;
    }

    tbody th,
    th.tp {
        border-right: 1px solid #ccc;
    }

    tbody th td {
        font-size: 10px;
    }

    tr {
        padding: 0;
    }

    td {
        color: #555;
        vertical-align: top;
    }

    tbody tr:nth-child(odd) th {
        background-color: #fff;
    }

    thead th,
    tbody tr:nth-child(even) th,
    tr:nth-child(even) td {
        background-color: #f4f4f4;
        /* striped background color */
    }

    thead th,
    tbody th {
        position: sticky;
        -webkit-position: sticky;
    }

    @media screen and (max-width: 680px) {
        .table-freeze {
            height: 70vh
        }
    }

    @media screen and (max-width: 480px) {
        .table-freeze {
            height: 60vh
        }
    }
</style>
<!--  -->

<?php

$db     = \Config\Database::connect();

$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();

?>




<div class="card">
    <?= form_open('pendidik/simpanNilai/') ?>


    <div class="card-body">
        <a href="" data-bs-toggle="modal" data-bs-target="#tambah" class="btn btn-primary"> Tambah Siswa </a>
        <button href="" type="button" class="btn btn-warning"> Simpan </button>
        <div class="table-freeze">
            <table>
                <thead>
                    <tr>
                        <th class="tp" scope="col">Nama Siswa</th>
                        <th scope="col">NISN</th>
                        <th scope="col">PAI</th>
                        <th scope="col">PKN</th>
                        <th scope="col">B.IND</th>
                        <th scope="col">MTK</th>
                        <th scope="col">IPA</th>
                        <th scope="col">IPS</th>
                        <th scope="col">B.INGG</th>
                        <th scope="col">SBK</th>
                        <th scope="col">PJOK</th>
                        <th scope="col">PRKY</th>
                        <th scope="col">TIK</th>
                        <th scope="col">MHD</th>
                        <th scope="col">TJWD</th>
                        <th scope="col">TRJM</th>
                        <th scope="col">FQIH</th>
                        <th scope="col">BTQ</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Sakit</th>
                        <th scope="col">Izin</th>
                        <th scope="col">Alfa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($nilai as $key => $value) { ?>
                        <tr>

                            <th scope="row"><?= $value['nama_siswa'] ?></th>
                            <td class="text-center">
                                <?= $value['nisn'] ?>
                            </td>
                            <td class="text-center">
                                <input type="text" class="form-control isian" name="pai" value="<?= $value['pai'] ?>">
                            </td>
                            <td class="text-center">
                                <input type="text" class="form-control isian" name="pkn" value=" <?= $value['pkn'] ?>">
                            </td>
                            <td class="text-center">
                                <input type="text" class="form-control isian" name="indo" value="  <?= $value['indo'] ?>">
                            </td>
                            <td class="text-center">
                                <input type="text" class="form-control isian" name="mtk" value=" <?= $value['mtk'] ?>">
                            </td>
                            <td class="text-center">
                                <input type="text" class="form-control isian" name="ipa" value=" <?= $value['ipa'] ?>">
                            </td>
                            <td class="text-center">
                                <input type="text" class="form-control isian" name="ips" value="<?= $value['ips'] ?>">
                            </td>
                            <td class="text-center">
                                <input type="text" class="form-control isian" name="inggris" value="  <?= $value['inggris'] ?>">
                            </td>
                            <td class="text-center">
                                <input type="text" class="form-control isian" name="sbk" value="   <?= $value['sbk'] ?>">
                            </td>
                            <td class="text-center">
                                <input type="text" class="form-control isian" name="pjok" value=" <?= $value['pjok'] ?>">
                            </td>
                            <td class="text-center">
                                <input type="text" class="form-control isian" name="prky" value="<?= $value['prky'] ?>">
                            </td>
                            <td class="text-center">
                                <input type="text" class="form-control isian" name="tik" value="<?= $value['tik'] ?>">
                            </td>
                            <td class="text-center">
                                <input type="text" class="form-control isian" name="mhd" value="<?= $value['mhd'] ?>">
                            </td>
                            <td class="text-center">
                                <input type="text" class="form-control isian" name="tjwd" value="<?= $value['tjwd'] ?>">
                            </td>
                            <td class="text-center">
                                <input type="text" class="form-control isian" name="trjmh" value="<?= $value['trjmh'] ?>">
                            </td>
                            <td class="text-center">
                                <input type="text" class="form-control isian" name="fiqih" value="<?= $value['fiqih'] ?>">
                            </td>
                            <td class="text-center">
                                <input type="text" class="form-control isian" name="btq" value="<?= $value['btq'] ?>">
                            </td>
                            <td class="text-center">
                                <?php
                                $jumlah =

                                    $value['pai'] + $value['pkn'] + $value['indo'] + $value['mtk'] + $value['ipa'] + $value['ips']
                                    + $value['inggris'] + $value['sbk'] + $value['prky'] + $value['tik'] + $value['btq'] + $value['trjmh'] + $value['tjwd'] + $value['mhd'] + $value['fiqih'] + $value['pjok'];
                                ?>

                                <?= $jumlah ?>

                            </td>
                            <td class="text-center"><?= $value['sakit'] ?></td>
                            <td class="text-center"><?= $value['izin'] ?></td>
                            <td class="text-center"><?= $value['alfa'] ?></td>


                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
    <?= form_close() ?>
</div>

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <?= form_open('pendidik/tambahanggota') ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="check-all"></th>
                            <th>Nama Peserta Didik</th>
                            <th>NISN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($walas as $key => $data) { ?>
                            <tr>
                                <td><input type="checkbox" class="check-item" name="nisn[]" onchange="checkAll(this)" value="<?= $data['nisn'] ?>"></td>
                                <td><?= $data['nama_siswa'] ?></td>
                                <td><?= $data['nisn'] ?></td>
                                <input type="hidden" name="id_ta[]" value="<?= $ta['id_ta'] ?>">

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>












































<script src="<?= base_url() ?>/template/assets/vendor/libs/jquery/jquery.js"></script>

<script>
    $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
        $("#check-all").click(function() { // Ketika user men-cek checkbox all
            if ($(this).is(":checked")) // Jika checkbox all diceklis
                $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
            else // Jika checkbox all tidak diceklis
                $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
        });
    });
</script>





































<?= $this->endSection() ?>