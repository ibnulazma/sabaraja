<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?= $title ?>, world!</title>
</head>


<style>
    body {
        background-color: #eaeaea;
    }

    table,
    td,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    /* 
    .card-header {
        position: fixed;
        top: 0;
        left: 0;
        widtd: 200px;
        background: #bbb;
        z-index: 2;
        height: 20px;
    }

    .card-block {
        margin-top: 20px;
        height: 100px;
        overflow: auto;
    } */
</style>


<body>
    <div class="container" style="margin-top: 50px; margin-bottom:150px;">
        <div class="card">
            <div class="card-header fixed">
                <div class="d-flex justify-content-between">
                    <div class="rinci">
                        <h6>Rincian Data Peserta Didik</h6>
                    </div>
                    <div class="kembali">
                        <a href="<?= base_url('peserta') ?>" class="btn btn-success btn-sm"><i class="fa-solid fa-backward fa-beat-fade"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%">
                                <tr>
                                    <th colspan="3" class="text-center">
                                        EDIT DATA </th>
                                </tr>
                                <tr>
                                    <td class="text-center" colspan="2">Nomor Induk Siswa :</td>
                                    <td><input type="text" class="form-control" value="<?= $siswa['nis'] ?>"></td>
                                </tr>
                                <tr>
                                    <td class="text-center" colspan="2">Nomor Induk Siswa Nasional : <?= $siswa['nisn'] ?></td>
                                    <td><input type="text" class="form-control" value="<?= $siswa['nisn'] ?>"></td>
                                </tr>

                                <tr>
                                    <td colspan="3"><b>A. KETERANGAN DIRI SISWA </b></td>
                                </tr>
                                <tr>
                                    <td class="text-center" colspan="2">DATA ASLI </td>
                                </tr>
                                <tr>
                                    <td widtd="100px">1. Nama Lengkap</td>
                                    <td widtd="100px"><?= $siswa['nama_siswa'] ?></td>
                                    <td><input type="text" class="form-control" value="<?= $siswa['nama_siswa'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>2. Jenis Kelamin</td>
                                    <td><?= $siswa['jenis_kelamin'] ?></td>
                                </tr>
                                <tr>
                                    <td>3. Tempat dan Tanggal Lahir</td>
                                    <td><?= $siswa['tempat_lahir'] ?>, <?= date('d M Y', strtotime($siswa['tanggal_lahir'])) ?></td>
                                </tr>

                                <tr>
                                    <td>16. NIK </td>
                                    <td><?= $siswa['nik_ayah'] ?></td>
                                </tr>
                                <tr>
                                    <td>17. Pendidikan Terakhir</td>
                                    <td><?= $siswa['didik_ayah'] ?></td>
                                </tr>
                                <tr>
                                    <td>18. Pekerjaan </td>
                                    <td><?= $siswa['kerja_ayah'] ?></td>
                                </tr>
                                <tr>
                                    <td>19. Penghasilan</td>
                                    <td><?= $siswa['hasil_ayah'] ?></td>
                                </tr>
                                <tr>
                                    <td>20. Telepon</td>
                                    <td><?= $siswa['telp_ayah'] ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>D. DATA IBU </b></td>
                                </tr>
                                <tr>
                                    <td>21. Nama</td>
                                    <td><?= $siswa['nama_ibu'] ?></td>
                                    <td><input type="text" class="form-control" value="<?= $siswa['nama_ibu'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>22. Tahun Lahir</td>
                                    <td><?= $siswa['tahun_ibu'] ?></td>
                                </tr>
                                <tr>
                                    <td>23. NIK </td>
                                    <td><?= $siswa['nik_ibu'] ?></td>
                                </tr>
                                <tr>
                                    <td>24. Pendidikan Terakhir</td>
                                    <td><?= $siswa['didik_ibu'] ?></td>
                                </tr>
                                <tr>
                                    <td>25. Pekerjaan </td>
                                    <td><?= $siswa['kerja_ibu'] ?></td>
                                </tr>
                                <tr>
                                    <td>26. Penghasilan</td>
                                    <td><?= $siswa['hasil_ibu'] ?></td>
                                </tr>
                                <tr>
                                    <td>27. Telepon</td>
                                    <td><?= $siswa['telp_ibu'] ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>E. KESEHATAN </b></td>
                                </tr>
                                <tr>
                                    <td>29. Tinggi Badan</td>
                                    <td><?= $siswa['tinggi'] ?> cm</td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>30. Berat Badan</td>
                                    <td><?= $siswa['berat'] ?> kg</td>
                                    <td><input type="text" class="form-control" value="<?= $siswa['berat'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>31. Lingkar Kepala</td>
                                    <td><?= $siswa['lingkar'] ?> cm</td>
                                    <td><input type="text" class="form-control" value="<?= $siswa['lingkar'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>31. No Seri Ijazah</td>
                                    <td><?= $siswa['seri_ijazah'] ?></td>
                                    <td><input type="text" class="form-control" value="<?= $siswa['seri_ijazah'] ?>"></td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function opsi(value) {
            var st = $(" #ok").val();
            if (st == "1") {
                document.getElementById("inputku").disabled = false;
            } else {
                document.getElementById("inputku").disabled = true;
            }
        }
    </script>




    <!-- Optional JavaScript; choose one of tde two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>