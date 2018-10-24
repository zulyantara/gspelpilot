<div class="card">
    <h3 class="card-header">MAKLUMAT AM</h3>
	<div class="card-block">
								<h5>DARI SUMBER MANAKAH ANDA MENGETAHUI PRIHAL KURSUS INI ?</h5>
        <form method="post" action="<?php echo site_url("screen_tiga/simpan"); ?>">
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
																				Lain
																</label>
												</div>
												<div class="form-check">
																<label class="form-check-label">
																				&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="form-check-input" name="text_lain" id="text_lain" value="">
																</label>
												</div>
            <div class="btn-group float-right" role="group">
                <button type="submit" name="btn_simpan" value="simpan_seterusnya" class="btn btn-primary">Simpan & Seterusnya</button>
            </div>
    </form>
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
