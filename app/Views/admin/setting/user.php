<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<?php

$db     = \Config\Database::connect();

$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();

?>

<style>
    .img-edit {
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }
</style>
<div class="content-header">
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title"><?= $subtitle ?></h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-7">
                        <h3>Tambah User</h3>
                        <p class="text-muted">Tahun Pelajaran <b>Aktif</b><?= $ta['ta'] ?>Semester <b><?= $ta['semester'] ?></b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-pink">
                            <div class="card-header p-2">
                                <h5 class="card-title">Tambah User</h5>
                            </div>
                            <div class="card-body"><?= form_open_multipart('user/add') ?><div class="form-group"><label for="">Nama User</label><input type="text" name="nama_user" class="form-control"></div>
                                <div class="form-group"><label for="">Username</label><input type="text" name="username" class="form-control"></div>
                                <div class="form-group"><label for="">Password</label><input type="text" name="password" class="form-control" value="<?= implode($randompass) ?>"></div>
                                <div class="form-group"><label for="">Foto</label><input type="file" name="foto" class="form-control"></div>
                                <div class="form-group"><label for="">Level</label><select name="level" id="" class="form-control">
                                        <option value="1">Superadmin</option>
                                        <option value="2">Admin</option>
                                        <option value="3">Piket</option>
                                    </select></div>
                                <div class="form-group"><button type="submit" class="btn btn-outline-dark btn-block">Submit</button></div><?= form_close() ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card card-blue">
                            <div class="card-header">
                                <h5 class="card-title">Daftar User </h5>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama User</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Level</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody><?php $no = 1;
                                            foreach ($user as $key => $row) { ?><tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row['nama_user'] ?></td>
                                                <td><?= $row['username'] ?></td>
                                                <td><?= $row['password'] ?></td>
                                                <td><?= $row['level'] ?></td>
                                                <td><img src="<?= base_url('foto_user/' . $row['foto']) ?>" alt="" class="img-edit"></td>
                                                <td><a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#edit<?= $row['id_user'] ?>"> <i class="fas fa-pencil"></i> </a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <?= form_open_multipart('user/edit/' . $value['id_user']) ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Nama User</label>
                        <input type="text" name="nama_user" class="form-control" value="<?= $value['nama_user'] ?>" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" value="<?= $value['username'] ?>" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" name="foto" class="form-control" value="<?= $value['foto'] ?>" id="">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
<?php } ?>











<?= $this->endSection() ?>