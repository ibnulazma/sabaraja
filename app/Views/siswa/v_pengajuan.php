<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<?php

$db     = \Config\Database::connect();

$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();

?>

<div class="swal" data-swal="<?= session()->getFlashdata('pesan'); ?>"></div>




<div class="content-header">
    <div class="container-fluid mt-4">
        <?php if ($siswa['status_daftar'] == 1) { ?>
            <span class="btn btn-danger">Silahkan Update Biodata Terlebih Dahulu</span>
        <?php } elseif ($siswa['status_daftar'] == 3) { ?>
            <p>Untuk melakukan pengajuan pindah sekolah dari SMP Insan Kamil silahkan klik tombol berikut:</p>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Pengajuan Mutasi
            </button>

        <?php } ?>

    </div>

    <div class="container-fluid mt-4">
        <div class="col-md-5">
            <?php foreach ($mutasi as $value) { ?>
                <?php if ($value['status_mutasi'] == 1) { ?>
                    <div class="callout callout-danger">
                        <h5> Silahkan Hubungi Wali Kelas Untuk Persetujuan Permohonan Mutasi</h5>
                    </div>
                <?php } else if ($value['status_mutasi'] == 2) { ?>
                    <div class="callout callout-info">
                        <h5> Surat Mutasi Dalam Proses TTD Kepala Sekolah</h5>
                    </div>
                <?php } else if ($value['status_mutasi'] == 3) { ?>
                    <div class="callout callout-success">
                        <h5> Surat Sudah Bisa Diambil Di TU</h5>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?= form_open('siswa/mutasi/' . $siswa['id_siswa']) ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pengajuan Mutasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p> Adapun syarat untuk mutasi/pindah dari SMP INSAN KAMIL sebagai berikut:</p>
                <ul>
                    <li>Melunasi tunggakan</li>
                    <li>Surat Keterangan Diterima Dari Sekolah Yang Di Tuju</li>
                    <li>Cetak surat permohonan melalui Wali kelas masing masing</li>
                    <li>Klik tombol submit untuk melakukan pengajuan mutasi</li>
                </ul>
                <div class="form-group">
                    <label for="">Alasan Pindah</label>
                    <select name="alasan" id="" class="form-control">
                        <option value="Keinginan Orang Tua">Keinginan Orang Tua</option>
                        <option value="Pindah Rumah">Pindah Rumah</option>
                        <option value="Sambil Pondok">Sambil Pondok</option>
                    </select>
                </div>
                <input type="hidden" name="id_ta" id="" value="<?= $ta['id_ta'] ?>">
                <div class="form-group">
                    <label for="">Pindah Ke Sekolah</label>
                    <input type="text" name="sekolah" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>

<?= $this->endSection() ?>