<?= $this->extend('template/template-guru') ?>
<?= $this->section('content') ?>

<?php



?>


<div class="swal" data-swal="<?= session()->getFlashdata('pesan'); ?>"></div>




<div class="content-header">
    <div class="card">
        <div class="card-body">
            <button class="btn-primary btn btn-sm" data-bs-toggle="modal" data-bs-target="#pendidikan"><i class='bx bx-user-plus'></i> Tambah Riwayat Pendidikan</button>
            <div class="table-responsive mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Sekolah</th>
                            <th>Jenjang</th>
                            <th>Tahun Lulus</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">


                        <?php

                        $no = 1;

                        foreach ($datapendidikan as $key => $row) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nama_sekolah'] ?></td>
                                <td><?= $row['jenjang'] ?></td>
                                <td><?= $row['tahun_lulus'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>









<div class="modal fade" id="pendidikan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <?= form_open('pendidik/tambahpendidikan') ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Riwayat Pendidikan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row mb-4">
                    <label class="col-sm-4 col-form-label" for="tempattinggal">Nama Sekolah </label>
                    <div class="col-sm-8">
                        <input type="text" name="nama_sekolah" class="form-control">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-4 col-form-label" for="tempattinggal">Tingkat</label>
                    <div class="col-sm-8">
                        <select name="jenjang" id="" class="form-control">
                            <option value="SD/MI">SD/MI</option>
                            <option value="SMP/MTs">SMP/MTs</option>
                            <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-4 col-form-label" for="tempattinggal">Tahun Lulus </label>
                    <div class="col-sm-8">
                        <input type="text" name="tahun_lulus" id="" class="form-control">
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

<script src="<?= base_url() ?>/template/assets/vendor/libs/jquery/jquery.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const swal = $('.swal').data('swal');
    if (swal) {
        Swal.fire({
            title: 'Sukses',
            text: swal,
            icon: 'success'
        })
    }
</script>








<?= $this->endSection() ?>