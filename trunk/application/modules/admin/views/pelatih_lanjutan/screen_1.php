<div class="box box-solid box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Semak Maklumat Pelatih</h3>
    </div>
    <div class="box-body">
        <div class="text-danger">Nota: Sila Masukkan ID Pengenalan pemohon untuk semakan / pengesahan.</div>
        <p>Maklumat pelatih sedia ada yang belum mengikuti mana-mana kursus turut boleh dikemaskini dengan mengisi No MyKAD ke dalam ruangan yang disediakan.</p>
        <form class="form-inline" id="frm_screen_1" method="post" action="<?php echo site_url("admin/pelatih_lanjutan/check_nomykad"); ?>">
            <div class="form-group">
                <label for="opt_id_pengenalan">Jenis ID Pengenalan</label>
                <select class="form-control" name="opt_id_pengenalan" id="opt_id_pengenalan">
                    <option value="MyKAD">MyKAD</option>
                    <option value="PASSPORT">PASSPORT</option>
                    <option value="POLIS">POLIS</option>
                    <option value="TENTERA">TENTERA</option>
                </select>
                <input type="text" name="txt_MyKAD" id="txt_MyKAD" class="form-control id_pengenal" required="required">
            </div>
            <div class="row " style="margin-top: 10px;">
                <div class="col-md-6">
                    <button type="submit" name="btn_seterusnya" class="btn btn-primary btn-flat pull-right">Seterusnya</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $("#opt_id_pengenalan").change(function() {
        var val_opt_id_pengenalan = $("#opt_id_pengenalan").val();
        if (val_opt_id_pengenalan == "MyKAD") {
            $(".id_pengenal").attr("id", "txt_"+val_opt_id_pengenalan);
            $(".id_pengenal").attr("name", "txt_"+val_opt_id_pengenalan);
        }
        else if (val_opt_id_pengenalan == "PASSPORT") {
            $(".id_pengenal").attr("id", "txt_"+val_opt_id_pengenalan);
            $(".id_pengenal").attr("name", "txt_"+val_opt_id_pengenalan);
        }
        else if (val_opt_id_pengenalan == "POLIS") {
            $(".id_pengenal").attr("id", "txt_"+val_opt_id_pengenalan);
            $(".id_pengenal").attr("name", "txt_"+val_opt_id_pengenalan);
        }
        else if (val_opt_id_pengenalan == "TENTERA") {
            $(".id_pengenal").attr("id", "txt_"+val_opt_id_pengenalan);
            $(".id_pengenal").attr("name", "txt_"+val_opt_id_pengenalan);
        }
    });

    $("#frm_screen_1").validate({
        rules: {
            txt_MyKAD: {
                required: true,
                minlength: 12,
                maxlength: 12
            },
            txt_PASSPORT: {
                required: true,
                maxlength: 20
            },
            txt_POLIS: {
                required: true,
                maxlength: 20
            },
            txt_TENTERA: {
                required: true,
                maxlength: 20
            }
        },
        messages: {
            txt_MyKAD: {
                required: "MyKAD diperlukan.",
                maxlength: "MyKAD diperlukan dan Max 12 digit nombor",
                minlength: "MyKAD diperlukan dan Min 12 digit nombor"
            },
            txt_PASSPORT: {
                required: "PASSPORT diperlukan.",
                maxlength: "MyKAD diperlukan dan Max 20 digit nombor"
            },
            txt_POLIS: {
                required: "POLIST diperlukan.",
                maxlength: "MyKAD diperlukan dan Max 20 digit nombor"
            },
            txt_TENTERA: {
                required: "TENTERA diperlukan.",
                maxlength: "MyKAD diperlukan dan Max 20 digit nombor"
            }
        }
    });
});
</script>
