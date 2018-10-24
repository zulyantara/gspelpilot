<div class="row">
    <div class="col-md-12">

        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tetapan GIATMARA dan Kursus</h3>
            </div>

            <div class="box-body">
                <form class="form-horizontal" action="<?php echo site_url("admin/lpp04/".$url); ?>" method="post">
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
                                            ?>
                                            <option value="<?php echo $row_negeri->id; ?>"><?php echo $row_negeri->nama_negeri; ?></option>
                                            <?php
                                          }
                                            ?>
                                            <option value="<?php echo $row_negeri->id; ?>"><?php echo $row_negeri->nama_negeri; ?></option>
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
<form id="form-bp" name="form-bp" class="form-horizontal" action="<?php echo site_url("admin/lpp04/luluskan"); ?>" method="post">
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
                    <th>KURSUS</th>
                    <th>SESI</th>
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
                                <!-- <a href="#"><?php echo $rp->nama_penuh?></a> -->
                                <?php echo $rp->nama_penuh?>
                            </td>
                            <td><?php echo $rp->no_mykad?></td>
                            <td><?php echo $rp->nama_kursus?></td>
                            <td>
                                <select class="form-control" name="opt_kursus[<?php echo $rp->id_temuduga_tetapan?>]" id="opt_kursus<?php echo $rp->id_temuduga_tetapan?>" onchange="pilih_kursus(<?php echo $rp->id_temuduga_tetapan?>, this.value);"> <!-- required -->
                                    <option value="">[SILA PILIH]</option>
                                    <?php
                                    foreach ($res_kursus as $val_kursus)
                                    {
                                        $sel_kursus = $rp->nama_kursus == $val_kursus->nama_kursus ? "selected=\"selected\"" : "";
                                        ?>
                                        <option value="<?php echo $val_kursus->id_kursus; ?>" <?php echo $sel_kursus; ?>><?php echo $val_kursus->nama_kursus; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="opt_sesi[<?php echo $rp->id_temuduga_tetapan?>]" id="opt_sesi<?php echo $rp->id_temuduga_tetapan?>" > <!-- required -->
                                    <option value="">[SILA PILIH]</option>
                                    <?php
									$this->db->query("select id_intake, nama_intake from settings_tawaran_kursus a join ref_intake b on b.id=id_intake where status=1 and id_giatmara=? and id_kursus=?",array($id_giatmara, $idkursus))->result();
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
                        <input type="text" class="form-control" name="txt_tgl" id="txt_tgl" value="<?php echo date('m-d-Y'); ?>">
                    </div>
                    <div class="col-md-2">
                        <!-- <input type="text" class="form-control" name="txt_jam" id="txt_jam"> -->
                        <select class="form-control" name="opt_masa">
                            <?php
                            for ($masa=8; $masa <= 18 ; $masa++)
                            {
                                ?>
                                <option value="<?php echo strlen($masa) == 1 ? "0".$masa : $masa; ?>"><?php echo strlen($masa) == 1 ? "0".$masa : $masa; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control" name="opt_menit">
                            <?php
                            for ($menit=0; $menit <= 59 ; $menit++)
                            {
                                ?>
                                <option value="<?php echo strlen($menit) == 1 ? "0".$menit : $menit; ?>"><?php echo strlen($menit) == 1 ? "0".$menit : $menit; ?></option>
                                <?php
                            }
                            ?>
                        </select>
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

    $("#tbl_senarai_temuduga").DataTable();
    $('#txt_tgl').datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        autoclose: true,
        yearRange: "-0:+1"
    });

    $('#txt_jam').timepicker({showInputs: false});

});

function pilih_kursus(no, no2)
{
    var val_kursus = no;//$("#opt_kursus"+no).val();
    // alert(val_kursus);
    $.ajax({
        data: {txt_kursus : val_kursus, kursus:no2},
        url: "<?php echo site_url("admin/lpp04/kursus_dei_ajax2"); ?>",
        type: "POST",
        success : function(data) {
            $("#opt_sesi"+no).html(data);
        }
    });
}
</script>
