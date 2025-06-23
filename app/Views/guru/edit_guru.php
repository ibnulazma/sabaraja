<?= $this->extend('template/template-guru') ?>
<?= $this->section('content') ?>

<div class="swal" data-swal="<?= session()->getFlashdata('pesan'); ?>"></div>


<div class="content-header">
    <div class="card">
        <div class="card-body">
            <?= form_open('pendidik/update_guru/' . $data['niy']) ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row mb-4">
                        <div class="col-sm-4">
                            <label for="nama_guru">Nama Lengkap</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control " name="nama_guru" value="<?= $data['nama_guru'] ?>" required>

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
                            <input type="text" class="form-control" name="tmpt_lahir" value="<?= $data['tmpt_lahir'] ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <div class="col-sm-4">
                            <label for="">Tanggal Lahir</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?>">
                            <span class="text-danger" style="font-size: 10px;">Contoh Format Tgl Lahir: 2000-12-20 </span>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <div class="col-sm-4">
                            <label for="">Email</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="email" value="<?= $data['email'] ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <div class="col-sm-4">
                            <label for="">No Hp/WA</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="telp_guru" value="<?= $data['telp_guru'] ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <div class="col-sm-4">
                            <label for="">Alamat</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control " name="alamat_guru" value="<?= $data['alamat_guru'] ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <div class="col-sm-4">
                            <label for="">RT</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="number" class="form-control " name="rt_guru" value="<?= $data['rt_guru'] ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <div class="col-sm-4">
                            <label for="">RW</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="number" class="form-control " name="rw_guru" value="<?= $data['rw_guru'] ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row mb-4">
                        <div class="col-sm-4">
                            <label for="">Desa/Kel</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control " name="desa_guru" value="<?= $data['desa_guru'] ?>">

                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <div class="col-sm-4">
                            <label for="">Kecamatan</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control " name="kec_guru" value="<?= $data['kec_guru'] ?>">

                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <div class="col-sm-4">
                            <label for="">Nama Ibu</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="ibu_guru" value="<?= $data['ibu_guru'] ?>">

                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <div class="col-sm-4">
                            <label for="">NIK</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nik_guru" value="<?= $data['nik_guru'] ?>">

                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <div class="col-sm-4">
                            <label for="">NUPTK</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nuptk" value="<?= $data['nuptk'] ?>">

                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <div class="col-sm-4">
                            <label for="">NPWP</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="npwp" value="<?= $data['npwp'] ?>">

                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <div class="col-sm-4">
                            <label for="">Link WA</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="link_wa" value="<?= $data['link_wa'] ?>">

                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <div class="col-sm-4">
                            <label for="">Status Pernikahan</label>
                        </div>
                        <div class="col-sm-8">
                            <select name="status_pernikahan" id="" class="form-control <?= ($validation->hasError('status_pernikahan')) ? 'is-invalid' : ''; ?>">
                                <option value="<?= $data['status_pernikahan'] ?>"><?= $data['status_pernikahan'] ?></option>
                                <option value="">--Pilih Status--</option>
                                <option value="Belum Menikah">Belum Menikah</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Menikah">Janda/Duda</option>
                            </select>
                            <div class="invalid-feedback ">
                                <?= $validation->getError('status_pernikahan'); ?>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <button class="btn btn-primary w-100" type="submit"><i class='bx  bx-save'></i> Simpan</button>
            <?= form_close() ?>
        </div>
    </div>

</div>





<script src="<?= base_url() ?>/template/assets/vendor/libs/jquery/jquery.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>






<script>
    const swal = $('.swal').data('swal');
    if (swal) {
        Swal.fire({
            title: 'Sukses',
            text: swal,
            icon: 'success'
        })
    }
</script>


<?= $this->endSection() ?>