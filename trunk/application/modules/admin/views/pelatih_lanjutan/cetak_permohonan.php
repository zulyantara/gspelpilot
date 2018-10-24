		<div class="box box-solid box-primary">
			<div class="box-header with-border">
							<h3 class="box-title">PERMOHONAN PELATIH GIATMARA</h3>
			</div>
			<div class="box-body">				<br/>
				<div>
					<p><strong>No Rujukan Permohonan : LPP09-<?php echo $no_rujukan_permohonan; ?></strong></p>
					<p>
						Terima kasih kerana berminat dengan program latihan di GIATMARA Malaysia Borang permohonan anda telah diterima. <br/>
						Sila simpan nomor rujukan permohonan anda Ia akan digunakan untuk membuat semakan status permohonan kelak.
					</p>
					<p><button class="btn btn-flat btn-primary" id="btn_generate_pdf">Cetak Permohonan</button></p>
				</div>
			</div>
		</div>

<script>
$(document).ready(function(){
	$('#btn_generate_pdf').click(function () {
		window.open('<?php echo site_url('admin/pelatih_lanjutan/generate_pdf/' . $id_permohonan); ?>', '_blank');
	});
});
</script>
