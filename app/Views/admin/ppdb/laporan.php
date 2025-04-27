<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<div class="row">
    <div class="col-md-4">
        <div class="input-group input-group-sm">
            <input type="date" class="form-control">
        </div>
    </div>
    <div class="col-md-4">
        <button class="btn btn-primary btn-sm"> <i class="fa-solid fa-eye"></i> View Laporan</button>
        <button class="btn btn-info btn-sm"> <i class="fa-solid fa-print"></i> Print Laporan </button>
    </div>
</div>


<?= $this->endSection() ?>