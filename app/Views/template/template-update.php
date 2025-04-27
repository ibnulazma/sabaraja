<!DOCTYPE html>
<html lang="en">

<head>

    <?= $this->include('template/header') ?>

</head>

<style>
    .navigasi {
        display: flex;
        justify-content: space-around;
        padding: 20px 0;
    }

    .navigasi ul {
        display: flex;
        list-style: none;
        justify-content: space-between;
        align-items: center;
        width: 50%;
        color: grey;

    }

    .aktip {
        font-weight: 400;
        background-color: #3452eb;
        color: white;
        padding: 7px;
        border-radius: 10px;
    }

    .navigasi ul li {
        text-decoration: none;

    }

    @media screen and (max-width:576px) {
        .navigasi ul {
            /* position: absolute;
            right: 0;
            top: 0; */
            justify-content: space-evenly;
            flex-direction: column;
            align-items: center;
            margin-bottom: 5px;

        }


    }
</style>


<body class="hold-transition sidebar-mini layout-fixed text-sm">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <?= $this->include('template/nav') ?>
        </nav>
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <?= $this->include('template/sidebar') ?>
        </aside>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $subtitle ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active"><?= $subtitle ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <nav class="navigasi">
                                <ul class="">
                                    <li class=" mb-2 <?= $nav == 'alamat' ? 'aktip' : '' ?>">Alamat Domisili</li>
                                    <li class="mb-2 <?= $nav == 'orangtua' ? 'aktip' : '' ?>">Orang Tua</li>
                                    <li class="mb-2 <?= $nav == 'periodik' ? 'aktip' : '' ?>">Periodik</li>
                                    <li class="mb-2 <?= $nav == 'registrasi' ? 'aktip' : '' ?>">Registrasi</li>
                                </ul>
                            </nav>
                        </div>
                        <div class="card-body">
                            <?= $this->renderSection('content') ?>
                        </div>
                    </div>

                </div>
            </section>
        </div>
        <footer class="main-footer">
            <strong>Design by IbnulWafa</strong> @SIAKADINKA <?= date('Y') ?>
        </footer>
    </div>


    <script src="<?= base_url() ?>/AdminLTE/plugins/jquery/jquery.min.js"></script>

    <script src="<?= base_url() ?>/AdminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>

    <script src="<?= base_url() ?>/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


    <script src="<?= base_url() ?>/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <script src="<?= base_url() ?>/AdminLTE/dist/js/adminlte.js?v=3.2.0"></script>



    <script src="<?= base_url() ?>/AdminLTE/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->




    <script src="<?= base_url() ?>/AdminLTE/plugins/sweetalert2/sweetalert2.all.min.js"></script>


    <script>
        const swal = $('.swal').data('swal');
        if (swal) {
            Swal.fire({
                title: 'Data Berhasil',
                text: swal,
                icon: 'success'
            })
        }

        $(document).on('click', '.btn-hapus', function(e) {
            e.preventDefault();
            const href = $(this).attr('href');

            Swal.fire({
                title: 'Apakah anda yakin akan dihapus',
                text: "Data Akan Hilang",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                }
            })
        })
    </script>


    es -->


    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
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