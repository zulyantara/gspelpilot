<?php 

  $this->load->view('gspel_kurikulum/layout/headerb'); 


?>
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
      <h1>Senarai Tawaran Kursus</h1>
      <ol class="breadcrumb">
  <li class=''><a href=''>Home</a></li><li class='active'>Senarai Tawaran Kursus</li></ol>   </section>
    <section class="content">

<div class="row">
  <div class="col-md-12">
    <div class="box ">
        <div class="panel panel-custom-horrible-red"  >
        <div class="panel-heading " >
          <h4 style="color: white">Carian</h4>
        </div>
          <div class="panel-body" >
        <form class="form-horizontal" action="<?php echo site_url('admin/Konfigurasi_kurikulum/aturtawaran2');?>" method="post">
        <fieldset>
      
        <div class="form-group">
          <label class="col-md-2">Negeri</label>
          <div class="col-md-4">
            <select id="negeri" name="negeri" class="form-control" required="required">
         
              <?php

            foreach($negeripilih as $r){
              echo '<option value="'. $r->id.'" selected>'. $r->nama_negeri .'</option>';
              }
            ?>
             <?php
              foreach($negeri as $p){
              echo '<option value="'. $p->id.'">'. $p->nama_negeri .'</option>';
              }
            ?>
             </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2">GIATMARA</label>
          <div class="col-md-4">
          <select id="giatmara" name="giatmara" class="form-control" required="required">
              <?php

            foreach($giatmarapilih as $r){
              echo '<option value="'. $r->id.'" selected>'. $r->nama_giatmara .'</option>';
              }
            ?>
             <?php
              foreach($giatmara2 as $p){
              echo '<option value="'. $p->id.'">'. $p->nama_giatmara .'</option>';
              }
            ?>
             
             </select>
          </div>
        </div>
 
      <div class="form-group">
          <label class="col-md-2">Kursus</label>
          <div class="col-md-4">
          <select id="kursus" name="kursus" class="form-control" required="required">
              <?php

            foreach($kursuspilih as $r){
              echo '<option value="'. $r->id.'" selected>'. $r->nama_kursus .'</option>';
              }
            ?>
             <?php
              foreach($kursus2 as $p){
              echo '<option value="'. $p->id.'">'. $p->nama_kursus .'</option>';
              }
            ?>
             
             </select>
          </div>
        </div>

    <div class="form-group">
          <label class="col-md-2">Sesi</label>
          <div class="col-md-4">
          <select id="intake" name="intake" class="form-control" required="required">
              <?php

            foreach($intakepilih as $r){
              echo '<option value="'. $r->id.'" selected>'. $r->nama_intake .'</option>';
              }
            ?>
             <?php
              foreach($intake2 as $p){
              echo '<option value="'. $p->id.'">'. $p->nama_intake .'</option>';
              }
            ?>
             
             </select>
          </div>
        </div>
    
        <div class="form-group">
          <div class="col-md-2"></div>
          <div class="col-md-4">
            <button id="paparkan" name="paparkan" type="submit" class="btn" style="background-color: #000063  "><font color="white">Paparkan</font></button>
          </div>
        </div>

        </fieldset>
        </form>
      </div>
    </div>

</div>

  </div>

</div>

<div class="row" id="one" >
  <div class="col-md-12">
    <div class="box">

      <div class="panel panel-info panel-custom-horrible-red">
          <div class="panel-heading panel-heading-custom">
            <h4 style="color: white">Senarai Tawaran Kursus</h4>
          </div>

            <div class="panel-body">
            <div class ="table table-responsive">


            <table class ="table table-hover table-striped table-bordered" id = "myTable">
              <thead style ="background-color:#b3b3b3" style="text-align: center;">
                <tr style="text-align: center;">
                  <th style="text-align: center;">Bil</th>
                  <th style="text-align: center;" >Kluster</th>
                   <th style="text-align: center;">Kod Kursus</th>
                 <th style="text-align: center;">Nama Kursus</th>
                 <th style="text-align: center;">Nama Sijil</th>
                 <th style="text-align: center;">Tempoh Latihan Di Pusat</th>
                 <th style="text-align: center;">Tempoh Latihan Industri</th>
                 <th style="text-align: center;">Pusat GIATMARA</th>
                 <th style="text-align: center;">Bil Modul</th>
                 <th style="text-align: center;">Status</th>
                  <th style="text-align: center;">Sesi</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $ni=1;
                $no =0;

               
                foreach($settingdetail as $r) : ?>
                <tr>
                  <td align="center"><?php echo $ni; ?></td>
                  <td align="center"><?php echo $r->nama_kluster; ?></td>
                   <td align="center"><?php echo $r->kod_kursus; ?></td>
                  <td align="center"><?php echo $r->nama_kursus; ?></td>
                  <td align="center"><?php echo $r->nama_sijil; ?></td>
                  <td align="center"><?php echo $r->tempoh_pusat." bulan" ?></td>
                    <td align="center"><?php echo $r->tempoh_industri." bulan" ?></td>
                  <td><?php 
                  foreach ($senaraipusat as $p) {
                    echo $p->nama_giatmara;
                  }
                   ?></td>
                <td align="center"><?php 
                  foreach ($bilmodul as $w) {
                    echo $w->bil_modul;
                  }
                    ?></td>
                <td align="center"><?php
                if ($r->status == "1") {
                     echo "Aktif"; 
                   } else {
                     echo "Tidak Aktif"; 
                   }
                  ?></td>
                 <td align="center"><?php echo $r->sesi; ?></td>
                </tr>
                 <?php  
                 $no++;
                  $ni++;
                  endforeach; ?>
     
              </tbody>
                </table>
          </div>
          <!--  <a href="<?php //echo site_url('admin/Konfigurasi_kurikulum/createmodul');?>/<?php //echo $kluster2;?>/<?php //echo $kursus;?>" class="btn pull-right" type="btu" name="action" value="kembali" style="background-color:#000063; width:150px; height:40px; "><font color="white">Tambah</font></a> -->
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
  
   $.fn.dataTableExt.sErrMode = 'throw'
</script>
<script type="text/javascript">
  $(document).ready(function() {
        $('select[name="negeri"]').on('change', function() {
            var BASE_URL = "<?php echo base_url();?>";
            var stateID = $(this).val();
            var e = document.getElementById("negeri");
            if(stateID) {
                $.ajax({
                    url: '<?php echo base_url();?>admin/Konfigurasi_kurikulum/ajaxgiatmara/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                       $('select[name="giatmara"]').empty();
                       $("#giatmara").prepend("<option value=''>Sila Pilih</option>").val('');
                      $.each(data, function(key, value) {
                    
                      $('select[name="giatmara"]').append('<option value="'+ value.id +'">'+ value.nama_giatmara +'</option>');
                   
                    });

                    }
                });
               
            }else{
        
            console.log(stateID);

            }

               console.log(stateID);

        });
    });



  $(document).ready(function() {
        $('select[name="giatmara"]').on('change', function() {
            var BASE_URL = "<?php echo base_url();?>";
            var stateID = $(this).val();
            var e = document.getElementById("giatmara");
            if(stateID) {
                $.ajax({
                    url: '<?php echo base_url();?>admin/Konfigurasi_kurikulum/ajaxkursus2/'+stateID,
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

               console.log(stateID);

        });
    });


   $(document).ready(function() {
        $('select[name="kursus"]').on('change', function() {
            var BASE_URL = "<?php echo base_url();?>";
            var stateID = $(this).val();
            var e = document.getElementById("kursus");
            if(stateID) {
                $.ajax({
                    url: '<?php echo base_url();?>admin/Konfigurasi_kurikulum/ajaxintake/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                       $('select[name="intake"]').empty();
                       $("#intake").prepend("<option value=''>Sila Pilih</option>").val('');
                      $.each(data, function(key, value) {
                    
                      $('select[name="intake"]').append('<option value="'+ value.id +'">'+ value.nama_intake +'</option>');
                   
                    });

                    }
                });
               
            }else{
        
            console.log(stateID);

            }

               console.log(stateID);

        });
    });


</script>