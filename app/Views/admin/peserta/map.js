<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
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
