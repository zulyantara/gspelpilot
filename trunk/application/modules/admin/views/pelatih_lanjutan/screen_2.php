<style>
    .disabledTab{
    /*pointer-events: none;*/
}
</style>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs" id="my-tab">
                <li class="active"><a href="#tab_1" data-toggle="tab">Butir Peribadi</a></li>
                <li class="disabledTab" id="li_tab_2"><a href="#tab_2" data-toggle="tab">Kursus Terdahulu</a></li>
                <li class="disabledTab" id="li_tab_3"><a href="#tab_3" data-toggle="tab">Maklumat Am</a></li>
                <li class="disabledTab" id="li_tab_4"><a href="#tab_4" data-toggle="tab">Program Pilihan</a></li>
                <li class="disabledTab" id="li_tab_5"><a href="#tab_5" data-toggle="tab">Maklumat Penjaga</a></li>
                <li class="disabledTab" id="li_tab_6"><a href="#tab_6" data-toggle="tab">Tempat Tinggal</a></li>
                <li class="disabledTab" id="li_tab_7"><a href="#tab_7" data-toggle="tab">Dokumen Sokongan</a></li>
                <li class="disabledTab" id="li_tab_8"><a href="#tab_8" data-toggle="tab">Pengakuan</a></li>
            </ul>

            <!-- Kursus Terdahulu -->
            <div class="tab-content">

                <!-- Butir Peribadi -->
                <div class="tab-pane active" id="tab_1">

                    <div class="box box-solid box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">BUTIR PERIBADI</h3>
                        </div>
                        <div class="box-body">
                            <?php
                                $this->load->view('butir-peribadi');
                            ?>
                        </div>
                    </div>

                </div>
                <!-- End Butir Peribadi -->

                <div class="tab-pane" id="tab_2">

                    <div class="box box-solid box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">KURSUS-KURSUS TERDAHULU</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <input type="hidden" name="idBpLast" id="idBpLast" value="<?php echo $idBpLast?>">
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
                                        $bil = 0;
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
                                                <td>
                                                    <?php
                                                    $dt_tarikh_mula = new DateTime($val_kt->tarikh_mula_kursus);
                                                    echo $dt_tarikh_mula->format("d-m-Y");
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $dt_tarikh_tamat = new DateTime($val_kt->tarikh_tamat_kursus);
                                                    echo $dt_tarikh_tamat->format("d-m-Y");
                                                    ?>
                                                </td>
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
                <?php
                    if($get_am->media_cetak == 1) $am1 = "checked";
                    if($get_am->media_elektronik == 1) $am2 = "checked";
                    if($get_am->internet == 1) $am3 = "checked";
                    if($get_am->media_sosial == 1) $am4 = "checked";
                    if($get_am->rakan == 1) $am5 = "checked";
                    if($get_am->keluarga == 1) $am6 = "checked";
                    if($get_am->pameran == 1) $am7 = "checked";
                    if($get_am->lain == 1) $am8 = "checked";

                    if($get_am2->minat_sendiri == 1) $am21 = "checked";
                    if($get_am2->galakan_keluarga == 1) $am22 = "checked";
                    if($get_am2->galakan_rakan == 1) $am23 = "checked";
                    if($get_am2->keperluan_majikan == 1) $am24 = "checked";

                    if(count($get_am)>0){
                        $val_isi1 = "1";
                    }

                    if(count($get_am2)>0){
                        $val_isi2 = "1";
                    }


                ?>
                <div class="tab-pane" id="tab_3">

                    <div class="box box-solid box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">MAKLUMAT AM</h3>
                        </div>
                        <div class="box-body">
                            <p class="text-bold">DARI SUMBER MANAKAH ANDA MENDAPAT MAKLUMAT BERKENAAN KURSUS INI?<span class="text-danger">*</span></p>
                            <form class="form-inline" id="frm_maklumat_am">
                                <input type="hidden" name="ma_no_mykad" value="<?php echo $no_mykad; ?>">
                                <input type="hidden" name="idBpLast" value="<?php echo $idBpLast; ?>">
                                <input type="hidden" name="isi1" id="isi1" value="<?php echo $val_isi1?>">
                                <div class="row">
                                    <div class="box-header with-border">
                                    <label>
                                        <input type="checkbox" name="sumber_media_cetak" id="sumber_media_cetak" value="1" <?php echo $am1?>> Media Cetak
                                    </label> <br/>
                                    <label>
                                        <input type="checkbox" name="sumber_media_elektronik"  id="sumber_media_elektronik" value="1" <?php echo $am2?>> Media Elektronik
                                    </label> <br/>
                                    <label>
                                        <input type="checkbox" name="sumber_internet" value="1"  id="sumber_internet" <?php echo $am3?>> Internet
                                    </label> <br/>
                                    <label>
                                        <input type="checkbox" name="sumber_media_sosial" id="sumber_media_sosial" value="1" <?php echo $am4?>> Media Sosial
                                    </label> <br/>
                                    <label>
                                        <input type="checkbox" name="sumber_rakan" id="sumber_rakan" vatlue="1" <?php echo $am5?>> Rakan-rakan
                                    </label> <br/>
                                    <label>
                                        <input type="checkbox" name="sumber_keluarga" id="sumber_keluarga" value="1" <?php echo $am6?>> Keluarga
                                    </label> <br/>
                                    <label>
                                        <input type="checkbox" name="sumber_pameran" id="sumber_pameran" value="1" <?php echo $am7?>> Pameran/Karnival Pendidikan
                                    </label> <br/>
                                    <label>
                                        <input type="checkbox" name="sumber_lain" id="sumber_lain" value="1" <?php echo $am8?>> Lain-lain
                                    </label> <br/>
                                    <div class="form-group">
                                        <input type="text" name="txt_lain" id="txt_lain" class="form-control" value="<?php echo $get_am->text_lain?>">
                                    </div>

                                    <p class="text-bold">APAKAH FAKTOR YANG MENDORONG ANDA MEMOHON UNTUK MENGIKUTI LATIHAN DI GIATMARA?<span class="text-danger">*</span></p>
                                    <div><input type="hidden" name="isi2" id="isi2" value="<?php echo $val_isi2?>"></div>
                                    <div>
                                        <label>
                                            <input type="checkbox" name="minat_sendiri" id="minat_sendiri" value="1" <?php echo $am21?>> Minat Sendiri
                                        </label> <br/>
                                        <label>
                                            <input type="checkbox" name="galakan_keluarga" id="galakan_keluarga" value="1" <?php echo $am22?>> Galakan Keluarga
                                        </label> <br/>
                                        <label>
                                            <input type="checkbox" name="galakan_rakan" id="galakan_rakan" value="1" <?php echo $am23?>> Galakan rakan-rakan
                                        </label> <br/>
                                        <label>
                                            <input type="checkbox" name="keperluan_majikan" id="keperluan_majikan" value="1" <?php echo $am24?>> Keperluan Majikan
                                        </label> <br/>
                                    </div>
                                    <div class="col-md-12" style="margin-top: 10px;">
                                        <div class="loading_mam"></div>
                                        <button type="button" id="btn_simpan_maklumat_am" class="btn btn-primary pull-right">Simpan & Seterusnya</button>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- End Maklumat Am -->

                <!-- Program Pilihan -->
                <div class="tab-pane" id="tab_4">

                    <div class="box box-solid box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">PROGRAM PILIHAN</h3>
                        </div>
                        <div class="box-body">
                            <form class="" id="frm_program_pilihan">
                                <input type="hidden" name="pp_no_mykad" value="<?php echo $no_mykad; ?>">
                                <input type="hidden" name="idBpLast" value="<?php echo $idBpLast; ?>">
                                <input type="hidden" name="pp_giatmara" value="<?php echo $id_giatmara_user; ?>">
                                <div class="form-group">
                                    <label for="opt_kategori_pelatih">Kategori Pelatih</label>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <select class="form-control" name="opt_kategori_pelatih" id="kategori_pelatih">
                                                <?php
                                                $arr_kp = array("SL"=>"Sila Pilih","LL"=>"Latihan Lanjutan", "RN"=>"Rintis Niaga", "PP"=>"Program Pertandingan", "PK"=>"Program Khas");
                                                foreach ($arr_kp as $kkp => $vkp)
                                                {
                                                    $sel_kp = "";
                                                    // $sel_kp = $kkp == $row_pk->kategori_program ? "selected=\"selected\"" : "";
                                                    ?>
                                                    <option value="<?php echo $kkp; ?>" <?php echo $sel_kp; ?>><?php echo $vkp; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Latihan Lanjutan -->
                                <div class="" id="latihan-lanjutan">
                                    <div id="tbl-negeri">
                                        <table class="table">
                                            <tr>
                                                <th>PILIHAN NEGERI</th>
                                                <th>PILIHAN GIATMARA</th>
                                                <th>PILIHAN KLUSTER</th>
                                                <th>PILIHAN KURSUS</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select class="form-control" name="lpn_negeri" id="lpn_negeri">
                                                        <?php
                                                        if ($giatmara_type === "1")
                                                        {
                                                            if ($res_negeri_2 !== NULL)
                                                            {
                                                                ?>
                                                                <option value="<?php echo $res_negeri_2->id_negeri; ?>"><?php echo $res_negeri_2->nama_negeri; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <option>Sila Pilih</option>
                                                            <?php
                                                            if ($res_negeri !== NULL)
                                                            {
                                                                foreach ($res_negeri as $val_negeri)
                                                                {
                                                                    ?>
                                                                    <option value="<?php echo $val_negeri->id_negeri; ?>"><?php echo $val_negeri->nama_negeri; ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="lpn_giatmara" id="lpn_giatmara">
                                                        <?php
                                                        if ($giatmara_type === "1")
                                                        {
                                                            foreach ($res_giatmara as $val_lpn_giatmara)
                                                            {
                                                                ?>
                                                                <option value="<?php echo $val_lpn_giatmara->id_giatmara; ?>"><?php echo $val_lpn_giatmara->nama_giatmara; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <option>Sila Pilih</option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="lpn_kluster" id="lpn_kluster">
                                                        <option>Sila Pilih</option>
                                                        <?php
                                                        if ($giatmara_type === "1")
                                                        {
                                                            foreach ($res_kluster as $val_lpn_kluster)
                                                            {
                                                                ?>
                                                                <option value="<?php echo $val_lpn_kluster->id_kluster; ?>"><?php echo $val_lpn_kluster->nama_kluster; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
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

                                    <div class="row" id ="tawaran_terus">
                                        <div class="col-md-8">
                                            <input type="checkbox" name="tawaran_terus" value="on"> Permohonan ini diberi tawaran terus tanpa melalui proses temuduga
                                        </div>
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
                                                <select class="form-control" name="opt_rn_kluster" id="opt_rn_kluster">
                                                    <option value="">Sila Pilih</option>
                                                    <?php
                                                    if ($res_kluster !== NULL)
                                                        {
                                                            foreach($res_kluster as $kluster){
                                                                $sel_kluster = $kluster->id_kluster == $row_pk->id_kluster ? "selected=\"selected\"" : "";
                                                                ?>
                                                                <!-- <option value="<?php echo $kluster->id?>"><?php echo $kluster->kod_kluster." | ".$kluster->nama_kluster?></option> -->
                                                                <option value="<?php echo $kluster->id_kluster?>" <?php echo $sel_kluster; ?>><?php echo $kluster->nama_kluster; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No. SSM</td>
                                            <td>:</td>
                                            <td><input type="text" name="no_ssm" id="no_ssm" class="form-control" value="<?php echo $row_pk->no_ssm; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat Perniagaan</td>
                                            <td>:</td>
                                            <td><textarea name="alamat_perniagaan1" rows="10" cols="80"><?php echo $row_pk->no_ssm; ?></textarea></td>
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
                                                <select class="form-control" name="nama_program">
                                                    <option value="">Sila Pilih</option>
                                                    <?php
                                                    if ($res_pertandingan !== NULL)
                                                    {
                                                        foreach($res_pertandingan as $pertandingan){
                                                            $sel_pertandingan = $pertandingan ->id == $row_pk->id_program_pertandingan ? "selected=\"selected\"" : "";
                                                            ?>
                                                            <option value="<?php echo $pertandingan->id?>" <?php echo $sel_pertandingan; ?>><?php echo $pertandingan->nama_program?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
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
                                                <select class="form-control" name="nama_program_kas">
                                                    <option value="">Sila Pilih</option>
                                                    <?php
                                                    if ($res_kluster !== NULL)
                                                    {
                                                        foreach($res_program_kas as $kas){
                                                            $sel_program_kas = $kas->id == $row_pk->id_program_khas ? "selected=\"selected\"" : "";
                                                            ?>
                                                            <option value="<?php echo $kas->id?>" <?php echo $sel_program_kas; ?>><?php echo $kas->nama_program?></option>
                                                            <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- End Program Khas -->

                                    <div class="col-md-12" style="margin-top: 10px;">
                                        <div class="loading_mam"></div>
                                        <button type="button" id="btn_simpan_program_pilihan" class="btn btn-primary pull-right">Simpan & Seterusnya</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Program Pilihan -->



                <!-- Maklumat Penjaga -->
                <div class="tab-pane" id="tab_5">

                    <div class="box box-solid box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">MAKLUMAT PENJAGA</h3>
                        </div>
                        <div class="box-body">
                            <?php
                                $this->load->view('maklumat-penjaga');
                            ?>
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
                            <?php
                                $this->load->view('tempat-tinggal');
                            ?>
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
                            <?php
                                $this->load->view('dokumen-sokongan');
                            ?>
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
                            <?php
                                $this->load->view('pengakuan');
                            ?>
                        </div>
                    </div>

                </div>
                <!-- End Pengakuan -->

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

function cekAM(sumber,nilai){

    n = $('#'+sumber).val();

    if (n != "") {
        $('#'+sumber).val(1);
    }else{
        $('#'+sumber).val("");
    }
    $('#isi1').val(nilai);
}

function cekAM2(sumber,nilai){

    n = $('#'+sumber).val();

    if (n != "") {
        $('#'+sumber).val(1);
    }else{
        $('#'+sumber).val("");
    }
    $('#isi2').val(nilai);
}

$(document).ready(function(){
    // BAGIAN MAKLUMAT AM
    $("#sumber_media_cetak").change(function(){
      if ($('#sumber_media_cetak').is(':checked')) {
        $('#isi1').val(1);
      }
      else {
        $('#isi1').val('');
      }
    });

    $("#sumber_media_elektronik").change(function(){
      if ($('#sumber_media_elektronik').is(':checked')) {
        $('#isi1').val(1);
      }
      else {
        $('#isi1').val('');
      }
    });

    $("#sumber_internet").change(function(){
      if ($('#sumber_internet').is(':checked')) {
        $('#isi1').val(1);
      }
      else {
        $('#isi1').val('');
      }
    });

    $("#sumber_media_sosial").change(function(){
      if ($('#sumber_media_sosial').is(':checked')) {
        $('#isi1').val(1);
      }
      else {
        $('#isi1').val('');
      }
    });

    $("#sumber_rakan").change(function(){
      if ($('#sumber_rakan').is(':checked')) {
        $('#isi1').val(1);
      }
      else {
        $('#isi1').val('');
      }
    });

    $("#sumber_keluarga").change(function(){
      if ($('#sumber_keluarga').is(':checked')) {
        $('#isi1').val(1);
      }
      else {
        $('#isi1').val('');
      }
    });

    $("#sumber_pameran").change(function(){
      if ($('#sumber_pameran').is(':checked')) {
        $('#isi1').val(1);
      }
      else {
        $('#isi1').val('');
      }
    });

    $("#sumber_lain").change(function(){
      if ($('#sumber_lain').is(':checked')) {
        $('#isi1').val(1);
        $('#txt_lain').show();
      }
      else {
        $('#isi1').val('');
        $('#txt_lain').hide();
      }
    });

    $("#txt_lain").hide();
    // Simpan Maklumat Am

    $("#minat_sendiri").change(function(){
      if ($('#minat_sendiri').is(':checked')) {
        $('#isi2').val(1);
      }
      else {
        $('#isi2').val('');
      }
    });

    $("#galakan_keluarga").change(function(){
      if ($('#galakan_keluarga').is(':checked')) {
        $('#isi2').val(1);
      }
      else {
        $('#isi2').val('');
      }
    });

    $("#galakan_rakan").change(function(){
      if ($('#galakan_rakan').is(':checked')) {
        $('#isi2').val(1);
      }
      else {
        $('#isi2').val('');
      }
    });

    $("#keperluan_majikan").change(function(){
      if ($('#keperluan_majikan').is(':checked')) {
        $('#isi2').val(1);
      }
      else {
        $('#isi2').val('');
      }
    });

    $("#frm_maklumat_am").validate({
    ignore: [],
    rules: {
        isi1: "required",
        isi2: "required"
    },
    messages: {
        isi1: "Sila isikan ruangan ini",
        isi2: "Sila isikan ruangan ini"
    },
    errorElement: "em",
    errorPlacement: function ( error, element ) {
     // Add the `help-block` class to the error element
     error.addClass( "help-block" );

     if ( element.prop( "type" ) === "checkbox" || element.prop( "type" ) === "radio" ) {
      error.insertBefore( element.parent( "label" ) );
     } else {
      error.insertAfter( element );
     }
    },
    highlight: function ( element, errorClass, validClass ) {
     $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
    },
    unhighlight: function (element, errorClass, validClass) {
     $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
    }
    });

    $("#btn_simpan_maklumat_am").click(function(event){

        if ($("#frm_maklumat_am").valid()) {
        event.preventDefault();

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
                //if (xhr == 1) {
                    $('#my-tab a[href="#tab_4"]').tab("show");
                    $("#li_tab_4").removeClass("disabledTab");
                //}
            }
        });
        }
    });
    // END MAKLUMAT AM

    // Simpan Program Pilihan
    $("#frm_program_pilihan").validate({
    rules: {
        opt_mengikut_kursus: "required",
        lpk_kluster: "required",
        lpk_kursus: "required",
        lpk_negeri: "required",
        lpk_giatmara: "required"

    },
    messages: {
        opt_mengikut_kursus: "Sila isikan ruangan ini",
        lpk_kluster: "Sila isikan ruangan ini",
        lpk_kursus: "Sila isikan ruangan ini",
        lpk_negeri: "Sila isikan ruangan ini",
        lpk_giatmara: "Sila isikan ruangan ini"
    },
    errorElement: "em",
    errorPlacement: function ( error, element ) {
     // Add the `help-block` class to the error element
     error.addClass( "help-block" );

     if ( element.prop( "type" ) === "checkbox" || element.prop( "type" ) === "radio" ) {
      error.insertBefore( element.parent( "label" ) );
     } else {
      error.insertAfter( element );
     }
    },
    highlight: function ( element, errorClass, validClass ) {
     $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
    },
    unhighlight: function (element, errorClass, validClass) {
     $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
    }
    });

    $("#btn_simpan_program_pilihan").click(function(event){
        if ($("#frm_program_pilihan").valid()) {
        event.preventDefault();

        var data_frm_program_pilihan = $("#frm_program_pilihan").serialize();
        $.ajax({
            url: "<?php echo site_url("admin/pelatih_lanjutan/simpan_program_pilihan"); ?>",
            data: data_frm_program_pilihan,
            method: 'post',
            beforeSend: function() {
                $('#loading_mam').html("<div><img height='100px' src='<?php echo base_url("assets/images/loading.gif")?>'></div>");
            },
            success: function(xhr) {
                console.log(xhr);
                //if (xhr == 1) {
                    $('#my-tab a[href="#tab_5"]').tab("show");
                    $("#li_tab_5").removeClass("disabledTab");
                //}
            }
        });
        }
    });
    // END Program Pilihan

    // BAGIAN KURSUS PILIHAN
    $("#rintis-niaga").hide();
    $("#program-pertandingan").hide();
    $("#program-khas").hide();

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

    $("#lpn_giatmara").change(function(){
        var val_giatmara = $("#lpn_giatmara").val();
        $.ajax({
            method: "POST",
            data: {opt_giatmara: val_giatmara},
            url: "<?php echo site_url("admin/pelatih_lanjutan/ajax_giatmara_p1"); ?>",
            beforeSend: function() {
                $('#loading_lpn_giatmara').html("<div><img height='100px' src='<?php echo base_url("assets/images/loading.gif")?>'></div>");
            },
            success: function(abc) {
                $("#lpn_kluster").html(abc);
            }
        });
    });

    $("#lpn_kluster").change(function(){
        var val_negeri = $("#lpn_negeri").val();
        var val_giatmara = $("#lpn_giatmara").val();
        var val_kluster = $("#lpn_kluster").val();
        // alert(val_negeri);
        $.ajax({
            method: "POST",
            data: {opt_kluster: val_kluster, opt_negeri: val_negeri, opt_giatmara: val_giatmara},
            url: "<?php echo site_url("admin/pelatih_lanjutan/ajax_kursus_p1"); ?>",
            beforeSend: function() {
                $('#loading_lpn_kluster').html("<div><img height='100px' src='<?php echo base_url("assets/images/loading.gif")?>'></div>");
            },
            success: function(abc) {
                $("#lpn_kursus").html(abc);
            }
        });
    });

    var val_kategori_pelatih = $("#kategori_pelatih").val();
    if(val_kategori_pelatih == 'SL') {
        $("#latihan-lanjutan").hide();
        $("#tawaran_terus").hide();
        $("#rintis-niaga").hide();
        $("#program-pertandingan").hide();
        $("#program-khas").hide();
    } else if(val_kategori_pelatih == 'LL') {
        $("#latihan-lanjutan").show();
        $("#tawaran_terus").show();
        $("#rintis-niaga").hide();
        $("#program-pertandingan").hide();
        $("#program-khas").hide();
    } else if (val_kategori_pelatih == "RN") {
        $("#latihan-lanjutan").hide();
        $("#tawaran_terus").hide();
        $("#rintis-niaga").show();
        $("#program-pertandingan").hide();
        $("#program-khas").hide();
    } else if (val_kategori_pelatih == "PP") {
        $("#latihan-lanjutan").hide();
        $("#tawaran_terus").hide();
        $("#rintis-niaga").hide();
        $("#program-pertandingan").show();
        $("#program-khas").hide();
    } else if (val_kategori_pelatih == "PK") {
        $("#latihan-lanjutan").hide();
        $("#tawaran_terus").hide();
        $("#rintis-niaga").hide();
        $("#program-pertandingan").hide();
        $("#program-khas").show();
    }

    $("#kategori_pelatih").change(function(){
        var val_kategori_pelatih = $("#kategori_pelatih").val();
        if(val_kategori_pelatih == 'SL') {
            $("#latihan-lanjutan").hide();
            $("#tawaran_terus").hide();
            $("#rintis-niaga").hide();
            $("#program-pertandingan").hide();
            $("#program-khas").hide();
        } else if(val_kategori_pelatih == 'LL') {
            $("#latihan-lanjutan").show();
            $("#tawaran_terus").show();
            $("#rintis-niaga").hide();
            $("#program-pertandingan").hide();
            $("#program-khas").hide();
        } else if (val_kategori_pelatih == "RN") {
            $("#latihan-lanjutan").hide();
            $("#tawaran_terus").hide();
            $("#rintis-niaga").show();
            $("#program-pertandingan").hide();
            $("#program-khas").hide();
        } else if (val_kategori_pelatih == "PP") {
            $("#latihan-lanjutan").hide();
            $("#tawaran_terus").hide();
            $("#rintis-niaga").hide();
            $("#program-pertandingan").show();
            $("#program-khas").hide();
        } else if (val_kategori_pelatih == "PK") {
            $("#latihan-lanjutan").hide();
            $("#tawaran_terus").hide();
            $("#rintis-niaga").hide();
            $("#program-pertandingan").hide();
            $("#program-khas").show();
        }
    });

    $("#opt_mengikut_kursus").change(function() {
        if ($("#opt_mengikut_kursus").val() === "Kursus") {
            $("#tbl-negeri").hide();
            $("#tbl-kursus").show();
            $('#opt_mengikut_kursus').val('Kursus').attr("selected", "selected");
        } else {
            $("#tbl-negeri").show();
            $("#tbl-kursus").hide();
            $('#opt_mengikut_negeri').val('Negeri').attr("selected", "selected");
        }
    });

    $("#opt_mengikut_negeri").change(function() {
        if ($("#opt_mengikut_negeri").val() === "Negeri") {
            $("#tbl-negeri").show();
            $("#tbl-kursus").hide();
            $('#opt_mengikut_negeri').val('Negeri').attr("selected", "selected");
        } else {
            $("#tbl-negeri").hide();
            $("#tbl-kursus").show();
            $('#opt_mengikut_kursus').val('Kursus').attr("selected", "selected");
        }
    });
    // END KURSUS PILIHAN

    // BAGIAN KURSUS TERDAHULU
    $("#btn_seterusnya_tab_1").click(function(){
        $('#my-tab a[href="#tab_3"]').tab("show");
        $("#li_tab_3").removeClass("disabledTab");
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
