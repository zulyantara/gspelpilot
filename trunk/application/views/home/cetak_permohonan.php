<div class="container">
	<div class="w3-container">
	<div class="w3-container w3-blue">
		<h4>PERMOHONAN PELATIH GIATMARA</h4>
	</div>
	<br/>
	<div>
		<p>No Rujukan Permohonan : <?php echo @$row_data[no_rujukan_permohonan]; ?></p>
		<p>
			Terima kasih karena berminat dengan program latihan di GIATMARA Malaysia Borang permohonan anda telah diterima. <br/>
			Sila simpan nomor rujukan permohonan anda Ia akan digunakan untuk membuat semakan status permohonan kelak.
		</p>
		<p><button class="w3-button w3-blue" id="btn_generate_pdf">Cetak Permohonan</button></p>
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
