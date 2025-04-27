<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<!-- Main content -->

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Sekolah</h3>
            <a class="btn btn-primary btn-xs float-right" data-toggle="modal" data-target="#tambah"> <i class="fas fa-plus"></i> Tambah</a>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Sekolah</th>
                        <th>Jenjang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    foreach ($sekolah as $key => $value) { ?>

                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['sekolah'] ?></td>
                            <td><?= $value['jenjang'] ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $value['id_sekolah'] ?>"><i class=" fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $value['id_sekolah'] ?>"><i class="fas fa-trash"></i></button>

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
        <?php echo form_open('sekolah/add') ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah sekolah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="">sekolah</label>
                <input type="text" class="form-control" name="sekolah">
                <label for="">Jenjang Sekolah</label>
                <select name="id_jenjang" id="" class="form-control">
                    <?php foreach ($jenjang  as $key => $value) { ?>
                        <option value="<?= $value['id_jenjang'] ?>"> <?= $value['jenjang'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="modal-body">

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left">Simpan</button>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</div>



<!-- ModalHapus -->
<?php foreach ($sekolah as $key => $value) { ?>
    <div class="modal fade" id="hapus<?= $value['id_sekolah'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <?php echo form_open('sekolah/delete/' . $value['id_sekolah']); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus sekolah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda akan menghapus data <?= $value['sekolah'] ?> ini???</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Batal</button>
                    <a href="<?= base_url('sekolah/delete/' . $value['id_sekolah']) ?>" type="submit" class="btn btn-danger">Delete</a>
                </div>
            </div>
            <!-- <?php echo form_close() ?> -->
        </div>
    </div>
<?php } ?>



<!-- Edit -->
<?php foreach ($sekolah as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_sekolah'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <?php echo form_open('sekolah/edit/' . $value['id_sekolah']); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Sekolah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Sekolah</label>
                        <input type="text" class="form-control" name="sekolah" value="<?= $value['sekolah'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Jenjang Sekolah</label>
                        <select name="id_jenjang" id="" class="form-control">
                            <option value="1">SD</option>
                            <option value="2">MI</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Simpan</button>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
<?php } ?>







<?= $this->endSection() ?>