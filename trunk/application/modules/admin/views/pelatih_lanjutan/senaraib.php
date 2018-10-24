<div class="box box-primary box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Tetapan GIATMARA dan Kursus</h3>
    </div>
    <div class="box-body">
       <form class="form-horizontal" action="<?php echo site_url('admin/Pelatih_lanjutan/pendaftaranb');?>" id="myform" name="myform" method="post">
            <div class="form-group">
                <label for="opt_negeri" class="control-label col-sm-2">NEGERI</label>
                <div class="col-sm-10">
                    <select class="form-control" name="opt_negeri" id="opt_negeri">
                          <option value="" selected="selected">
                              <?php if(isset($negeri)){
                                foreach ($negeri as $r) {
                                    echo $r->nama_negeri;
                                }
                              }else{
                                echo "Sila Pilih";
                              }?>
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
                          <?php if(isset($giatmara)){
                                foreach ($giatmara as $r) {
                                    echo $r->nama_giatmara;
                                }
                              }else{
                                echo "Sila Pilih";
                              }?>
                          </option>
                        <option value="<?php echo $row_giatmara->id; ?>"><?php echo $row_giatmara->nama_giatmara; ?></option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="opt_kategori" class="control-label col-sm-2">KATEGORI</label>
                <div class="col-sm-10">
                    <select class="form-control" name="opt_kategori" id="opt_kategori">
                        <option value="" selected="selected">
                              <?php if(isset($kategori)){
                                if ($kategori =="LL") {
                                    echo "Latihan Lanjutan";
                                } 
                                else if($kategori =="RN") {
                                    echo "Rintis Niaga";
                                } 
                                
                                 else if($kategori =="PP") {
                                    echo "Program Pertandingan";
                                } 
                                 else  {
                                    echo "Program Khas";}
                              }else{
                                echo "Sila Pilih";
                              }?>
                          </option>
                      
                         <option value="RN">Rintis Niaga</option>
                        <option value="PP">Program Pertandingan</option>
                        <option value="PK">Program Khas</option>
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

<!-- <form class="form-horizontal" action="<?php //echo site_url('admin/Pelatih_lanjutan/savependaftaranb');?>" id="myform" name="myform" method="post"> -->
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Senarai Permohonan </h3>
        </div>
        <div class="box-body">
             <div class ="table table-responsive">
            <table class="table" id="tbl_senarai_kursus_lanjutan">
                 <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>NO KP</th>
                    <th>NAMA BANK</th>
                     <th>NO AKAUN</th>
                    <th>KELAYAKAN ELAUN</th>
                    <th>BULAN MULA ELAUN</th>
                    <th>BULAN TAMAT ELAUN</th>
                    
                   
                </tr>
                 </thead>
    <tbody>
        <?php
         // print_r($row_data_bank);die();
                                $ni=1;
                                $no =0;
                                if($row_data)
                                foreach($row_data as $r) : ?>
        <tr>
            <td><?php echo $ni; ?> <input type="hidden" name="no" value="<?php echo $no; ?>"></td>
            <td><input type="text" name="nama[<?php echo $no; ?>]" value="<?php echo $r->nama_penuh; ?>"></td>
            <td><input type="text" name="mykad[<?php echo $no; ?>]" value="<?php echo $r->no_mykad; ?>"></td>
            <td><?php if ($r->layak_elaun == 1) { ?>
            <select name="bank[<?php echo $no; ?>]">
                <option value="<?php echo $r->idbank; ?>" selected><?php echo $r->nama_bank; ?></option>
                  <?php foreach($row_data_bank as $p) : ?>
                    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>

                <?php endforeach; ?>
            </select>
           <?php  } else { ?>
           <input type="hidden" name="bank[<?php echo $no; ?>]" value="0">
             
           <?php  } ?>
            </td>
            <td><?php if ($r->layak_elaun == 1) { ?>
            <input type="text" name="akun[<?php echo $no; ?>]" value="<?php echo $r->no_akaun; ?>">
           <?php  } else { ?>
             <input type="hidden" name="akun[<?php echo $no; ?>]" value="0">
           <?php  } ?>
            </td>
            <td><?php if ($r->layak_elaun == 1) {
                echo "LAYAK"; 
            } else {
                echo "TIDAK LAYAK"; 
            }
            
            ?></td>
           
              <td><?php echo $r->tarikh_mula_elauan; ?></td>
               <td><?php echo $r->tarikh_tamat_elaun; ?></td>
        <input type="hidden" name="idgiatmara[<?php echo $no; ?>]" value="<?php echo $r->idgiatmara; ?>">
         <input type="hidden" name="layak[<?php echo $no; ?>]" value="<?php echo $r->layak_elaun; ?>">
         <input type="hidden" name="mula[<?php echo $no; ?>]" value="<?php echo $r->tarikh_mula_elauan; ?>">
         <input type="hidden" name="tamat[<?php echo $no; ?>]" value="<?php echo $r->tarikh_tamat_elaun; ?>">
        <!--  <input type="hidden" name="bank2[<?php //echo $no; ?>]" value="<?php //echo $r->idbank; ?>"> -->
        </tr>
        <?php    
                                    $no++;
                                    $ni++;
                                    endforeach; ?>
    </tbody>
            </table>
        </div>
<BR>
        <button type="submit" class="btn btn-primary" name="submit" id="submit">Sahkan dan Daftar LPP09</button> | 
       <a href="<?php echo site_url('admin/Pelatih_lanjutan/cetakpendaftaranb');?>" class="btn btn-primary">Cetak</a>
                
    </div>
    </div>
<!-- </form> -->
<script>
    function visitPage(){
        window.location='http://www.example.com';
    }
</script>
<script type="text/javascript">

$(document).ready(function() {
$('.update').click(function() {
return confirm("Adakah anda pasti untuk menolak permohonan ini?");
});
});

$(function() {
$('[data-toggle="tooltip"]').tooltip()
})


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
