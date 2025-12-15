<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<?php
$db = \Config\Database::connect();
$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();

$tahunjaran = $ta['ta'];
?>



<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-3">
            <div class="card ">

                <div class="card-body p-3">
                    <img class="card-img-top" src="<?= base_url('foto/excel.png') ?>" alt="" style="width:150px; display:block;margin:auto">
                    <div class="text-center mt-3">
                        <p>Absensi Kehadiran <br>
                            Peserta Didik<br>
                            Tahun Ajaran <?= $tahunjaran  ?></p>
                    </div>

                </div>
                <div class="card-footer">
                    <a href="<?= base_url('rekap/exportAbsensi') ?>" class="btn btn-success btn-sm rounded-0 float-right"><i class="fas fa-download"></i> unduh</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card ">

                <div class="card-body p-3">
                    <img class="card-img-top" src="<?= base_url('AdminLTE/dist/img/excel.png') ?>" alt="" style="width:150px; display:block;margin:auto">
                    <div class="text-center mt-3">
                        <p>Kehadiran MPLS <br>
                            Tahun Ajaran <?= $tahunjaran  ?></p>
                    </div>

                </div>
                <div class="card-footer ">
                    <a href="<?= base_url('rekap/absensi') ?>" class=" btn btn-success btn-sm rounded-0 float-right"><i class="fas fa-download"></i> unduh</a>
                </div>
            </div>
        </div>
    </div>
</div>















<?= $this->endSection() ?>