<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends MY_Controller
{

	public function __construct()
	{
			parent::__construct();
	}
	
	public function index()
	{
		#$this->load->view('_partials/navbar');
		#$this->load->view('utama');
		#$this->load->view('_partials/footer');
		$this->render('aplikasi');
	}
	
}