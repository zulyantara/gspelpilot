<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<base href="<?php echo base_url(); ?>/admin/" />

	<title>Modul Kurikulum</title>

	<link href='<?php echo base_url(); ?>/assets/dist/admin/adminlte.min.css' rel='stylesheet' media='screen'>
<link href='<?php echo base_url(); ?>/assets/dist/admin/lib.min.css' rel='stylesheet' media='screen'>
<link href='<?php echo base_url(); ?>/assets/dist/admin/app.min.css' rel='stylesheet' media='screen'>
<link href='<?php echo base_url(); ?>/assets/plugins/datatables/jquery.dataTables.min.css' rel='stylesheet' media='screen'>
<script src='<?php echo base_url(); ?>/assets/dist/admin/adminlte.min.js'></script>
<script src='<?php echo base_url(); ?>/assets/dist/admin/lib.min.js'></script>
<script src='<?php echo base_url(); ?>/assets/dist/admin/app.min.js'></script>
<script src='<?php echo base_url(); ?>/assets/plugins/datatables/jquery.dataTables.min.js'></script>
<script src='<?php echo base_url(); ?>/assets/plugins/datatables/dataTables.bootstrap.min.js'></script>

	
</head>
<body class="skin-blue"><div class="wrapper">

	<header class="main-header">
	<!-- <a href="" class="logo"><b>GSPEL Admin</b></a> -->
	<nav class="navbar navbar-static-top" role="navigation">
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>
		<a href="" class="logo"><img style="display: inline-block"; class="img-responsive" src="<?php echo base_url(); ?>/assets/images/giatmara50.png"></a>

		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="hidden-xs"><?php echo $this->session->userdata('username' );  ?></span>
					</a>
					<ul class="dropdown-menu">
						<li class="user-header">
							<p><?php  echo $this->session->userdata('username' );?></p>
						</li>
						<li class="user-footer">
							<div class="pull-left">
								<a href="panel/account" class="btn btn-default btn-flat">Account</a>
							</div>
							<div class="pull-right">
								<a href="panel/logout" class="btn btn-default btn-flat">Sign out</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>
		<aside class="main-sidebar" style="color: #000063">
		<section class="sidebar">
			 <div class="user-panel" style="height:65px">
				<div class="pull-left info" style="left:5px">
					<p><?php echo $this->session->userdata('username' );  ?></p>
					<!-- <a href="panel/account"><i class="fa fa-circle text-success"></i> Online</a> -->
				</div>
			</div> 
									<ul class="sidebar-menu">

<li class="header">MAIN NAVIGATION</li>
<li class=''><a href=''><i class='fa fa-home'></i> Home	</a></li>

<?php if ($groups == 'branch manager') { ?>	

<!-- Status Bedaftar -->
<li class='treeview'><a href='lpp04/status_permohonan'><i class='fa fa-briefcase'></i> Status Permohonan</a></li>
<li class='treeview'><a href='lpp04/status_pelatih'><i class='fa fa-briefcase'></i> Status Pelatih Berdaftar</a></li>


<!-- LP004 -->
<li class='treeview'>
<a href='#'><i class='fa fa-briefcase'></i> <span>Pelatih Baru (LPP04)</span> <span class="pull-right-container"><i class='fa fa-angle-left pull-right'></i></span></a>
<ul class="treeview-menu">
<li><a href='lpp04/permohonan_baru'><i class='fa fa-circle-o'></i> Permohonan Baru</a></li>

<li><a href="#"><i class='fa fa-circle-o'></i> <span>Temuduga</span> <span class="pull-right-container"><i class='fa fa-angle-left pull-right'></i></span></a>
<ul class="treeview-menu">
<li ><a href='lpp04/tetapan_temuduga'><i class='fa fa-circle-o'></i> Tetapan Temuduga</a></li>
<li><a href='lpp04/cetakan_surat_temuduga'><i class='fa fa-circle-o'></i> Cetakan Surat Temuduga</a>
</li>
<li ><a href='lpp04/keputusan_temuduga'><i class='fa fa-circle-o'></i> Keputusan Temuduga</a></li>
<li ><a href='lpp04/senarai_gagal_temuduga'><i class='fa fa-circle-o'></i> Senarai Gagal Temuduga</a>
</li></ul></li>		

<li><a href="#"><i class='fa fa-circle-o'></i>  <span>Tawaran Kursus</span>  <span class="pull-right-container"><i class='fa fa-angle-left pull-right'></i></span></a>
<ul class="treeview-menu"><li ><a href='lpp04/programme_offering'><li><i class='fa fa-circle-o'></i> Tetapan Tawaran</a></li>
<li ><a href='lpp04/luluskan'><i class='fa fa-circle-o'></i> Cetakan Surat Tawaran</a></li></ul>
</li>

<li><a href="#"><i class='fa fa-circle-o'></i>  <span>Pendaftaran Kursus</span>  <span class="pull-right-container"><i class='fa fa-angle-left pull-right'></i></span></a>
<ul class="treeview-menu">
<li><a href='programreg/index'><i class='fa fa-circle-o'></i> Senarai Permohonan</a></li>
<li><a href='programreg/pengesahan'><i class='fa fa-circle-o'></i> Pendaftaran LPP04</a></li>
<li><a href='programreg/pengurus'><i class='fa fa-circle-o'></i> Pengesahan Pendaftaran</a></li>
<li><a href='programreg/berdaftar'><i class='fa fa-circle-o'></i> Senarai Pelatih Berdaftar</a></li></ul></li>
</ul>
</li>
	

<!-- lpp09 -->
<li class='treeview ' >
<a href='#'><i class='fa fa-briefcase'></i> <span>Pelatih Lanjutan (LPP09)</span> <span class="pull-right-container"><i class='fa fa-angle-left pull-right'></i></span></a>
<ul class='treeview-menu'>
<!-- <li><a href='pelatih_lanjutan/permohonan_baru'><i class='fa fa-circle-o'></i>Permohonan Baru</a></li>
 -->
<li><a href="#"><i class='fa fa-circle-o'></i><span>Temuduga</span>  <span class="pull-right-container"><i class='fa fa-angle-left pull-right'></i></span></a>
<ul class="treeview-menu">
<li><a href='pelatih_lanjutan/tetapan_temuduga'><i class='fa fa-circle-o'></i> Tetapan Temuduga</a></li>
<li><a href='pelatih_lanjutan/cetakan_surat_temuduga'><i class='fa fa-circle-o'></i> Cetakan Surat Temuduga</a></li>

<li ><a href='pelatih_lanjutan/keputusan_temuduga'><i class='fa fa-circle-o'></i> Keputusan Temuduga</a></li>
<li><a href='pelatih_lanjutan/senarai_gagal_temuduga'><i class='fa fa-circle-o'></i> Senarai Gagal Temuduga</a></li></ul></li>

<li><a href='pelatih_lanjutan/pendaftaran'><i class='fa fa-circle-o'></i> Pendaftaran Semula</a></li>
<li><a href='pelatih_lanjutan/cetakan_surat_tawaran'><i class='fa fa-circle-o'></i> Cetakan Surat Tawaran</a></li>
<!-- <li><a href='pelatih_lanjutan/pendaftaranb'><i class='fa fa-circle-o'></i> Pendaftaran Program Lain</a></li>--></ul></li> 


<!-- Kurikulum -->	
<li class='treeview ' >
<a href='#'><i class='fa fa-calendar-o'></i> <span>Kurikulum</span> <span class="pull-right-container"><i class='fa fa-angle-left pull-right'></i></span></a>
<ul class='treeview-menu'><li >
<li ><a href='gspel_kurikulum/approval'><i class='fa fa-circle-o'></i> Pengesahan Pengurus</a></li>
<li><a href='gspel_kurikulum/status'><i class='fa fa-circle-o'></i> Status Penghantaran</a></li></ul></li>
 

<!-- PUSAT GIATMARA -->
<li class='treeview ' >
<a href='#'><i class='fa fa-bank'></i> <span>Pusat Giatmara</span> <span class="pull-right-container"><i class='fa fa-angle-left pull-right'></i></span></a>
<ul class='treeview-menu'>
<li><a href='gspel_kewangan/pengurusan_pelatih'><i class='fa fa-circle-o'></i> Pengurusan Pelatih</a></li>
<li><a href='pusat_giatmara/perubahan_potongan_elaun'><i class='fa fa-circle-o'></i> Perubahan Potongan (LPP7A)</a></li>
<li><a href='pusat_giatmara/batal_pelatih'><i class='fa fa-circle-o'></i> Batal Pelatih (LPP08)</a></li>
<li><a href='pusat_giatmara/tukar_giatmara_kursus'><i class='fa fa-circle-o'></i> Tukar GM / Kursus (LPP10)</a></li>
</ul></li>
	
	

<?php } elseif ($groups == 'branch executive') { ?>	


<!-- Status Bedaftar -->
<li class='treeview'><a href='lpp04/status_permohonan'><i class='fa fa-briefcase'></i> Status Permohonan</a></li>
<li class='treeview'><a href='lpp04/status_pelatih'><i class='fa fa-briefcase'></i> Status Pelatih Berdaftar</a></li>


	<!-- LP004 -->
<li class='treeview'>
<a href='#'><i class='fa fa-briefcase'></i> <span>Pelatih Baru (LPP04)</span> <span class="pull-right-container"><i class='fa fa-angle-left pull-right'></i></span></a>
<ul class="treeview-menu">
<li><a href='lpp04/permohonan_baru'><i class='fa fa-circle-o'></i> Permohonan Baru</a></li>

<li><a href="#"><i class='fa fa-circle-o'></i> <span>Temuduga</span> <span class="pull-right-container"><i class='fa fa-angle-left pull-right'></i></span></a>
<ul class="treeview-menu">
<li ><a href='lpp04/tetapan_temuduga'><i class='fa fa-circle-o'></i> Tetapan Temuduga</a></li>
<li><a href='lpp04/cetakan_surat_temuduga'><i class='fa fa-circle-o'></i> Cetakan Surat Temuduga</a></li>
</li></ul></li>		

<li><a href="#"><i class='fa fa-circle-o'></i>  <span>Tawaran Kursus</span>  <span class="pull-right-container"><i class='fa fa-angle-left pull-right'></i></span></a>
<ul class="treeview-menu"><li ><a href='lpp04/programme_offering'><li><i class='fa fa-circle-o'></i> Tetapan Tawaran</a></li>
<li ><a href='lpp04/luluskan'><i class='fa fa-circle-o'></i> Cetakan Surat Tawaran</a></li></ul>
</li>

<li><a href="#"><i class='fa fa-circle-o'></i>  <span>Pendaftaran Kursus</span>  <span class="pull-right-container"><i class='fa fa-angle-left pull-right'></i></span></a>
<ul class="treeview-menu">
<li><a href='programreg/index'><i class='fa fa-circle-o'></i> Senarai Permohonan</a></li>
<li><a href='programreg/berdaftar'><i class='fa fa-circle-o'></i> Senarai Pelatih Berdaftar</a></li></ul></li>
</ul>
</li>
	

<!-- lpp09 -->
<li class='treeview ' >
<a href='#'><i class='fa fa-briefcase'></i> <span>Pelatih Lanjutan (LPP09)</span> <span class="pull-right-container"><i class='fa fa-angle-left pull-right'></i></span></a>
<ul class='treeview-menu'>
<li><a href='pelatih_lanjutan/permohonan_baru'><i class='fa fa-circle-o'></i>Permohonan Baru</a></li>

<li><a href="#"><i class='fa fa-circle-o'></i><span>Temuduga</span>  <span class="pull-right-container"><i class='fa fa-angle-left pull-right'></i></span></a>
<ul class="treeview-menu">
<li><a href='pelatih_lanjutan/tetapan_temuduga'><i class='fa fa-circle-o'></i> Tetapan Temuduga</a></li>
<li><a href='pelatih_lanjutan/cetakan_surat_temuduga'><i class='fa fa-circle-o'></i> Cetakan Surat Temuduga</a></li>

<li><a href='pelatih_lanjutan/pendaftaran'><i class='fa fa-circle-o'></i> Pendaftaran Semula</a></li>
<li><a href='pelatih_lanjutan/cetakan_surat_tawaran'><i class='fa fa-circle-o'></i> Cetakan Surat Tawaran</a></li>
<!-- <li><a href='pelatih_lanjutan/pendaftaranb'><i class='fa fa-circle-o'></i> Pendaftaran Program Lain</a></li>--></ul></li>


<!-- PUSAT GIATMARA -->
<li class='treeview ' >
<a href='#'><i class='fa fa-bank'></i> <span>Pusat Giatmara</span> <span class="pull-right-container"><i class='fa fa-angle-left pull-right'></i></span></a>
<ul class='treeview-menu'>
<li><a href='gspel_kewangan/pengurusan_pelatih'><i class='fa fa-circle-o'></i> Pengurusan Pelatih</a></li>
<li><a href='pusat_giatmara/perubahan_potongan_elaun'><i class='fa fa-circle-o'></i> Perubahan Potongan (LPP7A)</a></li>
<li><a href='pusat_giatmara/batal_pelatih'><i class='fa fa-circle-o'></i> Batal Pelatih (LPP08)</a></li>
<li><a href='pusat_giatmara/tukar_giatmara_kursus'><i class='fa fa-circle-o'></i> Tukar GM / Kursus (LPP10)</a>
</ul></li>
	
	
	<?php } else { ?>
	
	<?php } ?>
<li class=''><a href='panel/logout'><i class='fa fa-sign-out'></i> Sign Out	</a></li>

								<li class="header">USEFUL LINKS</li>
								<li>
				<a href="<?php echo base_url();?>" target='_blank'>
					<i class="fa fa-circle-o text-aqua"></i> Frontend Website				</a>
			</li>
</ul>
		</section>
	</aside>
