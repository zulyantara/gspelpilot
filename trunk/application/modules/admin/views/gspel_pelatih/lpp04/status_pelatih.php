<?php $this->load->view('lpp04_header_1'); ?>
<form class="form-horizontal" action="<?php echo site_url("admin/lpp04/tetapkan_tetapan_tawaran"); ?>" method="post">
    <input type="hidden" name="id_giatmara" value="<?php echo $id_giatmara; ?>">
    <div class="box box-solid box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Maklumat Pelatih</h3>
        </div>

        <div class="form-group">
            <label class="col-md-2">Nama</label>
            <div class="col-md-4">
			<?php echo $pelatih1['nama_penuh'];?>
            </div>
            <label class="col-md-2">Jenis Pelatih</label>
            <div class="col-md-4">
				<?php echo $pelatih1['jenis_pelatih'];?><!--  ok -->
            </div>
        </div>

        <div class="form-group">
          <label class="col-md-2">No. KP</label>
          <div class="col-md-4">
          <?php echo $pelatih1['no_mykad'];?>
          </div>
		  
          <label class="col-md-2">NO. PELATIH</label>
          <div class="col-md-4">
				<?php echo $pelatih1['no_pelatih'];?><!-- ok -->
          </div>
        </div>

	   <div class="form-group">
          <label class="col-md-2">GIATMARA</label>
          <div class="col-md-4">
          <?php echo $pelatih1['nama_giatmara'];?><!-- ok -->
          </div>
		  
          <label class="col-md-2">KURSUS</label>
          <div class="col-md-4">
				<?php echo $pelatih1['nama_kursus'];?><!-- ok -->
          </div>
        </div>

	   <div class="form-group">
          <label class="col-md-2">TARIKH DAFTAR</label>
          <div class="col-md-4">
          <?php echo  date('d-m-Y', strtotime($pelatih1['tawaran_tarikh_lapordiri']));?><!--  ok -->
          </div>
          <label class="col-md-2">TEMPOH KURSUS</label>
          <div class="col-md-4">
				<?php echo date('d-m-Y', strtotime($pelatih1['tarikh_mula_kursus']));?>  hingga   <?php echo date('d-m-Y', strtotime($pelatih1['tarikh_tamat_kursus']));?><!--  ok -->
          </div>
        </div>

		
		<div class="form-group">
          <label class="col-md-2">STATUS PELATIH</label>
          
		  <TABLE BORDER=1 WIDTH=80%>
		  <TR><TH>Temuduga<th>Pendaftaran<th>Kurikulum<th>Kelayakan Elaun<th>Sijil
		  <?php if(!empty($s)):?>
		  <?php foreach($s as $i):?>
		  <tr>
				<?php foreach($i as $ii):?>
				<td><?php echo $ii;?>
				<?php endforeach;?>
		  <?php endforeach;?>
		  <?php else:?>
		  <tr><td colspan='5'>No Data to Display
		  <?php endif;?>
		  </TABLE>
           
        </div>		

		<div class="form-group">
          <label class="col-md-2">LPP5A</label>
          
          <TABLE BORDER=1 WIDTH=80%>
		  <TR><TH>dihantar_pada<th>dihantar_oleh<th>status_kewangan<th>tarikh_kelulusan
		  <?php if(!empty($lpp05)):?>
		  <?php foreach($lpp05 as $i):?>
		  <tr>
				<?php foreach($i as $ii):?>
				<td><?php echo $ii;?>
				<?php endforeach;?>
		  <?php endforeach;?>
		  <?php else:?>
		  <tr><td colspan='5'>No Data to Display
		  <?php endif;?>
		  </TABLE>
        
        </div>
<?php if(!empty($l9)):?>
		<div class="box-header with-border">
            <h3 class="box-title">JENIS PELATIH : LPP09A</h3>
        </div>

	   <div class="form-group">
          <label class="col-md-2">GIATMARA</label>
          <div class="col-md-4">
          <?php echo $l9['nama_giatmara'];?><!-- ok -->
          </div>
		  
          <label class="col-md-2">KURSUS</label>
          <div class="col-md-4">
				<?php echo $l9['nama_kursus'];?><!-- ok -->
          </div>
        </div>
		
	   <div class="form-group">
          <label class="col-md-2">TARIKH DAFTAR</label>
          <div class="col-md-4">
          <?php echo $l9['tawaran_tarikh_lapordiri'];?><!--  ok -->
          </div>
          <label class="col-md-2">TEMPOH KURSUS</label>
          <div class="col-md-4">
				<?php echo $l9['tawaran_mula_elaun'];?> hingga <?php echo $l9['tawaran_tamat_elaun'];?><!--  ok -->
          </div>
        </div>

		
		<div class="form-group">
          <label class="col-md-2">STATUS PELATIH</label>
		  
		  <TABLE BORDER=1 WIDTH=80%>
		  <TR><TH>Temuduga<th>Pendaftaran<th>Kurikulum<th>Kelayakan Elaun<th>Sijil
		  <?php if(!empty($sl9)):?>
		  <?php foreach($sl9 as $i):?>
		  <tr>
				<?php foreach($i as $ii):?>
				<td><?php echo $ii;?>
				<?php endforeach;?>
		  <?php endforeach;?>
		  <?php else:?>
		  <tr><td colspan='5'>No Data to Display
		  <?php endif;?>
		  </TABLE> 	
         </div>			
<?php endif;?>      
    </div>



  <script type="text/javascript">
  $(document).ready(function(){
      $("#tbl_senarai_temuduga").DataTable();

      $('#txt_tgl').datepicker({
          dateFormat: "yy-mm-dd",
          changeMonth: true,
          changeYear: true,
          autoclose: true,
          yearRange: "-0:+1"
      });

      $('#txt_jam').timepicker({
      });

      $("#opt_pegawai").change(function(){
          var val_staff = $("#opt_pegawai").val();
          $.ajax({
              // dataType: 'json',
              data: {txt_staff : val_staff},
              url: "<?php echo site_url("admin/lpp04/jawatan_ajax"); ?>",
              type: "POST",
              success : function(data) {
                  $("#txt_jawatan").val(data);
              }
          });
      });

      $("#tbl_senarai_temuduga").DataTables();
  });

  function test(id)
  {
      $.ajax({
          dataType: 'json',
          data: {txt_no_mykad : id},
        url: "<?php echo site_url("admin/lpp04/biodata_ajax"); ?>",
        type: "POST",
        success : function(data) {
            $("#txt_jawatan").val(data);
        }
    });
}
</script>
