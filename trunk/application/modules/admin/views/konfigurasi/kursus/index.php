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
        <form class="form-horizontal" action="<?php echo site_url('admin/Konfigurasi_kurikulum/aturkursus2');?>" method="post">
        <fieldset>
        <div class="form-group">
					  <label class="col-md-2">STATUS</label>
              <div class="col-md-4">
						<select id="statuskursus" name="statuskursus" class="form-control" required="required">
      
            <option value="1">Aktif</option>
            <option value="2">Tidak Aktif</option>
            </select>
	          </div>
	        </div>


         <?php 
         //var_dump($groups);die();

         if ($groups == 'ketua kluster') { ?>

        <div class="form-group">
          <label class="col-md-2">KLUSTER</label>
          <div class="col-md-4">
            <select id="kluster" name="kluster" class="form-control" required="required">
             <!--  <option value="" selected="selected">Sila Pilih</option> -->
              <?php
              foreach($ketuakluster as $r){
              echo '<option value="'. $r->id.'">'. $r->nama_kluster .'</option>';
              }
            ?>
             </select>
          </div>
        </div>

         <?php }else{ ?>

      <div class="form-group">
          <label class="col-md-2">KLUSTER</label>
          <div class="col-md-4">
            <select id="kluster" name="kluster" class="form-control" required="required">
              <option value="" selected="selected">Sila Pilih</option>
              <?php
              foreach($kluster as $r){
              echo '<option value="'. $r->id.'">'. $r->nama_kluster .'</option>';
              }
            ?>
             </select>
          </div>
        </div>

         <?php } ?>
         <!--   <div class="form-group">
          <label class="col-md-2">Kod / Nama Kursus</label>
          <div class="col-md-6">
           <input type="text" name="kursus" id="kursus" style="width:65%;height: 30px">
          </div>
        </div>
 -->
    
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
