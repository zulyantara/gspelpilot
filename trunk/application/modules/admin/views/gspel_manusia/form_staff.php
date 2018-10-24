<?php

// filename : form_staff.php
// echo $jenis_proses;
// exit;
/*
Author : toosa
CREDENTIAL DAN PANGKU TUGAS
*/

  if ($jenis_proses == "edit_staff")
      {
          $action = site_url('admin/gspel_manusia/edit_staff');
          $nama = $res_sipt->nama;
          $id = $res_sipt->id;
          $no_mykad = $res_sipt->no_mykad;
          $no_gaji = $res_sipt->no_gaji;
          $no_hp = $res_sipt->no_hp;
          $emel = $res_sipt->emel;
          $id_agama = $res_sipt->id_agama;
          $id_bangsa = $res_sipt->id_bangsa;
          $status_perkahwinan = $res_sipt->status_perkahwinan;
          $jantina = $res_sipt->jantina;
          $alamat = $res_sipt->alamat;
          $id_jabatan = isset($res_sipt) ? $res_sipt->id_jabatan : "";
          $id_jawatan = isset($res_sipt) ? $res_sipt->id_jawatan : "";
          $status_jawatan = isset($res_sipt) ? $res_sipt->status_jawatan : "";
          $id_jenis_jawatan = isset($res_sipt) ? $res_sipt->id_jenis_jawatan : "";
          $id_negeri = isset($res_sipt) ? $res_sipt->id_negeri : "";
          $id_giatmara = isset($res_sipt) ? $res_sipt->id_giatmara : "";
          $id_kursus = isset($res_sipt) ? $res_sipt->id_kursus : "";
          $tarikh_mula_tugas = isset($res_sipt) ? $res_sipt->tarikh_mula_tugas : "";
          $tarikh_tamat_tugas = isset($res_sipt) ? $res_sipt->tarikh_tamat_tugas : "";
          $status = isset($res_sipt) ? $res_sipt->status : "";
          $group = isset($row_admin_users_groups) ? $row_admin_users_groups->group_id : "";
      }
      elseif ($jenis_proses="add_staff")
      {
          $action = site_url('admin/gspel_manusia/add_staff');

          $nama = "";
          $no_mykad = NULL;
          $no_gaji = NULL;
          $no_hp = NULL;
          $emel = NULL;
          $id_agama = 1;
          $id_bangsa = 1;
          $status_perkahwinan = 1;
          $jantina = 1;
          $alamat = "";
          $group = "";

      }
    ?>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <?php if($this->session->flashdata('flashSuccess')) { ?>
    <div class='flashMsg flashSuccess alert alert-success'>
       <?php echo $this->session->flashdata('flashSuccess') ?> </div>
     <?php } ?>

     <?php if($this->session->flashdata('flashError')) { ?>
     <div class='flashMsg flashError alert alert-danger'>
        <?php echo $this->session->flashdata('flashError') ?> </div>
      <?php } ?>

    <div class="box box-solid box-primary">
      <div class="box-header with-border">
          <h3 class="box-title">Maklumat Staf</h3>
      </div>

  		    <div class="box-body panel-collapse collapse in" id="collapse1">
            <?php echo validation_errors() ?>

  		      <form class="form-horizontal" id="formstaff" name="formstaff" action="<?php echo $action;?>" method=post>
              <?php echo form_hidden('txt_id',$id); ?>

  		          <div class="form-group">
  		              <label for="txt_nama" class="col-sm-2 control-label">Nama*</label>
  		              <div class="col-sm-10">
  		                  <div class="row">
  		                      <div class="col-md-4">
                                <input required type=text class="form-control " name="txt_nama" id="txt_nama"
                                value="<?php echo $nama;?>" >
  		                      </div>
  		                  </div>
  		              </div>
  		          </div>

  		            <div class="form-group">
  		                <label for="txt_no_mykad" class="col-sm-2 control-label">No. MyKAD*</label>
  		                <div class="col-sm-10">
  		                    <div class="row">
  		                        <div class="col-md-4">
  															<input type=text class="form-control " name="txt_no_mykad" id="txt_no_mykad"
  															value="<?php echo $no_mykad; ?>">
  		                        </div>
  		                    </div>
  		                </div>
  		            </div>

  								<div class="form-group">
  		                <label for="txt_no_gaji" class="col-sm-2 control-label">No. Gaji*</label>
  		                <div class="col-sm-10">
  		                    <div class="row">
  		                        <div class="col-md-4">
  															<input type=text class="form-control " name="txt_no_gaji" id="txt_no_gaji"
  															value="<?php echo $no_gaji;?>">
  		                        </div>
  		                    </div>
  		                </div>
  		            </div>

  								<div class="form-group">
  										<label for="txt_no_tel" class="col-sm-2 control-label">No. Tel</label>
  										<div class="col-sm-10">
  												<div class="row">
  														<div class="col-md-4">
  															<input type=text class="form-control " name="txt_no_tel" id="txt_no_tel"
  															value="<?php echo $no_hp;?>">
  														</div>
  												</div>
  										</div>
  								</div>

  								<div class="form-group">
  										<label for="email" class="col-sm-2 control-label">Emel*</label>
  										<div class="col-sm-10">
  												<div class="row">
  														<div class="col-md-4">
  															<input type=email class="form-control " name="txt_email" id="email"
  															placeholder="Masukkan emel" value="<?php echo $emel;?>">
  														</div>
  												</div>
  										</div>
  								</div>

  		            <div class="form-group">
  		                <label for="opt_agama" class="col-sm-2 control-label">Agama* </label>
  		                <div class="col-sm-10">
  		                    <div class="row">
  		                        <div class="col-md-4">
  		                            <select class="form-control" name="opt_agama" id="opt_agama">
  		                                <option value="">Sila Pilih</option>
  		                                <?php
  		                                if ($res_agama !== FALSE)
  		                                {

  		                                    foreach ($res_agama as $val)
  		                                    {
  																						if ($id_agama==$val->id){
  																								$sel_agama = "selected";
  																						} else {
  																							$sel_agama = "";
  																						}
  																						// $sel_agama = $res_sipt->id_agama == $val->id ? "selected=\"selected\"" : "";
  		                                        ?>
  		                                        <option value="<?php echo $val->id; ?>" <?php echo $sel_agama; ?>><?php echo $val->agama; ?></option>
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
  										<label for="opt_bangsa" class="col-sm-2 control-label">Bangsa*</label>
  										<div class="col-sm-10">
  												<div class="row">
  														<div class="col-md-4">
  																<select class="form-control" name="opt_bangsa" id="opt_bangsa">
  																		<option value="">Sila Pilih</option>
  																		<?php
  																		if ($res_bangsa !== FALSE)
  																		{

  																				foreach ($res_bangsa as $val)
  																				{
  																						if ($id_bangsa==$val->id){
  																								$sel_bangsa = "selected";
  																						} else {
  																							$sel_bangsa = "";
  																						}
  																						// $sel_agama = $res_sipt->id_agama == $val->id ? "selected=\"selected\"" : "";
  																						?>
  																						<option value="<?php echo $val->id; ?>" <?php echo $sel_bangsa; ?>><?php echo $val->bangsa; ?></option>
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
  										<label for="opt_taraf_perkahwinan" class="col-sm-2 control-label">Status Perkahwinan*</label>
  										<div class="col-sm-10">
  												<div class="row">
  														<div class="col-md-4">
  																<select class="form-control" name="opt_taraf_perkahwinan" id="opt_taraf_perkahwinan">
  																		<option value="">Sila Pilih</option>
  																		<?php
  																		if ($res_taraf_perkahwinan !== FALSE)
  																		{

  																				foreach ($res_taraf_perkahwinan as $val)
  																				{
  																						if ($status_perkahwinan == $val->id){
  																								$sel_taraf_perkahwinan = "selected";
  																						} else {
  																							$sel_taraf_perkahwinan = "";
  																						}
  																						// $sel_agama = $res_sipt->id_agama == $val->id ? "selected=\"selected\"" : "";
  																						?>
  																						<option value="<?php echo $val->id; ?>" <?php echo $sel_taraf_perkahwinan; ?>><?php echo $val->taraf_perkahwinan; ?></option>
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
  										<label for="opt_jantina" class="col-sm-2 control-label">Jantina</label>
  										<div class="col-sm-10">
  												<div class="row">
  														<div class="col-md-4">
  															<select class="form-control" name="opt_jantina" id="opt_jantina">
  																<option value="">Sila Pilih</option>
  																<?php
  																$arr_jantina = array("1" => "Lelaki", "2" => "Perempuan");
  																foreach ($arr_jantina as $kj => $vj)
  																{
  																	$sel_jantina = $kj == $jantina ? "selected=\"selected\"" : "";
  																	?>
  																	<option value="<?php echo $kj; ?>" <?php echo $sel_jantina; ?>><?php echo $vj; ?></option>
  																	<?php
  																}
  																?>
  															</select>


  														</div>
  												</div>
  										</div>
  								</div>

  								<div class="form-group">
  										<label for="txt_alamat" class="col-sm-2 control-label">Alamat*</label>
  										<div class="col-sm-10">
  												<div class="row">
  														<div class="col-md-4">
  															<!-- <textarea class="form-control " name="txt_alamat" id="txt_alamat"
  															value="<?php #echo $alamat;?>"></textarea> -->
  															<?php echo form_textarea('txt_alamat',$alamat,'class = "form-control" id="txt_alamat"'); ?>

  														</div>
  												</div>
  										</div>
  								</div>

  								<div class="form-group">
  										<label for="txt_alamat" class="col-sm-2 control-label">Group*</label>
  										<div class="col-sm-10">
  												<div class="row">
  														<div class="col-md-4">
                                <?php
                                foreach ($res_group as $val_group)
                                {
                                  $options[$val_group->id] = $val_group->name;
                                }

                                $extra["id"] = "opt_group";
                                $extra["class"] = "form-control";

                                echo form_dropdown('opt_group', $options, $group, $extra);
                                ?>
  														</div>
  												</div>
  										</div>
  								</div>

  		            <div class="form-group">
  		                <div class="col-sm-offset-2 col-sm-10">
  												<a href="<?php echo site_url("admin/gspel_manusia/"); ?>" class="btn btn-primary btn-sm">Kembali</a>
  												<button type="submit" name="btn_simpan" id="btn_simpan" value="simpan" class="btn btn-primary btn-sm">Simpan</button>
  		                </div>
  		            </div>
  		        </form>
  		    </div>
  </div>

<?php
/*
Author : toosa
CREDENTIAL DAN PANGKU TUGAS
*/

if ($jenis_proses == "edit_staff_test")
// View Maklumat tugas and Login Credential forms
  {
    ?>
    <div class="box box-solid box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Maklumat Login System : <B><?php echo $nama;?> </B> </h3>
        </div>
    </div>

      <!-- Dynamic Tab -->
      <div class="container">
        <!-- <h2>Dynamic Tabs</h2> -->
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#menu1">User Login</a></li>
          <li ><a data-toggle="tab" href="#tugas1">Tugas 1</a></li>
          <!-- <li><a data-toggle="tab" href="#menu2">Menu 2</a></li> -->

        </ul>

        <div class="tab-content">
              <div id="menu1" class="tab-pane fade in active">
                <h3>Login Credential</h3>
                  <div class="box-body">
                      <form class="form-horizontal" action="<?php echo site_url("admin/gspel_manusia/edit_staff_info_pangku_tugas"); ?>" method="post">
                        <input type="hidden" name="id_admin" value=<?php echo $id; ?> >
                        <div class="form-group">
                            <label for="txt_username" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type=text class="form-control " name="txt_username" id="inputdefault"
                                        value="<?php echo "username";?>" required="required">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txt_password" class="col-sm-2 control-label">Katalaluan</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type=text class="form-control " name="txt_password" id="inputdefault"
                                        value="<?php echo "password";?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" name="btn_simpan_username" id="btn_simpan_username" value="simpan" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                  </div>
                        <?php
                    // if ($check_username) {
                    //
                    //
                    // } else {
                    //
                    // };
                        ?>
              </div>
              <div id="tugas1" class="tab-pane fade">
                <h3>Tugas</h3>
                  <div class="box-body">
                    <form class="form-horizontal" action="<?php echo site_url("admin/gspel_manusia/edit_staff_info_pangku_tugas"); ?>" method="post">
                      <div class="form-group">
                          <label for="txt_username" class="col-sm-2 control-label">Username</label>
                          <div class="col-sm-10">
                              <div class="row">
                                  <div class="col-md-4">
                                      <input type=text class="form-control " name="txt_username" id="inputdefault"
                                      value="<?php echo "username";?>">
                                  </div>
                              </div>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="txt_nama" class="col-sm-2 control-label">Nama</label>
                          <div class="col-sm-10">
                              <div class="row">
                                  <div class="col-md-4">
                                      <input type=text class="form-control " name="txt_nama" id="inputdefault"
                                      value="<?php echo $res_sipt->nama;?>">
                                  </div>
                              </div>
                          </div>
                      </div>

                        <div class="form-group">
                          <label for="opt_negeri" class="col-sm-2 control-label">Negeri</label>
                              <div class="col-sm-10">
                                   <div class="row">
                                      <div class="col-md-4">
                                            <select class="form-control" name="opt_negeri" id="opt_negeri">
                                                <option value="">Sila Pilih</option>
                                                <?php
                                                if ($res_negeri !== FALSE)
                                                {
                                                    foreach ($res_negeri as $val)
                                                    {
                                                        $sel_negeri = $id_negeri == $val->id ? "selected=\"selected\"" : "";
                                                        ?>
                                                        <option value="<?php echo $val->id; ?>" <?php echo $sel_negeri; ?>><?php echo $val->nama_negeri; ?></option>
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
                        <label for="opt_giatmara" class="col-sm-2 control-label">Giatmara</label>
                              <div class="col-sm-10">
                                  <div class="row">
                                      <div class="col-md-4">
                                          <select class="form-control" name="opt_giatmara" id="opt_giatmara">
                                              <option value="">Sila Pilih</option>
                                              <?php
                                              if ($res_giatmara !== FALSE)
                                              {
                                                  foreach ($res_giatmara as $val)
                                                  {
                                                      $sel_giatmara = $id_giatmara == $val->id ? "selected=\"selected\"" : "";
                                                      ?>
                                                      <option value="<?php echo $val->id; ?>" <?php echo $sel_giatmara; ?>><?php echo $val->nama_giatmara; ?></option>
                                                      <?php
                                                  }
                                              }
                                              ?>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                    </div>

                    </form>
                </div>
              </div>
        </div>
  </div>


  <?php
  }
 ?>

<script type="text/javascript">
$(document).ready(function(){
  var ruleSet1 = {
        required: true
      };

  var ruleSet2 = {
        required: true,
        number: true,
        minlength: 12,
        maxlength: 12
      };

  var ruleSetEmail = {
        required: true,
        email: true
      };

      $("#formstaff").validate({
        rules: {
            txt_nama: ruleSet1,
            txt_no_mykad: ruleSet2,
            txt_no_gaji: ruleSet1,
            email: ruleSetEmail,
            opt_agama: ruleSet1,
            opt_bangsa:  ruleSet1,
            opt_taraf_perkahwinan: ruleSet1,
            opt_jantina: ruleSet1,
            txt_alamat: ruleSet1
          },
        messages: {
            txt_nama: "Sila isikan ruangan ini",
            txt_no_mykad: {
              required: "Sila isikan ruangan ini",
              number: "Isi dengan angka",
              minlength: "Minimum 12 digit",
              maxlength: "Maximum 12 digit"
            },
              txt_no_gaji: "Sila isikan ruangan ini",
              email: {
                required: "Sila isikan ruangan ini",
                email: "Sila isikan email yang valid"
              },
              opt_agama: "Sila pilih agama",
              opt_bangsa: "Sila pilih bangsa",
              opt_taraf_perkahwinan: "Sila pilih taraf perkahwinan",
              opt_jantina: "Sila pilih jantina",
              txt_alamat: "Sila isikan ruangan ini"
              }
    });

    $('.glyphicon').click(function () {
        $(this).toggleClass("glyphicon-circle-arrow-down").toggleClass("glyphicon-circle-arrow-upglyphicon-circle-arrow-down");
    });

    $("#txt_tarikh_mula_tugas").datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });

    $("#txt_tarikh_tamat_tugas").datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });

    $("#opt_negeri").change(function(){
        var val_negeri = $("#opt_negeri").val();
        $.ajax({
            url: "<?php echo site_url("admin/gspel_manusia/ajax_giatmara"); ?>",
            data: {id_negeri: val_negeri},
            method: "POST",
            beforeSend: function(){
        $('#divShow').html("<div><img height='100px' src='<?php echo base_url("assets/images/loading.gif")?>'></div>");
      },
            success: function(data) {
                $("#opt_giatmara").html(data);
            }
        });
    });
});
</script>
