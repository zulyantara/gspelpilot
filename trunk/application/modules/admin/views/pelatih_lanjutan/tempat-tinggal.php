<style>
  #registration-step{margin:0;padding:0;}
  #registration-step li{list-style:none; float:left;padding:15px 15px;border-top:#EEE 1px solid;border-left:#EEE 1px solid;border-right:#EEE 1px solid;}
  #registration-step li.highlight{background-color:#EEE;}
  .demoInputBox{padding: 10px;border: #F0F0F0 1px solid;border-radius: 4px;background-color: #FFF;width: 50%;}
  .registration-error{color:#FF0000;}
	.error{display: none; color:#FF0000;}
  .message {color: #00FF00;font-weight: bold;width: 100%;padding: 10;}
  .btnAction{padding: 5px 10px;background-color: #09F;border: 0;color: #FFF;cursor: pointer; margin-top:15px;}
</style>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script>
$.validator.setDefaults({
	submitHandler: function() {
		//alert("submitted!");
	}
});

$( document ).ready( function () {
	$("#form-tinggal").validate({
		messages: {
			keperluan_tempat: "Sila isikan ruangan ini&nbsp;",
			keperluan_pengangkut: "Sila isikan ruangan ini&nbsp;",
		},
		errorElement: "em",
		errorPlacement: function ( error, element ) {
			// Add the `help-block` class to the error element
			error.addClass( "help-block" );

			if ( element.prop( "type" ) === "checkbox" || element.prop( "type" ) === "radio") {
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

	$("#next3").click(function(event){
		if ($("#form-tinggal").valid()) {
			event.preventDefault();

			$.ajax({
				data: $("#form-tinggal").serialize(),
				url: "<?php echo site_url("admin/pelatih_lanjutan/simpan_tempat"); ?>",
				type: "POST",
				dataType: 'json',
				success: function(data) {
					//console.log(data);
					if (data.status == 1) {
						$('#my-tab a[href="#tab_6"]').tab("show");
					} else {
						$('#my-tab a[href="#tab_7"]').tab("show");
						$("#li_tab_7").removeClass("disabledTab");
					}
				}
			})
		}
	});
});
</script>

<div class="box-body">
<?php
	$data_h['id_pbp'] = $row_data['idBp'];
	

	
	if($get_tt->tempat_tinggal == 1){
		$tt_1 = "checked";
		$tt_2 = "";
	}else{
		$tt_1 = "";
		$tt_2 = "checked";
	}
	if($get_tt->pengangkutan == 1){
		$peng_1 = "checked";
		$peng_2 = "";
	}else{
		$peng_1 = "";
		$peng_2 = "checked";
	}
?>
  <div class="row mt-2">
    <div class="col-md-12">
			<div class="w3-container" style="clear:both;border:1px #EEE solid;padding:20px; position:relative;">
				<div>
					<h5>GIATMARA tidak menyediakan sebarang kemudahan tempat tinggal dan pengangkutan. Bahagian ini disediakan hanya untuk tujuan statistik.</h5>
					<form name="form-tinggal" id="form-tinggal" method="post">
							<input type="hidden" name="idBp" id="idBp" value="<?php echo $row_data['idBp']; ?>">
       <input type="hidden" name="id" id="id" value="<?php echo $row_data['id']; ?>">
							<input type="hidden" name="no_mykad" id="no_mykad" value="<?php echo $no_mykad ?>">
							<input type="hidden" name="idBpLast" id="idBpLast" value="<?php echo $idBpLast?>">
					<div class="form-group">
						<label>Tempat Tinggal</label>
						<fieldset>
							<label for="keperluan_tempat_sendiri">
								<input type="radio" class="form-check-input" name="keperluan_tempat" id="keperluan_tempat_sendiri" value="1" required <?php echo $tt_1 ?>>
								Atas Urusan Sendiri
							</label>&nbsp;&nbsp;
							<label for="keperluan_tempat_butuh">
								<input type="radio" class="form-check-input" name="keperluan_tempat" id="keperluan_tempat_butuh" value="0" required <?php echo $tt_2 ?>>
								Perlukan Tempat Tinggal
							</label><br/>
							<label for="keperluan_tempat" id="error" class="error">Sila isikan ruangan ini</label>
						</fieldset>
					</div>
					<div class="form-group">
						<label>Pengangkutan</label>
						<div class="form-check">
							<label for="keperluan_pengangkut_ada">
								<input type="radio" class="form-check-input" name="keperluan_pengangkut" id="keperluan_pengangkut_ada" value="1"  required <?php echo $peng_1 ?>>
								Ada Kenderaan Sendiri
							</label>
							<label for="keperluan_pengangkut_takada">
								<input type="radio" class="form-check-input" name="keperluan_pengangkut" id="keperluan_pengangkut_takada" value="0" required <?php echo $peng_2 ?>>
								Tiada kenderaan
							</label><br/>
							<label for="keperluan_pengangkut" id="error" class="error">Sila isikan ruangan ini</label>
						</div>
					</div>
					</form>
				</div>
				<input class="btn btn-primary" type="button" name="next3" id="next3" value="Simpan &amp; Seterusnya" >
			</div>
		</div>
	</div>
</div>
