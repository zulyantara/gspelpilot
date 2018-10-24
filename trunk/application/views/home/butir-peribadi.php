<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (@$row_data[row_pbp])
{
	@$idBp = $row_data[row_pbp]->id;
  @$nama_penuh =$row_data[row_pbp]->nama_penuh;
  @$no_mykad =$row_data[row_pbp]->no_mykad;
  @$tarikh_lahir =$row_data[row_pbp]->tarikh_lahir;
  @$kewarganegaraan =$row_data[row_pbp]->kewarganegaraan;
  @$umur =$row_data[row_pbp]->umur;
  @$no_telefon =$row_data[row_pbp]->no_telefon;
  @$no_hp =$row_data[row_pbp]->no_hp;
  @$alamat =$row_data[row_pbp]->alamat;
  @$cek_poskod =$row_data[cek_poskod];
	@$poskod =$row_data[row_pbp]->poskod;
	@$cek_bandar =$row_data[bandar_poskod];
	$negeri = "";
  @$emel =$row_data[row_pbp]->emel;
  @$bangsa =$row_data[row_pbp]->bangsa;
  @$etnik =$row_data[row_pbp]->etnik;
  @$agama =$row_data[row_pbp]->agama;
  @$taraf_perkahwinan =$row_data[row_pbp]->taraf_perkahwinan;
  @$kategori_kelulusan =$row_data[row_pbp]->kategori_kelulusan;
  @$kelulusan =$row_data[row_pbp]->kelulusan;
	$sel1 = "";
	$sel2 = "";
  @$matlamat =$row_data[row_pbp]->matlamat;
  @$kategori_pemohon =$row_data[row_pbp]->kategori_pemohon;
}
else
{
	$idBp = "";
	$nama_penuh = "";
	$no_mykad = "";
	$tarikh_lahir = "";
	$kewarganegaraan = "";
	$umur = "";
	$no_telefon = "";
	$no_hp = "";
	$alamat = "";
	$cek_poskod ="";
	$poskod ="";
	$cek_bandar ="";
	$emel = "";
	$bangsa = "";
	$etnik = "";
	$agama = "";
	$taraf_perkahwinan = "";
	$kategori_kelulusan = "";
	$sel1 = "";
	$sel2 = "";
	$kelulusan = "";
	$matlamat = "";
	$kategori_pemohon = "";
}
?>

<div class="w3-container">
	<div class="w3-container w3-blue">
		<h4>BUTIR-BUTIR PERIBADI</h4>
	</div>
	<br/>
	<div>
		<div class="form-group">
				<input type="hidden" name="idBp" id="idBp" value="<?php echo $idBp; ?>">
			<label for="bp_nama_penuh">Nama Penuh <span class="text-danger">*</span></label>
			<input type="text" class="form-control" name="bp_nama_penuh" id="bp_nama_penuh" placeholder="Nama Penuh" value="<?php echo $nama_penuh; ?>">
			<span id="bp_nama_penuh-error" style="color:red"></span>
		</div>
		<div class="w3-row">
			<div class="w3-col s6">
				<label for="bp_no_mykad">No. MyKAD <span class="text-danger">*</span></label>
				<input type="text" class="form-control" style="width:95%" name="bp_no_mykad" id="bp_no_mykad" placeholder="No. MyKAD" value="<?php echo $no_mykad; ?>">
				<span id="bp_no_mykad-error" style="color:red"></span>
			</div>
			<div class="w3-col s6">
				<label for="bp_tarikh_lahir">Tarikh Lahir <span class="text-danger">*</span></label>
				<input type="text" class="form-control" name="bp_tarikh_lahir" id="bp_tarikh_lahir" placeholder="Tarikh Lahir" value="<?php echo $tarikh_lahir; ?>">
				<span id="bp_tarikh_lahir-error" style="color:red"></span>
			</div>
		</div>
		<div class="w3-row">
			<div class="w3-col s6">
				<label for="bp_kewarganegaraan">Kewarganegaraan <span class="text-danger">*</span></label>
				<select class="form-control" name="bp_kewarganegaraan" id="bp_kewarganegaraan" style="width:95%">
					<option>Pilih Kewarganegaraan</option>
					<?php
					if ( ! empty($row_data[res_kewarganegaraan]))
					{
						foreach ($row_data[res_kewarganegaraan] as $val_kwrg)
						{
							$sel_kwrg = $val_kwrg->id == $kewarganegaraan ? "selected=\"selected\"" : "";
							?>
							<option value="<?php echo $val_kwrg->id; ?>" <?php echo $sel_kwrg; ?>><?php echo $val_kwrg->kewarganegaraan; ?></option>
							<?php
						}
					}
					?>
				</select>
				<span id="bp_kewarganegaraan-error" style="color:red"></span>
			</div>
			<div class="w3-col s6">
				<label for="bp_umur">Umur <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="bp_umur" id="bp_umur" placeholder="Umur" value="<?php echo $umur; ?>">
				<span id="bp_umur-error" style="color:red"></span>
			</div>
		</div>
		<div class="w3-row">
			<div class="w3-col s6">
					<label for="bp_no_telefon">No Telefon <span class="text-danger">*</span></label>
					<input type="text" class="form-control" style="width:95%" name="bp_no_telefon" id="bp_no_telefon" placeholder="No Telefon" value="<?php echo $no_telefon; ?>">
					<span id="bp_no_telefon-error" style="color:red"></span>
			</div>
			<div class="w3-col s6">
					<label for="bp_no_hp">No Telefon Bimbit <span class="text-danger">*</span></label>
					<input type="text" class="form-control" name="bp_no_hp" id="bp_no_hp" placeholder="No HP" value="<?php echo $no_hp; ?>">
					<span id="bp_no_hp-error" style="color:red"></span>
			</div>
		</div>

		<div class="form-group">
			<label for="bp_alamat">Alamat Surat Menyurat <span class="text-danger">*</span></label>
			<textarea name="bp_alamat" id="bp_alamat" rows="2" cols="40" placeholder="Alamat Surat Menyurat" class="form-control"><?php echo $alamat; ?></textarea>
			<span id="bp_alamat-error" style="color:red"></span>
		</div>

		<div class="w3-row">
			<div class="w3-col s6">
				<label for="bp_poskod">Poskod <span class="text-danger">*</span></label>
				<input type="text" class="form-control" style="width:95%" name="bp_poskod" id="bp_poskod" placeholder="Poskod" value="<?php echo $cek_poskod; ?>">
				<input type="hidden" name="bp_poskod_id" id="bp_poskod_id" value="<?php echo $poskod; ?>">
				<span id="bp_poskod-error" style="color:red"></span>
			</div>
			<div class="w3-col s6">
				<label for="bp_bandar">Bandar <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="bp_bandar" id="bp_bandar" placeholder="Bandar" value="<?php echo $cek_bandar; ?>">
				<span id="bp_bandar-error" style="color:red"></span>
			</div>
		</div>

		<div class="w3-row">
			<div class="w3-col s6">
               <label for="bp_negeri">Negeri <span class="text-danger">*</span></label>
				<select class="form-control" name="bp_negeri" id="bp_negeri" style="width:95%">
					<option>Pilih Negeri</option>
					<?php
					if ( ! empty($row_data[res_negeri]))
					{
						foreach ($row_data[res_negeri] as $val_negeri)
						{
								$sel_negeri = $val_negeri->nama_negeri == $negeri ? "selected=\"selected\"": "";
							?>
							<option value="<?php echo $val_negeri->nama_negeri; ?>" <?php echo $sel_negeri; ?>><?php echo $val_negeri->nama_negeri; ?></option>
							<?php
						}
					}
					?>
				</select>
				<span id="bp_negeri-error" style="color:red"></span>
			</div>
			<div class="w3-col s6">
				<label for="bp_email">Emel <span class="text-danger">*</span></label>
				<input type="email" class="form-control" name="bp_email" id="bp_email" placeholder="Emel" value="<?php echo $emel; ?>">
				<span id="bp_email-error" style="color:red"></span>
			</div>
		</div>

		<div class="w3-row">
			<div class="w3-col s6">
               <label for="bp_bangsa">Bangsa <span class="text-danger">*</span></label>
				<select class="form-control" name="bp_bangsa" id="bp_bangsa" style="width:95%">
					<option>Pilih Bangsa</option>
					<?php
					if ( ! empty($row_data[res_bangsa]))
					{
						foreach ($row_data[res_bangsa] as $val_bangsa)
						{
							$sel_bangsa = $val_bangsa->id == $bangsa ? "selected=\"selected\"" : "";
							?>
							<option value="<?php echo $val_bangsa->id; ?>" <?php echo $sel_bangsa; ?>><?php echo $val_bangsa->bangsa; ?></option>
							<?php
						}
					}
					?>
				</select>
				<span id="bp_bangsa-error" style="color:red"></span>
			</div>
			<div class="w3-col s6">
				<label for="bp_etnik">Etnik <span class="text-danger">*</span></label>
				<select class="form-control" name="bp_etnik" id="bp_etnik">
					<option>Pilih Etnik</option>
					<?php
					if ( ! empty($row_data[res_etnik]))
					{
						foreach ($row_data[res_etnik] as $val_etnik)
						{
							$sel_etnik = $val_etnik->id == $etnik ? "selected=\"selected\"": "";
							?>
							<option value="<?php echo $val_etnik->id; ?>" <?php echo $sel_etnik; ?>><?php echo $val_etnik->etnik; ?></option>
							<?php
						}
					}
					?>
				</select>
				<span id="bp_etnik-error" style="color:red"></span>
			</div>
		</div>

		<div class="w3-row">
			<div class="w3-col s6">
               <label for="bp_agama">Agama <span class="text-danger">*</span></label>
				<select class="form-control" name="bp_agama" id="bp_agama" style="width:95%">
					<option>Pilih agama</option>
					<?php
					if ( ! empty($row_data[res_agama]))
					{
									foreach ($row_data[res_agama] as $val_agama)
									{
													$sel_agama = $val_agama->id == $agama ? "selected=\"selected\"" : "";
													?>
													<option value="<?php echo $val_agama->id; ?>" <?php echo $sel_agama; ?>><?php echo $val_agama->agama; ?></option>
													<?php
									}
					}
					?>
				</select>
				<span id="bp_agama-error" style="color:red"></span>
			</div>
			<div class="w3-col s6">
				<label for="bp_taraf_perkahwinan">Taraf Perkahwinan <span class="text-danger">*</span></label>
				<select class="form-control" name="bp_taraf_perkahwinan" id="bp_taraf_perkahwinan">
					<option>Pilih Taraf Perkahwinan</option>
					<?php
					if ( ! empty($row_data[res_taraf_perkahwinan]))
					{
						foreach ($row_data[res_taraf_perkahwinan] as $val_tp)
						{
							$sel_tp = $val_tp->id == $taraf_perkahwinan ? "selected=\"selected\"" : "";
							?>
							<option value="<?php echo $val_tp->id; ?>" <?php echo $sel_tp; ?>><?php echo $val_tp->taraf_perkahwinan; ?></option>
							<?php
						}
					}
					?>
				</select>
				<span id="bp_taraf_perkahwinan-error" style="color:red"></span>
			</div>
		</div>

		<div class="w3-row">
			<div class="w3-col s6">
				<label for="bp_kategori_kelulusan">Kategori Kelulusan <span class="text-danger">*</span></label>
				<br/>
				<?php
								if($kategori_kelulusan == "Akademi"){
												$sel1 = " checked='checked'";
								}elseif($kategori_kelulusan == "Kemahiran"){
												$sel2 = " checked='checked'";
								}
				?>
					<label class="form-check-label">
						<input type="radio" class="form-check-input" name="bp_kategori_kelulusan" id="bp_kategori_kelulusan_a" value="Akademi" <?php echo $sel1?>>
						Akademi
					</label>&nbsp;&nbsp;
					<label class="form-check-label">
						<input type="radio" class="form-check-input" name="bp_kategori_kelulusan" id="bp_kategori_kelulusan_k" value="Kemahiran" <?php echo $sel2?>>
						Kemahiran
					</label>
					<span id="bp_kategori_kelulusan-error" style="color:red"></span>
			</div>
			<div class="w3-col s6">
				<label for="bp_kelulusan">Kelulusan <span class="text-danger">*</span></label>
				<select class="form-control" name="bp_kelulusan" id="bp_kelulusan">
					<option>Pilih kelulusan</option>
					<?php
					if ( !empty($row_data[res_kelulusan]))
					{
						foreach ($row_data[res_kelulusan] as $val_kelulusan)
						{
							$sel_kelulusan = $val_kelulusan->id == $kelulusan ? "selected=\"selected\"" : "";
							?>
							<option value="<?php echo $val_kelulusan->id; ?>" <?php echo $sel_kelulusan; ?>><?php echo $val_kelulusan->kelulusan; ?></option>
							<?php
						}
					}
					?>
				</select>
			</div>
		</div>

		<div class="w3-row">
			<div class="w3-col s6">
				<label for="bp_matlamat_selepas_kursus">Matlamat Selepas Kursus <span class="text-danger">*</span></label><br/>
				<?php
				$arr_matlamat["Melanjutkan Pelajaran"] = "Melanjutkan Pelajaran";
				$arr_matlamat["Bekerja"] = "Bekerja";
				$arr_matlamat["Berniaga Sendiri"] = "Berniaga Sendiri";

				foreach ($arr_matlamat as $key_mat => $val_mat)
				{
					$sel_mat = $key_mat == $matlamat ? "checked=\"checked\"" : "";
					?>
					<label class="form-check-label">
						<input type="radio" class="form-check-input" name="bp_matlamat_selepas_kursus" id="bp_matlamat_selepas_kursus" value="<?php echo $key_mat; ?>" <?php echo $sel_mat; ?>>
						<?php echo $val_mat; ?>
					</label>&nbsp;&nbsp;
					<?php
				}
				?>
				<span id="bp_matlamat_selepas_kursus-error" style="color:red"></span>
			</div>
			<div class="w3-col s6">
				<label for="bp_kategori_pemohon">Kategori Pemohon <span class="text-danger">*</span></label>
				<select class="form-control" name="bp_kategori_pemohon" id="bp_kategori_pemohon">
					<option>Pilih Kategori Pemohon</option>
					<?php
					if ( ! empty($row_data[res_kategori_pemohon]))
					{
						foreach ($row_data[res_kategori_pemohon] as $val_kp)
						{
							$sel_kp = $val_kp->id == $kategori_pemohon ? "selected=\"selected\"" : "";
							?>
							<option value="<?php echo $val_kp->id; ?>" <?php echo $sel_kp; ?>><?php echo $val_kp->kategori_pemohon; ?></option>
							<?php
						}
					}
					?>
				</select>
				<span id="bp_kategori_pemohon-error" style="color:red"></span>
			</div>
		</div>
	</div>
</div>

<!-- MODAL -->
<div id="id01" class="w3-modal">
	<div class="w3-modal-content w3-animate-top w3-card-4">
  	<header class="w3-container w3-blue">
    	<span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-large w3-blue w3-display-topright">&times;</span>
      <h3>Simpan Hantar Butir Peribadi</h3>
    </header>
    <div class="w3-container">
      <br/>
      <p>Butir Peribadi yang telah diisi akan disimpan, namun anda perlu melengkapkan keseluruhan borang permohonan ini sebelum tarikh tamat permohonan iaitu [dd/mm/yyyy fetch from setting_tarikh_permohonan.enddate where year=date(Y)].</p>
      <p>Satu notifikasi emel akan dihantar ke <span class="badge badge-info" id="str_emel1"></span> berserta nombor rujukan permohonan. Nombor rujukan permohonan ini akan digunakan untuk mengemaskini borang permohonan dan menyemak status permohonan kelak.</p>
      <p>Adakah anda boleh log masuk emel <span class="badge badge-info" id="str_emel2"></span>? Jika ya, anda boleh menyimpan borang permohonan ini dan mengemaskininya kemudian. klik 'OK' untuk menyimpan borang</p>
      <p>Jika tidak, klik 'Kembali' untuk mengemaskini borang permohonan.</p>
      <p>
	      <label class="form-check-label">
	          <input type="checkbox" id="chk_agree" class="form-check-input"> I Agree
	      </label>
      </p>
    </div>
    <footer class="w3-container w3-blue w3-display-container">
        <br/>
        <button type="button" name="btn_simpan" value="simpan_hantar" class="btn btn-primary" id="btn_ok">OK</button>
        <p><span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-blue w3-display-right">Kembali</span></p>
    </footer>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	// show or hide option kelulusan

  $("#bp_kategori_kelulusan_k").click(function(){
  	$("#bp_kelulusan").hide();
  });
  $("#bp_kategori_kelulusan_a").click(function(){
    $("#bp_kelulusan").show();
  });

	<?php if($kategori_kelulusan == "Akademi"){ ?>
	$("#bp_kelulusan").show();
	<?php }else{ 	?>
	$("#bp_kelulusan").hide();
	<?php } ?>

	// datepicker
	$('#bp_tarikh_lahir').datepicker({
		dateFormat: "yy-mm-dd",
		changeMonth: true,
		changeYear: true,
		autoclose: true,
		yearRange: "-50:+0"
	});

	// menghhitung umur
	$("#bp_tarikh_lahir").change(function(){
		var t = $("#bp_tarikh_lahir").val();
		var n = t.substring(0,4);
		var now = "<?php echo date("Y"); ?>";
		var umur = now-n;
		$("#bp_umur").val(umur);
	});

	// cek email
	$("#bp_email").blur(function(){
		var txt_email = $("#bp_email").val();
		$.ajax({
			// dataType: 'json',
			data: {email : txt_email},
			url: "<?php echo site_url("screen_dua/ajax_email"); ?>",
			type: "POST",
			success : function(data) {
				if (data == 1)
				{
					$("#mEmail").modal({show: true, keyboard: true});
					// $("#no_rujuk").focus();
				}
			}
		});
	});

	// ngisi field bandar dan negeri
	$("#bp_poskod").blur(function(){
		var poskodKet = $("#bp_poskod").val();
		$.ajax({
			dataType: 'json',
			data: {poskod_ket : poskodKet},
			url: "<?php echo site_url("screen_dua/ajax_poskod"); ?>",
			type: "POST",
			beforeSend: function(){
				$('#divShow').html("<div><img height='100px' src='<?php echo base_url("assets/images/loading.gif")?>'></div>");
			},
			success : function(data) {
				
				if (data.id_poskod > 0) {
								$("#bp_bandar").val(data.bandar);
								$("#bp_negeri").val(data.negeri);
								$("#bp_poskod_id").val(data.id_poskod);
				}else{
								$("#bp_poskod-error").html("Poskod Tidak Ditemukan");
									$("#bp_poskod").val("");
								$("#bp_poskod").focus();
				}
				
			}
		});
	});

	// tombol simpan hantar diklik, kirim email
	$("#btn_ok").click(function(event){
		event.preventDefault();

		$.ajax({
			data: $("#registration-form").serialize(),
			url: "<?php echo site_url("home/simpan2"); ?>",
			type: "POST",
			success: function(data){
				alert("Emel sudah berhasil terkirim");
				window.location = "<?php echo site_url(); ?>";
			}
		})
	});

  // disable button OK di modal
  $("#btn_ok").attr("disabled", true);

  // jika check list I Agree checked maka enabled button OK
  $("#chk_agree").click(function(){
      $("#btn_ok").attr("disabled", !this.checked)
  });

	// jika id poskod ada
	$("#bp_poskod_id").blur(function(){
		var poskodId = $("#bp_poskod_id").val();
		$.ajax({
			dataType: 'json',
			data: {poskod_id : poskodId},
			url: "<?php echo site_url("screen_dua/ajax_poskod"); ?>",
			type: "POST",
			success : function(data) {
				$("#bp_bandar").val(data.bandar);
				$("#bp_negeri").val(data.negeri);
				$("#bp_poskod_id").val(data.id_poskod);
			}
		});
	});

});
</script>
