<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs" id="my-tab">
                <li class="active"><a href="#tab_1" data-toggle="tab">Kursus Terdahulu</a></li>
                <li><a href="#tab_2" data-toggle="tab">Maklumat Am</a></li>
                <li><a href="#tab_3" data-toggle="tab">Program Pilihan</a></li>
                <li><a href="#tab_4" data-toggle="tab">Butir Peribadi</a></li>
                <li><a href="#tab_5" data-toggle="tab">Maklumat Penjaga</a></li>
                <li><a href="#tab_6" data-toggle="tab">Tempat Tinggal</a></li>
                <li><a href="#tab_7" data-toggle="tab">Dokumen Sokongan</a></li>
                <li><a href="#tab_8" data-toggle="tab">Pengakuan</a></li>
            </ul>

            <!-- Kursus Terdahulu -->
            <div class="tab-content">
                <div class="tab-pane active" id="tab_4">

                    <div class="box box-solid box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">BUTIR PRIBADI</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <tr>
                                        <th>BIL</th>
                                        <th>KLUSTER</th>
                                        <th>KURSUS</th>
                                        <th>NEGERI</th>
                                        <th>GIATMARA</th>
                                        <th>SESI</th>
                                        <th>TARIKH MULA</th>
                                        <th>TARIKH TAMAT</th>
                                        <th>STATUS</th>
                                    </tr>
                                    <?php
                                    if ($res_kursus_terdahulu != NULL)
                                    {
                                        $bil = 1;
                                        foreach ($res_kursus_terdahulu as $val_kt)
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $bil += 1; ?></td>
                                                <td><?php echo $val_kt->nama_kluster; ?></td>
                                                <td><?php echo $val_kt->nama_kursus; ?></td>
                                                <td><?php echo $val_kt->nama_negeri; ?></td>
                                                <td><?php echo $val_kt->nama_giatmara; ?></td>
                                                <td><?php echo $val_kt->nama_intake; ?></td>
                                                <td><?php echo $val_kt->tarikh_mula_kursus; ?></td>
                                                <td><?php echo $val_kt->tarikh_tamat_kursus; ?></td>
                                                <td><?php echo $val_kt->status_desc; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                        <tr><td colspan="9">Data Kosong</td></tr>
                                        <?php
                                    }
                                    ?>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-right">
                                        <button type="button" id="btn_seterusnya_tab_1" class="btn btn-primary btn-flat">Seterusnya</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End Kursus Terdahulu -->

                <!-- Maklumat Am -->
                <div class="tab-pane" id="tab_2">

                    <div class="box box-solid box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">MAKLUMAT AM</h3>
                        </div>
                        <div class="box-body">
                            <p class="text-bold">DARI SUMBER MANAKAH ANDA MENGETAHUI PERIHAL KURSUS INI?<span class="text-danger">*</span></p>
                            <form class="form-inline" id="frm_maklumat_am">
                                <input type="hidden" name="ma_no_mykad" value="<?php echo $no_mykad; ?>">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="sumber_media_cetak" value="1"> Media Cetak
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="sumber_media_elektronik" value="1"> Media Elektronik
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="sumber_internet" value="1"> Internet
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="sumber_media_sosial" value="1"> Media Sosial
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="sumber_rakan" value="1"> Rakan-rakan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="sumber_keluarga" value="1"> Keluarga
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="sumber_pameran" value="1"> Pameran/Karnival Pendidikan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="sumber_lain" value="1" onclick="toggle('#txt_lain', this);"> Lain-lain
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="txt_lain" id="txt_lain" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="margin-top: 10px;">
                                        <div class="loading_mam"></div>
                                        <button type="button" id="btn_simpan_maklumat_am" class="btn btn-primary pull-right">Simpan & Seterusnya</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- End Maklumat Am -->

                <!-- Program Pilihan -->
                <div class="tab-pane" id="tab_3">

                    <div class="box box-solid box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">PROGRAM PILIHAN</h3>
                        </div>
                        <div class="box-body">
                            <form class="" id="frm_program_pilihan">
                                <input type="hidden" name="pp_no_mykad" value="<?php echo $no_mykad; ?>">
                                <div class="form-group">
                                    <label for="opt_kategori_pelatih">Kategori Pelatih</label>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <select class="form-control" name="opt_kategori_pelatih" id="kategori_pelatih">
                                                <option value="Latihan-Lanjutan">Latihan Lanjutan</option>
                                                <option value="Rintis-Niaga">Rintis Niaga</option>
                                                <option value="Program-Pertandingan">Program Pertandingan</option>
                                                <option value="Program-Khas">Program Khas</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Latihan Lanjutan -->
                                <div class="" id="latihan-lanjutan">
                                    <div id="tbl-kursus">
                                        <table class="table">
                                            <tr>
                                                <th>MENGIKUT</th>
                                                <th>PILIHAN KLUSTER</th>
                                                <th>PILIHAN KURSUS</th>
                                                <th>PILIHAN NEGERI</th>
                                                <th>PILIHAN GIATMARA</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select class="form-control" id="opt_mengikut_kursus">
                                                        <option>Sila Pilih</option>
                                                        <option value="Kursus">Kursus</option>
                                                        <option value="Negeri">Negeri</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="lpk_kluster" id="lpk_kluster">
                                                        <option>Sila Pilih</option>
                                                        <?php
                                                        if ($res_kluster !== NULL)
                                                        {
                                                            foreach ($res_kluster as $val_kluster)
                                                            {
                                                                ?>
                                                                <option value="<?php echo $val_kluster->id; ?>"><?php echo $val_kluster->nama_kluster; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="lpk_kursus" id="lpk_kursus">
                                                        <option>Sila Pilih</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="lpk_negeri" id="lpk_negeri">
                                                        <option>Sila Pilih</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="lpk_giatmara" id="lpk_giatmara">
                                                        <option>Sila Pilih</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="tbl-negeri">
                                        <table class="table">
                                            <tr>
                                                <th>MENGIKUT</th>
                                                <th>PILIHAN NEGERI</th>
                                                <th>PILIHAN GIATMARA</th>
                                                <th>PILIHAN KLUSTER</th>
                                                <th>PILIHAN KURSUS</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select class="form-control" id="opt_mengikut_negeri">
                                                        <option>Sila Pilih</option>
                                                        <option value="Kursus">Kursus</option>
                                                        <option value="Negeri">Negeri</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="lpk_negeri" id="lpn_negeri">
                                                        <option>Sila Pilih</option>
                                                        <?php
                                                        if ($res_negeri !== NULL)
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
                                                </td>
                                                <td>
                                                    <select class="form-control" name="lpn_giatmara" id="lpn_giatmara">
                                                        <option>Sila Pilih</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="lpn_kluster" id="lpn_kluster">
                                                        <option>Sila Pilih</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="lpn_kursus" id="lpn_kursus">
                                                        <option>Sila Pilih</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- End Latihan Lanjutan -->

                                <!-- Rintis Niaga -->
                                <div id="rintis-niaga">
                                    <table class="table">
                                        <tr>
                                            <td>Kluster</td>
                                            <td>:</td>
                                            <td>
                                                <select class="form-control" name="rn[opt_kluster]" id="opt_rn_kluster">
                                                    <option>Sila Pilih</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No. SSM</td>
                                            <td>:</td>
                                            <td><input type="text" name="rn[no_ssm]" id="no_ssm" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat Perniagaan</td>
                                            <td>:</td>
                                            <td><input type="text" name="rn[alamat_perniagaan1]" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input type="text" name="rn[alamat_perniagaan2]" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input type="text" name="rn[alamat_perniagaan3]" class="form-control"></td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- End Rintis Niaga -->

                                <!-- Program Pertandingan -->
                                <div id="program-pertandingan">
                                    <table class="table">
                                        <tr>
                                            <td>Nama Program</td>
                                            <td>:</td>
                                            <td>
                                                <select class="form-control" name="pp[nama_program]">
                                                    <option>Sila Pilih</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- End Program Pertandingan -->

                                <!-- Program Khas -->
                                <div id="program-khas">
                                    <table class="table">
                                        <tr>
                                            <td>Nama Program</td>
                                            <td>:</td>
                                            <td>
                                                <select class="form-control" name="pk[nama_program]">
                                                    <option>Sila Pilih</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- End Program Khas -->
                            </form>
                        </div>
                    </div>

                </div>
                <!-- End Program Pilihan -->

                <!-- Butir Peribadi -->
                <div class="tab-pane" id="tab_4">

                    <div class="box box-solid box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">BUTIR PERIBADI</h3>
                        </div>
                        <div class="box-body">
                        </div>
                    </div>

                </div>
                <!-- End Butir Peribadi -->

                <!-- Maklumat Penjaga -->
                <div class="tab-pane" id="tab_5">

                    <div class="box box-solid box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">MAKLUMAT PENJAGA</h3>
                        </div>
                        <div class="box-body">
                        </div>
                    </div>

                </div>
                <!-- End Maklumat Penjaga -->

                <!-- Tempat Tinggal -->
                <div class="tab-pane" id="tab_6">

                    <div class="box box-solid box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">TEMPAT TINGGAL</h3>
                        </div>
                        <div class="box-body">
                        </div>
                    </div>

                </div>
                <!-- End Tempat Tinggal -->

                <!-- Dokumen Sokongan -->
                <div class="tab-pane" id="tab_7">

                    <div class="box box-solid box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">DOKUMEN SOKONGAN</h3>
                        </div>
                        <div class="box-body">
                        </div>
                    </div>

                </div>
                <!-- End Dokumen Sokongan -->

                <!-- Pengakuan -->
                <div class="tab-pane" id="tab_8">

                    <div class="box box-solid box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">PENGAKUAN</h3>
                        </div>
                        <div class="box-body">
                        </div>
                    </div>

                </div>
                <!-- End Pengakuan -->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    // BAGIAN MAKLUMAT AM
    $("#txt_lain").hide();
    // Simpan Maklumat Am
    $("#btn_simpan_maklumat_am").click(function(){
        var data_form_maklumat_am = $("#frm_maklumat_am").serialize();
        $.ajax({
            url: "<?php echo site_url("admin/pelatih_lanjutan/simpan_maklumat_am"); ?>",
            data: data_form_maklumat_am,
            method: 'post',
            beforeSend: function() {
                $('#loading_mam').html("<div><img height='100px' src='<?php echo base_url("assets/images/loading.gif")?>'></div>");
            },
            success: function(xhr) {
                console.log(xhr);
                if (xhr == 1) {
                    $('#my-tab a[href="#tab_3"]').tab("show");
                }
            }
        });
    });
    // END MAKLUMAT AM

    // BAGIAN KURSUS PILIHAN
    $("#rintis-niaga").hide();
    $("#program-pertandingan").hide();
    $("#program-khas").hide();
    $("#tbl-negeri").hide();

    //  Bagian Latihan Lanjutan - Kursus
    $("#lpk_kluster").change(function(){
        var val_kluster = $("#lpk_kluster").val();
        $.ajax({
            method: "POST",
            data: {opt_kluster:val_kluster},
            url: "<?php echo site_url("admin/pelatih_lanjutan/ajax_kluster"); ?>",
            beforeSend: function() {
                $('#loading_lpk_kluster').html("<div><img height='100px' src='<?php echo base_url("assets/images/loading.gif")?>'></div>");
            },
            success: function(abc) {
                $("#lpk_kursus").html(abc);
            }
        });
    });

    $("#lpk_kursus").change(function(){
        var val_kursus = $("#lpk_kursus").val();
        $.ajax({
            method: "POST",
            data: {opt_kursus:val_kursus},
            url: "<?php echo site_url("admin/pelatih_lanjutan/ajax_kursus"); ?>",
            beforeSend: function() {
                $('#loading_lpk_kursus').html("<div><img height='100px' src='<?php echo base_url("assets/images/loading.gif")?>'></div>");
            },
            success: function(abc) {
                $("#lpk_negeri").html(abc);
            }
        });
    });

    $("#lpk_negeri").change(function(){
        var val_negeri = $("#lpk_negeri").val();
        $.ajax({
            method: "POST",
            data: {opt_negeri:val_negeri},
            url: "<?php echo site_url("admin/pelatih_lanjutan/ajax_negeri"); ?>",
            beforeSend: function() {
                $('#loading_lpk_negeri').html("<div><img height='100px' src='<?php echo base_url("assets/images/loading.gif")?>'></div>");
            },
            success: function(abc) {
                $("#lpk_giatmara").html(abc);
            }
        });
    });

    //  Bagian Latihan Lanjutan - Negeri
    $("#lpn_negeri").change(function(){
        var val_negeri = $("#lpn_negeri").val();
        $.ajax({
            method: "POST",
            data: {opt_negeri:val_negeri},
            url: "<?php echo site_url("admin/pelatih_lanjutan/ajax_negeri"); ?>",
            beforeSend: function() {
                $('#loading_lpn_negeri').html("<div><img height='100px' src='<?php echo base_url("assets/images/loading.gif")?>'></div>");
            },
            success: function(abc) {
                $("#lpn_giatmara").html(abc);
            }
        });
    });

    $("#kategori_pelatih").change(function(){
        var val_kategori_pelatih = $("#kategori_pelatih").val();
        if(val_kategori_pelatih == 'Latihan-Lanjutan') {
            $("#latihan-lanjutan").show();
            $("#rintis-niaga").hide();
            $("#program-pertandingan").hide();
            $("#program-khas").hide();
        } else if (val_kategori_pelatih == "Rintis-Niaga") {
            $("#latihan-lanjutan").hide();
            $("#rintis-niaga").show();
            $("#program-pertandingan").hide();
            $("#program-khas").hide();
        } else if (val_kategori_pelatih == "Program-Pertandingan") {
            $("#latihan-lanjutan").hide();
            $("#rintis-niaga").hide();
            $("#program-pertandingan").show();
            $("#program-khas").hide();
        } else if (val_kategori_pelatih == "Program-Khas") {
            $("#latihan-lanjutan").hide();
            $("#rintis-niaga").hide();
            $("#program-pertandingan").hide();
            $("#program-khas").show();
        }
    });

    $("#opt_mengikut_kursus").change(function() {
        if ($("#opt_mengikut_kursus").val() === "Negeri") {
            $("#tbl-negeri").show();
            $("#tbl-kursus").hide();
            $('#opt_mengikut_kursus').val('Kursus').attr("selected", "selected");
        } else {
            $("#tbl-negeri").hide();
            $("#tbl-kursus").show();
            $('#opt_mengikut_kursus').val('Negeri').attr("selected", "selected");
        }
    });

    $("#opt_mengikut_negeri").change(function() {
        if ($("#opt_mengikut_negeri").val() === "Kursus") {
            $("#tbl-negeri").hide();
            $("#tbl-kursus").show();
            $('#opt_mengikut_negeri').val('Negeri').attr("selected", "selected");
        } else {
            $("#tbl-negeri").show();
            $("#tbl-kursus").hide();
            $('#opt_mengikut_negeri').val('Kursus').attr("selected", "selected");
        }
    });
    // END KURSUS PILIHAN

    // BAGIAN KURSUS TERDAHULU
    $("#btn_seterusnya_tab_1").click(function(){
        $('#my-tab a[href="#tab_2"]').tab("show");
    });
    // END KURSUS TERDAHULU
});

function toggle(param, obj) {
	var $input = $(obj);
	if ($input.prop('checked')) {
		$(param).show();
		$(param).focus();
	} else { $(param).hide();	}
}
</script>
