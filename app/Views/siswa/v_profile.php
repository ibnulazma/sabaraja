<?= $this->extend('template/template-edit') ?>
<?= $this->section('content') ?>


<?php

$db     = \Config\Database::connect();

$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();

?>

<div class="swal" data-swal="<?= session()->getFlashdata('pesan'); ?>"></div>




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
                <form id="formAccountSettings" method="POST" onsubmit="return false">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="lastName" class="form-label">Nama Lengkap</label>
                                <input class="form-control" type="text" name="nama_siswa" id="lastName" value="<?= $siswa['nama_siswa'] ?>" readonly />
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label">Jenis Kelamin</label>
                                <select name="" id="" class="form-select">
                                    <option value="L" <?php if ($siswa['jenis_kelamin'] == "L") {
                                                            echo "selected";
                                                        } ?>>Laki-laki</option>
                                    <option value="P" <?php if ($siswa['jenis_kelamin'] == "P") {
                                                            echo "selected";
                                                        } ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="organization" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="organization" name="tempat_lahir" value="<?= $siswa['tempat_lahir'] ?>" readonly />
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="phoneNumber">Tanggal Lahir</label>
                                <input type="text" class="form-control date" value="<?= $siswa['tanggal_lahir'] ?>" readonly>
                            </div>
                            <div class="mb-4">
                                <label for="nik" class="form-label">NISN</label>
                                <input type="text" class="form-control" id="nisn" name="nisn" value="<?= $siswa['nisn'] ?>" readonly />
                            </div>
                            <div class=" mb-4">
                                <label for="nik" class="form-label">NIK</label>
                                <input class="form-control" type="text" id="nik" name="nik" value="<?= $siswa['nik'] ?>" readonly />
                            </div>
                            <div class=" mb-4">
                                <label for="no_kk" class="form-label">No Kartu Keluarga</label>
                                <input class="form-control" type="text" id="nisn" name="no_kk" value="<?= $siswa['no_kk'] ?>" readonly />
                            </div>
                            <div class="mb-4">
                                <label for="agama" class="form-label">Agama</label>
                                <input type="text" class="form-control" id="agama" value="Islam" />
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="mb-4">
                                <label class="form-label" for="country">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="<?= $siswa['alamat'] ?>">
                            </div>

                            <div class="mb-4 row">
                                <div class="col-6">
                                    <label for="">RT</label>
                                    <input type="text" class="form-control datartrw">
                                </div>
                                <div class="col-6">
                                    <label for="">RW</label>
                                    <input type="text" class="form-control datartrw">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="provinsi" class="form-label">Provinsi</label>
                                <select name="provinsi" id="provinsi" class="form-select">
                                    <option value="">Pilih Provinsi</option>
                                    <?php foreach ($provinsi as $key => $prov) { ?>
                                        <?php if ($siswa['provinsi'] == $prov['id_provinsi']) {
                                            $select = "selected";
                                        } else {
                                            $select = "";
                                        }
                                        echo "<option value=" . $prov['id_provinsi'] . " $select>" . $prov['prov_name'] . "</option>";
                                        ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="kabupaten" class="form-label">Kabupaten</label>
                                <select name="kabupaten" id="kabupaten" class="form-select">

                                </select>

                            </div>
                            <div class="mb-4">
                                <label for="kabupaten" class="form-label">Kecamatan</label>
                                <select name="kecamatan" id="kecamatan" class="form-select">

                                </select>

                            </div>
                            <div class="mb-4">
                                <label for="kabupaten" class="form-label">Desa/Kelurahan</label>
                                <select name="desa" id="desa" class="form-select">

                                </select>

                            </div>
                            <div class="mb-4">
                                <label for="currency" class="form-label">Kode Pos</label>
                                <input type="number" class="form-control" name="kodepos">
                            </div>
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
        <div class="card">
            <h5 class="card-header">Delete Account</h5>
            <div class="card-body">
                <div class="mb-4 col-12 mb-0">
                    <div class="alert alert-warning">
                        <h5 class="alert-heading mb-1">Are you sure you want to delete your account?</h5>
                        <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                    </div>
                </div>
                <form id="formAccountDeactivation" onsubmit="return false">
                    <div class="form-check my-8 ms-2">
                        <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
                        <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
                    </div>
                    <button type="submit" class="btn btn-danger deactivate-account" disabled>Deactivate Account</button>
                </form>
            </div>
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