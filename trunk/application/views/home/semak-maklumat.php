<div class="w3-container">
	<div class="w3-container w3-blue">
		<h4>Semak Maklumat Pelatih</h4>
	</div>
	<div>
		<br/>
		<p>Nota : Sila masukkan No. MyKAD pemohon untuk semakan / pengesahan</p>
		<p>Maklumat pelatih sedia ada yang belum mengikuti mana-mana kursus turut boleh dikemaskini dengan mengisi No. MyKAD ke dalam ruangan yang disediakan</p>

		<label>No. MyKAD</label>

		<select name="gender" id="gender" class="form-control">
			<option value="awam">AWAM</option>
			<option value="passport">PASSPORT</option>
			<option value="passport">POLIS</option>
			<option value="tentara">TENTERA</option>
		</select>
		<label></label>
		<input class="w3-input w3-border" type="text" id="info_no_mykad" name="info_no_mykad" minlength="12">
		<br>
		<div id="no_mykad-error" class="registration-error"></div>
		<div id="divShow" align="left"></div>

	</div>
</div>

<div id="info-noMyKad" class="w3-modal">
	<div class="w3-modal-content w3-animate-top w3-card-4">
        <header class="w3-container w3-blue">
            <span onclick="document.getElementById('info-noMyKad').style.display='none'" class="w3-button w3-large w3-blue w3-display-topright">&times;</span>
            <h3>Informasi No. MyKAD</h3>
        </header>
        <div class="w3-container">
            <br/>
			<p>Salam Sejahtera,</p>
			<p>Terima kasih kerana berminat dengan program latihan kemahiran di GIATMARA. Borang permohonan anda telah diterima. Sila simpan maklumat berikut untuk mengemaskini permohonan dan menyemak status permohonan kelak.</p>
			<p>Nama Pemohon: <span id="applicant_name"></span></p>
			<p>No. Rujukan Permohonan : <span id="application_reference_number"></span></p>
			<input type="hidden" value="" id="hid_mykad">
			<p>No. MyKAD: <span id="applicant_mykad_number"></span></p>
			<p>Anda boleh menghubungi Pusat GIATMARA yang terdekat atau menghubungi admin GSPel di alamat emel gspelhelpdesk@giatmara.edu.my jika terdapat sebarang pertanyaan. </p>
			<p>Sekian.</p>
			<p>Administrator GSPel,</p>
			<p>GIATMARA.</p>
		</div>
        <footer class="w3-container w3-blue w3-display-container">
            <br/>
            <button type="button"
																				value="ok2"
																				class="btn btn-primary"
																				id="btn_ok2"
																				onclick="gotoMykad(document.getElementById('hid_mykad').value)">
												OK
												</button>
            <p><span onclick="document.getElementById('info-noMyKad').style.display='none'" class="w3-button w3-blue w3-display-right">Kembali</span></p>
        </footer>
    </div>
</div>


<script>
	$(document).ready(function(){

		$( "#info_no_mykad" ).change(function() {
				var info_no_mykad = $("#info_no_mykad").val();
				$("#bp_no_mykad").val(info_no_mykad);
				$("#no_mykad-error").hide();
			// AJAX Code To Submit Form.
			$.ajax({
				type : "POST",
				url : "<?php echo site_url("home/cek"); ?>",
				data : "no_mykad="+ info_no_mykad,
				dataType: 'json',
				beforeSend: function(){
					$('#divShow').html("<div><img height='100px' src='<?php echo base_url("assets/images/loading.gif")?>'></div>");
				},
				success: function(msg){

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
							// redirect ke selanjutnya dengan form kosong
							//$('#divShow').html(msg.status);
						}
						else if (msg.status == "Pelatih")
						{
							alert("Sila hubungi GIATMARA berdekatan untuk membuat permohonan.");
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
		var loc = "<?php echo site_url('my/home/index/no_mykad/'); ?>";
		window.location = loc + id;
	}

</script>
