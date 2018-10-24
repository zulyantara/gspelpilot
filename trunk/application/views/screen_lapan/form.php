<div class="card">
    <h3 class="card-header">PERMOHONAN PELATIH GIATMARA</h3>
	<div class="card-block">
    	<div class="row">
    		<div class="col-md-12"><strong>No. Rujukan Permohonan: <?php echo $data['no_rujukan_permohonan']; ?></strong></div>
    	</div>
    	<div class="row">&nbsp;</div>
    	<div class="row">
    		<div class="col-md-12">
    			Terima kasih kerana berminat dengan program latihan kemahiran di GIATMARA Malaysia. Borang permohonan anda telah diterima.
    			Sila simpan nombor rujukan permohonan anda. Ia akan digunakan untuk membuat semakan status permohonan kelak.
    		</div>
    	</div>
	</div>
	<div class="card-block" id="stay-hidden" style="visibility:hidden; z-index:-1">
		<?php #echo $output; ?>
		<div id="testing"></div>
	</div>
	<div class="card-block">
		<div id="btnprint" class="btn-group" role="group">
			<button id="btn_generate_pdf" type="button" class="btn btn-large btn-primary">Cetak Permohonan</button>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
        $('#btn_generate_pdf').click(function () {
            window.open('<?php echo site_url('screen_lapan/generate_pdf/' . $data['id_permohonan']); ?>', '_blank');
        });

	});
	
</script>