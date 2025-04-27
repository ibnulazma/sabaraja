<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <?= $subtitle ?>
        </h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Mata Pelajaran</th>
                    <th>Guru</th>
                    <th>Kelas</th>
                    <th>Hari / Waktu</th>
                </tr>
            </thead>
            <tbody>

                <?php $no = 1;
                foreach ($jadwal as $key => $value) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['mapel'] ?></td>
                        <td><?= $value['kelas'] ?></td>


                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>








<?= $this->endSection() ?>