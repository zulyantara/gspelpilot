<div class="card">
    <h3 class="card-header">KEPERLUAN TEMPAT TINGGAL / PENGANGKUTAN</h3>
	<div class="card-block">
		<style>
			.ftitle-left { visibility:hidden; }	
		</style>
		<script>
			<?php if ($data['state'] == 'edit') { ?>
			$(document).ready(function(){
				$('#btnaction').append('<button type="button" class="btn btn-large btn-primary" onclick="return custom_next()">Seterusnya</button>');
			});
			
			function custom_next() {
				window.location.href = "<?php echo site_url('screen_tujuh/'); ?>";
			}
			<?php } ?>
		</script>
		<label>GIATMARA tidak menyediakan tempat tinggal, bahagian ini hanya untuk tujuan statistik</label>
		<?php 
		echo $output; ?>
	</div>
</div>
