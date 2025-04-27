<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<!-- Main content -->

<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Pendidikan</h3>
            <a class="btn btn-primary btn-xs float-right" data-toggle="modal" data-target="#tambah"> <i class="fas fa-plus"></i> Tambah</a>

        </div>

        <table id="example2" class="table table-bordered ">
            <thead>
                <tr>
                    <th>No</th>
                    <th>pendidikan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $no = 1;
                foreach ($pendidikan as $key => $value) { ?>

                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['pendidikan'] ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm"><i class=" fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $value['id_pendidikan'] ?>"><i class="fas fa-trash"></i></button>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- ModalTambah -->

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php echo form_open('pendidikan/add') ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah pendidikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="">pendidikan</label>
                <input type="text" class="form-control" name="pendidikan">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left">Simpan</button>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</div>



<!-- ModalHapus -->
<?php foreach ($pendidikan as $key => $value) { ?>
    <div class="modal fade" id="hapus<?= $value['id_pendidikan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <?php echo form_open('pendidikan/delete/' . $value['id_pendidikan']); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus pendidikan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda akan menghapus data <?= $value['pendidikan'] ?> ini???</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Batal</button>
                    <a href="<?= base_url('pendidikan/delete/' . $value['id_pendidikan']) ?>" type="submit" class="btn btn-danger">Delete</a>
                </div>
            </div>
            <!-- <?php echo form_close() ?> -->
        </div>
    </div>
<?php } ?>







<?= $this->endSection() ?>