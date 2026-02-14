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
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalUpload">Import Nilai</button>
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
                <select name="ap" class="form-control" id="menuRapot">

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
                                    <a href="<?= base_url('admin/kelas/hapusanggota/' . $value['id_database']) ?>" class="btn btn-danger btn-sm"><i class="bx bxs-trash-alt"></i></a>
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
            <?= form_open('admin/kelas/tambahanggota/' . $kelas['id_kelas']) ?>
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
                                    <input type="hidden" name="nisn[]" value="<?= $value['nisn'] ?>">
                                    <input type="hidden" name="id_kelas[]" value="<?= $kelas['id_kelas'] ?>">
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



<div class="modal fade" id="modalUpload" tabindex="-1">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Upload Nilai Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="formUpload" enctype="multipart/form-data">
                <div class="modal-body">


                    <div class="mb-3 mt-3">
                        <label class="form-label">File Excel</label>
                        <input type="file" name="fileimport" class="form-control" required>
                    </div>

                    <div class="progress" style="display:none;height:22px;">
                        <div id="progressBar"
                            class="progress-bar progress-bar-striped progress-bar-animated"
                            style="width:0%">
                            0%
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Upload</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>

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
        text: "Silahkan Pilih Berkas",
        selected: true,
        disabled: true
    }).appendTo($select);

    const opts = [{
            value: '<?= base_url('admin/kelas/printexcel/' . $kelas['id_kelas']) ?>',
            text: 'Template Nilai P3MP'
        },

        {
            value: '<?= base_url('admin/kelas/halaman/' . $kelas['id_kelas']) ?>',
            text: 'Halaman Depan Rapot'
        },
        {
            value: '<?= base_url('admin/kelas/label/' . $kelas['id_kelas']) ?>',
            text: 'Label Nama'
        },
        {
            value: '<?= base_url('admin/kelas/printbiodata/' . $kelas['id_kelas']) ?>',
            text: 'Biodata Rapot'
        },
        {
            value: '<?= base_url('admin/kelas/ledger/' . $kelas['id_kelas']) ?>',
            text: 'Leger'
        },
        {
            value: '<?= base_url('admin/kelas/nilai/' . $kelas['id_kelas']) ?>',
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
            window.open(this.value + '?v=' + Date.now(), '_blank'); // 👈 TAB BARU
            $(this).prop('selectedIndex', 0); // reset select
        }
    });
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







<!-- UPLOAD NILAI -->

<script>
    document.getElementById('formUpload').addEventListener('submit', function(e) {
        e.preventDefault();

        let form = this;
        let data = new FormData(form);

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "<?= base_url('admin/kelas/upload/' . $kelas['id_kelas']) ?>", true);

        const progressBox = document.querySelector('.progress');
        const progressBar = document.getElementById('progressBar');

        progressBox.style.display = 'block';
        progressBar.style.width = '0%';
        progressBar.innerHTML = '0%';

        xhr.upload.onprogress = function(e) {
            if (e.lengthComputable) {
                let percent = Math.round((e.loaded / e.total) * 100);
                progressBar.style.width = percent + '%';
                progressBar.innerHTML = percent + '%';
            }
        };

        xhr.onload = function() {
            let res = JSON.parse(this.responseText);

            if (res.status) {
                bootstrap.Modal.getInstance(
                    document.getElementById('modalUpload')
                ).hide();

                Swal.fire({
                    title: 'Upload Selesai',
                    html: `Berhasil: <b>${res.sukses}</b><br>Gagal: <b>${res.gagal}</b>`,
                    icon: 'success'
                }).then(() => {
                    location.reload();
                });

            } else {
                Swal.fire('Gagal', res.message, 'error');
            }
        };

        xhr.send(data);
    });
</script>

<!-- AkhirBukuInduk -->



<?= $this->endSection() ?>