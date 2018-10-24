<script>
	function addTotal(pilihan){
		total = $("#total").val();

	    if($("#"+pilihan).prop('checked')){
	        nilai1 = parseInt(total) + 1;
	    }else{
	        nilai1 = parseInt(total) - 1;
	    };

		$("#total").val(nilai1);

		if (nilai1 == 3) {
			$("#finish").prop('disabled', false);
		}else{
			$("#finish").prop('disabled', true);
		}
	}

	$(document ).ready( function () {

	$("#finish").click(function(event){
			$.ajax({
					data: $("#form-pengakuan").serialize(),
					url: "<?php echo site_url("admin/pelatih_lanjutan/update_bp"); ?>",
					type: "POST",
					// dataType: 'json',
					success: function(data) {
						// console.log(data);
						if (data > 0) {
							var loc = "<?php echo site_url('admin/pelatih_lanjutan/cetak_permohonan/mykad/'); ?>";
							window.location = loc + "<?php echo $no_mykad ?>";
						} else {
							var loc = "<?php echo site_url('admin/pelatih_lanjutan/form_permohonan_lanjutan/'); ?>";
							window.location = loc + "<?php echo $no_mykad ?>";
						}
					}
				})
		});

	<?php if($tab_8 != 'hide'){ ?>
		$("#finish").prop('disabled', false);
	<?php } ?>

	});

</script>

<div class="box-body">
	<form name="form-pengakuan" id="form-pengakuan" method="post">
	<input type="hidden" id="total" name="total" value="0">
	<input type="hidden" id="no_mykad" name="no_mykad" value="<?php echo $no_mykad ?>">
	<input type="hidden" name="idBp" id="idBp" value="<?php echo $idBp; ?>">
	<?php
		if($row_pbp->pengesahan == 1) $cheked_pengakuan1 = "checked";
		if($row_pbp->pengakuan == 1) $cheked_pengakuan2 = "checked";

		if($tab_8 != 'hide'){
			$cheked_pengakuan1 = "checked";
			$cheked_pengakuan2 = "checked";
		}
	?>
	<table border="0">
					<tr>
						<td valign="top" width="30px">
							<input type="checkbox" class="w3-check" name="pengakuan_1" id="pengakuan_1" value="1" onclick="addTotal('pengakuan_1')" <?php echo $cheked_pengakuan1 ?>>
						</td>
						<td valign="top">
							Saya mengesahkan bahawa semua butiran di dalam permohonan ini adalah benar. Jika didapati permohonan ini tidak lengkap atau tidak memenuhi mana-mana keperluan yang dinyatakan maka permohonan ini akan ditolak dan tidak akan diproses.
							<label for="pengakuan_1" id="pengakuan_1-error" class="error"></label><br/>
						</td>
					</tr>
					<?php if($tab_8 == 'hide'){ ?>
					<tr>
						<td valign="top"><input type="checkbox" class="w3-check" name="pengakuan_2" id="pengakuan_2" value="1" onclick="addTotal('pengakuan_2')"></td>
						<td valign="top">
							Saya mengesahkan bahawa pelatih ini pernah mengikuti kursus di GIATMARA berdasarkan sijil-sijil yang dimuatnaik pada permohonan ini.
							<label for="pengakuan_2" id="pengakuan_2-error" class="error"></label><br/>
						</td>
					</tr>
					<?php } ?>
					<tr>
						<td valign="top">
							<input type="checkbox" class="w3-check" name="pengakuan_3" id="pengakuan_3" value="1" onclick="addTotal('pengakuan_3')" <?php echo $cheked_pengakuan2 ?>>
						</td>
						<td valign="top">
							Fasal Persetujuan PDPA<br>
Dengan mengemukakan borang ini, anda bersetuju bahawa GIATMARA boleh mengumpul, memperoleh, menyimpan dan memproses data peribadi anda yang telah berikan dalam borang ini untuk tujuan kemaskini data, berita, promosi dan pemasaran oleh GIATMARA.<br>
Anda dengan ini memberi persetujuan kepada GIATMARA untuk:
<ul>
    <li>Menyimpan dan memproses Data Peribadi anda;</li>
    <li>Mengisytiharkan Data Peribadi anda kepada pihak berkuasa kerajaan atau pihak ketiga yang berkaitan jika diperlukan oleh undang-undang atau untuk tujuan undang-undang.</li>
</ul>
Di samping itu, Data Peribadi anda boleh dipindahkan ke mana-mana syarikat yang difikirkan sesuai oleh GIATMARA yang mungkin melibatkan penghantaran data anda ke lokasi di luar Malaysia. Untuk tujuan mengemaskini atau membetulkan data tersebut, anda boleh pada bila-bila masa memohon kepada GIATMARA untuk mengakses data peribadi anda yang disimpan oleh GIATMARA.<br>
Untuk mengelakkan keraguan, Data Peribadi adalah merangkumi semua data yang ditakrifkan dalam Akta Perlindungan Data Peribadi 2010 termasuk semua data yang telah anda berikan kepada GIATMARA dalam Borang ini.
							<label for="pengakuan_3" id="pengakuan_3-error" class="error"></label><br/>
						</td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<br/><br/>
							<input class="btn btn-flat btn-primary" type="button" name="finish" id="finish" value="Hantar Permohonan" disabled="disabled">
							<!--<input class="btn btn-flat btn-primary" type="button" name="finish_cetak" id="finish_cetak" value="Cetak Permohonan">-->
						</td>
					</tr>
				</table>
	</form>
</div>
