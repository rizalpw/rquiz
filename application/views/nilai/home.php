<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">

  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>id</th>
          <th>user</th>
          <th>kuis</th>
          <th>hasil</th>
          <th>jawaban</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-nilai">

      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_nilai; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-datanilai', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'nilai';
  $data['url'] = 'nilai/import';
  echo show_my_modal('modals/modal_import', 'import-nilai', $data);
?>