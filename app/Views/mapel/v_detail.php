<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<!-- Main content -->
<div class="container">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Data Rombongan Kelas <?= $kelas['kelas'] ?></h3>
                <a class="btn btn-primary btn-xs float-right" data-toggle="modal" data-target="#tambah"> <i class="fas fa-plus"></i> Tambah</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th width="50px">Kelas</th>
                        <td width="30px">:</td>
                        <td><?= $kelas['kelas'] ?></td>
                        <th></th>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Semester </th>
                        <td width="20px">:</td>
                        <td><?= $kelas['semester'] ?></td>
                        <th></th>
                        <td></td>
                        <td></td>
                    </tr>

                    <tbody>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Jadwal Pelajaran <?= $kelas['kelas'] ?></h3>
                <a class="btn btn-primary btn-xs float-right" data-toggle="modal" data-target="#tambah"> <i class="fas fa-plus"></i> Tambah</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Mapel</th>
                            <th>Nama Mata Pelajaran</th>
                            <th>Nama Guru</th>
                            <th>KKM</th>
                            <th>Kelompok</th>
                            <th class="text-center">Aksi</th>
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
                                <td><?= $value['nama_guru'] ?></td>
                                <td><?= $value['kkm'] ?></td>
                                <td><?= $value['kelompok'] ?></td>
                                <td>
                                    <a href="">Edit</a>
                                    <a href="">Hapus</a>
                                </td>
                            </tr>


                        <?php } ?>
                    </tbody>


                </table>
            </div>
        </div>
    </div>
</div>
<!-- ModalTambah -->

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php echo form_open('mapel/add/' . $kelas['id_kelas']) ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah mapel</h5>
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
                    <label for="">Nama Mata Pelajaran</label>
                    <input type="text" class="form-control" name="mapel">
                </div>
                <div class="form-group">
                    <label for="">Nama Guru</label>
                    <select name="id_guru" id="" class="form-control">
                        <option value="">Pilih Guru</option>
                        <?php foreach ($guru as $key => $value) { ?>
                            <option value="<?= $value['id_guru'] ?>"><?= $value['nama_guru'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">KKM</label>
                    <input type="text" class="form-control" name="kkm">
                </div>
                <div class="form-group">
                    <label for="">Kelompok</label>
                    <input type="text" class="form-control" name="kelompok">
                </div>
                <div class="form-group">
                    <label for="">Semester</label>
                    <select name="smt" class="form-control" id="">
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Semester </label>
                    <select name="semester" class="form-control" id="">
                        <option value="Ganjil">Ganjil</option>
                        <option value="Genap">Genap</option>
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


<!-- ModalHapus -->




<!-- Edit -->



<?= $this->endSection() ?>