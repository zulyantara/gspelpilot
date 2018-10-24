<div class="box box-primary box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Tetapan Giatmara dan Kursus</h3>
    </div>
    <div class="box-body">
        <form class="form-horizontal">
            <div class="form-group">
                <label for="opt_negeri" class="control-label col-sm-2">NEGERI</label>
                <div class="col-sm-10">
                    <select class="form-control" name="opt_negeri" id="opt_negeri">
                          <option value="" selected="selected">Sila Pilih</option>
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
                          <option value="" selected="selected">Sila Pilih</option>
                        <option value="<?php echo $row_giatmara->id; ?>"><?php echo $row_giatmara->nama_giatmara; ?></option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="opt_kategori" class="control-label col-sm-2">KATEGORI</label>
                <div class="col-sm-10">
                    <select class="form-control" name="opt_kategori" id="opt_kategori">
                        <option>Sila Pilih</option>
                        <option value="latihan_lanjutan">Latihan Lanjutan</option>
                        <option value="rintis_niaga">Rintis Niaga</option>
                        <option value="program">Program</option>
                        <option value="pertandingan">Pertandingan</option>
                        <option value="program_khas">Program Khas</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" name="btn_cari" id="btn_cari">Cari</button>
                </div>
            </div>
        </form>
    </div>
</div>

<form class="form-horizontal">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">PERINCIAN SARINGAN</h3>
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
                    <th>NO TELEFON BIMBIT</th>
                    <th>KATEGORI</th>
                    <th>PUSAT</th>
                    <th>KURSUS</th>
                    <th>TARIKH MOHON</th>
                    <th>TINDAKAN</th>
                </tr>
                 </thead>
    <tbody>
        <tr>
            <td>data-1</td>
            <td>data-2</td>
            <td>data-3</td>
            <td>data-1</td>
            <td>data-2</td>
            <td>data-3</td>
            <td>data-1</td>
            <td>data-2</td>
            <td>data-3</td>
            <td>data-1</td>
          
        </tr>
    </tbody>
            </table>
        </div>
    </div>
    </div>
</form>

<script type="text/javascript">
$(document).ready(function(){
    $("#tbl_senarai_kursus_lanjutan").DataTable();
});


var defOption ='<option value=""> Sila Pilih</option>';
    $(document).ready(function() {
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
