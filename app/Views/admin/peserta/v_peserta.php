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
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile" aria-selected="false">Keluar</button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-lulus" aria-controls="navs-pills-top-lulus" aria-selected="false">Lulus</button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-messages" aria-controls="navs-pills-top-messages" aria-selected="false">Verifikasi</button>
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
                                                            echo bg-lightblue
                                                    <?php } ?>
                                                    ">
                                    <td class="text-center"><a href="<?= base_url('peserta/detail_siswa/' .  $value['nisn']) ?>"> <i class='bx bxs-user-circle bx-sm text-info '></i> </a></td>
                                    <td class="text-center"><?= $value["nis"] ?></td>
                                    <td class="text-center"><?= $value["nisn"] ?></td>
                                    <td><?= $value["nama_siswa"] ?></td>
                                    <td class="text-center"><?= $value["tempat_lahir"] ?></td>
                                    <td><?= date('d M Y', strtotime($value["tanggal_lahir"])) ?></td>
                                    <td class=""><?= $value["nama_ibu"] ?></td>
                                    <td class="text-center"><?= $value["jenis_kelamin"] ?></td>
                                    <td class="text-center"><?= $value["tingkat"] ?></td>
                                    <td class="text-center">

                                        <a href="" data-bs-toggle="modal" data-bs-target="#keluar<?= $value['nisn'] ?>"> <i class='bx bx-log-out bx-sm text-danger'></i> </a>
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
                                                <a href="<?= base_url('peserta/printmohon/' . $value['nisn']) ?>" class="btn rounded-pill btn-icon btn-primary"> <i class='bx bx-printer'></i></a>
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
                        <table class="table table-bordered" id="lulus">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">NIS</th>
                                    <th class="text-center">NISN</th>
                                    <th class="text-center">Nama Siswa</th>
                                    <th class="text-center">TTL</th>
                                    <th class="text-center">L/P</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $no = 1;

                                foreach ($lulusan as $key => $value) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td class="text-center"><?= $value["nis"] ?></td>
                                        <td class="text-center"><?= $value["nisn"] ?></td>
                                        <td><?= $value["nama_siswa"] ?></td>
                                        <td class="text-center"><?= $value["tempat_lahir"] ?>, <?= date('d M Y', strtotime($value["tanggal_lahir"])) ?></td>
                                        <td class="text-center"><?= $value["jenis_kelamin"] ?></td>
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
                                                <a href="<?= base_url('peserta/detail_siswa/' .  $value['nisn']) ?>" class="btn btn-primary btn-sm"><i class='bx bx-check-square'></i> </a>
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
                                            <option value="<?= $val['id_tingkat'] ?>"><?= $val['tingkat'] ?></option>
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
    <div class="modal fade" id="keluar<?= $value['nisn'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <?= form_open('peserta/keluar/' .  $value['nisn']) ?>
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
                <table class="table table-bordered" id="example">
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
                                <td><?= $data['tingkat'] ?></td>
                                <input type="hidden" name="aktif[]" value="0">
                                <input type="hidden" name="id_tingkat[]" value="0">
                                <input type="hidden" name="status_daftar[]" value="5">
                                <input type="hidden" name="id_ta[]" value="<?= $ta['tahun'] ?>">

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
                <table class="table table-bordered" id="example">
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
                                <td><?= $data['tingkat'] ?></td>
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