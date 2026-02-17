<?= $this->extend('template/template-rombel') ?>
<?= $this->section('content') ?>





<div class="row">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="example">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Peserta Didik</th>
                        <th>Nama Ibu</th>
                        <th>Telp Ibu</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rombel as $key => $data) { ?>
                        <tr>
                            <td><i class="bx bxs-user"></i></td>
                            <td><?= $data['nama_siswa'] ?></td>
                            <td><?= $data['nama_ibu'] ?></td>
                            <td><a href="https://wa.me/<?= nomorhp($data['telp_ibu']) ?>"><?= nomorhp($data['telp_ibu']) ?></a></td>
                            <td class="text-center">
                                <a href="https://www.google.com/maps/dir/?api=1&destination=<?= $data['latitude'] ?>,<?= $data['longitude'] ?>"
                                    target="_blank"
                                    class="btn btn-sm btn-success">
                                    <i class="bx bx-map"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="mapModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lokasi Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="map" style="height:400px;"></div>
                <div id="infoJarak" class="mt-2 text-muted"></div>
            </div>
        </div>
    </div>
</div>



<script src="<?= base_url() ?>/template/assets/vendor/libs/jquery/jquery.js"></script>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    let map, markerSiswa, markerGuru;

    function lihatLokasi(lat, lng, nama) {

        const modal = new bootstrap.Modal(document.getElementById('mapModal'));
        modal.show();

        setTimeout(() => {

            if (!map) {
                map = L.map('map').setView([lat, lng], 15);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '© OpenStreetMap'
                }).addTo(map);
            } else {
                map.setView([lat, lng], 15);
            }

            if (markerSiswa) map.removeLayer(markerSiswa);
            markerSiswa = L.marker([lat, lng])
                .addTo(map)
                .bindPopup('Lokasi ' + nama)
                .openPopup();

            // GPS guru
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(pos) {
                    const latGuru = pos.coords.latitude;
                    const lngGuru = pos.coords.longitude;

                    if (markerGuru) map.removeLayer(markerGuru);

                    markerGuru = L.marker([latGuru, lngGuru], {
                        icon: L.icon({
                            iconUrl: 'https://cdn-icons-png.flaticon.com/512/149/149071.png',
                            iconSize: [32, 32]
                        })
                    }).addTo(map).bindPopup('Posisi Anda');

                    const jarak = hitungJarak(latGuru, lngGuru, lat, lng);
                    document.getElementById('infoJarak').innerHTML =
                        'Jarak Anda ke siswa: <b>' + jarak + ' km</b>';
                });
            }

        }, 300);
    }

    // hitung jarak (km)
    function hitungJarak(lat1, lon1, lat2, lon2) {
        const R = 6371;
        const dLat = (lat2 - lat1) * Math.PI / 180;
        const dLon = (lon2 - lon1) * Math.PI / 180;

        const a =
            Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(lat1 * Math.PI / 180) *
            Math.cos(lat2 * Math.PI / 180) *
            Math.sin(dLon / 2) * Math.sin(dLon / 2);

        return (R * 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a))).toFixed(2);
    }
</script>




<?= $this->endSection() ?>