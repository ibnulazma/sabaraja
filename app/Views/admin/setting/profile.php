<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>
<?php
$db     = \Config\Database::connect();
$profil = $db->table('tbl_profile')
    ->get()->getRowArray();

?>

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">
        <div class="card-header">
            <h5 class="card-title"><?= $subtitle ?></h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-9">
                    <h3><?= $profil['npsn'] ?> - <?= $profil['nama_sekolah'] ?></h3>
                </div>
            </div>
            <h5><b>Informasi Tentang Sekolah</b></h5>
            <?= form_open('admin/setting/editprofile/' . $profil['id_profile']) ?>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Sekolah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="basic-default-name" name="nama_sekolah" value="<?= $profil['nama_sekolah'] ?>" />
                </div>
            </div>
            <input type="hidden" name="id_profile" value="<?= $profil['id_profile'] ?>">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">NPSN</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="basic-default-name" name="npsn" value="<?= $profil['npsn'] ?>" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Status</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="basic-default-name" name="status" value="<?= $profil['status'] ?>" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="basic-default-name" name="alamat" value="<?= $profil['alamat'] ?>" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="basic-default-name" name="email" value="<?= $profil['email'] ?>" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Kepala Sekolah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="basic-default-name" name="kepsek" value="<?= $profil['kepsek'] ?>" />
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-info">Edit</button>
                </div>
            </div>
            <?= form_close() ?>





        </div>
    </div>
</div>











<?= $this->endSection() ?>