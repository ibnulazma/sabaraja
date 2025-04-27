<?= $this->extend('template/template-edit') ?>
<?= $this->section('content') ?>


<?= form_open('siswa/update_periodik/' . $siswa['id_siswa']) ?>


<div class="row">
    <div class="col-md-6">
        <div class="mb-4 row">
            <div class="col-sm-4">
                <label for="">Berat Badan</label>
            </div>
            <div class="col-sm-8">
                <input type="number" class="form-control <?= ($validation->hasError('berat')) ? 'is-invalid' : ''; ?>" name="berat" value="<?= old('berat') ?>"></td>
                <div class="invalid-feedback">
                    <?= $validation->getError('berat'); ?>
                </div>
            </div>
        </div>
        <div class="mb-4 row">
            <div class="col-sm-4">
                <label for="">Tinggi Badan</label>
            </div>
            <div class="col-sm-8">
                <input type="number" class="form-control <?= ($validation->hasError('tinggi')) ? 'is-invalid' : ''; ?>" name="tinggi" value="<?= old('tinggi') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tinggi'); ?>
                </div>
            </div>
        </div>
        <div class="mb-4 row">
            <div class="col-sm-4">
                <label for="">Lingkar Kepala</label>
            </div>
            <div class="col-sm-8">
                <input type="number" class="form-control <?= ($validation->hasError('lingkar')) ? 'is-invalid' : ''; ?>" name="lingkar" value="<?= old('lingkar') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('lingkar'); ?>
                </div>
            </div>
        </div>
        <div class="mb-4 row">
            <div class="col-sm-4">
                <label for="">Anak Ke</label>
            </div>
            <div class="col-sm-8">
                <input type="number" class="form-control <?= ($validation->hasError('anak_ke')) ? 'is-invalid' : ''; ?>" name="anak_ke" value="<?= old('anak_ke') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('anak_ke'); ?>
                </div>
            </div>
        </div>
        <div class="mb-4 row">
            <div class="col-sm-4">
                <label for="">Jumlah Saudara Kandung</label>
            </div>
            <div class="col-sm-8">
                <input type=" number" class="form-control <?= ($validation->hasError('jml_saudara')) ? 'is-invalid' : ''; ?>" name="jml_saudara" value="<?= old('jml_saudara') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_saudara'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-4 row">
            <div class="col-sm-4">
                <label for="">Tinggal Bersama</label>
            </div>
            <div class="col-sm-8">
                <select name="tinggal" class="form-control select2bs4 <?= ($validation->hasError('tinggal')) ? 'is-invalid' : ''; ?>" style="width: 100%;">
                    <option value="">--Tinggal Bersama--</option>
                    <?php foreach ($tinggal as $key => $value) { ?>
                        <option value="<?= $value['tinggal'] ?>"> <?= $value['tinggal'] ?></option>
                    <?php } ?>

                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('tinggal'); ?>
                </div>
            </div>
        </div>

        <div class="mb-4 row">
            <div class="col-sm-4">
                <label for="">Transportasi</label>
            </div>
            <div class="col-sm-8">
                <select name="transportasi" class="form-control select2bs4 <?= ($validation->hasError('transportasi')) ? 'is-invalid' : ''; ?>" style="width: 100%;">
                    <option value="">--Pilih--</option>
                    <?php foreach ($transportasi as $key => $value) { ?>
                        <option value="<?= $value['transportasi'] ?>" <?= $siswa['transportasi'] == $value['transportasi'] ? 'selected' : '' ?>> <?= $value['transportasi'] ?></option>
                    <?php } ?>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('transportasi'); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<button type="submit" class="btn btn-primary w-100">Simpan</button>
<?= form_close() ?>
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