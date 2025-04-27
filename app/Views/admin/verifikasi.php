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
    <div class="container-fluid" style="margin-top: 50px; margin-bottom:150px;">
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
                    <div class="col-md-6">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100px">
                                <tr>
                                    <th colspan="3" class="text-center">
                                        Lembar Induk Siswa
                                    </th>
                                </tr>
                                <tr>
                                    <td class="text-center" colspan="2">Nomor Induk Siswa :</td>
                                </tr>
                                <tr>
                                    <td class="text-center" colspan="2">Nomor Induk Siswa Nasional : <?= $siswa['nisn'] ?></td>
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
                                    <td>4. Agama</td>
                                    <td>Islam</td>
                                </tr>
                                <tr>
                                    <td>5. Kewaganegaraan</td>
                                    <td>Indonesia</td>
                                </tr>
                                <tr>
                                    <td>6. Anak Ke Berapa</td>
                                    <td><?= $siswa['anak_ke'] ?></td>
                                </tr>
                                <tr>
                                    <td>7. Jumlah Saudara Kandung</td>
                                    <td><?= $siswa['jml_saudara'] ?></td>
                                </tr>
                                <tr>
                                    <td>8. Jumlah Saudara Tiri</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>9. Anak Yatim/Piatu/yatim piatu</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>B. KONTAK </b></td>
                                </tr>
                                <tr>
                                    <td>10. Alamat</td>
                                    <td><?= $siswa['alamat'] ?> RT <?= $siswa['rt'] ?> RW <?= $siswa['rw'] ?> Desa/Kel. <?= $siswa['desa'] ?> Kec. <?= $siswa['nama_kecamatan'] ?></td>
                                </tr>
                                <tr>
                                    <td>11. Nomor Telepon</td>
                                    <td><?= $siswa['telp_anak'] ?></td>
                                </tr>
                                <tr>
                                    <td>12. Tinggal Bersama</td>
                                    <td><?= $siswa['tinggal'] ?></td>
                                </tr>
                                <tr>
                                    <td>13. Jarak Tempat tinggal Ke Sekolah</td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td colspan="2"><b>C. DATA AYAH </b></td>
                                </tr>
                                <tr>
                                    <td>14. Nama</td>
                                    <td><?= $siswa['nama_ayah'] ?></td>
                                </tr>
                                <tr>
                                    <td>15. Tahun Lahir</td>
                                    <td><?= $siswa['tahun_ayah'] ?></td>
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
                                </tr>
                                <tr>
                                    <td>30. Berat Badan</td>
                                    <td><?= $siswa['berat'] ?> kg</td>
                                </tr>
                                <tr>
                                    <td>31. Lingkar Kepala</td>
                                    <td><?= $siswa['lingkar'] ?> cm</td>
                                </tr>
                                <tr>
                                    <td>31. No Seri Ijazah</td>
                                    <td><?= $siswa['seri_ijazah'] ?></td>
                                </tr>
                            </table>
                        </div>
                        <?= form_open('peserta/verifikasi_data/' . $siswa['id_siswa']) ?>
                        <div class="form-group">
                            <label for="">Verifikasi</label>
                            <select id="ok" onChange="opsi(this)" class="form-control" name="status_daftar" required>
                                <option value="4">Ditolak</option>
                                <option value="3">Diterima</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Catatan</label>
                            <textarea name="catatan" id="inputku" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Pilih Kelas</label>
                            <select name="id_kelas" id="pilihan" class="form-control">
                                <option value="0">Ditolak</option>
                                <?php foreach ($kelas as $key => $row) { ?>
                                    <option value="<?= $row['id_kelas'] ?>"><?= $row['kelas'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success"><i class="fas fa-plane"></i> Submit</button>

                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function opsi(value) {
            var st = $("#ok").val();
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