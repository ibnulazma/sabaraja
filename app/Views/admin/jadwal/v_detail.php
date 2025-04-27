<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<!-- Main content -->

<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Jadwal Pelajaran <small>Tingkat <?= $tingkat['tingkat'] ?></small></h3>
            <a class="btn btn-primary btn-xs float-right" data-toggle="modal" data-target="#tambah"> <i class="fas fa-plus"></i> Tambah</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="example2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Mapel</th>
                        <th>Mapel</th>
                        <th>Kelas</th>
                        <th>Guru Bid.Study</th>
                        <th>Hari/Waktu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($jadwal as $key => $value) { ?>

                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['kode_mapel'] ?></td>
                            <td><?= $value['mapel'] ?></td>
                            <td><?= $value['kelas'] ?></td>
                            <td><?= $value['nama_guru'] ?></td>
                            <td><?= $value['hari'] ?>/<?= $value['waktu'] ?></td>
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
        <?php echo form_open('jadwal/add/' . $tingkat['id_tingkat']) ?>
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
                    <select name="id_mapel" id="" class="form-control">
                        <option value="">-Pilih Mapel-</option>
                        <?php foreach ($datamapel as $key => $value) { ?>
                            <option value="<?= $value['id_mapel'] ?>"><?= $value['kode_mapel'] ?> |<?= $value['mapel'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Guru Bid.Study</label>
                    <select name="id_guru" id="" class="form-control">
                        <option value="">Pilih Guru</option>
                        <?php foreach ($guru as $key => $value) { ?>
                            <option value="<?= $value['id_guru'] ?>"><?= $value['nama_guru'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Kelas</label>
                    <select name="id_kelas" id="" class="form-control">
                        <option value="">Pilih Kelas</option>
                        <?php foreach ($kelas as $key => $value) { ?>
                            <option value="<?= $value['id_kelas'] ?>"><?= $value['kelas'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Hari</label>
                    <select name="hari" id="" class="form-control">
                        <option value="">-Pilih Hari-</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jum'at">Jum'at</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Waktu</label>
                    <input type="text" name="waktu" class="form-control">
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