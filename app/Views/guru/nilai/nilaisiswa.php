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


<div class="row">
    <div class="container">


    </div>
</div>
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">
            <div class="container">
                <?= $subtitle ?>
        </h3>
        <a href="" class="btn btn-success btn-sm  float-right mb-2 mr-2"> <i class="fas fa-print"></i> Print</a>
        <a href="" class="btn btn-info btn-sm float-right mr-2"> <i class="fas fa-pencil"></i> Edit</a>
        <button type="button" class="btn btn-danger btn-sm float-right mr-2" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-cogs"></i> Generate</button>
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
                            <?= $value['uh1'] ?>
                        </td>
                        <td>
                            <?= $value['uh2'] ?>
                        </td>
                        <td>
                            <?= $value['uh3'] ?>
                        </td>
                        <td>
                            <?= $value['uh4'] ?>
                        </td>
                        <td>
                            <?= $value['uh5'] ?>
                        </td>
                        <td>
                            <?= $value['uh6'] ?>
                        </td>
                        <td>
                            <?= $value['uh7'] ?>
                        </td>
                        <td>
                            <?= $value['uh8'] ?>
                        </td>
                        <td>
                            <?= $value['uh9'] ?>
                        </td>
                        <td>
                            <?= $value['uh10'] ?>
                        </td>
                        <td></td>
                        <td>
                            <?= $value['uh7'] ?>
                        </td>

                        <td>
                        </td>
                        <td>0</td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <table>
                    <thead>
                        <tr>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datasiswa as $row) { ?>
                            <tr>
                                <td><?= $row['nama_siswa'] ?></td>
                                <td><?= $row['id_mapel'] ?></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>








































<?= $this->endSection() ?>