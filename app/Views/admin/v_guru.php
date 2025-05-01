<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<?php

$db     = \Config\Database::connect();

$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();

?>

<div class="swal" data-swal="<?= session()->getFlashdata('pesan'); ?>"></div>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title"><?= $subtitle ?></h5>
            <p class="text-muted mb-4">Tahun Pelajaran <b>Aktif</b> <?= $ta['ta'] ?> Semester <b> <?= $ta['semester'] ?></b></p>
        </div>
    </div>
    <div class="nav-align-top mb-6">
        <ul class="nav nav-pills mb-4" role="tablist">
            <li class="nav-item">
                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home" aria-selected="true">Aktif</button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-tambahguru" aria-controls="navs-pills-top-messages" aria-selected="false">Tambah PTK</button>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-bordered" id="guru">
                        <thead>
                            <tr>
                                <th class="text-center">#</i></th>
                                <th class="text-center">NUPTK</th>
                                <th class="text-center">NIK</th>
                                <th class="text-center">NIY</th>
                                <th class="text-center">Nama Guru</th>
                                <th class="text-center">Wali Kelas</th>
                                <th class="text-center">Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($guru as $key => $row) { ?>
                                <tr>
                                    <td class="text-center"><a href=""><i class="bx bxs-user"></i></a></td>
                                    <td class="text-center"><?= $row['nuptk'] ?></td>
                                    <td class="text-center"><?= $row['nik_guru'] ?></td>
                                    <td class="text-center"><?= $row['niy'] ?></td>
                                    <td><?= $row['nama_guru'] ?></td>
                                    <td class="text-center">
                                        <?php if ($row['walas'] = 1) { ?>
                                            <span class="badge bg-info">Ya</span>
                                        <?php } else { ?>
                                            <span class="badge bg-danger">Tidak</span>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center"><a data-bs-toggle="modal" data-bs-target="#edit"><i class='bx bxs-edit-alt text-sm text-primary'></i></a></td>


                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>



            </div>


            <div class="tab-pane fade" id="navs-pills-top-tambahguru" role="tabpanel">
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="">Nama Guru</label>
                    </div>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="nama_guru">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="">Jenis Kelamin</label>
                    </div>
                    <div class="col-sm-7">
                        <select name="kelamin" id="" class="form-control">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="">NIY</label>
                    </div>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="niy">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="">Password</label>
                    </div>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Edit Walas -->
<?php foreach ($guru as $key => $value) { ?>
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Walas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="">Nama Guru</label>
                        <input type="text" class="form-control" name="nama_guru" value="<?= $value['nama_guru'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Wali Kelas</label>
                        <select name="walas" id="" class="form-control">
                            <option value="">-Walas Atau Tidak-</option>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
<?php } ?>




<!-- Tambah Guru Single -->

<!-- Upload Guru -->
<div class="modal fade" id="upload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php echo form_open_multipart('guru/add') ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="<?= base_url('guru/templateGuru') ?>" class="btn btn-outline-success btn-lg"> <i class="fas fa-file-excel mr-2"></i> Download Template</a>
                <?= form_open_multipart('peserta/upload') ?>
                <div class="form-group mt-2">
                    <label for="exampleInputFile">
                        <h5>File input</h5>
                    </label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="fileimport" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-folder"></i></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-left">Simpan</button>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>


<!-- Edit -->

<?php foreach ($guru as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_guru'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <?php echo form_open('guru/edit/' . $value['id_guru']); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit PTK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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







<?php foreach ($guru as $key => $value) { ?>
    <div class="modal fade" id="hapus<?= $value['id_guru'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <?= form_open('guru/nonaktif/' . $value['id_guru']) ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Proses Non Aktif PTK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah yakin akan menonaktifkan PTK A.N <?= $value['nama_guru'] ?> ?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Submit</button>
                </div>
                <?= form_close() ?>
            </div>

        </div>
    </div>
<?php } ?>


<?= $this->endSection() ?>