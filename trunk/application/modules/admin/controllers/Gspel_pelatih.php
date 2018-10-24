<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gspel_pelatih extends Admin_Controller {

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

	public function pribadi()
	{

		$this->load->library('Grocery_CRUD_MultiSearch');
		$crud = $this->generate_crud('permohonan_butir_peribadi');
		$crud->set_subject('Butir Pribadi');
		$crud->columns('no_mykad', 'nama_penuh', 'tarikh_lahir','kewarganegaraan','umur','no_telefon','no_hp','alamat','poskod','emel','bangsa','etnik',
		'agama','taraf_perkahwinan','kategori_kelulusan','kelulusan','matlamat','kategori_pemohon','no_rujukan_permohonan','pengesahan','pengakuan','tarikh_hantar');
		$crud->set_relation('kewarganegaraan', 'ref_kewarganegaraan', 'kewarganegaraan');
		$crud->field_type('kategori_kelulusan','true_false', array( "0" => "akademik", "1" => "kemahiran"));
		$crud->field_type('pengesahan','true_false', array( "0" => "sah", "1" => "tidak sah"));
		$crud->field_type('pengakuan','true_false', array( "0" => "sah", "1" => "tidak sah"));
		$crud->set_rules('emel','Emel','required|valid_email|is_unique[permohonan_butir_peribadi.email]');
		$crud->set_relation('bangsa', 'ref_bangsa', 'bangsa');
		$crud->set_relation('etnik', 'ref_etnik', 'etnik');
		$crud->set_relation('agama', 'ref_agama', 'agama');
		$crud->set_relation('taraf_perkahwinan', 'ref_taraf_perkahwinan', 'taraf_perkahwinan');
		$crud->set_relation('kategori_pemohon', 'ref_kategori_pemohon', 'kategori_pemohon');
		$crud->set_relation('poskod', 'ref_poskod_bandar_negeri', '{bandar},{negeri}');
		$crud->set_relation('kelulusan', 'ref_kelulusan', 'kelulusan');
		$crud->unset_add();
			$crud->unset_edit();
				if ($crud->getState()=='list')
				{
				//	$crud->set_relation_n_n('groups', 'admin_users_groups', 'admin_groups', 'user_id', 'group_id', 'name');

				}
				// only webmaster can reset Admin User password
				if ( $this->ion_auth->in_group(array('webmaster', 'admin')) )
				{
					//$crud->add_action('Reset Password', '', $this->mModule.'/panel/admin_user_reset_password', 'fa fa-repeat');
				}

		$this->render_crud();
		$this->mPageTitle = "Butir Pribadi";

	}

	// @author zulyantara
	public function maklumat()
	{
		// $this->load->library('Grocery_CRUD_MultiSearch');
		$crud = $this->generate_crud('permohonan_maklumat_am');
		//$crud->set_theme('datatables');
		$crud->set_subject('Maklumat');
		$crud->columns('id_permohonan', 'media_cetak', 'media_elektronik', 'internet','media_sosial','rakan','keluarga','pameran','text_lain');
		$crud->set_relation('id_permohonan', 'permohonan_butir_peribadi', 'nama_penuh');
		$crud->field_type('media_cetak','true_false', array( "0" => "TIDAK", "1" => "IYA"));
		$crud->field_type('media_elektronik','true_false', array( "0" => "TIDAK", "1" => "IYA"));
		$crud->field_type('internet','true_false', array( "0" => "TIDAK", "1" => "IYA"));
		$crud->field_type('media_sosial','true_false', array( "0" => "TIDAK", "1" => "IYA"));
		$crud->field_type('rakan','true_false', array( "0" => "TIDAK", "1" => "IYA"));
		$crud->field_type('keluarga','true_false', array( "0" => "TIDAK", "1" => "IYA"));
		$crud->field_type('pameran','true_false', array( "0" => "TIDAK", "1" => "IYA"));
		$crud->field_type('text_lain','true_false', array( "0" => "TIDAK", "1" => "IYA"));
		$crud->display_as('text_lain','lain - lain');

		$this->render_crud();
		$this->mPageTitle = "Maklumat Am";
	}

	public function kursus ()
	{
		$this->load->library('Grocery_CRUD_MultiSearch');
		$crud = $this->generate_crud('permohonan_kursus');
		$crud->set_subject('Permohonan kursus');
		$crud->columns('id_permohonan','kursus1','kursus2','kursus3');
		$crud->set_relation('id_permohonan','permohonan_butir_peribadi','nama_penuh');
		$crud->set_relation('kursus1','settings_tawaran_kursus','id');
		$crud->set_relation('kursus2','settings_tawaran_kursus','id');
		$crud->set_relation('kursus3','settings_tawaran_kursus','id');
		$crud->unset_add();
			$crud->unset_edit();

				if ($crud->getState()=='list')
				{
				//	$crud->set_relation_n_n('groups', 'admin_users_groups', 'admin_groups', 'user_id', 'group_id', 'name');

				}
				// only webmaster can reset Admin User password
				if ( $this->ion_auth->in_group(array('webmaster', 'admin')) )
				{
					//$crud->add_action('Reset Password', '', $this->mModule.'/panel/admin_user_reset_password', 'fa fa-repeat');
				}

		$this->render_crud();
		$this->mPageTitle = "Tawaran Kursus";
	}

	/* @author zulyantara */
	function penjaga()
	{
		$crud = $this->generate_crud('permohonan_penjaga');
	//	$crud->set_theme('datatables');
		$crud->set_subject('Penjaga');
		$crud->columns('id_permohonan', 'maklumat', 'a_nama_penuh', 'a_hubungan','a_jenis_pengenalan', 'a_mykad',  'a_no_hp', 'a_agama');
		$crud->set_relation('id_permohonan', 'permohonan_butir_peribadi', 'nama_penuh');
		$crud->set_relation("a_hubungan", "ref_hubungan", "hubungan");
		$crud->set_relation("a_kewarganegaraan", "ref_kewarganegaraan", "kewarganegaraan");
		$crud->set_relation("a_kategori_penjaga", "ref_kategori_penjaga", "kategori_penjaga");
		$crud->set_relation("a_agama", "ref_agama", "agama");
		$crud->set_relation("a_etnik", "ref_etnik", "etnik");
		$crud->set_relation("a_bangsa", "ref_bangsa", "bangsa");
		$crud->set_relation("a_pendapatan", "ref_pendapatan", "pendapatan");
		$crud->set_relation("b_kewarganegaraan", "ref_kewarganegaraan", "kewarganegaraan");
		$crud->set_relation("b_kategori_penjaga", "ref_kategori_penjaga", "kategori_penjaga");
		$crud->set_relation("b_agama", "ref_agama", "agama");
		$crud->set_relation("b_etnik", "ref_etnik", "etnik");
		$crud->set_relation("b_bangsa", "ref_bangsa", "bangsa");
		$crud->set_relation("b_pendapatan", "ref_pendapatan", "pendapatan");
		$crud->set_relation("c_kewarganegaraan", "ref_kewarganegaraan", "kewarganegaraan");
		$crud->set_relation("c_kategori_penjaga", "ref_kategori_penjaga", "kategori_penjaga");
		$crud->set_relation("c_agama", "ref_agama", "agama");
		$crud->set_relation("c_etnik", "ref_etnik", "etnik");
		$crud->set_relation("c_bangsa", "ref_bangsa", "bangsa");
		$crud->set_relation("c_pendapatan", "ref_pendapatan", "pendapatan");
		$crud->field_type('maklumat','dropdown', array( "1" => "Pilih", "2" => "Ibu Bapa", '3' => 'Penjaga Waris'));

			if ($crud->getState()=='list')
		{
		//	$crud->set_relation_n_n('groups', 'admin_users_groups', 'admin_groups', 'user_id', 'group_id', 'name');
		}

		// only webmaster can reset Admin User password
		if ( $this->ion_auth->in_group(array('webmaster', 'admin')) )
		{
			//$crud->add_action('Reset Password', '', $this->mModule.'/panel/admin_user_reset_password', 'fa fa-repeat');
		}

		$this->render_crud();
		$this->mPageTitle = "Maklumat Ibu bapa / Penjaga / Waris";
	}

	function tempat()
	{
		$this->load->library('Grocery_CRUD_MultiSearch');
		$crud = $this->generate_crud('permohonan_tempat_tinggal');
		$crud->set_subject('Permohonan Tempat Tinggal');
		$crud->columns('id_permohonan','tempat_tinggal','pengangkutan');
		$crud->field_type('pengangkutan','true_false', array( "0" => "Ada Kendaraan Sendiri", "1" => "Tidak Ada Kendaraan"));
		$crud->field_type('tempat_tinggal','true_false', array( "0" => "Atas Urusan Sendiri", "1" => "Perlukan Tempat Tinggal"));
		$crud->set_relation('id_permohonan','permohonan_butir_peribadi','nama_penuh');

				if ($crud->getState()=='list')
				{
				//	$crud->set_relation_n_n('groups', 'admin_users_groups', 'admin_groups', 'user_id', 'group_id', 'name');

				}
				// only webmaster can reset Admin User password
				if ( $this->ion_auth->in_group(array('webmaster', 'admin')) )
				{
					//$crud->add_action('Reset Password', '', $this->mModule.'/panel/admin_user_reset_password', 'fa fa-repeat');
				}

		$this->render_crud();
		$this->mPageTitle = "Permohonan Tempat Tinggal";
	}

	function permohonan_baru()
	{
		redirect('','refresh');
	}
}
