<?php $this->load->view('gspel_kurikulum/layout/header'); ?>
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
			<h1>Pemarkahan</h1>
			<ol class="breadcrumb">
	<li class=''><a href=''>Home</a></li><li class='active'>Pemarkahan</li></ol>		</section>
		<section class="content">
	

<div class="row" id="one" >
	<div class="col-md-12">
	<div class="box ">
		
			<div class="panel panel-info panel-custom-horrible-red">
				<div class="panel-heading panel-heading-custom">
					<h4 style="color:white">Bahagian B: Pemarkahan Subjek</h4>
				</div>
  				<div class="panel-body">
					
					<table width="100%" border="0"><tr><td width="70%">
					<table class ="table" border="0">
								<tr>
									<td>Nama Kursus</td>
									<td>:</td>
									<td><?php
                      foreach($modul as $r) :
                    echo $r->nama_kursus;
                      endforeach;
                     ?></td>
								</tr>
								<tr>
									<td>Jumlah Pelatih</td>
									<td>:</td>
									<td>
									<?php
                      foreach($modul as $r) :
                     echo $r->jumlah_pelatih;
                  endforeach;?></td>
								</tr>
								
								<tr><td colspan="3"></td></tr>
					</table>
					</td>
					<td width="10%">&nbsp;</td>
					<td width="40%">
					<table width="100%" style="border:3px solid #ff0000" cellpadding="4px" cellspacing="2px">
					<tr><td colspan="3" align="center"><b>STATUS</b></td>
								  </tr>
								  <tr>
								  <td >Belum Isi</td>
								  	<td >:</td>
									<td>
								  	<?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/trainer7/');?><?php echo $r->id_ref_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>/<?php echo 0;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>"><?php
								                
								                echo $r->belum_isi;
								                                      endforeach;
								                ?></a></td>
								  	</tr>
								  	<tr>
								  	<td>Simpan</td>
								  	<td>:</td>
								  <td>
								  	<?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/trainer7/');?><?php echo $r->id_ref_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>/<?php echo 1;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>"><?php
								                
								                echo $r->telah_disimpan;
								                                      endforeach;
								                ?></a></td>
								  						</tr>
								  						<tr>
								  							<td>Hantar ke Pengurus</td>
								  							<td>:</td>

								  							<td>
								  	<?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/trainer7/');?><?php echo $r->id_ref_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>/<?php echo 2;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>"><?php
								                
								                echo $r->hantar_ke_pengurus;
								                                      endforeach;
								                ?></a></td>
								  						</tr>
								  						<tr>
								  							<td>Dikembalikan oleh Pengurus</td>
								  							<td>:</td>
								  							<td>
								  	<?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/trainer7/');?><?php echo $r->id_ref_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>/<?php echo 3;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>"><?php
								                
								                echo $r->dikembalikan;
								                                      endforeach;
								                ?></a></td>
								  						</tr>

								  						<tr>
								  							<td>Hantar ke PGN</td>
								  							<td>:</td>
								  							<td>
								  	<?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/trainer7/');?><?php echo $r->id_ref_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>/<?php echo 4;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>"><?php
								                
								                echo $r->hantar_ke_pgn;
								                                      endforeach;
								                ?></a></td>
								  						</tr>

								  						<tr>
								  							<td>Dikembalikan oleh PGN</td>
								  							<td>:</td>
								  							<td>
								  	<?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/trainer7/');?><?php echo $r->id_ref_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>/<?php echo 5;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>"><?php
								                
								                echo $r->dikembalikan_oleh_pgn;
								                                      endforeach;
								                ?></a></td>
								  						</tr>


								  						<tr>
								  							<td>Hantar ke PBKL</td>
								  							<td>:</td>
								  							<td>
								  	<?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/trainer7/');?><?php echo $r->id_ref_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>/<?php echo 6;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>"><?php
								                
								                echo $r->hantar_ke_ppkl;
								                                      endforeach;
								                ?></a></td>
								  						</tr>
<tr>
								  							<td>Dikembalikan Oleh PBKL</td>
								  							<td>:</td>
								  							<td>
								  	<?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/trainer7/');?><?php echo $r->id_ref_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>/<?php echo 8;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>"><?php
								                
								                echo $r->dikembalikan_oleh_ppkl;
								                                      endforeach;
								                ?></a></td>
								  						</tr>

								  						<tr>
								  							<td>Disahkan Oleh PBKL</td>
								  							<td>:</td>
								  							<td>
								  	<?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/trainer7/');?><?php echo $r->id_ref_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>/<?php echo 7;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>"><?php
								                
								                echo $r->disahkan_oleh_ppkl;
								                                      endforeach;
								                ?></a></td>
								  						</tr>
													
								  					</table>
					</td>
					</tr></table>
					<br>
						<form action="<?php echo site_url('admin/Gspel_kurikulum/savetn5');?>" id="myform" method="post">
						<div class ="table table-responsive">
						<table class ="table table-hover table-bordered" id = "myTable">
							<thead style ="background-color:#b3b3b3">
								<tr>
									<th rowspan = "2">Bil</th>
									<th rowspan = "2">Nama Pelatih</th>
									<th rowspan = "2">No. MyKAD</th>
									<th rowspan = "2">No. Pelatih</th>
									
									<th rowspan = "2">Tarikh Hantar</th>
									<th colspan = "2">Terampil</th>
									<th rowspan = "2">GCPA</th>
									<th rowspan = "2">Ko-Kurikulum</th>
									<th rowspan = "2">Core Ability</th>
									<th rowspan = "2">Keusahawanan</th>
									<th rowspan = "2">Program PUJI / Moral</th>
									<th rowspan = "2">% Kehadiran</th>
									<th rowspan = "2">Latihan Industri</th>
									<th rowspan = "2">Sijil</th>
									<th rowspan = "2">Catatan</th>
									<th rowspan = "2">Pilih</th>
								</tr>
									<tr>
      									<th>Ya</th>
      									<th>Belum</th>
      							</tr>
							</thead>
							<tbody>
								<?php
								$ni=1;
								$no =0;
								if($moduldetail)
								foreach($moduldetail as $r) : ?>
								<tr
								style="
                      <?php 
                    	
                      if ($r->status_penghantaran =="Belum Isi") {
										echo "background-color:#FFFFFF";}
						 else if ($r->status_penghantaran =="Telah Disimpan") {
										echo "background-color:#C0C0C0";}
						else if ($r->status_penghantaran =="Hantar Ke Pengurus") {
										echo "background-color:#00FF00";}
						else if ($r->status_penghantaran =="Dikembalikan oleh Pengurus") {
										echo "background-color:#FFFF00";
									}
						else if ($r->status_penghantaran =="Dikembalikan oleh PGN") {
										echo "background-color:#F5F5DC";
									}
						else if ($r->status_penghantaran =="Hantar Ke PGN") {
										echo "background-color:#FFF8DC";
									}
						else if ($r->status_penghantaran =="Hantar Ke PBKL") {
										echo "background-color:#00FFFF";
									}
						else if ($r->status_penghantaran =="Disahkan oleh PBKL") {
										echo "background-color:#ADFF2F";
									}
						else if ($r->status_penghantaran =="Dikembalikan oleh PBKL") {
										echo "background-color:#EE82EE";
									}
									else{
										echo "background-color:#FFFFFF";
									}
                      ?>
                      "
								>
									<td><?php echo $ni; ?></td>
									<td><?php echo $r->nama_penuh; ?></td>
									<td><?php echo $r->no_mykad; ?></td>
									<td><?php echo $r->no_pelatih; ?></td>
									<td><?php 
									if ($r->tarikh_hantar_pengajar != '') {
									echo date("d-m-Y", strtotime($r->tarikh_hantar_pengajar));
									} else {
										# code...
									}
									
									 ?></td>
									<td><?php echo $r->terampilya; ?></td>
									<td <?php if ($terampiltidak>1) echo 'style="border:3px solid #ff0000"'; ?>><?php echo $r->terampiltidak; ?></td>
									<td <?php if ($r->gcpa < 2.00) { ?>
									style="border:3px solid #ff0000" 
									<?php } else { ?>
										
									<?php }
									 ?>
									
									><?php echo $r->gcpa; ?></td>
									<td>
									 <?php	if($r->kokurikulum == "0"){ ?> 
									<select name="kokuri[<?php echo $no; ?>]" id="kokuri"><option value="0" selected>DILAKSANAKAN</option><option value="1">TIDAK DILAKSANAKAN</option></select>
									<?php	}else{ ?>
										<select name="kokuri[<?php echo $no; ?>]" id="kokuri"><option value="0" >DILAKSANAKAN</option><option value="1" selected>TIDAK DILAKSANAKAN</option></select>
									<?php				} ?>
       					 
									</td>
									<td>

									<?php	if($r->literasi_komputer == "0"){ ?> 
									<select name="literasi[<?php echo $no; ?>]" id="literasi"><option value="0" selected>TERAMPIL</option><option value="1">BELUM TERAMPIL</option></select>
									<?php	}else{ ?>
									<select name="literasi[<?php echo $no; ?>]" id="literasi"><option value="0" >TERAMPIL</option><option value="1" selected>BELUM TERAMPIL</option></select>
									<?php } ?>
    								</td>
									<td>
										<?php	if($r->keusahawanan == "0"){ ?> 
									<select name="keusahawanan[<?php echo $no; ?>]" id="keusahawanan"><option value="0" selected>DILAKSANAKAN</option><option value="1">TIDAK DILAKSANAKAN</option></select>
									<?php	}else{ ?>
									<select name="keusahawanan[<?php echo $no; ?>]" id="keusahawanan"><option value="0" >DILAKSANAKAN</option><option value="1" selected>TIDAK DILAKSANAKAN</option></select>
									<?php } ?>
									</td>
									<td <?php if ($r->puji == "1") { ?>
									style="border:3px solid #ff0000" 
									<?php } else { ?>
									<?php }
									 ?>
									 >
									<?php	if( $r->puji == "0"){ ?> 
									<select name="puji[<?php echo $no; ?>]" id="puji"><option value="0" selected>TERAMPIL</option><option value="1">BELUM TERAMPIL</option></select>
									<?php	}else{ ?>
									<select name="puji[<?php echo $no; ?>]" id="puji"><option < value="0">TERAMPIL</option><option value="1" selected>BELUM TERAMPIL</option></select><?php } ?>
									</td>
									<td <?php if ($r->kehadiran < 80) { ?>
									style="border:3px solid #ff0000" 
									<?php } else { ?>
									<?php }
									 ?>
									 >
									<input type="text" name="kehadiran[<?php echo $no; ?>]" id="kehadiran"
									value="<?php if ($r->kehadiran) {
										echo $r->kehadiran;
									} else {
										echo 0;
									}
									 ?>" 
									></td>
									<td>
									<?php if ($r->tempoh_industri <> '' OR $r->tempoh_industri <> 0) { ?>
										<?php	if( $r->latihan_industri == "0" OR $r->latihan_industri == NULL OR $r->latihan_industri == ''){ ?> 
									<select name="industri[<?php echo $no; ?>]" id="industri"><option value="0" selected>DILAKSANAKAN</option><option value="1">TIDAK DILAKSANAKAN</option></select>
									<?php	}else{ ?>
									<select name="industri[<?php echo $no; ?>]" id="industri"><option value="0">DILAKSANAKAN</option><option value="1" selected>TIDAK DILAKSANAKAN</option></select><?php } ?>
									<?php } else {  echo "N/A"; } ?>
									
									</td>
									<td>
									<?php 
									if ($r->jenis_kursus == "a") {
										if ($r->sklgm ==1) {
										echo "SKLGM";
										}else{
											echo "";
										}
									} else if ($r->jenis_kursus == "b"){
										if ($r->skgm == 1 AND $r->saegm == 1 AND $r->spgm == 1) {
											echo "SPGM & SKGM & SAEGM ";
										} else if($r->saegm == 1 AND $r->skgm == 1 ) {
											echo "SKGM & SAEGM ";
										} else if($r->saegm == 1 AND $r->spgm == 1 ) {
											echo "SPGM & SAEGM";
										} else if($r->skgm == 1 AND $r->saegm == 1 ) {
											echo "SKGM & SAEGM ";
										} else if ($r->spgm == 1) {
											echo "SPGM";
										} else if($r->skgm == 1) {
											echo "SKGM ";
										} else if ($r->saegm == 1) {
											echo "SAEGM";
										} 
										
										else {
											echo "";
										}
										
									} else {
										echo "none";
									}
									?>
									</td>
									<td><?php 
									if ($r->status_isi_markah ==3) {
										echo "catatan dari Pengurus : ".$r->catatan_pengurus;
									}else if ($r->status_isi_markah ==5) {
										echo  "catatan dari PGN : ".$r->catatan_pgn;
									}else if ($r->status_isi_markah ==8) {
										echo  "Catatan dari PBKL : ".$r->catatan_ppkl;
									}else{
										
									}
									; ?></td>

										<td><input type="checkbox" id="pilih" class="pilih" name="pilih[<?php echo $no; ?>]" value="<?php echo $no; ?>" onclick="
									<?php if ($r->status_penghantaran =="Hantar Ke Pengurus" || $r->status_penghantaran =="Hantar ke PGN" || $r->status_penghantaran =="Hantar ke PBKL" || $r->status_penghantaran =="Disahkan oleh PBKL") {
										
										echo "return false";
									} else {
										echo  "return true" ;
									}
									?>
									"></td>
										<input type="hidden" name="id[<?php echo $no; ?>]" value="<?php echo $r->id_markah_modul_2; ?>" >
										<input type="hidden" name="idpelatih[<?php echo $no; ?>]" value="<?php echo $r->id_pelatih; ?>" >
										<input type="hidden" name="idkursus[<?php echo $no; ?>]" value="<?php echo $r->id_kursus; ?>" >
										<input type="hidden" name="idSeq" value="<?php echo $idSeq; ?>" >
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

		 <button type="submit" id="submit" class="btn" name="action" class="submit" value="simpan" style="background-color:#000063"><font color="white">Simpan</font></button>&nbsp;
         <button type="submit" class="btn" name="action" value="hantar" style="background-color:#000063"><font color="white">Hantar ke Pengurus</font></button>
         
		 <?php } ?>
		
         <a href="<?php echo site_url('admin/Gspel_kurikulum/trainer3');?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>" class="btn " type="btu" name="action" value="kembali" style="background-color:#000063 "><font color="white">Kembali ke Halaman Sebelumnya</font></a>
				</form>
					
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
    $("#myform").submit(function() {
    var cb = $("input#pilih");
    if (cb.is(":checked")) {
   return true; 
        } else {
            alert("Klik checkbox pada pelatih yang ingin disimpan / dihantar.");
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