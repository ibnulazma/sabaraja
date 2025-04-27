<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>



    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Ubah Data Sekolah</h3> <a href="<?= base_url('admin/setting') ?>" class="text-primary"><i class="fa-solid fa-arrow-rotate-left float-right"></i></a>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            <?= form_open('admin/updateSetting/' . $setting['id_setting']) ?>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Nama Sekolah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?= $setting['nama_sekolah'] ?>" name="nama_sekolah">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">NPSN</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?= $setting['npsn'] ?>" name="npsn">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?= $setting['status'] ?>" name="status">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?= $setting['alamat'] ?>" name="alamat">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Desa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?= $setting['desa'] ?>" name="desa">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Kecamatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?= $setting['kecamatan'] ?>" name="kecamatan">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Kabupaten</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?= $setting['kabupaten'] ?>" name="kabupaten">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Provinsi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?= $setting['provinsi'] ?>" name="provinsi">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">No Telpon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?= $setting['no_telp'] ?>" name="no_telp">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?= $setting['email'] ?>" name="email">
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm float-right mt-4">Simpan</button>
            <?= form_close() ?>
        </div>

        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>











<?= $this->endSection() ?>