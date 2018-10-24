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
      <h1>Pengurusan Sesi</h1>
      <ol class="breadcrumb">
      <li class=''><a href=''>Home</a></li><li class='active'>Pengurusan Sesi</li></ol>   
    </section>
    <section class="content">
      
<div class="row" id="one" >
  <div class="col-md-12">
    <div class="box">

      <div class="panel panel-info panel-custom-horrible-red">
          <div class="panel-heading panel-heading-custom">
            <h4 style="color: white">Tambah Sesi Baru</h4>
          </div>

            <div class="panel-body">
            <div class ="table table-responsive">

      <form class="form-horizontal" action="<?php echo site_url('admin/Konfigurasi_kurikulum/updatesesi');?>" method="post">
        <fieldset>
          <div class="col-md-12">

            <?php foreach ($sesidetail as $r) : ?>
             <table class ="table table-hover table-bordered" id = "myTable" border="2">
               
                  <tr style="background-color:#726f6e;" >
                  <td style="color: white" align="center" >Kod Sesi</td>
                  <td  style="color: white" align="center" >Kod Sesi Pelaporan</td>
                  </tr>

                  <tr style="background-color:#C0C0C0">
                  <td align="center"><input type="hidden" name="id" value="<?php echo $r->id; ?>"><input type="text" name="kodesesi" value="<?php echo $r->kod_intake; ?>"></td>
                  <td align="center"><input type="text" name="kodesesipelaporan" value="<?php echo $r->kod_intake_pelaporan; ?>"></td>
                  </tr>

                  <tr style="background-color:#726f6e;" >
                  <td style="color: white" align="center" >Penerangan Sesi</td>
                  <td  style="color: white" align="center" ></td>
                  </tr>

                  <tr style="background-color:#C0C0C0">
                 <td align="center"><input type="text" name="penerangansesi" value="<?php echo $r->nama_intake ?>"></td>
                  <td></td>
                  </tr>

                  <tr style="background-color:#726f6e;" >
                  <td style="color: white" align="center" >Tarikh Mula</td>
                  <td  style="color: white" align="center" >Tarikh Tamat</td>
                  </tr>


                  <tr style="background-color:#C0C0C0">
                   <td align="center"><input type="text" name="tarikhmula" id="tarikhmula" value="<?php if ($r->tarikh_mula == "1970-01-01" or $r->tarikh_mula == '') {
                    # code...
                  } else {
                    echo date("d-m-Y", strtotime($r->tarikh_mula));
                  } ?>"></td><!-- <input type="checkbox" name="pilihtarikhmula"></td> -->
                  <td align="center"><input type="text" name="tarikhtamat" id="tarikhtamat" value="<?php if ($r->tarikh_tamat == "1970-01-01" OR $r->tarikh_tamat == '') {
                    # code...
                  } else {
                    echo date("d-m-Y", strtotime($r->tarikh_tamat));
                  }?>"></td><!-- <input type="checkbox" name="pilihtarikhtamat"></td> -->
                  </tr>

                 
              <tr style="background-color:#726f6e;" >
              <?php if ($r->tarikh_mula_permohonan != "1970-01-01") { ?>
             
              <td style="color: white" colspan = "2"><input type="checkbox" name="dibuka" id="dibuka" checked="checked"><font size="4">Dibuka untuk permohonan pelatih</font></td>

              <tr style="background-color:#726f6e;" >
                  <td style="color: white" align="center" >Tarikh Mula Permohonan</td>
                  <td  style="color: white" align="center" >Tarikh Tamat Permohonan</td>
                  </tr>


                <tr style="background-color:#C0C0C0">
                <td align="center"><input type="text" name="tarikhmulapermohonan" id="tarikhmulapermohonan" value="<?php if ($r->tarikh_mula_permohonan == "1970-01-01" OR $r->tarikh_mula_permohonan == '') {
                    # code...
                  } else {
                    echo date("d-m-Y", strtotime($r->tarikh_mula_permohonan));
                  }?>"></td>
                <td align="center"><input type="text" name="tarikhtamatpermohonan" id="tarikhtamatpermohonan" value="<?php if ($r->tarikh_tamat_permohonan == "1970-01-01" OR $r->tarikh_mula_permohonan == '' ) {
                    # code...
                  } else {
                    echo date("d-m-Y", strtotime($r->tarikh_tamat_permohonan));
                  } ?>"></td>
                </tr>
              
              <?php  } else { ?>

               <td style="color: white" colspan = "2"><input type="checkbox" name="dibuka" id="dibuka"><font size="4">Dibuka untuk permohonan pelatih</font></td>

               <tr style="background-color:#726f6e;" >
                  <td style="color: white" align="center" >Tarikh Mula Permohonan</td>
                  <td  style="color: white" align="center" >Tarikh Tamat Permohonan</td>
                  </tr>


                <tr style="background-color:#C0C0C0">
                <td align="center"><input type="text" name="tarikhmulapermohonan" id="tarikhmulapermohonan" ></td>
                <td align="center"><input type="text" name="tarikhtamatpermohonan" id="tarikhtamatpermohonan" ></td>
                </tr>

              <?php  } ?>
              </tr>


                  
              </tbody>
            </table>
          <?php endforeach; ?>
          </div>

         <div class="form-group">
            <div class="col-md-4">
            <button id="paparkan" name="paparkan" type="submit" class="btn update" style="background-color: #000063  "><font color="white">Update</font></button>

               <a href="<?php echo site_url('admin/Konfigurasi_kurikulum/atursesi');?>" id="kembali" name="kembali" class=" btn btn-md" style="background-color: #000063  "><font color="white">Kembali Ke Halaman Sebelumnya</font></a>
          </div>

             
                 </div>


        </fieldset>
        </form>

          </div>
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
  $('#tarikhmula').datepicker({
    dateFormat: "dd-mm-yy",
    changeMonth: true,
    changeYear: true,
    autoclose: true,
    yearRange: "-100:+0"
  });

  $('#tarikhtamatpermohonan').datepicker({
    dateFormat: "dd-mm-yy",
    changeMonth: true,
    changeYear: true,
    autoclose: true,
    yearRange: "-100:+0"
  });


  $('#tarikhtamat').datepicker({
    dateFormat: "dd-mm-yy",
    changeMonth: true,
    changeYear: true,
    autoclose: true,
    yearRange: "-100:+0"
  });


  $('#tarikhmulapermohonan').datepicker({
    dateFormat: "dd-mm-yy",
    changeMonth: true,
    changeYear: true,
    autoclose: true,
    yearRange: "-100:+0"
  });


//   $(function () {
//         $('input[name="tarikhmulapermohonan"]').hide();

//         //show it when the checkbox is clicked
//         $('input[name="dibuka"]').on('click', function () {
//             if ($(this).prop('checked')) {
//                 $('input[name="tarikhmulapermohonan"]').fadeIn();
//             } else {
//                 $('input[name="tarikhmulapermohonan"]').hide();
//             }
//         });
//     });


// $(function () {
//         $('input[name="tarikhtamatpermohonan"]').hide();

//         //show it when the checkbox is clicked
//         $('input[name="dibuka"]').on('click', function () {
//             if ($(this).prop('checked')) {
//                 $('input[name="tarikhtamatpermohonan"]').fadeIn();
//             } else {
//                 $('input[name="tarikhtamatpermohonan"]').hide();
//             }
//         });
//     });

</script>