<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Carian Staf</h3>
    </div>
    <div class="box-body">
        <form class="form-horizontal" action="<?php echo site_url("admin/gspel_manusia/tugas"); ?>" method="post">
            <div class="form-group">
                <label for="txt_mykad" class="col-sm-2 control-label">No. MyKAD</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <input type="text" name="txt_mykad" id="txt_mykad" class="form-control">
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
                <div class="col-sm-offset-2 col-sm-10">
                    <span class="text-danger clearfix"><b>* Buat Carian Untuk Memaparkan Senarai Pengguna</b></span>
                    <button type="submit" name="btn_cari" id="btn_cari" value="cari" class="btn btn-primary">Carian</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Carian Staf</h3>
    </div>
    <div class="box-body">
        <table class="table" id="tbl_staf">
            <thead>
                <tr>
                    <th>Bil</th>
                    <th>Nama</th>
                    <th>No MyKAD</th>
                    <th>No Telefon</th>
                    <th>Emel</th>
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
                            ?>
                            <tr>
                                <td><?php echo $no += 1; ?></td>
                                <td><a href="<?php echo site_url("admin/gspel_manusia/pangku_tugas/".$val->id); ?>"><?php echo $val->nama; ?></a></td>
                                <td><?php echo $val->no_mykad; ?></td>
                                <td><?php echo $val->no_tel; ?></td>
                                <td><?php echo $val->emel; ?></td>
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

<script type="text/javascript">
$(document).ready(function(){
    $("#tbl_staf").DataTable();
});
</script>
