<div class="box box-primary box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Tetapan Giatmara dan Kursus</h3>
    </div>
    <div class="box-body">
        <form class="form-horizontal" action="<?php echo site_url("admin/pelatih_lanjutan/cetakan_surat_temuduga"); ?>" method="post">
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
                                <option value="<?php echo $val_negeri->id; ?>"><?php echo $val_negeri->nama_negeri; ?></option>
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
                        <option value="<?php echo $row_giatmara->id; ?>"><?php echo $row_giatmara->nama_giatmara; ?></option>
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
                                $sel_kursus = $this->session->tempdata("opt_kursus") == NULL ? "" : ($this->session->tempdata("opt_kursus") == $val_kursus->id_kursus ? "selected=\"selected\"" : "");
                                ?>
                                <option value="<?php echo $val_kursus->id_kursus; ?>" <?php echo $sel_kursus; ?>><?php echo $val_kursus->nama_kursus; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
              <label for="opt_sesi_kemasukan" class="control-label col-sm-2">SESI</label>
              <div class="col-sm-10">
                <select class="form-control" name="opt_sesi_kemasukan" id="opt_sesi_kemasukan">
                  <option value="">Sila Pilih</option>
                </select>
              </div>
            </div>
            <div class="form-group">
                <label for="opt_warganegara" class="control-label col-sm-2">WARGANEGARA</label>
                <div class="col-sm-10">
                    <select class="form-control" name="opt_warganegara" id="opt_warganegara">
                        <option>Sila Pilih</option>
                        <?php
                        if ($res_kewarganegaraan !== NULL)
                        {
                            foreach ($res_kewarganegaraan as $key => $val_kwg)
                            {
                                $sel_warganegara = $this->session->tempdata("opt_warganegara") == NULL ? "" : ($this->session->tempdata("opt_warganegara") == $val_kwg->id ? "selected=\"selected\"" : "");
                                ?>
                                <option value="<?php echo $val_kwg->id; ?>" <?php echo $sel_warganegara; ?>><?php echo $val_kwg->kewarganegaraan; ?></option>
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
            <h3 class="box-title">Senarai Untuk Cetakan Surat Temuduga</h3>
        </div>
        <div class="box-body">
            <table class="table" id="tbl_senarai_cetakan_permohonan">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA<br>NO.MYKAD</th>
                        <th>NO. TELEFON BIMBIT</th>
                        <th>TARIKH TEMUDUGA</th>
                        <th>TEMPAT TEMUDUGA</th>
                        <th>PEGAWAI DIHUBUNGI</th>
                        <th><input type="checkbox" id="chk_all_sp"> SURAT PANGGILAN</th>
                        <th>TARIKH CETAKAN</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                        if ($res_cetakan_temuduga !== FALSE)
                        {
                            $no = 0;
                            foreach ($res_cetakan_temuduga as $value)
                            {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $no += 1; ?>
                                        <input type="hidden" name="id_kursus" value="<?php echo $value->id_kursus; ?>">
                                        <input type="hidden" name="idtetapantemuduga[]" id="idtetapantemuduga" value="<?php echo $value->id_temuduga_tetapan;?>" >
                                    </td>
                                    <td><?php echo $value->nama_penuh."<br>".$value->no_mykad; ?></td>
                                    <td><?php echo $value->no_hp; ?></td>
                                    <td><?php echo $value->tarikh_temuduga; ?></td>
                                    <td><?php echo $value->tempat; ?></td>
                                    <td><?php echo $value->pegawai_dihubungi; ?></td>
                                    <td align='center'>
                                        <!-- <a href="javascript:window.location.reload(true)" onclick="window.open('<?php echo site_url("admin/pelatih_lanjutan/cetakan_surat_temuduga/".$value->id_temuduga_tetapan); ?>', 'newwindow', height=800, width=800);">Cetak</a>&nbsp;&nbsp; -->
                                        <input type="checkbox" name="chk_temuduga[<?php echo $value->id_temuduga_tetapan; ?>]" value="<?php echo $value->id_temuduga_tetapan; ?>">
                                    </td>
                                    <td><?php echo $value->tarikh_cetak; ?></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                </tbody>
            </table>
            <button type="submit" name="btn_cetak" id="btn_cetak" value="cetak" class="btn btn-primary">Cetak</button>
            <button type="submit" name="btn_export" id="btn_export" value="export" class="btn btn-primary">Export</button>
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
            // dataType: 'json',
            data: {txt_kursus : val_kursus, txt_giatmara : val_giatmara},
            url: "<?php echo site_url("admin/lpp04/intake_ajax"); ?>",
            type: "POST",
            success : function(data) {
                $("#opt_sesi_kemasukan").html(data);
            }
        });
    });
});
</script>
