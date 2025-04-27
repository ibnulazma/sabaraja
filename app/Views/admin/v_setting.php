<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<?php
$db     = \Config\Database::connect();
$profile = $db->table('tbl_profile')
    // ->where('status', '1')
    ->get()->getRowArray();

?>















<div class="col-md-4">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Logo</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <img src="<?= base_url('logo/' . $setting['logo']) ?>" alt="">
            <input type="file" class="form-control" name="">
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<div class="col-md-8">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Sekolah</h3> <a href="<?= base_url('admin/editSetting/' . $setting['id_setting']) ?>" class="text-primary"><i class="  fas fa-pencil-alt float-right"></i></a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table width="100%">
                <thead>
                    <tr>
                        <th height="20%">Nama</th>
                        <td>:</td>
                        <td><?= $setting['nama_sekolah'] ?></td>
                    </tr>
                    <tr>
                        <th>NPSN</th>
                        <td>:</td>
                        <td><?= $setting['npsn'] ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>:</td>
                        <td><?= $setting['alamat'] ?></td>
                    </tr>
                    <tr>
                        <th>Desa</th>
                        <td>:</td>
                        <td><?= $setting['desa'] ?></td>
                    </tr>
                    <tr>
                        <th>Kecamatan</th>
                        <td>:</td>
                        <td><?= $setting['kecamatan'] ?></td>
                    </tr>
                    <tr>
                        <th>Kabupaten</th>
                        <td>:</td>
                        <td><?= $setting['kabupaten'] ?></td>
                    </tr>
                    <tr>
                        <th>Provinsi</th>
                        <td>:</td>
                        <td><?= $setting['provinsi'] ?></td>
                    </tr>
                    <tr>
                        <th>No. Telpon</th>
                        <td>:</td>
                        <td><?= $setting['no_telp'] ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>:</td>
                        <td><?= $setting['email'] ?></td>
                    </tr>

                </thead>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<?= $this->endSection() ?>