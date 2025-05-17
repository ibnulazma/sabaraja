<?= $this->extend('template/template-guru') ?>
<?= $this->section('content') ?>



<div class="content-header">

    <div class="card">
        <div class="card-body">
            <form action="">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row mb-4">
                            <div class="col-sm-4">
                                <label for="nama_guru">Nama Lengkap</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control <?= ($validation->hasError('nama_guru')) ? 'is-invalid' : ''; ?>" name="nama_guru" value="<?= $data['nama_guru'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_guru'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <div class="col-sm-4">
                                <label for="">Jenis Kelamin</label>
                            </div>
                            <div class="col-sm-8">
                                <select name="kelamin" id="" class="form-control">

                                    <?php if ($data['kelamin'] == 'L') {
                                        echo  "<option value='L' selected>Laki-laki</option>";
                                    } else {
                                        echo  "<option value='L'>Laki-laki</option>";
                                    }

                                    if ($data['kelamin'] == 'P') {
                                        echo  "<option value='P' selected>Perempuan</option>";
                                    } else {
                                        echo  "<option value='P'>Perempuan</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>


                        <div class="form-group row mb-4">
                            <div class="col-sm-4">
                                <label for="">Tempat Lahir</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control <?= ($validation->hasError('tmpt_lahir')) ? 'is-invalid' : ''; ?>" name="tmpt_lahir" value="<?= $data['tmpt_lahir'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tmpt_lahir'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <div class="col-sm-4">
                                <label for="">Tanggal Lahir</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control <?= ($validation->hasError('tgl_lahir')) ? 'is-invalid' : ''; ?>" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?>">
                                <span class="text-danger" style="font-size: 10px;">Contoh Format Tgl Lahir: 2000-12-20 </span>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tgl_lahir'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
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
                        <div class="form-group row mb-4">
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

                        <div class="form-group row mb-4">
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
                        <div class="form-group row mb-4">
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

                        <div class="form-group row mb-4">
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
                        <div class="form-group row mb-4">
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
                        <div class="form-group row mb-4">
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
                        <div class="form-group row mb-4">
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
                        <div class="form-group row mb-4">
                            <div class="col-sm-4">
                                <label for="">NIK</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control <?= ($validation->hasError('nik_guru')) ? 'is-invalid' : ''; ?>" name="nik_guru">
                                <div class="invalid-feedback ">
                                    <?= $validation->getError('nik_guru'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <div class="col-sm-4">
                                <label for="">NUPTK</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control <?= ($validation->hasError('nuptk')) ? 'is-invalid' : ''; ?>" name="nuptk">
                                <div class="invalid-feedback ">
                                    <?= $validation->getError('nuptk'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <div class="col-sm-4">
                                <label for="">Status Pernikahan</label>
                            </div>
                            <div class="col-sm-8">
                                <select name="status_pernikahan" id="" class="form-control">
                                    <option value="">Pilih Salah Satu</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Menikah">Janda/Duda</option>
                                </select>
                                <div class="invalid-feedback ">
                                    <?= $validation->getError('nuptk'); ?>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Simpan</button>

                    </div>
                </div>
            </form>
        </div>
    </div>

</div>


<?= $this->endSection() ?>