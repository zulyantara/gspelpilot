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
      <h1>Senarai Modul</h1>
      <ol class="breadcrumb">
  <li class=''><a href=''>Home</a></li><li class='active'>Senarai Modul</li></ol>   </section>
    <section class="content">
 <div class="row">

  <div class="col-md-12">
    <div class="box ">
        <div class="panel panel-custom-horrible-red"  >
        <div class="panel-heading " >
          <h4 style="color: white">Carian</h4>
        </div>
          <div class="panel-body" >
        <form class="form-horizontal" action="<?php echo site_url('admin/Konfigurasi_kurikulum/aturmodul2');?>" method="post">
        <fieldset>
      
        <div class="form-group">
          <label class="col-md-2">Kluster</label>
          <div class="col-md-4">
            <select id="kluster" name="kluster" class="form-control" required="required">
                 
              <?php
              foreach($klusterpilih as $p){
              echo '<option value="'. $p->id.'" selected>'. $p->nama_kluster .'</option>';
              }
            ?>
              <?php
              foreach($kluster as $r){
              echo '<option value="'. $r->id.'">'. $r->nama_kluster .'</option>';
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
              foreach($kursuspilih as $p){
              echo '<option value="'. $p->id.'" selected>'. $p->nama_kursus .'</option>';
              }
            ?>
              <?php
              foreach($kursus2 as $r){
              echo '<option value="'. $r->id.'">'. $r->nama_kursus .'</option>';
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
            <h4 style="color: white">Senarai Modul</h4>
          </div>

            <div class="panel-body">
            <div class ="table table-responsive">


            <table class ="table table-hover table-striped table-bordered" id = "myTable">
              <thead style ="background-color:#b3b3b3" style="text-align: center;">
                <tr style="text-align: center;">
                  <th style="text-align: center;">Bil</th>
                  <th style="text-align: center;" >Kod Modul</th>
                   <th style="text-align: center;">Nama Modul</th>
                
                 <?php if ($groups == 'admin') { ?>
                 <?php }else{ ?>
                 <th style="text-align: center;">Tindakan</th>
                 <?php } ?>
                  
                </tr>
              </thead>
              <tbody>
                <?php

                $ni=1;
                $no =0;

               
                foreach($moduldetail as $r) : ?>
                <tr>
                  <td align="center"><?php echo $ni; ?></td>
                  <td align="center"><?php echo $r->kod_modul; ?></td>
                  <td ><?php echo $r->nama_modul; ?></td>
                  
                   <?php if ($groups == 'admin') { ?>
                 <?php }else{ ?>

                  <td align="center"> 
                  <a href="<?php echo site_url('admin/Konfigurasi_kurikulum/editmodul');?>/<?php echo $kursus;?>/<?php echo $kluster2;?>/<?php echo $r->id_modul;?>" class="btn " type="btu" name="action" value="kembali" style="background-color:#000063 "><font color="white">Kemaskini</font></a>
                  &nbsp;
                  <a href="<?php echo site_url('admin/Konfigurasi_kurikulum/padammodul');?>/<?php echo $kursus;?>/<?php echo $kluster2;?>/<?php echo $r->id_modul;?>" class="btn padam" name="action" id="padam" style="background-color:#000063" ><font color="white" >Padam</font></a>
                  </td>

                 <?php } ?>
                 

                </tr>
                 <?php  
                 $no++;
                  $ni++;
                  endforeach; ?>
     
              </tbody>
                </table>
          </div>
           <?php if ($groups == 'admin') { ?>
           <?php }else{ ?>

           <a href="<?php echo site_url('admin/Konfigurasi_kurikulum/createmodul');?>/<?php echo $kursus;?>/<?php echo $kluster2;?>" class="btn pull-right" type="btu" name="action" value="kembali" style="background-color:#000063; width:150px; height:40px; "><font color="white">Tambah</font></a>
           
           <?php } ?>
           
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