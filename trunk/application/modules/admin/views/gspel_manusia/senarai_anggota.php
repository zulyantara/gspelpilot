<!-- _*_*_*_
senarai_anggota : staff pangku tugas
last update : Toosa
_*_*_*_ -->
<div class="box  box-solid box-primary">
      <div class="box-header with-border">
          <h3 class="box-title">
            <a data-toggle="collapse" href="#collapse1">Carian Staf
              <span class="glyphicon glyphicon-circle-arrow-down"></span></a>
          </h3>
      </div>
      <div class="box-body panel-collapse collapse" id="collapse1">
          <form class="form-horizontal" action="<?php echo site_url("admin/gspel_manusia"); ?>" method="post">
              <div class="form-group">
                  <label for="txt_no_mykad" class="col-sm-2 control-label">No. MyKAD</label>
                  <div class="col-sm-10">
                      <div class="row">
                          <div class="col-sm-3">
                              <input type="text" name="txt_no_mykad" id="txt_no_mykad" class="form-control">
                          </div>
                      </div>
                  </div>
              </div>

              <div class="form-group">
                  <label for="txt_nama" class="col-sm-2 control-label">Nama Staf</label>
                  <div class="col-sm-10">
                      <div class="row">
                          <div class="col-sm-3">
                              <input type="text" name="txt_nama" id="txt_nama" class="form-control">
                          </div>
                      </div>
                  </div>
              </div>

              <div class="form-group">
                  <label for="txt_gaji" class="col-sm-2 control-label">No. Gaji</label>
                  <div class="col-sm-10">
                      <div class="row">
                          <div class="col-sm-3">
                              <input type="text" name="txt_gaji" id="txt_gaji" class="form-control">
                          </div>
                      </div>
                  </div>
              </div>

              <div class="form-group">
                  <label for="opt_negeri" class="col-sm-2 control-label">Negeri</label>
                  <div class="col-sm-10">
                      <div class="row">
                          <div class="col-sm-3">
                              <select class="form-control" name="opt_negeri" id="opt_negeri">
                                  <option value="">Sila Pilih</option>
                                  <?php
                                  if ($res_negeri !== FALSE)
                                  {
                                      foreach ($res_negeri as $val_negeri)
                                      {
                                          ?>
                                          <option value="<?php echo $val_negeri->id; ?>"><?php echo $val_negeri->kod_negeri." | ".$val_negeri->nama_negeri; ?></option>
                                          <?php
                                      }
                                  }
                                  ?>
                              </select>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="form-group">
                  <label for="opt_giatmara" class="col-sm-2 control-label">Giatmara</label>
                  <div class="col-sm-10">
                      <div class="row">
                          <div class="col-sm-3">
                              <select class="form-control" name="opt_giatmara" id="opt_giatmara">
                                  <option value="">Sila Pilih</option>
                              </select>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="form-group">
                  <label for="opt_kursus" class="col-sm-2 control-label">Kursus</label>
                  <div class="col-sm-10">
                      <div class="row">
                          <div class="col-sm-3">
                              <select class="form-control" name="opt_kursus" id="opt_kursus">
                                  <option value="">Sila Pilih</option>
                                  <?php
                                  if ($res_kursus !== FALSE)
                                  {
                                      foreach ($res_kursus as $val_kursus)
                                      {
                                          ?>
                                          <option value="<?php echo $this->val_kursus->id; ?>"><?php echo $val_kursus->kod_kursus." | ".$val_kursus->nama_kursus; ?></option>
                                          <?php
                                      }
                                  }
                                  ?>
                              </select>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="form-group">
                  <label for="opt_jabatan" class="col-sm-2 control-label">Jabatan</label>
                  <div class="col-sm-10">
                      <div class="row">
                          <div class="col-sm-3">
                              <select class="form-control" name="opt_jabatan" id="opt_jabatan">
                                  <option value="">Sila Pilih</option>
                                  <?php
                                  if ($res_jabatan !== FALSE)
                                  {
                                      foreach ($res_jabatan as $val_jabatan)
                                      {
                                          ?>
                                          <option value="<?php echo $this->val_jabatan->id; ?>"><?php echo $val_jabatan->nama_jabatan; ?></option>
                                          <?php
                                      }
                                  }
                                  ?>
                              </select>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="form-group">
                  <label for="opt_jawatan" class="col-sm-2 control-label">Jawatan</label>
                  <div class="col-sm-10">
                      <div class="row">
                          <div class="col-sm-3">
                              <select class="form-control" name="opt_jawatan" id="opt_jawatan">
                                  <option value="">Sila Pilih</option>
                                  <?php
                                  if ($res_jawatan !== FALSE)
                                  {
                                      foreach ($res_jawatan as $val_jawatan)
                                      {
                                          ?>
                                          <option value="<?php echo $this->val_jawatan->id; ?>"><?php echo $val_jawatan->nama_jawatan; ?></option>
                                          <?php
                                      }
                                  }
                                  ?>
                              </select>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                      <span class="text-danger clearfix"><b>* Buat Carian Untuk Memaparkan Senarai Pengguna</b></span>
                      <button type="submit" name="btn_cari" id="btn_cari" value="cari" class="btn btn-primary btn-sm">Carian</button>
                  </div>
              </div>
          </form>
      </div>
  <!-- </div> -->
  </div>
  <form class="form-horizontal" action="<?php echo site_url('admin/gspel_manusia/reset_tukar_katalaluan');?>" method=post>

    <div class="row">
      <div class="col-sm-4">
         <div class="btn-group">
         <a href="<?php echo site_url("admin/gspel_manusia/"); ?>" class="btn btn-primary btn-sm">Refresh</a>
         <a href="<?php echo site_url("admin/gspel_manusia/add_staff"); ?>" class="btn btn-primary btn-sm">Tambah</a>
         <!-- <div class="form-group"> -->
         <button type="submit" name="btn_katalaluan" id="btn_katalaluan" value="katalaluan" class="btn btn-primary btn-sm btn-warning">Tukar katalaluan</button>
         <!-- </div> -->
         </div>
       </div>
       <div class="col-sm-4"></div>
     </div>
     <div class="row">
       <div class="col-sm-4"><h3> </h3></div>
        <div class="col-sm-4"> </div>
      </div>

  <div class="box box-solid box-primary">

        <div class="box-header with-border">
            <h3 class="box-title">Senarai Staf</h3>
        </div>

      <div class="box-body">
          <table class="table" id="tbl_staf">
              <thead>
                  <tr>
                      <th>Bil</th>
                      <th>Nama<br>No MyKAD</th>
                      <th>Username</th>
                      <th>Jabatan</th>
                      <th>Jawatan</th>
                      <th>No Gaji</th>
                      <th>Status</th>
                      <th>Activity</th>
                      <th align="center"><input type="checkbox" id="chk_all_sp">Ubah<br> katalaluan</th>

                  </tr>
              </thead>
              <tbody>
                  <?php
                  if (isset($res_staff))
                  {
                      if ($res_staff !== FALSE)
                      {
                          $no = 0;
                          foreach ($res_staff as $val)
                          {
                              $data_username = $this->gmm->get_username_staff($val->id_staff);
                                $numrows = $data_username[numrows];
                                $username =  $data_username[username];

                                $user_status = ($data_username[active] == 1) ? 'Aktif' : 'Tidak Aktif';
                                // echo '<pre>'; print_r($user_status); echo '</pre>';
                                // exit;
                              ?>
                              <tr>
                                  <td><?php echo $no += 1; ?></td>

                                  <td><a href=gspel_manusia/edit_staff/<?php echo $val->id_staff;?>><?php echo $val->nama."<br>".$val->no_mykad; ?></a></td>
                                  <td><?php
                                          if ($numrows == 0) {
                                              $username = "No Username";
                                              // $username = "<a class=\"text-danger\" href=''".$id.">".$username."</a>";
                                          } else {
                                            //  $username = "<a class=\"text-primary\" href=''".$id.">".$username."</a>";
                                          }
                                        echo $username;
                                      ?></td>
                                  <td><?php echo $val->nama_jabatan; ?></td>
                                  <td><?php echo $val->nama_jawatan; ?></td>
                                  <td><?php echo $val->no_gaji; ?></td>
                                  <td><?php echo $val->status_info_pangku_tugas == 1 ? "Aktif" : "Tidak Aktif"; ?></td>
                                  <td>
                                      <a href="<?php echo site_url("admin/gspel_manusia/tugas_per_staff/".$val->id_staff); ?>" class="btn btn-primary btn-xs">
                                        <span class="glyphicon glyphicon-pencil"></span>Tugas</a>

                                      <?php if ($val->status_info_pangku_tugas == '1') { ?>
                                        <a href="<?php echo site_url('admin/gspel_manusia/suspend_staff/'.$val->id_staff."/0"); ?>"
                                          id="btn_padam" prev_page='1' class="btn btn-warning btn-xs">
                                        <span class="glyphicon glyphicon-remove">Padam</a>

                                      <?php } else { ?>
                                        <a href="<?php echo site_url("admin/gspel_manusia/suspend_staff/".$val->id_staff."/1"); ?>"
                                            id="btn_padam" class="btn btn-success btn-xs">
                                        <span class="glyphicon glyphicon-ok">Aktifkan</a>
                                      <?php } ?>

                                      <a href="<?php echo site_url("admin/gspel_manusia/delete_staff/".$val->id_staff); ?>"
                                        data-target="del_modal" data-toggle="modal" class="btn btn-danger btn-xs identifyingClass" role="button"
                                        data-hapus="<?php echo $val->id_staff; ?>"
                                        <span class="glyphicon glyphicon-trash"></span>Hapus</a>
                                  </td>
                                  <td align=center>
                                    <input type="checkbox" name=chk_resetpass[<?php echo $val->id_staff;?>] value=<?php echo $val->id_staff;?>>
                                  </td>

                              </tr>
                              <?php
                          }
                      }
                  }
                  ?>
              </tbody>
          </table>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
         <div class="btn-group">
         <a href="<?php echo site_url("admin/gspel_manusia/"); ?>" class="btn btn-primary btn-sm">Kembali</a>
         <a href="<?php echo site_url("admin/gspel_manusia/add_staff"); ?>" class="btn btn-primary btn-sm">Tambah</a>
         <button type="submit" name="btn_katalaluan" id="btn_katalaluan" value="katalaluan" class="btn btn-primary btn-sm btn-warning">Tukar katalaluan</button>
         </div>
       </div>
       <div class="col-sm-4"></div>
     </div>


    </form>

<!-- The Modal -->
<!-- Modal (popup) -->
<!-- Konfirmasi sebelum data pangku tugas dihapus -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

<!-- /The Modal -->

    <script type="text/javascript">
    $(document).ready(function(){
          $(".identifyingClass").click(function () {
            // var id_hapus = $(this).data('hapus');
            var id_hapus = $(this).data('hapus');
            var url_del = "gspel_manusia/delete_staff/"+id_hapus;
            var url_prev = "gspel_manusia";
            var pesan = "<h2>Data id="+id_hapus+" akan dihapus ya ?</h2>";

            bootbox.confirm({
                message: pesan,
                buttons: {
                    confirm: {
                        label: 'Ya',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'Tidak',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if (result) {
                      console.log('Data: '+ id_hapus +' This was logged in the callback: ' + url_del);

                      $.ajax({
                          data: id_hapus,
                          url: url_del,
                          type: "POST",
                          success: function(data){
                              window.location.href = url_prev;
                          }
                        });
                      } else {
                          console.log('Data: '+ id_hapus +' This was logged in the callback: zero ' );
                      }
                }
            });
          //    $(".modal-body #hiddenValue").val(id_hapus);
          });

        $("#tbl_staf").DataTable();

        $('.glyphicon').click(function () {
            $(this).toggleClass("glyphicon-circle-arrow-up").toggleClass("glyphicon-circle-arrow-down");
        });

        $("#opt_negeri").change(function(){
            var val_negeri = $("#opt_negeri").val();
            $.ajax({
                url: "<?php echo site_url("admin/gspel_manusia/ajax_giatmara"); ?>",
                data: {id_negeri: val_negeri},
                method: "POST",
                beforeSend: function(){
    				$('#divShow').html("<div><img height='100px' src='<?php echo base_url("assets/images/loading.gif")?>'></div>");
    			},
                success: function(data) {
                    $("#opt_giatmara").html(data);
                }
            });
        });

        $("#chk_all_sp").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

        $(".btn_padam").click(function() {
          $.ajax({
              type: "POST",
              url: path,
              data: {'id_staff': passedvalue,
              },
              success: function(data) {
                  if (data) {
                      alert(success);//task done on success
                  }
              },
              error: function() {
                      alert('some error occurred');
                  },
            });

        });

    });
    </script>
