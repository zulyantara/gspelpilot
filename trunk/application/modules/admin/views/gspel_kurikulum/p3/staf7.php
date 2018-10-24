<?php $this->load->view('gspel_kurikulum/layout/headerc'); ?>
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
			<h1>Pengesahan PGN</h1>
			<ol class="breadcrumb">
	<li class=''><a href=''>Home</a></li><li class='active'>Pengesahan PGN</li></ol>		
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
  						<div class ="table table-responsive">
  	 <form action="<?php echo site_url('admin/Gspel_kurikulum/sah2');?>" id="myform" name="myform" method="post"> 
						<table class ="table table-hover table-striped table-bordered" id = "myTable">
							<thead style ="background-color:#b3b3b3;color:#00000">
								<tr>
									<td rowspan = "2">Bil</th>
									<td rowspan = "2">Nama Pelatih</th>
									<td align="center" rowspan = "2">No. MyKAD</th>
									<td align="center" rowspan = "2">No. Pelatih</th>
									<td align="center" rowspan = "2">GCPA</th>
									<td align="center" rowspan = "2">Kehadiran<br>(100%)</th>
									<td align="center" rowspan = "2">PUJI</th>
									<td align="center" rowspan = "2">Jumlah Modul Dihantar</th>
									<td align="center" colspan="2">Terampil</th>
									<td align="center" colspan = "2">Bahagian</th>
									<td align="center" colspan = "3">Borang</th>
									<td align="center" colspan = "4">Sijil</th>
									<td align="center" rowspan = "2">Catatan</th>
									<td align="center" rowspan = "2">Pengesahan</th>
								</tr>
								<tr>
									<td align="center">Ya</th>
									<td align="center">Belum</th>
									<td align="center">A</th>
									<td align="center">B</th>
									<td align="center">02</th>
									<td align="center">03</th>
									<td align="center">04</th>
									<td align="center">SAEGM</th>
									<td align="center">SPGM</th>
									<td align="center">SKGM</th>
									<td align="center">SMGM</th>
													
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
									<td align="center"><?php echo $r->no_mykad; ?></td>
									<td align="center"><?php echo $r->no_pelatih; ?></td>
									<td align="center" <?php if ($r->gcpa < 2.00) { ?>
					                  style="border:3px solid #ff0000" 
					                  <?php } else { ?>
					                    
					                  <?php }
					                   ?>
					                
					                  ><?php echo $r->gcpa; ?>
                   					</td>
									<td align="center" <?php if ($r->kehadiran < 80) { ?>
					                  style="border:3px solid #ff0000" 
					                  <?php } else { ?>
					                  <?php }
					                   ?>
					                   >
					                    <?php echo $r->kehadiran ?></td>
									 <td align="center" <?php if ($r->puji == "1") { ?>
					                  style="border:3px solid #ff0000" 
					                  <?php } else { ?>
					                  <?php }
					                   ?>
					                   >
					                  <?php if( $r->puji == "0" ){ echo "TERAMPIL";}
					                   else{echo "BELUM TERAMPIL";}
					                    ?>              
					                  </td>
									<td align="center"><a href="<?php echo site_url('admin/Gspel_kurikulum/pbn8/');?><?php echo $r->nama_penuh;?>/<?php echo $r->no_mykad;?>/<?php echo $r->no_pelatih;?>/<?php echo $r->gcpa;?>/<?php echo $r->kehadiran;?>/<?php echo $r->nama_kursus;?>/<?php echo $r->id_pelatih;?>/<?php echo $idSeq2; ?>"><?php echo $r->jumlah_modul_dihantar; ?></a></td>
									<td align="center"><?php echo $r->terampilya; ?></td>
									<td align="center" <?php if ($terampiltidak>1) echo 'style="border:3px solid #ff0000"'; ?>><?php echo $r->terampiltidak; ?></td>
									<td align="center">
									<?php if ($r->bahagian_a == 0 || $r->bahagian_a == NULL ) { ?>
										<img width="20px" height="20px" src="<?php echo base_url(); ?>/assets/images/silang.png">
									<?php } else { ?>
										<img width="20px" height="20px" src="<?php echo base_url(); ?>/assets/images/tick.png">
									<?php }
									 ?>
									</td>
									<td align="center">
									<?php if ($r->bahagian_b == 0 || $r->bahagian_b == NULL ) { ?>
										<img width="20px" height="20px" src="<?php echo base_url(); ?>/assets/images/silang.png">
									<?php } else { ?>
										<img width="20px" height="20px" src="<?php echo base_url(); ?>/assets/images/tick.png">
									<?php }
									 ?>
									</td>

									<?php //var_dump($r->id_giatmara);die(); ?>
									<td align="center"><a href="<?php echo site_url('admin/Gspel_kurikulum/borang2/');?><?php echo $r->id_kursus;?>/<?php echo $r->id_giatmara;?>"  target="_blank"><img width="20px" height="20px" src="<?php echo base_url(); ?>/assets/images/ujian.png"></a></td>
									 <td align="center"><a href="<?php echo site_url('admin/Gspel_kurikulum/borang3/');?><?php echo $r->id_ref_kursus;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_pelatih;?>/<?php echo $r->id_permohonan_butir_peribadi;?>/<?php echo $r->id_kursus;?>"  target="_blank"><img width="20px" height="20px" src="<?php echo base_url(); ?>/assets/images/ujian.png"></a></td> 
								<td align="center"><a href="<?php echo site_url('admin/Gspel_kurikulum/borang4/');?><?php echo $r->id_intake;?>/<?php echo $r->id_ref_kursus;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>"  target="_blank"><img width="20px" height="20px" src="<?php echo base_url(); ?>/assets/images/ujian.png"></a></td>

								<?php if ($r->saegm1  == NULL AND $r->spgm1  == NULL AND $r->smgm1  == NULL AND $r->skgm1  == NULL) { ?>
									
									<td align="center">
									<?php if ($r->saegm  == "1") {?>
									<input type="checkbox" name="saegm[<?php echo $no; ?>]" id="saegm" checked>
									
									<?php } else { ?>
									<input type="checkbox" name="saegm[<?php echo $no; ?>]" id="saegm" >
									<?php }?>
									</td>
									<td align="center">
									<?php if ( $r->spgm  == "1") {?>
									<input type="checkbox" name="spgm[<?php echo $no; ?>]" id="spgm"  checked >
									<?php } else { ?>
										<input type="checkbox" name="spgm[<?php echo $no; ?>]" id="spgm"  >
									<?php }?>
									</td>
									<td align="center">
									<?php if ( $r->skgm  == "1") {?>
									<input type="checkbox" name="skgm[<?php echo $no; ?>]" id="skgm"  checked>
									<?php } else { ?>
									<input type="checkbox" name="skgm[<?php echo $no; ?>]" id="skgm" >
									<?php }?>
									</td>
									<td align="center">
									<?php if ($r->smgm  == "1") { ?>
									<input type="checkbox" name="smgm[<?php echo $no; ?>]" id="smgm" checked>
									<?php } else { ?>
									<input type="checkbox" name="smgm[<?php echo $no; ?>]" id="smgm"  >
									<?php }?>	
									</td>
							<?php } elseif ( $r->status_isi_markah == 7 ) { ?>
										
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
									<td align="center">
									<?php if ($r->saegm1  == "on" or $r->saegm  == "1") {?>
									<input type="checkbox" name="saegm[<?php echo $no; ?>]" id="saegm" checked>
									<?php } else { ?>
									<input type="checkbox" name="saegm[<?php echo $no; ?>]" id="saegm" >
									<?php }?>
									</td>
									<td align="center">
									<?php if ($r->spgm1 == "on" or $r->spgm  == "1") {?>
									<input type="checkbox" name="spgm[<?php echo $no; ?>]" id="spgm"  checked >
									<?php } else { ?>
										<input type="checkbox" name="spgm[<?php echo $no; ?>]" id="spgm"  >
									<?php }?>
									</td>
									<td align="center">
									<?php if ($r->skgm1  == "on" or $r->skgm  == "1") {?>
									<input type="checkbox" name="skgm[<?php echo $no; ?>]" id="skgm"  checked>
									<?php } else { ?>
									<input type="checkbox" name="skgm[<?php echo $no; ?>]" id="skgm" >
									<?php }?>
									</td>
									<td align="center">
									<?php if ($r->smgm == "on" or $r->smgm  == "1") { ?>
									<input type="checkbox" name="smgm[<?php echo $no; ?>]" id="smgm" checked>
									<?php } else { ?>
									<input type="checkbox" name="smgm[<?php echo $no; ?>]" id="smgm"  >
									<?php }?>	
									</td>
									<?php } ?> 
									<td align="center">
										<?php if ($r->catatan_pgn !='' || $r->catatan_pgn !=NULL ) { ?>
										<?php echo $r->catatan_pgn;?>
										<?php } else { ?>
									<input type="text" name="catatan[<?php echo $no; ?>]">
									<?php	} ?>
									</td>		
									<td align="center">
									<?php if ($r->bahagian_a == 1 AND $r->bahagian_b == 1 AND $r->pengurus_sah != NULL AND $r->pgn_sah == NULL) { ?>
									<input type="checkbox" id="pilih" class="pilih" name="pilih[<?php echo $no; ?>]" value="<?php echo $no; ?>" >
									<input type="hidden" name="idsah[<?php echo $no; ?>]" value="<?php echo $r->id_pengurus_sah; ?>">
									<?php } else if($r->status_isi_markah == 6){ ?>
									<?php
									// var_dump($r->pgn_sah);
									if ($r->pgn_sah != NULL || $r->pgn_sah != '') {
										echo date("d-m-Y", strtotime($r->pgn_sah)); 
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
						   <button type="submit" id="submit" class="btn" name="action" class="submit" value="simpan" style="background-color:#000063 "><font color="white" form="myform">Sahkan</font></button>  <a href="<?php echo site_url('admin/Gspel_kurikulum/pbn2');?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>" type="button" class="btn" name="action" value="hantar" style="background-color: #000063"><font color="white">Kembali Ke Halaman Sebelumnya </font></a>
					
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

document.getElementById("spgm").checked = 1;
$('#smgm,#skgm,#spgm,#saegm').on('change', function () {
    $(this).val(this.checked ? 1 : 0);
    //alert($(this).val());
});
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#myTable').DataTable();
});
</script>