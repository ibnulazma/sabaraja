<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>




<div class="container-xxl flex-grow-1 container-p-y">

    <form id="formSiswa" action="<?= base_url('siswa/update/' . $siswa['id_siswa']) ?>" method="post">
        <?= csrf_field() ?>

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
                            <small class="text-danger d-none" id="err_rt">RT harus 1–2 digit angka</small>
                        </div>
                        <div class="col mb-3">
                            <label>RW</label>
                            <input type="text" name="rw" id="rw"
                                class="form-control wajib-step1 rt-rw-field"
                                inputmode="numeric"
                                maxlength="2">
                            <small class="text-danger d-none" id="err_rw">RW harus 1–2 digit angka</small>
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
                            <select id="kel" class="form-control wajib-step1" name="desa">
                                <option value="">-- Pilih Desa/Kelurahan --</option>
                            </select>
                        </div>
                        <div class="col mb-3">
                            <label class="" for="tempattinggal">Kode Pos</label>
                            <input type="text" name="kodepos" class="form-control wajib-step1">
                        </div>


                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="button" class="btn btn-primary next-btn" data-next="2" disabled>Lanjut</button>
            </div>
        </div>

        <!-- STEP 2 : ORANG TUA -->
        <div class="card step d-none" id="step-2">
            <div class="card-header  text-info">Data Orang Tua</div>
            <div class="card-body">
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
                    <input type="text" name="tahun_ayah" id="tahun_ayah" class="form-control wajib-step2 tahun-field" maxlength="4" inputmode="numeric">
                    <small class="text-danger d-none" id="err_tahun_ayah">NIK harus 4 digit</small>
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
                    <label>Nama Ibu</label>
                    <input type="text" name="nama_ibu" class="form-control wajib-step2">
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary prev-btn" data-prev="1">Kembali</button>
                <button type="button" class="btn btn-primary next-btn" data-next="3" disabled>Lanjut</button>
            </div>
        </div>

        <!-- STEP 3 : PERIODIK -->
        <div class="card step d-none" id="step-3">
            <div class="card-header bg-warning text-dark">Data Periodik</div>
            <div class="card-body">
                <div class="mb-3">
                    <label>Tinggi Badan</label>
                    <input type="number" name="tinggi" class="form-control wajib-step3">
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary prev-btn" data-prev="2">Kembali</button>
                <button type="button" class="btn btn-primary next-btn" data-next="4" disabled>Lanjut</button>
            </div>
        </div>

        <!-- STEP 4 : REGISTRASI -->
        <div class="card step d-none" id="step-4">
            <div class="card-header bg-success text-white">Registrasi</div>
            <div class="card-body">
                <div class="mb-3">
                    <label>NIS</label>
                    <input type="text" name="nis" class="form-control wajib-step4">
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary prev-btn" data-prev="3">Kembali</button>
                <button type="submit" class="btn btn-success" id="btnSimpan" disabled>Simpan Semua Data</button>
            </div>
        </div>
    </form>
</div>

<script src="<?= base_url() ?>/template/assets/vendor/libs/jquery/jquery.js"></script>

<script>
    $(document).ready(function() {

        // =========================
        // DATA EDIT (KOSONGKAN JIKA TAMBAH)
        // =========================
        const siswa = {
            prov: "<?= $siswa['provinsi'] ?>",
            kab: "<?= $siswa['kabupaten'] ?>",
            kec: "<?= $siswa['kecamatan'] ?>",
            des: "<?= $siswa['desa'] ?>"
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