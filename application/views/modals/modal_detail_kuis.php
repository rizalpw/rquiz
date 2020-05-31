<div class="col-md-12 well">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;"><i class="fa fa-location-arrow"></i> List nilai (Dari kuis: <b><?php echo $kuis->nama; ?></b>)</h3>

  <div class="box box-body">
      <table id="tabel-detail" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Nama</th>
            <th>No Telp</th>
            <th>Jenis level</th>
            <th>soal</th>
          </tr>
        </thead>
        <tbody id="data-nilai">
          <?php
            foreach ($datakuis as $nilai) {
              ?>
              <tr>
                <td style="min-width:230px;"><?php echo $nilai->nilai; ?></td>
                <td><?php echo $nilai->telp; ?></td>
                <td><?php echo $nilai->level; ?></td>
                <td><?php echo $nilai->soal; ?></td>
              </tr>
              <?php
            }
          ?>
        </tbody>
      </table>
  </div>

  <div class="text-right">
    <button class="btn btn-danger" data-dismiss="modal"> Close</button>
  </div>
</div>