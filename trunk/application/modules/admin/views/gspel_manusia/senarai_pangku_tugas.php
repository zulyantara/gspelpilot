<!-- Senarai Pangku Tugas -->

<?php
$nama = $res_sipt->nama;
$id_tugas = $res_sipt->id_tugas;
$id = $res_sipt->id;
$no_mykad = $res_sipt->no_mykad;
$no_gaji = $res_sipt->no_gaji;
$no_hp = $res_sipt->no_hp;
$emel = $res_sipt->emel;
$id_agama = $res_sipt->id_agama;
$id_bangsa = $res_sipt->id_bangsa;
$status_perkahwinan = $res_sipt->status_perkahwinan;
$jantina = $res_sipt->jantina;
$alamat = $res_sipt->alamat;
$id_jabatan = isset($res_sipt) ? $res_sipt->id_jabatan : "";
$id_jawatan = isset($res_sipt) ? $res_sipt->id_jawatan : "";
$status_jawatan = isset($res_sipt) ? $res_sipt->status_jawatan : "";
$id_jenis_jawatan = isset($res_sipt) ? $res_sipt->id_jenis_jawatan : "";
$id_negeri = isset($res_sipt) ? $res_sipt->id_negeri : "";
$id_giatmara = isset($res_sipt) ? $res_sipt->id_giatmara : "";
$id_kursus = isset($res_sipt) ? $res_sipt->id_kursus : "";
$tarikh_mula_tugas = isset($res_sipt) ? $res_sipt->tarikh_mula_tugas : "";
$tarikh_tamat_tugas = isset($res_sipt) ? $res_sipt->tarikh_tamat_tugas : "";
$status = isset($res_sipt) ? $res_sipt->status : "";
 ?>

<div class="box box-solid box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Maklumat Staf</h3>
    </div>
    <div class="box-body">

        <form class="form-horizontal" action="<?php echo site_url("admin/gspel_manusia/tugas"); ?>" method="post">
          <fieldset disabled=true>
            <div class="form-group">
                <label for="txt_nama" class="col-sm-2 control-label">Nama Staf</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <input  disabled type="text" name="txt_nama" id="txt_nama" class="form-control" value="<?php echo $nama;?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="txt_mykad" class="col-sm-2 control-label">No. MyKAD</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <input disabled type="text" name="txt_mykad" id="txt_mykad" class="form-control" value=<?php echo $no_mykad; ?>>
                        </div>
                    </div>
                </div>
            </div>


        <div class="form-group">
            <label for="txt_no_gaji" class="col-sm-2 control-label">No. Gaji*</label>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-md-4">
                      <input type=text class="form-control " name="txt_no_gaji" id="txt_no_gaji"
                      value="<?php echo $no_gaji;?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="txt_no_tel" class="col-sm-2 control-label">No. Tel</label>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-md-4">
                      <input type=text class="form-control " name="txt_no_tel" id="txt_no_tel"
                      value="<?php echo $no_hp;?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Emel*</label>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-md-4">
                      <input type=email class="form-control " name="txt_email" id="email"
                      placeholder="Masukkan emel" value="<?php echo $emel;?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="opt_agama" class="col-sm-2 control-label">Agama*</label>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-md-4">
                        <select class="form-control" name="opt_agama" id="opt_agama">
                            <option value="">Sila Pilih</option>
                            <?php
                            if ($res_agama !== FALSE)
                            {

                                foreach ($res_agama as $val)
                                {
                                    if ($id_agama==$val->id){
                                        $sel_agama = "selected";
                                    } else {
                                      $sel_agama = "";
                                    }
                                    // $sel_agama = $res_sipt->id_agama == $val->id ? "selected=\"selected\"" : "";
                                    ?>
                                    <option value="<?php echo $val->id; ?>" <?php echo $sel_agama; ?>><?php echo $val->agama; ?></option>
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
            <label for="opt_bangsa" class="col-sm-2 control-label">Bangsa*</label>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-md-4">
                        <select class="form-control" name="opt_bangsa" id="opt_bangsa">
                            <option value="">Sila Pilih</option>
                            <?php
                            if ($res_bangsa !== FALSE)
                            {

                                foreach ($res_bangsa as $val)
                                {
                                    if ($id_bangsa==$val->id){
                                        $sel_bangsa = "selected";
                                    } else {
                                      $sel_bangsa = "";
                                    }
                                    // $sel_agama = $res_sipt->id_agama == $val->id ? "selected=\"selected\"" : "";
                                    ?>
                                    <option value="<?php echo $val->id; ?>" <?php echo $sel_bangsa; ?>><?php echo $val->bangsa; ?></option>
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
            <label for="opt_taraf_perkahwinan" class="col-sm-2 control-label">Status Perkahwinan*</label>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-md-4">
                        <select class="form-control" name="opt_taraf_perkahwinan" id="opt_taraf_perkahwinan">
                            <option value="">Sila Pilih</option>
                            <?php
                            if ($res_taraf_perkahwinan !== FALSE)
                            {

                                foreach ($res_taraf_perkahwinan as $val)
                                {
                                    if ($status_perkahwinan == $val->id){
                                        $sel_taraf_perkahwinan = "selected";
                                    } else {
                                      $sel_taraf_perkahwinan = "";
                                    }
                                    // $sel_agama = $res_sipt->id_agama == $val->id ? "selected=\"selected\"" : "";
                                    ?>
                                    <option value="<?php echo $val->id; ?>" <?php echo $sel_taraf_perkahwinan; ?>><?php echo $val->taraf_perkahwinan; ?></option>
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
            <label for="opt_jantina" class="col-sm-2 control-label">Jantina*</label>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-md-4">
                      <select class="form-control" name="opt_jantina" id="opt_jantina">
                        <option value="">Sila Pilih</option>
                        <?php
                        $arr_jantina = array("1" => "Lelaki", "2" => "Perempuan");
                        foreach ($arr_jantina as $kj => $vj)
                        {
                          $sel_jantina = $kj == $jantina ? "selected=\"selected\"" : "";
                          ?>
                          <option value="<?php echo $kj; ?>" <?php echo $sel_jantina; ?>><?php echo $vj; ?></option>
                          <?php
                        }
                        ?>
                      </select>


                    </div>
                </div>
            </div>
        </div>
        </fieldset>
        </form>
    </div>
</div>

<div class="row">
  <div class="col-sm-4">
     <div class="btn-group">
     <!-- <a href="javascript:window.history.go(-1);" class="btn btn-primary btn-sm">Kembali</a> -->
     <a href="<?php echo site_url("admin/gspel_manusia/"); ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-arrow-left">Kembali ke Halaman Sebelumnya</a>
     <a href="<?php echo site_url("admin/gspel_manusia/add_pangku_tugas")."/".$id; ?>" class="btn btn-primary btn-sm">
        <span class="glyphicon glyphicon-plus"></span>Tambah Maklumat Tugas</a>
     </div>
   </div>
   <div class="col-sm-4"> </div>
 </div>
 <div class="row">
   <div class="col-sm-4"><h3> </h3></div>
    <div class="col-sm-4"> </div>
  </div>

  <div class="box box-solid box-primary">
      <div class="box-header with-border">
          <h3 class="box-title">Maklumat Tugas</h3>
      </div>

      <?php
      if (isset($row_tugas))
      {
        $jumlah_tugas = count($row_tugas);
          if ($row_tugas !== FALSE)
          {
              $no = 1;
              // echo '<pre>'; print_r($row_tugas); echo '</pre>';
              // exit;
              foreach ($row_tugas as $valtugas)
              {
                $url = "gspel_manusia/pangku_tugas/".(string) $valtugas->id_staff_info_pangku_tugas;
                $url2 = (string) $valtugas->id_staff_info_pangku_tugas;
                // $where = array("id_staff_info_pangku_tugas" => $id_tugas);
                // $this->mViewData["row_staff"] = $this->gmm->get_staff_info_pangku_tugas("row", NULL, $where);
                // echo '<pre>'; print_r($valtugas); echo '</pre>';
                // exit;
                $id_form = "frm".(string) ($no);
                // $id_form = "frm1";
                $disabled = true;
                  ?>

                <form class="form-horizontal form_pangkutugas" action="<?php echo site_url("admin/gspel_manusia/simpan_pangku_tugas/".$valtugas->id_staff_info_pangku_tugas); ?>"
                    method="post" id="<?php echo $id_form; ?>">


                <div class="box-body">
                  <div class="box-header with-border">
                    <div id="<?php echo $id_form;?>_resultMessage" class="resultMessage">
                      <?php if($this->session->flashdata('flashSuccess')) { ?>
                        <div class='flashMsg flashSuccess alert alert-success'>
                          <?php echo $this->session->flashdata('flashSuccess') ?> </div>
                        <?php } ?>

                        <?php if($this->session->flashdata('flashError')) { ?>
                          <div class='flashMsg flashError alert alert-danger'>
                            <?php echo $this->session->flashdata('flashError') ?> </div>
                          <?php } ?>
                        </div>
                    <!--  Sederetan button pengaturan form edit pangku tugas -->
                      <button type="button" class="btn btn-primary btn-sm btn_edit" data-value ="<?php echo $id_form;?>" id="<?php echo $id_form;?>_btnedit">
                        <span class="glyphicon glyphicon-pencil">Ubah</button>
                      <button type="submit" name="btn_simpan" form="<?php echo $id_form;?>" id="<?php echo $id_form;?>_btnsimpan" value="simpan"
                        class="btn btn-primary btn-sm btn_simpan"><span class="glyphicon glyphicon-saved"></span>Simpan</button>
                      <button type="button" class="btn btn-primary btn-sm btn_cancel" data-value ="<?php echo $id_form;?>" id="<?php echo $id_form;?>_btncancel"
                        form="<?php echo $id_form;?>" id="<?php echo $id_form;?>_btnsimpan">
                        <span class="glyphicon glyphicon-refresh">Cancel</button>

                      <?php
                      if ($jumlah_tugas <= 1) { ?>
                          <a href="#" data-target="del_modal" data-toggle="modal" class="btn btn-danger btn-sm identifyingClass disabled" role="button" data-hapus="<?php echo $url2; ?>"  >
                            <span class="glyphicon glyphicon-trash"></span>Padam</a></td>
                      <?php } else { ?>
                          <a href="#" data-target="del_modal" data-toggle="modal" class="btn btn-danger btn-sm identifyingClass" role="button" data-hapus="<?php echo $url2; ?>"  >
                            <span class="glyphicon glyphicon-trash"></span>Padam</a></td>
                      <?php } ?>
                  </div>



                      <?php echo form_hidden('id_staff',$valtugas->id_staff);
                            echo form_hidden('id_tugas',$valtugas->id_staff_info_pangku_tugas);
                      ?>
                    <fieldset id="<?php echo $id_form;?>_fieldset" disabled="disabled">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="txt_nama" class="col-sm-2 control-label">Jabatan</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-6">
                                      <select class="form-control" name="opt_jabatan" id="<?php echo $id_form;?>_opt_jabatan">
                                          <option value="">Sila Pilih</option>

                                              <?php

                                              if ($res_jabatan !== FALSE)
                                              {
                                                  foreach ($res_jabatan as $val)
                                                  {
                                                      $sel_jabatan = $valtugas->id_jabatan == $val->id ? "selected=\"selected\"" : "";

                                                      ?>
                                                      <option  value="<?php echo $val->id;?>" <?php echo $sel_jabatan; ?>>  <?php echo $val->nama_jabatan; ?></option>
                                                      <?php
                                                  }
                                              }
                                              ?>
                                            </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="txt_nama" class="col-sm-2 control-label">Jawatan</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-6">
                                      <select class="form-control" name="opt_jawatan" id="<?php echo $id_form;?>_opt_jawatan">
                                        <option value="">Sila Pilih</option>
                                        <?php
                                        if ($res_jawatan !== FALSE)
                                        {
                                            foreach ($res_jawatan as $val)
                                            {
                                                $sel_jawatan = $valtugas->id_jawatan == $val->id ? "selected=\"selected\"" : "";
                                                ?>
                                                <option value="<?php echo $val->id; ?>" <?php echo $sel_jawatan; ?>><?php echo $val->nama_jawatan; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                      </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="opt_jenis_jawatan" class="col-sm-2 control-label">Jenis Jawatan*</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-6">
                                      <select class="form-control" name="opt_jenis_jawatan" id="<?php echo $id_form;?>_opt_jenis_jawatan">
                                          <option value="">Sila Pilih</option>
                                          <?php
                                          if ($res_jenis_jawatan !== FALSE)
                                          {
                                              foreach ($res_jenis_jawatan as $val)
                                              {
                                                // echo '<pre>'; print_r($valtugas->id_jenis_jawatan); echo '</pre>';
                                                // exit;
                                                  $sel_jenis_jawatan = $valtugas->id_jenis_jawatan == $val->id ? "selected=\"selected\"" : "";
                                                  ?>
                                                  <option value="<?php echo $val->id; ?>" <?php echo $sel_jenis_jawatan; ?>><?php echo $val->nama_jenis_jawatan; ?></option>
                                                  <?php
                                              }
                                          }
                                          ?>
                                      </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="txt_status_jawatan" class="col-sm-2 control-label">Status Jawatan*</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-6">
                                      <select class="form-control" name="opt_status_jawatan" id="<?php echo $id_form;?>_opt_status_jawatan">
                                          <?php
                                          $arr_sj = array(1=>"Aktif", 0=>"Tidak Aktif");
                                          foreach ($arr_sj as $key => $val)
                                          {
                                              $sel_status_jawatan = $status_jawatan == $key ? "selected=\"selected\"" : "";
                                              ?>
                                              <option value="<?php echo $key; ?>" <?php echo $sel_status_jawatan; ?>><?php echo $val; ?></option>
                                              <?php
                                          }
                                          ?>
                                      </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="opt_negeri" class="col-sm-2 control-label">Negeri*</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-6">
                                      <select class="form-control opt_negeri" name="opt_negeri" id="<?php echo $id_form;?>_opt_negeri">
                                          <option value="">Sila Pilih</option>
                                          <?php
                                          if ($res_negeri !== FALSE)
                                          {
                                              foreach ($res_negeri as $val)
                                              {
                                                  $sel_negeri = $valtugas->id_negeri == $val->id ? "selected=\"selected\"" : "";
                                                  ?>
                                                  <option value="<?php echo $val->id; ?>" <?php echo $sel_negeri; ?>><?php echo $val->nama_negeri; ?></option>
                                                  <?php
                                              }
                                          }
                                          ?>
                                      </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>

                      <div class="col-sm-6">

                        <div class="form-group">
                            <label for="opt_giatmara" class="col-sm-2 control-label">Giatmara*</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-6">
                                      <select class="form-control opt_giatmara" name="opt_giatmara" id="<?php echo $id_form;?>_opt_giatmara" disabled>
                                          <option value="">Sila Pilih</option>
                                          <?php

                                          if ($res_giatmara !== FALSE)
                                          {
                                              foreach ($res_giatmara as $val)
                                              {
                                                  $sel_giatmara = $valtugas->id_giatmara == $val->id ? "selected=\"selected\"" : "";
                                                  ?>
                                                  <option value="<?php echo $val->id; ?>" <?php echo $sel_giatmara; ?>><?php echo $val->nama_giatmara; ?></option>
                                                  <?php
                                              }
                                          }
                                          ?>
                                      </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="opt_kursus" class="col-sm-2 control-label">Kursus*</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-6">
                                      <select class="form-control" name="opt_kursus" id="<?php echo $id_form;?>_opt_kursus" disabled>
                                          <option value="">Sila Pilih</option>
                                          <?php
                                          // echo '<pre>'; print_r($valtugas); echo '</pre>';
                                    			// exit;
                                          if ($res_kursus !== FALSE)
                                          {
                                              foreach ($res_kursus as $val)
                                              {
                                                  $sel_kursus = $valtugas->id_kursus == $val->id ? "selected=\"selected\"" : "";
                                                  ?>
                                                  <option value="<?php echo $val->id; ?>" <?php echo $sel_kursus; ?>><?php echo $val->nama_kursus; ?></option>
                                                  <?php
                                              }
                                          }
                                          ?>
                                      </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="txt_tarikh_mula_tugas" class="col-sm-2 control-label">Tarikh Mula Tugas*</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="text" name="txt_tarikh_mula_tugas" id="<?php echo $id_form;?>_txt_tarikh_mula_tugas" class="txt_tarikh_mula_tugas form-control" value="<?php echo date('d-m-Y', strtotime($valtugas->tarikh_mula_tugas));?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="txt_tarikh_tamat_tugas" class="col-sm-2 control-label">Tarikh Tamat Tugas*</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="text" name="txt_tarikh_tamat_tugas" id="<?php echo $id_form;?>_txt_tarikh_tamat_tugas" class="form-control txt_tarikh_tamat_tugas" value="<?php echo date('d-m-Y', strtotime($valtugas->tarikh_tamat_tugas));?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="opt_status_pangku_tugas" class="col-sm-2 control-label">Status login</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                      <select class="form-control" name="opt_status_pangku_tugas" id="<?php echo $id_form;?>_opt_status_pangku_tugas">
                                        <?php
                                        $arr_status = array("1" => "Aktif", "0" => "Tidak Aktif");
                                        foreach ($arr_status as $kj => $vj)
                                        {
                                          $sel_status = $kj == $valtugas->status_info_pangku_tugas ? "selected=\"selected\"" : "";
                                          ?>
                                          <option value="<?php echo $kj; ?>" <?php echo $sel_status; ?>><?php echo $vj; ?></option>
                                          <?php
                                        }
                                        ?>
                                      </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">

                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                  </form>
                </div>
      <?php
                $no = $no + 1;
                }
          }

      }
       ?>

  </div>

<!-- Senarai Tugas -->
<div class="box box-solid box-primary" id="senarai_lama">
    <div class="box-header with-border">
        <h3 class="box-title">Senarai Tugas</h3>
    </div>
    <div class="box-body">
        <table class="table" id="tbl_staf">
            <thead>
                <tr>
                    <th>Bil</th>
                    <th>Jabatan</th>
                    <th>Jawatan</th>
                    <th>Negeri</th>
                    <th>Giatmara</th>
                    <th>Kursus</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($row_tugas))
                {
                    if ($row_tugas !== FALSE)
                    {
                        $no = 0;
                        foreach ($row_tugas as $val)
                        {
                            ?>
                            <tr>
                                <td><?php echo $no += 1; ?></td>
                                <td><?php echo $val->nama_jabatan; ?></td>
                                <td><?php echo $val->nama_jawatan; ?></td>
                                <td><?php echo $val->nama_negeri; ?></td>
                                <td><?php echo $val->nama_giatmara; ?></td>
                                <td><?php echo $val->nama_kursus; ?></td>
                                <?php
                                  $url = "gspel_manusia/pangku_tugas/".(string) $val->id_staff_info_pangku_tugas;
                                  $url2 = (string) $val->id_staff_info_pangku_tugas;?>
                                <td><a href=<?php echo $url; ?> class="btn btn-primary btn-sm" role="button"><span class="glyphicon glyphicon-pencil"></span>Edit</a>

                                  <?php
                                  if ($jumlah_tugas <= 1) { ?>
                                    <a href="#" data-target="del_modal" data-toggle="modal" class="btn btn-danger btn-sm identifyingClass disabled" role="button" data-hapus="<?php echo $url2; ?>"  >Padam</a></td>
                                  <?php } else { ?>
                                  <a href="#" data-target="del_modal" data-toggle="modal" class="btn btn-danger btn-sm identifyingClass" role="button" data-hapus="<?php echo $url2; ?>"  >Padam</a></td>
                                  <?php } ?>

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

<!-- Modal (popup) -->
<!-- Konfirmasi sebelum data pangku tugas dihapus -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
  var frm1x = "frm1_btnedit";
  var frm2x = "frm2_btnedit";

    $("#senarai_lama").hide();
    $(".btn_simpan").hide();
    $(".btn_cancel").hide();
    //$(".resultMessage").hide();
    $("#tbl_staf").DataTable();

    $(".identifyingClass").click(function () {
      var id_hapus = $(this).data('hapus');
      var url_del = "gspel_manusia/hapus_info_pangku_tugas/"+id_hapus;
      var url_prev = "gspel_manusia/tugas_per_staff/"+<?php echo (string) $id;?>

      bootbox.confirm({
          message: "<h2>Data  akan dihapus ?</h2>",
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

              //$( ".identifyingClass" ).submit();
              if (result) {
              console.log('Data: '+ id_hapus +' This was logged in the callback: ' + url_del);
                //$.ajax(url_del);

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

    $(".form_pangkutugas").submit(function (e) {
      var btnform = $(this).attr('data-value');
      var parentForm = this.form.id;

            e.preventDefault();
            // var form = $(this);
            var form = this.id;
            var urlx = "<?php echo site_url("admin/gspel_manusia/simpan_pangku_tugas/".$valtugas->id_staff_info_pangku_tugas); ?>";
            var serial = $('#'+form).serialize();
         $.ajax({
                type: 'POST',
                url: urlx,
                data: $('#'+form).serialize(),
                success: function(response) {
                    //alert("Success");
                    $("#"+form+"_resultMessage").fadeIn();
                    setTimeout(function() {
					           $("#"+form+"_resultMessage").fadeOut("slow");
				              }, 2000 );
                    $("#"+btnform+"_fieldset").prop('disabled',true);
                    // $(this).hide();
                    $("#"+btnform+"_btnsimpan").hide();
                    $("#"+btnform+"_btnedit").show();
                    //$('.form_pangkutugas').fadeOut("slow");

                }
      });
           return false;
      });

    $(".btn_edit").click(function(){
      var btnform = $(this).attr('data-value');
      var parentForm = this.form.id;
        $("#"+btnform+"_fieldset").prop('disabled',false);
        $(this).hide();
        $("#"+btnform+"_btnsimpan").show();
        $("#"+btnform+"_btncancel").show();

        $('#'+parentForm).find(':input').each(function(i, elem) {
           var input = $(elem);
           input.data('initialState', input.val());
         });
    });

    $(".btn_cancel").click(function(){
      var btnform = $(this).attr('data-value');
      var parentForm = this.form.id;
        $("#"+btnform+"_fieldset").prop('disabled',true);
        $(this).hide();
        $("#"+btnform+"_btnsimpan").hide();
        $("#"+btnform+"_btnedit").show();

        $('#'+parentForm).find(':input').each(function(i, elem) {
        var input = $(elem);
        input.val(input.data('initialState'));
        });

        $("#"+parentForm+"_opt_giatmara").attr('disabled', false);
        $("#"+parentForm+"_opt_kursus").attr('disabled', false);
        location.reload();
    });

    $(".txt_tarikh_mula_tugas").each(function(){
          $(this).datepicker({
            dateFormat: "dd-mm-yy",
            autoclose: true
          });
        });

    $(".txt_tarikh_tamat_tugas").each(function(){
          $(this).datepicker({
            dateFormat: "dd-mm-yy",
            autoclose: true
          });
    });

    $(".opt_negeri").change(function(){
        var val_negeri = $(".opt_negeri").val();
        var parentForm = this.form.id;
        $.ajax({
            url: "<?php echo site_url("admin/gspel_manusia/ajax_giatmara"); ?>",
            data: {id_negeri: val_negeri},
            method: "POST",
            // beforeSend: function(){
				    //       $('#divShow').html("<div><img height='100px' src='<?php //echo base_url("assets/images/loading.gif")?>'></div>");
			      // },
            success: function(data) {
                $("#"+parentForm+"_opt_giatmara").html(data);
                $("#"+parentForm+"_opt_giatmara").attr('disabled', false);
            }
        });
    });

    //Deteksi perubahan dari DOM className
    $(".opt_giatmara").change(function(){
        var val_giatmara = $(".opt_giatmara").val();
        var urlx = "<?php echo site_url("admin/gspel_manusia/ajax_giatmara_kursus/");?>"+val_giatmara;
        var parentForm = this.form.id;

        $.ajax({
            url: urlx,
            data: {id_giatmara: val_giatmara},
            method: "POST",
            beforeSend: function(){
        $('#divShow').html("<div><img height='100px' src='<?php echo base_url("assets/images/loading.gif")?>'></div>");
      },
            success: function(data) {
                $("#"+parentForm+"_opt_kursus").html(data);
                $("#"+parentForm+"_opt_kursus").attr('disabled', false);
            }
        });
    });

});

</script>
