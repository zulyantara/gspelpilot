<?php $this->load->view('gspel_kurikulum/layout/header'); ?>



		<div class="content-wrapper">
		<section class="content-header">
			<h1>Pemarkahan</h1>
			<ol class="breadcrumb">
	<li class=''><a href=''>Home</a></li><li class='active'>Pemarkahan</li></ol>		</section>
		<section class="content">
			<div class="row">

</div>

<div class="row" id="one" >
	<div class="col-md-12">
		<div class="box">

      <div class="panel panel-info panel-custom-horrible-red">
  				<div class="panel-heading panel-heading-custom">
  					<h4 style="color: white">Bahagian A: Pemarkahan Modul Sepenuh Masa</h4>
  				</div>

    				<div class="panel-body">
  					
  					<table width="100%" border="0"><tr><td width="50%">
  					<table class ="table" style="border:1px solid #ffffff">
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
  									<td>Nama Modul</td>
  									<td>:</td>
  									<td><?php
                      foreach($modul as $r) :
                    echo $r->nama_modul;
                      endforeach;
                     ?></td>
  								</tr>
  								<tr>
  									<td>Kod Modul</td>
  									<td>:</td>
  									<td><?php
                      foreach($modul as $r) :
                    echo $r->kod_modul;
                        endforeach;
                     ?></td>
  								</tr>
									<tr>
										<td>Jumlah Jam Kredit</td>
										<td>:</td>
										<td><?php
											foreach($modul as $r) :
										 echo $r->jam_kredit;
									endforeach;?></td>
									</tr>
  								<tr>
  									<td>Jumlah Pelatih</td>
  									<td>:</td>
  									<td><?php
                      foreach($modul as $r) :
                     echo $r->jumlah_pelatih;
                  endforeach;?></td>
  								</tr>
    					</table>
  					</td>
  					<td width="10%">&nbsp;</td>
  					<td width="65%">
  					<table width="60%" style="border:3px solid #ff0000" cellpadding="4px" cellspacing="2px">
					<tr><td colspan="3" align="center"><b>STATUS</b></td>
								  </tr>
								  <tr>
								  <td >Belum Isi</td>
								  	<td >:</td>
									<td>

								  	<?php 

								  	  foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/trainer6/');?><?php echo $r->id_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_set;?>/<?php echo 0;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>"><?php
								                
								                echo $r->belum_isi;
								                                      endforeach;
								                ?></a></td>
								  	</tr>
								  	<tr>
								  	<td>Simpan</td>
								  	<td>:</td>
								  <td>
								  	<?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/trainer6/');?><?php echo $r->id_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_set;?>/<?php echo 1;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>"><?php
								                
								                echo $r->telah_disimpan;
								                                      endforeach;
								                ?></a></td>
								  						</tr>
								  						<tr>
								  							<td>Hantar ke Pengurus</td>
								  							<td>:</td>

								  							<td>
								  	<?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/trainer6/');?><?php echo $r->id_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_set;?>/<?php echo 2;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>"><?php
								                
								                echo $r->hantar_ke_pengurus;
								                                      endforeach;
								                ?></a></td>
								  						</tr>
								  							<tr>
								  							<td>Dikembalikan oleh Pengurus</td>
								  							<td>:</td>

								  							<td>
								  	<?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/trainer6/');?><?php echo $r->id_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_set;?>/<?php echo 3;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>"><?php
								                
								                echo $r->dikembalikan;
								                                      endforeach;
								                ?></a></td>
								  						</tr>


								  						<tr>
								  							<td>Hantar Ke PGN</td>
								  							<td>:</td>
								  							<td>
								  	<?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/trainer6/');?><?php echo $r->id_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_set;?>/<?php echo 4;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>"><?php
								                
								                echo $r->hantar_ke_pgn;
								                                      endforeach;
								                ?></a></td>
								  						</tr>
								  						<tr>
								  							<td>Dikembalikan oleh PGN</td>
								  							<td>:</td>
								  							<td>
								  	<?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/trainer6/');?><?php echo $r->id_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_set;?>/<?php echo 5;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>"><?php
								                
								                echo $r->pgn_dikembalikan;
								                                      endforeach;
								                ?></a></td>
								  						</tr>
								  							<tr>
								  							<td>Hantar ke PBKL</td>
								  							<td>:</td>

								  							<td>
								  	<?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/trainer6/');?><?php echo $r->id_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_set;?>/<?php echo 6;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>"><?php
								                
								                echo $r->hantar_ke_ppkl;
								                                      endforeach;
								                ?></a></td>
								  						</tr>

								  						<tr>
								  							<td>Dikembalikan oleh PBKL</td>
								  							<td>:</td>

								  							<td>
								  	<?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/trainer6/');?><?php echo $r->id_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_set;?>/<?php echo 8;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>"><?php
								                
								                echo $r->dikembalikan_oleh_ppkl;
								                                      endforeach;
								                ?></a></td>
								  						</tr>
								  						<tr>
								  							<td>Disahkan Oleh PBKL</td>
								  							<td>:</td>

								  							<td>
								  	<?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/trainer6/');?><?php echo $r->id_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_set;?>/<?php echo 7;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>"><?php
								                
								                echo $r->disahkan_oleh_ppkl;
								                                      endforeach;
								                ?></a></td>
								  						</tr>
													<!-- 	<?php   //endforeach; ?> -->
								  					</table>
  					</td>
  					</tr></table>
						<form action="<?php echo site_url('admin/Gspel_kurikulum/savetn4');?>" id="myform" name="myform" method="post">
						<div class ="table table-responsive">
						<table class ="table table-hover table-bordered " id = "myTable">
							<thead style ="background-color:#b3b3b3" >
								<?php
                   			 foreach($modul as $r) :
                    			?>
								<tr>
									<th rowspan = "2">Bil</th>
									<th rowspan = "2">Nama Pelatih</th>
									<th rowspan = "2">No. MyKAD</th>
									<th rowspan = "2">No. Pelatih</th>
									<th rowspan = "2">Tarikh Hantar</th>
									<th colspan = "2" style="text-align: center" >PB (<?php echo $r->persen_pb; ?> %)</th>
								<input type="hidden" name="persen_pb" id="persen_pb" value="<?php echo $r->persen_pb; ?>">
									<th colspan = "2" style="text-align: center"> PAM (<?php echo $r->persen_pam; ?>%)</th>
								<input type="hidden" name="persen_pam" id="persen_pam" value="<?php echo $r->persen_pam; ?>">
									<th rowspan = "2">Markah Modul</th>
									<th rowspan = "2">Gred Keterampilan</th>
									
									<th rowspan = "2">Poin Keterampilan</th>
									<th rowspan = "2">Tahap Keterampilan</th>
									<th rowspan = "2">Status Penghantar</th>
									<th rowspan = "2">Catatan</th>
									<th rowspan = "2">Pilih</th>

								</tr>
							
								<tr>
									<th>Teori (<?php echo $r->persen_pb_teori; ?>%)</th>
								<input type="hidden" name="persen_pb_teori" id="persen_pb_teori" value="<?php echo $r->persen_pb_teori; ?>">
									<th>Amali (<?php echo $r->persen_pb_praktikal; ?>%)</th>
								<input type="hidden" name="persen_pb" id="persen_pb_praktikal" value="<?php echo $r->persen_pb_praktikal; ?>">
									<th>Teori (<?php echo $r->persen_pam_teori; ?>%)</th>
								<input type="hidden" name="persen_pam_teori" id="persen_pam_teori" value="<?php echo $r->persen_pam_teori; ?>">
									<th>Amali (<?php echo $r->persen_pam_praktikal; ?>%)</th>
								<input type="hidden" name="persen_pam_praktikal" id="persen_pam_praktikal" value="<?php echo $r->persen_pam_praktikal; ?>">
								</tr>
								<?php  endforeach;?>
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
									<td align="center"><?php echo $ni; ?></td>
									<td <?php if ($r->tahap_keterampilan == "Belum Terampil") { ?>
									style="border:3px solid #ff0000" 
									<?php } else { ?>
										
									<?php }
									 ?>
									
									align="center" ><?php echo $r->nama_penuh; ?></td>
									<!-- <td  align="center"><?php //echo $r->nama_penuh; ?></td> -->
									<td><?php echo $r->no_mykad; ?></td>
									<td><?php echo $r->no_pelatih; ?></td>
									<td><?php 
									if ($r->tarikh_hantar_pengajar != '') {
									echo date("d-m-Y", strtotime($r->tarikh_hantar_pengajar));
									} else {
										# code...
									}
									
									 ?></td>

									<td>
									<?php if ( $r->status_penghantaran =="Hantar Ke Pengurus" || $r->status_penghantaran =="Hantar ke PGN" || $r->status_penghantaran =="Hantar ke PBKL" || $r->status_penghantaran =="Disahkan oleh PBKL") { ?>
									<?php echo $r->pb_teori; ?>
									<?php } else { ?>
									<input type=number  style="width:60px;height:60px" step=0.01 name="pbteori[<?php echo $no; ?>]" id="pbteori<?php echo $no; ?>" value="<?php echo $r->pb_teori; ?>"  onkeyup="coba(<?php echo $no ?>)"><span id="user-result"></span>
									<?php } ?>
									</td>

									<td>
									<?php if ( $r->status_penghantaran =="Hantar Ke Pengurus" || $r->status_penghantaran =="Hantar ke PGN" || $r->status_penghantaran =="Hantar ke PBKL" || $r->status_penghantaran =="Disahkan oleh PBKL") { ?>
									<?php echo $r->pb_amali; ?>
									<?php } else { ?>
									<input type=number style="width:60px;height:60px" step=0.01  name="pbamali[<?php echo $no; ?>]" id="pbamali<?php echo $no; ?>" value="<?php echo $r->pb_amali; ?>" onkeyup="coba(<?php echo $no ?>)"><span id="user-result"></span>
									<?php } ?>
									</td>

									<td>
									<?php if ($r->status_penghantaran =="Hantar Ke Pengurus" || $r->status_penghantaran =="Hantar ke PGN" || $r->status_penghantaran =="Hantar ke PBKL" || $r->status_penghantaran =="Disahkan oleh PBKL") { ?>
									<?php echo $r->pam_teori; ?>
									<?php } else { ?>
								<input type=number style="width:60px;height:60px" step=0.01  name="pmteori[<?php echo $no; ?>]" id="pmteori<?php echo $no; ?>" value="<?php echo $r->pam_teori; ?>" onkeyup="coba(<?php echo $no ?>)">
									<?php } ?>
									</td>

								<td>
								<?php if ( $r->status_penghantaran =="Hantar Ke Pengurus" || $r->status_penghantaran =="Hantar ke PGN" || $r->status_penghantaran =="Hantar ke PBKL" || $r->status_penghantaran =="Disahkan oleh PBKL") { ?>
									<?php echo $r->pb_amali; ?>
									<?php } else { ?>
									<input type=number style="width:60px;height:60px" step=0.01  name="pmamali[<?php echo $no; ?>]" id="pmamali<?php echo $no; ?>" value="<?php echo $r->pam_amali; ?>" onkeyup="coba(<?php echo $no ?>)">
									<?php } ?>
								</td>

								<td>
									<?php if ( $r->status_penghantaran =="Hantar Ke Pengurus" || $r->status_penghantaran =="Hantar ke PGN" || $r->status_penghantaran =="Hantar ke PBKL" || $r->status_penghantaran =="Disahkan oleh PBKL") { ?>
									<?php echo $r->pb_amali; ?>
									<?php } else { ?>
									<input type="text"  style="width:60px;height:60px" value="<?php echo $r->markah; ?>" class="cobain" id="coba<?php echo $no; ?>" readonly>
									<?php } ?>
								</td>

									<td><?php echo $r->gred_keterampilan; ?></td>
									
									<td><?php echo $r->poin_keterampilan; ?></td>
									<td <?php if ($r->tahap_keterampilan == "Belum Terampil") { ?>
									style="border:3px solid #ff0000" 
									<?php } else { ?>
										
									<?php }
									 ?>
									
									><?php echo $r->tahap_keterampilan; ?></td>
									<td><?php 
									if ($r->status_penghantaran =="Hantar Ke Pengurus") {
										echo "✓";
									}else{
										echo $r->status_penghantaran;
									}
									; ?></td>

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
									<input type="hidden" name="idmodul[<?php echo $no; ?>]" value="<?php echo $r->id_markah_modul; ?>" >
									<input type="hidden" name="id_modul[<?php echo $no; ?>]" value="<?php echo $r->id_modul; ?>" >
									<input type="hidden" name="idpelatih[<?php echo $no; ?>]" value="<?php echo $r->id_pelatih; ?>" >
									<input type="hidden" name="idkursus[<?php echo $no; ?>]" value="<?php echo $r->id_kursus; ?>" >
									<input type="hidden" name="idgiatmara[<?php echo $no; ?>]" value="<?php echo $r->id_giatmara; ?>" >
									<input type="hidden" name="idSeq2" value="<?php echo $idSeq; ?>" >

									<!-- Buat Call procedure -->
									<input type="hidden" name="idgiatmara[<?php echo $no; ?>]" value="<?php echo $r->id_giatmara; ?>" >
									<input type="hidden" name="idrefkursus[<?php echo $no; ?>]" value="<?php echo $r->id_ref_kursus; ?>" >
									<input type="hidden" name="idintake[<?php echo $no; ?>]" value="<?php echo $r->id_intake; ?>" >
									<input type="hidden" name="jenispelatih[<?php echo $no; ?>]" value="<?php echo $r->jenis_pelatih; ?>" >
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

 		<button type="submit" id="submit" class="btn" name="action" class="submit" value="simpan" style="background-color:#000063 "><font color="white" form="myform">Simpan</font></button>&nbsp;
        <button type="submit" class="btn " name="action" value="hantar" style="background-color:#000063 "><font color="white">Hantar ke Pengurus</font></button>
        
 		<?php } ?>

  		
       	<a href="<?php echo site_url('admin/Gspel_kurikulum/trainer3');?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>" class="btn " type="btu" name="action" value="kembali" style="background-color:#000063 "><font color="white">Kembali ke Halaman Sebelumnya </font></a>
				</form>
				

  			</div>
  		</div>

		</div>
	</div>
</div>
</div>

</section>

<script>
		var persen_pb  				= $('#persen_pb').val();
		var persen_pam 				= $('#persen_pam').val();
		var persen_pam_teori 		= $('#persen_pam_teori').val();
		var persen_pam_praktikal 	= $('#persen_pam_praktikal').val();
		var persen_pb_teori 		= $('#persen_pb_teori').val();
		var persen_pb_praktikal 	= $('#persen_pb_praktikal').val();

function coba(no){
	 $("#pbteori"+no).add('#pbamali'+no).add('#pmteori'+no).add('#pmamali'+no).keyup(function () { 
      

 		var p = $('#pbteori'+no).val();
		var q = $('#pbamali'+no).val();
		var r = $('#pmteori'+no).val();
		var s = $('#pmamali'+no).val();

		var pbteori = parseInt(p);
		var pbamali = parseInt(q);
		var pmteori = parseInt(r);
		var pmamali = parseInt(s);

		var persen_pb2 = (parseInt(persen_pb)* 0.01).toFixed(1);
		var persen_pam2 = (parseInt(persen_pam)* 0.01).toFixed(1);
		var persen_pam_teori2 = parseInt(persen_pam_teori);
		var persen_pam_praktikal2 = parseInt(persen_pam_praktikal);
		var persen_pb_teori2 = parseInt(persen_pb_teori);
		var persen_pb_praktikal2 = parseInt(persen_pb_praktikal);


		var hal = pbteori + pbamali;
		var hal2 = pmteori + pmamali;
       	var jumlah = (hal* persen_pb2) + (hal2*  persen_pam2) ;
		
		console.log($('#persen_pb_teori').val());

       	if (pbteori > persen_pb_teori2) {
           
            alert('Sila isi dari 0 hingga '+ persen_pb_teori +' sahaja');
            document.getElementById("pbteori"+no).value = '';
        }

        else if (pbamali > persen_pb_praktikal2) {
           
            alert('Sila isi dari 0 hingga '+ persen_pb_praktikal2 +' sahaja');
            document.getElementById("pbamali"+no).value = '';
        }
        else if ( pmteori > persen_pam_teori2) {
           
            alert('Sila isi dari 0 hingga ' + persen_pam_teori2 + ' sahaja');
            document.getElementById("pmteori"+no).value = '';
        }

        else if ( pmamali > persen_pam_praktikal2) {
           
            alert('Sila isi dari 0 hingga '+ persen_pam_praktikal2 + ' sahaja');
            document.getElementById("pmamali"+no).value = '';
        }

        else{
        	document.getElementById("coba"+no).value = jumlah.toFixed(2);
        }
        });
}


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

$(document).ready(function () {
  var count;
  var p,g,h,i,j;
  $(':checkbox').change(function() {
    var $checkboxes = $('input[type="checkbox"]:checked');
    count = ( $checkboxes.length ) ;
    if (count == "1" ) {
	    p = $(this).closest('tr').find('td input:first').val();
		g = $(this).closest('tr').find('td input').eq(1).val();
		h = $(this).closest('tr').find('td input').eq(2).val();
		i = $(this).closest('tr').find('td input').eq(3).val();
		j = $(this).closest('tr').find('td').eq(9).text();
        if (p>20.00 || g > 80.00 || h > 20.00 || i > 80.00){
        	alert(i);}
	 
    else {
              
               
             
       	}
    } 
  });
});  


// var i = 0; /* Set Global Variable i */
// function increment(){
// i += 1; /* Function for automatic increment of field's "Name" attribute. */
// }


// $("#submit").click(function(){
//          $('.pilih').on('change',function(){
//             $('form').submit();
//             });
//         });
//  $("#submit").click(function(){
//      // e.preventDefault();
// //$(document).ready(function(){
// 	$('#username').blur(function(){
// 		$('#pesan').html('<img style="margin-left:10px; width:10px" src="loading.gif">');
// 		var username = $(this).val();

// 		$.ajax({
// 			//type	: 'POST',
// 			//url 	: '<?php //echo site_url('admin/Gspel_kurikulum/cekinp'); ?>',
// 			//data 	: 'username='+username,
// 			success	: function(data){
// 				alert("ok");
// 				//$('#pesan').html(data);
// 			}
// 		})

// 	});
// });


// var verifyPaymentType = function () {
//   var checkboxes = $('.pilih');
//   var inputs = checkboxes.find('input');
//   var first = inputs.first()[0];
//   inputs.on('change', function () {
//     this.setCustomValidity('');
//   });
//   first.setCustomValidity(checkboxes.find('input:checked').length === 0 ? 'Choose one' : '');
// }
// $('#submit').click(verifyPaymentType);
// $('form').on('submit', function(){alert('ok')})


// function myfunc(ele) {
 // var values = new Array();
 // var p,g,h,i,j;
 //       $.each($("input[name='pilih[]']:checked").closest("td").siblings("td"),
 //              function () {
	// 								var faixa = $(this).closest('tr').find('td:first').text();
	// 							  p = $(this).closest('tr').find('td input:first').val();
	// 							  g = $(this).closest('tr').find('td input').eq(1).val();
	// 								h = $(this).closest('tr').find('td input').eq(2).val();
	// 								i = $(this).closest('tr').find('td input').eq(3).val();
	// 								j = $(this).closest('tr').find('td').eq(9).text();
	// 								   values.push(p,g,h,i);
 //              });

	// 						alert(values);
//   //   //  alert("val---" + values.join (", "));
//  // 		var r = document.createElement('span');
//  // 		var y = document.createElement("INPUT");
//  // 		y.setAttribute("type", "input");
//  // 		y.setAttribute("placeholder", "Name");
// 	// 	y.setAttribute("id", "pbtx");
// 	// 	y.setAttribute("name", "pbtx[]");
// 	// 	document.getElementById("pbtx").value = """++"p;
//  // 		var g = document.createElement("IMG");
//  // 		g.setAttribute("src", "delete.png");
//  // 		increment();
//  // 		y.setAttribute("Name", "textelement_" + i);
//  // 		r.appendChild(y);
//  // 		g.setAttribute("onclick", "removeElement('myForm','id_" + i + "')");
//  // 		r.appendChild(g);
//  // 		r.setAttribute("id", "id_" + i);
//  // 		document.getElementById("myForm").appendChild(r);
//   }


// $(document).ready(function() {
//     $("input.pilih").click(myfunc);
// });
</script>
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
<?php $this->load->view('gspel_kurikulum/layout/footer'); ?>
<script type="text/javascript">
  $(document).ready(function() {
    $('#myTable').DataTable();
});
</script>