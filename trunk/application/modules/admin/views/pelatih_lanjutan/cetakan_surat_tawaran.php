<div class="box box-primary box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Tetapan Giatmara dan Kursus</h3>
    </div>
    <div class="box-body">
        <form class="form-horizontal" action="<?php echo site_url("admin/pelatih_lanjutan/cetakan_surat_tawaran"); ?>" method="post">
            <div class="form-group">
                <label for="opt_negeri" class="control-label col-sm-2">NEGERI</label>
                <div class="col-sm-10">
                    <select class="form-control" name="opt_negeri" id="opt_negeri">
                        <?php
                        if($res_negeri !== NULL)
                        {
                            foreach ($res_negeri as $val_negeri)
                            {
                                ?>
                                <option value="<?php echo $val_negeri->id_negeri; ?>"><?php echo $val_negeri->nama_negeri; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="opt_giatmara" class="control-label col-sm-2">GIATMARA</label>
                <div class="col-sm-10">
                    <select class="form-control" name="opt_giatmara" id="opt_giatmara">
                        <option value="<?php echo $row_giatmara->id_giatmara; ?>"><?php echo $row_giatmara->nama_giatmara; ?></option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="opt_kursus" class="control-label col-sm-2">KURSUS</label>
                <div class="col-sm-10">
                    <select class="form-control" name="opt_kursus" id="opt_kursus">
                        <option>Sila Pilih</option>
                        <?php
                        if ($res_kursus !== NULL)
                        {
                            foreach ($res_kursus as $val_kursus)
                            {
                                ?>
                                <option value="<?php echo $val_kursus->id_kursus; ?>"><?php echo $val_kursus->nama_kursus; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="opt_sesi" class="control-label col-sm-2">SESI </label>
                <div class="col-sm-10">
                    <select class="form-control" name="opt_sesi" id="opt_sesi">
                        <option>Sila Pilih</option>
                        <?php
                        if ($res_sesi !== NULL)
                        {
                            foreach ($res_sesi as $key => $val_sesi)
                            {
                                ?>
                                <option value="<?php echo $val_sesi->id; ?>"><?php echo $val_sesi->kewarganegaraan; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" name="btn_tetapkan" id="btn_tetapkan" value="tetapkan">Tetapkan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<form class="form-horizontal" action="<?php echo site_url("admin/pelatih_lanjutan/cetakan_surat_temuduga"); ?>" method="post" target="_blank">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Senarai Untuk Cetakan Surat Tawaran</h3>
        </div>
        <div class="box-body">
            <table class="table" id="tbl_senarai_cetakan_permohonan">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>NO. ID PENGENALAN</th>
                        <th>NO. PELATIH</th>
                        <th>SESI</th>
                        <th>TARIKH TAWARAN</th>
                        <th><!--<input type="checkbox" id="chk_all_sp">-->SURAT PANGGILAN</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                        if ($res_cetakan_temuduga !== FALSE)
                        {
                            $no = 0;
                            foreach ($res_cetakan_temuduga as $v)
                            {
                                ?>
                                <tr>
                                    <td><?php echo $no += 1; ?></td>
                                    <td><?php echo $v->nama_penuh; ?></td>
                                    <td><?php echo $v->no_mykad; ?></td>
                                    <td><?php echo $v->no_pelatih; ?></td>
                                    <td><?php echo $v->nama_intake; ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($v->disahkan_pada)) ?></td>
                                    <td align='center'>
                                        <!-- <input type="checkbox" name="chk_temuduga[<?php echo $value->id_temuduga_tetapan; ?>]" value="<?php echo $value->id_temuduga_tetapan; ?>"> -->
                                        <a href="<?php echo site_url("admin/pelatih_lanjutan/cetak_surat_tawaran_kursus/".$v->id_pelatih); ?>" target="_blank">CETAK</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                </tbody>
            </table>
            <!-- <button type="submit" name="btn_cetak" id="btn_cetak" value="cetak" class="btn btn-primary">Cetak</button> -->
            <!-- <button type="submit" name="btn_export" id="btn_export" value="export" class="btn btn-primary">Export</button> -->
        </div>
    </div>
</form>

<script type="text/javascript">
$(document).ready(function(){
    $("#tbl_senarai_cetakan_permohonan").DataTable();

    $("#chk_all_sp").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    $("#opt_kursus").change(function(){
        var val_giatmara = $("#opt_giatmara").val();
        var val_kursus = $("#opt_kursus").val();
        $.ajax({
            url: "<?php echo site_url("admin/pelatih_lanjutan/ajax_sesi"); ?>",
            data: {id_giatmara: val_giatmara, id_kursus: val_kursus},
            method: "post",
            success: function(data) {
                $("#opt_sesi").html(data);
            }
        });
    });
});
</script>
