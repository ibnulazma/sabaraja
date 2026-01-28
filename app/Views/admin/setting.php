<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<!-- Main content -->

<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        display: none;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        inset: 0;
        background-color: #28a745;
        transition: .4s;
        border-radius: 34px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }

    input:checked+.slider {
        background-color: #dc3545;
    }

    input:checked+.slider:before {
        transform: translateX(26px);
    }
</style>








<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">

        <div class="card-body">
            <?php $maintenance = (new \App\Models\ModelMaintenance())->getMaintenance(); ?>
            <div class="card-body text-center">
                <h5 class="mb-3">Status Website</h5>

                <label class="switch">
                    <input type="checkbox" id="maintenanceSwitch"
                        <?= ($maintenance['value'] == '1') ? 'checked' : '' ?>>
                    <span class="slider round"></span>
                </label>

                <p class="mt-3 fw-bold">
                    <?= ($maintenance['value'] == '1')
                        ? '<span class="text-danger">MAINTENANCE AKTIF</span>'
                        : '<span class="text-success">WEBSITE NORMAL</span>' ?>
                </p>
            </div>
            <div class="card">

            </div>


            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>


        </div>
    </div>



    <div class="nav-align-top nav-tabs-shadow mt-4">
        <ul class="nav nav-tabs nav-fill" role="tablist">
            <li class="nav-item">
                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true">
                    <span class="d-none d-sm-inline-flex align-items-center">
                        User
                        <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1_5">3</span>
                    </span>
                    <i class="icon-base bx bx-home icon-sm d-sm-none"></i>
                </button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile" aria-selected="false">
                    <span class="d-none d-sm-inline-flex align-items-center">Guru</span>
                    <i class="icon-base bx bx-user icon-sm d-sm-none"></i>
                </button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-siswa" aria-controls="navs-justified-messages" aria-selected="false">
                    <span class="d-none d-sm-inline-flex align-items-center">Siswa</span>
                    <i class="icon-base bx bx-message-square icon-sm d-sm-none"></i>
                </button>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
                <p>Icing pastry pudding oat cake. Lemon drops cotton candy caramels cake caramels sesame snaps powder. Bear claw candy topping.</p>
                <p class="mb-0">Tootsie roll fruitcake cookie. Dessert topping pie. Jujubes wafer carrot cake jelly. Bonbon jelly-o jelly-o ice cream jelly beans candy canes cake bonbon. Cookie jelly beans marshmallow jujubes sweet.</p>
            </div>
            <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
                <div class="mt-4">

                    <table class="table table-bordered isi" id="example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($guru as $data) { ?>
                                <tr>
                                    <td>#</td>
                                    <td><?= $data['nama_guru'] ?></td>
                                    <td><?= $data['niy'] ?></td>
                                    <td>
                                        <a href="" class="btn btn-danger btn-sm">🔐 Reset Password</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="mt4">
                        <?= csrf_field(); ?>
                        <button type="button" id="btnResetGuru" class="btn btn-primary mt-2">
                            🔐 Reset Password Guru
                        </button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="navs-justified-siswa" role="tabpanel">

                <div class="mt-4 mb-4">
                    <div id="progressContainer" class="progress mt-3 d-none" style="height:25px;">
                        <div id="progress-siswa"
                            class="progress-bar progress-bar-striped progress-bar-animated"
                            style="width:0%">0%
                        </div>
                    </div>
                </div>
                <table class="table table-bordered isi" id="example">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>NISN</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($siswa as $data) { ?>
                            <tr>
                                <td>#</td>
                                <td><?= $data['nama_siswa'] ?></td>
                                <td><?= $data['nisn'] ?></td>
                                <td>
                                    <a href="" class="btn btn-danger btn-sm">🔐 Reset Password</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="mt-4">

                    <?= csrf_field(); ?>

                    <button type="button" id="btnResetSiswa" class="btn btn-danger mt-2">
                        🔐 Reset Password Siswa
                    </button>
                </div>

            </div>

        </div>
    </div>
</div>




<!-- ModalTambah -->




<!-- ModalHapus -->


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggle = document.getElementById("maintenanceSwitch");

        if (toggle) {
            toggle.addEventListener("change", function() {
                fetch("<?= base_url('admin/toggle-maintenance') ?>")
                    .then(response => response.text())
                    .then(() => {
                        location.reload(); // reload biar status teks ikut berubah
                    });
            });
        }
    });
</script>




<script>
    function resetBatch(url, title) {
        let offset = 0;
        let csrfInput = document.querySelector('input[name="<?= csrf_token() ?>"]');

        Swal.fire({
            title: 'Yakin?',
            text: title,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, lanjut!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (!result.isConfirmed) return;

            Swal.fire({
                title: 'Memproses...',
                html: `
                <div style="width:100%;background:#eee;border-radius:10px;">
                    <div id="swal-progress" style="width:0%;height:22px;background:#9628A7;color:#fff;text-align:center;">0%</div>
                </div>
                <div id="swal-text" style="margin-top:8px;">Memulai...</div>
            `,
                allowOutsideClick: false,
                showConfirmButton: false
            });

            function proses() {
                fetch(url, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded",
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: "offset=" + offset + "&" + csrfInput.name + "=" + csrfInput.value
                    })
                    .then(res => res.json())
                    .then(data => {

                        if (data.status !== 'ok') {
                            Swal.fire('Error', 'Gagal memproses data', 'error');
                            return;
                        }

                        offset = data.next;
                        csrfInput.value = data.csrf;

                        let percent = Math.min((offset / data.total) * 100, 100);
                        document.getElementById('swal-progress').style.width = percent + "%";
                        document.getElementById('swal-progress').innerText = Math.floor(percent) + "%";
                        document.getElementById('swal-text').innerText =
                            `Memproses ${Math.min(offset, data.total)} dari ${data.total} data`;

                        if (offset < data.total) {
                            setTimeout(proses, 200);
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Selesai!',
                                text: 'Semua password berhasil direset 🎉',
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => location.reload());
                        }
                    });
            }

            proses();
        });
    }

    document.getElementById('btnResetSiswa').addEventListener('click', function() {
        resetBatch("<?= base_url('admin/reset-password-siswa') ?>", "Reset semua password siswa?");
    });

    document.getElementById('btnResetGuru').addEventListener('click', function() {
        resetBatch("<?= base_url('admin/reset-password-guru') ?>", "Reset semua password guru?");
    });
</script>





<script>
    document.getElementById('formResetGuru').addEventListener('submit', function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Yakin mau reset semua password guru?',
            text: "Password akan dikembalikan ke default!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Reset!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (!result.isConfirmed) return;

            let offset = 0;
            let total = 0;

            Swal.fire({
                title: 'Proses Reset Password',
                html: `
                <div style="width:100%; background:#eee; border-radius:8px; overflow:hidden;">
                    <div id="progressBar" style="width:0%; height:20px; background:#dc3545;"></div>
                </div>
                <div id="progressText" style="margin-top:10px;">Memulai proses...</div>
            `,
                allowOutsideClick: false,
                showConfirmButton: false
            });

            function prosesBatch() {
                fetch("<?= base_url('admin/reset-password-guru') ?>", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded",
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: "offset=" + offset + "&<?= csrf_token() ?>=<?= csrf_hash() ?>"
                    })
                    .then(res => res.json())
                    .then(data => {

                        if (data.status !== 'ok') {
                            Swal.fire('Error', 'Gagal memproses data', 'error');
                            return;
                        }

                        total = data.total;
                        offset = data.next;

                        let percent = Math.min((offset / total) * 100, 100);

                        document.getElementById('progressBar').style.width = percent + '%';
                        document.getElementById('progressText').innerText =
                            `Memproses ${Math.min(offset, total)} dari ${total} siswa`;

                        if (offset < total) {
                            setTimeout(prosesBatch, 300);
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Selesai!',
                                text: 'Semua password  berhasil direset 🎉'
                            }).then(() => location.reload());
                        }
                    });
            }

            prosesBatch();
        });
    });
</script>



<?= $this->endSection() ?>