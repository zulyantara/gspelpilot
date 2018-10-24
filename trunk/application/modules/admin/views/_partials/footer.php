<footer class="main-footer">
	<?php if (ENVIRONMENT=='xxdevelopment'): ?>
		<div class="pull-right hidden-xs">
			CI Bootstrap Version: <strong><?php echo CI_BOOTSTRAP_VERSION; ?></strong>, 
			CI Version: <strong><?php echo CI_VERSION; ?></strong>, 
			Elapsed Time: <strong>{elapsed_time}</strong> seconds, 
			Memory Usage: <strong>{memory_usage}</strong>
		</div>
	<?php endif; ?>
	<div style="text-align: center;">
Copyright <strong>&copy; <?php echo date('Y'); ?></strong> GIATMARA SDN. BHD. Hakcipta Terpelihara.</div>
</footer>