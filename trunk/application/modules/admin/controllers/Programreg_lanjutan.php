<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Class: Programreg_lanjutan
 * Author:
 * - bambang priambodo (bambangpriambodo@gmail.com)
*/

class Programreg_lanjutan extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
		$this->load->model("pelatih_lanjutan_model", "plm");
		$this->load->model("lpp04_model", "lpp04");
		$this->load->model('screen_dua_model', "sdm");
		$this->load->model('screen_empat_model', "mmodel");
		$this->load->model('screen_lima_model', "slm");
		$this->load->model('home_model', "hm");
		$this->load->model('pemohon_model', 'pemohon');
		$this->load->model('kew_model', 'kew');
	}

	/*
	 * Method: index
	 * Screen: 1
	 * Author:
	 * - bambang priambodo (bambangpriambodo@gmail.com)
	*/
  public function index()
  {
		// Load languages
		#echo count($this->input->post());
		$this->lang->load('form', 'malaysia');

		//  get info user login
		$user = $this->ion_auth->user()->row();
		$user_staff = $user->id_staff;
		$row_staff = $this->plm->get_v_admin_users(array("id_staff" => $user_staff));
		$giatmara_id = $row_staff->id_giatmara;
		$negeri_id = $row_staff->id_negeri;

		$row_giatmara = $this->lpp04->get_giatmara_pangku_tugas($user_staff);
		//$giatmara_id = $row_giatmara->id_giatmara;
		$giatmara_negeri = $row_giatmara->id_negeri;
		$row_negeri = $this->lpp04->get_negeri($giatmara_negeri);
		$this->mViewData["row_negeri"] = $row_negeri;

		$res_giatmara = $this->lpp04->get_giatmara_by_id($giatmara_id);
		$this->mViewData["res_giatmara"] = $res_giatmara;
		$res_kursus = $this->lpp04->get_all_kursus($giatmara_id);
		$this->mViewData["res_kursus"] = $res_kursus;

		if (count($this->input->post())>0)
		{
			#echo "<pre>";var_dump($this->input->post());echo "</pre>";
			$form_name = $this->input->post('form-name');
			if ($form_name === "header" && $this->input->post("opt_kursus")!="" && $this->input->post("opt_sesi_kemasukan")!="")
			{
				$negeri = $this->input->post('opt_negeri');
				$giatmara = $this->input->post('opt_giatmara');
				$kursus = $this->input->post('opt_kursus');
				#$warganegara = $this->input->post('opt_warganegara');
				$sesi_kemasukan = $this->input->post("opt_sesi_kemasukan");
			}
			elseif($form_name === "seranai")
			{
				$negeri = $this->input->post('id_negeri');
				$giatmara = $this->input->post('id_giatmara');
				$kursus = $this->input->post('id_kursus');
				#$warganegara = $this->input->post('opt_warganegara');
				$sesi_kemasukan = $this->input->post("id_intake");
				#$arr_temudugatetapan = $this->input->post('id_temuduga_tetapan');
				$arr_chk_tindakan = $this->input->post('chk_tindakan');
				#echo "<pre>";print_r($arr_chk_tindakan);echo "</pre>";
				$data_upd_chk_tindakan = array();
				foreach($arr_chk_tindakan as $idx=>$val)
				{
					#echo $idx."=".$val."<br/>";
					#$data_upd_chk_tindakan['id'] = $idx;
					$data_upd_chk_tindakan['pendaftaran_status'] = $val;
					#echo "<pre>";print_r($data_upd_chk_tindakan);echo "</pre>";
					$s = $this->programreg->update_pendaftaran_status($idx, $data_upd_chk_tindakan);
				}
			}
			$res_senarai_penawaran_kursus = $this->programreg->get_all_seranai_penawaran_kursus_s1($negeri, $giatmara, $kursus, $sesi_kemasukan);
			$this->mViewData["res_senarai_penawaran_kursus"] = $res_senarai_penawaran_kursus;
			$this->mViewData["negeri_opt"] = $negeri;
			$this->mViewData["giatmara_opt"] = $giatmara;
			$this->mViewData["kursus_opt"] = $kursus;
			$this->mViewData["intake_opt"] = $sesi_kemasukan;
			#echo "<pre>";print_r($this->mViewData["res_senarai_penawaran_kursus"]);echo "</pre>";
		}
		$this->mPageTitle = "Pendaftaran Latihan Lanjutan";
		$this->mViewData["url"] = "programreg_lanjutan/index";
		$this->render('pelatih_lanjutan/pendaftaran');
  }

}
