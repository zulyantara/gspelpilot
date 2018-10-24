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

});
</script>

<div class="modal fade" id="divShow"></div>
<?php #echo $res_temudugatetapan[0]->tawaran_nama_bank; ?>
<div class="nav-tabs-custom">
  <ul id="senarai_permohonan_kursus" class="nav nav-tabs">
    <li id="permohonan" class="active"><a href="#senarai-tab" data-toggle="tab" aria-expanded="true">Senarai Permohonan</a></li>
  	<li id="peribadi"><a href="#senarai-peribadi" data-toggle="tab" aria-expanded="false">Butir Peribadi</a></li>
    <li id="penjaga"><a href="#senarai-penjaga" data-toggle="tab" aria-expanded="false">Butir Penjaga</a></li>
    <li id="tinggal"><a href="#senarai-tinggal" data-toggle="tab" aria-expanded="false">Butir Tempat Tinggal</a></li>
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
                  <td><font size="2"><?php echo $res_temudugatetapan[0]->nama_kluster; ?></font></td>
                  <td><font size="2"><?php echo $res_temudugatetapan[0]->nama_kursus; ?></font></td>
                  <td><font size="2"><?php echo $res_temudugatetapan[0]->nama_negeri; ?></font></td>
                  <td><font size="2"><?php echo $res_temudugatetapan[0]->nama_giatmara; ?></font></td>
                  <td><font size="2"><?php echo $res_temudugatetapan[0]->sesi; ?></font></td>
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
                <td><font size ="2"><b>TARIKH MULA KURSUS/ELAUN*&nbsp;&nbsp;&nbsp;</b></font></td>
                <td class ="col-xs-5">
                  <div id="datepicker1" class="input-group date">
                   <input class="form-control" type="text" name="tarikh_mula" id="tarikh_mula" value ="<?php echo ($res_temudugatetapan[0]->tawaran_mula_elaun) ? date('d-m-Y', strtotime($res_temudugatetapan[0]->tawaran_mula_elaun)) : date('d-m-Y'); ?>" disabled />
                    <span class="input-group-addon">
                       <i class="glyphicon glyphicon-calendar"></i>
                    </span>
                 </div>
                </td>
                <td></td>
                <td><font size ="2"><b>TARIKH TAMAT KURSUS/ELAUN*&nbsp;&nbsp;&nbsp;</b></font></td>
                <td class ="col-xs-6">
                  <div id="datepicker2" class="input-group date">
                    <input class="form-control col-xs-12" type="text" name="tarikh_tamat" id="tarikh_tamat" value ="<?php echo ($res_temudugatetapan[0]->tawaran_tamat_elaun) ? date('d-m-Y', strtotime($res_temudugatetapan[0]->tawaran_tamat_elaun)) : date('d-m-Y'); ?>" disabled/>
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
    							<td class = "col-xs-2"><?php echo $res_temudugatetapan[0]->nama_bank; ?>
    							</td>
    							<td colspan="2"></td>
    						</tr>

    						<tr><td>&nbsp;</td></tr>
    						<tr>
    							<td class = "col-xs-2"><font size="2"><b>NO AKAUN*</b></font></td>
    							<td class = "col-xs-2"><?php echo $res_temudugatetapan[0]->no_akaun;?></td>
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
								<?php if (count($res_kod_kombinasi)>0) { ?>
								<table>
									<tr>
										<td><font size="2"><b>Kod Kombinasi</b>&nbsp;</font></td>
										<td>:&nbsp;<?php echo $res_kod_kombinasi[0]->name." (".$res_kod_kombinasi[0]->code_combination_name.")"; ?></td>
										<td colspan="4">&nbsp;</td>
									</tr>
									<tr>
										<td><font size="2"><b>Dana</b>&nbsp;</font></td>
										<td>:&nbsp;<?php echo $res_kod_kombinasi[0]->name_dana." (".$res_kod_kombinasi[0]->kod_dana.")"; ?></td>
										<td colspan="4">&nbsp;</td>
									</tr>
									<tr>
										<td><font size="2"><b>Program</b>&nbsp;</font></td>
										<td>:&nbsp;<?php echo $res_kod_kombinasi[0]->name_program." (".$res_kod_kombinasi[0]->kod_program.")"; ?></td>
										<td colspan="4">&nbsp;</td>
									</tr>
									<tr>
										<td><font size="2"><b>Peringkat</b>&nbsp;</font></td>
										<td>:&nbsp;<?php echo $res_kod_kombinasi[0]->name_peringkat." (".$res_kod_kombinasi[0]->kod_peringkat.")"; ?></td>
										<td colspan="4">&nbsp;</td>
									</tr>
									<tr>
										<td><font size="2"><b>Negara</b>&nbsp;</font></td>
										<td>:&nbsp;<?php echo $res_kod_kombinasi[0]->name_negara." (".$res_kod_kombinasi[0]->kod_negara.")"; ?></td>
										<td colspan="4">&nbsp;</td>
									</tr>
									<tr>
										<td><font size="2"><b>Elaun</b>&nbsp;</font></td>
										<td>:&nbsp;<?php echo $res_kod_kombinasi[0]->name_elaun." (".$res_kod_kombinasi[0]->kod_elaun.")"; ?></td>
										<td colspan="4">&nbsp;</td>
									</tr>
								</table>
								<?php } ?>
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
                  </thead>
                  <tbody>
                    <?php
                    if (count($res_tetapan_potongan>0)) {
                      foreach ($res_tetapan_potongan as $tetapan_potongan) {
                    ?>
                    <tr>
                      <td class="col-xs-12"><?php echo $tetapan_potongan->name_potongan; ?></td>
                    </tr>
                    <?php
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>

  					</div>
  				</div>
  			</div>
  		</div>

      <div class="row">
        <div class="col-xs-6 box-solid box-primary">
          <button type="button" class="btn btn-info" id="cetak" style="color:#fff; background-color:#3c8dbc;">Cetak</button>
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
	$("#cetak").click(function(){
		window.open('<?php echo site_url('admin/programreg/cetak_detailberdaftar/'.$idtemudugatetapan); ?>', '_blank');
		//event.preventDefault();
	});
});
</script>
