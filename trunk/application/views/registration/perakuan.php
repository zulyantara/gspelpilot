<style>
  #registration-step{margin:0;padding:0;}
  #registration-step li{list-style:none; float:left;padding:15px 15px;border-top:#EEE 1px solid;border-left:#EEE 1px solid;border-right:#EEE 1px solid;}
  #registration-step li.highlight{background-color:#EEE;}
  .demoInputBox{padding: 10px;border: #F0F0F0 1px solid;border-radius: 4px;background-color: #FFF;width: 50%;}
  .registration-error{color:#FF0000;}
	.error{color:#FF0000;}
  .message {color: #00FF00;font-weight: bold;width: 100%;padding: 10;}
  .btnAction{padding: 5px 10px;background-color: #09F;border: 0;color: #FFF;cursor: pointer; margin-top:15px;}

  input[type="checkbox"], input[type="radio"] {
      margin:0;
  }
</style>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script>
$.validator.setDefaults({
	submitHandler: function() {
		//alert("submitted!");
	}
});

$(document).ready(function() {
	var get_bp = $("#idBp").val();
	var get_mam = $("#idmam").val();
	var get_kursus = $("#idkursus").val();
	var get_mp = $("#idmp").val();
	var get_tinggal = $("#idtinggal").val();

	if (get_bp != "") {
		$("#done1").show();
		$("#done1-1").hide();
        $("#status1").html("LENGKAP");
	}else{
		$("#done1").hide();
		$("#done1-1").show();
		$("#finish").hide();
        $("#status1").html("BELUM LENGKAP");
	}

	if (get_mam != "") {
		$("#done2").show();
		$("#done2-1").hide();
        $("#status2").html("LENGKAP");
	}else{
		$("#done2").hide();
		$("#done2-1").show();
		$("#finish").hide();
        $("#status2").html("BELUM LENGKAP");
	}

	if (get_kursus != "") {
		$("#done3").show();
		$("#done3-1").hide();
        $("#status3").html("LENGKAP");
	}else{
		$("#done3").hide();
		$("#done3-1").show();
		$("#finish").hide();
        $("#status3").html("BELUM LENGKAP");
	}

	if (get_mp != "") {
		$("#done4").show();
		$("#done4-1").hide();
        $("#status4").html("LENGKAP");
	}else{
		$("#done4").hide();
		$("#done4-1").show();
		$("#finish").hide();
        $("#status4").html("BELUM LENGKAP");
	}

	if (get_tinggal != "") {
		$("#done5").show();
		$("#done5-1").hide();
        $("#status5").html("LENGKAP");
	}else{
		$("#done5").hide();
		$("#done5-1").show();
		$("#finish").hide();
        $("#status5").html("BELUM LENGKAP");
	}

	$("#form-perakuan").validate({
		rules:{
			pengakuan_1: "required",
			pengakuan_2: "required",
		},
		messages: {
			pengakuan_1: "Sila isikan ruangan ini&nbsp;",
			pengakuan_2: "Sila isikan ruangan ini&nbsp;",
		},
		errorElement: "em",
		errorPlacement: function ( error, element ) {
			// Add the `help-block` class to the error element
			error.addClass( "help-block" );

			if ( element.prop( "type" ) === "checkbox" || element.prop( "type" ) === "radio") {
				error.insertAfter( element.parent( "td" ) );
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

	$('#finish').click(function(event) {
		var get_bp = $("#idBp").val();
		var get_mam = $("#idmam").val();
		var get_kursus = $("#idkursus").val();
		var get_mp = $("#idmp").val();
		var get_tinggal = $("#idtinggal").val();

		if ($("#form-perakuan").valid()) {
				event.preventDefault();

				$.ajax({
					data: $("#form-perakuan").serialize(),
					url: "<?php echo site_url("registration/update_bp"); ?>",
					type: "POST",
					dataType: 'json',
					success: function(data) {
						//console.log(data);
						if (data.status == 1) {
							var loc = "<?php echo site_url('registration/cetak_permohonan/mykad/'); ?>";
							window.location = loc + data.mykad;
						} else {
							var loc = "<?php echo site_url('registration/perakuan/mykad'); ?>";
							window.location = loc + data.mykad;
						}
					}
				})
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
			<form name="form-perakuan" id="form-perakuan" method="post">
			<input type="hidden" name="idBp" id="idBp" value="<?php echo $row_data['idBp']; ?>">
			<input type="hidden" name="idmam" id="idmam" value="<?php echo $row_data['idmam']; ?>">
			<input type="hidden" name="idkursus" id="idkursus" value="<?php echo $row_data['idkursus']; ?>">
			<input type="hidden" name="idmp" id="idmp" value="<?php echo $row_data['idmp']; ?>">
			<input type="hidden" name="idtinggal" id="idtinggal" value="<?php echo $row_data['idtinggal']; ?>">
			<div class="w3-container" style="clear:both;border:1px #EEE solid;padding:20px; position:relative;">
				<div class="w3-container w3-blue">
					<h4>SENARAI SEMAK</h4>
				</div>
				<div class="w3-container">
					<p>
                        <table class="table">
                            <tr>
                                <td width="20%" align="center">1</td>
                                <td width="20%" align="center">2</td>
                                <td width="20%" align="center">3</td>
                                <td width="20%" align="center">4</td>
                                <td width="20%" align="center">5</td>
                            </tr>
                            <tr>
                                <td align="center">Butir Peribadi</td>
                                <td align="center">Maklumat Am</td>
                                <td align="center">Kursus Pilihan</td>
                                <td align="center">Maklumat Penjaga</td>
                                <td align="center">Tempat tinggal</td>
                            </tr>
                            <tr>
                                <td align="center"><span id="done1" class="fa fa-thumbs-o-up" style="display:none;"></span><span id="done1-1" class="fa fa-times" style="display:none;"></span> <span id="status1"></span></td>
                                <td align="center"><span id="done2" class="fa fa-thumbs-o-up" style="display:none;"></span><span id="done2-1" class="fa fa-times" style="display:none;"></span>  <span id="status2"></span></td>
                                <td align="center"><span id="done3" class="fa fa-thumbs-o-up" style="display:none;"></span><span id="done3-1" class="fa fa-times" style="display:none;"></span>  <span id="status3"></span></td>
                                <td align="center"><span id="done4" class="fa fa-thumbs-o-up" style="display:none;"></span><span id="done4-1" class="fa fa-times" style="display:none;"></span>  <span id="status4"></span></td>
                                <td align="center"><span id="done5" class="fa fa-thumbs-o-up" style="display:none;"></span><span id="done5-1" class="fa fa-times" style="display:none;"></span>  <span id="status5"></span></td>
                            </tr>
                        </table>
					<!-- <ol>
						<li>Butir Peribadi <span id="done1" class="fa fa-thumbs-o-up" style="display:none;"></span><span id="done1-1" class="fa fa-times" style="display:none;"></span> <span id="status1"></span></li>
						<li>Maklumat Am <span id="done2" class="fa fa-thumbs-o-up" style="display:none;"></span><span id="done2-1" class="fa fa-times" style="display:none;"></span>  <span id="status2"></span></li>
						<li>Kursus Pilihan <span id="done3" class="fa fa-thumbs-o-up" style="display:none;"></span><span id="done3-1" class="fa fa-times" style="display:none;"></span>  <span id="status3"></span></li>
						<li>Maklumat Penjaga <span id="done4" class="fa fa-thumbs-o-up" style="display:none;"></span><span id="done4-1" class="fa fa-times" style="display:none;"></span>  <span id="status4"></span></li>
						<li>Tempat tinggal <span id="done5" class="fa fa-thumbs-o-up" style="display:none;"></span><span id="done5-1" class="fa fa-times" style="display:none;"></span>  <span id="status5"></span></li>
					</ol> -->
					</p>
				</div>
				<div class="w3-container w3-blue">
					<h4>PENGAKUAN</h4>
				</div>
				<br/>
				<table border="0">
					<tr>
						<td valign="top"><input type="checkbox" class="w3-check" name="pengakuan_1" id="pengakuan_1" value="1">	</td>
						<td valign="middle">
							Saya mengesahkan bahawa semua butiran di dalam permohonan ini adalah benar. Jika didapati permohonan ini tidak lengkap atau tidak memenuhi mana-mana keperluan yang dinyatakan maka permohonan ini akan ditolak dan tidak akan diproses.
							<label for="pengakuan_1" id="pengakuan_1-error" class="error"></label><br/>
						</td>
					</tr>
                    <tr><td>&nbsp;</td></tr>
					<tr>
						<td valign="top"><input type="checkbox" class="w3-check" name="pengakuan_2" id="pengakuan_2" value="2"></td>
						<td valign="middle">
							Fasal Persetujuan PDPA<br>
                            Dengan mengemukakan borang ini, anda bersetuju bahawa GIATMARA boleh mengumpul, memperoleh, menyimpan dan memproses data peribadi anda yang telah berikan dalam borang ini untuk tujuan kemaskini data, berita, promosi dan pemasaran oleh GIATMARA.<br>
                            Anda dengan ini memberi persetujuan kepada GIATMARA untuk:
                            <ul>
                                    <li>Menyimpan dan memproses Data Peribadi anda;</li>
                                    <li>Mengisytiharkan Data Peribadi anda kepada pihak berkuasa kerajaan atau pihak ketiga yang berkaitan jika diperlukan oleh undang-undang atau untuk tujuan undang-undang.</li>
                            </ul>
                            Di samping itu, Data Peribadi anda boleh dipindahkan ke mana-mana syarikat yang difikirkan sesuai oleh GIATMARA yang mungkin melibatkan penghantaran data anda ke lokasi di luar Malaysia. Untuk tujuan mengemaskini atau membetulkan data tersebut, anda boleh pada bila-bila masa memohon kepada GIATMARA untuk mengakses data peribadi anda yang disimpan oleh GIATMARA.<br>
                            Untuk mengelakkan keraguan, Data Peribadi adalah merangkumi semua data yang ditakrifkan dalam Akta Perlindungan Data Peribadi 2010 termasuk semua data yang telah anda berikan kepada GIATMARA dalam Borang ini.
							<label for="pengakuan_2" id="pengakuan_2-error" class="error"></label><br/>
						</td>
					</tr>
				</table>


				<input class="btnAction" type="button" name="finish" id="finish" value="Hantar Permohonan">
			</div>
		</div>
	</div>
</div>
