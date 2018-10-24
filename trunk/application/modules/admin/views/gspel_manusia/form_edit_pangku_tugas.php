<?php

if ($jenis_proses == "edit_pangku_tugas") {

  $action = site_url("admin/gspel_manusia/pangku_tugas");

  $id_staff = $row_staff->id_staff;
  $id_tugas = $row_staff->id_staff_info_pangku_tugas;
  $nama = $row_staff->nama;
  $no_mykad = $row_staff->no_mykad;
  $id_jabatan = $row_staff->id_jabatan;
  $nama_jabatan = $row_staff->nama_jabatan;
  $id_jawatan = $row_staff->id_jawatan;
  $nama_jawatan = $row_staff->nama_jawatan;
  $status_jawatan = $row_staff->status_jawatan;
  $id_jenis_jawatan = $row_staff->id_jenis_jawatan;
  $id_negeri = $row_staff->id_negeri;
  $nama_negeri = $row_staff->nama_negeri;
  $id_giatmara = $row_staff->id_giatmara;
  $nama_giatmara = $row_staff->nama_giatmara;
  $id_kursus = $row_staff->id_kursus;
  $nama_kursus = $row_staff->nama_kursus;
  $status = $row_staff->status;
  $tarikh_mula_tugas = nice_date($row_staff->tarikh_mula_tugas,'d-m-Y');
  $tarikh_tamat_tugas = nice_date($row_staff->tarikh_tamat_tugas,'d-m-Y');
}
elseif ($jenis_proses == "del_pangku_tugas")
  {

  }
elseif ($jenis_proses == "add_pangku_tugas")
{
  $action = site_url("admin/gspel_manusia/add_pangku_tugas");

  $id_staff = $row_staff->id_staff;
  $id_tugas = $row_staff->id_staff_info_pangku_tugas;
  $nama = $row_staff->nama;
  $no_mykad = $row_staff->no_mykad;
  $id_jabatan = "";
  $nama_jabatan = $row_staff->nama_jabatan;
  $id_jawatan = "";
  $nama_jawatan = $row_staff->nama_jawatan;
  $status_jawatan = "";
  $id_jenis_jawatan = $row_staff->id_jenis_jawatan;
  $id_negeri = "";
  $nama_negeri = $row_staff->nama_negeri;
  $id_giatmara = "";
  $nama_giatmara = $row_staff->nama_giatmara;
  $id_kursus = "";
  $nama_kursus = $row_staff->nama_kursus;
  $status = "";
  $tarikh_mula_tugas = "";
  $tarikh_tamat_tugas = "";

}
// echo '<pre>'; print_r($tarikh_mula_tugas); echo '</pre>';
// exit;
 ?>

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
        <h3 class="box-title">Maklumat Staff</h3>
    </div>
    <div class="box-body">

        <form class="form-horizontal" action="<?php echo site_url("admin/gspel_manusia/tugas"); ?>" method="post">

            <div class="form-group">
                <label for="txt_nama" class="col-sm-2 control-label">Nama Staf</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <input  disabled type="text" name="txt_nama" id="txt_nama" class="form-control" value="<?php echo $nama;?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="txt_mykad" class="col-sm-2 control-label">No. MyKAD</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <input disabled type="text" name="txt_mykad" id="txt_mykad" class="form-control" value=<?php echo $no_mykad; ?>>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

<!-- Button navigasi -->

<div class="row">
  <div class="col-sm-4">
     <div class="btn-group">
     <!-- <a href="<?php #echo site_url("admin/gspel_manusia/"); ?>" class="btn btn-primary btn-sm">Kembali</a> -->
     <a href="<?php echo $prev_url."/".$id_staff;?>" class="btn btn-primary btn-sm">Kembali</a>
     <!-- <a href="<?php echo site_url("admin/gspel_manusia/add_staff"); ?>" class="btn btn-primary btn-sm">Tambah</a> -->
     </div>
   </div>
   <div class="col-sm-4"> </div>
 </div>
 <div class="row">
   <div class="col-sm-4"><h3> </h3></div>
    <div class="col-sm-4"> </div>
  </div>

<div class="box box-solid box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Konfigurasi Pangku Tugas</h3>
    </div>
    <div class="box-body">
        <form id="formEditPangkuTugas" class="form-horizontal" action="<?php $action; ?>" method="post">
          <?php echo form_hidden('id_staff',$id_staff);
                echo form_hidden('id_tugas',$id_tugas);
          ?>

            <div class="form-group">
                <label for="opt_jabatan" class="col-sm-2 control-label">Jabatan*</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                          <?php //echo $id_jabatan;?>
                            <select class="form-control" name="opt_jabatan" id="opt_jabatan">
                                <option value="">Sila Pilih</option>

                                    <?php

                                    if ($res_jabatan !== FALSE)
                                    {
                                        foreach ($res_jabatan as $val)
                                        {
                                            $sel_jabatan = $id_jabatan == $val->id ? "selected=\"selected\"" : "";

                                            ?>
                                            <option  value="<?php echo $val->id;?>" <?php echo $sel_jabatan; ?>>  <?php echo $val->nama_jabatan; ?></option>
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
                <label for="opt_jawatan" class="col-sm-2 control-label">Jawatan*</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <select class="form-control" name="opt_jawatan" id="opt_jawatan">
                              <option value="">Sila Pilih</option>
                              <?php
                              if ($res_jawatan !== FALSE)
                              {
                                  foreach ($res_jawatan as $val)
                                  {
                                      $sel_jawatan = $id_jawatan == $val->id ? "selected=\"selected\"" : "";
                                      ?>
                                      <option value="<?php echo $val->id; ?>" <?php echo $sel_jawatan; ?>><?php echo $val->nama_jawatan; ?></option>
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
                <label for="txt_status_jawatan" class="col-sm-2 control-label">Status Jawatan*</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                          <select class="form-control" name="opt_status_jawatan" id="opt_status_jawatan">
                              <?php
                              $arr_sj = array(1=>"Aktif", 0=>"Tidak Aktif");
                              foreach ($arr_sj as $key => $val)
                              {
                                  $sel_status_jawatan = $status_jawatan == $key ? "selected=\"selected\"" : "";
                                  ?>
                                  <option value="<?php echo $key; ?>" <?php echo $sel_status_jawatan; ?>><?php echo $val; ?></option>
                                  <?php
                              }
                              ?>
                          </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="opt_jenis_jawatan" class="col-sm-2 control-label">Jenis Jawatan*</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                          <select class="form-control" name="opt_jenis_jawatan" id="opt_jenis_jawatan">
                              <option value="">Sila Pilih</option>
                              <?php
                              if ($res_jenis_jawatan !== FALSE)
                              {
                                  foreach ($res_jenis_jawatan as $val)
                                  {
                                      $sel_jenis_jawatan = $id_jenis_jawatan == $val->id ? "selected=\"selected\"" : "";
                                      ?>
                                      <option value="<?php echo $val->id; ?>" <?php echo $sel_jenis_jawatan; ?>><?php echo $val->nama_jenis_jawatan; ?></option>
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
                <label for="opt_negeri" class="col-sm-2 control-label">Negeri*</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
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
                <label for="opt_giatmara" class="col-sm-2 control-label">Giatmara*</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
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

            <div class="form-group">
                <label for="opt_kursus" class="col-sm-2 control-label">Kursus*</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                          <select class="form-control" name="opt_kursus" id="opt_kursus">
                              <option value="">Sila Pilih</option>
                              <?php
                              if ($res_kursus !== FALSE)
                              {
                                // echo '<pre>'; print_r($res_kursus); echo '</pre>';
                            		// exit;
                                  foreach ($res_kursus as $val)
                                  {
                                      $sel_kursus = $id_kursus == $val->id ? "selected=\"selected\"" : "";
                                      ?>
                                      <option value="<?php echo $val->id; ?>" <?php //echo $sel_kursus; ?>><?php echo $val->nama_kursus; ?></option>
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
                <label for="txt_tarikh_mula_tugas" class="col-sm-2 control-label">Tarikh Mula Tugas*</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <input type="text" name="txt_tarikh_mula_tugas" id="txt_tarikh_mula_tugas" class="form-control" value=<?php echo $tarikh_mula_tugas;?>>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="txt_tarikh_tamat_tugas" class="col-sm-2 control-label">Tarikh Tamat Tugas*</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <input type="text" name="txt_tarikh_tamat_tugas" id="txt_tarikh_tamat_tugas" class="form-control" value=<?php echo $tarikh_tamat_tugas;?>>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="txt_status" class="col-sm-2 control-label">Status*</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                          <select class="form-control" name="opt_status" id="opt_status">
                              <?php
                              $arr_status = array(1=>"Aktif", 0=>"Tidak Aktif");
                              foreach ($arr_status as $key_status => $val_status)
                              {
                                  $sel_status = $status == $key_status ? "selected=\"selected\"" : "";
                                  ?>
                                  <option id="opt_status_tugas" value="<?php echo $key_status; ?>" <?php echo $sel_status; ?>><?php echo $val_status; ?></option>
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
                    <button type="submit" name="btn_simpan" id="btn_simpan" value="simpan" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
  var ruleSet1 = {
        required: true
      };

  $("#opt_giatmara").attr('disabled', true);
  $("#opt_kursus").attr('disabled', true);

  $("#formEditPangkuTugas").validate({
    rules: {
        opt_jabatan: ruleSet1,
        opt_jawatan: ruleSet1,
        opt_status_jawatan: ruleSet1,
        opt_jenis_jawatan: ruleSet1,
        opt_negeri: ruleSet1,
        opt_giatmara: ruleSet1,
        //opt_kursus: ruleSet1,
        txt_tarikh_mula_tugas: ruleSet1,
        txt_tarikh_tamat_tugas: ruleSet1,
        opt_status_tugas: ruleSet1

      },
    messages: {
        opt_jabatan: "Sila pilih  Jabatan",
        opt_jawatan: "Sila pilih  Jawatan",
        opt_status_jawatan: "Sila pilih Status Jawatan",
        opt_jenis_jawatan: "Sila pilih Jenis Jawatan",
        opt_negeri: "Sila pilih Negeri",
        opt_giatmara: "Sila pilih Giatmara",
        //opt_kursus: "Sila pilih Kursus",
        txt_tarikh_mula_tugas: "Sila pilih Tarikh",
        txt_tarikh_tamat_tugas: "Sila pilih Tarikh",
        opt_status_tugas: "Sila pilih Status Tugas"
        }
  });

    $("#txt_tarikh_mula_tugas").datepicker({
        dateFormat: "dd-mm-yy",
        autoclose: true
    });

    $("#txt_tarikh_tamat_tugas").datepicker({
        dateFormat: "dd-mm-yy",
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
                $("#opt_giatmara").attr('disabled', false);
                $("#opt_giatmara").html(data);

            }
        });
    });

    $("#opt_giatmara").change(function(){
        var val_giatmara = $("#opt_giatmara").val();
        var urlx = "<?php echo site_url("admin/gspel_manusia/ajax_giatmara_kursus/");?>"+val_giatmara;

        $.ajax({
            url: urlx,
            data: {id_giatmara: val_giatmara},
            method: "POST",
            beforeSend: function(){
                $('#divShow').html("<div><img height='100px' src='<?php echo base_url("assets/images/loading.gif")?>'></div>");
              },
            success: function(data) {
                $("#opt_kursus").attr('disabled', false);
                $("#opt_kursus").html(data);
            }
        });
    });
});

</script>
