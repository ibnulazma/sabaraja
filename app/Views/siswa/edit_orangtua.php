<?= $this->extend('template/template-edit') ?>
<?= $this->section('content') ?>


<?= form_open('siswa/update_orangtua/' . $siswa['id_siswa']) ?>


<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="card">
            <?= form_open() ?>
            <div class="card-body pt-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="">Nama Ayah</label>
                            <input type="text" class="form-control <?= ($validation->hasError('nama_ayah')) ? 'is-invalid' : ''; ?>" name="nama_ayah" value="<?= old('nama_ayah') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_ayah'); ?>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="">NIK AYAH</label>
                            <input type="number" class="form-control <?= ($validation->hasError('nik_ayah')) ? 'is-invalid' : ''; ?>" name="nik_ayah" value="<?= old('nik_ayah') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nik_ayah'); ?>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="">Tahun Lahir</label>
                            <input type="number" class="form-control <?= ($validation->hasError('tahun_ayah')) ? 'is-invalid' : ''; ?>" name="tahun_ayah" value="<?= old('tahun_ayah') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('tahun_ayah'); ?>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="">Pendidikan</label>
                            <select name="didik_ayah" class="form-control <?= ($validation->hasError('didik_ayah')) ? 'is-invalid' : ''; ?>">
                                <option value="">-- Pilih Pendidikan --</option>
                                <?php foreach ($didik as $key => $data) { ?>
                                    <?php if ($siswa['didik_ayah'] == $data['pendidikan']) {
                                        $select = "selected";
                                    } else {
                                        $select = "";
                                    }
                                    echo "<option value=" . $data['pendidikan'] . " $select>" . $data['pendidikan'] . "</option>";
                                    ?>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('didik_ayah'); ?>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="">Pekerjaan</label>
                            <select name="kerja_ayah" class="form-control <?= ($validation->hasError('kerja_ayah')) ? 'is-invalid' : ''; ?>" id="dropdown" onChange="opsi(this)" value="<?= old('kerja_ayah') ?>">
                                <option value="">--Pilih Pekerjaan--</option>
                                <?php foreach ($kerja as $key => $data) { ?>
                                    <?php if ($siswa['kerja_ayah'] == $data['pekerjaan']) {
                                        $select = "selected";
                                    } else {
                                        $select = "";
                                    }
                                    echo "<option value=" . $data['pekerjaan'] . " $select>" . $data['pekerjaan'] . "</option>";
                                    ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="">Penghasilan</label>
                            <select name="hasil_ayah" class="form-control <?= ($validation->hasError('hasil_ayah')) ? 'is-invalid' : ''; ?>" id="dipilih" onChange="opsi(this)" value="<?= old('hasil_ayah') ?>">
                                <option value="">--Pilih Penghasilan--</option>
                                <?php foreach ($hasil as $key => $data) { ?>
                                    <?php if ($siswa['hasil_ayah'] == $data['penghasilan']) {
                                        $select = "selected";
                                    } else {
                                        $select = "";
                                    }
                                    echo "<option value=" . $data['penghasilan'] . " $select>" . $data['penghasilan'] . "</option>";
                                    ?>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('hasil_ayah'); ?>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="">No Telp</label>
                            <input type="number" name="telp_ayah" class="form-control <?= ($validation->hasError('telp_ayah')) ? 'is-invalid' : ''; ?>" value="<?= old('telp_ayah') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('telp_ayah'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4 ">
                            <label for="">Nama Ibu</label>
                            <input type="text" class="form-control <?= ($validation->hasError('nama_ibu')) ? 'is-invalid' : ''; ?>" name="nama_ibu" value="<?= $siswa['nama_ibu'] ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_ibu'); ?>
                            </div>
                        </div>
                        <div class="mb-4 ">

                            <label for="">NIK Ibu</label>

                            <input type="number" class="form-control <?= ($validation->hasError('nik_ibu')) ? 'is-invalid' : ''; ?>" name="nik_ibu" value="<?= old('nik_ibu') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nik_ibu'); ?>
                            </div>
                        </div>
                        <div class="mb-4 ">
                            <label for="">Tahun Lahir</label>
                            <input type="number" class="form-control <?= ($validation->hasError('tahun_ibu')) ? 'is-invalid' : ''; ?>" name="tahun_ibu" value="<?= old('tahun_ibu') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('tahun_ibu'); ?>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="">Pendidikan</label>
                            <select name="didik_ibu" class="form-control <?= ($validation->hasError('didik_ibu')) ? 'is-invalid' : ''; ?>" value="<?= old('didik_ibu') ?>">
                                <option value="">-- Pilih Pendidikan --</option>
                                <?php foreach ($didik as $key => $data) { ?>
                                    <?php if ($siswa['didik_ibu'] == $data['pendidikan']) {
                                        $select = "selected";
                                    } else {
                                        $select = "";
                                    }
                                    echo "<option value=" . $data['pendidikan'] . " $select>" . $data['pendidikan'] . "</option>";
                                    ?>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('didik_ibu'); ?>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="">Pekerjaan</label>
                            <select name="kerja_ibu" class="form-control <?= ($validation->hasError('didik_ibu')) ? 'is-invalid' : ''; ?>" id="dropdown" onChange="opsi(this)" value="<?= old('kerja_ibu') ?>">
                                <option value="">--Pilih Pekerjaan--</option>
                                <?php foreach ($kerja as $key => $data) { ?>
                                    <?php if ($siswa['kerja_ibu'] == $data['pekerjaan']) {
                                        $select = "selected";
                                    } else {
                                        $select = "";
                                    }
                                    echo "<option value=" . $data['pekerjaan'] . " $select>" . $data['pekerjaan'] . "</option>";
                                    ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="">Penghasilan</label>
                            <select name="hasil_ibu" class="form-control <?= ($validation->hasError('hasil_ibu')) ? 'is-invalid' : ''; ?>" id="dipilih" onChange="opsi(this)" value="<?= old('hasil_ibu') ?>">
                                <option value="">--Pilih Penghasilan--</option>
                                <?php foreach ($hasil as $key => $value) { ?>
                                    <option value="<?= $value['penghasilan'] ?>"> <?= $value['penghasilan'] ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('hasil_ibu'); ?>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="">No Telp</label>
                            <input type="text" name="telp_ibu" class="form-control <?= ($validation->hasError('telp_ibu')) ? 'is-invalid' : ''; ?>" value="<?= old('telp_ibu') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('telp_ibu'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>




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
<?= $this->endSection() ?>