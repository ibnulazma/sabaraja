<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<!-- Main content -->



<div class="row justify-content-center">

    <div class="col-md-9">
        <?php if (session()->getFlashdata('pesan')) {
            echo '<div class="alert alert-success" role="alert">';
            echo session()->getFlashdata('pesan');
            echo ' </div>';
        } elseif (session()->getFlashdata('error')) {
            echo '<div class="alert alert-danger" role="alert">';
            echo session()->getFlashdata('pesan');
            echo ' </div>';
        }

        ?>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">User</h3>
                <a class="btn btn-primary btn-xs float-right" data-toggle="modal" data-target="#tambah"> <i class="fas fa-plus"></i> Tambah</a>

            </div>

            <table class="table table-bordered ">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Username</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    foreach ($user as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $value['nama_user'] ?></td>
                            <td><?= $value['username'] ?></td>
                            <td class="text-center">
                                <img src="<?= base_url('foto/' . $value['foto']) ?>" alt="" class="brand-image img-circle elevation-3" width="50px" height="50px">
                            </td>
                            <td class="text-center">
                                <button class="btn btn-primary btn-sm mb-2"><i class=" fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $value['id_user'] ?>"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- ModalTambah -->

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php echo form_open_multipart('user/add') ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nama User</label>
                    <input type="text" class="form-control" name="nama_user">
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" class="form-control" name="foto">
                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-left">Simpan</button>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>



<!-- ModalHapus -->
<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="hapus<?= $value['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <?php echo form_open('user/delete/' . $value['id_user']); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda akan menghapus data <?= $value['nama_user'] ?> ini???</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Batal</button>
                    <a href="<?= base_url('user/delete/' . $value['id_user']) ?>" type="submit" class="btn btn-danger">Delete</a>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
<?php } ?>

<?= $this->endSection() ?>