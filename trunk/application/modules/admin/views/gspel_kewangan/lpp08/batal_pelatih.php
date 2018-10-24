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
                    <form class="form-horizontal" action="<?php echo site_url('admin/Gspel_kewangan/batal_pelatih'); ?>" method="post">
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
                                                    <th>No.</th>
                                                    <th>Nama<br>No. KP</th>
                                                    <th>No. Pelatih</th>
                                                    <th>Sesi</th>
                                                    <th>Tarikh Mula</th>
                                                    <th>Tarikh Tamat</th>
                                                    <th>Batal Pelatih</th>
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
                                                                   title="Batal Pelatih" class="open-Dialog btn btn-primary fa fa-pencil" href="#myModal"></a></td>
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
                <h4 class="modal-title">Borang Pembatalan Pelatih</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('admin/Gspel_kewangan/batal_pelatih'); ?>" method="post">
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
                        <label for="exampleNamaPenuh">Status Baru</label>
                        <select id="status_baru" name="status_baru" class="form-control" required>
                            <?php
                            foreach ($refStatusPelatih as $r) {
                                echo '<option value="' . $r->id . '">' . $r->status_desc . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleNamaPenuh">Tarikh Kuatkuasa</label>
                        <div id="datepicker1" class="input-group date">
                            <input class="form-control" type="text" name="tarikh_kuatkuasa" id="tarikh_kuatkuasa" value ="<?php echo ($res_temudugatetapan[0]->tawaran_mula_elaun) ? date('d-m-Y', strtotime($res_temudugatetapan[0]->tawaran_mula_elaun)) : date('d-m-Y'); ?>"/>
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-calendar"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id_pelatih" id="id_pelatih" value="" />
                        <input type="hidden" name="kursus" id="kursus" value="" />
                        <input type="hidden" name="jeniskursus" id="jeniskursus" value="" />
                        <input type="hidden" name="intake" id="intake" value="" />
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

<script>
    $(document).ready(function () {
        $("#pagetitle").text("Batal Pelatih Giatmara <?php echo $nama_giatmara; ?>");
        
        $(document).on("click", ".open-Dialog", function () {
            var nama_asal = $(this).data('namapenuh');
            var nomykad = $(this).data('nomykad');
            var nopelatih = $(this).data('nopelatih');
            var namakursus = $(this).data('namakursus');
            var id_pelatih = $(this).data('id');
            var jeniskursus = $(this).data('jenis');
            var kursus = $(this).data('kursus');
            var intake = $(this).data('intake');
            console.log(nama_asal);
            $(".modal-body #nama_penuh").val(nama_asal);
            $(".modal-body #no_mykad").val(nomykad);
            $(".modal-body #no_pelatih").val(nopelatih);
            $(".modal-body #nama_kursus").val(namakursus);
            $(".modal-body #id_pelatih").val(id_pelatih);
            $(".modal-body #kursus").val(kursus);
            $(".modal-body #jeniskursus").val(jeniskursus);
            $(".modal-body #intake").val(intake);
        });

        $('#tarikh_kuatkuasa').datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
            autoclose: true,
            yearRange: "-100:+0"
        });
    });
</script>