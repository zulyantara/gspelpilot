<?php $this->load->view('gspel_kurikulum/layout/header'); ?>
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
      <h1>Pemarkahan</h1>
      <ol class="breadcrumb">
  <li class=''><a href=''>Home</a></li><li class='active'>Pemarkahan</li></ol>    </section>
    <section class="content">
      <div class="row">

<?php if ($groups == 'admin') { ?>

 <div class="col-md-12">
    <div class="box ">
        <div class="panel panel-custom-horrible-red"  >
        <div class="panel-heading " >
          <h4 style="color: white">Carian</h4>
        </div>
          <div class="panel-body" >
        <form class="form-horizontal" action="<?php echo site_url('admin/Gspel_kurikulum/trainer3');?>" method="post">
        <fieldset>

           <div class="form-group">
          <label class="col-md-2">Negeri</label>
          <div class="col-md-4">
            <select id="negeri" name="negeri" class="form-control" required="required">
            <option value="" selected="selected">Sila Pilih</option>
              <?php
              foreach($negeri as $r){
              echo '<option value="'. $r->id.'">'. $r->nama_negeri .'</option>';
              }
            ?>
             </select>
          </div>
        </div>

         <div class="form-group">
          <label class="col-md-2">GIATMARA</label>
          <div class="col-md-4">
            <select id="giatmara" name="giatmara" class="form-control" required="required">
            <option value="" selected="selected">Sila Pilih</option>
             
             </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2">Kursus</label>
          <div class="col-md-4">
           <select name="kursus" id="kursus" class="form-control"  required="required">
            <option value="" selected="selected">Sila Pilih</option>
              </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2">Jenis Kursus</label>
          <div class="col-md-4">
            <select id="jeniskursus" name="jeniskursus" class="form-control" required="required">
           <!--  <option value="">Semua</option> -->
           <option value="" selected="selected">Sila Pilih</option>
            <option value="LPP04">LPP04</option>
            <option value="LPP09">LPP09</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2">Sesi Kemasukan</label>
          <div class="col-md-4">
            <select id="intake" name="intake" class="form-control" required="required">
               <option value="" selected="selected">Sila Pilih</option>
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


 <?php }else{ ?>


  <div class="col-md-12">
    <div class="box">
        <div class="panel panel-info panel-custom-horrible-red ">
        <div class="panel-heading panel-heading-custom">
          <h4 style="color: white">Carian</h4>
        </div>
          <div class="panel-body">
        <form class="form-horizontal" action="<?php echo site_url('admin/Gspel_kurikulum/trainer3');?>" method="post">
        <fieldset>
        <div class="form-group">
            <label class="col-md-2">GIATMARA</label>
              <div class="col-md-4">
                <?php
                foreach($user2 as $r){
                echo $r->giatmara;
                echo "<input name='giatmara' value='$r->id' type='hidden'>";
          }
              ?>
              </div>
          </div>
<?php //print_r($modul);die() ?>        <div class="form-group">
          <label class="col-md-2">Kursus</label>
          <div class="col-md-4">
            <?php #var_dump($user3a); ?>
            <select id="kursus" name="kursus" class="form-control">
              <option value="">Sila Pilih</option>
              <?php foreach($user3a as $r){ ?>
                <option value="<?php echo $r->id ?>" <?php if ($kursus == $r->id) echo "selected"; ?>>
              <?php
                echo  $r->nama_kursus ;
              }
              ?>
                </option>
              <?php
              #foreach($user3b as $r){
              #echo '<option value="'. $r->id.'">'. $r->kursus .'</option>';
              #}
              ?>
             </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2">Jenis Kursus</label>
          <div class="col-md-4">
            <select id="jeniskursus" name="jeniskursus" class="form-control">
              <option value="">Sila Pilih</option>
           <option value="LPP09" <?php if ($jeniskursus == "LPP09") {
              echo "selected";
            } ?> >LPP09</option>
           <option value="LPP04" <?php if ($jeniskursus == "LPP04") {
              echo "selected";
            } ?> >LPP04</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2">Sesi Kemasukan</label>
          <div class="col-md-4">
            <select id="intake" name="intake" class="form-control">
              <option value="">Sila Pilih</option>
          <?php
              foreach($user4a as $r){ ?>
            <option value="<?php echo $r->id ?>" <?php if ($intake == $r->id) echo "selected"; ?>>
            <?php
              echo  $r->nama_intake ;
              }
            ?></option>

              <?php
              #foreach($user4b as $r){
              #echo '<option value="'. $r->id.'">'. $r->sesi .'</option>';
              #}
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

   <?php } ?>

</div>

<div class="row" >
  <div class="col-md-12">
    <div class="box">

    <div class="panel panel-info panel-custom-horrible-red ">
        <div class="panel-heading panel-heading-custom ">

                <h4 style="color: white">Pemarkahan Modul Sepenuh Masa</h4>
              </div>
                <div class="panel-body">
                <div class ="table table-responsive">
                  <table class ="table table-hover table-striped table-bordered" id = "myTable">
                    <thead style ="background-color:#b3b3b3">
                      <tr>
                        <th rowspan = "2">Bil</th>
                        <th rowspan = "2">Kod Modul</th>
                        <th rowspan = "2">Nama Modul</th>
                        <th rowspan = "2">Jumlah Pelatih (<?php if ($jeniskursus=="") {

                          echo "LPP04 dan LPP09";
                        } else {
                         echo $jeniskursus;
                        }
                         ?>)</th>

      									<th colspan = "2">Terampil</th>
      									<th colspan = "9" style="text-align: center;">Status</th>
      								</tr>
      								<tr>
      									<th>Ya</th>
      									<th>Belum</th>
      									<th>Belum Isi</th>
      									<th>Telah Disimpan</th>
      									<th>Hantar ke Pengurus</th> 
      									<th>Dikembalikan oleh Pengurus</th>
                        <th>Hantar Ke PGN</th>
                        <th>Dikembalikan oleh PGN</th>
                        <th>Hantar ke PBKL</th>
                        <th>Dikembalikan oleh PBKL</th>
                        <th>Disahkan oleh PBKL</th>
                       </tr>
                    </thead>
                    <tbody>
                     <tr>
                        <?php
                        $no =1;
                        if($modul)
                        foreach($modul as $r) :?>

                      <?php if($r->kod_modul =="BAHAGIAN B") { ?>
                      <td style="background-color: #F5F5DC">
                      <?php } else { ?>
                        <td>
                      <?php } ?>
                      <?php echo $no++; ?></td>

                       <?php if($r->kod_modul =="BAHAGIAN B") { ?>
                      <td style="background-color: #F5F5DC">
                      <?php } else { ?>
                        <td>
                      <?php } ?>
                      <?php echo $r->kod_modul; ?></td>

                      <?php if($r->kod_modul =="BAHAGIAN B") { ?>
                      <td style="background-color: #F5F5DC">
                      <?php } else { ?>
                        <td>
                      <?php } ?>
                      <?php echo $r->nama_modul; ?></td>

                      <?php if($r->kod_modul =="BAHAGIAN B") { ?>
                      <td style="background-color: #F5F5DC" align="center" valign="middle">
                      <?php } else { ?>
                      <td align="center" valign="middle">
                      <?php } ?>
                      <a href="<?php if($r->kod_modul =="BAHAGIAN B"){
                        echo site_url('admin/Gspel_kurikulum/trainer5/');}
                        else{
                          echo site_url('admin/Gspel_kurikulum/trainer4/'); 
                        }
                        ?><?php echo $r->id_ref_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo $r->id_modul;?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>/<?php echo $kursus;?>/<?php echo $giatmara;?>/<?php echo $intake;?>/<?php echo $jeniskursus;?>"><?php echo $r->jumlah_pelatih; ?></a>
                        </td>

                      <?php if($r->kod_modul =="BAHAGIAN B") { ?>
                      <td style="background-color: #F5F5DC" align="center" valign="middle">
                      <?php } else { ?>
                      <td align="center" valign="middle">
                      <?php } ?>
                      <?php echo $r->terampil; ?></td>

                      <?php if($r->kod_modul =="BAHAGIAN B") { ?>
                      <td style="background-color: #F5F5DC" align="center" valign="middle">
                      <?php } else { ?>
                      <td align="center" valign="middle">
                      <?php } ?>
                      <?php echo $r->tidak_terampil; ?></td>

                      <?php if($r->kod_modul =="BAHAGIAN B") { ?>
                      <td style="background-color: #F5F5DC" align="center" valign="middle">
                      <?php } else { ?>
                      <td align="center" valign="middle">
                      <?php } ?>
                        <a href="<?php if($r->kod_modul =="BAHAGIAN B"){
                        echo site_url('admin/Gspel_kurikulum/trainer7/');}
                        else{
                          echo site_url('admin/Gspel_kurikulum/trainer6/');} 
                        ?><?php echo $r->id_ref_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo "Q"?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>/<?php echo 0;?>/<?php echo $kursus;?>/<?php echo $giatmara;?>/<?php echo $intake;?>/<?php echo $jeniskursus;?>"><?php echo $r->belum_isi; ?></a></td>

                      <?php if($r->kod_modul =="BAHAGIAN B") { ?>
                      <td style="background-color: #F5F5DC" align="center" valign="middle">
                      <?php } else { ?>
                      <td align="center" valign="middle">
                      <?php } ?>
                        <a href="<?php if($r->kod_modul =="BAHAGIAN B"){
                        echo site_url('admin/Gspel_kurikulum/trainer7/');}
                        else{
                          echo site_url('admin/Gspel_kurikulum/trainer6/');} 
                        ?><?php echo $r->id_ref_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo "Q";?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>/<?php echo 1;?>/<?php echo $kursus;?>/<?php echo $giatmara;?>/<?php echo $intake;?>/<?php echo $jeniskursus;?>"><?php echo $r->telah_disimpan; ?></a></td>

                      <?php if($r->kod_modul =="BAHAGIAN B") { ?>
                      <td style="background-color: #F5F5DC" align="center" valign="middle">
                      <?php } else { ?>
                      <td align="center" valign="middle">
                      <?php } ?>
                        <a href="<?php if($r->kod_modul =="BAHAGIAN B"){
                        echo site_url('admin/Gspel_kurikulum/trainer7/');}
                        else{
                          echo site_url('admin/Gspel_kurikulum/trainer6/');} 
                        ?><?php echo $r->id_ref_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo "Q";?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>/<?php echo 2;?>/<?php echo $kursus;?>/<?php echo $giatmara;?>/<?php echo $intake;?>/<?php echo $jeniskursus;?>"><?php echo $r->hantar_ke_pengurus; ?></a></td>


                      <?php if($r->kod_modul =="BAHAGIAN B") { ?>
                      <td style="background-color: #F5F5DC" align="center" valign="middle">
                      <?php } else { ?>
                      <td align="center" valign="middle">
                      <?php } ?>
                        <a href="<?php if($r->kod_modul =="BAHAGIAN B"){
                        echo site_url('admin/Gspel_kurikulum/trainer7/');}
                        else{
                        echo site_url('admin/Gspel_kurikulum/trainer6/');} ?><?php echo $r->id_ref_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo "Q";?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>/<?php echo 3;?>/<?php echo $kursus;?>/<?php echo $giatmara;?>/<?php echo $intake;?>/<?php echo $jeniskursus;?>"><?php echo $r->dikembalikan; ?></a></td>


                      <?php if($r->kod_modul =="BAHAGIAN B") { ?>
                      <td style="background-color: #F5F5DC" align="center" valign="middle">
                      <?php } else { ?>
                      <td align="center" valign="middle">
                      <?php } ?>
                        <a href="<?php if($r->kod_modul =="BAHAGIAN B"){
                        echo site_url('admin/Gspel_kurikulum/trainer7/');}
                        else{
                        echo site_url('admin/Gspel_kurikulum/trainer6/');} ?><?php echo $r->id_ref_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo "Q";?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>/<?php echo 4;?>/<?php echo $kursus;?>/<?php echo $giatmara;?>/<?php echo $intake;?>/<?php echo $jeniskursus;?>"><?php echo $r->hantar_ke_pgn; ?></a></td>

                      <?php if($r->kod_modul =="BAHAGIAN B") { ?>
                      <td style="background-color: #F5F5DC" align="center" valign="middle">
                      <?php } else { ?>
                      <td align="center" valign="middle">
                      <?php } ?>
                        <a href="<?php if($r->kod_modul =="BAHAGIAN B"){
                        echo site_url('admin/Gspel_kurikulum/trainer7/');}
                        else{
                          echo site_url('admin/Gspel_kurikulum/trainer6/');} ?><?php echo $r->id_ref_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo "Q";?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>/<?php echo 5;?>/<?php echo $kursus;?>/<?php echo $giatmara;?>/<?php echo $intake;?>/<?php echo $jeniskursus;?>"><?php echo $r->dikembalikan_oleh_pgn; ?></a></td>

                      <?php if($r->kod_modul =="BAHAGIAN B") { ?>
                      <td style="background-color: #F5F5DC" align="center" valign="middle">
                      <?php } else { ?>
                      <td align="center" valign="middle">
                      <?php } ?>
                        <a href="<?php if($r->kod_modul =="BAHAGIAN B"){
                        echo site_url('admin/Gspel_kurikulum/trainer7/');}
                        else{
                          echo site_url('admin/Gspel_kurikulum/trainer6/');} ?><?php echo $r->id_ref_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo "Q";?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>/<?php echo 6;?>/<?php echo $kursus;?>/<?php echo $giatmara;?>/<?php echo $intake;?>/<?php echo $jeniskursus;?>"><?php echo $r->hantar_ke_ppkl; ?></a></td>


                      <?php if($r->kod_modul =="BAHAGIAN B") { ?>
                      <td style="background-color: #F5F5DC" align="center" valign="middle">
                      <?php } else { ?>
                      <td align="center" valign="middle">
                      <?php } ?>
                        <a href="<?php if($r->kod_modul =="BAHAGIAN B"){
                        echo site_url('admin/Gspel_kurikulum/trainer7/');}
                        else{
                          echo site_url('admin/Gspel_kurikulum/trainer6/');} ?><?php echo $r->id_ref_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo "Q";?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>/<?php echo 8;?>/<?php echo $kursus;?>/<?php echo $giatmara;?>/<?php echo $intake;?>/<?php echo $jeniskursus;?>"><?php echo $r->dikembalikan_oleh_ppkl; ?></a></td>


                      <?php if($r->kod_modul =="BAHAGIAN B") { ?>
                      <td style="background-color: #F5F5DC" align="center" valign="middle">
                      <?php } else { ?>
                      <td align="center" valign="middle">
                      <?php } ?>
                        <a href="<?php if($r->kod_modul =="BAHAGIAN B"){
                        echo site_url('admin/Gspel_kurikulum/trainer7/');}
                        else{
                          echo site_url('admin/Gspel_kurikulum/trainer6/');} ?><?php echo $r->id_ref_kursus;?>/<?php echo $r->kod_modul;?>/<?php echo "Q";?>/<?php echo $r->id_giatmara;?>/<?php echo $r->id_kursus;?>/<?php echo 7;?>/<?php echo $kursus;?>/<?php echo $giatmara;?>/<?php echo $intake;?>/<?php echo $jeniskursus;?>"><?php echo $r->disahkan_oleh_ppkl; ?></a></td>

                          </tr>
                      <?php endforeach; ?>
                      </tbody>
                       
                  </table>
                </div>
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
  
   $.fn.dataTableExt.sErrMode = 'throw';
</script>
<script type="text/javascript">
   var defOption ='<option value=""> Sila Pilih</option>';

$(document).ready(function() {
        $('select[name="negeri"]').on('change', function() {
            var BASE_URL = "<?php echo base_url();?>";
            var stateID = $(this).val();
            var e = document.getElementById("giatmara");
            if(stateID) {
                $.ajax({
                    url: '<?php echo base_url();?>admin/gspel_kurikulum/ajaxcoba3/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                       $('select[name="giatmara"]').empty();
                       $("#giatmara").prepend("<option value=''>Sila Pilih</option>").val('');
                      $.each(data, function(key, value) {
                          
                    // $("#giatmara option:selected").remove();
                      $('select[name="giatmara"]').append('<option value="'+ value.id +'">'+ value.nama_giatmara +'</option>');
                   
                    });

                    }
                });
                // console.log(stateID);
            }else{
            //  $('select[name="giatmara"]').empty();
            console.log(stateID);

            }
        });
    });



    $(document).ready(function() {
        $('select[name="giatmara"]').on('change', function() {
            var BASE_URL = "<?php echo base_url();?>";
           // $('#giatmara').html(defOption );
            var stateID = $(this).val();
            var e = document.getElementById("kursus");
            if(stateID) {
                $.ajax({
                    url: '<?php echo base_url();?>admin/gspel_kurikulum/ajaxcoba/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                     $('select[name="kursus"]').empty();
                     $("#kursus").prepend("<option value=''>Sila Pilih</option>").val('');
                      //$("#kursus option:selected").remove();
                      $.each(data, function(key, value) {

                      $('select[name="kursus"]').append('<option value="'+ value.id +'">'+ value.nama_kursus +'</option>');
                   
                    });

                    }
                });
                // console.log(stateID);
            }else{
             $('select[name="kursus"]').empty();
            console.log(stateID);

            }
        });
    });

$(document).ready(function() {
        $('select[name="kursus"]').on('change', function() {
            var BASE_URL = "<?php echo base_url();?>";
            // $('#kursus').html(defOption );
            var stateID = $(this).val();
            var e = document.getElementById("intake");
            if(stateID) {
                $.ajax({
                    url: '<?php echo base_url();?>admin/gspel_kurikulum/ajaxcoba2/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                      $('select[name="intake"]').empty();
                      $("#intake").prepend("<option value=''>Sila Pilih</option>").val('');
                      // $("#intake option:selected").remove();
                      $.each(data, function(key, value) {

                      $('select[name="intake"]').append('<option value="'+ value.id +'">'+ value.sesi +'</option>');
                   
                    });

                    }
                });
                // console.log(stateID);
            }else{
            //  $('select[name="giatmara"]').empty();
            console.log(stateID);

            }
        });
    });


</script>