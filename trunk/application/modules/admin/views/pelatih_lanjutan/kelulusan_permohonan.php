<div class="box box-primary box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Tetapan GIATMARA Dan Kursus</h3>
    </div>
    <div class="box-body">
       <form class="form-horizontal" action="<?php echo site_url('admin/Pelatih_lanjutan/kelulusan_permohonan');?>" id="myform" name="myform" method="post">
            <div class="form-group">
                <label for="opt_negeri" class="control-label col-sm-2">NEGERI</label>
                <div class="col-sm-10">
                    <select class="form-control" name="opt_negeri" id="opt_negeri">
                        <option value="" selected="selected">
                            <?php
                            if(isset($negeri))
                            {
                                foreach ($negeri as $r)
                                {
                                    echo $r->nama_negeri;
                                }
                            }
                            else
                            {
                                echo "Sila Pilih";
                            }
                            ?>
                        </option>
                        <?php
                        if($res_negeri !== NULL)
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
                <label for="opt_giatmara" class="control-label col-sm-2">GIATMARA</label>
                <div class="col-sm-10">
                    <select class="form-control" name="opt_giatmara" id="opt_giatmara">
                        <option value="" selected="selected">
                            <?php
                            if(isset($giatmara))
                            {
                                foreach ($giatmara as $r)
                                {
                                    echo $r->nama_giatmara;
                                }
                            }
                            else
                            {
                                echo "Sila Pilih";
                            }
                            ?>
                        </option>
                        <option value="<?php echo $row_giatmara->id; ?>"><?php echo $row_giatmara->nama_giatmara; ?></option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" name="submit" id="submit">Cari</button>
                </div>
            </div>
        </form>
    </div>
</div>

<form class="form-horizontal">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Senarai Permohonan Kursus Lanjutan</h3>
        </div>
        <div class="box-body">
            <div class ="table table-responsive">
                <table class="table" id="tbl_senarai_kursus_lanjutan">
                    <thead>
                        <tr>
                            <th>BIL</th>
                            <th>NAMA</th>
                            <th>NO MYKAD</th>
                            <th>NO PELATIH</th>
                            <th>NO HP</th>
                            <th>PUSAT</th>
                            <th>KURSUS</th>
                            <th>TARIKH MOHON</th>
                            <th>TINDAKAN</th>
                            <!-- <th>DEBUG</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ni=1;
                        $no =0;
                        if($row_data)
                        {
                            foreach($row_data as $r)
                            {
                                ?>
                                <tr>
                                    <td><?php echo $ni; ?></td>
                                    <td><?php echo $r->nama_penuh; ?></td>
                                    <td><?php echo $r->no_mykad; ?></td>
                                    <td><?php echo $r->no_pelatih; ?></td>
                                    <td><?php echo $r->no_hp; ?></td>
                                    <td><?php echo $r->nama_giatmara; ?></td>
                                    <td><?php echo $r->nama_kursus;?></td>
                                    <td><?php echo date("d-m-Y", strtotime($r->tarikh_mohon)); ?></td>
                                    <td>
                                        <a href="<?php echo site_url('admin/pelatih_lanjutan/pengesahan/'.$r->id_permohonan."/".$r->id_permohonan_kursus_lpp09."/".$r->id_giatmara."/permohonan");?>" class="btn btn-primary btn-sm" type="button" name="action">LULUS</a>
                                        <a href="<?php echo site_url('admin/pelatih_lanjutan/buang_kelulusan/'.$r->id_permohonan."/".$r->id_permohonan_kursus_lpp09."/".$r->id_giatmara);?>" class="btn btn-primary btn-sm update" type="button" name="action" >BUANG</a>
                                    </td>
                                    <!-- <td><?php echo "crsid:6".'</br>'."enrstid:1"; ?></td> -->
                                </tr>
                                <?php
                                $no++;
                                $ni++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})

$(document).ready(function(){
    $("#tbl_senarai_kursus_lanjutan").DataTable();

    $('.update').click(function() {
        return confirm("Adakah anda pasti untuk menolak permohonan ini?");
    });

    var defOption ='<option value=""> Sila Pilih</option>';

    $('select[name="opt_negeri"]').on('change', function() {
        var BASE_URL = "<?php echo base_url();?>";
       // $('#giatmara').html(defOption );
        var stateID = $(this).val();
        var e = document.getElementById("opt_giatmara");
        if(stateID) {
            $.ajax({
                url: '<?php echo base_url();?>admin/Pelatih_lanjutan/ajaxgiat/'+stateID,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('select[name="opt_giatmara"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="opt_giatmara"]').append('<option value="'+ value.id +'">'+ value.nama_giatmara +'</option>');
                    });
                }
            });
            // console.log(stateID);
        }else{
        //  $('select[name="giatmara"]').empty();
        console.log(stateID);
        }
    });
});
</script>
