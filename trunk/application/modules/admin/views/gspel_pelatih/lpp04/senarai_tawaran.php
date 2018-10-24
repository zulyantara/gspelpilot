<div class="box box-solid box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Senarai Penawaran Kursus</h3>
    </div>
    <div class="box-body">
        <form class="form-horizontal" action="<?php echo site_url("admin/lpp04/".$url); ?>" method="post" name="form-tawaran" id="form-tawaran" target="_blank">
            <input type="hidden" name="id_giatmara" value="<?php echo $id_giatmara; ?>">
            <table class="table table-bordered table-striped table-hover" id="tbl_senarai_tawaran">
                <thead>
                    <tr>
                        <th valign="top">No</th>
                        <th valign="top">NAMA</th>
                        <th valign="top">NO. MyKAD</th>
                        <th valign="top">SESI</th>
                        <th valign="top">TARIKH LAPOR DIRI</th>
                        <th valign="top"><input type="checkbox" name="all_tawaran" id="all_tawaran" value="0">SURAT TAWARAN</th>
                        <th valign="top">TARIKH CETAKAN</th>
                        <th valign="top">KEMASKINI</th>
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
                                    <button type="button" name="button" onclick="window.open('<?php echo site_url("admin/lpp04/print_nama/".$rp->no_mykad); ?>', 'newwindow', height=800, width=800);" class="btn btn-link"><?php echo $rp->nama_penuh; ?></button>
                                    <!-- <a href="#"><?php echo $rp->nama_penuh?></a> -->
                                </td>
                                <td><?php echo $rp->no_mykad?></td>
                                <td><?php echo $rp->kod_intake?></td>
                                <td><?php echo substr($rp->tarikh_temuduga,0,15)?></td>
                                <td>
                                    <a href="<?php echo site_url("admin/lpp04/cetak_surat_temuduga/".$rp->id_permohonan_kursus); ?>" target="_blank">CETAK</a>
                                    <input type="checkbox" name="tawaran[<?php echo $rp->id_permohonan_kursus?>]" id="tawaran[<?php echo $rp->id_permohonan_kursus?>]" value="1">
                                </td>
                                <td>
                                    <?php echo $rp->tawaran_tarikh_cetak?>
                                </td>
                                <td>
                                    <!-- button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Kemaskini</button -->
                                    <a data-toggle="modal" data-id="<?php echo $rp->id_temuduga_tetapan; ?>"
                                    data-kluster="<?php echo $rp->nama_kluster; ?>"
                                    data-kursus="<?php echo $rp->id_settings_tawaran_kursus; ?>"
                                    data-negeri="<?php echo $rp->nama_negeri; ?>"
                                    data-giatmara="<?php echo $rp->nama_giatmara; ?>"
                                    data-sesi="<?php echo $rp->nama_tawaran_sesi; ?>"
                                     class="open-Dialog btn btn-primary" href="#myModal">KEMASKINI</a>
                                </td>
                            </tr>
                            <?php
                            $x++;
                        }
                    }
                    ?>
                </tbody>
            </table>
            <div class="box box-solid col-sm-12" style="padding: 10px 20px">
                <span class="pull-right"><button type="submit" class="btn btn-primary" name="luluskan" value="luluskan">Cetak</button></span>
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
                <h4 class="modal-title" id="myModalLabel">Kemaskini</h4>
            </div>
            <div class="modal-body">
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
                                        <td><label id="nameKluster"></label></td>
                                        <td>
                                            <select class="form-control" name="opt_kursus" id="opt_kursus" > <!-- required -->
                                            <option value="<?php echo $rp->id_settings_tawaran_kursus; ?>" selected><?php echo $rp->nama_kursus; ?></option>
                                            </select>
                                        </td>
                                        <td><label id="nameNegeri"></label></td>
                                        <td><label id="nameGiatmara"></label></td>
                                        <td>
                                            <select class="form-control" name="opt_sesi" id="opt_sesi" > <!-- required -->
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
        </div>
    </div>
</div>
<!--end Modal-->

<script type="text/javascript">
$(document).ready(function(){
	$("#tbl_senarai_tawaran").DataTable();

	$('#myModal').on('shown.bs.modal', function () {
	    $(this).find('.modal-dialog').css({width:'auto', height:'auto', 'max-height':'100%'});
    });

    $("#all_tawaran").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    $('#myModal').on('shown.bs.modal', function () {})

    $(document).on("click", ".open-Dialog", function () {
        var myIdtetapantemuduga = $(this).data('id');
        var nameKluster = $(this).data('kluster');
        var nameNegeri = $(this).data('negeri');
        var nameGiatmara = $(this).data('giatmara');
        // console.log(myIdtetapantemuduga);
        $(".modal-body #idTetapanTemuduga").val( myIdtetapantemuduga );
        $(".modal-body #nameKluster").html( nameKluster );
        $(".modal-body #nameNegeri").html( nameNegeri );
        $(".modal-body #nameGiatmara").html( nameGiatmara );
   });

    $("#opt_sesi").change(function(){
        var val_giatmara = $("#idgiatmara").val();
        var val_sesi = $("#opt_sesi").val();
        //console.log(val_giatmara);
        $.ajax({
            // dataType: 'json',
            data: {txt_giatmara : val_giatmara, txt_sesi : val_sesi, txt_kluster:1, txt_kursus: <?php echo $row_programme[0]->id_settings_tawaran_kursus;?> },
            url: "<?php echo site_url("admin/lpp04/kursus2_ajax"); ?>",
            type: "POST",
            success : function(data) {
                // console.log(data);
                $("#opt_kursus").html(data.option);
                $("#nameKluster").html("");
                $("#nameKluster").html(data.kluster);
            }
        });
    });
});
</script>
