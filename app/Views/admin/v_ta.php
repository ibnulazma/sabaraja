<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<?php
$db     = \Config\Database::connect();
$tahun = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();

?>


<div class="container-xxl flex-grow-1 container-p-y">
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
    <div class="card">
        <div class="card-header ">
            <div class="d-flex d-flex justify-content-between align-items-center">
                <h5 class="card-title "><?= $subtitle ?></h5>
                <button class="btn btn-circle text-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal"> <i class='bx bxs-plus-square bx-md'></i></button>
            </div>
            <div class="text-primary medium fw-medium mb-3">Tahun Pelajaran <b>Aktif</b> <?= $tahun['ta'] ?> Semester <b> <?= $tahun['semester'] ?></b></div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="example">
                <thead>
                    <tr>
                        <th class="text-center" width="10px">No</th>
                        <th class="text-center">Tahun Ajaran</th>
                        <th class="text-center">Ganjil/Genap</th>
                        <th class="text-center">Titi Mangsa Rapot</th>
                        <th class="text-center">Titi Mangsa Biodata</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aktif/Non Aktif</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $no = 1;
                    foreach ($ta as $key => $value) { ?>
                        <tr>
                            <td>
                                <?= $no++; ?> </td>
                            <td class="text-center"><?= $value['ta'] ?></td>
                            <td class="text-center"><?= $value['semester'] ?></td>
                            <td class="text-center"><?= $value['titimangsa'] ?></td>
                            <td class="text-center"><?= $value['titimangsabiodata'] ?></td>
                            <td class="text-center"><?= ($value['status'] == 1) ? '<span class="right badge bg-success">Aktif</span>' : '<span class="right badge bg-danger">Non Aktif</span>'  ?></td>

                            <td class="text-center"><?php if ($value['status'] == 1) { ?>
                                    <a href="<?= base_url('ta/statusNonaktif/' . $value['id_ta']) ?>" class="btn btn-danger btn-xs ">Non Aktif</a>

                                <?php } else { ?>
                                    <a href="<?= base_url('ta/statusAktif/' . $value['id_ta']) ?>" class="btn btn-info btn-xs ">Aktifkan</a>
                                <?php } ?>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?= $value['id_ta'] ?>"><i class="bx bxs-pencil"></i></button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus<?= $value['id_ta'] ?>"><i class="bx bx-trash"></i></button>
                            </td>
                            <!-- <td>
                                <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch> 
                            <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                            </td> -->
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

</div>

<div class="modal fade" id="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <?php echo form_open('ta/add'); ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Tahun Akademik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Tahun Ajaran</label>
                    <input type="text" name="ta" class="form-control" placeholder="Tahun Akademik">
                </div>
                <div class="form-group">
                    <label for="">Semester</label>
                    <select name="semester" id="" class="form-control">
                        <option value="Ganjil">Ganjil</option>
                        <option value="Genap">Genap</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</div>






<!-- ModalTambah -->

<!-- modal Edit -->
<?php foreach ($ta as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_ta'] ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <?php echo form_open('ta/edit/' . $value['id_ta']); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Tahun Akademik</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Tahun Ajaran</label>
                        <input type="text" name="ta" value="<?= $value['ta'] ?>" class="form-control" placeholder="Tahun Akademik">
                    </div>
                    <div class="form-group">
                        <label for="">Titi Mangsa Rapot</label>
                        <input type="text" name="titimangsa" value="<?= $value['titimangsa'] ?>" class="form-control" placeholder="Tahun Akademik">
                    </div>
                    <div class="form-group">
                        <label for="">Titi Mangsa Biodata</label>
                        <input type="text" name="titimangsabiodata" value="<?= $value['titimangsabiodata'] ?>" class="form-control" placeholder="Tahun Akademik">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
<?php } ?>


<!-- ModalHapus -->
<?php foreach ($ta as $key => $value) { ?>
    <div class="modal fade" id="hapus<?= $value['id_ta'] ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <?php echo form_open('ta/delete/' . $value['id_ta']); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Tahun Akademik</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda akan menghapus data <?= $value['ta'] ?> ini???</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left" data-bs-dismiss="modal">Batal</button>
                    <a href="<?= base_url('ta/delete/' . $value['id_ta']) ?>" type="submit" class="btn btn-danger">Delete</a>
                </div>
            </div>
            <!-- <?php echo form_close() ?> -->
        </div>
    </div>
<?php } ?>
<!-- Modaledit -->








<?= $this->endSection() ?>