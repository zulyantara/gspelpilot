<?php $this->load->view('gspel_kurikulum/layout/headera'); ?>
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
			<h1>Pengesahan Pengurus</h1>
			<ol class="breadcrumb">
	<li class=''><a href=''>Home</a></li><li class='active'>Pengesahan Pengurus</li></ol>		
	</section>
		<section class="content">
			<div class="row">

</div>

<div class="row" id="one" >
	<div class="col-md-12">
		<div class="box">

      <div class="panel panel-info panel-custom-horrible-red">
  				<div class="panel-heading panel-heading-custom">
  					<h4 style="color: white"> Pemarkahan Modul Sepenuh Masa Kursus <?php  
  						 foreach($namakursus as $r) :
  						 	echo $r->nama_kursus;
			                	endforeach;
  					?></h4>
  				</div>
    				<div class="panel-body">
  						
  	 <form action="<?php echo site_url('admin/Gspel_kurikulum/sah1');?>" id="myform" name="myform" method="post"> 
  	 	<div class ="table table-responsive">
						<table class ="table table-hover table-striped table-bordered" id = "myTable">
							<thead style ="background-color:#b3b3b3">
								<tr>
									<th rowspan = "2">Bil</th>
									<th rowspan = "2">Pelatih</th>
									<th rowspan = "2">No. MyKAD</th>
									<th rowspan = "2">No. Pelatih</th>
									<th rowspan = "2">CGPA</th>
									<th rowspan = "2">Kehadiran</th>
										<th rowspan = "2">PUJI</th>
									<th rowspan = "2">Jumlah Modul Dihantar</th>
									<th colspan="2">Terampil</th>
									<th colspan = "2">Bahagian</th>
									<th colspan = "3">Borang</th>
									<th colspan = "1">Sijil</th>
									<th rowspan = "2">Pengesahan</th>
								</tr>
								<tr>
									<th>Ya</th>
									<th>Belum</th>
									<th>A</th>
									<th>B</th>
									<th>02</th>
									<th>03</th>
									<th>04</th>
									
									<th>SKLGM</th>
								<!-- 	<th>SMGM</th> -->
								</tr>
							</thead>
							<tbody>
			                <?php
			                
			                $ni=1;
			                $no =0;
			                if($moduldetail)
			                foreach($moduldetail as $r) : 

			                	?>							
								<tr>
									<td><?php echo $ni; ?></td>
									<td><?php echo $r->nama_penuh; ?></td>
									<td><?php echo $r->no_mykad; ?></td>
									<td><?php echo $r->no_pelatih; ?></td>
									<td <?php if ($r->gcpa < 2.00) { ?>
					                  style="border:3px solid #ff0000" 
					                  <?php } else { ?>
					                    
					                  <?php }
					                   ?>
					                
					                  ><?php echo $r->gcpa; ?>
                   					</td>
									<td <?php if ($r->kehadiran < 80) { ?>
					                  style="border:3px solid #ff0000" 
					                  <?php } else { ?>
					                  <?php }
					                   ?>
					                   >
					                    <?php echo $r->kehadiran ?></td>
									 <td <?php if ($r->puji == "1") { ?>
					                  style="border:3px solid #ff0000" 
					                  <?php } else { ?>
					                  <?php }
					                   ?>
					                   >
					                  <?php if( $r->puji == "0" ){ echo "TERAMPIL";}
					                   else{echo "BELUM TERAMPIL";}
					                    ?>              
					                  </td>
									<td><a href="<?php echo site_url('admin/Gspel_kurikulum/approval8/');?><?php echo $r->nama_penuh;?>/<?php echo $r->no_mykad;?>/<?php echo $r->no_pelatih;?>/<?php echo $r->gcpa;?>/<?php echo $r->kehadiran;?>/<?php echo $r->nama_kursus;?>/<?php echo $r->id_pelatih;?>/<?php echo $idSeq2; ?>"><?php echo $r->jumlah_modul_dihantar; ?></a></td>
									<td><?php echo $r->terampilya; ?></td>
									<td><?php echo $r->terampiltidak; ?></td>
									<td>
									<?php if ($r->bahagian_a == 0 || $r->bahagian_a == NULL ) { ?>
										<img width="20px" height="20px" src="<?php echo base_url(); ?>/assets/images/silang.png">
									<?php } else { ?>
										<img width="20px" height="20px" src="<?php echo base_url(); ?>/assets/images/tick.png">
									<?php }
									 ?>
									</td>
									<td>
									<?php if ($r->bahagian_b == 0 || $r->bahagian_b == NULL ) { ?>
										<img width="20px" height="20px" src="<?php echo base_url(); ?>/assets/images/silang.png">
									<?php } else { ?>
									<img width="20px" height="20px" src="<?php echo base_url(); ?>/assets/images/tick.png">
									<?php }
									 ?>
									</td>
									<td><a href="<?php echo site_url('admin/Gspel_kurikulum/borang2/');?><?php echo $r->id_kursus;?>/<?php echo $r->id_giatmara;?>"  target="_blank"><img width="20px" height="20px" src="<?php echo base_url(); ?>/assets/images/ujian.png"></a></td>
									<td><a href="<?php echo site_url('admin/Gspel_kurikulum/borang3/');?><?php echo $r->id_ref_kursus;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_pelatih;?>/<?php echo $r->id_permohonan_butir_peribadi;?>/<?php echo $r->id_kursus;?>"  target="_blank"><img width="20px" height="20px" src="<?php echo base_url(); ?>/assets/images/ujian.png"></a></td>
									<td><a href="<?php echo site_url('admin/Gspel_kurikulum/borang4/');?><?php echo $r->id_intake;?>/<?php echo $r->id_ref_kursus;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>"  target="_blank"><img width="20px" height="20px" src="<?php echo base_url(); ?>/assets/images/ujian.png"></a></td>
									<!-- <td>
									<img width="20px" height="20px" src="<?php //echo base_url(); ?>/assets/images/tick.png">
									</td> -->
									<td>
									<?php if ($r->sklgm == 1) { ?>
									<img width="20px" height="20px" src="<?php echo base_url(); ?>/assets/images/tick.png">
									<input type="hidden" name="sijil" value="sklgm">
									<?php 
									} else {}
									?>
									</td>
									<td>
									<?php if ($r->status_isi_markah == 2) { ?>
									<input type="checkbox" id="pilih" class="pilih" name="pilih[<?php echo $no; ?>]" value="<?php echo $no; ?>" >
									<input type="hidden" name="idsah[<?php echo $no; ?>]" value="<?php echo $r->id_pengurus_sah; ?>">
									<?php } else if($r->status_isi_markah == 4){ ?>
									<?php
									// var_dump($r->pgn_sah);
									if ($r->pengurus_sah != NULL || $r->pengurus_sah != '') {
										echo date("d-m-Y", strtotime($r->pengurus_sah)); 
									} else {
										# code...
									}
									
									 ?>
									<?php } else { ?>
									<input type="hidden" name="idsah[<?php echo $no; ?>]" value="<?php echo $r->id_pengurus_sah; ?>">
									<?php
									}
									?>
									</td>
										
										<input type="hidden" name="idSeq" value="<?php  echo $idSeq2;  ?>">
										<input type="hidden" name="idpelatih[<?php echo $no; ?>]" value="<?php echo $r->id_pelatih; ?>">
								</tr>
								<?php    
									$no++;
									$ni++;
									endforeach; ?>
							</tbody>
						</table>
						</div>

						   <button type="submit" id="submit" class="btn" name="action" class="submit" value="simpan" style="background-color:#000063 "><font color="white" form="myform">Sahkan</font></button>
						     <a href="<?php echo site_url('admin/Gspel_kurikulum/approval2');?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>" type="button" class="btn" name="action" value="hantar" style="background-color: #000063"><font color="white">Kembali Ke Halaman Sebelumnya </font></a>
					
				</form> 

		</div>
	</div>
</div>
</di>
</section>
</div>

<?php $this->load->view('gspel_kurikulum/layout/footer'); ?>

<script type="text/javascript">
	 $(document).ready(function() {
    $("#myform").submit(function() {
    var cb = $("input#pilih");
    if (cb.is(":checked")) {
   return true; 
        } else {
            alert("Klik checkbox pada pelatih yang ingin disahkan.");
            return false;
        }
      
    });

});

</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#myTable').DataTable();
});
</script>