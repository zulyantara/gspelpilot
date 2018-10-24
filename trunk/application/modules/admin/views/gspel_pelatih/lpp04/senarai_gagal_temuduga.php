<?php $this->load->view("gspel_pelatih/lpp04/tetapan_temuduga"); ?>
<input type="hidden" name="id_giatmara" value="<?php echo $id_giatmara; ?>">
<div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Senarai Gagal Temuduga</h3>
  </div>

  <div class="box-body">
    <table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
      <th>No</th>
      <th>NAMA<br>No MyKAD</th>
      <th>TARIKH TEMUDUGA</th>
      <th>KEPUTUSAN</th>
      <th>KURSUS</th>
      <th>TINDAKAN</th>
      </tr>
    </thead>
    <tbody>
    <?php
    if ( ! empty($res_senarai_permohonan)) {
      $no=0;
      foreach ($res_senarai_permohonan as $val_sp)
      {
    ?>
    <tr>
      <td><?php echo $no = +1; ?></td>
      <td><span id="txt_nama_penuh" style="cursor: pointer; color: #2980b9;"><?php echo $val_sp->nama_penuh; ?></span></td>
      <td><?php echo $val_sp->tarikh_temuduga; ?></td>
      <td><?php echo $val_sp->keputusan_temuduga; ?></td>
      <td><?php echo $val_sp->nama_kursus; ?></td>
      <td>
        <a data-toggle="modal" data-id="<?php echo $val_sp->id_temuduga_tetapan; ?>" data-pelatih="<?php echo $val_sp->nama_penuh; ?>" data-kursus="<?php echo $val_sp->nama_kursus; ?>" class="open-Dialog btn btn-primary" href="#myModal">BATALKAN GAGAL TEMUDUGA</a>
      </td>
    </tr>
    <?php
      }
    }
    ?>
    </tbody>
    </table>

    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <form id="form-bp" name="form-bp" action="<?php echo site_url("admin/lpp04/tetapkan_senarai_gagal_temuduga"); ?>" method="post">
          <input type="hidden" name="id_giatmara" value="<?php echo $id_giatmara; ?>">
          <input type="hidden" name="data_negeri" value="<?php echo $data_negeri; ?>">
          <input type="hidden" name="data_giatmara" value="<?php echo $data_giatmara; ?>">
          <input type="hidden" name="data_kursus" value="<?php echo $data_kursus; ?>">
          <input type="hidden" name="data_warganegara" value="<?php echo $data_warganegara; ?>">
          <input type="hidden" name="data_sesikemasukan" value="<?php echo $data_sesikemasukan; ?>">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Batalkan Gagal Temuduga</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="idTetapanTemuduga" id="idTetapanTemuduga" value="" />
            Adakah anda pasti untuk membatalkan keputusan temuduga bagi <label id="namePelatih"></label> (<label id="nameKursus"></label>) ?
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-success" id ="batalkan" name="batalkan" value="batalkan">Ya</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
          </div>
        </form>
        </div>

      </div>
    </div>

  </div>
</div>

<script>
$(document).ready(function(){
  $(document).on("click", ".open-Dialog", function () {
     var myIdtetapantemuduga = $(this).data('id');
     var namePelatih = $(this).data('pelatih');
     var nameKursus = $(this).data('kursus');
     console.log(myIdtetapantemuduga);
     $(".modal-body #idTetapanTemuduga").val( myIdtetapantemuduga );
     $(".modal-body #namePelatih").html( namePelatih );
     $(".modal-body #nameKursus").html( nameKursus );
   });
});
</script>
