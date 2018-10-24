<div class="row">
    <div class="col-md-12">

        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tetapan GIATMARA dan Kursus</h3>
            </div>

            <div class="box-body">
                <form class="form-horizontal" action="<?php echo site_url("admin/lpp04/luluskan"); ?>" method="post">
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

<div class="box box-solid box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Senarai Penawaran Kursus</h3>
    </div>
    <div class="box-body">
        <form class="form-horizontal" action="<?php echo site_url("admin/lpp04/cetak_surat_temuduga"); ?>" method="post" name="form-tawaran" id="form-tawaran" target="_blank">
            <input type="hidden" name="id_giatmara" value="<?php echo $id_giatmara; ?>">
            <table class="table table-bordered table-striped table-hover" id="tbl_senarai_tawaran">
                <thead>
                    <tr>
                        <th valign="top">No</th>
                        <th valign="top">NAMA</th>
                        <th valign="top">NO. MyKAD</th>
                        <th valign="top">SESI</th>
                        <th valign="top">TARIKH LAPOR DIRI</th>
                        <th valign="top"><!--<input type="checkbox" name="all_tawaran" id="all_tawaran" value="0">-->SURAT TAWARAN</th>
                        <th valign="top">TARIKH CETAKAN</th>
                        <!-- <th valign="top">KEMASKINI</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $x=1;
                    if($row_programme) {
                        foreach($row_programme as $rp) {
                            ?>
                            <tr>
                                <td><?php echo $x ?></td>
                                <td valign="top">
                                    <input type="hidden" name="idPemohon[<?php echo $rp->id_permohonan_kursus?>]" id="idPemohon[<?php echo $rp->id_permohonan_kursus?>]" value="<?php echo $rp->id_permohonan_kursus?>">
                                    <button type="button" class="btn btn-link open-Dialog" data-toggle="modal" data-target="#myModal" data-id="<?php echo $rp->id_permohonan; ?>" data-mykad="<?php echo $rp->no_mykad; ?>" data-nama="<?php echo $rp->nama_penuh; ?>">
                                        <?php echo $rp->nama_penuh; ?>
                                    </button>
                                    <!-- <button type="button" name="button" onclick="window.open('<?php echo site_url("admin/lpp04/print_nama/".$rp->no_mykad); ?>', 'newwindow', height=800, width=800);" class="btn btn-link"><?php echo $rp->nama_penuh; ?></button> -->
                                    <!-- <a href="#"><?php echo $rp->nama_penuh?></a> -->
                                </td>
                                <td><?php echo $rp->no_mykad?></td>
                                <td><?php echo $rp->kod_intake?></td>
                                <!-- <td><?php echo substr($rp->tarikh_temuduga,0,15)?></td> -->
                                <td><?php echo date("d-m-Y", strtotime($rp->tawaran_tarikh_lapordiri))." ".date("H:i", strtotime($rp->tawaran_masa_lapordiri)); ?></td>
                                <td align="center">
                                    <a href="<?php echo site_url("admin/lpp04/cetak_surat_temuduga/".$rp->id_temuduga_tetapan); ?>" target="_blank" onclick="ud('<?php echo $rp->no_mykad;?>')" >CETAK</a>
                                    <!--<input type="checkbox" name="tawaran[<?php echo $rp->id_temuduga_tetapan?>]" id="tawaran[<?php echo $rp->id_temuduga_tetapan?>]" value="1">-->
                                </td>
                                <td><div id="pd_<?php echo $rp->no_mykad;?>" ><?php echo $rp->tawaran_tarikh_cetak_2 != "" ? date("d-m-Y", strtotime($rp->tawaran_tarikh_cetak_2)) : ""; ?></div></td>
                                <!-- <td>
                                    <a data-toggle="modal" data-id="<?php echo $rp->id_temuduga_tetapan; ?>"
                                    data-kluster="<?php echo $rp->nama_kluster; ?>"
                                    data-kursus="<?php echo $rp->id_settings_tawaran_kursus; ?>"
                                    data-negeri="<?php echo $rp->nama_negeri; ?>"
                                    data-giatmara="<?php echo $rp->nama_giatmara; ?>"
                                    data-sesi="<?php echo $rp->nama_tawaran_sesi; ?>"
                                     class="open-Dialog btn btn-primary" href="#myModal">KEMASKINI</a>
                                </td> -->
                            </tr>
                            <?php
                            $x++;
                        }
                    }
                    ?>
                </tbody>
            </table>
			<script>
			// ridei.karim@gmail.com, quick mode
			function ud(x){
				var today = new Date();
				var dd = today.getDate();
				var mm = today.getMonth()+1; //January is 0!
				var yyyy = today.getFullYear();
                if(dd<10){
                    dd='0'+dd;
                }
                if(mm<10){
                    mm='0'+mm;
                }
                y=dd+"-"+mm+"-"+yyyy;
				//$("#pd_"+x).innerHTML(y);
				document.getElementById('pd_'+x).innerHTML=y;
			}
			</script>
            <div class="box box-solid col-sm-12" style="padding: 10px 20px">
                <!-- <span class="pull-right"><button type="submit" class="btn btn-primary" name="luluskan" value="luluskan">Cetak</button></span> -->
            </div>
        </form>
    </div>
</div>

<!--Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="padding: 20px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Form Ubah Nama / No. MyKAD</h4>
                <!-- <h4 class="modal-title" id="myModalLabel">Kemaskini</h4> -->
            </div>
            <form action="<?php echo site_url("admin/lpp04/update_bp"); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="txt_id_permohonan" id="txt_id_permohonan" value="">
                    <div class="form-group">
                        <label for="txt_no_mykad">No. MyKAD</label>
                        <input type="text" name="txt_no_mykad" id="txt_no_mykad" placeholder="No. MyKAD" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="txt_nama_penuh">Nama Penuh</label>
                        <input type="text" name="txt_nama_penuh" id="txt_nama_penuh" placeholder="Nama Penuh" class="form-control" style="text-transform:uppercase">
                    </div>
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
                <div class="modal-footer">
                    <button type="submit" name="btn_simpan" value="simpan" class="btn btn-primary pull-left">Simpan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
                <!--
                <form class="form-horizontal" action="<?php echo site_url("admin/lpp04/simpan_kemaskini"); ?>" method="post"  name="form-kemaskini" id="form-kemaskini">
                    <input type="hidden" name="idgiatmara" id="idgiatmara" value="<?php echo $id_giatmara; ?>">
                    <input type="hidden" name="idTetapanTemuduga" id="idTetapanTemuduga" value="" />
                    <div class="box box-solid box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Programme Offering</h3>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered table-striped table-hover table-kemaskini" id="tbl_kemaskini">
                                <thead>
                                    <tr>
                                        <th valign="top">BIL</th>
                                        <th valign="top">KLUSTER</th>
                                        <th valign="top">KURSUS</th>
                                        <th valign="top">NEGERI</th>
                                        <th valign="top">GIATMARA</th>
                                        <th valign="top">SESI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <select class="form-control" name="opt_kursus" id="opt_kursus" >
                                            <option value="<?php echo $rp->id_settings_tawaran_kursus; ?>" selected><?php echo $rp->nama_kursus; ?></option>
                                            </select>
                                        </td>
                                        <td><label id="nameKluster"></label></td>
                                        <td><label id="nameNegeri"></label></td>
                                        <td><label id="nameGiatmara"></label></td>
                                        <td>
                                            <select class="form-control" name="opt_sesi" id="opt_sesi" >
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
                                    </tr>
                                </tbody>
                            </table>
                            <div class="box box-solid col-sm-12" style="padding: 10px 20px">
                                <span class="pull-right"><button type="submit" class="btn btn-primary" name="luluskan" value="luluskan">Luluskan</button></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            -->
        </div>
    </div>
</div>
<!--end Modal-->

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

    $("#tbl_senarai_tawaran").DataTable();

	// $('#myModal').on('shown.bs.modal', function () {
	    // $(this).find('.modal-dialog').css({width:'auto', height:'auto', 'max-height':'100%'});
    // });

    $("#all_tawaran").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    $('#myModal').on('shown.bs.modal', function () {})

    $(document).on("click", ".open-Dialog", function () {
        var myIdpermohonan = $(this).data('id');
        var myNoMykad = $(this).data('mykad');
        var myNama = $(this).data('nama');
        $(".modal-body #txt_id_permohonan").val(myIdpermohonan);
        $(".modal-body #txt_no_mykad").val(myNoMykad);
        $(".modal-body #txt_nama_penuh").val(myNama);
        // var myIdtetapantemuduga = $(this).data('id');
        // var nameKluster = $(this).data('kluster');
        // var nameNegeri = $(this).data('negeri');
        // var nameGiatmara = $(this).data('giatmara');
        // console.log(myIdtetapantemuduga);
        // $(".modal-body #idTetapanTemuduga").val( myIdtetapantemuduga );
        // $(".modal-body #nameKluster").html( nameKluster );
        // $(".modal-body #nameNegeri").html( nameNegeri );
        // $(".modal-body #nameGiatmara").html( nameGiatmara );
   });

    // $("#opt_sesi").change(function(){
    //     var val_giatmara = $("#idgiatmara").val();
    //     var val_sesi = $("#opt_sesi").val();
    //     //console.log(val_giatmara);
    //     $.ajax({
    //         // dataType: 'json',
    //         data: {txt_giatmara : val_giatmara, txt_sesi : val_sesi, txt_kluster:1, txt_kursus: <?php echo $row_programme[0]->id_settings_tawaran_kursus;?> },
    //         url: "<?php echo site_url("admin/lpp04/kursus2_ajax"); ?>",
    //         type: "POST",
    //         success : function(data) {
    //             // console.log(data);
    //             $("#opt_kursus").html(data.option);
    //             $("#nameKluster").html("");
    //             $("#nameKluster").html(data.kluster);
    //         }
    //     });
    // });
});
</script>
