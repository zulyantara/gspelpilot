<div class="box box-primary box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Detail Bank</h3>
        <!-- <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div> -->
    </div>
    <div class="box-body">
        <form class="form-horizontal" action="<?php echo site_url("admin/pelatih_lanjutan/proses_bank"); ?>" method="post">
            <input type="hidden" name="txt_id_permohonan" value="<?php echo $id_permohonan; ?>">
            <div class="form-group">
                <label for="opt_bank" class="col-sm-2 control-label">Nama Bank</label>
                <div class="col-sm-3">
                    <select class="form-control" name="opt_bank">
                        <?php
                        foreach ($res_bank as $v)
                        {
                            $sel_bank = $v->id == $row_bank->id_bank ? "selected=\"selected\"" : "";
                            ?>
                            <option value="<?php echo $v->id; ?>" <?php echo $sel_bank; ?>><?php echo $v->name; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="txt_no_akaun" class="col-sm-2 control-label">No. Akaun</label>
                <div class="col-sm-3">
                    <input type="text" name="txt_no_akaun" value="<?php echo $row_bank->no_akaun; ?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">Cara Bayar</label>
                <div class="col-sm-10">
                    Auto
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" name="btn_simpan" value="simpan">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
