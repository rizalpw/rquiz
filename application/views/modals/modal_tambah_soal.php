<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data soal</h3>

  <form id="form-tambah-soal" method="POST">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Isi soal" name="soal" aria-describedby="sizing-addon2">
      <input type="text" class="form-control" placeholder="pilihan benar" name="benar" aria-describedby="sizing-addon2">
      <input type="text" class="form-control" placeholder="Pilihan salah 1" name="salah1" aria-describedby="sizing-addon2">
      <input type="text" class="form-control" placeholder="Pilihan salah 2" name="salah2" aria-describedby="sizing-addon2">
      <input type="text" class="form-control" placeholder="Pilihan salah 3" name="salah3" aria-describedby="sizing-addon2">
      <input type="text" class="form-control" placeholder="Pilihan salah 4" name="salah4" aria-describedby="sizing-addon2">
      <select name="kuis" class="form-control select2" aria-describedby="sizing-addon2">
        <?php
        foreach ($datakuis as $kuis) {
          ?>
          <option value="<?php echo $kuis->id; ?>">
            <?php echo $kuis->nama; ?>
          </option>
          <?php
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>