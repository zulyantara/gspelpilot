<div class="box box-primary box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Tetapan GIATMARA dan Kursus</h3>
    </div>
    <div class="box-body">
        <form class="form-horizontal" action="<?php echo site_url('admin/Pelatih_lanjutan/pendaftaranb');?>" id="myform" name="myform" method="post">
            <div class="form-group">
                <label for="opt_negeri" class="control-label col-sm-2">NEGERI</label>
                <div class="col-sm-10">
                    <select class="form-control" name="opt_negeri" id="opt_negeri">
                          <option value="" selected="selected">
                              <?php if(isset($negeri)){
                                foreach ($negeri as $r) {
                                    echo $r->nama_negeri;
                                }
                              }else{
                                echo "Sila Pilih";
                              }?>
                          </option>
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
                         <option value="" selected="selected">
                          <?php if(isset($giatmara)){
                                foreach ($giatmara as $r) {
                                    echo $r->nama_giatmara;
                                }
                              }else{
                                echo "Sila Pilih";
                              }?>
                          </option>
                        <option value="<?php echo $row_giatmara->id; ?>"><?php echo $row_giatmara->nama_giatmara; ?></option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="opt_kategori" class="control-label col-sm-2">KATEGORI</label>
                <div class="col-sm-10">
                    <select class="form-control" name="opt_kategori" id="opt_kategori">
                        <option value="" selected="selected">
                              <?php if(isset($kategori)){
                                if ($kategori =="LL") {
                                    echo "Latihan Lanjutan";
                                }
                                else if($kategori =="RN") {
                                    echo "Rintis Niaga";
                                }

                                 else if($kategori =="PP") {
                                    echo "Program Pertandingan";
                                }
                                 else  {
                                    echo "Program Khas";}
                              }else{
                                echo "Sila Pilih";
                              }?>
                          </option>
                          <option value="LL">Latihan Lanjutan</option>
                         <option value="RN">Rintis Niaga</option>
                        <option value="PP">Program Pertandingan</option>
                        <option value="PK">Program Khas</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" name="submit" id="submit">Cari</button>
                </div>
            </div>
        </form>
    </div>
</div>

<form class="form-horizontal" action="<?php echo site_url('admin/Pelatih_lanjutan/savependaftaranb');?>" id="myform" name="myform" method="post">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Senarai Permohonan Kursus Lanjutan</h3>
        </div>
        <div class="box-body">
            <table class="table" id="tbl_senarai_kursus_lanjutan">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>NO KP</th>
                        <th>KATEGORI PROGRAM</th>
                        <th>KELAYAKAN ELAUN</th>
                        <th>NAMA BANK</th>
                        <th>NO AKAUN</th>
                        <th>CARA BAYAR</th>
                        <th>DAFTAR</th>
                        <th>TINDAKAN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // print_r($row_data_bank);die();
                    if($row_data)
                    $ni=0;
                    {
                        foreach($row_data as $r)
                        {
                            ?>
                            <tr>
                                <td><?php echo $ni += 1; ?></td>
                                <td>
								<?php if($r->layak_elaun==1){?>
									<a href="#"><?php echo strtoupper(strtolower($r->nama_penuh)); ?></a>
								<?php }else{ ?>
									<?php echo strtoupper(strtolower($r->nama_penuh)); ?>
								<?php } ?>
								</td>
                                <td><?php echo $r->no_mykad; ?></td>
                                <td><?php echo $r->kategori; ?></td>
                                <td><?php echo ($r->layak_elaun == 1) ? "LAYAK" : "TIDAK LAYAK"; ?></td>
                                <td><?php echo $r->nama_bank; ?></td>
                                <td><?php echo $r->no_akaun; ?></td>
                                <td><?php echo ($r->layak_elaun == 1) ? "Autopay" : ""; ?></td>
                                <td>
                                    <select class="form-control" name="opt_daftar[<?php echo $r->id_permohonan_butir_peribadi; ?>]" id="opt_daftar<?php echo $r->id_permohonan_butir_peribadi; ?>">
                                        <option value="">Sila Pilih</option>
                                        <option value="0">Batalkan</option>
                                        <option value="5">Daftarkan</option>
                                    </select>
                                </td>
                                <td><input type="checkbox" name="chk_tindakan[]" value="<?php echo $r->id_permohonan_butir_peribadi; ?>"></td>
                                <input type="hidden" name="txt_permohonan_kursus_lpp09[<?php echo $r->id_permohonan_butir_peribadi; ?>]" value="<?php echo $r->id_permohonan_kursus_lpp09; ?>">
                                <input type="hidden" name="txt_bank[<?php echo $r->id_permohonan_butir_peribadi; ?>]" value="<?php echo $r->idbank; ?>">
                                <input type="hidden" name="txt_kelayakan_elaun[<?php echo $r->id_permohonan_butir_peribadi; ?>]" value="<?php echo $r->layak_elaun; ?>">
                                <input type="hidden" name="txt_akaun[<?php echo $r->id_permohonan_butir_peribadi; ?>]" value="<?php echo $r->no_akaun; ?>">
                                <input type="hidden" name="txt_giatmara[<?php echo $r->id_permohonan_butir_peribadi; ?>]" value="<?php echo $r->idgiatmara; ?>">
                                <input type="hidden" name="txt_mykad[<?php echo $r->id_permohonan_butir_peribadi; ?>]" value="<?php echo $r->no_mykad; ?>">
                                <input type="hidden" name="txt_settings_tawaran_kursus[<?php echo $r->id_permohonan_butir_peribadi; ?>]" value="<?php echo $r->id_settings_tawaran_kursus == "" ? 0 : $r->id_settings_tawaran_kursus; ?>">
                                <input type="hidden" name="txt_tarikh_mula_kursus[<?php echo $r->id_permohonan_butir_peribadi; ?>]" value="<?php echo $r->tarikh_mula_kursus; ?>">
                                <input type="hidden" name="txt_tarikh_tamat_kursus[<?php echo $r->id_permohonan_butir_peribadi; ?>]" value="<?php echo $r->tarikh_tamat_kursus; ?>">
                                <input type="hidden" name="txt_tarikh_mohon[<?php echo $r->id_permohonan_butir_peribadi; ?>]" value="<?php echo $r->tarikh_mohon; ?>">
                                <input type="hidden" name="txt_kursus[<?php echo $r->id_permohonan_butir_peribadi; ?>]" value="<?php echo $r->id_kursus == "" ? 0 : $r->id_kursus; ?>">
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary" name="submit" id="submit">Sahkan dan Daftar LPP09</button>
            <!-- <a href="<?php echo site_url('admin/Pelatih_lanjutan/cetakpendaftaranb');?>" class="btn btn-primary">Cetak</a> -->
        </div>
    </div>
</form>

<script type="text/javascript">
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})

$(document).ready(function() {
    $('.update').click(function() {
        return confirm("Adakah anda pasti untuk menolak permohonan ini?");
    });

    $("#tbl_senarai_kursus_lanjutan").DataTable();

    var defOption ='<option value=""> Sila Pilih</option>';
    $('select[name="opt_negeri"]').on('change', function() {
        var BASE_URL = "<?php echo base_url();?>";
        // $('#giatmara').html(defOption );
        var stateID = $(this).val();
        var e = document.getElementById("opt_giatmara");
        if(stateID) {
            $.ajax({
                url: '<?php echo base_url();?>admin/Pelatih_lanjutan/ajaxgiat/'+stateID,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('select[name="opt_giatmara"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="opt_giatmara"]').append('<option value="'+ value.id +'">'+ value.nama_giatmara +'</option>');
                    });
                }
            });
            // console.log(stateID);
        }else{
            //  $('select[name="giatmara"]').empty();
            // console.log(stateID);
        }
    });
});
</script>
