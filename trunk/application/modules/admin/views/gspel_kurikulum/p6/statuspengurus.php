<style type="text/css">
  
  .panel-custom-horrible-red {
    border-color:  #000063 ;
}
.panel-custom-horrible-red > .panel-heading {
    background:  #000063 ; 
    color:  #000063 ;
    border-color:  #000063  ;
}
</style>
<div class="row">

  <div class="col-md-12">
    <div class="box ">
        <div class="panel panel-custom-horrible-red"  >
        <div class="panel-heading " >
          <h4 style="color: white">Carian</h4>
        </div>
          <div class="panel-body" >
        <form class="form-horizontal" action="<?php echo site_url('admin/Gspel_kurikulum/statuspengurus2');?>" method="post">
        <fieldset>
        <div class="form-group">
            <label class="col-md-2">Giatmara</label>
              <div class="col-md-4">
                <?php
                foreach($user2 as $r){
                echo $r->giatmara;
                echo "<input name='giatmara' value='$r->id' type='hidden'>";
          }
              ?>
            </div>
          </div>

        <div class="form-group">
          <label class="col-md-2">Kursus</label>
          <div class="col-md-4">
            <select id="kursus" name="kursus" class="form-control" required="required">
                <option value="" selected="selected">Sila Pilih</option>
              <?php
              foreach($user3 as $r){
              echo '<option value="'. $r->id.'">'. $r->nama_kursus .'</option>';
              }
            ?>
             </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2">Jenis Kursus</label>
          <div class="col-md-4">
            <select id="jeniskursus" name="jeniskursus" class="form-control" required="required">
                <option value="" selected="selected">Sila Pilih</option>
           <!--  <option value="">Semua</option> -->
            <option value="LPP04">LPP04</option>
            <option value="LPP09">LPP09</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2">Sesi Kemasukan</label>
          <div class="col-md-4">
            <select id="intake" name="intake" class="form-control" required="required">
                <option value="" selected="selected">Sila Pilih</option>
              <?php
              foreach($user4 as $r){
              echo '<option value="'. $r->id.'">'. $r->nama_intake .'</option>';
              }
            ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-2"></div>
          <div class="col-md-4">
            <button id="paparkan" name="paparkan" type="submit" class="btn" style="background-color: #000063  "><font color="white">Paparkan</font></button>
          </div>
        </div>

        </fieldset>
        </form>
      </div>
    </div>

</div>

  </div>

</div>
