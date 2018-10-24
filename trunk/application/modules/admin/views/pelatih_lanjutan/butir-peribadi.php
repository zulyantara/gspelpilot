<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//echo "<pre>";print_r($negeri);echo "</pre>";

if (@$row_pbp)
{
	@$idBp = $row_pbp->id;
	@$nama_penuh =$row_pbp->nama_penuh;
	@$no_mykad =$row_pbp->no_mykad;
	$dt_tarikh_lahir = new DateTime($row_pbp->tarikh_lahir);
	@$tarikh_lahir = $dt_tarikh_lahir->format("d-m-Y");
	@$kewarganegaraan =$row_pbp->kewarganegaraan;
	@$umur =$row_pbp->umur;
	@$no_telefon =$row_pbp->no_telefon;
	@$no_hp =$row_pbp->no_hp;
	@$alamat =$row_pbp->alamat;
	@$cek_poskod =$cek_poskod;
	@$poskod =$row_pbp->poskod_3;
	@$bandar =$row_pbp->bandar_3;
	@$negeri_3 =$row_pbp->negeri_3;
	@$cek_bandar =$bandar_poskod;
	@$negeri = $nama_negeri;
	@$emel =$row_pbp->emel;
	@$bangsa =$row_pbp->bangsa;
	@$etnik =$row_pbp->etnik;
	@$agama =$row_pbp->agama;
	@$taraf_perkahwinan =$row_pbp->taraf_perkahwinan;
	@$kategori_kelulusan =$row_pbp->kategori_kelulusan;
	@$kelulusan =$row_pbp->kelulusan;
	$sel1 = "";
	$sel2 = "";
	@$matlamat =$row_pbp->matlamat;
	@$kategori_pemohon =$row_pbp->kategori_pemohon;
}
/*
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
*/
?>

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
			bp_nama_penuh: "required",
			bp_no_mykad: {
				required: true,
				minlength: 12,
				maxlength: 12,
				number: true,
			},
			bp_tarikh_lahir: "required",
			bp_kewarganegaraan: "required",
			bp_umur: "required",
			// bp_no_telefon: "required",
			bp_no_hp: "required",
			bp_alamat: "required",
			bp_poskod: "required",
			bp_bandar: "required",
			bp_negeri: "required",
			/*bp_email: {
					required: true,
					email: true
			},*/
			bp_bangsa: "required",
			bp_etnik: "required",
			bp_agama: "required",
			bp_taraf_perkahwinan: "required",
			bp_kategori_kelulusan: "required",
			bp_matlamat_selepas_kursus: "required",
			bp_kategori_pemohon: "required",
		},
		messages: {
			bp_nama_penuh: "Sila isikan ruangan ini",
			bp_no_mykad: {
				required: "Sila isikan ruangan ini",
				minlength: "No. MyKAD diperlukan dan Min 12 digit nombor.",
				maxlength: "No. MyKAD diperlukan dan Max 12 digit nombor.",
				number: "No. MyKAD harap diisi nombor sahaja.",
			},
			bp_tarikh_lahir: "Sila isikan ruangan ini",
			bp_kewarganegaraan: "Sila isikan ruangan ini",
			bp_umur: "Sila isikan ruangan ini",
			// bp_no_telefon: "Sila isikan ruangan ini",
			bp_no_hp: "Sila isikan ruangan ini",
			bp_alamat: "Sila isikan ruangan ini",
			bp_poskod: "Sila isikan ruangan ini",
			bp_bandar: "Sila isikan ruangan ini",
			bp_negeri: "Sila iskan ruangan ini",
			/*bp_email: {
				required: "Sila isikan ruangan ini",
				email: "Sila isikan emel yang betul",
			},*/
			bp_bangsa: "Sila isikan ruangan ini",
			bp_etnik: "Sila isikan ruangan ini",
			bp_agama: "Sila isikan ruangan ini",
			bp_taraf_perkahwinan: "Sila isikan ruangan ini",
			bp_kategori_kelulusan: "Sila isikan ruangan ini",
			bp_matlamat_selepas_kursus: "Sila isikan ruangan ini",
			bp_kategori_pemohon: "Sila isikan ruangan ini",
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

	$("#back2").click(function(){
		if ($("#form-bp").valid()) {
			document.getElementById('id01').style.display='block';
		}
	});
});
</script>



<div class="box-body">

	<?php
	$data_h['id_pbp'] = $idBp;
	?>

				<form name="form-bp" id="form-bp" method="post">
					<div class="form-group">
						<input type="hidden" name="idBp" id="idBp" value="<?php echo $idBp; ?>">
						<label for="bp_nama_penuh">Nama Penuh <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="bp_nama_penuh" id="bp_nama_penuh" placeholder="Nama Penuh" value="<?php echo $nama_penuh; ?>"style="text-transform:uppercase">
						<span id="bp_nama_penuh-error" style="color:red"></span>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label for="bp_no_mykad">No. MyKAD <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="bp_no_mykad" id="bp_no_mykad" placeholder="No. MyKAD" value="<?php echo $no_mykad; ?>" readonly>
							<span id="bp_no_mykad-error" style="color:red"></span>
						</div>
						<div class="col-md-6">
							<label for="bp_tarikh_lahir">Tarikh Lahir <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="bp_tarikh_lahir" id="bp_tarikh_lahir" placeholder="Tarikh Lahir" value="<?php echo $tarikh_lahir; ?>">
							<span id="bp_tarikh_lahir-error" style="color:red"></span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label for="bp_kewarganegaraan">Kewarganegaraan <span class="text-danger">*</span></label>
							<select class="form-control" name="bp_kewarganegaraan" id="bp_kewarganegaraan">
								<option value="">Pilih Kewarganegaraan</option>
								<?php
								if ( ! empty($res_kewarganegaraan))
								{
									foreach ($res_kewarganegaraan as $val_kwrg)
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
						<div class="col-md-6">
							<label for="bp_umur">Umur <span class="text-danger">*</span></label>
			                <input type="text" class="form-control" name="bp_umur" id="bp_umur" placeholder="Umur" value="<?php echo $umur; ?>">
							<span id="bp_umur-error" style="color:red"></span>
						</div>
					</div>
					<div class="row">
						<!--<div class="col-md-6">
								<label for="bp_no_telefon">No Telefon <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="bp_no_telefon" id="bp_no_telefon" placeholder="No Telefon" value="<?php echo $no_telefon; ?>">
								<span id="bp_no_telefon-error" style="color:red"></span>
						</div>-->
						<div class="col-md-6">
								<label for="bp_no_hp">No Telefon Yang Boleh Dihubungi (Cth: 0389008988) <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="bp_no_hp" id="bp_no_hp" placeholder="No Telefon Yang Boleh Dihubungi (Cth: 0389008988)" value="<?php echo $no_hp; ?>">
								<span id="bp_no_hp-error" style="color:red"></span>
						</div>
					</div>

					<div class="form-group">
						<label for="bp_alamat">Alamat Surat Menyurat <span class="text-danger">*</span></label>
						<textarea name="bp_alamat" id="bp_alamat" rows="2" cols="40" placeholder="Alamat Surat Menyurat" class="form-control" style="text-transform:uppercase"><?php echo $alamat; ?></textarea>
						<span id="bp_alamat-error" style="color:red"></span>
					</div>

					<div class="row">
						<div class="col-md-6">
							<label for="bp_poskod">Poskod <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="bp_poskod" id="bp_poskod" placeholder="Poskod" value="<?php echo $poskod; ?>">
							<input type="hidden" name="bp_poskod_id" id="bp_poskod_id" value="<?php echo $poskod; ?>">
							<span id="bp_poskod-error" style="color:red"></span>
						</div>
						<div class="col-md-6">
							<label for="bp_bandar">Bandar <span class="text-danger">*</span></label>
			                <input type="text" class="form-control text-uppercase" name="bp_bandar" id="bp_bandar" placeholder="Bandar" value="<?php echo $bandar; ?>">
							<span id="bp_bandar-error" style="color:red"></span>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
			               <label for="bp_negeri">Negeri <span class="text-danger">*</span></label>
							<select class="form-control" name="bp_negeri" id="bp_negeri">
								<option value="">Pilih Negeri</option>
								<?php
								if ( ! empty($res_negeri))
								{
									foreach ($res_negeri as $val_negeri)
									{
										$sel_negeri = $val_negeri->nama_negeri == $negeri_3 ? "selected=\"selected\"": "";
										?>
										<option value="<?php echo $val_negeri->nama_negeri; ?>" <?php echo $sel_negeri; ?>><?php echo $val_negeri->nama_negeri; ?></option>
										<?php
									}
								}
								?>
							</select>
							<span id="bp_negeri-error" style="color:red"></span>
						</div>
						<div class="col-md-6">
							<label for="bp_email">Emel (Masukkan - jika tiada emel) <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="bp_email" id="bp_email" placeholder="Emel" value="<?php echo $emel; ?>">
							<span id="bp_email-error" style="color:red"></span>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
			               <label for="bp_bangsa">Bangsa <span class="text-danger">*</span></label>
							<select class="form-control" name="bp_bangsa" id="bp_bangsa">
								<option value="">Pilih Bangsa</option>
								<?php
								if ( ! empty($res_bangsa))
								{
									foreach ($res_bangsa as $val_bangsa)
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
						<div class="col-md-6">
							<label for="bp_etnik">Etnik <span class="text-danger">*</span></label>
							<select class="form-control" name="bp_etnik" id="bp_etnik">
								<option value="">Pilih Etnik</option>
								<?php
								if ( ! empty($res_etnik))
								{
									foreach ($res_etnik as $val_etnik)
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

					<div class="row">
						<div class="col-md-6">
			               <label for="bp_agama">Agama <span class="text-danger">*</span></label>
							<select class="form-control" name="bp_agama" id="bp_agama">
								<option value="">Pilih agama</option>
								<?php
								if ( ! empty($res_agama))
								{
												foreach ($res_agama as $val_agama)
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
						<div class="col-md-6">
							<label for="bp_taraf_perkahwinan">Taraf Perkahwinan <span class="text-danger">*</span></label>
							<select class="form-control" name="bp_taraf_perkahwinan" id="bp_taraf_perkahwinan">
								<option>Pilih Taraf Perkahwinan</option>
								<?php
								if ( ! empty($res_taraf_perkahwinan))
								{
									foreach ($res_taraf_perkahwinan as $val_tp)
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

					<div class="row">
						<div class="col-md-6">
							<!--
							<label for="bp_kategori_kelulusan">Kategori Kelulusan <span class="text-danger">*</span></label>
							<br/>
							<?php
											if($kategori_kelulusan == "Akademi" || $kategori_kelulusan == "Akademik"){
															$sel1 = " checked='checked'";
											}elseif($kategori_kelulusan == "Kemahiran"){
															$sel2 = " checked='checked'";
											}
							?>
							<fieldset>
								<label class="form-check-label" for="bp_kategori_kelulusan_akademi">
									<input type="radio" class="form-check-input" name="bp_kategori_kelulusan" id="bp_kategori_kelulusan_a" value="Akademi" <?php echo $sel1?>>
									Akademi
								</label>
								<label class="form-check-label" for="bp_kategori_kelulusan_kemahiran">
									<input type="radio" class="form-check-input" name="bp_kategori_kelulusan" id="bp_kategori_kelulusan_k" value="Kemahiran" <?php echo $sel2?>>
									Kemahiran
								</label>
								<span id="bp_kategori_kelulusan-error" class="error" style="color:red"></span>
							</fieldset>
					-->

					<label for="bp_kelulusan_akademik">Kelulusan Akademik <span class="text-danger">*</span></label>
							<select class="form-control" name="bp_kelulusan" id="bp_kelulusan">
								<option>Pilih kelulusan</option>
								<?php
								if ( !empty($res_kelulusan))
								{
									foreach ($res_kelulusan as $val_kelulusan)
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
						<div class="col-md-6">
							<label for="bp_kelulusan_kemahiran">Kelulusan Kemahiran <span class="text-danger">*</span></label>
							<select class="form-control" name="bp_kelulusan_kemahiran" id="bp_kelulusan_kemahiran">
								<option>Pilih Kemahiran</option>
								<?php
								if ( !empty($res_kelulusan_kemahiran))
								{
									foreach ($res_kelulusan_kemahiran as $val_kelulusan_kemahiran)
									{
										$sel_kelulusan_kemahiran = $val_kelulusan_kemahiran->id == $kelulusan ? "selected=\"selected\"" : "";
										?>
										<option value="<?php echo $val_kelulusan_kemahiran->id; ?>" <?php echo $sel_kelulusan_kemahiran; ?>><?php echo $val_kelulusan_kemahiran->keterangan; ?></option>
										<?php
									}
								}
								?>
							</select>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<label for="bp_matlamat_selepas_kursus">Matlamat Selepas Mengikuti Latihan Di Giatmara <span class="text-danger">*</span></label><br/>
							<?php
							$arr_matlamat["Melanjutkan Pelajaran Dalam Bidang Kemahiran"] = "Melanjutkan Pelajaran Dalam Bidang Kemahiran";
							$arr_matlamat["Bekerja"] = "Bekerja";
							$arr_matlamat["Berniaga Sendiri"] = "Berniaga Sendiri";

							foreach ($arr_matlamat as $key_mat => $val_mat)
							{
								$sel_mat = $key_mat == $matlamat ? "checked=\"checked\"" : "";
								?>
								<div class="row">
									<div class="col-md-12">
										<label class="form-check-label">
											<input type="radio" class="form-check-input" name="bp_matlamat_selepas_kursus" id="bp_matlamat_selepas_kursus" value="<?php echo $key_mat; ?>" <?php echo $sel_mat; ?>>
											<?php echo $val_mat; ?>
										</label>&nbsp;&nbsp;
									</div>
								</div>
								<?php
							}
							?>
							<span id="bp_matlamat_selepas_kursus-error" style="color:red"></span>
						</div>
						<div class="col-md-6">
							<label for="bp_kategori_pemohon">Kategori Pemohon <span class="text-danger">*</span></label>
							<select class="form-control" name="bp_kategori_pemohon" id="bp_kategori_pemohon">
								<option value="">Pilih Kategori Pemohon</option>
								<?php
								if ( ! empty($res_kategori_pemohon))
								{
									foreach ($res_kategori_pemohon as $val_kp)
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
						<div class="col-md-12" style="margin-top: 10px;">
       <div class="loading_mam4"></div>
								<input class="btn btn-primary pull-right" style="margin-left:10px" type="button" name="next" id="next" value="Simpan &amp; Seterusnya" >
								<!--
								<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#id01">Simpan &amp; Hantar</button>
							-->
						</div>
					</div>
				</div>
				</form>

			<!-- MODAL -->

			<div id="id01" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
			  	<div class="modal-content">
							<div class="modal-header">
							<h3 class="modal-title" id="exampleModalLabel" style="float: left">Simpan Hantar Butir Peribadi</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
			    </div>
			    <div class="modal-body">
			      <br/>
			      <p>Butir Peribadi yang telah diisi akan disimpan, namun anda perlu melengkapkan keseluruhan borang permohonan ini sebelum tarikh tamat permohonan iaitu [dd/mm/yyyy fetch from setting_tarikh_permohonan.enddate where year=date(Y)].</p>
			      <p>Satu notifikasi emel akan dihantar ke <span class="badge badge-info" id="str_emel1"></span> berserta nombor rujukan permohonan. Nombor rujukan permohonan ini akan digunakan untuk mengemaskini borang permohonan dan menyemak status permohonan kelak.</p>
			      <p>Adakah anda boleh log masuk emel <span class="badge badge-info" id="str_emel2"></span>? Jika ya, anda boleh menyimpan borang permohonan ini dan mengemaskininya kemudian. klik 'OK' untuk menyimpan borang</p>
			      <p>Jika tidak, klik 'Kembali' untuk mengemaskini borang permohonan.</p>
			      <p>
				      <label class="form-check-label">
				          <input type="checkbox" id="chk_agree" class="form-check-input"> I Agree
				      <span class="text-danger">*</span></label>
			      </p>
			    </div>
			    <div class="modal-footer">
			        <button type="button" name="btn_simpan" value="simpan_hantar" class="btn btn-primary" id="btn_ok">OK</button>
											<button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">Kembali</span>
											</button>
			    </div>
			  </div>
			</div>
		</div>


<script type="text/javascript">
$( document ).ready( function () {
	// show or hide option kelulusan
	$("#bp_kategori_kelulusan_k").click(function(){
		//$("#bp_kelulusan").hide();
	});
	$("#bp_kategori_kelulusan_a").click(function(){
		//$("#bp_kelulusan").show();
	});

	<?php if($kategori_kelulusan == "Akademi" || $kategori_kelulusan == "Akademik"){ ?>
	//$("#bp_kelulusan").show();
	<?php }else{ 	?>
	//$("#bp_kelulusan").hide();
	<?php } ?>

	// datepicker
	$('#bp_tarikh_lahir').datepicker({
		dateFormat: "dd-mm-yy",
		changeMonth: true,
		changeYear: true,
		autoclose: true,
		yearRange: "-50:+0"
	});

	// menghhitung umur
	$("#bp_tarikh_lahir").change(function(){
		var t = $("#bp_tarikh_lahir").val();
		var n = t.substring(6,10);
		var now = "<?php echo date("Y"); ?>";
		var umur = now-n;
		$("#bp_umur").val(umur);
	});

	// ngisi field bandar dan negeri
	// deprecated by zulyantara date 2018-05-13
	/*
	$("#bp_poskod").blur(function(){
		var poskodKet = $("#bp_poskod").val();
		$.ajax({
			dataType: 'json',
			data: {poskod_ket : poskodKet},
			url: "<?php echo site_url("admin/pelatih_lanjutan/ajax_poskod"); ?>",
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
	*/

	// disable button OK di modal
	$("#btn_ok").attr("disabled", true);

	// jika check list I Agree checked maka enabled button OK
	$("#chk_agree").click(function(){
			$("#btn_ok").attr("disabled", !this.checked)
	});

	// tombol simpan hantar diklik, kirim email
	$("#btn_ok").click(function(event){
		event.preventDefault();

		$.ajax({
			data: $("#form-bp").serialize(),
			url: "<?php echo site_url("admin/pelatih_lanjutan/simpan_bp"); ?>",
			type: "POST",
			dataType: 'json',
			success: function(data){
				console.log(data);
				if (data.mykad != null) {
					$('#id01').modal('toggle');
					$('#my-tab a[href="#tab_5"]').tab("show");
				} else {
					$('#id01').modal('toggle');
					$('#my-tab a[href="#tab_4"]').tab("show");
				}
			}
		})
	});

	// tombol simpan seterusnya diklik
	$("#next").click(function(event){
		if ($("#form-bp").valid()) {
			event.preventDefault();

			$.ajax({
				data: $("#form-bp").serialize(),
				url: "<?php echo site_url("admin/pelatih_lanjutan/simpan_bp/email/0"); ?>",
				type: "POST",
				dataType: 'json',
				success: function(data){
					// console.log(data);
					if (data.mykad != null) {
						$('#my-tab a[href="#tab_1"]').tab("show");
					} else {
						$('#my-tab a[href="#tab_2"]').tab("show");
						$("#li_tab_2").removeClass("disabledTab");
					}
				}
			})
		}
	});
});
</script>
