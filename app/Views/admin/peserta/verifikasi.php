<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>



<div class="swal" data-swal="<?= session()->getFlashdata('pesan'); ?>"></div>


<div class="text-sm">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">
                Data <?= $subtitle ?>
            </h3>
            <div class="card-tools">

            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="example2">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>TTL</th>
                            <th>L/P</th>
                            <th>Tingkat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $no = 1;

                        foreach ($verifikasi as $key => $value) { ?>
                            <tr class="<?php
                                        $hasil = "Sudah Meninggal";
                                        if ($hasil == $value['kerja_ayah']) { ?>
                        echo bg-lightblue
                        <?php } ?>" data-widget="expandable-table" aria-expanded="false">
                                <td><?= $no++ ?></td>
                                <td class="text-center"><?= $value["nisn"] ?></td>
                                <td><?= $value["nama_siswa"] ?></td>
                                <td class="text-center"><?= $value["tempat_lahir"] ?>, <?= date('d M Y', strtotime($value["tanggal_lahir"])) ?></td>
                                <td class="text-center"><?= $value["jenis_kelamin"] ?></td>
                                <td class="text-center"><?= $value["tingkat"] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>























<?= $this->endSection() ?>

<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideDown(500, function() {
            $(this).remove();
        });
    }, 2000);
</script>