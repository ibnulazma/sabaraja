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
                        <h3>Penerimaan PD Pindahan</h3>
                        <p class="text-muted">Tahun Pelajaran <b>Aktif</b> <?= $ta['ta'] ?> Semester <b> <?= $ta['semester'] ?></b></p>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group-append float-right">
                            <div class="tombol text-center">
                                <button class="btn btn-circle" data-target="#tambah" data-toggle="modal"> <i class="fa-solid fa-circle-plus fa-3x" style="color: #74C0FC;"></i></button>
                                <p style="color:#74C0FC">Tambah</p>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>NISN</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($terima as $key => $val) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $val['nama_siswa'] ?></td>
                                <td><?= $val['nisn'] ?></td>
                                <td><a href="<?= base_url('surat/suratpenerimaan/' . $val['id_terima']) ?>" class="btn btn-primary"><i class="fas fa-print"></i> Print</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <?= form_open('surat/tambahterima/') ?>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Surat Terima</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_siswa">
                        </div>
                        <div class="form-group">
                            <label for="">NISN</label>
                            <input type="text" class="form-control" name="nisn">
                        </div>
                        <div class="form-group">
                            <label for="">Tempat</label>
                            <input type="text" class="form-control" name="tempat_lahir">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Lengkap</label>
                            <textarea name="alamat" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Ayah</label>
                            <input type="text" class="form-control" name="nama_ayah">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Ibu</label>
                            <input type="text" class="form-control" name="nama_ibu">
                        </div>
                        <div class="form-group">
                            <label for="">Sekolah Asal</label>
                            <input type="text" class="form-control" name="asal_sekolah">
                        </div>
                        <div class="form-group">
                            <label for="">No Surat Keluar</label>
                            <input type="text" class="form-control" name="no_surat">
                        </div>
                        <div class="form-group">
                            <label for="">Diterima Di Tingkat</label>
                            <select name="diterima" id="" class="form-control">
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-floppy-disk"></i> Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>