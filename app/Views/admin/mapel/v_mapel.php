<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<!-- Main content -->

<?php
$db     = \Config\Database::connect();

$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();

?>

<div class="content-header">
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title"><?= $subtitle ?></h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-7">
                        <h3>Daftar Mata Pelajaran</h3>
                        <p class="text-muted">Tahun Pelajaran <b>Aktif</b> <?= $ta['ta'] ?> Semester <b> <?= $ta['semester'] ?></b></p>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group-append float-right">
                            <div class="tombol text-center">
                                <button class="btn btn-circle" data-toggle="modal" data-target="#tambah"> <i class="fa-solid fa-circle-plus fa-3x" style="color: #74C0FC;"></i></button>
                                <p style="color:#74C0FC">Tambah</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Mata Pelajaran</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered " id="example2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Mata Pelajaran</th>
                                    <th>Mapel </th>
                                    <th>KKM </th>
                                    <th>Guru </th>
                                    <th>Kelas </th>
                                    <th>Aksi </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $no = 1;
                                foreach ($mapel as $key => $value) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value['kode_mapel'] ?></td>
                                        <td><?= $value['mapel'] ?></td>
                                        <td><?= $value['kkm'] ?></td>
                                        <td><?= $value['nama_guru'] ?></td>
                                        <td><?= $value['kelas'] ?></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?= $value['id_mapel'] ?>"><i class="fas fa-pencil"></i></button>
                                            <a href="<?= base_url('mapel/delete/' . $value['id_mapel']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                        </td>
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








<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?= form_open('mapel/add') ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Kode Mapel</label>
                    <input type="text" class="form-control" name="kode_mapel">
                </div>
                <div class="form-group">
                    <label for="">Mata Pelajaran</label>
                    <input type="text" class="form-control" name="mapel">
                </div>
                <div class="form-group">
                    <label for="">KKM</label>
                    <input type="text" class="form-control" name="kkm">
                </div>
                <div class="form-group">
                    <label for="">Guru Pelajaran</label>
                    <select name="id_guru" class="form-control">
                        <option value="">--Pilih Guru Mapel--</option>
                        <?php foreach ($guru as $key => $value) { ?>

                            <option value="<?= $value['id_guru'] ?>"><?= $value['nama_guru'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Kelas</label>
                    <select name="id_kelas" class="form-control">
                        <option value="">--Pilih Kelas--</option>
                        <?php foreach ($kelas as $key => $value) { ?>
                            <option value="<?= $value['id_kelas'] ?>"><?= $value['kelas'] ?></option>
                        <?php } ?>
                    </select>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>



<?php foreach ($mapel as $key => $value) { ?>
    <!-- ModalTambah -->
    <div class="modal fade" id="edit<?= $value['id_mapel'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <?= form_open('mapel/edit/' . $value['id_mapel']) ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Pelajaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Kode Mapel</label>
                        <input type="text" class="form-control" name="kode_mapel" value="<?= $value['kode_mapel'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Mata Pelajaran</label>
                        <input type="text" class="form-control" name="mapel" value="<?= $value['mapel'] ?>">
                    </div>
                    <div class=" form-group">
                        <label for="">KKM</label>
                        <input type="text" class="form-control" name="kkm" value="<?= $value['kkm'] ?>">
                    </div>
                    <div class=" form-group">
                        <label for="">Guru Pelajaran</label>
                        <select name="id_guru" class="form-control">
                            <option value="">--Pilih Guru Mapel--</option>
                            <?php foreach ($guru as $key => $value) { ?>

                                <option value="<?= $value['id_guru'] ?>"><?= $value['nama_guru'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Kelas</label>
                        <select name="id_kelas" class="form-control">
                            <option value="">--Pilih Kelas--</option>
                            <?php foreach ($kelas as $key => $value) { ?>
                                <option value="<?= $value['id_kelas'] ?>"><?= $value['kelas'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </div>



<?php } ?>

<?= $this->endSection() ?>