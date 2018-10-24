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
			<h1>Pengurusan Kursus</h1>
			<ol class="breadcrumb">
			<li class=''><a href=''>Home</a></li><li class='active'>Pengurusan Kursus</li></ol>		
		</section>
		<section class="content">
			
<div class="row" id="one" >
	<div class="col-md-12">
		<div class="box">

      <div class="panel panel-info panel-custom-horrible-red">
  				<div class="panel-heading panel-heading-custom">
  					<h4 style="color: white">Tambah Kursus</h4>
  				</div>

    				<div class="panel-body">
  					<div class ="table table-responsive">

  		<form class="form-horizontal col-md-12" action="<?php echo site_url('admin/Konfigurasi_kurikulum/storekursus');?>" method="post">
        <fieldset>
       <!--  <table> -->
          
            <div class="col-md-6">
        <!-- <div class="form-horizontal"> -->
        <div class="form-group">
            <label class="col-md-4">Kluster</label>
              <div class="col-md-8">
                 <select id="kluster" name="kluster" class="form-control" required="required">
              <option value="" selected="selected">Sila Pilih</option>
              <?php
              foreach($kluster as $r){
              echo '<option value="'. $r->id.'">'. $r->nama_kluster .'</option>';
              }
            ?>
             </select>
            </div>
          </div>

        <div class="form-group">
          <label class="col-md-4">Nama Kursus</label>
          <div class="col-md-6">
          <input type="text" style="width:138%" name="nama" >
          </div>
        </div>

         <div class="form-group">
          <label class="col-md-4">Nama Sijil</label>
          <div class="col-md-6">
          <input type="text" style="width:138%" name="sijil" >
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4">Tempoh Latihan Di Pusat</label>
          <div class="col-md-6">
          <input type="number" style="width:138%" name="latihanpusat" >
          </div>
        </div>

        <div class="form-group">
            <label class="col-md-4">Status</label>
              <div class="col-md-8">
                 <select id="jenisstatus" name="jenisstatus" class="form-control" required="required">
              <option value="" selected="selected">Sila Pilih</option>
            <option value="1">Aktif</option>
            <option value="2">Tidak Aktif</option>
             </select>
            </div>
          </div>

          <!-- </div> -->
</div>

<div class="col-md-6">
         <!-- <div class="form-horizontal"> -->
        <div class="form-group">
            <label class="col-md-4">Tahap Kursus</label>
              <div class="col-md-8">
                 <select id="tahap" name="tahap" class="form-control" required="required">
              <option value="" selected="selected">Sila Pilih</option>
            <option value="b">Sepenuh Masa</option>
            <option value="a">Lanjutan / Pengkhususan</option>
             </select>
            </div>
          </div>
        <!-- </div> -->

        <div class="form-group">
          <label class="col-md-4">Kod Kursus</label>
          <div class="col-md-6">
          <input type="text" style="width:138%" name="kodekursus" >
          </div>
        </div>

         <div class="form-group">
          <label class="col-md-4">Kod SKM</label>
          <div class="col-md-6">
          <input type="text" style="width:138%" name="kodeskm" >
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4">Tempoh Latihan Industri</label>
          <div class="col-md-6">
          <input type="number" style="width:138%" name="latihanindustri" >
          </div>
        </div>

  <input type="hidden" name="idSeq" value="<?php echo $idSeq; ?>">
        <br>
        <br>
<BR>
</div>

<!-- </table> -->
         <div class="form-group">
          <br>
          <div class="col-md-4">
            <button id="paparkan" name="paparkan" type="submit" class="btn update" style="background-color: #000063  "><font color="white">Tambah</font></button>

               <a href="<?php echo site_url('admin/Konfigurasi_kurikulum/aturkursus2');?>/<?php echo $idSeq;?>" id="kembali" name="kembali" class=" btn btn-md" style="background-color: #000063  "><font color="white">Kembali Ke Halaman Sebelumnya</font></a>
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
<script type="text/javascript">
            $(document).ready(function () {
                $('.tarikhkuasa').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
            });
 </script>