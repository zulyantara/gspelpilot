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
  					<h4 style="color: white">Tambah Kluster</h4>
  				</div>

    				<div class="panel-body">
  					<div class ="">

  		<form class="form-horizontal" action="<?php echo site_url('admin/Konfigurasi_kurikulum/storekluster');?>" method="post">
        <fieldset>
        
       <!--  <div class="form-group">
            <label class="col-md-2">KOD KLUSTER</label>
              <div class="col-md-4">
                <input type="text" style="width: 400px" name="kode"  >
            </div>
          </div> -->

        <div class="form-group">
          <label class="col-md-2">Nama Kluster</label>
          <div class="col-md-4">
          <input type="text" style="width: 400px" name="nama" >
          </div>
        </div>


         <div class="form-group">
          <div class="col-md-2"></div>
          <div class="col-md-4">
            <button id="paparkan" name="paparkan" type="submit" class="btn update" style="background-color: #000063  "><font color="white">Tambah</font></button>

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
