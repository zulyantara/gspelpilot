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
			<h1>Pengurusan Ketua Kluster</h1>
			<ol class="breadcrumb">
			<li class=''><a href=''>Home</a></li><li class='active'>Pengurusan Ketua Kluster</li></ol>		
		</section>
		<section class="content">
			
<div class="row" id="one" >
	<div class="col-md-12">
		<div class="box">

      <div class="panel panel-info panel-custom-horrible-red">
  				<div class="panel-heading panel-heading-custom">
  					<h4 style="color: white">Kemaskini Ketua Kluster</h4>
  				</div>

    				<div class="panel-body">
  					<div class ="">

  		<form class="form-horizontal" action="<?php echo site_url('admin/Konfigurasi_kurikulum/updateketuakluster');?>" method="post">
        <fieldset>
        	  <input type="hidden" name="iduser" value="<?php echo $iduser;?>">
            <input type="hidden" name="idketuakluster" value="<?php echo $idketuakluster;?>">
        <div class="form-group">
            <label class="col-md-2">Nama User</label>
              <div class="col-md-4">
                <select id="users" name="users" class="form-control" required="required">
               <!--  <option value="" selected="selected">Sila Pilih</option> -->
                    <?php
                     foreach($users as $a){
                    echo '<option value="'. $a->id.'">'. $a->first_name .'</option>';
                    }
                   // echo print_r($listuser);
                    foreach($listuser as $p){
                    echo '<option value="'. $p->id.'">'. $p->first_name .'</option>';
                    }
                  ?>
              </select>
            </div>
          </div>

        <div class="form-group">
          <label class="col-md-2">Nama Kluster</label>
          <div class="col-md-4">
          <select id="kluster" name="kluster" class="form-control" required="required">
                <!-- <option value="" selected="selected">Sila Pilih</option> -->
                    <?php
                    foreach($kluster as $b){
                    echo '<option value="'. $b->id.'">'. $b->nama_kluster .'</option>';
                    }

                    foreach($listkluster as $r){
                    echo '<option value="'. $r->id.'">'. $r->nama_kluster .'</option>';
                    }
                  ?>
              </select>
          </div>
        </div>

         <div class="form-group">
          <div class="col-md-2"></div>
          <div class="col-md-4">
            <button id="paparkan" name="paparkan" type="submit" class="btn update" style="background-color: #000063  "><font color="white">Kemaskini</font></button>

              <a href="<?php echo site_url('admin/Konfigurasi_kurikulum/aturketuakluster');?>" id="kembali" name="kembali" class=" btn btn-md" style="background-color: #000063  "><font color="white">Kembali Ke Halaman Sebelumnya</font></a>
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
return confirm("Adakah anda pasti untuk mengemaskini ketua kluster ini?");
});
});

$(function() {
$('[data-toggle="tooltip"]').tooltip()
})
</script>
 