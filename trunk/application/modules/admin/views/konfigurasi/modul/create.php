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
			<h1>Pengurusan Modul</h1>
			<ol class="breadcrumb">
			<li class=''><a href=''>Home</a></li><li class='active'>Pengurusan Modul</li></ol>		
		</section>
		<section class="content">
			
<div class="row" id="one" >
	<div class="col-md-12">
		<div class="box">

      <div class="panel panel-info panel-custom-horrible-red">
  				<div class="panel-heading panel-heading-custom">
  					<h4 style="color: white">Tambah Modul Kursus</h4>
  				</div>

    				<div class="panel-body">
  					<div class ="table table-responsive">

  		<form class="form-horizontal col-md-12" action="<?php echo site_url('admin/Konfigurasi_kurikulum/storemodul');?>" method="post">
        <fieldset>
       <!--  <table> -->
          
            <div class="col-md-12">
        <!-- <div class="form-horizontal"> -->
        <div class="form-group">
            <label class="col-md-2">Kluster</label>
              <div class="col-md-10">
                 <select id="kluster" name="kluster" class="form-control" required="required">
              
              <?php
              foreach($kluster as $r){
				if($idkluster==$r->id){
					echo '<option value="'. $r->id.'">'. $r->nama_kluster .'</option>';
				}
              }
            ?>
             </select>
            </div>
          </div>

           <div class="form-group">
          <label class="col-md-2">Kursus</label>
          <div class="col-md-10">
          <select id="kursus" name="kursus" class="form-control" required="required">
             <?php
              foreach($kursus as $rk){
				if($idkursus==$rk->id){
					echo '<option value="'. $rk->id.'">'. $rk->nama_kursus .'</option>';
				}
              }
            ?>
          </select>
          </div>
        </div>


        <div class="form-group">
          <label class="col-md-2">Kod Modul <font color="#ff0000">*</font></label>
          <div class="col-md-10">
          <input type="text" style="width:100%" name="kodemodul" required>
          </div>
        </div>

         <div class="form-group">
          <label class="col-md-2">Nama Modul <font color="#ff0000">*</font></label>
          <div class="col-md-10">
          <input type="text" style="width:100%" name="namamodul" required>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2">Masa Modul</label>
          <div class="col-md-10">
          <table class ="table table-hover table-bordered" id = "myTable" border="2">
              <thead style="background-color:#726f6e">
                <tr style="color: white">
                  <th style="text-align: center">Teori <font color="#ff0000">*</font></th>
                  <th style="text-align: center">Amali <font color="#ff0000">*</font></th>
                  <th style="text-align: center">Jam Kredit <font color="#ff0000">*</font></th>
               </tr>
                </thead>
              <tbody>
                 <tr style="background-color:#C0C0C0">
                  <td align="center"><input type=text  style="width:60px;height:60px" name="teori" required></td>
                  <td align="center"><input type=text  style="width:60px;height:60px" name="amali" required></td>
                  <td align="center"><input type=text  style="width:60px;height:60px" name="jamkredit" required></td>
                </tr>
                </tbody>
            </table>
          </div>
        </div>

        <div class="form-group">
            <label class="col-md-2">Penilaian</label>
              <div class="col-md-10">
                <table class ="table table-hover table-bordered" id = "myTable" border="2">
              <thead style="background-color:#726f6e" align="content-header">
                <tr style="color: white">
                  <th rowspan = "2" style="text-align: center">Peratusan PB <font color="#ff0000">*</font></th>
                  <th colspan = "2" style="text-align: center">Penilaian Berterusan</th>
                  <th rowspan = "2" style="text-align: center">Peratusan PAM <font color="#ff0000">*</font></th>
                  <th colspan = "2" style="text-align: center">Penilaian Akhir Modul</th>
               </tr>
               <tr style="color: white">
                  <th style="text-align: center">Teori <font color="#ff0000">*</font></th>
                  <th style="text-align: center">Amali <font color="#ff0000">*</font></th>
                  <th style="text-align: center">Teori <font color="#ff0000">*</font></th>
                  <th style="text-align: center">Amali <font color="#ff0000">*</font></th>
               </tr>
                </thead>
              <tbody>
                 <tr style="background-color:#C0C0C0">
                  <td align="center"><input type=text value="70" style="width:60px;height:60px" name="peratusanpb" required></td>
                  <td align="center"><input type=text value="20"  style="width:60px;height:60px" name="pbteori" required></td>
                  <td align="center"><input type=text value="80"  style="width:60px;height:60px" name="pbamali" required></td>
                  <td align="center"><input type=text value="30"  style="width:60px;height:60px" name="peratusanpm" required></td>
                  <td align="center"><input type=text value="20"  style="width:60px;height:60px" name="pmteori" required></td>
                  <td align="center"><input type=text value="80"  style="width:60px;height:60px" name="pmamali" required></td>
                </tr>
              </tbody>
            </table>
            </div>
          </div>
</div>
  
        <input type="hidden" name="kursus2" value="<?php echo $r->kursus; ?>">
         <input type="hidden" name="kluster2" value="<?php echo $r->kluster; ?>">

         <div class="form-group">
          <br>
          <div class="col-md-4">
            <button id="paparkan" name="paparkan" type="submit" class="btn update" style="background-color: #000063  "><font color="white">Tambah</font></button>

               <a href="<?php echo site_url('admin/Konfigurasi_kurikulum/aturmodul2');?>/<?php echo $idSeq;?>" id="kembali" name="kembali" class="btn tambah" style="background-color: #000063  "><font color="white">Kembali Ke Halaman Sebelumnya</font></a>
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
  $(document).ready(function() {
        $('select[name="kluster"]').on('change', function() {
            var BASE_URL = "<?php echo base_url();?>";
            var stateID = $(this).val();
            var e = document.getElementById("kursus");
            if(stateID) {
                $.ajax({
                    url: '<?php echo base_url();?>admin/Konfigurasi_kurikulum/ajaxkursus/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                       $('select[name="kursus"]').empty();
                       $("#kursus").prepend("<option value=''>Sila Pilih</option>").val('');
                      $.each(data, function(key, value) {
                      $('select[name="kursus"]').append('<option value="'+ value.id +'">'+ value.nama_kursus +'</option>');
					  });
                    }
                });
               
            }else{
        
            console.log(stateID);

            }
        });
 });
</script>

