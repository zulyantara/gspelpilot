		<div class="w3-container">
			<div class="w3-container w3-blue">
				<h4>MAKLUMAT AM</h4>
			</div>
			<div>
				<br/>
				<h5>DARI SUMBER MANAKAH ANDA MENDAPAT MAKLUMAT BERKENAAN KURSUS INI ?</h5>

				<div class="form-check">
								<label class="form-check-label">
												<input type="checkbox" class="form-check-input" name="sumber[media_cetak]" id="media_cetak" value="1">
												Media Cetak
								</label>
				</div>
				<div class="form-check">
								<label class="form-check-label">
												<input type="checkbox" class="form-check-input" name="sumber[media_elektronik]" id="media_elektronik" value="1">
												Media Elektronik
								</label>
				</div>
				<div class="form-check">
								<label class="form-check-label">
												<input type="checkbox" class="form-check-input" name="sumber[internet]" id="internet" value="1">
												Internet
								</label>
				</div>
				<div class="form-check">
								<label class="form-check-label">
												<input type="checkbox" class="form-check-input" name="sumber[media_sosial]" id="media_sosial" value="1">
												Media Sosial
								</label>
				</div>
				<div class="form-check">
								<label class="form-check-label">
												<input type="checkbox" class="form-check-input" name="sumber[rakan]" id="rakan" value="1">
												Rakan-rakan
								</label>
				</div>
				<div class="form-check">
								<label class="form-check-label">
												<input type="checkbox" class="form-check-input" name="sumber[keluarga]" id="keluarga" value="1">
												Keluarga
								</label>
				</div>
				<div class="form-check">
								<label class="form-check-label">
												<input type="checkbox" class="form-check-input" name="sumber[pameran]" id="pameran" value="1">
												Pameran / Karnival / Pendidikan
								</label>
				</div>
				<div class="form-check">
								<label class="form-check-label">
												<input type="checkbox" class="form-check-input" name="sumber[lain]" id="lain" value="1" onclick="toggle('#text_lain', this)">
												Lain-Lain
								</label>
				</div>
				<div class="form-check">
								<label class="form-check-label">
												&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="form-check-input" name="text_lain" id="text_lain" value="">
								</label>
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
								if ($input.prop('checked')){
												$(param).show();
												$(param).focus();
								} else { $(param).hide();	}
				}

</script>
