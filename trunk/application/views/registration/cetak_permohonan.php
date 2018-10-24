<div class="container">
  <div class="row mt-2">
    <div class="col-md-12">
			<div class="w3-container" style="clear:both;border:1px #EEE solid;padding:20px; position:relative;">
				<div class="w3-container w3-blue">
					<h4>PERMOHONAN PELATIH GIATMARA</h4>
				</div>
				<br/>
				<div>
					<p><strong>No Rujukan Permohonan : <?php echo @$row_data[no_mykad]; ?></strong></p>
					<p>
						Terima kasih kerana berminat dengan program latihan di GIATMARA Malaysia.<br>
                        Borang permohonan anda telah diterima. <br/>
						Sila simpan nombor rujukan permohonan anda. Ia akan digunakan untuk membuat semakan status permohonan kelak.
					</p>
					<p><button class="w3-button w3-blue" id="btn_generate_pdf">Cetak Permohonan</button></p>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	$('#btn_generate_pdf').click(function () {
		window.open('<?php echo site_url('screen_lapan/generate_pdf/' . @$row_data[id_permohonan]); ?>', '_blank');
	});
});
</script>
