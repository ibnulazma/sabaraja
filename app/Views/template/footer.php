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



<script src="https://cdn.datatables.net/fixedcolumns/5.0.3/js/dataTables.fixedColumns.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/5.0.3/js/fixedColumns.dataTables.js"></script>













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

<script type="text/javascript">
    $(document).ready(function() {
        $('.date').mask('0000/00/00');
        $('.time').mask('00:00:00');
        $('.date_time').mask('00/00/0000 00:00:00');
        $('.datartrw').mask('000');
    });
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











<script>
    $(document).ready(function() {
        $("#prov").change(function() {
            var id_kabupaten = $("#prov").val();
            $.ajax({
                type: 'GET',
                url: '<?= base_url('Peserta/dataKabupaten') ?>/' + id_kabupaten,
                success: function(html) {
                    $("#kab").html(html);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $("#kab").change(function() {
            var id_kecamatan = $("#kab").val();
            $.ajax({
                type: 'GET',
                url: '<?= base_url('Peserta/dataKecamatan') ?>/' + id_kecamatan,
                success: function(html) {
                    $("#kec").html(html);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#kec").change(function() {
            var id_desa = $("#kec").val();
            $.ajax({
                type: 'GET',
                url: '<?= base_url('Peserta/dataDesa') ?>/' + id_desa,
                success: function(html) {
                    $("#kel").html(html);
                }
            });
        });
    });
</script>


</body>

</html>