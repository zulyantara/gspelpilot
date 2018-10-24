<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| CI Bootstrap 3 Configuration
| -------------------------------------------------------------------------
| This file lets you define default values to be passed into views
| when calling MY_Controller's render() function.
|
| See example and detailed explanation from:
| 	/application/config/ci_bootstrap_example.php
*/

$config['ci_bootstrap'] = array(

	// Site name
	'site_name' => 'GSPEL Admin',

	// Default page title prefix
	'page_title_prefix' => '',

	// Default page title
	'page_title' => '',

	// Default meta data
	'meta_data'	=> array(
		'author'		=> '',
		'description'	=> '',
		'keywords'		=> ''
	),

	// Default scripts to embed at page head or end
	'scripts' => array(
		'head'	=> array(
			'assets/dist/admin/adminlte.min.js',
			'assets/dist/admin/lib.min.js',
			'assets/dist/admin/app.min.js',
			'assets/dist/frontend/jquery_ui/jquery-ui.js',
			'assets/plugins/timepicker/bootstrap-timepicker.min.js',
			'assets/plugins/datatables/jquery.dataTables.min.js',
			'assets/plugins/datatables/dataTables.bootstrap.min.js'
		),
		'foot'	=> array(
		),
	),

	// Default stylesheets to embed at page head
	'stylesheets' => array(
		'screen' => array(
			'assets/dist/admin/adminlte.min.css',
			'assets/dist/admin/lib.min.css',
			'assets/dist/admin/app.min.css',
			'assets/dist/frontend/jquery_ui/jquery-ui.css',
			'assets/plugins/timepicker/bootstrap-timepicker.min.css',
			'assets/plugins/datatables/jquery.dataTables.min.css',
			//'assets/plugins/datatables/dataTables.bootstrap.min.css'

		)
	),

	// Default CSS class for <body> tag
	'body_class' => '',

	// Multilingual settings
	'languages' => array(
	),

	// Menu items
	'menu' => array(
		'home' => array(
			'name'		=> 'Home',
			'url'		=> '',
			'icon'		=> 'fa fa-home',
		),
		'pelatih_baru' => array(
			'name' => 'Pelatih Baru (LPP04)',
			'url' => 'pelatih_baru',
			'icon' => 'fa fa-briefcase',
			'children' => array(
				'Permohonan Baru' => 'lpp04/permohonan_baru',
				'Temuduga' => array(
					'Tetapan Temuduga' => 'lpp04/tetapan_temuduga',
					'Cetakan Surat Temuduga' => "lpp04/cetakan_surat_temuduga",
					"Keputusan Temuduga" => "lpp04/keputusan_temuduga",
					"Senarai Gagal Temuduga" => "lpp04/senarai_gagal_temuduga"
				),
				'Tawaran Kursus' => array(
					'Tetapan Tawaran' => 'lpp04/tetapan_tawaran',
					'Cetakan Surat Tawaran' => "lpp04/cetakan_surat_tawaran"
				),
				'Pendaftaran Kursus' => array(
					'Senarai Permohonan' => 'lpp04/tetapan_temuduga',
					'Pengesahan Pendaftaran' => "lpp04/cetakan_surat_temuduga",
					"Pengesahan Pendaftaran Oleh Pengurus" => "lpp04/keputusan_temuduga",
					"Senarai Pelatih Berdaftar" => "lpp04/senarai_gagal_temuduga"
				)
			)
		),
		'gspel_pelatih' => array(
			'name'		=> 'Modul Pelatih',
			'url'		=> 'gspel_pelatih',
			'icon'		=> 'fa fa-briefcase',
			'children'  => array(
				//'Dashboard'					=> 'gspel_pelatih',
				'Butir Pribadi'			=> 'gspel_pelatih/pribadi',
				'Maklumat Am'				=> 'gspel_pelatih/maklumat',
				'Kursus Pilihan'		=> 'gspel_pelatih/kursus',
				'Maklumat Penjaga'	=> 'gspel_pelatih/penjaga',
				'Butir Pribadi'			=> 'gspel_pelatih/pribadi',
				'Tempat Tinggal'		=> 'gspel_pelatih/tempat',
				'Cetak Permohonan'		=> 'gspel_pelatih/cetak'
			)
		),
  'gspel_kurikulum' => array(
			'name'		=> 'Modul Kurikurum',
			'url'		=> 'gspel_kurikulum',
			'icon'		=> 'fa fa-calendar-o',
			'children'  => array(
                'Pemarkahan'			=> 'gspel_kurikulum/trainer2',
                    'Assessment Marking'		=> 'gspel_kurikulum/trainer',
                    'Assessment Mark Approval'	=> 'gspel_kurikulum/approval',
                    'Certificate'				=> 'gspel_kurikulum/certificate',
                    'Assessment Marking Status'	=> 'gspel_kurikulum/status',
                'Pengesahan Sijil'		=> 'gspel_kurikulum/sijil',
				'Cetakan Pukal'			=> 'gspel_kurikulum/certificate',
	    		'Arkib Sijil'			=> 'gspel_kurikulum/arkib',
	    		'Status Pemarkahan'		=> 'gspel_kurikulum/pemarkahan',
				'Permohonan Modul'		=> 'gspel_kurikulum/modul',
    			'Konfigurasi Kurikulum'	=> '#',
		),
	),
	'gspel_kurikulum_branch' => array(
			'name'		=> 'Modul Kurikurum Manager',
			'url'		=> 'gspel_kurikulum_branch',
			'icon'		=> 'fa fa-calendar-o',
			'children'  => array(
				'Pengesahan Pengurus'	=> 'gspel_kurikulum/approval',
			//	'sub'=> 'gspel_kurikulum/approval2',
		),
	),
	'gspel_kurikulum_pbn' => array(
			'name'		=> 'Modul Kurikurum PBN',
			'url'		=> 'gspel_kurikulum_pbn',
			'icon'		=> 'fa fa-calendar-o',
			'children'  => array(
				'Pengesahan PBN'		=> 'gspel_kurikulum/pbn',
			),
	),

	'gspel_kurikulum_ppkl' => array(
			'name'		=> 'Modul Kurikulum PBKL',
			'url'		=> 'gspel_kurikulum_ppkl',
			'icon'		=> 'fa fa-calendar-o',
			'children'  => array(
				'Pengesahan PBKL'	=> 'gspel_kurikulum/ppkl',
			),
	),
	'gspel_kurikulum_certificate' => array(
			'name'		=> 'Modul Kurikulum Certificate',
			'url'		=> 'gspel_kurikulum_certificate',
			'icon'		=> 'fa fa-calendar-o',
			'children'  => array(
				'Certificate'	=> 'gspel_kurikulum/certificate',
			),
	),
	'gspel_kurikulum_status' => array(
			'name'		=> 'Modul Kurikulum Status',
			'url'		=> 'gspel_kurikulum_status',
			'icon'		=> 'fa fa-calendar-o',
			'children'  => array(
				'Status Penilaian'	=> 'gspel_kurikulum/status',
			),
	),
  'gspel_kewangan' => array(
			'name'		=> 'Modul Kewangan',
			'url'		=> 'gspel_kewangan',
			'icon'		=> 'fa fa-bank',
			'children'  => array(
			'Dashboard'			=> 'gspel_kewangan',
    'Test'			=> 'gspel_kewangan/test',
			)
		),
  'gspel_manusia' => array(
			'name'		=> 'Modul Sumber Manusia',
			'url'		=> 'gspel_manusia',
			'icon'		=> 'fa fa-users',
			'children'  => array(
				'Seranai Anggota '		=> 'gspel_manusia',
    		'Memangku Tugas'			=> 'gspel_manusia/tugas',
				'Pengurusan Jawatan'	=> 'gspel_manusia/jawatan',
    		'Pengurusan Jabatan'	=> 'gspel_manusia/jabatan',
				'Pengurusan Gred '		=> 'gspel_manusia/gred',
				'Pengurusan Status '	=> 'gspel_manusia/status',
				'Pengurusan Jenis Staff '	=> 'gspel_manusia/staff',
			)
		),

  'gspel_alumni' => array(
			'name'		=> 'Modul Alumni',
			'url'		=> 'gspel_alumni',
			'icon'		=> 'fa fa-user',
			'children'  => array(
				'Dashboard'			=> 'gspel_alumni',
				'Test' => 'gspel_alumni/test',
			)
		),

  'gspel_laporan' => array(
			'name'		=> 'Modul Laporan',
			'url'		=> 'gspel_laporan',
			'icon'		=> 'fa fa-line-chart',
			'children'  => array(
				'Dashboard'			=> 'gspel_laporan',
    'Test'			=> 'gspel_laporan/test',

			)
		),
  'user' => array(
		'auth'		=> array('webmaster', 'admin'),
			'name'		=> 'Users',
			'url'		=> 'user',
			'icon'		=> 'fa fa-users',
			'children'  => array(
				'List'			=> 'user',
				'Create'		=> 'user/create',
				'User Groups'	=> 'user/group',
			)
		),
		'panel' => array(
			'auth'		=> array('webmaster', 'admin'),
			'name'		=> 'Admin Panel',
			'url'		=> 'panel',
			'icon'		=> 'fa fa-cog',
			'children'  => array(
				'Admin Users'			=> 'panel/admin_user',
				'Create Admin User'		=> 'panel/admin_user_create',
				'Admin User Groups'		=> 'panel/admin_user_group',
			)
		),
		'util' => array(
			'auth'		=> array('webmaster', 'admin'),
			'name'		=> 'Utilities',
			'url'		=> 'util',
			'icon'		=> 'fa fa-cogs',
			'children'  => array(
				'Database Versions'		=> 'util/list_db',
			)
		),
		'blog' => array(
			'auth'		=> array('webmaster', 'admin'),
			'name'		=> 'Blog',
			'url'		=> 'blog',
			'icon'		=> 'ion ion-edit',	// can use Ionicons instead of FontAwesome
			'children'  => array(
				'Blog Posts'		=> 'blog/post',
				'Blog Categories'	=> 'blog/category',
				'Blog Tags'			=> 'blog/tag',
			)
		),
		'cover_photo' => array(
			'auth'		=> array('webmaster', 'admin'),
			'name'		=> 'Cover Photos',
			'url'		=> 'cover_photo',
			'icon'		=> 'ion ion-image',	// can use Ionicons instead of FontAwesome
		),
		'logout' => array(
			'name'		=> 'Sign Out',
			'url'		=> 'panel/logout',
			'icon'		=> 'fa fa-sign-out',
		)
	),

	// Login page
	'login_url' => 'admin/login',

	// Restricted pages
	'page_auth' => array(
		'gspel_kurikulum_branch' => array('webmaster', 'branch manager'),
		'gspel_kurikulum_ppkl' => array('webmaster', 'ppkl_officer'),
		'gspel_kurikulum_pbn' => array('webmaster', 'state officer'),
		'gspel_kurikulum_certificate' => array('webmaster', 'ppkl_officer'),
		'gspel_kurikulum_status' => array('webmaster', 'ppkl_officer', 'branch manager', 'state officer'),
		'user/create'				=> array('webmaster', 'admin', 'manager'),
		'user/group'				=> array('webmaster', 'admin', 'manager'),
		'panel'						=> array('webmaster'),
		'panel/admin_user'			=> array('webmaster'),
		'panel/admin_user_create'	=> array('webmaster'),
		'panel/admin_user_group'	=> array('webmaster'),
		'util'						=> array('webmaster'),
		'util/list_db'				=> array('webmaster'),
		'util/backup_db'			=> array('webmaster'),
		'util/restore_db'			=> array('webmaster'),
		'util/remove_db'			=> array('webmaster'),
		'pelatih_baru' => array("webmaster", 'branch manager', 'branch_executive'),
		'gspel_pelatih'			=> array('webmaster'),
        'gspel_kurikulum'			=> array('webmaster','trainer'),
		'gspel_kewangan'			=> array('webmaster'),
		'gspel_manusia'			=> array('webmaster'),
		'gspel_alumni'			=> array('webmaster'),
		'gspel_laporan'			=> array('webmaster'),
                         #'blog' 	=> array('webmaster'),
                         #'cover_photo' => array('webmaster'),
                         #'util'  => array('webmaster'),
                         #'user' => array('webmaster'),
	),

	// AdminLTE settings
	'adminlte' => array(
		'body_class' => array(
			'webmaster'	=> 'skin-red',
			'admin'		=> 'skin-purple',
			'manager'	=> 'skin-black',
			'staff'		=> 'skin-blue',
            'branch manager'	=> 'skin-black',
			'branch executive'	=> 'skin-green',
			'trainer'		=> 'skin-blue',
			'ppkl_officer'		=> 'skin-purple',
			'state officer'		=> 'skin-purple',
		)
	),

	// Useful links to display at bottom of sidemenu
	'useful_links' => array(
		array(
			'auth'		=> array('webmaster', 'admin', 'manager', 'state officer'),
		//	'name'		=> 'Frontend Website',
			'url'		=> 'admin/Gspel_kurikulum/ppkl2',
			'target'	=> '_blank',
			'color'		=> 'text-aqua'
		),
		array(
			'auth'		=> array('webmaster', 'admin', 'manager', 'staff','trainer'),
			'name'		=> 'Frontend Website',
			'url'		=> '',
			'target'	=> '_blank',
			'color'		=> 'text-aqua'
		),
		array(
			'auth'		=> array('webmaster', 'admin'),
			'name'		=> 'API Site',
			'url'		=> 'api',
			'target'	=> '_blank',
			'color'		=> 'text-orange'
		),
		array(
			'auth'		=> array('webmaster', 'admin', 'manager', 'staff'),
			'name'		=> 'Github Repo',
			'url'		=> CI_BOOTSTRAP_REPO,
			'target'	=> '_blank',
			'color'		=> 'text-green'
		),

	),

	// Debug tools
	'debug' => array(
		'view_data'	=> FALSE,
		'profiler'	=> FALSE
	),
);

/*
| -------------------------------------------------------------------------
| Override values from /application/config/config.php
| -------------------------------------------------------------------------
*/
$config['sess_cookie_name'] = 'ci_session_admin';
