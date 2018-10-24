<?php $this->load->view('header_5'); ?>

<form class="form-horizontal" action="<?php echo site_url("admin/programreg/index"); ?>" method="post">
    <input type="hidden" name="form-name" value="seranai">
    <input type="hidden" name="id_giatmara" value="<?php echo isset($giatmara_opt) ? $giatmara_opt : ""; ?>">
    <input type="hidden" name="id_negeri" value="<?php echo isset($negeri_opt) ? $negeri_opt : ""; ?>">
    <input type="hidden" name="id_kursus" value="<?php echo isset($kursus_opt) ? $kursus_opt : ""; ?>">
    <input type="hidden" name="id_intake" value="<?php echo isset($intake_opt) ? $intake_opt : ""; ?>">
    <div class="box box-solid box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Senarai Penawaran Kursus</h3>
        </div>

        <div class="box-body">
            <font color='#ff0000'>Klik pada nama pemohon untuk mengemaskini maklumat penawaran.</font>
            <table class="table table-bordered table-striped table-hover" id="tbl_senarai_temuduga">
                <thead>
                    <tr>
                        <th valign="top">No</th>
                        <th valign="top">NAMA<br/>NO. MyKAD</th>
                        <th valign="top">TARIKH TAWARAN</th>
                        <th valign="top">SESI</th>
                        <th valign="top">KELAYAKAN ELAUN</th>
                        <th valign="top">NAMA BANK</th>
                        <th valign="top">NO. AKAUN</th>
                        <!--th valign="top">CARA BAYAR</th-->
                        <th valign="top">PENDAFTARAN KURSUS</th>
                        <th valign="top">STATUS</th>
                        <th>TINDAKAN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ( ! empty($res_senarai_penawaran_kursus))
                    {
                        $no=0;
                        foreach ($res_senarai_penawaran_kursus as $val_sp)
                        {
                          $res_sah = $this->programreg->checkSah($val_sp->id_permohonan, $intake_opt);
                          #echo "<pre>";print_r($res_sah);echo "</pre>";
                          #echo $res_sah[0]->id_permohonan."=".$val_sp->id_permohonan;
                            ?>
                            <tr>
                                <td>
                                    <?php echo $no += 1; ?>
                                    <input type="hidden" name="id_temuduga_tetapan[]" id="id_temuduga_tetapan<?php echo $val_sp->id_temuduga_tetapan;?>" value="<?php echo $val_sp->id_temuduga_tetapan;?>">
                                    <input type="hidden" name="txt_nama_bank[<?php echo $val_sp->id_temuduga_tetapan;?>]" id="txt_nama_bank<?php echo $val_sp->id_temuduga_tetapan;?>" value="<?php echo $val_sp->name_bank; ?>">
                                    <input type="hidden" name="txt_no_akaun[<?php echo $val_sp->id_temuduga_tetapan;?>]" id="txt_no_akaun<?php echo $val_sp->id_temuduga_tetapan;?>" value="<?php echo $val_sp->no_akaun; ?>">
                                    <input type="hidden" name="txt_cara_bayar[<?php echo $val_sp->id_temuduga_tetapan;?>]" id="txt_cara_bayar<?php echo $val_sp->id_temuduga_tetapan;?>" value="<?php echo $val_sp->cara_bayar; ?>">
                                    <input type="hidden" name="txt_id_permohonan[<?php echo $val_sp->id_temuduga_tetapan;?>]" value="<?php echo $val_sp->id_permohonan; ?>">
                                    <input type="hidden" name="txt_id_kursus[<?php echo $val_sp->id_temuduga_tetapan;?>]" value="<?php echo $val_sp->id_setting_tawaran_kursus; ?>">
                                </td>
                                <td>
                                    <a href="<?php echo base_url('admin/programreg/detailprofil/').$val_sp->id_temuduga_tetapan; ?>"><?php echo $val_sp->nama; ?></a>
                                    <br/><?php echo $val_sp->no_mykad; ?>
                                </td>
                                <td align="center">
                                    <?php
                                    if ($val_sp->tarikh_tawaran)
                                    {
                                        $dt_tarikh_tawaran = new DateTime($val_sp->tawaran_tarikh_cetak);
                                        echo $dt_tarikh_tawaran->format("d-m-Y");
                                    }
                                    else
                                    {
                                        echo "";
                                    }
                                    ?>
                                </td>
                                <td><?php echo $val_sp->sesi; ?></td>
                                <td><?php echo $val_sp->kelayakan_elaun == 1 ? "Layak" : "Tidak Layak"; ?></td>
                                <td><?php echo $val_sp->name_bank; ?></td>
                                <td><?php echo $val_sp->no_akaun; ?></td>
                                <!--td><?php //echo $val_sp->cara_bayar; ?></td-->
                                <td>
                                    <?php
                                    echo $val_sp->id_kursus_daftar == "" ? "" : "GM ".$val_sp->giatmara_sah." - ".$val_sp->kursus_sah;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($res_sah[0]->id_permohonan==$val_sp->id_permohonan OR $val_sp->giatmara_sah!="") {
                                        echo "&nbsp;";
                                    } else {
                                        ?>
                                        <select id="chk_tindakan" name="chk_tindakan[<?php echo $val_sp->id_temuduga_tetapan;?>]">
                                            <option value="0" <?php echo (($val_sp->tindakan=='0')? 'selected=selected': '')?>>Sila Pilih</option>
                                            <option value="1" <?php echo (($val_sp->tindakan=='1')? 'selected=selected': '')?>>Sahkan</option>
                                            <option value="2" <?php echo (($val_sp->tindakan=='2')? 'selected=selected': '')?>>Gugurkan</option>
                                        </select>
                                        <?php
                                        /*
                                        <input type="checkbox"
                                        name="chk_tindakan[<?php echo $val_sp->id_temuduga_tetapan; ?>]"
                                        value="1" <?php echo (($val_sp->tindakan==='1')? 'checked=checked': '')?>>&nbsp;Offered</td>
                                        */
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($res_sah[0]->id_permohonan==$val_sp->id_permohonan OR $val_sp->giatmara_sah!="") {
                                        echo "&nbsp;";
                                    } else {
                                        ?>
                                        <input type="checkbox" name="chk_tindak[]" value="<?php echo $val_sp->id_temuduga_tetapan;?>" id="chk_tindak<?php echo $val_sp->id_temuduga_tetapan;?>" onclick="proses_butang('<?php echo $val_sp->id_temuduga_tetapan;?>')">
                                        <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <input class="btnAction btn btn-primary" type="submit" name="next" id="next" value="Simpan" >
        </div>
    </div>

</form>

<script type="text/javascript">
$(document).ready(function(){
    $("#next").prop("disabled", true);

    $("#tbl_senarai_temuduga").DataTable();
    //$("#tbl_senarai_temuduga").DataTables();
});

function proses_butang(no) {
    var txt_nama_bank = $("#txt_nama_bank"+no).val();
    var txt_no_akaun = $("#txt_no_akaun"+no).val();
    var txt_cara_bayar = $("#txt_cara_bayar"+no).val();

    if (txt_nama_bank == "" && txt_no_akaun == "" && txt_cara_bayar == "") {
        $("#next").prop("disabled", true);
    }
    else {
        $("#next").prop("disabled", false);
    }
}
</script>
