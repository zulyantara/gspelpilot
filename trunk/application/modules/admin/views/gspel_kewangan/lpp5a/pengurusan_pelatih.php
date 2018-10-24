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
      <!-- <h2 style="color: blue">Pusat GIATMARA</h2> -->
        <div class="box ">
            <div class="panel panel-custom-horrible-red"  >
                <div class="panel-heading " >
                    <h4 style="color: white">Tetapan Kursus</h4>
                </div>
                <div class="panel-body" >
                    <form class="form-horizontal" action="<?php echo site_url('admin/Gspel_kewangan/pengurusan_pelatih'); ?>" method="post">
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-4">Giatmara</label>
                                <div class="col-md-4">
                                    <?php echo $nama_giatmara; ?>
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
                                                    <th>LPP5A</th>
                                                    <th>LPP5B</th>
                                                    <th>LPP5D</th>
                                                    <th>LPP06</th>
                                                    <th>Butir Peribadi</th>
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
                                                                   data-nama="<?php echo $r->nama_penuh; ?>"
                                                                   title="Penukaran Nama Pelatih (LPP5A)" class="open-Dialog btn btn-primary fa fa-pencil" href="#myModal"></a></td>
                                                            <td><a data-toggle="modal" data-id="<?php echo $r->id_pelatih; ?>"
                                                                   data-kursus="<?php echo $idKursus; ?>"
                                                                   data-jenis="<?php echo $katPelatih; ?>"
                                                                   data-intake="<?php echo $idIntake; ?>"
                                                                   data-nomykad="<?php echo $r->no_mykad; ?>"
                                                                   data-lahir="<?php echo $r->tarikh_lahir; ?>"
                                                                   data-umur="<?php echo $r->umur; ?>"
                                                                   data-jantina="<?php echo $r->jantina; ?>"
                                                                   title="LLP5B – Pembetulan MyKAD" class="open-Dialog2 btn btn-primary fa fa-pencil" href="#myModal5B"></a></td>
                                                            <td><a data-toggle="modal" data-id="<?php echo $r->id_pelatih; ?>"
                                                                   data-kursus="<?php echo $idKursus; ?>"
                                                                   data-jenis="<?php echo $katPelatih; ?>"
                                                                   data-intake="<?php echo $idIntake; ?>"
                                                                   data-alamat="<?php echo $r->alamat; ?>"
                                                                   data-poskod="<?php echo $r->poskod; ?>"
                                                                   data-kewarganegaraan="<?php echo $r->kewarganegaraan; ?>"
                                                                   data-taraf_perkahwinan="<?php echo $r->taraf_perkahwinan; ?>"
                                                                   data-no_hp="<?php echo $r->no_hp; ?>"
                                                                   title="LLP5D – Pembetulan Maklumat Lain" class="open-Dialog3 btn btn-primary fa fa-pencil" href="#myModal5D"></a></td>
                                                            <td><a data-toggle="modal" data-id="<?php echo $r->id_pelatih; ?>"
                                                                   data-kursus="<?php echo $idKursus; ?>"
                                                                   data-jenis="<?php echo $katPelatih; ?>"
                                                                   data-intake="<?php echo $idIntake; ?>"
                                                                   data-cara_bayaran_asal="<?php echo $r->cara_bayaran; ?>"
                                                                   data-nama_bank_asal="<?php echo $r->nama_bank; ?>"
                                                                   data-no_akaun_asal="<?php echo $r->no_akaun; ?>"
                                                                   title="LLP06 – Pembetulan Maklumat Bank" class="open-Dialog4 btn btn-primary fa fa-pencil" href="#myModal06"></a></td>
                                                            <td><?php //echo '<a href="' . site_url('admin/Gspel_kewangan/butir_peribadi/') . $r->id_pelatih . '" class="fa fa-pencil-square">';  ?></td>
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
                <h4 class="modal-title">Penukaran Nama Pelatih (LPP5A)</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('admin/Gspel_kewangan/pengurusan_pelatih'); ?>" method="post">
                    <div class="form-group">
                        <label for="exampleNamaPenuh">Nama Penuh yang Dikemaskini</label>
                        <input type="text" class="form-control" id="nama_baru" name="nama_baru" placeholder="Nama Baru" required="true">
                    </div>
                    <div class="form-group">
                        <label for="exampleNamaAsal">Nama Asal</label>
                        <input type="text" class="form-control" id="nama_asal" name="nama_asal" readonly="true">
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

<div id="myModal5B" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Penukaran MyKAD Pelatih (LPP5B)</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('admin/Gspel_kewangan/pengurusan_pelatih'); ?>" method="post">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleNamaPenuh">No MyKad yang Dikemaskini</label>
                            <input type="text" class="form-control" id="mykad_baru" name="mykad_baru" placeholder="No MyKAD Baru" required="true">
                        </div>
                        <div class="form-group">
                            <label for="exampleNamaAsal">No MyKAD Asal</label>
                            <input type="text" class="form-control" id="mykad_asal" name="mykad_asal" readonly="true">
                            <input type="hidden" name="id_pelatih" id="id_pelatih" value="" />
                            <input type="hidden" name="kursus" id="kursus" value="" />
                            <input type="hidden" name="jeniskursus" id="jeniskursus" value="" />
                            <input type="hidden" name="intake" id="intake" value="" />
                            <input type="hidden" name="tarikh_lahir_asal" id="tarikh_lahir_asal" value="" />
                            <input type="hidden" name="umur_asal" id="umur_asal" value="" />
                            <input type="hidden" name="jantina_asal" id="jantina_asal" value="" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleNamaPenuh">Tarikh Lahir</label>
                            <div id="datepicker1" class="input-group date">
                                <input class="form-control" type="text" name="tarikh_lahir_baru" id="tarikh_lahir_baru" value ="<?php echo ($res_temudugatetapan[0]->tawaran_mula_elaun) ? date('d-m-Y', strtotime($res_temudugatetapan[0]->tawaran_mula_elaun)) : date('d-m-Y'); ?>"/>
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-calendar"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleNamaPenuh">Umur (tahun)</label>
                            <input type="text" class="form-control" id="umur_baru" name="umur_baru" readonly="true">
                        </div>
                        <div class="form-group">
                            <label for="exampleNamaPenuh">Jantina</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="jantina_baru" class="minimal" value="1" checked>Lelaki
                                </label>
                                <label>
                                    <input type="radio" name="jantina_baru" class="minimal" value="2">Perempuan
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id ="batalkan" name="action" value="mykad">Hantar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="myModal5D" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pembetulan Maklumat Lain</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('admin/Gspel_kewangan/pengurusan_pelatih'); ?>" method="post">
                    <div class="box-group" id="accordion">
                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                        <div class="panel box box-primary">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <!--<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">-->
                                    <a data-toggle="collapse" data-parent="#accordion">
                                        Penukaran Maklumat Pelatih (LPP5D)
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="box-body">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleNamaPenuh">Alamat Surat-menyurat</label>
                                            <textarea class="form-control" rows="3" id="alamat_baru" name="alamat_baru" placeholder="Alamat Baru ..." required="true"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleNamaPenuh">Poskod</label>
                                            <select id="poskod_baru" name="poskod_baru" class="form-control" required="true">
                                                <?php
                                                foreach ($refPoskod as $r) {
                                                    echo '<option value="' . $r->id . '">' . $r->poskodfull . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleNamaPenuh">Warganegara</label>
                                            <select id="kewarganegaraan_baru" name="kewarganegaraan_baru" class="form-control" required="true">
                                                <?php
                                                foreach ($refKewarganegaraan as $r) {
                                                    echo '<option value="' . $r->id . '">' . $r->kewarganegaraan . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="id_pelatih" id="id_pelatih" value="" />
                                            <input type="hidden" name="kursus" id="kursus" value="" />
                                            <input type="hidden" name="jeniskursus" id="jeniskursus" value="" />
                                            <input type="hidden" name="intake" id="intake" value="" />
                                            <input type="hidden" name="alamat_asal" id="alamat_asal" value="" />
                                            <input type="hidden" name="poskod_asal" id="poskod_asal" value="" />
                                            <input type="hidden" name="kewarganegaraan_asal" id="kewarganegaraan_asal" value="" />
                                            <input type="hidden" name="taraf_perkahwinan_asal" id="taraf_perkahwinan_asal" value="" />
                                            <input type="hidden" name="no_hp_asal" id="no_hp_asal" value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleNamaPenuh">No HP</label>
                                            <input type="text" class="form-control" id="no_hp_baru" name="no_hp_baru" required="">
                                        </div>
                                        <div class="form-group"></div>
                                        <div class="form-group">
                                            <label for="exampleNamaPenuh">Taraf Perkahwinan</label>
                                            <select id="taraf_perkahwinan_baru" name="taraf_perkahwinan_baru" class="form-control" required="true">
                                                <?php
                                                foreach ($refTarafPerkahwinan as $r) {
                                                    echo '<option value="' . $r->id . '">' . $r->taraf_perkahwinan . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel box box-danger">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <!--<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">-->
                                    <a data-toggle="collapse" data-parent="#accordion">
                                        Perubahan Kod Kombinasi (LPP5D)
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse in">
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleNamaPenuh">Nama Kod Kombinasi</label>
                                            <select id="id_kew_kod_kombinasi" name="id_kew_kod_kombinasi" class="form-control" required="true">
                                                <?php
                                                foreach ($kewKodKombinasi as $r) {
                                                    echo '<option value="' . $r->id . '">' . $r->name . ' - ' . $r->code_combination_name . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id ="batalkan" name="action" value="lain">Hantar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="myModal06" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Penukaran Maklumat Bank (LPP06)</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('admin/Gspel_kewangan/pengurusan_pelatih'); ?>" method="post">
                    <div class="col-md-6">
                        <!--                        <div class="form-group">
                                                    <label for="exampleNamaPenuh">Cara Bayaran</label>
                                                    <select id="cara_bayaran_baru" name="cara_bayaran_baru" class="form-control">
                                                        <option value="Autopay">Autopay</option>
                                                        <option value="Cek">Cek</option>
                                                    </select>
                                                </div>-->
                        <div class="form-group">
                            <label for="exampleNamaPenuh">Nama Bank yang Dikemaskini</label>
                            <select id="nama_bank_baru" name="nama_bank_baru" class="form-control" required="true">
                                <?php
                                foreach ($kewBank as $r) {
                                    echo '<option value="' . $r->name . '">' . $r->name . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleNamaPenuh">Nama Bank (sedia ada)</label>
                            <input type="text" class="form-control" id="nama_bank_asal" name="nama_bank_asal" readonly="true">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleNamaAsal">No. Akaun yang Dikemaskini</label>
                            <input type="text" class="form-control" id="no_akaun_baru" name="no_akaun_baru" required="true">
                            <input type="hidden" name="id_pelatih" id="id_pelatih" value="" />
                            <input type="hidden" name="kursus" id="kursus" value="" />
                            <input type="hidden" name="jeniskursus" id="jeniskursus" value="" />
                            <input type="hidden" name="intake" id="intake" value="" />
                            <input type="hidden" name="cara_bayaran_asal" id="cara_bayaran_asal" value="" />
                            <!--<input type="hidden" name="nama_bank_asal" id="nama_bank_asal" value="" />-->
                            <input type="hidden" name="no_akaun_asal" id="no_akaun_asal" value="" />
                        </div>
                        <div class="form-group">
                            <label for="exampleNamaAsal">No. Akaun (sedia ada)</label>
                            <input type="text" class="form-control" id="no_akaun_asal" name="no_akaun_asal" readonly="true">
                        </div>
                        <!--                        <div class="form-group">
                                                    <label for="exampleNamaPenuh"></label>
                                                </div>-->
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id ="batalkan" name="action" value="bank">Hantar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#pagetitle").text("Pengurusan Pelatih");

        $(document).on("click", ".open-Dialog", function () {
            var nama_asal = $(this).data('nama');
            var id_pelatih = $(this).data('id');
            var jeniskursus = $(this).data('jenis');
            var kursus = $(this).data('kursus');
            var intake = $(this).data('intake');
            console.log(nama_asal);
            $(".modal-body #nama_asal").val(nama_asal);
            $(".modal-body #id_pelatih").val(id_pelatih);
            $(".modal-body #kursus").val(kursus);
            $(".modal-body #jeniskursus").val(jeniskursus);
            $(".modal-body #intake").val(intake);
        });

        $(document).on("click", ".open-Dialog2", function () {
            var nomykad = $(this).data('nomykad');
            var id_pelatih = $(this).data('id');
            var jeniskursus = $(this).data('jenis');
            var kursus = $(this).data('kursus');
            var intake = $(this).data('intake');
            var lahir = $(this).data('lahir');
            var umur = $(this).data('umur');
            var jantina = $(this).data('jantina');
            console.log(nama_asal);
            $(".modal-body #mykad_asal").val(nomykad);
            $(".modal-body #id_pelatih").val(id_pelatih);
            $(".modal-body #kursus").val(kursus);
            $(".modal-body #jeniskursus").val(jeniskursus);
            $(".modal-body #intake").val(intake);
            $(".modal-body #tarikh_lahir_asal").val(lahir);
            $(".modal-body #umur_asal").val(umur);
            $(".modal-body #jantina_asal").val(jantina);
        });
        $(document).on("click", ".open-Dialog3", function () {
            var id_pelatih = $(this).data('id');
            var jeniskursus = $(this).data('jenis');
            var kursus = $(this).data('kursus');
            var intake = $(this).data('intake');
            var alamat = $(this).data('alamat');
            var poskod = $(this).data('poskod');
            var kewarganegaraan = $(this).data('kewarganegaraan');
            var taraf_perkahwinan = $(this).data('taraf_perkahwinan');
            var no_hp = $(this).data('no_hp');
            console.log(alamat);
            $(".modal-body #id_pelatih").val(id_pelatih);
            $(".modal-body #kursus").val(kursus);
            $(".modal-body #jeniskursus").val(jeniskursus);
            $(".modal-body #intake").val(intake);
            $(".modal-body #alamat_asal").val(alamat);
            $(".modal-body #poskod_asal").val(poskod);
            $(".modal-body #kewarganegaraan_asal").val(kewarganegaraan);
            $(".modal-body #taraf_perkahwinan_asal").val(taraf_perkahwinan);
            $(".modal-body #no_hp_asal").val(no_hp);
        });
        $(document).on("click", ".open-Dialog4", function () {
            var id_pelatih = $(this).data('id');
            var jeniskursus = $(this).data('jenis');
            var kursus = $(this).data('kursus');
            var intake = $(this).data('intake');
            var cara_bayaran_asal = $(this).data('cara_bayaran_asal');
            var no_akaun_asal = $(this).data('no_akaun_asal');
            var nama_bank_asal = $(this).data('nama_bank_asal');
            console.log(cara_bayaran_asal);
            $(".modal-body #id_pelatih").val(id_pelatih);
            $(".modal-body #kursus").val(kursus);
            $(".modal-body #jeniskursus").val(jeniskursus);
            $(".modal-body #intake").val(intake);
            $(".modal-body #cara_bayaran_asal").val(cara_bayaran_asal);
            $(".modal-body #no_akaun_asal").val(no_akaun_asal);
            $(".modal-body #nama_bank_asal").val(nama_bank_asal);
        });

        $('#tarikh_lahir_baru').datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
            autoclose: true,
            yearRange: "-100:+0"
        });

        $('#tarikh_lahir_baru').on('change', function () {
            var from = this.value.split("-");
            var dob = new Date(from[2], from[1] - 1, from[0]);
            var today = new Date();
            var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
            $('#umur_baru').val(age);
        });
    });
</script>
