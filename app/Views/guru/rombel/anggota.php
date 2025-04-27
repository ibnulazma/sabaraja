<?= $this->extend('template/template-rombel') ?>
<?= $this->section('content') ?>





<div class="row">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="example">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Peserta Didik</th>
                        <th>Nama Ibu</th>
                        <th>Telp Ibu</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($walas as $key => $data) { ?>
                        <tr>
                            <td><i class="bx bxs-user"></i></td>
                            <td><?= $data['nama_siswa'] ?></td>
                            <td><?= $data['nama_ibu'] ?></td>
                            <td><a href="https://wa.me/<?= $data['telp_ibu'] ?>"><?= $data['telp_ibu'] ?></a></td>
                            <td><?= $data['alamat'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>









<?= $this->endSection() ?>