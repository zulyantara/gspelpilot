<?php $this->load->view('gspel_kurikulum/layout/headera'); ?>



    <div class="content-wrapper">
    <section class="content-header">
      <h1>Pengesahan Pengurus</h1>
      <ol class="breadcrumb">
  <li class=''><a href=''>Home</a></li><li class='active'>Pengesahan Pengurus</li></ol>    </section>
    <section class="content">
      <div class="row">

</div>

<div class="row" id="one" >
  <div class="col-md-12">
    <div class="box">

      <div class="panel panel-info panel-custom-horrible-red">
          <div class="panel-heading panel-heading-custom">
            <h4 style="color: white">Bahagian A: Pemarkahan Modul Sepenuh Masa</h4>
          </div>
            <div class="panel-body">
          
            <table width="100%" border="0"><tr><td width="50%">
            <table class ="table" style="border:1px solid #ffffff">
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
                    <td>Nama Modul</td>
                    <td>:</td>
                    <td><?php
                      foreach($modul as $r) :
                    echo $r->nama_modul;
                      endforeach;
                     ?></td>
                  </tr>
                  <tr>
                    <td>Kod Modul</td>
                    <td>:</td>
                    <td><?php
                      foreach($modul as $r) :
                    echo $r->kod_modul;
                        endforeach;
                     ?></td>
                  </tr>
                  <tr>
                    <td>Jumlah Jam Kredit</td>
                    <td>:</td>
                    <td><?php
                      foreach($modul as $r) :
                     echo $r->jam_kredit;
                  endforeach;?></td>
                  </tr>
                  <tr>
                    <td>Jumlah Pelatih</td>
                    <td>:</td>
                    <td><?php
                      foreach($modul as $r) :
                     echo $r->jumlah_pelatih;
                  endforeach;?></td>
                  </tr>
              </table>
            </td>
            <td width="10%">&nbsp;</td>
            <td width="65%">
        <table width="60%" style="border:3px solid #ff0000" cellpadding="4px" cellspacing="2px">
          <tr><td colspan="3" align="center"><b>STATUS</b></td>
                  </tr>
                  <tr>
                  <td >Belum Isi</td>
                    <td >:</td>
                  <td>

                    <?php 

                      foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/approval4/');?><?php echo $r->id_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_set;?>/<?php echo 0;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>"><?php
                                
                                echo $r->belum_isi;
                                                      endforeach;
                                ?></a></td>
                    </tr>
                    <tr>
                    <td>Simpan</td>
                    <td>:</td>
                  <td>
                    <?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/approval4/');?><?php echo $r->id_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_set;?>/<?php echo 1;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>"><?php
                                
                                echo $r->telah_disimpan;
                                                      endforeach;
                                ?></a></td>
                              </tr>
                              <tr>
                                <td>Hantar ke Pengurus</td>
                                <td>:</td>

                                <td>
                    <?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/approval4/');?><?php echo $r->id_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_set;?>/<?php echo 2;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>"><?php
                                
                                echo $r->hantar_ke_pengurus;
                                                      endforeach;
                                ?></a></td>
                              </tr>
                                <tr>
                                <td>Dikembalikan oleh Pengurus</td>
                                <td>:</td>

                                <td>
                    <?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/approval4/');?><?php echo $r->id_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_set;?>/<?php echo 3;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>"><?php
                                
                                echo $r->dikembalikan;
                                                      endforeach;
                                ?></a></td>
                              </tr>


                              <tr>
                                <td>Hantar Ke PGN</td>
                                <td>:</td>
                                <td>
                    <?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/approval4/');?><?php echo $r->id_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_set;?>/<?php echo 4;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>"><?php
                                
                                echo $r->hantar_ke_pgn;
                                                      endforeach;
                                ?></a></td>
                              </tr>
                              <tr>
                                <td>Dikembalikan oleh PGN</td>
                                <td>:</td>
                                <td>
                    <?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/approval4/');?><?php echo $r->id_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_set;?>/<?php echo 5;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>"><?php
                                
                                echo $r->pgn_dikembalikan;
                                                      endforeach;
                                ?></a></td>
                              </tr>
                                <tr>
                                <td>Hantar ke PBKL</td>
                                <td>:</td>

                                <td>
                    <?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/approval4/');?><?php echo $r->id_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_set;?>/<?php echo 6;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>"><?php
                                
                                echo $r->hantar_ke_ppkl;
                                                      endforeach;
                                ?></a></td>
                              </tr>

                              <tr>
                                <td>Disahkan Oleh PBKL</td>
                                <td>:</td>

                                <td>
                    <?php   foreach($modul as $r) : ?>
<a href="<?php echo site_url('admin/Gspel_kurikulum/approval4/');?><?php echo $r->id_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_set;?>/<?php echo 7;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>"><?php
                                
                                echo $r->disahkan_oleh_ppkl;
                                                      endforeach;
                                ?></a></td>

                                
                              </tr>
                          <!--  <?php   //endforeach; ?> -->
                            </table>
            </td>
            </tr></table>
           <!--  <form action="<?php //echo site_url('admin/Gspel_kurikulum/savetn5');?>" id="myform" name="myform" method="post"> -->
              <div class ="table table-responsive">
            <table class ="table table-hover table-bordered" id = "myTable">
              <thead style ="background-color:#b3b3b3">
                <?php
                         foreach($modul as $r) :
                          ?>
                <tr>
                  <th rowspan = "2">Bil</th>
                  <th rowspan = "2">Nama Pelatih</th>
                  <th rowspan = "2">No. MyKAD</th>
                  <th rowspan = "2">No. Pelatih</th>
                  <th rowspan = "2">Tarikh Hantar</th>
                    <th colspan = "2" style="text-align: center" >PB (<?php echo $r->persen_pb; ?> %)</th>
                <input type="hidden" name="persen_pb" id="persen_pb" value="<?php echo $r->persen_pb; ?>">
                  <th colspan = "2" style="text-align: center"> PAM (<?php echo $r->persen_pam; ?>%)</th>
                <input type="hidden" name="persen_pam" id="persen_pam" value="<?php echo $r->persen_pam; ?>">
                  <th rowspan = "2">Markah Modul</th>
                  <th rowspan = "2">Gred Keterampilan</th>
                  <th rowspan = "2">Gred Poin Keterampilan</th>
                  <th rowspan = "2">Poin Keterampilan</th>
                  <th rowspan = "2">Tahap Keterampilan</th>
                  <th rowspan = "2">Status Penghantar</th>
                </tr>
                <tr>
                  <th>Teori (<?php echo $r->persen_pb_teori; ?>%)</th>
                <input type="hidden" name="persen_pb_teori" id="persen_pb_teori" value="<?php echo $r->persen_pb_teori; ?>">
                  <th>Amali (<?php echo $r->persen_pb_praktikal; ?>%)</th>
                <input type="hidden" name="persen_pb" id="persen_pb_praktikal" value="<?php echo $r->persen_pb_praktikal; ?>">
                  <th>Teori (<?php echo $r->persen_pam_teori; ?>%)</th>
                <input type="hidden" name="persen_pam_teori" id="persen_pam_teori" value="<?php echo $r->persen_pam_teori; ?>">
                  <th>Amali (<?php echo $r->persen_pam_praktikal; ?>%)</th>
                <input type="hidden" name="persen_pam_praktikal" id="persen_pam_praktikal" value="<?php echo $r->persen_pam_praktikal; ?>">
                </tr>
                <?php  endforeach;?>
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
                  <td><?php echo $r->pb_teori; ?></span></td>
                  <td><?php echo $r->pb_amali; ?></td>
                  <td><?php echo $r->pam_teori; ?></td>
                  <td><?php echo $r->pam_amali; ?></td>
                  <td><?php echo $r->markah; ?></td>
                  <td><?php echo $r->gred_keterampilan; ?></td>
                  <td><?php echo $r->gredpoin_keterampilan; ?></td>
                  <td><?php echo $r->poin_keterampilan; ?></td>
                  <td><?php echo $r->tahap_keterampilan; ?></td>
                  <td><?php 
                  if ($r->status_penghantaran =="Hantar Ke Pengurus") {
                    echo "✓";
                  }else{
                    echo $r->status_penghantaran;
                  }
                  ; ?></td>
                 
                  <input type="hidden" name="idmodul[]" value="<?php echo $r->id_markah_modul; ?>" >
                  <input type="hidden" name="id_modul[]" value="<?php echo $r->id_modul; ?>" >
                  <input type="hidden" name="idpelatih[]" value="<?php echo $r->id_pelatih; ?>" >
                  <input type="hidden" name="no[]" value="<?php echo $no; ?>" >

                </tr>
                  <?php    
                  $no++;
                  $ni++;
                  endforeach; ?>
              </tbody>
            </table>
      <!--   </form> -->
      </div>
       <BR>
            <a href="<?php echo site_url('admin/Gspel_kurikulum/approval2');?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>" type="button" class="btn" name="action" value="hantar" style="background-color: #000063"><font color="white">Kembali Ke Halaman Sebelumnya</font></a>
        

        </div>
      </div>


    </div>
  </div>
</div>
</div>

</section>

<script>

 
</script>
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
<?php $this->load->view('gspel_kurikulum/layout/footer'); ?>
<script type="text/javascript">
  $(document).ready(function() {
    $('#myTable').DataTable();
});
</script>