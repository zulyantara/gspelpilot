<?php $this->load->view('header_5'); ?>
<form class="form-horizontal" action="<?php echo site_url("admin/programreg/pengurus"); ?>" method="post">
<input type="hidden" name="form-name" value="seranai">
<input type="hidden" name="id_giatmara" value="<?php echo isset($giatmara_opt) ? $giatmara_opt : ""; ?>">
<input type="hidden" name="id_negeri" value="<?php echo isset($negeri_opt) ? $negeri_opt : ""; ?>">
<input type="hidden" name="id_kursus" value="<?php echo isset($kursus_opt) ? $kursus_opt : ""; ?>">
<input type="hidden" name="id_intake" value="<?php echo isset($intake_opt) ? $intake_opt : ""; ?>">
<div class="box box-solid box-primary">
  <div class="box-header with-border">
      <h3 class="box-title">Senarai Pelatih Berdaftar</h3>
  </div>

  <div class="panel-body">
    <div class="box-body table table-responsive">
      <table class="table table-striped table-bordered table-hover" id="tbl_senarai_temuduga" width="100%">
      <thead>
      <tr>
        <th>No</th>
        <th>NAMA</th>
        <th>NO. MyKAD</th>
        <th>TARIKH TAWARAN</th>
        <th>SESI</th>
        <th>KELAYAKAN ELAUN</th>
        <th>NAMA BANK</th>
        <th>NO. AKAUN</th>
        <th>CARA BAYAR</th>
        <th>SAH</th>
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
          <input type="hidden" name="id_bp[]" id="id_bp" value="<?php echo $val_sp->id_permohonan_butir_peribadi; ?>">
          <input type="hidden" name="id_permohonan[]" id="id_permohonan" value="<?php echo $val_sp->id_kursus_temuduga_tetapan; ?>">
          <input type="hidden" name="id_temuduga_tetapan[]" id="id_temuduga_tetapan" value="<?php echo $val_sp->id_temuduga_tetapan;?>">
        </td>
        <td><input type="text" name="butir_peribadi_name[]" id="butir_peribadi_name" value="<?php echo $val_sp->nama; ?>" style="text-transform:uppercase" /></td>
        <td><input type="text" name="butir_peribadi_mykad[]" id="butir_peribadi_mykad" value="<?php echo $val_sp->no_mykad; ?>" /></td>
        <td>
          <?php echo date("d-m-Y", strtotime($val_sp->tawaran_tarikh_cetak)); ?>
          <?php /*
          <div id="datepicker1" class="input-group date">
           <input class="form-control" type="text" name="tarikh_tawaran" id="tarikh_tawaran" value ="<?php echo ($res_temudugatetapan[0]->tarikh_tawaran) ? date('n-j-Y', strtotime($res_temudugatetapan[0]->tarikh_tawaran)) : date('n-j-Y'); ?>"/>
            <span class="input-group-addon">
               <i class="glyphicon glyphicon-calendar"></i>
            </span>
         </div>
         */ ?>
        </td>
        <td><?php echo $val_sp->sesi; ?></td>
        <td align="center">
          
            <?php  if($val_sp->kelayakan_elaun=='1'):?> Ya <?php endif;?>
            <?php  if($val_sp->kelayakan_elaun=='0'):?> Tidak <?php endif;?>
          
        </td>
        <td><?php echo $val_sp->name_bank; ?></td>
        <td><?php echo $val_sp->no_akaun; ?></td>
        <td><?php echo $val_sp->cara_bayar; ?></td>
        <td>
          <select id="chk_tindakan" name="chk_tindakan[]">
            <option value="">[Sila Pilih]</option>
            <option value="0" <?php echo (($val_sp->tindakan==='0')? 'selected=selected': '')?>>Tidak Sah</option>
            <option value="5" <?php echo (($val_sp->tindakan==='5')? 'selected=selected': '')?>>Sah</option>
          </select>
        </td>
      </tr>
      <?php
        }
      }
      ?>
      </tbody>
      </table>
    </div>
    <input class="btnAction btn btn-primary" type="submit" name="next" id="next" value="Sahkan" >
  </div>
</div>
</form>

<script type="text/javascript">
$(document).ready(function(){
  $("#tbl_senarai_temuduga").DataTable({
    "autoWidth": false,
  });
  //$("#tbl_senarai_temuduga").DataTables();
  $('#tarikh_tawaran').datepicker({
    dateFormat: "m-d-yy",
    changeMonth: true,
    changeYear: true,
    autoclose: true,
    yearRange: "-0:+1"
  });
});
</script>
