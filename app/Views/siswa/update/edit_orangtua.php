<?= $this->extend('template/template-edit') ?>
<?= $this->section('content') ?>

<?= form_open('siswa/update_orangtua/' . $siswa['id_siswa']) ?>

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <h5>Biodata Ayah</h5>
                <div class=" row mb-4">
                    <div class="col-sm-4">
                        <label for="inputName">Nama Ayah</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_ayah')) ? 'is-invalid' : ''; ?>" name="nama_ayah" value="<?= old('nama_ayah') ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_ayah'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label for="inputName">Tahun Lahir</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="number" class="form-control <?= ($validation->hasError('tahun_ayah')) ? 'is-invalid' : ''; ?>" name="tahun_ayah" value="<?= old('tahun_ayah') ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tahun_ayah'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label for="inputName">NIK</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="number" class="form-control <?= ($validation->hasError('nik_ayah')) ? 'is-invalid' : ''; ?>" name="nik_ayah" value="<?= old('nik_ayah') ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nik_ayah'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <label for="inputName" class=" col-form-label">Pendidikan</label>
                    </div>
                    <div class="col-md-8">
                        <select name="didik_ayah" id="" class="form-control <?= ($validation->hasError('didik_ayah')) ? 'is-invalid' : ''; ?>">
                            <option value="">-- Pilih Pendidikan --</option>
                            <option value="Tidak Sekolah">Tidak Sekolah</option>
                            <option value="Tamat SD/Sederajat">Tamat SD/Sederajat</option>
                            <option value="SMP">SMP/Sederajat</option>
                            <option value="SMA">SMA/Sederajat</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="D4/S1">D4/S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('didik_ayah'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <label for="inputName" class=" col-form-label">Pekerjaan</label>
                    </div>
                    <div class="col-md-8">
                        <select name="kerja_ayah" class="form-control <?= ($validation->hasError('kerja_ayah')) ? 'is-invalid' : ''; ?>" id="dropdown" onChange="opsi(this)">
                            <option value="">-- Pilih Pekerjaan --</option>
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
                        <div class="invalid-feedback">
                            <?= $validation->getError('kerja_ayah'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <label for="inputName" class=" col-form-label">Penghasilan</label>
                    </div>
                    <div class="col-md-8">
                        <select name="hasil_ayah" class="form-control <?= ($validation->hasError('hasil_ayah')) ? 'is-invalid' : ''; ?>" id="dipilih" onChange="opsi(this)">
                            <option value="">-- Pilih Penghasilan --</option>
                            <option value="< Rp.500.000">
                                < Rp.500.000 </option>
                            <option value="Rp. 500.000-Rp. 1.000.000">Rp. 500.000-Rp. 1.000.000</option>
                            <option value="Rp. 1.000.000-Rp.1.999.999">Rp. 1.000.000-Rp.1.999.999</option>
                            <option value="Rp. 2.000.000-Rp. 4.999.999">Rp. 2.000.000-Rp. 4.999.999</option>
                            <option value="Rp. 5.000.000-Rp. 20.000.000">Rp. 5.000.000-Rp. 20.000.000</option>
                            <option value="> Rp. 20.000.000">> Rp. 20.000.000</option>
                            <option value="Tidak Berpenghasilan">Tidak Berpenghasilan</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('hasil_ayah'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <label for="inputName" class="col-form-label">Telepon/Hp</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control col-sm-10" value="<?= $siswa['telp_ayah'] ?>" name="telp_ayah" value="<?= old('telp_ayah') ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h5>Biodata Ibu</h5>
                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label for="inputName">Nama ibu</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_ibu')) ? 'is-invalid' : ''; ?>" name="nama_ibu" value="<?= $siswa['nama_ibu'] ?>" readonly>
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_ibu'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label for="inputName">Tahun Lahir</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="number" class="form-control <?= ($validation->hasError('tahun_ibu')) ? 'is-invalid' : ''; ?>" name="tahun_ibu" value="<?= old('tahun_ibu') ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tahun_ibu'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label for="inputName">NIK</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="number" class="form-control <?= ($validation->hasError('nik_ibu')) ? 'is-invalid' : ''; ?>" name="nik_ibu" value="<?= old('nik_ibu') ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nik_ibu'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <label for="inputName" class=" col-form-label">Pendidikan</label>
                    </div>
                    <div class="col-md-8">
                        <select name="didik_ibu" id="" class="form-control <?= ($validation->hasError('didik_ibu')) ? 'is-invalid' : ''; ?>">
                            <option value="">-- Pilih Pendidikan --</option>
                            <option value="Tidak Sekolah">Tidak Sekolah</option>
                            <option value="Tamat SD/Sederajat">Tamat SD/Sederajat</option>
                            <option value="SMP">SMP/Sederajat</option>
                            <option value="SMA">SMA/Sederajat</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="D4/S1">D4/S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('didik_ibu'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <label for="inputName" class=" col-form-label">Pekerjaan</label>
                    </div>
                    <div class="col-md-8">
                        <select name="kerja_ibu" class="form-control <?= ($validation->hasError('kerja_ibu')) ? 'is-invalid' : ''; ?>" id="dropdown" onChange="opsi(this)">
                            <option value="">-- Pilih Pekerjaan --</option>
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
                        <div class="invalid-feedback">
                            <?= $validation->getError('kerja_ibu'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <label for="inputName" class=" col-form-label">Penghasilan</label>
                    </div>
                    <div class="col-md-8">
                        <select name="hasil_ibu" class="form-control <?= ($validation->hasError('hasil_ibu')) ? 'is-invalid' : ''; ?>" id="dipilih" onChange="opsi(this)">
                            <option value="">-- Pilih Penghasilan --</option>
                            <option value="< Rp.500.000">
                                < Rp.500.000 </option>
                            <option value="Rp. 500.000-Rp. 1.000.000">Rp. 500.000-Rp. 1.000.000</option>
                            <option value="Rp. 1.000.000-Rp.1.999.999">Rp. 1.000.000-Rp.1.999.999</option>
                            <option value="Rp. 2.000.000-Rp. 4.999.999">Rp. 2.000.000-Rp. 4.999.999</option>
                            <option value="Rp. 5.000.000-Rp. 20.000.000">Rp. 5.000.000-Rp. 20.000.000</option>
                            <option value="> Rp. 20.000.000">> Rp. 20.000.000</option>
                            <option value="Tidak Berpenghasilan">Tidak Berpenghasilan</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('hasil_ibu'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <label for="inputName" class="col-form-label">Telepon/Hp</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control col-sm-10" value="<?= $siswa['telp_ibu'] ?>" name="telp_ibu" value="<?= old('telp_ibu') ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mb-3">
        <button type="submit" class="btn btn-primary">
            <i class='bx  bx-arrow-to-right-stroke'></i> Lanjut
        </button>
    </div>

</div>





<!-- Ibu -->




<?php echo form_close() ?>




<script src="<?= base_url() ?>/template/assets/vendor/libs/jquery/jquery.js"></script>
<script>
    function opsi(value) {
        var st = $("#dropdown").val();
        if (st == "Sudah Meninggal") {
            document.getElementById("dipilih").disabled = true;
        } else {
            document.getElementById("dipilih").disabled = false;
        }
    }
</script>

<!-- <script>
    $("#chkdwn2").change(function() {
        if (this.checked) $("#dropdown").prop("disabled", true);
        else $("#dropdown").prop("disabled", false);
    })
</script> -->



<?= $this->endSection() ?>