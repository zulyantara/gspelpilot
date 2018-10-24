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
			<li class=''><a href=''>Home</a></li><li class='active'>Pengurusan Sesi</li></ol>		
		</section>
		<section class="content">
			
<div class="row" id="one" >
	<div class="col-md-12">
		<div class="box">

      <div class="panel panel-info panel-custom-horrible-red">
  				<div class="panel-heading panel-heading-custom">
  					<h4 style="color: white" align="center">“Terdapat kursus yang ditawarkan pada sesi ini, semua data penawaran kursus akan terhapus dari sistem GSPel jika sesi ini dipadam. Adakah anda pasti untuk memadam sesi?”</h4><!-- <h4 style="color:red" align="center">DILARANG PADAM</h4> -->
  				</div>

    				<div class="panel-body">
  					<div class ="table table-responsive">


						<table class ="table table-hover table-striped table-bordered" id = "myTable">
							<thead style ="background-color:#b3b3b3" style="text-align: center;">
								<tr style="text-align: center;">
									<th style="text-align: center;">Bil</th>
									<th style="text-align: center;" >GIATMARA</th>
									<th style="text-align: center;">Kursus</th>
									
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
									<td align="center"><?php echo $r->giatmara; ?></td>
									<td align="center"><?php echo $r->kursus; ?></td>
								</tr>
								<?php    
									$no++;
									$ni++;
									endforeach; ?>
							
							</tbody>
							
						</table>


					</div>
					<!-- <?php //foreach($sesi as $p) : ?> -->
					 <a href="<?php echo site_url('admin/Konfigurasi_kurikulum/deletesetting/');?><?php echo $r->id_intake;?>" class="btn padam" name="action" id="padam" style="background-color:#000063"  ><font color="white">Padam</font></a>
					  &nbsp;
					   <a href="<?php echo site_url('admin/Konfigurasi_kurikulum/atursesi');?>" id="kembali" name="kembali" class=" btn btn-md" style="background-color: #000063  "><font color="white">Kembali Ke Halaman Sebelumnya</font></a>
					<!-- <?php  //endforeach; ?> -->
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
$(document).ready(function() {
$('.padam').click(function() {
return confirm("Adakah anda pasti untuk memadam kluster ini?");
});
});


$(function() {
$('[data-toggle="tooltip"]').tooltip()
})



</script>

