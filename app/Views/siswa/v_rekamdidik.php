<?= $this->extend('template/template-edit') ?>
<?= $this->section('content') ?>



<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-light">
                <h5>Rekam Didik</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Kelas</td>
                                    <td>Nama Wali Kelas</td>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $no = 1;
                                foreach ($rekamdidik as $key => $data) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $data['kelas'] ?></td>
                                        <td><?= $data['nama_guru'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>















<?= $this->endSection() ?>