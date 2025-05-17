<!DOCTYPE html>


<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url() ?>/tempalte/assets/"
    data-template="vertical-menu-template-free">

<head>

    <?= $this->include('template/header') ?>
</head>


<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <?= $this->include('template/sidebar') ?>
            </aside>
            <div class="layout-page">
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <?= $this->include('template/nav') ?>
                </nav>

                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="nav-align-top">
                                <ul class="nav nav-pills flex-column flex-md-row mb-4">
                                    <li class="nav-item"><a class="nav-link <?= $submenu == 'profile' ? 'active' : '' ?>" href="<?= base_url('pendidik/profile') ?>"><i class='bx bxs-user'></i> </i> Biodata</a></li>
                                    <li class="nav-item"><a class="nav-link <?= $submenu == 'pendidikan' ? 'active' : '' ?>" href="<?= base_url('pendidik/pendidikan') ?>"><i class='bx bx-user-circle'></i> Pendidikan </a></li>
                                    <li class="nav-item"><a class="nav-link <?= $submenu == 'keluarga' ? 'active' : '' ?>" href="<?= base_url('siswa/orangtua') ?>"><i class='bx bx-user-circle'></i> Data Keluarga </a></li>
                                    <li class=" nav-item"><a class="nav-link <?= $submenu == 'dataperiodik' ? 'active' : '' ?>" href="<?= base_url('siswa/dataperiodik') ?>"><i class='bx bx-line-chart'></i> Anggota kelas</a></li>

                                </ul>
                            </div>
                        </div>

                        <?= $this->renderSection('content') ?>

                    </div>
                </div>
                <footer class=" content-footer footer bg-footer-theme">
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
            </div>




        </div>

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
    <!-- <script src="<?= base_url() ?>/template/assets/js/tables-datatables-basic.js"></script>
<script src="<?= base_url() ?>/template/assets/js/tables-datatables-advanced.js"></script> -->

    <!-- Page JS -->
    <script src="<?= base_url() ?>/template/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>



    <script>
        new DataTable('#example');
        new DataTable('#example1');
        new DataTable('#verifikasi');
        new DataTable('#lulus');
        new DataTable('#lulus2');
        new DataTable('#guru');
        new DataTable('#kelas');
        new DataTable('#rinciankelas');
    </script>




    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideDown(500, function() {
                $(this).remove();
            });
        }, 2000);
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.date').mask('0000/00/00');
            $('.time').mask('00:00:00');
            $('.date_time').mask('00/00/0000 00:00:00');
        });
    </script>

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
            $('[data-mask]').inputmask()
        })
    </script>

    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideDown(500, function() {
                $(this).remove();
            });
        }, 2000);
    </script>
    <script>
        $(document).ready(function() {
            $("#provinsi").change(function() {
                var id_kabupaten = $("#provinsi").val();
                $.ajax({
                    type: 'GET',
                    url: '<?= base_url('Siswa/dataKabupaten') ?>/' + id_kabupaten,
                    success: function(html) {
                        $("#kabupaten").html(html);
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#kabupaten").change(function() {
                var id_kecamatan = $("#kabupaten").val();
                $.ajax({
                    type: 'GET',
                    url: '<?= base_url('Siswa/dataKecamatan') ?>/' + id_kecamatan,
                    success: function(html) {
                        $("#kecamatan").html(html);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#kecamatan").change(function() {
                var id_desa = $("#kecamatan").val();
                $.ajax({
                    type: 'GET',
                    url: '<?= base_url('Siswa/dataDesa') ?>/' + id_desa,
                    success: function(html) {
                        $("#desa").html(html);
                    }
                });
            });
        });
    </script>

</body>

</html>