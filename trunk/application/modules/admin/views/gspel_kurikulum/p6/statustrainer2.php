<?php 

  $this->load->view('gspel_kurikulum/layout/header'); 

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
        <div class="panel panel-info panel-custom-horrible-red ">
        <div class="panel-heading panel-heading-custom">
          <h4 style="color: white">Carian</h4>
        </div>
          <div class="panel-body">
        <form class="form-horizontal" action="<?php echo site_url('admin/Gspel_kurikulum/statustrainer2');?>" method="post">
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
  									 <th colspan = "3">Borang</th>
  								</tr>
  								<tr>
  									<th>Bhgn. A</th>
  									<th>Bhgn. B</th>
                     <th>02</th>
                     <th>03</th>
                  <th>04</th>
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
									 <td><a href="<?php echo site_url('admin/Gspel_kurikulum/borang2/');?><?php echo $r->id_set;?>"  target="_blank"><img width="20px" height="20px" src="<?php echo base_url(); ?>/assets/images/ujian.png"></a></td>
                  <td><a href="<?php echo site_url('admin/Gspel_kurikulum/borang3/');?><?php echo $r->id_ref_kursus;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_pelatih;?>/<?php echo $r->id_permohonan_butir_peribadi;?>/<?php echo $r->id_set;?>"  target="_blank"><img width="20px" height="20px" src="<?php echo base_url(); ?>/assets/images/ujian.png"></a></td>
                    <td><a href="<?php echo site_url('admin/Gspel_kurikulum/borang4/');?><?php echo $r->id_intake;?>/<?php echo $r->id_ref_kursus;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_set;?>"  target="_blank"><img width="20px" height="20px" src="<?php echo base_url(); ?>/assets/images/ujian.png"></a></td>
                  
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
