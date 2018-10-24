<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//echo "<pre>";print_r($row_mp);echo "</pre>";
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
	$("#form-mp").validate({
		rules: {
			maklumat: "required",
			// Penjaga
			a_nama_penuh: {required:	function(element){ return $("#maklumat").val()=="2";},},
			a_hubungan: {required:	function(element){ return $("#maklumat").val()=="2";},},
			a_jenis_pengenalan: {required: function(element){ return $("#maklumat").val()=="2"; },},
			a_mykad: {
				required:	function(element){ return $("#maklumat").val()=="2"; },
				minlength: 12,
				maxlength: 12,
				number: true,
			},
			a_kewarganegaraan: {required:	function(element){ return $("#maklumat").val()=="2"; },},
			a_kategori_penjaga: {required: function(element){ return $("#maklumat").val()=="2"; },},
			a_no_tel: {required: function(element){ return $("#maklumat").val()=="2"; },},
			a_no_hp: {required:	function(element){ return $("#maklumat").val()=="2"; },},
			a_agama: {required:	function(element){ return $("#maklumat").val()=="2"; },},
			a_etnik: {required:	function(element){ return $("#maklumat").val()=="2"; },},
			a_bangsa: {required:	function(element){ return $("#maklumat").val()=="2"; },},
			a_alamat: {required:	function(element){ return $("#maklumat").val()=="2"; },},
			a_poskod: {required:	function(element){ return $("#maklumat").val()=="2"; },},
			a_bandar: {required:	function(element){ return $("#maklumat").val()=="2"; },},
			a_negeri: {required:	function(element){ return $("#maklumat").val()=="2"; },},
			a_pekerjaan: {required:	function(element){ return $("#maklumat").val()=="2"; },},
			// a_majikan: {required:	function(element){ return $("#maklumat").val()=="2"; },},
			// a_no_tel_pejabat: {required:	function(element){ return $("#maklumat").val()=="2"; },},
			// a_samb: {required:	function(element){ return $("#maklumat").val()=="2"; },},
			// a_alamat_pejabat: {required:	function(element){ return $("#maklumat").val()=="2"; },},
			// a_pendapatan: {required:	function(element){ return $("#maklumat").val()=="2"; },},

			// Ibubapa
			b_nama_penuh: {required:	function(element){ return $("#maklumat").val()=="1";},},
			b_jenis_pengenalan: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			b_mykad: {
				required:	function(element){ return $("#maklumat").val()=="1"; },
				minlength: 12,
				maxlength: 12,
				number: true,
			},
			b_kewarganegaraan: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			b_kategori_penjaga: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			b_no_tel: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			b_no_hp: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			b_agama: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			b_etnik: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			b_bangsa: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			b_alamat: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			b_poskod: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			b_bandar: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			b_negeri: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			b_pekerjaan: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			b_majikan: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			b_no_tel_pejabat: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			// b_samb: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			b_alamat_pejabat: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			b_pendapatan: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			c_nama_penuh: {required:	function(element){ return $("#maklumat").val()=="1";},},
			c_jenis_pengenalan: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			c_mykad: {
				required:	function(element){ return $("#maklumat").val()=="1"; },
				minlength: 12,
				maxlength: 12,
				number: true,
			},
			c_kewarganegaraan: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			c_kategori_penjaga: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			c_no_tel: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			c_no_hp: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			c_agama: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			c_etnik: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			c_bangsa: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			c_alamat: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			c_poskod: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			c_bandar: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			c_negeri: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			c_pekerjaan: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			c_majikan: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			c_no_tel_pejabat: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			// c_samb: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			c_alamat_pejabat: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			c_pendapatan: {required:	function(element){ return $("#maklumat").val()=="1"; },},
		},
		messages: {
			maklumat: "Sila isikan ruangan ini",
			// Penjaga
			a_nama_penuh: "Sila isikan ruangan ini",
			a_hubungan: "Sila isikan ruangan ini",
			a_jenis_pengenalan: "Sila isikan ruangan ini",
			a_mykad: {
				required: "Sila isikan ruangan ini",
				minlength: "No. MyKAD diperlukan dan Min 12 digit nombor.",
				maxlength: "No. MyKAD diperlukan dan Max 12 digit nombor.",
				number: "No. MyKAD harap diisi nombor sahaja.",
			},
			a_kewarganegaraan: "Sila isikan ruangan ini",
			a_kategori_penjaga: "Sila isikan ruangan ini",
			a_no_tel: "Sila isikan ruangan ini",
			a_no_hp: "Sila isikan ruangan ini",
			a_agama: "Sila isikan ruangan ini",
			a_etnik: "Sila isikan ruangan ini",
			a_bangsa: "Sila isikan ruangan ini",
			a_alamat: "Sila isikan ruangan ini",
			a_poskod: "Sila isikan ruangan ini",
			a_bandar: "Sila isikan ruangan ini",
			a_negeri: "Sila isikan ruangan ini",
			a_pekerjaan: "Sila isikan ruangan ini",
			// a_majikan: "Sila isikan ruangan ini",
			// a_no_tel_pejabat: "Sila isikan ruangan ini",
			// a_samb: "Sila isikan ruangan ini",
			// a_alamat_pejabat: "Sila isikan ruangan ini",
			// a_pendapatan: "Sila isikan ruangan ini",

			// Ibubapa
			b_nama_penuh: "Sila isikan ruangan ini",
			b_jenis_pengenalan: "Sila isikan ruangan ini",
			b_mykad: {
				required: "Sila isikan ruangan ini",
				minlength: "No. MyKAD diperlukan dan Min 12 digit nombor.",
				maxlength: "No. MyKAD diperlukan dan Max 12 digit nombor.",
				number: "No. MyKAD harap diisi nombor sahaja.",
			},
			b_kewarganegaraan: "Sila isikan ruangan ini",
			b_kategori_penjaga: "Sila isikan ruangan ini",
			b_no_tel: "Sila isikan ruangan ini",
			b_no_hp: "Sila isikan ruangan ini",
			b_agama: "Sila isikan ruangan ini",
			b_etnik: "Sila isikan ruangan ini",
			b_bangsa: "Sila isikan ruangan ini",
			b_alamat: "Sila isikan ruangan ini",
			b_poskod: "Sila isikan ruangan ini",
			b_bandar: "Sila isikan ruangan ini",
			b_negeri: "Sila isikan ruangan ini",
			b_pekerjaan: "Sila isikan ruangan ini",
			b_majikan: "Sila isikan ruangan ini",
			b_no_tel_pejabat: "Sila isikan ruangan ini",
			// b_samb: "Sila isikan ruangan ini",
			b_alamat_pejabat: "Sila isikan ruangan ini",
			b_pendapatan: "Sila isikan ruangan ini",
			c_nama_penuh: "Sila isikan ruangan ini",
			c_jenis_pengenalan: "Sila isikan ruangan ini",
			c_mykad: {
				required: "Sila isikan ruangan ini",
				minlength: "No. MyKAD diperlukan dan Min 12 digit nombor.",
				maxlength: "No. MyKAD diperlukan dan Max 12 digit nombor.",
				number: "No. MyKAD harap diisi nombor sahaja.",
			},
			c_kewarganegaraan: "Sila isikan ruangan ini",
			c_kategori_penjaga: "Sila isikan ruangan ini",
			c_no_tel: "Sila isikan ruangan ini",
			c_no_hp: "Sila isikan ruangan ini",
			c_agama: "Sila isikan ruangan ini",
			c_etnik: "Sila isikan ruangan ini",
			c_bangsa: "Sila isikan ruangan ini",
			c_alamat: "Sila isikan ruangan ini",
			c_poskod: "Sila isikan ruangan ini",
			c_bandar: "Sila isikan ruangan ini",
			c_negeri: "Sila isikan ruangan ini",
			c_pekerjaan: "Sila isikan ruangan ini",
			c_majikan: "Sila isikan ruangan ini",
			c_no_tel_pejabat: "Sila isikan ruangan ini",
			// c_samb: "Sila isikan ruangan ini",
			c_alamat_pejabat: "Sila isikan ruangan ini",
			c_pendapatan: "Sila isikan ruangan ini",
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

	$("#next2").click(function(event){
		if ($("#form-mp").valid()) {
			event.preventDefault();

			$.ajax({
				data: $("#form-mp").serialize(),
				url: "<?php echo site_url("admin/pelatih_lanjutan/simpan_mp"); ?>",
				type: "POST",
				dataType: 'json',
				success: function(data){
					console.log(data);
					if (data.mykad != null) {
						$('#my-tab a[href="#tab_5"]').tab("show");
					} else {
						$('#my-tab a[href="#tab_6"]').tab("show");
						$("#li_tab_6").removeClass("disabledTab");
					}
				}
			})
		}
	});
});
</script>

<div class="box-body">
		<?php
		$data_h['id_pbp'] = $row_data['idBp'];
		?>
  <div class="row mt-2">
    <div class="col-md-12">
			<div class="w3-container" style="clear:both;border:1px #EEE solid;padding:20px; position:relative;">
				<form name="form-mp" id="form-mp" method="post">
				<input type="hidden" name="idBp" id="idBp" value="<?php echo $row_data['idBp']; ?>">
				<input type="hidden" name="id" id="id" value="<?php echo $row_data['id']; ?>">
				<input type="hidden" name="no_mykad" id="no_mykad" value="<?php echo $no_mykad; ?>">
				<input type="hidden" name="idBpLast" id="idBpLast" value="<?php echo $idBpLast?>">
			 	<div class="form-group">
						<?php
							if($row_mp->maklumat == 1){
										$sel_maklumat1 = "selected";
										$sel_maklumat2 ="";
							}elseif($row_mp->maklumat == 2){
									$sel_maklumat1 ="";
									$sel_maklumat2 = "selected";
							}
						?>
					<label for="maklumat">Maklumat <span class="text-danger">*</span></label>
					<select class="form-control" name="maklumat" id="maklumat" required="required">
						<option value="">Sila Pilih</option>
						<option value="1" <?php echo $sel_maklumat1?>>Ibu bapa</option>
						<option value="2" <?php echo $sel_maklumat2?>>Ibu atau Bapa Sahaja/Penjaga/Waris/Penaja</option>
					</select>
					<label id="maklumat-error" style="color:red"></span>
				</div>


				<!-- Kontainer Ibubapa -->
				<div class="w3-container w3-light-gray" id="ibubapacontainer" style="display:none">
					<br/>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="nama_penuh">Nama Penuh Bapa <span class="text-danger">*</span></label>
								<input type="text" class="form-control text-uppercase" name="b_nama_penuh" id="b_nama_penuh" placeholder="Nama Penuh Bapa" value="<?php echo $row_mp->b_nama_penuh;?>" required="required">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Jenis ID Pengenalan <span class="text-danger">*</span></label>
								<?php
									if($row_mp->b_jenis_pengenalan =='MyKAD'){
										$cheked_pengenalan1 = "checked='checked'";
                                    }elseif($row_mp->b_jenis_pengenalan =='Passport'){
										$cheked_pengenalan2 = "checked='checked'";
									}elseif($row_mp->b_jenis_pengenalan =='Tentera'){
										$cheked_pengenalan3 = "checked='checked'";
									}elseif($row_mp->b_jenis_pengenalan =='Polis'){
										$cheked_pengenalan4 = "checked='checked'";
									}else{
										$cheked_pengenalan1 = "checked='checked'";
									}
								?>
								<div class="form-check">
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="b_jenis_pengenalan" id="b_jenis_pengenalan_a" value="MyKAD" <?php echo $cheked_pengenalan1?>>
										MyKAD
									</label>&nbsp;&nbsp;
                                    <label class="form-check-label">
										<input type="radio" class="form-check-input" name="b_jenis_pengenalan" id="b_jenis_pengenalan_a" value="Passport" <?php echo $cheked_pengenalan2?>>
										Passport
									</label>&nbsp;&nbsp;
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="b_jenis_pengenalan" id="b_jenis_pengenalan_t" value="Tentera" <?php echo $cheked_pengenalan3?>>
										Tentera
									</label>
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="b_jenis_pengenalan" id="b_jenis_pengenalan_p" value="Polis" <?php echo $cheked_pengenalan4?>>
										Polis
									</label>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label id="no_mykad">No. MyKAD <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="b_mykad" id="b_mykad" placeholder="No MyKAD" value="<?php echo $row_mp->b_mykad;?>" required>
								<span id="b_mykad-error" class="registration-error"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="kewarganegaraan">Kewarganegaraan <span class="text-danger">*</span></label>
								<select class="form-control" name="b_kewarganegaraan" id="b_kewarganegaraan" style="width:95%" required>
									<option value="">Pilih Kewarganegaraan</option>
									<<?php
								if ( ! empty($res_kewarganegaraan))
								{
									foreach ($res_kewarganegaraan as $val_kwrg)
									{
										$sel_kwrg = $val_kwrg->id == $row_mp->b_kewarganegaraan ? "selected=\"selected\"" : "";
										?>
										<option value="<?php echo $val_kwrg->id; ?>" <?php echo $sel_kwrg; ?>><?php echo $val_kwrg->kewarganegaraan; ?></option>
										<?php
									}
								}
								?>
								</select>
							</div>
						</div>
						<!--
						<div class="col-md-6">
							<div class="form-group">
								<label for="b_kategori_penjaga">Kategori Penjaga <span class="text-danger">*</span></label>
								<select class="form-control" name="b_kategori_penjaga" id="b_kategori_penjaga" required>
									<option value="">Pilih Kategori Penjaga</option>
									<?php
									if (!empty($ref_kategori_penjaga)) {
										foreach ($ref_kategori_penjaga as $val_kwrg) {
											$sel_kwrg = $val_kwrg->id == $row_mp->b_kategori_penjaga ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_kwrg->id; ?>" <?php echo $sel_kwrg; ?>><?php echo $val_kwrg->kategori_penjaga; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>-->

                        <div class="col-md-6">
							<div class="form-group">
								<label for="no_telefon">No Telefon Yang Boleh Dihubungi (cth: 0389008989) <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="b_no_tel" id="b_no_tel" placeholder="No Telefon" value="<?php echo $row_mp->b_no_tel?>" style="width:95%">
							</div>
						</div>

					</div>
					<!--
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="no_telefon">No Telefon (cth: 0389008989) <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="b_no_tel" id="b_no_tel" placeholder="No Telefon" value="<?php $row_mp->b_no_tel?>" style="width:95%">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="no_hp">No Telefon Bimbit (cth: 01289009090) <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="b_no_hp" id="b_no_hp" placeholder="No Telefon Bimbit" value="<?php $row_mp->b_no_hp?>">
							</div>
						</div>
					</div>
					-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="agama">Agama <span class="text-danger">*</span></label>
								<select class="form-control" name="b_agama" id="b_agama" style="width:95%">
									<option value="">Pilih agama</option>
									<?php
									if (!empty($res_agama)) {
										foreach ($res_agama as $val_agama) {
											$sel_agama = $val_agama->id == $row_mp->b_agama ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_agama->id; ?>" <?php echo $sel_agama; ?>><?php echo $val_agama->agama; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="etnik">Etnik <span class="text-danger">*</span></label>
								<select class="form-control" name="b_etnik" id="b_etnik">
									<option value="">Pilih Etnik</option>
									<?php
									if (!empty($res_etnik)) {
									foreach ($res_etnik as $val_etnik) {
										$sel_etnik = $val_etnik->id == $row_mp->b_etnik ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_etnik->id; ?>" <?php echo $sel_etnik; ?>><?php echo $val_etnik->etnik; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="bangsa">Bangsa <span class="text-danger">*</span></label>
								<select class="form-control" name="b_bangsa" id="b_bangsa" style="width:95%">
									<option value="">Pilih Bangsa</option>
									<?php
									if (!empty($res_bangsa)) {
										foreach ($res_bangsa as $val_bangsa) {
											$sel_bangsa = $val_bangsa->id == $row_mp->b_bangsa ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_bangsa->id; ?>" <?php echo $sel_bangsa; ?>><?php echo $val_bangsa->bangsa; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="b_alamat">Alamat Tetap <span class="text-danger">*</span></label>
						<textarea name="b_alamat" id="b_alamat" rows="3" cols="40" placeholder="Alamat Tetap" class="form-control text-uppercase"><?php echo $row_mp->b_alamat;?></textarea>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="b_poskod">Poskod <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="b_poskod" id="b_poskod" placeholder="Poskod" style="width:95%" value="<?php echo $cek_poskod_b?>">
								<input type="hidden" name="b_poskod_id" id="b_poskod_id" value="<?php echo $id_poskod_b?>">
								<span id="b_poskod-error" style="color:red"></span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="b_bandar">Bandar <span class="text-danger">*</span></label>
								<input type="text" class="form-control text-uppercase" name="b_bandar" id="b_bandar" placeholder="Bandar" value="<?php echo $bandar_poskod_b?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="b_negeri">Negeri <span class="text-danger">*</span></label>
								<select class="form-control" name="b_negeri" id="b_negeri" style="width:95%">
									<option value="">Pilih Negeri</option>
									<?php
									if (!empty($res_negeri)) {
										foreach ($res_negeri as $val_negeri) {
											$sel_negeri = $val_negeri->nama_negeri == $nama_negeri_b ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_negeri->nama_negeri; ?>" <?php echo $sel_negeri; ?>><?php echo $val_negeri->nama_negeri; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<!--
						<div class="col-md-6">
							<div class="form-group">
								<label for="b_pekerjaan">Pekerjaan <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="b_pekerjaan" id="b_pekerjaan" placeholder="Pekerjaan" value="<?php echo $row_mp->b_pekerjaan;?>" style="width:95%">
							</div>
						</div>
					-->
					<div class="col-md-6">
							<div class="form-group">
								<label for="b_pendapatan">Pekerjaan<span class="text-danger">*</span></label>
								<select class="form-control" name="b_pekerjaan" id="b_pekerjaan" style="width:95%" onchange="pekerjaanDisabled(this.id,this.value)">
									<option value="">Pilih Pekerjaan</option>
									<?php
									if (!empty($res_pekerjaan)) {
										foreach ($res_pekerjaan as $val_pekerjaan) {
											$sel_pekerjaan = $val_pekerjaan->id == $row_mp->b_pekerjaan ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_pekerjaan->id; ?>" <?php echo $sel_pekerjaan; ?>><?php echo $val_pekerjaan->nama_pekerjaan; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="b_pendapatan">Pendapatan (RM) <span class="text-danger">*</span></label>
								<select class="form-control" name="b_pendapatan" id="b_pendapatan">
									<option value="">Pilih Pendapatan</option>
									<?php
									if (!empty($res_pendapatan)) {
										foreach ($res_pendapatan as $val_negeri) {
											$sel_pendapatan = $val_negeri->id == $row_mp->b_pendapatan ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_negeri->id; ?>" <?php echo $sel_pendapatan; ?>><?php echo $val_negeri->pendapatan; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="b_majikan">Majikan <span class="text-danger">*</span></label>
								<input type="text" class="form-control text-uppercase" name="b_majikan" id="b_majikan" placeholder="Majikan" value="<?php echo $row_mp->b_majikan;?>" style="width:95%">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="b_majikan">No Telefon Pejabat <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="b_no_tel_pejabat" id="b_no_tel_pejabat" placeholder="No Telefon Pejabat" value="<?php echo $row_mp->b_no_tel_pejabat;?>" style="width:95%">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="b_majikan">Samb <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="b_samb" id="b_samb" placeholder="Samb" value="<?php echo $row_mp->b_samb;?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="b_alamat_pejabat">Alamat Pejabat <span class="text-danger">*</span></label>
						<textarea name="b_alamat_pejabat" id="b_alamat_pejabat" rows="3" cols="40" placeholder="Alamat Pejabat" class="form-control text-uppercase"><?php echo $row_mp->b_alamat_pejabat;?></textarea>
					</div>

          <div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="b_poskod_majikan">Poskod <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="b_poskod_majikan" id="b_poskod_majikan" placeholder="Poskod" value="<?php echo $row_mp->b_poskod_majikan;?>" style="width: 95%">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="b_bandar_majikan">Bandar <span class="text-danger">*</span></label>
								<input type="text" class="form-control text-uppercase" name="b_bandar_majikan" id="b_bandar_majikan" placeholder="Bandar" value="<?php echo $row_mp->b_bandar_majikan;?>" style="width: 95%">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="b_negeri_majikan">Negeri <span class="text-danger">*</span></label>
                <select class="form-control" name="b_negeri_majikan" id="b_negeri_majikan">
                    <option value="">Sila Pilih</option>
                    <?php
                    if ($res_negeri != NULL)
                    {
                      foreach ($res_negeri as $val_negeri)
                      {
                        ?>
                        <option value="<?php echo $val_negeri->nama_negeri; ?>"><?php echo $val_negeri->nama_negeri; ?></option>
                        <?php
                      }
                    }
                    ?>
                </select>
							</div>
						</div>
          </div>

					<hr/><br/>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="nama_penuh">Nama Penuh Ibu <span class="text-danger">*</span></label>
								<input type="text" class="form-control text-uppercase" name="c_nama_penuh" id="c_nama_penuh" placeholder="Nama Penuh Ibu" value="<?php echo $row_mp->c_nama_penuh;?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Jenis ID Pengenalan <span class="text-danger">*</span></label>
								<div class="form-check">
										<?php
										if($row_mp->c_jenis_pengenalan =='MyKAD'){
											$cheked_pengenalan_c1 = "checked='checked'";
                                        }elseif($row_mp->b_jenis_pengenalan =='Passport'){
											$cheked_pengenalan_c2 = "checked='checked'";
										}elseif($row_mp->b_jenis_pengenalan =='Tentera'){
											$cheked_pengenalan_c3 = "checked='checked'";
										}elseif($row_mp->b_jenis_pengenalan =='Polis'){
											$cheked_pengenalan_c4 = "checked='checked'";
										}else{
											$cheked_pengenalan_c1 = "checked='checked'";
										}
									?>
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="c_jenis_pengenalan" id="c_jenis_pengenalan_a" value="MyKAD" <?php echo $cheked_pengenalan_c1 ?> required>
										MyKAD
									</label>&nbsp;&nbsp;
                                    <label class="form-check-label">
										<input type="radio" class="form-check-input" name="c_jenis_pengenalan" id="c_jenis_pengenalan_a" value="Passport" <?php echo $cheked_pengenalan_c2?>>
										Passport
									</label>&nbsp;&nbsp;
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="c_jenis_pengenalan" id="c_jenis_pengenalan_t" value="Tentera" <?php echo $cheked_pengenalan_c3 ?>>
										Tentera
									</label>
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="c_jenis_pengenalan" id="c_jenis_pengenalan_p" value="Polis" <?php echo $cheked_pengenalan_c4 ?>>
										Polis
									</label>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label id="c_no_mykad">No. MyKAD <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="c_mykad" id="c_mykad" placeholder="No MyKAD" value="<?php echo $row_mp->c_mykad;?>" required>
								<span id="c_mykad-error" class="registration-error"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="kewarganegaraan">Kewarganegaraan <span class="text-danger">*</span></label>
								<select class="form-control" name="c_kewarganegaraan" id="c_kewarganegaraan" style="width:95%">
									<option value="">Pilih Kewarganegaraan</option>
									<?php
									if (!empty($res_kewarganegaraan)) {
										foreach ($res_kewarganegaraan as $val_kwrg) {
											$sel_kwrg = $val_kwrg->id == $row_mp->c_kewarganegaraan ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_kwrg->id; ?>" <?php echo $sel_kwrg; ?>><?php echo $val_kwrg->kewarganegaraan; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
						<!-- <div class="col-md-6">
							<div class="form-group">
								<label for="c_kategori_penjaga">Kategori Penjaga <span class="text-danger">*</span></label>
								<select class="form-control" name="c_kategori_penjaga" id="c_kategori_penjaga">
									<option value="">Pilih Kategori Penjaga</option>
									<?php
									if (!empty($ref_kategori_penjaga)) {
										foreach ($ref_kategori_penjaga as $val_kwrg) {
											$sel_c_kategori_penjaga = $val_kwrg->id == $row_mp->c_kategori_penjaga ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_kwrg->id; ?>" <?php echo $sel_c_kategori_penjaga; ?>><?php echo $val_kwrg->kategori_penjaga; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div> -->

                <div class="col-md-6">
                  <div class="form-group">
                <label for="no_telefon">No Telefon Yang Boleh Dihubungi (cth: 0389008989) <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="c_no_tel" id="c_no_tel" placeholder="No Telefon" value="<?php echo $row_mp->c_no_tel?>" style="width:95%">
              </div>
            </div>

					</div>
					<!-- <div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="no_telefon">No Telefon (cth: 0389008989) <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="c_no_tel" id="c_no_tel" placeholder="No Telefon" value="<?php echo $row_mp->c_no_tel;?>" style="width:95%">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="no_hp">No Telefon Bimbit (cth: 01289009090) <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="c_no_hp" id="c_no_hp" placeholder="No Telefon Bimbit" value="<?php  echo $row_mp->c_no_hp;?>">
							</div>
						</div>
					</div> -->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="agama">Agama <span class="text-danger">*</span></label>
								<select class="form-control" name="c_agama" id="c_agama" style="width:95%">
									<option value="">Pilih agama</option>
									<?php
									if (!empty($res_agama)) {
										foreach ($res_agama as $val_agama) {
											$sel_agama = $val_agama->id == $row_mp->c_agama ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_agama->id; ?>" <?php echo $sel_agama; ?>><?php echo $val_agama->agama; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="etnik">Etnik <span class="text-danger">*</span></label>
								<select class="form-control" name="c_etnik" id="c_etnik">
									<option value="">Pilih Etnik</option>
									<?php
									if (!empty($res_etnik)) {
										foreach ($res_etnik as $val_etnik) {
											$sel_etnik = $val_etnik->id == $row_mp->c_etnik ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_etnik->id; ?>" <?php echo $sel_etnik; ?>><?php echo $val_etnik->etnik; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="bangsa">Bangsa <span class="text-danger">*</span></label>
								<select class="form-control" name="c_bangsa" id="c_bangsa" style="width:95%">
									<option value="">Pilih Bangsa</option>
									<?php
									if (!empty($res_bangsa)) {
										foreach ($res_bangsa as $val_bangsa) {
											$sel_bangsa = $val_bangsa->id == $row_mp->c_bangsa ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_bangsa->id; ?>" <?php echo $sel_bangsa; ?>><?php echo $val_bangsa->bangsa; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="float-left">
							<button type="button" class="btn btn-primary" id="simpan" onclick="copyalamat()">Alamat Seperti Diatas</button>
						</div>
					</div>
					<div class="form-group">
						<label for="c_alamat">Alamat Tetap <span class="text-danger">*</span></label>
						<textarea name="c_alamat" id="c_alamat" rows="3" cols="40" placeholder="Alamat Tetap" class="form-control text-uppercase"><?php echo $row_mp->c_alamat;?></textarea>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="c_poskod">Poskod <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="c_poskod" id="c_poskod" placeholder="Poskod" style="width:95%" value="<?php echo $cek_poskod_c;?>">
								<input type="hidden" name="c_poskod_id" id="c_poskod_id" value="<?php echo $id_poskod_c;?>">
								<span id="c_poskod-error" style="color:red"></span>
							</div>
						</div>
					<div class="col-md-6">
					<div class="form-group">
					<label for="c_bandar">Bandar <span class="text-danger">*</span></label>
					<input type="text" class="form-control text-uppercase" name="c_bandar" id="c_bandar" placeholder="Bandar" value="<?php echo $bandar_poskod_c;?>">
					</div>
					</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="c_negeri">Negeri <span class="text-danger">*</span></label>
								<select class="form-control" name="c_negeri" id="c_negeri" style="width:95%">
									<option value="">Pilih Negeri</option>
									<?php
									if (!empty($res_negeri)) {
										foreach ($res_negeri as $val_negeri) {
											$sel_c_negeri = $val_bangsa->nama_negeri == $nama_negeri_c ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_negeri->nama_negeri; ?>" <?php echo $sel_c_negeri ?>><?php echo $val_negeri->nama_negeri; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<!--
						<div class="col-md-6">
							<div class="form-group">
								<label for="c_pekerjaan">Pekerjaan <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="c_pekerjaan" id="c_pekerjaan" placeholder="Pekerjaan" value="<?php echo $row_mp->c_pekerjaan;?>" style="width:95%">
							</div>
						</div>
						-->
						<div class="col-md-6">
							<div class="form-group">
								<label for="b_pendapatan">Pekerjaan<span class="text-danger">*</span></label>
								<select class="form-control" name="c_pekerjaan" id="c_pekerjaan" style="width:95%" onchange="pekerjaanDisabled(this.id,this.value)">
									<option value="">Pilih Pekerjaan</option>
									<?php
									if (!empty($res_pekerjaan)) {
										foreach ($res_pekerjaan as $val_pekerjaan) {
											$sel_pekerjaan = $val_pekerjaan->id == $row_mp->c_pekerjaan ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_pekerjaan->id; ?>" <?php echo $sel_pekerjaan; ?>><?php echo $val_pekerjaan->nama_pekerjaan; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="c_pendapatan">Pendapatan (RM) <span class="text-danger">*</span></label>
								<select class="form-control" name="c_pendapatan" id="c_pendapatan">
									<option value="">Pilih Pendapatan</option>
									<?php
									if (!empty($res_pendapatan)) {
										foreach ($res_pendapatan as $val_pendapatan) {
											$sel_c_pendapatan = $val_pendapatan->id == $row_mp->c_pendapatan ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_pendapatan->id; ?>" <?php echo $sel_c_pendapatan; ?>> <?php echo $val_pendapatan->pendapatan; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="c_majikan">Majikan <span class="text-danger">*</span></label>
								<input type="text" class="form-control text-uppercase" name="c_majikan" id="c_majikan" placeholder="Majikan" value="<?php echo $row_mp->c_majikan;?>" style="width:95%">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="c_majikan">No Telefon Pejabat <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="c_no_tel_pejabat" id="c_no_tel_pejabat" placeholder="No Telefon Pejabat" value="<?php echo $row_mp->c_no_tel_pejabat;?>" style="width:95%">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="c_majikan">Samb <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="c_samb" id="c_samb" placeholder="Samb" value="<?php echo $row_mp->c_samb;?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="c_alamat_pejabat">Alamat Pejabat <span class="text-danger">*</span></label>
						<textarea name="c_alamat_pejabat" id="c_alamat_pejabat" rows="3" cols="40" placeholder="Alamat Pejabat" class="form-control text-uppercase"><?php echo $row_mp->c_alamat_pejabat;?></textarea>
					</div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="c_poskod_majikan">Poskod <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="c_poskod_majikan" id="c_poskod_majikan" placeholder="Poskod" value="<?php echo $row_mp->c_poskod_majikan;?>" style="width: 95%">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="c_bandar_majikan">Bandar <span class="text-danger">*</span></label>
                <input type="text" class="form-control text-uppercase" name="c_bandar_majikan" id="c_bandar_majikan" placeholder="Bandar" value="<?php echo $row_mp->c_bandar_majikan;?>" style="width: 95%">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="c_negeri_majikan">Negeri <span class="text-danger">*</span></label>
                <select class="form-control" name="c_negeri_majikan" id="c_negeri_majikan">
                  <option value="">Sila Pilih</option>
                  <?php
                  if ($res_negeri != NULL)
                  {
                    foreach ($res_negeri as $val_negeri)
                    {
                      ?>
                      <option value="<?php echo $val_negeri->nama_negeri; ?>"><?php echo $val_negeri->nama_negeri; ?></option>
                      <?php
                    }
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>
				</div>
				<!-- End Kontainer Ibubapa -->

				<!-- Penjaga Kontainer -->
				<div class="w3-container w3-light-gray" id="penjagacontainer" style="display:none">
					<div class="row">
						<br/>
						<div class="col-md-6">
							<div class="form-group">
								<label for="nama_penuh">Nama Penuh <span class="text-danger">*</span></label>
								<input type="text" class="form-control text-uppercase" name="a_nama_penuh" id="a_nama_penuh" placeholder="Nama Penuh" value="<?php echo $row_mp->a_nama_penuh;?>" style="width: 95%" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="a_kategori_penjaga">Hubungan <span class="text-danger">*</span></label>
								<select class="form-control" name="a_hubungan" id="a_hubungan">
									<option value="">Sila Pilih</option>
									<?php
									if (!empty($ref_hubungan)) {
										foreach ($ref_hubungan as $val_kwrg) {
										$sel_a_hubungan = $val_kwrg->id == $row_mp->a_hubungan ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_kwrg->id; ?>" <?php echo $sel_a_hubungan; ?> ><?php echo $val_kwrg->hubungan; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Jenis ID Pengenalan <span class="text-danger">*</span></label>
								<?php
									if($row_mp->a_jenis_pengenalan =='MyKAD'){
										$cheked_pengenalan_a1 = "checked='checked'";
                                    }elseif($row_mp->a_jenis_pengenalan =='Passport'){
										$cheked_pengenalan_a2 = "checked='checked'";
									}elseif($row_mp->a_jenis_pengenalan =='Tentera'){
										$cheked_pengenalan_a3 = "checked='checked'";
									}elseif($row_mp->a_jenis_pengenalan =='Polis'){
										$cheked_pengenalan_a4 = "checked='checked'";
									}else{
										$cheked_pengenalan_a1 = "checked='checked'";
									}
								?>
								<div class="form-check">
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="a_jenis_pengenalan" id="a_jenis_pengenalan_a" value="MyKAD" <?php echo $cheked_pengenalan_a1 ?>>
										MyKAD
									</label>&nbsp;&nbsp;
                                    <label class="form-check-label">
										<input type="radio" class="form-check-input" name="b_jenis_pengenalan" id="b_jenis_pengenalan_a" value="Passport" <?php echo $cheked_pengenalan_a2?>>
										Passport
									</label>&nbsp;&nbsp;
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="a_jenis_pengenalan" id="a_jenis_pengenalan_t" value="Tentera" <?php echo $cheked_pengenalan_a3 ?>>
										Tentera
									</label>
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="a_jenis_pengenalan" id="a_jenis_pengenalan_p" value="Polis"  <?php echo $cheked_pengenalan_a4 ?>>
										Polis
									</label>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label id="no_mykad">No. MyKAD <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="a_mykad" id="a_mykad" placeholder="No MyKAD" value="<?php echo $row_mp->a_mykad; ?>">
								<span id="a_mykad-error" class="registration-error"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="kewarganegaraan">Kewarganegaraan <span class="text-danger">*</span></label>
								<select class="form-control" name="a_kewarganegaraan" id="a_kewarganegaraan" style="width: 95%">
									<option value="">Pilih Kewarganegaraan</option>
									<?php
									if (!empty($res_kewarganegaraan)) {
										foreach ($res_kewarganegaraan as $val_kwrg) {
											$sel_a_kewarganegaraan = $val_kwrg->id == $row_mp->a_kewarganegaraan ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_kwrg->id; ?>" <?php echo $sel_a_kewarganegaraan; ?>><?php echo $val_kwrg->kewarganegaraan; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
						<!--
						<div class="col-md-6">
							<div class="form-group">
								<label for="a_kategori_penjaga">Kategori Penjaga <span class="text-danger">*</span></label>
								<select class="form-control" name="a_kategori_penjaga" id="a_kategori_penjaga">
									<option value="">Pilih Kategori Penjaga</option>
									<?php
									if (!empty($ref_kategori_penjaga)) {
										foreach ($ref_kategori_penjaga as $val_kwrg) {
											$sel_a_kategori_penjaga = $val_kwrg->id == $row_mp->a_kategori_penjaga ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_kwrg->id; ?>" <?php echo $sel_a_kategori_penjaga; ?>><?php echo $val_kwrg->kategori_penjaga; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
						-->

						<div class="col-md-6">
							<div class="form-group">
								<label for="no_telefon">No Telefon Yang Boleh Dihubungi (cth: 0389008989) <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="a_no_tel" id="a_no_tel" placeholder="No Telefon" value="<?php echo $row_mp->a_no_tel;?>" style="width: 95%">
							</div>
						</div>

					</div>
					<!--
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="no_telefon">No Telefon (cth: 0389008989) <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="a_no_tel" id="a_no_tel" placeholder="No Telefon" value="<?php echo $row_mp->a_no_tel;?>" style="width: 95%">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="no_hp">No Telefon Bimbit (cth: 01289009090) <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="a_no_hp" id="a_no_hp" placeholder="No Telefon Bimbit" value="<?php echo $row_mp->a_no_hp;?>">
							</div>
						</div>
					</div>
					-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="agama">Agama <span class="text-danger">*</span></label>
								<select class="form-control" name="a_agama" id="a_agama" style="width: 95%">
									<option value="">Pilih agama</option>
									<?php
									if (!empty($res_agama)) {
										foreach ($res_agama as $val_agama) {
											$sel_agama = $val_agama->id == $row_mp->a_agama ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_agama->id; ?>" <?php echo $sel_agama; ?>><?php echo $val_agama->agama; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="etnik">Etnik <span class="text-danger">*</span></label>
								<select class="form-control" name="a_etnik" id="a_etnik">
									<option value="">Pilih Etnik</option>
									<?php
									if (!empty($res_etnik)) {
										foreach ($res_etnik as $val_etnik) {
											$sel_etnik = $val_etnik->id == $row_mp->a_etnik ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_etnik->id; ?>" <?php echo $sel_etnik; ?>><?php echo $val_etnik->etnik; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="bangsa">Bangsa <span class="text-danger">*</span></label>
								<select class="form-control" name="a_bangsa" id="a_bangsa" style="width: 95%">
									<option value="">Pilih Bangsa</option>
									<?php
									if ($res_bangsa) {
										foreach ($res_bangsa as $val_bangsa) {
											$sel_bangsa = $val_bangsa->id == $row_mp->a_bangsa ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_bangsa->id; ?>" <?php echo $sel_bangsa; ?>><?php echo $val_bangsa->bangsa; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="a_alamat">Alamat Tetap <span class="text-danger">*</span></label>
						<textarea name="a_alamat" id="a_alamat" rows="3" cols="40" placeholder="Alamat Tetap" class="form-control text-uppercase"><?php echo $row_mp->a_alamat;?></textarea>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="a_poskod">Poskod <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="a_poskod" id="a_poskod" placeholder="Poskod" style="width: 95%" value="<?php echo $cek_poskod_a;?>">
								<input type="hidden" name="a_poskod_id" id="a_poskod_id" value="<?php echo $id_poskod_a;?>">
								<span id="a_poskod-error" style="color:red"></span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="a_bandar">Bandar <span class="text-danger">*</span></label>
								<input type="text" class="form-control text-uppercase" name="a_bandar" id="a_bandar" placeholder="Bandar" value="<?php echo $bandar_poskod_a;?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="a_negeri">Negeri <span class="text-danger">*</span></label>
								<select class="form-control" name="a_negeri" id="a_negeri" style="width: 95%">
									<option value="">Pilih Negeri</option>
									<?php
									if (!empty($res_negeri)) {
										foreach ($res_negeri as $val_negeri) {
												$sel_a_negeri = $val_negeri->nama_negeri == $nama_negeri_a ? "selected=\"selected\"" : "";

									?>
									<option value="<?php echo $val_negeri->nama_negeri; ?>" <?php echo $sel_a_negeri ?>><?php echo $val_negeri->nama_negeri; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<!--
						<div class="col-md-6">
							<div class="form-group">
								<label for="a_pekerjaan">Pekerjaan <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="a_pekerjaan" id="a_pekerjaan" placeholder="Pekerjaan" value="<?php echo $row_mp->a_pekerjaan;?>" style="width: 95%">
							</div>
						</div>
					-->
					<div class="col-md-6">
							<div class="form-group">
								<label for="a_pekerjaan">Pekerjaan<span class="text-danger">*</span></label>
								<select class="form-control" name="a_pekerjaan" id="a_pekerjaan" style="width:95%" onchange="pekerjaanDisabled(this.id,this.value)">
									<option value="">Pilih Pekerjaan</option>
									<?php
									if (!empty($res_pekerjaan)) {
										foreach ($res_pekerjaan as $val_pekerjaan) {
											$sel_pekerjaan = $val_pekerjaan->id == $row_mp->a_pekerjaan ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_pekerjaan->id; ?>" <?php echo $sel_pekerjaan; ?>><?php echo $val_pekerjaan->nama_pekerjaan; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="a_pendapatan">Pendapatan (RM) <span class="text-danger">*</span></label>
								<select class="form-control" name="a_pendapatan" id="a_pendapatan">
									<option value="">Pilih Pendapatan</option>
									<?php
									if (!empty($res_pendapatan)) {
										foreach ($res_pendapatan as $val_pendapatan) {
											$sel_a_pendapatan = $val_pendapatan->id == $row_mp->a_pendapatan ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_pendapatan->id; ?>" <?php echo $sel_a_pendapatan ?>><?php echo $val_pendapatan->pendapatan; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="a_majikan">Majikan <span class="text-danger">*</span></label>
								<input type="text" class="form-control text-uppercase" name="a_majikan" id="a_majikan" placeholder="Majikan" value="<?php echo $row_mp->a_majikan;?>" style="width: 95%">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="a_no_tel_pejabat">No Telefon Pejabat <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="a_no_tel_pejabat" id="a_no_tel_pejabat" placeholder="No Telefon Pejabat" value="<?php echo $row_mp->a_no_tel_pejabat;?>" style="width: 95%">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="a_samb">Samb <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="a_samb" id="a_samb" placeholder="Samb" value="<?php echo $row_mp->a_samb;?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="a_alamat_pejabat">Alamat Pejabat <span class="text-danger">*</span></label>
						<textarea name="a_alamat_pejabat" id="a_alamat_pejabat" rows="3" cols="40" placeholder="Alamat Pejabat" class="form-control text-uppercase"><?php echo $row_mp->a_alamat_pejabat;?></textarea>
					</div>
          <div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="a_poskod_majikan">Poskod <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="a_poskod_majikan" id="a_poskod_majikan" placeholder="Poskod" value="<?php echo $row_mp->a_poskod_majikan;?>" style="width: 95%">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="a_bandar_majikan">Bandar <span class="text-danger">*</span></label>
								<input type="text" class="form-control text-uppercase" name="a_bandar_majikan" id="a_bandar_majikan" placeholder="Bandar" value="<?php echo $row_mp->a_bandar_majikan;?>" style="width: 95%">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="a_negeri_majikan">Negeri <span class="text-danger">*</span></label>
                <select class="form-control" name="a_negeri_majikan" id="a_negeri_majikan">
                  <option value="">Sila Pilih</option>
                  <?php
									if (!empty($res_negeri))
                  {
										foreach ($res_negeri as $val_negeri)
                    {
                      ?>
                      <option value="<?php echo $val_negeri->nama_negeri; ?>"><?php echo $val_negeri->nama_negeri; ?></option>
                      <?php
										}
									}
									?>
                </select>
							</div>
						</div>
					</div>
				</div>
				<!-- End Penjaga Kontainer -->
				<input class="btn btn-primary" type="button" name="next2" id="next2" value="Simpan &amp; Seterusnya" >

			</form>
			</div>
		</div>
	</div>
</div>

<script>
function copyalamat() {
	$("#c_alamat").val($("#b_alamat").val());
	$("#c_poskod").val($("#b_poskod").val());
	$("#c_poskod_id").val($("#b_poskod_id").val());
	$("#c_bandar").val($("#b_bandar").val());
	$("#c_negeri").val($("#b_negeri").val());
}

// ngisi field penjaga waris
// deprecated by zulyantara date 2018-05-13
/*
$("#a_poskod").blur(function () {
	var poskodKet = $("#a_poskod").val();
	$.ajax({
		dataType: 'json',
		data: {poskod_ket: poskodKet},
		url: "<?php echo site_url("admin/pelatih_lanjutan/ajax_poskod"); ?>",
		type: "POST",
		success: function (data) {
			if (data.id_poskod > 0) {
				$("#a_bandar").val(data.bandar);
				$("#a_negeri").val(data.negeri);
				$("#a_poskod_id").val(data.id_poskod);
			} else {
				$("#a_poskod-error").html("Poskod Tidak Ditemukan");
				$("#a_poskod").val("");
				$("#a_poskod").focus();
			}
		}
	});
});

// ngisi field bandar dan negeri bapa
$("#b_poskod").blur(function () {
	var poskodKet = $("#b_poskod").val();
	$.ajax({
		dataType: 'json',
		data: {poskod_ket: poskodKet},
		url: "<?php echo site_url("admin/pelatih_lanjutan/ajax_poskod"); ?>",
		type: "POST",
		success: function (data) {
			if(data.id_poskod > 0) {
				$("#b_bandar").val(data.bandar);
				$("#b_negeri").val(data.negeri);
				$("#b_poskod_id").val(data.id_poskod);
			}else{
				$("#b_poskod-error").html("Poskod Tidak Ditemukan");
				$("#b_poskod").val("");
				$("#b_poskod").focus();
			}
		}
	});
});

// ngisi field bandar dan negeri ibu
$("#c_poskod").blur(function () {
	var poskodKet = $("#c_poskod").val();
	$.ajax({
		dataType: 'json',
		data: {poskod_ket: poskodKet},
		url: "<?php echo site_url("admin/pelatih_lanjutan/ajax_poskod"); ?>",
		type: "POST",
		success: function (data) {
			if(data.id_poskod > 0) {
				$("#c_bandar").val(data.bandar);
				$("#c_negeri").val(data.negeri);
				$("#c_poskod_id").val(data.id_poskod);
			}else{
				$("#c_poskod-error").html("Poskod Tidak Ditemukan");
				$("#c_poskod").val("");
				$("#c_poskod").focus();
			}
		}
	});
});
*/

$("#b_jenis_pengenalan_a").click(function () {
	document.getElementById('no_mykad').innerHTML = 'No. MyKAD';
	$('#b_mykad').attr('placeholder', 'No. MyKAD');
});
$("#b_jenis_pengenalan_t").click(function () {
	document.getElementById('no_mykad').innerHTML = 'No. Tentera';
	$('#b_mykad').attr('placeholder', 'No. Tentera');
});
$("#b_jenis_pengenalan_p").click(function () {
	document.getElementById('no_mykad').innerHTML = 'No. Polis';
	$('#b_mykad').attr('placeholder', 'No. Polis');
});
$("#c_jenis_pengenalan_a").click(function () {
	document.getElementById('c_no_mykad').innerHTML = 'No. MyKAD';
	$('#c_mykad').attr('placeholder', 'No. MyKAD');
});
$("#c_jenis_pengenalan_t").click(function () {
	document.getElementById('c_no_mykad').innerHTML = 'No. Tentera';
	$('#c_mykad').attr('placeholder', 'No. Tentera');
});
$("#c_jenis_pengenalan_p").click(function () {
	document.getElementById('c_no_mykad').innerHTML = 'No. Polis';
	$('#c_mykad').attr('placeholder', 'No. Polis');
});

// perubahan maklumat
$("#maklumat").change(function () {
	$("#ibubapacontainer").hide();
	$("#penjagacontainer").hide();
	if (this.value == 1) {
		$("#ibubapacontainer").show();
	} else if (this.value == 2) {
		$("#penjagacontainer").show();
	}
});

$("#a_poskod_majikan").change(function(){
    var val_poskod = $("#a_poskod_majikan").val();
    $.ajax({
        method: "POST",
        url: "<?php echo site_url("admin/pelatih_lanjutan/ajax_poskod_majikan"); ?>",
        data: {id_poskod: val_poskod},
        dataType: "json",
        success: function(ret){
            $("#a_bandar_majikan").val(ret.bandar);
            $("#a_negeri_majikan").val(ret.nama_negeri);
        }
    });
});

<?php
	if($row_mp->maklumat == 1){
?>
		$("#ibubapacontainer").show();
<?php
	}elseif($row_mp->maklumat == 2){
?>
		$("#penjagacontainer").show();
<?php
	}
?>

var val_a_pekerjaan = $("#a_pekerjaan").find(":selected").val();
if (val_a_pekerjaan == 6)// || val_a_pekerjaan == 1
{
    $('#a_pendapatan').attr('disabled', true);
    $('#a_majikan').attr('disabled', true);
    $('#a_no_tel_pejabat').attr('disabled', true);
    $('#a_samb').attr('disabled', true);
    $('#a_alamat_pejabat').attr('disabled', true);
    $('#a_poskod_majikan').attr('disabled', true);
    $('#a_bandar_majikan').attr('disabled', true);
    $('#a_negeri_majikan').attr('disabled', true);
}
else
{
    $('#a_pendapatan').attr('disabled', false);
    $('#a_majikan').attr('disabled', false);
    $('#a_no_tel_pejabat').attr('disabled', false);
    $('#a_samb').attr('disabled', false);
    $('#a_alamat_pejabat').attr('disabled', false);
    $('#a_poskod_majikan').attr('disabled', false);
    $('#a_bandar_majikan').attr('disabled', false);
    $('#a_negeri_majikan').attr('disabled', false);
}

var val_b_pekerjaan = $("#b_pekerjaan").find(":selected").val();
if (val_b_pekerjaan == 6)// || val_b_pekerjaan == 1
{
    $('#b_pendapatan').attr('disabled', true);
    $('#b_majikan').attr('disabled', true);
    $('#b_no_tel_pejabat').attr('disabled', true);
    $('#b_samb').attr('disabled', true);
    $('#b_alamat_pejabat').attr('disabled', true);
    $('#b_poskod_majikan').attr('disabled', true);
    $('#b_bandar_majikan').attr('disabled', true);
    $('#b_negeri_majikan').attr('disabled', true);
}
else
{
    $('#b_pendapatan').attr('disabled', false);
    $('#b_majikan').attr('disabled', false);
    $('#b_no_tel_pejabat').attr('disabled', false);
    $('#b_samb').attr('disabled', false);
    $('#b_alamat_pejabat').attr('disabled', false);
    $('#b_poskod_majikan').attr('disabled', false);
    $('#b_bandar_majikan').attr('disabled', false);
    $('#b_negeri_majikan').attr('disabled', false);
}

var val_c_pekerjaan = $("#c_pekerjaan").find(":selected").val();
if (val_c_pekerjaan == 6) //|| val_c_pekerjaan == 1
{
    $('#c_pendapatan').attr('disabled', true);
    $('#c_majikan').attr('disabled', true);
    $('#c_no_tel_pejabat').attr('disabled', true);
    $('#c_samb').attr('readonly', true);
    $('#c_alamat_pejabat').attr('disabled', true);
    $('#c_poskod_majikan').attr('disabled', true);
    $('#c_bandar_majikan').attr('disabled', true);
    $('#c_negeri_majikan').attr('disabled', true);
}
else
{
    $('#c_pendapatan').attr('disabled', false);
    $('#c_majikan').attr('disabled', false);
    $('#c_no_tel_pejabat').attr('disabled', false);
    $('#c_samb').attr('disabled', false);
    $('#c_alamat_pejabat').attr('disabled', false);
    $('#c_poskod_majikan').attr('disabled', false);
    $('#c_bandar_majikan').attr('disabled', false);
    $('#c_negeri_majikan').attr('disabled', false);
}

function pekerjaanDisabled(name,id) {
		if (name =='a_pekerjaan') {
				modeNow = "a";
		}else if(name == 'b_pekerjaan'){
				modeNow = "b";
		}else if(name == 'c_pekerjaan'){
				modeNow = "c";
		}

				if (id == 6) {//id == 1 ||
						$('#'+modeNow+'_pendapatan').attr('disabled', true);
						$('#'+modeNow+'_majikan').attr('disabled', true);
						$('#'+modeNow+'_no_tel_pejabat').attr('disabled', true);
						$('#'+modeNow+'_samb').attr('disabled', true);
						$('#'+modeNow+'_alamat_pejabat').attr('disabled', true);
						$('#'+modeNow+'_poskod_majikan').attr('disabled', true);
						$('#'+modeNow+'_bandar_majikan').attr('disabled', true);
						$('#'+modeNow+'_negeri_majikan').attr('disabled', true);
						/*
						$('#'+modeNow+'_poskod').attr('readonly', true);
						$('#'+modeNow+'_negeri').attr('readonly', true);
						*/
				}else{
						$('#'+modeNow+'_pendapatan').attr('disabled', false);
						$('#'+modeNow+'_majikan').attr('disabled', false);
						$('#'+modeNow+'_no_tel_pejabat').attr('disabled', false);
						$('#'+modeNow+'_samb').attr('disabled', false);
						$('#'+modeNow+'_alamat_pejabat').attr('disabled', false);
						$('#'+modeNow+'_poskod_majikan').attr('disabled', false);
						$('#'+modeNow+'_bandar_majikan').attr('disabled', false);
						$('#'+modeNow+'_negeri_majikan').attr('disabled', false);
						/*
						$('#'+modeNow+'_poskod').attr('readonly', false);
						$('#'+modeNow+'_negeri').attr('readonly', false);
						*/
				}


}

</script>
