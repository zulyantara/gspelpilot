<div class="row">
    <div class="col-md-12">

        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tetapan GIATMARA dan Kursus</h3>
            </div>

            <div class="box-body">
                <form class="form-horizontal" action="<?php echo site_url("admin/lpp04/".$url); ?>" name="tetapan_temuduga" method="post">
                    <div class="form-group">
                        <label for="opt_negeri" class="col-sm-2 control-label">NEGERI</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <select class="form-control" name="opt_negeri" id="opt_negeri">
                                      <?php
                                      if ( ! empty($row_negeri))
                                      {
                                        if (is_array($row_negeri))
                                        {
                                          echo "<option value=\"\">Sila Pilih</option>";
                                          foreach ($row_negeri as $val_negeri)
                                          {
                                            ?>
                                            <option value="<?php echo $val_negeri->id; ?>"><?php echo $val_negeri->nama_negeri; ?></option>
                                            <?php
                                          }
                                        }
                                        else
                                        {
                                          ?>
                                          <option value="<?php echo $row_negeri->id; ?>"><?php echo $row_negeri->nama_negeri; ?></option>
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
                        <label for="opt_giatmara" class="col-sm-2 control-label">GIATMARA</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <select class="form-control" name="opt_giatmara" id="opt_giatmara">
                                        <!-- <option value="">Sila Pilih</option> -->
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

			<!-- /form somewhere over the rainbow -->
            </div>
            <!-- /form -->
        </div>

    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
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
