<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<?php if (session()->getFlashdata('pesan')) {
    echo '<div class="alert alert-danger" role="alert">';
    echo session()->getFlashdata('pesan');
    echo ' </div>';
} ?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <?= $subtitle ?>
        </h3>
        <button class="btn btn-danger btn-xs float-right mb-2" data-toggle="modal" data-target="#tambah"> <i class="fas fa-plus"></i> Tambah</button>
        <a href="" class="btn btn-success btn-xs float-right mb-2 mr-2"> <i class="fas fa-print"></i> Print</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered text-xs table-responsive" heigh="50px">
            <thead class="bg-primary">
                <tr>
                    <th rowspan="2">No</th>
                    <th width="50px" rowspan="2">Mata Pelajaran</th>
                    <th class="text-center" colspan="31">Pertemuan Ke-</th>
                    <th class="text-center" rowspan="2">Jumlah Hadir %</th>
                </tr>
                <tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                    <th>9</th>
                    <th>10</th>
                    <th>11</th>
                    <th>12</th>
                    <th>13</th>
                    <th>14</th>
                    <th>15</th>
                    <th>16</th>
                    <th>17</th>
                    <th>18</th>
                    <th>19</th>
                    <th>20</th>
                    <th>21</th>
                    <th>22</th>
                    <th>23</th>
                    <th>24</th>
                    <th>25</th>
                    <th>26</th>
                    <th>27</th>
                    <th>28</th>
                    <th>29</th>
                    <th>30</th>
                    <th>31</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($absen as $key => $value) { ?>
                    <tr>

                        <td> <?= $no++ ?></td>
                        <td> <?= $value['mapel'] ?></td>
                        <td class="tg-0lax">
                            <?php if ($value['p1'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p1'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p1'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p2'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p2'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p2'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p3'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p3'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p3'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p4'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p4'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p4'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p5'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p5'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p5'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p6'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p6'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p6'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p7'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p7'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p7'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p8'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p8'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p8'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p9'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p9'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p9'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p10'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p10'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p10'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p11'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p11'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p11'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p12'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p12'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p12'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p13'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p13'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p13'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p14'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p14'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p14'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p15'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p15'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p15'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p16'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p16'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p16'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p17'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p17'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p17'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p18'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p18'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p18'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p19'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p19'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p19'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p20'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p20'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p20'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p21'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p21'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p21'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p22'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p22'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p22'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p23'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p23'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p23'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p24'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p24'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p24'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p25'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p25'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p25'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p26'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p26'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p26'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p27'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p27'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p27'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p28'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p28'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p28'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p29'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p29'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p29'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p30'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p30'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p30'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>
                        <td class="tg-0lax">
                            <?php if ($value['p31'] == 0) {
                                echo     '<i class="fas fa-close text-danger"><i/>';
                            } elseif ($value['p31'] == 1) {
                                echo     '<i class="fas fa-info text-warning"><i/>';
                            } elseif ($value['p31'] == 2) {
                                echo     '<i class="fas fa-check text-success"><i/>';
                            }  ?>
                        </td>

                        <td class="text-center">

                            <?php
                            $absensi = round(
                                ($value['p1'] +
                                    $value['p2'] +
                                    $value['p3'] +
                                    $value['p4'] +
                                    $value['p5'] +
                                    $value['p6'] +
                                    $value['p7'] +
                                    $value['p8'] +
                                    $value['p9'] +
                                    $value['p10'] +
                                    $value['p11'] +
                                    $value['p12'] +
                                    $value['p13'] +
                                    $value['p14'] +
                                    $value['p15'] +
                                    $value['p16'] +
                                    $value['p17'] +
                                    $value['p18'] +
                                    $value['p19'] +
                                    $value['p20'] +
                                    $value['p21'] +
                                    $value['p22'] +
                                    $value['p23'] +
                                    $value['p24'] +
                                    $value['p25'] +
                                    $value['p26'] +
                                    $value['p27'] +
                                    $value['p28'] +
                                    $value['p29'] +
                                    $value['p30'] +
                                    $value['p31']) / 62 * 100
                            );

                            echo $absensi;

                            ?>


                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>




<!-- ModalTambahAbsen -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <table class="table table-bordered table-striped table-hover" id="example2">
                    <thead class="bg-primary text-center">
                        <tr>
                            <th>No</th>
                            <th>Kode Mapel</th>
                            <th>Mata Pelajaran</th>
                            <th>Guru Bid. Study</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
                        foreach ($ambilmapel as $key => $value) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['kode_mapel'] ?></td>
                                <td><?= $value['mapel'] ?></td>
                                <td><?= $value['nama_guru'] ?></td>
                                <td><?= $value['kelas'] ?></td>

                                <td>
                                    <a href="<?= base_url('siswa/AddAbsen/' . $value['id_jadwal']) ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




<?= $this->endSection() ?>