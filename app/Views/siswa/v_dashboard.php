<?= $this->extend('template/template-user') ?>
<?= $this->section('content') ?>







<?php
$db     = \Config\Database::connect();


$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();


?>

<style>
    #map {
        width: 100%;
        height: 400px;
        min-height: 350px;
        background: #eee;
        /* buat test */
    }
</style>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-3 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">

                            <h5 class="card-title text-primary">Selamat Datang <?= $siswa['nama_siswa'] ?>! 🎉</h5>

                            <?php if ($siswa['status_daftar'] == '1') { ?>
                                <p class="mb-4 text-danger">
                                    Anda terdeteksi belum update data. Silahkan lengkapi biodata!!!
                                </p>
                            <?php } else if ($siswa['status_daftar'] == '2') { ?>
                                <p class="mb-4 text-warning">
                                    Data anda sedang diverifikasi oleh Admin. Hubungi admin untuk verifikasi data anda!!
                                </p>
                            <?php } else if ($siswa['status_daftar'] == '3') { ?>
                                <p class="mb-4">
                                    Semester Aktif: <span class="fw-bold"><?= $ta['semester'] ?></span> Tahun Ajaran <?= $ta['ta'] ?>
                                </p>
                                <?php if (!empty($datakelas['kelas'])): ?>
                                    <a href="<?= $datakelas['link_wa'] ?>" class="btn btn-sm btn-outline-success"> <i class='bx bxl-whatsapp'></i> Gabung Grup Kelas <?= $datakelas['kelas'] ?> </a>
                                <?php else: ?>
                                    <b>Belum dimasukkan ke rombel</b>
                                <?php endif; ?>


                            <?php } ?>

                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">

                            <?php if ($siswa['jenis_kelamin'] == 'L') { ?>
                                <img
                                    src="<?= base_url() ?>/template/assets/img/illustrations/man.png"
                                    height="140"
                                    alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                            <?php  } else { ?>
                                <img
                                    src="<?= base_url() ?>/template/assets/img/illustrations/girls.png"
                                    height="150"
                                    alt="View Badge User"
                                    data-app-dark-img="illustrations/girls.png"
                                    data-app-light-img="illustrations/girls.png" />
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>



    <?php if ($siswa['status_daftar'] == '1') { ?>
        <div class="container-xxl flex-grow-1 container-p-y mt-3">
            <div class="progress mb-3">
                <div id="progressBar" class="progress-bar" style="width:0%">
                    Step 1 dari 4
                </div>
            </div>


        </div>

        <div class="card">
            <form id="formSiswa">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                <input type="hidden" id="id_siswa" value="<?= $siswa['id_siswa'] ?>" name="id_siswa">
                <!-- STEP 1 : ALAMAT -->
                <div class="card step" id="step-1">
                    <div class="card-header text-primary">Data Alamat</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" class="form-control wajib-step1">
                                </div>
                                <div class="col mb-3">
                                    <label>RT</label>
                                    <input type="text" name="rt" id="rt"
                                        class="form-control wajib-step1 rt-rw-field"
                                        inputmode="numeric"
                                        maxlength="2">
                                    <small class="text-danger d-none" id="err_rt">RT harus 2 digit angka</small>
                                </div>
                                <div class="col mb-3">
                                    <label>RW</label>
                                    <input type="text" name="rw" id="rw"
                                        class="form-control wajib-step1 rt-rw-field"
                                        inputmode="numeric"
                                        maxlength="2">
                                    <small class="text-danger d-none" id="err_rw">RW harus 2 digit angka</small>
                                </div>
                                <div class="col mb-3">
                                    <label class="" for="tempattinggal">Provinsi</label>
                                    <select id="prov" class="form-select  wajib-step1" name="provinsi">
                                        <option value="">-- Pilih Provinsi --</option>
                                    </select>
                                </div>
                                <div class="col mb-1">
                                    <label class="" for="tempattinggal">Kabupaten</label>

                                    <select id="kab" class="form-select wajib-step1" name="kabupaten">
                                        <option value="">-- Pilih Kabupaten --</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col mb-3">
                                    <label class="" for="tempattinggal">Kecamatan</label>
                                    <select id="kec" class="form-select wajib-step1" name="kecamatan">
                                        <option value="">-- Pilih Kecamatan --</option>
                                    </select>

                                </div>
                                <div class="col mb-3">
                                    <label class=" " for="tempattinggal">Desa</label>
                                    <select id="kel" class="form-control wajib-step1" name="nama_desa">
                                        <option value="">-- Pilih Desa/Kelurahan --</option>
                                    </select>
                                </div>
                                <div class="col mb-3">
                                    <label class="" for="tempattinggal">Kode Pos</label>
                                    <input type="text" name="kodepos" class="form-control wajib-step1" value="<?= $siswa['kodepos'] ?>">
                                </div>
                                <div class="col mb-3">
                                    <label class="" for="tempattinggal">Tempat Tinggal</label>
                                    <select name="tinggal" id="" class="form-control wajib-step1">
                                        <option value="">Pilih Tempat Tinggal</option>
                                        <option value="Bersama Orang Tua">Bersama Orang Tua</option>
                                        <option value="Kos">Kos</option>
                                        <option value="Asrama/Pondok">Asrama/Pondok</option>
                                        <option value="Bersama Wali">Bersama Wali</option>
                                    </select>
                                </div>
                                <div class="col mb-3">
                                    <label class="" for="tempattinggal">Alat Transportasi</label>
                                    <select name="transportasi" id="mode" class="form-control wajib-step1">
                                        <option value="jalan">Jalan Kaki</option>
                                        <option value="sepeda">Sepeda</option>
                                        <option value="motor">Motor</option>
                                        <option value="mobil">Mobil</option>
                                    </select>
                                </div>



                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Tentukan Lokasi Rumah</label>

                            <div id="map-wrapper" class="border rounded">
                                <div id="map"></div>
                            </div>

                            <small class="text-muted">
                                📍 Lokasi di desktop mungkin kurang akurat. Silakan geser marker jika perlu.
                            </small>
                        </div>
                        <div class="mb-3">
                            <label>Latitude</label>
                            <input type="text" id="lat" class="form-control wajib-step1" name="latitude" readonly>
                        </div>
                        <div class="mb-3">
                            <label>Longitude</label>
                            <input type="text" id="lng" class="form-control wajib-step1" name="longitude" readonly>
                        </div>
                        <div class="mb-3">
                            <label>Jarak ke Sekolah</label>
                            <input type="text" id="jarak" class="form-control wajib-step1" name="jarak" readonly>
                        </div>
                        <div class="mb-3">
                            <label>Waktu</label>
                            <input type="text" id="waktu" class="form-control wajib-step1" name="waktu" readonly>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="button" class="btn btn-primary next-btn" data-next="2" disabled>Lanjut</button>
                    </div>
                </div>

                <!-- STEP 2 : ORANG TUA (AYAH) -->
                <div class="card step d-none" id="step-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="text-primary mb-3">Data Ayah</h6>
                                <div class="mb-3">
                                    <label>Nama Ayah</label>
                                    <input type="text" name="nama_ayah" class="form-control wajib-step2">
                                </div>
                                <div class="mb-3">
                                    <label>NIK Ayah</label>
                                    <input type="text" id="nik_ayah" name="nik_ayah"
                                        class="form-control wajib-step2 nik-field"
                                        maxlength="16" inputmode="numeric">
                                    <small class="text-danger d-none" id="err_nik_ayah">NIK harus 16 digit</small>
                                </div>
                                <div class="mb-3">
                                    <label>Tahun Lahir</label>
                                    <input type="text" name="tahun_ayah" id="tahun_masuk" class="form-control wajib-step2 tahun-field" maxlength="4" inputmode="numeric">
                                    <small class="text-danger d-none" id="err_tahun_masuk">NIK harus 4 digit</small>
                                </div>

                                <div class="mb-3">
                                    <label for="">Pendidikan Terakhir</label>
                                    <select class="form-select wajib-step2" name="didik_ayah">
                                        <option value="">-- Pilih Pendidikan --</option>

                                        <?php
                                        $pendidikan = [
                                            "Tidak Sekolah",
                                            "Tamat SD/Sederajat",
                                            "SMP/Sederajat",
                                            "SMA/Sederajat",
                                            "D1",
                                            "D2",
                                            "D3",
                                            "D4/S1",
                                            "S2",
                                            "S3"
                                        ];

                                        foreach ($pendidikan as $p) :
                                        ?>
                                            <option value="<?= $p ?>" <?= ($siswa['didik_ayah'] == $p) ? 'selected' : '' ?>>
                                                <?= $p ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>


                                </div>
                                <div class="mb-3">
                                    <label>Pekerjaan Ayah</label>
                                    <select class="form-select wajib-step2" name="kerja_ayah" id="kerja_ayah">
                                        <option value="">-- Pilih Pekerjaan --</option>

                                        <?php
                                        $pekerjaan = [
                                            "Tidak Bekerja",
                                            "Buruh",
                                            "Nelayan",
                                            "Petani",
                                            "Peternak",
                                            "PNS/TNI/POLRI",
                                            "Karyawan Swasta",
                                            "Pedagang Kecil",
                                            "Pedagang Besar",
                                            "Wiraswasta",
                                            "Wirausaha",
                                            "Sudah Meninggal"
                                        ];

                                        foreach ($pekerjaan as $k) :
                                        ?>
                                            <option value="<?= $k ?>" <?= ($siswa['kerja_ayah'] == $k) ? 'selected' : '' ?>>
                                                <?= $k ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label>Penghasilan Ayah</label>
                                    <select class="form-select wajib-step2" name="hasil_ayah" id="hasil_ayah">
                                        <option value="">-- Pilih Penghasilan --</option>

                                        <?php
                                        $penghasilan = [
                                            "Rp. 500.000",
                                            "Rp. 500.000 - Rp. 1.000.000",
                                            "Rp. 1.000.000 - Rp. 1.999.999",
                                            "Rp. 2.000.000 - Rp. 4.999.999",
                                            "Rp. 5.000.000 - Rp. 20.000.000",
                                            "> Rp. 20.000.000",
                                            "Tidak Berpenghasilan",

                                        ];

                                        foreach ($penghasilan as $h) :
                                        ?>
                                            <option value="<?= $h ?>" <?= ($siswa['hasil_ayah'] == $h) ? 'selected' : '' ?>>
                                                <?= $h ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Telepon Ayah</label>
                                    <input type="text"
                                        class="form-control wajib-step2 hp-field"
                                        id="no_hp_ayah"
                                        name="telp_ayah"
                                        placeholder="08xxxxxxxxxx"
                                        inputmode="numeric">
                                    <small class="text-danger d-none" id="err_no_hp_ayah">
                                        Nomor HP harus angka, tanpa spasi, tanda strip (-), atau +62
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h6 class="text-primary mb-3">Data Ibu</h6>
                                <div class="mb-3">
                                    <label>Nama Ibu</label>
                                    <input type="text" name="nama_ibu" class="form-control wajib-step2">
                                </div>
                                <div class="mb-3">
                                    <label>NIK Ibu</label>
                                    <input type="text" id="nik_ibu" name="nik_ibu"
                                        class="form-control wajib-step2 nik-field"
                                        maxlength="16" inputmode="numeric">
                                    <small class="text-danger d-none" id="err_nik_ibu">NIK harus 16 digit</small>
                                </div>
                                <div class="mb-3">
                                    <label>Tahun Lahir</label>
                                    <input type="text" name="tahun_ibu" id="tahun_ibu" class="form-control wajib-step2 tahun-field" maxlength="4" inputmode="numeric">
                                    <small class="text-danger d-none" id="err_tahun_ibu">NIK harus 4 digit</small>
                                </div>

                                <div class="mb-3">
                                    <label for="">Pendidikan Terakhir</label>
                                    <select class="form-select wajib-step2" name="didik_ibu">
                                        <option value="">-- Pilih Pendidikan --</option>

                                        <?php
                                        $pendidikan = [
                                            "Tidak Sekolah",
                                            "Tamat SD/Sederajat",
                                            "SMP/Sederajat",
                                            "SMA/Sederajat",
                                            "D1",
                                            "D2",
                                            "D3",
                                            "D4/S1",
                                            "S2",
                                            "S3"
                                        ];

                                        foreach ($pendidikan as $p) :
                                        ?>
                                            <option value="<?= $p ?>" <?= ($siswa['didik_ibu'] == $p) ? 'selected' : '' ?>>
                                                <?= $p ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>


                                </div>
                                <div class="mb-3">
                                    <label>Pekerjaan ibu</label>
                                    <select class="form-select wajib-step2" name="kerja_ibu" id="kerja_ibu">
                                        <option value="">-- Pilih Pekerjaan --</option>

                                        <?php
                                        $pekerjaan = [
                                            "Tidak Bekerja",
                                            "Buruh",
                                            "Nelayan",
                                            "Petani",
                                            "Peternak",
                                            "PNS/TNI/POLRI",
                                            "Karyawan Swasta",
                                            "Pedagang Kecil",
                                            "Pedagang Besar",
                                            "Wiraswasta",
                                            "Wirausaha",
                                            "Sudah Meninggal"
                                        ];

                                        foreach ($pekerjaan as $k) :
                                        ?>
                                            <option value="<?= $k ?>" <?= ($siswa['kerja_ibu'] == $k) ? 'selected' : '' ?>>
                                                <?= $k ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label>Penghasilan ibu</label>
                                    <select class="form-select wajib-step2 " name="hasil_ibu" id="hasil_ibu">
                                        <option value="">-- Pilih Penghasilan --</option>
                                        <option value="Rp. 500.000">Rp. 500.000</option>
                                        <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000 - Rp. 1.000.000</option>
                                        <option value="Rp. 1.000.000 - Rp. 1.999.999">Rp. 1.000.000 - Rp. 1.999.999</option>
                                        <option value="Rp. 2.000.000 - Rp. 4.999.999">Rp. 2.000.000 - Rp. 4.999.999</option>
                                        <option value="Rp. 5.000.000 - Rp. 20.000.000">Rp. 5.000.000 - Rp. 20.000.000</option>
                                        <option value="> Rp. 20.000.000">&gt; Rp. 20.000.000</option>
                                        <option value="Tidak Berpenghasilan">Tidak Berpenghasilan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">No Telp Ibu</label>
                                    <input type="text"
                                        class="form-control wajib-step2 hp-field"
                                        id="no_hp_ibu"
                                        name="telp_ibu"
                                        placeholder="08xxxxxxxxxx"
                                        inputmode="numeric">
                                    <small class="text-danger d-none" id="err_no_hp_ibu">
                                        Nomor HP harus angka, tanpa spasi, tanda strip (-), atau +62
                                    </small>
                                </div>
                            </div>
                        </div>





                        <div class="card-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary prev-btn" data-prev="1">Kembali</button>
                            <button type="button" class="btn btn-primary next-btn" data-next="3" disabled>Lanjut</button>
                        </div>
                    </div>

                </div>

                <!-- STEP 3 : REGISTRASI () -->
                <div class="card step d-none" id="step-3">
                    <div class="card-body">
                        <div class="row">

                            <!-- KOLOM KIRI : DATA PERIODIK -->
                            <div class="col-md-6">
                                <h6 class="text-primary mb-3">Data Periodik</h6>

                                <div class="mb-3">
                                    <label>Tinggi Badan (cm)</label>
                                    <input type="number" class="form-control wajib-step3" name="tinggi">
                                </div>

                                <div class="mb-3">
                                    <label>Berat Badan (kg)</label>
                                    <input type="number" class="form-control wajib-step3" name="berat">
                                </div>

                                <div class="mb-3">
                                    <label>Lingkar Kepala (cm)</label>
                                    <input type="number" class="form-control wajib-step3" name="lingkar">
                                </div>

                                <div class="mb-3">
                                    <label>Jumlah Saudara</label>
                                    <input type="number" class="form-control wajib-step3" name="jml_saudara">
                                </div>
                            </div>

                            <!-- KOLOM KANAN : DATA REGISTRASI -->
                            <div class="col-md-6">
                                <h6 class="text-primary mb-3">Data Registrasi</h6>

                                <div class="mb-3">
                                    <label>NIK Siswa </label>
                                    <input type="text" name="nik" id="nik_siswa" class="form-control wajib-step3 nik-field">
                                    <small class="text-danger d-none" id="err_nik_siswa">NIK harus 16 digit</small>
                                </div>
                                <div class="mb-3">
                                    <label>No KK </label>
                                    <input type="text" name="no_kk" id="nik" class="form-control wajib-step3 nik-field">

                                </div>
                                <div class="mb-3">
                                    <label>Hobi</label>
                                    <select name="hobby" id="" class="form-control wajib-step3">
                                        <option value="">Pilih Hobi</option>
                                        <option value="Membaca">Membaca</option>
                                        <option value="Menulis">Menulis</option>
                                        <option value="Melukis">Melukis</option>
                                        <option value="Memancing">Memancing</option>
                                        <option value="Olahraga">Olahraga</option>
                                    </select>

                                </div>

                                <div class="mb-3">
                                    <label>Cita -cita</label>
                                    <select name="cita_cita" id="" class="form-control wajib-step3">
                                        <option value="">Pilih Cita-cita</option>
                                        <option value="Pilot">Pilot</option>
                                        <option value="Dokter">Dokter</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label>No Seri Ijazah</label>

                                        <input type="file" id="fotoIjazah" accept="image/*" class="form-control mb-2 ">

                                        <div style="max-width:100%; display:none;" id="previewContainer">
                                            <img id="previewImage" style="max-width:100%;">
                                        </div>

                                        <button type="button" id="cropBtn" class="btn btn-sm btn-primary mt-2" style="display:none;">
                                            Crop & Scan OCR
                                        </button>

                                        <input type="text" name="seri_ijazah" id="noSeri"
                                            class="form-control  mt-2">
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary prev-btn" data-prev="2">Kembali</button>
                        <button type="button" class="btn btn-primary next-btn" data-next="4" disabled>Lanjut</button>
                    </div>
                </div>
                <!-- STEP 4 : PERIODIK & REGISTRASI-->

                <div class="card step d-none" id="step-4">

                    <div class="card-body">
                        <div class="form-check form-check-inline mt-4">
                            <input class="form-check-input wajib-step4" type="checkbox" id="inlineCheckbox1" name="status_daftar" />
                            <label class="form-check-label" for="inlineCheckbox1"><span class="text-danger">Dengan ini saya menyatakan bahwa data yang saya kirim sudah benar.</span></label>
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-between">

                        <button type="button" class="btn btn-secondary prev-btn" data-prev="3">Kembali</button>
                        <button type="button" class="btn btn-primary next-btn" disabled>Simpan</button>
                    </div>

                </div>

                <!-- STEP 5 : REGISTRASI -->

            </form>
        </div>

    <?php } else if ($siswa['status_daftar'] == '2') { ?>
        <div class="card">
            <div class="card-body" style="text-align: center;">
                <svg xmlns="http://www.w3.org/2000/svg" width="256" height="256"
                    fill="currentColor" viewBox="0 0 24 24">
                    <!--Boxicons v3.0.8 https://boxicons.com | License  https://docs.boxicons.com/free-->
                    <path d="M19 3h-2c0-.55-.45-1-1-1H8c-.55 0-1 .45-1 1H5c-1.1 0-2 .9-2 2v15c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2m0 17H5V5h2v2h10V5h2z"></path>
                    <path d="M11 14.09 8.71 11.8 7.3 13.21l3 3c.2.2.45.29.71.29s.51-.1.71-.29l5-5-1.41-1.41-4.29 4.29Z"></path>
                </svg>
                <h1 class="text-info">Data Sedang diverifikasi</h1>
            </div>
        </div>

    <?php } else if ($siswa['status_daftar'] == '3') { ?>



        <!--/ Header -->

        <!-- Navbar pills -->
        <div class="row mt-2 mb-2">
            <div class="col-md-12">
                <div class="nav-align-top">
                    <ul class="nav nav-pills flex-column flex-sm-row mb-6 gap-sm-0 gap-2">
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0);"><i class="icon-base bx bx-user icon-sm me-1_5"></i> Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages-profile-teams.html"><i class="icon-base bx bx-group icon-sm me-1_5"></i> Teams</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages-profile-projects.html"><i class="icon-base bx bx-grid-alt icon-sm me-1_5"></i> Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages-profile-connections.html"><i class="icon-base bx bx-link icon-sm me-1_5"></i> Connections</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Navbar pills -->

        <!-- User Profile Content -->
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-5">
                <!-- About User -->
                <div class="card mb-6">
                    <div class="card-body">
                        <small class="card-text text-uppercase text-body-secondary small">Profile</small>
                        <ul class="list-unstyled my-3 py-1">
                            <li class="d-flex align-items-center mb-4"><span class="fw-medium mx-2">Nama Lengkap:</span> <span><?= $siswa['nama_siswa'] ?></span></li>
                            <li class="d-flex align-items-center mb-4"><span class="fw-medium mx-2">Jenis Kelamin:</span> <span><?= $siswa['jenis_kelamin'] ?></span></li>
                            <li class="d-flex align-items-center mb-4"><span class="fw-medium mx-2">TTL:</span> <span><?= $siswa['tempat_lahir'] ?>, <?= $siswa['tanggal_lahir'] ?></span></li>
                            <li class="d-flex align-items-center mb-2"><span class="fw-medium mx-2">Nama Ibu:</span> <span><?= $siswa['nama_ibu'] ?></span></li>
                        </ul>
                        <small class="card-text text-uppercase text-body-secondary small">Telepon</small>
                        <ul class="list-unstyled my-3 py-1">
                            <li class="d-flex align-items-center mb-4"><span class="fw-medium mx-2">Telp Ayah:</span> <span><?= $siswa['telp_ayah'] ?></span></li>
                            <li class="d-flex align-items-center mb-4"><span class="fw-medium mx-2">Telp Ibu:</span> <span><?= $siswa['telp_ibu'] ?></span></li>
                        </ul>
                    </div>
                </div>
                <!--/ About User -->
                <!-- Profile Overview -->
                <div class="card mt-2 mb-2">
                    <div class="card-body">
                        <small class="card-text text-uppercase text-body-secondary small">Alamat</small>
                        <ul class="list-unstyled mb-0 mt-3 pt-1">
                            <li class="d-flex align-items-center mb-4"><i class="icon-base bx bx-map"></i>
                                <span class="fw-medium mx-2"> <?= $siswa['alamat'] ?> <br>
                                    RT <?= $siswa['rt'] ?>
                                    RW <?= $siswa['rw'] ?> <br>
                                    Desa/Kel. <?= $siswa['desa'] ?> <br> Kec. <?= $siswa['nama_kecamatan'] ?> <br>
                                    <?= $siswa['city_name'] ?> <br> Provinsi <?= $siswa['prov_name'] ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--/ Profile Overview -->
            </div>
            <div class="col-xl-8 col-lg-7 col-md-7">
                <!-- Activity Timeline -->
                <div class="card card-action mb-6" style="
  
  height: 400px; 
  overflow-y: auto; 
  padding: 10px;
">
                    <div class="card-header align-items-center">
                        <h5 class="card-action-title mb-0"><i class="icon-base bx bx-bar-user icon-lg text-body me-4"></i> Rekam Didik</h5>
                    </div>
                    <div class="card-body pt-3 ">
                        <div class="table-responsive mb-4">
                            <table class="table datatable-project">
                                <thead class="border-top">
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>Kelas</th>
                                        <th>Semester</th>
                                        <th>Tahun Pelajaran</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>aaa</td>
                                        <td>bbb</td>
                                        <td>cc</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>aaa</td>
                                        <td>bbb</td>
                                        <td>cc</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--/ Activity Timeline -->

                <!-- Projects table -->
                <div class="card mb-6 mt-2">
                    <h5 class="card-header ">Kehadiran</h5>
                    <div class="card-body">
                        <span class="text-center text-danger">Coming soon</span>
                    </div>

                </div>
                <!--/ Projects table -->
            </div>
        </div>
        <!--/ User Profile Content -->



        <!-- BUTTON -->





    <?php } ?>
</div>


<script>
    window.APP = {
        baseUrl: " <?= base_url() ?>"
    };
</script>
<script src="<?= base_url() ?>/template/assets/vendor/libs/jquery/jquery.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
<script src="<?= base_url() ?>/assets/dist/js/formwizard.js"></script>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>


<script>
    document.addEventListener("DOMContentLoaded", function() {

        const inputFile = document.getElementById("fotoIjazah");
        const previewImage = document.getElementById("previewImage");
        const previewContainer = document.getElementById("previewContainer");
        const cropBtn = document.getElementById("cropBtn");
        const noSeriInput = document.getElementById("noSeri");

        let cropper;

        inputFile.addEventListener("change", function(e) {

            const file = e.target.files[0];
            if (!file) return;

            const reader = new FileReader();

            reader.onload = function(event) {

                previewImage.src = event.target.result;
                previewContainer.style.display = "block";
                cropBtn.style.display = "inline-block";

                if (cropper) {
                    cropper.destroy();
                }

                cropper = new Cropper(previewImage, {
                    viewMode: 1,
                    autoCropArea: 0.5,
                    movable: true,
                    zoomable: true,
                    scalable: true,
                    responsive: true
                });
            };

            reader.readAsDataURL(file);
        });

        cropBtn.addEventListener("click", function() {

            if (!cropper) return;

            const canvas = cropper.getCroppedCanvas({
                width: 800,
                height: 400
            });

            canvas.toBlob(function(blob) {

                const formData = new FormData();
                formData.append("foto_ijazah", blob);

                fetch("<?= base_url('siswa/ocr-ijazah') ?>", {
                        method: "POST",
                        body: formData
                    })
                    .then(res => res.json())
                    .then(data => {

                        if (data.error) {
                            alert(data.error);
                        } else {
                            noSeriInput.value = data.seri || "";
                            console.log("Raw OCR:", data.raw);

                            // trigger validasi wizard kamu
                            noSeriInput.dispatchEvent(new Event("input"));
                        }

                    })
                    .catch(err => console.error(err));

            }, "image/jpeg");

        });

    });
</script>



<script>
    $(document).ready(function() {

        // =========================
        // DATA EDIT (KOSONGKAN JIKA TAMBAH)
        // =========================
        const siswa = {
            prov: "<?= $siswa['provinsi'] ?>",
            kab: "<?= $siswa['kabupaten'] ?>",
            kec: "<?= $siswa['kecamatan'] ?>",
            des: "<?= $siswa['nama_desa'] ?>"
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


<!-- MAPPPPPP -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const mapContainer = document.getElementById("map");
        if (!mapContainer) {
            console.log("Map tidak ditampilkan (status_daftar ≠ 1)");
            return;
        }
        /* =============================
           RESET SAAT REFRESH
        ============================= */
        ["lat", "lng", "jarak"].forEach(id => {
            const el = document.getElementById(id);
            if (el) el.value = "";
        });

        /* =============================
           KONFIG SEKOLAH
        ============================= */
        const SEKOLAH = {
            lat: -6.281806305398204,
            lng: 106.59501812509845
        };

        /* =============================
           INIT MAP
        ============================= */
        const map = L.map("map").setView([SEKOLAH.lat, SEKOLAH.lng], 13);

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: "&copy; OpenStreetMap"
        }).addTo(map);

        // marker sekolah
        L.marker([SEKOLAH.lat, SEKOLAH.lng])
            .addTo(map)
            .bindPopup("📍 Lokasi Sekolah");

        let markerRumah = null;

        setTimeout(() => map.invalidateSize(), 300);

        /* =============================
           HAVERSINE
        ============================= */
        function hitungJarak(lat1, lon1, lat2, lon2) {
            const R = 6371;
            const dLat = (lat2 - lat1) * Math.PI / 180;
            const dLon = (lon2 - lon1) * Math.PI / 180;
            const a =
                Math.sin(dLat / 2) ** 2 +
                Math.cos(lat1 * Math.PI / 180) *
                Math.cos(lat2 * Math.PI / 180) *
                Math.sin(dLon / 2) ** 2;

            return (R * 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a))).toFixed(2);
        }

        /* =============================
           SET / UPDATE MARKER RUMAH
        ============================= */
        function updateLokasi(lat, lng) {

            if (!markerRumah) {
                markerRumah = L.marker([lat, lng], {
                    draggable: true
                }).addTo(map);

                markerRumah.on("dragend", function(e) {
                    const p = e.target.getLatLng();
                    updateLokasi(p.lat, p.lng);
                });
            } else {
                markerRumah.setLatLng([lat, lng]);
            }

            map.setView([lat, lng], 15);

            document.getElementById("lat").value = lat.toFixed(6);
            document.getElementById("lng").value = lng.toFixed(6);

            const jarak = parseFloat(
                hitungJarak(SEKOLAH.lat, SEKOLAH.lng, lat, lng)
            );

            document.getElementById("jarak").value = jarak + " km";

            const mode = document.getElementById("mode")?.value || "motor";
            const waktu = hitungWaktu(jarak, mode);

            document.getElementById("waktu").value = waktu;

            // trigger validasi wizard
            document.dispatchEvent(new Event("input"));
        }

        /* =============================
           GEOLOCATION OTOMATIS
        ============================= */
        if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(
                pos => updateLokasi(pos.coords.latitude, pos.coords.longitude),
                err => tampilkanPesanLokasi(err), {
                    enableHighAccuracy: true,
                    timeout: 10000,
                    maximumAge: 0
                }
            );
        }

        /* =============================
           PESAN GPS
        ============================= */
        function tampilkanPesanLokasi(error) {
            let msg = "📍 Klik peta untuk menentukan lokasi rumah.";

            if (error.code === 1)
                msg = "Izin lokasi ditolak. Silakan klik peta secara manual.";
            else if (error.code === 2)
                msg = "Lokasi tidak tersedia. Pastikan GPS aktif.";
            else if (error.code === 3)
                msg = "Permintaan lokasi timeout.";

            alert(msg);
        }

        /* =============================
           KLIK MAP (WAJIB ADA)
        ============================= */
        map.on("click", function(e) {
            updateLokasi(e.latlng.lat, e.latlng.lng);
        });

        // ========WaKTU
        function hitungWaktu(jarakKm, mode) {
            const kecepatan = {
                jalan: 4,
                sepeda: 12,
                motor: 30,
                mobil: 40
            };

            const v = kecepatan[mode] || 30; // default motor
            const jam = jarakKm / v;
            const menit = Math.round(jam * 60);

            if (menit < 60) {
                return menit + " menit";
            }

            const j = Math.floor(menit / 60);
            const m = menit % 60;
            return j + " jam " + m + " menit";
        }

    });
</script>

























<?= $this->endSection() ?>