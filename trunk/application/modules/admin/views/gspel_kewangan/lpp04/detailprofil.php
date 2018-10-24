<form id="frm_detailprofil" method="post">
    <div class="box box-solid box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Kursus Yang Telah Dipilih</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-2">
                    Nama
                </div>
                <div class="col-md-10">
                    <?php echo $res_detail_profile->nama_penuh; ?>
                </div>
                <div class="col-md-2">
                    No. ID Pengenalan
                </div>
                <div class="col-md-10">
                    <?php echo $res_detail_profile->mykad_pbp; ?>
                </div>
            </div>
            <table class="table">
                <tr>
                    <th>BIL</th>
                    <th>KLUSTER</th>
                    <th>KURSUS</th>
                    <th>NEGERI</th>
                    <th>GIATMARA</th>
                    <th>SESI</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td><?php echo $res_detail_profile->nama_kluster; ?></td>
                    <td><?php echo $res_detail_profile->nama_kursus; ?></td>
                    <td><?php echo $res_detail_profile->nama_negeri; ?></td>
                    <td><?php echo $res_detail_profile->nama_giatmara; ?></td>
                    <td><?php echo $res_detail_profile->nama_intake; ?></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="box box-solid box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Tempoh Kursus Dijalankan</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            TARIKH MULA KURSUS / ELAUN
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="txt_tgl_mula" id="txt_tgl_mula" value="<?php echo date("d-m-Y", strtotime($res_detail_profile->tarikh_mula_kursus)); ?>" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            TARIKH TAMAT KURSUS / ELAUN
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="txt_tgl_tamat" id="txt_tgl_tamat" value="<?php echo date("d-m-Y", strtotime($res_detail_profile->tarikh_tamat_kursus)); ?>" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="box box-solid box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Maklumat Bank</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-2">
                    NAMA BANK
                </div>
                <div class="col-md-10">
                    : <?php echo $res_detail_profile->nama_bank; ?>
                </div>
                <div class="col-md-2">
                    NO AKAUN
                </div>
                <div class="col-md-10">
                    : <?php echo $res_detail_profile->no_akaun; ?>
                </div>
                <div class="col-md-2">
                    CARA BAYARAN
                </div>
                <div class="col-md-10">
                    : <?php echo $res_detail_profile->cara_bayaran; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Maklumat Kombinasi Kod</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3">
                            Kod Kombinasi
                        </div>
                        <div class="col-md-9">
                            : <?php echo $res_detail_profile->nama_kew_kod_kombinasi." (".$res_detail_profile->code_combination_name.")"; ?>
                        </div>
                        <div class="col-md-3">
                            Dana
                        </div>
                        <div class="col-md-9">
                            : <?php echo $res_detail_profile->nama_dana." (".$res_detail_profile->kode_dana.")"; ?>
                        </div>
                        <div class="col-md-3">
                            Program
                        </div>
                        <div class="col-md-9">
                            : <?php echo $res_detail_profile->nama_kew_program_giatmara." (".$res_detail_profile->kode_kew_program_giatmara.")"; ?>
                        </div>
                        <div class="col-md-3">
                            Peringkat
                        </div>
                        <div class="col-md-9">
                            : <?php echo $res_detail_profile->nama_peringkat." (".$res_detail_profile->kode_peringkat.")"; ?>
                        </div>
                        <div class="col-md-3">
                            Negara
                        </div>
                        <div class="col-md-9">
                            : <?php echo $res_detail_profile->nama_negara." (".$res_detail_profile->kode_negara.")"; ?>
                        </div>
                        <div class="col-md-3">
                            Elaun
                        </div>
                        <div class="col-md-9">
                            : <?php echo $res_detail_profile->nama_kew_elaun." (".$res_detail_profile->kode_kew_elaun.")"; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Maklumat Potongan</h3>
                </div>
                <div class="box-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Jenis</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($res_pelatih_potongan !== NULL)
                            {
                                foreach ($res_pelatih_potongan as $v)
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $v->name; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <a data-toggle="modal" class="open-Dialog btn btn-primary" href="#myModal">Tambah Potongan</a>
                </div>
            </div>
        </div>
    </div>
</form>

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

<script type="text/javascript">
$(document).ready(function(){
    $("#txt_tgl_mula").datepicker({
        dateFormat: "dd-mm-yy",
		changeMonth: true,
		changeYear: true,
		autoclose: true,
    });

    $("#txt_tgl_tamat").datepicker({
        dateFormat: "dd-mm-yy",
		changeMonth: true,
		changeYear: true,
		autoclose: true,
    });
});
</script>
