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
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <?= $subtitle ?>
        </h3>
        <a href="" class="btn btn-success btn-sm float-right mb-2 mr-2"> <i class="fas fa-print"></i> Print</a>
    </div>
    <div class="card-body">

        <div class="div1">
            <table>

                <tr>
                    <th class="no">No</th>
                    <th>Nama Siswa</th>
                    <th> NISN</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                    <th>9</th>
                    <th>10</th>
                    <th>11</th>
                    <th>12</th>
                    <th>13</th>
                    <th>14</th>
                    <th>15</th>
                    <th>16</th>
                    <th>17</th>
                    <th>18</th>
                    <th>19</th>
                    <th>20</th>
                    <th>21</th>
                    <th>22</th>
                    <th>23</th>
                    <th>24</th>
                    <th>25</th>
                    <th>26</th>
                    <th>27</th>
                    <th>28</th>
                    <th>29</th>
                    <th>30</th>
                    <th>31</th>
                    <th>Jumlah Hadir %</th>
                </tr>

                <?php $no = 1;
                foreach ($absen as $key => $value) { ?>

                    <tr class="text-center">
                        <td> <?= $no++ ?></td>
                        <td> <?= $value['nama_siswa'] ?></td>
                        <td> <?= $value['nisn'] ?></td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">I</option>
                                <option value="">H</option>
                            </select>
                        </td>
                        <td class="text-center">

                            <?php
                            $absensi = round(
                                ($value['p1'] +
                                    $value['p2'] +
                                    $value['p3'] +
                                    $value['p4'] +
                                    $value['p5'] +
                                    $value['p6'] +
                                    $value['p7'] +
                                    $value['p8'] +
                                    $value['p9'] +
                                    $value['p10'] +
                                    $value['p11'] +
                                    $value['p12'] +
                                    $value['p13'] +
                                    $value['p14'] +
                                    $value['p15'] +
                                    $value['p16'] +
                                    $value['p17'] +
                                    $value['p18'] +
                                    $value['p19'] +
                                    $value['p20'] +
                                    $value['p21'] +
                                    $value['p22'] +
                                    $value['p23'] +
                                    $value['p24'] +
                                    $value['p25'] +
                                    $value['p26'] +
                                    $value['p27'] +
                                    $value['p28'] +
                                    $value['p29'] +
                                    $value['p30'] +
                                    $value['p31']) / 62 * 100
                            );

                            echo $absensi;

                            ?>
                        </td>
                    </tr>
                <?php } ?>


            </table>
        </div>




    </div>


</div>






































<?= $this->endSection() ?>