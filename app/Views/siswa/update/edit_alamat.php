<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>



<style>
    #map-wrapper {
        width: 100%;
        height: 320px;
    }

    #map {
        width: 100%;
        height: 100%;
    }

    @media (max-width: 576px) {
        #map-wrapper {
            height: 260px;
        }
    }
</style>
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
                    <input type="text" id="lat" class="form-control wajib-step1" name="" readonly>
                </div>
                <div class="mb-3">
                    <label>Longitude</label>
                    <input type="text" id="lng" class="form-control wajib-step1" readonly>
                </div>
                <div class="mb-3">
                    <label>Jarak ke Sekolah</label>
                    <input type="text" id="jarak" class="form-control wajib-step1" name="jarak" readonly>
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="button" class="btn btn-primary next-btn" data-next="2" disabled>Lanjut</button>
            </div>
        </div>

        <!-- STEP 2 : ORANG TUA (AYAH) -->
        <div class="card step d-none" id="step-2">
            <div class="card-header  text-info">Data Ayah Kandung</div>
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

                <div class="card-body">

                </div>
                <div class="card-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary prev-btn" data-prev="1">Kembali</button>
                    <button type="button" class="btn btn-primary next-btn" data-next="3" disabled>Lanjut</button>
                </div>
            </div>

        </div>

        <!-- STEP 3 : ORANG TUA (IBU) -->
        <div class="card step d-none" id="step-3">
            <div class="card-header  text-warning">Data Ibu Kandung</div>
            <div class="card-body">
                <div class="mb-3">
                    <label>Nama Ibu</label>
                    <input type="text" name="nama_ibu" class="form-control wajib-step3">
                </div>
                <div class="mb-3">
                    <label>NIK Ibu</label>
                    <input type="text" id="nik_ibu" name="nik_ibu"
                        class="form-control wajib-step3 nik-field"
                        maxlength="16" inputmode="numeric">
                    <small class="text-danger d-none" id="err_nik_ibu">NIK harus 16 digit</small>
                </div>
                <div class="mb-3">
                    <label>Tahun Lahir</label>
                    <input type="text" name="tahun_ibu" id="tahun_ibu" class="form-control wajib-step3 tahun-field" maxlength="4" inputmode="numeric">
                    <small class="text-danger d-none" id="err_tahun_ibu">NIK harus 4 digit</small>
                </div>

                <div class="mb-3">
                    <label for="">Pendidikan Terakhir</label>
                    <select class="form-select wajib-step3" name="didik_ibu">
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
                    <select class="form-select wajib-step3" name="kerja_ibu" id="kerja_ibu">
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
                    <select class="form-select wajib-step3 " name="hasil_ibu" id="hasil_ibu">
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
                        class="form-control wajib-step3 hp-field"
                        id="no_hp_ibu"
                        name="telp_ibu"
                        placeholder="08xxxxxxxxxx"
                        inputmode="numeric">
                    <small class="text-danger d-none" id="err_no_hp_ibu">
                        Nomor HP harus angka, tanpa spasi, tanda strip (-), atau +62
                    </small>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary prev-btn" data-prev="2">Kembali</button>
                <button type="button" class="btn btn-primary next-btn" data-next="4" disabled>Lanjut</button>
            </div>
        </div>
        <!-- STEP 4 : PERIODIK -->

        <div class="card step d-none" id="step-4">
            <div class="card-header  text-info">Data Periodik</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="">Tinggi Badan</label>
                            <input type="text" class="form-control wajib-step4" name="tinggi">
                        </div>
                        <div class="mb-3">
                            <label for="">Berat Badan</label>
                            <input type="text" class="form-control wajib-step4" name="berat">
                        </div>
                        <div class="mb-3">
                            <label for="">Lingkar Kepala</label>
                            <input type="text" class="form-control wajib-step4" name="tinggi">
                        </div>
                        <div class="mb-3">
                            <label for="">Anak Ke</label>
                            <input type="text" class="form-control wajib-step4" name="anak_ke">
                        </div>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary prev-btn" data-prev="3">Kembali</button>
                <button type="button" class="btn btn-primary next-btn" data-next="5" disabled>Lanjut</button>
            </div>
        </div>
        <!-- STEP 4 : REGISTRASI -->

    </form>
</div>

<script src="<?= base_url() ?>/template/assets/vendor/libs/jquery/jquery.js"></script>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>




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


<!-- <script>
    document.addEventListener("DOMContentLoaded", function() {

        // Koordinat sekolah (WAJIB isi)
        const sekolah = {
            lat: -6.281806305398204,
            lng: 106.59501812509845



        };

        // Init map (posisi awal kira-kira sekolah)
        const map = L.map('map').setView([sekolah.lat, sekolah.lng], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap'
        }).addTo(map);

        let marker;

        // Rumus Haversine
        function hitungJarak(lat1, lon1, lat2, lon2) {
            const R = 6371;
            const dLat = (lat2 - lat1) * Math.PI / 180;
            const dLon = (lon2 - lon1) * Math.PI / 180;

            const a =
                Math.sin(dLat / 2) ** 2 +
                Math.cos(lat1 * Math.PI / 180) *
                Math.cos(lat2 * Math.PI / 180) *
                Math.sin(dLon / 2) ** 2;

            const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            return (R * c).toFixed(2);
        }

        // Klik peta → set marker + hitung
        map.on('click', function(e) {
            const lat = e.latlng.lat;
            const lng = e.latlng.lng;

            if (marker) {
                marker.setLatLng(e.latlng);
            } else {
                marker = L.marker(e.latlng).addTo(map);
            }

            document.getElementById("lat").value = lat.toFixed(6);
            document.getElementById("lng").value = lng.toFixed(6);

            const jarak = hitungJarak(
                sekolah.lat,
                sekolah.lng,
                lat,
                lng
            );

            document.getElementById("jarak").value = jarak + " km";

            // Trigger validasi step
            document.dispatchEvent(new Event("input"));
        });

    });
</script> -->

<script>
    document.addEventListener("DOMContentLoaded", function() {

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

            const jarak = hitungJarak(SEKOLAH.lat, SEKOLAH.lng, lat, lng);
            document.getElementById("jarak").value = jarak + " km";

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

    });
</script>



<!-- <script>
    document.addEventListener('change', function(e) {

        if (e.target.id === 'kerja_ibu') {

            const kerja = e.target.value;
            const hasilIbu = document.getElementById('hasil_ibu');

            if (!hasilIbu) {
                console.log('hasil_ibu tidak ditemukan');
                return;
            }

            hasilIbu.disabled = false;
            hasilIbu.value = '';

            if (kerja === 'Tidak Bekerja' || kerja === 'Sudah Meninggal') {
                hasilIbu.value = 'Tidak Berpenghasilan';
                hasilIbu.disabled = true;
            }
        }

    });
    document.addEventListener('change', function(e) {

        if (e.target.id === 'kerja_ayah') {

            const kerja = e.target.value;
            const hasilIbu = document.getElementById('hasil_ayah');

            if (!hasilIbu) {
                console.log('hasil_ayah tidak ditemukan');
                return;
            }

            hasilIbu.disabled = false;
            hasilIbu.value = '';

            if (kerja === 'Tidak Bekerja' || kerja === 'Sudah Meninggal') {
                hasilIbu.value = 'Tidak Berpenghasilan';
                hasilIbu.disabled = true;
            }
        }

    });
</script> -->






<?= $this->endSection() ?>