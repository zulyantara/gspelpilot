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

<script>
$(document).ready( function () {
	var get_media_cetak =  $("#media_cetak").val();
	var get_media_elektronik =  $("#media_elektronik").val();
	var get_internet =  $("#internet").val();
	var get_media_sosial =  $("#media_sosial").val();
	var get_rakan =  $("#rakan").val();
	var get_keluarga =  $("#keluarga").val();
	var get_pameran =  $("#pameran").val();
	var get_lain =  $("#lain").val();

	// tombol simpan seterusnya diklik
	$("#next").click(function(event) {
		if ($('#media_cetak').is(":checked") ||
				$('#media_elektronik').is(":checked") ||
				$('#internet').is(":checked") ||
				$('#media_sosial').is(":checked") ||
				$('#rakan').is(":checked") ||
				$('#keluarga').is(":checked") ||
				$('#pameran').is(":checked") ||
				$('#lain').is(":checked")
				)
        {
			if ($('#lain').is(":checked") && $('#text_lain').val()=="") {
				$("#sumber-error").html("");
				$("#text_lain-error").html("Sila isikan ruangan ini.");
				$("#text_lain").focus();
			} else {
                if ($("#minat_sendiri").is(":checked") || $('#galakan_keluarga').is(":checked") || $('#galakan_rakan').is(":checked") || $('#keperluan_majikan').is(":checked")) {

    				event.preventDefault();

    				$.ajax({
    					data: $("#form-mam").serialize(),
    					url: "<?php echo site_url("registration/simpan_mam"); ?>",
    					type: "POST",
    					dataType: 'json',
    					success: function(data){
    						//console.log(data);
    						if (data.status == 1) {
    							var loc = "<?php echo site_url('registration/kursus/mykad/'); ?>";
    							window.location = loc + data.mykad;
    						} else {
    							var loc = "<?php echo site_url('registration/kursus/mykad/'); ?>";
    							window.location = loc + data.mykad;
    						}
    					}
    				})
                } else {
                    $("#text_lain-error").html("");
                    $("#sumber-error").html("");
                    $("#sumber-error2").html("Sila isikan ruangan ini.");
                }
			}
		} else {
            if ($("#minat_sendiri").not(":checked") || $('#galakan_keluarga').not(":checked") || $('#galakan_rakan').not(":checked") || $('#keperluan_majikan').not(":checked")) {
                $("#text_lain-error").html("");
                $("#sumber-error2").html("Sila isikan ruangan ini.");
			}

			$("#text_lain-error").html("");
			$("#sumber-error").html("Sila isikan ruangan ini.");
		}
	});
});
</script>

<div class="container">

<?php
$data_h['id_pbp'] = $row_data['idBp'];
$this->load->view('registration/header', $data_h);
?>

  <div class="row mt-2">
    <div class="col-md-12">
			<form name="form-mam" id="form-mam" method="post">
			<input type="hidden" name="idBp" id="idBp" value="<?php echo $row_data['idBp']; ?>">
			<input type="hidden" name="id" id="id" value="<?php echo $row_data['id']; ?>">
            <input type="hidden" name="id2" value="<?php echo $row_data["id"]; ?>">
			<div class="w3-container" style="clear:both;border:1px #EEE solid;padding:20px; position:relative;">
				<div class="w3-container w3-blue">
					<h4>MAKLUMAT AM</h4>
				</div>
				<div>
					<br/>
					<h5>DARI SUMBER MANAKAH ANDA MENDAPAT MAKLUMAT BERKENAAN KURSUS INI ? <span class="text-danger">*</span></h5>

                    <div class="form-check">
    					<span id="sumber-error" style="color:red"></span>
    				</div>
					<div class="form-check">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input" name="sumber[media_cetak]" id="media_cetak" value="1" <?php if ($row_data['mam']->media_cetak) echo "checked"; ?> >
							Media Cetak
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input" name="sumber[media_elektronik]" id="media_elektronik" value="1" <?php if ($row_data['mam']->media_elektronik) echo "checked"; ?> >
							Media Elektronik
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input" name="sumber[internet]" id="internet" value="1" <?php if ($row_data['mam']->internet) echo "checked"; ?> >
							Internet
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input" name="sumber[media_sosial]" id="media_sosial" value="1" <?php if ($row_data['mam']->media_sosial) echo "checked"; ?> >
							Media Sosial
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input" name="sumber[rakan]" id="rakan" value="1" <?php if ($row_data['mam']->rakan) echo "checked"; ?> >
							Rakan-rakan
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input" name="sumber[keluarga]" id="keluarga" value="1" <?php if ($row_data['mam']->keluarga) echo "checked"; ?> >
							Keluarga
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input" name="sumber[pameran]" id="pameran" value="1" <?php if ($row_data['mam']->pameran) echo "checked"; ?> >
							Pameran / Karnival / Pendidikan
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input" name="sumber[lain]" id="lain" value="1" onclick="toggle('#text_lain', this)" <?php if ($row_data['mam']->lain) echo "checked"; ?> >
							Lain-Lain
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="form-check-input" name="text_lain" id="text_lain" value=" <?php if ($row_data['mam']->text_lain!="") echo $row_data['mam']->text_lain; ?>">
						</label>
						<span id="text_lain-error" style="color:red"></span>
					</div>
                    <br>
                    <h5>APAKAH FAKTOR YANG MENDORONG ANDA MEMOHON UNTUK MENGIKUTI LATIHAN DI GIATMARA? <span class="text-danger">*</span></h5>

                    <div class="form-check">
    					<span id="sumber-error2" style="color:red"></span>
    				</div>
					<div class="form-check">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input" name="sumber2[minat_sendiri]" id="minat_sendiri" value="1" <?php if ($row_data['mam_2']->minat_sendiri) echo "checked"; ?> >
							Minat Sendiri
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input" name="sumber2[galakan_keluarga]" id="galakan_keluarga" value="1" <?php if ($row_data['mam_2']->galakan_keluarga) echo "checked"; ?> >
							Galakan Keluarga
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input" name="sumber2[galakan_rakan]" id="galakan_rakan" value="1" <?php if ($row_data['mam_2']->galakan_rakan) echo "checked"; ?> >
							Galakan Rakan-Rakan
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input" name="sumber2[keperluan_majikan]" id="keperluan_majikan" value="1" <?php if ($row_data['mam_2']->keperluan_majikan) echo "checked"; ?> >
							Keperluan Majikan
						</label>
					</div>
				</div>
				<input class="btnAction btn btn-primary" type="button" name="next" id="next" value="Simpan &amp; Seterusnya" >
			</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
  // show or hide option kelulusan
  $("#text_lain").hide();
});

function toggle(param, obj) {
	var $input = $(obj);
	if ($input.prop('checked')) {
		$(param).show();
		$(param).focus();
	} else { $(param).hide();	}
}
</script>
