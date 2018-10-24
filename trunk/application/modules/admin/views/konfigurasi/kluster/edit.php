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
			<h1>Pengurusan Kluster</h1>
			<ol class="breadcrumb">
			<li class=''><a href=''>Home</a></li><li class='active'>Pengurusan Kluster</li></ol>		
		</section>
		<section class="content">
			
<div class="row" id="one" >
	<div class="col-md-12">
		<div class="box">

      <div class="panel panel-info panel-custom-horrible-red">
  				<div class="panel-heading panel-heading-custom">
  					<h4 style="color: white">Kemaskini Kluster</h4>
  				</div>

    				<div class="panel-body">
  					<div class ="">

  		<form class="form-horizontal" action="<?php echo site_url('admin/Konfigurasi_kurikulum/updatekluster');?>" method="post">
        <fieldset>
        	<?php foreach ($klusterdetail as $r) : ?>
    <div class="form-group">
            <label class="col-md-2">KOD KLUSTER</label>
              <div class="col-md-4">
                <input type="text" style="width: 400px" name="kode" value="<?php echo $r->kod_kluster; ?>" >
            </div>
          </div> 

        <div class="form-group">
          <label class="col-md-2">NAMA KLUSTER</label>
          <div class="col-md-4">
          <input type="text" style="width: 400px" name="nama" value="<?php echo $r->nama_kluster; ?>">
          </div>
        </div>

        <input type="hidden" name="idkluster" value="<?php echo $r->id; ?>">

    <?php endforeach; ?>

         <div class="form-group">
          <div class="col-md-2"></div>
          <div class="col-md-4">
            <button id="paparkan" name="paparkan" type="submit" class="btn update" style="background-color: #000063  "><font color="white">Kemaskini</font></button>

              <a href="<?php echo site_url('admin/Konfigurasi_kurikulum/aturkluster');?>" id="kembali" name="kembali" class=" btn btn-md" style="background-color: #000063  "><font color="white">Kembali Ke Halaman Sebelumnya</font></a>
          </div>
        </div>

        </fieldset>
        </form>

					</div>
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


 <script>
$(document).ready(function() {
$('.update').click(function() {
return confirm("Adakah anda pasti untuk mengemaskini kluster ini?");
});
});

$(function() {
$('[data-toggle="tooltip"]').tooltip()
})
</script>
 