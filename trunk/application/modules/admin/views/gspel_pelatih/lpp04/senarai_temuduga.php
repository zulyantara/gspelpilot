<style>
	.error{color:#FF0000;}
</style>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
$.validator.setDefaults({
	submitHandler: function() {
		//alert("submitted!");
		ct=document.title;
		document.title = "Loading...";// :-) proudly present by ridei.karim@gmail.com
		window.status ="Loading .. please wait";//to tell the user what's going on
		//xx = document.getElementByI("albaqoroh").value;
		cbtx = $("#albaqoroh").val();
		$("#albaqoroh").val("Loading...");
		$("#albaqoroh").disabled="true";
		//alert(xx);
		//return false;
		$.ajax({
			data: $("#form-bp").serialize(),
			url: '<?php echo base_url();?>admin/lpp04/tetapkan_temuduga',
			type: 'POST',
			dataType: 'json',
			success: function (data) {
				document.title=ct;
				window.status="";
				$("#albaqoroh").disabled="false";
				$("#albaqoroh").val(cbtx);
				//console.log(data);
				if( data.success > 0 ){
					if(data.error>0) alert( "Tetapan temuduga berjaya dilakukan untuk "+data.success+" calon, gagal untuk "+data.error+" calon" );
					var loc = "<?php echo site_url('admin/lpp04/cetakan_surat_temuduga/'); ?>";
					//alert(data.simpan);
					window.location = loc;
				} else {
					alert(data.simpan);
				}
				/*
				if (data.simpan==1) {
					//var loc = "<?php echo site_url('admin/lpp04/tetapan_temuduga/'); ?>";
					var loc = "<?php echo site_url('admin/lpp04/cetakan_surat_temuduga/'); ?>";
					window.location = loc;
				} else {
					alert('Sila pilih sekurang-kurangnya seorang calon!');
				}*/
			}
		});
	}
});

$( document ).ready( function () {
	$("#form-bp").validate({
	    rules: {
			txt_tgl: "required",
			txt_jam: "required",
			txt_tempat: "required",
			opt_pegawai: "required",
			txt_jawatan: "required",
			txt_emel: "required",
			txt_no_telefon: "required",
	    },
	    messages: {
			txt_tgl: "Sila isikan ruangan ini",
			txt_jam: "Sila isikan ruangan ini",
			txt_tempat: "Sila isikan ruangan ini",
			opt_pegawai: "Sila isikan ruangan ini",
			txt_jawatan: "Sila isikan ruangan ini",
			txt_emel: "Sila isikan ruangan ini",
			txt_no_telefon: "Sila isikan ruangan ini",
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

  /*
  $("#simpan").click(function(event){
    event.preventDefault();
    $("#potongan-error").html("");
    var pot_values = $("input[name='potselector[]']").map(function(){return $(this).val();}).get();
    if (pot_values.length>0) {
      if ($("#form-bp").valid()) {
        $("#potongan-error").html("");
        $.ajax({
    			data: $("#form-bp").serialize(),
    			url: '<?php echo base_url();?>admin/programreg/simpan_permohonan',
    			type: 'POST',
    			dataType: 'json',
    			success: function (data) {
            if (data.status == 0) {
              var loc = "<?php echo site_url('admin/programreg/detailprofil/'); ?>";
              window.location = loc + <?php echo $idtemudugatetapan; ?>;
            } else {
              var loc = "<?php echo site_url('admin/programreg'); ?>";
              window.location = loc;
            }
    			}
    		});
      }
    } else {
      $("#potongan-error").html("Sila isikan ruangan ini");
    }
  });
  */
});
</script>

<div class="row">
    <div class="col-md-12">

        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tetapan GIATMARA dan Kursus</h3>
            </div>

            <div class="box-body">
                <form class="form-horizontal" action="<?php echo site_url($url); ?>" method="post">
                    <div class="form-group">
                        <label for="opt_negeri" class="col-sm-2 control-label">NEGERI</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <select class="form-control" name="opt_negeri" id="opt_negeri">
                                        <!-- <option value="">Sila Pilih</option> -->
                                        <?php
                                        if ( ! empty($row_negeri))
                                        {
																					if (is_array($row_negeri))
                                          {
                                            echo "<option value=\"\">Sila Pilih</option>";
                                            foreach ($row_negeri as $val_negeri)
                                            {
																							$sel_negeri = $val_negeri->id == $id_negeri ? "selected=\"selected\"" : "";
                                              ?>
                                              <option value="<?php echo $val_negeri->id; ?>" <?php echo $sel_negeri; ?>><?php echo $val_negeri->nama_negeri; ?></option>
                                              <?php
                                            }
                                          }
                                          else
                                          {
                                            ?>
                                            <option value="<?php echo $row_negeri->id; ?>"><?php echo $row_negeri->nama_negeri; ?></option>
                                            <?php
                                          }
                                            ?>
                                            <option value="<?php echo $row_negeri->id; ?>"><?php echo $row_negeri->nama_negeri; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="opt_giatmara" class="col-sm-2 control-label">GIATMARA</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <select class="form-control" name="opt_giatmara" id="opt_giatmara">
                                        <?php
                                        if ($res_giatmara !== NULL)
                                        {
																						echo "<option value=\"\">Sila Pilih</option>";
                                            foreach ($res_giatmara as $val_giatmara)
                                            {
																							$sel_giatmara = $val_giatmara->id == $id_giatmara ? "selected=\"selected\"": "";
                                                ?>
                                                <option value="<?php echo $val_giatmara->id; ?>" <?php echo $sel_giatmara; ?>><?php echo $val_giatmara->nama_giatmara; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="opt_kursus" class="col-sm-2 control-label">KURSUS</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <select class="form-control" name="opt_kursus" id="opt_kursus">
                                        <option value="">Sila Pilih</option>
                                        <?php
                                		if ( ! empty($res_kursus))
                                		{
                                			foreach ($res_kursus as $val_kursus)
                                			{
												$sel_kursus = $val_kursus->id_kursus == $kursus ? "selected=\"selected\"" : "";
                                				?>
                                				<option value="<?php echo $val_kursus->id_kursus; ?>" <?php echo $sel_kursus; ?>><?php echo $val_kursus->nama_kursus; ?></option>
                                				<?php
                                			}
                                		}
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="opt_warganegara" class="col-sm-2 control-label">WARGANEGARA</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <select class="form-control" name="opt_warganegara" id="opt_warganegara">
                                        <option value="">Sila Pilih</option>
                                        <?php
                                        if ( ! empty($res_kewarganegaraan))
                                        {
                                            foreach ($res_kewarganegaraan as $val_kwg)
                                            {
												$sel_warganegara = $val_kwg->id == $warganegara ? "selected=\"selected\"" : "";
                                                ?>
                                                <option value="<?php echo $val_kwg->id; ?>" <?php echo $sel_warganegara; ?>><?php echo $val_kwg->kewarganegaraan; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="opt_sesi_kemasukan" class="col-sm-2 control-label">SESI KEMASUKAN</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <select class="form-control" name="opt_sesi_kemasukan" id="opt_sesi_kemasukan">
										<?php
										if (isset($res_sesi))
										{
											foreach ($res_sesi as $val_sesi)
											{
												$sel_sesi = $val_sesi->id_intake == $sesi ? "selected=\"selected\"" : "";
												?>
												<option value="<?php echo $val_sesi->id_intake; ?>" <?php echo $sel_sesi; ?>><?php echo $val_sesi->nama_intake; ?></option>
												<?php
											}
										}
										else
										{
											?>
											<option value="">Sila Pilih</option>
											<?php
										}
										?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" name="btn_tetapkan" value="tetapkan">Tetapkan</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

<?php /* <form id="form-bp" class="form-horizontal" action="<?php echo site_url("admin/lpp04/tetapkan_temuduga"); ?>" method="post"> */ ?>
<form id="form-bp" class="form-horizontal" method="post">
	<input type="hidden" name="id_giatmara" value="<?php echo $id_giatmara; ?>">
	<span id="prosesBar"></span>
	<div class="box box-solid box-primary">
  		<div class="box-header with-border">
    		<h3 class="box-title">Tetapan GIATMARA dan Kursus</h3>
  		</div>
  		<div class="box-body">
			<table class="table table-bordered table-striped table-hover" id="tbl_senarai_temuduga">
				<thead>
					<tr>
						<th>No</th>
						<th>NAMA</th>
						<th>NO. MyKAD</th>
						<th>PILIHAN</th>
						<th>TARIKH MOHON</th>
						<th>NO TELEFON</th>
						<th>TEMUDUGA</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if ( ! empty($res_senarai_permohonan))
					{
						#echo "<pre>";print_r($res_senarai_permohonan);echo "</pre>";
						$no=0;
						foreach ($res_senarai_permohonan as $val_sp)
						{
							?>
							<tr>
								<td><?php echo $no += 1; ?></td>
								<td>
									<button type="button" name="button" onclick="window.open('<?php echo site_url("screen_lapan/generate_pdf/".$val_sp->id_permohonan_butir_peribadi); ?>', 'newwindow', height=800, width=800);" class="btn btn-link" style="text-align: left;"><?php echo $val_sp->nama_penuh; ?></button>
								</td>
								<td id="no_mykad"><?php echo $val_sp->no_mykad; ?></td>
								<td><?php echo $val_sp->pilihan; ?></td>
								<td><?php echo $val_sp->tarikh_mohon; ?></td>
								<td><?php echo $val_sp->no_hp; ?></td>
								<td align=center><input type="checkbox" name="chk_temuduga[<?php echo $val_sp->id_permohonan_butir_peribadi; ?>]" value="<?php echo $val_sp->id_settings_tawaran_kursus; ?>"></td>
							</tr>
							<?php
						}
					}
					?>
				</tbody>
			</table>
		</div>
	</div>

	<div class="box box-solid box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Tetapkan Temuduga</h3>
		</div>

		<div class="box-body">
			<div class="form-group">
				<label for="txt_tgl" class="col-sm-2 control-label">Tarikh & waktu Temuduga</label>
				<div class="col-sm-10">
					<div class="row">
						<div class="col-md-2">
							<input type="text" class="form-control" name="txt_tgl" id="txt_tgl">
						</div>
						<div class="col-md-2">
							<!-- <input type="text" class="form-control" name="txt_jam" id="txt_jam"> -->
							<select class="form-control" name="opt_masa">
								<?php
								for ($masa=8; $masa <= 18; $masa++)
								{
									?>
									<option value="<?php echo strlen($masa) == 1 ? "0".$masa : $masa; ?>"><?php echo strlen($masa) == 1 ? "0".$masa : $masa; ?></option>
									<?php
								}
								?>
							</select>
						</div>
						<div class="col-md-2">
							<!-- <input type="text" class="form-control" name="txt_jam" id="txt_jam"> -->
							<select class="form-control" name="opt_menit">
								<?php
								for ($menit=0; $menit <= 59; $menit++)
								{
									?>
									<option value="<?php echo strlen($menit) == 1 ? "0".$menit : $menit; ?>"><?php echo strlen($menit) == 1 ? "0".$menit : $menit; ?></option>
									<?php
								}
								?>
							</select>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="txt_tempat" class="col-sm-2 control-label">Tempat Temuduga</label>
				<div class="col-sm-10">
					<div class="row">
						<div class="col-md-4">
							<input type="text" class="form-control" name="txt_tempat" id="txt_tempat" value="<?php echo $nama_giatmara; ?>">
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="opt_pegawai" class="col-sm-2 control-label">Pegawai Yang Boleh Dihubungi</label>
				<div class="col-sm-10">
					<div class="row">
						<div class="col-md-5">
							<select class="form-control" name="opt_pegawai" id="opt_pegawai">
								<option value="">Sila Pilih</option>
								<?php
								if ( ! empty($res_staff))
								{
									foreach ($res_staff as $val_staff)
									{
										?>
										<option value="<?php echo $val_staff->id_staff; ?>"><?php echo $val_staff->nama; ?></option>
										<?php
									}
								}
								?>
							</select>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="txt_jawatan" class="col-sm-2 control-label">Jawatan</label>
				<div class="col-sm-10">
					<div class="row">
						<div class="col-md-5">
							<input type="text" name="txt_jawatan" id="txt_jawatan" class="form-control">
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="txt_emel" class="col-sm-2 control-label">Emel</label>
				<div class="col-sm-10">
					<div class="row">
						<div class="col-md-5">
							<input type="email" class="form-control" name="txt_emel" id="txt_emel" value="<?php echo $email_giatmara; ?>">
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="txt_no_telefon" class="col-sm-2 control-label">No telefon</label>
				<div class="col-sm-10">
					<div class="row">
						<div class="col-md-4">
							<input type="text" class="form-control" name="txt_no_telefon" id="txt_no_telefon" value="<?php echo $telefon_giatmara; ?>">
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<!-- button type="submit" class="btn btn-primary" name="btn_tetapkan_temuduga" value="tetapkan_temuduga" id="albaqoroh" >Tetapkan Temuduga dan Tulis Surat Penggilan Temuduga</button -->
					<input type="submit"  name="btn_tetapkan_temuduga" id="albaqoroh" value="Tetapkan Temuduga dan Tulis Surat Panggilan Temuduga" class="btn btn-primary">
				</div>
			</div>
	  	</div>
	</div>
</form>

<script type="text/javascript">
$(document).ready(function(){
	$("#nama_penuh").click(function(event){
		event.preventDefault();
	});

	$(".nama-penuh").click(function(){
		var mykad = $(this).closest('tr').children('td#no_mykad').text();
		$.ajax({
			data: {no_mykad: mykad},
			url: "<?php echo site_url("admin/lpp04/info_permohonan"); ?>",
			type: "POST",
			success : function(response) {
				var data = JSON.parse(response);
				$("#butirPribadi").val(data.nama_penuh);
				$("#maklumatAM").val(data.nama_penuh);
				$("#kursusPilihan").val(data.nama_penuh);
				$("#maklumatPenjaga").val(data.nama_penuh);
				$("#tempatTinggal").val(data.alamat);
				$("#pengakuan").val(data.pengakuan);
			},
			error: function()
			{
				alert("Invalide!");
			}
		})
	});

	$("#tbl_senarai_temuduga").DataTable();

	$('#txt_tgl').datepicker({
		dateFormat: "dd-mm-yy",
		changeMonth: true,
		changeYear: true,
		autoclose: true,
		yearRange: "-1:+1"
	});

	$('#txt_jam').timepicker({showInputs: false});

	$("#opt_pegawai").change(function(){
		var val_staff = $("#opt_pegawai").val();
		$.ajax({
			// dataType: 'json',
			data: {txt_staff : val_staff},
			url: "<?php echo site_url("admin/lpp04/jawatan_ajax"); ?>",
			type: "POST",
			success : function(data) {
				$("#txt_jawatan").val(data);
			}
		});
	});

	//$("#tbl_senarai_temuduga").DataTables();
});

$("#opt_negeri").change(function(){
		var val_negeri = $("#opt_negeri").val();
		$.ajax({
				// dataType: 'json',
				data: {txt_negeri : val_negeri},
				url: "<?php echo site_url("admin/lpp04/giatmara_ajax"); ?>",
				type: "POST",
				success : function(data) {
						$("#opt_giatmara").html(data);
				}
		});
});

$("#opt_giatmara").change(function(){
		var val_giatmara = $("#opt_giatmara").val();
		$.ajax({
				// dataType: 'json',
				data: {txt_giatmara : val_giatmara},
				url: "<?php echo site_url("admin/lpp04/kursus_ajax"); ?>",
				type: "POST",
				success : function(data) {
						$("#opt_kursus").html(data);
				}
		});
});

$("#opt_kursus").change(function(){
		var val_giatmara = $("#opt_giatmara").val();
		var val_kursus = $("#opt_kursus").val();
		$.ajax({
				// dataType: 'json',
				data: {txt_kursus : val_kursus, txt_giatmara : val_giatmara},
				url: "<?php echo site_url("admin/lpp04/intake_ajax"); ?>",
				type: "POST",
				success : function(data) {
						$("#opt_sesi_kemasukan").html(data);
				}
		});
});
</script>
