<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>



<style>
    #map-wrapper {
        width: 100%;
        height: 320px;
    }

    #map {
        width: 100%;
        height: 100%;
    }

    @media (max-width: 576px) {
        #map-wrapper {
            height: 260px;
        }
    }
</style>
















<?= $this->endSection() ?>