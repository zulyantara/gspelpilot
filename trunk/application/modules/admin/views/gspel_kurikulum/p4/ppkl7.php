 <?php $this->load->view('gspel_kurikulum/layout/headerb'); ?> 
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
<?php if ($groups == 'admin') { ?>

    <section class="content-header">
      <h1>Pengesahan </h1>
      <ol class="breadcrumb">
      <li class=''><a href=''>Home</a></li><li class='active'>Pengesahan</li></ol>   
    </section>

  <?php }else{ ?>

     <section class="content-header">
      <h1>Pengesahan PBKL </h1>
      <ol class="breadcrumb">
      <li class=''><a href=''>Home</a></li><li class='active'>Pengesahan PBKL</li></ol>   
    </section>

  <?php } ?>

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
  						<div class ="table table-responsive">
  	 <form action="<?php echo site_url('admin/Gspel_kurikulum/sah3');?>" id="myform" name="myform" method="post"> 
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
									<th colspan = "4">Sijil</th>
									<th rowspan = "2">Catatan PGN</th>
									<th rowspan = "2">Catatan PBKL</th>
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
									<th>SAEGM</th>
									<th>SPGM</th>
									<th>SKGM</th>
									<th>SMGM</th>
								</tr>
							</thead>
							<tbody>
			                <?php

			             //   print_r($moduldetail);die();
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
									<td><a href="<?php echo site_url('admin/Gspel_kurikulum/ppkl8/');?><?php echo $r->nama_penuh;?>/<?php echo $r->no_mykad;?>/<?php echo $r->no_pelatih;?>/<?php echo $r->gcpa;?>/<?php echo $r->kehadiran;?>/<?php echo $r->nama_kursus;?>/<?php echo $r->id_pelatih;?>/<?php echo $idSeq2; ?>"><?php echo $r->jumlah_modul_dihantar; ?></a></td>
									<td><?php echo $r->terampilya; ?></td>
									<td <?php if ($terampiltidak>1) echo 'style="border:3px solid #ff0000"'; ?>><?php echo $r->terampiltidak; ?></td>
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

									<?php if ($r->ppkl_sah != NULL || $r->ppkl_sah != '') { ?>

									<td>
									<?php if ($r->saegm1) {?>
									<img width="20px" height="20px" src="<?php echo base_url(); ?>/assets/images/tick.png">
									<input type="hidden" name="saegm1[<?php echo $no; ?>]" value="1">
									<?php } else {}?>
									</td>
									<td>
									<?php if ($r->spgm1) {?>
									<img width="20px" height="20px" src="<?php echo base_url(); ?>/assets/images/tick.png">
									<input type="hidden" name="spgm1[<?php echo $no; ?>]" value="1">
									<?php } else {}?>
									</td>
									<td>
									<?php if ($r->skgm1) {?>
									<img width="20px" height="20px" src="<?php echo base_url(); ?>/assets/images/tick.png">
									<input type="hidden" name="skgm1[<?php echo $no; ?>]" value="1">
									<?php } else {}?>
									</td>
									<td>
									<?php if ($r->smgm1) {?>
									<img width="20px" height="20px" src="<?php echo base_url(); ?>/assets/images/tick.png">
									<input type="hidden" name="smgm1[<?php echo $no; ?>]" value="1">
									<?php } else {}?>
									</td>
										
									<?php } else { ?>

									<td>
									<?php if ($r->saegm1  == "on" or $r->saegm1  == "1") {?>
									<input type="checkbox" name="saegm[<?php echo $no; ?>]" id="saegm" checked>
									<?php } else { ?>
									<input type="checkbox" name="saegm[<?php echo $no; ?>]" id="saegm" >
									<?php }?>
									</td>
									<td>
									<?php if ($r->spgm1 == "on" or $r->spgm1  == "1") {?>
									<input type="checkbox" name="spgm[<?php echo $no; ?>]" id="spgm"  checked >
									<?php } else { ?>
										<input type="checkbox" name="spgm[<?php echo $no; ?>]" id="spgm"  >
									<?php }?>
									</td>
									<td>
									<?php if ($r->skgm1  == "on" or $r->skgm1  == "1") {?>
									<input type="checkbox" name="skgm[<?php echo $no; ?>]" id="skgm"  checked>
									<?php } else { ?>
									<input type="checkbox" name="skgm[<?php echo $no; ?>]" id="skgm" >
									<?php }?>
									</td>
									<td>
									<?php if ($r->smgm == "on" or $r->smgm  == "1") { ?>
									<input type="checkbox" name="smgm[<?php echo $no; ?>]" id="smgm" checked>
									<?php } else { ?>
									<input type="checkbox" name="smgm[<?php echo $no; ?>]" id="smgm"  >
									<?php }?>	
									</td>

									<?php } ?>
									
							
									<td>
										<?php if ($r->catatan_pgn !='' || $r->catatan_pgn !=NULL ) { ?>
										<?php echo $r->catatan_pgn;?>
										<?php } else { ?>
									
									<?php	} ?>
									</td>
										<td>
										<?php if ($r->catatan_ppkl !='' || $r->catatan_ppkl !=NULL ) { ?>
										<?php echo $r->catatan_ppkl;?>
										<?php } else { ?>
									<input type="text" name="catatan[<?php echo $no; ?>]">
									<?php	} ?>
									</td>		
									<td>
									<?php 
									$s=$r->ppkl_sah;
									
									if ($r->bahagian_a == 1 && $r->bahagian_b == 1 && $r->pgn_sah != NULL && $r->pengurus_sah != NULL && $s == NULL) {  ?>
									<input type="checkbox" id="pilih" class="pilih" name="pilih[<?php echo $no; ?>]" value="<?php echo $no; ?>" >
									<input type="hidden" name="idsah[<?php echo $no; ?>]" value="<?php echo $r->id_pengurus_sah; ?>">
									<?php } else{ ?>
									<?php
									// var_dump($r->ppkl_sah);
									if ($r->ppkl_sah != NULL || $r->ppkl_sah != '') {
										echo date("d-m-Y", strtotime($r->ppkl_sah)); 
									} else {
										# code...
									}
									
									 ?>
									<?php }  ?>

									<input type="hidden" name="idsah[<?php echo $no; ?>]" value="<?php echo $r->id_pengurus_sah; ?>">
									<?php
									//}
									?>
									</td>
										
										<input type="hidden" name="idSeq" value="<?php echo $idSeq2; ?>">
										<input type="hidden" name="idpelatih[<?php echo $no; ?>]" value="<?php echo $r->id_pelatih; ?>">
								</tr>
								<?php    
									$no++;
									$ni++;
									endforeach; ?>
							</tbody>
						</table>
						</div>
						 <?php if ($groups == 'admin') { ?>
						 <?php }else{ ?>
						 <button type="submit" id="submit" class="btn" name="action" class="submit" value="simpan" style="background-color:#000063 "><font color="white" form="myform">Sahkan</font></button>
						 <?php } ?>
			
						   <a href="<?php echo site_url('admin/Gspel_kurikulum/ppkl2');?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>/<?php echo $negeri;?>" type="button" class="btn" name="action" value="hantar" style="background-color: #000063"><font color="white">Kembali Ke Halaman Sebelumnya </font></a>
					
				</form> 

		
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

