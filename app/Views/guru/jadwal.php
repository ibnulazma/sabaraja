<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Kode Mapel</th>
                    <th>Mata Pelajaran</th>
                    <th>Hari/Waktu</th>
                    <th>Kelas</th>
                </tr>
            </thead>
            <tbody>

                <?php $no = 1;
                foreach ($jadwal as $key => $value) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['kode_mapel'] ?></td>
                        <td><?= $value['mapel'] ?></td>
                        <td><?= $value['hari'] ?>, <?= $value['waktu'] ?></td>
                        <td><?= $value['kelas'] ?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>































<?= $this->endSection() ?>