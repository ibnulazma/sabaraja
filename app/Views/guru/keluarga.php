<?= $this->extend('template/template-guru') ?>
<?= $this->section('content') ?>




<div class="swal" data-swal="<?= session()->getFlashdata('pesan'); ?>"></div>








<div class="content-header">
    <div class="card">
        <div class="card-body">
            <button class="btn-primary btn btn-sm" data-bs-toggle="modal" data-bs-target="#keluarga"><i class='bx bx-user-plus'></i> Tambah Riwayat Pendidikan</button>


            <div class="table-responsive mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Anggota Keluarga</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">


                        <?php

                        $no = 1;

                        foreach ($datakeluarga as $key => $data) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['nama_anggota'] ?></td>
                                <td><?= $data['status_keluarga'] ?></td>
                            </tr>
                        <?php } ?>
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
                <input type="hidden" value="<?= $data['id_guru'] ?>" name="id_guru">
                <div class="row mb-4">
                    <label class="col-sm-4 col-form-label" for="tempattinggal">Nama Anggota</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama_anggota" class="form-control">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-4 col-form-label" for="">Status Keluarga</label>
                    <div class="col-sm-8">
                        <select name="status_keluarga" id="" class="form-control">
                            <option value="Suami/Istri">Suami/Istri</option>
                            <option value="Anak Kandung">Anak Kandung</option>
                        </select>
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