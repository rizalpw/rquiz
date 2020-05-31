<div class="col-md-12 well">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;"><i class="fa fa-location-arrow"></i> List nilai (Dari kuis: <b><?php echo $kuis->nama; ?></b>)</h3>

  <div class="box box-body">
      <table id="tabel-detail" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>id</th>
            <th>username</th>
            <th>password</th>
            <th>Nama</th>
            <th>Foto</th>
          </tr>
        </thead>
        <tbody id="data-nilai">
          <?php
            foreach ($datauser as $user) {
              ?>
              <tr>
                <td style="min-width:230px;"><?php echo $user->user; ?></td>
                <td><?php echo $user->id; ?></td>
                <td><?php echo $nilai->username; ?></td>
                <td><?php echo $nilai->password; ?></td>
                <td><?php echo $nilai->nama; ?></td>
                <td><?php echo $nilai->foto; ?></td>
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