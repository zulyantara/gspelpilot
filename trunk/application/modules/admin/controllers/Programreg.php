<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Class: Programreg
 * Purpose: Controller untuk P5-Pelatih
 * Modul: P5-Pelatih
 * Author:
 * - bambang priambodo (bambangpriambodo@gmail.com)
*/

class Programreg extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
		$this->load->model('lpp04_model', 'lpp04');
		$this->load->model('programreg_model', 'programreg');
		$this->load->model('pemohon_model', 'pemohon');
		$this->load->model('kew_model', 'kew');
	}

	/*
	 * Method: index
	 * Purpose: Index of Programreg controller, juga sebagai senarai permohonan
	 * Screen: 1
	 * Author:
	 * - bambang priambodo (bambangpriambodo@gmail.com)
	*/
  public function index()
  {
		// Load languages
		#echo count($this->input->post());
		$this->lang->load('form', 'malaysia');

		$user = $this->ion_auth->user()->row();
		$user_staff = $user->id_staff;

		switch ($this->ion_auth->get_users_groups()->row()->id) {
			// admin
			case '2':
				$row_negeri = $this->lpp04->get_all_negeri();
				break;

			// pelatih officer
			default:
				//$row_giatmara = $this->lpp04->get_giatmara($user_staff);
				$row_giatmara = $this->lpp04->get_giatmara_pangku_tugas($user_staff);
				#$giatmara_id = $row_giatmara['id'];
				#$giatmara_negeri = $row_giatmara['id_negeri'];
				$giatmara_id = $row_giatmara->id_giatmara;
				$giatmara_negeri = $row_giatmara->id_negeri;

				$row_negeri = $this->lpp04->get_negeri($giatmara_negeri);
				$res_giatmara = $this->lpp04->get_giatmara_by_id($giatmara_id);
				break;
		}

		$this->mViewData["row_negeri"] = $row_negeri;
		$this->mViewData["res_negeri"] = $this->lpp04->get_all_negeri();
    	#$this->mViewData["res_kewarganegaraan"] = $this->lpp04->get_all_kewarganegaraan();

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

				$this->session->set_tempdata("opt_negeri", $negeri, 300);
				$this->session->set_tempdata("opt_giatmara", $giatmara, 300);
				$this->session->set_tempdata("opt_kursus", $kursus, 300);
				$this->session->set_tempdata("opt_sesi_kemasukan", $sesi_kemasukan, 300);
			}
			elseif($form_name === "seranai")
			{
				//ridei.karim@gmail.com was here
				//on wednesday 1:10AM april 18, 2018
				//i intercept process below, based on TOT Gspel - error list v2.docx file
				//section NEW REQUESTS DURING TOT
				//number 7 , something about gugurkan

				$negeri = $this->input->post('id_negeri');
				$giatmara = $this->input->post('id_giatmara');
				$kursus = $this->input->post('id_kursus');
				#$warganegara = $this->input->post('opt_warganegara');
				$sesi_kemasukan = $this->input->post("id_intake");
				#$arr_temudugatetapan = $this->input->post('id_temuduga_tetapan');
				$arr_chk_tindakan = $this->input->post('chk_tindakan');
				$arr_chk_tindak = $this->input->post('chk_tindak');
				$id_permohonan = $this->input->post('txt_id_permohonan');
				$id_kursus = $this->input->post('txt_id_kursus');
				// echo "<pre>";var_dump($this->input->post());echo "</pre>";exit;
				#echo "<pre>";print_r($arr_chk_tindakan);echo "</pre>";
				$data_upd_chk_tindakan = array();

	//92







	//-100


				foreach ($arr_chk_tindak as $key => $val)
				{
					if($arr_chk_tindakan[$val]==0) continue;
					$data_upd_chk_tindakan['id'] = $val;
					$data_upd_chk_tindakan['pendaftaran_status'] = $arr_chk_tindakan[$val];
					#echo "<pre>";print_r($data_upd_chk_tindakan);echo "</pre>";
					$s = $this->programreg->update_pendaftaran_status($data_upd_chk_tindakan);

					$data_upd["id_permohonan"] = $id_permohonan[$val];
					$data_upd["id_kursus_daftar"] = $id_kursus[$val];
					$this->programreg->update_id_kursus_daftar($data_upd);
				}

				foreach ($arr_chk_tindakan as $k => $i){
					if($i==2){ //which is gugurkan
						//$this->db->query("insert into deleted_temuduga_tetapan select * from temuduga_tetapan where id=$k");
						//echo $this->db->last_query();
						//$this->db->query("delete from temuduga_tetapan where id=$k");
						//echo $this->db->last_query();
						$this->db->query("update temuduga_tetapan set
						                   catatan= NULL,
										   keputusan_temuduga=1,
              tawaran_sesi= NULL,
            tawaran_kursus= NULL,
             tawaran_elaun= NULL,
         tawaran_nama_bank= NULL,
          tawaran_no_akaun= NULL,
      tawaran_cara_bayaran= NULL,
            tawaran_status= NULL,
  tawaran_tarikh_lapordiri= NULL,
    tawaran_masa_lapordiri= NULL,
             tawaran_cetak= NULL,
      tawaran_tarikh_cetak= NULL,
    tawaran_tarikh_cetak_2= NULL,
        pendaftaran_status= 0,
          id_kursus_daftar= NULL,
        tawaran_mula_elaun= NULL,
       tawaran_tamat_elaun= NULL,
      id_kew_kod_kombinasi= NULL,
             id_kursus_sah= NULL,
             jenis_pelatih= 'LPP04',
id_permohonan_kursus_lpp09= NULL,
       nomor_surat_tawaran= NULL
						where id=$k");
						$ls=$this->db->last_query();
						file_put_contents("/tmp/logku", $ls, FILE_APPEND);
					}
				}



				/*
				DEPRECATED
				foreach($arr_chk_tindakan as $idx=>$val)
				{
					#echo $idx."=".$val."<br/>";
					$data_upd_chk_tindakan['id'] = $idx;
					$data_upd_chk_tindakan['pendaftaran_status'] = $val;
					#echo "<pre>";print_r($data_upd_chk_tindakan);echo "</pre>";
					$s = $this->programreg->update_pendaftaran_status($data_upd_chk_tindakan);
				}
				*/
			}
			$res_senarai_penawaran_kursus = $this->programreg->get_all_seranai_penawaran_kursus_s1($negeri, $giatmara, $kursus, $sesi_kemasukan);
			$this->mViewData["res_senarai_penawaran_kursus"] = $res_senarai_penawaran_kursus;
			$this->mViewData["negeri_opt"] = $negeri;
			$this->mViewData["giatmara_opt"] = $giatmara;
			$this->mViewData["kursus_opt"] = $kursus;
			$this->mViewData["intake_opt"] = $sesi_kemasukan;
			$this->mViewData["res_sesi"] = $this->lpp04->get_all_intake($giatmara, $kursus);
			#echo "<pre>";print_r($this->mViewData["res_senarai_penawaran_kursus"]);echo "</pre>";
		}
		else
		{
			$this->mViewData["negeri_opt"] = $this->session->tempdata("opt_negeri");
			$this->mViewData["giatmara_opt"] = $this->session->tempdata("opt_giatmara");
			$this->mViewData["kursus_opt"] = $this->session->tempdata("opt_kursus");
			$this->mViewData["intake_opt"] = $this->session->tempdata("opt_sesi_kemasukan");
			$this->mViewData["res_sesi"] = $this->lpp04->get_all_intake($this->session->tempdata("opt_giatmara"), $this->session->tempdata("opt_kursus"));
		}

		$this->mPageTitle = "Senarai Permohonan";
		$this->mViewData["url"] = "programreg/index";
		$this->render('program_reg/senarai_prog_registration');
  }

	/*
	 * Method: detailprofil
	 * Purpose: Senarai permohonan, detail profil
	 * Screen: 2
	 * Author:
	 * - bambang priambodo (bambangpriambodo@gmail.com)
	*/
	public function detailprofil() {
		// var_dump($this->session->tempdata());exit;

		$user = $this->ion_auth->user()->row();
		$user_giatmara = $user->giatmara_id;
		$user_staff = $user->id_staff;

		#$row_giatmara = $this->lpp04->get_giatmara($user_giatmara);
		$row_giatmara = $this->lpp04->get_giatmara_pangku_tugas($user_staff);
		$giatmara_id = $row_giatmara->id_giatmara;
		#$giatmara_id = $row_giatmara->id;
		$giatmara_negeri = $row_giatmara->id_negeri;

		#var_dump($this->input->get());
		$idtemudugatetapan = $this->uri->segment('4');
		if ($idtemudugatetapan === 'detailprofil') $idtemudugatetapan = $this->uri->segment('5');
		#echo $idtemudugatetapan;

		// Senarai
		$this->mViewData["idtemudugatetapan"] = $idtemudugatetapan;
		$this->mViewData["res_banks"] = $this->kew->getBanks();
		$this->mViewData["res_kod_kombinasi"] = $this->kew->get_kod_kombinasi();
		$this->mViewData["res_potongan"] = $this->kew->getPotongan();
		$res_temudugatetapan = $this->programreg->get_all_seranai_penawaran_kursus_s1_dei($giatmara_negeri, "", "", "", $idtemudugatetapan);
		$this->mViewData["res_temudugatetapan"] = $res_temudugatetapan;
		if (count($this->mViewData["res_temudugatetapan"])) {
			$res_kluster = $this->programreg->get_giatmara_kursus("id_kluster, nama_kluster", array("id_giatmara"=>$res_temudugatetapan[0]->id_giatmara, "id_negeri"=>$res_temudugatetapan[0]->id_negeri), "distinct", "nama_kluster");
			$res_kursus = $this->programreg->get_giatmara_kursus("id_setting_penawaran_kursus, nama_kursus", array("id_giatmara"=>$res_temudugatetapan[0]->id_giatmara, "id_negeri"=>$res_temudugatetapan[0]->id_negeri), "distinct", "nama_kursus");
			$res_sesi = $this->programreg->get_giatmara_kursus("id_intake, nama_intake", array("id_giatmara"=>$res_temudugatetapan[0]->id_giatmara, "id_negeri"=>$res_temudugatetapan[0]->id_negeri), "distinct", "nama_intake");
			// echo "<pre>";var_dump($res_kursus);echo "</pre>";
			$this->mViewData["res_kluster"] = $res_kluster;
			//$this->mViewData["res_kursus"] = $res_kursus;
			$this->mViewData["res_sesi"] = $res_sesi;

			//mmn add to get kelayakan elaun
			$this->mViewData["res_kelayakan_elaun"] = $this->programreg->get_kelayakan_elaun($idtemudugatetapan);
			//mmn end

			$this->mViewData["res_butir_peribadi"] = $this->pemohon->get_peribadi_by_id($this->mViewData["res_temudugatetapan"][0]->id_permohonan_butir_peribadi);
			$this->mViewData["res_tetapan_potongan"] = $this->programreg->get_potongan_by_temuduga_kewpot($idtemudugatetapan);

			if (count($this->mViewData["res_butir_peribadi"])) {
				$this->mViewData["res_penjaga"] = $this->pemohon->get_penjaga_by_idpemohon($this->mViewData["res_butir_peribadi"][0]->id);
				$this->mViewData["res_tinggal"] = $this->pemohon->get_tinggal_by_idpemohon($this->mViewData["res_butir_peribadi"][0]->id);
			} else {
				echo "tak ada potongan!";
				die();
				redirect('admin/programreg', false);
			}
		} else {
			#echo "tak ada data!";
			#die();
			redirect('admin/programreg', false);
		}
		$notdtfi = $this->db->query("select * from temuduga_tetapan where id=?", array($idtemudugatetapan))->row_array();
		$this->mViewData['disabledx']='';
		if(empty($notdtfi['tawaran_cara_bayaran'])) $this->mViewData['disabledx']='disabled';

		$this->mPageTitle = "Senarai Permohonan";
		$this->render('program_reg/senarai_permohonan');
	}

	/*
	 * Method: pengesahan
	 * Purpose: Pengesahan permohonan
	 * Screen: 3
	 * Author:
	 * - bambang priambodo (bambangpriambodo@gmail.com)
	 * - Zulyantara <zulyantara@gmail.com>
	*/
	public function pengesahan() {

    // Load languages
		#echo count($this->input->post());
		$this->lang->load('form', 'malaysia');

		$user = $this->ion_auth->user()->row();
		$user_staff = $user->id_staff;

		switch ($this->ion_auth->get_users_groups()->row()->id) {
			// admin
			case '2':
				$row_negeri = $this->lpp04->get_all_negeri();
				break;

			// pelatih officer
			default:
				//$row_giatmara = $this->lpp04->get_giatmara($user_staff);
				$row_giatmara = $this->lpp04->get_giatmara_pangku_tugas($user_staff);
				#$giatmara_id = $row_giatmara['id'];
				#$giatmara_negeri = $row_giatmara['id_negeri'];
				$giatmara_id = $row_giatmara->id_giatmara;
				$giatmara_negeri = $row_giatmara->id_negeri;

				$row_negeri = $this->lpp04->get_negeri($giatmara_negeri);
				$res_giatmara = $this->lpp04->get_giatmara_by_id($giatmara_id);
				break;
		}

		$this->mViewData["row_negeri"] = $row_negeri;
		$this->mViewData["res_negeri"] = $this->lpp04->get_all_negeri();
    	#$this->mViewData["res_kewarganegaraan"] = $this->lpp04->get_all_kewarganegaraan();

		$res_giatmara = $this->lpp04->get_giatmara_by_id($giatmara_id);
		$this->mViewData["res_giatmara"] = $res_giatmara;
		$res_kursus = $this->lpp04->get_all_kursus($giatmara_id);
		$this->mViewData["res_kursus"] = $res_kursus;

		if (count($this->input->post())>0) {
			#echo "<pre>";var_dump($this->input->post());echo "</pre>";
			$form_name = $this->input->post('form-name');
			if ($form_name === "header" && $this->input->post("opt_kursus")!="" && $this->input->post("opt_sesi_kemasukan")!="") {
				$negeri = $this->input->post('opt_negeri');
				$giatmara = $this->input->post('opt_giatmara');
				$kursus = $this->input->post('opt_kursus');
				#$warganegara = $this->input->post('opt_warganegara');
				$sesi_kemasukan = $this->input->post("opt_sesi_kemasukan");

				$this->session->set_tempdata("opt_negeri", $negeri, 300);
				$this->session->set_tempdata("opt_giatmara", $giatmara, 300);
				$this->session->set_tempdata("opt_kursus", $kursus, 300);
				$this->session->set_tempdata("opt_sesi_kemasukan", $sesi_kemasukan, 300);
			} elseif($form_name === "seranai") {
				$negeri = $this->input->post('id_negeri');
				$giatmara = $this->input->post('id_giatmara');
				$kursus = $this->input->post('id_kursus');
				#$warganegara = $this->input->post('opt_warganegara');
				$sesi_kemasukan = $this->input->post("id_intake");
				#$arr_temudugatetapan = $this->input->post('id_temuduga_tetapan');
				$arr_kursus_tetapan = $this->input->post('id_kursus_tetapan');
				$arr_chk_tindakan = $this->input->post('chk_tindakan');
				#echo "<pre>";print_r($arr_chk_tindakan);echo "</pre>";
				$data_upd_chk_tindakan = array();
				foreach($arr_chk_tindakan as $idx=>$val) {
					// echo $arr_kursus_tetapan[$idx];exit;
					#echo $idx."=".$val."<br/>";
					$data_upd_chk_tindakan['id'] = $idx;
					$data_upd_chk_tindakan['pendaftaran_status'] = $arr_chk_tindakan[$idx];
					if ($arr_chk_tindakan[$idx]==4) $data_upd_chk_tindakan['id_kursus_sah'] = $arr_kursus_tetapan[$idx];
					#echo "<pre>";print_r($data_upd_chk_tindakan);echo "</pre>";
					$s = $this->programreg->update_pendaftaran_status($data_upd_chk_tindakan);
				}
			}
			$res_senarai_penawaran_kursus = $this->programreg->get_all_seranai_penawaran_kursus_s3($negeri, $giatmara, $kursus, $sesi_kemasukan);
			$this->mViewData["res_senarai_penawaran_kursus"] = $res_senarai_penawaran_kursus;
			$this->mViewData["negeri_opt"] = $negeri;
			$this->mViewData["giatmara_opt"] = $giatmara;
			$this->mViewData["kursus_opt"] = $kursus;
			$this->mViewData["intake_opt"] = $sesi_kemasukan;
			$this->mViewData["res_sesi"] = $this->lpp04->get_all_intake($giatmara, $kursus);
			#echo "<pre>";print_r($this->mViewData["res_senarai_penawaran_kursus"]);echo "</pre>";
		}
		else
		{
			$this->mViewData["negeri_opt"] = $this->session->tempdata("opt_negeri");
			$this->mViewData["giatmara_opt"] = $this->session->tempdata("opt_giatmara");
			$this->mViewData["kursus_opt"] = $this->session->tempdata("opt_kursus");
			$this->mViewData["intake_opt"] = $this->session->tempdata("opt_sesi_kemasukan");
			$this->mViewData["res_sesi"] = $this->lpp04->get_all_intake($this->session->tempdata("opt_giatmara"), $this->session->tempdata("opt_kursus"));
		}
		$this->mPageTitle = "Pengesahan Data";
		$this->mViewData["url"] = "programreg/pengesahan";
		$this->render('program_reg/senarai_pengesahan');
  }

	/*
	 * Method: detailpengesahan
	 * Purpose: Pengesahan permohonan
	 * Screen: 4
	 * Author:
	 * - bambang priambodo (bambangpriambodo@gmail.com)
	 * - Zulyantara <zulyantara@gmail.com>
	*/
	public function detailpengesahan() {
		$user = $this->ion_auth->user()->row();
		$user_giatmara = $user->giatmara_id;
		$user_staff = $user->id_staff;
		#$row_giatmara = $this->lpp04->get_giatmara($user_giatmara);
		$row_giatmara = $this->lpp04->get_giatmara_pangku_tugas($user_staff);
		#$giatmara_id = $row_giatmara->id;
		$giatmara_id = $row_giatmara->id_giatmara;
		$giatmara_negeri = $row_giatmara->id_negeri;

		#var_dump($this->input->get());
		$idtemudugatetapan = $this->uri->segment('4');
		if ($idtemudugatetapan === 'detailprofil') $idtemudugatetapan = $this->uri->segment('5');
		#echo $idtemudugatetapan;

		// Senarai
		//mmn add to get kelayakan elaun
		$this->mViewData["res_kelayakan_elaun"] = $this->programreg->get_kelayakan_elaun($idtemudugatetapan);
		//mmn end

		$this->mViewData["idtemudugatetapan"] = $idtemudugatetapan;
		$this->mViewData["res_temudugatetapan"] = $this->programreg->get_all_seranai_penawaran_kursus_s3($giatmara_negeri, "", "", "", $idtemudugatetapan);
		if (count($this->mViewData["res_temudugatetapan"])) {
			$this->mViewData['res_kod_kombinasi'] = $this->kew->get_kod_kombinasi_by_id($this->mViewData["res_temudugatetapan"][0]->id_kew_kod_kombinasi);
		} else {
			redirect('admin/programreg/pengesahan', false);
		}

		$this->mPageTitle = "Pengesahan Data";
		$this->render('program_reg/detail_pengesahan');
	}

	/*
	 * Method: pengurus
	 * Purpose: Senarai pengesahan pengurus
	 * Screen: 5
	 * Author:
	 * - bambang priambodo (bambangpriambodo@gmail.com)
	*/
	public function pengurus() {
		// Load languages
		#echo count($this->input->post());
		$this->lang->load('form', 'malaysia');

		$user = $this->ion_auth->user()->row();
		$user_staff = $user->id_staff;

		switch ($this->ion_auth->get_users_groups()->row()->id) {
			// admin
			case '2':
				$row_negeri = $this->lpp04->get_all_negeri();
				break;

			// pelatih officer
			default:
				//$row_giatmara = $this->lpp04->get_giatmara($user_staff);
				$row_giatmara = $this->lpp04->get_giatmara_pangku_tugas($user_staff);
				#$giatmara_id = $row_giatmara['id'];
				#$giatmara_negeri = $row_giatmara['id_negeri'];
				$giatmara_id = $row_giatmara->id_giatmara;
				$giatmara_negeri = $row_giatmara->id_negeri;

				$row_negeri = $this->lpp04->get_negeri($giatmara_negeri);
				$res_giatmara = $this->lpp04->get_giatmara_by_id($giatmara_id);
				break;
		}

		$this->mViewData["row_negeri"] = $row_negeri;
		$this->mViewData["res_negeri"] = $this->lpp04->get_all_negeri();
    #$this->mViewData["res_kewarganegaraan"] = $this->lpp04->get_all_kewarganegaraan();

		$res_giatmara = $this->lpp04->get_giatmara_by_id($giatmara_id);
		$this->mViewData["res_giatmara"] = $res_giatmara;
		$res_kursus = $this->lpp04->get_all_kursus($giatmara_id);
		$this->mViewData["res_kursus"] = $res_kursus;

		if (count($this->input->post())>0) {
			#echo "<pre>";print_r($this->input->post());echo "</pre>";
			$form_name = $this->input->post('form-name');
			if ($form_name === "header" && $this->input->post("opt_kursus")!="" && $this->input->post("opt_sesi_kemasukan")!="") {
				$negeri = $this->input->post('opt_negeri');
				$giatmara = $this->input->post('opt_giatmara');
				$kursus = $this->input->post('opt_kursus');
				#$warganegara = $this->input->post('opt_warganegara');
				$sesi_kemasukan = $this->input->post("opt_sesi_kemasukan");
			} elseif($form_name === "seranai") {
				$negeri = $this->input->post('id_negeri');
				$giatmara = $this->input->post('id_giatmara');
				$kursus = $this->input->post('id_kursus');
				#$warganegara = $this->input->post('opt_warganegara');
				$sesi_kemasukan = $this->input->post("id_intake");
				$s = $this->programreg->update_pelatih($this->input->post());
				redirect('admin/programreg/pengurus', false);
			}
			$res_senarai_penawaran_kursus = $this->programreg->get_all_seranai_penawaran_kursus_s4($negeri, $giatmara, $kursus, $sesi_kemasukan);
			$this->mViewData["res_senarai_penawaran_kursus"] = $res_senarai_penawaran_kursus;
			$this->mViewData["negeri_opt"] = $negeri;
			$this->mViewData["giatmara_opt"] = $giatmara;
			$this->mViewData["kursus_opt"] = $kursus;
			$this->mViewData["intake_opt"] = $sesi_kemasukan;
			$this->mViewData["res_sesi"] = $this->lpp04->get_all_intake($giatmara, $kursus);
			#echo "<pre>";print_r($this->mViewData["res_senarai_penawaran_kursus"]);echo "</pre>";
		}
		$this->mPageTitle = "Pengesahan Pendaftaran";
		$this->mViewData["url"] = "programreg/pengurus";
		$this->render('program_reg/senarai_pengurus');
	}

	/*
	 * Method: berdaftar
	 * Purpose: Senarai pelatih berdaftar
	 * Screen: 6
	 * Author:
	 * - bambang priambodo (bambangpriambodo@gmail.com)
	 * - Zulyantara <zulyantara@gmail.com>
	*/
	public function berdaftar() {
		// Load languages
		#echo count($this->input->post());
		$this->lang->load('form', 'malaysia');

		$user = $this->ion_auth->user()->row();
		$user_staff = $user->id_staff;

		switch ($this->ion_auth->get_users_groups()->row()->id) {
			// admin
			case '2':
				$row_negeri = $this->lpp04->get_all_negeri();
				break;

			// pelatih officer
			default:
				//$row_giatmara = $this->lpp04->get_giatmara($user_staff);
				$row_giatmara = $this->lpp04->get_giatmara_pangku_tugas($user_staff);
				#$giatmara_id = $row_giatmara['id'];
				#$giatmara_negeri = $row_giatmara['id_negeri'];
				$giatmara_id = $row_giatmara->id_giatmara;
				$giatmara_negeri = $row_giatmara->id_negeri;

				$row_negeri = $this->lpp04->get_negeri($giatmara_negeri);
				$res_giatmara = $this->lpp04->get_giatmara_by_id($giatmara_id);
				break;
		}
		
		$this->mViewData["row_negeri"] = $row_negeri;
		$this->mViewData["res_negeri"] = $this->lpp04->get_all_negeri();
    #$this->mViewData["res_kewarganegaraan"] = $this->lpp04->get_all_kewarganegaraan();

		$res_giatmara = $this->lpp04->get_giatmara_by_id($giatmara_id);
		$this->mViewData["res_giatmara"] = $res_giatmara;
		$res_kursus = $this->lpp04->get_all_kursus($giatmara_id);
		$this->mViewData["res_kursus"] = $res_kursus;

		if (count($this->input->post())>0) {
			#echo "<pre>";var_dump($this->input->post());echo "</pre>";
			$form_name = $this->input->post('form-name');
			if ($form_name === "header" && $this->input->post("opt_kursus")!="" && $this->input->post("opt_sesi_kemasukan")!="") {
				$negeri = $this->input->post('opt_negeri');
				$giatmara = $this->input->post('opt_giatmara');
				$kursus = $this->input->post('opt_kursus');
				#$warganegara = $this->input->post('opt_warganegara');
				$sesi_kemasukan = $this->input->post("opt_sesi_kemasukan");
			}
			$res_senarai_penawaran_kursus = $this->programreg->get_all_seranai_penawaran_kursus_s6($negeri, $giatmara, $kursus, $sesi_kemasukan);
			$this->mViewData["res_senarai_penawaran_kursus"] = $res_senarai_penawaran_kursus;
			$this->mViewData["negeri_opt"] = $negeri;
			$this->mViewData["giatmara_opt"] = $giatmara;
			$this->mViewData["kursus_opt"] = $kursus;
			$this->mViewData["intake_opt"] = $sesi_kemasukan;
			$this->mViewData["res_sesi"] = $this->lpp04->get_all_intake($giatmara, $kursus);
			#echo "<pre>";print_r($this->mViewData["res_senarai_penawaran_kursus"]);echo "</pre>";
		}
		$this->mPageTitle = "Pelatih Berdaftar";
		$this->mViewData["url"] = "programreg/berdaftar";
		$this->render('program_reg/senarai_berdaftar');
  }

	/*
	 * Method: detailberdaftar
	 * Purpose: Senarai Pelatih berdaftar, detail profil
	 * Screen: 6
	 * Author:
	 * - bambang priambodo (bambangpriambodo@gmail.com)
	*/
	public function detailberdaftar() {
		$user = $this->ion_auth->user()->row();
		$user_giatmara = $user->giatmara_id;
		//$row_giatmara = $this->lpp04->get_giatmara($user_giatmara);
		$row_giatmara = $this->lpp04->get_giatmara_pangku_tugas($user_staff);
		$giatmara_id = $row_giatmara->id;
		$giatmara_negeri = $row_giatmara->id_negeri;

		#var_dump($this->input->get());
		$idtemudugatetapan = $this->uri->segment('4');
		if ($idtemudugatetapan === 'detailprofil') $idtemudugatetapan = $this->uri->segment('5');
		#echo $idtemudugatetapan;

		// Senarai
		$this->mViewData["idtemudugatetapan"] = $idtemudugatetapan;
		$this->mViewData["res_temudugatetapan"] = $this->programreg->get_all_seranai_penawaran_kursus_s6($giatmara_negeri, "", "", "", $idtemudugatetapan);
		if (count($this->mViewData["res_temudugatetapan"])) {
			$this->mViewData["res_butir_peribadi"] = $this->pemohon->get_peribadi_by_id($this->mViewData["res_temudugatetapan"][0]->id_permohonan_butir_peribadi);
			$this->mViewData["res_butir_peribadi2"] = $this->db->query("select * from permohonan_butir_peribadi where id=?", array($this->mViewData["res_temudugatetapan"][0]->id_permohonan_butir_peribadi))->row_array();
			$this->mViewData['res_kod_kombinasi'] = $this->kew->get_kod_kombinasi_by_id($this->mViewData["res_temudugatetapan"][0]->id_kew_kod_kombinasi);
			$this->mViewData["res_tetapan_potongan"] = $this->programreg->get_potongan_by_temuduga_kewpot($idtemudugatetapan);
			if (count($this->mViewData["res_butir_peribadi"])) {
				$this->mViewData["res_penjaga"] = $this->pemohon->get_penjaga_by_idpemohon($this->mViewData["res_butir_peribadi"][0]->id);
				$this->mViewData["res_penjaga2"] = $this->db->query("select *,(select nama_pekerjaan from ref_pekerjaan where id=b.c_pekerjaan) as pekerjaan_ibu from permohonan_penjaga as b where id_permohonan=?", array($this->mViewData["res_butir_peribadi"][0]->id))->row_array();

				// echo "<pre>";var_dump($this->mViewData["res_penjaga"]);echo "</pre>";exit;
				// echo $this->mViewData["res_penjaga"][0]->pekerjaan_waris;exit;
				if ($this->mViewData["res_penjaga"][0]->pekerjaan_bapak !="")
				{
					$where_pekerjaan_bapak["id"] = $this->mViewData["res_penjaga"][0]->pekerjaan_bapak;
					$this->mViewData["row_pekerjaan_bapak"] = $this->pemohon->get_pekerjaan($where_pekerjaan_bapak)->row();
				}
				if ($this->mViewData["res_penjaga"][0]->pekerjaan_ibu !="")
				{
					$where_pekerjaan_ibu["id"] = $this->mViewData["res_penjaga"][0]->pekerjaan_ibu;
					$this->mViewData["row_pekerjaan_ibu"] = $this->pemohon->get_pekerjaan($where_pekerjaan_ibu)->row();
				}
				if ($this->mViewData["res_penjaga"][0]->pekerjaan_waris !="")
				{
					$where_pekerjaan_waris["id"] = $this->mViewData["res_penjaga"][0]->pekerjaan_waris;
					// var_dump($this->pemohon->get_pekerjaan($where_pekerjaan_waris));exit;
					$this->mViewData["row_pekerjaan_waris"] = $this->pemohon->get_pekerjaan($where_pekerjaan_waris)->row();
				}

				$this->mViewData["res_tinggal"] = $this->pemohon->get_tinggal_by_idpemohon($this->mViewData["res_butir_peribadi"][0]->id);
			} else {
				redirect('admin/programreg', false);
			}
		} else {
			redirect('admin/programreg', false);
		}

		$this->mPageTitle = "Senarai Pelatih Berdaftar";
		$this->render('program_reg/detailberdaftar');
	}

	/**
	 * @Author Prihantoosa <pht854@gmail.com>
	 * Cetak P5 Screen 6 Detail Pelatih Berdaftar
	 */
	function cetak_detailberdaftar($idtemudugatetapan)
	{
		// Jika user coba langsung menuju URI tanpa id maka kembalikan ke P5 Screen 1
		if (is_null($idtemudugatetapan))
		{
			redirect('admin/programreg',FALSE);
		}
		// Jika id-nya ada
		else
		{
			$user = $this->ion_auth->user()->row();
			$user_id_staff = $user->id_staff;

			//$user_giatmara = $user->giatmara_id;
			//Ctt : baris diatas ^^^ tidak digunakan,
			// giatmara_id seharusnya tidak diambil dari $user tapi dari tabel_staff_info_pangku_tugas !

			//Ambil info giatmara dan negeri dari user aktif
			$giatmara = $this->programreg->get_giatmara_for_staff($user_id_staff);
			$giatmara_id = $giatmara[0][id_giatmara];
			$negeri_id = $giatmara[0][id_negeri];
			$user_giatmara = $giatmara_id;

			$row_giatmara = $this->lpp04->get_giatmara($user_giatmara);
			$giatmara_id = $row_giatmara->id;
			$giatmara_negeri = $row_giatmara->id_negeri;

			$data["res_temudugatetapan"] = $this->programreg->get_all_seranai_penawaran_kursus_s6($giatmara_negeri, "", "", "", $idtemudugatetapan);
			$data["res_kod_kombinasi"] = $this->kew->get_kod_kombinasi_by_id($data["res_temudugatetapan"][0]->id_kew_kod_kombinasi);
			$data["res_tetapan_potongan"] = $this->programreg->get_potongan_by_temuduga_kewpot($idtemudugatetapan);
			// echo "<pre>";var_dump($data["res_temudugatetapan"]);echo "</pre>";exit;
			$this->load->library('Pdfdom');
			$dompdf = new Pdfdom();

			$this->load->view("templates/pdf/cetak_detail_pelatih_berdaftar", $data);
			$html = $this->output->get_output();
			$name = "cetak_detail_pelatih_berdaftar.pdf";

			$dompdf->load_html($html);
			$dompdf->set_paper('A4');
			$dompdf->render();
			$dompdf->add_info('Author', 'Author Name');
			$dompdf->add_info('Title', $name);
			$dompdf->stream($name, array("Attachment" => 0));

			// clear buffer supaya pdf dapat digenerate dengan sempurna
			exit(0);
		}
	}

	/**
	 * @Author Zulyantara <zulyantara@gmail.com>
	 * Cetak P5 Screen 2
	 * Modified by Toosa
	 */
	function cetak_profil($id)
	{
		// Jika user coba langsung menuju URI tanpa id maka kembalikan ke P5 Screen 1
		if (is_null($id))
		{
			redirect('admin/programreg',FALSE);
		}
		// Jika id-nya ada
		else
		{
			$user = $this->ion_auth->user()->row();
			$user_id_staff = $user->id_staff;

			//$user_giatmara = $user->giatmara_id;
			//Ctt : baris diatas ^^^ tidak digunakan,
			// giatmara_id seharusnya tidak diambil dari $user tapi dari tabel_staff_info_pangku_tugas !

			//Ambil info giatmara dan negeri dari user aktif
			$giatmara = $this->programreg->get_giatmara_for_staff($user_id_staff);
			$giatmara_id = $giatmara[0][id_giatmara];
			$negeri_id = $giatmara[0][id_negeri];
			$user_giatmara = $giatmara_id;

			$row_giatmara = $this->lpp04->get_giatmara($user_giatmara);
			$giatmara_id = $row_giatmara->id;
			$giatmara_negeri = $row_giatmara->id_negeri;
			$data["res_temudugatetapan"] = $this->programreg->get_all_seranai_penawaran_kursus_s1($giatmara_negeri, "", "", "", $id);
			$data["res_kod_kombinasi"] = $this->kew->get_kod_kombinasi_by_id($data["res_temudugatetapan"][0]->id_kew_kod_kombinasi);
			$data["res_tetapan_potongan"] = $this->programreg->get_potongan_by_temuduga_kewpot($id);
			//echo "<pre>";print_r($data["res_kod_kombinasi"]);echo "</pre>";exit;
			// echo "<pre>";var_dump($data["res_temudugatetapan"]);echo "</pre>";exit;
			$this->load->library('Pdfdom');
			$dompdf = new Pdfdom();

			$this->load->view("templates/pdf/p5screen2", $data);
			$html = $this->output->get_output();
			$name = "cetak_profil.pdf";

			$dompdf->load_html($html);
			$dompdf->set_paper('A4');
			$dompdf->render();
			$dompdf->add_info('Author', 'Author Name');
			$dompdf->add_info('Title', $name);
			$dompdf->stream($name, array("Attachment" => 0));

			// clear buffer supaya pdf dapat digenerate dengan sempurna
			exit(0);
		}
	}

	/**
	 * @Author Zulyantara <zulyantara@gmail.com>
	 * P5 Screen 6 print out list Senarai Pelatih Berdaftar
	 */
	function cetak_senarai_berdaftar($id_giatmara, $id_negeri, $id_kursus, $id_intake)
	{
		$res_senarai_penawaran_kursus = $this->programreg->get_all_seranai_penawaran_kursus_s6($id_negeri, $id_giatmara, $id_kursus, $id_intake);
		$data["res_senarai_penawaran_kursus"] = $res_senarai_penawaran_kursus;
		$this->load->library('Pdfdom');
		$dompdf = new Pdfdom();

		$this->load->view("templates/pdf/senarai_pelatih_berdaftar", $data);
		$html = $this->output->get_output();
		$name = "senarai_berdaftar.pdf";

		$dompdf->load_html($html);
		$dompdf->set_paper('A4');
		$dompdf->render();
		$dompdf->add_info('Author', 'Author Name');
		$dompdf->add_info('Title', $name);
		$dompdf->stream($name, array("Attachment" => 0));

		// clear buffer supaya pdf dapat digenerate dengan sempurna
		exit(0);
	}

	### BLOCK AJAX ###
	/*
	 * Method: simpan_permohonan
	 * Purpose: Action dari Pengesahan permohonan
	 * Screen: 2
	 * Author:
	 * - bambang priambodo (bambangpriambodo@gmail.com)
	*/
	public function simpan_permohonan() {
		//print_r($this->input->post());exit;// var_dump($this->session->tempdata());exit;
		$user = $this->ion_auth->user()->row();
		$user_staff = $user->id_staff;
		$row_giatmara = $this->lpp04->get_giatmara_pangku_tugas($user_staff);
		$giatmara_id = $row_giatmara->id_giatmara;
		$giatmara_negeri = $row_giatmara->id_negeri;

		#echo "<pre>";var_dump($this->input->post());echo "</pre>";
		#echo $this->input->post('idtemudugatetapan');
		$res_temudugatetapan = $this->programreg->get_all_seranai_penawaran_kursus_s1($giatmara_negeri, "", "", "", $this->input->post('idtemudugatetapan'));
		#echo "<pre>";var_dump($res_temudugatetapan);echo "</pre>";
		if ($res_temudugatetapan) {
			$s = $this->programreg->update_temudugatetapan_s1($this->input->post());
			$data['status'] = $s;
		} else {
			$data['status'] = 0;
		}
		echo json_encode($data);
	}

	/*
	 * Method: simpan_pengesahan
	 * Purpose: Action dari Pengesahan pengesahan
	 * Screen: 4
	 * Author:
	 * - bambang priambodo (bambangpriambodo@gmail.com)
	*/
	public function simpan_pengesahan() {
		$user = $this->ion_auth->user()->row();
		$user_staff = $user->id_staff;
		$row_giatmara = $this->lpp04->get_giatmara_pangku_tugas($user_staff);
		$giatmara_id = $row_giatmara->id_giatmara;
		$giatmara_negeri = $row_giatmara->id_negeri;

		#echo "<pre>";var_dump($this->input->post());echo "</pre>";
		$res_temudugatetapan = $this->programreg->get_all_seranai_penawaran_kursus_s3($giatmara_negeri, "", "", "", $this->input->post('id'));
		if (count($res_temudugatetapan)>0) {
			$data["id"] = $this->input->post('id');
			$data["pendaftaran_status"] = $this->input->post("pendaftaran_status");
			$data["id_kursus_daftar"] = NULL;
			$s = $this->programreg->update_pendaftaran_status($data);
			$data['status'] = $s;
		} else {
			$data['status'] = 0;
		}
		echo json_encode($data);
	}

	public function giatmara_ajax()
	{
		$negeri = $this->input->post('txt_negeri');
		$giatmara_sel = $this->input->post('txt_giatmara_sel');
		$res_giatmara = $this->lpp04->get_all_giatmara($negeri);
		?>
		<option value="">Sila Pilih</option>
		<?php
		if ( ! empty($res_giatmara))
		{
			foreach ($res_giatmara as $val_giatmara)
			{
				?>
				<option value="<?php echo $val_giatmara->id; ?>" <?php if ($val_giatmara->id == $giatmara_sel) { echo "selected"; } ?>><?php echo $val_giatmara->nama_giatmara; ?></option>
				<?php
			}
		}
}
	/*
	 * Method: getkombinasikod_ajax
	 * Purpose: Untuk ambil data kombinasi kod
	 * Screen: 2
	 * Author:
	 * - bambang priambodo (bambangpriambodo@gmail.com)
	*/
	public function getkombinasikod_ajax() {
		#echo "<pre>";var_dump($this->input->post());echo "</pre>";
		$idkod = $this->input->post('idkod');
		$res_kodkombinasi = $this->kew->get_kod_kombinasi_by_id($idkod);
		#echo "<pre>";var_dump($res_kodkombinasi);echo "</pre>";
		$data = array();
		if (!empty($res_kodkombinasi)) {
			$data['status'] = 1;
			$data['res_kodkombinasi'] = $res_kodkombinasi[0];
		} else {
			$data['status'] = 0;
		}
		echo json_encode($data);
	}

	function ajax_kursus()
	{
		$where["id_kluster"] = $this->input->post('opt_kluster');
		$where["id_giatmara"] = $this->input->post('opt_giatmara');
		// var_dump($where);
		// echo $this->db->where($where)->get_compiled_select("v_giatmara_kursus");
		$res_kursus = $this->programreg->get_giatmara_kursus("id_kursus as id_setting_penawaran_kursus, nama_kursus", $where, "distinct", "nama_kursus");
		echo 		'<option value="">Sila Pilih</option>';
		foreach ($res_kursus as $val)
		{
			?>
			<option value="<?php echo $val->id_setting_penawaran_kursus; ?>"><?php echo $val->nama_kursus; ?></option>
			<?php
		}
	}

	function ajax_sesi()
	{
		$where["id_kluster"] = $this->input->post('opt_kluster');
		$where["id_kursus"] = $this->input->post('opt_kursus');
		$where["id_giatmara"] = $this->input->post('opt_giatmara');

		$res_kursus = $this->programreg->get_giatmara_kursus("id_intake, nama_intake", $where, "distinct", "nama_intake");
		foreach ($res_kursus as $val)
		{
			?>
			<option value="<?php echo $val->id_intake; ?>"><?php echo $val->nama_intake; ?></option>
			<?php
		}
	}
}
