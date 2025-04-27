<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>



<div class="text-sm">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">
                Data <?= $subtitle ?>
            </h3>
            <div class="card-tools">

            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <select id="Jk" class="form-control mb-3 mt-3 ml-2 input-sm">
                    <option value="">Pilih JK</option>
                    <option value="L">L</option>
                    <option value="P">P</option>
                </select>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="tbl_peserta">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th class="text-center">JK</th>
                            <th class="text-center">Tingkat</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




<?= $this->endSection() ?>