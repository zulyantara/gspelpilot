<style>
	.error{color:#FF0000;}
</style>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script>
$.validator.setDefaults({
	submitHandler: function() {
		//alert("submitted!");
	}
});

$( document ).ready( function () {
	$("#form-bp").validate({
    rules: {
			tarikh_mula: "required",
      tarikh_tamat: "required",
      bank_selector: "required",
      no_akaun: "required",
      kod_selector: "required",
    },
    messages: {
			tarikh_mula: "Sila isikan ruangan ini",
      tarikh_tamat: "Sila isikan ruangan ini",
      bank_selector: "Sila isikan ruangan ini",
      no_akaun: "Sila isikan ruangan ini",
      kod_selector: "Sila isikan ruangan ini",
    },
    errorElement: "em",
		errorPlacement: function ( error, element ) {
			// Add the `help-block` class to the error element
			error.addClass( "help-block" );

			if ( element.prop( "type" ) === "checkbox" || element.prop( "type" ) === "radio" ) {
				error.insertBefore( element.parent( "label" ) );
			} else {
				error.insertAfter( element );
			}
		},
		highlight: function ( element, errorClass, validClass ) {
			$( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
		},
		unhighlight: function (element, errorClass, validClass) {
			$( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
		}
  });

  $("#simpan").click(function(event){
  //kelayakan_elaun.value
  //alert('aaa='+kelayakan_elaun.value);
  if(kelayakan_elaun.value==0){  //alert('bbb='+kelayakan_elaun.value);
		$.ajax({
    			data: $("#form-bp").serialize(),
    			url: '<?php echo base_url();?>admin/programreg/simpan_permohonan',
    			type: 'POST',
    			dataType: 'json',
    			success: function (data) {
				$("#cetak").disabled='false';
            if (data.status == 0) {
              var loc = "<?php echo site_url('admin/programreg/detailprofil/'); ?>";
              window.location = loc + <?php echo $idtemudugatetapan; ?>;
            } else {
              var loc = "<?php echo site_url('admin/programreg'); ?>";
              //window.location = loc;
			  alert('Maklumat telah disimpan');
			  document.getElementById('cetak').disabled=false;
            }
    			}
    		});
}else{
    event.preventDefault();
    $("#potongan-error").html("");
    var pot_values = $("input[name='potselector[]']").map(function(){return $(this).val();}).get();
    if (pot_values.length>0) {
      if ($("#form-bp").valid()) {
        $("#potongan-error").html("");
        $.ajax({
    			data: $("#form-bp").serialize(),
    			url: '<?php echo base_url();?>admin/programreg/simpan_permohonan',
    			type: 'POST',
    			dataType: 'json',
    			success: function (data) {
            if (data.status == 0) {
              var loc = "<?php echo site_url('admin/programreg/detailprofil/'); ?>";
              window.location = loc + <?php echo $idtemudugatetapan; ?>;
            } else {
              var loc = "<?php echo site_url('admin/programreg'); ?>";
              //window.location = loc;
			  alert('Maklumat telah disimpan');
			  document.getElementById('cetak').disabled=false;
            }
    			}
    		});
      }
    } else {
      $("#potongan-error").html("Sila isikan ruangan ini");
    }
  }});

	$("#cetak").click(function(event){
		event.preventDefault();
		window.open("<?php echo site_url("admin/programreg/cetak_profil/".$idtemudugatetapan); ?>", "newwindow","700","700");
	});
});
</script>

<div class="modal fade" id="divShow"></div>
<?php #echo $res_temudugatetapan[0]->tawaran_nama_bank; ?>
<div class="nav-tabs-custom">
  <ul id="senarai_permohonan_kursus" class="nav nav-tabs">
    <!-- <li id="permohonan" class="active"><a href="#senarai-tab" data-toggle="tab" aria-expanded="true">Senarai Permohonan</a></li> -->
  	<!-- <li id="peribadi"><a href="#senarai-peribadi" data-toggle="tab" aria-expanded="false">Butir Peribadi</a></li>
    <li id="penjaga"><a href="#senarai-penjaga" data-toggle="tab" aria-expanded="false">Butir Penjaga</a></li>
    <li id="tinggal"><a href="#senarai-tinggal" data-toggle="tab" aria-expanded="false">Butir Tempat Tinggal</a></li> -->
  </ul>

  <div class="tab-content">

    <!-- Tab senarai permohonan -->
    <div id="senarai-tab" class="tab-pane active">
      <form name="form-bp" id="form-bp" method="post">
      <input type="hidden" name="idtemudugatetapan" value="<?php echo $idtemudugatetapan; ?>" />
      <div class="box box-solid box-primary">
      	<div class="box-header with-border">
			<h3 class="box-title">Kursus Yang Telah Dipilih</h3>
        </div>
        <div class="panel-body">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="txt_nama">Nama Penuh</label>
						<input type="text" name="txt_nama" id="txt_nama" value="<?php echo $res_butir_peribadi[0]->nama_penuh ?>" class="form-control" style="text-transform:uppercase">
						<input type="hidden" name="txt_id_permohonan_butir_peribadi" value="<?php echo $res_butir_peribadi[0]->id; ?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="txt_mykad">No. MyKAD</label>
						<input type="text" name="txt_mykad" id="txt_mykad" value="<?php echo $res_butir_peribadi[0]->no_mykad ?>" class="form-control">
					</div>
				</div>
			</div>
			<div class ="table table-responsive">
				<table class ="table table-bordered table-striped table-hover" id ="myTable">
					<thead style="background-color:#b3b3b3">
						<th><font size="2">BIL</font></th>
						<th><font size="2">KLUSTER</font></th>
						<th><font size="2">KURSUS</font></th>
						<th><font size="2">NEGERI</font></th>
						<th><font size="2">GIATMARA</font></th>
						<th><font size="2">SESI</font></th>
					</thead>
					<tbody>
						<tr>
							<td><font size="2">1</td>
							<td>
								<div class="row">
									<div class="col-md-10">
										<!-- <pre><?php var_dump($res_kluster); ?></pre> -->
										<select class="form-control" name="opt_kluster" id="opt_kluster">
											<?php
											foreach ($res_kluster as $val_kluster)
											{
												$sel_kluster = $val_kluster->nama_kluster == $res_temudugatetapan[0]->nama_kluster ? "selected=\"selected\"" : "";
												?>
												<option value="<?php echo $val_kluster->id_kluster; ?>" <?php echo $sel_kluster; ?>><?php echo $val_kluster->nama_kluster; ?></option>
												<?php
											}
											?>
										</select>
										<!-- <font size="2"><?php echo $res_temudugatetapan[0]->nama_kluster; ?></font> -->
									</div>
								</div>
							</td>
							<td>
								<div class="row">
									<div class="col-md-7">
										<select class="form-control" name="opt_kursus" id="opt_kursus">
										<option value="">Sila Pilih</option>
											<?php
											$res_kursus=$this->db->query("select distinct b.* from settings_tawaran_kursus  a join ref_kursus b on b.id=a.id_kursus join ref_kluster c on c.id=b.id_kluster   where status=1 and id_giatmara=? and id_kluster=?", array($res_temudugatetapan[0]->id_giatmara, $res_temudugatetapan[0]->idkluster) )->result();
											foreach ($res_kursus as $val_kursus)
											{
												$sel_kursus = $val_kursus->nama_kursus == $res_temudugatetapan[0]->nama_kursus ? "selected=\"selected\"" : "";
												?>
												<option value="<?php echo $val_kursus->id; ?>" <?php echo $sel_kursus; ?>><?php echo $val_kursus->nama_kursus; ?></option>
												<?php
											}
											?>
										</select>
										<!-- <font size="2"><?php echo $res_temudugatetapan[0]->nama_kursus; ?></font> -->
									</div>
								</div>
							</td>
							<td><font size="2"><?php echo $res_temudugatetapan[0]->nama_negeri; ?></font></td>
							<td><font size="2"><?php echo $res_temudugatetapan[0]->nama_giatmara; ?></font></td>
							<td>
								<div class="row">
									<div class="col-md-10">
                    <?php
                    #var_dump($res_temudugatetapan[0]);
                    ?>
										<select class="form-control" name="opt_sesi" id="opt_sesi">
											<?php
											$res_sesi=$this->db->query("select id_intake,nama_intake from settings_tawaran_kursus a join ref_intake b on b.id=a.id_intake where status=1 and id_giatmara=? and id_kursus=?", array($res_temudugatetapan[0]->id_giatmara, $res_temudugatetapan[0]->id_kursus) )->result();
											foreach ($res_sesi as $val_sesi)
											{
												$sel_sesi = $val_sesi->nama_intake == $res_temudugatetapan[0]->sesi ? "selected=\"selected\"" : "";
												?>
												<option value="<?php echo $val_sesi->id_intake; ?>" <?php echo $sel_sesi; ?>><?php echo $val_sesi->nama_intake; ?></option>
												<?php
											}
											?>
										</select>
										<!-- <font size="2"><?php echo $res_temudugatetapan[0]->sesi; ?></font> -->
									</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
        </div>
      </div>

    	<div class="box box-solid box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tempoh Kursus Dijalankan</h3>
      	</div>
      	<div class="panel-body">
          <div class ="table table-responsive">
            <table>
			<tr>
			<td colspan="5">
			<?php //mmn add to check kelayakan elaun
			foreach ($res_kelayakan_elaun as $kelayakan_elaun) {
			if($kelayakan_elaun->tawaran_elaun==0){
			$txttm = "TARIKH MULA KURSUS*";
			$txttt = "TARIKH TAMAT KURSUS*";
			$txtmsg = "PELATIH INI TIDAK LAYAK ELAUN";
			}else{
			$txttm = "TARIKH MULA KURSUS/ELAUN*";
			$txttt = "TARIKH TAMAT KURSUS/ELAUN*";
			$txtmsg = "";
			}
			?>
			<b><?php echo $txtmsg;?></b><br><br>
			<?php } ?>
			</td>
			</tr>
              <tr>
                <td><font size ="2"><b><?php echo $txttm;?>&nbsp;&nbsp;&nbsp;</b></font></td>
                <td class ="col-xs-5">
                  <div id="datepicker1" class="input-group date">
                   <input class="form-control" type="text" name="tarikh_mula" id="tarikh_mula" value ="<?php echo ($res_temudugatetapan[0]->tawaran_mula_elaun) ? date('d-m-Y', strtotime($res_temudugatetapan[0]->tawaran_mula_elaun)) : date('d-m-Y'); ?>"/>
                    <span class="input-group-addon">
                       <i class="glyphicon glyphicon-calendar"></i>
                    </span>
                 </div>
                </td>
                <td></td>
                <td><font size ="2"><b><?php echo $txttt;?>&nbsp;&nbsp;&nbsp;</b></font></td>
                <td class ="col-xs-6">
                  <div id="datepicker2" class="input-group date">
                    <input class="form-control col-xs-12" type="text" name="tarikh_tamat" id="tarikh_tamat" value ="<?php echo ($res_temudugatetapan[0]->tawaran_tamat_elaun) ? date('d-m-Y', strtotime($res_temudugatetapan[0]->tawaran_tamat_elaun)) : date('d-m-Y'); ?>"/>
                    <span class="input-group-addon">
                      <i class="glyphicon glyphicon-calendar"></i>
                    </span>
                  </div>
                </td>
              </tr>
            </table>
						<br/>
						<span id="tempohcalc">
						<?php
						$tarikh_awal = new DateTime(date('d-m-Y', strtotime($res_temudugatetapan[0]->tawaran_mula_elaun))); // Your date of birth
						$tarikh_akhir = new Datetime(date('d-m-Y', strtotime($res_temudugatetapan[0]->tawaran_tamat_elaun)));
						$diff = $tarikh_akhir->diff($tarikh_awal);
						printf('<strong>Tempoh kursus:</strong> %d tahun %d bulan %d hari', $diff->y, $diff->m, $diff->d);
						printf("\n");
						?>
						</span>
          </div>
      	</div>
    	</div>

		
		<?php //mmn add to check kelayakan elaun
			foreach ($res_kelayakan_elaun as $kelayakan_elaun) {?>
		<input type="hidden" name="kelayakan_elaun" id="kelayakan_elaun" value="<?php echo $kelayakan_elaun->tawaran_elaun;?>">
		<?php if($kelayakan_elaun->tawaran_elaun==1){?>
		 
    	<div class="box box-solid box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Maklumat Bank</h3>
        </div>
    			<div class="panel-body">
    				<div class = "table table-responsive">
    					<table class ="col-xs-12">
    						<tr><td>&nbsp;</td></tr>
    						<tr>
    							<td class = "col-xs-2"><font size="2"><b>NAMA BANK*</b></font></td>
    							<td class = "col-xs-2">
    								<select class="form-control input-sm" id ="bank_selector" name="bank_selector">
                      <option value ="">[Sila Pilih]</option>
                      <?php
                      if ( ! empty($res_banks))
                      {
                        foreach ($res_banks as $bank) {
                      ?>
                          <option value="<?php echo $bank->id; ?>" <?php if ($bank->id == $res_temudugatetapan[0]->nama_bank) { echo "selected"; } ?>><?php echo $bank->name; ?></option>
                      <?php
                        }
                      }
                      ?>
    								</select>
    							</td>
    							<td colspan="2"></td>
    						</tr>

    						<tr><td>&nbsp;</td></tr>
    						<tr>
    							<td class = "col-xs-2"><font size="2"><b>NO AKAUN*</b></font></td>
    							<td class = "col-xs-2"><input type="text" name="no_akaun" id="no_akaun" class="form-control input-small" value="<?php echo $res_temudugatetapan[0]->no_akaun;?>"></td>
                  <td colspan="2"></td>
    						</tr>

    						<tr><td>&nbsp;</td></tr>
    						<tr>
    							<td class = "col-xs-2"><font size="2"><b>CARA BAYARAN*</b></font></td>
    							<td class = "col-xs-2"><font size="2"><b>AUTOPAY</b></font></td>
                  <td colspan="2"></td>
    						</tr>
    					</table>
    				</div>
    			</div>
    	</div>
		
    	<!--end row-->

      <div class="row">
  			<div class="col-xs-6 box-solid box-primary">
          <div class="panel panel-info">
            <div class="panel-heading panel-heading-custom" style="color:#fff; background-color:#3c8dbc; font-size:18;">
              Maklumat Kombinasi Kod
    				</div>
    				<div class="panel-body">
              <div class ="table table-responsive">
                  <table>
                    <tr>
                      <td><font size="2"><b>Nama*&nbsp;&nbsp;</b></font></td>
                      <td>
                        <select class ="form-control input-sm" id ="kod_selector" name="kod_selector">
                          <option value ="">[Sila Pilih]</option>
                          <?php
                          if ( ! empty($res_kod_kombinasi))
                          {
                            foreach ($res_kod_kombinasi as $kod) {
                          ?>
                              <option value="<?php echo $kod->id; ?>" <?php if ($kod->id == $res_temudugatetapan[0]->id_kew_kod_kombinasi) { echo "selected"; } ?>><?php echo $kod->name; ?></option>
                          <?php
                            }
                          }
                          ?>
                        </select>
                      </td>
                    </tr>
                  </table>

                  <table>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                      <td><div id ="info_elaun"></div></td>
                    </tr>
                  </table>
                </div>
    				</div>
          </div>
  			</div>
  			<div class="col-xs-6">
  				<div class="panel panel-info box-solid box-primary">
  					<div class="panel-heading panel-heading-custom" style="color:#fff; background-color:#3c8dbc; font-size:18;">
              Maklumat Potongan
  					</div>
  					<div class="panel-body">
              <div class ="table table-responsive">
                <span id="potongan-error" style="color:red"></span>
                <table class ="table table-bordered table-striped table-hover table-condensed tableModal" id ="myTable">
                  <thead style="background-color:#b3b3b3">
                    <th>Jenis</th>
                    <th></th>
                  </thead>
                  <tbody>
                    <?php
                    if (count($res_tetapan_potongan>0)) {
                      foreach ($res_tetapan_potongan as $tetapan_potongan) {
                    ?>
                    <tr>
                      <td class="col-xs-12">
                        <input type=hidden name=potselector[] value="<?php echo $tetapan_potongan->id_potongan; ?>">
                        <?php echo $tetapan_potongan->name_potongan; ?>
                      </td>
                      <td>
                        <button class="btn btn-danger btn-sm" id="remove">Buang</button>
                      </td>
                    </tr>
                    <?php
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>

              <button class ="btn btn-info" data-toggle="modal" data-target="#myModal">Tambah</button>

              <!-- Modal -->
              <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Tambah Potongan Baru</h4>
                    </div>
                    <div class="modal-body">
                    <table>
                      <tr>
                        <td>Jenis Potongan&nbsp;&nbsp;</td>
                        <td class="col-xs-9" >
                          <select class ="form-control" id = "modalselect">
                            <?php
                            if ( ! empty($res_potongan))
                            {
                              foreach ($res_potongan as $potongan) {
                                $str = '{"id":"'.$potongan->id.'", "name":"'.$potongan->name.'"}';
                            ?>
                                <option value='<?php echo $str; ?>'><?php echo $potongan->name; ?></option>
                            <?php
                              }
                            }
                            ?>
                          </select>
                        </td>
                      </tr>
                    </table>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-success" data-dismiss="modal"  id ="tambahmodal">Tambah</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>


  					</div>
  				</div>
  			</div>
  		</div>
      <?php } } //mmn end ?>
      <div class="row">
        <div class="col-xs-6 box-solid box-primary">
          <button type="button" class="btn btn-info" id="simpan" style="color:#fff; background-color:#3c8dbc;">Simpan Maklumat</button>
          <button type="button" class="btn btn-info" id="cetak" style="color:#fff; background-color:#3c8dbc;" <?php echo $disabledx;?> >Cetak</button>
        </div>
      </div>
      </form>
    </div>

    <!-- Tab senarai peribadi -->
    <div id="senarai-peribadi" class="tab-pane">
      <?php $this->load->view('butir-peribadi'); ?>
    </div>

    <div id="senarai-penjaga" class="tab-pane">
      <?php $this->load->view('maklumat-penjaga'); ?>
    </div>

    <div id="senarai-tinggal" class="tab-pane">
      <?php $this->load->view('tempat-tinggal'); ?>
    </div>
  </div>
  <!-- /div -->
</div>

<script>
$(document).ready(function(){
	$("#opt_kluster").change(function(){
		var val_opt_kluster = $("#opt_kluster").val();
		var val_giatmara = "<?php echo $res_temudugatetapan[0]->id_giatmara; ?>";
		$.ajax({
			url: "<?php echo site_url("admin/programreg/ajax_kursus"); ?>",
			data: {opt_kluster: val_opt_kluster, opt_giatmara: val_giatmara},
			type: "POST",
			success: function (data) {
				$("#opt_kursus").html(data);
			}
		});
	});

	$("#opt_kursus").change(function(){
		var val_opt_kluster = $("#opt_kluster").val();
		var val_opt_kursus = $("#opt_kursus").val();
		var val_giatmara = "<?php echo $res_temudugatetapan[0]->id_giatmara; ?>";
		$.ajax({
			url: "<?php echo site_url("admin/programreg/ajax_sesi"); ?>",
			data: {opt_kluster: val_opt_kluster, opt_kursus: val_opt_kursus, opt_giatmara: val_giatmara},
			type: "POST",
			success: function (data) {
				$("#opt_sesi").html(data);
			}
		});
	});

    $('#tarikh_mula').datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        autoclose: true,
        yearRange: "-0:+1"
    });

    $('#tarikh_tamat').datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        autoclose: true,
        yearRange: "-0:+1",
				onSelect: function() {
					var tarikh_tamat = $("#tarikh_tamat").datepicker('getDate');
					var date_tarikhtamat = ('0' + (tarikh_tamat.getMonth()+1)).slice(-2) + "/" +
																 ('0' + tarikh_tamat.getDate()).slice(-2) + "/" + 
																 tarikh_tamat.getFullYear();
					//console.log(tarikh_tamat);
					console.log(date_tarikhtamat);
					var tarikh_mula = $("#tarikh_mula").datepicker('getDate');
					var date_tarikhmula = ('0' + (tarikh_mula.getMonth()+1)).slice(-2) + "/" +
																 ('0' + tarikh_mula.getDate()).slice(-2) + "/" + 
																 tarikh_mula.getFullYear();
					console.log(tarikh_mula);
					console.log(date_tarikhmula);
					var strAge = getAge(date_tarikhmula, date_tarikhtamat);
      		$("#tempohcalc").html(strAge);
    		}
    });

    $('#kod_selector').on('change',function(event){
		event.preventDefault();
		var kod = $(this).val();
		$.ajax({
			data: {idkod:kod},
			url: "<?php echo site_url("admin/programreg/getkombinasikod_ajax"); ?>",
			type: "POST",
			dataType: 'json',
			success: function(result){
				if (result.status == 1) {
					// console.log(result.res_kodkombinasi);
					$("#info_elaun").show();
					$("#info_elaun").html("<br><table>"+
						"<tr>"+
							"<td><font size='2'><b>Kod Kombinasi:</b></font></td>"+
                            "<td><font size='2'>"+result.res_kodkombinasi.code_combination_name+"</font></td>"+
                            "</tr><tr>"+
                            "<td><font size='2'><b>Dana:</b></font></td>"+
                            "<td><font size='2'>"+result.res_kodkombinasi.name_dana+" (Kod:"+result.res_kodkombinasi.kod_dana+")</font></td>"+
                            "</tr><tr>"+
                            "<td><font size='2'><b>Program:</b></font></td>"+
                            "<td><font size='2'>"+result.res_kodkombinasi.name_program+" (Kod:"+result.res_kodkombinasi.kod_program+")</font></td>"+
                            "</tr><tr>"+
                            "<td><font size='2'><b>Peringkat:</b></font></td>"+
                            "<td><font size='2'>"+result.res_kodkombinasi.name_peringkat+" (Kod:"+result.res_kodkombinasi.kod_peringkat+")</font></td>"+
                            "</tr><tr>"+
                            "<td><font size='2'><b>Negara:</b></font></td>"+
                            "<td><font size='2'>"+result.res_kodkombinasi.name_negara+" (Kod:"+result.res_kodkombinasi.kod_negara+")</font></td>"+
                            "</tr><tr>"+
                            "<td><font size='2'><b>Elaun:</b></font></td>"+
                            "<td><font size='2'>"+result.res_kodkombinasi.name_elaun+" (Kod:"+result.res_kodkombinasi.kod_elaun+")</font></td>"+
                        "</tr>"+
                    "</table>");
				} else {
					$("#info_elaun").html("");
					$("#info_elaun").hide();
				}
			}
		});
	});

    $('#tambahmodal').on('click',function(){
		var data = JSON.parse($('#modalselect').val());
		if(data)
		{
			// console.log(data);
			$(".tableModal").find('tbody')
			.append($('<tr>')
			.append($('<td>').attr("class","col-xs-12").html("<input type=hidden name=potselector[] value="+data.id+">"+data.name))
			.append($('<td>').html('<button class="btn btn-danger btn-sm" id="remove">Buang</button>'))
		);
		}
    });

    $('.tableModal').on('click','#remove',function(){
		user = confirm('Buang pilihan ?');
		if(user)
		{
			var row = $(this).closest("tr");
			//console.log(row);
			row.remove();
		}
		else
		{
			return false;
		}
	});
});


/*
Snippet from : https://stackoverflow.com/questions/12251325/javascript-date-to-calculate-age-work-by-the-day-months-years/12251462?utm_medium=organic&utm_source=google_rich_qa&utm_campaign=google_rich_qa
Modified by : bambang priambodo (bambytop@gmail.com)
*/
function getAge(dateString, dateString2="") {
	if (dateString2!="") {
		console.log(dateString2);
		var today = new Date(dateString2.substring(6,10),
											dateString2.substring(0,2)-1,                   
											dateString2.substring(3,5)                  
											);
				
		var yearNow = today.getYear();
		var monthNow = today.getMonth();
		var dateNow = today.getDate();
	} else {
		var now = new Date();
		var today = new Date(now.getYear(),now.getMonth(),now.getDate());

		var yearNow = now.getYear();
		var monthNow = now.getMonth();
		var dateNow = now.getDate();
	}

	//console.log(dateString);
  var dob = new Date(dateString.substring(6,10),
                     dateString.substring(0,2)-1,                   
                     dateString.substring(3,5)                  
                     );
  var yearDob = dob.getYear();
  var monthDob = dob.getMonth();
  var dateDob = dob.getDate();
  var age = {};
  var ageString = "";
  var yearString = "";
  var monthString = "";
  var dayString = "";

  yearAge = yearNow - yearDob;

  if (monthNow >= monthDob)
    var monthAge = monthNow - monthDob;
  else {
    yearAge--;
    var monthAge = 12 + monthNow -monthDob;
  }

  if (dateNow >= dateDob)
    var dateAge = dateNow - dateDob;
  else {
    monthAge--;
    var dateAge = 31 + dateNow - dateDob;

    if (monthAge < 0) {
      monthAge = 11;
      yearAge--;
    }
  }

  age = {
      years: yearAge,
      months: monthAge,
      days: dateAge
      };

  if ( age.years > 1 ) yearString = " tahun";
  else yearString = " tahun";
  if ( age.months> 1 ) monthString = " bulan";
  else monthString = " bulan";
  if ( age.days > 1 ) dayString = " hari";
  else dayString = " hari";


  if ( (age.years >= 0) && (age.months >= 0) && (age.days >= 0) )
    ageString = "<strong>Tempoh kursus:</strong> " + age.years + yearString + " " + age.months + monthString + " " + age.days + dayString + "";
  /*
	if ( (age.years > 0) && (age.months > 0) && (age.days > 0) )
    ageString = age.years + yearString + " " + age.months + monthString + " dan " + age.days + dayString + "";
  else if ( (age.years == 0) && (age.months == 0) && (age.days > 0) )
    ageString = "" + age.days + dayString + "";
  else if ( (age.years > 0) && (age.months == 0) && (age.days == 0) )
    ageString = age.years + yearString + ". Happy Birthday!!";
  else if ( (age.years > 0) && (age.months > 0) && (age.days == 0) )
    ageString = age.years + yearString + " and " + age.months + monthString + "";
  else if ( (age.years == 0) && (age.months > 0) && (age.days > 0) )
    ageString = age.months + monthString + " and " + age.days + dayString + "";
  else if ( (age.years > 0) && (age.months == 0) && (age.days > 0) )
    ageString = age.years + yearString + " and " + age.days + dayString + "";
  else if ( (age.years == 0) && (age.months > 0) && (age.days == 0) )
    ageString = age.months + monthString + "";
	*/
  else ageString = "Tidak dapat menghitung tempo kursus!";

  return ageString;
}
//console.log(getAge('04/01/2018', '04/12/2018'));
</script>
