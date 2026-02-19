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


    #drop-area {
        border: 2px dashed #999;
        padding: 40px;
        width: 300px;
        text-align: center;
        border-radius: 10px;
        cursor: pointer;
        justify-content: center;
    }

    #drop-area.highlight {
        border-color: #0d6efd;
        background: #f1f8ff;
    }

    #map {
        width: 100%;
        height: 420px;
        border-radius: 10px;
        position: relative;
        z-index: 1;
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

                                <?= form_open('admin/peserta/verifikasi/' . encrypt_id($siswa['id_siswa'])) ?>
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
                            <li>Rombel :
                                <?php if (!empty($datasiswa['kelas'])): ?>
                                    <b><?= $datasiswa['kelas']; ?></b>
                                <?php else: ?>
                                    <b>Belum dimasukkan ke rombel</b>
                                <?php endif; ?>
                            </li>
                            <li>Tingkat Pendidikan: <?= $siswa['nama_tingkat'] ?></li>
                            <li>Semester Aktif : <?= $ta['ta'] ?>/<b><?= $ta['semester'] ?></b></li>
                            <li> Link Wa :
                                <?php if (!empty($datasiswa['link_wa'])): ?>
                                    <a href="<?= $datasiswa['link_wa']; ?>" target="_blank">
                                        <i class='bx  bx-mobile'></i>
                                    </a>

                                <?php else: ?>
                                    <b>Link WhatsApp belum tersedia</b>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="nav-align-top mb-6">
                <ul class="nav nav-pills mb-4" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-alamat" aria-controls="navs-pills-top-dokumen" aria-selected="false">Alamat</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link " role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home" aria-selected="true">Data Atribut</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-ortu" aria-controls="navs-pills-top-ortu" aria-selected="false">Orang Tua</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-register" aria-controls="navs-pills-top-ortu" aria-selected="false">Data Lainnya</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-rekamdidik" aria-controls="navs-pills-top-ortu" aria-selected="false">Rekam Didik</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-dokumen" aria-controls="navs-pills-top-dokumen" aria-selected="false">Dokumen</button>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade " id="navs-pills-top-home" role="tabpanel">

                        <form action="<?= base_url('admin/peserta/identitas' . ($hash)) ?>" method="post">


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="tempattinggal">Nama Siswa</label>
                                        <input type="text" name="nama_siswa" class="form-control" value="<?= $siswa['nama_siswa'] ?>" <?= form_readonly($bolehEdit) ?>>
                                    </div>

                                    <div class=" mb-4">
                                        <label class="" for="tempattinggal">Jenis Kelamin</label>
                                        <input type="text" name="jenis_kelamin" class="form-control" value="<?= $siswa['jenis_kelamin'] ?>" <?= form_readonly($bolehEdit) ?>>
                                    </div>
                                    <div class=" mb-4">
                                        <label class="" for="tempattinggal">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" class="form-control" value="<?= $siswa['tempat_lahir'] ?>" <?= form_readonly($bolehEdit) ?>>
                                    </div>
                                    <div class=" mb-4">
                                        <label class="" for="tempattinggal">Tanggal Lahir</label>
                                        <input type="text" class="form-control" value="<?= $siswa['tanggal_lahir'] ?>" <?= form_readonly($bolehEdit) ?>>

                                    </div>
                                    <div class=" mb-4">
                                        <label class="" for="tempattinggal">NISN</label>
                                        <input type="text" class="form-control" name="nisn" value="<?= $siswa['nisn'] ?>">

                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="tempattinggal">NIK</label>
                                        <input type="text" name="nik" class="form-control" value="<?= $siswa['nik'] ?>" <?= form_readonly($bolehEdit) ?>>
                                    </div>

                                    <div class=" mb-4">
                                        <label class="" for="tempattinggal">No Kartu Keluarga</label>
                                        <input type="text" name="no_kk" class="form-control" value="<?= $siswa['no_kk'] ?>" <?= form_readonly($bolehEdit) ?>>
                                    </div>
                                    <div class=" mb-4">
                                        <label class="" for="tempattinggal">Registrasi Akte</label>
                                        <input type="text" name="registrasi_akte" class="form-control" value="<?= $siswa['registrasi_akte'] ?>" <?= form_readonly($bolehEdit) ?>>
                                    </div>
                                    <div class=" mb-4">
                                        <label class="" for="tempattinggal">Agama</label>
                                        <input type="text" class="form-control" value="<?= $siswa['agama'] ?>" <?= form_readonly($bolehEdit) ?>>

                                    </div>
                                    <div class=" mb-4">
                                        <label class="" for="tempattinggal">Berkebutuhan Khusus</label>
                                        <input type="text" class="form-control" name="kbthn_khusus" value="<?= $siswa['kbthn_khusus'] ?>" <?= form_readonly($bolehEdit) ?>>

                                    </div>

                                </div>

                            </div>

                            <!-- BUTTON -->
                            <div class="text-end mt-4">
                                <button class="btn btn-primary" type="submit">
                                    <i class="bx bx-save"></i> Simpan Data Atribut
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="navs-pills-top-ortu" role="tabpanel">
                        <form action="<?= base_url('admin/peserta/identitas' . ($hash)) ?>" method="post">


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="tempattinggal">Ayah</label>
                                        <input type="text" name="nama_ayah" class="form-control" value="<?= $siswa['nama_ayah'] ?>" <?= form_readonly($bolehEdit) ?>>
                                    </div>

                                    <div class=" mb-4">
                                        <label class="" for="tempattinggal">Tahun Lahir Ayah</label>
                                        <input type="text" name="tahun_ayah" class="form-control" value="<?= $siswa['tahun_ayah'] ?>" <?= form_readonly($bolehEdit) ?>>
                                    </div>
                                    <div class=" mb-4">
                                        <label class="" for="tempattinggal">NIK Ayah</label>
                                        <input type="text" name="nik_ayah" class="form-control" value="<?= $siswa['nik_ayah'] ?>" <?= form_readonly($bolehEdit) ?>>
                                    </div>
                                    <div class=" mb-4">
                                        <label class="" for="tempattinggal">Pendidikan Ayah</label>
                                        <input type="text" class="form-control" name="didik_ayah" value="<?= $siswa['didik_ayah'] ?>" <?= form_readonly($bolehEdit) ?>>

                                    </div>
                                    <div class=" mb-4">
                                        <label class="" for="tempattinggal">Pekerjaan Ayah</label>
                                        <input type="text" class="form-control" name="kerja_ayah" value="<?= $siswa['kerja_ayah'] ?>" <?= form_readonly($bolehEdit) ?>>

                                    </div>
                                    <div class=" mb-4">
                                        <label class="" for="tempattinggal">Penghasilan</label>
                                        <input type="text" class="form-control" name="hasil_ayah" value="<?= $siswa['hasil_ayah'] ?>" <?= form_readonly($bolehEdit) ?>>
                                    </div>
                                    <div class=" mb-4">
                                        <label class="" for="tempattinggal">Telp</label>
                                        <input type="text" class="form-control" name="telp_ayah" value="<?= $siswa['telp_ayah'] ?>" <?= form_readonly($bolehEdit) ?>>
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="mb-4">
                                        <label for="tempattinggal">Ibu</label>
                                        <input type="text" name="nama_ibu" class="form-control" value="<?= $siswa['nama_ibu'] ?>" <?= form_readonly($bolehEdit) ?>>
                                    </div>

                                    <div class=" mb-4">
                                        <label class="" for="tempattinggal">Tahun Lahir ibu</label>
                                        <input type="text" name="tahun_ibu" class="form-control" value="<?= $siswa['tahun_ibu'] ?>" <?= form_readonly($bolehEdit) ?>>
                                    </div>
                                    <div class=" mb-4">
                                        <label class="" for="tempattinggal">NIK ibu</label>
                                        <input type="text" name="nik_ibu" class="form-control" value="<?= $siswa['nik_ibu'] ?>" <?= form_readonly($bolehEdit) ?>>
                                    </div>
                                    <div class=" mb-4">
                                        <label class="" for="tempattinggal">Pendidikan ibu</label>
                                        <input type="text" class="form-control" name="didik_ibu" value="<?= $siswa['didik_ibu'] ?>" <?= form_readonly($bolehEdit) ?>>

                                    </div>
                                    <div class=" mb-4">
                                        <label class="" for="tempattinggal">Pekerjaan ibu</label>
                                        <input type="text" class="form-control" name="kerja_ibu" value="<?= $siswa['kerja_ibu'] ?>" <?= form_readonly($bolehEdit) ?>>

                                    </div>
                                    <div class=" mb-4">
                                        <label class="" for="tempattinggal">Penghasilan</label>
                                        <input type="text" class="form-control" name="hasil_ibu" value="<?= $siswa['hasil_ibu'] ?>" <?= form_readonly($bolehEdit) ?>>
                                    </div>
                                    <div class=" mb-4">
                                        <label class="" for="tempattinggal">Telp</label>
                                        <input type="text" class="form-control" name="telp_ibu" value="<?= $siswa['telp_ibu'] ?>" <?= form_readonly($bolehEdit) ?>>
                                    </div>

                                </div>

                            </div>

                            <!-- BUTTON -->
                            <div class="text-end mt-4">
                                <button class="btn btn-primary" type="submit">
                                    <i class="bx bx-save"></i> Simpan Data Orang Tua
                                </button>
                            </div>
                        </form>
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
                    <div class="tab-pane fade" id="navs-pills-top-rekamdidik" role="tabpanel">
                        <div class="row">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>

                                        <th>Kelas</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($rekamdidik as $data) { ?>
                                        <tr>
                                            <td><?= $data['kelas'] ?></td>
                                            <td><?= $data['ta'] ?></td>
                                            <td><?= $data['semester'] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="navs-pills-top-dokumen" role="tabpanel">
                        <?php if (empty($siswa['dokumen'])) : ?>

                            <!-- DROP AREA -->
                            <div id="drop-area" style="border:2px dashed #999; padding:30px; text-align:center;">
                                <p>Drag & Drop PDF di sini</p>
                                <input type="file" id="fileElem" accept="application/pdf" hidden>
                                <button onclick="document.getElementById('fileElem').click()">Pilih File</button>
                            </div>


                        <?php else : ?>

                            <!-- TAMPILKAN PDF -->
                            <embed src="<?= base_url('dokumen/' . $siswa['dokumen']) ?>" type="application/pdf" width="100%" height="600px">
                            <hr>
                            <div id="drop-area" style="border:2px dashed orange; padding:20px; width:400px; text-align:center;">
                                <b>Ganti Dokumen (Drag & Drop PDF di sini)</b>
                                <input type="file" id="fileElem" accept="application/pdf" hidden>
                            </div>
                            <div id="progress-container" style="display:none; margin-top:10px;">
                                <div style="width:100%; background:#eee; border-radius:6px; overflow:hidden;">
                                    <div id="progress-bar" style="width:0%; height:18px; background:#4caf50; text-align:center; color:white; font-size:12px;">
                                        0%
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>

                    <div class="tab-pane fade show active" id="navs-pills-top-alamat" role="tabpanel">
                        <form action="<?= base_url('admin/peserta/' . encrypt_id($hash)) ?>" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="tempattinggal">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" value="<?= $siswa['alamat'] ?>" <?= form_readonly($bolehEdit) ?>>
                                    </div>

                                    <div class=" mb-4">
                                        <label class="" for="tempattinggal">RT/RW</label>
                                        <input type="text" name="rt" class="form-control" value="<?= $siswa['rt'] ?>" <?= form_readonly($bolehEdit) ?>>
                                    </div>
                                    <div class=" mb-4">
                                        <label class="" for="tempattinggal">RW</label>
                                        <input type="text" name="rw" class="form-control" value="<?= $siswa['rw'] ?>" <?= form_readonly($bolehEdit) ?>>

                                    </div>
                                    <div class=" mb-4">
                                        <label class="" for="tempattinggal">Provinsi</label>
                                        <select id="prov" class="form-control" name="provinsi" <?= form_disabled($bolehEdit) ?>>
                                            <option value="">-- Pilih Provinsi --</option>
                                        </select>
                                        <?= form_hidden_if_disabled('provinsi', $siswa['provinsi'], $bolehEdit) ?>
                                    </div>
                                    <div class=" mb-4">
                                        <label class="" for="tempattinggal">Kabupaten</label>
                                        <select id="kab" class="form-control" name="kabupaten">
                                            <option value="">-- Pilih Kabupaten --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">


                                    <div class=" mb-4">
                                        <label class="" for="tempattinggal">Kecamatan</label>
                                        <select id="kec" class="form-control" name="kecamatan">
                                            <option value="">-- Pilih Kecamatan --</option>
                                        </select>
                                    </div>
                                    <div class=" mb-4">
                                        <label class="" for="tempattinggal">Desa</label>
                                        <select id="kel" class="form-control" name="desa">
                                            <option value="">-- Pilih Desa/Kelurahan --</option>
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label class="" for="tempattinggal">Kode Pos</label>
                                        <input type="text" class="form-control" name="kodepos" value="<?= $siswa['kodepos'] ?>" <?= form_disabled($bolehEdit) ?>>
                                    </div>

                                    <div class="mb-4">
                                        <label for="">Tempat Tinggal</label>
                                        <select id="" class="form-select">
                                            <option value="">Bersama Orang Tua/Wali</option>
                                            <option value="">Kos</option>
                                            <option value="">Asrama/Pondok</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="">Moda Transportasi</label>
                                        <select id="mode" class="form-select">
                                            <option value="Jalan Kaki">Jalan Kaki</option>
                                            <option value="Sepeda">Sepeda</option>
                                            <option value="Motor">Motor</option>
                                            <option value="Mobil">Mobil Pribadi</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- MAP -->
                            <div id="map" class="mb-4"></div>

                            <!-- INFO LOKASI -->

                            <div class="row g-4">
                                <div class="col-md-4">
                                    <label class="form-label">Latitude</label>
                                    <input type="text" id="lat" name="latitude" class="form-control" readonly>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Longitude</label>
                                    <input type="text" id="lng" name="longitude" class="form-control" readonly>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Jarak ke Sekolah (KM)</label>
                                    <input type="text" id="jarak" name="jarak" class="form-control" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Waktu ke Sekolah (KM)</label>
                                    <input type="text" id="waktu" name="waktu" class="form-control" readonly>
                                </div>

                            </div>

                            <!-- BUTTON -->
                            <div class="text-end mt-4">
                                <button class="btn btn-primary" type="submit">
                                    <i class="bx bx-save"></i> Simpan Alamat
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





















<script src="<?= base_url() ?>/template/assets/vendor/libs/jquery/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>



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



<!-- MAPP -->

<script>
    /* =========================================================
     * KONFIGURASI
     * =======================================================*/
    const sekolahLatLng = [-6.281883791403306, 106.59463505339842];
    const bolehEdit = <?= js_bool($bolehEdit) ?>;
    const kecepatanModa = {
        "Jalan Kaki": 4,
        "Sepeda": 12,
        "Motor": 30,
        "Mobil": 25
    };

    const siswaLatLng = [
        <?= $siswa['latitude'] ?? '-6.281883791403306' ?>,
        <?= $siswa['longitude'] ?? '106.59463505339842' ?>
    ];

    /* =========================================================
     * INIT MAP
     * =======================================================*/
    const map = L.map('map').setView(siswaLatLng, 14);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; SMPINKA'
    }).addTo(map);

    /* =========================================================
     * MARKER
     * =======================================================*/
    L.marker(sekolahLatLng).addTo(map).bindPopup('<b>Sekolah</b>');

    const markerSiswa = L.marker(siswaLatLng, {
        draggable: bolehEdit
    }).addTo(map);

    const line = L.polyline([sekolahLatLng, siswaLatLng], {
        color: 'blue'
    }).addTo(map);

    /* =========================================================
     * HITUNG JARAK & WAKTU (DINAMIS)
     * =======================================================*/
    function hitungJarakDanWaktu(latlng) {
        const jarakMeter = map.distance(sekolahLatLng, latlng);
        const jarakKm = jarakMeter / 1000;

        // ambil kecepatan dari select
        const kecepatan = kecepatanModa[mode] ?? 4;

        const waktuJam = jarakKm / kecepatan;
        const jam = Math.floor(waktuJam);
        const menit = Math.round((waktuJam - jam) * 60);

        document.getElementById('lat').value = latlng.lat.toFixed(6);
        document.getElementById('lng').value = latlng.lng.toFixed(6);
        document.getElementById('jarak').value = jarakKm.toFixed(2);
        document.getElementById('waktu').value =
            jam > 0 ? `${jam} jam ${menit} menit` : `${menit} menit`;
    }

    // nilai awal
    hitungJarakDanWaktu(markerSiswa.getLatLng());

    /* =========================================================
     * EVENT
     * =======================================================*/
    // geser marker
    if (bolehEdit) {
        markerSiswa.on('dragend', function(e) {
            const pos = e.target.getLatLng();
            line.setLatLngs([sekolahLatLng, pos]);
            hitungJarakDanWaktu(pos);
        });
    }

    // ganti moda transportasi
    document.getElementById('mode').addEventListener('change', function() {
        hitungJarakDanWaktu(markerSiswa.getLatLng());
    });
</script>





<!-- =====MAPS -->




<!-- =======DROP $ DRAG -->

<script>
    let dropArea = document.getElementById('drop-area');
    let fileElem = document.getElementById('fileElem');

    ['dragenter', 'dragover'].forEach(eventName => {
        dropArea.addEventListener(eventName, e => {
            e.preventDefault();
            dropArea.style.background = '#eef';
        }, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, e => {
            e.preventDefault();
            dropArea.style.background = '';
        }, false);
    });

    dropArea.addEventListener('drop', e => {
        let file = e.dataTransfer.files[0];
        uploadFile(file);
    });

    fileElem.addEventListener('change', e => {
        let file = e.target.files[0];
        uploadFile(file);
    });

    function uploadFile(file) {

        // ❌ Bukan PDF
        if (file.type !== "application/pdf") {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'File harus berformat PDF'
            });
            return;
        }

        // ❌ Lebih dari 2MB
        if (file.size > 2 * 1024 * 1024) {
            Swal.fire({
                icon: 'warning',
                title: 'Ukuran Terlalu Besar',
                text: 'Maksimal ukuran file adalah 2MB'
            });
            return;
        }

        let formData = new FormData();
        formData.append("file", file);

        Swal.fire({
            title: 'Mengupload...',
            text: 'Mohon tunggu sebentar',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        fetch("<?= base_url('admin/peserta/uploadDokumen/' . $hash) ?>", {
                method: "POST",
                body: formData
            })
            .then(res => res.json())
            .then(res => {
                Swal.close();

                if (res.status) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: res.msg
                    }).then(() => location.reload());
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: res.msg
                    });
                }
            })
            .catch(() => {
                Swal.close();
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Terjadi kesalahan saat upload'
                });
            });
    }
</script>








<!-- dropdownlistProvinsi -->

<script>
    $(document).ready(function() {

        // =========================
        // DATA EDIT (KOSONGKAN JIKA TAMBAH)
        // =========================
        const siswa = {
            prov: "<?= $siswa['id_provinsi'] ?>",
            kab: "<?= $siswa['id_kabupaten'] ?>",
            kec: "<?= $siswa['id_kecamatan'] ?>",
            des: "<?= $siswa['id_desa'] ?>"
        };

        // =========================
        // HELPER
        // =========================
        function setLoading(el, text = 'Loading...') {
            $(el)
                .prop('disabled', true)
                .html(`<option value="">${text}</option>`);
        }

        function setDefault(el, text) {
            $(el)
                .prop('disabled', false)
                .html(`<option value="">${text}</option>`);
        }

        // =========================
        // LOAD SELECT (DENGAN CALLBACK)
        // =========================
        function loadSelect(url, el, valueKey, textKey, selected = '', done = null) {
            setLoading(el);

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(res) {
                    let opt = `<option value="">-- Pilih --</option>`;

                    if (res && res.length) {
                        res.forEach(item => {
                            const sel = selected == item[valueKey] ? 'selected' : '';
                            opt += `<option value="${item[valueKey]}" ${sel}>${item[textKey]}</option>`;
                        });
                    }

                    $(el)
                        .prop('disabled', false)
                        .html(opt);

                    if (typeof done === 'function') done();
                },
                error: function() {
                    setDefault(el, 'Gagal load data');
                }
            });
        }

        // =========================
        // LOAD AWAL (EDIT DATA)
        // =========================
        loadSelect(
            "<?= base_url('wilayah/provinsi') ?>",
            '#prov',
            'id_provinsi',
            'prov_name',
            siswa.prov,
            function() {

                if (!siswa.prov) return;

                loadSelect(
                    "<?= base_url('wilayah/kabupaten') ?>/" + siswa.prov,
                    '#kab',
                    'id_kabupaten',
                    'city_name',
                    siswa.kab,
                    function() {

                        if (!siswa.kab) return;

                        loadSelect(
                            "<?= base_url('wilayah/kecamatan') ?>/" + siswa.kab,
                            '#kec',
                            'id_kecamatan',
                            'nama_kecamatan',
                            siswa.kec,
                            function() {

                                if (!siswa.kec) return;

                                loadSelect(
                                    "<?= base_url('wilayah/desa') ?>/" + siswa.kec,
                                    '#kel',
                                    'id_desa',
                                    'desa',
                                    siswa.des
                                );

                            }
                        );

                    }
                );

            }
        );

        // =========================
        // EVENT USER GANTI MANUAL
        // =========================
        $('#prov').on('change', function() {
            const id = this.value;

            setDefault('#kab', '-- Pilih Kabupaten --');
            setDefault('#kec', '-- Pilih Kecamatan --');
            setDefault('#kel', '-- Pilih Desa --');

            if (id) {
                loadSelect(
                    "<?= base_url('wilayah/kabupaten') ?>/" + id,
                    '#kab',
                    'id_kabupaten',
                    'city_name'
                );
            }
        });

        $('#kab').on('change', function() {
            const id = this.value;

            setDefault('#kec', '-- Pilih Kecamatan --');
            setDefault('#kel', '-- Pilih Desa --');

            if (id) {
                loadSelect(
                    "<?= base_url('wilayah/kecamatan') ?>/" + id,
                    '#kec',
                    'id_kecamatan',
                    'nama_kecamatan'
                );
            }
        });

        $('#kec').on('change', function() {
            const id = this.value;

            setDefault('#kel', '-- Pilih Desa --');

            if (id) {
                loadSelect(
                    "<?= base_url('wilayah/desa') ?>/" + id,
                    '#kel',
                    'id_desa',
                    'desa'
                );
            }
        });

    });
</script>








<?= $this->endSection() ?>