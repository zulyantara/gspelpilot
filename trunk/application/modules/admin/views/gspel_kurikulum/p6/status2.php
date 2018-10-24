<?php 
// if ($groups == 'pelatih officer') {
//   $this->load->view('gspel_kurikulum/layout/header'); 

// } else if ($groups == 'pelatih officer'){
//   $this->load->view('gspel_kurikulum/layout/headera'); 

// } else if ($groups == 'pelatih officer'){
//   $this->load->view('gspel_kurikulum/layout/headerc'); 

// }else{
  $this->load->view('gspel_kurikulum/layout/headerb'); 

// }


?>
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

    <div class="content-wrapper">
    <section class="content-header">
      <h1>Status Penghantaran</h1>
      <ol class="breadcrumb">
  <li class=''><a href=''>Home</a></li><li class='active'>Status Penghantaran</li></ol>   </section>
    <section class="content">
      <div class="row">

  <div class="col-md-12">
    <div class="box">
        <div class="panel panel-info panel-custom-horrible-red">
        <div class="panel-heading panel-heading-custom">
          <h4 style="color: white" >Carian</h4>
        </div>
          <div class="panel-body">
        <form class="form-horizontal" action="<?php echo site_url('admin/Gspel_kurikulum/status2');?>" method="post">
        <fieldset>
           <div class="form-group">
          <label class="col-md-2">Negeri</label>
          <div class="col-md-4">
            <select id="negeri" name="negeri" class="form-control" required="required">
              <option value="" selected="selected">Sila Pilih</option>
                 <?php
              foreach($user5 as $r){ ?>
            <option selected="selected" value="<?php echo $r->id ?>">
            <?php
              echo  $r->nama_negeri ;
              }
            ?></option>
              <?php
              foreach($user5a as $r){
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
                 <?php
              foreach($user6a as $r){ ?>
            <option selected="selected" value="<?php echo $r->id ?>">
            <?php
              echo  $r->giatmara ;
              }
            ?></option>
              <?php
              foreach($user6 as $r){
              echo '<option value="'. $r->id.'">'. $r->giatmara .'</option>';
              }
            ?>
             </select>
          </div>
        </div>



        <div class="form-group">
          <label class="col-md-2">Kursus</label>
          <div class="col-md-4">
           <select id="kursus" name="kursus" class="form-control" required="required">
            <option value="" selected="selected">Sila Pilih</option>
              <?php
              foreach($user3a as $r){ ?>
            <option selected="selected" value="<?php echo $r->id ?>">
            <?php
              echo  $r->kursus ;
              }
            ?></option>
              <?php
              foreach($user3b as $r){
              echo '<option value="'. $r->id.'">'. $r->kursus .'</option>';
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
           
           <option value="LPP09" <?php if ($jeniskursus == "LPP09") {
              echo "selected";
            } ?> >LPP09</option>
           <option value="LPP04" <?php if ($jeniskursus == "LPP04") {
              echo "selected";
            } ?> >LPP04</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2">Sesi Kemasukan</label>
          <div class="col-md-4">
              <select id="intake" name="intake" class="form-control" required="required">
                <option value="" selected="selected">Sila Pilih</option>
          <?php
              foreach($user4a as $r){ ?>
            <option selected="selected" value="<?php echo $r->id ?>">
            <?php
              echo  $r->sesi ;
              }
            ?></option>

              <?php
              foreach($user4b as $r){
              echo '<option value="'. $r->id.'">'. $r->sesi .'</option>';
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

<div class="row" id="one">
	<div class="col-md-12">
		<div class="box ">
				<div class="panel panel-info panel-custom-horrible-red">
				<div class="panel-heading panel-heading-custom panel-custom-horrible-red">
					<h4 style="color:white">Status Pemarkahan Modul Sepenuh Masa</h4>
				</div>
    			<div class="panel-body" >
  					<div class ="table table-responsive" >
  						<table class ="table table-hover table-striped table-bordered" id = "myTable" style="margin: 0px auto;">
  							<thead style ="background-color:#b3b3b3">
  								<tr>
  									<th rowspan = "2">Bil</th>
  									<th rowspan = "2">Nama Pelatih</th>
  									<th rowspan = "2">No. MyKAD</th>
  									<th rowspan = "2">No. Pelatih</th>
  									<th colspan = "2">Skrin TP</th>
  									<th rowspan = "2">Skrin Pengurus</th>
  									<th rowspan = "2">Skrin PGN</th>
  									<th rowspan = "2">Skrin PBKL</th>
                   
  									
  								</tr>
  								<tr>
  									<th>Bhgn. A</th>
  									<th>Bhgn. B</th>
                   
    							</tr>
  							</thead>
  							<tbody>
  								<?php
  								// var_dump($moduldetail);die();
								$ni =1;
								
								foreach($moduldetail as $r) :
								?>
  								<tr>
									<td><?php echo $ni++; ?></td>
									<td><?php echo $r->nama_penuh; ?></td>
									<td><?php echo $r->no_mykad; ?></td>
									<td><?php echo $r->no_pelatih; ?></td>
									<td><?php echo $r->jumlah_dihantar."/".$r->jumlah_modul; ?></td>
									<td><?php echo $r->jumlah_dihantar2."/1";?></td>
									<td><?php if($r->pengurus_sah == "0000-00-00 00:00:00" || $r->pengurus_sah == NULL || $r->pengurus_sah == '' ) {
									
                 
									} else {
									 echo 'Sah ' . date("d-m-Y", strtotime($r->pengurus_sah));
									}
									 ?></td>
									<td><?php 
									//var_dump($r->pengurus_pgn);die();
									if ($r->pengurus_pgn == "0000-00-00 00:00:00" || $r->pengurus_pgn == NULL || $r->pengurus_pgn == '') {
									
									} else {
										echo 'Sah ' .  date("d-m-Y", strtotime($r->pengurus_pgn)) ;
									}
									 ?></td>
									<td><?php if ($r->pengurus_ppkl == "0000-00-00 00:00:00" || $r->pengurus_ppkl == NULL || $r->pengurus_ppkl == '' ) {
									
									} else {
										echo 'Sah '. date("d-m-Y", strtotime($r->pengurus_ppkl)) ;
									}
									 ?></td>
                  
								</tr>
								<?php    
									//$no++;
									//$ni++;
									endforeach; ?>
  							</tbody>
  						</table>
  					</div>
      			</div>
  			</div>
		</div>
	</div>
</div>
</section>
</div>
<?php $this->load->view('gspel_kurikulum/layout/footer'); ?>
<script type="text/javascript">
  $(document).ready(function() {
    $('#myTable').DataTable();
});
  
   $.fn.dataTableExt.sErrMode = 'throw'
</script>
<script type="text/javascript">
  var defOption ='<option value=""> Sila Pilih</option>';
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
                      $.each(data, function(key, value) {

                      $('select[name="kursus"]').append('<option value="'+ value.id +'">'+ value.nama_kursus +'</option>');
                   
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

$(document).ready(function() {
        $('select[name="negeri"]').on('change', function() {
            var BASE_URL = "<?php echo base_url();?>";
            // $('#kursus').html(defOption );
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


</script>
