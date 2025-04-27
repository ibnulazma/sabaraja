<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<div class="row">
    <div class="col-md-6 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-danger"><i class="fas fa-user"></i></span>
            <div class="info-box-content">
                <span class="info-box-text"><b> Pendaftar Sampai Tanggal <?= date('d-m-Y') ?></b></span>
                <span class="info-box-number">20 Orang</span>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="fas fa-user-tie"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">PTK</span>
                <span class="info-box-number"></span>
            </div>
        </div>
    </div>


</div>

<div class="row">
    <div class="col-lg-12">
        <div class="tombol mb-3">

        </div>
        <div class="card">
            <div class="card-header">

                <div class="row justify-content-between">
                    <div class="col-md-6">
                        <h5 class="card-title mb-2">Data Pengambil Formulir</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="tombol">
                            <a href="<?= base_url('ppdb/tambahdaftar') ?>" class="btn btn-primary btn-sm  "> <i class="fa-regular fa-user "></i> Tambah Pendaftar</a>
                            <a href="<?= base_url('ppdb/laporan') ?>" class="btn btn-danger btn-sm "> <i class="fa-solid fa-clipboard-list"></i> Lihat Laporan</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="example2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama </th>
                            <th>JK </th>
                            <th>Tanggal Daftar</th>
                            <th>Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Agung Laksono</td>
                            <td>Agung Laksono</td>
                            <td>Agung Laksono</td>
                            <td>detail</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




<?= $this->endSection() ?>