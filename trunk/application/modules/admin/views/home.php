<div class="row">
	<!-- <div class="col-md-4">
		<?php echo modules::run('adminlte/widget/box_open', 'Shortcuts'); ?>
			<?php echo modules::run('adminlte/widget/app_btn', 'fa fa-user', 'Account', 'panel/account'); ?>
			<?php echo modules::run('adminlte/widget/app_btn', 'fa fa-sign-out', 'Logout', 'panel/logout'); ?>
		<?php echo modules::run('adminlte/widget/box_close'); ?>
	</div>

	<div class="col-md-4">
		<?php echo modules::run('adminlte/widget/info_box', 'yellow', $count['users'], 'Users', 'fa fa-users', 'user'); ?>
	</div> -->

	<?php
    if ($groups =='branch executive')
    {
        ?>
        <div class="col-md-4">
            <?php echo modules::run('adminlte/widget/info_box', 'yellow', $count['users'], 'Users', 'fa fa-users', 'user'); ?>
        </div>
        <?php
    }
    else if ($groups == 'branch manager' or $groups == 'state officer')
    {
        ?>
		<div class="col-lg-6">
			<div class="row">
				<div class="col-md-6">
					<div class="small-box bg-green" style="background-color:#6e9fca !important;">
						<div class="inner">
							<h3><?php echo $onprogress; ?></h3>
							<p>Permohonan LPP04</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						<!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
					</div>
			  	</div>

				<div class="col-md-6">
					<div class="small-box bg-green" style="background-color:#6e9fca !important;">
						<div class="inner">
							<h3><?php echo $reg; ?></h3>
							<p>Pendaftaran Pelatih LPP04</p>
						</div>
						<div class="icon">
							<i class="ion ion-ios-people"></i>
						</div>
						<!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
					</div>
				</div>
				<div class="col-md-6">
					<div  >
					<form method=get id="giatmaraf">
					Select Giatmara &nbsp;	<?php echo form_dropdown("id_giatmara", $giatmaras, $id_giatmara, "onchange='fs()'");?>
						<br><br>
					</form>
					<script>
					function fs(){
						document.getElementById("giatmaraf").submit();
					}
					</script>
					</div>
				</div>
				<!-- <div class="col-md-6">
		            <div class="panel" style="background-color:#6e9fca; width: 90%; height: 90%">
		                <div class="panel-heading">
		                    <div class="row">
		                        <div class="col-xs-3">
		                            <i class="fa fa-signal fa-5x"></i>
		                        </div>
		                        <div class="col-xs-9 text-right">
		                            <div class="huge" style="color: white ;font-size: 40px;font-weight:bold"><?php echo $onprogress;?></div>
		                            <div></div>
		                        </div>
		                    </div>
		                </div>
		                <a href="<?php echo site_url('admin/Gspel_kurikulum/trainer3');?>/<?php echo $giatmara;?>/<?php echo $kursus;?>/<?php echo $jeniskursus;?>/<?php echo $intake;?>">
		                    <div class="panel-footer">
		                        <span class="pull-left">Permohonan Baru LPP04</span>
		                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
		                        <div class="clearfix"></div>
		                    </div>
		                </a>
		            </div>
		        </div> -->

		        <!-- <div class="col-md-6">
		            <div class="panel " style="background-color:#6e9fca; width: 90%; height: 90%">
		                <div class="panel-heading">
		                    <div class="row">
		                        <div class="col-xs-3">
		                            <i class="fa fa-users fa-5x"></i>
		                        </div>
		                        <div class="col-xs-9 text-right">
		                            <div class="huge" style="color: white ;font-size: 40px;font-weight:bold"><?php echo $reg;?></div>
		                            <div></div>
		                        </div>
		                    </div>
		                </div>
		                <a href="#">
		                    <div class="panel-footer">
		                        <span class="pull-left">Pendaftaran Baru LPP04</span>
		                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
		                        <div class="clearfix"></div>
		                    </div>
		                </a>
		            </div>
		        </div> -->

				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-bell fa-fw"></i>
						</div>
						<div class="panel-body">
							<!-- <table class="table table-bordered table-hover table-striped">
								<thead>
									<tr>
										<th>Proses LPP04</th>
										<th class="text-center">Permohonan</th>
										<th class="text-center">Temuduga</th>
										<th class="text-center">Tawaran</th>
										<th class="text-center">Pendaftaran</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th>Kursus 1</th>
										<td class="text-center"><?php echo $jml_permohonan_k1->jml_pk1; ?></td>
										<td class="text-center"><?php echo $jml_temuduga_k1->jml_ttk1; ?></td>
										<td class="text-center"><?php echo $jml_tawaran_k1->jml_tk1; ?></td>
										<td class="text-center"><?php echo $jml_pelatih_k1->jml_pk1; ?></td>
									</tr>
									<tr>
										<th>Kursus 2</th>
										<td class="text-center"><?php echo $jml_permohonan_k2->jml_pk2; ?></td>
										<td class="text-center"><?php echo $jml_temuduga_k2->jml_ttk2; ?></td>
										<td class="text-center"><?php echo $jml_tawaran_k2->jml_tk2; ?></td>
										<td class="text-center"><?php echo $jml_pelatih_k2->jml_pk2; ?></td>
									</tr>
									<tr>
										<th>Kursus 3</th>
										<td class="text-center"><?php echo $jml_permohonan_k3->jml_pk3; ?></td>
										<td class="text-center"><?php echo $jml_temuduga_k3->jml_ttk3; ?></td>
										<td class="text-center"><?php echo $jml_tawaran_k3->jml_tk3; ?></td>
										<td class="text-center"><?php echo $jml_pelatih_k3->jml_pk3; ?></td>
									</tr>
								</tbody>
							</table> -->
							<table class="table table-bordered table-hover table-striped">
							<tr>
							<th>Proses LPP04
							<th>Permohonan
							<th>Temuduga
							<th>Tawaran
							<th>Pendaftaran
							<?php foreach($t1 as $i):?>
							<tr>
							<?php foreach($i as $ii):?>
							<td><?php echo $ii;?>
							<?php endforeach;?>
							<?php endforeach;?>
							</table>
						</div>
					</div>
				</div>

				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-bell fa-fw"></i>
						</div>
						<div class="panel-body">
							<table class="table table-bordered table-hover table-striped">
								<thead>
									<tr>
										<th>Proses LPP09</th>
										<th class="text-center">Permohonan</th>
										<th>Pendaftaran</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th>Latihan Lanjutan</th>
										<td class="text-center"><?php echo $jml_permohonan_ll->jml; ?></td>
										<td class="text-center"><?php echo $jml_pendaftaran_ll->jml; ?></td>
									</tr>
									<tr>
										<th>Rintis Niaga</th>
										<td class="text-center"><?php echo $jml_permohonan_rn->jml; ?></td>
										<td class="text-center"><?php echo $jml_pendaftaran_rn->jml; ?></td>
									</tr>
									<tr>
										<th>Program Pertandingan</th>
										<td class="text-center"><?php echo $jml_permohonan_pp->jml; ?></td>
										<td class="text-center"><?php echo $jml_pendaftaran_pp->jml; ?></td>
									</tr>
									<tr>
										<th>Program Khas</th>
										<td class="text-center"><?php echo $jml_permohonan_pk->jml; ?></td>
										<td class="text-center"><?php echo $jml_pendaftaran_pk->jml; ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
        </div>

        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bell fa-fw"></i> Tugasan Saya
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item col-md-12">
                            <h5 class="list-group-item-heading"><i class="fa fa-navicon fa-fw"></i> LPP04: Pengesahan Pengurus</h5>
							<?php
							foreach ($res_kursus as $vk)
							{
								?>
								<p><?php echo $vk->nama_kursus; ?></p>
								<?php
							}
							?>
                        </a>
					</div>
					<?php if($groups == 'branch manager'): ?>
					<div class="list-group">
                        <a href="#" class="list-group-item col-md-12">
                            <h5 class="list-group-item-heading"><i class="fa fa-navicon fa-fw"></i> Pemarkahan: Pengesahan Pengurus</h5>
							<?php
							foreach ($res_kursus2 as $vk)
							{
								?>
								<p><?php echo $vk->nama_kursus; ?></p>
								<?php
							}
							?>
                        </a>
                    </div>
					<?php endif;?>
                    <!-- /.list-group -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <?php
    }
    else if ($groups == 'state officer')
    {
        ?>
        <div class="col-md-4">
            <?php echo modules::run('adminlte/widget/info_box', 'yellow', $count['users'], 'Users', 'fa fa-users', 'user'); ?>
        </div>
        <?php
    }
    else if ($groups == 'ppkl_officer')
    {
        ?>
        <?php
    }
    else if ($groups == 'trainer')
    {
        ?>
        <div class="col-md-4">
            <?php echo modules::run('adminlte/widget/info_box', 'yellow', $count['users'], 'Users', 'fa fa-users', 'user'); ?>
        </div>
        <?php
    }
    else if ($groups == 'pelatih officer')
    {
        ?>
        <div class="col-md-4">
            <?php echo modules::run('adminlte/widget/info_box', 'yellow', $count['users'], 'Users', 'fa fa-users', 'user'); ?>
        </div>
        <?php
    }
    else
    {
        echo "";
    }
    ?>
</div>
