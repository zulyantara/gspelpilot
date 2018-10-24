<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gspel_laporan extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
	}
	
	public function index()
	{
		$this->load->model('user_model', 'users');
		$this->mViewData['count'] = array(
			'users' => $this->users->count_all(),
		);
		$this->render('home');
	}
	
	public function test()
	{
		$this->mPageTitle = "Test";	
		$this->render('gspel_pelatih/test');
	}
}
