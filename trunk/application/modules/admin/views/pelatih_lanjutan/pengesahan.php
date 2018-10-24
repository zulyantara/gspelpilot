<style>
  #registration-step{margin:0;padding:0;}
  #registration-step li{list-style:none; float:left;padding:15px 15px;border-top:#EEE 1px solid;border-left:#EEE 1px solid;border-right:#EEE 1px solid;}
  #registration-step li.highlight{background-color:#EEE;}
  .demoInputBox{padding: 10px;border: #F0F0F0 1px solid;border-radius: 4px;background-color: #FFF;width: 50%;}
  .registration-error{color:#FF0000;}
	.error{color:#FF0000;}
  .message {color: #00FF00;font-weight: bold;width: 100%;padding: 10;}
  .btnAction{padding: 5px 10px;background-color: #09F;border: 0;color: #FFF;cursor: pointer; margin-top:15px;}
</style>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script>
$( document ).ready( function () {
	$("#myform").validate({
		rules: {
			mulakursus: "required",
			tamatkursus: "required",
		},
		messages: {
			mulakursus: "Sila isikan ruangan ini",
			tamatkursus: "Sila isikan ruangan ini",
		},
		errorElement: "em",
		errorPlacement: function ( error, element ) {
			// Add the `help-block` class to the error element
			error.addClass( "help-block" );
		},
		highlight: function ( element, errorClass, validClass ) {
			$( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
		},
		unhighlight: function (element, errorClass, validClass) {
			$( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
		}
	});
});
</script>

<form class="form-horizontal" action="<?php echo site_url('admin/Pelatih_lanjutan/tarikh_kelulusan');?>" id="myform" name="myform" method="post">
    <input type="hidden" name="id_permohonan" value="<?php echo $id_permohonan; ?>">
    <input type="hidden" name="id_permohonan_kursus_lpp09" value="<?php echo $id_permohonan_kursus_lpp09; ?>">
    <input type="hidden" name="txt_pengesahan" value="<?php echo $kelulusan; ?>">
    <input type="hidden" name="txt_bank" value="<?php echo $row->nama_bank; ?>">
    <input type="hidden" name="txt_akaun" value="<?php echo $row->no_akaun; ?>">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Maklumat Pelatih</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-2">
                    Nama
                </div>
                <div class="col-md-10">
                    : <?php echo $row->nama_penuh; ?>
                </div>
                <div class="col-md-2">
                    No. ID Pengenalan
                </div>
                <div class="col-md-10">
                    : <?php echo $row->no_mykad; ?>
                </div>
                <div class="col-md-2">
                    No. Pelatih
                </div>
                <div class="col-md-10">
                    : <?php echo $row->no_pelatih; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Kursus - Kursus Terdahulu</h3>
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>BIL</th>
                        <th>KLUSTER</th>
                        <th>KURSUS</th>
                        <th>NEGERI</th>
                        <th>GIATMARA</th>
                        <th>SESI</th>
                        <th>TARIKH MULA</th>
                        <th>TARIKH TAMAT</th>
                        <th>STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $bil = 0;
                    foreach ($res_kursus_terdahulu as $k => $v)
                    {
                        ?>
                        <tr>
                            <td><?php echo $bil += 1; ?></td>
                            <td><?php echo $v->nama_kluster; ?></td>
                            <td><?php echo $v->nama_kursus; ?></td>
                            <td><?php echo $v->nama_negeri; ?></td>
                            <td><?php echo $v->nama_giatmara; ?></td>
                            <td><?php echo $v->nama_intake; ?></td>
                            <td><?php echo date("d-m-Y", strtotime($v->tarikh_mula_kursus)); ?></td>
                            <td><?php echo date("d-m-Y", strtotime($v->tarikh_tamat_kursus)); ?></td>
                            <td><?php echo $v->status_desc; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="box box-primary box-solid">
      <div class="box-header with-border">
          <h3 class="box-title">Kursus Yang Dipilih</h3>
      </div>
      <div class="box-body">
        <table class="table">
          <thead>
            <tr>
              <th>KATEGORI PROGRAM</th>

              <?php
              if (isset($nama_kursus))
              { //LL
                ?>
                <th>KLUSTER</th>
                <th>KURSUS</th>
                <th>NEGERI</th>
                <th>GIATMARA</th>
                <th>SESI</th>
                <th>TARIKH MULA</th>
                <th>TARIKH TAMAT</th>
                <?php
              }
              elseif (isset($nama_kluster))
              { //RN
                ?>
                <th>NEGERI</th>
                <th>GIATMARA</th>
                <th>KLUSTER</th>
                <th>SSM</th>
                <th>ALAMAT SYARIKAT</th>
                <?php
              }
              elseif (isset($nama_program_pertandingan) OR isset($nama_program_khas))
              {
                ?>
                <th>NEGERI</th>
                <th>GIATMARA</th>
                <th>NAMA PROGRAM</th>
                <?php
              }
              ?>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo $kp; ?></td>
              <?php
              if (isset($nama_kursus))
              {
                ?>
                <td><?php echo $nama_kluster;?></td>
                <td><?php echo $nama_kursus;?></td>
                <td><?php echo $row_giatmara->nama_negeri; ?></td>
                <td><?php echo $row_giatmara->nama_giatmara; ?></td>
                <td><?php echo $kod_intake; ?></td>
                <td><?php echo date("d-m-Y", strtotime($tarikh_mula_intake)); ?></td>
                <td><?php echo date("d-m-Y", strtotime($tarikh_tamat_intake)); ?></td>
                <?php
              }
              elseif (isset($nama_kluster))
              {
                ?>
                <td><?php echo $row_giatmara->nama_negeri; ?></td>
                <td><?php echo $row_giatmara->nama_giatmara; ?></td>
                <td><?php echo $nama_kluster;?></td>
                <td><?php echo $no_ssm;?></td>
                <td><?php echo $alamat_perniagaan;?></td>
                <?php
              }
              elseif (isset($nama_program_pertandingan))
              {
                ?>
                <td><?php echo $row_giatmara->nama_negeri; ?></td>
                <td><?php echo $row_giatmara->nama_giatmara; ?></td>
                <td><?php echo $nama_program_pertandingan;?></td>
                <?php
              }
              elseif (isset($nama_program_khas))
              {
                ?>
                <td><?php echo $row_giatmara->nama_negeri; ?></td>
                <td><?php echo $row_giatmara->nama_giatmara; ?></td>
                <td><?php echo $nama_program_khas;?></td>
                <?php
              }
              ?>
              <!-- </td> -->
            </tr>
          </tbody>
        </table>
            <!--div class="row">
                <div class="col-md-2">
                    <span class="text-bold">KATEGORI PROGRAM</span>
                </div>
                <div class="col-md-10">
                    <?php /*echo $kp;?>
                </div>
                <div class="col-md-2">
                    <span class="text-bold">GIATMARA</span>
                </div>
                <div class="col-md-10">
                    <?php echo $row_giatmara->nama_giatmara.", ".$row_giatmara->nama_negeri; ?>
                </div>
                <?php
                if (isset($nama_kursus))
                {
                    ?>
                    <div class="col-md-2">
                        <span class="text-bold">KLUSTER</span>
                    </div>
                    <div class="col-md-10">
                        <?php echo $nama_kluster; ?>
                    </div>
                    <div class="col-md-2">
                        <span class="text-bold">NAMA KURSUS</span>
                    </div>
                    <div class="col-md-10">
                        <?php echo $nama_kursus; ?>
                    </div>
                    <?php
                }
                elseif (isset($nama_kluster))
                {
                    ?>
                    <div class="col-md-2">
                        <span class="text-bold">KLUSTER</span>
                    </div>
                    <div class="col-md-10">
                        <?php echo $nama_kluster; ?>
                    </div>
                    <div class="col-md-2">
                        <span class="text-bold">NO SSM</span>
                    </div>
                    <div class="col-md-10">
                        <?php echo $no_ssm; ?>
                    </div>
                    <div class="col-md-2">
                        <span class="text-bold">ALAMAT</span>
                    </div>
                    <div class="col-md-10">
                        <?php echo $alamat_perniagaan; ?>
                    </div>
                    <?php
                }
                elseif (isset($nama_program_pertandingan))
                {
                    ?>
                    <div class="col-md-2">
                        <span class="text-bold">NAMA PROGRAM PERTANDINGAN</span>
                    </div>
                    <div class="col-md-10">
                        <?php echo $nama_program_pertandingan; ?>
                    </div>
                    <?php
                }
                elseif (isset($nama_program_khas))
                {
                    ?>
                    <div class="col-md-2">
                        <span class="text-bold">NAMA PROGRAM KHAS</span>
                    </div>
                    <div class="col-md-10">
                        <?php echo $nama_program_khas; ?>
                    </div>
                    <?php
                }*/
                ?>
            </div-->


        </div>
    </div>

    <div class="box box-primary box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Sesi Kursus LPP09</h3>
      </div>
      <div class="box-body">
        <div class="form-group">
          <label class="col-md-2">SESI<span class="text-danger text-bold">*</span></label>
          <div class="col-md-10">
            <div class="row">
              <div class="col-md-3">
                <select class="form-control" name="opt_sesi" id="opt_sesi">
                  <option value="">[SILA PILIH]</option>
                  <?php
                  foreach ($res_stk as $val_stk)
                  {
                    ?>
                    <option value="<?php echo $val_stk->id; ?>"><?php echo $val_stk->nama_intake; ?></option>
                    <?php
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2">TARIKH MULA SESI<span class="text-danger text-bold">*</span></label>
          <div class="col-md-4">
            <input type="text" style="width: 150px" name="mulasesi" id="mulasesi" class="form-control">
          </div>

          <label class="col-md-2">TARIKH TAMAT SESI<span class="text-danger text-bold">*</span></label>
          <div class="col-md-4">
            <input type="text" style="width: 150px" name="tamatsesi" id="tamatsesi" class="form-control">
          </div>
        </div>
      </div>
    </div>

    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Waktu Kursus LPP09 Dijalankan</h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label class="col-md-2">TARIKH MULA KURSUS<span class="text-danger text-bold">*</span></label>
                <div class="col-md-4">
                    <input type="text" style="width: 150px" name="mulakursus" id="mulakursus" onkeyup="coba()" class="form-control">
                </div>
             <!--  </div>

            <div class="form-group"> -->
              <label class="col-md-2">TARIKH TAMAT KURSUS<span class="text-danger text-bold">*</span></label>
              <div class="col-md-3">
              <input type="text" style="width: 150px" name="tamatkursus" id="tamatkursus" class="form-control">
              </div>
            </div>
            <label class="col-md-12" style="color: grey"><div id="date_difference">SILA PILIH TARIKH MULA DAN TARIKH TAMAT</div></label>
        </div>
    </div>
    <br>
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Waktu Elaun Dibayar</h3>
        </div>
        <div class="box-body">
            <label class="col-md-12" style="color: grey">Pelatih ini layak menerima elaun GIATMARA &nbsp; <input type="checkbox" name="layak" id="layak" value="1"></label>
            <div class="form-group">
                <label class="col-md-2">TARIKH MULA ELAUN<span class="text-danger text-bold">*</span></label>
                <div class="col-md-4">
                    <input type="text" style="width: 150px" name="mulaelaun" id="mulaelaun" class="form-control">
                </div>
                <!--  </div>

                <div class="form-group"> -->
                <label class="col-md-2">TARIKH TAMAT ELAUN<span class="text-danger text-bold">*</span></label>
                <div class="col-md-3">
                    <input type="text" style="width: " name="tamatelaun" id="tamatelaun" class="form-control">
                </div>
            </div>
            <input type="hidden" name="userid" value="<?php echo $this->session->userdata('user_id');  ?>">
            <input type="hidden" name="idpermohonan" value="<?php echo $id_permohonan;  ?>">
        </div>
    </div>
    <br>
    <div class="form-group">
        <div class="col-md-4">
            <button id="submit" name="submit" type="submit" class="btn btn-primary">LULUSKAN</button>
            <button type="button" onclick="window.history.back();" name="button" class="btn btn-primary">KEMBALI KE HALAMAN SEBELUMNYA</button>
        </div>
    </div>
</form>

<script type="text/javascript">
$(document).ready(function(){
    $("#mulaelaun").prop("disabled", true);
    $("#tamatelaun").prop("disabled", true);
    $("#tbl_senarai_kursus_lanjutan").DataTable();
});

$(function() {
    $( "#mulakursus,#tamatkursus,#mulaelaun,#tamatelaun" ).datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        autoclose: true,
    });
});

$("#mulaelaun").datepicker({
    dateFormat: "dd-mm-yy",
    changeMonth: true,
    changeYear: true,
    autoclose: true,
	yearRange: ("-10:+1"),
});

$("#mulakursus").datepicker({
    onSelect: function(){
        // if($('#mulaelaun').is(':disabled')){
        $("#layak").change(function() {
            if(this.checked) {
                //textbox is disabled
                $("#mulaelaun").prop("disabled", false);
                $("#mulaelaun").val($("#mulakursus").val());
            }else{
                // var fecha = $(this).datepicker('getDate');
                // $("#mulaelaun").datepicker("setDate", new Date(fecha.getTime()));
                // $("#mulaelaun").datepicker("setDate", "+15d");
                $("#mulaelaun").prop("disabled", true);
                $("#mulaelaun").val("");
            }
        });
    },
    dateFormat: "dd-mm-yy",
	changeMonth: true,
	changeYear: true,
	autoclose: true,
	yearRange: ("-10:+1"),
});

$("#tamatelaun").datepicker({
    dateFormat: "dd-mm-yy",
    changeMonth: true,
    changeYear: true,
    autoclose: true,
	yearRange: ("-1:+10"),
});

$("#tamatkursus").datepicker({ //        if($('#tamatelaun').is(':disabled')){
 // //textbox is disabled
 //        }else{
     dateFormat: "dd-mm-yy",
     changeMonth: true,
     changeYear: true,
     autoclose: true,
	 yearRange: ("-1:+10"),
	 onClose: function( selectedDate ) {
       var fromDate = $("#mulakursus").val();
		var toDate = $("#tamatkursus").val();
		var loadUrl = "<?php echo base_url(); ?>admin/pelatih_lanjutan/ajax_calc_dt_difference/"+fromDate+"/"+toDate;
		//alert('aaa='+loadUrl);
		$('#date_difference').load(loadUrl);
		//alert(fromDate);
	  },
    onSelect: function(){
        $("#layak").change(function() {
            if(this.checked) {
                //textbox is disabled
                $("#tamatelaun").prop("disabled", false);
                $("#tamatelaun").val($("#tamatkursus").val());
            }else{
                // var fecha = $(this).datepicker('getDate');
                // $("#tamatelaun").datepicker("setDate", new Date(fecha.getTime()));
                // $("#tamatelaun").datepicker("setDate", "+15d");
                $("#tamatelaun").prop("disabled", true);
                $("#tamatelaun").val("");
            }
        });
    }
});

$("#opt_sesi").change(function(){
  var id_stk = $("#opt_sesi").val();
  $.ajax({
    url: '<?php echo site_url("admin/Pelatih_lanjutan/ajaxsesi/");?>',
    data: {id: id_stk},
    type: "POST",
    dataType: "json",
    success:function(data) {
      $('#mulasesi').val(data.tarikh_mula);
      $('#tamatsesi').val(data.tarikh_tamat);
    }
  });
});
// $("#mulasesi").datepicker({
//     dateFormat: "dd-mm-yy",
//     changeMonth: true,
//     changeYear: true,
//     autoclose: true,
// 	yearRange: ("+0:+10"),
// });
//
// $("#tamatsesi").datepicker({
//     dateFormat: "dd-mm-yy",
//     changeMonth: true,
//     changeYear: true,
//     autoclose: true,
// 	yearRange: ("+0:+10"),
// });

document.getElementById('layak').onchange = function() {
    document.getElementById('mulaelaun').disabled = false;
    document.getElementById('tamatelaun').disabled = false;
};
</script>
