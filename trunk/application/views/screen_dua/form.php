<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (isset($row_pbp))
{
    $nama_penuh = ! empty($row_pbp) ? $row_pbp->nama_penuh : "";
    $no_mykad = ! empty($row_pbp) ? $row_pbp->no_mykad : "";
    $tarikh_lahir = ! empty($row_pbp) ? $row_pbp->tarikh_lahir : "";
    $kewarganegaraan = ! empty($row_pbp) ? $row_pbp->kewarganegaraan : "";
    $umur = ! empty($row_pbp) ? $row_pbp->umur : "";
    $no_telefon = ! empty($row_pbp) ? $row_pbp->no_telefon : "";
    $no_hp = ! empty($row_pbp) ? $row_pbp->no_hp : "";
    $alamat = ! empty($row_pbp) ? $row_pbp->alamat : "";
    $poskod = ! empty($row_pbp) ? $row_pbp->poskod : "";
    $emel = ! empty($row_pbp) ? $row_pbp->emel : "";
    $bangsa = ! empty($row_pbp) ? $row_pbp->bangsa : "";
    $etnik = ! empty($row_pbp) ? $row_pbp->etnik : "";
    $agama = ! empty($row_pbp) ? $row_pbp->agama : "";
    $taraf_perkahwinan = ! empty($row_pbp) ? $row_pbp->taraf_perkahwinan : "";
    $kategori_kelulusan = ! empty($row_pbp) ? $row_pbp->kategori_kelulusan : "";
    $kelulusan = ! empty($row_pbp) ? $row_pbp->kelulusan : "";
    $matlamat = ! empty($row_pbp) ? $row_pbp->matlamat : "";
    $kategori_pemohon = ! empty($row_pbp) ? $row_pbp->kategori_pemohon : "";
}
else
{
    $nama_penuh = "";
    $no_mykad = "";
    $tarikh_lahir = "";
    $kewarganegaraan = "";
    $umur = "";
    $no_telefon = "";
    $no_hp = "";
    $alamat = "";
    $poskod = "";
    $emel = "";
    $bangsa = "";
    $etnik = "";
    $agama = "";
    $taraf_perkahwinan = "";
    $kategori_kelulusan = "";
    $kelulusan = "";
    $matlamat = "";
    $kategori_pemohon = "";
}
?>

<div class="card">
    <h3 class="card-header">BUTIR - BUTIR PERIBADI</h3>
	<div class="card-block">
        <form method="post" action="<?php echo site_url("screen_dua/simpan"); ?>" id="frm_screen_dua">
            <div class="form-group">
                <label for="nama_penuh">Nama Penuh</label>
                <input type="text" class="form-control" name="nama_penuh" id="nama_penuh" placeholder="Nama Penuh" value="<?php echo $nama_penuh; ?>">
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="no_mykad">No. MyKAD</label>
                        <input type="text" class="form-control" name="no_mykad" id="no_mykad" placeholder="No. MyKAD" value="<?php echo $no_mykad; ?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="tarikh_lahir">Tarikh Lahir</label>
                        <input type="text" class="form-control" name="tarikh_lahir" id="tarikh_lahir" placeholder="Tarikh Lahir" value="<?php echo $tarikh_lahir; ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="kewarganegaraan">Kewarganegaraan</label>
                        <select class="form-control" name="kewarganegaraan" id="kewarganegaraan">
                            <option>Pilih Kewarganegaraan</option>
                            <?php
                            if ( ! empty($res_kewarganegaraan))
                            {
                                foreach ($res_kewarganegaraan as $val_kwrg)
                                {
                                    $sel_kwrg = $val_kwrg->id == $kewarganegaraan ? "selected=\"selected\"" : "";
                                    ?>
                                    <option value="<?php echo $val_kwrg->id; ?>" <?php echo $sel_kwrg; ?>><?php echo $val_kwrg->kewarganegaraan; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="umur">Umur</label>
                        <input type="text" class="form-control" name="umur" id="umur" placeholder="Umur" value="<?php echo $umur; ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="no_telefon">No Telefon</label>
                        <input type="text" class="form-control" name="no_telefon" id="no_telefon" placeholder="No Telefon" value="<?php echo $no_telefon; ?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="no_hp">No HP</label>
                        <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No HP" value="<?php echo $no_hp; ?>">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat Surat Menyurat</label>
                <textarea name="alamat" rows="4" cols="40" placeholder="Alamat Surat Menyurat" class="form-control"><?php echo $alamat; ?></textarea>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="poskod">Poskod</label>
                        <input type="text" class="form-control" name="poskod" id="poskod" placeholder="Poskod">
                        <input type="hidden" name="poskod_id" id="poskod_id" value="<?php echo $poskod; ?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="bandar">Bandar</label>
                        <input type="text" class="form-control" name="bandar" id="bandar" placeholder="Bandar">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="negeri">Negeri</label>
                        <select class="form-control" name="negeri" id="negeri">
                            <option>Pilih Negeri</option>
                            <?php
                            if ( ! empty($res_negeri))
                            {
                                foreach ($res_negeri as $val_negeri)
                                {
                                    ?>
                                    <option value="<?php echo $val_negeri->nama_negeri; ?>"><?php echo $val_negeri->nama_negeri; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $emel; ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="bangsa">Bangsa</label>
                        <select class="form-control" name="bangsa" id="bangsa">
                            <option>Pilih Bangsa</option>
                            <?php
                            if ( ! empty($res_bangsa))
                            {
                                foreach ($res_bangsa as $val_bangsa)
                                {
                                    $sel_bangsa = $val_bangsa->id == $bangsa ? "selected=\"selected\"" : "";
                                    ?>
                                    <option value="<?php echo $val_bangsa->id; ?>" <?php echo $sel_bangsa; ?>><?php echo $val_bangsa->bangsa; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="etnik">Etnik</label>
                        <select class="form-control" name="etnik" id="etnik">
                            <option>Pilih Etnik</option>
                            <?php
                            if ( ! empty($res_etnik))
                            {
                                foreach ($res_etnik as $val_etnik)
                                {
                                    $sel_etnik = $val_etnik->id == $etnik ? "selected=\"selected\"": "";
                                    ?>
                                    <option value="<?php echo $val_etnik->id; ?>" <?php echo $sel_etnik; ?>><?php echo $val_etnik->etnik; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <select class="form-control" name="agama" id="agama">
                            <option>Pilih agama</option>
                            <?php
                            if ( ! empty($res_agama))
                            {
                                foreach ($res_agama as $val_agama)
                                {
                                    $sel_agama = $val_agama->id == $agama ? "selected=\"selected\"" : "";
                                    ?>
                                    <option value="<?php echo $val_agama->id; ?>" <?php echo $sel_agama; ?>><?php echo $val_agama->agama; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="taraf_perkahwinan">Taraf Perkahwinan</label>
                        <select class="form-control" name="taraf_perkahwinan" id="taraf_perkahwinan">
                            <option>Pilih taraf_perkawinan</option>
                            <?php
                            if ( ! empty($res_taraf_perkahwinan))
                            {
                                foreach ($res_taraf_perkahwinan as $val_tp)
                                {
                                    $sel_tp = $val_tp->id == $taraf_perkahwinan ? "selected=\"selected\"" : "";
                                    ?>
                                    <option value="<?php echo $val_tp->id; ?>" <?php echo $sel_tp; ?>><?php echo $val_tp->taraf_perkahwinan; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Kategori Kelulusan</label>
                        <div class="form-check">
                            <?php
                            if ($kategori_kelulusan == "Akademi")
                            {
                                ?>
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="kategori_kelulusan" id="kategori_kelulusan_a" value="Akademi" checked="checked">
                                    Akademi
                                </label>&nbsp;&nbsp;
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="kategori_kelulusan" id="kategori_kelulusan_k" value="Kemahiran">
                                    Kemahiran
                                </label>
                                <?php
                            }
                            elseif ($kategori_kelulusan == "Kemahiran")
                            {
                                ?>
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="kategori_kelulusan" id="kategori_kelulusan_a" value="Akademi">
                                    Akademi
                                </label>&nbsp;&nbsp;
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="kategori_kelulusan" id="kategori_kelulusan_k" value="Kemahiran" checked="checked">
                                    Kemahiran
                                </label>
                                <?php
                            }
                            else
                            {
                                ?>
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="kategori_kelulusan" id="kategori_kelulusan_a" value="Akademi">
                                    Akademi
                                </label>&nbsp;&nbsp;
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="kategori_kelulusan" id="kategori_kelulusan_k" value="Kemahiran">
                                    Kemahiran
                                </label>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="kelulusan">Kelulusan</label>
                        <select class="form-control" name="kelulusan" id="kelulusan">
                            <option>Pilih kelulusan</option>
                            <?php
                            if ( ! empty($res_kelulusan))
                            {
                                foreach ($res_kelulusan as $val_kelulusan)
                                {
                                    $sel_kelulusan = $val_kelulusan->id == $kelulusan ? "selected=\"selected\"" : "";
                                    ?>
                                    <option value="<?php echo $val_kelulusan->id; ?>" <?php echo $sel_kelulusan; ?>><?php echo $val_kelulusan->kelulusan; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Matlamat Selepas Kursus</label>
                        <div class="form-check">
                            <?php
                            $arr_matlamat["Melanjutkan Pelajaran"] = "Melanjutkan Pelajaran";
                            $arr_matlamat["Bekerja"] = "Bekerja";
                            $arr_matlamat["Berniaga Sendiri"] = "Berniaga Sendiri";

                            foreach ($arr_matlamat as $key_mat => $val_mat)
                            {
                                $sel_mat = $key_mat == $matlamat ? "checked=\"checked\"" : "";
                                ?>
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="matlamat_selepas_kursus" id="matlamat_selepas_kursus" value="<?php echo $key_mat; ?>" <?php echo $sel_mat; ?>>
                                    <?php echo $val_mat; ?>
                                </label>&nbsp;&nbsp;
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="kategori_pemohon">Kategori Pemohon</label>
                        <select class="form-control" name="kategori_pemohon" id="kategori_pemohon">
                            <option>Pilih Kategori Pemohon</option>
                            <?php
                            if ( ! empty($res_kategori_pemohon))
                            {
                                foreach ($res_kategori_pemohon as $val_kp)
                                {
                                    $sel_kp = $val_kp->id == $kategori_pemohon ? "selected=\"selected\"" : "";
                                    ?>
                                    <option value="<?php echo $val_kp->id; ?>" <?php echo $sel_kp; ?>><?php echo $val_kp->kategori_pemohon; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="float-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mSh" id="simpan">Simpan & Hantar</button>
                <button type="submit" name="btn_simpan" value="simpan_seterusnya" class="btn btn-primary">Simpan & Seterusnya</button>
            </div>

            <!-- nampilin modal notifikasi Simpan Hantar -->
            <div class="modal fade" id="mSh" tabindex="-1" role="dialog" aria-labelledby="ModalSh" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Simpan Hantar Butir Peribadi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                Butir Peribadi yang telah diisi akan disimpan, namun anda perlu melengkapkan keseluruhan borang permohonan ini sebelum tarikh tamat permohonan iaitu [dd/mm/yyyy fetch from setting_tarikh_permohonan.enddate where year=date(Y)].
                            </p>
                            <p>
                                Satu notifikasi emel akan dihantar ke <span class="badge badge-info" id="str_emel1"></span> berserta nombor rujukan permohonan. Nombor rujukan permohonan ini akan digunakan untuk mengemaskini borang permohonan dan menyemak status permohonan kelak.
                            </p>
                            <p>
                                Adakah anda boleh log masuk emel <span class="badge badge-info" id="str_emel2"></span>? Jika ya, anda boleh menyimpan borang permohonan ini dan mengemaskininya kemudian. klik ‘OK’ untuk menyimpan borang
                            </p>
                            <p>
                                Jika tidak, klik ‘Kembali’ untuk mengemaskini borang permohonan.
                            </p>
                            <p>
                                <label class="form-check-label">
                                    <input type="checkbox" id="chk_agree" class="form-check-input"> I Agree
                                </label>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="btn_simpan" value="simpan_hantar" class="btn btn-primary" id="btn_ok">OK</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal notifikasi simpan hantar -->
        </form>

        <!-- nampilin modal email -->
        <div class="modal fade" id="mEmail" tabindex="-1" role="dialog" aria-labelledby="ModalEmail" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Nombor Rujukan Permohonan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo site_url("screen_dua/proses_no_rujuk"); ?>" method="post" id="frm_no_rujuk">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="no_rujuk" class="form-control-label">No Rujukan Permohonan:</label>
                                <input type="text" class="form-control" name="no_rujuk" id="no_rujuk" autofocus="autofocus">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="check" value="check" class="btn btn-primary" id="btn_check">Check</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end modal email -->

        <!-- nampilin modal notifikasi no rujukan permohonan salah -->
        <div class="modal fade" id="mRjp" tabindex="-1" role="dialog" aria-labelledby="ModalRjp" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Nombor Rujukan Permohonan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Emel anda telah didaftarkan. Sila hubungi [*mailto: gspelhelpdesk@giatmara.edu.my] untuk bantuan.</p>
                        <p>*email subject: GSPel Error P001</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal notifikasi no rujukan permohonan salah -->
	</div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        // show or hide option kelulusan
        $("#kelulusan").hide();
        $("#kategori_kelulusan_k").click(function(){
            $("#kelulusan").hide();
        });
        $("#kategori_kelulusan_a").click(function(){
            $("#kelulusan").show();
        });

        // datepicker
        $('#tarikh_lahir').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });

        // menghhitung umur
        $("#tarikh_lahir").change(function(){
            var t = $("#tarikh_lahir").val();
            var n = t.substring(0,4);
            var now = "<?php echo date("Y"); ?>";
            var umur = now-n;
            $("#umur").val(umur);
        });

        // cek email
        $("#email").blur(function(){
            var txt_email = $("#email").val();
            $.ajax({
                // dataType: 'json',
                data: {email : txt_email},
                url: "<?php echo site_url("screen_dua/ajax_email"); ?>",
                type: "POST",
                success : function(data) {
                    if (data == 1)
                    {
                        $("#mEmail").modal({show: true, keyboard: true});
                        // $("#no_rujuk").focus();
                    }
                }
            });
        });

        // ngisi field bandar dan negeri
        $("#poskod").change(function(){
            var poskodKet = $("#poskod").val();
            $.ajax({
                dataType: 'json',
                data: {poskod_ket : poskodKet},
                url: "<?php echo site_url("screen_dua/ajax_poskod"); ?>",
                type: "POST",
                success : function(data) {
                    $("#bandar").val(data.bandar);
                    $("#negeri").val(data.negeri);
                    $("#poskod_id").val(data.id_poskod);
                }
            });
        });

        // tombol simpan hantar diklik, kirim email
        $("#simpan").click(function(event){
            event.preventDefault();

            var fld_nama = $("#nama_penuh");
            var fld_no_mykad = $("#no_mykad");
            var fld_emel = $("#email").val();

            $("#str_emel1").html(fld_emel);
            $("#str_emel2").html(fld_emel);

            $.ajax({
                data: $("#frm_screen_dua").serialize(),
                url: "<?php echo site_url("screen_dua/ajax_krm_email"); ?>",
                type: "POST",
                success: function(data){
                }
            })
        });

        // disable button OK di modal
        $("#btn_ok").attr("disabled", true);

        // jika check list I Agree checked maka enabled button OK
        $("#chk_agree").click(function(){
            $("#btn_ok").attr("disabled", !this.checked)
        });

        // jika id poskod ada
        $("#poskod_id").blur(function(){
            var poskodId = $("#poskod_id").val();
            $.ajax({
                dataType: 'json',
                data: {poskod_id : poskodId},
                url: "<?php echo site_url("screen_dua/ajax_poskod"); ?>",
                type: "POST",
                success : function(data) {
                    $("#bandar").val(data.bandar);
                    $("#negeri").val(data.negeri);
                    $("#poskod_id").val(data.id_poskod);
                }
            });
        });
    });
</script>
