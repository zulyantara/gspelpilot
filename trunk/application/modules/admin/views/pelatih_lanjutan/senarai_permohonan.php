<div class="box box-primary box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">Tetapan Giatmara dan Kursus</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <form class="form-horizontal" action="<?php echo site_url("admin/pelatih_lanjutan/senarai_permohonan"); ?>" method="post">
      <div class="form-group">
        <label for="filter_negeri" class="control-label col-sm-2">NEGERI</label>
        <div class="col-sm-10">
          <select class="form-control" name="filter_negeri" id="filter_negeri">
            <option value="">Sila Pilih</option>
            <?php
            if (isset($res_negeri) && $res_negeri !== FALSE)
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
        <label for="filter_giatmara" class="control-label col-sm-2">GIATMARA</label>
        <div class="col-sm-10">
          <select class="form-control" name="filter_giatmara" id="filter_giatmara">
            <option value="">Sila Pilih</option>
            <?php
            if (isset($res_giatmara) && $res_giatmara !== FALSE)
            {
              foreach ($res_giatmara as $val_giatmara)
              {
                ?>
                <option value="<?php echo $val_giatmara->id; ?>"><?php echo $val_giatmara->nama_giatmara; ?></option>
                <?php
              }
            }
            else
            {
              ?>
              <option value="<?php echo $row_giatmara->id; ?>"><?php echo $row_giatmara->nama_giatmara; ?></option>
              <?php
            }
            ?>
          </select>
        </div>
      </div>
      <!-- <div class="form-group">
        <label for="filter_kursus" class="control-label col-sm-2">KURSUS</label>
        <div class="col-sm-10">
          <select class="form-control" name="filter_kursus" id="filter_kursus">
            <option value="">Sila Pilih</option>
            <?php
            foreach ($res_kursus as $vKursus)
            {
              ?>
              <option value="<?php echo $vKursus->id_setting_penawaran_kursus; ?>"><?php echo $vKursus->nama_kursus; ?></option>
              <?php
            }
            ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="filter_intake" class="control-label col-sm-2">SESI KEMASUKAN</label>
        <div class="col-sm-10">
          <select class="form-control" name="filter_intake" id="filter_intake">
            <option value="">Sila Pilih</option>
          </select>
        </div>
      </div> -->
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" name="btn_tetapkan" value="tetapkan" class="btn btn-primary">Tetapkan</button>
        </div>
      </div>
    </form>
  </div>
</div>

<form class="form-horizontal" action="<?php echo site_url("admin/pelatih_lanjutan/pendaftaran"); ?>" method="post">
  <input type="hidden" name="form-name" value="seranai">
  <div class="box box-primary box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">Senarai Permohonan LPP09</h3>
    </div>
    <div class="box-body">
      <div class="table-responsive">
        <table class="table" id="tbl_senarai_pendaftaran">
          <thead>
            <tr>
              <th rowspan="2">NO</th>
              <th rowspan="2">NAMA</th>
              <th rowspan="2">NO MyKAD</th>
              <th rowspan="2">NO PELATIH</th>
              <th rowspan="2">KURSUS</th>
              <th rowspan="2">GIATMARA</th>
              <th rowspan="2">STATUS PELATIH</th>
              <th colspan="3">MAKLUMAT PENDAFTARAN</th>
              <th colspan="3">MAKLUMAT KURSUS</th>
              <th colspan="3">MAKLUMAT ELAUN</th>
            </tr>
            <tr>
              <th>PERMOHONAN</th>
              <th>KELULUSAN</th>
              <th>PENDAFTARAN</th>
              <th>DAFTAR</th>
              <th>MULA</th>
              <th>TAMAT</th>
              <th>LAYAK</th>
              <th>MULA</th>
              <th>TAMAT</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 0;
            foreach ($res_filter as $val)
            {
              if ($val->nama_kursus != "")
              {
                $kursus = $val->nama_kursus;
              }
              if ($val->nama_program_pertandingan != "")
              {
                $kursus = $val->nama_program_pertandingan;
              }
              if ($val->nama_program_khas != "")
              {
                $kursus = $val->nama_program_khas;
              }
              ?>
              <tr>
                <td><?php echo $no += 1; ?></td>
                <td><?php echo $val->nama_penuh; ?></td>
                <td><?php echo $val->no_mykad; ?></td>
                <td><?php echo $val->no_pelatih; ?></td>
                <td><?php echo $kursus; ?></td>
                <td><?php echo $val->nama_giatmara; ?></td>
                <td></td>
                <td><?php echo date("d-m-Y", strtotime($val->tarikh_mohon_lpp09)); ?></td>
                <td><?php echo date("d-m-Y", strtotime($val->tarikh_kelulusan)); ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</form>

<script type="text/javascript">
var defOption ='<option value=""> Sila Pilih</option>';
$(document).ready(function() {
  $("#tbl_senarai_pendaftaran").DataTable();

  $('#filter_negeri').on('change', function() {
    // $('#giatmara').html(defOption );
    var stateID = $(this).val();
    var e = document.getElementById("opt_giatmara");
    if(stateID) {
      $.ajax({
          url: '<?php echo base_url();?>admin/Pelatih_lanjutan/ajaxgiat/'+stateID,
          type: "GET",
          dataType: "json",
          success:function(data) {
              // $('select[name="opt_giatmara"]').empty();
              $.each(data, function(key, value) {
                  $('#filter_giatmara').append('<option value="'+ value.id +'">'+ value.nama_giatmara +'</option>');
              });
          }
      });
      // console.log(stateID);
    } else {
      //  $('select[name="giatmara"]').empty();
      console.log(stateID);
    }
  });

  $("#filter_giatmara").change(function(){
    var stateID = $("#filter_giatmara").val();
    if(stateID) {
      $.ajax({
        url: '<?php echo base_url();?>admin/Pelatih_lanjutan/ajax_intake/',
        type: "POST",
        data: {id_giatmara: stateID},
        dataType: "json",
        success:function(data) {
          // $('select[name="opt_giatmara"]').empty();
          $.each(data, function(key, value) {
            $('#filter_intake').append('<option value="'+ value.id_intake +'">'+ value.nama_intake +'</option>');
          });
        }
      });
      // console.log(stateID);
    } else {
      //  $('select[name="giatmara"]').empty();
      console.log(stateID);
    }
  });

  $("#filter_kursus").change(function(){
    var idGiatmara = $("#filter_giatmara").val();
    var idKursus = $("#filter_kursus").val();
    if(idKursus) {
      $.ajax({
        url: '<?php echo base_url();?>admin/Pelatih_lanjutan/ajax_kursus2/',
        type: "POST",
        data: {id_giatmara: idGiatmara, id_kursus: idKursus},
        dataType: "json",
        success:function(data) {
          // $('select[name="opt_giatmara"]').empty();
          $.each(data, function(key, value) {
            $('#filter_intake').append('<option value="'+ value.id_intake +'">'+ value.nama_intake +'</option>');
          });
        }
      });
      // console.log(stateID);
    } else {
      //  $('select[name="giatmara"]').empty();
      console.log(stateID);
    }
  });
});
</script>
