<?php $this->load->view('gspel_kurikulum/layout/headerb'); ?>



    <div class="content-wrapper">
   <?php if ($groups == 'admin') { ?>

    <section class="content-header">
      <h1>Pengesahan </h1>
      <ol class="breadcrumb">
      <li class=''><a href=''>Home</a></li><li class='active'>Pengesahan</li></ol>   
    </section>

  <?php }else{ ?>

     <section class="content-header">
      <h1>Pengesahan PBKL </h1>
      <ol class="breadcrumb">
      <li class=''><a href=''>Home</a></li><li class='active'>Pengesahan PBKL</li></ol>   
    </section>

  <?php } ?>

    <section class="content">
      <div class="row">

</div>

<div class="row" id="one" >
  <div class="col-md-12">
    <div class="box">

      <div class="panel panel-info panel-custom-horrible-red">
          <div class="panel-heading panel-heading-custom">
            <h4 style="color: white">Maklumat Pemarkahan Pelatih</h4>
          </div>
            <div class="panel-body">
           
            <table width="100%" border="0"><tr><td width="50%">
            <table class ="table" style="border:1px solid #ffffff">
                          <tr>
                    <td>Nama Kursus</td>
                    <td>:</td>
                    <td><?php echo $namakursus; ?></td>
                  </tr>
                  <tr>
                    <td>Nama Pelatih</td>
                    <td>:</td>
                    <td><?php echo preg_replace('/%20/', '  ', $namapenuh); ?></td>
                  </tr>
                  <tr>
                    <td>No MyKAD</td>
                    <td>:</td>
                    <td><?php echo $nomykad; ?></td>
                  </tr>
                  <tr>
                    <td>No Pelatih</td>
                    <td>:</td>
                    <td><?php echo $nopelatih; ?></td>
                  </tr>
                  <tr>
                    <td>GCPA</td>
                    <td>:</td>
                    <td><?php echo $gcpa; ?></td>
                  </tr>
                     <tr>
                    <td>Kehadiaran</td>
                    <td>:</td>
                 <td><?php echo $kehadiran; ?></td>
                  </tr>
              </table>
            </td>
            <td width="10%">&nbsp;</td>
            
            </tr></table>
             <form action="<?php echo site_url('admin/Gspel_kurikulum/kembali3');?>" id="myform" name="myform" method="post">
               <div class ="table table-responsive">
            <table class ="table table-hover table-bordered" id = "myTable">
             <thead style ="background-color:#b3b3b3">
                <?php
                         foreach($modul as $r) :
                          ?>
                  <tr>
                  <th rowspan = "2">Bil</th>
                  <th rowspan = "2">Nama Modul</th>
                  <th rowspan = "2">Kod Modul</th>
                    <th colspan = "2" style="text-align: center" >PB (<?php echo $r->persen_pb; ?> %)</th>
                <input type="hidden" name="persen_pb" id="persen_pb" value="<?php echo $r->persen_pb; ?>">
                  <th colspan = "2" style="text-align: center"> PAM (<?php echo $r->persen_pam; ?>%)</th>
                <input type="hidden" name="persen_pam" id="persen_pam" value="<?php echo $r->persen_pam; ?>">
                  <th rowspan = "2">Peratusan Markah %</th>
                  <th rowspan = "2">Catatan</th>
                  <th rowspan = "2">Tindakan<br>
                    <input type="checkbox" onclick="pilihsemua(this)" />
                  Pilih Semua
 
                  </th>
                  
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
                if($baga)
                foreach($baga as $p) : ?>
                <tr>
                  <td><?php echo $ni; ?></td>
                  <td><?php echo $p->nama_modul; ?></td>
                  <td><?php echo $p->kod_modul; ?></td>
                  <td><?php echo $p->pb_teori; ?></span></td>
                  <td><?php echo $p->pb_amali; ?></td>
                  <td><?php echo $p->pam_teori; ?></td>
                  <td><?php echo $p->pam_amali; ?></td>
                  <td><?php echo $p->markah; ?></td>
                  <td>
                  <?php if ($p->catatan_ppkl =="") { ?>
                   <input type="textarea"" name="catatan[<?php echo $no; ?>]" id="catatan" >
                 <?php  } else { ?>
                    <input type="textarea"" name="catatan[<?php echo $no; ?>]" id="catatan"   value="<?php echo $p->catatan_ppkl;?>" disabled>
                 <?php } ?>
                  </td>
                    <td><?php if ($p->desc_status === "PGN - Dihantar ke PBKL" ) { ?>
                    
                    <input type="checkbox" id="pilih" class="pilih" name="pilih[<?php echo $no; ?>]" value="<?php echo $no; ?>" >
                  <?php } else { ?>
                  <?php echo $p->desc_status;?>
                  <?php
                  }
                  ?></td>
                 <input type="hidden" name="idpelatih" value="<?php echo $p->id_pelatih; ?>" >
                 <input type="hidden" name="id_modul[]" value="<?php echo $p->id_modul; ?>" >

                </tr>
                  <?php    
                  $no++;
                  $ni++;
                  endforeach; ?>
              </tbody>
            </table>

<br><br>
               <table class ="table table-hover table-bordered" id = "myTable">
              <thead style ="background-color:#b3b3b3">
                <tr>
                  <th>Bhgn .</th>
                  <th>Ko-Kurikulum</th>
                  <th>Core Ability</th>
                  <th>Keusahawanan</th>
                  <th>Program PUJI / Moral</th>
                  <th>Latihan Industri </th>
                   <th>Kehadiran </th>
                  <th>Catatan</th>
                  <th>Tindakan</th>
                  
                </tr>
              </thead>
              <tbody>
              
                <?php
                $ni=1;
                $no =0;
                if($bagb)
                foreach($bagb as $r) : ?>
                <tr>
                 <td>B</td>
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
                  <td>
                  <?php if( $r->puji == "0"){ echo "TERAMPIL";}
                   else{echo "BELUM TERAMPIL";}
                    ?>              
                  </td>
                    <td>
                    <?php 
                  if ($r->tempoh_industri != 0 and $r->tempoh_industri != NULL ) {
                  if( $r->latihan_industri == "0" OR $r->latihan_industri == NULL OR $r->latihan_industri == ''){ echo "DILAKSANAKAN";}
                   else{echo "TIDAK DILAKSANAKAN";}}else{
                    echo "N/A";
                   }
                    ?>              
                  </td>
               <td>
                  <?php echo $r->kehadiran;
                    ?>              
                  </td>
                   <td><input type="textarea"" name="catatan2" id="catatan2" 
                  <?php if ($r->catatan_ppkl =="") { ?>
                    value="<?php echo $r->catatan_ppkl;?>"
                 <?php  } else { ?>
                       value="<?php echo $r->catatan_ppkl;?>" disabled
                 <?php } ?>
                  ></td>
                    <td><?php if ($r->desc_status === "PGN - Dihantar ke PBKL" ) { ?>
                    
                     <input type="checkbox" id="pilih" class="pilih" name="pilih2" value="<?php echo $no; ?>" >
                     <?php } else if($r->desc_status === "PBKL - Disahkan oleh PBKL") {?>
                     <?php echo "PBKL - Disahkan oleh PBKL";?>
                  <?php } else { ?>
                   <?php echo $r->desc_status;?>
                  <?php
                  }
                  ?></td>
                   <input type="hidden" name="id_pelatih" value="<?php echo $p->id_pelatih; ?>" >
                   </tr>
                  <?php    
                  $no++;
                  $ni++;
                  endforeach; ?>
              </tbody>
            </table>
             </div>
              <input type="hidden" name="idSeq" value="<?php echo $idSeq; ?>" >
                <input type="hidden" name="idSeq3" value="<?php echo $idSeq3; ?>" >
                 <?php if ($groups == 'admin') { ?>
                 <?php }else{ ?>
                 <button type="submit" id="submit" class="btn" name="action" class="submit" value="simpan" style="background-color:#000063 "><font color="white" form="myform">Kembalikan Ke TP</font></button>&nbsp;
                 <?php } ?>
                
               <a href="<?php echo site_url('admin/Gspel_kurikulum/ppkl7');?>/<?php echo $idSeq2;?>" type="button" class="btn" name="action" value="hantar" style="background-color: #000063"><font color="white">Kembali Ke Halaman Sebelumnya</font></a>
        </form>
     
       

        </div>
      </div>


    </div>
  </div>
</div>
</div>

</section>

<script>
function getcheckboxes() {
            var node_list = document.getElementsByTagName('input');
            var checkboxes = [];
            for (var i = 0; i < node_list.length; i++) {
                var node = node_list[i];
                if (node.getAttribute('type') == 'checkbox') {
                    checkboxes.push(node);
                }
            }
            return checkboxes;
        }
        function pilihsemua(source) {
            checkboxes = getcheckboxes();
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = source.checked;
            }
        }
 
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