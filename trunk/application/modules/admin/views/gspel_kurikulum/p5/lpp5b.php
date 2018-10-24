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
			<h1>Penukaran MyKAD Pelatih (LPP5B)
</h1>
			<ol class="breadcrumb">
			<li class=''><a href=''>Home</a></li><li class='active'>Penukaran MyKAD Pelatih (LPP5B)
</li></ol>		
		</section>
		<section class="content">
			
<div class="row" id="one" >
	<div class="col-md-12">
		<div class="box">

      <div class="panel panel-info panel-custom-horrible-red">
  				<div class="panel-heading panel-heading-custom">
  					<h4 style="color: white">Penukaran MyKAD Pelatih (LPP5B)
</h4>
  				</div>

    				<div class="panel-body">
  					<div >

  		<form class="form-horizontal" action="<?php echo site_url('admin/Gspel_kurikulum/updatelpp5b');?>" method="post">
        <fieldset>
        	<?php foreach ($lpp5b as $r) : ?>
    
        <div class="form-group">
          <label class="col-md-2"> No MyKad yang Dikemaskini</label>
          <div class="col-md-4">
          <input type="text" style="width: 400px" name="mykad2" ">
          </div>
        </div>


        <div class="form-group">
          <label class="col-md-2">No MyKAD Asal</label>
          <div class="col-md-4">
          <input type="text" style="width: 400px" name="mykad1" value="<?php echo $r->mykad_asal; ?>" readonly>
          </div>
        </div>

        <input type="hidden" name="idpelatih" value="<?php echo $r->id_pelatih; ?>">

    <?php endforeach; ?>
    <input type="hidden" name="idSeq" value="<?php echo $idSeq; ?>">
         <div class="form-group">
          <div class="col-md-2"></div>
          <div class="col-md-4">
            <button id="paparkan" name="paparkan" type="submit" class="btn update" style="background-color: #000063  "><font color="white">Kemaskini</font></button>

              <a href="<?php echo site_url('admin/Gspel_kurikulum/certificateb');?>/<?php echo $idSeq;?>" /id="kembali" name="kembali" class=" btn btn-md" style="background-color: #000063  "><font color="white">Kembali Ke Halaman Sebelumnya</font></a>
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

 