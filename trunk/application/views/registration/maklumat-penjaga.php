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

<script src="<?= asset_url();?>jquery/jquery.validate.min.js"></script>


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
			// a_kategori_penjaga: {required: function(element){ return $("#maklumat").val()=="2"; },},
			a_no_tel: {required: function(element){ return $("#maklumat").val()=="2"; },},
			// a_no_hp: {required:	function(element){ return $("#maklumat").val()=="2"; },},
			a_agama: {required:	function(element){ return $("#maklumat").val()=="2"; },},
			a_etnik: {required:	function(element){ return $("#maklumat").val()=="2"; },},
			a_bangsa: {required:	function(element){ return $("#maklumat").val()=="2"; },},
			a_alamat: {required:	function(element){ return $("#maklumat").val()=="2"; },},
			a_poskod: {required:	function(element){ return $("#maklumat").val()=="2"; },},
			a_bandar: {required:	function(element){ return $("#maklumat").val()=="2"; },},
			a_negeri: {required:	function(element){ return $("#maklumat").val()=="2"; },},
			a_pekerjaan: {required:	function(element){ return $("#maklumat").val()=="2"; },},
			a_majikan: {required:	function(element){ return $("#maklumat").val()=="2"; },},
			a_no_tel_pejabat: {required:	function(element){ return $("#maklumat").val()=="2"; },},
			// a_samb: {required:	function(element){ return $("#maklumat").val()=="2"; },},
			a_alamat_pejabat: {required:	function(element){ return $("#maklumat").val()=="2"; },},
			a_pendapatan: {required:	function(element){ return $("#maklumat").val()=="2"; },},
            a_poskod_pejabat: {required: function(element){ return $("#maklumat").val()=="2";}},

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
			// b_kategori_penjaga: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			b_no_tel: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			// b_no_hp: {required:	function(element){ return $("#maklumat").val()=="1"; },},
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
            b_poskod_pejabat: {required: function(element){return $("#maklumat").val()=="1"}},
			c_nama_penuh: {required:	function(element){ return $("#maklumat").val()=="1";},},
			c_jenis_pengenalan: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			c_mykad: {
				required:	function(element){ return $("#maklumat").val()=="1"; },
				minlength: 12,
				maxlength: 12,
				number: true,
			},
			c_kewarganegaraan: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			// c_kategori_penjaga: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			c_no_tel: {required:	function(element){ return $("#maklumat").val()=="1"; },},
			// c_no_hp: {required:	function(element){ return $("#maklumat").val()=="1"; },},
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
            c_poskod_pejabat: {required: function(element){ return $("#maklumat").val()=="1"}}
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
			// a_kategori_penjaga: "Sila isikan ruangan ini",
			a_no_tel: "Sila isikan ruangan ini",
			// a_no_hp: "Sila isikan ruangan ini",
			a_agama: "Sila isikan ruangan ini",
			a_etnik: "Sila isikan ruangan ini",
			a_bangsa: "Sila isikan ruangan ini",
			a_alamat: "Sila isikan ruangan ini",
			a_poskod: "Sila isikan ruangan ini",
			a_bandar: "Sila isikan ruangan ini",
			a_negeri: "Sila isikan ruangan ini",
			a_pekerjaan: "Sila isikan ruangan ini",
			a_majikan: "Sila isikan ruangan ini",
			a_no_tel_pejabat: "Sila isikan ruangan ini",
			// a_samb: "Sila isikan ruangan ini",
			a_alamat_pejabat: "Sila isikan ruangan ini",
			a_pendapatan: "Sila isikan ruangan ini",
            a_poskod_pejabat: "Sila isikan ruangan ini",

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
			// b_kategori_penjaga: "Sila isikan ruangan ini",
			b_no_tel: "Sila isikan ruangan ini",
			// b_no_hp: "Sila isikan ruangan ini",
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
            b_poskod_pejabat: "Sila isikan ruangan ini",

			c_nama_penuh: "Sila isikan ruangan ini",
			c_jenis_pengenalan: "Sila isikan ruangan ini",
			c_mykad: {
				required: "Sila isikan ruangan ini",
				minlength: "No. MyKAD diperlukan dan Min 12 digit nombor.",
				maxlength: "No. MyKAD diperlukan dan Max 12 digit nombor.",
				number: "No. MyKAD harap diisi nombor sahaja.",
			},
			c_kewarganegaraan: "Sila isikan ruangan ini",
			// c_kategori_penjaga: "Sila isikan ruangan ini",
			c_no_tel: "Sila isikan ruangan ini",
			// c_no_hp: "Sila isikan ruangan ini",
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
            c_poskod_pejabat: "Sila isikan ruangan ini"
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

	$("#next").click(function(event){
		if ($("#form-mp").valid()) {
			event.preventDefault();

			$.ajax({
				data: $("#form-mp").serialize(),
				url: "<?php echo site_url("registration/simpan_mp"); ?>",
				type: "POST",
				dataType: 'json',
				success: function(data){
					console.log(data);
					if (data.status == 1) {
						var loc = "<?php echo site_url('registration/tinggal/mykad/'); ?>";
						window.location = loc + data.mykad;
					} else {
						var loc = "<?php echo site_url('registration/tinggal/mykad/'); ?>";//penjaga
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
//penjagacontainer
//ibubapacontainer
$data_h['id_pbp'] = $row_data['idBp'];
$this->load->view('registration/header', $data_h);
#echo "<pre>";print_r($row_data['penjaga']);echo "</pre>";
?>
  <div class="row mt-2">
    <div class="col-md-12">
			<div class="w3-container" style="clear:both;border:1px #EEE solid;padding:20px; position:relative;">
				<div class="w3-container w3-blue">
					<h4>MAKLUMAT PENJAGA</h4>
				</div>
				<br/>
				<form name="form-mp" id="form-mp" method="post">
				<input type="hidden" name="idBp" id="idBp" value="<?php echo $row_data['idBp']; ?>">
				<input type="hidden" name="id" id="id" value="<?php echo $row_data['id']; ?>">
			 	<div class="form-group">
					<label for="maklumat">Maklumat <span class="text-danger">*</span></label>
					<select class="form-control" name="maklumat" id="maklumat" required="required">
						<option value="">SILA PILIH</option>
						<option value="1" <?php if($row_data['penjaga']->jenis_maklumat=='1') echo 'selected';?>  >IBU DAN BAPA</option>
						<option value="2" <?php if($row_data['penjaga']->jenis_maklumat=='2') echo 'selected';?>  >IBU ATAU BAPA SAHAJA/PENJAGA/WARIS/PENAJA</option>
					</select>
					<label id="maklumat-error" style="color:red"></span>
				</div>


				<!-- Kontainer Ibubapa --><?php $jm="none"; if($row_data['penjaga']->jenis_maklumat=='1') { $jm='inline'; } if($row_data['penjaga']->jenis_maklumat=='2'){$jm='none';}?>
				<div class="w3-container w3-light-gray" id="ibubapacontainer" style="display:<?php echo $jm;?>">
					<br/>
					<div class="w3-row">
						<div>
							<div class="form-group">
								<label for="nama_penuh">Nama Penuh Bapa <span class="text-danger">*</span></label>
								<input type="text" style="text-transform: uppercase" class="form-control" name="b_nama_penuh" id="b_nama_penuh" placeholder="Nama Penuh Bapa" value="<?php echo $row_data['penjaga']->nama_penuh_bapak;?>" required="required"  style="width:95%; text-transform:uppercase">
							</div>
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-col s6">
							<div class="form-group">
								<label>Jenis ID Pengenalan <span class="text-danger">*</span></label>
								<div class="form-check">
                  <?php
                  $chk_b_jn_pengenalan = $chk_b_jn_pengenalan_awam = $chk_b_jn_pengenalan_tentera = $chk_b_jn_pengenalan_polis = "";
                  if ($row_data['penjaga']->jenis_pengenalan_bapak!="") {
                    $waris_b_jn_pengenalan = $row_data['penjaga']->jenis_pengenalan_bapak;
                    if ($waris_b_jn_pengenalan==="MyKAD") $chk_b_jn_pengenalan_awam = "checked='checked'";
                    else if ($waris_b_jn_pengenalan==="Passport") $chk_b_jn_pengenalan_passport = "checked='checked'";
                    else if ($waris_b_jn_pengenalan==="Tentera") $chk_b_jn_pengenalan_tentera = "checked='checked'";
                    else if ($waris_b_jn_pengenalan==="Polis") $chk_b_jn_pengenalan_polis = "checked='checked'";
                  } else {
                    $chk_b_jn_pengenalan = "checked='checked'";
                  }
                  ?>
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="b_jenis_pengenalan" id="b_jenis_pengenalan_a" value="MyKAD" <?php if ($chk_b_jn_pengenalan!="") echo $chk_b_jn_pengenalan; else echo $chk_b_jn_pengenalan_awam; ?>>
										MyKAD
									</label>&nbsp;&nbsp;
                                    <label class="form-check-label">
										<input type="radio" class="form-check-input" name="b_jenis_pengenalan" id="b_jenis_pengenalan_p" value="Passport" <?php echo $chk_b_jn_pengenalan_passport; ?>>
										Passport
									</label>
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="b_jenis_pengenalan" id="b_jenis_pengenalan_t" value="Tentera" <?php echo $chk_b_jn_pengenalan_tentera; ?>>
										Tentera
									</label>
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="b_jenis_pengenalan" id="b_jenis_pengenalan_pl" value="Polis" <?php echo $chk_b_jn_pengenalan_polis; ?>>
										Polis
									</label>
								</div>
							</div>
						</div>
						<div class="w3-col s6">
							<div class="form-group">
								<label id="no_mykad">No. ID Pengenalan <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="b_mykad" id="b_mykad" placeholder="No MyKAD" value="<?php echo $row_data['penjaga']->mykad_bapak;?>" required><input type="hidden" id="nnSaya" value="b_mykad">
								<span id="b_mykad-error" class="registration-error"></span>
							</div>
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-col s6">
							<div class="form-group">
								<label for="kewarganegaraan">Kewarganegaraan <span class="text-danger">*</span></label>
								<select class="form-control" name="b_kewarganegaraan" id="b_kewarganegaraan" style="width:95%" required>
									<option value="">PILIH KEWARGANEGARAAN</option>
									<?php
									if (!empty($row_data[res_kewarganegaraan])) {
										foreach ($row_data[res_kewarganegaraan] as $val_kwrg) {
											$sel_bkwrg = $val_kwrg->id == $row_data['penjaga']->id_kewarganegaraan_bapak ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_kwrg->id; ?>" <?php echo $sel_bkwrg; ?>><?php echo strtoupper($val_kwrg->kewarganegaraan); ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="w3-col s6">
							<!-- <div class="form-group">
								<label for="b_kategori_penjaga">Kategori Penjaga <span class="text-danger">*</span></label>
								<select class="form-control" name="b_kategori_penjaga" id="b_kategori_penjaga" required>
									<option value="">Pilih Kategori Penjaga</option>
									<?php
									if (!empty($row_data[ref_kategori_penjaga])) {
										foreach ($row_data[ref_kategori_penjaga] as $val_kwrg) {
											$sel_bkwrgz = $val_kwrg->id == $row_data['penjaga']->id_kategori_penjaga_bapak ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_kwrg->id; ?>" <?php echo $sel_bkwrgz; ?>><?php echo $val_kwrg->kategori_penjaga; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div> -->
                            <div class="form-group">
								<label for="no_telefon">No Telefon Yang Boleh Dihubungi (cth: 0389008989) <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="b_no_tel" id="b_no_tel" placeholder="NO TELEFON" value="<?php echo $row_data['penjaga']->no_tel_bapak;?>" style="width:95%">
							</div>
						</div>
					</div>
					<div class="w3-row">
						<!-- <div class="w3-col s6">
							<div class="form-group">
								<label for="no_telefon">No Telefon Yang Boleh Dihubungi (cth: 0389008989) <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="b_no_tel" id="b_no_tel" placeholder="No Telefon" value="<?php echo $row_data['penjaga']->no_tel_bapak;?>" style="width:95%">
							</div>
						</div> -->
						<!-- <div class="w3-col s6">
							<div class="form-group">
								<label for="no_hp">No Telefon Bimbit (cth: 01289009090) <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="b_no_hp" id="b_no_hp" placeholder="No Telefon Bimbit" value="<?php echo $row_data['penjaga']->no_hp_bapak;?>">
							</div>
						</div> -->
					</div>
					<div class="w3-row">
						<div class="w3-col s6">
							<div class="form-group">
								<label for="agama">Agama <span class="text-danger">*</span></label>
								<select class="form-control" name="b_agama" id="b_agama" style="width:95%">
									<option value="">PILIH AGAMA</option>
									<?php
									if (!empty($row_data[res_agama])) {
										foreach ($row_data[res_agama] as $val_agama) {
											$sel_bagama = $val_agama->id == $row_data['penjaga']->id_agama_bapak ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_agama->id; ?>" <?php echo $sel_bagama; ?>><?php echo strtoupper($val_agama->agama); ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="w3-col s6">
							<div class="form-group">
								<label for="etnik">Etnik <span class="text-danger">*</span></label>
								<select class="form-control" name="b_etnik" id="b_etnik">
									<option value="">PILIH ETNIK</option>
									<?php
									if (!empty($row_data[res_etnik])) {
									foreach ($row_data[res_etnik] as $val_etnik) {
										$sel_betnik = $val_etnik->id == $row_data['penjaga']->id_etnik_bapak ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_etnik->id; ?>" <?php echo $sel_betnik; ?>><?php echo strtoupper($val_etnik->etnik); ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-col s6">
							<div class="form-group">
								<label for="bangsa">Bangsa <span class="text-danger">*</span></label>
								<select class="form-control" name="b_bangsa" id="b_bangsa" style="width:95%">
									<option value="">PILIH BANGSA</option>
									<?php
									if (!empty($row_data[res_bangsa])) {
										foreach ($row_data[res_bangsa] as $val_bangsa) {
											$sel_bbangsa = $val_bangsa->id == $row_data['penjaga']->id_bangsa_bapak ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_bangsa->id; ?>" <?php echo $sel_bbangsa; ?>><?php echo strtoupper($val_bangsa->bangsa); ?></option>
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
						<textarea style="text-transform: uppercase" name="b_alamat" id="b_alamat" rows="3" cols="40" placeholder="Alamat Tetap" class="form-control"><?php echo $row_data['penjaga']->alamat_bapak;?></textarea>
					</div>
					<div class="w3-row">
						<div class="w3-col s6">
							<div class="form-group">
								<label for="b_poskod">Poskod <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="b_poskod" id="b_poskod" placeholder="POSKOD" style="width:95%" value="<?php echo $row_data['penjaga']->poskod_bapak;?>">
								<input type="hidden" name="b_poskod_id" id="b_poskod_id" value="<?php echo $row_data['penjaga']->poskod_bapak;?>">
								<span id="b_poskod-error" style="color:red"></span>
							</div>
						</div>
						<div class="w3-col s6">
							<div class="form-group">
								<label for="b_bandar">Bandar <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="b_bandar" id="b_bandar" placeholder="BANDAR" value="<?php echo strtoupper($row_data['penjaga2']['b_bandar2']);?>" style="text-transform:uppercase">
							</div>
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-col s6">
							<div class="form-group">
								<label for="b_negeri">Negeri <span class="text-danger">*</span></label>
								<select class="form-control" name="b_negeri" id="b_negeri" style="width:95%">
									<option value="">PILIH NEGERI</option>
									<?php
									if (!empty($row_data[res_negeri])) {
										foreach ($row_data[res_negeri] as $val_negeri) {
                      $sel_bnegeri = $val_negeri->nama_negeri == $row_data['penjaga2']['b_negeri2'] ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_negeri->nama_negeri; ?>" <?php echo $sel_bnegeri; ?>><?php echo strtoupper($val_negeri->nama_negeri); ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
                        <div class="w3-col-s6">
						<!--
                            <div class="checkbox">-->
                                <!-- <label for="b_lbl_pekerjaan">Status Pekerjaan</label> -->
                        <!--        <input type="radio" name="b_lbl_bekerja" id="b_lbl_bekerja">Bekerja &nbsp; <input type="radio" name="b_lbl_bekerja" id="b_lbl_tdkbekerja">Tidak Bekerja
                            </div>
							-->
                        </div>
					</div>
					<div class="w3-row">
						<div class="w3-col s6">
							<div class="form-group">
								<label for="b_pekerjaan">Pekerjaan <span class="text-danger">*</span></label>
								<select class="form-control" name="b_pekerjaan" id="b_pekerjaan">
									<option value="">PILIH PEKERJAAN</option>
									<?php
									if (!empty($row_data['ref_pekerjaan'])) {
										foreach ($row_data['ref_pekerjaan'] as $val_pekerjaan) {
                      $sel_pekerjaan = $val_pekerjaan->id == $row_data['penjaga']->pekerjaan_bapak ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_pekerjaan->id; ?>" <?php echo $sel_pekerjaan; ?>><?php echo strtoupper($val_pekerjaan->nama_pekerjaan); ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="w3-col s6">
							<div class="form-group">
								<label for="b_pendapatan">Pendapatan (RM)</label>
								<select class="form-control" name="b_pendapatan" id="b_pendapatan">
									<option value="">PILIH PENDAPATAN</option>
									<?php
									if (!empty($row_data[res_pendapatan])) {
										foreach ($row_data[res_pendapatan] as $val_negeri) {
                      $sel_bpendapatan = $val_negeri->id == $row_data['penjaga']->id_pendapatan_bapak ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_negeri->id; ?>" <?php echo $sel_bpendapatan; ?>><?php echo strtoupper($val_negeri->pendapatan); ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-half">
							<div class="form-group">
								<label for="b_majikan">Majikan</label>
								<input type="text" style="text-transform: uppercase" class="form-control" name="b_majikan" id="b_majikan" placeholder="Majikan" value="<?php echo $row_data['penjaga']->majikan_bapak;?>" style="width:95%">
							</div>
						</div>
						<div class="w3-quarter">
							<div class="form-group">
								<label for="b_majikan">No Telefon Pejabat</label>
								<input type="text" class="form-control" name="b_no_tel_pejabat" id="b_no_tel_pejabat" placeholder="NO TELEFON PEJABAT" value="<?php echo $row_data['penjaga']->no_tel_pejabat_bapak;?>" style="width:95%">
							</div>
						</div>
						<div class="w3-quarter">
							<div class="form-group">
								<label for="b_majikan">Samb</label>
								<input type="text" class="form-control" name="b_samb" id="b_samb" placeholder="Samb" value="<?php echo $row_data['penjaga']->samb_bapak;?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="b_alamat_pejabat">Alamat Pejabat</label>
						<textarea style="text-transform: uppercase" name="b_alamat_pejabat" id="b_alamat_pejabat" rows="3" cols="40" placeholder="ALAMAT PEJABAT" class="form-control"><?php echo $row_data['penjaga']->alamat_pejabat_bapak;?></textarea>
					</div>
                    <div class="w3-row">
						<div class="w3-quarter">
							<div class="form-group">
								<label for="b_poskod_pejabat">Poskod</label>
								<input type="text" class="form-control" name="b_poskod_pejabat" id="b_poskod_pejabat" placeholder="Poskod" value="<?php echo $row_data['penjaga2']['b_alamat_pejabat_poskod'];?>" style="width:95%">
                                <input type="hidden" name="b_poskod_pejabat_id" id="b_poskod_pejabat_id" value="<?php echo $row_data['penjaga']->b_alamat_pejabat_poskod;?>">
								<span id="b_poskod_pejabat-error" style="color:red"></span>
							</div>
						</div>
						<div class="w3-quarter">
							<div class="form-group">
								<label for="b_bandar_majikan">Bandar</label>
								<input type="text" class="form-control" name="b_bandar_pejabat" id="b_bandar_pejabat" placeholder="BANDAR" style="width:95%;text-transform:uppercase;" value="<?php echo $row_data['penjaga2']['b_alamat_pejabat_bandar2']; ?>">
							</div>
						</div>
						<div class="w3-quarter">
							<div class="form-group">
								<label for="b_negeri_pejabat">Negeri</label>
								<select class="form-control" name="b_negeri_pejabat" id="b_negeri_pejabat">
								    <option value="">SILA PILIH</option>
                                    <?php
									if (!empty($row_data[res_negeri])) {
										foreach ($row_data[res_negeri] as $val_negeri) {
                      $sel_bnegeri = $val_negeri->nama_negeri == $row_data['penjaga2']['b_alamat_pejabat_negeri3'] ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_negeri->nama_negeri; ?>" <?php echo $sel_bnegeri; ?>><?php echo strtoupper($val_negeri->nama_negeri); ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
					</div>

					<hr/><br/>
					<div class="w3-row">
						<div>
							<div class="form-group">
								<label for="nama_penuh">Nama Penuh Ibu <span class="text-danger">*</span></label>
								<input style="text-transform: uppercase" type="text" class="form-control" name="c_nama_penuh" id="c_nama_penuh" placeholder="NAMA PENUH IBU" value="<?php echo $row_data['penjaga']->nama_penuh_ibu;?>"  style="width:95%; text-transform:uppercase">
							</div>
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-col s6">
							<div class="form-group">
								<label>Jenis ID Pengenalan <span class="text-danger">*</span></label>
								<div class="form-check">
                                    <?php
                                    $chk_c_jn_pengenalan = $chk_c_jn_pengenalan_awam = $chk_c_jn_pengenalan_tentera = $chk_c_jn_pengenalan_polis = "";
                                    if ($row_data['penjaga']->jenis_pengenalan_ibu!="") {
                                        $waris_c_jn_pengenalan = $row_data['penjaga']->jenis_pengenalan_ibu;
                                        if ($waris_c_jn_pengenalan==="MyKAD") $chk_c_jn_pengenalan_awam = "checked='checked'";
                                        if ($waris_c_jn_pengenalan==="Passport") $chk_c_jn_pengenalan_passport = "checked='checked'";
                                        else if ($waris_c_jn_pengenalan==="Tentera") $chk_c_jn_pengenalan_tentera = "checked='checked'";
                                        else if ($waris_c_jn_pengenalan==="Polis") $chk_c_jn_pengenalan_polis = "checked='checked'";
                                    } else {
                                        $chk_c_jn_pengenalan = "checked='checked'";
                                    }
                                    ?>
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="c_jenis_pengenalan" id="c_jenis_pengenalan_a" value="MyKAD" checked="checked" required  <?php if ($chk_c_jn_pengenalan!="") echo $chk_c_jn_pengenalan; else echo $chk_c_jn_pengenalan_awam; ?>>
										MyKAD
									</label>&nbsp;&nbsp;
                                    <label class="form-check-label">
										<input type="radio" class="form-check-input" name="c_jenis_pengenalan" id="c_jenis_pengenalan_p" value="Passport" required  <?php echo $chk_c_jn_pengenalan_passport; ?>>
										Passport
									</label>&nbsp;&nbsp;
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="c_jenis_pengenalan" id="c_jenis_pengenalan_t" value="Tentera" <?php echo $chk_c_jn_pengenalan_tentera; ?>>
										Tentera
									</label>
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="c_jenis_pengenalan" id="c_jenis_pengenalan_pl" value="Polis" <?php echo $chk_c_jn_pengenalan_polis; ?>>
										Polis
									</label>
								</div>
							</div>
						</div>
						<div class="w3-col s6">
							<div class="form-group">
								<label id="c_no_mykad">No. ID Pengenalan <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="c_mykad" id="c_mykad" placeholder="NO MYKAD" value="<?php echo $row_data['penjaga']->mykad_ibu;?>" required>
								<span id="c_mykad-error" class="registration-error"></span>
							</div>
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-col s6">
							<div class="form-group">
								<label for="kewarganegaraan">Kewarganegaraan <span class="text-danger">*</span></label>
								<select class="form-control" name="c_kewarganegaraan" id="c_kewarganegaraan" style="width:95%">
									<option value="">PILIH KEWARGANEGARAAN</option>
									<?php
									if (!empty($row_data[res_kewarganegaraan])) {
										foreach ($row_data[res_kewarganegaraan] as $val_kwrg) {
											$sel_ckwrg = $val_kwrg->id == $row_data['penjaga']->id_kewarganegaraan_ibu ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_kwrg->id; ?>" <?php echo $sel_ckwrg; ?>><?php echo strtoupper($val_kwrg->kewarganegaraan); ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="w3-col s6">
							<!-- <div class="form-group">
								<label for="c_kategori_penjaga">Kategori Penjaga <span class="text-danger">*</span></label>
								<select class="form-control" name="c_kategori_penjaga" id="c_kategori_penjaga">
									<option value="">Pilih Kategori Penjaga</option>
									<?php
									if (!empty($row_data[ref_kategori_penjaga])) {
										foreach ($row_data[ref_kategori_penjaga] as $val_kwrg) {
											$sel_ckwrgz = $val_kwrg->id == $row_data['penjaga']->id_kategori_penjaga_ibu ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_kwrg->id; ?>" <?php echo $sel_ckwrgz; ?>><?php echo $val_kwrg->kategori_penjaga; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div> -->
                            <div class="form-group">
								<label for="no_telefon">No Telefon Yang Boleh Dihubungi (cth: 0389008989) <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="c_no_tel" id="c_no_tel" placeholder="No Telefon" value="<?php echo $row_data['penjaga']->no_tel_ibu;?>" style="width:95%">
							</div>
						</div>
					</div>
					<div class="w3-row">
						<!-- <div class="w3-col s6">
							<div class="form-group">
								<label for="no_telefon">No Telefon Ynag Bisa Dihubungi (cth: 0389008989) <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="c_no_tel" id="c_no_tel" placeholder="No Telefon" value="<?php echo $row_data['penjaga']->no_tel_ibu;?>" style="width:95%">
							</div>
						</div> -->
						<!-- <div class="w3-col s6">
							<div class="form-group">
								<label for="no_hp">No Telefon Bimbit (cth: 01289009090) <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="c_no_hp" id="c_no_hp" placeholder="No Telefon Bimbit" value="<?php echo $row_data['penjaga']->no_hp_ibu;?>">
							</div>
						</div> -->
					</div>
					<div class="w3-row">
						<div class="w3-col s6">
							<div class="form-group">
								<label for="agama">Agama <span class="text-danger">*</span></label>
								<select class="form-control" name="c_agama" id="c_agama" style="width:95%">
									<option value="">PILIH AGAMA</option>
									<?php
									if (!empty($row_data[res_agama])) {
										foreach ($row_data[res_agama] as $val_agama) {
											$sel_cagama = $val_agama->id == $row_data['penjaga']->id_agama_ibu ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_agama->id; ?>" <?php echo $sel_cagama; ?>><?php echo strtoupper($val_agama->agama); ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="w3-col s6">
							<div class="form-group">
								<label for="etnik">Etnik <span class="text-danger">*</span></label>
								<select class="form-control" name="c_etnik" id="c_etnik">
									<option value="">PILIH ETNIK</option>
									<?php
									if (!empty($row_data[res_etnik])) {
										foreach ($row_data[res_etnik] as $val_etnik) {
											$sel_cetnik = $val_etnik->id == $row_data['penjaga']->id_etnik_ibu ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_etnik->id; ?>" <?php echo $sel_cetnik; ?>><?php echo strtoupper($val_etnik->etnik); ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-col s6">
							<div class="form-group">
								<label for="bangsa">Bangsa <span class="text-danger">*</span></label>
								<select class="form-control" name="c_bangsa" id="c_bangsa" style="width:95%">
									<option value="">PILIH BANGSA</option>
									<?php
									if (!empty($row_data[res_bangsa])) {
										foreach ($row_data[res_bangsa] as $val_bangsa) {
											$sel_cbangsa = $val_bangsa->id == $row_data['penjaga']->id_bangsa_ibu ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_bangsa->id; ?>" <?php echo $sel_cbangsa; ?>><?php echo strtoupper($val_bangsa->bangsa); ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="w3-row">
						<div class="float-left">
							<button type="button" class="btn btn-primary" id="simpan" onclick="copyalamat()">Alamat Seperti Diatas</button>
						</div>
					</div>
					<div class="form-group">
						<label for="c_alamat">Alamat Tetap <span class="text-danger">*</span></label>
						<textarea style="text-transform: uppercase" name="c_alamat" id="c_alamat" rows="3" cols="40" placeholder="Alamat Tetap" class="form-control"><?php echo $row_data['penjaga']->alamat_ibu;?></textarea>
					</div>
					<div class="w3-row">
						<div class="w3-col s6">
							<div class="form-group">
								<label for="c_poskod">Poskod <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="c_poskod" id="c_poskod" placeholder="POSKOD" style="width:95%" value="<?php echo $row_data['penjaga']->poskod_ibu;?>">
								<input type="hidden" name="c_poskod_id" id="c_poskod_id" value="<?php echo $row_data['penjaga']->poskod_ibu;?>">
								<span id="c_poskod-error" style="color:red"></span>
							</div>
						</div>
					<div class="w3-col s6">
					<div class="form-group">
					<label for="c_bandar">Bandar <span class="text-danger">*</span></label>
					<input type="text" class="form-control" name="c_bandar" id="c_bandar" placeholder="BANDAR" value="<?php echo $row_data['penjaga2']['c_bandar2'];?>" style="text-transform:uppercase">
					</div>
					</div>
					</div>
					<div class="w3-row">
						<div class="w3-col s6">
							<div class="form-group">
								<label for="c_negeri">Negeri <span class="text-danger">*</span></label>
								<select class="form-control" name="c_negeri" id="c_negeri" style="width:95%">
									<option value="">PILIH NEGERI</option>
									<?php
									if (!empty($row_data[res_negeri])) {
										foreach ($row_data[res_negeri] as $val_negeri) {
                      $sel_cnegeri = $val_negeri->nama_negeri == $row_data['penjaga2']['c_negeri3'] ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_negeri->nama_negeri; ?>" <?php echo $sel_cnegeri; ?>><?php echo strtoupper($val_negeri->nama_negeri); ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
                        <div class="w3-col-s6">
							<!--
                            <div class="checkbox"> -->
                                <!-- <label for="b_lbl_pekerjaan">Status Pekerjaan</label> -->
                            <!--    <input type="radio" name="c_lbl_bekerja" id="c_lbl_bekerja">Bekerja &nbsp; <input type="radio" name="c_lbl_bekerja" id="c_lbl_tdkbekerja">Tidak Bekerja
                            </div> -->
                        </div>
					</div>
					<div class="w3-row">
						<div class="w3-col s6">
							<div class="form-group">
								<label for="c_pekerjaan">Pekerjaan <span class="text-danger">*</span></label>
								<select class="form-control" name="c_pekerjaan" id="c_pekerjaan">
									<option value="">PILIH PEKERJAAN</option>
									<?php
									if (!empty($row_data['ref_pekerjaan'])) {
										foreach ($row_data['ref_pekerjaan'] as $val_pekerjaan) {
                      $sel_pekerjaan = $val_pekerjaan->id == $row_data['penjaga']->pekerjaan_ibu ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_pekerjaan->id; ?>" <?php echo $sel_pekerjaan; ?>><?php echo strtoupper($val_pekerjaan->nama_pekerjaan); ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="w3-col s6">
							<div class="form-group">
								<label for="c_pendapatan">Pendapatan (RM)</label>
								<select class="form-control" name="c_pendapatan" id="c_pendapatan">
									<option value="">PILIH PENDAPATAN</option>
									<?php
									if (!empty($row_data[res_pendapatan])) {
										foreach ($row_data[res_pendapatan] as $val_negeri) {
                      $sel_cpendapatan = $val_negeri->id == $row_data['penjaga']->id_pendapatan_ibu ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_negeri->id; ?>" <?php echo $sel_cpendapatan; ?>><?php echo strtoupper($val_negeri->pendapatan); ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-half">
							<div class="form-group">
								<label for="c_majikan">Majikan</label>
								<input type="text" class="form-control" name="c_majikan" id="c_majikan" placeholder="MAJIKAN" value="<?php echo $row_data['penjaga']->majikan_ibu;?>" style="width:95%">
							</div>
						</div>
						<div class="w3-quarter">
							<div class="form-group">
								<label for="c_majikan">No Telefon Pejabat</label>
								<input type="text" class="form-control" name="c_no_tel_pejabat" id="c_no_tel_pejabat" placeholder="NO TELEFON PEJABAT" value="<?php echo $row_data['penjaga']->no_tel_pejabat_ibu;?>" style="width:95%">
							</div>
						</div>
						<div class="w3-quarter">
							<div class="form-group">
								<label for="c_majikan">Samb</label>
								<input type="text" class="form-control" name="c_samb" id="c_samb" placeholder="SAMB" value="<?php echo $row_data['penjaga']->samb_ibu;?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="c_alamat_pejabat">Alamat Pejabat</label>
						<textarea style="text-transform: uppercase" name="c_alamat_pejabat" id="c_alamat_pejabat" rows="3" cols="40" placeholder="ALAMAT PEJABAT" class="form-control"><?php echo $row_data['penjaga']->alamat_pejabat_ibu;?></textarea>
					</div>
                    <div class="w3-row">
						<div class="w3-quarter">
							<div class="form-group">
								<label for="c_poskod_pejabat">Poskod</label>
								<input type="text" class="form-control" name="c_poskod_pejabat" id="c_poskod_pejabat" placeholder="POSKOD" value="<?php echo $row_data['penjaga']->c_alamat_pejabat_poskod;?>" style="width:95%">
                                <input type="hidden" name="c_poskod_pejabat_id" id="c_poskod_pejabat_id" value="<?php echo $row_data['penjaga']->c_alamat_pejabat_poskod;?>">
								<span id="c_poskod_pejabat-error" style="color:red"></span>
							</div>
						</div>
						<div class="w3-quarter">
							<div class="form-group">
								<label for="c_bandar_majikan">Bandar</label>
								<input type="text" class="form-control" name="c_bandar_pejabat" id="c_bandar_pejabat" placeholder="BANDAR" value="<?php echo strtoupper($row_data['penjaga2']['c_alamat_pejabat_bandar2']);?>" style="width:95%;text-transform:uppercase">
							</div>
						</div>
						<div class="w3-quarter">
							<div class="form-group">
								<label for="c_negeri_pejabat">Negeri</label>
								<select class="form-control" name="c_negeri_pejabat" id="c_negeri_pejabat">
								    <option value="">SILA PILIH</option>
									<?php
									if (!empty($row_data[res_negeri])) {
										foreach ($row_data[res_negeri] as $val_negeri) {
                      $sel_cnegeri = $val_negeri->nama_negeri == $row_data['penjaga2']['c_alamat_pejabat_negeri3'] ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_negeri->nama_negeri; ?>" <?php echo $sel_cnegeri; ?>><?php echo $val_negeri->nama_negeri; ?></option>
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
				<?php $jm2="none"; if($row_data['penjaga']->jenis_maklumat=='1') { $jm2='none'; } if($row_data['penjaga']->jenis_maklumat=='2'){$jm2='inline';}?>
				<div class="w3-container w3-light-gray" id="penjagacontainer" style="display:<?php echo $jm2;?>">
					<div class="w3-row">
						<br/>
						<div class="w3-col s6">
							<div class="form-group">
								<label for="nama_penuh">Nama Penuh <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="a_nama_penuh" id="a_nama_penuh" placeholder="Nama Penuh" value="<?php echo $row_data['penjaga']->nama_penuh_waris;?>" style="width: 95%; text-transform:uppercase;" required>
							</div>
						</div>
						<div class="w3-col s6">
							<div class="form-group">
								<label for="a_kategori_penjaga">Hubungan <span class="text-danger">*</span></label>
								<select class="form-control" name="a_hubungan" id="a_hubungan">
									<option value="">Sila Pilih</option>
									<?php
									if (!empty($row_data[ref_hubungan])) {
										foreach ($row_data[ref_hubungan] as $val_kwrg) {
									$sel_kwrg = $val_kwrg->id == $row_data['penjaga']->id_hubungan_waris ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_kwrg->id; ?>" <?php echo $sel_kwrg; ?>><?php echo $val_kwrg->hubungan; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-col s6">
							<div class="form-group">
								<label>Jenis ID Pengenalan <span class="text-danger">*</span></label>
								<div class="form-check">
                  <?php
                  $chk_a_jn_pengenalan = $chk_a_jn_pengenalan_awam = $chk_a_jn_pengenalan_tentera = $chk_a_jn_pengenalan_polis = "";
                  if ($row_data['penjaga']->jenis_pengenalan_waris!="") {
                    $waris_jn_pengenalan = $row_data['penjaga']->jenis_pengenalan_waris;
                    if ($waris_jn_pengenalan==="Awam") $chk_a_jn_pengenalan_awam = "checked='checked'";
                    else if ($waris_b_jn_pengenalan==="Passport") $chk_b_jn_pengenalan_passport = "checked='checked'";
                    else if ($waris_jn_pengenalan==="Tentera") $chk_a_jn_pengenalan_tentera = "checked='checked'";
                    else if ($waris_jn_pengenalan==="Polis") $chk_a_jn_pengenalan_polis = "checked='checked'";
                  } else {
                    $chk_a_jn_pengenalan = "checked='checked'";
                  }
                  ?>
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="a_jenis_pengenalan" id="a_jenis_pengenalan_a" value="Awam" <?php if ($chk_a_jn_pengenalan!="") echo $chk_a_jn_pengenalan; else echo $chk_a_jn_pengenalan_awam; ?>>
										MyKAD
									</label>&nbsp;&nbsp;
                                    <label class="form-check-label">
										<input type="radio" class="form-check-input" name="a_jenis_pengenalan" id="a_jenis_pengenalan_p" value="Passport" <?php echo $chk_a_jn_pengenalan_passport; ?>>
										Passport
									</label>
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="a_jenis_pengenalan" id="a_jenis_pengenalan_t" value="Tentera" <?php echo $chk_a_jn_pengenalan_tentera; ?>>
										Tentera
									</label>
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="a_jenis_pengenalan" id="a_jenis_pengenalan_pl" value="Polis" <?php echo $chk_a_jn_pengenalan_polis; ?>>
										Polis
									</label>
								</div>
							</div>
						</div>
						<div class="w3-col s6">
							<div class="form-group">
								<label id="a_no_mykad">No. ID Pengenalan <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="a_mykad" id="a_mykad" placeholder="No MyKAD" value="<?php echo $row_data['penjaga']->mykad_waris;?>">
								<span id="a_mykad-error" class="registration-error"></span>
							</div>
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-col s6">
							<div class="form-group">
								<label for="kewarganegaraan">Kewarganegaraan <span class="text-danger">*</span></label>
								<select class="form-control" name="a_kewarganegaraan" id="a_kewarganegaraan" style="width: 95%">
									<option value="">Pilih Kewarganegaraan</option>
									<?php
									if (!empty($row_data[res_kewarganegaraan])) {
										foreach ($row_data[res_kewarganegaraan] as $val_kwrg) {
											$sel_kwrg = $val_kwrg->id == $row_data['penjaga']->id_kewarganegaraan_waris ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_kwrg->id; ?>" <?php echo $sel_kwrg; ?>><?php echo $val_kwrg->kewarganegaraan; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="w3-col s6">
							<!-- <div class="form-group">
								<label for="a_kategori_penjaga">Kategori Penjaga <span class="text-danger">*</span></label>
								<select class="form-control" name="a_kategori_penjaga" id="a_kategori_penjaga">
									<option value="">Pilih Kategori Penjaga</option>
									<?php
									if (!empty($row_data[ref_kategori_penjaga])) {
										foreach ($row_data[ref_kategori_penjaga] as $val_kwrg) {
											$sel_kwrgx = $val_kwrg->id == $row_data['penjaga']->id_kategori_penjaga_waris ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_kwrg->id; ?>" <?php echo $sel_kwrgx; ?>><?php echo $val_kwrg->kategori_penjaga; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div> -->
                            <div class="form-group">
								<label for="no_telefon">No Telefon Yang Boleh Dihubungi (cth: 0389008989) <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="a_no_tel" id="a_no_tel" placeholder="No Telefon" value="<?php echo $row_data['penjaga']->no_tel_waris;?>" style="width: 95%">
							</div>
						</div>
					</div>
					<div class="w3-row">
						<!-- <div class="w3-col s6">
							<div class="form-group">
								<label for="no_telefon">No Telefon Yang Bisa Dihubungi (cth: 0389008989) <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="a_no_tel" id="a_no_tel" placeholder="No Telefon" value="<?php echo $row_data['penjaga']->no_tel_waris;?>" style="width: 95%">
							</div>
						</div> -->
						<!-- <div class="w3-col s6">
							<div class="form-group">
								<label for="no_hp">No Telefon Bimbit (cth: 01289009090) <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="a_no_hp" id="a_no_hp" placeholder="No Telefon Bimbit" value="<?php echo $row_data['penjaga']->no_hp_waris;?>">
							</div>
						</div> -->
					</div>
					<div class="w3-row">
						<div class="w3-col s6">
							<div class="form-group">
								<label for="agama">Agama <span class="text-danger">*</span></label>
								<select class="form-control" name="a_agama" id="a_agama" style="width: 95%">
									<option value="">Pilih agama</option>
									<?php
									if (!empty($row_data[res_agama])) {
										foreach ($row_data[res_agama] as $val_agama) {
											$sel_agama = $val_agama->id == $row_data['penjaga']->id_agama_waris ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_agama->id; ?>" <?php echo $sel_agama; ?>><?php echo $val_agama->agama; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="w3-col s6">
							<div class="form-group">
								<label for="etnik">Etnik <span class="text-danger">*</span></label>
								<select class="form-control" name="a_etnik" id="a_etnik">
									<option value="">Pilih Etnik</option>
									<?php
									if (!empty($row_data[res_etnik])) {
										foreach ($row_data[res_etnik] as $val_etnik) {
											$sel_etnik = $val_etnik->id == $row_data['penjaga']->id_etnik_waris ? "selected=\"selected\"" : "";
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
					<div class="w3-row">
						<div class="w3-col s6">
							<div class="form-group">
								<label for="bangsa">Bangsa <span class="text-danger">*</span></label>
								<select class="form-control" name="a_bangsa" id="a_bangsa" style="width: 95%">
									<option value="">Pilih Bangsa</option>
									<?php
									if (!empty($row_data[res_bangsa])) {
										foreach ($row_data[res_bangsa] as $val_bangsa) {
											$sel_bangsa = $val_bangsa->id == $row_data['penjaga']->id_bangsa_waris ? "selected=\"selected\"" : "";
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
						<textarea style="text-transform: uppercase" name="a_alamat" id="a_alamat" rows="3" cols="40" placeholder="Alamat Tetap" class="form-control"><?php echo $row_data['penjaga']->alamat_waris;?></textarea>
					</div>
					<div class="w3-row">
						<div class="w3-col s6">
							<div class="form-group">
								<label for="a_poskod">Poskod <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="a_poskod" id="a_poskod" placeholder="Poskod" style="width: 95%" value="<?php echo $row_data['penjaga']->poskod_waris;?>">
								<input type="hidden" name="a_poskod_id" id="a_poskod_id" value="<?php echo $row_data['penjaga']->poskod_waris;?>">
								<span id="a_poskod-error" style="color:red"></span>
							</div>
						</div>
						<div class="w3-col s6">
							<div class="form-group">
								<label for="a_bandar">Bandar <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="a_bandar" id="a_bandar" placeholder="Bandar" value="<?php echo $row_data['penjaga2']['a_bandar2'];?>" style="text-transform:uppercase" >
							</div>
						</div>
					</div>
					<div class="w3-row">
						<div class="w3-col s6">
							<div class="form-group">
								<label for="a_negeri">Negeri <span class="text-danger">*</span></label>
								<select class="form-control" name="a_negeri" id="a_negeri" style="width: 95%">
									<option value="">Pilih Negeri</option>
									<?php
									if (!empty(@$row_data[res_negeri])) {
										foreach (@$row_data[res_negeri] as $val_negeri) {
                      $sel_negeri = $val_negeri->nama_negeri == $row_data['penjaga2']['a_negeri2'] ? "selected=\"selected\"" : "";
									?>
									<option value="<?php echo $val_negeri->nama_negeri; ?>" <?php echo $sel_negeri; ?>><?php echo $val_negeri->nama_negeri; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
                        <div class="w3-col-s6">
						<!--
                            <div class="checkbox"> -->
                                <!-- <label for="b_lbl_pekerjaan">Status Pekerjaan</label> -->
                         <!--       <input type="radio" name="a_lbl_bekerja" id="a_lbl_bekerja">Bekerja &nbsp; <input type="radio" name="a_lbl_bekerja" id="a_lbl_tdkbekerja">Tidak Bekerja
                            </div> -->
                        </div>
					</div>
					<div class="w3-row">
						<div class="w3-col s6">
							<div class="form-group">
								<label for="a_pekerjaan">Pekerjaan <span class="text-danger">*</span></label>
								<select class="form-control" name="a_pekerjaan" id="a_pekerjaan">
									<option value="">Pilih Pekerjaan</option>
									<?php
									if (!empty($row_data['ref_pekerjaan']))
                                    {
										foreach ($row_data['ref_pekerjaan'] as $val_pekerjaan)
                                        {
                                            $sel_pekerjaan = $val_pekerjaan->id == $row_data['penjaga']->pekerjaan_waris ? "selected=\"selected\"" : "";
                                            ?>
                                            <option value="<?php echo $val_pekerjaan->id; ?>" <?php echo $sel_pekerjaan; ?>><?php echo $val_pekerjaan->nama_pekerjaan; ?></option>
                                            <?php
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="w3-col s6">
							<div class="form-group">
								<label for="a_pendapatan">Pendapatan (RM)</label>
								<select class="form-control" name="a_pendapatan" id="a_pendapatan">
									<option value="">Pilih Pendapatan</option>
									<?php
									if (!empty($row_data[res_pendapatan])) {
										foreach ($row_data[res_pendapatan] as $val_negeri) {
                      $sel_pendapatan = $val_negeri->id == $row_data['penjaga']->id_pendapatan_waris ? "selected=\"selected\"" : "";
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
					<div class="w3-row">
						<div class="w3-half">
							<div class="form-group">
								<label for="a_majikan">Majikan</label>
								<input type="text" class="form-control" name="a_majikan" id="a_majikan" placeholder="Majikan" value="<?php echo $row_data['penjaga']->majikan_waris;?>" style="width: 95%">
							</div>
						</div>
						<div class="w3-quarter">
							<div class="form-group">
								<label for="a_majikan">No Telefon Pejabat</label>
								<input type="text" class="form-control" name="a_no_tel_pejabat" id="a_no_tel_pejabat" placeholder="No Telefon Pejabat" value="<?php echo $row_data['penjaga']->no_tel_pejabat_waris;?>" style="width: 95%">
							</div>
						</div>
						<div class="w3-quarter">
							<div class="form-group">
								<label for="a_majikan">Samb</label>
								<input type="text" class="form-control" name="a_samb" id="a_samb" placeholder="Samb" value="<?php echo $row_data['penjaga']->samb_waris;?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="a_alamat_pejabat">Alamat Pejabat</label>
						<textarea style="text-transform: uppercase" name="a_alamat_pejabat" id="a_alamat_pejabat" rows="3" cols="40" placeholder="Alamat Pejabat" class="form-control"><?php echo $row_data['penjaga']->alamat_pejabat_waris;?></textarea>
					</div>
                    <div class="w3-row">
						<div class="w3-quarter">
							<div class="form-group">
								<label for="a_poskod_pejabat">Poskod</label>
								<input type="text" class="form-control" name="a_poskod_pejabat" id="a_poskod_pejabat" placeholder="Poskod" value="<?php echo $row_data['penjaga']->a_alamat_pejabat_poskod;?>" style="width:95%">
							</div>
						</div>
						<div class="w3-quarter">
							<div class="form-group">
								<label for="a_bandar_majikan">Bandar</label>
								<input type="text" class="form-control" name="a_bandar_pejabat" id="a_bandar_pejabat" placeholder="Bandar" value="<?php echo $row_data['penjaga2']['a_alamat_pejabat_bandar2'];?>" style="width:95%;text-transform:uppercase;">
							</div>
						</div>
						<div class="w3-quarter">
							<div class="form-group">
								<label for="a_negeri_pejabat">Negeri</label>
								<select class="form-control" name="a_negeri_pejabat" id="a_negeri_pejabat">
                                    <option value="">Sila Pilih</option>
									<?php
									if (!empty($row_data[res_negeri])) {
										foreach ($row_data[res_negeri] as $val_negeri) {
                                            $sel_cnegeri = $val_negeri->nama_negeri == $row_data['penjaga2']['a_alamat_pejabat_negeri3'] ? "selected=\"selected\"" : "";
                                            ?>
                                            <option value="<?php echo $val_negeri->nama_negeri; ?>" <?php echo $sel_cnegeri; ?>><?php echo $val_negeri->nama_negeri; ?></option>
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

				<input class="btnAction btn btn-primary" type="button" name="next" id="next" value="Simpan &amp; Seterusnya" >
			</form>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
    $("#b_lbl_tdkbekerja").click(function(){
        $("#b_pekerjaan").prop("disabled", true);
        $("#b_pendapatan").prop("disabled", true);
        $("#b_majikan").prop("disabled", true);
        $("#b_no_tel_pejabat").prop("disabled", true);
        $("#b_samb").prop("disabled", true);
        $("#b_alamat_pejabat").prop("disabled", true);
    });
    $("#b_lbl_bekerja").click(function(){
        $("#b_pekerjaan").prop("disabled", false);
        $("#b_pendapatan").prop("disabled", false);
        $("#b_majikan").prop("disabled", false);
        $("#b_no_tel_pejabat").prop("disabled", false);
        $("#b_samb").prop("disabled", false);
        $("#b_alamat_pejabat").prop("disabled", false);
    });
    // $("#c_lbl_tdkbekerja").click(function(){
    //     $("#c_pekerjaan").prop("disabled", true);
    //     $("#c_pendapatan").prop("disabled", true);
    //     $("#c_majikan").prop("disabled", true);
    //     $("#c_no_tel_pejabat").prop("disabled", true);
    //     $("#c_samb").prop("disabled", true);
    //     $("#c_alamat_pejabat").prop("disabled", true);
    // });
    $("#c_lbl_bekerja").click(function(){
        $("#c_pekerjaan").prop("disabled", false);
        $("#c_pendapatan").prop("disabled", false);
        $("#c_majikan").prop("disabled", false);
        $("#c_no_tel_pejabat").prop("disabled", false);
        $("#c_samb").prop("disabled", false);
        $("#c_alamat_pejabat").prop("disabled", false);
    });
    $("#a_lbl_tdkbekerja").click(function(){
        $("#a_pekerjaan").prop("disabled", true);
        $("#a_pendapatan").prop("disabled", true);
        $("#a_majikan").prop("disabled", true);
        $("#a_no_tel_pejabat").prop("disabled", true);
        $("#a_samb").prop("disabled", true);
        $("#a_alamat_pejabat").prop("disabled", true);
    });
    $("#a_lbl_bekerja").click(function(){
        $("#a_pekerjaan").prop("disabled", false);
        $("#a_pendapatan").prop("disabled", false);
        $("#a_majikan").prop("disabled", false);
        $("#a_no_tel_pejabat").prop("disabled", false);
        $("#a_samb").prop("disabled", false);
        $("#a_alamat_pejabat").prop("disabled", false);
    });
});

function copyalamat() {
	$("#c_alamat").val($("#b_alamat").val());
	$("#c_poskod").val($("#b_poskod").val());
	$("#c_poskod_id").val($("#b_poskod_id").val());
	$("#c_bandar").val($("#b_bandar").val());
	$("#c_negeri").val($("#b_negeri").val());
}

// ngisi field penjaga waris
$("#a_poskod").blur(function () {
	var poskodKet = $("#a_poskod").val();
	$.ajax({
		dataType: 'json',
		data: {poskod_ket: poskodKet},
		url: "<?php echo site_url("screen_lima/ajax_poskod"); ?>",
		type: "POST",
		success: function (data) {
			if (data.id_poskod > 0) {
				$("#a_bandar").val(data.bandar);
				$("#a_negeri").val(data.negeri);
				$("#a_poskod_id").val(data.id_poskod);
			} else {
				$("#a_poskod-error").html(" ");
				//$("#a_poskod").val("");
				//$("#a_poskod").focus();
			}
		}
	});
});

$("#a_poskod_pejabat").blur(function () {
	var poskodKet = $("#a_poskod_pejabat").val();
	$.ajax({
		dataType: 'json',
		data: {poskod_ket: poskodKet},
		url: "<?php echo site_url("screen_lima/ajax_poskod"); ?>",
		type: "POST",
		success: function (data) {
			if (data.id_poskod > 0) {
				$("#a_bandar_pejabat").val(data.bandar);
				$("#a_negeri_pejabat").val(data.negeri);
				$("#a_poskod_pejabat_id").val(data.id_poskod);
			} else {
				$("#a_poskod_pejabat-error").html("   ");
				//$("#a_poskod_pejabat").val("");
				//$("#a_poskod_pejabat").focus();
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
		url: "<?php echo site_url("screen_lima/ajax_poskod"); ?>",
		type: "POST",
		success: function (data) {
			if(data.id_poskod > 0) {
				$("#b_bandar").val(data.bandar);
				$("#b_negeri").val(data.negeri);
				$("#b_poskod_id").val(data.id_poskod);
                $("#b_poskod-error").html("");
			}else{
				$("#b_poskod-error").html(" ");
				//$("#b_poskod").val("");
				//$("#b_poskod").focus();
			}
		}
	});
});

$("#b_poskod_pejabat").blur(function () {
	var poskodKet = $("#b_poskod_pejabat").val();
	$.ajax({
		dataType: 'json',
		data: {poskod_ket: poskodKet},
		url: "<?php echo site_url("screen_lima/ajax_poskod"); ?>",
		type: "POST",
		success: function (data) {
			if(data.id_poskod > 0) {
				$("#b_bandar_pejabat").val(data.bandar);
				$("#b_negeri_pejabat").val(data.negeri);
				$("#b_poskod_id").val(data.id_poskod);
                $("#b_poskod_pejabat-error").html("");
			}else{
				$("#b_poskod_pejabat-error").html(" ");
				//$("#b_poskod_pejabat").val("");
				//$("#b_poskod_pejabat").focus();
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
		url: "<?php echo site_url("screen_lima/ajax_poskod"); ?>",
		type: "POST",
		success: function (data) {
			if(data.id_poskod > 0) {
				$("#c_bandar").val(data.bandar);
				$("#c_negeri").val(data.negeri);
				$("#c_poskod_id").val(data.id_poskod);
			}else{
				$("#c_poskod-error").html(" ");
				//$("#c_poskod").val("");
				//$("#c_poskod").focus();
			}
		}
	});
});

$("#c_poskod_pejabat").blur(function () {
	var poskodKet = $("#c_poskod_pejabat").val();
	$.ajax({
		dataType: 'json',
		data: {poskod_ket: poskodKet},
		url: "<?php echo site_url("screen_lima/ajax_poskod"); ?>",
		type: "POST",
		success: function (data) {
			if(data.id_poskod > 0) {
				$("#c_bandar_pejabat").val(data.bandar);
				$("#c_negeri_pejabat").val(data.negeri);
				$("#c_poskod_pejabat_id").val(data.id_poskod);
			}else{
				$("#c_poskod_pejabat-error").html(" ");
				//$("#c_poskod_pejabat").val("");
				//$("#c_poskod_pejabat").focus();
			}
		}
	});
});

$("#b_jenis_pengenalan_a").click(function () {
	document.getElementById('no_mykad').innerHTML = 'No. ID Pengenalan';
	$('#b_mykad').attr('placeholder', 'No. ID Pengenalan');
});
$("#b_jenis_pengenalan_t").click(function () {
	document.getElementById('no_mykad').innerHTML = 'No. Tentera';
    $('#nnSaya').val('b_tentera');
	$('#b_mykad').attr('placeholder', 'No. Tentera');
});
$("#b_jenis_pengenalan_p").click(function () {
    $('#nnSaya').val('b_passport');
	document.getElementById('no_mykad').innerHTML = 'No. Passport';
	$('#b_mykad').attr('placeholder', 'No. Passport');
});
$("#b_jenis_pengenalan_pl").click(function () {
    $('#nnSaya').val('b_polis');
	document.getElementById('no_mykad').innerHTML = 'No. Polis';
	$('#b_mykad').attr('placeholder', 'No. Polis');
});
$("#c_jenis_pengenalan_a").click(function () {
	document.getElementById('c_no_mykad').innerHTML = 'No. ID Pengenalan';
	$('#c_mykad').attr('placeholder', 'No. ID Pengenalan');
});
$("#c_jenis_pengenalan_t").click(function () {
	document.getElementById('c_no_mykad').innerHTML = 'No. Tentera';
	$('#c_mykad').attr('placeholder', 'No. Tentera');
});
$("#c_jenis_pengenalan_p").click(function () {
	document.getElementById('c_no_mykad').innerHTML = 'No. Passport';
	$('#c_mykad').attr('placeholder', 'No. Passport');
});
$("#c_jenis_pengenalan_pl").click(function () {
	document.getElementById('c_no_mykad').innerHTML = 'No. Polis';
	$('#c_mykad').attr('placeholder', 'No. Polis');
});
$("#c_jenis_pengenalan_a").click(function () {
	document.getElementById('c_no_mykad').innerHTML = 'No. ID Pengenalan';
	$('#c_mykad').attr('placeholder', 'No. ID Pengenalan');
});
$("#a_jenis_pengenalan_t").click(function () {
	document.getElementById('a_no_mykad').innerHTML = 'No. Tentera';
	$('#a_mykad').attr('placeholder', 'No. Tentera');
});
$("#a_jenis_pengenalan_p").click(function () {
	document.getElementById('a_no_mykad').innerHTML = 'No. Passport';
	$('#a_mykad').attr('placeholder', 'No. Passport');
});
$("#a_jenis_pengenalan_pl").click(function () {
	document.getElementById('a_no_mykad').innerHTML = 'No. Polis';
	$('#a_mykad').attr('placeholder', 'No. Polis');
});

// perubahan maklumat
$("#maklumat").change(function () {
	$("#ibubapacontainer").hide();
	$("#penjagacontainer").hide();
	if (this.value == 1) {
		resetForm($('#penjagacontainer'));
		$("#ibubapacontainer").show();
	} else if (this.value == 2) {
		resetForm($('#ibubapacontainer'));
		$("#penjagacontainer").show();
	}
});

function resetForm($form) {
    $form.find('input:text, input:password, input:file, select, textarea').val('');
    $form.find('input:radio, input:checkbox')
         .removeAttr('checked').removeAttr('selected');
}

$(document).ready(function(){
    var val_a_pekerjaan = $("#a_pekerjaan").val();
    if (val_a_pekerjaan == 6 || val_a_pekerjaan == 5 || val_a_pekerjaan == 4 ) {
        $("#a_pendapatan").prop({disabled: true});
        $("#a_majikan").prop("disabled", true);
        $("#a_no_tel_pejabat").prop("disabled", true);
        $("#a_samb").prop("disabled", true);
        $("#a_alamat_pejabat").prop("disabled", true);
        $("#a_poskod_pejabat").prop("disabled", true);
        $("#a_bandar_pejabat").prop("disabled", true);
        $("#a_negeri_pejabat").prop("disabled", true);
    }
    else {
        $("#a_pendapatan").prop({disabled: false});
        $("#a_majikan").prop("disabled", false);
        $("#a_no_tel_pejabat").prop("disabled", false);
        $("#a_samb").prop("disabled", false);
        $("#a_alamat_pejabat").prop("disabled", false);
        $("#a_poskod_pejabat").prop("disabled", false);
        $("#a_bandar_pejabat").prop("disabled", false);
        $("#a_negeri_pejabat").prop("disabled", false);
    }
	
	if(val_a_pekerjaan==4) $("#a_pendapatan").prop({disabled: false});

    var val_b_pekerjaan = $("#b_pekerjaan").val();
    if (val_b_pekerjaan == 6 || val_b_pekerjaan == 5 || val_b_pekerjaan == 4 ) {
        $("#b_pendapatan").prop({disabled: true});
        $("#b_majikan").prop("disabled", true);
        $("#b_no_tel_pejabat").prop("disabled", true);
        $("#b_samb").prop("disabled", true);
        $("#b_alamat_pejabat").prop("disabled", true);
        $("#b_poskod_pejabat").prop("disabled", true);
        $("#b_bandar_pejabat").prop("disabled", true);
        $("#b_negeri_pejabat").prop("disabled", true);
    }
    else {
        $("#b_pendapatan").prop({disabled: false});
        $("#b_majikan").prop("disabled", false);
        $("#b_no_tel_pejabat").prop("disabled", false);
        $("#b_samb").prop("disabled", false);
        $("#b_alamat_pejabat").prop("disabled", false);
        $("#b_poskod_pejabat").prop("disabled", false);
        $("#b_bandar_pejabat").prop("disabled", false);
        $("#b_negeri_pejabat").prop("disabled", false);
    }
	if(val_b_pekerjaan==4) $("#b_pendapatan").prop({disabled: false});

    var val_c_pekerjaan = $("#c_pekerjaan").val();
    if (val_c_pekerjaan == 5 || val_c_pekerjaan == 6 || val_c_pekerjaan == 4 ) {
        $("#c_pendapatan").prop({"disabled": true});
        $("#c_majikan").prop("disabled", true);
        $("#c_no_tel_pejabat").prop("disabled", true);
        $("#c_samb").prop("disabled", true);
        $("#c_alamat_pejabat").prop("disabled", true);
        $("#c_poskod_pejabat").prop("disabled", true);
        $("#c_bandar_pejabat").prop("disabled", true);
        $("#c_negeri_pejabat").prop("disabled", true);
    }
    else {
        $("#c_pendapatan").prop({disabled: false});
        $("#c_majikan").prop("disabled", false);
        $("#c_no_tel_pejabat").prop("disabled", false);
        $("#c_samb").prop("disabled", false);
        $("#c_alamat_pejabat").prop("disabled", false);
        $("#c_poskod_pejabat").prop("disabled", false);
        $("#c_bandar_pejabat").prop("disabled", false);
        $("#c_negeri_pejabat").prop("disabled", false);
    }
	if(val_c_pekerjaan==4) $("#c_pendapatan").prop({disabled: false});

    $("#a_pekerjaan").change(function(){
        var val_pekerjaan = $(this).val();
        if (val_pekerjaan == 6 || val_pekerjaan == 5 || val_pekerjaan == 4  ) {
            $("#a_pendapatan").prop({disabled: true});
            $("#a_majikan").prop("disabled", true);
            $("#a_no_tel_pejabat").prop("disabled", true);
            $("#a_samb").prop("disabled", true);
            $("#a_alamat_pejabat").prop("disabled", true);
            $("#a_poskod_pejabat").prop("disabled", true);
            $("#a_bandar_pejabat").prop("disabled", true);
            $("#a_negeri_pejabat").prop("disabled", true);
        }
        else {
            $("#a_pendapatan").prop({disabled: false});
            $("#a_majikan").prop("disabled", false);
            $("#a_no_tel_pejabat").prop("disabled", false);
            $("#a_samb").prop("disabled", false);
            $("#a_alamat_pejabat").prop("disabled", false);
            $("#a_poskod_pejabat").prop("disabled", false);
            $("#a_bandar_pejabat").prop("disabled", false);
            $("#a_negeri_pejabat").prop("disabled", false);
        }
		if(val_pekerjaan==4) $("#a_pendapatan").prop({disabled: false});
    });

    $("#b_pekerjaan").change(function(){
        var val_pekerjaan = $(this).val();
        if (val_pekerjaan == 6 || val_pekerjaan == 5 || val_pekerjaan == 4  ) {
            $("#b_pendapatan").prop({disabled: true});
            $("#b_majikan").prop("disabled", true);
            $("#b_no_tel_pejabat").prop("disabled", true);
            $("#b_samb").prop("disabled", true);
            $("#b_alamat_pejabat").prop("disabled", true);
            $("#b_poskod_pejabat").prop("disabled", true);
            $("#b_bandar_pejabat").prop("disabled", true);
            $("#b_negeri_pejabat").prop("disabled", true);
        }
        else {
            $("#b_pendapatan").prop({disabled: false});
            $("#b_majikan").prop("disabled", false);
            $("#b_no_tel_pejabat").prop("disabled", false);
            $("#b_samb").prop("disabled", false);
            $("#b_alamat_pejabat").prop("disabled", false);
            $("#b_poskod_pejabat").prop("disabled", false);
            $("#b_bandar_pejabat").prop("disabled", false);
            $("#b_negeri_pejabat").prop("disabled", false);
        }
		if(val_pekerjaan==4) $("#b_pendapatan").prop({disabled: false});
    });

    $("#c_pekerjaan").change(function(){
        var val_pekerjaan = $(this).val();
        //alert(val_pekerjaan);
        if (val_pekerjaan == 6 || val_pekerjaan == 5 || val_pekerjaan == 4  ) {
            $("#c_pendapatan").prop({"disabled": true});
            $("#c_majikan").prop("disabled", true);
            $("#c_no_tel_pejabat").prop("disabled", true);
            $("#c_samb").prop("disabled", true);
            $("#c_alamat_pejabat").prop("disabled", true);
            $("#c_poskod_pejabat").prop("disabled", true);
            $("#c_bandar_pejabat").prop("disabled", true);
            $("#c_negeri_pejabat").prop("disabled", true);
        }
        else {
            $("#c_pendapatan").prop({disabled: false});
            $("#c_majikan").prop("disabled", false);
            $("#c_no_tel_pejabat").prop("disabled", false);
            $("#c_samb").prop("disabled", false);
            $("#c_alamat_pejabat").prop("disabled", false);
            $("#c_poskod_pejabat").prop("disabled", false);
            $("#c_bandar_pejabat").prop("disabled", false);
            $("#c_negeri_pejabat").prop("disabled", false);
        }
		if(val_pekerjaan==4) $("#c_pendapatan").prop({disabled: false});
    });
});
</script>
