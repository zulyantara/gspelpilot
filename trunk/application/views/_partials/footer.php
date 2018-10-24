<div class="footer">
	<div class="container">
		<?php if (ENVIRONMENT=='xdevelopment'): ?>
			<p class="pull-right text-muted">
				CI Bootstrap Version: <strong><?php echo CI_BOOTSTRAP_VERSION; ?></strong>, 
				CI Version: <strong><?php echo CI_VERSION; ?></strong>, 
				Elapsed Time: <strong>{elapsed_time}</strong> seconds, 
				Memory Usage: <strong>{memory_usage}</strong>
			</p>
		<?php endif; ?>
		
		<p class="text-muted"></P><p style="text-align: center;"
 class="text-muted">Copyright &copy; <strong><?php echo date('Y'); ?></strong> GIATMARA SDN. BHD. Hakcipta Terpelihara.<br>
Penafian: GIATMARA SDN. BHD. Tidak akan bertanggungjawab atas sebarang kehilangan data atau kerugian yang berlaku disebabkan penggunaan laman web ini.
</p>
<div align="center">
<a href="http://www.giatmara.edu.my/" target="_blank"><img src="<?= asset_url();?>images/giatmara_footer.png" width="140" height="50" alt="" data-toggle="tooltip" id="giat" title="Laman sesawang rasmi GIATMARA"></a>
	</div>
	</div>
</div>
<script>
   $(function () { $("[data-toggle = 'tooltip']").tooltip(); });
</script>