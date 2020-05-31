<?php
  $no = 1;
  foreach ($datakuis as $kuis) {
    ?>
    <tr>
      <td><?php echo $kuis->id; ?></td>
      <td><?php echo $kuis->nama; ?></td>
      <td><?php echo $kuis->tanggal; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-datakuis" data-id="<?php echo $kuis->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-kuis" data-id="<?php echo $kuis->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
          <button class="btn btn-info detail-datakuis" data-id="<?php echo $kuis->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>