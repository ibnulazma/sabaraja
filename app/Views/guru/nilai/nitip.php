<?php foreach ($nilai as $key => $data) { ?>
    <tr>
        <td><input type="checkbox" class="check-item" name="nisn[]" value="<?= $data['nisn'] ?>"></td>
        <td><?= $data['nama_siswa'] ?></td>
        <td><?= $data['nisn'] ?></td>
        <input type="hidden" name="id_ta[]" value="<?= $ta['tahun'] ?>">

    </tr>
<?php } ?>