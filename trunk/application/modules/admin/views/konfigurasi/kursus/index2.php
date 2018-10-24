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
          <!--  <option value="" selected="selected">Sila Pilih</option> -->
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
              <!--  <option value="" selected="selected">Sila Pilih</option> -->
             <?php
              foreach($klusterpilih as $p){
              echo '<option value="'. $p->id.'"  selected >'. $p->nama_kluster .'</option>';
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

        <!-- <div class="form-group">
          <label class="col-md-2">Kod / Nama Kursus</label>
          <div class="col-md-6">
           <input type="text" name="kursus" id="kursus" style="width:65%;height: 30px" value="<?php //echo $kursus; ?>">
          </div>
        </div>

     -->
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
                  <!--th style="text-align: center;">Bil</th-->
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
                    <?php if ($groups == 'admin') { ?>
                   <?php }else{ ?>
                   <th style="text-align: center;">Tindakan</th>
                   <?php } ?>
                  
                </tr>
              </thead>
              <tbody>

                 <?php //var_dump($statuskursus);die(); ?>
                <?php

                $ni=1;
                $no =0;

               
                foreach($kursusdetail as $r) : ?>
                <tr>
                  <!--td align="center"><?php //echo $ni; ?></td-->
                  <td align="center"><?php echo $r->nama_kluster; ?></td>
                  <td align="center"><?php 
                  if ($r->jenis_kursus == "b") {
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
                  <td align="center"> <a href="<?php echo site_url('admin/Konfigurasi_kurikulum/listpusatkursus');?>/<?php echo $r->id;?>/<?php echo $r->status_kursus;?>/<?php echo $r->id_kluster;?>"><?php
                                    echo $r->bil_pusat;
                 ?> </a></td>
                  <td align="center"><?php echo $r->tarikh_dikuatkuasa; ?></td>
                   <td align="center"><?php if ($r->status_kursus == 1) {
                     echo "Aktif"; 
                   } else {
                     echo "Tidak Aktif"; 
                   }
                   
                  
                   ?></td>

                    <?php if ($groups == 'admin') { ?>
                   <?php }else{ ?>

                   <td align="center"> 
                  <a href="<?php echo site_url('admin/Konfigurasi_kurikulum/editkursus/');?><?php echo $r->id;?>/<?php echo $kluster2;?>/<?php echo $statuskursus;?>" class="btn " type="btu" name="action" value="kembali" style="background-color:#000063 "><font color="white">Kemaskini</font></a>
                  &nbsp;
                  <a href="<?php echo site_url('admin/Konfigurasi_kurikulum/padamkursus/');?><?php echo $r->id;?>/<?php echo $r->id_kluster;?>/<?php echo $r->status_kursus;?>" class="btn padam" name="action" id="padam" style="background-color:#000063"  ><font color="white" >Padam</font></a>
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

           <a href="<?php echo site_url('admin/Konfigurasi_kurikulum/createkursus');?>/<?php echo $r->id;?>/<?php echo $kluster2;?>/<?php echo $statuskursus;?>" class="btn pull-right" type="btu" name="action" value="kembali" style="background-color:#000063; width:150px; height:40px; "><font color="white">Tambah</font></a>
           
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
 <!-- <script>
$(document).ready(function() {
$('.padam').click(function() {
return confirm("Terdapat pemarkahan yang telah direkodkan bagi modul kursus ini. Memadam kursus ini akan turut memadam pemarkahan modul yang telah direkodkan. Adakah anda pasti untuk memadam modul ini?");
});
});

$(function() {
$('[data-toggle="tooltip"]').tooltip()
})
</script> -->


