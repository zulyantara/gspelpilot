<?php $this->load->view('lpp04_header_3'); ?>
<form class="form-horizontal" action="<?php echo site_url("admin/lpp04/tetapkan_tetapan_tawaran"); ?>" method="post">
    <input type="hidden" name="id_giatmara" value="<?php echo $id_giatmara; ?>">
    <div class="box box-solid box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Senarai Permohonan Pelatih</h3>
        </div>

        <div class="box-body">

            <table class="table table-bordered table-striped table-hover" id="tbl_senarai_temuduga">
                <thead>
                    <tr>
                        <th valign="top">No</th>
                        <th valign="top">NAMA</th>
                        <th valign="top">NO. KP</th>
                        <th valign="top">SESI</th>
                        <th valign="top">TARIKH TAWARAN</th>
                        <th valign="top">SURAT TAWARAN</th>
                        <th valign="top">TARIKH CETAKAN</th>
                        <th valign="top">KEMASKINI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ( ! empty($res_senarai_permohonan))
                    {
                        $no=0;
                        foreach ($res_senarai_permohonan as $val_sp)
                        {
                            ?>
                            <tr>
                                <td><?php echo $no += 1; ?></td>
                                <td><button type="button" class="btn btn-primary btn-xs btn-flat" id="txt_nama_penuh" onclick="test('<?php echo $val_sp->no_mykad; ?>');"><?php echo $val_sp->nama_penuh; ?></button></td>
                                <td><?php echo $val_sp->no_mykad; ?></td>
                                <td><?php echo $val_sp->pilihan; ?></td>
                                <td><?php echo $val_sp->tarikh_mohon; ?></td>
                                <td><?php echo $val_sp->no_hp; ?></td>
                                <td><input type="checkbox" name="chk_temuduga[<?php echo $val_sp->id_permohonan_kursus; ?>]" value="<?php echo $val_sp->id_settings_tawaran_kursus; ?>"></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

  </form>

  <!--  Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Cetakan Permohonan</h4>
              </div>
              <div class="modal-body">

                  <div class="box  box-solid box-primary">
                      <div class="box-header with-border">
                          <h3 class="box-title">Butir Peribadi</h3>
                      </div>
                      <div class="box-body">
                          The body of the box
                      </div>
                  </div>

                  <div class="box  box-solid box-primary">
                      <div class="box-header with-border">
                          <h3 class="box-title">Maklumat Am</h3>
                      </div>
                      <div class="box-body">
                          The body of the box
                      </div>
                  </div>

                  <div class="box  box-solid box-primary">
                      <div class="box-header with-border">
                          <h3 class="box-title">Kursus Pilihan</h3>
                      </div>
                      <div class="box-body">
                          The body of the box
                      </div>
                  </div>

                  <div class="box  box-solid box-primary">
                      <div class="box-header with-border">
                          <h3 class="box-title">Maklumat Penjaga</h3>
                      </div>
                      <div class="box-body">
                          The body of the box
                      </div>
                  </div>

                  <div class="box  box-solid box-primary">
                      <div class="box-header with-border">
                          <h3 class="box-title">Tempat Tinggal</h3>
                      </div>
                      <div class="box-body">
                          The body of the box
                      </div>
                  </div>

                  <div class="box  box-solid box-primary">
                      <div class="box-header with-border">
                          <h3 class="box-title">Pengakuan</h3>
                      </div>
                      <div class="box-body">
                          The body of the box
                      </div>
                  </div>

              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div>
  <!-- End Modal -->

  <script type="text/javascript">
  $(document).ready(function(){
      $("#tbl_senarai_temuduga").DataTable();

      $('#txt_tgl').datepicker({
          dateFormat: "yy-mm-dd",
          changeMonth: true,
          changeYear: true,
          autoclose: true,
          yearRange: "-0:+1"
      });

      $('#txt_jam').timepicker({
      });

      $("#opt_pegawai").change(function(){
          var val_staff = $("#opt_pegawai").val();
          $.ajax({
              // dataType: 'json',
              data: {txt_staff : val_staff},
              url: "<?php echo site_url("admin/lpp04/jawatan_ajax"); ?>",
              type: "POST",
              success : function(data) {
                  $("#txt_jawatan").val(data);
              }
          });
      });

      $("#tbl_senarai_temuduga").DataTables();
  });

  function test(id)
  {
      $.ajax({
          dataType: 'json',
          data: {txt_no_mykad : id},
        url: "<?php echo site_url("admin/lpp04/biodata_ajax"); ?>",
        type: "POST",
        success : function(data) {
            $("#txt_jawatan").val(data);
        }
    });
}
</script>
