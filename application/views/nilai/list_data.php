<?php
  foreach ($datanilai as $nilai) {
    ?>
    <tr>
      <td><?php echo $nilai->id; ?></td>
      <td><?php echo $nilai->user; ?></td>
      <td><?php echo $nilai->kuis; ?></td>
      <td><?php echo $nilai->hasil; ?></td>
      <td><?php echo $nilai->jawaban; ?></td>
      
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-datanilai" data-id="<?php echo $nilai->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-nilai" data-id="<?php echo $nilai->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
  }
?>