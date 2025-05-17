<?= $this->extend('template/template-biodata') ?>
<?= $this->section('content') ?>


<style>
    .rata_kanan {
        float: right;
    }
</style>


<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="card">
            <?= form_open() ?>
            <div class="card-body pt-4">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="atribut" style="list-style:none">
                            <li class="p-0">
                                Nama Ayah :
                                <span class="rata_kanan"><?= $siswa['nama_ayah'] ?></span>
                            </li>
                            <hr>
                            <li class="p-0">
                                Tahun Lahir :
                                <span class="rata_kanan"><?= $siswa['tahun_ayah'] ?></span>
                            </li>
                            <hr>
                            <li class="p-0">
                                NIK :
                                <span class="rata_kanan"><?= $siswa['nik_ayah'] ?></span>
                            </li>
                            <hr>
                            <li class="p-0">
                                Pendidikan :
                                <span class="rata_kanan"><?= $siswa['didik_ayah'] ?></span>

                            </li>
                            <hr>
                            <li class="p-0">
                                Pekerjaan :
                                <?php
                                $hasilayah = $siswa['kerja_ayah'];
                                $sisap = str_replace('-', ' ', $hasilayah)
                                ?>
                                <span class="rata_kanan"><?= $sisap ?></span>
                            </li>
                            <hr>
                            <li class="p-0">
                                Penghasilan :
                                <?php
                                $hasilayah = $siswa['hasil_ayah'];
                                $hasilna = str_replace('-', ' ', $hasilayah)
                                ?>
                                <span class="rata_kanan"><?= $hasilna ?></span>
                            </li>
                            <hr>
                            <li class="p-0">
                                Telepon :
                                <span class="rata_kanan"><?= $siswa['telp_ayah'] ?></span>
                            </li>
                            <hr>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="atribut" style="list-style:none">
                            <li class="p-0">
                                Nama Ibu :
                                <span class="rata_kanan"><?= $siswa['nama_ibu'] ?></span>
                            </li>
                            <hr>
                            <li class="p-0">
                                Tahun Lahir :
                                <span class="rata_kanan"><?= $siswa['tahun_ibu'] ?></span>
                            </li>
                            <hr>
                            <li class="p-0">
                                NIK :
                                <span class="rata_kanan"><?= $siswa['nik_ibu'] ?></span>
                            </li>
                            <hr>
                            <li class="p-0">
                                Pendidikan :
                                <span class="rata_kanan"><?= $siswa['didik_ibu'] ?></span>
                            </li>
                            <hr>
                            <li class="p-0">
                                Pekerjaan :
                                <?php
                                $kerjaibu = $siswa['kerja_ibu'];
                                $ibukerja = str_replace('-', ' ', $kerjaibu)
                                ?>
                                <span class="rata_kanan"><?= $ibukerja ?></span>
                            </li>
                            <hr>
                            <li class="p-0">
                                Penghasilan :
                                <?php
                                $hasilibu = $siswa['hasil_ibu'];
                                $ibuhasil = str_replace('-', ' ', $hasilibu)
                                ?>
                                <span class="rata_kanan"><?= $ibuhasil ?></span>
                            </li>
                            <hr>

                            <li class="p-0">
                                Telepon :
                                <span class="rata_kanan"><?= $siswa['telp_ibu'] ?></span>
                            </li>
                            <hr>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
    function opsi(value) {
        var st = $("#dropdown").val();
        if (st == "Sudah Meninggal") {
            document.getElementById("dipilih").disabled = true;
        } else {
            document.getElementById("dipilih").disabled = false;
        }
    }
</script>
<?= $this->endSection() ?>