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
  					<h4 style="color: white">Kemaskini Kursus</h4>
  				</div>

    				<div class="panel-body">
  					<div class ="table table-responsive">

  		<form class="form-horizontal col-md-12" action="<?php echo site_url('admin/Konfigurasi_kurikulum/updatekursus');?>" method="post">
        <fieldset>
       <!--  <table> -->
          
            <div class="col-md-6">
        <?php 
        // var_dump($test);die();
        foreach ($kursusdetail as $r) { ?>
        <div class="form-group">
            <label class="col-md-4">Kluster <font color="#ff0000">*</font></label>
              <div class="col-md-8">
                 <select id="kluster" name="kluster" class="form-control" required="required">
              <!-- <option value="" selected="selected">Sila Pilih</option> -->
             <?php
             
              echo '<option value="'. $r->idkluster.'"  selected >'. $r->nama_kluster .'</option>';
              
            ?>
              <?php
              foreach($kluster as $p){
              echo '<option value="'. $p->id.'">'. $p->nama_kluster .'</option>';
              }
            ?>
             </select>
            </div>
          </div>

        <div class="form-group">
          <label class="col-md-4">Nama Kursus <font color="#ff0000">*</font></label>
          <div class="col-md-6">
          <input type="text" style="width:138%" name="nama" class="form-control" required value="<?php echo $r->nama_kursus; ?>" >
          </div>
        </div>

         <div class="form-group">
          <label class="col-md-4">Nama Sijil <font color="#ff0000">*</font></label>
          <div class="col-md-6">
          <input type="text" style="width:138%" name="sijil" class="form-control" required value="<?php echo $r->nama_kursus_sijil; ?>">
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4">Tempoh Latihan Di Pusat <font color="#ff0000">*</font></label>
          <div class="col-md-6">
          <input type="number" style="width:138%" name="latihanpusat" class="form-control" required  value="<?php echo $r->tempoh_pusat; ?>">
          </div>
        </div>

        <div class="form-group">
            <label class="col-md-4">Status <font color="#ff0000">*</font></label>
              <div class="col-md-8">
                 <select id="jenisstatus" name="jenisstatus" class="form-control" class="form-control"  required="required">
              <!-- option value="" selected="selected">Sila Pilih</option> -->
              <?php
              if ($r->status_kursus == 1) { 
              echo '<option value="'. $r->status_kursus.'" selected >Aktif</option>';
              } else {
                 echo '<option value="'. $r->status_kursus.'"  selected >Tidak Aktif</option>';
              }
              ?>
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
            <label class="col-md-4">Tahap Kursus <font color="#ff0000">*</font></label>
              <div class="col-md-8">
                 <select id="tahap" name="tahap" class="form-control" >
            <!--   <option value="" selected="selected">Sila Pilih</option> -->
             <?php
              if ($r->jenis_kursus == "b") { 
              echo '<option value="'. $r->jenis_kursus.'" selected >Sepenuh Masa</option>';
              } else {
                 echo '<option value="'. $r->jenis_kursus.'"  selected>Lanjutan / Pengkhususan</option>';
              }
              ?>
            <option value="b">Sepenuh Masa</option>
            <option value="a">Lanjutan / Pengkhususan</option>
             </select>
            </div>
          </div>
        <!-- </div> -->

        <div class="form-group">
          <label class="col-md-4">Kod Kursus <font color="#ff0000">*</font></label>
          <div class="col-md-6">
          <input type="text" style="width:138%" name="kodekursus" class="form-control" required value="<?php echo $r->kod_kursus; ?>" >
          </div>
        </div>

         <div class="form-group">
          <label class="col-md-4">Kod SKM <font color="#ff0000">*</font></label>
          <div class="col-md-6">
          <input type="text" style="width:138%" name="kodeskm" class="form-control" required value="<?php echo $r->kod_skm;?>">
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4">Tempoh Latihan Industri <font color="#ff0000">*</font></label>
          <div class="col-md-6">
          <input type="number" style="width:138%" name="latihanindustri" class="form-control" required value="<?php echo $r->tempoh_industri; ?>">
          </div>
        </div>
 <input type="hidden" name="id" value="<?php echo $r->id; ?>">
  <input type="hidden" name="idSeq" value="<?php echo $idSeq2; ?>">
   <input type="hidden" name="idsetting" value="<?php echo $idsetting; ?>">
    <input type="hidden" name="tahap2" value="<?php echo $r->jenis_kursus; ?>">
        <br>
        <br>
<BR>
<?php } ?>
</div>

<!-- </table> -->
         <div class="form-group">
          <br>
          <div class="col-md-4">
            <button id="paparkan" name="paparkan" type="submit" class="btn update" style="background-color: #000063  "><font color="white">Kemaskini</font></button>

               <a href="<?php echo site_url('admin/Konfigurasi_kurikulum/aturkursus2');?>/<?php echo $idSeq2;?>" id="kembali" name="kembali" class=" btn btn-md" style="background-color: #000063  "><font color="white">Kembali Ke Halaman Sebelumnya</font></a>
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
  <script>
    <?php 

    if ($cek <> '') { ?>
   $(document).ready(function() {
$('.update').click(function() {
return confirm("Terdapat pemarkahan yang telah direkodkan bagi modul ini. Adakah anda pasti untuk mengemaskini kursus ini?");
});
});
  <?php   } else { ?>
   $(document).ready(function() {
$('.update').click(function() {
return confirm("Adakah anda pasti untuk mengemaskini kursus ini?");
});
});
  <?php   } ?>


$(function() {
$('[data-toggle="tooltip"]').tooltip()
})
</script>
