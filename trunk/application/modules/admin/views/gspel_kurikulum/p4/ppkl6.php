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
      <h1>Pengesahan PBKL</h1>
      <ol class="breadcrumb">
  <li class=''><a href=''>Home</a></li><li class='active'>Pengesahan PBKL</li></ol>   </section>
    <section class="content">
  

<div class="row" id="one" >
  <div class="col-md-12">
  <div class="box ">
    
      <div class="panel panel-info panel-custom-horrible-red">
        <div class="panel-heading panel-heading-custom">
          <h4 style="color:white">Bahagian B: Pemarkahan Subjek</h4>
        </div>
          <div class="panel-body">
         
          <table width="100%" border="0"><tr><td width="70%">
          <table class ="table" border="0">
                <tr>
                  <td>Nama Kursus</td>
                  <td>:</td>
                  <td><?php
                      foreach($modul as $r) :
                    echo $r->nama_kursus;
                      endforeach;
                     ?></td>
                </tr>
                <tr>
                  <td>Jumlah Pelatih</td>
                  <td>:</td>
                  <td>
                  <?php
                      foreach($modul as $r) :
                     echo $r->jumlah_pelatih;
                  endforeach;?></td>
                </tr>
                
                <tr><td colspan="3"></td></tr>
          </table>
          </td>
          <td width="10%">&nbsp;</td>
          <td width="20%">
    <table width="100%" style="border:3px solid #ff0000" cellpadding="4px" cellspacing="2px">
          <tr><td colspan="3" align="center"><b>STATUS</b></td>
                  </tr>
                  <tr>
                  <td >Belum Isi</td>
                    <td >:</td>
                  <td>

                    <?php 

                      foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/ppkl6/');?><?php echo $r->id_ref_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>/<?php echo 0;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>/<?php echo $negeri;?>"><?php
                                
                                echo $r->belum_isi;
                                                      endforeach;
                                ?></a></td>
                    </tr>
                    <tr>
                    <td>Simpan</td>
                    <td>:</td>
                  <td>
                    <?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/ppkl6/');?><<?php echo $r->id_ref_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>/<?php echo 1;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>/<?php echo $negeri;?>"><?php
                                
                                echo $r->telah_disimpan;
                                                      endforeach;
                                ?></a></td>
                              </tr>
                              <tr>
                                <td>Hantar ke Pengurus</td>
                                <td>:</td>

                                <td>
                    <?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/ppkl6/');?><?php echo $r->id_ref_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>/<?php echo 2;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>/<?php echo $negeri;?>"><?php
                                
                                echo $r->hantar_ke_pengurus;
                                                      endforeach;
                                ?></a></td>
                              </tr>
                                <tr>
                                <td>Dikembalikan oleh Pengurus</td>
                                <td>:</td>

                                <td>
                    <?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/ppkl6/');?><?php echo $r->id_ref_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>/<?php echo 3;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>/<?php echo $negeri;?>"><?php
                                echo $r->dikembalikan;
                                                      endforeach;
                                ?></a></td>
                              </tr>


                              <tr>
                                <td>Hantar Ke PGN</td>
                                <td>:</td>
                                <td>
                    <?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/ppkl6/');?><?php echo $r->id_ref_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>/<?php echo 4;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>/<?php echo $negeri;?>"><?php
                                
                                echo $r->hantar_ke_pgn;
                                                      endforeach;
                                ?></a></td>
                              </tr>
                              <tr>
                                <td>Dikembalikan oleh PGN</td>
                                <td>:</td>
                                <td>
                    <?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/ppkl6/');?><?php echo $r->id_ref_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>/<?php echo 5;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>/<?php echo $negeri;?>"><?php
                                
                                echo $r->dikembalikan_oleh_pgn;
                                                      endforeach;
                                ?></a></td>
                              </tr>
                                <tr>
                                <td>Hantar ke PBKL</td>
                                <td>:</td>

                                <td>
                    <?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/ppkl6/');?><?php echo $r->id_ref_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>/<?php echo 6;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>/<?php echo $negeri;?>"><?php
                                
                                echo $r->hantar_ke_ppkl;
                                                      endforeach;
                                ?></a></td>

                                    </tr>

                                    <tr>
                                <td>Disahkan Oleh PBKL</td>
                                <td>:</td>

                                <td>
                    <?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/ppkl6/');?><?php echo $r->id_ref_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>/<?php echo 7;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>/<?php echo $negeri;?>"><?php
                                
                                echo $r->disahkan_oleh_ppkl;
                                                      endforeach;
                                ?></a></td>

                                    </tr>
                          <!--  <?php   //endforeach; ?> -->
                            </table>
          </td>
          </tr></table>
          <br>
            <!-- <form action="<?php //echo site_url('admin/Gspel_kurikulum/savetn5');?>" id="myform" method="post"> -->
           <div class ="table table-responsive">
          <table class ="table table-hover table-bordered" id = "myTable">
              <thead style ="background-color:#b3b3b3">
                <tr>
                  <th rowspan = "2">Bil</th>
                  <th rowspan = "2">Nama Pelatih</th>
                  <th rowspan = "2">No. MyKAD</th>
                  <th rowspan = "2">No. Pelatih</th>
                  <th rowspan = "2">Tarikh Hantar</th>
                  <th colspan = "2">Terampil</th>
                  <th rowspan = "2">GCPA</th>
                  <th rowspan = "2">Ko-Kurikulum</th>
                  <th rowspan = "2">Core Ability</th>
                  <th rowspan = "2">Keusahawanan</th>
                  <th rowspan = "2">Program PUJI / Moral</th>
                  <th rowspan = "2">% Kehadiran</th>
                  <th rowspan = "2">Latihan Industri</th>
                  <th rowspan = "2">Sijil</th>
                  
                </tr>
                <tr>
                        <th>Ya</th>
                        <th>Belum</th>
                    </tr>
              </thead>
              <tbody>
                <?php
                $ni=1;
                $no =0;
                if($moduldetail)
                foreach($moduldetail as $r) : ?>
                
               <tr
                style="
                      <?php 
                      
                      if ($r->status_penghantaran =="Belum Isi") {
                    echo "background-color:#FFFFFF";}
             else if ($r->status_penghantaran =="Telah Disimpan") {
                    echo "background-color:#C0C0C0";}
            else if ($r->status_penghantaran =="Hantar Ke Pengurus") {
                    echo "background-color:#00FF00";}
            else if ($r->status_penghantaran =="Dikembalikan oleh Pengurus") {
                    echo "background-color:#FFFF00";
                  }
            else if ($r->status_penghantaran =="Dikembalikan oleh PGN") {
                    echo "background-color:#F5F5DC";
                  }
            else if ($r->status_penghantaran =="Hantar Ke PGN") {
                    echo "background-color:#FFF8DC";
                  }
            else if ($r->status_penghantaran =="Hantar Ke PBKL") {
                    echo "background-color:#00FFFF";
                  }
            else if ($r->status_penghantaran =="Disahkan oleh PBKL") {
                    echo "background-color:#ADFF2F";
                  }
                  else{
                    echo "background-color:#FFFFFF";
                  }
                      ?>
                      "
                >
                  <td><?php echo $ni; ?></td>
                  <td><?php echo $r->nama_penuh; ?></td>
                  <td><?php echo $r->no_mykad; ?></td>
                  <td><?php echo $r->no_pelatih; ?></td>
                 <td><?php 
                            if ($r->tarikh_hantar_pengajar != '') {
                            echo date("d-m-Y", strtotime($r->tarikh_hantar_pengajar));
                            } else {
                              # code...
                            }
                            
                             ?></td>
                  <td><?php echo $r->terampilya; ?></td>
                  <td><?php echo $r->terampiltidak; ?></td>
                  <td <?php if ($r->gcpa < 2.00) { ?>
                  style="border:3px solid #ff0000" 
                  <?php } else { ?>
                    
                  <?php }
                   ?>
                  
                  ><?php echo $r->gcpa; ?></td>
                  <td>
                   <?php  if($r->kokurikulum == "0"){ echo "DILAKSANAKAN";}
                   else{echo "TIDAK DILAKSANAKAN";}
                    ?>              
                    </td>
                  <td>
                  <?php if($r->literasi_komputer == "0"){ echo "TERAMPIL";}
                   else{echo "BELUM TERAMPIL";}
                    ?>               
                    </td>
                  <td>
                    <?php if($r->keusahawanan == "0"){ echo "DILAKSANAKAN";}
                   else{echo "TIDAK DILAKSANAKAN";}
                    ?>              
                  </td>
               <td <?php if ($r->puji == "1") { ?>
                  style="border:3px solid #ff0000" 
                  <?php } else { ?>
                  <?php }
                   ?>
                   >
                  <?php if( $r->puji == "0" ){ echo "TERAMPIL";}
                   else{echo "BELUM TERAMPIL";}
                    ?>              
                  </td>
                <td <?php if ($r->kehadiran < 80) { ?>
                  style="border:3px solid #ff0000" 
                  <?php } else { ?>
                  <?php }
                   ?>
                   >
                    <?php echo $r->kehadiran ?></td>
                  <<td>
                  
                  <?php 
                  if ($r->tempoh_industri <> '' OR $r->tempoh_industri <> 0) {
                  if( $r->latihan_industri == "0" OR $r->latihan_industri == NULL OR $r->latihan_industri == ''){ echo "DILAKSANAKAN";}
                   else{echo "TIDAK DILAKSANAKAN";}}else{
                    echo "N/A";
                   }
                    ?>              
                  </td>
                 <td>
                  <?php 
                  if ($r->jenis_kursus == "a") {
                    if ($r->sklgm ==1) {
                    echo "SKLGM";
                    }else{
                      echo "";
                    }
                  } else if ($r->jenis_kursus == "b"){
                    if ($r->skgm == 1 AND $r->saegm == 1 AND $r->spgm == 1) {
                      echo "SPGM & SKGM & SAEGM ";
                    } else if($r->saegm == 1 AND $r->skgm == 1 ) {
                      echo "SKGM & SAEGM ";
                    } else if($r->saegm == 1 AND $r->spgm == 1 ) {
                      echo "SPGM & SAEGM";
                    } else if($r->skgm == 1 AND $r->saegm == 1 ) {
                      echo "SKGM & SAEGM ";
                    } else if ($r->spgm == 1) {
                      echo "SPGM";
                    } else if($r->skgm == 1) {
                      echo "SKGM ";
                    } else if ($r->saegm == 1) {
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
                  <!-- <td><input type="text" size="20px" name="catatan[]" id="catatan[]" disabled></td> -->
                    
                    <input type="hidden" name="id[]" value="<?php echo $r->id_markah_modul_2; ?>" >
                    <input type="hidden" name="idpelatih[]" value="<?php echo $r->id_pelatih; ?>" >
                    <input type="hidden" name="idkursus[]" value="<?php echo $r->id_kursus; ?>" >
                </tr>
                <?php    
                  $no++;
                  $ni++;
                  endforeach; ?>
                
              </tbody>
            </table>
          </div>
                     <a href="<?php echo site_url('admin/Gspel_kurikulum/ppkl2');?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>/<?php echo $negeri;?>" type="button" class="btn" name="action" value="hantar" style="background-color: #000063"><font color="white">Kembali Ke Halaman Sebelumnya</font></a>
        <!-- </form> -->
         
          </div>
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
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#myTable').DataTable();
});
</script>