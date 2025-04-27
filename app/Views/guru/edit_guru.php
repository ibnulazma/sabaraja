<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>



<div class="content-header">
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Edit Identitas</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="nama_guru">Nama Lengkap</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_guru')) ? 'is-invalid' : ''; ?>" name="nama_guru">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_guru'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="">Tempat Lahir</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control <?= ($validation->hasError('tmpt_lahir')) ? 'is-invalid' : ''; ?>" name="tmpt_lahir">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tmpt_lahir'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="">Tanggal Lahir</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control <?= ($validation->hasError('tgl_lahir')) ? 'is-invalid' : ''; ?>" name="tgl_lahir">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tgl_lahir'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="">Email</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" name="email">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="">No Hp/WA</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control <?= ($validation->hasError('telp_guru')) ? 'is-invalid' : ''; ?>" name="telp_guru">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('telp_guru'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="">Alamat</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control <?= ($validation->hasError('alamat_guru')) ? 'is-invalid' : ''; ?>" name="alamat">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat_guru'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="">RT</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control <?= ($validation->hasError('rt_guru')) ? 'is-invalid' : ''; ?>" name="rt_guru">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('rt_guru'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="">RW</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control <?= ($validation->hasError('rw_guru')) ? 'is-invalid' : ''; ?>" name="rw_guru">
                                    <div class="invalid-feedback ">
                                        <?= $validation->getError('rw_guru'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="">Desa/Kel</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control <?= ($validation->hasError('desa_guru')) ? 'is-invalid' : ''; ?>" name="desa_guru">
                                    <div class="invalid-feedback ">
                                        <?= $validation->getError('desa_guru'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="">Kecamatan</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control <?= ($validation->hasError('kec_guru')) ? 'is-invalid' : ''; ?>" name="kec_guru">
                                    <div class="invalid-feedback ">
                                        <?= $validation->getError('kec_guru'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="">Nama Ibu</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control <?= ($validation->hasError('ibu_guru')) ? 'is-invalid' : ''; ?>" name="ibu_guru">
                                    <div class="invalid-feedback ">
                                        <?= $validation->getError('ibu_guru'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>