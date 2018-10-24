    <?php $this->load->view('header_5'); ?>

    <form class="form-horizontal" action="<?php echo site_url("admin/programreg/pengesahan"); ?>" method="post">
    <input type="hidden" name="form-name" value="seranai">
    <input type="hidden" name="id_giatmara" value="<?php echo isset($giatmara_opt) ? $giatmara_opt : ""; ?>">
    <input type="hidden" name="id_negeri" value="<?php echo isset($negeri_opt) ? $negeri_opt : ""; ?>">
    <input type="hidden" name="id_kursus" value="<?php echo isset($kursus_opt) ? $kursus_opt : ""; ?>">
    <input type="hidden" name="id_intake" value="<?php echo isset($intake_opt) ? $kursus_opt : ""; ?>">
    <div class="box box-solid box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Senarai Penawaran Kursus</h3>
        </div>

        <div class="box-body">
          <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            Maklumat permohonan hanya boleh dihantar ke pengurus selepas maklumat bank, dana dan potongan disahkan. <strong>Klik</strong> pada nama pelatih untuk membuat pengesahan.
          </div>
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
                        <th valign="top">CARA BAYAR</th>
                        <th valign="top">SEMAKAN</th>
                        <th valign="top">TINDAKAN</th>
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
                                  <input type="hidden" name="id_kursus_tetapan[<?php echo $val_sp->id_temuduga_tetapan;?>]" id="id_kursus" value="<?php echo $val_sp->id_setting_tawaran_kursus;?>">
                                  <input type="hidden" name="id_temuduga_tetapan[]" id="id_temuduga_tetapan" value="<?php echo $val_sp->id_temuduga_tetapan;?>">
                                </td>
                                <td>
                              		<a href="<?php echo base_url('admin/programreg/detailpengesahan/').$val_sp->id_temuduga_tetapan; ?>"><?php echo $val_sp->nama; ?></a>
                                  <br/><?php echo $val_sp->no_mykad; ?>
                                </td>
                                <td align="center">
                                    <?php
                                    $dt_ttc = new DateTime($val_sp->tawaran_tarikh_cetak);
                                    echo $dt_ttc->format("d-m-Y");
                                    ?>
                                </td>
                                <td><?php echo $val_sp->sesi; ?></td>
                                <td><?php echo $val_sp->kelayakan_elaun == 1 ? "Layak" : "Tidak Layak"; ?></td>
                                <td><?php echo $val_sp->name_bank; ?></td>
                                <td><?php echo $val_sp->no_akaun; ?></td>
                                <td><?php echo $val_sp->cara_bayar; ?></td>
                                <td><?php echo (($val_sp->tindakan==3)? '<strong>Ya</strong>' : '&nbsp;'); ?></td>
                                <td>
                                  <?php if ($res_sah[0]->id_permohonan==$val_sp->id_permohonan) { echo "&nbsp;"; } else { ?>
                                  <input type="checkbox" <?php echo (($val_sp->tindakan==3)? '' : 'disabled'); ?>
                                  name="chk_tindakan[<?php echo $val_sp->id_temuduga_tetapan; ?>]"
                                  value="4" <?php echo (($val_sp->tindakan==='4')? 'checked=checked': '')?>>&nbsp;
                                  <?php } ?>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <input class="btnAction btn btn-primary" type="submit" name="next" id="next" value="Hantar ke Pengurus" >
        </div>
    </div>

</form>


<script type="text/javascript">
$(document).ready(function(){
  $("#tbl_senarai_temuduga").DataTable();
 // $("#tbl_senarai_temuduga").DataTables();
});

</script>
