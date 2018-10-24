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
	'site_name' => 'GSPel',

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
			'assets/dist/frontend/lib.min.js',
			'assets/dist/frontend/app.min.js',
			'assets/dist/frontend/jquery_steps/jquery.steps.js',
			'assets/js/readonly.js-master/readonly.js',
			'assets/dist/frontend/jquery_ui/jquery-ui.js',
			'assets/plugins/datatables/jquery.dataTables.min.js',
			'assets/plugins/datatables/dataTables.bootstrap.min.js',
			'assets/plugins/datepicker/bootstrap.datepicker.min.js'
		),
		'foot'	=> array(
		),
	),

	// Default stylesheets to embed at page head
	'stylesheets' => array(
		'screen' => array(
			'assets/dist/frontend/w3.css',
			'assets/dist/frontend/jquery_ui/jquery-ui.css',
			'assets/dist/frontend/lib.min.css',
			'assets/dist/frontend/app.min.css',
			'assets/plugins/datepicker/bootstrap.datepicker.min.css'

		)
	),

	// Default CSS class for <body> tag
	'body_class' => '',

	// Multilingual settings
	'languages' => array(
		'default'		=> 'my',
		'autoload'		=> array('general'),
		'available'		=> array(
			'my' => array(
				'label'	=> 'Malaysia',
				'value'	=> 'malaysia'
			)
			/*,
			'zh' => array(
				'label'	=> '繁體中文',
				'value'	=> 'traditional-chinese'
			),
			'cn' => array(
				'label'	=> '简体中文',
				'value'	=> 'simplified-chinese'
			),
			'es' => array(
				'label'	=> 'Español',
				'value' => 'spanish'
			)
			*/
		)
	),

	// Google Analytics User ID
	'ga_id' => '',

	// Menu items
	'menu' => array(
		'utama' => array(
			'name'		=> 'LAMAN UTAMA',
			'url'		=> '',
		),

		'home' => array(
			'name'		=> 'PERMOHONAN ONLINE',
			'url'		=> 'utama/aplikasi',
		),
  'admin' => array(
			'name'		=> 'LOGIN (KAKITANGAN)',
			'url'		=> 'admin',
		),

	),

	// Login page
	'login_url' => '',

	// Restricted pages
	'page_auth' => array(
	),

	// Email config
	'email' => array(
		'from_email'		=> '',
		'from_name'			=> '',
		'subject_prefix'	=> '',

		// Mailgun HTTP API
		'mailgun_api'		=> array(
			'domain'			=> '',
			'private_api_key'	=> ''
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
$config['sess_cookie_name'] = 'ci_session_frontend';
