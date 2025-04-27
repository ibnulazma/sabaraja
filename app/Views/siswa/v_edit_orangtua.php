<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<?= form_open('siswa/editortu/' . $siswa['id_siswa']) ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-light">
                <h5>Biodata Orang Tua</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h5 class="card-title">Data Ayah</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Nama Ayah</label>
                                            <input type="text" class="form-control" value="<?= $siswa['nama_ayah'] ?>" name="nama_ayah" required>

                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Tahun Lahir</label>
                                            <input type="text" class="form-control" value="<?= $siswa['tahun_ayah'] ?>" name="tahun_ayah" data-inputmask="'mask': ['9999']" data-mask required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">NIK</label>
                                            <input type="text" class="form-control" value="<?= $siswa['nik_ayah'] ?>" name="nik_ayah" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 col-form-label">Pendidikan</label>
                                            <select name="didik_ayah" id="" class="form-control" required>
                                                <option value="">-- Pilih Pendidikan --</option>
                                                <?php foreach ($didik as $key => $value) { ?>
                                                    <option value="<?= $value['pendidikan'] ?>" <?= $siswa['didik_ayah'] == $value['pendidikan'] ? 'selected' : '' ?>> <?= $value['pendidikan'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 col-form-label">Pekerjaan</label>
                                            <select name="kerja_ayah" class="form-control" id="dropdown" onChange="opsi(this)" required>
                                                <option value="">--Pilih Pekerjaan--</option>
                                                <?php foreach ($kerja as $key => $value) { ?>
                                                    <option value="<?= $value['pekerjaan'] ?>" <?= $siswa['kerja_ayah'] == $value['pekerjaan'] ? 'selected' : '' ?>> <?= $value['pekerjaan'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 col-form-label">Penghasilan</label>
                                            <select name="hasil_ayah" class="form-control" id="dipilih" required>
                                                <option value="">--Pilih Penghasilan--</option>
                                                <?php foreach ($hasil as $key => $value) { ?>
                                                    <option value="<?= $value['penghasilan'] ?>" <?= $siswa['hasil_ibu'] == $value['penghasilan'] ? 'selected' : '' ?>> <?= $value['penghasilan'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 col-form-label">Telepon/Hp</label>
                                            <input type="text" class="form-control" value="<?= $siswa['telp_ayah'] ?>" name="telp_ayah" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h5 class="card-title">
                                    Biodata Ibu
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName" class="col-form-label">Nama Ibu</label>
                                            <input type="text" class="form-control" value="<?= $siswa['nama_ibu'] ?>" name="nama_ibu" readonly>

                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-form-label">Tahun Lahir</label>
                                            <input type="text" class="form-control" value="<?= $siswa['tahun_ibu'] ?>" name="tahun_ibu" data-inputmask="'mask': ['9999']" data-mask required>

                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-form-label">NIK</label>
                                            <input type="text" class="form-control" value="<?= $siswa['nik_ibu'] ?>" name="nik_ibu" required>

                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-form-label">Pendidikan</label>
                                            <select name="didik_ibu" id="" class="form-control" required>
                                                <option value="">-- Pilih Pendidikan --</option>
                                                <?php foreach ($didik as $key => $value) { ?>
                                                    <option value="<?= $value['pendidikan'] ?>" <?= $siswa['didik_ibu'] == $value['pendidikan'] ? 'selected' : '' ?>> <?= $value['pendidikan'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName" class="col-form-label">Pekerjaan</label>
                                            <select name="kerja_ibu" id="" class="form-control" required>
                                                <option value="">-- Pilih Pekerjaan --</option>
                                                <?php foreach ($kerja as $key => $value) { ?>
                                                    <option value="<?= $value['pekerjaan'] ?>" <?= $siswa['kerja_ibu'] == $value['pekerjaan'] ? 'selected' : '' ?>> <?= $value['pekerjaan'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-form-label">Penghasilan</label>
                                            <select name="hasil_ibu" id="" class="form-control" required>
                                                <option value="">-- Pilih Penghasilan --</option>
                                                <?php foreach ($hasil as $key => $value) { ?>
                                                    <option value="<?= $value['penghasilan'] ?>" <?= $siswa['hasil_ibu'] == $value['penghasilan'] ? 'selected' : '' ?>> <?= $value['penghasilan'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-form-label">Telepon/Hp</label>
                                            <input type="text" class="form-control" value="<?= $siswa['telp_ibu'] ?>" name="telp_ibu" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mb-3">
            <a href="<?= base_url('siswa/edit_profile/' . $siswa['id_siswa']) ?>" class="btn btn-danger"> <i class="fa-solid fa-backward mr-2"></i> Kembali</a>
            <button type="submit" class="btn btn-primary"> <i class="fa-solid fa-floppy-disk mr-2"></i> Submit</button>
        </div>
    </div>
</div>

<!-- Ibu -->




<?php echo form_close() ?>




<script src="<?= base_url() ?>/AdminLTE/plugins/jquery/jquery.min.js"></script>
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