<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gspel_alumni extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
		$this->load->model('Alumni_model', 'alm');
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
		$this->mPageTitle = "Data Alumni";	
		$this->render('Gspel_alumni/test');
	}
}
