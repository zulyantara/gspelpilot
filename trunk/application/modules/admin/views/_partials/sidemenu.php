<ul class="sidebar-menu">

	<li class="header">MAIN NAVIGATION</li>

	<?php foreach ($menu as $parent => $parent_params): ?>

		<?php if ( empty($page_auth[$parent_params['url']]) || $this->ion_auth->in_group($page_auth[$parent_params['url']]) ): ?>
		<?php if ( empty($parent_params['children']) ): ?>

			<?php $active = ($current_uri==$parent_params['url'] || $ctrler==$parent); ?>
			<li class='<?php if ($active) echo 'active'; ?>'>
				<a href='<?php echo $parent_params['url']; ?>'>
					<i class='<?php echo $parent_params['icon']; ?>'></i> <?php echo $parent_params['name']; ?>
				</a>
			</li>

		<?php else: ?>

			<?php $parent_active = ($ctrler==$parent); ?>
			<li class='treeview <?php if ($parent_active ) echo 'active'; ?>' >
				<a href='#'>
					<i class='<?php echo $parent_params['icon']; ?>'></i> <span><?php echo $parent_params['name']; ?></span> <span class="pull-right-container"><i class='fa fa-angle-left pull-right'></i></span>
				</a>
				<ul class='treeview-menu'>
					<?php foreach ($parent_params['children'] as $name => $url): ?>
						<?php
						if (is_array($url))
						{
							?>
							<?php $child_active = ($current_uri==$url); ?>
							<li class="treeview" <?php if ($child_active) echo 'active'; ?>'>
								<a href="#">
									<i class='fa fa-circle-o'></i>  <span><?php echo $name; ?></span>  <span class="pull-right-container"><i class='fa fa-angle-left pull-right'></i></span>
								</a>
								<?php
								foreach ($url as $key => $value)
								{
									?>
									<ul class="treeview-menu">
										<?php $child_active = ($current_uri==$value); ?>
										<li <?php if ($child_active) echo 'class="active"'; ?>>
											<a href='<?php echo $value; ?>'><i class='fa fa-circle-o'></i> <?php echo $key; ?></a>
										</li>
									</ul>
									<?php
								}
								?>
							</li>
							<?php
						}
						else
						{
							?>
							<?php if ( empty($page_auth[$url]) || $this->ion_auth->in_group($page_auth[$url]) ): ?>
							<?php $child_active = ($current_uri==$url); ?>
							<li <?php if ($child_active) echo 'class="active"'; ?>>
								<a href='<?php echo $url; ?>'><i class='fa fa-circle-o'></i> <?php echo $name; ?></a>
							</li>
							<?php endif; ?>
							<?php
						}
						?>
						<?php
						# Please check - dari branch modul kurikulum
						/*
						<?php # if ( empty($page_auth[$url]) || $this->ion_auth->in_group($page_auth[$url]) ): ?>
						<?php #$child_active = ($current_uri==$url); ?>
						<li <?php #if ($child_active ) echo 'class="active"'; ?>>
							<a href='<?php #echo $url; ?>'><i class='fa fa-circle-o'></i> <?php #echo #$name; ?></a>
							<?php #if ($name =="Konfigurasi Kurikulum") {?>
							<ul class="treeview-menu">
									<li><a href="<?php #echo site_url('admin/gspel_kurikulum/kurikulum') ?>"><i class="fa fa-circle-o"></i> <?php #echo "Penetapan Kurikulum"; ?></a></li>
									<li><a href="<?php #echo site_url('admin/gspel_kurikulum/sesi') ?>"><i class="fa fa-circle-o"></i> <?php #echo "Pengurusan Sesi"; ?></a></li>
									<li><a href="<?php #echo site_url('admin/gspel_kurikulum/kluster') ?>"><i class="fa fa-circle-o"></i> <?php #echo "Pengurusan Kluster"; ?></a></li>
									<li><a href="<?php #echo site_url('admin/gspel_kurikulum/kursus') ?>"><i class="fa fa-circle-o"></i> <?php #echo "Pengurusan Kursus"; ?></a></li>
									<li><a href="<?php #echo site_url('admin/gspel_kurikulum/modul') ?>"><i class="fa fa-circle-o"></i> <?php #echo "Pengurusan Modul"; ?></a></li>
									<li><a href="<?php #echo site_url('admin/gspel_kurikulum/tawaran') ?>"><i class="fa fa-circle-o"></i> <?php #echo "Pengurusan Tawaran Kursus"; ?></a></li>
								</ul>
								<?php } ?>
						</li>
						<?php #endif; ?>
						*/ ?>
					<?php endforeach; ?>
				</ul>
			</li>
		<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; ?>
	<?php if ( !empty($useful_links) ): ?>
		<li class="header">USEFUL LINKS</li>
		<?php foreach ($useful_links as $link): ?>
			<?php if ($this->ion_auth->in_group($link['auth']) ): ?>
			<li>
				<a href="<?php echo starts_with($link['url'], 'http') ? $link['url'] : base_url($link['url']); ?>" target='<?php echo $link['target']; ?>'>
					<i class="fa fa-circle-o <?php echo $link['color']; ?>"></i> <?php echo $link['name']; ?>
				</a>
			</li>
			<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>
</ul>
