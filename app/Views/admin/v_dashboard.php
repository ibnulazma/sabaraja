<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<?php

$db     = \Config\Database::connect();

$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();

?>



<style>
    .table-wrapper {
        max-height: 200px;
        /* tinggi area scroll */
        overflow-y: auto;
    }

    .table thead th {
        position: sticky;
        top: 0;
        background: #fff;
        /* wajib supaya header tidak transparan */
        z-index: 10;
    }
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Selamat Datang Admin! 🎉</h5>
                            <p class="mb-4">
                                Semester Aktif: <span class="fw-bold"><?= $ta['semester']  ?></span> Tahun Ajaran <?= $ta['ta'] ?>
                            </p>
                            <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
                        </div>
                    </div>






                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img
                                src="<?= base_url() ?>/template/assets/img/illustrations/man-with-laptop-light.png"
                                height="140"
                                alt="View Badge User"
                                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 order-1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i class="bx bxs-graduation bx-lg text-danger"></i>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Peserta Didik</span>
                            <h3 class="card-title mb-2"><?= $jumlahaktif ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i class="bx bxs-user bx-lg text-success"></i>
                                </div>
                            </div>
                            <span>PTK</span>
                            <h3 class="card-title text-nowrap mb-1"><?= $jumlahptk ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Revenue -->
        <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
            <div class="card">
                <div class="row row-bordered g-0">
                    <div class="col-md-8">
                        <div class=" mt-3 p-2">
                            <i class='bx bx-sm bx-community'></i> <span style="font-size:18px; font-weight:bold;">Jumlah Peserta Didik Per Rombel</span>
                        </div>
                        <div class="card-body">
                            <div class="table-wrapper">
                                <table class="table table-striped" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Rombel</th>
                                            <th>L</th>
                                            <th>P</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php if (empty($rekapkelas)): ?>
                                            <tr>
                                                <td colspan="5" class="text-center text-muted">
                                                    <em>Belum ada data</em>
                                                </td>
                                            </tr>
                                        <?php else: ?>
                                            <?php
                                            $no = 1;

                                            foreach ($rekapkelas as $r): ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $r['kelas'] ?></td>
                                                    <td><?= $r['jumlah_laki'] ?></td>
                                                    <td><?= $r['jumlah_perempuan'] ?></td>
                                                    <td><strong><?= $r['total_siswa'] ?></strong></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                    <tfoot>
                                        <?php if (!empty($rekapkelas)): ?>
                                            <tr class="bg-light font-weight-bold">
                                                <td class="text-center" colspan="2">TOTAL</td>
                                                <td><?= $total_laki ?></td>
                                                <td><?= $total_perempuan ?></td>
                                                <td><?= $total_siswa ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Total Revenue -->
        <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
            <div class="row">
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i class="menu-icon tf-icons bx bx-chalkboard bx-lg text-info"></i>
                                </div>
                            </div>
                            <span class="d-block mb-1">Rombel</span>
                            <h3 class="card-title text-nowrap mb-2"><?= $jumlahkelas ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i class="bxr bx-biceps bx-lg text-info"></i>
                                </div>

                            </div>
                            <span class="d-block mb-1">Eskul</span>
                            <h3 class="card-title text-nowrap mb-2">7</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





</div>
























<script src="<?= base_url() ?>/template/assets/vendor/libs/jquery/jquery.js"></script>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Aktif', ' Belum Aktif'],
            datasets: [{
                label: 'Keaktifan Siswa Tahun Ajaran <?= $ta['ta'] ?>',
                data: [<?= json_encode($jumlahaktif) ?>, <?= json_encode($jumlahtidakaktif) ?>],
                backgroundColor: [
                    'rgb(13, 110, 253)',
                    'rgb(13, 202, 240)',

                ],
                barPercentage: 0.5,
                barThickness: 8,
                maxBarThickness: 8,
                minBarLength: 3,
                borderRadius: 10,


            }]
        },

    });
</script>
<script>
    const data = document.getElementById('doughnut');

    new Chart(data, {
        type: 'doughnut',
        data: {
            labels: ['Aktif', ' Belum Aktif'],
            datasets: [{
                label: '',
                data: [<?= json_encode($jumlahaktif) ?>, <?= json_encode($jumlahtidakaktif) ?>],
                backgroundColor: [
                    'rgb(54, 162, 235)',
                    'rgb(255, 99, 132)',

                ],
                hoverOffset: 2,


            }]
        },
        options: {
            aspectRatio: 2
        }

    });
</script>

<script>
    var options = {
        series: [{
            data: [<?= json_encode($jumlahaktif) ?>, <?= json_encode($jumlahtidakaktif) ?>]
        }],
        chart: {
            type: 'bar',
            height: 380
        },
        plotOptions: {
            bar: {
                barHeight: '20%',
                distributed: true,
                horizontal: true,
                borderRadius: 10,
                dataLabels: {
                    position: 'bottom'
                },
            }
        },
        colors: ['#0d6efd', '#0dcaf0'],
        dataLabels: {
            enabled: true,
            textAnchor: 'start',
            style: {
                colors: ['#fff']
            },
            formatter: function(val, opt) {
                return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
            },
            offsetX: 0,
            dropShadow: {
                enabled: true
            }
        },
        stroke: {
            width: 1,
            colors: ['#fff']
        },
        xaxis: {
            categories: ['Aktif', 'Belum Aktif', ],
        },
        yaxis: {
            labels: {
                show: false
            }
        },
        title: {
            text: 'Keaktifan Peserta Didik',
            align: 'center',
            floating: true
        },
        tooltip: {
            theme: 'dark',
            x: {
                show: false
            },
            y: {
                title: {
                    formatter: function() {
                        return ''
                    }
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>

<script>
    $(document).ready(function() {
        $("#provinsi").change(function() {
            var id_kabupaten = $("#provinsi").val();
            $.ajax({
                type: 'GET',
                url: '<?= base_url('Admin/dataKabupaten') ?>/' + id_kabupaten,
                success: function(html) {
                    $("#kabupaten").html(html);
                }
            });
        });
    });
</script>




<?= $this->endSection() ?>