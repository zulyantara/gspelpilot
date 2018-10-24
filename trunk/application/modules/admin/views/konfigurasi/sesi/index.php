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
		<section class="content-header">
			<h1>Pengurusan Sesi</h1>
			<ol class="breadcrumb">
			<li class=''><a href=''>Home</a></li><li class='active'>Pengurusan Sesi </li></ol>		
		</section>
		<section class="content">
			
<div class="row" id="one" >
	<div class="col-md-12">
		<div class="box">

      <div class="panel panel-info panel-custom-horrible-red">
  				<div class="panel-heading panel-heading-custom">
  					<h4 style="color: white">Senarai Sesi</h4>
  				</div>

    				<div class="panel-body">
  					<div class ="table table-responsive">


						<table class ="table table-hover table-striped table-bordered" id = "myTable">
							<thead style ="background-color:#b3b3b3" style="text-align: center;">
								<tr style="text-align: center;">
									<th style="text-align: center;">Bil</th>
									<th style="text-align: center;">Kod Sesi</th>
									<th style="text-align: center;">Kod Sesi Pelaporan</th>
									<th style="text-align: center;">Penerangan Sesi</th>
									<th style="text-align: center;">Tarikh Mula </th>
									<th style="text-align: center;">Tarikh Tamat </th>
									<th style="text-align: center;">Tarikh Diwujudkan</th>
									<th style="text-align: center;">Tarikh Mula Permohonan</th>
									<th style="text-align: center;">Tarikh Tamat Permohonan</th>
									<th style="text-align: center;">Diwujudkan Oleh</th>

									 <?php if ($groups == 'admin') { ?>
									 <?php }else{ ?>
									 <th style="text-align: center;">Tindakan</th>
									 <?php } ?>
									
								</tr>
							</thead>
							<tbody>
								<?php
								$ni=1;
								$no =0;
								if($sesidetail)
								foreach($sesidetail as $r) : ?>
								<tr>
									<td align="center"><?php echo $ni; ?></td>
									<td align="center"><?php echo $r->kod_intake; ?></td>
									<td align="center"><?php echo $r->kod_intake_pelaporan; ?></td>
									<td align="center"><?php echo $r->nama_intake; ?></td>
									<td align="center"><?php 
									if ($r->tarikh_mula == "1970-01-01" or $r->tarikh_mula == '') {
										# code...
									} else {
										echo date("d-m-Y", strtotime($r->tarikh_mula));
									}
									
									?></td>
									<td align="center"><?php 
									if ($r->tarikh_tamat == "1970-01-01" OR $r->tarikh_tamat == '') {
										# code...
									} else {
										echo date("d-m-Y", strtotime($r->tarikh_tamat));
									}
									?></td>
									<td align="center"><?php 
									if ($r->tarikh_diwujudkan == "1970-01-01" OR $r->tarikh_diwujudkan == '') {
										# code...
									} else {
										echo date("d-m-Y", strtotime($r->tarikh_diwujudkan));
									}
									?></td>
									<td align="center"><?php
									if ($r->tarikh_mula_permohonan == "1970-01-01" OR $r->tarikh_mula_permohonan == '') {
										# code...
									} else {
										echo date("d-m-Y", strtotime($r->tarikh_mula_permohonan));
									}
									 
									 ?></td>
									<td align="center"><?php
										if ($r->tarikh_tamat_permohonan == "1970-01-01" OR $r->tarikh_mula_permohonan == '' ) {
										# code...
									} else {
										echo date("d-m-Y", strtotime($r->tarikh_tamat_permohonan));
									}
									 
									 ?></td>
									<td align="center"><?php echo $r->diwujudkan_oleh; ?></td>

									 <?php if ($groups == 'admin') { ?>
									 <?php }else{ ?>

									 <td align="center"> 
									<a href="<?php echo site_url('admin/Konfigurasi_kurikulum/editsesi');?>/<?php echo $r->id;?>" class="btn " type="btu" name="action" value="kembali" style="background-color:#000063 " ><font color="white">Kemaskini</font></a>
									&nbsp;
									<a href="<?php echo site_url('admin/Konfigurasi_kurikulum/padamsesi/');?><?php echo $r->id;?>" class="btn" name="action" id="padam" style="background-color:#000063" ><font color="white">Padam</font></a>
									</td>

									 <?php } ?>

									
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

					  <a href="<?php echo site_url('admin/Konfigurasi_kurikulum/createsesi');?>" class="btn pull-right" type="btu" name="action" value="kembali" style="background-color:#000063; width:150px; height:40px; "><font color="white">Tambah</font></a>

					 <?php } ?>
					
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

	<?php $this->load->view('gspel_kurikulum/layout/footer'); ?>	
<script type="text/javascript">
	$(document).ready(function() {
    $('#myTable').DataTable();
});
</script>
<script>
// // $(document).ready(function() {
// // $('.padam').click(function() {
// // return confirm("Adakah anda pasti untuk memadamkan kluster ini?");
// // });
// // });

//   jQuery(document).ready(function(){
//           function check(content){
//                 	 var stateID = $(this).val();
//                     $.ajax({
//                         url: "<?php //echo site_url('admin/Konfigurasi_kurikulum/padamkluster');?>",
//                         type: "POST",
//                         data:  {id:content},
//                         success: function(response){
//                         	console.log($("#padam").val());
//                        if (response == true) 
//             {
//                 alert('ok');

//             }
//             else 
//             {
//                 alert('tak ade');
//             }  
//                         },
//                         error: function(){
//                               // do action
//                         }
//                     });
//                 }
//             });

$(function() {
$('[data-toggle="tooltip"]').tooltip()
})



</script>

