<div class="card">
    <h3 class="card-header">MAKLUMAT IBUBAPA / PENJAGA / WARIS</h3>
    <div class="card-block">
        <form method="post" action="<?php echo site_url("screen_lima/simpan"); ?>">
            <div class="form-group">
                <label for="maklumat">Maklumat</label>
                <select class="form-control" name="maklumat" id="maklumat">
                    <option value="0">Sila Pilih</option>
                    <option value="1">Ibu bapa</option>
                    <option value="2">Penjaga/Waris</option>
                </select>
            </div>



            <div class="container" id="penjagacontainer" style="display:none">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nama_penuh">Nama Penuh</label>
                            <input type="text" class="form-control" name="a_nama_penuh" id="a_nama_penuh" placeholder="Nama Penuh" value="<?php //echo $nama_penuh;                          ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="a_kategori_penjaga">Hubungan</label>
                            <select class="form-control" name="a_hubungan" id="a_hubungan">
                                <option>Sila Pilih</option>
                                <?php
                                if (!empty($ref_hubungan)) {
                                    foreach ($ref_hubungan as $val_kwrg) {
                                        $sel_kwrg = $val_kwrg->id == $a_hubungan ? "selected=\"selected\"" : "";
                                        ?>
                                        <option value="<?php echo $val_kwrg->id; ?>" <?php echo $sel_kwrg; ?>><?php echo $val_kwrg->hubungan; ?></option>
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
                            <label>Jenis Pengenalan</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="a_jenis_pengenalan" id="a_jenis_pengenalan_a" value="Awam" checked="checked">
                                    Awam
                                </label>&nbsp;&nbsp;
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="a_jenis_pengenalan" id="a_jenis_pengenalan_t" value="Tentera">
                                    Tentera
                                </label>
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="a_jenis_pengenalan" id="a_jenis_pengenalan_p" value="Polis">
                                    Polis
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label id="no_mykad">No. MyKAD</label>
                            <input type="text" class="form-control" name="a_mykad" id="a_mykad" placeholder="No. MyKAD" value="<?php //echo $no_mykad;                   ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="kewarganegaraan">Kewarganegaraan</label>
                            <select class="form-control" name="a_kewarganegaraan" id="a_kewarganegaraan">
                                <option>Pilih Kewarganegaraan</option>
                                <?php
                                if (!empty($res_kewarganegaraan)) {
                                    foreach ($res_kewarganegaraan as $val_kwrg) {
                                        $sel_kwrg = $val_kwrg->id == $b_kewarganegaraan ? "selected=\"selected\"" : "";
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
                            <label for="a_kategori_penjaga">Kategori Penjaga</label>
                            <select class="form-control" name="a_kategori_penjaga" id="a_kategori_penjaga">
                                <option>Pilih Kategori Penjaga</option>
                                <?php
                                if (!empty($ref_kategori_penjaga)) {
                                    foreach ($ref_kategori_penjaga as $val_kwrg) {
                                        $sel_kwrg = $val_kwrg->id == $b_kategori_penjaga ? "selected=\"selected\"" : "";
                                        ?>
                                        <option value="<?php echo $val_kwrg->id; ?>" <?php echo $sel_kwrg; ?>><?php echo $val_kwrg->kategori_penjaga; ?></option>
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
                            <label for="no_telefon">No. Tel (cth: 0389008989)</label>
                            <input type="text" class="form-control" name="a_no_tel" id="a_no_tel" placeholder="No. Tel" value="<?php //echo $no_telefon;              ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="no_hp">No HP (cth: 01289009090)</label>
                            <input type="text" class="form-control" name="a_no_hp" id="a_no_hp" placeholder="No HP" value="<?php //echo $no_hp;              ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select class="form-control" name="a_agama" id="a_agama">
                                <option>Pilih agama</option>
                                <?php
                                if (!empty($res_agama)) {
                                    foreach ($res_agama as $val_agama) {
                                        $sel_agama = $val_agama->id == $b_agama ? "selected=\"selected\"" : "";
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
                            <label for="etnik">Etnik</label>
                            <select class="form-control" name="a_etnik" id="a_etnik">
                                <option>Pilih Etnik</option>
                                <?php
                                if (!empty($res_etnik)) {
                                    foreach ($res_etnik as $val_etnik) {
                                        $sel_etnik = $val_etnik->id == $b_etnik ? "selected=\"selected\"" : "";
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
                            <label for="bangsa">Bangsa</label>
                            <select class="form-control" name="a_bangsa" id="a_bangsa">
                                <option>Pilih Bangsa</option>
                                <?php
                                if (!empty($res_bangsa)) {
                                    foreach ($res_bangsa as $val_bangsa) {
                                        $sel_bangsa = $val_bangsa->id == $b_bangsa ? "selected=\"selected\"" : "";
                                        ?>
                                        <option value="<?php echo $val_bangsa->id; ?>" <?php echo $sel_bangsa; ?>><?php echo $val_bangsa->bangsa; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="a_alamat">Alamat Tetap</label>
                    <textarea name="a_alamat" id="a_alamat" rows="4" cols="40" placeholder="Alamat Tetap" class="form-control"><?php //echo $alamat;          ?></textarea>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="a_poskod">Poskod</label>
                            <input type="text" class="form-control" name="a_poskod" id="a_poskod" placeholder="Poskod">
                            <input type="hidden" name="a_poskod_id" id="a_poskod_id" value="<?php //echo $poskod;        ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="a_bandar">Bandar</label>
                            <input type="text" class="form-control" name="a_bandar" id="a_bandar" placeholder="Bandar">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="a_negeri">Negeri</label>
                            <select class="form-control" name="a_negeri" id="a_negeri">
                                <option>Pilih Negeri</option>
                                <?php
                                if (!empty($res_negeri)) {
                                    foreach ($res_negeri as $val_negeri) {
                                        ?>
                                        <option value="<?php echo $val_negeri->nama_negeri; ?>"><?php echo $val_negeri->nama_negeri; ?></option>
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
                            <label for="a_pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" name="a_pekerjaan" id="a_pekerjaan" placeholder="Pekerjaan" value="<?php //echo $no_telefon;              ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="a_pendapatan">Pendapatan (RM)</label>
                            <select class="form-control" name="a_pendapatan" id="a_pendapatan">
                                <option>Pilih Pendapatan</option>
                                <?php
                                if (!empty($res_pendapatan)) {
                                    foreach ($res_pendapatan as $val_negeri) {
                                        ?>
                                        <option value="<?php echo $val_negeri->id; ?>"><?php echo $val_negeri->pendapatan; ?></option>
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
                            <label for="a_majikan">Majikan</label>
                            <input type="text" class="form-control" name="a_majikan" id="a_majikan" placeholder="Majikan" value="<?php //echo $no_telefon;              ?>">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="a_majikan">No. Tel Pejabat</label>
                            <input type="text" class="form-control" name="a_no_tel_pejabat" id="a_no_tel_pejabat" placeholder="No. Tel Pejabat" value="<?php //echo $no_telefon;              ?>">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="a_majikan">Samb</label>
                            <input type="text" class="form-control" name="a_samb" id="a_samb" placeholder="Samb" value="<?php //echo $no_telefon;              ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="a_alamat_pejabat">Alamat Pejabat</label>
                    <textarea name="a_alamat_pejabat" rows="4" cols="40" placeholder="Alamat Pejabat" class="form-control"><?php //echo $alamat;          ?></textarea>
                </div>
            </div>

            <div class="float-right">
                <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mSh" id="simpan">Simpan & Hantar</button>-->
                <button type="submit" name="btn_simpan" value="simpan_seterusnya" class="btn btn-primary">Simpan & Seterusnya</button>
            </div>
        </form>
    </div>
</div>
<script>
    function copyalamat() {
        $("#c_alamat").val($("#b_alamat").val());
        $("#c_poskod").val($("#b_poskod").val());
        $("#c_poskod_id").val($("#b_poskod_id").val());
        $("#c_bandar").val($("#b_bandar").val());
        $("#c_negeri").val($("#b_negeri").val());
    }
    // ngisi field bandar dan negeri bapa
    $("#b_poskod").blur(function () {
        var poskodKet = $("#b_poskod").val();
        $.ajax({
            dataType: 'json',
            data: {poskod_ket: poskodKet},
            url: "<?php echo site_url("screen_lima/ajax_poskod"); ?>",
            type: "POST",
            success: function (data) {
                $("#b_bandar").val(data.bandar);
                $("#b_negeri").val(data.negeri).change();
                $("#b_poskod_id").val(data.id_poskod);
            }
        });
    });

    // ngisi field bandar dan negeri ibu
    $("#c_poskod").blur(function () {
        var poskodKet = $("#c_poskod").val();
        $.ajax({
            dataType: 'json',
            data: {poskod_ket: poskodKet},
            url: "<?php echo site_url("screen_lima/ajax_poskod"); ?>",
            type: "POST",
            success: function (data) {
                $("#c_bandar").val(data.bandar);
                $("#c_negeri").val(data.negeri).change();
                $("#c_poskod_id").val(data.id_poskod);
            }
        });
    });

    $("#b_jenis_pengenalan_a").click(function () {
        document.getElementById('no_mykad').innerHTML = 'No. MyKAD';
        $('#b_mykad').attr('placeholder', 'No. MyKAD');
    });
    $("#b_jenis_pengenalan_t").click(function () {
        document.getElementById('no_mykad').innerHTML = 'No. Tentera';
        $('#b_mykad').attr('placeholder', 'No. Tentera');
    });
    $("#b_jenis_pengenalan_p").click(function () {
        document.getElementById('no_mykad').innerHTML = 'No. Polis';
        $('#b_mykad').attr('placeholder', 'No. Polis');
    });

    $("#c_jenis_pengenalan_a").click(function () {
        document.getElementById('c_no_mykad').innerHTML = 'No. MyKAD';
        $('#c_mykad').attr('placeholder', 'No. MyKAD');
    });
    $("#c_jenis_pengenalan_t").click(function () {
        document.getElementById('c_no_mykad').innerHTML = 'No. Tentera';
        $('#c_mykad').attr('placeholder', 'No. Tentera');
    });
    $("#c_jenis_pengenalan_p").click(function () {
        document.getElementById('c_no_mykad').innerHTML = 'No. Polis';
        $('#c_mykad').attr('placeholder', 'No. Polis');
    });

    // perubahan maklumat
    $("#maklumat").change(function () {
        $("#ibubapacontainer").hide();
        $("#penjagacontainer").hide();
        if (this.value == 1) {
            $("#ibubapacontainer").show();
        } else if (this.value == 2) {
            $("#penjagacontainer").show();
        }
    });
</script>
