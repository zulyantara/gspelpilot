<?php
$negeri_opt = isset($negeri_opt) ? $negeri_opt : 0;
$giatmara_opt = isset($giatmara_opt) ? $giatmara_opt : 0;
$kursus_opt = isset($kursus_opt) ? $kursus_opt : 0;
$intake_opt  = isset($intake_opt) ? $intake_opt : 0;
#echo "<pre>";print_r($kursus_opt);echo "</pre>";
?>
<div class="row">
    <div class="col-md-12">

        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tetapan GIATMARA dan Kursus</h3>
            </div>

            <div class="box-body">
                <form id="form-header" class="form-horizontal" action="<?php echo site_url("admin/".$url); ?>" method="post">
                    <input type="hidden" name="form-name" value="header">
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
                                            $sel_negeri = $row_negeri->id == $negeri_opt ? "selected":"";
                                            ?>
                                            <option value="<?php echo $row_negeri->id; ?>" <?php echo $sel_negeri; ?>><?php echo $row_negeri->nama_negeri; ?></option>
                                            <?php
                                          }


                                            ?>
                                            <!-- <option value="<?php echo $row_negeri->id; ?>" <?php echo  $row_negeri->id == $negeri_opt ? "selected":""; ?>><?php echo $row_negeri->nama_negeri; ?></option> -->
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
                                        <!-- option value="">Sila Pilih</option -->
                                        <?php
                                        if ($res_giatmara !== NULL)
                                        {
                                            foreach ($res_giatmara as $val_giatmara)
                                            {
                                                ?>
                                                <option value="<?php echo $val_giatmara->id; ?>"><?php echo $val_giatmara->nama_giatmara; ?></option>
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
                                				?>
                                				<option value="<?php echo $val_kursus->id_kursus; ?>" <?php if ($kursus_opt==$val_kursus->id_kursus) echo "selected"; ?>><?php echo $val_kursus->nama_kursus; ?></option>
                                				<?php
                                			}
                                		}
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php /*
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
                                                ?>
                                                <option value="<?php echo $val_kwg->id; ?>"><?php echo $val_kwg->kewarganegaraan; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    */ ?>

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

<script type="text/javascript">
$(document).ready(function(){
    $("#opt_negeri").change(function(){
        var val_negeri = $("#opt_negeri").val();
        var val_giatmara_sel = <?php echo $giatmara_opt; ?>;
        $.ajax({
            // dataType: 'json',
            data: {txt_negeri: val_negeri, txt_giatmara_sel: val_giatmara_sel},
            url: "<?php echo site_url("admin/programreg/giatmara_ajax"); ?>",
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
