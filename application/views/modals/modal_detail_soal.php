<div class="col-md-12 well">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;"><i class="fa fa-briefcase"></i> List nilai (soal: <b><?php echo $soal->nama; ?></b>)</h3>

  <div class="box box-body">
      <table id="tabel-detail" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Nama</th>
            <th>No Telp</th>
            <th>Asal kuis</th>
            <th>Jenis level</th>
          </tr>
        </thead>
        <tbody id="data-nilai">
          <?php
            foreach ($datasoal as $nilai) {
              ?>
              <tr>
                <td style="min-width:230px;"><?php echo $nilai->nilai; ?></td>
                <td><?php echo $nilai->telp; ?></td>
                <td><?php echo $nilai->kuis; ?></td>
                <td><?php echo $nilai->level; ?></td>
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