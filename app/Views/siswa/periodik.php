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
                                Tinggi Badan :
                                <span class="rata_kanan"><?= $siswa['tinggi'] ?> cm</span>
                            </li>
                            <hr>
                            <li class="p-0">
                                Berat Badan :
                                <span class="rata_kanan"><?= $siswa['berat'] ?> cm</span>
                            </li>
                            <hr>
                            <li class="p-0">
                                Lingkar Kepala :
                                <span class="rata_kanan"><?= $siswa['lingkar'] ?> cm</span>
                            </li>
                            <hr>
                            <li class="p-0">
                                Anak Ke :
                                <span class="rata_kanan"><?= $siswa['anak_ke'] ?></span>
                            </li>
                            <hr>
                            <li class="p-0">
                                Jumlah Saudara :
                                <span class="rata_kanan"><?= $siswa['jml_saudara'] ?></span>
                            </li>
                            <hr>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="atribut" style="list-style:none">
                            <li class="p-0">
                                NIPD :
                                <span class="rata_kanan"><?= $siswa['nis'] ?></span>
                            </li>
                            <hr>
                            <li class="p-0">
                                Nomor Seri Ijazah :
                                <span class="rata_kanan"><?= $siswa['seri_ijazah'] ?></span>
                            </li>
                            <hr>
                            <li class="p-0">
                                Hobi :
                                <span class="rata_kanan"><?= $siswa['hobi'] ?></span>
                            </li>
                            <hr>
                            <li class="p-0">
                                Cita-cita :
                                <span class="rata_kanan"><?= $siswa['cita_cita'] ?></span>
                            </li>
                            <hr>
                            <li class="p-0">
                                Telp / WA :
                                <span class="rata_kanan"><?= $siswa['telp_anak'] ?></span>
                            </li>
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