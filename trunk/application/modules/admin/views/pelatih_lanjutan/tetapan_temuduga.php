<div class="box box-primary box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Tetapan GIATMARA dan Kursus</h3>
    </div>
    <div class="box-body">
        <form class="form-horizontal" id="frm_filter_tetapan_temuduga" action="<?php echo site_url("admin/pelatih_lanjutan/tetapan_temuduga"); ?>" method="post">
            <div class="form-group">
                <label for="opt_negeri" class="control-label col-sm-2">NEGERI</label>
                <div class="col-sm-10">
                    <select class="form-control" name="opt_negeri" id="opt_negeri">
                        <?php
                        if($res_negeri !== NULL)
                        {
                          if (is_array($res_negeri))
                          {
                            echo "<option value=\"\">SILA PILIH</option>";
                            foreach ($res_negeri as $val_negeri)
                            {
                                ?>
                                <option value="<?php echo $val_negeri->id; ?>"><?php echo $val_negeri->nama_negeri; ?></option>
                                <?php
                            }
                          }
                          else
                          {
                            ?>
                            <option value="<?php echo $res_negeri->id; ?>"><?php echo $res_negeri->nama_negeri; ?></option>
                            <?php
                          }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="opt_giatmara" class="control-label col-sm-2">GIATMARA</label>
                <div class="col-sm-10">
                    <select class="form-control" name="opt_giatmara" id="opt_giatmara">
                        <option value="<?php echo $row_giatmara->id_giatmara; ?>"><?php echo $row_giatmara->nama_giatmara; ?></option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="opt_kursus" class="control-label col-sm-2">KURSUS</label>
                <div class="col-sm-10">
                    <select class="form-control" name="opt_kursus" id="opt_kursus">
                        <option>Sila Pilih</option>
                        <?php
                        if ($res_kursus !== NULL)
                        {
                            foreach ($res_kursus as $val_kursus)
                            {
                                $sel_kursus = $this->session->tempdata("opt_kursus") == NULL ? "" : ($this->session->tempdata("opt_kursus") == $val_kursus->id_kursus ? "selected=\"selected\"" : "");
                                ?>
                                <option value="<?php echo $val_kursus->id_kursus; ?>" <?php echo $sel_kursus; ?>><?php echo $val_kursus->nama_kursus; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
              <label for="opt_sesi_kemasukan" class="control-label col-sm-2">SESI</label>
              <div class="col-sm-10">
                <select class="form-control" name="opt_sesi_kemasukan" id="opt_sesi_kemasukan">
                  <option value="">Sila Pilih</option>
                </select>
              </div>
            </div>
            <div class="form-group">
                <label for="opt_warganegara" class="control-label col-sm-2">WARGANEGARA</label>
                <div class="col-sm-10">
                    <select class="form-control" name="opt_warganegara" id="opt_warganegara">
                        <option>Sila Pilih</option>
                        <?php
                        if ($res_kewarganegaraan !== NULL)
                        {
                            foreach ($res_kewarganegaraan as $key => $val_kwg)
                            {
                                $sel_warganegara = $this->session->tempdata("opt_warganegara") == NULL ? "" : ($this->session->tempdata("opt_warganegara") == $val_kwg->id ? "selected=\"selected\"" : "");
                                ?>
                                <option value="<?php echo $val_kwg->id; ?>" <?php echo $sel_warganegara; ?>><?php echo $val_kwg->kewarganegaraan; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" name="btn_tetapkan" id="btn_tetapkan" value="Tetapkan">Tetapkan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<form class="form-horizontal" method="post" action="<?php echo site_url("admin/pelatih_lanjutan/tetapan_temuduga"); ?>">
    <input type="hidden" name="id_giatmara" value="<?php echo $id_giatmara; ?>">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Senarai Permohonan</h3>
        </div>
        <div class="box-body">
            <table class="table" id="tbl_senarai_permohonan_lpp09">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>NO. MYKAD</th>
                        <th>TARIKH MOHON</th>
                        <th>NO. TELEFON</th>
                        <th>TEMUDUGA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($res_tetapan_temuduga_lpp09 !== FALSE && is_array($res_tetapan_temuduga_lpp09))
                    {
                        $no = 0;
                        foreach ($res_tetapan_temuduga_lpp09 as $key => $val_tt)
                        {
                            $dt_tarikh = new DateTime($val_tt->tarikh_hantar);
                            ?>
                            <tr>
                                <input type="hidden" name="txt_id_kl[<?php echo $val_tt->id_permohonan_butir_peribadi; ?>]" value="<?php echo $val_tt->id_permohonan_kursus_lpp09; ?>">
                                <td><?php echo $no += 1; ?></td>
                                <td><?php echo $val_tt->nama_penuh; ?></td>
                                <td><?php echo $val_tt->no_mykad; ?></td>
                                <td><?php echo $dt_tarikh->format('d-m-Y'); ?></td>
                                <td><?php echo $val_tt->no_telefon; ?></td>
                                <td><input type="checkbox" name="chk_temuduga[<?php echo $val_tt->id_permohonan_butir_peribadi; ?>]" value="<?php echo $val_tt->id_settings_tawaran_kursus; ?>"></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Tetapkan Temuduga</h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="txt_tarikh_temuduga" class="col-sm-2 control-label">Tarikh Waktu Temuduga</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-2">
                            <input type="text" name="txt_tarikh_temuduga" id="txt_tarikh_temuduga" class="form-control">
                        </div>
                        <div class="col-sm-2">
                            <select class="form-control" name="opt_masa" id="opt_masa">
                                <?php
                                for ($i=8; $i <= 16; $i++) {
                                    $var_masa = strlen($i) > 1 ? $i : "0".$i;
                                    ?>
                                    <option value="<?php echo $var_masa; ?>"><?php echo $var_masa; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <!-- <input type="text" name="txt_waktu_temuduga" id="txt_waktu_temuduga" class="form-control"> -->
                        </div>
                        <div class="col-sm-2">
                            <select class="form-control" name="opt_menit" id="opt_menit">
                                <?php
                                for ($z=0; $z <= 59; $z++) {
                                    $var_masa = strlen($z) > 1 ? $z : "0".$z;
                                    ?>
                                    <option value="<?php echo $var_masa; ?>"><?php echo $var_masa; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <!-- <input type="text" name="txt_waktu_temuduga" id="txt_waktu_temuduga" class="form-control"> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="txt_tempat_temuduga" class="control-label col-sm-2">Tempat Temuduga</label>
                <div class="col-sm-10">
                    <input type="text" name="txt_tempat_temuduga" id="txt_tempat_temuduga" class="form-control" value="<?php echo $nama_giatmara; ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="opt_pegawai" class="col-sm-2 control-label">Pegawai Yang Boleh Dihubungi</label>
                <div class="col-sm-10">
                    <select class="form-control" name="opt_pegawai" id="opt_pegawai">
                        <option>Sila Pilih</option>
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

            <div class="form-group">
                <label for="txt_jawatan" class="control-label col-sm-2">Jawatan</label>
                <div class="col-sm-10">
                    <input type="text" name="txt_jawatan" id="txt_jawatan" class="form-control">
                    (Jawatan ini dipaparkan dalam surat panggilan temuduga sahaja)
                </div>
            </div>

            <div class="form-group">
                <label for="txt_email" class="control-label col-sm-2">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="txt_email" id="txt_email" class="form-control" value="<?php echo $email_giatmara; ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="txt_no_telefon" class="control-label col-sm-2">No. Telefon</label>
                <div class="col-sm-10">
                    <input type="text" name="txt_no_telefon" id="txt_no_telefon" class="form-control" value="<?php echo $telefon_giatmara; ?>">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="btn_tetapkan_temuduga" id="btn_tetapkan_temuduga" value="tetapkan temuduga" class="btn btn-primary">Tetapkan Temuduga & Tulis Surat Panggilan Temuduga</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
$(document).ready(function(){
    $("#tbl_senarai_permohonan_lpp09").DataTable();

    $('#txt_tarikh_temuduga').datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        autoclose: true,
        yearRange: "-0:+1"
    });

    $('#txt_waktu_temuduga').timepicker({showInputs: false});

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
});
</script>
