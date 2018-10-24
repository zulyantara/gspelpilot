    <?php $this->load->view('header_5'); ?>

    <form class="form-horizontal" action="<?php echo site_url("admin/programreg/berdaftar"); ?>" method="post">
    <input type="hidden" name="form-name" value="seranai">
    <input type="hidden" name="id_giatmara" value="<?php echo isset($giatmara_opt) ? $giatmara_opt : ""; ?>">
    <input type="hidden" name="id_negeri" value="<?php echo isset($negeri_opt) ? $negeri_opt : ""; ?>">
    <input type="hidden" name="id_kursus" value="<?php echo isset($kursus_opt) ? $kursus_opt : ""; ?>">
    <input type="hidden" name="id_intake" value="<?php echo isset($intake_opt) ? $intake_opt : ""; ?>">
    <div class="box box-solid box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Senarai Pelatih Berdaftar</h3>
        </div>

        <div class="box-body">
            <table class="table table-bordered table-striped table-hover" id="tbl_senarai_temuduga">
                <thead>
                    <tr>
                        <th valign="top">No</th>
                        <th valign="top">NAMA</th>
                        <th valign="top">NO. MyKAD</th>
                        <th valign="top">NO PELATIH</th>
                        <th valign="top">ELAUN</th>
                        <th valign="top">SESI</th>
                        <th valign="top">TARIKH DAFTAR</th>
                        <th valign="top">TARIKH MULA</th>
                        <th valign="top">TARIKH TAMAT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ( ! empty($res_senarai_penawaran_kursus))
                    {
                        $no=0;
                        foreach ($res_senarai_penawaran_kursus as $val_sp)
                        {
                            ?>
                            <tr>
                                <td>
                                  <?php echo $no += 1; ?>
                                </td>
                                <td>
                              		<a href="<?php echo base_url('admin/programreg/detailberdaftar/').$val_sp->id_temuduga_tetapan; ?>"><?php echo $val_sp->nama; ?></a>
                                </td>
                                <td><?php echo $val_sp->no_mykad; ?></td>
                                <td><?php echo $val_sp->no_pelatih; ?></td>
                                <td><?php echo $val_sp->kelayakan_elaun == "1" ? "Layak" : "Tidak Layak"; ?></td>
                                <td><?php echo $val_sp->sesi; ?></td>
                                <td>
                                    <?php
                                    $dt_tarikh_lapor = new DateTime($val_sp->tawaran_tarikh_lapordiri);
                                    echo $dt_tarikh_lapor->format("d-m-Y");
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $dt_tawaran_mula = new DateTime($val_sp->tawaran_mula_elaun);
                                    echo $dt_tawaran_mula->format("d-m-Y");
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $dt_tawaran_tamat = new DateTime($val_sp->tawaran_tamat_elaun);
                                    echo $dt_tawaran_tamat->format("d-m-Y");
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <input class="btnAction btn btn-primary" type="button" id="cetak" value="Cetak" <?php echo empty($res_senarai_penawaran_kursus) ? "disabled=\"disabled\"" : ""; ?>>
        </div>
    </div>

</form>

<script type="text/javascript">
$(document).ready(function(){
    $("#tbl_senarai_temuduga").DataTable();
    $("#cetak").click(function(event){
        event.preventDefault();
        window.open("programreg/cetak_senarai_berdaftar/<?php echo $giatmara_opt."/".$negeri_opt."/".$kursus_opt."/".$intake_opt; ?>");
    });
});
</script>
