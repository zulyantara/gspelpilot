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
      <h1>Senarai Kursus</h1>
      <ol class="breadcrumb">
  <li class=''><a href=''>Home</a></li><li class='active'>Senarai Kursus</li></ol>   </section>
    <section class="content">
   <div class="row">

  <div class="col-md-12">
    <div class="box ">
        <div class="panel panel-custom-horrible-red"  >
        <div class="panel-heading " >
          <h4 style="color: white">Carian</h4>
        </div>
          <div class="panel-body" >
        <form class="form-horizontal" action="<?php echo site_url('admin/Konfigurasi_kurikulum/aturkursus2');?>" method="post">
        <fieldset>
        <div class="form-group">
            <label class="col-md-2">Status</label>
              <div class="col-md-4">
            <select id="statuskursus" name="statuskursus" class="form-control" required="required">
           <?php
              if ($statuskursus == 1) { 
              echo '<option value="'. $statuskursus.'"  selected >Aktif</option>';
              } else {
                 echo '<option value="'. $statuskursus.'">Tidak Aktif</option>';
              }
              ?>
            <option value="1">Aktif</option>
            <option value="2">Tidak Aktif</option>
            </select>
            </div>
          </div>

        <div class="form-group">
          <label class="col-md-2">Kluster</label>
          <div class="col-md-4">
            <select id="kluster" name="kluster" class="form-control" required="required">
             <?php
              foreach($klusterpilih as $p){
              echo '<option value="'. $p->id.'" selected >'. $p->nama_kluster .'</option>';
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
          <label class="col-md-2">Kod / Nama Kursus</label>
          <div class="col-md-6">
           <input type="text" name="kursus" id="kursus" style="width:65%;height: 30px" value="<?php echo $kursus; ?>">
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
            <h4 style="color: white">Senarai Kursus</h4>
          </div>

            <div class="panel-body">
            <div class ="table table-responsive">


            <table class ="table table-hover table-striped table-bordered" id = "myTable">
              <thead style ="background-color:#b3b3b3" style="text-align: center;">
                <tr style="text-align: center;">
                  <th style="text-align: center;">Bil</th>
                  <th style="text-align: center;" >Kluster</th>
                   <th style="text-align: center;">Tahap Kursus</th>
                  <th style="text-align: center;">Kod Kursus</th>
                  <th style="text-align: center;">Nama Kursus</th>
                  <th style="text-align: center;">Nama Sijil</th>
                  <th style="text-align: center;">Kod SKM</th>
                  <th style="text-align: center;">Tempoh Latihan di Pusat (bulan)</th>
                  <th style="text-align: center;">Tempoh Latihan di Industri (bulan)</th>
                  <th style="text-align: center;">Bil Modul</th>
                  <th style="text-align: center;">Bil Pusat</th>
                  <th style="text-align: center;">Tarikh Dikuatkuasa </th>
                   <th style="text-align: center;">Status </th>
                  <th style="text-align: center;">Tindakan</th>
                </tr>
              </thead>
              <tbody>
                <?php

                  

            //    print_r($kursusdetail2);die();

                $ni=1;
                $no =0;

               
                foreach($kursusdetail2 as $r) : ?>
                <tr>
                  <td align="center"><?php echo $ni; ?></td>
                  <td align="center"><?php echo $r->kluster; ?></td>
                  <td align="center"><?php 
                  if ($r->tahap_kursus == "b") {
                     echo "Sepenuh Masa"; 
                   } else {
                     echo "Lanjutan / Pengkhususan"; 
                   }
                  
                  ?></td>
                  <td align="center"><?php echo $r->kod_kursus; ?></td>
                  <td align="center"><?php echo $r->nama_kursus; ?></td>
                  <td align="center"><?php echo $r->nama_kursus_sijil; ?></td>
                  <td align="center"><?php echo $r->kod_skm; ?></td>
                  <td align="center"><?php echo $r->tempoh_pusat; ?></td>
                  <td align="center"><?php echo $r->tempoh_industri; ?></td>
                   <td align="center"><?php echo $r->bil_modul; ?></td>
                  <td align="center"><?php echo $r->bil_pusat; ?></td>
                  <td align="center"><?php echo date("d-m-Y", strtotime($r->tarikh_dikuatkuasa)); ?></td>
                   <td align="center"><?php if ($r->status_kursus == 1) {
                     echo "Aktif"; 
                   } else {
                     echo "Tidak Aktif"; 
                   }
                   
                  
                   ?></td>
                  
                  <td align="center"> 
              <a href="<?php echo site_url('admin/Konfigurasi_kurikulum/editkursus2');?>/<?php echo $kursus;?>/<?php echo $r->idkursus;?>/<?php echo $r->id_kluster;?>/<?php echo $r->status_kursus;?>" class="btn update" type="btu" name="action" value="kembali" style="background-color:#000063 "><font color="white">Kemaskini</font></a>
                  &nbsp;
                  <a href="<?php echo site_url('admin/Konfigurasi_kurikulum/padamkursus2/');?><?php echo $r->idkursus;?>/<?php echo $kursus;?>/<?php echo $statuskursus;?>/<?php echo $kluster2;?>" class="btn padam" name="action" id="padam" style="background-color:#000063"><font color="white">Padam</font></a>
                  </td>
                </tr>
                 <?php  
                 $no++;
                  $ni++;
                  endforeach; ?>
                    </tbody>
                </table>


          </div>
           <a href="<?php echo site_url('admin/Konfigurasi_kurikulum/createkursus');?>/<?php echo $kursus;?>/<?php echo $statuskursus;?>/<?php echo $kluster2;?>" class="btn pull-right" type="btu" name="action" value="kembali" style="background-color:#000063; width:150px; height:40px; "><font color="white">Tambah</font></a>
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
<script>
$(document).ready(function() {
$('.padam').click(function() {
return confirm("Adakah anda pasti untuk memadam kursus ini?");
});
});

$(function() {
$('[data-toggle="tooltip"]').tooltip()
})
</script>