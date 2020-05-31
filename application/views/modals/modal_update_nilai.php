<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data nilai</h3>

  <form id="form-update-nilai" method="POST">
    <input type="hidden" name="id" value="<?php echo $datanilai->id; ?>">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      
      
      <select name="user" class="form-control select2"  aria-describedby="sizing-addon2">
            <?php
            foreach ($datauser as $user) {
              ?>
              <option value="<?php echo $user->id; ?>" <?php if($user->id == $datanilai->user_id){echo "selected='selected'";} ?>><?php echo $user->nama; ?></option>
              <?php
            }
            ?>
          </select>
    
    <select name="kuis" class="form-control select2"  aria-describedby="sizing-addon2">
            <?php
            foreach ($datakuis as $kuis) {
              ?>
              <option value="<?php echo $kuis->id; ?>" <?php if($kuis->id == $datanilai->kuis_id){echo "selected='selected'";} ?>><?php echo $kuis->nama; ?></option>
              <?php
            }
            ?>
          </select>
    

    <input type="text" class="form-control" name="hasil" aria-describedby="sizing-addon2" value="<?php echo $datanilai->hasil; ?>">
    <input type="text" class="form-control" name="jawaban" aria-describedby="sizing-addon2" value="<?php echo $datanilai->jawaban; ?>">

    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>

