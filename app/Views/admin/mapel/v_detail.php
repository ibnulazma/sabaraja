<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<!-- Main content -->

<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Mata Pelajaran <small>Tingkat <?= $tingkat['tingkat'] ?></small></h3>
            <a class="btn btn-primary btn-xs float-right" data-toggle="modal" data-target="#tambah"> <i class="fas fa-plus"></i> Tambah</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="example2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Mapel</th>
                        <th>Mapel</th>
                        <th>KKM</th>
                        <th>Kelompok</th>
                        <th>Aksi</th>
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
                            <td><?= $value['kelompok'] ?></td>
                            <td>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $value['id_tingkat'] ?>"><i class="fas fa-trash"></i></button>

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
        <?php echo form_open('mapel/add/' . $tingkat['id_tingkat']) ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Mapel</h5>
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
                    <label for="">Mapel</label>
                    <input type="text" class="form-control" name="mapel">
                </div>
                <div class="form-group">
                    <label for="">KKM</label>
                    <input type="text" class="form-control" name="kkm">
                </div>
                <div class="form-group">
                    <label for="">Kelompok</label>
                    <select name="kelompok" id="" class="form-control">
                        <option value="Wajib">Wajib</option>
                        <option value="Mulok">Mulok</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left">Simpan</button>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</div>



<?= $this->endSection() ?>