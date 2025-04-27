<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<!-- Main content -->

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Data Siswa Kelas <?= $kelas['kelas'] ?></h3>
                <a class="btn btn-danger btn-xs float-right" data-toggle="modal" data-target="#tambah"> <i class="fas fa-plus"></i> Tambah</a>
                <a class="btn btn-success btn-xs float-right mr-2" href="<?= base_url('kelas') ?>"> <i class="fas fa-backward"></i></i> Kembali</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered mb-5">
                    <tr>
                        <th width="100px">Wali Kelas</th>
                        <td width="20px">:</td>
                        <td><?= $kelas['nama_guru'] ?></td>
                        <th>Jumlah </th>
                        <td width="20px">:</td>
                        <td><?= $jml_siswa ?></td>
                    </tr>
                    <tr>
                        <th width="50px">Kelas</th>
                        <td width="30px">:</td>
                        <td><?= $kelas['kelas'] ?></td>
                        <th>Tingkat</th>
                        <td width="20px">:</td>
                        <td><?= $kelas['tingkat'] ?></td>
                    </tr>
                </table>


                <?php if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo session()->getFlashdata('pesan');
                    echo ' </div>';
                } ?>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-sm-8">
        <?= form_open_multipart('peserta/upload') ?>
        <div class="form-group row">
            <div class="col-md-6">
                <input type="file" class="form-control" id="exampleInputFile" name="fileimport">
            </div>
            <div class="col-md-4 d-flex">
                <button type="submit" class="btn btn-default"> <i class="fa-solid fa-upload"></i> Upload</button>
                <a href="" class="btn btn-default float-right"><i class="fa-solid fa-file-excel"></i> Excel</a>
                <a href="" class="btn btn-default float-right"><i class="fa-solid fa-file-pdf"></i> Pdf</a>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>



<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Daftar Nilai P3MP Ganjil</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%">
                        <thead>
                            <tr class="bg-primary">
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th class="text-center" width="20%">NISN</th>
                                <th>PAI</th>
                                <th>PKN</th>
                                <th>B.Indo</th>
                                <th>MTK</th>
                                <th>IPA</th>
                                <th>IPS</th>
                                <th>B.Inggris</th>
                                <th>SBK</th>
                                <th>PJOK</th>
                                <th>PRKY</th>
                                <th>TIK</th>
                                <th>MHD</th>
                                <th>TAJWID</th>
                                <th>TRMH</th>
                                <th>FIQIH</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($datanilai as $key => $value) { ?>
                                <tr class="text-center" style="font-size: 13px;">
                                    <td><?= $no++ ?></td>
                                    <td width="40%"><?= $value['nama_siswa'] ?></td>
                                    <td><?= $value['nisn'] ?></td>
                                    <td><?= $value['pai'] ?></td>
                                    <td><?= $value['pkn'] ?></td>
                                    <td><?= $value['indo'] ?></td>
                                    <td><?= $value['mtk'] ?></td>
                                    <td><?= $value['ipa'] ?></td>
                                    <td><?= $value['ips'] ?></td>
                                    <td><?= $value['inggris'] ?></td>
                                    <td><?= $value['sbk'] ?></td>
                                    <td><?= $value['pjok'] ?></td>
                                    <td><?= $value['prky'] ?></td>
                                    <td><?= $value['tik'] ?></td>
                                    <td><?= $value['mhd'] ?></td>
                                    <td><?= $value['tjwd'] ?></td>
                                    <td><?= $value['trjmh'] ?></td>
                                    <td><?= $value['mhd'] ?></td>
                                    <td>
                                        <?php
                                        $jumlah = round($value['pai'] + $value['pai']  + $value['pai']);
                                        echo $jumlah;

                                        ?>
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






<!-- ModalHapus -->







<!-- AkhirBukuInduk -->



<?= $this->endSection() ?>