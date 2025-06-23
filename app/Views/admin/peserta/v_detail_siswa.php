<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<?php

$db     = \Config\Database::connect();

$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();

?>

<div class="swal" data-swal="<?= session()->getFlashdata('pesan'); ?>"></div>

<style>
    .ikon {
        float: right;
    }
</style>


<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4 pb-4 border-bottom">
                        <?php
                        $gender = "L";
                        if ($gender == $siswa['jenis_kelamin']) { ?>
                            <img src="<?= base_url('foto/muslim.png') ?>" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                        <?php } else { ?>
                            <img src="<?= base_url('foto/woman.png') ?>" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                        <?php  } ?>
                        <div class="text-center">
                            <h3 class="profile-username text-center"><?= $siswa['nama_siswa'] ?></h3>
                            <p class="text-muted text-center">(<?= $siswa['nisn'] ?> / <?= $siswa['nis'] ?>)</p>

                            <?php if ($siswa['status_daftar'] == 1) { ?>
                            <?php } else if ($siswa['status_daftar'] == 2) { ?>

                                <?= form_open('peserta/verifikasi/' . $siswa['nisn']) ?>
                                <input type="hidden" name="status_daftar" value="3">
                                <input type="hidden" name="id_ta" value="<?= $ta['id_ta'] ?>">


                                <button type="submit" class="btn btn-info btn-sm">verifikasi</button>

                                <?= form_close() ?>

                            <?php } else if ($siswa['status_daftar'] == 3) { ?>
                                <button class="btn btn-success btn-sm">akun aktif</button>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="card-body border-bottom mb-4">
                        <ul class="mb-3 p-0" style="list-style: none;">
                            <li class="d-flex justify-content-between align-items-center">
                                Jenis Kelamin
                                <span> <?php
                                        $gender = "L";
                                        if ($gender == $siswa['jenis_kelamin']) { ?>
                                        Laki-laki
                                    <?php } else { ?>
                                        Perempuan
                                    <?php  } ?>
                                </span>

                            </li>
                            <hr>
                            <li class="d-flex justify-content-between align-items-center">
                                Tempat Lahir
                                <span> <?= $siswa['tempat_lahir'] ?> </span>
                            </li>
                            <hr>
                            <li class="d-flex justify-content-between align-items-center">
                                Tanggal Lahir
                                <span> <?= formatindo(date($siswa['tanggal_lahir']))  ?> </span>
                            </li>
                            <hr>
                            <li class="d-flex justify-content-between align-items-center">
                                Ibu kandung
                                <span> <?= $siswa['nama_ibu'] ?> </span>
                            </li>
                        </ul>
                    </div>
                    <div class="pembelajaran border-bottom mb-4">
                        <h5>Pembelajaran <button class="ikon btn btn-primary btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#pilihkelas">Pilih Kelas</button></li>
                        </h5>
                        <ul style="list-style: none;">
                            <li>Rombel : <?= $siswa['kelas'] ?>
                            <li>Tingkat Pendidikan: <?= $siswa['tingkat'] ?></li>
                            <li>Semester Aktif : <?= $ta['ta'] ?>/<b><?= $ta['semester'] ?></b></li>
                            <li>Link Wa :<?= $siswa['link_wa'] ?></li>
                        </ul>
                    </div>

                    <div class="mapii">
                        <h5> Tempat Tinggal <button class="ikon btn-primary btn btn-sm" data-bs-toggle="modal" data-bs-target="#alamat"><i class='bx bxs-edit-alt'></i></button> </h5>
                        <p><?= $siswa['alamat'] ?> RT <?= $siswa['rt'] ?> RW <?= $siswa['rw'] ?></p>
                        <p>Desa/Kel <?= $siswa['desa'] ?> Kec. <?= $siswa['nama_kecamatan'] ?></p>
                        <p>Titik Koordinat : <?= $siswa['lokasi'] ?></p>
                        <div id="map" style="height:500px"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="nav-align-top mb-6">
                <ul class="nav nav-pills mb-4" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home" aria-selected="true">Data Atribut</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-ortu" aria-controls="navs-pills-top-ortu" aria-selected="false">Orang Tua</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-register" aria-controls="navs-pills-top-ortu" aria-selected="false">Data Lainnya</button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
                        <div class="row">
                            <div class="atas">
                                <h5>Identitas <button class="ikon btn-primary btn btn-sm" data-bs-toggle="modal" data-bs-target="#identitas"><i class='bx bxs-edit-alt'></i></button> </h5>
                                <ul class="atribut" style="list-style:none">
                                    <li class="p-0">
                                        NIK :
                                        <span><?= $siswa['nik'] ?></span>
                                    </li>
                                    <hr>
                                    <li class="p-0">
                                        Nomor KK :
                                        <span><?= $siswa['no_kk'] ?></span>
                                    </li>
                                    <hr>
                                    <li class="p-0">
                                        Agama :
                                        <span>Islam</span>
                                    </li>
                                    <hr>
                                    <li class="p-0">
                                        Kewarganegaraan :
                                        <span>Indonesia</span>
                                    </li>
                                    <hr>
                                    <li class="p-0">
                                        Kebutuhan Khusus :
                                        <span>Tidak Ada</span>
                                    </li>
                                    <hr>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="navs-pills-top-ortu" role="tabpanel">
                        <div class="row">
                            <h5> Identitas Orang Tua <button class="ikon btn-primary btn btn-sm" data-bs-toggle="modal" data-bs-target="#ortu"><i class='bx bxs-edit-alt'></i></button> </h5>
                            <div class="col-lg-6">
                                <ul class="atribut" style="list-style:none">
                                    <li class="p-0">
                                        Nama Ayah :
                                        <span><?= $siswa['nama_ayah'] ?></span>
                                    </li>
                                    <hr>
                                    <li class="p-0">
                                        Tahun Lahir :
                                        <span><?= $siswa['tahun_ayah'] ?></span>
                                    </li>
                                    <hr>
                                    <li class="p-0">
                                        NIK :
                                        <span><?= $siswa['nik_ayah'] ?></span>
                                    </li>
                                    <hr>
                                    <li class="p-0">
                                        Pendidikan :
                                        <span><?= $siswa['didik_ayah'] ?></span>

                                    </li>
                                    <hr>
                                    <li class="p-0">
                                        Pekerjaan :
                                        <?php
                                        $hasilayah = $siswa['kerja_ayah'];
                                        $sisap = str_replace('-', ' ', $hasilayah)
                                        ?>
                                        <span><?= $sisap ?></span>
                                    </li>
                                    <hr>
                                    <li class="p-0">
                                        Penghasilan :
                                        <?php
                                        $hasilayah = $siswa['hasil_ayah'];
                                        $hasilna = str_replace('-', ' ', $hasilayah)
                                        ?>
                                        <span><?= $hasilna ?></span>
                                    </li>
                                    <hr>
                                    <li class="p-0">
                                        Telepon :
                                        <span><a target="_blank" href="https://wa.me/<?= $siswa['telp_ayah'] ?>?text=Silahkan%20Bergabung%20Di%20Rombel%20<?= $siswa['kelas'] ?>%20dengan%20klik%20link%20ini%20<?= $siswa['link_wa'] ?>"><?= $siswa['telp_ayah'] ?></a></span>
                                    </li>
                                    <hr>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="atribut" style="list-style:none">
                                    <li class="p-0">
                                        Nama Ibu :
                                        <span><?= $siswa['nama_ibu'] ?></span>
                                    </li>
                                    <hr>
                                    <li class="p-0">
                                        Tahun Lahir :
                                        <span><?= $siswa['tahun_ibu'] ?></span>
                                    </li>
                                    <hr>
                                    <li class="p-0">
                                        NIK :
                                        <span><?= $siswa['nik_ibu'] ?></span>
                                    </li>
                                    <hr>
                                    <li class="p-0">
                                        Pendidikan :
                                        <span><?= $siswa['didik_ibu'] ?></span>
                                    </li>
                                    <hr>
                                    <li class="p-0">
                                        Pekerjaan :
                                        <?php
                                        $kerjaibu = $siswa['kerja_ibu'];
                                        $ibukerja = str_replace('-', ' ', $kerjaibu)
                                        ?>
                                        <span><?= $ibukerja ?></span>
                                    </li>
                                    <hr>
                                    <li class="p-0">
                                        Penghasilan :
                                        <?php
                                        $hasilibu = $siswa['hasil_ibu'];
                                        $ibuhasil = str_replace('-', ' ', $hasilibu)
                                        ?>
                                        <span><?= $ibuhasil ?></span>
                                    </li>
                                    <hr>

                                    <li class="p-0">
                                        Telepon :
                                        <span><a target="_blank" href="https://wa.me/<?=$siswa['telp_ibu'] ?>?text=Silahkan%20Bergabung%20Di%20Rombel%20<?= $siswa['kelas'] ?>%20dengan%20klik%20link%20ini%20<?= $siswa['link_wa'] ?>"><?=$siswa['telp_ibu'] ?></a></span>
                                    </li>
                                    <hr>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <h5> Transportasi dan Tinggal Peserta Didik <button class="ikon btn-primary btn btn-sm" data-bs-toggle="modal" data-bs-target="#tinggal"><i class='bx bxs-edit-alt'></i></button> </h5>
                            <ul class="atribut" style="list-style:none">
                                <li class="p-0">
                                    Tinggal Bersama :
                                    <span><?= $siswa['tinggal'] ?></span>
                                </li>
                                <hr>
                                <li class="p-0">
                                    Transportasi :
                                    <span><?= $siswa['transportasi'] ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="navs-pills-top-register" role="tabpanel">
                        <div class="row">

                            <div class="col-lg-6">
                                <h5>Registrasi</h5>
                                <ul class="atribut" style="list-style:none">
                                    <li class="p-0">
                                        NIPD :
                                        <span><?= $siswa['nis'] ?></span>
                                    </li>
                                    <hr>
                                    <li class="p-0">
                                        Nomor Seri Ijazah :
                                        <span><?= $siswa['seri_ijazah'] ?></span>
                                    </li>
                                    <hr>
                                    <li class="p-0">
                                        Hobi :
                                        <span><?= $siswa['hobi'] ?></span>
                                    </li>
                                    <hr>
                                    <li class="p-0">
                                        Cita-cita :
                                        <span><?= $siswa['cita_cita'] ?></span>
                                    </li>
                                    <hr>
                                    <li class="p-0">
                                        Telp / WA :
                                        <span><?= $siswa['telp_anak'] ?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <h5>Periodik <button class="ikon btn-primary btn btn-sm" data-bs-toggle="modal" data-bs-target="#register"><i class='bx bxs-edit-alt'></i></button></h5>
                                <ul class="atribut" style="list-style:none">
                                    <li class="p-0">
                                        Tinggi Badan :
                                        <span><?= $siswa['tinggi'] ?> cm</span>
                                    </li>
                                    <hr>
                                    <li class="p-0">
                                        Berat Badan :
                                        <span><?= $siswa['berat'] ?> cm</span>
                                    </li>
                                    <hr>
                                    <li class="p-0">
                                        Lingkar Kepala :
                                        <span><?= $siswa['lingkar'] ?> cm</span>
                                    </li>
                                    <hr>
                                    <li class="p-0">
                                        Anak Ke :
                                        <span><?= $siswa['anak_ke'] ?></span>
                                    </li>
                                    <hr>
                                    <li class="p-0">
                                        Jumlah Saudara :
                                        <span><?= $siswa['jml_saudara'] ?></span>
                                    </li>
                                    <hr>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>





<div class="modal fade" id="alamat" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <?= form_open('peserta/edit_alamat/' . $siswa['nisn']) ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Data Lainnya</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div class="row mb-4">
                    <label class="col-sm-4 col-form-label" for="tempattinggal">Alamat</label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" value="<?= $siswa['alamat'] ?>">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-4 col-form-label" for="tempattinggal">RT/RW</label>
                    <div class="col-sm-4">
                        <input type="text" name="rt" class="form-control" value="<?= $siswa['rt'] ?>">

                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="rw" class="form-control" value="<?= $siswa['rw'] ?>">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label for="">Provinsi</label>
                    </div>
                    <div class="col-sm-8">
                        <select name="prov" class="form-control" id="prov">
                            <option value="">--Pilih Provinsi--</option>
                            <?php foreach ($provinsi as $key => $prov) { ?>
                                <option value="<?= $prov['id_provinsi'] ?>"><?= $prov['prov_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label for="">Kab/Kota</label>
                    </div>
                    <div class="col-sm-8">
                        <select name="kabupaten" id="kab" class="form-control">
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label for="">Kecamatan</label>
                    </div>
                    <div class="col-sm-8">
                        <select name="kecamatan" id="kec" class="form-control">
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label for="">Desa/Kel</label>
                    </div>
                    <div class="col-sm-8">
                        <select name="desa" id="kel" class="form-control">
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label for="">Kode Pos</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="kodepos" class="form-control" value="<?= $siswa['kodepos'] ?>">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label for="">Titik Koordinat</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="lokasi" class="form-control" value="<?= $siswa['lokasi'] ?>">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>







<!-- ModalIdentitas -->
<div class="modal fade" id="identitas" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <?= form_open('peserta/edit_identitas/' . $siswa['nisn']) ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Identitas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <label class="col-sm-4 col-form-label" for="basic-default-company">Nama Siswa</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="basic-default-company" placeholder="<?= $siswa['nama_siswa'] ?>" name="nama_siswa" />
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-4 col-form-label" for="basic-default-company">Jenis Kelamin</label>
                    <div class="col-sm-8">
                        <select name="jenis_kelamin" id="" class="form-select">

                            <?php if ($siswa['jenis_kelamin'] == 'L') {
                                echo  "<option value='L' selected>Laki-laki</option>";
                            } else {
                                echo  "<option value='L'>Laki-laki</option>";
                            }

                            if ($siswa['jenis_kelamin'] == 'P') {
                                echo  "<option value='P' selected>Perempuan</option>";
                            } else {
                                echo  "<option value='P'>Perempuan</option>";
                            }
                            ?>

                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-4 col-form-label" for="tempat">Tempat Lahir</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="tempat" value="<?= $siswa['tempat_lahir'] ?>" name="tempat_lahir" />
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-4 col-form-label" for="date">Tanggal Lahir</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="date" value="<?= $siswa['tanggal_lahir'] ?>" name="tanggal_lahir" />
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-4 col-form-label" for="nik">NIK</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nik" value="<?= $siswa['nik'] ?>" name="nik" />
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-4 col-form-label" for="nisn">NISN</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nisn" value="<?= $siswa['nisn'] ?>" name="nisn" />
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-4 col-form-label" for="no_kk">No KK</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="no_kk" value="<?= $siswa['no_kk'] ?>" name="no_kk" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>

<!-- DataRegister -->
<div class="modal fade" id="register" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <?= form_open('peserta/edit_register/' . $siswa['nisn']) ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Data Lainnya</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <label class="col-sm-4 col-form-label" for="tempattinggal">NIPD</label>
                    <div class="col-sm-8">
                        <input type="text" name="nis" class="form-control" value="<?= $siswa['nis'] ?>">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-4 col-form-label" for="tempattinggal">Tinggi badan</label>
                    <div class="col-sm-8">
                        <input type="text" name="tinggi" class="form-control" value="<?= $siswa['tinggi'] ?>">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-4 col-form-label" for="tempattinggal">Berat Badan</label>
                    <div class="col-sm-8">
                        <input type="text" name="berat" id="" class="form-control" value="<?= $siswa['berat'] ?>">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-4 col-form-label" for="tempattinggal">Lingkar Kepala</label>
                    <div class="col-sm-8">
                        <input type="text" name="lingkar" id="" class="form-control" value="<?= $siswa['lingkar'] ?>">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-4 col-form-label" for="tempattinggal">Anak Ke</label>
                    <div class="col-sm-8">
                        <input type="text" name="anak_ke" id="" class="form-control" value="<?= $siswa['anak_ke'] ?>">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-4 col-form-label" for="tempattinggal">Jumlah Saudara</label>
                    <div class="col-sm-8">
                        <input type="text" name="jml_saudara" id="" class="form-control" value="<?= $siswa['jml_saudara'] ?>">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-4 col-form-label" for="tempattinggal">Hobi</label>
                    <div class="col-sm-8">
                        <input type="text" name="hobi" id="" class="form-control" value="<?= $siswa['hobi'] ?>">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-4 col-form-label" for="tempattinggal">Cita-cita</label>
                    <div class="col-sm-8">
                        <input type="text" name="cita_cita" id="" class="form-control" value="<?= $siswa['cita_cita'] ?>">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-4 col-form-label" for="transportasi">Seri Ijazah</label>
                    <div class="col-sm-8">
                        <input type="text" name="seri_ijazah" class="form-control" id="" value="<?= $siswa['seri_ijazah'] ?>">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-4 col-form-label" for="transportasi">Telp Anak</label>
                    <div class="col-sm-8">
                        <input type="text" name="telp_anak" class="form-control" id="" value="<?= $siswa['telp_anak'] ?>">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>

<!-- Tinggal -->
<div class="modal fade" id="tinggal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Orang Tua</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="transportasi">Tinggal</label>
                        <div class="col-sm-8">
                            <select name="tinggal" id="didik" class="form-control">
                                <?php foreach ($tinggal as $key => $row) { ?>
                                    <?php if ($siswa['tinggal'] == $row['tinggal']) {
                                        $select = "selected";
                                    } else {
                                        $select = "";
                                    }
                                    echo "<option value=" . $row['tinggal'] . " $select>" . $row['tinggal'] . "</option>";
                                    ?>
                                <?php } ?>

                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="transportasi">Pekerjaan</label>
                        <div class="col-sm-8">
                            <select name="kerja_ibu" id="didik" class="form-control">
                                <?php foreach ($kerja as $key => $row) { ?>
                                    <?php if ($siswa['kerja_ibu'] == $row['pekerjaan']) {
                                        $select = "selected";
                                    } else {
                                        $select = "";
                                    }
                                    echo "<option value=" . $row['pekerjaan'] . " $select>" . $row['pekerjaan'] . "</option>";
                                    ?>
                                <?php } ?>

                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="transportasi">Penghasilan</label>
                        <div class="col-sm-8">
                            <select name="hasil_ibu" class="form-control">
                                <?php foreach ($hasil as $key => $row) { ?>
                                    <?php if ($siswa['hasil_ibu'] == $row['penghasilan']) {
                                        $select = "selected";
                                    } else {
                                        $select = "";
                                    }
                                    echo "<option value=" . $row['penghasilan'] . " $select>" . $row['penghasilan'] . "</option>";
                                    ?>
                                <?php } ?>

                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="basic-default-company">Telpon</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="basic-default-company" value="<?= $siswa['telp_ibu'] ?>" name="telp_ibu" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
</div>





<!-- ModalOrangTua -->
<div class="modal fade" id="ortu" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <?= form_open('peserta/edit_ortu/' . $siswa['nisn']) ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Orang Tua</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="row mb-4">
                            <label class="col-sm-4 col-form-label" for="basic-default-company">Nama Ayah</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="basic-default-company" value="<?= $siswa['nama_ayah'] ?>" name="nama_ayah" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-4 col-form-label" for="basic-default-company">Tahun Lahir</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="basic-default-company" value="<?= $siswa['tahun_ayah'] ?>" name="tahun_ayah" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-4 col-form-label" for="basic-default-company">NIK Ayah</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="basic-default-company" value="<?= $siswa['nik_ayah'] ?>" name="nik_ayah" />
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-sm-4 col-form-label" for="transportasi">Pendidikan</label>
                            <div class="col-sm-8">
                                <select name="didik_ayah" id="didik" class="form-control">
                                    <option value="<?= $siswa['didik_ayah'] ?>"><?= $siswa['didik_ayah'] ?></option>
                                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                                    <option value="Tamat SD/Sesderajat">Tamat SD/Sesderajat</option>
                                    <option value="SMP">SMP/Sederajat</option>
                                    <option value="SMA">SMA/Sederajat</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4/S1">D4/S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>

                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-4 col-form-label" for="transportasi">Pekerjaan</label>
                            <div class="col-sm-8">
                                <select name="kerja_ayah" id="didik" class="form-control">
                                    <option value="<?= $siswa['kerja_ayah'] ?>"><?= $siswa['kerja_ayah'] ?></option>
                                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Petani">Petani</option>
                                    <option value="Peternak">Peternak</option>
                                    <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                    <option value="Pedagang Kecil">Pedagang Kecil</option>
                                    <option value="Pedagang Besar">Pedagang Besar</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Wirausaha">Wirausaha</option>
                                    <option value="Sudah Meninggal">Sudah Meninggal</option>

                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-4 col-form-label" for="">Penghasilan</label>
                            <div class="col-sm-8">
                                <select name="hasil_ayah" class="form-control">
                                    <option value="<?= $siswa['hasil_ayah'] ?>"><?= $siswa['hasil_ayah'] ?></option>
                                    <option value="Rp. 500.000-Rp. 1.000.000">Rp. 500.000-Rp. 1.000.000</option>
                                    <option value="Rp. 1.000.000-Rp.1.999.999">Rp. 1.000.000-Rp.1.999.999</option>
                                    <option value="Rp. 2.000.000-Rp. 4.999.999">Rp. 2.000.000-Rp. 4.999.999</option>
                                    <option value="Rp. 5.000.000-Rp. 20.000.000">Rp. 5.000.000-Rp. 20.000.000</option>
                                    <option value="> Rp. 20.000.000">> Rp. 20.000.000</option>
                                    <option value="Tidak Berpenghasilan">Tidak Berpenghasilan</option>

                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-4 col-form-label" for="basic-default-company">Telpon Ayah</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="basic-default-company" value="<?= $siswa['telp_ayah'] ?>" name="telp_ayah" />
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row mb-4">
                            <label class="col-sm-4 col-form-label" for="basic-default-company">Nama Ibu</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="basic-default-company" value="<?= $siswa['nama_ibu'] ?>" name="nama_ibu" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-4 col-form-label" for="basic-default-company">Tahun Lahir</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="basic-default-company" value="<?= $siswa['tahun_ibu'] ?>" name="tahun_ibu" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-4 col-form-label" for="basic-default-company">NIK</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="basic-default-company" value="<?= $siswa['nik_ibu'] ?>" name="nik_ibu" />
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-sm-4 col-form-label" for="transportasi">Pendidikan</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="didik_ibu">
                                    <option value="<?= $siswa['didik_ibu'] ?>"><?= $siswa['didik_ibu'] ?></option>
                                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                                    <option value="Tamat SD/Sederajat">Tamat SD/Sesderajat</option>
                                    <option value="SMP">SMP/Sederajat</option>
                                    <option value="SMA">SMA/Sederajat</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4/S1">D4/S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>

                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-4 col-form-label" for="transportasi">Pekerjaan</label>
                            <div class="col-sm-8">
                                <select name="kerja_ibu" class="form-control">
                                    <option value="<?= $siswa['kerja_ibu'] ?>"><?= $siswa['kerja_ibu'] ?></option>
                                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Petani">Petani</option>
                                    <option value="Peternak">Peternak</option>
                                    <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                    <option value="Pedagang Kecil">Pedagang Kecil</option>
                                    <option value="Pedagang Besar">Pedagang Besar</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Wirausaha">Wirausaha</option>
                                    <option value="Sudah Meninggal">Sudah Meninggal</option>

                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-4 col-form-label" for="transportasi">Penghasilan</label>
                            <div class="col-sm-8">
                                <select name="hasil_ibu" class="form-control">

                                    <option value="<?= $siswa['hasil_ibu'] ?>"><?= $siswa['hasil_ibu'] ?></option>
                                    <option value="< Rp.500.000">
                                        < Rp.500.000 </option>
                                    <option value="Rp. 500.000-Rp. 1.000.000">Rp. 500.000-Rp. 1.000.000</option>
                                    <option value="Rp. 1.000.000-Rp.1.999.999">Rp. 1.000.000-Rp.1.999.999</option>
                                    <option value="Rp. 2.000.000-Rp. 4.999.999">Rp. 2.000.000-Rp. 4.999.999</option>
                                    <option value="Rp. 5.000.000-Rp. 20.000.000">Rp. 5.000.000-Rp. 20.000.000</option>
                                    <option value="> Rp. 20.000.000">> Rp. 20.000.000</option>
                                    <option value="Tidak Berpenghasilan">Tidak Berpenghasilan</option>



                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-4 col-form-label" for="basic-default-company">Telpon</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="basic-default-company" value="<?= $siswa['telp_ibu'] ?>" name="telp_ibu" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>


<!-- MODALPILIHKELAS -->
<div class="modal fade" id="pilihkelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('peserta/masukkelas/' . $siswa['nisn']) ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <select name="id_kelas" class="form-control">
                                <option value="">Pilih Kelas</option>
                                <?php foreach ($pilihkelas as $k) : ?>
                                    <option value="<?= $k['id_kelas'] ?>"><?= $k['kelas'] ?> | <?= $k['nama_guru'] ?> </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-floppy-disk"></i> Submit</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
















<script src="<?= base_url() ?>/template/assets/vendor/libs/jquery/jquery.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

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
    const map = L.map('map').setView([-6.282785267302884, 106.5934756654008], 14);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {

        attribution: '&copy; SMPINKA'
    }).addTo(map);

    L.marker([<?= $siswa['lokasi'] ?>])
        .bindPopup("<b><?= $siswa['nama_siswa'] ?></b>").addTo(map)
        .openPopup();
</script>










<?= $this->endSection() ?>