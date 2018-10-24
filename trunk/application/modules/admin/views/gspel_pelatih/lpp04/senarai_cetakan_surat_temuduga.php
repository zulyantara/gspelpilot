<?php $this->load->view("gspel_pelatih/lpp04/tetapan_temuduga_dei"); ?>
    <input type="hidden" name="id_giatmara" value="<?php echo $id_giatmara; ?>">
    <input type="hidden" name="data_negeri" value="<?php echo $data_negeri; ?>">
    <input type="hidden" name="data_giatmara" value="<?php echo $data_giatmara; ?>">
    <input type="hidden" name="data_kursus" value="<?php echo $data_kursus; ?>">
    <input type="hidden" name="data_warganegara" value="<?php echo $data_warganegara; ?>">
    <input type="hidden" name="data_sesikemasukan" value="<?php echo $data_sesikemasukan; ?>">
    <div class="box box-solid box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Tetapan GIATMARA dan Kursus</h3>
        </div>

        <div class="box-body">

		<?php $this->load->view("gspel_pelatih/lpp04/table_tetapkan_cetakan_temuduga") ; ?>

		<!--<button type="submit" name="btn_simpan" id="btn_simpan" value="btn_simpan" class="btn btn-primary">Simpan</button>-->
            <button type="submit" name="btn_cetak" id="btn_cetak" value="btn_cetak" class="btn btn-primary">Cetak</button>
            <button type="button" name="btn_export" id="btn_export" value="btn_export" class="btn btn-primary">Export</button>
        </div>
    </div>
</form>
<?php
#echo APPPATH;
?>

<script type="text/javascript">
$(document).ready(function(){
    //$("#tbl_surat_temuduga").DataTable();

    $("#btn_export").click(function(event){
        window.open("<?php echo site_url('admin/lpp04/xls_cetakansuratemuduga/negeri/'.$data_negeri.'/giatmara/'.$data_giatmara.'/kursus/'.$data_kursus.'/wn/'.$data_warganegara.'/intake/'.$data_sesikemasukan); ?>");
    });

    $("#chk_all_sp").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

     $("#btn_cetak").click(function(){
         //$("#tbl_surat_temuduga").DataTable().ajax.reload();

     });
    //
    // $("#btn-cetak").click(function(){
    //     $("#tbl_surat_temuduga").DataTable().ajax.reload();
    // });
});
<?php if($dei_cetak=="ok"):?>
window.open("<?php echo site_url('admin/lpp04/cetakpdf');?>");
<?php endif;?>
</script>
