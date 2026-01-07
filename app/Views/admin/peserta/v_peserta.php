<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<?php

$db     = \Config\Database::connect();

$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();

?>
<style>
    .isi {
        font-size: 15px;
    }

    table {
        width: 100%;
    }

    tr .bg-lightblue {
        background-color: #456784;
    }
</style>


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
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-blmaktif" aria-controls="navs-pills-top-profile" aria-selected="false">Belum Aktif</button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile" aria-selected="false">Keluar</button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-lulus" aria-controls="navs-pills-top-lulus" aria-selected="false">Lulus</button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-messages" aria-controls="navs-pills-top-messages" aria-selected="false">Verifikasi
                    <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger ms-1_5"><?= $jmlverif ?></span>
                </button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-tambahsiswa" aria-controls="navs-pills-top-messages" aria-selected="false">Tambah Siswa</button>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-bordered isi" id="example">
                        <thead class="">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">NIS</th>
                                <th class="text-center">NISN</th>
                                <th class="text-center">Nama Siswa</th>
                                <th class="text-center">Tempat Lahir</th>
                                <th class="text-center">Tanggal Lahir</th>
                                <th class="text-center">Nama Ibu</th>
                                <th class="text-center">L/P</th>
                                <th class="text-center">Tingkat</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $no = 1;

                            foreach ($peserta as $key => $value) { ?>
                                <tr class="<?php
                                            $hasil = "Sudah Meninggal";
                                            if ($hasil == $value['kerja_ayah']) { ?>
                                        echo table-primary
                                    <?php } ?>">

                                    <td class="text-center"><a href="<?= base_url('peserta/detail_siswa/' .  $value['id_siswa']) ?>"> <i class='bx bxs-user-circle bx-sm text-info '></i> </a></td>
                                    <td class="text-center"><?= $value["nis"] ?></td>
                                    <td class="text-center"><?= $value["nisn"] ?></td>
                                    <td><?= $value["nama_siswa"] ?></td>
                                    <td class="text-center"><?= $value["tempat_lahir"] ?></td>
                                    <td><?= date('d M Y', strtotime($value["tanggal_lahir"])) ?></td>
                                    <td class=""><?= $value["nama_ibu"] ?></td>
                                    <td class="text-center"><?= $value["jenis_kelamin"] ?></td>
                                    <td class="text-center"><?= $value["nama_tingkat"] ?></td>
                                    <td class="text-center">

                                        <a href="" data-bs-toggle="modal" data-bs-target="#bukuinduk<?= $value['id_siswa'] ?>"> <i class='bx bxs-book bx-sm text-success'></i></i> </a>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#keluar<?= $value['id_siswa'] ?>"> <i class='bx bx-log-out bx-sm text-danger'></i> </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>


                <p class=" text-danger mt-3">*<i> Luluskan dahulu tingkat 9, baru Proses Naik Tingkat</i></p>
                <button class="btn btn-danger mr-3 mt-2" data-bs-toggle="modal" data-bs-target="#lulusan">Proses Lulus Kelas 9</button>
                <button class="btn btn-primary mr-3 mt-2" data-bs-toggle="modal" data-bs-target="#naik">Proses Naik Tingkat</button>
            </div>
            <div class="tab-pane fade" id="navs-pills-top-blmaktif" role="tabpanel">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="blmaktif">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">NISN</th>
                                    <th class="text-center">Nama Siswa</th>
                                    <th class="text-center">L/P</th>
                                    <th class="text-center">Nama Ibu</th>
                                    <th class="text-center">Ket</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $no = 1;

                                foreach ($blmaktif as $key => $value) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td class="text-center"><?= $value["nisn"] ?></td>
                                        <td><?= $value["nama_siswa"] ?></td>
                                        <td class="text-center"><?= $value["jenis_kelamin"] ?></td>
                                        <td class="text-center"><?= $value["nama_ibu"] ?></td>
                                        <td class="text-center"><button class="btn btn-danger">Belum Aktif</button></td>


                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">NIS</th>
                                    <th class="text-center">NISN</th>
                                    <th class="text-center">Nama Siswa</th>
                                    <th class="text-center">TTL</th>
                                    <th class="text-center">L/P</th>
                                    <th class="text-center">Tingkat</th>
                                    <th class="text-center">Alasan</th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $no = 1;

                                foreach ($keluar as $key => $value) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td class="text-center"><?= $value["nis"] ?></td>
                                        <td class="text-center"><?= $value["nisn"] ?></td>
                                        <td><?= $value["nama_siswa"] ?></td>
                                        <td class="text-center"><?= $value["tempat_lahir"] ?>, <?= $value["tanggal_lahir"] ?></td>
                                        <td class="text-center"><?= $value["jenis_kelamin"] ?></td>
                                        <td class="text-center"><?= $value["tingkat"] ?></td>

                                        <td class="text-center">

                                            <?php if ($value['status'] == 'Mutasi') { ?>
                                                <span class="text-info">Mutasi</span>
                                            <?php } else { ?>
                                                <span class="text-danger">Mengundurkan diri</span>
                                            <?php }  ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($value['status'] == 'Mutasi') { ?>
                                                <a href="<?= base_url('peserta/printmohon/' . $value['id_siswa']) ?>" class="btn rounded-pill btn-icon btn-primary"> <i class='bx bx-printer'></i></a>
                                            <?php } else { ?>

                                            <?php }  ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade" id="navs-pills-top-lulus" role="tabpanel">
                <div class="card-body">
                    <div class="col-md-5">
                        <div class="row mb-3">
                            <label for="" class="col-sm-4">Tahun Lulus</label>
                            <div class="col-sm-8">
                                <select name="" id="" class="form-select form-select-sm">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="akanlulus">
                            <thead class="">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">NIS</th>
                                    <th class="text-center">NISN</th>
                                    <th class="text-center">Nama Siswa</th>
                                    <th class="text-center">Tempat Lahir</th>
                                    <th class="text-center">Tanggal Lahir</th>
                                    <th class="text-center">Nama Ibu</th>
                                    <th class="text-center">L/P</th>
                                    <th class="text-center">Rombel Terakhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $no = 1;

                                foreach ($lulusan as $key => $value) { ?>
                                    <tr>
                                        <td class="text-center"><a href="<?= base_url('peserta/detail_siswa/' .  $value['id_siswa']) ?>"> <i class='bx bxs-user-circle bx-sm text-info '></i> </a></td>
                                        <td class="text-center"><?= $value["nis"] ?></td>
                                        <td class="text-center"><?= $value["nisn"] ?></td>
                                        <td class=""><?= $value["nama_siswa"] ?></td>
                                        <td class="text-center"><?= $value["tempat_lahir"] ?></td>
                                        <td class="text-center"><?= date('d M Y', strtotime($value["tanggal_lahir"])) ?></td>
                                        <td class="text-center"><?= $value["nama_ibu"] ?></td>
                                        <td class="text-center"><?= $value["jenis_kelamin"] ?></td>
                                        <td class="text-center">undefined</td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade" id="navs-pills-top-messages" role="tabpanel">
                <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="verifikasi">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">NIS</th>
                                        <th class="text-center">NISN</th>
                                        <th class="text-center">Nama Siswa</th>
                                        <th class="text-center">TTL</th>
                                        <th class="text-center">L/P</th>
                                        <th class="text-center">Tingkat</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $no = 1;

                                    foreach ($verifikasi as $key => $value) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td class="text-center"><?= $value["nis"] ?></td>
                                            <td class="text-center"><?= $value["nisn"] ?></td>
                                            <td><?= $value["nama_siswa"] ?></td>
                                            <td class="text-center"><?= $value["tempat_lahir"] ?>, <?= date('d M Y', strtotime($value["tanggal_lahir"])) ?></td>
                                            <td class="text-center"><?= $value["jenis_kelamin"] ?></td>
                                            <td class="text-center"><?= $value["tingkat"] ?></td>

                                            <td class="text-center">
                                                <a href="<?= base_url('peserta/detail_siswa/' .  $value['id_siswa']) ?>" class="btn btn-primary btn-sm"><i class='bx bx-check-square'></i> </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="navs-pills-top-tambahsiswa" role="tabpanel">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-header">Upload Data Siswa</h5>
                        <div class="card-body demo-vertical-spacing demo-only-element">

                            <a href="<?= base_url('peserta/downloadtemplate') ?>" class="btn btn-outline-success btn-lg"> <i class='bx bxs-download'></i> Download Template</a>
                            <?= form_open_multipart('peserta/upload') ?>
                            <div class="input-group">
                                <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="fileimport" accept=".xls,.xlsx">
                                <button class="btn btn-outline-primary" type="submit" id="inputGroupFileAddon04">Submit</button>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5 class="card-header">Tambah Data Siswa</h5>
                        <div class="card-body demo-vertical-spacing demo-only-element">
                            <?= form_open('peserta/add') ?>
                            <div class=" row mb-3">
                                <label for="nama siswa" class="col-sm-4">Nama Siswa</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama_siswa">
                                </div>
                            </div>
                            <div class=" row mb-3">
                                <label for="jenis_kelamin" class="col-sm-4">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="jenis_kelamin">
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class=" row mb-3">
                                <label for="tempat_lahir" class="col-sm-4">Tempat</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="tempat_lahir">
                                </div>
                            </div>
                            <div class=" row mb-3">
                                <label for="tanggal_lahir" class="col-sm-4">Tanggal Lahir</label>
                                <div class="col-sm-8">
                                    <input type="date" name="tanggal_lahir" class="form-control">
                                </div>
                            </div>
                            <div class=" row mb-3">
                                <label for="" class="col-sm-4">NISN</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nisn">
                                </div>
                            </div>
                            <div class=" row mb-3">
                                <label for="" class="col-sm-4">NIK</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nik">
                                </div>
                            </div>
                            <div class=" row mb-3">
                                <label for="" class="col-sm-4">Nama Ibu</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama_ibu">
                                </div>
                            </div>
                            <div class=" row mb-3">
                                <label for="" class="col-sm-4">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class=" row mb-3">
                                <label for="" class="col-sm-4">Tingkat</label>
                                <div class="col-sm-8">
                                    <select name="id_tingkat" id="" class="form-control">
                                        <?php foreach ($tingkat as $key => $val) { ?>
                                            <option value="<?= $val['id_tingkat'] ?>"><?= $val['nama_tingkat'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Save</button>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Keluar -->

<?php foreach ($peserta as $key => $value) { ?>
    <div class="modal fade" id="keluar<?= $value['id_siswa'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <?= form_open('peserta/keluar/' .  $value['id_siswa']) ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Proses Non Aktif</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Yakin Akan Melakukan Proses keluar <?= $value['nama_siswa'] ?> ?</p>
                    <div class="mb-4">
                        <label for="">Keluar Karena?</label>
                        <select name="status" class="form-control">
                            <option value="Mutasi">Mutasi</option>
                            <option value="Mengundurkan diri">Mengundurkan diri</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="">Ke Sekolah</label>
                        <input type="text" name="sekolah" class="form-control">
                    </div>
                    <div class="mb-4">
                        <label for="">Alasan</label>
                        <input type="text" name="alasan" class="form-control">
                    </div>
                    <div class="mb-4">
                        <label for="">Tanggal Pengajuan</label>
                        <input type="text" name="tgl_ajuan" class="form-control" value="<?= date('Y-m-d') ?>">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </div>
<?php } ?>


<!-- Eksport -->
<div class="modal fade" id="eksport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eksport Data Peserta Didik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-start">
                    <div class="excel text-center">
                        <a href=" <?= base_url('peserta/eksporexcel') ?>"></a>
                        <p style="font-size: 20px;font-weight:bold">.xlsx</p>
                    </div>
                    <div class="pdf text-center">
                        <a href="<?= base_url('peserta/eksporpdf') ?>"><i class='bx bxs-file-pdf bx-lg'></i></a>
                        <p style="font-size: 20px;font-weight:bold">.pdf</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="lulusan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Proses Naik Tingkat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <?= form_open('peserta/lulus') ?>
                <table class="table table-bordered" id="proseslulus" style="width:100%">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="check-all"></th>
                            <th>Nama Peserta Didik</th>
                            <th>NISN</th>
                            <th>Tingkat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lulus as $key => $data) { ?>
                            <tr>
                                <td><input type="checkbox" class="check-item" name="nisn[]" value="<?= $data['nisn'] ?>"></td>
                                <td><?= $data['nama_siswa'] ?></td>
                                <td><?= $data['nisn'] ?></td>
                                <td><?= $data['nama_tingkat'] ?></td>
                                <input type="hidden" name="aktif[]" value="0">
                                <input type="hidden" name="id_tingkat[]" value="0">
                                <input type="hidden" name="id_ta[]" value="0">
                                <input type="hidden" name="status_daftar[]" value="4">
                                <input type="hidden" name="tahun_lulus[]" value="<?= $ta['tahun'] ?>">

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>




<!-- ProsesNaik Tingkat -->
<div class="modal fade" id="naik" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Proses Naik Tingkat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <?= form_open('peserta/naik') ?>
                <table class="table table-bordered" id="tblnilai" style="width:100%">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="check-in"></th>
                            <th>Nama Peserta Didik</th>
                            <th>NISN</th>
                            <th>Tingkat</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($naik as $key => $data) { ?>
                            <tr>
                                <td><input type="checkbox" class="check-semua" name="nisn[]" value="<?= $data['nisn'] ?>"></td>
                                <td><?= $data['nama_siswa'] ?></td>
                                <td><?= $data['nisn'] ?></td>
                                <td><?= $data['nama_tingkat'] ?></td>
                                <input type="hidden" name="id_ta[]" value="<?= $ta['id_ta'] ?>">
                                <input type="hidden" class="form-control" name="id_tingkat[]" value="<?= $data['id_tingkat'] + 1 ?>">
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<!-- Buku Induk -->
<?php foreach ($peserta as $key => $siswa) { ?>
    <div class="modal fade" id="bukuinduk<?= $siswa['id_siswa'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buku Induk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100px">
                                <tr>
                                    <th colspan="3" class="text-center">
                                        Lembar Induk Siswa
                                    </th>
                                </tr>
                                <tr>
                                    <td class="text-center" colspan="2">Nomor Induk Siswa : <?= $siswa['nis'] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center" colspan="2">Nomor Induk Siswa Nasional : <?= $siswa['nisn'] ?></td>
                                </tr>

                                <tr>
                                    <td colspan="3"><b>A. KETERANGAN DIRI SISWA </b></td>
                                </tr>
                                <tr>
                                    <td widtd="100px">1. Nama Lengkap</td>
                                    <td widtd="100px"><?= $siswa['nama_siswa'] ?></td>
                                </tr>
                                <tr>
                                    <td>2. Jenis Kelamin</td>
                                    <td><?= $siswa['jenis_kelamin'] ?></td>
                                </tr>
                                <tr>
                                    <td>3. Tempat dan Tanggal Lahir</td>
                                    <td><?= $siswa['tempat_lahir'] ?>, <?= formatindo(date($siswa['tanggal_lahir']))  ?></td>
                                </tr>
                                <tr>
                                    <td>4. Agama</td>
                                    <td>Islam</td>
                                </tr>
                                <tr>
                                    <td>5. Kewaganegaraan</td>
                                    <td>Indonesia</td>
                                </tr>
                                <tr>
                                    <td>6. Anak Ke Berapa</td>
                                    <td><?= $siswa['anak_ke'] ?></td>
                                </tr>
                                <tr>
                                    <td>7. Jumlah Saudara Kandung</td>
                                    <td><?= $siswa['jml_saudara'] ?></td>
                                </tr>
                                <tr>
                                    <td>8. Jumlah Saudara Tiri</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>9. Anak Yatim/Piatu/yatim piatu</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>B. KONTAK </b></td>
                                </tr>
                                <tr>
                                    <td>10. Alamat</td>
                                    <td><?= $siswa['alamat'] ?> RT <?= $siswa['rt'] ?> RW <?= $siswa['rw'] ?> Desa/Kel. <?= $siswa['desa'] ?> Kec. <?= $siswa['kecamatan'] ?></td>
                                </tr>
                                <tr>
                                    <td>11. Nomor Telepon</td>
                                    <td><?= $siswa['telp_anak'] ?></td>
                                </tr>
                                <tr>
                                    <td>12. Tinggal Bersama</td>
                                    <td><?= $siswa['tinggal'] ?></td>
                                </tr>
                                <tr>
                                    <td>13. Jarak Tempat tinggal Ke Sekolah</td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td colspan="2"><b>C. DATA AYAH </b></td>
                                </tr>
                                <tr>
                                    <td>14. Nama</td>
                                    <td><?= $siswa['nama_ayah'] ?></td>
                                </tr>
                                <tr>
                                    <td>15. Tahun Lahir</td>
                                    <td><?= $siswa['tahun_ayah'] ?></td>
                                </tr>
                                <tr>
                                    <td>16. NIK </td>
                                    <td><?= $siswa['nik_ayah'] ?></td>
                                </tr>
                                <tr>
                                    <td>17. Pendidikan Terakhir</td>
                                    <td><?= $siswa['didik_ayah'] ?></td>
                                </tr>
                                <tr>
                                    <td>18. Pekerjaan </td>
                                    <td><?= $siswa['kerja_ayah'] ?></td>
                                </tr>
                                <tr>
                                    <td>19. Penghasilan</td>
                                    <td><?= $siswa['hasil_ayah'] ?></td>
                                </tr>
                                <tr>
                                    <td>20. Telepon</td>
                                    <td><?= $siswa['telp_ayah'] ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>D. DATA IBU </b></td>
                                </tr>
                                <tr>
                                    <td>21. Nama</td>
                                    <td><?= $siswa['nama_ibu'] ?></td>
                                </tr>
                                <tr>
                                    <td>22. Tahun Lahir</td>
                                    <td><?= $siswa['tahun_ibu'] ?></td>
                                </tr>
                                <tr>
                                    <td>23. NIK </td>
                                    <td><?= $siswa['nik_ibu'] ?></td>
                                </tr>
                                <tr>
                                    <td>24. Pendidikan Terakhir</td>
                                    <td><?= $siswa['didik_ibu'] ?></td>
                                </tr>
                                <tr>
                                    <td>25. Pekerjaan </td>
                                    <td><?= $siswa['kerja_ibu'] ?></td>
                                </tr>
                                <tr>
                                    <td>26. Penghasilan</td>
                                    <td><?= $siswa['hasil_ibu'] ?></td>
                                </tr>
                                <tr>
                                    <td>27. Telepon</td>
                                    <td><?= $siswa['telp_ibu'] ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>E. KESEHATAN </b></td>
                                </tr>
                                <tr>
                                    <td>28. Tinggi Badan</td>
                                    <td><?= $siswa['tinggi'] ?> cm</td>
                                </tr>
                                <tr>
                                    <td>28. Berat Badan</td>
                                    <td><?= $siswa['berat'] ?> kg</td>
                                </tr>
                                <tr>
                                    <td>28. Lingkar Kepala</td>
                                    <td><?= $siswa['lingkar'] ?> cm</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php } ?>


<script src="<?= base_url() ?>/template/assets/vendor/libs/jquery/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>






<script>
    const swal = $('.swal').data('swal');
    if (swal) {
        Swal.fire({
            title: 'Data Berhasil',
            text: swal,
            icon: 'success'
        })
    }
</script>

<script>
    $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
        $("#check-all").click(function() { // Ketika user men-cek checkbox all
            if ($(this).is(":checked")) // Jika checkbox all diceklis
                $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
            else // Jika checkbox all tidak diceklis
                $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
        });
    });
</script>

<script>
    $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
        $("#check-in").click(function() { // Ketika user men-cek checkbox all
            if ($(this).is(":checked")) // Jika checkbox all diceklis
                $(".check-semua").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
            else // Jika checkbox all tidak diceklis
                $(".check-semua").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
        });
    });
</script>





















<?= $this->endSection() ?>