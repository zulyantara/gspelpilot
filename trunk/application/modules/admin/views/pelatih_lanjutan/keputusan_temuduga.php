<div class="box box-primary box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Tetapan Giatmara dan Kursus</h3>
    </div>
    <div class="box-body">
        <form class="form-horizontal" method="post" action="<?php echo site_url("admin/pelatih_lanjutan/keputusan_temuduga"); ?>">
            <div class="form-group">
                <label for="opt_negeri" class="control-label col-sm-2">NEGERI</label>
                <div class="col-sm-10">
                    <select class="form-control" name="opt_negeri" id="opt_negeri">
                        <?php
                        if($res_negeri !== NULL)
                        {
                            foreach ($res_negeri as $val_negeri)
                            {
                                ?>
                                <option value="<?php echo $val_negeri->id; ?>"><?php echo $val_negeri->nama_negeri; ?></option>
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
                        <option value="<?php echo $row_giatmara->id; ?>"><?php echo $row_giatmara->nama_giatmara; ?></option>
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
                                $sel_kursus = $this->session->tempdata("opt_kursus") == NULL ? "" : ($this->session->tempdata("opt_kursus") == $val_kursus->id_setting_penawaran_kursus ? "selected=\"selected\"" : "");
                                ?>
                                <option value="<?php echo $val_kursus->id_setting_penawaran_kursus; ?>" <?php echo $sel_kursus; ?>><?php echo $val_kursus->nama_kursus; ?></option>
                                <?php
                            }
                        }
                        ?>
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
                    <button type="submit" class="btn btn-primary" name="btn_tetapkan" id="btn_tetapkan" value="tetapkan">Tetapkan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="box box-primary box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Senarai Keputusan Temuduga</h3>
    </div>
    <div class="box-body">
        <form class="form-horizontal" method="post" action="<?php echo site_url("admin/pelatih_lanjutan/keputusan_temuduga"); ?>">
            <table class="table" id="tbl_senarai_keputusan">
                <thead>
                    <tr>
                        <th>BIL</th>
                        <th>NAMA<br>NO.MYKAD</th>
                        <th>TARIKH TEMUDUGA</th>
                        <th>KEPUTUSAN</th>
                        <th>TUKAR KURSUS</th>
                        <th>CATATAN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($res_keputusan_temuduga !== FALSE)
                    {
                        $bil = 0;
                        foreach ($res_keputusan_temuduga as $val)
                        {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $bil += 1; ?>
                                    <input type="hidden" name="idtetapantemuduga[]" id="idtetapantemuduga" value="<?php echo $val->id_temuduga_tetapan; ?>"/>
                                    <input type="hidden" name="idsettingstawarankursus[]" id="idsettingstawarankursus" value="<?php echo $val->id_settings_tawaran_kursus; ?>"/>
                                    <input type="hidden" name="txt_id_permohonan[]" value="<?php echo $val->id_permohonan; ?>">
                                    <input type="hidden" name="txt_id_permohonan_kursus_lpp09[]" value="<?php echo $val->id_permohonan_kursus_lpp09; ?>">
                                    <input type="hidden" name="txt_nama_bank[]" value="<?php echo $val->nama_bank; ?>">
                                    <input type="hidden" name="txt_no_akaun[]" value="<?php echo $val->no_akaun; ?>">
                                </td>
                                <td><?php echo $val->nama_penuh."<br>".$val->no_mykad; ?></td>
                                <td><?php echo date("d-m-Y H:i", strtotime($val->tarikh_waktu)); ?></td>
                                <td>
                                    <select name="opt_keputusan[]" id="opt_keputusan<?php echo $val->keputusan_temuduga; ?>" class="form-control" onchange="tukarKursus('<?php echo $val->keputusan_temuduga; ?>')">
                                        <?php
                                        if ($res_keputusan !== FALSE)
                                        {
                                            foreach ($res_keputusan as $val_keputusan)
                                            {
                                                $sel_keputusan = ($val_keputusan->id == $val->keputusan_temuduga) ? "selected=\"selected\"" : "" ;
                                                ?>
                                                <option value="<?php echo $val_keputusan->id; ?>" <?php echo $sel_keputusan; ?>><?php echo $val_keputusan->keputusan_temuduga; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="opt_kursus[]" id="opt_kursus<?php echo $val->keputusan_temuduga; ?>" class="form-control" disabled>
                                        <option value="">Sila Pilih</option>
                                        <?php
                                        if ($res_kursus !== FALSE)
                                        {
                                            foreach ($res_kursus as $val_kursus)
                                            {
                                                ?>
                                                <option value="<?php echo $val_kursus->id_setting_penawaran_kursus; ?>"><?php echo $val_kursus->nama_kursus; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td><textarea name="txt_catatan[]" id="" cols="30"><?php echo $val->catatan; ?></textarea></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <button type="submit" name="btn_tetapkan_tindakan" id="btn_tetapkan_tindakan" value="tetapkan_tindakan" class="btn btn-primary">Tetapkan Tindakan Temuduga</button>
        </form>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $("#tbl_senarai_keputusan").DataTable();
});

function tukarKursus(no) {
    // comment
    var keputusan_val = $("#opt_keputusan"+no).val();

    if(keputusan_val == "3"){
        $('#opt_kursus'+no).attr("disabled", false);
    }else{
        $('#opt_kursus'+no).attr("disabled", true);
    }
}
</script>
