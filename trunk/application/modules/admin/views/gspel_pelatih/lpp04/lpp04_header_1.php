<div class="row"><!-- lr -->
    <div class="col-md-12">

        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Carian</h3>
            </div>

            <div class="box-body">
                <form class="form-horizontal" action="<?php echo site_url("admin/lpp04/".$url); ?>" method="post">
                    <div class="form-group">
                        <label for="opt_negeri" class="col-sm-4 control-label">Nama / No. MyKad / No. Pelatih</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="qkeyword" id="qkeyword" value="<?php echo $this->input->post('qkeyword');?>" >
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" name="btn_tetapkan" value="tetapkan">Paparkan</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $("#opt_negeri").change(function(){
        var val_negeri = $("#opt_negeri").val();
        $.ajax({
            // dataType: 'json',
            data: {txt_negeri : val_negeri},
            url: "<?php echo site_url("admin/lpp04/giatmara_ajax"); ?>",
            type: "POST",
            success : function(data) {
                $("#opt_giatmara").html(data);
            }
        });
    });

    $("#opt_giatmara").change(function(){
        var val_giatmara = $("#opt_giatmara").val();
        $.ajax({
            // dataType: 'json',
            data: {txt_giatmara : val_giatmara},
            url: "<?php echo site_url("admin/lpp04/kursus_ajax"); ?>",
            type: "POST",
            success : function(data) {
                $("#opt_kursus").html(data);
            }
        });
    });

    $("#opt_kursus").change(function(){
        var val_giatmara = $("#opt_giatmara").val();
        var val_kursus = $("#opt_kursus").val();
        $.ajax({
            // dataType: 'json',
            data: {txt_kursus : val_kursus, txt_giatmara : val_giatmara},
            url: "<?php echo site_url("admin/lpp04/intake_ajax"); ?>",
            type: "POST",
            success : function(data) {
                $("#opt_sesi_kemasukan").html(data);
            }
        });
    });
});
</script>
