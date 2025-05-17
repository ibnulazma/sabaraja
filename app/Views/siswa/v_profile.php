<?= $this->extend('template/template-biodata') ?>
<?= $this->section('content') ?>


<?php

$db     = \Config\Database::connect();

$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();

?>



<style>
    .rata_kanan {
        float: right;
    }
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">

        <div class="card mb-3">
            <!-- Account -->
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4 pb-4 border-bottom">
                    <?php if ($siswa['jenis_kelamin'] == 'L') { ?>

                        <img src="<?= base_url() ?>/foto/muslim.png" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                    <?php } else { ?>
                        <img src="<?= base_url() ?>/foto/woman.png" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                    <?php } ?>
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-4 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                        </label>
                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                        </button>

                        <div>Allowed JPG, GIF or PNG. Max size of 800K</div>
                    </div>
                </div>
            </div>
            <div class="card-body pt-4">

                <div class="row">
                    <div class="col-md-6">
                        <ul class="atribut" style="list-style:none">
                            <li class="p-0">
                                Nama Lengkap :
                                <span class="rata_kanan"><?= $siswa['nama_siswa'] ?></span>
                            </li>
                            <hr>
                            <li class="p-0">
                                Jenis Kelamin :
                                <span class="rata_kanan"><?= $siswa['jenis_kelamin'] ?></span>
                            </li>
                            <hr>
                            <li class="p-0">
                                Tempat Lahir
                                <span class="rata_kanan"><?= $siswa['tempat_lahir'] ?></span>
                            </li>
                            <hr>
                            <li class="p-0">
                                Tanggal Lahir :
                                <span class="rata_kanan"><?= formatindo($siswa['tanggal_lahir']) ?></span>
                            </li>
                            <hr>
                            <li class="p-0">
                                NISN :
                                <span class="rata_kanan"><?= $siswa['nisn'] ?></span>
                            </li>
                            <hr>
                            <li class="p-0">
                                NIK :
                                <span class="rata_kanan"><?= $siswa['nik'] ?></span>
                            </li>
                            <hr>
                            <li class="p-0">
                                Nomor KK :
                                <span class="rata_kanan"><?= $siswa['no_kk'] ?></span>
                            </li>
                            <hr>
                            <li class="p-0">
                                Agama :
                                <span class="rata_kanan">Islam</span>
                            </li>
                            <hr>
                            <li class="p-0">
                                Kewarganegaraan :
                                <span class="rata_kanan">Indonesia</span>
                            </li>
                            <hr>
                            <li class="p-0">
                                Kebutuhan Khusus :
                                <span class="rata_kanan">Tidak Ada</span>
                            </li>
                            <hr>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="atribut" style="list-style:none">
                            <li class="p-0">
                                Alamat Rumah
                                <span class="rata_kanan"><?= $siswa['alamat'] ?> RT <?= $siswa['rt'] ?> RW <?= $siswa['rw'] ?> Desa/Kel <?= $siswa['desa'] ?> <?= $siswa['nama_kecamatan'] ?> </span>
                            </li>
                            <hr>
                        </ul>
                        <div id="map" style="height:500px"></div>
                    </div>
                </div>
                <div class="mt-6">
                    <button type="submit" class="btn btn-primary me-3">Save changes</button>
                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
</div>



<script src="<?= base_url() ?>/template/assets/vendor/libs/jquery/jquery.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

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