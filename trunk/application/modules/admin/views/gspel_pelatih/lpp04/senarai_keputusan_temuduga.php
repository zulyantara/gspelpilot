<?php $this->load->view("gspel_pelatih/lpp04/tetapan_temuduga"); ?>
<form class="form-horizontal" action="<?php echo site_url("admin/lpp04/tetapan_keputusan_temuduga"); ?>" method="post">
    <input type="hidden" name="id_kursus" value="<?php echo $id_kursus; ?>">
    <input type="hidden" name="id_giatmara" value="<?php echo $id_giatmara; ?>">
    <input type="hidden" name="id_wn" value="<?php echo $id_wn; ?>">
    <input type="hidden" name="id_intake" value="<?php echo $id_intake; ?>">
    <div class="box box-solid box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Senarai Keputusan Temuduga</h3>
        </div>

        <div class="box-body">
            <table class="table table-bordered table-striped table-hover" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NAMA<br>No MyKAD</th>
                        <th>TARIKH TEMUDUGA</th>
                        <th>KEPUTUSAN</th>
                        <th>TUKAR KURSUS</th>
                        <th>CATATAN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ( ! empty($res_senarai_permohonan)) {
                        $no=1;
                        foreach ($res_senarai_permohonan as $val_sp)
                        {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $no; ?>
                                    <input type="hidden" name="idtetapantemuduga[]" id="idtetapantemuduga" value="<?php echo $val_sp->id_tetapan_temuduga; ?>"/>
                                    <input type="hidden" name="idsettingstawarankursus[]" id="idsettingstawarankursus" value="<?php echo $val_sp->id_settings_tawaran_kursus; ?>"/>
                                </td>
                                <td><?php echo $val_sp->nama_penuh."<br>".$val_sp->no_mykad; ?></td>
                                <td><?php echo $val_sp->tarikh_temuduga; ?></td>
                                <td>
                                    <select class="form-control" name="opt_keputusan[]" id="opt_keputusan<?php echo $no?>" onchange="tukarKursus(<?php echo $no?>)">
                                        <?php
                                        if ( ! empty($row_keputusan))
                                        {
                                            foreach ($row_keputusan as $rowk) {
                                                ?>
                                                <option value="<?php echo $rowk->id; ?>" <?php if ($rowk->id == $val_sp->id_keputusan_temuduga) { echo "selected"; } ?>><?php echo $rowk->keputusan_temuduga    ; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control" name="opt_kursus[]" id="opt_kursus<?php echo $no?>" disabled>
                                        <option value="">Sila Pilih</option>
                                        <?php
                                        $sql_tkursus = "SELECT stk.id, k.nama_kursus FROM settings_tawaran_kursus stk JOIN ref_kursus k ON stk.id_kursus = k.id WHERE stk.id_giatmara=$val_sp->id_giatmara AND stk.id_intake=$id_intake and  stk.status=1 AND stk.id NOT IN (SELECT kursus FROM v_permohonan_kursus WHERE id_permohonan = $val_sp->id_permohonan AND kursus IS NOT NULL)";
                                         // echo $sql_tkursus;										 
                                        $qry_tkursus = $this->db->query($sql_tkursus);
                                        foreach ($qry_tkursus->result() as $val_kursus)
                                        {
                                            ?>
                                            <option value="<?php echo $val_kursus->id; ?>"><?php echo $val_kursus->nama_kursus; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td><textarea name="opt_catatan[]" rows="8" cols="40"></textarea></td>
                            </tr>
                            <?php
                            $no++;
                        }
                    }
                    ?>
                </tbody>
            </table>
            <button type="submit" name="btn_tetapkan" id="btn_tetapkan" value="btn_tetapkan" class="btn btn-primary">Tetapkan Keputusan Temuduga</button>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
    $('#myTable').DataTable(); //Datatable
});

function tukarKursus(no) {
    // comment
    var keputusan_val = $("#opt_keputusan"+no).val();

    if(keputusan_val == "3"){
        $('#opt_kursus'+no).attr("disabled", false);
        $('#opt_kursus'+no).prop("required", true);
    }else{
        $('#opt_kursus'+no).attr("disabled", true);
    }
}
</script>
