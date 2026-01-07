<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<!-- Main content -->


<?php
$db     = \Config\Database::connect();

$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();

?>











<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4  ">
        <div class="card-header ">
            <div class="judul d-flex justify-content-between">
                <h5 class="card-title"><?= $subtitle ?></h5>
                <div class="tombol">
                    <button class="btn btn-primary btn-sm" data-bs-target="#tambah" data-bs-toggle="modal">Tambah Peserta Didik</button>
                    <button class="btn btn-warning btn-sm" data-bs-target="#upload" data-bs-toggle="modal">Import Nilai</button>
                </div>

            </div>
            <p class="text-muted mb-4">Tahun Pelajaran <b>Aktif</b> <?= $ta['ta'] ?> Semester <b> <?= $ta['semester'] ?></b></p>

        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <div class="col-lg-7">
                <h3>Data Siswa Kelas <?= $kelas['kelas'] ?></h3>
                <h5>Wali Kelas : <b><?= $kelas['nama_guru'] ?></h5>
                <h5>Jumlah Siswa : <?= $jml_siswa ?></h5>
                <p class="text-muted">Tahun Pelajaran <b>Aktif</b> <?= $ta['ta'] ?> Semester <b> <?= $ta['semester'] ?></b></p>
            </div>
            <div class="mb-3 mt-3">
                <label for="">Aksi</label>
                <select name="ap" class="form-control" id="">
                    <option>Silahkan Pilih Menu Unduh</option>
                </select>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered mt-5" id="rinciankelas" width="100%">
                <thead>
                    <tr>
                        <th class="text-center" width="10%">#</th>
                        <th class="text-center" width="20%">NISN</th>
                        <th>Nama Peserta Didik</th>
                        <th width="20%">JK</th>
                        <th width="20%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($datasiswa as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $value['nisn'] ?></td>
                            <td><?= $value['nama_siswa'] ?></td>
                            <td><?= $value['jenis_kelamin'] ?></td>
                            <td>
                                <div class="text-center">
                                    <a href="<?= base_url('kelas/bukuinduk/' .  $value['nisn']) ?>" target="_blank" class="btn btn-sm btn-info "><i class="bx bx-book"></i></a>
                                    <a href="<?= base_url('kelas/halamansiswa/' .  $value['nisn']) ?>" target="_blank" class="btn btn-sm btn-success "><i class="bx bxs-file"></i> </a>
                                    <a href="<?= base_url('kelas/biodatasiswa/' .  $value['nisn']) ?>" target="_blank" class="btn btn-sm btn-secondary "><i class="bx bx-id-card"></i> </a>
                                    <a href="<?= base_url('kelas/labelsiswa/' .  $value['nisn']) ?>" target="_blank" class="btn btn-sm btn-dark"><i class="bx bx-purchase-tag-alt"></i> </a>
                                    <a href="<?= base_url('kelas/hapusanggota/' . $value['id_database'] . '/' . $value['id_kelas']) ?>" class="btn btn-danger btn-sm"><i class="bx bxs-trash-alt"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<!-- ModalTambah -->

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('kelas/tambahanggota/' . $kelas['id_kelas']) ?>
            <div class="modal-body">
                <table class="table table-bordered" id="tambahanggota">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="centangSemua"></th>
                            <th>Nama Siswa</th>
                            <th>NISN</th>
                            <th>Tingkat</th>
                            <th>Jenis Kelamin</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $db     = \Config\Database::connect();

                        $ta = $db->table('tbl_ta')
                            ->where('status', '1')
                            ->get()->getRowArray();
                        foreach ($tidakpunya as $key => $value) { ?>

                            <?php if ($kelas['id_tingkat'] == $value['id_tingkat']) { ?>
                                <tr>
                                    <td><input type="checkbox" name="id_siswa[]" value="<?= $value['id_siswa'] ?>" class="check-anak"></td>
                                    <td><?= $value['nama_siswa'] ?></td>
                                    <td><?= $value['nisn'] ?></td>
                                    <td><?= $value['nama_tingkat'] ?></td>
                                    <td><?= $value['jenis_kelamin'] ?></td>
                                    <input type="hidden" name="id_kelas_baru[]" value="<?= $kelas['id_kelas'] ?>">
                                    <input type="hidden" name="id_ta[]" value="<?= $ta['id_ta'] ?>">
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning "><i fas fa-upload></i> Tambah</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<div class="modal fade" id="upload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Nilai P3MP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <a href="<?= base_url('kelas/printexcel/' . $kelas['id_kelas']) ?>" class="btn btn-outline-success btn-lg"> <i class="fas fa-file-excel mr-2"></i> Download Template</a>

                <?= form_open_multipart('kelas/upload/' . $kelas['id_kelas']) ?>
                <div class="form-group mt-4">
                    <label for="exampleInputFile">
                        <h5>Upload Nilai</h5>
                    </label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="fileimport" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-folder"></i></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
<!-- ModalHapus -->





<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if (session()->getFlashdata('pesan')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '<?= session()->getFlashdata('pesan'); ?>',
            timer: 2000,
            showConfirmButton: false
        });
    </script>
<?php endif; ?>




<script>
    const $select = $('select[name="ap"]');

    $("<option />", {
        value: "",
        text: "-- Pilih Cetak --",
        selected: true,
        disabled: true
    }).appendTo($select);

    const opts = [{
            value: '<?= base_url('kelas/halaman/' . $kelas['id_kelas']) ?>',
            text: 'Halaman Depan Rapot'
        },
        {
            value: '<?= base_url('kelas/label/' . $kelas['id_kelas']) ?>',
            text: 'Label Nama'
        },
        {
            value: '<?= base_url('kelas/print/' . $kelas['id_kelas']) ?>',
            text: 'Biodata Rapot'
        },
        {
            value: '<?= base_url('kelas/ledger/' . $kelas['id_kelas']) ?>',
            text: 'Leger'
        },
        {
            value: '<?= base_url('kelas/nilai/' . $kelas['id_kelas']) ?>',
            text: 'Rapot P3MP'
        }
    ];

    opts.forEach(obj => {
        $("<option />", {
            value: obj.value,
            text: obj.text
        }).appendTo($select);
    });

    $select.on("change", function() {
        if (this.value !== "") {
            window.location.href = this.value;
        }
    });
    $select.prop('selectedIndex', 0);
</script>



<script>
    $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
        $("#centangSemua").click(function() { // Ketika user men-cek checkbox all
            if ($(this).is(":checked")) // Jika checkbox all diceklis
                $(".check-anak").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
            else // Jika checkbox all tidak diceklis
                $(".check-anak").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
        });
    });
</script>


<!-- AkhirBukuInduk -->



<?= $this->endSection() ?>