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
<div class="row">

    <div class="col-md-12">
        <div class="box ">
            <div class="panel panel-custom-horrible-red"  >
                <div class="panel-heading " >
                    <h4 style="color: white">Tetapan Kursus</h4>
                </div>
                <div class="panel-body" >
                    <form class="form-horizontal" action="<?php echo site_url('admin/Gspel_kewangan/tukar_giatmara_kursus'); ?>" method="post">
                        <fieldset>

                            <div class="form-group">
                                <label class="col-md-2">Kursus</label>
                                <div class="col-md-4">
                                    <select id="kursus" name="kursus" class="form-control">
                                        <?php
                                        foreach ($refKursus as $r) {
                                            echo '<option value="' . $r->id . '">' . $r->nama_kursus . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2">Kategori Pelatih</label>
                                <div class="col-md-4">
                                    <select id="jeniskursus" name="jeniskursus" class="form-control">
                                        <!--<option value="">Semua</option>-->
                                        <option value="LPP04">LPP04</option>
                                        <option value="LPP09">LPP09</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2">Sesi Kemasukan</label>
                                <div class="col-md-4">
                                    <select id="intake" name="intake" class="form-control">
                                        <?php
                                        foreach ($refIntake as $r) {
                                            echo '<option value="' . $r->id . '">' . $r->nama_intake . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <button id="paparkan" name="paparkan" type="submit" class="btn" style="background-color: #000063  "><font color="white">Paparkan</font></button>
                                </div>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>

<?php if ($isPost) { ?>
    <div class="row" id="one" >
        <div class="col-md-12">
            <div class="box">
                <div class="panel panel-info panel-custom-horrible-red">
                    <div class="panel-heading panel-heading-custom">
                        <h4 style="color: white">Senarai Pelatih</h4>
                    </div>

                    <div class="panel-body">
                        <div class ="table table-responsive">
                            <table width="100%" border="0">
                                <tr>
                                    <td width="50%">
                                        <table class ="table" style="border:1px solid #ffffff">
                                            <tr>
                                                <td>Nama Kursus</td>
                                                <td>:</td>
                                                <td><?php echo $namaKursus; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kategori Pelatih</td>
                                                <td>:</td>
                                                <td><?php echo $katPelatih; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Sesi Kemasukan</td>
                                                <td>:</td>
                                                <td><?php echo $namaIntake; ?></td>
                                            </tr>
                                        </table>
                                        <table class ="table table-hover table-bordered" id = "myTable">
                                            <thead style ="background-color:#b3b3b3">
                                                <tr>
                                                    <th rowspan="2">No.</th>
                                                    <th rowspan="2">Nama<br>No. KP</th>
                                                    <th rowspan="2">No. Pelatih</th>
                                                    <th rowspan="2">Sesi</th>
                                                    <th rowspan="2">Tarikh Mula</th>
                                                    <th rowspan="2">Tarikh Tamat</th>
                                                    <th colspan="2">Tukar</th>
                                                </tr>
                                                <tr>
                                                    <th>Kursus</th>
                                                    <th>Pusat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 0;
                                                if ($dataPelatih)
                                                    foreach ($dataPelatih as $r) :
                                                        ?>
                                                        <tr>
                                                            <td><?php echo ++$no; ?></td>
                                                            <td><?php echo $r->nama_penuh . '<br>' . $r->no_mykad; ?></td>
                                                            <td><?php echo $r->no_pelatih; ?></td>
                                                            <td><?php echo $r->nama_intake; ?></td>
                                                            <td><?php echo $r->tarikh_mula_kursus ? date("d/m/Y", strtotime($r->tarikh_mula_kursus)) : ''; ?></td>
                                                            <td><?php echo $r->tarikh_tamat_kursus ? date("d/m/Y", strtotime($r->tarikh_tamat_kursus)) : ''; ?></td>
                                                            <td><a data-toggle="modal" data-id="<?php echo $r->id_pelatih; ?>"
                                                                   data-kursus="<?php echo $idKursus; ?>"
                                                                   data-jenis="<?php echo $katPelatih; ?>"
                                                                   data-intake="<?php echo $idIntake; ?>"
                                                                   data-namapenuh="<?php echo $r->nama_penuh; ?>"
                                                                   data-nomykad="<?php echo $r->no_mykad; ?>"
                                                                   data-nopelatih="<?php echo $r->no_pelatih; ?>"
                                                                   data-namakursus="<?php echo $r->nama_kursus; ?>"
                                                                   data-idlpp10="<?php echo $r->id_lpp10; ?>"
                                                                   data-kursusbarulpp10="<?php echo $r->kursus_baru_lpp10; ?>"
                                                                   title="Kursus" class="open-Dialog btn btn-primary fa fa-pencil" href="#myModal"></a></td>
                                                            <td><a data-toggle="modal" data-id="<?php echo $r->id_pelatih; ?>"
                                                                   data-kursus="<?php echo $idKursus; ?>"
                                                                   data-jenis="<?php echo $katPelatih; ?>"
                                                                   data-intake="<?php echo $idIntake; ?>"
                                                                   data-namapenuh="<?php echo $r->nama_penuh; ?>"
                                                                   data-nomykad="<?php echo $r->no_mykad; ?>"
                                                                   data-nopelatih="<?php echo $r->no_pelatih; ?>"
                                                                   data-namakursus="<?php echo $r->nama_kursus; ?>"
                                                                   data-idlpp10="<?php echo $r->id_lpp10; ?>"
                                                                   data-giatmarabarulpp10="<?php echo $r->giatmara_baru_lpp10; ?>"
                                                                   data-negeribarulpp10="<?php echo $r->id_negeri_lpp10; ?>"
                                                                   data-negeriasal="<?php echo $r->id_negeri; ?>"
                                                                   data-giatmaraasal="<?php echo $r->id_giatmara; ?>"
                                                                   title="Pusat" class="open-Dialog2 btn btn-primary fa fa-pencil" href="#myModal2"></a></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Borang Pertukaran Kursus</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('admin/Gspel_kewangan/tukar_giatmara_kursus'); ?>" method="post">
                    <div class="form-group">
                        <label for="exampleNamaPenuh">Nama</label>
                        <input type="text" class="form-control" id="nama_penuh" name="nama_penuh" readonly="true">
                    </div>
                    <div class="form-group">
                        <label for="exampleNamaPenuh">No. MyKad</label>
                        <input type="text" class="form-control" id="no_mykad" name="no_mykad" readonly="true">
                    </div>
                    <div class="form-group">
                        <label for="exampleNamaPenuh">No. Pelatih</label>
                        <input type="text" class="form-control" id="no_pelatih" name="no_pelatih" readonly="true">
                    </div>
                    <div class="form-group">
                        <label for="exampleNamaPenuh">Kursus Semasa</label>
                        <input type="text" class="form-control" id="nama_kursus" name="nama_kursus" readonly="true">
                    </div>
                    <div class="form-group">
                        <label for="exampleNamaPenuh">Kursus Baru</label>
                        <select id="kursus_baru" name="kursus_baru" class="form-control" required="true">
                            <?php
                            foreach ($refKursus as $r) {
                                echo '<option value="' . $r->id . '">' . $r->nama_kursus . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleNamaPenuh">Nota</label>
                        <textarea class="form-control" rows="3" id="nota" name="nota"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id_pelatih" id="id_pelatih" value="" />
                        <input type="hidden" name="kursus" id="kursus" value="" />
                        <input type="hidden" name="jeniskursus" id="jeniskursus" value="" />
                        <input type="hidden" name="intake" id="intake" value="" />
                        <input type="hidden" name="idlpp10" id="idlpp10" value="" />
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id ="batalkan" name="action" value="hantar">Hantar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>    
            </div>
        </div>
    </div>
</div>

<div id="myModal2" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Borang Pertukaran Pusat Giatmara</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('admin/Gspel_kewangan/tukar_giatmara_kursus'); ?>" method="post">
                    <div class="form-group">
                        <label for="exampleNamaPenuh">Nama</label>
                        <input type="text" class="form-control" id="nama_penuh" name="nama_penuh" readonly="true">
                    </div>
                    <div class="form-group">
                        <label for="exampleNamaPenuh">No. MyKad</label>
                        <input type="text" class="form-control" id="no_mykad" name="no_mykad" readonly="true">
                    </div>
                    <div class="form-group">
                        <label for="exampleNamaPenuh">No. Pelatih</label>
                        <input type="text" class="form-control" id="no_pelatih" name="no_pelatih" readonly="true">
                    </div>
                    <div class="form-group">
                        <label for="exampleNamaPenuh">Kursus Semasa</label>
                        <input type="text" class="form-control" id="nama_kursus" name="nama_kursus" readonly="true">
                    </div>
                    <div class="form-group">
                        <label for="exampleNamaPenuh">Negeri</label>
                        <select id="negeri_baru" name="negeri_baru" class="form-control" required="true">
                            <option value=""></option>
                            <?php
                            foreach ($refNegeri as $r) {
                                echo '<option value="' . $r->id . '">' . $r->nama_negeri . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleNamaPenuh">Pusat</label>
                        <select id="giatmara_baru" name="giatmara_baru" class="form-control" required="true">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleNamaPenuh">Nota</label>
                        <textarea class="form-control" rows="3" id="nota" name="nota"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id_pelatih" id="id_pelatih" value="" />
                        <input type="hidden" name="kursus" id="kursus" value="" />
                        <input type="hidden" name="jeniskursus" id="jeniskursus" value="" />
                        <input type="hidden" name="intake" id="intake" value="" />
                        <input type="hidden" name="idlpp10" id="idlpp10" value="" />
                        <input type="hidden" name="giatmara_asal" id="giatmara_asal" value="" />
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id ="batalkan" name="action" value="pusat">Hantar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>    
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#pagetitle").text("Tukar Giatmara Kursus Giatmara <?php echo $nama_giatmara; ?>");
        
        $(document).on("click", ".open-Dialog", function () {
            var nama_asal = $(this).data('namapenuh');
            var nomykad = $(this).data('nomykad');
            var nopelatih = $(this).data('nopelatih');
            var namakursus = $(this).data('namakursus');
            var id_pelatih = $(this).data('id');
            var jeniskursus = $(this).data('jenis');
            var kursus = $(this).data('kursus');
            var intake = $(this).data('intake');
            var idlpp10 = $(this).data('idlpp10');
            var kursusbaru = $(this).data('kursusbarulpp10');
            console.log(nama_asal);
            $(".modal-body #nama_penuh").val(nama_asal);
            $(".modal-body #no_mykad").val(nomykad);
            $(".modal-body #no_pelatih").val(nopelatih);
            $(".modal-body #nama_kursus").val(namakursus);
            $(".modal-body #id_pelatih").val(id_pelatih);
            $(".modal-body #kursus").val(kursus);
            $(".modal-body #jeniskursus").val(jeniskursus);
            $(".modal-body #intake").val(intake);
            $(".modal-body #idlpp10").val(idlpp10);
            if (kursusbaru > 0)
                $(".modal-body #kursus_baru").val(kursusbaru);
            else
                $(".modal-body #kursus_baru").val(kursus);
        });
        $(document).on("click", ".open-Dialog2", function () {
            var nama_asal = $(this).data('namapenuh');
            var nomykad = $(this).data('nomykad');
            var nopelatih = $(this).data('nopelatih');
            var namakursus = $(this).data('namakursus');
            var id_pelatih = $(this).data('id');
            var jeniskursus = $(this).data('jenis');
            var kursus = $(this).data('kursus');
            var intake = $(this).data('intake');
            var idlpp10 = $(this).data('idlpp10');
            var giatmarabaru = $(this).data('giatmarabarulpp10');
            var negeribaru = $(this).data('negeribarulpp10');
            var negeriasal = $(this).data('negeriasal');
            var giatmaraasal = $(this).data('giatmaraasal');
            console.log(nama_asal);
            $(".modal-body #nama_penuh").val(nama_asal);
            $(".modal-body #no_mykad").val(nomykad);
            $(".modal-body #no_pelatih").val(nopelatih);
            $(".modal-body #nama_kursus").val(namakursus);
            $(".modal-body #id_pelatih").val(id_pelatih);
            $(".modal-body #kursus").val(kursus);
            $(".modal-body #jeniskursus").val(jeniskursus);
            $(".modal-body #intake").val(intake);
            $(".modal-body #giatmara_asal").val(giatmaraasal);
            $(".modal-body #idlpp10").val(idlpp10);
            if (giatmarabaru > 0)
                $(".modal-body #negeri_baru").val(negeribaru);
            else
                $(".modal-body #negeri_baru").val('');
            
            if (giatmarabaru > 0)
                $(".modal-body #giatmara_baru").val(giatmarabaru);
            else
                $(".modal-body #giatmara_baru").val('');
        });

        $('#tarikh_kuatkuasa').datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
            autoclose: true,
            yearRange: "-100:+0"
        });
    });

    jQuery('select#negeri_baru').change(function () {
        jQuery.ajax({
            type: "POST",
            url: "<?php echo site_url("admin/Gspel_kewangan/ajax"); ?>",
            data: {task: 'get_giatmara', negeri: this.value},
            success: function (msg) {
                if (msg.length > 0) {
                    $('select#giatmara_baru').html(msg);
                }
            }
        });
    });
</script>