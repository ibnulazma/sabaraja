<?= $this->extend('template/template-guru') ?>
<?= $this->section('content') ?>




<?= $this->extend('template/template-guru') ?>
<?= $this->section('content') ?>

<div class="content-header">
    <div class="card">
        <div class="card-body">
            <button class="btn-primary btn btn-sm" data-bs-toggle="modal" data-bs-target="#keluarga"><i class='bx bx-user-plus'></i> Tambah Riwayat Pendidikan</button>


            <div class="table-responsive mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Sekolah</th>
                            <th>Tingkat</th>
                            <th>Tahun Lulus</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>







<div class="modal fade" id="keluarga" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <?= form_open('pendidik/tambahkeluarga') ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Riwayat Pendidikan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <label class="col-sm-4 col-form-label" for="tempattinggal">Nama Sekolah </label>
                    <div class="col-sm-8">
                        <select name="nama_anggota" id="" class="form-control">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-4 col-form-label" for="tempattinggal">Tingkat</label>
                    <div class="col-sm-8">
                        <select name="nama_anggota" id="" class="form-control">
                            <option value="">SD/MI</option>
                            <option value="">SMP/MTs</option>
                            <option value="">SMA/SMK/MA</option>
                            <option value="">S1</option>
                            <option value="">S2</option>
                            <option value="">S3</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-4 col-form-label" for="tempattinggal">Tahun Lulus </label>
                    <div class="col-sm-8">
                        <input type="text" name="" id="" class="form-control">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>



<?= $this->endSection() ?>








<?= $this->endSection() ?>