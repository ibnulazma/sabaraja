<div class="div">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($datasiswa as $key => $row) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nama_siswa'] ?></td>
                    <td>
                        <a href="<?= base_url('nilai/printrapot/' . $row['nisn']) ?>" target="_blank" class="btn btn-danger"><i class="fas fa-print"></i> Print Rapot</a>
                        <a href="<?= base_url('nilai/halaman/' . $row['nisn']) ?>" target="_blank" class="btn bg-yellow btn-sm"><i class="fas fa-file-pdf"></i> Cetak Halaman</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>