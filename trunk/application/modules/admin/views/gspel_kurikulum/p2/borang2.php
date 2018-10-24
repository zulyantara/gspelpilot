<link href='http://localhost/gspel/trunk//assets/dist/admin/adminlte.min.css' rel='stylesheet' media='screen'>
<link href='http://localhost/gspel/trunk//assets/dist/admin/lib.min.css' rel='stylesheet' media='screen'>
<link href='http://localhost/gspel/trunk//assets/dist/admin/app.min.css' rel='stylesheet' media='screen'>
<link href='http://localhost/gspel/trunk//assets/plugins/datatables/jquery.dataTables.min.css' rel='stylesheet' media='screen'>
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
<script src='http://localhost/gspel/trunk//assets/dist/admin/adminlte.min.js'></script>
<script src='http://localhost/gspel/trunk//assets/dist/admin/lib.min.js'></script>
<script src='http://localhost/gspel/trunk//assets/dist/admin/app.min.js'></script>
<script src='http://localhost/gspel/trunk//assets/plugins/datatables/jquery.dataTables.min.js'></script>
<script src='http://localhost/gspel/trunk//assets/plugins/datatables/dataTables.bootstrap.min.js'></script>



<div class="container">
 <div class="row" id="one" >
  <div class="col-md-12">
    <div class="box">
    <h2>Kurikulum Borang 02</h2>
        <div class="panel panel-info panel-custom-horrible-red">
            <div class="panel-heading">
               <h4 style="color: white">Keputusan Penilaian Berterusan &  Penilaian Akhir Modul</h4>
                                    </div>    
            <div class="panel panel-body col-sm-12 pull-center well">
                <form class="form-inline" action="<?php echo site_url('admin/Gspel_kurikulum/borang2a');?>" method="POST">
            <center>  

            <span  class="form-control" style="background-color:#726f6e"><font color="white">MODUL</font></span>
                        <select class="form-control" name="list" > 
                            <option>[ Sila Pilih Modul ]</option>
                            <?php foreach ($modul as $r) : ?>
                            <option value="<?php echo $r->id_modul ?>"><?php echo $r->kod_modul." - ".$r->nama_modul ?></option>

                          <?php endforeach;  ?>
                        </select>
                           <input type="hidden" name="idSeq" value="<?php echo $idSeq;?>">
                          <input type="hidden" name="giatmara" value="<?php echo $giatmara;?>">
        <button class="btn btn-default form-control" type="submit">
                                      <i>search</i>
                                    </button>
                             
                       
        </form>
        </div>
  </div>
</div>
</div>

</div>
</div>
</center>


<style type="text/css">
  
</style>

<script type="text/javascript">
  

</script>