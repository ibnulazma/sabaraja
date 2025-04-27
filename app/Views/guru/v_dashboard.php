<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>




<?php
$db     = \Config\Database::connect();


$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();


?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-3 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Selamat Datang <?= $guru['nama_guru'] ?></strong>! 🎉</h5>


                            <p class="mb-4">
                                Semester Aktif: <span class="fw-bold">Ganjil</span> Tahun Ajaran <?= $ta['ta'] ?>
                            </p>

                            <?php if ($guru['walas'] == 1) { ?>
                                <a href="<?= base_url('pendidik/rombel') ?>" class="btn btn-primary"> Tugas Tambahan Sebagai Wali Kelas <?= $guru['kelas'] ?></a>
                            <?php } elseif ($guru['walas'] == 0) { ?>
                            <?php } ?>

                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">

                            <?php if ($guru['kelamin'] == 'L') { ?>
                                <img
                                    src="<?= base_url() ?>/template/assets/img/illustrations/gurulaki.png"
                                    height="140"
                                    alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                            <?php  } else { ?>
                                <img
                                    src="<?= base_url() ?>/template/assets/img/illustrations/gurucewek.png"
                                    height="150"
                                    alt="View Badge User"
                                    data-app-dark-img="illustrations/girls.png"
                                    data-app-light-img="illustrations/girls.png" />
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



</div>





















<?= $this->endSection() ?>