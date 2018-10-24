<div class="card">
    <h3 class="card-header">KURSUS-KURSUS PILIHAN</h3>
	<div class="card-block">
								<div align="right">Klik <u><a href="<?php echo site_url("screen_sembilan"); ?>">disini</a></u> untuk melihat senarai Pusat GIATMARA dan kursus yang ditawarkan</div> <br/>
        <form method="post" action="<?php echo site_url("screen_empat/simpan"); ?>">
            <div class="row">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>MENGIKUT</th>
              <th>PILIHAN KLUSTER</th>
              <th>PILIHAN KURSUS</th>
              <th>PILIHAN NEGERI</th>
              <th>PILIHAN GIATMARA</th>
            </tr>
          </thead>
          <tbody id="myTable">
												<?php
												
																for($x=1; $x<= 3; $x++) {
												?>
            <tr>
              <td><?php echo $x ?></td>
              <td>
																<select class="form-control" name="mengikut[]" id="mengikut<?php echo $x ?>">
																				<option value="1">Sila Pilih</option>
																				<option value="2">Kursus</option>
																				<option value="3">Negeri</option>
																</select>
														</td>
              <td>
																<select class="form-control" name="kluster[]" id="kluster<?php echo $x ?>">
																				<option value="">Sila Pilih</option>
																				<?php
																				if ( ! empty($ref_kluster))
																				{
																								foreach ($ref_kluster as $row)
																								{
																												?>
																												<option value="<?php echo $row->id; ?>"><?php echo $row->nama_kluster; ?></option>
																												<?php
																								}
																				}
																				?>
																</select>
														</td>
              <td>
																<div id="divKursus<?php echo $x ?>">
																				<select class="form-control" name="kursus[]" id="kursus<?php echo $x ?>">
																				<option>Sila Pilih</option>
																				</select>
																</div>
														</td>
              <td>
																<select class="form-control" name="negeri[]" id="negeri<?php echo $x ?>">
																				<option value="">Sila Pilih</option>
																				<?php
																				if ( ! empty($ref_negeri))
																				{
																								foreach ($ref_negeri as $row)
																								{
																												?>
																												<option value="<?php echo $row->id; ?>"><?php echo $row->nama_negeri; ?></option>
																												<?php
																								}
																				}
																				?>
																</select>
														</td>
              <td>
																				<div id="divShow<?php echo $x ?>">
																								<select class="form-control" name="giatmara[]" id="giatmara<?php echo $x ?>">
																								<option>Sila Pilih</option>
																								</select>
																				</div>
														</td>
            </tr>
            <?php } ?>
          </tbody>
        </table>   
      </div>
      <div class="col-md-12 text-center">
      <ul class="pagination pagination-lg pager" id="myPager"></ul>
      </div>
	</div>
            <div class="btn-group float-right" role="group">
                <button type="submit" name="btn_simpan" value="simpan_seterusnya" class="btn btn-primary">Simpan & Seterusnya</button>
            </div>
    </form>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
								
								<?php for($x=1;$x<=3;$x++){ ?>
								
								$("#kluster<?echo $x ?>").change(function(){
            var id = $("#kluster<?echo $x ?>").val();
												$.ajax({
																type : "POST",
																url : "<?php echo site_url("screen_empat/ajax_kursus"); ?>",
																data : "kluster="+ id + "&x=<?echo $x ?>",
																beforeSend: function(){
																	$('#divKursus<?echo $x ?>').html('<div align="center">loading</div>');
																},
																success: function(msg){
																	if (msg.length > 0) {
																		$('#divKursus<?echo $x ?>').html(msg);
																	}
																}
												});
        });
								
        $("#negeri<?echo $x ?>").change(function(){
            var id = $("#negeri<?echo $x ?>").val();
												$.ajax({
																type : "POST",
																url : "<?php echo site_url("screen_empat/ajax_giatmara"); ?>",
																data : "negeri="+ id + "&x=<?echo $x ?>",
																beforeSend: function(){
																	$('#divShow<?echo $x ?>').html('<div align="center">loading</div>');
																},
																success: function(msg){
																	if (msg.length > 0) {
																		$('#divShow<?echo $x ?>').html(msg);
																	}
																}
												});
        });
								
								<?php } ?>
    });
</script>
