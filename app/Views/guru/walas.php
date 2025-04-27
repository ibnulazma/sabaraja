<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<!-- Main content -->

<?php

use PhpOffice\PhpSpreadsheet\Calculation\Information\Value;

$db     = \Config\Database::connect();


$guru = $db->table('tbl_guru')
    ->where('walas', '1')
    ->get()->getRowArray();

?>



<div class="content-header">
    <div class="container-fluid mt-4">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Rombongan Belajar</h3>
                    <a class="btn btn-primary btn-xs float-right" data-toggle="modal" data-target="#tambah"> <i class="fas fa-plus"></i> Tambah</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="example2">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Siswa</th>
                                <th class="text-center">Telp Ibu</th>
                                <th class="text-center">Telp Ayah</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">Nama Orang Tua</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $no = 1;
                            foreach ($walas as $key => $value) {

                            ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td class="text-center"><?= $value['nama_siswa'] ?></td>
                                    <td class="text-center"><a href="https://wa.me/<?= gantiformat($value['telp_ibu']) ?>" target="_blank"><?= gantiformat($value['telp_ibu']) ?></a></td>
                                    <td class="text-center"><a href="https://wa.me/<?= gantiformat($value['telp_ayah']) ?>" target="_blank"><?= gantiformat($value['telp_ayah']) ?></a></td>
                                    <td class="text-center"><?= $value['alamat'] ?> RT <?= $value['rt'] ?> / RW <?= $value['rw'] ?></td>
                                    <td class="text-center"><?= $value['nama_ibu'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ?>