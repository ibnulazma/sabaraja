<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<div class="card card-primary">
    <div class="card-header">
        <h5 class="card-title">
            Tambah Pendaftar
        </h5>
    </div>
    <div class="card-body">
        <form action="">
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="">Nama Lengkap</label>
                </div>
                <div class="col-sm-8">
                    <input type="text" name="" id="" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="">Jenis Kelamin</label>
                </div>
                <div class="col-sm-8">
                    <select name="" id="" class="form-control">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="">Asal Sekolah</label>
                </div>
                <div class="col-sm-8">
                    <select name="" id="" class="form-control select2bs4">
                        <option value="">--Pilih Sekolah</option>
                        <option value="">SDN MANGKUBUMI</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="">Alamat Lengkap</label>
                </div>
                <div class="col-sm-8">
                    <textarea name="" id="" cols="30" class="form-control" rows="5"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="">Nama Orang Tua</label>
                </div>
                <div class="col-sm-8">
                    <input type="text" name="" id="" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="">No Telp</label>
                </div>
                <div class="col-sm-8">
                    <input type="text" name="" id="" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="">Harga</label>
                </div>
                <div class="col-sm-8">
                    <input type="text" name="" id="rupiah" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="">Tanggal</label>
                </div>
                <div class="col-sm-8">
                    <input type="text" name="" id="" class="form-control" value="<?= date('Y-m-d') ?>">
                </div>
            </div>
        </form>
    </div>
</div>




<?= $this->endSection() ?>