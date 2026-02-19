<?php



$db = \Config\Database::connect();

$level    = session()->get('level');
$username = session()->get('username');

// Default
$roleLabel = 'User';
$avatar    = base_url('foto/default.png');
$nama     = session()->get('nama'); // fallback nama dari session

// Mapping avatar berdasarkan gender
$avatarMap = [
    'admin' => 'foto/default.png',

];

switch ($level) {
    case 1: // Admin
        $roleLabel = 'Admin';
        $avatar    = base_url($avatarMap['admin']);
        // Nama tetap dari session
        break;


        $roleLabel = 'Siswa';
        $siswa = $db->table('tbl_siswa')->where('nisn', $username)->get()->getRowArray();

        if ($siswa) {
            $nama    = $siswa['nama_siswa'] ?? $nama; // ambil nama siswa jika ada
            $kelamin = strtoupper(trim($siswa['jenis_kelamin'] ?? ''));
            $avatar  = !empty($siswa['foto'])
                ? base_url('foto/' . $siswa['foto'])
                : base_url($avatarMap['siswa'][$kelamin] ?? 'foto/default.png');
        }
        break;
}










?>













<!DOCTYPE html>


<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url() ?>/tempalte/assets/"
    data-template="vertical-menu-template-free">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?= $title ?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>/template/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/vendor/fonts/boxicons.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Helpers -->
    <script src="<?= base_url() ?>/template/assets/vendor/js/helpers.js"></script>

    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/vendor/libs/apex-charts/apex-charts.css" />


    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="<?= base_url() ?>/template/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= base_url() ?>/template/assets/js/config.js"></script>

    <!-- DataTabel -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.bootstrap5.min.css" />
    <!-- SIAPPPP -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

</head>

<body>
    <!-- Layout wrapper -->
    <div class=" layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!--======= SIDEBAR -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <?php
                $db     = \Config\Database::connect();

                $user = $db->table('tbl_user')
                    ->where('id_user')
                    ->get()->getRowArray();
                ?>

                <div class="app-brand demo">
                    <a href="index.html" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="<?= base_url() ?>/foto/logo.png" alt="" width="30px">
                        </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">SIAKADINKA</span>
                    </a>

                    <a href="" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <?php $level = session()->get('level'); ?>

                <ul class="menu-inner py-1">

                    <!-- DASHBOARD SESUAI ROLE -->
                    <?php if ($level == '1'): ?>
                        <li class="menu-item <?= $menu == 'admin' ? 'active' : '' ?>">
                            <a href="<?= base_url('admin') ?>" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div>Dashboard</div>
                            </a>
                        </li>

                    <?php elseif ($level == '2'): ?>
                        <li class="menu-item <?= $menu == 'pendidik' ? 'active' : '' ?>">
                            <a href="<?= base_url('pendidik') ?>" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div>Dashboard</div>
                            </a>
                        </li>

                    <?php elseif ($level == '3'): ?>
                        <li class="menu-item <?= $menu == 'siswa' ? 'active' : '' ?>">
                            <a href="<?= base_url('siswa') ?>" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div>Dashboard</div>
                            </a>
                        </li>
                    <?php endif; ?>


                    <!-- ================= ADMIN MENU ================= -->
                    <?php if ($level == '1'): ?>
                        <li class="menu-header small text-uppercase"><span>Setting</span></li>

                        <li class="menu-item <?= $menu == 'ta' ? 'active' : '' ?>">
                            <a href="<?= base_url('admin/ta') ?>" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-calendar"></i>
                                <div>Tahun Pelajaran</div>
                            </a>
                        </li>

                        <li class="menu-item <?= $menu == 'setting' ? 'active' : '' ?>">
                            <a href="<?= base_url('admin/setting/profile') ?>" class="menu-link">
                                <i class="menu-icon tf-icons bx bxs-school"></i>
                                <div>Profil Sekolah</div>
                            </a>
                        </li>
                        <li class="menu-item <?= $menu == 'maintenance' ? 'maintenance' : '' ?>">
                            <a href="<?= base_url('admin/setting/resetuser') ?>" class="menu-link">
                                <i class='menu-icon tf-icons bx  bx-toggle-big-right'></i>
                                <div>Setting</div>
                            </a>
                        </li>

                        <li class="menu-header small text-uppercase"><span>Akademik</span></li>

                        <li class="menu-item <?= $menu == 'peserta' ? 'active' : '' ?>">
                            <a href="<?= base_url('admin/peserta') ?>" class="menu-link">
                                <i class="menu-icon tf-icons bx bxs-graduation"></i>
                                <div>Peserta Didik</div>
                            </a>
                        </li>

                        <li class="menu-item <?= $menu == 'guru' ? 'active' : '' ?>">
                            <a href="<?= base_url('admin/guru') ?>" class="menu-link">
                                <i class="menu-icon tf-icons bx bxs-user"></i>
                                <div>PTK</div>
                            </a>
                        </li>

                        <li class="menu-item <?= $menu == 'kelas' ? 'active' : '' ?>">
                            <a href="<?= base_url('admin/kelas') ?>" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-chalkboard"></i>
                                <div>Rombel</div>
                            </a>
                        </li>

                        <li class="menu-item <?= $menu == 'rekap' ? 'active' : '' ?>">
                            <a href="<?= base_url('rekap') ?>" class="menu-link">
                                <i class="bx bx-folder menu-icon tf-icons"></i>
                                <div>Pusat Unduhan</div>
                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </aside>
            <div class="layout-page">
                <nav
                    class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <span>Sistem Informasi Akademik V.3</span>
                            </div>
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->


                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="<?= $avatar ?>" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="<?= $avatar ?>" alt class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block"><?= esc($nama) ?></span>
                                                    <small class="text-muted"><?= $roleLabel ?></small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-cog me-2"></i>
                                            <span class="align-middle">Settings</span>
                                        </a>
                                    </li>

                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>





                <div class="content-wrapper">
                    <?= $this->renderSection('content') ?>
                </div>

                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            , made with ❤️ by
                            <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                        </div>
                        <div>
                            <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                            <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                            <a
                                href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                                target="_blank"
                                class="footer-link me-4">Documentation</a>

                            <a
                                href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                                target="_blank"
                                class="footer-link me-4">Support</a>
                        </div>
                    </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?= base_url() ?>/template/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?= base_url() ?>/template/assets/vendor/libs/popper/popper.js"></script>
    <script src="<?= base_url() ?>/template/assets/vendor/js/bootstrap.js"></script>
    <script src="<?= base_url() ?>/template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?= base_url() ?>/template/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?= base_url() ?>/template/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="<?= base_url() ?>/template/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="<?= base_url() ?>/template/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>


    <!-- DataTable -->
    <script src="https://cdn.datatables.net/2.3.7/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.7/js/dataTables.bootstrap5.min.js"></script>


























    <script>
        new DataTable('#example');
        new DataTable('#example1');
        new DataTable('#verifikasi');
        new DataTable('#guru');
        new DataTable('#kelas');
        new DataTable('#rinciankelas');
        new DataTable('#tblnilai');
        new DataTable('#akanlulus');
        new DataTable('#tambahanggota');
        new DataTable('#blmaktif');
        new DataTable('#tbluser');
        new DataTable('#tbluserguru');
        new DataTable('#tblresetsiswa');

        // new DataTable('#tblnilai', {

        //     fixedColumns: true,
        //     paging: false,
        //     scrollCollapse: true,
        //     searching: false,
        //     scrollX: true,
        //     scrollY: 300

        // });
    </script>





    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideDown(500, function() {
                $(this).remove();
            });
        }, 2000);
    </script>
















    <?php if (session()->get('password_default') == 1) : ?>
        <div class="modal fade" id="modalGantiPassword" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title">Ganti Password Wajib</h5>
                    </div>
                    <div class="modal-body">

                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                        <?php endif; ?>

                        <form id="formGantiPassword" action="<?= base_url('auth/update-password-pertama') ?>" method="post">
                            <?= csrf_field(); ?>

                            <div class="mb-3 position-relative">
                                <label>Password Baru</label>
                                <input type="password" name="password_baru" id="passwordBaru" class="form-control" required>
                                <div class="password-strength mt-2">
                                    <div id="strengthBar"></div>
                                </div>
                                <small id="strengthText" class="text-muted"></small>
                                <span class="toggle-password" onclick="togglePassword('passwordBaru', this)">👁️</span>
                            </div>

                            <div class="mb-3 position-relative">
                                <label>Ulangi Password</label>
                                <input type="password" name="konfirmasi_password" id="konfirmasiPassword" class="form-control" required>
                                <span class="toggle-password" onclick="togglePassword('konfirmasiPassword', this)">👁️</span>
                            </div>

                            <small class="text-muted">
                                Minimal 8 karakter, kombinasi huruf besar, huruf kecil, dan angka.
                            </small>

                            <button type="submit" class="btn btn-primary w-100 mt-3">Simpan Password Baru</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .toggle-password {
                position: absolute;
                top: 38px;
                right: 15px;
                cursor: pointer;
                user-select: none;
            }

            .password-strength {
                width: 100%;
                height: 6px;
                background: #eee;
                border-radius: 10px;
                overflow: hidden;
            }

            .password-strength {
                width: 100%;
                height: 6px;
                background: #eee;
                border-radius: 10px;
                overflow: hidden;
            }

            #strengthBar {
                height: 100%;
                width: 0%;
                transition: all 0.4s ease;
            }

            .strength-weak {
                background: #dc3545 !important;
                width: 33% !important;
            }

            .strength-medium {
                background: #ffc107 !important;
                width: 66% !important;
            }

            .strength-strong {
                background: #198754 !important;
                width: 100% !important;
            }
        </style>

        <script>
            function togglePassword(fieldId, el) {
                const input = document.getElementById(fieldId);
                if (input.type === "password") {
                    input.type = "text";
                    el.textContent = "🙈";
                } else {
                    input.type = "password";
                    el.textContent = "👁️";
                }
            }

            // Validasi sebelum submit (frontend)
            document.getElementById("formGantiPassword")?.addEventListener("submit", function(e) {
                const pass = document.getElementById("passwordBaru").value;
                const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;

                if (!regex.test(pass)) {
                    e.preventDefault();
                    alert("Password harus minimal 8 karakter dan mengandung huruf besar, huruf kecil, serta angka.");
                }
            });

            // Auto tampilkan modal
            document.addEventListener("DOMContentLoaded", function() {
                var myModal = new bootstrap.Modal(document.getElementById('modalGantiPassword'));
                myModal.show();
            });
        </script>



        <script>
            const passwordInput = document.getElementById("passwordBaru");
            const strengthBar = document.getElementById("strengthBar");
            const strengthText = document.getElementById("strengthText");

            if (passwordInput) {
                passwordInput.addEventListener("input", function() {
                    const val = passwordInput.value;
                    let strength = 0;

                    if (val.length >= 8) strength++;
                    if (/[A-Z]/.test(val)) strength++;
                    if (/[0-9]/.test(val)) strength++;
                    if (/[^A-Za-z0-9]/.test(val)) strength++;

                    strengthBar.classList.remove("strength-weak", "strength-medium", "strength-strong");

                    if (strength <= 1) {
                        strengthBar.classList.add("strength-weak");
                        strengthText.textContent = "Password lemah";
                        strengthText.style.color = "#dc3545";
                    } else if (strength <= 3) {
                        strengthBar.classList.add("strength-medium");
                        strengthText.textContent = "Password sedang";
                        strengthText.style.color = "#ffc107";
                    } else {
                        strengthBar.classList.add("strength-strong");
                        strengthText.textContent = "Password kuat";
                        strengthText.style.color = "#198754";
                    }
                });
            }
        </script>

    <?php endif; ?>


</body>

</html>