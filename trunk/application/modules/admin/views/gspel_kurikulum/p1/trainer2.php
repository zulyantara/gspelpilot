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

<?php if ($groups == 'admin') { ?>

 <div class="col-md-12">
    <div class="box ">
        <div class="panel panel-custom-horrible-red"  >
        <div class="panel-heading " >
          <h4 style="color: white">Carian</h4>
        </div>
          <div class="panel-body" >
        <form class="form-horizontal" action="<?php echo site_url('admin/Gspel_kurikulum/trainer3');?>" method="post">
        <fieldset>

           <div class="form-group">
          <label class="col-md-2">Negeri</label>
          <div class="col-md-4">
            <select id="negeri" name="negeri" class="form-control" required="required">
            <option value="" selected="selected">Sila Pilih</option>
              <?php
              foreach($negeri as $r){
              echo '<option value="'. $r->id.'">'. $r->nama_negeri .'</option>';
              }
            ?>
             </select>
          </div>
        </div>

         <div class="form-group">
          <label class="col-md-2">GIATMARA</label>
          <div class="col-md-4">
            <select id="giatmara" name="giatmara" class="form-control" required="required">
            <option value="" selected="selected">Sila Pilih</option>
             
             </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2">Kursus</label>
          <div class="col-md-4">
           <select name="kursus" id="kursus" class="form-control"  required="required">
            <option value="" selected="selected">Sila Pilih</option>
              </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2">Jenis Kursus</label>
          <div class="col-md-4">
            <select id="jeniskursus" name="jeniskursus" class="form-control" required="required">
           <!--  <option value="">Semua</option> -->
           <option value="" selected="selected">Sila Pilih</option>
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


 <?php }else{ ?>

 
	<div class="col-md-12">
		<div class="box ">
				<div class="panel panel-custom-horrible-red"  >
				<div class="panel-heading " >
					<h4 style="color: white">Carian</h4>
				</div>
  				<div class="panel-body" >
        <form class="form-horizontal" action="<?php echo site_url('admin/Gspel_kurikulum/trainer3');?>" method="post">
        <fieldset>
        <div class="form-group">
					  <label class="col-md-2">GIATMARA</label>
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
              <option value="">Sila Pilih</option>
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
              <option value="">Sila Pilih</option>
        <!--     <option value="">Semua</option> -->
						<option value="LPP04">LPP04</option>
						<option value="LPP09">LPP09</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2">Sesi Kemasukan</label>
          <div class="col-md-4">
            <select id="intake" name="intake" class="form-control" required="required">
              <option value="">Sila Pilih</option>
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

  <?php } ?>

</div>

<script type="text/javascript">
   var defOption ='<option value=""> Sila Pilih</option>';

$(document).ready(function() {
        $('select[name="negeri"]').on('change', function() {
            var BASE_URL = "<?php echo base_url();?>";
            var stateID = $(this).val();
            var e = document.getElementById("giatmara");
            if(stateID) {
                $.ajax({
                    url: '<?php echo base_url();?>admin/gspel_kurikulum/ajaxcoba3/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                       $('select[name="giatmara"]').empty();
                       $("#giatmara").prepend("<option value=''>Sila Pilih</option>").val('');
                      $.each(data, function(key, value) {
                          
                    // $("#giatmara option:selected").remove();
                      $('select[name="giatmara"]').append('<option value="'+ value.id +'">'+ value.nama_giatmara +'</option>');
                   
                    });

                    }
                });
                // console.log(stateID);
            }else{
            //  $('select[name="giatmara"]').empty();
            console.log(stateID);

            }
        });
    });



    $(document).ready(function() {
        $('select[name="giatmara"]').on('change', function() {
            var BASE_URL = "<?php echo base_url();?>";
           // $('#giatmara').html(defOption );
            var stateID = $(this).val();
            var e = document.getElementById("kursus");
            if(stateID) {
                $.ajax({
                    url: '<?php echo base_url();?>admin/gspel_kurikulum/ajaxcoba/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                     $('select[name="kursus"]').empty();
                     $("#kursus").prepend("<option value=''>Sila Pilih</option>").val('');
                      //$("#kursus option:selected").remove();
                      $.each(data, function(key, value) {

                      $('select[name="kursus"]').append('<option value="'+ value.id +'">'+ value.nama_kursus +'</option>');
                   
                    });

                    }
                });
                // console.log(stateID);
            }else{
             $('select[name="kursus"]').empty();
            console.log(stateID);

            }
        });
    });

$(document).ready(function() {
        $('select[name="kursus"]').on('change', function() {
            var BASE_URL = "<?php echo base_url();?>";
            // $('#kursus').html(defOption );
            var stateID = $(this).val();
            var e = document.getElementById("intake");
            if(stateID) {
                $.ajax({
                    url: '<?php echo base_url();?>admin/gspel_kurikulum/ajaxcoba2/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                      $('select[name="intake"]').empty();
                      $("#intake").prepend("<option value=''>Sila Pilih</option>").val('');
                      // $("#intake option:selected").remove();
                      $.each(data, function(key, value) {

                      $('select[name="intake"]').append('<option value="'+ value.id +'">'+ value.sesi +'</option>');
                   
                    });

                    }
                });
                // console.log(stateID);
            }else{
            //  $('select[name="giatmara"]').empty();
            console.log(stateID);

            }
        });
    });


</script>