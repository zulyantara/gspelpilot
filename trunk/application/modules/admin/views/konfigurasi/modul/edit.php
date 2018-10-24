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
  					<h4 style="color: white">Kemaskini Modul Kursus</h4>
  				</div>

    				<div class="panel-body">
  					<div class ="table table-responsive">

  		<form class="form-horizontal col-md-12" action="<?php echo site_url('admin/Konfigurasi_kurikulum/updatemodul');?>" method="post">
        <fieldset>
      <?php 
      $ni=1;
      $no =0;
      foreach($moduldetail as $r) : ?>
      
          <div class="col-md-12">
              <div class="form-group">
            <label class="col-md-2">Kluster</label>
              <div class="col-md-10">
               <?php echo $r->nama_kluster;  ?>  
               <input type="hidden" name="kursus" value="<?php echo $r->nama_kluster;  ?> ">
            </div>
          </div>

           <div class="form-group">
          <label class="col-md-2">Kursus</label>
          <div class="col-md-10">
              <?php echo $r->nama_kursus;  ?>  
              <input type="hidden" name="idmodul" value="<?php echo $r->id_modul; ?>">
              <input type="hidden" name="kursus" value="<?php echo $r->id_kursus; ?>">
               <input type="hidden" name="kursus2" value="<?php echo $kursus; ?>">
                <input type="hidden" name="kluster2" value="<?php echo $kluster; ?>">
          </div>
        </div>


        <div class="form-group">
          <label class="col-md-2">Kod Modul</label>
          <div class="col-md-10">
          <input type="text" style="width:100%" name="kodemodul" value="<?php echo $r->kod_modul ?>" >
          </div>
        </div>

         <div class="form-group">
          <label class="col-md-2">Nama Modul</label>
          <div class="col-md-10">
          <input type="text" style="width:100%" name="namamodul" value="<?php echo $r->nama_modul ?>" >
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2">Masa Modul</label>
          <div class="col-md-10">
          <table class ="table table-hover table-bordered" id = "myTable" border="2">
              <thead style="background-color:#726f6e">
                <tr style="color: white">
                  <th style="text-align: center">Teori</th>
                  <th style="text-align: center">Amali</th>
                  <th style="text-align: center">Jam Kredit </th>
               </tr>
                </thead>
              <tbody>
                 <tr style="background-color:#C0C0C0">
                  <td align="center"><input type=text  style="width:60px;height:60px" name="teori" value="<?php echo number_format($r->teori,2); ?>"></td>
                  <td align="center"><input type=text  style="width:60px;height:60px" name="amali" value="<?php echo number_format($r->praktikal,2); ?>"></td>
                  <td align="center"><input type=text  style="width:60px;height:60px" name="jamkredit" value="<?php echo number_format($r->jam_kredit,2); ?>"></td>
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
                  <th rowspan = "2" style="text-align: center">Peratusan PB</th>
                  <th colspan = "2" style="text-align: center">Penilaian Berterusan</th>
                  <th rowspan = "2" style="text-align: center">Peratusan PAM</th>
                  <th colspan = "2" style="text-align: center">Penilaian Akhir Modul</th>
               </tr>
               <tr style="color: white">
                  <th style="text-align: center">Teori</th>
                  <th style="text-align: center"> Amali</th>
                  <th style="text-align: center">Teori</th>
                  <th style="text-align: center">Amali</th>
               </tr>
                </thead>
              <tbody>
                 <tr style="background-color:#C0C0C0">
                  <td align="center"><input type=number  style="width:60px;height:60px" name="peratusanpb" value="<?php echo $r->pb_peratus ?>"></td>
                  <td align="center"><input type=number  style="width:60px;height:60px" name="pbteori" value="<?php echo $r->pb_teori ?>"></td>
                  <td align="center"><input type=number  style="width:60px;height:60px" name="pbamali" value="<?php echo $r->pb_praktikal ?>"></td>
                   <td align="center"><input type=number  style="width:60px;height:60px" name="peratusanpm" value="<?php echo $r->pam_peratus ?>"></td>
                  <td align="center"><input type=number  style="width:60px;height:60px" name="pmteori" value="<?php echo $r->pam_teori ?>"></td>
                  <td align="center"><input type=number  style="width:60px;height:60px" name="pmamali" value="<?php echo $r->pam_praktikal ?>"></td>
                </tr>
                </tbody>
            </table>
            </div>
          </div>
</div>
  <input type="hidden" name="idSeq" value="<?php echo $idSeq; ?>">

         <div class="form-group">
          <br>
          <div class="col-md-4">
            <button id="paparkan" name="paparkan" type="submit" class="btn update" style="background-color: #000063  "><font color="white">Kemaskini</font></button>

               <a href="<?php echo site_url('admin/Konfigurasi_kurikulum/aturmodul2');?>/<?php echo $idSeq;?>" id="kembali" name="kembali" class=" btn btn-md" style="background-color: #000063  "><font color="white">Kembali Ke Halaman Sebelumnya</font></a>
          </div>

        </div>
      <?php 
       $no++;
      $ni++;
       endforeach;
      ?>

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
<script>
    <?php 

    if ($count <> '') { ?>
   $(document).ready(function() {
$('.update').click(function() {
return confirm("Terdapat pemarkahan yang telah direkodkan bagi modul ini. Adakah anda pasti untuk mengemaskini modul ini?");
});
});
  <?php   } else { ?>
   $(document).ready(function() {
$('.update').click(function() {
return confirm("Adakah anda pasti untuk mengemaskini modul ini?");
});
});
  <?php   } ?>


$(function() {
$('[data-toggle="tooltip"]').tooltip()
})
</script>