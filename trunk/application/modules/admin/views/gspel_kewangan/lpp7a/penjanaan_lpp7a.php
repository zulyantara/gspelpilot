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
<form class="form-horizontal" action="<?php echo site_url('admin/Gspel_kewangan/penjanaan_lpp7a'); ?>" method="post">
    <div class="row">

        <div class="col-md-12">
            <div class="box ">
                <div class="panel panel-custom-horrible-red"  >
                    <div class="panel-heading " >
                        <h4 style="color: white">Tetapan GIATMARA dan Kursus</h4>
                    </div>
                    <div class="panel-body" >
                        <fieldset>

                            <div class="form-group">
                                <label class="col-md-2">Negeri</label>
                                <div class="col-md-4">
                                    <select id="negeri" name="negeri" class="form-control">
                                        <option value=""></option>
                                        <?php
                                        foreach ($refNegeri as $r) {
                                            echo '<option value="' . $r->id . '">' . $r->nama_negeri . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2">GIATMARA</label>
                                <div class="col-md-4">
                                    <select id="giatmara" name="giatmara" class="form-control">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>

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
                                <label class="col-md-2">NAMA / NO. MYKAD / NO. PELATIH</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="nama" name="nama">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <button id="paparkan" name="action" value="papar" type="submit" class="btn" style="background-color: #000063  "><font color="white">Paparkan</font></button>
                                </div>
                            </div>

                        </fieldset>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <?php // if ($isPost) { ?>
        <div class="row" id="one" >
            <div class="col-md-12">
                <div class="box">
                    <div class="panel panel-info panel-custom-horrible-red">
                        <div class="panel-heading panel-heading-custom">
                            <h4 style="color: white">Penjanaan LPP7A (Pembetulan Maklumat Peribadi Pelatih)</h4>
                        </div>

                        <div class="panel-body">
                            <div class ="table table-responsive">
                                <table width="100%" border="0">
                                    <tr>
                                        <td width="50%">
                                            <table class ="table" style="border:1px solid #ffffff">
                                                <tr>
                                                    <td>Negeri</td>
                                                    <td>:</td>
                                                    <td><?php echo $namaNegeri; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Giatmara</td>
                                                    <td>:</td>
                                                    <td><?php echo $namaGiatmara; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Kursus</td>
                                                    <td>:</td>
                                                    <td><?php echo $namaKursus; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Sesi Kemasukan</td>
                                                    <td>:</td>
                                                    <td><?php echo $namaIntake; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>NAMA / NO. MYKAD / NO. PELATIH</td>
                                                    <td>:</td>
                                                    <td><?php echo $nama; ?></td>
                                                </tr>
                                            </table>
                                            <table class ="table table-hover table-bordered" id = "myTable">
                                                <thead style ="background-color:#b3b3b3">
                                                    <tr>
                                                        <th>Bil</th>
                                                        <th>Nama</th>
                                                        <th>No. MyKAD</th>
                                                        <th>No. Pelatih</th>
                                                        <th>Kursus</th>
                                                        <th>GIATMARA</th>
                                                        <th>Data LPP</th>
                                                        <th>Tarikh Borang Dihantar</th>
                                                        <th>Tindakan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 0;
                                                    if ($data)
                                                        foreach ($data as $r) :
                                                            ?>
                                                            <tr>
                                                                <td><?php echo ++$no; ?></td>
                                                                <td><?php echo $r->nama_penuh; ?></td>
                                                                <td><?php echo $r->no_mykad; ?></td>
                                                                <td><?php echo $r->no_pelatih; ?></td>
                                                                <td><?php echo $r->nama_kursus; ?></td>
                                                                <td><?php echo $r->nama_giatmara; ?></td>
                                                                <td><?php echo $r->data_lpp; ?></td>
                                                                <td><?php echo date("d/m/Y", strtotime($r->dihantar_pada)); ?></td>
                                                                <td><input type="checkbox" id="pilih" class="pilih" name="pilih[<?php echo $r->id; ?>]" <?php echo (($r->status_jana == 1) ? 'checked' : ''); ?>></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <input type="hidden" name="negeri2" id="negeri2" value="<?php echo $idNegeri; ?>" />
                            <input type="hidden" name="giatmara2" id="giatmara2" value="<?php echo $idGiatmara; ?>" />
                            <input type="hidden" name="kursus2" id="kursus2" value="<?php echo $idKursus; ?>" />
                            <input type="hidden" name="intake2" id="intake2" value="<?php echo $idIntake; ?>" />
                            <input type="hidden" name="nama2" id="nama2" value="<?php echo $nama; ?>" />
                            <button type="submit" class="btn btn-success" id ="jana" name="action" value="jana">Jana yang Terpilih</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php // } ?>
</form>

<script type="text/javascript">
    $(document).ready(function () {
        $("#pagetitle").text("Penjanaan LPP7A");
    });

    jQuery('select#negeri').change(function () {
        jQuery.ajax({
            type: "POST",
            url: "<?php echo site_url("admin/Gspel_kewangan/ajax"); ?>",
            data: {task: 'get_giatmara', negeri: this.value},
            success: function (msg) {
                if (msg.length > 0) {
                    $('select#giatmara').html(msg);
                }
            }
        });
    });
</script>