<?php
  foreach ($datasoal as $soal) {
    ?>
    <tr>
      <td><?php echo $soal->id; ?></td>
      <td><?php echo $soal->isi; ?></td>
      <td><?php echo $soal->pilihan_benar; ?></td>
      <td><?php echo $soal->pilihan_salah_1; ?></td>
      <td><?php echo $soal->pilihan_salah_2; ?></td>
      <td><?php echo $soal->pilihan_salah_3; ?></td>
      <td><?php echo $soal->pilihan_salah_4; ?></td>
      <td><?php echo $soal->kuis; ?></td>
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-datasoal" data-id="<?php echo $soal->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-soal" data-id="<?php echo $soal->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
  }
?>