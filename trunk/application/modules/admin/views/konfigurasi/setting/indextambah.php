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
          <h4 style="color: white">Tambah Tawaran Kursus</h4>
        </div>
          <div class="panel-body" >
        <form class="form-horizontal" action="<?php echo site_url('admin/Konfigurasi_kurikulum/tambahtawaran/'.$kluster.'/'.$kursus.'/'.$intake);?>" method="post">
        <fieldset>
      
         <div class="form-group">
          <label class="col-md-2">KLUSTER</label>
          <div class="col-md-4">
            <!--select id="kluster" name="kluster" class="form-control" required="required">
			<option value="" selected="selected">Sila Pilih</option-->
			<?php

            foreach($klusterpilih as $k){
             // echo '<option value="'. $k->id.'" selected>'. $k->nama_kluster .'</option>';
			 echo strtoupper($k->nama_kluster);
              }
            ?>
             <?php
              /*foreach($kluster2 as $p){
              echo '<option value="'. $p->id.'">'. $p->nama_kluster .'</option>';
              }*/
            ?>
			 <!--/select-->
          </div>
        </div>
 
		<div class="form-group">
          <label class="col-md-2">KURSUS</label>
          <div class="col-md-4">
          <!--select id="kursus" name="kursus" class="form-control" required="required"-->
              <?php

            foreach($kursuspilih as $r){
              //echo '<option value="'. $r->id.'" selected>'. $r->nama_kursus .'</option>';
			  echo strtoupper($r->nama_kursus);
              }
            ?>
             <?php
              /*foreach($kursus2 as $p){
              echo '<option value="'. $p->id.'">'. $p->nama_kursus .'</option>';
              }*/
            ?>
             
             <!--/select-->
          </div>
        </div>

		<div class="form-group">
          <label class="col-md-2">SESI</label>
          <div class="col-md-4">
          <!--select id="intake" name="intake" class="form-control" required="required"-->
            <?php
			foreach($intakepilih as $r){
              //echo '<option value="'. $r->id.'" selected>'. strtoupper($r->nama_intake) .'</option>';
			  echo strtoupper($r->nama_intake);
            }
            ?>
             <?php
              /*foreach($intake2 as $p){
              echo '<option value="'. $p->id.'">'. strtoupper($p->nama_intake) .'</option>';
              }*/
            ?>
             
             <!--/select-->
          </div>
        </div>
<!-- form------------------------------------------------------------------------------------------------------------>
<div class="form-group">
          <label class="col-md-2">NEGERI</label>
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
<!------------------------------------------------------------------------------------------------------------------------->
        <div class="form-group">
          <div class="col-md-2"></div>
          <div class="col-md-4">
            <input id="simpan" name="simpan" type="submit" class="btn" style="background-color: #000063;color:white" value="Tambah">
		  </div>
        </div>

        </fieldset>
        </form>
      </div>
    </div>

</div>

  </div>

</div>
<!--------------------------------------VIEW------------------------------------------------------------------------------------------------->
<div class="row" id="one" >
  <div class="col-md-12">
    <div class="box">

      <div class="panel panel-info panel-custom-horrible-red">
          <div class="panel-heading panel-heading-custom">
            <h4 style="color: white">Senarai GIATMARA Dipilih</h4>
          </div>

            <div class="panel-body">
            <div class ="table table-responsive">


            <table class ="table table-hover table-striped table-bordered" id = "myTable">
              <thead style ="background-color:#b3b3b3" style="text-align: center;">
                <tr style="text-align: center;">
                 <th style="text-align: center;">Bil</th>
                 <th style="text-align: center;">Negeri</th>
                 <th style="text-align: center;">Pusat GIATMARA</th>
                 <th style="text-align: center;">Tindakan</th>
                </tr>
              </thead>
              <tbody>
                <?php

               $no =1;

               
                foreach ($senaraipusat as $p) { ?>
                <tr>
					<td align="center"><?php echo $no; ?></td>
					<td><?php echo $p->nama_negeri;?></td>
					<td><?php echo $p->nama_giatmara;?></td>
					<form class="form-horizontal" action="<?php echo site_url('admin/Konfigurasi_kurikulum/padamtawaran/'.$kluster.'/'.$kursus.'/'.$intake.'/'.$p->stkid);?>" method="post">
					<td align="center"><button id="edit" name="edit" type="submit" class="btn" style="background-color: #000063"><font color="white">Padam</font></button></td>
					</form>
                </tr>
                 <?php  
                 $no++;} ?>
     
              </tbody>
                </table>
          </div>
          <!--  <a href="<?php //echo site_url('admin/Konfigurasi_kurikulum/createmodul');?>/<?php //echo $kluster2;?>/<?php //echo $kursus;?>" class="btn pull-right" type="btu" name="action" value="kembali" style="background-color:#000063; width:150px; height:40px; "><font color="white">Tambah</font></a> -->
          </div>
          </td>
                 </tr>
      
               </table>
          </div>
      </div>
    </div>
    </div>
</section>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#myTable').DataTable();
});
  
   $.fn.dataTableExt.sErrMode = 'throw'
</script>
<script type="text/javascript">
  $(document).ready(function() {
        $('select[name="kluster"]').on('change', function() {
            var BASE_URL = "<?php echo base_url();?>";
            var stateID = $(this).val();
            var e = document.getElementById("kursus");
            if(stateID) {
                $.ajax({
                    url: '<?php echo base_url();?>admin/Konfigurasi_kurikulum/ajaxkursus/'+stateID,
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
        });
    });


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
</script>

