<div class="box box-primary box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Tetapan Giatmara dan Kursus</h3>
    </div>
    <div class="box-body">
        <form class="form-horizontal" method="post" action="<?php echo site_url("admin/pelatih_lanjutan/gagal_temuduga"); ?>">
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
                                <option value="<?php echo $val_kursus->id_kursus; ?>" <?php echo $sel_kursus; ?>><?php echo $val_kursus->nama_kursus; ?></option>
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

<form class="form-horizontal" method="post" action="<?php echo site_url("admin/pelatih_lanjutan/gagal_temuduga"); ?>">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Senarai Gagal Temuduga</h3>
        </div>
        <div class="box-body">
            <table class="table" id="tbl_senarai_gagal_temuduga">
                <thead>
                    <tr>
                        <th>BIL</th>
                        <th>NAMA<br>NO.MYKAD</th>
                        <th>TARIKH TEMUDUGA</th>
                        <th>KEPUTUSAN</th>
                        <th>KURSUS</th>
                        <th>TINDAKAN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($res_gagal_temuduga !== FALSE)
                    {
                        $bil = 0;
                        foreach ($res_gagal_temuduga as $val)
                        {
                            ?>
                            <tr>
                                <td><?php echo $bil += 1; ?></td>
                                <td><?php echo $val->nama_penuh."<br>".$val->no_mykad; ?></td>
                                <td><?php echo $val->tarikh_temuduga; ?></td>
                                <td><?php echo $val->keputusan_temuduga; ?></td>
                                <td><?php echo $val->nama_kursus; ?></td>
                                <td><button type="submit" name="btn_tindakan[<?php echo $val->id_temuduga_tetapan; ?>]" id="btn_tindakan" class="btn btn-primary btn-sm" onclick="confirm_gagalkan('<?php echo "[".$val->no_mykad."] ".$val->nama_penuh; ?>', '<?php echo $val->nama_kursus; ?>')">BATALKAN GAGAL TEMUDUGA</button></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</form>

<script type="text/javascript">
$(document).ready(function(){
    $("#tbl_senarai_gagal_temuduga").DataTable();
});

function confirm_gagalkan(nama, kursus) {
    confirm("Adakah anda pasti untuk membatalkan keputusan temuduga bagi "+nama+" ("+kursus+")");
    // if (confirm("Press a button!") == true) {
    //     txt = "You pressed OK!";
    // } else {
    //     txt = "You pressed Cancel!";
    // }
}
</script>
