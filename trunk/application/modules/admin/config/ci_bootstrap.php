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
	'page_title' => 'GSPEL',

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
			'assets/plugins/datatables/jquery.dataTables.min.js',
			'assets/plugins/datatables/dataTables.bootstrap.min.js',
			'assets/dist/frontend/jquery_validate/jquery.validate.min.js',
			'assets/plugins/timepicker/bootstrap-timepicker.min.js',
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
			'assets/dist/admin/error_style.css',
			'assets/default/css/my-style.css'
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

		"status_permohonan" => array(
			"name" => "Status Permohonan",
			"url" => "lpp04/status_permohonan",
			"icon" => "fa fa-briefcase"
		),

		"status_pelatih" => array(
			"name" => "Status Pelatih Berdaftar",
			"url" => "lpp04/status_pelatih",
			"icon" => "fa fa-briefcase"
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

		'pelatih_baru_admin' => array(
			'name' => 'Pelatih Baru (LPP04)',
			'url' => 'pelatih_baru_admin',
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
					'Tetapan Tawaran' => 'lpp04/programme_offering',
					'Cetakan Surat Tawaran' => "lpp04/luluskan"
				),
				'Pendaftaran Kursus' => array(
					'Senarai Permohonan' => 'programreg/index',
					'Pengesahan Data' => "programreg/pengesahan",
					"Pengesahan Pendaftaran" => "programreg/pengurus",
					"Senarai Pelatih Berdaftar" => "programreg/berdaftar"
				),
				#'Programme Offering' => array(
				#	'Screen 1' => 'lpp04/programme_offering',
				#	'Screen 2 & 3' => "lpp04/luluskan"
				#)
			)
		),


		'pelatih_baru_tp' => array(
			'name' => 'Pelatih Baru (LPP04)',
			'url' => 'pelatih_baru_tp',
			'icon' => 'fa fa-briefcase',
			'children' => array(
				'Permohonan Baru' => 'lpp04/permohonan_baru',
				'Temuduga' => array(
					"Keputusan Temuduga" => "lpp04/keputusan_temuduga",
					"Senarai Gagal Temuduga" => "lpp04/senarai_gagal_temuduga"
				),
				'Pendaftaran Kursus' => array(
					"Senarai Pelatih Berdaftar" => "programreg/berdaftar"
				),
			)
		),

		'pelatih_baru_peu' => array(
			'name' => 'Pelatih Baru (LPP04)',
			'url' => 'pelatih_baru_peu',
			'icon' => 'fa fa-briefcase',
			'children' => array(
				'Permohonan Baru' => 'lpp04/permohonan_baru',
				'Temuduga' => array(
					'Tetapan Temuduga' => 'lpp04/tetapan_temuduga',
					'Cetakan Surat Temuduga' => "lpp04/cetakan_surat_temuduga",
				),
				'Tawaran Kursus' => array(
					'Tetapan Tawaran' => 'lpp04/programme_offering',
					'Cetakan Surat Tawaran' => "lpp04/luluskan"
				),
				'Pendaftaran Kursus' => array(
					'Senarai Permohonan' => 'programreg/index',
					'Pengesahan Data' => "programreg/pengesahan",
					"Senarai Pelatih Berdaftar" => "programreg/berdaftar"
				),
			)
		),

		'pelatih_lanjutan' => array(
			'name' => 'Pelatih Lanjutan (LPP09)',
			'url' => 'pelatih_lanjutan',
			'icon' => 'fa fa-briefcase',
			'children' => array(
				'Permohonan LPP09' => 'pelatih_lanjutan/permohonan_baru',
				'Temuduga' => array(
					'Tetapan Temuduga' => 'pelatih_lanjutan/tetapan_temuduga',
					'Cetakan Surat Temuduga' => 'pelatih_lanjutan/cetakan_surat_temuduga',
					'Keputusan Temuduga' => 'pelatih_lanjutan/keputusan_temuduga',
					'Senarai Gagal Temuduga' => 'pelatih_lanjutan/gagal_temuduga',
				),
				'Kelulusan Permohonan' => "pelatih_lanjutan/kelulusan_permohonan",
				'Pendaftaran Semula' => "pelatih_lanjutan/pendaftaran",
				// 'Pendaftaran Tawaran Terus' => "pelatih_lanjutan/pendaftaranb",
				// 'Senarai Pendaftar Program Lain' => "pelatih_lanjutan/senaraib"
				// 'Kelulusan Tawaran Terus' => "pelatih_lanjutan/kelulusan_permohonan_2"
				"Cetakan Surat Tawaran" => "pelatih_lanjutan/cetakan_surat_tawaran",
				"Senarai Permohonan" => "pelatih_lanjutan/senarai_permohonan"
			)
		),

		'pelatih_lanjutan_peu' => array(
			'name' => 'Pelatih Lanjutan (LPP09)',
			'url' => 'pelatih_lanjutan_peu',
			'icon' => 'fa fa-briefcase',
			'children' => array(
				'Permohonan LPP09' => 'pelatih_lanjutan/permohonan_baru',
				'Temuduga' => array(
					'Tetapan Temuduga' => 'pelatih_lanjutan/tetapan_temuduga',
					'Cetakan Surat Temuduga' => 'pelatih_lanjutan/cetakan_surat_temuduga',

				),

				'Pendaftaran Semula' => "pelatih_lanjutan/pendaftaran",

				"Cetakan Surat Tawaran" => "pelatih_lanjutan/cetakan_surat_tawaran",

				"Senarai Permohonan" => "pelatih_lanjutan/senarai_permohonan"
			)
		),



		'pelatih_lanjutan_tp' => array(
			'name' => 'Pelatih Lanjutan (LPP09)',
			'url' => 'pelatih_lanjutan_tp',
			'icon' => 'fa fa-briefcase',
			'children' => array(
				'Temuduga' => array(
					'Keputusan Temuduga' => 'pelatih_lanjutan/keputusan_temuduga',
					'Senarai Gagal Temuduga' => 'pelatih_lanjutan/gagal_temuduga',
				),
			)
		),

		'pelatih_lanjutan_gm' => array(
			'name' => 'Pelatih Lanjutan (LPP09)',
			'url' => 'pelatih_lanjutan_gm',
			'icon' => 'fa fa-briefcase',
			'children' => array(
				'Temuduga' => array(
					'Tetapan Temuduga' => 'pelatih_lanjutan/tetapan_temuduga',
					'Cetakan Surat Temuduga' => 'pelatih_lanjutan/cetakan_surat_temuduga',
					'Keputusan Temuduga' => 'pelatih_lanjutan/keputusan_temuduga',
					'Senarai Gagal Temuduga' => 'pelatih_lanjutan/gagal_temuduga',
				),
				'Pendaftaran Semula' => "pelatih_lanjutan/pendaftaran",
				"Cetakan Surat Tawaran" => "pelatih_lanjutan/cetakan_surat_tawaran"
			)
		),

		'pelatih_lanjutan_admin' => array(
			'name' => 'Pelatih Lanjutan (LPP09)',
			'url' => 'pelatih_lanjutan_admin',
			'icon' => 'fa fa-briefcase',
			'children' => array(
				'Temuduga' => array(
					'Tetapan Temuduga' => 'pelatih_lanjutan/tetapan_temuduga',
					'Cetakan Surat Temuduga' => 'pelatih_lanjutan/cetakan_surat_temuduga',
					'Keputusan Temuduga' => 'pelatih_lanjutan/keputusan_temuduga',
					'Senarai Gagal Temuduga' => 'pelatih_lanjutan/gagal_temuduga',
				),
				'Kelulusan Permohonan' => "pelatih_lanjutan/kelulusan_permohonan",
				'Pendaftaran Semula' => "pelatih_lanjutan/pendaftaran",
				"Cetakan Surat Tawaran" => "pelatih_lanjutan/cetakan_surat_tawaran",
				"Senarai Permohonan" => "pelatih_lanjutan/senarai_permohonan"
			)
		),

  	'gspel_kurikulum' => array(
			'name'		=> 'Kurikulum',
			'url'		=> 'gspel_kurikulum',
			'icon'		=> 'fa fa-calendar-o',
			'children'  => array(
     	 	'Pemarkahan'=> 'gspel_kurikulum/trainer2',
     	 	'Status Penghantaran'	=> 'gspel_kurikulum/statustrainer',
       		),
		),

	'gspel_kurikulum_branch' => array(
			'name'		=> 'Kurikulum',
			'url'		=> 'gspel_kurikulum_branch',
			'icon'		=> 'fa fa-calendar-o',
			'children'  => array(
			'Pengesahan Pengurus'	=> 'gspel_kurikulum/approval',
			'Status Penghantaran'	=> 'gspel_kurikulum/statuspengurus',
		),
	),

	'gspel_kurikulum_pbn' => array(
			'name'		=> 'Kurikulum',
			'url'		=> 'gspel_kurikulum_pbn',
			'icon'		=> 'fa fa-calendar-o',
			'children'  => array(
				'Pengesahan PGN'		=> 'gspel_kurikulum/pbn',
				'Status Penghantaran'	=> 'gspel_kurikulum/statuspgn',
			),
	),

	'gspel_kurikulum_ppkl' => array(
			'name'		=> 'Kurikulum',
			'url'		=> 'gspel_kurikulum_ppkl',
			'icon'		=> 'fa fa-calendar-o',
			'children'  => array(
				'Pengesahan PBKL'	=> 'gspel_kurikulum/ppkl',
				'Pengeluaran Persijilan' => 'gspel_kurikulum/certificate',
				'Status Penghantaran'	=> 'gspel_kurikulum/status',

			),
	),


	'konfigurasi_kurikulum_ppkl' => array(
			'name'		=> 'Konfigurasi Kurikulum',
			'url'		=> 'konfigurasi_kurikulum_ppkl',
			'icon'		=> 'fa fa-calendar-o',
			'children'  => array(

					'Pengurusan Kluster' => 'konfigurasi_kurikulum/aturkluster',
					'Pengurusan Kursus' => 'konfigurasi_kurikulum/aturkursus',
					'Pengurusan Modul' => 'konfigurasi_kurikulum/aturmodul',
					'Pengurusan Tawaran Kursus' => 'Konfigurasi_kurikulum/aturtawaran',

			),
	),

	'konfigurasi_kurikulum_pel' => array(
			'name'		=> 'Konfigurasi Kurikulum',
			'url'		=> 'konfigurasi_kurikulum_pel',
			'icon'		=> 'fa fa-calendar-o',
			'children'  => array(
					'Pengurusan Sesi' => 'Konfigurasi_kurikulum/atursesi',
					//'Pengurusan Tawaran Kursus' => 'Konfigurasi_kurikulum/aturtawaran',

			),
	),


	'gspel_kurikulum_admin' => array(
			'name'		=> 'Kurikulum',
			'url'		=> 'gspel_kurikulum_admin',
			'icon'		=> 'fa fa-calendar-o',
			'children'  => array(
				'Pemarkahan'=> 'gspel_kurikulum/trainer2',
				'Pengesahan'	=> 'gspel_kurikulum/ppkl',
				'Pengeluaran Persijilan' => 'gspel_kurikulum/certificate',
				'Status Penghantaran'	=> 'gspel_kurikulum/status',

			),
	),

	'konfigurasi_kurikulum_admin' => array(
			'name'		=> 'Konfigurasi Kurikulum',
			'url'		=> 'gspel_kurikulum_admin',
			'icon'		=> 'fa fa-calendar-o',
			'children'  => array(
				'Pengurusan Ketua Kluster' => 'konfigurasi_kurikulum/aturketuakluster',
				'Pengurusan Kluster' => 'konfigurasi_kurikulum/aturkluster',
				'Pengurusan Kursus' => 'konfigurasi_kurikulum/aturkursus',
				'Pengurusan Modul' => 'konfigurasi_kurikulum/aturmodul',
				'Pengurusan Tawaran Kursus' => 'Konfigurasi_kurikulum/aturtawaran',
				'Pengurusan Sesi' => 'Konfigurasi_kurikulum/atursesi',

			),
	),


  'gspel_kewangan' => array(
			'name'		=> 'Kewangan',
			'url'		=> 'gspel_kewangan',
			'icon'		=> 'fa fa-bank',
			'children'  => array(
//	 'Pengurusan Pelatih'			=> 'gspel_kewangan/pengurusan_pelatih',
   'Penjanaan LPP04'			=> 'gspel_kewangan/penjanaan_lpp04',
   'Penjanaan LPP5A'			=> 'gspel_kewangan/penjanaan_lpp5a',
   'Penjanaan LPP5B'			=> 'gspel_kewangan/penjanaan_lpp5b',
   'Penjanaan LPP5D'			=> 'gspel_kewangan/penjanaan_lpp5d',
   'Penjanaan LPP06'			=> 'gspel_kewangan/penjanaan_lpp06',
//   'Batal Pelatih (LPP08)' => 'gspel_kewangan/batal_pelatih',
//   'Perubahan Potongan (LPP7A)' => 'gspel_kewangan/perubahan_potongan_elaun',
   'Penjanaan LPP7A'			=> 'gspel_kewangan/penjanaan_lpp7a',
   'Penjanaan LPP08'			=> 'gspel_kewangan/penjanaan_lpp08',
   'Penjanaan LPP09' => 'gspel_kewangan/penjanaan_lpp09',
//   'Tukar GM / Kursus (LPP10)' => 'gspel_kewangan/tukar_giatmara_kursus',
   'Penjanaan LPP10'			=> 'gspel_kewangan/penjanaan_lpp10',
                            'Arkib' => array(
                                'Penjanaan LPP04' => 'gspel_kewangan/hpenjanaan_lpp04',
                                'Penjanaan LPP5A' => 'gspel_kewangan/hpenjanaan_lpp5a',
                                'Penjanaan LPP5B' => 'gspel_kewangan/hpenjanaan_lpp5b',
                                'Penjanaan LPP5D' => 'gspel_kewangan/hpenjanaan_lpp5d',
                                'Penjanaan LPP06' => 'gspel_kewangan/hpenjanaan_lpp06',
                                'Penjanaan LPP7A' => 'gspel_kewangan/hpenjanaan_lpp7a',
                                'Penjanaan LPP08' => 'gspel_kewangan/hpenjanaan_lpp08',
								'Penjanaan LPP09' => 'gspel_kewangan/hpenjanaan_lpp09',
                                'Penjanaan LPP10' => 'gspel_kewangan/hpenjanaan_lpp10'
                                )
		)
	),

  'pusat_giatmara' => array(
			'name'		=> 'Pusat GIATMARA',
			'url'		=> 'pusat_giatmara',
			'icon'		=> 'fa fa-bank',
			'children'  => array(
   'Pengurusan Pelatih'		=> 'pusat_giatmara/pengurusan_pelatih',
//   'Penjanaan LPP5A'			=> 'gspel_kewangan/penjanaan_lpp5a',
//   'Penjanaan LPP5B'			=> 'gspel_kewangan/penjanaan_lpp5b',
//   'Penjanaan LPP5D'			=> 'gspel_kewangan/penjanaan_lpp5d',
//   'Penjanaan LPP06'			=> 'gspel_kewangan/penjanaan_lpp06',
//   'Perubahan Potongan Elaun (LPP7A)'	=> 'pusat_giatmara/perubahan_potongan_elaun',
   'Perubahan Potongan (LPP7A)' => 'pusat_giatmara/perubahan_potongan_elaun',
   'Batal Pelatih (LPP08)' 		=> 'pusat_giatmara/batal_pelatih',
//   'Penjanaan LPP7A'			=> 'gspel_kewangan/penjanaan_lpp7a',
//   'Penjanaan LPP08'			=> 'gspel_kewangan/penjanaan_lpp08',
   'Tukar GM / Kursus (LPP10)' 		=> 'pusat_giatmara/tukar_giatmara_kursus',
//   'Penjanaan LPP10'			=> 'gspel_kewangan/penjanaan_lpp10'
			)
		),

  'gspel_manusia' => array(
			'name'		=> 'Sumber Manusia',
			'url'		=> 'gspel_manusia',
			'icon'		=> 'fa fa-users',
			'children'  => array(
				'Senarai & Status Anggota '		=> 'gspel_manusia',
    			//'Memangku Tugas'			=> 'gspel_manusia/tugas',
				'Konfigurasi Jawatan'	=> 'gspel_manusia/jawatan',
    			'Konfigurasi Jabatan'	=> 'gspel_manusia/jabatan',
				'Konfigurasi Gred '		=> 'gspel_manusia/gred',
				'Konfigurasi Status '	=> 'gspel_manusia/status',
				'Konfigurasi Jenis Staff '	=> 'gspel_manusia/staff',
			)
		),

  // 'gspel_alumni2' => array(
		// 	'name'		=> 'Modul Alumni',
		// 	'url'		=> 'gspel_alumni',
		// 	'icon'		=> 'fa fa-user',
		// 	'children'  => array(
		// 		'Dashboard'			=> 'gspel_alumni/test',
		// 		//'Test' => 'gspel_alumni/test',
		// 	)
		// ),

  // 'gspel_laporan' => array(
		// 	'name'		=> 'Modul Laporan',
		// 	'url'		=> 'gspel_laporan',
		// 	'icon'		=> 'fa fa-line-chart',
		// 	'children'  => array(
		// 		'Dashboard'			=> 'gspel_laporan',
  //   'Test'			=> 'gspel_laporan/test',

		// 	)
		// ),
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

	'lpp04/status_permohonan' => array('webmaster','trainer','branch executive','branch manager','pelatih officer','admin'),
	'lpp04/status_pelatih' => array('webmaster','trainer','branch executive','branch manager','pelatih officer','ppkl_officer', 'state officer','finance officer','HR Officer','admin'),

	'pelatih_baru_admin' => array('webmaster','branch manager','pelatih officer', 'state officer', "admin"),
	'pelatih_baru_tp' => array('webmaster','trainer'),
	'pelatih_baru_peu' => array('webmaster','branch executive'),

	'pelatih_lanjutan_tp'    => array('webmaster','trainer'),
	'pelatih_lanjutan'       => array('webmaster','state officer','pelatih officer'),
	'pelatih_lanjutan_peu'   => array('webmaster','branch executive'),
	'pelatih_lanjutan_gm'    => array('webmaster','branch manager'),
	'pelatih_lanjutan_admin' => array('webmaster','admin'),

	'gspel_kurikulum'				=> array('webmaster','trainer'),
	'gspel_kurikulum_branch'=> array('branch manager','webmaster'),
		'gspel_kurikulum_ppkl' 	=> array('webmaster', 'ppkl_officer'),
		'gspel_kurikulum_pbn'		=> array('webmaster', 'state officer'),
		'gspel_kurikulum_admin'		=> array("admin"),
		'konfigurasi_kurikulum_pel'       => array('webmaster','pelatih officer'),
		'konfigurasi_kurikulum_ppkl'       => array('webmaster','ppkl_officer','ketua kluster'),
		'konfigurasi_kurikulum_admin'       => array("admin"),
		//'gspel_kurikulum_executive' => array('webmaster','branch executive'),

		'user'						=> array('webmaster', 'admin'),
		'user/create'						=> array('webmaster', 'admin'),
		'user/group'						=> array('webmaster', 'admin'),
		'panel'									=> array('webmaster','admin'),
		'panel/admin_user'			=> array('webmaster','admin'),
		'panel/admin_user_create'	=> array('webmaster','admin'),
		'panel/admin_user_group'	=> array('webmaster','admin'),
		'util'									=> array('webmaster'),
		'util/list_db'					=> array('webmaster'),
		'util/backup_db'				=> array('webmaster'),
		'util/restore_db'				=> array('webmaster'),
		'util/remove_db'				=> array('webmaster'),

		'gspel_pelatih'					=> array('webmaster'),


		'gspel_kewangan'				=> array('webmaster','finance officer','admin'),
//		   			'gspel_kewangan/pengurusan_pelatih' => array('webmaster','finance officer'),
			'gspel_kewangan/penjanaan_lpp5a' => array('webmaster','finance officer','admin'),
            'gspel_kewangan/penjanaan_lpp04' => array('webmaster','finance officer','admin'),
            'gspel_kewangan/penjanaan_lpp5b' => array('webmaster','finance officer','admin'),
            'gspel_kewangan/penjanaan_lpp5d' => array('webmaster','finance officer','admin'),
            'gspel_kewangan/penjanaan_lpp06' => array('webmaster','finance officer','admin'),
//            'gspel_kewangan/perubahan_potongan_elaun' => array('webmaster','finance officer'),
            'gspel_kewangan/penjanaan_lpp7a' => array('webmaster','finance officer','admin'),
            'gspel_kewangan/penjanaan_lpp08' => array('webmaster','finance officer','admin'),
            'gspel_kewangan/penjanaan_lpp10' => array('webmaster', 'finance officer','admin'),
            'gspel_kewangan/hpenjanaan_lpp04' => array('webmaster','finance officer','admin'),
            'gspel_kewangan/hpenjanaan_lpp5a' => array('webmaster','finance officer','admin'),
            'gspel_kewangan/hpenjanaan_lpp5b' => array('webmaster','finance officer','admin'),
            'gspel_kewangan/hpenjanaan_lpp5d' => array('webmaster','finance officer','admin'),
            'gspel_kewangan/hpenjanaan_lpp06' => array('webmaster','finance officer','admin'),
            'gspel_kewangan/hpenjanaan_lpp7a' => array('webmaster','finance officer','admin'),
            'gspel_kewangan/hpenjanaan_lpp08' => array('webmaster','finance officer','admin'),
            'gspel_kewangan/hpenjanaan_lpp10' => array('webmaster', 'finance officer','admin'),

		'pusat_giatmara' => array('webmaster','branch executive','branch manager','admin','pelatih officer','state officer'),
        'pusat_giatmara/pengurusan_pelatih' => array('webmaster','branch executive','branch manager','admin','pelatih officer','state officer'),
        'pusat_giatmara/perubahan_potongan_elaun' => array('webmaster','branch executive','branch manager','admin','pelatih officer','state officer'),
        'pusat_giatmara/batal_pelatih' => array('webmaster','branch executive','branch manager','admin','pelatih officer','state officer'),
        'pusat_giatmara/tukar_giatmara_kursus' => array('webmaster','branch executive','branch manager','admin','pelatih officer','state officer'),


		'gspel_manusia'				=> array('HR Officer','admin'),
		// 'gspel_alumni'				=> array('webmaster','branch executive','branch manager','trainer'),

		// 'gspel_laporan'				=> array('webmaster'),
                         #'blog' 	=> array('webmaster'),
                         #'cover_photo' => array('webmaster'),
                         #'util'  => array('webmaster'),
                         #'user' => array('webmaster'),
	),

	// AdminLTE settings
	'adminlte' => array(
		'body_class' => array(
			'webmaster'	=> 'skin-blue',
			'admin'		=> 'skin-blue',
			'manager'	=> 'skin-blue',
			'staff'		=> 'skin-blue',
      		'branch manager'	=> 'skin-blue',
			'branch executive'	=> 'skin-blue',
			'trainer'		=> 'skin-blue',
			'ppkl_officer'		=> 'skin-blue',
			'state officer'		=> 'skin-blue',
			'pelatih officer'		=> 'skin-blue',
			'finance officer'		=> 'skin-blue',
		)
	),

	// Useful links to display at bottom of sidemenu
	'useful_links' => array(
		#array(
		#	'auth'		=> array('webmaster', 'admin', 'manager', 'state officer'),
		//	'name'		=> 'Frontend Website',
		#	'url'		=> 'admin/Gspel_kurikulum/ppkl2',
		#	'target'	=> '_blank',
		#	'color'		=> 'text-aqua'
		#),
		array(
			'auth'		=> array('webmaster', 'admin', 'manager', 'staff','trainer','finance officer','branch executive','ppkl_officer','state officer','pelatih officer','branch manager'),
			'name'		=> 'Frontend Website',
			'url'		=> '',
			'target'	=> '_blank',
			'color'		=> 'text-aqua'
		),
		array(
			'auth'		=> array('webmaster'),
			'name'		=> 'API Site',
			'url'		=> 'api',
			'target'	=> '_blank',
			'color'		=> 'text-orange'
		),
		array(
			'auth'		=> array('webmaster'),
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
