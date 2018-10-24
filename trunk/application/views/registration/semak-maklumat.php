<style>
  #registration-step{margin:0;padding:0;}
  #registration-step li{list-style:none; float:left;padding:15px 15px;border-top:#EEE 1px solid;border-left:#EEE 1px solid;border-right:#EEE 1px solid;}
  #registration-step li.highlight{background-color:#EEE;}
  #registration-form{clear:both;border:1px #EEE solid;padding:20px;}
  .demoInputBox{padding: 10px;border: #F0F0F0 1px solid;border-radius: 4px;background-color: #FFF;width: 50%;}
  .registration-error{color:#FF0000;}
  .error{color:#FF0000;}
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

	$.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
	}, "Letters only please");

	valNow = "<?php echo $this->uri->segment(4)?>";

	if (valNow=="") {
		valNow = "mykad";
	}

	$("#gender").val(valNow);
	$("#nn_validate").val(valNow)

	$("#gender").change(function () {
		str = $(this).val();
		var nn_validate = $("#nn_validate").val();

		if (nn_validate == "") {
			$("#nn_validate").val(str);
		}else{
			window.location = "registration/semakmaklumat/"+str;
		}

	});

	var str = "<?php echo $this->uri->segment(4)?>";

	if (str=="mykad") {
		valMsg = "MyKAD";
		valMin = 12;
		valMax = 12;
		valNumber = true;
		vallettersonly = false;
	}else if (str=="passport") {
		valMsg = "PASSPORT";
		valMin = false;
		valMax = 20;
		valNumber = false;
		vallettersonly = false;
	}else if (str=="polis") {
		valMsg = "POLIS";
		valMin = false;
		valMax = 20;
		valNumber = false;
		vallettersonly = false;
	}else if (str=="tentara") {
		valMsg = "TENTARA";
		valMin = false;
		valMax = 20;
		valNumber = false;
		vallettersonly = false;
	}else{
		valMsg = "MyKAD";
		valMin = 12;
		valMax = 12;
		valNumber = true;
		vallettersonly = false;
	}

		$("#form-bp").validate({
			rules: {
				info_no_mykad: {
					required: true,
					minlength: valMin,
					maxlength: valMax,
					number : valNumber,
					lettersonly : vallettersonly
				},
				gender: {
					required: true,
				},
			},
			messages: {
				info_no_mykad: {
					required: "Sila isikan ruangan ini",
					minlength: "No. "+valMsg+" diperlukan dan Min "+valMin+" digit nombor.",
					maxlength: "No. "+valMsg+" diperlukan dan Max "+valMax+" digit nombor.",
					number: "Isikan No. "+valMsg+" yang benar.",
					lettersonly: "No. "+valMsg+" harap diisi character sahaja.",
				},
				gender: {
					required: "Sila isikan ruangan ini"
				},
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

		$("#next").click(function(){
            // harus cek ke table pelatih dulu, klo ada di table pelatih maka tak boleh lanjut lah

    		if ($("#form-bp").valid()) {
    			//document.getElementById('id01').style.display='block'
                var loc = "<?php echo site_url('registration/butirperibadi/mykad'); ?>";
                window.location = loc + "/" + $("#info_no_mykad").val();
    		}
		});

});



</script>
<div class="container">
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="w3-container" style="clear:both;border:1px #EEE solid;padding:20px; position:relative;">
                <div class="w3-container w3-blue">
					<h4>Semak Maklumat Pelatih</h4>
				</div>
                <div>
                    <br/>
                    <input type="hidden" id="nn_validate" value="">
					<p class="text-danger">Nota : Sila masukkan ID Pengenalan pemohon untuk semakan / pengesahan</p>
					<p>Maklumat pelatih sedia ada yang belum mengikuti mana-mana kursus turut boleh dikemaskini dengan mengisi No. MyKAD ke dalam ruangan yang disediakan</p>

                    <div class="form-group row">
                        <form name="form-bp" id="form-bp" method="post">
                            <label class="col-sm-2 col-form-label">Jenis ID Pengenalan</label>
                            <div class="col-sm-4">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="mykad">MyKAD</option>
                                    <option value="passport">PASSPORT</option>
                                    <option value="polis">POLIS</option>
                                    <option value="tentara">TENTERA</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <input class="form-control required" type="text" id="info_no_mykad" name="info_no_mykad">
                            </div>
                        </form>
                    </div>

					<div id="info_no_mykad-error" class="registration-error"></div>
					<div id="divShow" align="left"></div>

                    <input class="btnAction btn btn-primary" type="button" name="next" id="next" value="Seterusnya">
				</div>
			</div>

			<div id="info-noMyKad" class="w3-modal">
				<div class="w3-modal-content w3-animate-top w3-card-4">
        	        <header class="w3-container w3-blue">
        	            <span onclick="document.getElementById('info-noMyKad').style.display='none'" class="w3-button w3-large w3-blue w3-display-topright">&times;</span>
                        <h3>Kemaskini Borang Permohonan</h3>
        	        </header>
                    <div class="w3-container">
                        <br/>
                        <p>Salam Sejahtera,</p>
                        <p>Terima kasih kerana berminat dengan program latihan kemahiran di GIATMARA. Borang permohonan anda telah diterima. </p>
                        Adakah anda ingin mengemaskini permohonan ini? Jika ya, klik 'OK'.</p>
                        <p>Jika tidak, klik 'Kembali'.</p>
                        <p>Anda boleh menghubungi Pusat GIATMARA yang terdekat atau menghubungi admin GSPel di alamat emel gspelhelpdesk@giatmara.edu.my jika terdapat sebarang pertanyaan. </p>
                        <p>Sekian.<br>
                        Administrator GSPel,<br>
                        GIATMARA.</p>
                    </div>
                    <footer class="w3-container w3-blue w3-display-container">
                        <br/>
                        <button type="button" value="ok2" class="btn btn-primary" id="btn_ok2" onclick="gotoMykad(document.getElementById('info_no_mykad').value)">OK</button>
                        <button type="button" name="button" class="btn btn-primary" onclick="document.getElementById('info-noMyKad').style.display='none'">Kembali</button>
                        <br>
                    </footer>
                </div>
            </div>

			<script>
				$(document).ready(function(){
					$("#info_no_mykad" ).change(function() {
						var info_no_mykad = $("#info_no_mykad").val();
						$("#bp_no_mykad").val(info_no_mykad);
						$("#no_mykad-error").hide();
						// AJAX Code To Submit Form.
						$.ajax({
							type : "POST",
							url : "<?php echo site_url("registration/cekkad"); ?>",
							data : "no_mykad="+ info_no_mykad,
							dataType: 'json',
							beforeSend: function(){
								$('#divShow').html("<div><img height='100px' src='<?php echo base_url("assets/images/loading.gif")?>'></div>");
							},
							success: function(msg)
							{
                                // console.log(msg);
								$('#divShow').html("");
								if (msg.status != null)
								{
									if (msg.status == 'Permohonan telah dihantar')
									{
										// redirect ke step selanjutnya
										document.getElementById("info-noMyKad").style.display='block';
										$('#divShow').html("");
										$('#applicant_name').html(msg.pbp_nama_penuh);
										$('#applicant_mykad_number').html(msg.pbp_no_mykad);
										$('#application_reference_number').html(msg.pbp_no_rujukan_permohonan);
										$('#hid_mykad').val(msg.pbp_no_mykad);
									}
									else if (msg.status == 'Next Proses')
									{
                                        document.getElementById('info-noMyKad').style.display='none';
                                        //var loc = "<?php echo site_url('registration/butirperibadi'); ?>";
                                        //window.location = loc;
										// redirect ke selanjutnya dengan form kosong
										//$('#divShow').html(msg.status);
									}
									else if (msg.status == "Pelatih")
									{
										//$('#divShow').html(msg.status);
                                        alert("No MyKAD anda sudah terdaftar, sila hubungi GIATMARA berdekatan untuk membuat permohonan.");
									}
								}
								else
								{
									document.getElementById("info-noMyKad").style.display='block';
									$('#divShow').html("");
									$('#applicant_name').html(msg.pbp_nama_penuh);
									$('#applicant_mykad_number').html(msg.pbp_no_mykad);
									$('#application_reference_number').html(msg.pbp_no_rujukan_permohonan);
									$('#hid_mykad').val(msg.pbp_no_mykad);
								}
							}
						});
					});
				});

				function gotoMykad(id){
					document.getElementById('info-noMyKad').style.display='none';
					var loc = "<?php echo site_url('registration/butirperibadi/mykad/'); ?>";
					window.location = loc + id;
				}
			</script>
		</div>
	</div>
</div>
