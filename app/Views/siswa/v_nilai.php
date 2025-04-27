<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>



<?php
$db     = \Config\Database::connect();


$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();

?>

<div class="content-header">
    <div class="container-fluid mt-4">
        <?php if ($siswa['status_daftar'] == 1) { ?>
            <a href="<?= base_url('siswa/edit_alamat/' . $siswa['id_siswa']) ?>" class="btn btn-danger">Silahkan update data terlebih dahulu</a>
        <?php } elseif ($siswa['status_daftar'] == 2) { ?>
            <span class="badge badge-warning">Verifikasi</span>
        <?php } elseif ($siswa['status_daftar'] == 3) { ?>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">

                        <div class="text-center">
                            <h5>Nilai P3MP</h5>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tahun Pelajaran</th>
                                    <th>PAI</th>
                                    <th>PKN</th>
                                    <th>B.Indo</th>
                                    <th>MTK</th>
                                    <th>IPA</th>
                                    <th>IPS</th>
                                    <th>B.Inggris</th>
                                    <th>SBK</th>
                                    <th>PJOK</th>
                                    <th>PRKY</th>
                                    <th>TIK</th>
                                    <th>MHD</th>
                                    <th>FIQIH</th>
                                    <th>TJWD</th>
                                    <th>TRJMH</th>
                                    <th>BTQ</th>
                                </tr>
                            <tbody>
                                <?php foreach ($nilai as $key => $data) { ?>

                                    <tr>
                                        <td class="text-center"><?= $data['ta'] ?>/<?= $data['semester'] ?></td>
                                        <td><?= $data['pai'] ?></td>
                                        <td><?= $data['pkn'] ?></td>
                                        <td><?= $data['indo'] ?></td>
                                        <td><?= $data['mtk'] ?></td>
                                        <td><?= $data['ipa'] ?></td>
                                        <td><?= $data['ips'] ?></td>
                                        <td><?= $data['inggris'] ?></td>
                                        <td><?= $data['sbk'] ?></td>
                                        <td><?= $data['pjok'] ?></td>
                                        <td><?= $data['prky'] ?></td>
                                        <td><?= $data['tik'] ?></td>
                                        <td><?= $data['mhd'] ?></td>
                                        <td><?= $data['fiqih'] ?></td>
                                        <td><?= $data['tjwd'] ?></td>
                                        <td><?= $data['trjmh'] ?></td>
                                        <td><?= $data['btq'] ?></td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                            </thead>


                        </table>

                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>



<?= $this->endSection() ?>