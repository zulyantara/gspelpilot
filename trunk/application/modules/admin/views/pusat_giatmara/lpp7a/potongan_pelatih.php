<style type="text/css">

    .panel-custom-horrible-red {
        border-color:  #000063 ;
    }
    .panel-custom-horrible-red > .panel-heading {
        background:  #000063 ; 
        color:  #000063 ;
        border-color:  #000063  ;
    }
    .ui-datepicker{ z-index:1151 !important; }
</style>
<div class="row" id="one" >
    <div class="col-md-12">
        <div class="box">
            <div class="panel panel-info panel-custom-horrible-red">
                <div class="panel-heading panel-heading-custom">
                    <h4 style="color: white">Maklumat Potongan Pelatih (LPP7A)</h4>
                </div>

                <div class="panel-body">
                    <div class ="table table-responsive">
                        <table width="100%" border="0">
                            <tr>
                                <td>
                                    <table class ="table" style="border:1px solid #ffffff">
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td><?php echo $dataPelatih->nama_penuh; ?></td>
                                        </tr>
                                        <tr>
                                            <td>No. KP</td>
                                            <td>:</td>
                                            <td><?php echo $dataPelatih->no_mykad; ?></td>
                                        </tr>
                                        <tr>
                                            <td>ID Pelatih</td>
                                            <td>:</td>
                                            <td><?php echo $dataPelatih->no_pelatih; ?></td>
                                        </tr>
                                    </table>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    Elaun
                                </td>
                                <td></td>
                                <td>
                                    Potongan
                                </td>
                            </tr>
                            <tr style="vertical-align: top">
                                <td>
                                    <table class ="table table-hover table-bordered" id = "myTable">
                                        <thead style ="background-color:#b3b3b3">
                                            <tr>
                                                <th>Bil</th>
                                                <th>Jenis</th>
                                                <th>Jumlah (RM)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($dataElaun) {
                                                $no = 0;
                                                foreach ($dataElaun as $r) :
                                                    ?>
                                                    <tr>
                                                        <td><?php echo ++$no; ?></td>
                                                        <td><?php echo $r->name; ?></td>
                                                        <td><?php echo $r->amount; ?></td>
                                                    </tr>
                                                    <?php
                                                endforeach;
                                            }
                                            ?>
                                            <tr>
                                                <td><b>Tempoh Elaun</b></td>
                                                <td><b>Mulai: <?php echo $dataPelatih->tarikh_mula_kursus ? date("d/m/Y", strtotime($dataPelatih->tarikh_mula_kursus)) : ''; ?></b></td>
                                                <td><b>Tamat: <?php echo $dataPelatih->tarikh_tamat_kursus ? date("d/m/Y", strtotime($dataPelatih->tarikh_tamat_kursus)) : ''; ?></b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td width="1%"></td>
                                <td>
                                    <form action="<?php echo site_url('admin/Pusat_giatmara/tambah_potongan_pelatih'); ?>" method="post">
                                        <table class ="table table-hover table-bordered" id = "myTable">
                                            <thead style ="background-color:#b3b3b3">
                                                <tr>
                                                    <th>Bil</th>
                                                    <th>Jenis</th>
                                                    <th>Jumlah (RM)</th>
                                                    <th>Tarikh Ditambah</th>
                                                    <th>Tindakan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($dataPotongan) {
                                                    $no = 0;
                                                    foreach ($dataPotongan as $r) :
                                                        ?>
                                                        <tr>
                                                            <td><?php echo ++$no; ?></td>
                                                            <td><?php echo $r->name; ?></td>
                                                            <td><?php echo $r->value_per_unit; ?></td>
                                                            <td><?php echo $r->tarikh_ditambah ? date("d/m/Y", strtotime($r->tarikh_ditambah)) : ''; ?></td>
                                                            <td></td>
                                                        </tr>
                                                        <?php
                                                    endforeach;
                                                }
                                                if ($dataLpp7a) {
                                                    ?>
                                                    <tr>
                                                        <td colspan="5" style="background-color: #b3b3b3; color: #fff301"><b>LPP7A</b></td>
                                                    </tr>
                                                    <?php
                                                    $no = 0;
                                                    foreach ($dataLpp7a as $r) :
                                                        ?>
                                                        <tr>
                                                            <td><?php echo ++$no; ?></td>
                                                            <td><?php echo $r->name; ?></td>
                                                            <td><?php echo $r->value_per_unit; ?></td>
                                                            <td><?php echo $r->dihantar_pada ? date("d/m/Y", strtotime($r->dihantar_pada)) : ''; ?></td>
                                                            <td><input type="checkbox" id="pilih" class="pilih" name="pilih[<?php echo $r->id; ?>]" <?php echo (($r->dihantar_oleh) ? 'disabled' : ''); ?>></td>
                                                        </tr>
                                                        <?php
                                                    endforeach;
                                                }
                                                ?>
                                                <tr>
                                                    <td colspan="5">
                                                        <a data-toggle="modal" class="open-Dialog btn btn-primary" href="#myModal">Tambah Potongan</a>
                                                        <!--<button type="submit" class="btn btn-danger" id ="delete" name="action" value="submit">Hantar yang Terpilih</button>-->
                                                        <button type="submit" class="btn btn-danger" id ="delete" name="action" value="delete">Padam yang Terpilih</button>
                                                        <input type="hidden" name="id_pelatih" id="id_pelatih" value="<?php echo $idPelatih; ?>" />
                                                        <input type="hidden" name="id_negeri" id="id_negeri" value="<?php echo $idNegeri; ?>" />
                                                        <input type="hidden" name="id_giatmara" id="id_giatmara" value="<?php echo $idGiatmara; ?>" />
                                                        <input type="hidden" name="id_kursus" id="id_kursus" value="<?php echo $idKursus; ?>" />
                                                        <input type="hidden" name="id_intake" id="id_intake" value="<?php echo $idIntake; ?>" />
                                                        <input type="hidden" name="nama_pelatih" id="nama_pelatih" value="<?php echo $namaPelatih; ?>" />
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <a data-toggle="modal" class="open-Dialog btn btn-success" href="<?php echo site_url("admin/Pusat_giatmara/perubahan_potongan_elaun/$idPelatih/$idNegeri/$idGiatmara/$idKursus/$idIntake/$namaPelatih/"); ?>">Hantar</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Potongan Baru</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('admin/Pusat_giatmara/tambah_potongan_pelatih'); ?>" method="post">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleNamaPenuh">Pilih Jenis Potongan</label>
                            <select id="id_kew_potongan" name="id_kew_potongan" class="form-control" required="true">
                                <option value=""></option>
                                <?php
                                foreach ($dataKewPotongan as $r) {
                                    echo '<option value="' . $r->id . '">' . $r->name . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleNamaPenuh">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" readonly="true">
                        </div>
                        <div class="form-group">
                            <label for="exampleNamaPenuh">Kod</label>
                            <input type="text" class="form-control" id="kod" name="kod" readonly="true">
                        </div>
                        <div class="form-group">
                            <label for="exampleNamaPenuh">Dana</label>
                            <input type="text" class="form-control" id="dana" name="dana" readonly="true">
                        </div>
                        <div class="form-group">
                            <label for="exampleNamaPenuh">Program</label>
                            <input type="text" class="form-control" id="program" name="program" readonly="true">
                        </div>
                        <div class="form-group">
                            <label for="exampleNamaPenuh">Peringkat</label>
                            <input type="text" class="form-control" id="peringkat" name="peringkat" readonly="true">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleNamaPenuh">Kekerapan Potongan</label>
                            <input type="text" class="form-control" id="kekerapan" name="kekerapan" required="true">
                        </div>
                        <div class="form-group">
                            <label for="exampleNamaPenuh">Jumlah (RM)</label>
                            <input type="text" class="form-control" id="jumlah" name="jumlah" readonly="true">
                        </div>
                        <div class="form-group">
                            <label for="exampleNamaPenuh">Penerangan</label>
                            <input type="text" class="form-control" id="penerangan" name="penerangan" readonly="true">
                        </div>
                        <div class="form-group">
                            <label for="exampleNamaPenuh">Tarikh Mula</label>
                            <div id="datepicker1" class="input-group date">
                                <input class="form-control" type="text" name="tarikh_mula" id="tarikh_mula" required="true"/>
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-calendar"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleNamaPenuh">Tarikh Tamat</label>
                            <div id="datepicker1" class="input-group date">
                                <input class="form-control" type="text" name="tarikh_tamat" id="tarikh_tamat" required="true"/>
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-calendar"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="id_pelatih" id="id_pelatih" value="<?php echo $idPelatih; ?>" />
                            <input type="hidden" name="id_negeri" id="id_negeri" value="<?php echo $idNegeri; ?>" />
                            <input type="hidden" name="id_giatmara" id="id_giatmara" value="<?php echo $idGiatmara; ?>" />
                            <input type="hidden" name="id_kursus" id="id_kursus" value="<?php echo $idKursus; ?>" />
                            <input type="hidden" name="id_intake" id="id_intake" value="<?php echo $idIntake; ?>" />
                            <input type="hidden" name="nama_pelatih" id="nama_pelatih" value="<?php echo $namaPelatih; ?>" />
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id ="batalkan" name="action" value="hantar">Tambah</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>    
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#pagetitle").text("Perubahan Potongan Elaun");

        $(document).on("click", ".open-Dialog", function () {
        });

        $('#tarikh_mula').datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
            autoclose: true,
            yearRange: "-100:+100"
        });

        $('#tarikh_tamat').datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
            autoclose: true,
            yearRange: "-100:+100"
        });

        $('#kekerapan').on('change', function () {
            jQuery.ajax({
                type: "POST",
                url: "<?php echo site_url("admin/Pusat_giatmara/ajax"); ?>",
                data: {task: 'get_jumlah_potongan', jumlah: this.value, id: $('#id_kew_potongan').val()},
                success: function (msg) {
                    if (msg.length > 0) {
                        eval(msg);
                    }
                }
            });
        });
    });

    jQuery('select#id_kew_potongan').change(function () {
//        alert(this.value);
        jQuery.ajax({
            type: "POST",
            url: "<?php echo site_url("admin/Pusat_giatmara/ajax"); ?>",
            data: {task: 'get_kew_potongan', id: this.value},
            success: function (msg) {
                if (msg.length > 0) {
                    eval(msg);
                }
            }
        });
    });
</script>