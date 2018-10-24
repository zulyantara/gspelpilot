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

.parent input{
position:absolute;
    top:50%;
    left:50%;
    z-index:5;
}
</style>

    <div class="content-wrapper">
    <section class="content-header">
      <h1>Pengeluaran Persijilan</h1>
      <ol class="breadcrumb">
  <li class=''><a href=''>Home</a></li><li class='active'>Pengeluaran Persijilan</li></ol>   </section>
    <section class="content">
      <div class="row">

  <div class="col-md-12">
    <div class="box">
        <div class="panel panel-info panel-custom-horrible-red">
        <div class="panel-heading panel-heading-custom">
          <h4 style="color: white" >Carian</h4>
        </div>
          <div class="panel-body">
        <form class="form-horizontal" action="<?php echo site_url('admin/Gspel_kurikulum/certificateb');?>" method="post">
        <fieldset>
           <div class="form-group">
          <label class="col-md-2">Negeri</label>
          <div class="col-md-4">
            <select id="negeri" name="negeri" class="form-control" required="required">
                <option value="" selected="selected">Sila Pilih</option>
                 <?php
              foreach($user5 as $r){ ?>
            <option selected="selected" value="<?php echo $r->id ?>">
            <?php
              echo  $r->nama_negeri ;
              }
            ?></option>
              <?php
              foreach($user5a as $r){
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
                 <?php
              foreach($user6a as $r){ ?>
            <option selected="selected" value="<?php echo $r->id ?>">
            <?php
              echo  $r->giatmara ;
              }
            ?></option>
              <?php
              foreach($user6 as $r){
              echo '<option value="'. $r->id.'">'. $r->giatmara .'</option>';
              }
            ?>
             </select>
          </div>
        </div>



        <div class="form-group">
          <label class="col-md-2">Kursus</label>
          <div class="col-md-4">
           <select id="kursus" name="kursus" class="form-control" required="required">
              <option value="" selected="selected">Sila Pilih</option>
              <?php
              foreach($user3a as $r){ ?>
            <option selected="selected" value="<?php echo $r->id ?>">
            <?php
              echo  $r->kursus ;
              }
            ?></option>
              <?php
              foreach($user3b as $r){
              echo '<option value="'. $r->id.'">'. $r->kursus .'</option>';
              }
            ?>
             </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2">Jenis Kursus</label>
          <div class="col-md-4">
           <select id="jeniskursus" name="jeniskursus" class="form-control" required="required">
              <option value="" selected="selected">Sila Pilih</option>
           
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
             
              <select id="intake" name="intake" class="form-control" required="required">
                 <option value="" selected="selected">Sila Pilih</option>
          <?php
              foreach($user4a as $r){ ?>
            <option selected="selected" value="<?php echo $r->id ?>">
            <?php
              echo  $r->sesi ;
              }
            ?></option>

              <?php
              foreach($user4b as $r){
              echo '<option value="'. $r->id.'">'. $r->sesi .'</option>';
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
		<div class="box ">

    <div class="panel panel-info panel-custom-horrible-red">
        <div class="panel-heading panel-heading-custom panel-custom-horrible-red">
      					<h4 style="color:white">Senarai Pelatih (Persijilan)</h4>
      				</div>
        				<div class="panel-body" >
                   <form class="form-horizontal" method="post" action="<?php echo site_url('admin/Gspel_kurikulum/export_sijil');?>" id="carian">
      					<div class ="table table-responsive" >
      						<table class ="table table-hover table-striped table-bordered" id = "myTable" style="margin: 0px auto;">
      							<thead style ="background-color:#b3b3b3">
      								<tr>
      									<th rowspan = "2">Bil</th>
      									<th rowspan = "2">Nama</th>
      									<th rowspan = "2">No MyKAD</th>
      									<th rowspan = "2">Kursus</th>
      									<th rowspan = "2">Sesi</th>
                            <th rowspan = "2">GCPA</th>
      									<th rowspan = "2">Jenis Kursus/Modul</th>
      							
      									<th rowspan = "2">LPP</th>
      								<th colspan = "4" style="text-align: center" >Sijil</th>
                        <!-- <th rowspan = "2">Pilih <input type="checkbox" name=""></th> -->
      								</tr>
      								<tr>
      								
                        <th >
                        
                           SAEGM
                  <input type="radio" name="sijil" id="saegm" value="saegm">

                          
                        </th>
                  <th>
                    
                          SPGM
                          <input type="radio" name="sijil" id="spgm" value="spgm" s>
                  
                 <!--  </div> -->
                </th>
                  <th>
                   
                  SKGM
                  <input type="radio" name="sijil" id="skgm" value="spkm">
                </th>
                   <th>
                   SKLGM
                   <input type="radio" name="sijil" id="sklgm" value="sklgm">
                 </th>
        							</tr>
      							</thead>
      							<tbody>
                      <?php
                  // var_dump($moduldetail);die();
                    $ni=1;
                    $no=0;
                  foreach($moduldetail as $r) :
                  ?>
   								<tr>
										<td><?php echo $ni; ?></td>
										<td><?php echo $r->nama_penuh; ?><input type="hidden" name="nama[<?php echo $no; ?>]" value="<?php echo $r->nama_penuh; ?>"></td>
										<td><?php echo $r->no_mykad; ?> <input type="hidden" name="no_mykad[<?php echo $no; ?>]" value="<?php echo $r->no_mykad; ?>"></td>
										<td><?php echo $r->nama_kursus; ?><input type="hidden" name="kursus2[<?php echo $no; ?>]" value="<?php echo $r->nama_kursus; ?>"></td>
										<td><?php echo $r->nama_intake; ?><input type="hidden" name="giatmara2[<?php echo $no; ?>]" value="<?php echo $r->nama_giatmara; ?>"></td>
                    <td><?php echo $r->gcpa; ?><input type="hidden" name="gcpa[<?php echo $no; ?>]" value="<?php echo $r->gcpa; ?>"></td> 
										<td><?php echo $r->jenis_pelatih; ?><input type="hidden" name="ppkl_sah[<?php echo $no; ?>]" value="<?php echo $r->ppkl_sah; ?>"></td>
										<td>

                    <?php if ($groups == 'admin') { ?>
                   <?php }else{ ?>

                   <a href="<?php echo site_url('admin/Gspel_kurikulum/cek_lpp5a/');?><?php echo $r->id_pelatih;?>/<?php echo $negeri;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>" id="LPP5A" name="LPP5A" class="btn" style="background-color: #000063"  target="_blank"><font color="white">LPP5A</font></a> &nbsp;
                  <a href="<?php echo site_url('admin/Gspel_kurikulum/cek_lpp5b/');?><?php echo $r->id_pelatih;?>/<?php echo $negeri;?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>" id="LPP5B" name="LPP5B" class="btn"  style="background-color: #000063"  target="_blank"><font color="white">LPP5B</font></a>

                   <?php } ?>
										
										</td>
                    <td>
                  <?php if ($r->saegm  == 1 OR $r->saegm  == "on") {?>
               <input type="checkbox" name="saegm[<?php echo $no; ?>]" id="smgm" value="<?php echo $no; ?>">
                  <?php } else {}?>
                  </td>
										<td  style="float: none; display: visible;">
                  <?php if ($r->spgm == 1 OR $r->spgm == "on" ) {?>
                 <input type="checkbox" name="spgm[<?php echo $no; ?>]" id="smgm" value="<?php echo $no; ?>">
                  <?php } else {}?>
                  </td>
                  <td>
                  <?php if ($r->skgm  == 1 OR $r->skgm  == "on"  ) {?>
                <input type="checkbox" name="skgm[<?php echo $no; ?>]" id="smgm" value="<?php echo $no; ?>">
                  <?php } else {}?>
                  </td>
                  
                      <td>
                  <?php if ($r->sklgm == 1 OR $r->sklgm == "on") { ?>
                <input type="checkbox" name="sklgm[<?php echo $no; ?>]" id="smgm" value="<?php echo $no; ?>">
                  <?php } else { ?>
                 
                  <?php }?> 
                  </td>
                   <input type="hidden" name="negeri" value="<?php echo $negeri; ?>">
                  <input type="hidden" name="giatmara" value="<?php echo $giatmara; ?>">
                  <input type="hidden" name="kursus" value="<?php echo $kursus; ?>">
                  <input type="hidden" name="jeniskursus" value="<?php echo $jeniskursus; ?>">
                  <input type="hidden" name="intake" value="<?php echo $intake; ?>">
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
     <div class="col-md-4">
            <button id="paparkan" name="paparkan" type="submit" class="btn" style="background-color: #000063  "><font color="white">Export</font></button>
          </div>
     <?php } ?>
          
       
                </form>
          			</div>
      			</div>
		</div>


  
      
      





	</div>
</div>
</div>
<?php $this->load->view('gspel_kurikulum/layout/footer'); ?>
<script type="text/javascript">

 $(document).ready(function() {
    $("#carian").submit(function() {
     var saegm = $("input#saegm");
     var spgm = $("input#spgm");
     var sklgm = $("input#sklgm");
     var skgm = $("input#skgm");
    if (saegm.is(":checked") || spgm.is(":checked") || skgm.is(":checked") || sklgm.is(":checked")) {
   return true; 
        } else {
            alert("Klik radio button untuk memilih jenis sijil yang ingin dieksport.");
            return false;
        }
      
    });

});

  $(document).ready(function() {
    $("#carian").submit(function() {
    
     var smgm = $("input#smgm");
    if (smgm.is(":checked") ) {
   return true; 
        } else {
            alert("Klik checkbox pada data sijil pelatih yang ingin dieksport.");
            return false;
        }
      
    });

});

  $(document).ready(function() {
    $('#myTable').DataTable();
});
  
   $.fn.dataTableExt.sErrMode = 'throw'
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