<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>



<div class="card card-danger">
    <div class="card-header">
        <h5 class="card-title">Nilai P3MP Per Kelas <?= $ta['ta'] ?> Semester <?= $ta['semester'] ?></h5>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <select name="kelas" id="kelas" class="form-control" width="100%">
                        <option value="">Pilih Rombel</option>
                        <?php foreach ($kelas as $row) { ?>
                            <option value="<?= $row['kelas'] ?>"><?= $row['kelas'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <button onclick="Viewpd()" class="btn btn-danger"> View PD</button>
                </div>
            </div>
        </div>

        <div class="Tabel">


        </div>
    </div>
</div>




<script>
    function Viewpd() {
        let kelas = $('#kelas').val();
        $.ajax({
            type: "POST",
            url: "<?= base_url('Nilai/Viewpd') ?>",
            data: {
                kelas: kelas,
            },
            dataType: "JSON",
            success: function(response) {
                if (response.data) {
                    $('.Tabel').html(response.data)
                }
            }
        });
    }
</script>


<?= $this->endSection() ?>