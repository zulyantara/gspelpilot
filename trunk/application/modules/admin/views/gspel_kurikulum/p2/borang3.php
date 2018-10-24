
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
  <div class="col-xl-12">
    <div class="box">
    <h2>Kurikulum Borang 03</h2>
        <div class="panel panel-info panel-custom-horrible-red">
            <div class="panel-heading">
               <h4 style="color: white">Keputusan Penilaian Berterusan &  Penilaian Akhir Modul</h4>
                                    </div>    
            <div class="panel panel-body col-sm-12 pull-center well" style="background-color: white">
            <div class ="table table-responsive">
            <table align="center"><tr>
            <td><img src="<?php echo base_url(); ?>/assets/images/giatmara03.png" style="width: 70%;height: 60%"></td>
            <td width="70%" align="right">
              <table class ="table table-hover table-bordered" border="2" style="color: white">
              <?php foreach($modulheader as $q):?>
               <tr>
                 <td style="background-color:#726f6e">Nama Pelatih</td><td colspan="3" style="background-color:#C0C0C0;color:#000000"><?php echo $q->nama_penuh; ?></td>
               </tr> 
                <tr>
                 <td style="background-color:#726f6e" width="15%">No. Pelatih</td><td width="35%" style="background-color:#C0C0C0;color:#000000"><?php echo $q->no_pelatih; ?></td><td width="20%" style="background-color:#726f6e">No. ID Pengenalan</td><td width="30%" style="background-color:#C0C0C0;color:#000000"><?php echo $q->no_mykad; ?></td>
               </tr> 
                <tr>
                 <td style="background-color:#726f6e">GIATMARA</td><td  style="background-color:#C0C0C0;color:#000000"><?php echo $q->nama_giatmara; ?></td><td style="background-color:#726f6e">Sesi</td><td  style="background-color:#C0C0C0;color:#000000"><?php echo $q->nama_intake; ?></td>
               </tr> 
                 <tr>
                 <td style="background-color:#726f6e">Kursus</td><td  style="background-color:#C0C0C0;color:#000000" colspan="3"><?php echo $q->nama_kursus; ?></td>
               </tr> 
             <?php endforeach;?>
              </table>
            </td>
            </tr>
            </table>
            <br>
           <!--  <?php //var_dump($moduldetail);die();?> -->
           
      <table class ="table table-hover table-bordered" id = "myTable" border="2" width="100%">
              <thead style="background-color:#726f6e">
                 <?php
                         foreach($modul as $p) :
                          ?>
                <tr style="color: white; bgcolor:#cccccc">
                  <td>Bil</th>
                  <td align="center">Kod Modul</th>
                  <td align="center">Tajuk Modul</th>
                  <td align="center">Kredit Keterampilan</th>
                  <td align="center">Markah Penilaian Berterusan<br>(<?php echo $p->pb_peratus; ?> %)</th>
                  <td align="center">Markah Penilaian Akhir Modul<br>(<?php echo $p->pam_peratus; ?>%)</th>
                  <td align="center">Markah Modul<br>(100%)</th>
                  <td align="center">Gred Keterampilan</th>
                  <td align="center">Gred Poin Keterampilan</th>
                  <!--th >Poin Keterampilan</th-->
                  <td align="center">Tahap Keterampilan</th>
              

                </tr>
                <?php  endforeach;?>
              </thead>
              <tbody>
                <?php
                $totalKredit = 0;
                $totalPoint = 0;
                      $ni=1;
                      $no =0;
                      
                      foreach($moduldetail as $r) : 
                        if($r->kod_modul != "GCPA"){
                        ?> 
            <tr style="background-color:#C0C0C0" >
            
                        <td><?php echo $ni;  ?></td>
                  <td align="center"><?php echo $r->kod_modul;  ?></td>
                  <td align="center"><?php echo $r->nama_modul;  ?></td>
                  <td align="center"><?php echo $r->jam_kredit;  ?></td>
                  <td align="center"><?php echo number_format($r->pb,2);  ?></td>
                   <td align="center"><?php echo number_format($r->pam,2);  ?></td>
                  <td align="center"><?php echo number_format($r->markah,2);  ?></td>
                   <td align="center"><?php echo $r->gred_keterampilan;  ?></td>
                  <td align="center"><?php echo number_format($r->gredpoin_keterampilan,2);  ?></td>
                  <!--td><?php //echo number_format((float)$r->poin_keterampilan, 2, '.', '');  ?></td-->
                  <td align="center"><?php echo $r->tahap_keterampilan;  ?></td>
              
                
                </tr>
                <?php 

                  $no++;
                  $ni++;

                $totalKredit += $r->jam_kredit;
                $totalPoint += $r->poin_keterampilan;

                }
                  endforeach; ?>
                <tr
                style="background-color:#726f6e">
                  <td colspan = "3">
                  </td>
                  <td  style="background-color:#C0C0C0" align="center"><?php echo  number_format((float)$totalKredit, 2, '.', ''); ?></td>
                   <td colspan = "5">
                  </td>
                  <td style="background-color:#C0C0C0" align="center"><?php echo number_format((float)$totalPoint, 2, '.', ''); ?></td>
                             
                </tr>

                   <tr
                style="background-color:#726f6e">
                  <td colspan = "11">
                  </td>                
                </tr>
                <?php
                foreach($moduldetail as $r) : 
                if($r->kod_modul == "GCPA"){
                ?> 
 
                <tr style="background-color:#726f6e">
                  <td colspan = "3" align="center"><font color="white"><?php echo $r->kod_modul; ?></font>
                  </td>
                  <td  style="background-color:#C0C0C0"align="center"><?php echo $r->jam_kredit; ?></td>
                   <td  style="background-color:#C0C0C0" colspan = "8" align="center">
                   TAHAP KETERAMPILAN GIATMARA : <?php echo $r->tahap_keterampilan; ?>
                  </td>
                              
                </tr>
                <?php 
                }
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

     <?php //var_dump($trainer1);die();  ?>
   
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