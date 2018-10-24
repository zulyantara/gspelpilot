
  <link href='http://localhost/gspel/trunk//assets/dist/admin/adminlte.min.css' rel='stylesheet' media='screen'>
<link href='http://localhost/gspel/trunk//assets/dist/admin/lib.min.css' rel='stylesheet' media='screen'>
<link href='http://localhost/gspel/trunk//assets/dist/admin/app.min.css' rel='stylesheet' media='screen'>
<link href='http://localhost/gspel/trunk//assets/plugins/datatables/jquery.dataTables.min.css' rel='stylesheet' media='screen'>
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
<script src='http://localhost/gspel/trunk//assets/dist/admin/adminlte.min.js'></script>
<script src='http://localhost/gspel/trunk//assets/dist/admin/lib.min.js'></script>
<script src='http://localhost/gspel/trunk//assets/dist/admin/app.min.js'></script>
<script src='http://localhost/gspel/trunk//assets/plugins/datatables/jquery.dataTables.min.js'></script>
<script src='http://localhost/gspel/trunk//assets/plugins/datatables/dataTables.bootstrap.min.js'></script>



<div class="container">
 <div class="row" id="one" >
  <div class="col-lg-12">
    <div class="box">
    <h2>Kurikulum Borang 04</h2>
        <div class="panel panel-info panel-custom-horrible-red">
            <div class="panel-heading">
               <h4 style="color: white;width:100%">Keputusan Penilaian Berterusan &  Penilaian Akhir Modul</h4>
                                    </div>    
            <div class="panel panel-body col-sm-12" style="background-color: white">
            <div class ="table table-responsive">
            <table align="center" class ="table table-hover table-bordered"><tr>
            <td><img src="<?php echo base_url(); ?>/assets/images/giatmara03.png" style="width: 45%;height: 50%"></td>
            <td>
             <?php //var_dump($modulheader);die();?>
              <table class ="table table-hover table-bordered" border="2" style="color: white" width="50%" align="right">
              <?php foreach($modulheader as $r):?>

               <tr>
                 <td style="background-color:#726f6e">Sesi</td><td  style="background-color:#C0C0C0;color:#000000"><?php echo $r->sesi;?></td>
               </tr> 
                <?php endforeach; ?>
               <?php //foreach($moduldetail as $r)?>
                <tr>
                 <td style="background-color:#726f6e">Bilangan Pelatih</td><td  style="background-color:#C0C0C0;color:#000000"><?php echo count($moduldetail);?></td>
               </tr> 
              <?php ?>
              </table>
            </td>
            </tr>
            </table>
          </div>
            <br>
          <!--div class ="panel panel-body col-sm-12  " style="background-color: white"-->  
      <table class ="table table-hover table-bordered" id = "myTable" border="2">
              <thead style="background-color:#726f6e">
                <tr style="color: white;bgcolor: #cccccc">
                  <td rowspan = "2" >Bil</th>
                  <td align="center" rowspan = "2">Nama Pelatih</th>
                  <td align="center" rowspan = "2">No. ID Pengenalan </th>
                  <td align="center" rowspan = "2">No. Pelatih</th>
                  <td align="center" rowspan = "2">GCPA</th>
                  <td align="center" rowspan = "2">Tahap Keterampilan</th>
                  <td align="center" rowspan = "2">Kehadiran<br>(100%)</th>
                  <td align="center" colspan = "4" style="text-align: center">Subjek</th>
                  <td align="center" rowspan = "2">Latihan Industri</th>
                  <td align="center" rowspan = "2">Anugerah Sijil</th>
                 

                  <tr style="color: white;bgcolor: #cccccc">
                    <td align="center">Ko-Kurikulum</td>
                    <td align="center">Core Ability</td>
                    <td align="center">Keusahawanan</td>
                    <td align="center">Puji</td>
                  </tr>
              
              </thead>
              <tbody>
                    <?php
              
                      $ni=1;
                      $no =0;
                      
                      foreach($moduldetail as $r) : 
                        ?> 

                <tr style="background-color:#C0C0C0">
                  <td><?php echo $ni; ?></td>
                  <td><?php echo strtoupper($r->nama_penuh); ?></td>
                  <td align="center"><?php echo $r->no_mykad; ?></td>
                  <td align="center"><?php echo $r->no_pelatih; ?></td>
                   <td align="center"><?php echo $r->gcpa; ?></td>
                  <td align="center"><?php echo $r->tahap_keterampilan; ?></td>
                   <td align="center"><?php echo $r->kehadiran; ?></td>
                  <td align="center">
                   <?php  if($r->kokurikulum == "0"){ echo "Dilaksanakan";}
                   else{echo "Tidak Dilaksanakan";}
                    ?>              
                    </td>
                 <td align="center">
                  <?php if($r->literasi_komputer == "0"){ echo "Terampil";}
                   else{echo "Belum Terampil";}
                    ?>               
                    </td>
                 <td align="center">
                    <?php if($r->keusahawanan == "0"){ echo "Dilaksanakan";}
                   else{echo "Tidak Dilaksanakan";}
                    ?>              
                  </td>
                 <td align="center">
                  <?php if( $r->puji == "0"){ echo "Terampil";}
                   else{echo "Belum Terampil";}
                    ?>              
                  </td>
                <td align="center">
                  
                  <?php 
                  if ($r->tempoh_industri <> '' OR $r->tempoh_industri <> 0) {
                  if( $r->latihan_industri == "0" OR $r->latihan_industri == NULL OR $r->latihan_industri == ''){ echo "DILAKSANAKAN";}
                   else{echo "TIDAK DILAKSANAKAN";}}else{
                    echo "N/A";
                   }
                    ?>              
                  </td>
                 
                 <td align="center">
                  <?php 
                  if ($r->jenis_kursus == "a") {
                    if ($r->sklgm ==1) {
                    echo "SKLGM";
                    }else{
                      echo "";
                    }
                  } else if ($r->jenis_kursus == "b"){
                    if ($r->skgm1 == "on" AND $r->saegm1 == "on" AND $r->spgm == "on") {
                      echo "SPGM & SKGM & SAEGM ";
                    } else if($r->saegm1 == "on" AND $r->skgm1 == "on" ) {
                      echo "SKGM & SAEGM ";
                    } else if($r->saegm1 == "on" AND $r->spgm1 == "on" ) {
                      echo "SPGM & SAEGM";
                    } else if($r->skgm1 == "on" AND $r->saegm1 == "on" ) {
                      echo "SKGM & SAEGM ";
                    } else if ($r->spgm1 == "on") {
                      echo "SPGM";
                    } else if($r->skgm1 == "on") {
                      echo "SKGM ";
                    } else if ($r->saegm1 == "on") {
                      echo "SAEGM";
                    } 
                    
                    else {
                      echo "";
                    }
                    
                  } else {
                    echo "none";
                  }
                  ?>
                  </td>
                  
                </tr>
               
                  <?php 

                  $no++;
                  $ni++;
                  endforeach;
                     ?>
              </tbody>
            </table>
  
        <!-- </div> -->
  </div>
</div>
</div>
</div>
</div>
</div>

<br>
<div class="container">
 <div class="row" id="one" >
  <div class="col-md-12">
   
<div class ="table table-responsive">
 <table class ="table table-hover table-bordered" id = "myTable">
            
              <tbody>
                                     <tr
                style="background-color:#FFFFFF">
                 <?php foreach ($trainer1 as $r) {?>
                  <td>Pengajar 1<br><br><br>
                   
                __________________________________<br>
                  Nama:<?php echo " ".$r->nama; ?> <br>
No. MyKAD: <?php echo "  ".$r->mykad; ?><br>
Tarikh: 
                  </td>
                  <?php } ?>
                   <?php foreach ($trainer2 as $r) {?>
                  <td>Pengajar 2<br><br><br>
               
                __________________________________<br>
                  Nama:<?php echo "  ".$r->nama; ?> <br>
No. MyKAD: <?php echo "  ".$r->mykad;?><br>
Tarikh: 
</td>
<?php } ?>
   <?php foreach ($pengurus as $r) {?>
                   <td>Pengurus<br><br><br>
                  
                __________________________________<br>
                  Nama:<?php echo "  ".$r->nama; ?> <br>
No. MyKAD: <?php echo "  ".$r->mykad;?><br>
Tarikh: 
</td>
<?php }?>
                  
                </tr>
                
              </tbody>
            </table>

  
    </div>
    </div>
</div>
<style type="text/css">
  
</style>

<script type="text/javascript">
  

</script>