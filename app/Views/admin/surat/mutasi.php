<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<?php
$db     = \Config\Database::connect();

$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();

?>

<div class="content-header">
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-7">
                        <h3><?= $subtitle ?></h3>
                        <p class="text-muted">Tahun Pelajaran <b>Aktif</b> <?= $ta['ta'] ?> Semester <b> <?= $ta['semester'] ?></b></p>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>NISN</th>
                            <th>Kelas</th>
                            <th>Surat Permohonan</th>
                            <th>Surat Mutasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mutasi as $key => $value) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value['nama_siswa'] ?></td>
                                <td><?= $value['nisn'] ?></td>
                                <td></td>
                                <td><a href="<?= base_url('surat/printmohon/' . $value['id_mutasi']) ?>" target="_blank" class="btn btn-danger"><i class="fas fa-print"></i></a></td>
                                <td><a href="" class="btn btn-info" data-target="#edit<?= $value['id_mutasi'] ?>" data-toggle="modal"><i class="fas fa-print"></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php foreach ($mutasi as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_mutasi'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <?= form_open('surat/tambahmutasi/' . $value['id_mutasi']) ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Print Surat Mutasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">No Surat</label>
                        <input type="text" class="form-control" name="no_surat" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger"><i class="fas fa-print"></i> Print</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
<?php } ?>



<?= $this->endSection() ?>