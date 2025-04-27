<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<style>
    .div1 {
        width: auto;
        height: auto;
        overflow: scroll;
        border: 1px solid #bbbbbb;

    }

    .div1 table {
        border-spacing: 0;
    }

    .div1 th {
        border: 1px solid #bbbbbb;
        padding: 5px;
        width: 40px;
        font-size: 15px;
        text-align: center;
        min-width: 100px;
        position: sticky;
        top: 0;
        background: #036EE6;
        color: #e0e0e0;
        font-weight: normal;
    }

    .div1 td {
        border: 1px solid #bbbbbb;
        padding: 8px;
        width: 80px;
        min-width: 80px;


    }


    .div1 th:nth-child(1),
    .div1 td:nth-child(1) {
        position: sticky;
        left: 0;



    }


    .div1 th:nth-child(2),
    .div1 td:nth-child(2) {
        position: sticky;
        left: 92px;

    }

    .div1 th:nth-child(3),
    .div1 td:nth-child(3) {
        position: sticky;
        left: 184px;

    }

    .div1 td:nth-child(1),
    .div1 td:nth-child(2),
    .div1 td:nth-child(3) {
        background: #D4E7FB;

    }

    .div1 th:nth-child(1),
    .div1 th:nth-child(2),
    .div1 th:nth-child(3) {
        z-index: 2;

    }
</style>




<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">
            <?= $subtitle ?>
        </h3>
        <div>
            <a href="" class="btn btn-info btn-sm float-right mr-2"> <i class="fas fa-pencil"></i> Edit</a>
            <a href="" class="btn btn-success btn-sm float-right mb-2 mr-2"> <i class="fas fa-print"></i> Print</a>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="text-sm table table-bordered" width="100%">

                    <tr class="text-center">
                        <th class="no">No</th>
                        <th>Nama Siswa</th>
                        <th>NISN</th>
                        <th>UH1</th>
                        <th>UH2</th>
                        <th>UH3</th>
                        <th>UH4</th>
                        <th>UH5</th>
                        <th>UH6</th>
                        <th>UH7</th>
                        <th>UH8</th>
                        <th>UH9</th>
                        <th>UH10</th>
                        <th>Rata-rata UH</th>
                        <th>UTS</th>
                        <th>UAS</th>
                        <th>JUMLAH</th>
                    </tr>

                    <?php $no = 1;
                    foreach ($nilai as $key => $value) { ?>

                        <tr class="text-center text-sm">
                            <td> <?= $no++ ?></td>
                            <td width="10%"> <?= $value['nama_siswa'] ?></td>
                            <td> <?= $value['nisn'] ?></td>
                            <td class="text-center">
                                <input type="text" class="form-control form-control-sm" value="<?= $value['uh1'] ?>">
                            </td>
                            <td>
                                <input type="text" class="form-control form-control-sm" value="<?= $value['uh2'] ?>">
                            </td>
                            <td>
                                <input type="text" class="form-control form-control-sm" value="<?= $value['uh3'] ?>">
                            </td>
                            <td>
                                <input type="text" class="form-control form-control-sm" value="<?= $value['uh4'] ?>">
                            </td>
                            <td>
                                <input type="text" class="form-control form-control-sm" value="<?= $value['uh5'] ?>">
                            </td>
                            <td>
                                <input type="text" class="form-control form-control-sm" value="<?= $value['uh6'] ?>">
                            </td>
                            <td>
                                <input type="text" class="form-control form-control-sm" value="<?= $value['uh7'] ?>">
                            </td>
                            <td>
                                <input type="text" class="form-control form-control-sm" value="<?= $value['uh8'] ?>">
                            </td>
                            <td>
                                <input type=" text" class="form-control form-control-sm" value="<?= $value['uh9'] ?>">
                            </td>
                            <td>
                                <input type=" text" class="form-control form-control-sm" value="<?= $value['uh10'] ?>">
                            </td>
                            <td class=" text-center">

                            </td>
                            <td>
                                <input type="text" class="form-control form-control-sm" value="<?= $value['uh7'] ?>">
                            </td>

                            <td><input type=" text" class="form-control form-control-sm">
                            </td>
                            <td>0</td>

                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>







































    <?= $this->endSection() ?>