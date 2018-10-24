<?php
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
?>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Staf Info Pangku Tugas</h3>
    </div>
    <div class="box-body">
        <form class="form-horizontal" action="<?php echo site_url("admin/gspel_manusia/edit_staff_info_pangku_tugas"); ?>" method="post">
            <div class="form-group">
                <label for="opt_jabatan" class="col-sm-2 control-label">Jabatan</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-md-4">
                            <select class="form-control" name="opt_jabatan">
                                <option value="">Sila Pilih</option>
                                <?php
                                if ($res_jabatan !== FALSE)
                                {
                                    foreach ($res_jabatan as $val)
                                    {
                                        $sel_jabatan = $id_jabatan == $val->id ? "selected=\"selected\"" : "";
                                        ?>
                                        <option value="<?php echo $val->id; ?>" <?php echo $sel_jabatan; ?>><?php echo $val->nama_jabatan; ?></option>
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
                <label for="opt_jawatan" class="col-sm-2 control-label">Jawatan</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-md-4">
                            <select class="form-control" name="opt_jawatan">
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
                <label for="opt_status_jawatan" class="col-sm-2 control-label">Status Jawatan</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-md-4">
                            <select class="form-control" name="opt_status_jawatan">
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
                <label for="opt_jenis_jawatan" class="col-sm-2 control-label">Jenis Jawatan</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-md-4">
                            <select class="form-control" name="opt_jenis_jawatan">
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

            <div class="form-group">
                <label for="opt_kursus" class="col-sm-2 control-label">Kursus</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-md-4">
                            <select class="form-control" name="opt_kursus">
                                <option value="">Sila Pilih</option>
                                <?php
                                if ($res_kursus !== FALSE)
                                {
                                    foreach ($res_kursus as $val)
                                    {
                                        $sel_kursus = $id_kursus == $val->id ? "selected=\"selected\"" : "";
                                        ?>
                                        <option value="<?php echo $val->id; ?>" <?php echo $sel_kursus; ?>><?php echo $val->nama_kursus; ?></option>
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
                <label for="opt_jawatan" class="col-sm-2 control-label">Tarikh Mula Tugas</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="txt_tarikh_mula_tugas" id="txt_tarikh_mula_tugas" value="<?php echo $tarikh_mula_tugas; ?>" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="opt_jawatan" class="col-sm-2 control-label">Tarikh Tamat Tugas</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="txt_tarikh_tamat_tugas" id="txt_tarikh_tamat_tugas" value="<?php echo $tarikh_tamat_tugas; ?>" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="opt_status" class="col-sm-2 control-label">Status</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-md-4">
                            <select class="form-control" name="opt_status">
                                <?php
                                $arr_status = array(1=>"Aktif", 0=>"Tidak Aktif");
                                foreach ($arr_status as $key_status => $val_status)
                                {
                                    $sel_status = $status == $key_status ? "selected=\"selected\"" : "";
                                    ?>
                                    <option value="<?php echo $key_status; ?>" <?php echo $sel_status; ?>><?php echo $val_status; ?></option>
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
