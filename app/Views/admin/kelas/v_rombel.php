<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<!-- Main content -->

<?php
$db     = \Config\Database::connect();

$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();

?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4  ">
        <div class="card-header ">
            <div class="judul d-flex justify-content-between">
                <h5 class="card-title"><?= $subtitle ?></h5>
                <button class="btn btn-primary btn-sm" data-bs-target="#tambah" data-bs-toggle="modal">Tambah Rombel</button>
            </div>
            <p class="text-muted mb-4">Tahun Pelajaran <b>Aktif</b> <?= $ta['ta'] ?> Semester <b> <?= $ta['semester'] ?></b></p>

        </div>
    </div>

    <div class="card ">
        <div class="card-body">
            <table class="table table-bordered" id="kelas">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Nama Wali Kelas</th>
                        <th class="text-center">Anggota Peserta Didik</th>
                        <th class="text-center">Tingkat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    foreach ($kelas as $key => $value) {
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $value['kelas'] ?></td>
                            <td class="text-center"><?= $value['nama_guru'] ?></td>
                            <td class="text-center"><a href="<?= base_url('kelas/rincian_kelas/' . $value['id_kelas']) ?>" class=" text-primary">Lihat Detail</td>
                            <td class="text-center"><?= $value['nama_tingkat'] ?></td>

                            <td class="text-center">
                                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?= $value['id_kelas'] ?>"><i class="bx bxs-pencil"></i></button>
                                <a href="<?= base_url('kelas/delete/' . $value['id_kelas']) ?>" class="btn btn-danger btn-sm"><i class="bx bxs-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Rombel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= form_open('kelas/add') ?>
                <div class="form-group">
                    <label for="">Nama Kelas</label>
                    <input type="text" class="form-control" name="kelas">
                </div>
                <div class="form-group">
                    <label for="">Wali Kelas</label>
                    <select name="id_guru" id="" class="form-control">
                        <option value="">Pilih Guru</option>
                        <?php foreach ($guru as $key => $value) { ?>
                            <option value="<?= $value['id_guru'] ?>"><?= $value['nama_guru'] ?></option>
                        <?php  } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Tingkat</label>
                    <select name="id_tingkat" id="" class="form-control">
                        <option value="">Pilih Tingkat</option>
                        <?php foreach ($tingkat as $key => $value) { ?>
                            <option value="<?= $value['id_tingkat'] ?>"><?= $value['nama_tingkat'] ?></option>
                        <?php  } ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>



<?php foreach ($kelas as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_kelas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Rombel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= form_open('kelas/edit/' . $value['id_kelas']); ?>
                    <div class="mb-3">
                        <label for="">Nama Kelas</label>
                        <input type="text" class="form-control" name="kelas" value="<?= $value['kelas'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="">Wali Kelas</label>
                        <select name="id_guru" id="" class="form-control">
                            <option value="">Pilih Guru</option>
                            <?php foreach ($guru as $key => $value) { ?>
                                <option value="<?= $value['id_guru'] ?>"><?= $value['nama_guru'] ?></option>
                            <?php  } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Tingkat</label>
                        <select name="id_tingkat" id="" class="form-control">
                            <option value="">Pilih Tingkat</option>
                            <?php foreach ($tingkat as $key => $value) { ?>
                                <option value="<?= $value['id_tingkat'] ?>"><?= $value['nama_tingkat'] ?></option>
                            <?php  } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-left">Simpan</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
<?php } ?>

<?= $this->endSection() ?>