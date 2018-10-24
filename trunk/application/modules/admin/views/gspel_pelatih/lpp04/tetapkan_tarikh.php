    <style>
    	.error{color:#FF0000;}
    </style>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <script>
    $.validator.setDefaults({
    	submitHandler: function() {
    		//alert("submitted!");
        document.forms["form-bp"].submit();
    	}
    });

    $( document ).ready( function () {
    	$("#form-bp").validate({
        rules: {
          //"opt_sesi[]": "required",
          //"opt_kursus[]": "required",
          "txt_tgl": "required",
        },
        messages: {
          //"opt_sesi[]": "Sila isikan ruangan ini",
          //"opt_kursus[]": "Sila isikan ruangan ini",
          "txt_tgl": "Sila isikan ruangan ini",
        },
      });
    });
    </script>

    <?php
    #echo "<pre>";print_r($row_programme);echo "</pre>";
    #echo "<pre>";print_r($row_sesi);echo "</pre>";
    ?>
    <form id="form-bp" name="form-bp" class="form-horizontal" action="<?php echo site_url("admin/lpp04/".$url); ?>" method="post">
    <input type="hidden" name="id_giatmara" id="id_giatmara" value="<?php echo $id_giatmara; ?>">
    <div class="box box-solid box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Tetapan Tawaran</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped table-hover" id="tbl_senarai_temuduga" width="100%">
                <thead>
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">NAMA</th>
                        <th rowspan="2">NO. MyKAD</th>
                        <th rowspan="2">KURSUS PILIHAN / KEPUTUSAN TEMUDUGA</th>
                        <th colspan="4">TAWARAN</th>
                    </tr>
                    <tr>
                        <th>SESI</th>
                        <th>KURSUS</th>
                        <th>KELAYAKAN ELAUN</th>
                        <th>TAWARAN</th>
                    </tr>
                </thead>
                <tbody>
								<?php
								$x=1;
								if($row_programme){
									foreach($row_programme as $rp){
								?>
								<tr>
  								<td>
										<?php echo $x ?>
										<input type="hidden" name="idPemohon[<?php echo $rp->id_temuduga_tetapan?>]" value="<?php echo $rp->id_temuduga_tetapan?>">
  								</td>
  									<td valign="top">
  										<a href="#"><?php echo $rp->nama_penuh?></a>
  									</td>
  									<td><?php echo $rp->no_mykad?></td>
  									<td><?php echo $rp->nama_kursus?></td>
  									<td>
  										<select class="form-control" name="opt_sesi[<?php echo $rp->id_temuduga_tetapan?>]" id="opt_sesi" > <!-- required -->
                        <option value="">[SILA PILIH]</option>
                      <?php
                      if (count($row_sesi)) {
                        foreach ($row_sesi as $sesi) {
                      ?>
											<option value="<?php echo $sesi->idintake;?>" <?php if ($rp->id_intake==$sesi->idintake) echo "selected"; ?>><?php echo $sesi->nama_intake?></option>
                      <?php
                        }
                      }
                      ?>
											</select>
  									</td>
  									<td>
                                        <select class="form-control" name="opt_kursus[<?php echo $rp->id_temuduga_tetapan?>]" id="opt_kursus" > <!-- required -->
                                            <option value="">[SILA PILIH]</option>
                                            <?php
                                            foreach ($res_kursus as $val_kursus)
                                            {
                                                $sel_kursus = $rp->nama_kursus == $val_kursus->nama_kursus ? "selected=\"selected\"" : "";
                                                ?>
                                                <option value="<?php echo $val_kursus->id_setting_penawaran_kursus; ?>" <?php echo $sel_kursus; ?>><?php echo $val_kursus->nama_kursus; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
  									</td>
  									<td>
  										<select class="form-control" name="opt_kelayakan[<?php echo $rp->id_temuduga_tetapan?>]" id="opt_kelayakan">
                          <option value="">[SILA PILIH]</option>
													<option value="1">LAYAK</option>
													<option value="0">TIDAK LAYAK</option>
											</select>
  									</td>
  									<td><input type="checkbox" name="tawaran[<?php echo $rp->id_temuduga_tetapan?>]" id="tawaran" value="1"></td>
								</tr>
								<?php
  					        $x++;
  								}
								}
								?>
                </tbody>
            </table>
            <span id="sesi-error" style="color:red"><br/></span>
            <span id="kursus-error" style="color:red"><br/></span>
        </div>
    </div>

    <div class="box box-solid box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Tetapkan Tarikh Dan Masa Lapor Diri</h3>
        </div>

        <div class="box-body">
            <div class="form-group">
                <label for="txt_tgl" class="col-sm-2 control-label">Pilih Tarikh Dan Masa Lapor Diri</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="txt_tgl" id="txt_tgl" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="txt_jam" id="txt_jam">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary" name="luluskan" value="luluskan">Luluskan</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
$(document).ready(function(){
	$("#tbl_senarai_temuduga").DataTable();
    $('#txt_tgl').datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        autoclose: true,
        yearRange: "-0:+1"
    });

    $('#txt_jam').timepicker({showInputs: false});

    $("#opt_sesi").change(function(){
        var val_giatmara = $("#id_giatmara").val();
        var val_sesi = $("#opt_sesi").val();
        //alert($("#opt_sesi").val());
        $.ajax({
            // dataType: 'json',
            data: {txt_giatmara : val_giatmara, txt_sesi : val_sesi},
            url: "<?php echo site_url("admin/lpp04/kursus2_ajax"); ?>",
            type: "POST",
            success : function(data) {
                $("#opt_kursus").html(data);
            }
        });
    });

});
</script>
