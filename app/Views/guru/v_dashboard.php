<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<style>
    .isian {
        width: 60px;
        font-size: small;
    }

    /* Wrapper scroll */
    .table-freeze {
        height: 60vh;
        margin: 2rem 0;
        overflow: auto;
        white-space: nowrap;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        padding: 0.6rem;
        border: 1px solid #ddd;
        font-size: 12px;
    }

    /* ===============================
       ❌ HEADER TIDAK FREEZE
       =============================== */
    thead th {
        background: #f4f4f4;
        font-weight: 600;
        position: static;
    }

    /* ===============================
       ✅ FREEZE NAMA SISWA SAJA
       =============================== */

    /* Header Nama Siswa */
    th.tp {
        position: sticky;
        left: 0;
        background: #fff;
        z-index: 4;
    }

    /* Kolom Nama Siswa (body) */
    tbody th {
        position: sticky;
        left: 0;
        background: #fff;
        z-index: 3;
        text-align: left;
        min-width: 180px;
    }

    /* Stripe biar rapi */
    tbody tr:nth-child(even) td {
        background-color: #f9f9f9;
    }

    tbody tr:nth-child(even) th {
        background-color: #fff;
    }

    /* Responsive */
    @media screen and (max-width: 680px) {
        .table-freeze {
            height: 70vh;
        }
    }

    @media screen and (max-width: 480px) {
        .table-freeze {
            height: 60vh;
        }
    }
</style>

<?php
$db     = \Config\Database::connect();


$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();

$id_kelas = $guru['id_kelas'];

$isFinal = in_array($guru['id_kelas'], $kelasFinal);




?>

<div class="row">
    <div class="col-lg-12 mb-3 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-8">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Selamat Datang <?= $guru['nama_guru'] ?></strong>! 🎉</h5>

                        <p class="mb-4">
                            Semester Aktif: <span class="fw-bold">Ganjil</span> Tahun Ajaran <?= $ta['ta'] ?>
                        </p>



                    </div>
                </div>
                <div class="col-sm-4 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">

                        <?php if ($guru['kelamin'] == 'L') { ?>
                            <img
                                src="<?= base_url() ?>/template/assets/img/illustrations/gurulaki.png"
                                height="140"
                                alt="View Badge User"
                                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        <?php  } else { ?>
                            <img
                                src="<?= base_url() ?>/template/assets/img/illustrations/gurucewek.png"
                                height="150"
                                alt="View Badge User"
                                data-app-dark-img="illustrations/girls.png"
                                data-app-light-img="illustrations/girls.png" />
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>



<div class="row g-6">
    <div class="col-xl-12">
        <div class="nav-align-top">
            <ul class="nav nav-pills mb-4" role="tablist">
                <?php if ($guru['walas'] == 1) : ?>
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab"
                            data-bs-toggle="tab"
                            data-bs-target="#navs-pills-top-home"
                            aria-controls="navs-pills-top-home"
                            aria-selected="true">Rombel</button>
                    </li>
                <?php endif; ?>

                <li class="nav-item">
                    <button type="button" class="nav-link <?= ($guru['walas'] == 0) ? 'active' : '' ?>" role="tab"
                        data-bs-toggle="tab"
                        data-bs-target="#navs-pills-top-nilai"
                        aria-controls="navs-pills-top-nilai"
                        aria-selected="<?= ($guru['walas'] == 0) ? 'true' : 'false' ?>">Nilai</button>
                </li>

                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab"
                        data-bs-toggle="tab"
                        data-bs-target="#navs-pills-top-messages"
                        aria-controls="navs-pills-top-messages"
                        aria-selected="false">Profile</button>
                </li>
            </ul>


            <div class="tab-content">
                <?php if ($guru['walas'] == 1) : ?>
                    <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
                        <div class="card">
                            <div class="card-datatable">
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
                <?php endif; ?>

                <div class="tab-pane fade <?= ($guru['walas'] == 0) ? 'show active' : '' ?>" id="navs-pills-top-nilai" role="tabpanel">


                    <?php if (empty($nilai)) : ?>

                    <?php else : ?>
                        <h5 class="text-center">Leger Nilai P3MP Kelas <?= esc($nilai[0]['kelas'] ?? '-') ?></h5>
                    <?php endif; ?>

                    <a href="<?= base_url('pendidik/printexcel/' . $guru['id_kelas']) ?>" class="btn btn-success btn-sm"><i class="bx bx-archive-arrow-down"></i> Download Template </a>
                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalUpload" <?= $isFinal ? 'disabled' : '' ?>><i class="bx bx-archive-arrow-up"></i> Upload </button>




                    <!-- =============TOMBOL KIRIM DATA NILAI KE ADMIN -->



                    <button
                        class=" btn btn-sm <?= $isFinal ? 'btn-secondary' : 'btn-warning' ?> btn-final"
                        data-idkelas="<?= $guru['id_kelas'] ?>"
                        <?= $isFinal ? 'disabled' : '' ?>> <i class="bx bx-paper-plane"></i>
                        <?= $isFinal ? 'Sudah Final' : 'Kirim Nilai' ?>
                    </button>


                    <!-- ==========AKHIR RUMUS TOMBOL KE ADMIN -->
                    <button class="btn btn-primary btn-sm"><i class="bx bx-printer"></i> Cetak </button>

                    <?php if (empty($nilai)) : ?>

                        <div class="bg-danger text-white mt-3 rounded-1 p-3 text-center">
                            <i class="bx bx-info-circle"></i><br>
                            <strong>Data nilai belum tersedia</strong><br>
                            Silakan download template lalu upload nilai.
                        </div>

                    <?php else : ?>


                        <div class="table-freeze">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="tp">Nama Siswa</th>
                                        <th>NISN</th>
                                        <th>PAI</th>
                                        <th>PKN</th>
                                        <th>B.IND</th>
                                        <th>MTK</th>
                                        <th>IPA</th>
                                        <th>IPS</th>
                                        <th>B.INGG</th>
                                        <th>SBK</th>
                                        <th>PJOK</th>
                                        <th>PRKY</th>
                                        <th>TIK</th>
                                        <th>MHD</th>
                                        <th>TJWD</th>
                                        <th>TRJM</th>
                                        <th>FQIH</th>
                                        <th>BTQ</th>
                                        <th>Sakit</th>
                                        <th>Izin</th>
                                        <th>Alfa</th>
                                        <th>Jumlah</th>
                                        <th>Rank</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($nilai as $key => $value) { ?>
                                        <tr>

                                            <th scope="row"><?= $value['nama_siswa'] ?></th>
                                            <td class="text-center">
                                                <?= $value['nisn'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $value['pai'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $value['pkn'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $value['indo'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $value['mtk'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $value['ipa'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $value['ips'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $value['inggris'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $value['sbk'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $value['pjok'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $value['prky'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $value['tik'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $value['mhd'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $value['tjwd'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $value['trjmh'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $value['fiqih'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $value['btq'] ?>
                                            </td>

                                            <?php
                                            $jumlah =

                                                $value['pai'] + $value['pkn'] + $value['indo'] + $value['mtk'] + $value['ipa'] + $value['ips']
                                                + $value['inggris'] + $value['sbk'] + $value['prky'] + $value['tik'] + $value['btq'] + $value['trjmh'] + $value['tjwd'] + $value['mhd'] + $value['fiqih'] + $value['pjok'];
                                            ?>




                                            <td class="text-center"><?= $value['sakit'] ?></td>
                                            <td class="text-center"><?= $value['izin'] ?></td>
                                            <td class="text-center"><?= $value['alfa'] ?></td>
                                            <td class="text-center jumlah"><?= $jumlah ?></td>
                                            <td class="text-center rank">-</td>


                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>

                            <script>
                                function hitungRank() {
                                    let rows = document.querySelectorAll("tbody tr");
                                    let data = [];

                                    rows.forEach((row, index) => {
                                        let jumlahCell = row.querySelector(".jumlah");
                                        if (!jumlahCell) return;

                                        let jumlah = parseInt(jumlahCell.innerText) || 0;

                                        data.push({
                                            index: index,
                                            jumlah: jumlah
                                        });
                                    });

                                    data.sort((a, b) => b.jumlah - a.jumlah);

                                    let rank = 1;
                                    let lastJumlah = null;

                                    data.forEach((item, i) => {
                                        if (lastJumlah !== null && item.jumlah < lastJumlah) {
                                            rank = i + 1;
                                        }

                                        rows[item.index].querySelector(".rank").innerText = rank;
                                        lastJumlah = item.jumlah;
                                    });
                                }

                                document.addEventListener("DOMContentLoaded", hitungRank);
                            </script>

                        </div>
                    <?php endif; ?>
                </div>




                <div class="tab-pane fade" id="navs-pills-top-messages" role="tabpanel">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label" for="basic-default-name">Nama Lengkap</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="basic-default-name" value="<?= $guru['nama_guru'] ?>" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-8">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="kelamin"
                                                id="jk_l"
                                                value="L"
                                                <?= ($guru['kelamin'] == 'L') ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="jk_l">Laki-laki</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="kelamin"
                                                id="jk_p"
                                                value="P"
                                                <?= ($guru['kelamin'] == 'P') ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="jk_p">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label" for="basic-default-email">Tempat Lahir</label>
                                    <div class="col-sm-8">
                                        <div class="input-group input-group-merge">
                                            <input type="date" class="form-control" value="<?= $guru['tmpt_lahir'] ?>" aria-label="john.doe" id="tgl_lahir" />

                                        </div>
                                        <div class="form-text">You can use letters, numbers & periods</div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label" for="basic-default-phone">Phone No</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="basic-default-phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-default-phone" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label" for="basic-default-message">Message</label>
                                    <div class="col-sm-8">
                                        <textarea id="basic-default-message" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?" aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label" for="basic-default-name">Nama Lengkap</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="basic-default-name" value="<?= $guru['nama_guru'] ?>" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-8">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="kelamin"
                                                id="jk_l"
                                                value="L"
                                                <?= ($guru['kelamin'] == 'L') ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="jk_l">Laki-laki</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="kelamin"
                                                id="jk_p"
                                                value="P"
                                                <?= ($guru['kelamin'] == 'P') ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="jk_p">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label" for="basic-default-email">Email</label>
                                    <div class="col-sm-8">
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="basic-default-email" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-default-email2" />
                                            <span class="input-group-text" id="basic-default-email2">@example.com</span>
                                        </div>
                                        <div class="form-text">You can use letters, numbers & periods</div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label" for="basic-default-phone">Phone No</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="basic-default-phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-default-phone" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label" for="basic-default-message">Message</label>
                                    <div class="col-sm-8">
                                        <textarea id="basic-default-message" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?" aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modalUpload" tabindex="-1">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Upload Nilai Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="formUpload" enctype="multipart/form-data">
                <div class="modal-body">


                    <div class="mb-3 mt-3">
                        <label class="form-label">File Excel</label>
                        <input type="file" name="fileimport" class="form-control" required>
                    </div>

                    <div class="progress" style="display:none;height:22px;">
                        <div id="progressBar"
                            class="progress-bar progress-bar-striped progress-bar-animated"
                            style="width:0%">
                            0%
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Upload</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>






<script>
    document.getElementById('formUpload').addEventListener('submit', function(e) {
        e.preventDefault();

        let form = this;
        let data = new FormData(form);

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "<?= base_url('pendidik/upload-nilai/' . $guru['id_kelas']) ?>", true);

        const progressBox = document.querySelector('.progress');
        const progressBar = document.getElementById('progressBar');

        progressBox.style.display = 'block';
        progressBar.style.width = '0%';
        progressBar.innerHTML = '0%';

        xhr.upload.onprogress = function(e) {
            if (e.lengthComputable) {
                let percent = Math.round((e.loaded / e.total) * 100);
                progressBar.style.width = percent + '%';
                progressBar.innerHTML = percent + '%';
            }
        };

        xhr.onload = function() {
            let res = JSON.parse(this.responseText);

            if (res.status) {
                bootstrap.Modal.getInstance(
                    document.getElementById('modalUpload')
                ).hide();

                Swal.fire({
                    title: 'Upload Selesai',
                    html: `Berhasil: <b>${res.sukses}</b><br>Gagal: <b>${res.gagal}</b>`,
                    icon: 'success'
                }).then(() => {
                    location.reload();
                });

            } else {
                Swal.fire('Gagal', res.message, 'error');
            }
        };

        xhr.send(data);
    });
</script>



<script>
    $(document).on('click', '.btn-final', function() {
        let btn = $(this);
        let idKelas = btn.data('idkelas');

        Swal.fire({
            title: 'Finalkan Nilai?',
            text: 'Nilai yang sudah final tidak dapat diubah.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Finalkan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (!result.isConfirmed) return;

            $.ajax({
                url: "<?= base_url('pendidik/finalkan-nilai') ?>",
                type: "POST",
                dataType: "json",
                data: {
                    id_kelas: idKelas,
                    <?= csrf_token() ?>: "<?= csrf_hash() ?>"
                },
                beforeSend: function() {
                    btn.prop('disabled', true).text('Memproses...');
                },
                success: function(res) {
                    if (res.status === 'success') {

                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Nilai berhasil difinalkan',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            location.reload(); // ⬅️ RELOAD PAGE
                        });

                    } else {
                        Swal.fire('Gagal', res.message, 'error');
                        btn.prop('disabled', false).text('Finalkan Nilai');
                    }
                },
                error: function() {
                    Swal.fire('Error', 'Terjadi kesalahan server', 'error');
                    btn.prop('disabled', false).text('Finalkan Nilai');
                }
            });
        });
    });
</script>









<?= $this->endSection() ?>