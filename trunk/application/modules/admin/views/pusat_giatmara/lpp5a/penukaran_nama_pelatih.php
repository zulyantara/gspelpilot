<style type="text/css">

    .panel-custom-horrible-red {
        border-color:  #000063 ;
    }
    .panel-custom-horrible-red > .panel-heading {
        background:  #000063 ; 
        color:  #000063 ;
        border-color:  #000063  ;
    }
</style>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">LPP5A</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo site_url('admin/Pusat_giatmara/pengurusan_pelatih'); ?>" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleNamaPenuh">Nama Penuh</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="nama_baru" placeholder="Nama Baru" required="true">
                        </div>
                        <div class="form-group">
                            <label for="exampleNamaAsal">Nama Asal</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="nama_asal" value="<?php echo $namaAsal; ?>" readonly="true">
                            <input type="hidden" name="id_pelatih" value="<?php echo $idPelatih; ?>">
                            <input type="hidden" name="kursus" value="<?php echo $idKursus; ?>">
                            <input type="hidden" name="jeniskursus" value="<?php echo $katPelatih; ?>">
                            <input type="hidden" name="intake" value="<?php echo $idIntake; ?>">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="action" value="hantar" class="btn btn-primary">Hantar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>