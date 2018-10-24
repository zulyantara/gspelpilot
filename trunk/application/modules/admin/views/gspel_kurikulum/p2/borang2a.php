
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
  <div class="col-md-12">
    <div class="box">
    <h2>Kurikulum Borang 02</h2>
        <div class="panel panel-info panel-custom-horrible-red">
            <div class="panel-heading">
               <h4 style="color: white">Keputusan Penilaian Berterusan &  Penilaian Akhir Modul</h4>
                                    </div>    
            <div class="panel panel-body col-sm-12 pull-center well" style="background-color: white">
                <form class="form-inline" action="<?php echo site_url('admin/Gspel_kurikulum/borang2a');?>" method="POST">
            <center>  

            <span  class="form-control" style="background-color:#726f6e"><font color="white">MODUL</font></span>
                        <select class="form-control" name="list" > 
                            <option>[ Sila Pilih Modul ]</option>
                            <?php foreach ($modul as $r) : ?>
                            <option value="<?php echo $r->id_modul ?>"><?php echo $r->kod_modul." - ".$r->nama_modul ?></option>
                            
                          <?php endforeach;  ?>
                        </select>
                         <input type="hidden" name="giatmara" value="<?php echo $giatmara;?>">
                           <input type="hidden" name="idSeq" value="<?php echo $idSeq;?>">
        <button class="btn btn-default form-control" type="submit">
                                      <i>search</i>
                                    </button>
                             
                       
        </form>
        </div>
  </div>
</div>
</div>

</div>
</div>
</center>

<br>

<div class="container">
 <div class="row" id="one" >
  <div class="col-md-12">
    <div class="box">
   
        <div class="panel panel-info panel-custom-horrible-red">
            <div class="panel-heading">
               <h4 style="color: white">Keputusan Penilaian Berterusan &  Penilaian Akhir Modul</h4>
                                    </div>    
            <div class="panel panel-body col-sm-12 pull-center well" style="background-color: white">
            <div class ="table table-responsive">
            <img src="<?php echo base_url(); ?>/assets/images/giatmara03.png" style="width: 23%;height: 10%" ><br> <br>
            <?php foreach($modulheader as $r): ?>
            [MODUL : <?php echo $r->kod_modul." - ".$r->nama_modul ?>]&nbsp;[JAM KREDIT : <?php echo $r->jam_kredit ?>]&nbsp;[SESI : <?php echo $r->sesi ?> ]
             <?php endforeach; ?>
                        <center>  
      <table class ="table table-hover table-bordered" id = "myTable" border="2">
              <thead style="background-color:#726f6e">
                  <?php
                         foreach($modul2 as $p) :
                          ?>
                <tr style="color: white;bgcolor: #cccccc">
                  <td >Bil</th>
                  <td align="center">Nama Pelatih</th>
                  <td align="center">No. ID Pengenalan</th>
                  <td align="center">No. Pelatih</th>
                  <td align="center">Markah Penilaian Berterusan<br>(<?php echo $p->pb_peratus; ?> %)</th>
                  <td align="center">Markah Penilaian Akhir Modul<br>(<?php echo $p->pam_peratus; ?>%)</th>
                  <td align="center">Markah Modul<br>(100%)</th>
                  <td align="center">Gred Keterampilan</th>
                  <td align="center">Gred Poin Keterampilan</th>
                  <!--td align="center">Poin Keterampilan</th-->
                  <td align="center">Tahap Keterampilan</th>
              

                </tr>
               <?php  endforeach;?>
              </thead>
              <tbody>
                <?php
                      $ni=1;
                      $no =0;
                      if($moduldetail)
                        // print_r($moduldetail);exit();
                      foreach($moduldetail as $r) : 

                        ?>    
                                     <tr style="background-color:#C0C0C0">
                  <td><?php echo $ni?></td>
                  <td><?php echo strtoupper($r->nama_penuh); ?></td>
                <!--   <?php //var_dump($r->nama_penuh);die(); ?> -->
                  <td align="center"><?php echo $r->no_mykad ?></td>
                  <td align="center"><?php echo $r->no_pelatih ?></td>
                   <td align="center"><?php echo $r->pb ?></td>
                  <td align="center"><?php echo $r->pam ?></td>
                   <td align="center"><?php echo $r->markah ?></td>
                  <td align="center"><?php echo $r->gred_keterampilan ?></td>
                  <td align="center"><?php echo $r->gredpoin_keterampilan ?></td>
                  <!--td><?php //echo $r->poin_keterampilan ?></td-->
                <td align="center"><?php echo $r->tahap_keterampilan ?></td>
                 
                </tr>
                <?php    
                  $no++;
                  $ni++;
                  endforeach; ?>
              </tbody>
            </table>
  
        </div>
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