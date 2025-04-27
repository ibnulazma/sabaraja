<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>



<div class="row">
    <div class="col-lg-4">
        <div class=" card">
            <div class="card-body box-profile">
                <div class="text-center">
                    <?php
                    $gender = "L";
                    if ($gender == $siswa['jenis_kelamin']) { ?>
                        <img class="profile-user-img img-fluid img-circle" src="<?= base_url('foto/muslim.png') ?>" alt="User profile picture">
                    <?php } else { ?>
                        <img class="profile-user-img img-fluid img-circle" src="<?= base_url('foto/woman.png') ?>" alt="User profile picture">
                    <?php  } ?>

                </div>
                <h3 class="profile-username text-center"><?= $siswa['nama_siswa'] ?></h3>
                <p class="text-muted text-center">(<?= $siswa['nisn'] ?> / <?= $siswa['nis'] ?>)
                </p>
                <ul class="list-group  mb-3">
                    <ul class="list-group mb-3">
                        <li class="list-group-item">
                            <b>Jenis Kelamin</b> <span class="float-right"><?= $siswa['jenis_kelamin'] ?></span>
                        </li>
                        <li class="list-group-item">
                            <b>Tempat Lahir</b> <span class="float-right"><?= $siswa['tempat_lahir'] ?></span>
                        </li>
                        <li class="list-group-item">
                            <b>Tanggal Lahir</b> <span class="float-right"> <?= date('d M Y', strtotime($siswa['tanggal_lahir']))  ?></span>
                        </li>
                        <li class="list-group-item">
                            <b> Ibu Kandung</b> <span class="float-right"><?= $siswa['nama_ibu'] ?> </span>
                        </li>
                    </ul>
                </ul>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <p class="card-title">
                    <i class="fas fa-pencil"></i> <b> Pembelajaran Tahun Pelajaran <?= $siswa['ta'] ?></b>
                </p>
            </div>
            <div class="card-body">
                <ul style="list-style:none;">
                    <li>
                        <p class="text-muted">
                            Rombongan Belajar : Kelas <?= $siswa['kelas'] ?>
                        </p>
                    </li>
                    <li>
                        <p class="text-muted">
                            Tingkat Pendidikan : Tingkat <?= $siswa['tingkat'] ?>
                        </p>
                    </li>

                </ul>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <p class="card-title">
                    <i class="fas fa-map-marker-alt"></i> <b> Tempat Tinggal</b>
                </p>
            </div>
            <div class="card-body">
                <p>
                    <?= $siswa['alamat'] ?> RT <?= $siswa['rt'] ?> RW <?= $siswa['rw'] ?>
                </p>
                <p> Desa/Kel. <?= $siswa['desa'] ?> Kecamatan <?= $siswa['nama_kecamatan'] ?></p>
                <p>Kab/Kota <?= $siswa['city_name'] ?> Provinsi <?= $siswa['prov_name'] ?></p>
                <p><a href="<?= $siswa['maps'] ?>" target="_blank">Alamat Rumah Sesuai Maps</a></p>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#biodata" data-toggle="tab">Biodata</a></li>
                    <li class="nav-item"><a class="nav-link" href="#absen" data-toggle="tab">Presensi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#nilai" data-toggle="tab">Nilai</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li> -->
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="biodata">
                        <div class="row">
                            <div class="col-md-6">
                                <h5><strong>IDENTITAS</strong></h5>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <span>NIK: <?= $siswa['nik'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        <span>Agama: Islam </span>
                                    </li>
                                    <li class="list-group-item">
                                        <span>Kebutuhan Khusus: Tidak Ada </span>
                                    </li>
                                    <li class="list-group-item">
                                        <span>Alat Transportasi: <?= $siswa['transportasi'] ?></span>
                                    </li>

                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5><strong>KONTAK</strong></h5>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <span> Jenis Tinggal: <?= $siswa['tinggal'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        <span> Telpn/Hp: <?= $siswa['telp_anak'] ?> </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h5><strong>DATA ORANG TUA</strong></h5>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <span> Nama Ayah: <?= $siswa['nama_ayah'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        Telpon Ayah: <?= $siswa['telp_ayah'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        Telpon Ibu: <?= $siswa['telp_ayah'] ?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5><strong>DATA LAINNYA</strong></h5>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <span> Tinggi Badan: <?= $siswa['tinggi'] ?> cm</span>
                                    </li>
                                    <li class="list-group-item">
                                        Tinggi Badan: <?= $siswa['berat'] ?> kg</span>
                                    </li>
                                    <li class="list-group-item">
                                        Lingkar Kepala: <?= $siswa['lingkar'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        Hobi: <?= $siswa['hobi'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        Cita-cita: <?= $siswa['cita_cita'] ?></span>
                                    </li>

                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="absen">
                        <div class="text-center text-danger">
                            Maaf fitur ini dalam tahap pengembangan !!
                        </div>
                    </div>

                    <div class="tab-pane" id="nilai">
                        <div class="text-center text-danger">
                            Maaf fitur ini dalam tahap pengembangan !!
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>