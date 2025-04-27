<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<?php

$db     = \Config\Database::connect();

$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();

?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Selamat Datang Admin! 🎉</h5>
                            <p class="mb-4">
                                Semester Aktif: <span class="fw-bold">Ganjil</span> Tahun Ajaran <?= $ta['ta'] ?>
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
                        <h5 class="card-header m-0 me-2 pb-3">Total Revenue</h5>
                        <!-- <div id="totalRevenueChart" class="px-2"></div> -->
                        <div id="chart">
                        </div>
                        <!-- <div><canvas id="myChart"></canvas></div> -->
                    </div>
                    <div class="col-md-4">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="dropdown">
                                    <button
                                        class="btn btn-sm btn-outline-primary dropdown-toggle"
                                        type="button"
                                        id="growthReportId"
                                        data-bs-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                        2022
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                                        <a class="dropdown-item" href="javascript:void(0);">2021</a>
                                        <a class="dropdown-item" href="javascript:void(0);">2020</a>
                                        <a class="dropdown-item" href="javascript:void(0);">2019</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div> <canvas height="20%" id="doughnut"></div>
                        <div class="text-center fw-semibold pt-3 mb-2">62% Company Growth</div>

                        <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                            <div class="d-flex">
                                <div class="me-2">
                                    <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
                                </div>
                                <div class="d-flex flex-column">
                                    <small>2022</small>
                                    <h6 class="mb-0">$32.5k</h6>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="me-2">
                                    <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                                </div>
                                <div class="d-flex flex-column">
                                    <small>2021</small>
                                    <h6 class="mb-0">$41.2k</h6>
                                </div>
                            </div>
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
                                    <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                                </div>

                            </div>
                            <span class="fw-semibold d-block mb-1">Transactions</span>
                            <h3 class="card-title mb-2">$14,857</h3>
                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <h5 class="card-header pb-0 text-md-start text-center">Complex Headers</h5>
        <div class="card-datatable table-responsive">
            <table class="datatables-basic table border-top" id="example">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Salary</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2</td>
                        <td>sss</td>
                        <td>aaa</td>
                        <td>ddd</td>
                        <td>dd</td>
                        <td>ff</td>
                        <td>gg</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>sss</td>
                        <td>aaa</td>
                        <td>ddd</td>
                        <td>dd</td>
                        <td>ff</td>
                        <td>gg</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>sss</td>
                        <td>aaa</td>
                        <td>ddd</td>
                        <td>dd</td>
                        <td>ff</td>
                        <td>gg</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>1111</td>
                        <td>iiii</td>
                        <td>ddd</td>
                        <td>dd</td>
                        <td>ff</td>
                        <td>gg</td>
                    </tr>





                    <tr>
                        <td>2</td>
                        <td>sss</td>
                        <td>aaa</td>
                        <td>ddd</td>
                        <td>dd</td>
                        <td>ff</td>
                        <td>gg</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


























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




<?= $this->endSection() ?>