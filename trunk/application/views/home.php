<style>
  #registration-step{margin:0;padding:0;}
  #registration-step li{list-style:none; float:left;padding:15px 15px;border-top:#EEE 1px solid;border-left:#EEE 1px solid;border-right:#EEE 1px solid;}
  #registration-step li.highlight{background-color:#EEE;}
  #registration-form{clear:both;border:1px #EEE solid;padding:20px;}
  .demoInputBox{padding: 10px;border: #F0F0F0 1px solid;border-radius: 4px;background-color: #FFF;width: 50%;}
  .registration-error{color:#FF0000;}
  .message {color: #00FF00;font-weight: bold;width: 100%;padding: 10;}
  .btnAction{padding: 5px 10px;background-color: #09F;border: 0;color: #FFF;cursor: pointer; margin-top:15px;}
</style>

<script>
function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( $email );
}

function isNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}

function validate() {
  var output = true;
  $(".registration-error").html('');

	if($("#semak-maklumat-field").css('display') != 'none') {
		var nomykad_len = $("#info_no_mykad").val().length;
		if(!($("#info_no_mykad").val())) {
			output = false;
			$("#no_mykad-error").html("No. MyKAD diperlukan.");
			$("#info_no_mykad").focus();
		}
		else if(nomykad_len < 12) {
			output = false;
			$("#no_mykad-error").show();
			$("#no_mykad-error").html("No. MyKAD diperlukan dan Min 12 digit nombor.");
			$("#info_no_mykad").focus();
		}
		
		else if (!isNumber($("#info_no_mykad").val())) {
			output = false;
			$("#no_mykad-error").show();
			$("#no_mykad-error").html("No. MyKAD harap diisi nombor sahaja.");
		}
		
		else{
			info_no_mykad = $("#info_no_mykad").val();
		}
		
		
	}

	if($("#butir-peribadi-field").css('display') != 'none') {  // ==============

		if(!($("#bp_nama_penuh").val())) {
			output = false;
			$("#bp_nama_penuh-error").html("Nama Penuh Dieprlukan.");
			$("#bp_nama_penuh").focus();
		}else if(!($("#bp_no_mykad").val())) {
			output = false;
			$("#bp_no_mykad-error").html("No. Mykad Diperlukan");
			$("#bp_no_mykad").focus();
		}else if (!isNumber($("#bp_no_mykad").val())) {
			output = false;
			$("#bp_no_mykad-error").show();
			$("#bp_no_mykad-error").html("No. MyKAD harap diisi nombor sahaja.");
		}
		
		if(!($("#bp_poskod").val())) {
			output = false;
			$("#bp_poskod-error").html("Poskod Diperlukan");
			$("#bp_poskod").focus();
		}

		if(!($("#bp_email").val())) {
			output = false;
			$("#bp_email-error").html("Emel Diperlukan");
			$("#bp_email").focus();
		}else	if( !validateEmail($("#bp_email").val())) {
			$("#bp_email-error").html("Emel Tidak Valid");
			$("#bp_email").focus();
			}
	}
	
	if($("#kursus-pilihan-field").css('display') != 'none') { // ==============
		var pilih_kursus = $("#cobaid3").val();
		
	}
	
	if($("#maklumat-penjaga-field").css('display') != 'none') { // ==============
		
		if($("#maklumat").val() == "0") {
			output = false;
			$("#maklumat-error").html("Pilih Maklumat Diperlukan");
			$("#maklumat").focus();
		}
		
		
		if($("#maklumat").val() == "1") {
			if (!isNumber($("#b_mykad").val())) {
				output = false;
				$("#b_mykad-error").show();
				$("#b_mykad-error").html("No. MyKAD harap diisi nombor sahaja.");
				$("#b_mykad").focus();
			}else if($("#b_mykad").val().length < 12) {
				output = false;
				$("#b_mykad-error").show();
				$("#b_mykad-error").html("No. MyKAD diperlukan dan Min 12 digit nombor.");
				$("#b_mykad").focus();
			}
			
			if (!isNumber($("#c_mykad").val())) {
				output = false;
				$("#c_mykad-error").show();
				$("#c_mykad-error").html("No. MyKAD harap diisi nombor sahaja.");
				$("#c_mykad").focus();
			}else if($("#c_mykad").val().length < 12) {
				output = false;
				$("#c_mykad-error").show();
				$("#c_mykad-error").html("No. MyKAD diperlukan dan Min 12 digit nombor.");
				$("#c_mykad").focus();
			}
			
				if(!($("#b_poskod").val())) {
				output = false;
				$("#b_poskod-error").html("Poskod Diperlukan");
				$("#b_poskod").focus();
				}
			
				if(!($("#c_poskod").val())) {
				output = false;
				$("#c_poskod-error").html("Poskod Diperlukan");
				$("#c_poskod").focus();
				}
		
				if(!($("#bp_poskod").val())) {
					output = false;
					$("#bp_poskod-error").html("Poskod Diperlukan");
					$("#bp_poskod").focus();
				}
			
		}
		
		if($("#maklumat").val() == "2") {
			if (!isNumber($("#a_mykad").val())) {
				output = false;
				$("#a_mykad-error").show();
				$("#a_mykad-error").html("No. MyKAD harap diisi nombor sahaja.");
				$("#a_mykad").focus();
			}else if($("#a_mykad").val().lenght < 12) {
				output = false;
				$("#a_mykad-error").show();
				$("#a_mykad-error").html("No. MyKAD diperlukan dan Min 12 digit nombor.");
				$("#a_mykad").focus();
			}
			
			if(!($("#a_poskod").val())) {
			output = false;
			$("#c_poskod-error").html("Poskod Diperlukan");
			$("#c_poskod").focus();
		}
	}
	
	}
	
	return output;
}
	


$(document).ready(function() {
	$("#btn_ok2").click(function(){
		var next = $(".highlight").next("li");
		if(next.length>0) {
			$("#"+current.attr("id")+"-field").hide();
			$("#"+next.attr("id")+"-field").show();
			$("#back").show();
			$("#finish").hide();
			$(".highlight").removeClass("highlight");
			next.addClass("highlight");
			if($(".highlight").attr("id") == $("li").last().attr("id")) {
				$("#next").hide();
				$("#finish").show();
			}

			if (current.attr("id") == 'semak-maklumat') {
				$("#back2").show();
				$("#next").val('Simpan & Seterusnya');
			}

			if (current.attr("id") == 'butir-peribadi') {
				$("#back2").hide();
			}

			if (current.attr("id") == 'tempat-tinggal') {
				$("#next").hide();
				$("#finish").show();
			}

		}
	});

	$("#next").click(function(){
		var output = validate();
		if(output) {
			var current = $(".highlight");
			var next = $(".highlight").next("li");
			if(next.length>0) {
				$("#"+current.attr("id")+"-field").hide();
				$("#"+next.attr("id")+"-field").show();
				$("#back").show();
				$("#finish").hide();
				$(".highlight").removeClass("highlight");
				next.addClass("highlight");
				if($(".highlight").attr("id") == $("li").last().attr("id")) {
					$("#next").hide();
					$("#finish").show();
				}

				if (current.attr("id") == 'semak-maklumat') {
					$("#back2").show();
					$("#next").val('Simpan & Seterusnya');
				}

				if (current.attr("id") == 'butir-peribadi') {
					$("#back2").hide();
				}

				if (current.attr("id") == 'tempat-tinggal') {
					$("#next").hide();
					$("#finish").show();

					//cek di setiap  ===============================================
					//butir pribadi
					var get_bp = $("#bp_no_mykad").val();

					if (get_bp != "") {
						$("#done1").show();
						$("#done1-1").hide();
					}else{
						$("#done1").hide();
						$("#done1-1").show();
						$("#finish").hide();
					}

					//maklumat am
					var get_media_cetak =  $("#media_cetak").val();
					var get_media_elektronik =  $("#media_elektronik").val();
					var get_internet =  $("#internet").val();
					var get_media_sosial =  $("#media_sosial").val();
					var get_rakan =  $("#rakan").val();
					var get_keluarga =  $("#keluarga").val();
					var get_pameran =  $("#pameran").val();
					var get_lain =  $("#lain").val();

					if ($('#media_cetak').is(":checked") ||
							$('#media_elektronik').is(":checked") ||
							$('#internet').is(":checked") ||
							$('#media_sosial').is(":checked") ||
							$('#rakan').is(":checked") ||
							$('#keluarga').is(":checked") ||
							$('#pameran').is(":checked") ||
							$('#lain').is(":checked")
							){
    				$("#done2").show();
    				$("#done2-1").hide();
					}else{
						$("#done2").hide();
						$("#done2-1").show();
						$("#finish").hide();
					}

					//kursus pilihan
					var kursus1 = $("#kursus1").val();
					var kursus2 = $("#kursus2").val();
					var kursus3 = $("#kursus3").val();

					if (kursus1 != "") {
						$("#done3").show();
						$("#done3-1").hide();
					}else{
						$("#done3").hide();
						$("#done3-1").show();
						$("#finish").hide();
					}

					//maklumat penjaga
					var get_maklumat =  $("#maklumat").val();
					if (get_maklumat != "0") {
						$("#done4").show();
						$("#done4-1").hide();
					}else{
						$("#done4").hide();
						$("#done4-1").show();
						$("#finish").hide();
					}

					//tempat tinggal
					if (($('#keperluan_tempat1').is(":checked") || $('#keperluan_tempat2').is(":checked")) &&
									($('#keperluan_pengangkut1').is(":checked") || $('#keperluan_pengangkut2').is(":checked"))
								)
					{
						$("#done5").show();
						$("#done5-1").hide();
					}else{
						$("#done5").hide();
						$("#done5-1").show();
						$("#finish").hide();
					}

				}

			}
		}
	});

	$("#back").click(function(){
		var current = $(".highlight");
		var prev = $(".highlight").prev("li");
		if(prev.length>0) {

			$("#"+current.attr("id")+"-field").hide();
			$("#"+prev.attr("id")+"-field").show();
			$("#next").show();
			$("#finish").hide();
			$(".highlight").removeClass("highlight");
			prev.addClass("highlight");
			if($(".highlight").attr("id") == $("li").first().attr("id")) {
				$("#back").hide();
			}

			if (current.attr("id") == 'butir-peribadi') {
					$("#back2").hide();
					$("#next").val('Seterusnya');
				}

				if (current.attr("id") == 'maklumat-am') {
					$("#back2").show();
				}

				if (current.attr("id") == 'perakuan') {
					$("#finish").hide();
				}

		}
	});

	$("#back2").click(function(){

		if(!($("#bp_email").val())) {
			$("#bp_email-error").html("Email Required !!");
			$("#bp_email").focus();
			document.getElementById('id01').style.display='none';
		}

		if(!($("#bp_nama_penuh").val())) {
			output = false;
			$("#bp_nama_penuh-error").html("Nama Penuh Required !!");
			$("#bp_nama_penuh").focus();
			document.getElementById('id01').style.display='none';
		}

		if(!($("#bp_no_mykad").val())) {
			output = false;
			$("#bp_no_mykad-error").html("No. Mykad Required !!");
			$("#bp_no_mykad").focus();
			document.getElementById('id01').style.display='none';
		}

		if( !validateEmail($("#bp_email").val())) {
			$("#bp_email-error").html("Please Email Validate !!");
			$("#bp_email").focus();
		   document.getElementById('id01').style.display='none';
		}

		//getData Email Bp
		var emailBp = $("#bp_email").val();
    $("#str_emel1").html(emailBp);
	});
});
</script>

<script>
	/*
$(document).ready(function(){
    $("#semak-maklumat").click(function(){
        $("#semak-maklumat").attr({
            "class" : "highlight"
        });
								$("#semak-maklumat-field").removeAttr("style");
								
								$("#welcome").removeAttr("class");
								$("#welcome-field").removeAttr("style");
								$("#welcome-field").attr({
            "style" : "display: none"
        });
    });
});
*/
	
	function tampil(pilih){
		$("#" + pilih).click(function(){
						
						$("#sembunyi").attr({
										"style" : "",
										"class" : "sembunyi"
						});
						$("#sembunyi-field").attr({
										"style" : "display: none"
						});
						
						$("#" + pilih).attr({
										"class" : "highlight"
						});
						$("#" + pilih + "-field").attr({
										"style" : ""
						});
						
						
		});
	}
</script>

<div class="container">

	<?php
		if (@$row_data[row_pbp])
		{
					@$noMykad =$row_data[row_pbp]->no_mykad;
					$DCH = "";
					$DSH = "style='display:none;'";

					$DCH2 = "class='highlight'";
					$DSH2 = "";

		}else{
					$DCH = "class='highlight'";
					$DSH = "";

					$DCH2 = "";
					$DSH2 = "style='display:none;'";
		}
	?>

<ul id="registration-step">
	<li id="welcome" <?=$DCH?> onclick="tampil('welcome')">Welcome</li>
	<li id="semak-maklumat" onclick="tampil('semak-maklumat')" class="sembunyi">Semak Maklumat Pelatih</li>
	<li id="butir-peribadi" <?=$DCH2?> onclick="tampil('butir-peribadi')" class="sembunyi">Butir Peribadi</li>
	<li id="maklumat-am" class="sembunyi">Maklumat Am</li>
	<li id="kursus-pilihan" class="sembunyi">Kursus Pilihan</li>
	<li id="maklumat-penjaga" class="sembunyi">Maklumat Penjaga</li>
	<li id="tempat-tinggal" class="sembunyi">Tempat Tinggal</li>
	<li id="perakuan" class="sembunyi">Perakuan</li>
</ul>

<form name="frmRegistration" id="registration-form" action="<?php echo site_url("home/simpan"); ?>" method="post">

	<div id="welcome-field" <?php echo $DSH?> class="sembunyi-field">
		<?php $this->load->view('home/welcome'); ?>
	</div>

	<div id="semak-maklumat-field" style="display:none;" class="sembunyi-field">
		<?php $this->load->view('home/semak-maklumat'); ?>
	</div>

	<div id="butir-peribadi-field" <?php echo $DSH2?> class="sembunyi-field">
		<?php $this->load->view('home/butir-peribadi'); ?>
	</div>

	<div id="maklumat-am-field" style="display:none;" class="sembunyi-field">
		<?php $this->load->view('home/maklumat-am'); ?>
	</div>

	<div id="kursus-pilihan-field" style="display:none;" class="sembunyi-field">
		<?php $this->load->view('home/kursus-pilihan'); ?>
	</div>

	<div id="maklumat-penjaga-field" style="display:none;" class="sembunyi-field">
		<?php $this->load->view('home/maklumat-penjaga'); ?>
	</div>

	<div id="tempat-tinggal-field" style="display:none;" class="sembunyi-field">
		<?php $this->load->view('home/tempat-tinggal'); ?>
	</div>

	<div id="perakuan-field" style="display:none;" class="sembunyi-field">
		<?php $this->load->view('home/perakuan'); ?>
	</div>


	<div class="w3-container">
	<input class="btnAction" type="button" name="back" id="back" value="Kembali" style="display:none;">
	<input class="btnAction" type="button" name="back2" id="back2" value="Simpan & Hantar" style="display:none;" onclick="document.getElementById('id01').style.display='block'">
	<input class="btnAction" type="button" name="next" id="next" value="Seterusnya">
	<input class="btnAction" type="button" name="next2" id="next2" value="Simpan & Seterusnya" style="display:none;" >
	<input class="btnAction" type="submit" name="check" id="check" value="Selanjutnya" style="display:none;">
	<input class="btnAction" type="submit" name="finish" id="finish" value="Hantar Permohon" style="display:none;">
	</div>
<br/>
</form>
</div>
