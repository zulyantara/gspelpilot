<div class="box box-primary box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Tetapan Giatmara dan Kursus</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <form class="form-horizontal" action="<?php echo site_url("admin/pelatih_lanjutan/pendaftaran"); ?>" method="post">
            <div class="form-group">
                <label for="filter_negeri" class="control-label col-sm-2">NEGERI</label>
                <div class="col-sm-10">
                    <select class="form-control" name="filter_negeri" id="filter_negeri">
                        <!-- <option value="">Sila Pilih</option> -->
                        <?php
                        if (isset($res_negeri) && $res_negeri !== FALSE)
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
                <label for="filter_giatmara" class="control-label col-sm-2">GIATMARA</label>
                <div class="col-sm-10">
                    <select class="form-control" name="filter_giatmara" id="filter_giatmara">
                        <!-- <option value="">Sila Pilih</option> -->
                        <?php
                        if (isset($res_giatmara) && $res_giatmara !== FALSE)
                        {
                            foreach ($res_giatmara as $val_giatmara)
                            {
                                ?>
                                <option value="<?php echo $val_giatmara->id; ?>"><?php echo $val_giatmara->nama_giatmara; ?></option>
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                            <option value="<?php echo $row_giatmara->id; ?>"><?php echo $row_giatmara->nama_giatmara; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="filter_kursus" class="control-label col-sm-2">KURSUS</label>
                <div class="col-sm-10">
                    <select class="form-control" name="filter_kursus" id="filter_kursus">
                        <option value="">Sila Pilih</option>
                        <?php
                        foreach ($res_kursus as $vKursus)
                        {
                            ?>
                            <option value="<?php echo $vKursus->id_setting_penawaran_kursus; ?>"><?php echo $vKursus->nama_kursus; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="filter_intake" class="control-label col-sm-2">SESI KEMASUKAN</label>
                <div class="col-sm-10">
                    <select class="form-control" name="filter_intake" id="filter_intake">
                        <option value="">Sila Pilih</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="btn_tetapkan" value="tetapkan" class="btn btn-primary">Tetapkan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<form class="form-horizontal" action="<?php echo site_url("admin/pelatih_lanjutan/pendaftaran"); ?>" method="post">
    <input type="hidden" name="form-name" value="seranai">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Senarai Permohonan Kursus Lanjutan</h3>
        </div>
        <div class="box-body">
            <table class="table" id="tbl_senarai_pendaftaran">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>NO KP</th>
                        <!-- <th>TARIKH TAWARAN</th> -->
                        <th>SESI</th>
                        <th>KELAYAKAN ELAUN</th>
                        <th>NAMA BANK</th>
                        <th>NO. AKAUN</th>
                        <th>CARA BAYAR</th>
                        <th>DAFTAR</th>
                        <th>TINDAKAN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($res_filter !== FALSE)
                    {
                        $no = 0;
                        foreach ($res_filter as $val_filter)
                        {
                            $id_permohonan = $val_filter->id_permohonan_butir_peribadi;
                            $id_temuduga_tetapan = $val_filter->id_temuduga_tetapan;
                            ?>
                            <tr>
                                <td>
                                    <?php echo $no += 1; ?>
                                    <input type="hidden" name="id_kelulusan_lpp09[<?php echo $id_permohonan; ?>]" value="<?php echo $val_filter->id_kelulusan_lpp09; ?>">
									<input type="hidden" name="id_permohonan[<?php echo $id_permohonan; ?>]" value="<?php echo $id_permohonan; ?>">
                                    <input type="hidden" name="id_kursus[<?php echo $id_permohonan; ?>]" value="<?php echo $val_filter->id_kursus; ?>">
                                    <input type="hidden" name="id_stk[<?php echo $id_permohonan; ?>]" value="<?php echo $val_filter->id_settings_tawaran_kursus; ?>">
                                    <input type="hidden" name="id_temuduga_tetapan[<?php echo $id_permohonan; ?>]" value="<?php echo $id_temuduga_tetapan; ?>">
                                    <input type="hidden" name="no_mykad[<?php echo $id_permohonan; ?>]" value="<?php echo $val_filter->no_mykad; ?>">
									<input type="hidden" name="no_pelatih[<?php echo $id_permohonan; ?>]" value="<?php echo $val_filter->no_pelatih; ?>">
                                    <input type="hidden" name="txt_id_bank[<?php echo $id_permohonan; ?>]" value="<?php echo $val_filter->id_bank; ?>">
                                    <input type="hidden" name="txt_no_akaun[<?php echo $id_permohonan; ?>]" value="<?php echo $val_filter->no_akaun; ?>">
                                    <input type="hidden" name="txt_cara_bayar[<?php echo $id_permohonan; ?>]" value="<?php echo $val_filter->cara_bayar; ?>">
                                    <input type="hidden" name="txt_id_negeri[<?php echo $id_permohonan; ?>]" value="<?php echo $val_filter->id_negeri; ?>">
                                    <input type="hidden" name="txt_id_giatmara[<?php echo $id_permohonan; ?>]" value="<?php echo $val_filter->id_giatmara; ?>">
                                    <input type="hidden" name="txt_kelayakan_elaun[<?php echo $id_permohonan; ?>]" value="<?php echo $val_filter->layak_elaun; ?>">
                                    <input type="hidden" name="txt_tarikh_mula_kursus[<?php echo $id_permohonan; ?>]" value="<?php echo $val_filter->tarikh_mula_kursus; ?>">
                                    <input type="hidden" name="txt_tarikh_tamat_kursus[<?php echo $id_permohonan; ?>]" value="<?php echo $val_filter->tarikh_tamat_kursus; ?>">
                                    <input type="hidden" name="txt_kew_kod_kombinasi[<?php echo $id_permohonan; ?>]" value="<?php echo $val_filter->id_kew_kod_kombinasi; ?>">
                                    <input type="hidden" name="txt_layak_elaun[<?php echo $id_permohonan; ?>]" value="<?php echo $val_filter->layak_elaun; ?>">
                                </td>
                                <td>
								<?php if($val_filter->layak_elaun == 1){?>
									<a href="<?php echo site_url("admin/pelatih_lanjutan/detail_bank/".$id_permohonan); ?>"><?php echo $val_filter->nama; ?></a>
								<?php }else{?>
									<?php echo $val_filter->nama; ?>
								<?php } ?>
								</td>
                                <td><?php echo $val_filter->no_mykad; ?></td>
                                <!-- <td><?php echo $val_filter->tawaran_tarikh_lapordiri; ?></td> -->
                                <td><?php echo $val_filter->sesi; ?></td>
                                <td>
                                    <?php echo $val_filter->layak_elaun == 1 ? "Layak" : "Tidak Layak"; ?>
                                    <!-- <select class="form-control" name="opt_elaun[<?php echo $id_temuduga_tetapan; ?>]" id="opt_elaun">
                                        <option value="">Sila Pilih</option>
                                        <?php
                                        $arr_layak = array(0=>"Tidak", 1=> "Ya");
                                        foreach ($arr_layak as $keyl => $vall)
                                        {
                                            $sel_layak = ($keyl == $val_filter->tawaran_elaun) ? "selected=\"selected\"" : "";
                                            ?>
                                            <option value="<?php echo $keyl; ?>" <?php echo $sel_layak; ?>><?php echo $vall; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select> -->
                                </td>
                                <td><?php echo $val_filter->layak_elaun == 1 ? $val_filter->nama_bank : ""; ?></td>
                                <td><?php echo $val_filter->layak_elaun == 1 ? $val_filter->no_akaun : ""; ?></td>
                                <td><?php echo $val_filter->layak_elaun == 1 ? "Autopay" : ""; ?></td>
                                <td>
                                    <select class="form-control" name="opt_sah[<?php echo $id_permohonan; ?>]" id="id_sah">
                                        <option value="">Sila Pilih</option>
                                        <option value="0" <?php echo $val_filter->pendaftaran_status == 0 ? "selected=\"selected\"" : ""; ?>>Batalkan</option>
                                        <option value="5" <?php echo $val_filter->pendaftaran_status == 5 ? "selected=\"selected\"" : ""; ?>>Daftar LPP09</option>
                                    </select>
                                </td>
                                <td><input type="checkbox" name="chk_tindakan[]" value="<?php echo $id_permohonan; ?>" id="chk_tindakan<?php echo $id_permohonan; ?>"></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="filter_intake" class="control-label col-sm-3">Pilih Tarikh Dan Masa Lapor Diri</label>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" name="txt_tarikh_lapor" id="txt_tarikh_lapor" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" name="opt_masa_lapor" id="opt_masa_lapor">
                                        <?php
                                        $arr_masa = array("08","09","10","11","12","13","14","15","16","17","18");
                                        foreach ($arr_masa as $kmasa => $vmasa)
                                        {
                                            ?>
                                            <option value="<?php echo $vmasa; ?>"><?php echo $vmasa; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" name="opt_masa_menit_lapor" id="opt_masa_menit_lapor">
                                        <?php
                                        for ($mml = 0; $mml <= 59; $mml++)
                                        {
                                            $mml = strlen($mml) == 1 ? "0".$mml : $mml;
                                            ?>
                                            <option value="<?php echo $mml; ?>"><?php echo $mml; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input class="btn btn-primary" type="submit" name="btn_sahkan" id="btn_sahkan" value="Daftar" >
        </div>
    </div>
</form>

<script type="text/javascript">
var defOption ='<option value=""> Sila Pilih</option>';
$(document).ready(function() {
    $("#tbl_senarai_pendaftaran").DataTable();

    $('#filter_negeri').on('change', function() {
        // $('#giatmara').html(defOption );
        var stateID = $(this).val();
        var e = document.getElementById("opt_giatmara");
        if(stateID) {
            $.ajax({
                url: '<?php echo base_url();?>admin/Pelatih_lanjutan/ajaxgiat/'+stateID,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    // $('select[name="opt_giatmara"]').empty();
                    $.each(data, function(key, value) {
                        $('#filter_giatmara').append('<option value="'+ value.id +'">'+ value.nama_giatmara +'</option>');
                    });
                }
            });
            // console.log(stateID);
        } else {
            //  $('select[name="giatmara"]').empty();
            console.log(stateID);
        }
    });

    $("#filter_giatmara").change(function(){
        var stateID = $("#filter_giatmara").val();
        if(stateID) {
            $.ajax({
                url: '<?php echo base_url();?>admin/Pelatih_lanjutan/ajax_intake/',
                type: "POST",
                data: {id_giatmara: stateID},
                dataType: "json",
                success:function(data) {
                    // $('select[name="opt_giatmara"]').empty();
                    $.each(data, function(key, value) {
                        $('#filter_intake').append('<option value="'+ value.id_intake +'">'+ value.nama_intake +'</option>');
                    });
                }
            });
            // console.log(stateID);
        } else {
            //  $('select[name="giatmara"]').empty();
            console.log(stateID);
        }
    });

    $("#filter_kursus").change(function(){
        var idNegeri = $("#filter_negeri").val();
        var idGiatmara = $("#filter_giatmara").val();
        // var idKursus = $("#filter_kursus").val();
        if(idGiatmara) {
            $.ajax({
                url: '<?php echo base_url();?>admin/Pelatih_lanjutan/ajax_kursus2/',
                type: "POST",
                data: {id_negeri: idNegeri, id_giatmara: idGiatmara},
                dataType: "json",
                success:function(data) {
                    // $('select[name="opt_giatmara"]').empty();
                    $.each(data, function(key, value) {
                        $('#filter_intake').append('<option value="'+ value.id_intake +'">'+ value.nama_intake +'</option>');
                    });
                }
            });
            // console.log(stateID);
        } else {
            //  $('select[name="giatmara"]').empty();
            console.log(stateID);
        }
    });

    $('#txt_tarikh_lapor').datepicker({
		dateFormat: "dd-mm-yy",
		changeMonth: true,
		changeYear: true,
		autoclose: true,
		yearRange: "-1:+1"
	});
});
</script>
