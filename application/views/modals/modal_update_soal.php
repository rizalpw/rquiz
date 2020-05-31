<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data soal</h3>

  <form id="form-update-soal" method="POST">
    <input type="hidden" name="id" value="<?php echo $datasoal->id; ?>">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      
      <input type="text" class="form-control" name="soal" aria-describedby="sizing-addon2" value="<?php echo $datasoal->isi; ?>">
      <input type="text" class="form-control" name="benar" aria-describedby="sizing-addon2" value="<?php echo $datasoal->pilihan_benar; ?>">
      <input type="text" class="form-control" name="salah_1" aria-describedby="sizing-addon2" value="<?php echo $datasoal->pilihan_salah_1; ?>">
      <input type="text" class="form-control" name="salah_2" aria-describedby="sizing-addon2" value="<?php echo $datasoal->pilihan_salah_2; ?>">
      <input type="text" class="form-control" name="salah_3" aria-describedby="sizing-addon2" value="<?php echo $datasoal->pilihan_salah_3; ?>">
      <input type="text" class="form-control" name="salah_4" aria-describedby="sizing-addon2" value="<?php echo $datasoal->pilihan_salah_4; ?>">
      <input type="text" class="form-control" name="kuis" aria-describedby="sizing-addon2" value="<?php echo $datasoal->kuis_id; ?>">
      <select name="kuis" class="form-control select2"  aria-describedby="sizing-addon2">
            <?php
            foreach ($datakuis as $kuis) {
              ?>
              <option value="<?php echo $kuis->id; ?>" <?php if($kuis->id == $datasoal->kuis_id){echo "selected='selected'";} ?>><?php echo $kuis->nama; ?></option>
              <?php
            }
            ?>
          </select>
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>

