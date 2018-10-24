<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Konfigurasi Pangku Tugas <?php echo $row_staff->nama; ?></h3>
    </div>
    <div class="box-body">
        <form class="form-horizontal" action="<?php echo site_url("admin/gspel_manusia/pangku_tugas"); ?>" method="post">
            <div class="form-group">
                <label for="opt_jabatan" class="col-sm-2 control-label">Jabatan</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <select class="form-control" name="opt_jabatan">
                                <option value="">Sila Pilih</option>
                                <?php
                                if ($res_jabatan !== FALSE)
                                {
                                    foreach ($res_jabatan as $val)
                                    {
                                        ?>
                                        <option value="<?php echo $val->id; ?>"><?php echo $val->nama_jabatan; ?></option>
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
                        <div class="col-sm-3">
                            <select class="form-control" name="opt_jawatan">
                                <option value="">Sila Pilih</option>
                                <?php
                                if ($res_jawatan !== FALSE)
                                {
                                    foreach ($res_jawatan as $val)
                                    {
                                        ?>
                                        <option value="<?php echo $val->id; ?>"><?php echo $val->nama_jawatan; ?></option>
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
                <label for="txt_status_jawatan" class="col-sm-2 control-label">Status Jawatan</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <input type="text" name="txt_status_jawatan" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="opt_jenis_jawatan" class="col-sm-2 control-label">Jenis Jawatan</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <select class="form-control" name="opt_jenis_jawatan">
                                <option value="">Sila Pilih</option>
                                <?php
                                if ($res_jenis_jawatan !== FALSE)
                                {
                                    foreach ($res_jenis_jawatan as $val)
                                    {
                                        ?>
                                        <option value="<?php echo $val->id; ?>"><?php echo $val->nama_jenis_jawatan; ?></option>
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
                        <div class="col-sm-3">
                            <select class="form-control" name="opt_negeri">
                                <option value="">Sila Pilih</option>
                                <?php
                                if ($res_negeri !== FALSE)
                                {
                                    foreach ($res_negeri as $val)
                                    {
                                        ?>
                                        <option value="<?php echo $val->id; ?>"><?php echo $val->nama_negeri; ?></option>
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
                        <div class="col-sm-3">
                            <select class="form-control" name="opt_giatmara">
                                <option value="">Sila Pilih</option>
                                <?php
                                if ($res_giatmara !== FALSE)
                                {
                                    foreach ($res_giatmara as $val)
                                    {
                                        ?>
                                        <option value="<?php echo $val->id; ?>"><?php echo "[".$val->kod_giatmara."]".$val->nama_giatmara; ?></option>
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
                        <div class="col-sm-3">
                            <select class="form-control" name="opt_kursus">
                                <option value="">Sila Pilih</option>
                                <?php
                                if ($res_kursus !== FALSE)
                                {
                                    foreach ($res_kursus as $val)
                                    {
                                        ?>
                                        <option value="<?php echo $val->id; ?>"><?php echo $val->nama_kursus; ?></option>
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
                <label for="txt_tarikh_mula_tugas" class="col-sm-2 control-label">Tarikh Mula Tugas</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <input type="text" name="txt_tarikh_mula_tugas" id="txt_tarikh_mula_tugas" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="txt_tarikh_tamat_tugas" class="col-sm-2 control-label">Tarikh Tamat Tugas</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <input type="text" name="txt_tarikh_tamat_tugas" id="txt_tarikh_tamat_tugas" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="txt_status" class="col-sm-2 control-label">Status</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <input type="text" name="txt_status" id="txt_status" class="form-control">
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
        format: "dd-mm-yyyy",
        autoclose: true
    });

    $("#txt_tarikh_tamat_tugas").datepicker({
        format: "dd-mm-yyyy",
        autoclose: true
    });    
});
</script>
