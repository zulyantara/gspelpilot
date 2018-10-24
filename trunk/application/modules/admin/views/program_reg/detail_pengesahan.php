<div class="modal fade" id="divShow"></div>
<?php #echo "<pre>";print_r($res_kod_kombinasi);echo "</pre>"; ?>
<div class="row">
    <div class="col-md-12">
      <form name="form-bp" id="form-bp" method="post">
      <input type="hidden" name="idtemudugatetapan" value="<?php echo $idtemudugatetapan; ?>" />
      <div class="box box-solid box-primary">
      	<div class="box-header with-border">
          <h3 class="box-title">Adakah Anda Pasti Dengan Maklumat Berikut?</h3>
        </div>
        <div class="panel-body">
					<div class="row">
		  			<div class="col-xs-6 box-solid box-primary">
							<table>
								<tr>
			<td colspan="6">
			<?php //mmn add to check kelayakan elaun
			foreach ($res_kelayakan_elaun as $kelayakan_elaun) {
			if($kelayakan_elaun->tawaran_elaun==0){
			$txtmsg = "PELATIH INI TIDAK LAYAK ELAUN";
			}else{
			$txtmsg = "";
			}
			?>
			<b><?php echo $txtmsg;?></b><br><br>
			<?php } ?>
			</td>
			</tr>
								<tr>
									<td><font size="2"><b>Nama</b>&nbsp;</font></td>
									<td>:&nbsp;<?php echo $res_temudugatetapan[0]->nama; ?></td>
									<td colspan="4">&nbsp;</td>
								</tr>
								<!-- <tr>
									<td><font size="2"><b>No Pelatih</b>&nbsp;</font></td>
									<td>:&nbsp;-</td>
									<td colspan="4">&nbsp;</td>
								</tr> -->
								<tr>
									<td><font size="2"><b>Nama Bank</b>&nbsp;</font></td>
									<td>:&nbsp;<?php echo $res_temudugatetapan[0]->name_bank; ?></td>
									<td colspan="4">&nbsp;</td>
								</tr>
								<tr>
									<td><font size="2"><b>No Akaun</b>&nbsp;</font></td>
									<td>:&nbsp;<?php echo $res_temudugatetapan[0]->no_akaun; ?></td>
									<td colspan="4">&nbsp;</td>
								</tr>
							</table>
						</div>
						<div class="col-xs-6 box-solid box-primary">
							<?php if (count($res_kod_kombinasi)>0) { ?>
							<table>
								<tr>
									<td><font size="2"><b>Kod Kombinasi</b>&nbsp;</font></td>
									<td>:&nbsp;<?php echo $res_kod_kombinasi[0]->name." (".$res_kod_kombinasi[0]->code_combination_name.")"; ?></td>
									<td colspan="4">&nbsp;</td>
								</tr>
								<tr>
									<td><font size="2"><b>Dana</b>&nbsp;</font></td>
									<td>:&nbsp;<?php echo $res_kod_kombinasi[0]->name_dana." (".$res_kod_kombinasi[0]->kod_dana.")"; ?></td>
									<td colspan="4">&nbsp;</td>
								</tr>
								<tr>
									<td><font size="2"><b>Program</b>&nbsp;</font></td>
									<td>:&nbsp;<?php echo $res_kod_kombinasi[0]->name_program." (".$res_kod_kombinasi[0]->kod_program.")"; ?></td>
									<td colspan="4">&nbsp;</td>
								</tr>
								<tr>
									<td><font size="2"><b>Peringkat</b>&nbsp;</font></td>
									<td>:&nbsp;<?php echo $res_kod_kombinasi[0]->name_peringkat." (".$res_kod_kombinasi[0]->kod_peringkat.")"; ?></td>
									<td colspan="4">&nbsp;</td>
								</tr>
								<tr>
									<td><font size="2"><b>Negara</b>&nbsp;</font></td>
									<td>:&nbsp;<?php echo $res_kod_kombinasi[0]->name_negara." (".$res_kod_kombinasi[0]->kod_negara.")"; ?></td>
									<td colspan="4">&nbsp;</td>
								</tr>
								<tr>
									<td><font size="2"><b>Elaun</b>&nbsp;</font></td>
									<td>:&nbsp;<?php echo $res_kod_kombinasi[0]->name_elaun." (".$res_kod_kombinasi[0]->kod_elaun.")"; ?></td>
									<td colspan="4">&nbsp;</td>
								</tr>
							</table>
							<?php } ?>
						</div>
					</div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-6 box-solid box-primary">
          <button type="button" class="btn btn-success" value="4" id="pasti" style="color:#fff; background-color:#3c8dbc;">Pasti</button>
          <button type="button" class="btn btn-danger" value="0" id="tidak">Tidak</button>
        </div>
      </div>
      </form>
    </div>

</div>

<script>
$(document).ready(function(){
	$("#pasti").click(function(event){
		event.preventDefault();
		$.ajax({
			data: JSON.parse('{"id":"<?php echo $idtemudugatetapan; ?>", "pendaftaran_status":"3"}'),
			url: '<?php echo base_url();?>admin/programreg/simpan_pengesahan',
			type: 'POST',
			dataType: 'json',
			success: function (data) {
				var loc = "<?php echo site_url('admin/programreg/pengesahan'); ?>";
				window.location = loc;
			}
		});
	});

	$("#tidak").click(function(event){
		event.preventDefault();
		$.ajax({
			data: JSON.parse('{"id":"<?php echo $idtemudugatetapan; ?>", "pendaftaran_status":"0","id_kursus_daftar":null}'),
			url: '<?php echo base_url();?>admin/programreg/simpan_pengesahan',
			type: 'POST',
			dataType: 'json',
			success: function (data) {
				var loc = "<?php echo site_url('admin/programreg/pengesahan'); ?>";
				window.location = loc;
			}
		});
	});
});
</script>
