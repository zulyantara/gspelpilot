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
        <form class="form-horizontal" action="<?php echo site_url('admin/Konfigurasi_kurikulum/aturtawaran2');?>" method="post">
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
          <select id="kursus" name="kursus" class="form-control" required="required">
              <option value="" selected="selected">Sila Pilih</option>
             
             </select>
          </div>
        </div>

    <div class="form-group">
          <label class="col-md-2">Sesi</label>
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

</div>

<script type="text/javascript">
  $(document).ready(function() {
        $('select[name="negeri"]').on('change', function() {
            var BASE_URL = "<?php echo base_url();?>";
            var stateID = $(this).val();
            var e = document.getElementById("negeri");
            if(stateID) {
                $.ajax({
                    url: '<?php echo base_url();?>admin/Konfigurasi_kurikulum/ajaxgiatmara/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                       $('select[name="giatmara"]').empty();
                       $("#giatmara").prepend("<option value=''>Sila Pilih</option>").val('');
                      $.each(data, function(key, value) {
                    
                      $('select[name="giatmara"]').append('<option value="'+ value.id +'">'+ value.nama_giatmara +'</option>');
                   
                    });

                    }
                });
               
            }else{
        
            console.log(stateID);

            }

               console.log(stateID);

        });
    });



  $(document).ready(function() {
        $('select[name="giatmara"]').on('change', function() {
            var BASE_URL = "<?php echo base_url();?>";
            var stateID = $(this).val();
            var e = document.getElementById("giatmara");
            if(stateID) {
                $.ajax({
                    url: '<?php echo base_url();?>admin/Konfigurasi_kurikulum/ajaxkursus2/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                       $('select[name="kursus"]').empty();
                       $("#kursus").prepend("<option value=''>Sila Pilih</option>").val('');
                      $.each(data, function(key, value) {
                    
                      $('select[name="kursus"]').append('<option value="'+ value.id +'">'+ value.nama_kursus +'</option>');
                   
                    });

                    }
                });
               
            }else{
        
            console.log(stateID);

            }

               console.log(stateID);

        });
    });


   $(document).ready(function() {
        $('select[name="kursus"]').on('change', function() {
            var BASE_URL = "<?php echo base_url();?>";
            var stateID = $(this).val();
            var e = document.getElementById("kursus");
            if(stateID) {
                $.ajax({
                    url: '<?php echo base_url();?>admin/Konfigurasi_kurikulum/ajaxintake/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                       $('select[name="intake"]').empty();
                       $("#intake").prepend("<option value=''>Sila Pilih</option>").val('');
                      $.each(data, function(key, value) {
                    
                      $('select[name="intake"]').append('<option value="'+ value.id +'">'+ value.nama_intake +'</option>');
                   
                    });

                    }
                });
               
            }else{
        
            console.log(stateID);

            }

               console.log(stateID);

        });
    });


</script>