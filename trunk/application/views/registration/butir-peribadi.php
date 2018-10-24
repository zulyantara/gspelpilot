<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#echo "<pre>";print_r($row_data);echo "</pre>";
if (@$row_data[row_pbp])
{
	@$idBp = $row_data[row_pbp]->id;
	@$nama_penuh =$row_data[row_pbp]->nama_penuh;
	@$no_mykad =$row_data[row_pbp]->no_mykad;
	$dt_tarikh_lahir = new DateTime($row_data[row_pbp]->tarikh_lahir);
	@$tarikh_lahir = $dt_tarikh_lahir->format("d-m-Y");
	@$kewarganegaraan =$row_data[row_pbp]->kewarganegaraan;
	@$umur =$row_data[row_pbp]->umur;
	@$no_telefon =$row_data[row_pbp]->no_telefon;
	@$no_hp =$row_data[row_pbp]->no_hp;
	@$alamat =$row_data[row_pbp]->alamat;
	@$cek_poskod =$row_data[cek_poskod];
	@$poskod =$row_data[row_pbp]->poskod;
	@$cek_bandar =$row_data[bandar_poskod];
	@$negeri = $row_data[id_negeri_poskod];
	@$negara = $row_data["negara"];
	@$emel =$row_data[row_pbp]->emel;
	@$jantina = $row_data[row_pbp]->jantina;
	@$bangsa =$row_data[row_pbp]->bangsa;
	@$etnik =$row_data[row_pbp]->etnik;
	@$agama =$row_data[row_pbp]->agama;
	@$taraf_perkahwinan =$row_data[row_pbp]->taraf_perkahwinan;
	// @$kategori_kelulusan =$row_data[row_pbp]->kategori_kelulusan;
	@$kelulusan =$row_data[row_pbp]->kelulusan;
	@$kemahiran =$row_data[row_pbp]->kelulusan_kemahiran;
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
	$jantina = "";
	$bangsa = "";
	$etnik = "";
	$agama = "";
	$taraf_perkahwinan = "";
	// $kategori_kelulusan = "";
	$sel1 = "";
	$sel2 = "";
	$kelulusan = "";
	$kemahiran = "";
	$matlamat = "";
	$kategori_pemohon = "";
	$negara = "";
}
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
				minlength: false,
				maxlength: false,
				number: false,
			},
			bp_tarikh_lahir: "required",
			bp_kewarganegaraan: "required",
			bp_umur: "required",
			bp_no_telefon: "required",
			bp_no_hp: "required",
			bp_alamat: "required",
			bp_poskod: "required",
			bp_bandar: "required",
			bp_negeri: "required",
			bp_negera: "required",
			bp_email: "required",
			bp_jantina: "required",
			bp_bangsa: "required",
			bp_etnik: "required",
			bp_agama: "required",
			bp_taraf_perkahwinan: "required",
			bp_kelulusan: "required",
			bp_kelulusanK: "required",
			bp_matlamat_selepas_kursus: "required",
			bp_kategori_pemohon: "required",
		},
		messages: {
			bp_nama_penuh: "Sila isikan ruangan ini",
			bp_no_mykad: {
				required: "Sila isikan ruangan ini",
				//minlength: "No. MyKAD diperlukan dan Min 12 digit nombor.",
				//maxlength: "No. MyKAD diperlukan dan Max 12 digit nombor.",
				//number: "No. MyKAD harap diisi nombor sahaja.",
			},
			bp_tarikh_lahir: "Sila isikan ruangan ini",
			bp_kewarganegaraan: "Sila isikan ruangan ini",
			bp_umur: "Sila isikan ruangan ini",
			bp_no_telefon: "Sila isikan ruangan ini",
			bp_no_hp: "Sila isikan ruangan ini",
			bp_alamat: "Sila isikan ruangan ini",
			bp_poskod: "Sila isikan ruangan ini",
			bp_bandar: "Sila isikan ruangan ini",
			bp_negeri: "Sila iskan ruangan ini",
			bp_negera: "Sila iskan ruangan ini",
			bp_email: {
				required: "Sila isikan ruangan ini",
				email: "Sila isikan emel yang betul",
			},
			bp_jantina: "Sila isikan ruangan ini",
			bp_bangsa: "Sila isikan ruangan ini",
			bp_etnik: "Sila isikan ruangan ini",
			bp_agama: "Sila isikan ruangan ini",
			bp_taraf_perkahwinan: "Sila isikan ruangan ini",
			bp_kelulusan: "Sila isikan ruangan ini",
			bp_kelulusanK: "Sila isikan ruangan ini",
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
			document.getElementById('id01').style.display='block'
		}
	});
});
</script>

<div class="container">

	<?php
	$data_h['id_pbp'] = $idBp;
	$this->load->view('registration/header', $data_h);
	?>

  <div class="row mt-2">
    <div class="col-md-12">
			<div class="w3-container" style="clear:both;border:1px #EEE solid;padding:20px; position:relative;">
				<?php
				#echo "<pre>";print_r($row_data['ref_year']);echo "</pre>";
				?>
				<form name="form-bp" id="form-bp" method="post">
				<div class="w3-container w3-blue">
					<h4>BUTIR-BUTIR PERIBADI</h4>
				</div>

				<br/>
				<div>
					<div class="w3-row">
						<div class="w3-col s6">
							<label for="bp_nama_penuh">Nama Penuh <span class="text-danger">*</span></label>
							<input type="hidden" name="idBp" id="idBp" value="<?php echo $idBp; ?>">
							<input type="text" class="form-control" name="bp_nama_penuh" id="bp_nama_penuh" placeholder="Nama Penuh" value="<?php echo $nama_penuh; ?>"  style="width:95%; text-transform:uppercase">
							<span id="bp_nama_penuh-error" style="color:red"></span>
						</div>
						<div class="w3-col s6">
							<label for="bp_jantina">Jantina <spanclass="text-danger">*</span></label>
							<select class="form-control" name="bp_jantina" id="bp_jantina">
								<option value="">SILA PILIH</option>
								<?php
								$arr_jantina = array("1" => "Lelaki", "2" => "Perempuan");
								foreach ($arr_jantina as $kj => $vj)
								{
									$sel_jantina = $kj == $jantina ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $kj; ?>" <?php echo $sel_jantina; ?>><?php echo strtoupper($vj); ?></option>
									<?php
								}
								?>
							</select>
							<span id="bp_jantina-error" style="color:red"></span>
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-col s6">
							<label for="bp_no_mykad">Jenis ID Pengenalan <span class="text-danger">*</span></label>
							<?php
							if ($row_data["no_mykad"]!="") $val_mykad = $row_data["no_mykad"];
							else $val_mykad = $no_mykad;
							?>
							<input readonly="readonly" type="text" class="form-control" style="width:95%" name="bp_no_mykad" id="bp_no_mykad" placeholder="No. MyKAD" value="<?php echo urldecode($val_mykad); ?>">
							<span id="bp_no_mykad-error" style="color:red"></span>
						</div>
						<div class="w3-col s6">
							<label for="bp_tarikh_lahir">Tarikh Lahir<span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="bp_tarikh_lahir" id="bp_tarikh_lahir" placeholder="TARIKH LAHIR" value="<?php echo $tarikh_lahir; ?>">
							<span id="bp_tarikh_lahir-error" style="color:red"></span>
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-col s6">
							<label for="bp_kewarganegaraan">Kewarganegaraan <span class="text-danger">*</span></label>
							<select class="form-control" name="bp_kewarganegaraan" id="bp_kewarganegaraan" style="width:95%">
								<option value="">PILIH KEWARGANEGARAAN</option>
								<?php
								if ( ! empty($row_data[res_kewarganegaraan]))
								{
									foreach ($row_data[res_kewarganegaraan] as $val_kwrg)
									{
										$sel_kwrg = $val_kwrg->id == $kewarganegaraan ? "selected=\"selected\"" : "";
										?>
										<option value="<?php echo $val_kwrg->id; ?>" <?php echo $sel_kwrg; ?>><?php echo strtoupper($val_kwrg->kewarganegaraan); ?></option>
										<?php
									}
								}
								?>
							</select>
							<span id="bp_kewarganegaraan-error" style="color:red"></span>
						</div>
						<div class="w3-col s6">
							<label for="bp_umur">Umur<span class="text-danger">*</span></label>
			                <input type="text" class="form-control" name="bp_umur" id="bp_umur" placeholder="UMUR" value="<?php echo $umur; ?>">
							<span id="bp_umur-error" style="color:red"></span>
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-col s6">
							<label for="bp_no_telefon">No Tel Yang Boleh Dihubungi (cth: 0389008989) <span class="text-danger">*</span></label>
							<input type="text" class="form-control" style="width:95%" name="bp_no_telefon" id="bp_no_telefon" placeholder="NO TELEFON" value="<?php echo $no_telefon; ?>">
							<span id="bp_no_telefon-error" style="color:red"></span>
						</div>
						<!-- <div class="w3-col s6">
							<label for="bp_no_hp">No Telefon Bimbit (cth: 01289009090) <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="bp_no_hp" id="bp_no_hp" placeholder="No HP" value="<?php echo $no_hp; ?>">
							<span id="bp_no_hp-error" style="color:red"></span>
						</div> -->
						<div class="w3-col s6">
							<label for="bp_email">Emel <span class="text-danger">(Masukkan "-" jika tiada emel)</span></label>
							<input type="text" class="form-control" name="bp_email" id="bp_email" placeholder="EMEL" value="<?php echo $emel; ?>">
							<!--span id="bp_email-error" style="color:red"></span-->
						</div>
					</div>

					<div class="form-group">
						<label for="bp_alamat">Alamat Surat Menyurat <span class="text-danger">*</span></label>
						<textarea style="text-transform: uppercase" name="bp_alamat" id="bp_alamat" rows="2" cols="40" placeholder="ALAMAT SURAT MENYURAT" class="form-control"><?php echo $alamat; ?></textarea>
						<span id="bp_alamat-error" style="color:red"></span>
					</div>

					<div class="w3-row">
						<div class="w3-col s6"><?php $medata = $row_data['row_pbp2'] ;?>
							<label for="bp_poskod">Poskod <span class="text-danger">*</span></label>
							<input type="number" class="form-control" style="width:95%" name="bp_poskod" id="bp_poskod" placeholder="POSKOD" value="<?php echo $medata['poskod_3']; ?>">
							<input type="hidden" name="bp_poskod_id" id="bp_poskod_id" value="<?php echo $poskod; ?>">
							<span id="bp_poskod-error" style="color:red"></span>
						</div>
						<div class="w3-col s6">
							<label for="bp_bandar">Bandar <span class="text-danger">*</span></label>
			        <input type="text" style="text-transform: uppercase" class="form-control" name="bp_bandar" id="bp_bandar" placeholder="BANDAR" value="<?php echo $medata['bandar_3']; ?>">
							<span id="bp_bandar-error" style="color:red"></span>
						</div>
					</div>

					<div class="w3-row">
						<div class="w3-col s6">
							<label for="bp_negeri">Negeri <span class="text-danger">*</span></label>
							<select class="form-control" name="bp_negeri" id="bp_negeri" style="width:95%">
								<option value="">PILIH NEGERI</option>
									<option value="<?php echo $row_data[id_negeri_poskod]; ?>" selected><?php echo $row_data[nama_negeri_poskod]; ?></option>
								<?php
								if ( ! empty($row_data[res_negeri]))
								{
									foreach ($row_data[res_negeri] as $val_negeri)
									{
											$sel_negeri = $medata['negeri_3'] == $val_negeri->nama_negeri ? "selected=\"selected\"": "";
										?>
										<option value="<?php echo $val_negeri->nama_negeri; ?>" <?php echo $sel_negeri; ?>><?php echo strtoupper($val_negeri->nama_negeri); ?></option>
										<?php
									}
								}
								?>
							</select>
							<span id="bp_negeri-error" style="color:red"></span>
						</div>
						<div class="w3-col s6">
							<label for="bp_negara">Negara <span class="text-danger">*</span></label>
							<select class="form-control" name="bp_negara" id="bp_negara" style="width:95%">
								<?php
								if ( ! empty($row_data[res_negara]))
								{
									foreach ($row_data[res_negara] as $val_negara)
									{
										if ($negara == "")
										{
											$sel_negara = $val_negara->kod_negara == "MY" ? "selected=\"selected\"" : "";
										}
										else
										{
											$sel_negara = $val_negara->id == $negara ? "selected=\"selected\"" : "";
										}
										?>
										<option value="<?php echo $val_negara->id; ?>" <?php echo $sel_negara; ?>><?php echo strtoupper($val_negara->nama_negara); ?></option>
										<?php
									}
								}
								?>
							</select>
							<span id="bp_negara-error" style="color:red"></span>
						</div>
					</div>

					<div class="w3-row">
						<div class="w3-col s6">
			               <label for="bp_bangsa">Bangsa <span class="text-danger">*</span></label>
							<select class="form-control" name="bp_bangsa" id="bp_bangsa" style="width:95%">
								<option value="">PILIH BANGSA</option>
								<?php
								if ( ! empty($row_data[res_bangsa]))
								{
									foreach ($row_data[res_bangsa] as $val_bangsa)
									{
										$sel_bangsa = $val_bangsa->id == $bangsa ? "selected=\"selected\"" : "";
										?>
										<option value="<?php echo $val_bangsa->id; ?>" <?php echo $sel_bangsa; ?>><?php echo strtoupper($val_bangsa->bangsa); ?></option>
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
								<option value="">PILIH ETNIK</option>
								<?php
								if ( ! empty($row_data[res_etnik]))
								{
									foreach ($row_data[res_etnik] as $val_etnik)
									{
										$sel_etnik = $val_etnik->id == $etnik ? "selected=\"selected\"": "";
										?>
										<option value="<?php echo $val_etnik->id; ?>" <?php echo $sel_etnik; ?>><?php echo strtoupper($val_etnik->etnik); ?></option>
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
								<option value="">PILIH AGAMA</option>
								<?php
								if ( ! empty($row_data[res_agama]))
								{
												foreach ($row_data[res_agama] as $val_agama)
												{
																$sel_agama = $val_agama->id == $agama ? "selected=\"selected\"" : "";
																?>
																<option value="<?php echo $val_agama->id; ?>" <?php echo $sel_agama; ?>><?php echo strtoupper($val_agama->agama); ?></option>
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
								<option value="">PILIH TARAF PERKAHWINAN</option>
								<?php
								if ( ! empty($row_data[res_taraf_perkahwinan]))
								{
									foreach ($row_data[res_taraf_perkahwinan] as $val_tp)
									{
										$sel_tp = $val_tp->id == $taraf_perkahwinan ? "selected=\"selected\"" : "";
										?>
										<option value="<?php echo $val_tp->id; ?>" <?php echo $sel_tp; ?>><?php echo strtoupper($val_tp->taraf_perkahwinan); ?></option>
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
							<!-- START KELULUSAN AKADEMIK -->
							<label for="bp_kelulusan" id=label_kelulusan>Kelulusan Akademik<span class="text-danger">*</span></label>
							<select class="form-control" name="bp_kelulusan" id="bp_kelulusan" style="width:95%;">
								<option value="">PILIH KELULUSAN AKADEMIK</option>
								<?php
								if ( !empty($row_data[res_kelulusan]))
								{
									foreach ($row_data[res_kelulusan] as $val_kelulusan)
									{
										$sel_kelulusan = $val_kelulusan->id == $kelulusan ? "selected=\"selected\"" : "";
										?>
										<option value="<?php echo $val_kelulusan->id; ?>" <?php echo $sel_kelulusan; ?>><?php echo strtoupper($val_kelulusan->kelulusan); ?></option>
										<?php
									}
								}
								?>
							</select>
							<span id="bp_kelulusan-error" style="color:red"></span>
							<!-- END KELULUSAN AKADEMI -->

							<!-- <label for="bp_kategori_kelulusan">Kategori Kelulusan <span class="text-danger">*</span></label>
							<br/>
							<?php
							if($kategori_kelulusan == "Akademi"){
								$sel1 = " checked='checked'";
							}elseif($kategori_kelulusan == "Kemahiran"){
								$sel2 = " checked='checked'";
							}
							?>
							<fieldset>
								<label class="form-check-label" for="bp_kategori_kelulusan_akademi">
									<input type="radio" class="form-check-input" name="bp_kategori_kelulusan" id="bp_kategori_kelulusan_a" value="Akademi" <?php echo $sel1?>>
									Akademik
								</label>
								<label class="form-check-label" for="bp_kategori_kelulusan_kemahiran">
									<input type="radio" class="form-check-input" name="bp_kategori_kelulusan" id="bp_kategori_kelulusan_k" value="Kemahiran" <?php echo $sel2?>>
									Kemahiran
								</label>
								<span id="bp_kategori_kelulusan-error" class="error" style="color:red"></span>
							</fieldset> -->
						</div>
						<div class="w3-col s6">
							<!-- START KELULUSAN KEMAHIRAN -->
							<label for="bp_kelulusanK" id=label_kelulusanK>Kelulusan Kemahiran<span class="text-danger">*</span></label>
							<select class="form-control" name="bp_kelulusanK" id="bp_kelulusanK">
								<option value="">PILIH KELULUSAN KEMAHIRAN</option>
								<?php
								if ( !empty($row_data[res_kemahiran]))
								{
									foreach ($row_data[res_kemahiran] as $val_kemahiran)
									{
										$sel_kemahiran = $val_kemahiran->id == $kemahiran ? "selected=\"selected\"" : "";
										?>
										<option value="<?php echo $val_kemahiran->id; ?>" <?php echo $sel_kemahiran; ?>><?php echo strtoupper($val_kemahiran->keterangan); ?></option>
										<?php
									}
								}
								?>
							</select>
							<span id="bp_kelulusanK-error" style="color:red"></span>
							<!-- END KELULUSAN KEMAHIRAN -->
						</div>
					</div>

					<div class="w3-row">
						<div class="w3-col s6">
							<label for="bp_matlamat_selepas_kursus">Matlamat Selepas Kursus <span class="text-danger">*</span></label><br/>
							<?php
							$arr_matlamat["Melanjutkan Pelajaran"] = "MELANJUTKAN PELAJARAN DALAM BIDANG KEMAHIRAN";
							$arr_matlamat["Bekerja"] = "BEKERJA";
							$arr_matlamat["Berniaga Sendiri"] = "BERNIAGA SENDIRI";

							foreach ($arr_matlamat as $key_mat => $val_mat)
							{
								$sel_mat = $key_mat == $matlamat ? "checked=\"checked\"" : "";
								?>
								<label class="form-check-label">
									<input type="radio" class="form-check-input" name="bp_matlamat_selepas_kursus" id="bp_matlamat_selepas_kursus" value="<?php echo $key_mat; ?>" <?php echo $sel_mat; ?>>
									<?php echo strtoupper($val_mat); ?>
								</label>&nbsp;&nbsp;<br>
								<?php
							}
							?>
							<span id="bp_matlamat_selepas_kursus-error" style="color:red"></span>
						</div>
						<div class="w3-col s6">
							<label for="bp_kategori_pemohon">Kategori Pemohon <span class="text-danger">*</span></label>
							<select class="form-control" name="bp_kategori_pemohon" id="bp_kategori_pemohon">
								<option value="">PILIH KATEGORI PEMOHON</option>
								<?php
								if ( ! empty($row_data[res_kategori_pemohon]))
								{
									foreach ($row_data[res_kategori_pemohon] as $val_kp)
									{
										$sel_kp = $val_kp->id == $kategori_pemohon ? "selected=\"selected\"" : "";
										?>
										<option value="<?php echo $val_kp->id; ?>" <?php echo $sel_kp; ?>><?php echo strtoupper($val_kp->kategori_pemohon); ?></option>
										<?php
									}
								}
								?>
							</select>
							<span id="bp_kategori_pemohon-error" style="color:red"></span>
						</div>

						<!--input class="btnAction btn btn-primary" type="button" name="back2" id="back2" value="Simpan &amp; Hantar"--> <?php // onclick="document.getElementById('id01').style.display='block'"> ?>
						<input class="btnAction btn btn-primary" type="button" name="next" id="next" value="Simpan &amp; Seterusnya" >

					</div>
				</div>
				</form>
			</div>

			<!-- MODAL -->
			<div id="id01" class="w3-modal">
				<div class="w3-modal-content w3-animate-top w3-card-4">
					<header class="w3-container w3-blue">
						<span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-large w3-blue w3-display-topright">&times;</span>
						<h3>Simpan Maklumat Permohonan</h3>
					</header>
					<div class="w3-container">
						<br/>
						<p>Butir Peribadi yang telah diisi akan disimpan, namun anda perlu melengkapkan keseluruhan borang permohonan ini sebelum tarikh tamat permohonan iaitu <strong><?php $dt = new DateTime($row_data['ref_year']->end_date); echo $dt->format("d-m-Y"); ?></strong>.</p>
						<p><strong>No. Rujukan Permohonan: <span id="text_ic"></span></strong></p>
						<p>Nombor rujukan permohonan ini akan digunakan untuk mengemaskini borang permohonan dan menyemak status permohonan kelak.</p>
						<p>Adakah anda ingin menyimpan permohonan ini? Jika ya, klik 'OK'.</p>
						<p>Jika tidak, klik 'Kembali' untuk mengemaskini borang permohonan.</p>
						<!--
						<p>
							<label class="form-check-label">
								<input type="checkbox" id="chk_agree" class="form-check-input" show="hidden"> I Agree
							<span class="text-danger">*</span></label>
						</p>
						-->
					</div>
					<footer class="w3-container w3-blue w3-display-container">
						<br/>
						<button type="submit" name="btn_simpan" value="simpan_hantar" class="btn btn-primary" id="btn_ok">OK</button>
						<span onclick="document.getElementById('id01').style.display='none'" class="btn btn-primary btn-right">Kembali</span>
						<br/><br/>
					</footer>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$( document ).ready( function () {
	var val_no_mykad = $("#bp_no_mykad").val();
	$("#text_ic").html(val_no_mykad);

	// DEPRECATED 16 Oct 2017
	// show or hide option kelulusan
	// $("#bp_kategori_kelulusan_k").click(function(){
	// 	$("#bp_kelulusan").hide();
	// 	$("#label_kelulusan").hide();
	// });
	// $("#bp_kategori_kelulusan_a").click(function(){
	// 	$("#bp_kelulusan").show();
	// 	$("#label_kelulusan").show();
	// });

	// <?php if($kategori_kelulusan == "Akademi"){ ?>
	// $("#bp_kelulusan").show();
	// $("#label_kelulusan").show();
	// <?php }else{ 	?>
	// $("#bp_kelulusan").hide();
	// $("#label_kelulusan").hide();
	// <?php } ?>

	// datepicker
	$('#bp_tarikh_lahir').datepicker({
		dateFormat: "dd-mm-yy",
		changeMonth: true,
		changeYear: true,
		autoclose: true,
		yearRange: "-100:+0"
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
	$("#bp_poskod").blur(function(){
		var poskodKet = $("#bp_poskod").val();

		$.ajax({
			dataType: 'json',
			data: {poskod_ket : poskodKet},
			url: "<?php echo site_url("registration/ajax_poskod"); ?>",
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
					$("#bp_poskod-error").html(" ");
					//$("#bp_poskod").val("");
					//$("#bp_poskod").focus();
				}
			}
		});
	});

	
// disable button OK di modal
	// $("#btn_ok").attr("disabled", true);

	// jika check list I Agree checked maka enabled button OK
	// $("#chk_agree").click(function(){
	// 		$("#btn_ok").attr("disabled", !this.checked)
	// });

	// tombol simpan hantar diklik, kirim email
	$("#btn_ok").click(function(event){
		event.preventDefault();

		$.ajax({
			data: $("#form-bp").serialize(),
			url: "<?php echo site_url("registration/simpan_bp"); ?>",
			type: "POST",
			dataType: 'json',
			success: function(data){
				// console.log(data);
				if (data.mykad != null) {
					var loc = "<?php echo site_url('registration/butirperibadi/mykad/'); ?>";
					window.location = loc + data.mykad;
				} else {
					// var loc = "<?php echo site_url('registration/butirperibadi'); ?>";
					// window.location = loc;
					var loc = "<?php echo site_url("utama"); ?>";
					window.location = loc;
				}
			}
		})
	});

	// tombol simpan seterusnya diklik
	$("#next").click(function(event){
		if ($("#form-bp").valid()) {
			event.preventDefault();
			ct=document.title;
			document.title = "Loading...";// :-) proudly present by ridei.karim@gmail.com
			window.status ="Loading .. please wait";//to tell the user what's going on
			cbtx = $("#next").val();
			$("#next").val("Loading...");
			$("#next").disabled="true";
			$.ajax({
				data: $("#form-bp").serialize(),
				url: "<?php echo site_url("registration/simpan_bp/email/0"); ?>",
				type: "POST",
				dataType: 'json',
				success: function(data){
					/* 
					aku melihat kucing
					aku melihat wajahmu
					lalu aku bertanya2
					adakah dia diciptakan juga untuk bertasbih kepada Mu?
					lalu aku tersenyum
					
					somewhere, 13-Mei 2018, 0315am
					
					console.log(data);
					if (data.mykad != null) {
						var loc = "<?php echo site_url('registration/maklumat/mykad/'); ?>";
						window.location = loc + data.mykad;
					} else {
						var loc = "<?php echo site_url('registration/butirperibadi'); ?>";
						window.location = loc;
					}
					*/

						var loc = "<?php echo site_url('registration/maklumat/mykad/'); ?>";
						window.location = loc + "<?php echo $val_mykad ?>";

				},
				error: function(returnval) {
					alert('an error occur during save your data');
					$("#next").val(cbtx);
					$("#next").disabled="false";
				}
			})
		}
	});
});
</script>

