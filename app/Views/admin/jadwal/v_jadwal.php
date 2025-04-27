<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<!-- Main content -->
<div class="content-header">
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title"><?= $subtitle ?></h1>
                <a class="btn btn-primary btn-xs float-right" data-toggle="modal" data-target="#tambah"> <i class="fas fa-plus"></i> Tambah</a>
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
</div>





<?= $this->endSection() ?>