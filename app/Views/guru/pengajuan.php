<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<div class="content-header">
    <div class="container-fluid mt-4">

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peserta Didik</th>
                            <th>NISN</th>
                            <th>Kelas</th>
                            <th>Alasan</th>
                            <th>Proses</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pengajuan as $key => $row) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $row['nama_siswa'] ?></td>
                                <td><?= $row['nisn'] ?></td>
                                <td><?= $row['kelas'] ?></td>
                                <td><?= $row['alasan'] ?></td>
                                <td>
                                    <a href="<?= base_url('pendidik/konfirmasi/' . $row['id_mutasi']) ?>" class="btn btn-success btn-sm"> <i class="fas fa-check-circle"></i> Konfirmasi</a>
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