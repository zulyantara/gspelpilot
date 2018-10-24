<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Class: Lpp04
 * Purpose: Controller untuk LPP04
 * Author:
*/

class Lpp04 extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
		$this->load->model('lpp04_model', 'lpp04');
	}

	public function index()
	{
		$this->load->model('user_model', 'users');
		$this->mViewData['count'] = array(
			'users' => $this->users->count_all(),
		);
		$this->render('home');
	}

	function permohonan_baru()
	{
		redirect('registration/semakmaklumat','refresh');
	}

	### BLOCK P3-Pelatih, Screen 1 ###
	/*
	 * Method: tetapan_temuduga
	 * Purpose: Untuk P3-Pelatih, Screen 1
	 * Modul: P3-Pelatih
	 * Author:
	*/
	function tetapan_temuduga()
	{
		//  get info user login
		$user = $this->ion_auth->user()->row();
		// echo "<pre>";var_dump($user);echo "</pre>";exit;
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
		$this->mViewData["res_giatmara"] = $res_giatmara;

		$res_kursus = $this->lpp04->get_all_kursus($giatmara_id);
		$this->mViewData["res_kursus"] = $res_kursus;

		// $this->mViewData["res_negeri"] = $this->lpp04->get_all_negeri();
		$this->mViewData["res_kewarganegaraan"] = $this->lpp04->get_all_kewarganegaraan();
		$this->mPageTitle = 'Tetapan Temuduga';

		$this->mViewData["url"] = "tetapkan_tetapan_temuduga";//"admin/lpp04/tetapkan_tetapan_temuduga";//change by dei, cos the script stop workin, 20181-17 
  	$this->render("gspel_pelatih/lpp04/tetapan_temuduga");
	}

	/*
	 * Method: tetapkan_tetapan_temuduga
	 * Purpose: Untuk P3-Pelatih, Screen 1
	 * Modul: P3-Pelatih
	 * Author:
	 * Deprecated: digabung ke method tetapan_temuduga
	*/
	function tetapkan_tetapan_temuduga()
	{
		//  get info user login
		$user = $this->ion_auth->user()->row();
		$user_staff = $user->id_staff;

		$negeri = $this->input->post('opt_negeri');
		$giatmara = $this->input->post('opt_giatmara');
		$kursus = $this->input->post('opt_kursus');
		$warganegara = $this->input->post('opt_warganegara');
		$sesi_kemasukan = $this->input->post("opt_sesi_kemasukan");

		switch ($this->ion_auth->get_users_groups()->row()->id) {
			case '2':
				$row_negeri = $this->lpp04->get_all_negeri();
				$res_giatmara = $this->lpp04->get_all_giatmara($negeri);

				$giatmara_id = $res_giatmara[0]->id;
				$giatmara_nama = $res_giatmara[0]->nama_giatmara;
				$giatmara_email = $res_giatmara[0]->email;
				$giatmara_telefon = $res_giatmara[0]->tel_no;
				$giatmara_negeri = $res_giatmara[0]->id_negeri;

				$res_staff = $this->lpp04->get_data_staff(array("id_giatmara" => $giatmara_id))->result();

				$res_giatmara = $this->lpp04->get_all_giatmara($negeri);
				$this->mViewData["res_giatmara"] = $res_giatmara;

				break;

			default:
				//$row_giatmara = $this->lpp04->get_giatmara($user_staff);
				$row_giatmara = $this->lpp04->get_giatmara_pangku_tugas($user_staff);

				$row_negeri = $this->lpp04->get_negeri($row_giatmara->id_negeri);
				$res_giatmara = $this->lpp04->get_giatmara_by_id($row_giatmara->id_giatmara);

				$giatmara_id = $row_giatmara->id_giatmara;
				$giatmara_nama = $row_giatmara->nama_giatmara;
				$giatmara_email = $row_giatmara->email;
				$giatmara_telefon = $row_giatmara->tel_no;
				$giatmara_negeri = $row_giatmara->id_negeri;

				$res_staff = $this->lpp04->get_staff($giatmara_id);

				$res_giatmara = $this->lpp04->get_giatmara_by_id($giatmara_id);
				$this->mViewData["res_giatmara"] = $res_giatmara;

				break;
		}

		$this->mViewData["row_negeri"] = $row_negeri;

		$res_kursus = $this->lpp04->get_all_kursus($giatmara_id);
		$this->mViewData["res_kursus"] = $res_kursus;

		// $this->mViewData["res_negeri"] = $this->lpp04->get_all_negeri();
		$this->mViewData["res_kewarganegaraan"] = $this->lpp04->get_all_kewarganegaraan();

		$res_senarai_permohonan = $this->lpp04->get_all_senarai_permohonan($negeri, $giatmara, $kursus, $warganegara, $sesi_kemasukan);
		$this->mViewData["res_senarai_permohonan"] = $res_senarai_permohonan;
		//  get info user login
		$user = $this->ion_auth->user()->row();
		$user_staff = $user->id_staff;
		//$row_giatmara = $this->lpp04->get_giatmara($user_staff);
		$row_giatmara = $this->lpp04->get_giatmara_pangku_tugas($user_staff);

		$giatmara_id = $row_giatmara->id_giatmara;
		$giatmara_nama = $row_giatmara->nama_giatmara;
		$giatmara_email = $row_giatmara->email;
		$giatmara_telefon = $row_giatmara->tel_no;
		$giatmara_negeri = $row_giatmara->id_negeri;

		// get all id_staff in staff_info_pangku_tugas
		$res_id_staff = $this->lpp04->get_id_staff_staff_info_pangku_tugas($giatmara_id);
		foreach ($res_id_staff as $val_id_staff)
		{
			$id_staff[] = $val_id_staff->id_staff;
		}

		$res_staff = $this->lpp04->get_staff($giatmara_id);
		$this->mViewData["res_staff"] = $res_staff;

		$this->mViewData["res_sesi"] = $this->lpp04->get_all_intake($giatmara, $kursus);

		$this->mViewData["id_negeri"] = $negeri;
		$this->mViewData["kursus"] = $kursus;
		$this->mViewData["warganegara"] = $warganegara;
		$this->mViewData["id_giatmara"] = $giatmara_id;
		$this->mViewData["nama_giatmara"] = $giatmara_nama;
		$this->mViewData["email_giatmara"] = $giatmara_email;
		$this->mViewData["telefon_giatmara"] = $giatmara_telefon;
		$this->mViewData["url"] = "tetapkan_tetapan_temuduga";//"admin/lpp04/tetapkan_tetapan_temuduga";//change by dei, cos the script stop workin, 20181-17 
		$this->mPageTitle = 'Tetapan Temuduga';
		$this->render('gspel_pelatih/lpp04/senarai_temuduga');
  }

	/*
	 * Method: tetapkan_temuduga
	 * Purpose: Action Untuk P3-Pelatih, Screen 1
	 * Modul: P3-Pelatih
	 * Author:
	*/
	function tetapkan_temuduga()
	{
		//$this->output->enable_profiler(TRUE);
		#echo "<pre>";print_r($this->input->post());echo "</pre>";
		//$btn_tetapkan = $this->input->post('btn_tetapkan_temuduga');
		if($this->input->post('btn_tetapkan_temuduga')){
			$btn_tetapkan="btn_tetapkan_temuduga";
		} else {
			$btn_tetapkan="";
		}
		$var_id_giatmara = $this->input->post('id_giatmara');
		$var_id_settings_tawaran_kursus = $this->input->post('id_settings_tawaran_kursus');
		$var_chk_temuduga = $this->input->post('chk_temuduga');
		$var_tgl = $this->input->post('txt_tgl');
		// $var_jam = $this->input->post('txt_jam');
		$var_jam = $this->input->post('opt_masa').":".$this->input->post('opt_menit');
		$var_tempat = $this->input->post('txt_tempat');
		$var_pegawai = $this->input->post('opt_pegawai');
		$var_jawatan = $this->input->post('txt_jawatan');
		$var_emel = $this->input->post('txt_emel');
		$var_no_telefon = $this->input->post('txt_no_telefon');

		$tgl_dt = new DateTime($var_tgl);

		// Jika klik tombol tetapkan
		$suxes = 0;
		$failx = 0;
		if ($btn_tetapkan === "btn_tetapkan_temuduga")
		{
			if (isset($var_chk_temuduga) == 1 && is_array($var_chk_temuduga)) {
				foreach ($var_chk_temuduga as $key => $value)
				{
					$data["id_permohonan"] = $key;
					$data["id_giatmara"] = $var_id_giatmara;
					$data["id_kursus"] = $value;
					$data["tarikh_waktu"] = $tgl_dt->format("Y-m-d")." ".substr($var_jam, 0, 5);
					$data["tempat"] = $var_tempat;
					$data["pegawai"] = $var_pegawai;
					$data["jawatan"] = $var_jawatan;
					$data["email"] = $var_emel;
					$data["no_telefon"] = $var_no_telefon;
					$data["cetak"] = 0; // status sudah diprint
					// $data["keputusan_temuduga"] = 0;
					$data["keputusan_temuduga"] = 1;
					$data["tukar_kursus"] = $value;
					$data["jenis_pelatih"] = "LPP04";
					$data["id_pemohon"] = $key;
					#echo "<pre>";print_r($data);echo "</pre>";
					//$simpan = 1;
					$simpan = $this->lpp04->insert_temuduga_tetapan($data);
					if($simpan){
						$suxes++;
					} else {
						$failx++;
					}
				}
				$datax['simpan']="".$suxes." Pelatih dibuatkan temuduga, ".$failx." pelatih error dibuatkan temuduga";
			} else {
				$datax['simpan'] = "Sila pilih sekurang-kurangnya seorang calon! ";
			}
		}
		else
		{
			$datax['simpan'] = "Sila klik buttong [Tetapkan Temuduga dan Tulis Surat Panggilan Temuduga]!";
		}
		$datax['success']=$suxes;
		$datax['error']=$failx;
		echo json_encode($datax);
	}
	### END BLOCK P3-PELATIH, SCREEN 1

	function cetakan_permohonan()
	{
		// Empty method
	}

	### BLOCK P3-Pelatih, Screen 2 ###
	/*
	 * Method: cetakan_surat_temuduga
	 * Purpose: Untuk P3-Pelatih, Screen 2
	 * Modul: P3-Pelatih
	 * Author:
	*/
	function cetakan_surat_temuduga()
	{
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
		$this->mViewData["res_giatmara"] = $res_giatmara;

		$res_kursus = $this->lpp04->get_all_kursus($giatmara_id);
		$this->mViewData["res_kursus"] = $res_kursus;

		// $this->mViewData["res_negeri"] = $this->lpp04->get_all_negeri();
		$this->mViewData["res_kewarganegaraan"] = $this->lpp04->get_all_kewarganegaraan();

		$this->mPageTitle = 'Cetakan Surat Temuduga';
		$this->mViewData["url"] = "tetapkan_cetakan_temuduga";
		$this->render("gspel_pelatih/lpp04/tetapan_temuduga");
	}

	/*
	 * Method: tetapkan_cetakan_temuduga
	 * Purpose: Untuk P3-Pelatih, Screen 2
	 * Modul: P3-Pelatih
	 * Author:
	*/
	function tetapkan_cetakan_temuduga()
	{
		//
		$cetak_ok="";
		if(!empty($_POST['btn_cetak'])){

			$post = $this->input->post();

			if(@$post["btn_export"]){
				$this->session->itemPost = $post;
				$this->load->library('session');
				redirect('admin/lpp04/tetapkan_cetakan_temuduga_cetak_excel','refresh');
			}

			if(@$post["btn_cetak"]){ // melalui tombol cetak
				$id = @$post["chk_temuduga"];
			} else {
				$getUri = $this->uri->segment(5);
				$id[$getUri] = $getUri;
			}

			$this->session->set_userdata('dei_id', $id);
			if($id) {
				foreach($id as $val) {
					//getdata
					$data = $this->lpp04->getDataCetakanEmuduga($val);
					$dt = new DateTime($data[0]["tarikh_temuduga"]);
					//update temuduga_tetapan
					$this->lpp04->update_temuduga_tetapan_cetak($val);
				}
			}
			$cetak_ok="ok";
			$this->mViewData['dei_cetak']=$cetak_ok;
		}
		//

		$user = $this->ion_auth->user()->row();
		$user_staff = $user->id_staff;

		$negeri = $this->input->post('opt_negeri');
		$giatmara = $this->input->post('opt_giatmara');
		$kursus = $this->input->post('opt_kursus');
		$warganegara = $this->input->post('opt_warganegara');
		$sesi_kemasukan = $this->input->post("opt_sesi_kemasukan");

		switch ($this->ion_auth->get_users_groups()->row()->id) {
			case '2':
				$row_negeri = $this->lpp04->get_all_negeri();
				$res_giatmara = $this->lpp04->get_all_giatmara($negeri);

				$giatmara_id = $res_giatmara[0]->id;
				$giatmara_nama = $res_giatmara[0]->nama_giatmara;
				$giatmara_email = $res_giatmara[0]->email;
				$giatmara_telefon = $res_giatmara[0]->tel_no;
				$giatmara_negeri = $res_giatmara[0]->id_negeri;

				$res_staff = $this->lpp04->get_data_staff(array("id_giatmara" => $giatmara_id))->result();

				$res_giatmara = $this->lpp04->get_all_giatmara($negeri);
				$this->mViewData["res_giatmara"] = $res_giatmara;

				break;

			default:
				//$row_giatmara = $this->lpp04->get_giatmara($user_staff);
				$row_giatmara = $this->lpp04->get_giatmara_pangku_tugas($user_staff);

				$row_negeri = $this->lpp04->get_negeri($row_giatmara->id_negeri);
				$res_giatmara = $this->lpp04->get_giatmara_by_id($row_giatmara->id_giatmara);

				$giatmara_id = $row_giatmara->id_giatmara;
				$giatmara_nama = $row_giatmara->nama_giatmara;
				$giatmara_email = $row_giatmara->email;
				$giatmara_telefon = $row_giatmara->tel_no;
				$giatmara_negeri = $row_giatmara->id_negeri;

				$res_staff = $this->lpp04->get_staff($giatmara_id);

				$res_giatmara = $this->lpp04->get_giatmara_by_id($giatmara_id);
				$this->mViewData["res_giatmara"] = $res_giatmara;

				break;
		}

		$this->mViewData["row_negeri"] = $row_negeri;
		$this->mViewData["res_giatmara"] = $res_giatmara;

		$res_kursus = $this->lpp04->get_all_kursus($giatmara_id);
		$this->mViewData["res_kursus"] = $res_kursus;

		// $this->mViewData["res_negeri"] = $this->lpp04->get_all_negeri();
		$this->mViewData["res_kewarganegaraan"] = $this->lpp04->get_all_kewarganegaraan();
		$this->mViewData["url"] = "tetapkan_cetakan_temuduga";

		/*
		if (count($this->input->post()) && $this->input->post('btn_simpan')==='btn_simpan') {
			#echo "<pre>";print_r($this->input->post());echo "</pre>";
			$negeri = $this->input->post('data_negeri');
			$giatmara = $this->input->post('data_giatmara');
			$kursus = $this->input->post('data_kursus');
			$warganegara = $this->input->post('data_warganegara');
			$sesi_kemasukan = $this->input->post("data_sesikemasukan");
			$tindakan = $this->input->post('chk_temuduga');
			if (count($tindakan)) {
				foreach ($tindakan as $idx=>$val) {
					#echo $idx."=".$val."<br/>";
					$data = array("keputusan_temuduga" => "1");
					$this->db->where('id', $idx);
					$this->db->update('temuduga_tetapan', $data);
					#echo $this->db->last_query();
				}
			}
		}
		*/

		//$res_senarai_permohonan = $this->lpp04->get_cetakan_surat_temuduga($negeri, $giatmara, $kursus, $warganegara, $sesi_kemasukan);
		$hal=1;
		if($this->input->post('next')) {
			$hal=$this->input->post('hal');
			$hal=$hal+1;
		}

		if($this->input->post('prev')) {
			$hal=$this->input->post('hal');
			$hal=$hal-1;
		}


		$halx=($hal-1)*10;
		$this->mViewData["hal"]= $hal;
		$cari="";
		if($this->input->post('cari')) $cari=$this->input->post('cari');

		$res_senarai_permohonan = $this->lpp04->get_cetakan_surat_temuduga_dei($negeri, $giatmara, $kursus, $warganegara, $sesi_kemasukan, $halx, $cari);
		$this->mViewData["res_senarai_permohonan"] = $res_senarai_permohonan;
		#echo "<pre>";print_r($res_senarai_permohonan);echo "</pre>";

		//  get info user login
		$user = $this->ion_auth->user()->row();
		$user_giatmara = $user->giatmara_id;
		$row_giatmara = $this->lpp04->get_giatmara($user_giatmara);
		$giatmara_id = $row_giatmara->id;
		$giatmara_nama = $row_giatmara->nama_giatmara;
		$giatmara_email = $row_giatmara->email;
		$giatmara_telefon = $row_giatmara->tel_no;
		$giatmara_negeri = $row_giatmara->id_negeri;

		$res_staff = $this->lpp04->get_staff($giatmara_id);

		$this->mViewData["res_sesi"] = $this->lpp04->get_all_intake($giatmara, $kursus);

		$this->mViewData["kursus"] = $kursus;
		$this->mViewData["warganegara"] = $warganegara;
		$this->mViewData["data_negeri"] = $negeri;
		$this->mViewData["data_giatmara"] = $giatmara;
		$this->mViewData["data_kursus"] = $kursus;
		$this->mViewData["data_warganegara"] = $warganegara;
		$this->mViewData["data_sesikemasukan"] = $sesi_kemasukan;
		$this->mViewData["res_staff"] = $sesi_kemasukan;

		$this->mViewData["id_giatmara"] = $giatmara_id;
		#$this->mViewData["nama_giatmara"] = $giatmara_nama;
		#$this->mViewData["email_giatmara"] = $giatmara_email;
		#$this->mViewData["telefon_giatmara"] = $giatmara_telefon;
		$this->mPageTitle = 'Cetakan Surat Temuduga';

		$this->render('gspel_pelatih/lpp04/senarai_cetakan_surat_temuduga');
	}

	//:-) am here guys
	// sungai besi 2018-04-09
	// ridei.karim@gmail.com
	//deprecated
	function tetapkan_cetakan_temuduga_simpan(){
		$post = $this->input->post();

		if(@$post["btn_export"]){
			$this->session->itemPost = $post;
			$this->load->library('session');
			redirect('admin/lpp04/tetapkan_cetakan_temuduga_cetak_excel','refresh');
		}

		if(@$post["btn_cetak"]){ // melalui tombol cetak
			$id = @$post["chk_temuduga"];
		} else {
			$getUri = $this->uri->segment(5);
			$id[$getUri] = $getUri;
		}

		if($id) {
			foreach($id as $val) {
				//getdata
				$data = $this->lpp04->getDataCetakanEmuduga($val);
				$dt = new DateTime($data[0]["tarikh_temuduga"]);
				//update temuduga_tetapan
				$this->lpp04->update_temuduga_tetapan_cetak($val);
			}
		}
		redirect("admin/lpp04/tetapkan_cetakan_temuduga");
	}

	//ridei.karim@gmail.com
	//sunga besi 2018 april 10
	function cetakpdf(){

		$id=$this->session->userdata("dei_id");
		if($id) {
			$this->load->library('Pdf');

			$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
			$pdf->SetTitle('Cetakan Surat Temuduga');
			$pdf->SetHeaderData(PDF_HEADER_LOGO, 13,"","");

			/******************************************************************************/
			$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
			$pdf->SetMargins(PDF_MARGIN_LEFT, 10, PDF_MARGIN_RIGHT);
			$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
			$pdf->SetFooterMargin(0);
			$pdf->SetAutoPageBreak(TRUE, 5);
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);
			$pdf->SetFont('helvetica','',10);
			/******************************************************************************/

			foreach($id as $val) {
				$nomor_rujukan=str_pad($val, 5, "0", STR_PAD_LEFT);
				//getdata
				$data = $this->lpp04->getDataCetakanEmuduga($val);$data2 = $this->db->query("select * from permohonan_butir_peribadi where id = (select id_permohonan from temuduga_tetapan  where id=?)", array($val))->row_array();
				$dt = new DateTime($data[0]["tarikh_temuduga"]);
				//update temuduga_tetapan
				$this->lpp04->update_temuduga_tetapan_cetak($val);

				$html = '';
				$html = "<img src=\"assets/images/giatmara03.png\" width=\"100px\"><br/>
				<table width=\"500px\" border=\"0\" style=\"text-align: justify;\">
					<tr>
						<td>&nbsp;</td>
						<td align=\"right\">
							<table border=\"0\" width=\"230px\" style=\"padding-right: 2px;\">
								<tr>
									<td width=\"10%\">&nbsp;</td><td width=\"35%\" align=\"left\">Rujukan kami</td><td width=\"4%\">:</td><td width=\"58%\"  align=\"left\"><b>GM400/12/".date("Y")."/TMD/".$nomor_rujukan."</b></td>
								</tr>
								<tr>
									<td width=\"10%\">&nbsp;</td><td width=\"35%\"  align=\"left\">Tarikh</td><td width=\"4%\">:</td><td width=\"58%\"  align=\"left\">".date("d-m-Y")."</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					<tr>
						<td><b>".strtoupper($data[0]["nama_penuh"])."</b></td>
					</tr>
					<tr>
						<td><b>".$data[0]["no_mykad"]."</b></td>
					</tr>
					<tr>
					<td>".strtoupper($data[0]["alamat_butir_peribadi"])."</td>
					</tr>
					<tr>
						<td>".strtoupper($data2["poskod_3"]).", ".strtoupper($data2["bandar_3"])."</td>
					</tr>
					<tr>
						<td>".$data2['negeri_3'].", ".strtoupper($data[0]["nama_negara"])."</td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td colspan=\"2\"><b>TAWARAN MENGHADIRI SESI TEMUDUGA KEMASUKAN <br>LATIHAN KEMAHIRAN GIATMARA SEPENUH MASA</b><br></td>
					</tr>
					<tr>
						<td colspan=\"2\">
							Sukacita dimaklumkan saudara / saudari telah dipilih untuk menghadiri sesi temuduga kemasukan ke Latihan Kemahiran GIATMARA Sepenuh Masa. Butiran temuduga adalah seperti berikut:
							<br/>
						</td>
					</tr>
					<tr>
						<td>
							<table width=\"100%\" border=\"0\" cellpadding=\"1px\">
								<tr>
									<td width=\"60px\">&nbsp;</td>
									<td width=\"150px\">Tarikh Temuduga</td>
									<td align=\"center\" width=\"10px\">:</td>
									<td width=\"280px\">".$dt->format("d-m-Y")."</td>
								</tr>
								<tr>
									<td width=\"60px\">&nbsp;</td>
									<td width=\"150px\">Pilihan Kursus</td>
									<td align=\"center\" width=\"10px\">:</td>
									<td width=\"280px\">".$data[0]["nama_kursus"]."</td>
								</tr>
								<tr>
									<td width=\"60px\">&nbsp;</td>
									<td width=\"150px\">Tempat</td>
									<td align=\"center\" width=\"10px\">:</td>
									<td width=\"280px\">GIATMARA ".strtoupper($data[0]["nama_giatmara"])."<br>".strtoupper($data[0]["alamat_giatmara"])."</td>
								</tr>
								<tr>
									<td width=\"60px\">&nbsp;</td>
									<td width=\"150px\">Masa</td>
									<td align=\"center\" width=\"10px\">:</td>
									<td width=\"280px\">".$dt->format("h:i A")."</td>
								</tr>
								<tr>
									<td width=\"60px\">&nbsp;</td>
									<td width=\"150px\">Pegawai Untuk Dihubungi</td>
									<td align=\"center\" width=\"10px\">:</td>
									<td width=\"280px\">".$data[0]["pegawai_dihubungi"]."</td>
								</tr>
								<tr>
									<td width=\"60px\">&nbsp;</td>
									<td width=\"150px\">No. Telefon</td>
									<td align=\"center\" width=\"10px\">:</td>
									<td width=\"280px\">".$data[0]["no_telefon"]."</td>
								</tr>
								<tr>
									<td colspan=\"4\">&nbsp;</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td colspan=\"2\">
							2. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sehubungan dengan itu, saudara / saudari dikehendaki membawa bersama dokumen-dokumen dan sijil-sijil asal berkaitan permohonan sebagai rujukan GIATMARA ketika menghadiri sesi temuduga ini.
							<br/>
						</td>
					</tr>
					<tr>
						<td colspan=\"2\">
							3. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GIATMARA akan beranggapan bahawa saudara / saudari tidak lagi berminat meneruskan permohonan sekiranya gagal untuk menepati keperluan temuduga serta kegagalan menghadirkan diri pada tarikh sesi temuduga yang ditetapkan.<br>
						</td>
					</tr>
					<tr>
						<td colspan=\"2\">GIATMARA Malaysia mengucapkan syabas dan selamat maju jaya.<br><br></td>
					</tr>
					<tr>
						<td>Terima kasih.<br></td>
					</tr>
					<tr>
						<td colspan=\"2\">
							<b>'BERKHIDMAT UNTUK NEGARA'</b><br>
							<b>'Membandarkan Luar Bandar'</b><br><br><br><br>
							Pengarah<br>
							Bahagian Pembangunan Pelatih & Kerjaya<br>
							GIATMARA Sendirian Berhad<br>
						</td>
					</tr>

					<tr>
						<td colspan=\"2\" align=\"center\"><br><br><br><br><br><br><br><br><br>
							<span style=\"font-size:9px;\">
								<span style=\"font-weight: bold; font-style: italic;\">(Surat ini adalah janaan sistem dan dianggap telah ditandatangan)</span><br><br><br>
								GIATMARA Malaysia, Wisma GIATMARA, No. 39 & 41 Jalan Medan Tuanku, 50300 Kuala Lumpur <br>
								Tel: +603 2691 2690
							</span>
						</td>
					</tr>
				</table>
				";

				$pdf->AddPage();
				$pdf->writeHTML($html, true, false, true, false, '');
			}
			$pdf->Output('surat-temuduga.pdf', 'I');
		}

	}

	/*
	 * Method: tetapkan_cetakan_temuduga_cetak
	 * Purpose: Untuk P3-Pelatih, Screen 2 & 3
	 * Modul: P3-Pelatih
	 * Author:	ninolooh@gmail.com
	*/

	function tetapkan_cetakan_temuduga_cetak(){
		$post = $this->input->post();

		if(@$post["btn_export"]){
			$this->session->itemPost = $post;
			$this->load->library('session');
			redirect('admin/lpp04/tetapkan_cetakan_temuduga_cetak_excel','refresh');
		}

		if(@$post["btn_cetak"]){ // melalui tombol cetak
			$id = @$post["chk_temuduga"];
		} else {
			$getUri = $this->uri->segment(5);
			$id[$getUri] = $getUri;
		}

		if($id) {
			$this->load->library('Pdf');

			$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
			$pdf->SetTitle('Cetakan Surat Temuduga');
			$pdf->SetHeaderData(PDF_HEADER_LOGO, 13,"","");

			/******************************************************************************/
			$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
			$pdf->SetMargins(PDF_MARGIN_LEFT, 10, PDF_MARGIN_RIGHT);
			$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
			$pdf->SetFooterMargin(0);
			$pdf->SetAutoPageBreak(TRUE, 5);
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);
			$pdf->SetFont('helvetica','',10);
			/******************************************************************************/

			foreach($id as $val) {
				//getdata
				$data = $this->lpp04->getDataCetakanEmuduga($val);
				$dt = new DateTime($data[0]["tarikh_temuduga"]);
				//update temuduga_tetapan
				$this->lpp04->update_temuduga_tetapan_cetak($val);

				$html = '';
				$html = "<img src=\"assets/images/giatmara03.png\" width=\"100px\"><br/>
				<table width=\"500px\" border=\"0\" style=\"text-align: justify;\">
					<tr>
						<td>&nbsp;</td>
						<td align=\"right\">
							<table border=\"0\" width=\"230px\" style=\"padding-right: 2px;\">
								<tr>
									<td width=\"10%\">&nbsp;</td><td width=\"35%\" align=\"left\">Rujukan kami</td><td width=\"4%\">:</td><td width=\"58%\"  align=\"left\"><b>GM400/12/".date("Y")."/TMD/00001</b></td>
								</tr>
								<tr>
									<td width=\"10%\">&nbsp;</td><td width=\"35%\"  align=\"left\">Tarikh</td><td width=\"4%\">:</td><td width=\"58%\"  align=\"left\">".date("d-m-Y")."</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					<tr>
						<td><b>".strtoupper($data[0]["nama_penuh"])."</b></td>
					</tr>
					<tr>
						<td><b>".$data[0]["no_mykad"]."</b></td>
					</tr>
					<tr>
					<td>".strtoupper($data[0]["alamat_butir_peribadi"])."</td>
					</tr>
					<tr>
						<td>".strtoupper($data[0]["poskod"]).", ".strtoupper($data[0]["bandar"])."</td>
					</tr>
					<tr>
						<td>".strtoupper($data[0]["negeri_poskod"]).", ".strtoupper($data[0]["nama_negara"])."</td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td colspan=\"2\"><b>TAWARAN MENGHADIRI SESI TEMUDUGA KEMASUKAN <br>LATIHAN KEMAHIRAN GIATMARA SEPENUH MASA</b><br></td>
					</tr>
					<tr>
						<td colspan=\"2\">
							Sukacita dimaklumkan saudara / saudari telah dipilih untuk menghadiri sesi temuduga kemasukan ke Latihan Kemahiran GIATMARA Sepenuh Masa. Butiran temuduga adalah seperti berikut:
							<br/>
						</td>
					</tr>
					<tr>
						<td>
							<table width=\"100%\" border=\"0\" cellpadding=\"1px\">
								<tr>
									<td width=\"60px\">&nbsp;</td>
									<td width=\"150px\">Tarikh Temuduga</td>
									<td align=\"center\" width=\"10px\">:</td>
									<td width=\"280px\">".$dt->format("d-m-Y")."</td>
								</tr>
								<tr>
									<td width=\"60px\">&nbsp;</td>
									<td width=\"150px\">Pilihan Kursus</td>
									<td align=\"center\" width=\"10px\">:</td>
									<td width=\"280px\">".$data[0]["nama_kursus"]."</td>
								</tr>
								<tr>
									<td width=\"60px\">&nbsp;</td>
									<td width=\"150px\">Tempat</td>
									<td align=\"center\" width=\"10px\">:</td>
									<td width=\"280px\">GIATMARA ".strtoupper($data[0]["nama_giatmara"])."<br>".strtoupper($data[0]["alamat_giatmara"])."</td>
								</tr>
								<tr>
									<td width=\"60px\">&nbsp;</td>
									<td width=\"150px\">Masa</td>
									<td align=\"center\" width=\"10px\">:</td>
									<td width=\"280px\">".$dt->format("h:i A")."</td>
								</tr>
								<tr>
									<td width=\"60px\">&nbsp;</td>
									<td width=\"150px\">Pegawai Untuk Dihubungi</td>
									<td align=\"center\" width=\"10px\">:</td>
									<td width=\"280px\">".$data[0]["pegawai_dihubungi"]."</td>
								</tr>
								<tr>
									<td width=\"60px\">&nbsp;</td>
									<td width=\"150px\">No. Telefon</td>
									<td align=\"center\" width=\"10px\">:</td>
									<td width=\"280px\">".$data[0]["no_telefon"]."</td>
								</tr>
								<tr>
									<td colspan=\"4\">&nbsp;</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td colspan=\"2\">
							3. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sehubungan dengan itu, saudara / saudari dikehendaki membawa bersama dokumen-dokumen dan sijil-sijil asal berkaitan permohonan sebagai rujukan GIATMARA ketika menghadiri sesi temuduga ini.
							<br/>
						</td>
					</tr>
					<tr>
						<td colspan=\"2\">
							4. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GIATMARA akan beranggapan bahawa saudara / saudari tidak lagi berminat meneruskan permohonan sekiranya gagal untuk menepati keperluan temuduga serta kegagalan menghadirkan diri pada tarikh sesi temuduga yang ditetapkan.<br>
						</td>
					</tr>
					<tr>
						<td colspan=\"2\">GIATMARA Malaysia mengucapkan syabas dan selamat maju jaya.<br><br></td>
					</tr>
					<tr>
						<td>Terima kasih.<br></td>
					</tr>
					<tr>
						<td colspan=\"2\">
							<b>'BERKHIDMAT UNTUK NEGARA'</b><br>
							<b>'Membandarkan Luar Bandar'</b><br><br><br><br>
							Pengarah<br>
							Bahagian Pembangunan Pelatih & Kerjaya<br>
							GIATMARA Sendirian Berhad<br>
						</td>
					</tr>

					<tr>
						<td colspan=\"2\" align=\"center\"><br><br><br><br><br><br><br><br><br>
							<span style=\"font-size:9px;\">
								<span style=\"font-weight: bold; font-style: italic;\">(Surat ini adalah janaan sistem dan dianggap telah ditandatangan)</span><br><br><br>
								GIATMARA Malaysia, Wisma GIATMARA, No. 39 & 41 Jalan Medan Tuanku, 50300 Kuala Lumpur <br>
								Tel: +603 2691 2690
							</span>
						</td>
					</tr>
				</table>
				";

				$pdf->AddPage();
				$pdf->writeHTML($html, true, false, true, false, '');
			}
			$pdf->Output('surat-temuduga.pdf', 'I');
		}
	}

	/*
	 * Method: tetapkan_cetakan_temuduga_cetak_excel
	 * Purpose: Untuk P3-Pelatih, Screen 3
	 * Modul: P3-Pelatih
	 * Author:	ninolooh@gmail.com
	*/
	function tetapkan_cetakan_temuduga_cetak_excel(){
		$data = $this->session->userdata('itemPost');

		if($data){
			$this->load->view('gspel_pelatih/lpp04/excel_tetapkan_temuduga',$data);
		}

	}

	/*
	 * Method: tetapkan_cetakan_temuduga
	 * Purpose: Untuk Acitionn P3-Pelatih, Screen 2, Cetak XLS
	 * Modul: P3-Pelatih
	 * Author:
	*/
	function xls_cetakansuratemuduga()
	{
		$n = 4;
		if ($this->uri->segment('1')==='my') $n=5;
		$arr_uri = $this->uri->uri_to_assoc($n);
		#echo "<pre>";print_r($arr_uri);echo "</pre>";

		require_once APPPATH.'/third_party/phpexcel/PHPExcel.php';

		$res_senarai_permohonan = $this->lpp04->get_cetakan_surat_temuduga($arr_uri['negeri'], $arr_uri['giatmara'], $arr_uri['kursus'], $arr_uri['wn'], $arr_uri['intake']);
		#echo "<pre>";print_r($res_senarai_permohonan);echo "</pre>";

		#/*
		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();

		// Set document properties
		$objPHPExcel->getProperties()->setCreator("Giatmara Malaysia")
									 ->setLastModifiedBy("Giatmara Malaysia");

		// Add some data
		$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue('A1', 'No.')
		            ->setCellValue('B1', 'Nama')
		            ->setCellValue('C1', 'No. MyKAD')
		            ->setCellValue('D1', 'No. HP')
								->setCellValue('E1', 'Tarikh Temuduga')
								->setCellValue('F1', 'Pegawai Dihubungi')
								->setCellValue('G1', 'Tarikh Cetakan');

		if (count($res_senarai_permohonan)>0) {
			$i=2;
			foreach ($res_senarai_permohonan as $res) {
				$objPHPExcel->setActiveSheetIndex(0)
				            ->setCellValue('A'.$i, $i-1)
				            ->setCellValue('B'.$i, $res->nama_penuh)
				            ->setCellValueExplicit('C'.$i, $res->no_mykad, PHPExcel_Cell_DataType::TYPE_STRING)
				            ->setCellValueExplicit('D'.$i, $res->no_hp, PHPExcel_Cell_DataType::TYPE_STRING)
										->setCellValue('E'.$i, $res->tarikh_temuduga)
										->setCellValue('F'.$i, $res->pegawai_dihubungi)
										/*->setCellValue('G'.$i, date('Y-m-d h:i:s'));*/
										->setCellValue('G'.$i, $res->tarikh_cetakan);
				$i++;
			}
		}

		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

		// Rename worksheet
		//$objPHPExcel->getActiveSheet()->setTitle('Simple');

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="cetakansuratemuduga.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
		#*/
	}
	### END BLOCK P3-Pelatih, Screen 2 ###

	### BLOCK P3-Pelatih, Screen 3 ###
	/*
	 * Method: keputusan_temuduga
	 * Purpose: Untuk P3-Pelatih, Screen 3
	 * Modul: P3-Pelatih
	 * Author:
	*/
	function keputusan_temuduga()
	{
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
		$this->mViewData["res_giatmara"] = $res_giatmara;

		$res_kursus = $this->lpp04->get_all_kursus($giatmara_id);
		$this->mViewData["res_kursus"] = $res_kursus;

		// $this->mViewData["res_negeri"] = $this->lpp04->get_all_negeri();
		$this->mViewData["res_kewarganegaraan"] = $this->lpp04->get_all_kewarganegaraan();
		$this->mPageTitle = 'Keputusan Temuduga';

		$this->mViewData["url"] = "tetapkan_keputusan_temuduga";//"admin/lpp04/tetapkan_keputusan_temuduga"; //change by dei, cos the script stop workin, 20181-17 
		$this->render("gspel_pelatih/lpp04/tetapan_temuduga");
	}

	/*
	 * Method: tetapkan_keputusan_temuduga
	 * Purpose: Untuk P3-Pelatih, Screen 3
	 * Modul: P3-Pelatih
	 * Author:
	*/
	function tetapkan_keputusan_temuduga()
	{
		//  get info user login
		$user = $this->ion_auth->user()->row();
		$user_staff = $user->id_staff;

		switch ($this->ion_auth->get_users_groups()->row()->id) {
			case '2':
				$row_negeri = $this->lpp04->get_all_negeri();
				$res_giatmara = $this->lpp04->get_all_giatmara($negeri);

				$giatmara_id = $res_giatmara[0]->id;
				$giatmara_nama = $res_giatmara[0]->nama_giatmara;
				$giatmara_email = $res_giatmara[0]->email;
				$giatmara_telefon = $res_giatmara[0]->tel_no;
				$giatmara_negeri = $res_giatmara[0]->id_negeri;

				$res_staff = $this->lpp04->get_data_staff(array("id_giatmara" => $giatmara_id))->result();

				$res_giatmara = $this->lpp04->get_all_giatmara($negeri);
				$this->mViewData["res_giatmara"] = $res_giatmara;

				break;

			default:
				//$row_giatmara = $this->lpp04->get_giatmara($user_staff);
				$row_giatmara = $this->lpp04->get_giatmara_pangku_tugas($user_staff);

				$row_negeri = $this->lpp04->get_negeri($row_giatmara->id_negeri);
				$res_giatmara = $this->lpp04->get_giatmara_by_id($row_giatmara->id_giatmara);

				$giatmara_id = $row_giatmara->id_giatmara;
				$giatmara_nama = $row_giatmara->nama_giatmara;
				$giatmara_email = $row_giatmara->email;
				$giatmara_telefon = $row_giatmara->tel_no;
				$giatmara_negeri = $row_giatmara->id_negeri;

				$res_staff = $this->lpp04->get_staff($giatmara_id);

				$res_giatmara = $this->lpp04->get_giatmara_by_id($giatmara_id);
				$this->mViewData["res_giatmara"] = $res_giatmara;

				break;
		}

		$this->mViewData["row_negeri"] = $row_negeri;
		$this->mViewData["res_giatmara"] = $res_giatmara;

		$res_kursus = $this->lpp04->get_all_kursus($giatmara_id);
		$this->mViewData["res_kursus"] = $res_kursus;

		// $this->mViewData["res_negeri"] = $this->lpp04->get_all_negeri();
		$this->mViewData["res_kewarganegaraan"] = $this->lpp04->get_all_kewarganegaraan();

		$negeri = $this->input->post('opt_negeri');
		$giatmara = $this->input->post('opt_giatmara');
		$kursus = $this->input->post('opt_kursus');
		$warganegara = $this->input->post('opt_warganegara');
		$sesi_kemasukan = $this->input->post("opt_sesi_kemasukan");
		$res_senarai_permohonan = $this->lpp04->get_keputusan_temuduga($negeri, $giatmara, $kursus, $warganegara, $sesi_kemasukan);
		$this->mViewData["res_senarai_permohonan"] = $res_senarai_permohonan;
		$this->mViewData["row_keputusan"] = $this->lpp04->getRefKeputusanTemuduga();
		$this->mViewData["row_kursus"] = $this->lpp04->get_all_kursus($giatmara, $sesi_kemasukan);
		#echo "<pre>";print_r($this->mViewData["res_senarai_permohonan"]);echo "</pre>";

		//  get info user login
		$user = $this->ion_auth->user()->row();
		$user_giatmara = $user->giatmara_id;
		$row_giatmara = $this->lpp04->get_giatmara($user_giatmara);
		$giatmara_id = $row_giatmara->id;
		#$giatmara_nama = $row_giatmara->nama_giatmara;
		#$giatmara_email = $row_giatmara->email;
		#$giatmara_telefon = $row_giatmara->tel_no;
		#$giatmara_negeri = $row_giatmara->id_negeri;

		$res_staff = $this->lpp04->get_staff($giatmara_id);

		$this->mViewData["res_sesi"] = $this->lpp04->get_all_intake($giatmara, $kursus);

		$this->mViewData["kursus"] = $kursus;
		$this->mViewData["warganegara"] = $warganegara;
		$this->mViewData["res_staff"] = $res_staff;
		$this->mViewData['id_kursus'] = $kursus;
		$this->mViewData["id_giatmara"] = $giatmara_id;
		$this->mViewData["id_wn"] = $warganegara;
		$this->mViewData["id_intake"] = $sesi_kemasukan;
		#$this->mViewData["nama_giatmara"] = $giatmara_nama;
		#$this->mViewData["email_giatmara"] = $giatmara_email;
		#$this->mViewData["telefon_giatmara"] = $giatmara_telefon;
		$this->mViewData["url"] = "tetapkan_keputusan_temuduga";
		$this->mPageTitle = 'Keputusan Temuduga';
		$this->render('gspel_pelatih/lpp04/senarai_keputusan_temuduga');
	}

	/*
	 * Method: tetapan_keputusan_temuduga
	 * Purpose: Untuk P3-Pelatih, Screen 3
	 * Modul: P3-Pelatih
	 * Author:
	*/
	function tetapan_keputusan_temuduga()
	{
		#die();
		#echo "<pre>";print_r($this->input->post());echo "</pre>";
		$negeri = $this->input->post('id_negeri');
		$giatmara = $this->input->post('id_giatmara');
		$kursus = $this->input->post('id_kursus');
		$warganegara = $this->input->post('id_wn');
		$sesi_kemasukan = $this->input->post("id_intake");
		$opt_temuduga = $this->input->post("idtetapantemuduga");
		$opt_keputusan = $this->input->post("opt_keputusan");
		$opt_kursus = $this->input->post("opt_kursus");
		$opt_catatan = $this->input->post("opt_catatan");
		$opt_idsettingkursus = $this->input->post("idsettingstawarankursus");

		foreach ($opt_temuduga as $idx=>$val) {
			$data = array(
				'keputusan_temuduga' => (($opt_keputusan[$idx]=="") ? 1:$opt_keputusan[$idx]),
				/*'tukar_kursus' => (($opt_kursus[$idx]=="") ? $opt_idsettingkursus[$idx]:$opt_kursus[$idx]),*/
				'id_kursus' => (($opt_kursus[$idx]=="") ? $opt_idsettingkursus[$idx]:$opt_kursus[$idx]),
				'catatan' => (($opt_catatan[$idx]=="") ? "":$opt_catatan[$idx]),
			);
			#echo "<pre>";print_r($data);echo "</pre>";
			$this->db->where('id', $val);
			// echo $this->db->set($data)->get_compiled_update("temuduga_tetapan");exit;
			$this->db->update('temuduga_tetapan', $data);
			// echo $this->db->last_query();
		}
		redirect('admin/lpp04/keputusan_temuduga', false);
	}
	### END BLOCK P3-Pelatih, Screen 3 ###

	### BLOCK P3-Pelatih, Screen 4 ###
	/*
	 * Method: senarai_gagal_temuduga
	 * Purpose: Untuk P3-Pelatih, Screen 4
	 * Modul: P3-Pelatih
	 * Author:
	*/
	function senarai_gagal_temuduga()
	{
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
		$this->mViewData["res_giatmara"] = $res_giatmara;

		$res_kursus = $this->lpp04->get_all_kursus($giatmara_id);
		$this->mViewData["res_kursus"] = $res_kursus;

		// $this->mViewData["res_negeri"] = $this->lpp04->get_all_negeri();
		$this->mViewData["res_kewarganegaraan"] = $this->lpp04->get_all_kewarganegaraan();
		$this->mPageTitle = 'Senarai Gagal Temuduga';

		$this->mViewData["url"] = "admin/lpp04/tetapkan_senarai_gagal_temuduga";
    $this->render("gspel_pelatih/lpp04/tetapan_temuduga");
	}

	/*
	 * Method: tetapkan_senarai_gagal_temuduga
	 * Purpose: Untuk P3-Pelatih, Screen 4
	 * Modul: P3-Pelatih
	 * Author:
	*/
	function tetapkan_senarai_gagal_temuduga()
	{
		//  get info user login
		$user = $this->ion_auth->user()->row();
		$user_staff = $user->id_staff;

		$negeri = $this->input->post('opt_negeri');
		$giatmara = $this->input->post('opt_giatmara');
		$kursus = $this->input->post('opt_kursus');
		$warganegara = $this->input->post('opt_warganegara');
		$sesi_kemasukan = $this->input->post("opt_sesi_kemasukan");

		switch ($this->ion_auth->get_users_groups()->row()->id) {
			case '2':
				$row_negeri = $this->lpp04->get_all_negeri();
				$res_giatmara = $this->lpp04->get_all_giatmara($negeri);

				$giatmara_id = $res_giatmara[0]->id;
				$giatmara_nama = $res_giatmara[0]->nama_giatmara;
				$giatmara_email = $res_giatmara[0]->email;
				$giatmara_telefon = $res_giatmara[0]->tel_no;
				$giatmara_negeri = $res_giatmara[0]->id_negeri;

				$res_staff = $this->lpp04->get_data_staff(array("id_giatmara" => $giatmara_id))->result();

				$res_giatmara = $this->lpp04->get_all_giatmara($negeri);
				$this->mViewData["res_giatmara"] = $res_giatmara;

				break;

			default:
				//$row_giatmara = $this->lpp04->get_giatmara($user_staff);
				$row_giatmara = $this->lpp04->get_giatmara_pangku_tugas($user_staff);

				$row_negeri = $this->lpp04->get_negeri($row_giatmara->id_negeri);
				$res_giatmara = $this->lpp04->get_giatmara_by_id($row_giatmara->id_giatmara);

				$giatmara_id = $row_giatmara->id_giatmara;
				$giatmara_nama = $row_giatmara->nama_giatmara;
				$giatmara_email = $row_giatmara->email;
				$giatmara_telefon = $row_giatmara->tel_no;
				$giatmara_negeri = $row_giatmara->id_negeri;

				$res_staff = $this->lpp04->get_staff($giatmara_id);

				$res_giatmara = $this->lpp04->get_giatmara_by_id($giatmara_id);
				$this->mViewData["res_giatmara"] = $res_giatmara;

				break;
		}

		$this->mViewData["row_negeri"] = $row_negeri;
		$this->mViewData["res_giatmara"] = $res_giatmara;

		$res_kursus = $this->lpp04->get_all_kursus($giatmara_id);
		$this->mViewData["res_kursus"] = $res_kursus;

		// $this->mViewData["res_negeri"] = $this->lpp04->get_all_negeri();
		$this->mViewData["res_kewarganegaraan"] = $this->lpp04->get_all_kewarganegaraan();

		$this->mViewData["res_sesi"] = $this->lpp04->get_all_intake($giatmara, $kursus);
		$this->mViewData["kursus"] = $kursus;
		$this->mViewData["warganegara"] = $warganegara;
		$this->mViewData["sesi"] = $sesi_kemasukan;

		if (count($this->input->post()) && $this->input->post('batalkan')==='batalkan') {
			#echo "batalkan<br/>";
			$negeri = $this->input->post('data_negeri');
			$giatmara = $this->input->post('data_giatmara');
			$kursus = $this->input->post('data_kursus');
			$warganegara = $this->input->post('data_warganegara');
			$sesi_kemasukan = $this->input->post("data_sesikemasukan");
			$data = array("keputusan_temuduga" => "1");
			$this->db->where('id', $this->input->post("idTetapanTemuduga"));
			// echo $this->db->get_compiled_update('temuduga_tetapan');exit;
			$this->db->update('temuduga_tetapan', $data);
			// echo $this->db->get_compiled_delete('temuduga_tetapan');exit;
			// $this->db->delete('temuduga_tetapan');
			#echo $this->db->last_query();
		}

		$this->mViewData["data_negeri"] = $negeri;
		$this->mViewData["data_giatmara"] = $giatmara;
		$this->mViewData["data_kursus"] = $kursus;
		$this->mViewData["data_warganegara"] = $warganegara;
		$this->mViewData["data_sesikemasukan"] = $sesi_kemasukan;

		//  get info user login
		$user = $this->ion_auth->user()->row();
		$user_giatmara = $user->giatmara_id;
		$row_giatmara = $this->lpp04->get_giatmara($user_giatmara);
		$giatmara_id = $row_giatmara->id;
		$giatmara_nama = $row_giatmara->nama_giatmara;
		$giatmara_email = $row_giatmara->email;
		$giatmara_telefon = $row_giatmara->tel_no;
		$giatmara_negeri = $row_giatmara->id_negeri;

		$res_senarai_permohonan = $this->lpp04->get_gagal_temuduga($negeri, $giatmara, $kursus, $warganegara, $sesi_kemasukan);
		$this->mViewData["res_senarai_permohonan"] = $res_senarai_permohonan;
		#echo "<pre>";print_r($res_senarai_permohonan);echo "</pre>";

		$this->mViewData["res_kewarganegaraan"] = $this->lpp04->get_all_kewarganegaraan();
		$this->mPageTitle = 'Senarai Gagal Temuduga';

		$this->mViewData["url"] = "tetapkan_senarai_gagal_temuduga";
		$this->render('gspel_pelatih/lpp04/senarai_gagal_temuduga');
	}
	### END BLOCK P3-Pelatih, Screen 4 ###

	function senarai_permohonan()
	{
		$user = $this->ion_auth->user()->row();
		$user_giatmara = $user->giatmara_id;
		$row_giatmara = $this->lpp04->get_giatmara($user_giatmara);
		$giatmara_id = $row_giatmara->id;
		$giatmara_negeri = $row_giatmara->id_negeri;

		$row_negeri = $this->lpp04->get_negeri($giatmara_negeri);
		$this->mViewData["row_negeri"] = $row_negeri;

		// $this->mViewData["res_negeri"] = $this->lpp04->get_all_negeri();
		$this->mViewData["res_kewarganegaraan"] = $this->lpp04->get_all_kewarganegaraan();
		$this->mPageTitle = 'LPP04 | Senarai Permohonan';

		$this->mViewData["url"] = "tetapkan_senarai_permohonan";
		$this->render("gspel_pelatih/lpp04/senarai_permohonan");
	}

	function tetapkan_senarai_permohonan()
	{

	}

	### Block P4-Pelatih ###
	/**
	 * Function: tetapan_tawaran
	 * Author: bambangpriambodo@gmail.com
	 * Author2 : ninolooh@gmail.com
	 * Modul: Pelatih - P4
	 * Screen: 1
	**/
	function tetapan_tawaran()
	{
		// Load languages
		$this->lang->load('form', 'malaysia');

		$user = $this->ion_auth->user()->row();
		$user_giatmara = $user->giatmara_id;
		$row_giatmara = $this->lpp04->get_giatmara($user_giatmara);
		$giatmara_id = $row_giatmara->id;
		$giatmara_negeri = $row_giatmara->id_negeri;

		$row_negeri = $this->lpp04->get_negeri($giatmara_negeri);
		$this->mViewData["row_negeri"] = $row_negeri;
		$this->mViewData["res_negeri"] = $this->lpp04->get_all_negeri();

		// If Header submited
		$negeri = trim($this->input->post('opt_negeri'));
		$giatmara = trim($this->input->post('opt_giatmara'));
		$kursus = trim($this->input->post('opt_kursus'));
		if ($negeri!="" && $giatmara!="" && $kursus!="") {
		}

		// Handling View
		$this->mPageTitle = $this->lang->line('tawaran_kursus_tetapan_tawaran_title', FALSE);
		$this->mViewData["negeri_opt"] = $negeri;
		$this->mViewData["giatmara_opt"] = $giatmara;
		$this->mViewData["kursus_opt"] = $kursus;

		@$this->mViewData["id_giatmara"] = $giatmara_id;
		@$this->mViewData["nama_giatmara"] = $giatmara_nama;
		@$this->mViewData["email_giatmara"] = $giatmara_email;
		@$this->mViewData["telefon_giatmara"] = $giatmara_telefon;
		$this->mViewData["url"] = "tetapan_tawaran";
		$this->render("gspel_pelatih/lpp04/tetapan_tawaran");
	}

	/**
	 * Function: tetapkan_tetapan_tawaran
	 * Author: bambangpriambodo@gmail.com
	 * Modul: Pelatih - P4
	 * Screen: 1
	**/
	function tetapkan_tetapan_tawaran()
	{
		redirect('admin/lpp04/cetakan_surat_tawaran','refresh');
	}

	/**
	 * Function: cetakan_surat_tawaran
	 * Author: bambangpriambodo@gmail.com
	 * Modul: Pelatih - P4
	 * Screen: 2
	**/
	function cetakan_surat_tawaran()
	{
		// Load languages
		$this->lang->load('form', 'malaysia');

		$user = $this->ion_auth->user()->row();
		$user_giatmara = $user->giatmara_id;
		$row_giatmara = $this->lpp04->get_giatmara($user_giatmara);
		$giatmara_id = $row_giatmara->id;
		$giatmara_negeri = $row_giatmara->id_negeri;

		$row_negeri = $this->lpp04->get_negeri($giatmara_negeri);
		$this->mViewData["row_negeri"] = $row_negeri;
		$this->mViewData["res_negeri"] = $this->lpp04->get_all_negeri();

		// If Header submited
		$negeri = trim($this->input->post('opt_negeri'));
		$giatmara = trim($this->input->post('opt_giatmara'));
		$kursus = trim($this->input->post('opt_kursus'));
		if ($negeri!="" && $giatmara!="" && $kursus!="") {
		}

		// Handling View
		$this->mPageTitle = $this->lang->line('tawaran_kursus_cetakan_tawaran_title', FALSE);
		$this->mViewData["negeri_opt"] = $negeri;
		$this->mViewData["giatmara_opt"] = $giatmara;
		$this->mViewData["kursus_opt"] = $kursus;

		$this->mViewData["id_giatmara"] = $giatmara_id;
		$this->mViewData["nama_giatmara"] = $giatmara_nama;
		$this->mViewData["email_giatmara"] = $giatmara_email;
		$this->mViewData["telefon_giatmara"] = $giatmara_telefon;
		$this->mViewData["url"] = "tetapkan_cetakan_surat_tawaran";
		$this->render("gspel_pelatih/lpp04/cetakan_surat_tawaran");
	}

	/**
	 * Function: tetapkan_cetakan_surat_tawaran
	 * Author: bambangpriambodo@gmail.com
	 * Modul: Pelatih - P4
	 * Screen: 2
	**/
	function tetapkan_cetakan_surat_tawaran()
	{

	}

	/**
	 * Function: tetapkan_cetakan_surat_tawaran
	 * Author: bambangpriambodo@gmail.com
	 * Author: zulyantara@gmail.com
	 * Modul: Pelatih - P6
	 * Screen: 1
	**/
	function status_permohonan()
	{
		// Load languages
		$this->lang->load('form', 'malaysia');

		$user = $this->ion_auth->user()->row();
		$user_id = $user->id;
		// $user_giatmara = $user->giatmara_id; => salah

		// ambil id_giatmara dari tabel v_staff
		$this->db->where("id_admin", $user_id);
		$query = $this->db->get('v_staff_admin_users');
		$row = $query->row();

		$this->db->where('id_staff',$row->id);
		$query = $this->db->get('v_staff',$where);
		$row = $query->row();
		$user_giatmara_id = $row->id_giatmara;

		// $row_giatmara = $this->lpp04->get_giatmara($user_giatmara);
		// $giatmara_id = $row_giatmara->id;
		// $giatmara_negeri = $row_giatmara->id_negeri;

		$qkeyword = $this->input->post('qkeyword');
		if ($this->input->post('btn_tetapkan')==="tetapkan")
		{
			$this->mViewData["res_status_permohonan"] = $this->lpp04->get_v_pelatihan_p6($qkeyword,$qkeyword,$qkeyword,$user_giatmara_id);
		}

		// Handling View
		$this->mPageTitle = $this->lang->line('status_permohonan_title', FALSE);

		$this->mViewData["id_giatmara"] = $giatmara_id;
		// $this->mViewData["nama_giatmara"] = $giatmara_nama;
		// $this->mViewData["email_giatmara"] = $giatmara_email;
		// $this->mViewData["telefon_giatmara"] = $giatmara_telefon;
		$this->mViewData["url"] = "status_permohonan";
		$this->render("gspel_pelatih/lpp04/status_permohonan");
	}

	/**
	 * Function: tetapkan_cetakan_surat_tawaran
	 * Author: bambangpriambodo@gmail.com
	 * Modul: Pelatih - P7
	 * Screen: 1
	**/
	function xstatus_pelatih($qkeyword)
	{
		// Load languages
		                //$this->output->enable_profiler(TRUE);

		$this->lang->load('form', 'malaysia');

		$user = $this->ion_auth->user()->row();
		$user_giatmara = $user->giatmara_id;
		$row_giatmara = $this->lpp04->get_giatmara($user_giatmara);
		$giatmara_id = $row_giatmara->id;
		$giatmara_negeri = $row_giatmara->id_negeri;

		// Handling View
		$this->mPageTitle = $this->lang->line('status_pelatih_title', FALSE);
		$sql = "		select
			a.*,b.*,c.nama_giatmara, d.nama_kursus from
		permohonan_butir_peribadi a left join
		pelatih b on a.no_mykad=b.no_mykad left JOIN
		ref_giatmara c on c.id=b.id_giatmara left join
		ref_kursus d on d.id=b.id_kursus
		where a.no_mykad='".$qkeyword."'";

		$sql="select a.*,b.*,c.nama_giatmara, d.nama_kursus,e.* from permohonan_butir_peribadi a left join pelatih b on a.no_mykad=b.no_mykad left JOIN ref_giatmara c on c.id=b.id_giatmara left join ref_kursus d on d.id=b.id_kursus left join temuduga_tetapan e on e.id_permohonan=a.id  where a.no_mykad='".$_POST['qkeyword']."'";

		$sql="
select b.id_pelatih,c.nama_penuh,b.id_permohonan,b.no_mykad,b.no_pelatih,b.jenis_pelatih,d.nama_giatmara,nama_kursus,(select tawaran_tarikh_lapordiri from temuduga_tetapan where id_permohonan=b.id_permohonan and id_kursus=b.id_kursus limit 1) as tawaran_tarikh_lapordiri,tarikh_mula_kursus,tarikh_tamat_kursus from (select min(id_pelatih) as id_pelatih, no_mykad from pelatih group by no_mykad) a join pelatih b using(id_pelatih) join permohonan_butir_peribadi c on c.no_mykad=a.no_mykad join ref_giatmara d on d.id=b.id_giatmara left join (select a.id,nama_kursus from settings_tawaran_kursus a join ref_kursus b on b.id=a.id_kursus) e on e.id=b.id_kursus  where b.id_pelatih='".$qkeyword."'
		";//echo $sql;

		//echo "<pre>";
		//echo $sql;
		//echo "</pre>";
		$d=$this->db->query($sql)->row_array();;
		$this->mViewData['pelatih1']=$d;
		//print_R($d);
		$sql = "select b.keputusan_temuduga,
		case
		when coalesce(pendaftaran_status,0) = 0 then ''
		when coalesce(pendaftaran_status,0) = 1 then 'proses semakan pendaftaran'
		when coalesce(pendaftaran_status,0) = 2 then 'tidak mendaftar'
		when coalesce(pendaftaran_status,0) = 3 then  'proses pendaftaran (PEU)'
		when coalesce(pendaftaran_status,0) = 4 then 'proses pendaftaran (Pengurus)'
		when coalesce(pendaftaran_status,0) = 5 then  'pelatih berdaftar'
		end   as pendaftaran_status ,'kurikulum' as kurikulum, case when coalesce(tawaran_elaun,0)=0 then 'Tidak Layak' else 'Layak' end as tawaran_elaun ,'sijil' as sijil from temuduga_tetapan  a join ref_keputusan_temuduga as b on b.id=a.keputusan_temuduga where id_permohonan='".$d['id_permohonan']."'";
		//echo $sql;
$sql="
select b.keputusan_temuduga,
case
when coalesce(pendaftaran_status,0) = 0 then '---'
when coalesce(pendaftaran_status,0) = 1 then 'Proses semakan pendaftaran'
when coalesce(pendaftaran_status,0) = 2 then 'Tidak mendaftar'
when coalesce(pendaftaran_status,0) = 3 then 'Proses pendaftaran (PEU)'
when coalesce(pendaftaran_status,0) = 4 then 'Proses pendaftaran (Pengurus)'
when coalesce(pendaftaran_status,0) = 5 then 'Pelatih berdaftar'
end   as pendaftaran_status ,'kurikulum' as kurikulum, case when coalesce(tawaran_elaun,0)=0 then 'Tidak Layak' else 'Layak' end as tawaran_elaun ,
concat(
case when coalesce(spgm,0)=1 then 'SPGM' else '' end,
' ',
case when coalesce(saegm,0)=1 then 'SAEGM' else '' end,
' ',
case when coalesce(skgm,0)=1 then 'SKGM' else '' end,
' ',
case when coalesce(smgm,0)=1 then 'SMGM' else '' end,
' ',
case when coalesce(sklgm,0)=1 then 'SKLGM' else '' end
) as sijil
from
pelatih x join
temuduga_tetapan  a on a.id_permohonan=x.id_permohonan  join
ref_keputusan_temuduga as b on b.id=a.keputusan_temuduga join
markah_modul_status c on c.id_pelatih=x.id_pelatih
where a.id_permohonan='".$d['id_permohonan']."'";

$sql="
select  b.keputusan_temuduga as keputusan_temuduga,
case
when coalesce(pendaftaran_status,0) = 0 then '---'
when coalesce(pendaftaran_status,0) = 1 then 'Proses semakan pendaftaran'
when coalesce(pendaftaran_status,0) = 2 then 'Tidak mendaftar'
when coalesce(pendaftaran_status,0) = 3 then 'Proses pendaftaran (PEU)'
when coalesce(pendaftaran_status,0) = 4 then 'Proses pendaftaran (Pengurus)'
when coalesce(pendaftaran_status,0) = 5 then 'Pelatih berdaftar'
end   as pendaftaran_status ,
case
when coalesce(pengurus,0) < 4 then 'Sedang dikemaskini oleh TP'
when coalesce(pengurus,0) = 4 then 'Telah disahkan oleh pengurus'
when coalesce(pgn,0)=6 then 'Telah disahkan oleh PGN'
when coalesce(pgn,0)=7 then 'Tamat Pengajian'
end
 as kurikulum, case when coalesce(kelayakan_elaun,0)=0 then 'Tidak Layak' else 'Layak' end as tawaran_elaun ,
concat(
case when coalesce(spgm,0)=1 then 'SPGM' else '' end,
' ',
case when coalesce(saegm,0)=1 then 'SAEGM' else '' end,
' ',
case when coalesce(skgm,0)=1 then 'SKGM' else '' end,
' ',
case when coalesce(smgm,0)=1 then 'SMGM' else '' end,
' ',
case when coalesce(sklgm,0)=1 then 'SKLGM' else '' end
) as sijil
from
pelatih x left join
temuduga_tetapan  a on a.id_permohonan=x.id_permohonan and a.id_kursus=x.id_kursus left join
ref_keputusan_temuduga as b on b.id=a.keputusan_temuduga join
markah_modul_status c on c.id_pelatih=x.id_pelatih
where x.jenis_pelatih='LPP04' and x.id_pelatih='".$d['id_pelatih']."'";

		$s = $this->db->query($sql)->result_array();
		$this->mViewData['s']=$s;

		$sql="select dihantar_pada,concat(first_name,coalesce(last_name,'')) as dihantar_oleh,case when status_jana='1' then 'LULUS' end  as  status_kewangan,dijana_pada as tarikh_kelulusan from lpp_5a a join admin_users b on a.dihantar_oleh=b.id where a.id_pelatih='".$d['id_pelatih']."'";
		///echo $sql;
		$lpp05=$this->db->query($sql)->result_array();
		$this->mViewData['lpp05']=$lpp05;

		$sql="
select b.id_pelatih,c.nama_penuh,b.id_permohonan,b.no_mykad,b.no_pelatih,b.jenis_pelatih,d.nama_giatmara,nama_kursus,current_date as tawaran_tarikh_lapordiri,tarikh_mula_kursus,tarikh_tamat_kursus from
(select min(id_pelatih) as id_pelatih, no_mykad from pelatih where jenis_pelatih='LPP09'  group by no_mykad) a join
pelatih b using(id_pelatih) join
permohonan_butir_peribadi c on c.no_mykad=a.no_mykad join
ref_giatmara d on d.id=b.id_giatmara left join
(select a.id,nama_kursus from settings_tawaran_kursus a join ref_kursus b on b.id=a.id_kursus) e on e.id=b.id_kursus   where b.id_pelatih='".$qkeyword."'
		";
		$l9=$this->db->query($sql)->row_array();;
		$this->mViewData['l9']=$l9;

		$sql = "select b.keputusan_temuduga,pendaftaran_status,'kurikulum' as kurikulum,tawaran_elaun,'sijil' as sijil from temuduga_tetapan  a join ref_keputusan_temuduga as b on b.id=a.keputusan_temuduga where id_permohonan='".$l9['id_permohonan']."'";
		//echo $sql;
		$sl9 = $this->db->query($sql)->result_array();//print_r($this);
		$this->mViewData['sl9']=$sl9;

		$this->mViewData["url"] = "status_pelatih";
		$this->render("gspel_pelatih/lpp04/status_pelatih");
	}
	### End Block Modul-Pelatih ###

	### BLOCK AJAX ###
	function info_permohonan() {
    	$no_mykad = $this->input->post('no_mykad');
    	$where = array(
    		"no_mykad" => $no_mykad
    	);
		$result = $this->lpp04->get_v_permohonan_peribadi($where);
		echo json_encode($result[0]);
	}

	function giatmara_ajax()
	{
		$negeri = $this->input->post('txt_negeri');
		$res_giatmara = $this->lpp04->get_all_giatmara($negeri);
		?>
		<option value="">Sila Pilih</option>
		<?php
		if ( ! empty($res_giatmara))
		{
			foreach ($res_giatmara as $val_giatmara)
			{
				?>
				<option value="<?php echo $val_giatmara->id; ?>"><?php echo $val_giatmara->nama_giatmara; ?></option>
				<?php
			}
		}
	}

	function kursus_ajax()
	{
		#echo "<pre>";print_r($this->input->post());echo "</pre>";
		$giatmara = $this->input->post('txt_giatmara');
		$res_kursus = $this->lpp04->get_all_kursus($giatmara);
		?>
		<option value="">Sila Pilih</option>
		<?php
		if ( ! empty($res_kursus))
		{
			foreach ($res_kursus as $val_kursus)
			{
				?>
				<option value="<?php echo $val_kursus->id_kursus; ?>"><?php echo $val_kursus->nama_kursus; ?></option>
				<?php
			}
		}
	}

	function kursus2_ajax()
	{
		$where["id_setting_penawaran_kursus"] = $this->input->post('txt_kursus');
		$res_sesi = $this->lpp04->get_giatmara_kursus("id_intake, nama_intake", $where, "distinct");
		echo "<option value=\"\">[SILA PILIH]</option>";
		if ($res_sesi !== NULL)
		{
			foreach ($res_sesi as $val)
			{
				?>
				<option value="<?php echo $val->id_intake; ?>"><?php echo $val->nama_intake; ?></option>
				<?php
			}
		}
	}

	function kursus_dei_ajax2()
	{
		$giatmara=$this->db->query("select * from temuduga_tetapan where id=?", array($this->input->post('txt_kursus')))->row()->id_giatmara;
		$res_sesi = $this->db->query(" select id_intake, nama_intake from settings_tawaran_kursus a join ref_intake b on b.id=id_intake where status=1 and id_giatmara=? and id_kursus=?",array($giatmara, $this->input->post('kursus')))->result();
		echo "<option value=\"\">[SILA PILIH]</option>";
		if ($res_sesi !== NULL)
		{
			foreach ($res_sesi as $val)
			{
				?>
				<option value="<?php echo $val->id_intake; ?>"><?php echo $val->nama_intake; ?></option>
				<?php
			}
		}
	}


	function intake_ajax()
	{
		$giatmara = $this->input->post('txt_giatmara');
		$kursus = $this->input->post('txt_kursus');
		$res_intake = $this->lpp04->get_all_intake($giatmara, $kursus);
		?>
		<option value="">Sila Pilih</option>
		<?php
		if ( ! empty($res_intake))
		{
			foreach ($res_intake as $val_intake)
			{
				?>
				<option value="<?php echo $val_intake->id_intake; ?>"><?php echo $val_intake->nama_intake; ?></option>
				<?php
			}
		}
	}

	function jawatan_ajax()
	{
		$staff = $this->input->post('txt_staff');
		$row_staff = $this->lpp04->get_jawatan_by_staff($staff);
		echo $row_staff->nama_jawatan;
	}
	### END BLOCK AJAX ###

	### BLOCK P4-PELATIH ###
	/**
	 * Function: programme_offering
	 * Modul: Pelatih - P4
	 * Screen: 1
	**/
	function programme_offering(){
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
		$this->mViewData["res_giatmara"] = $res_giatmara;

		$res_kursus = $this->lpp04->get_all_kursus($giatmara_id);
		$this->mViewData["res_kursus"] = $res_kursus;

		$this->mViewData["res_kewarganegaraan"] = $this->lpp04->get_all_kewarganegaraan();

		if ($this->input->post("btn_tetapkan") === "tetapkan")
		{
			$negeri = $this->input->post('opt_negeri');
			$giatmara = $this->input->post('opt_giatmara');
			$kursus = $this->input->post('opt_kursus');
			$sesi_kemasukan = $this->input->post('opt_sesi_kemasukan');

			$this->mViewData["kursus"] = $kursus;
			$this->mViewData["res_sesi"] = $this->lpp04->get_all_intake($giatmara, $kursus);

			$user = $this->ion_auth->user()->row();
			$user_giatmara = $user->giatmara_id;
			$row_giatmara = $this->lpp04->get_giatmara($user_giatmara);
			$giatmara_id = $row_giatmara->id;
			$giatmara_nama = $row_giatmara->nama_giatmara;

			$rowProgramme = $this->lpp04->get_v_pelatih_p4($negeri,$giatmara,$kursus, $sesi_kemasukan);

			$this->mViewData["row_programme"] = $rowProgramme;
			$this->mViewData['row_sesi'] = $this->db->query("select  id_intake as idintake, nama_intake from settings_tawaran_kursus a join ref_intake b on b.id=a.id_intake  where status=1 and id_giatmara=? and id_kursus=?", array($giatmara, $kursus))->result();//  $this->lpp04->getSesi($giatmara);
			// $this->mViewData["res_kursus2"] = $this->lpp04->get_all_kursus($giatmara, $sesi_kemasukan);

			// $res_kursus = $this->lpp04->get_all_kursus($giatmara_id);
			// $this->mViewData["res_kursus"] = $res_kursus;

			$this->mViewData["id_giatmara"] = $giatmara_id;
			$this->mViewData["nama_giatmara"] = $giatmara_nama;
		}

		$this->mPageTitle = 'Tetapkan Tawaran';
		$this->mViewData["url"] = "programme_offering";
    	$this->render("gspel_pelatih/lpp04/programme_offering");
	}

	/**
	 * Function: tetapkan_tarikh
	 * Modul: Pelatih - P4
	 * Screen: 1
	 * DEPRECATED
	**/
	function tetapkan_tarikh(){
		#echo "<pre>";print_r($this->input->post());echo "</pre>";
		$negeri = $this->input->post('opt_negeri');
		$giatmara = $this->input->post('opt_giatmara');
		$kursus = $this->input->post('opt_kursus');
		$sesi_kemasukan = $this->input->post('opt_sesi_kemasukan');

		$user = $this->ion_auth->user()->row();
		$user_giatmara = $user->giatmara_id;
		$row_giatmara = $this->lpp04->get_giatmara($user_giatmara);
		$giatmara_id = $row_giatmara->id;
		$giatmara_nama = $row_giatmara->nama_giatmara;

		$rowProgramme = $this->lpp04->get_v_pelatih_p4($negeri,$giatmara,$kursus, $sesi_kemasukan);

		$this->mViewData["row_programme"] = $rowProgramme;
		$this->mViewData['row_sesi'] = $this->lpp04->getSesi($giatmara);
		$this->mViewData["res_kursus"] = $this->lpp04->get_all_kursus($giatmara, $sesi_kemasukan);

		$this->mViewData["id_giatmara"] = $giatmara_id;
		$this->mViewData["nama_giatmara"] = $giatmara_nama;
		$this->mPageTitle = 'Tetapkan Tawaran';
		$this->mViewData["url"] = "luluskan";
		$this->render('gspel_pelatih/lpp04/tetapkan_tarikh');
	}

	/**
	 * Function: luluskan
	 * Modul: Pelatih - P4
	 * Screen: 1-2
	**/
	function luluskan() {
		#echo "<pre>";print_r($this->input->post());echo "</pre>";
		$post = $this->input->post();
		if(count($post) && $post['luluskan']==='luluskan'){
			$jam = $post["opt_masa"].":".$post["opt_menit"];
			if(!empty($post["tawaran"])) {
				$updateData = $this->lpp04->update_temuduga($post["idPemohon"],
				(($post["opt_sesi"]!=null)?$post["opt_sesi"]:array()),
				(($post["opt_kursus"]!=null)?$post["opt_kursus"]:array()),
				(($post["opt_kelayakan"]!=null)?$post["opt_kelayakan"]:array()),
				(($post["tawaran"]!=null)?$post["tawaran"]:array()),
				$post['txt_tgl'], $jam);
			}
		}

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
		$this->mViewData["res_giatmara"] = $res_giatmara;

		$res_kursus = $this->lpp04->get_all_kursus($giatmara_id);
		$this->mViewData["res_kursus"] = $res_kursus;

		$this->mViewData["res_kewarganegaraan"] = $this->lpp04->get_all_kewarganegaraan();

		if ($this->input->post("btn_tetapkan") === "tetapkan")
		{
			$negeri = $this->input->post('opt_negeri');
			$giatmara = $this->input->post('opt_giatmara');
			$kursus = $this->input->post('opt_kursus');
			$sesi_kemasukan = $this->input->post("opt_sesi_kemasukan");

			$this->mViewData["kursus"] = $kursus;
			$this->mViewData["sesi"] = $sesi_kemasukan;
			$this->mViewData["res_sesi"] = $this->lpp04->get_all_intake($giatmara, $kursus);

			$rowProgramme = $this->lpp04->get_v_pelatih_p4_screen2($negeri,$giatmara,$kursus,$sesi_kemasukan);
			$this->mViewData["row_programme"] = $rowProgramme;

			$user = $this->ion_auth->user()->row();
			$user_giatmara = $user->giatmara_id;
			$row_giatmara = $this->lpp04->get_giatmara($user_giatmara);
			$giatmara_id = $row_giatmara->id;
			$giatmara_nama = $row_giatmara->nama_giatmara;

			$this->mViewData['row_sesi'] = $this->lpp04->getSesi($giatmara);
			$this->mViewData["row_kursus"] = $this->lpp04->get_all_kursus($giatmara, $sesi_kemasukan);

			#$res_staff = $this->lpp04->get_staff($giatmara_id);
			$this->mViewData["id_giatmara"] = $giatmara;
			$this->mViewData["nama_giatmara"] = $giatmara_nama;
		}

		$this->mPageTitle = 'Cetakan Surat Tawaran';
		$this->render('gspel_pelatih/lpp04/interview_status');
	}

	function update_bp()
	{
		$where["id"] = $this->input->post('txt_id_permohonan');
		if ($this->input->post('txt_no_mykad') != "")
		{
			$data["no_mykad"] = $this->input->post('txt_no_mykad');
		}

		if ($this->input->post("txt_nama_penuh") != "")
		{
			$data["nama_penuh"] = $this->input->post('txt_nama_penuh');
		}

		// klo textbox semua kosong, balikin ke halaman awal
		if ($this->input->post('txt_no_mykada') == "" AND $this->input->post('txt_nama_penuh') == "")
		{
			redirect("admin/lpp04/luluskan", "refresh");
		}

		$this->lpp04->update_bp($data, $where);
		redirect("admin/lpp04/luluskan", "refresh");
	}

	/**
	 * Function: senarai_tawaran
	 * Modul: Pelatih - P4
	 * Screen: 2 - 3
	 * DEPRECATED
	**/
	function senarai_tawaran(){
		$negeri = $this->input->post('opt_negeri');
		$giatmara = $this->input->post('opt_giatmara');
		$kursus = $this->input->post('opt_kursus');
		$sesi_kemasukan = $this->input->post("opt_sesi_kemasukan");

		$rowProgramme = $this->lpp04->get_v_pelatih_p4_screen2($negeri,$giatmara,$kursus,$sesi_kemasukan);
		$this->mViewData["row_programme"] = $rowProgramme;

		$user = $this->ion_auth->user()->row();
		$user_giatmara = $user->giatmara_id;
		$row_giatmara = $this->lpp04->get_giatmara($user_giatmara);
		$giatmara_id = $row_giatmara->id;
		$giatmara_nama = $row_giatmara->nama_giatmara;

		$this->mViewData['row_sesi'] = $this->lpp04->getSesi($giatmara);
		$this->mViewData["row_kursus"] = $this->lpp04->get_all_kursus($giatmara, $sesi_kemasukan);

		#$res_staff = $this->lpp04->get_staff($giatmara_id);
		$this->mViewData["id_giatmara"] = $giatmara;
		$this->mViewData["nama_giatmara"] = $giatmara_nama;

		$this->mPageTitle = 'Cetakan Surat Tawaran';
		$this->mViewData["url"] = "cetak_surat_temuduga";
		$this->render('gspel_pelatih/lpp04/senarai_tawaran');
	}

	/**
	 * Function: simpan_kemaskini
	 * Modul: Pelatih - P4
	 * Screen: 3 (action kemaskini)
	**/
	function simpan_kemaskini() {
		#echo "<pre>";print_r($this->input->post());echo "</pre>";
		$post = $this->input->post();

		if($post && $post['luluskan']){
			$updateData = $this->lpp04->update_temuduga_kemaskini($post);
			redirect('admin/lpp04/luluskan','refresh');
		}
	}

	function cetak_surat_temuduga(){
		$post = $this->input->post();

		if($post){
			if(!empty($post["tawaran"])){
			$updateData = $this->lpp04->update_temuduga_cetak($post["idPemohon"],$post["tawaran"]);

			$this->load->library('Pdf');

			$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
			$pdf->SetTitle('Surat Temuduga');
			$pdf->SetHeaderMargin(30);
			$pdf->SetTopMargin(20);
			$pdf->setFooterMargin(20);
			$pdf->SetAutoPageBreak(true);
			$pdf->SetAuthor('GIATMARA');
			$pdf->SetDisplayMode('real', 'default');

			foreach($post["tawaran"] as $key => $value)
			{
				$html = '';
				$pdf->AddPage();

				@$html .= "";
				$pdf->Write(5, $html);
			}

			$pdf->Output('My-File-Name.pdf', 'I');

			}else{
				echo "
				<script>
					alert('Surat Tawaran tidak boleh kosong !');
					window.history.back(-1);
				</script>
				";
				exit;
			}

		// Dari Link
		} else {
			$updateData = $this->lpp04->update_temuduga_cetak($this->uri->segment(4));

			$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
			$pdf->SetTitle('Surat-Tawaran');
			$pdf->SetHeaderMargin(30);
			$pdf->SetTopMargin(20);
			$pdf->setFooterMargin(20);
			$pdf->SetAutoPageBreak(true);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			// remove default header/footer
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);
			$pdf->setFont("helvetica", "", "9", "default", "true");
			$pdf->AddPage();

			$data_1["url_img"] = FCPATH."assets/images/giatmara03.png";
			$data_1["tgl_cetak"] = date("d-m-Y");
			$where_ctk["id_temuduga_tetapan"] = $this->uri->segment(4);
			$data_1["row_cetak"] = $this->lpp04->get_cetak_tawaran_kursus($where_ctk);$data_1['data2']=$this->db->query("select * from permohonan_butir_peribadi where id=?", array($data_1['row_cetak']->id_permohonan))->row_array();//print_r($data_1);exit;

			$idgiatmara = $this->lpp04->getidgiatmara($where_ctk["id_temuduga_tetapan"]);
			// var_dump($row_cetak);
			$temuduga_tetapanx = $this->db->query("select * from temuduga_tetapan where id=?", array($where_ctk["id_temuduga_tetapan"]))->row_array();
			if(empty($temuduga_tetapanx['nomor_surat_tawaran'])){
				$nomor_surat = $this->db->query("select max(nomor_surat_tawaran)+1 as x from temuduga_tetapan;")->row()->x;
				if(empty($nomor_surat)) {
					$nomor_surat=1;
					$this->db->query(" update temuduga_tetapan set nomor_surat_tawaran= 1 where id=?; ",  array($where_ctk["id_temuduga_tetapan"]));
				} else {
					$this->db->query("update temuduga_tetapan set nomor_surat_tawaran=? where id=? ", array($nomor_surat, $where_ctk["id_temuduga_tetapan"] ));
				}
			} else {
				$nomor_surat=$temuduga_tetapanx['nomor_surat_tawaran'];
			}
			$data_1['nomor_surat']=$nomor_surat;//echo "<pre>";print_r($data_1);exit;

			$this->load->view("templates/pdf/surat_tawaran_1", $data_1);
			$html = $this->output->get_output();

			$pdf->SetMargins(20, 5, 20, true);
			$pdf->writeHTML($html, true, false, true, false, '');

			$pdf->AddPage();

			$pdf->SetTopMargin(20);
			$data_2["row_cetak"] = $this->lpp04->get_cetak_tawaran_kursus($where_ctk);
			$this->load->view("templates/pdf/surat_tawaran_2", $data_2);
			$html = $this->output->get_output();

			$pdf->SetMargins(20, 10, 10, true);
			$pdf->writeHTML($html, true, false, true, false, '');

			$pdf->AddPage();
			$pdf->SetTopMargin(20);
			$data_3["namapengurus"] = $this->lpp04->getnamapengurus($idgiatmara);
			//echo "===".$data_3["namapengurus"];
			$data_3["row_cetak"] = $this->lpp04->get_cetak_tawaran_kursus($where_ctk);
			$this->load->view("templates/pdf/surat_tawaran_3", $data_3);
			$html = $this->output->get_output();
			$pdf->SetMargins(20, 10, 20, true);
			$pdf->writeHTML($html, true, false, true, false, '');

			$pdf->AddPage();
			$pdf->SetTopMargin(20);
			$data_4["row_cetak"] = $this->lpp04->get_cetak_tawaran_kursus($where_ctk);
			$this->load->view("templates/pdf/surat_tawaran_4", $data_4);
			$html = $this->output->get_output();
			$pdf->SetMargins(20, 10, 20, true);
			$pdf->writeHTML($html, true, false, true, false, '');

			$pdf->Output('Surat-Temuduga.pdf', 'I');
		}

	}

	function print_nama($no_mykad)
	{
		$this->load->library('Pdfdom');
		$this->load->model('pelatih_model', "pm");
		$dompdf = new Pdfdom();

		$data["butir_peribadi"] = $this->pm->get_permohonan("a.no_mykad='".$no_mykad."'");
		// var_dump($data);die();

		$this->load->view("templates/pdf/cetak_permohonan", $data);
		$html = $this->output->get_output();
		$name = "cetak_permohonan.pdf";

		$dompdf->load_html($html);
		$dompdf->set_paper('A4');
		$dompdf->render();
		$dompdf->add_info('Author', 'Author Name');
		$dompdf->add_info('Title', $name);
		$dompdf->stream($name, array("Attachment" => 0));

		// clear buffer supaya pdf dapat digenerate dengan sempurna
		exit(0);
	}

	function cetak_tcpdf(){

		$this->load->library('Pdf');

			$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
			$pdf->SetTitle('My Title');
			$pdf->SetHeaderMargin(30);
			$pdf->SetTopMargin(20);
			$pdf->setFooterMargin(20);
			$pdf->SetAutoPageBreak(true);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$html = '';
			$pdf->AddPage();

			$html = '<h1>HELLO WORLD!</h1>';

			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('My-File-Name.pdf', 'I');
	}

	function cetak_dompdf(){

		$this->load->library('Pdfdom');
		$dompdf = new Pdfdom();

		$html = '<html>
				<head></head>
				<body>
					<h1>HELLO WORLD!</h1>
				</body>
				</html>
				';

		echo $html;
		$name = "nama_file.pdf";

		$dompdf->load_html(ob_get_clean());
		$dompdf->set_paper('A4');
		$dompdf->render();
		$dompdf->add_info('Author', 'Author Name');
		$dompdf->add_info('Title', $name);
		$dompdf->stream($name, array("Attachment" => 0));

		// clear buffer supaya pdf dapat digenerate dengan sempurna
		exit(0);
	}

	//---------
	function status_pelatih(){
		//error_reporting(E_ALL);
		// Load languages
		$this->lang->load('form', 'malaysia');

		$user = $this->ion_auth->user()->row();
		$user_giatmara = $user->giatmara_id;
		$row_giatmara = $this->lpp04->get_giatmara($user_giatmara);
		$giatmara_id = $row_giatmara->id;
		$giatmara_negeri = $row_giatmara->id_negeri;

		$qkeyword = $this->input->post('qkeyword');
		$sqlx="select giatmara_id from admin_users where id='".$_SESSION['user_id']."'";
		//echo $sqlx;
		$giatmara_x=$this->db->query($sqlx)->row()->giatmara_id;
		//echo "<h1>$giatmara_x</h1>";
		$sql="
select
a.id_pelatih ,
  nama_negeri               ,
  nama_giatmara             ,
  nama_kursus               ,
f.kewarganegaraan           ,
'' as nama_intake               ,
jenis_pelatih as jenis_pengambilan         ,
  nama_penuh                ,
  a.no_mykad                  ,
  no_pelatih                ,
'' as  tarikh_waktu              ,
'' as tarikh_temuduga           ,
(select tawaran_tarikh_lapordiri from temuduga_tetapan where id_permohonan=a.id_permohonan and id_kursus=a.id_kursus limit 1) as daftar                    ,
tarikh_mula_kursus as mula                      ,
tarikh_tamat_kursus as tamat                     ,
(select status_desc from ref_status_pelatih where id=status_pelatih) as status_temuduga           ,
case kelayakan_elaun when '1' then 'Layak' else 'Tidak Layak' end as kelayakanelaun        ,
  id_negeri                 ,
 id_giatmara               ,
 id_kursus                 ,
''  id_kewarganegaraan        ,
'' as id_intake                 ,
'' as id_permohonan_kursus
from
pelatih a join
permohonan_butir_peribadi b on b.id=a.id_permohonan join
ref_giatmara c on c.id=a.id_giatmara join
ref_negeri d on d.id=c.id_negeri join
(select a.id,nama_kursus from settings_tawaran_kursus a join ref_kursus b on b.id=a.id_kursus) e on e.id=a.id_kursus join
ref_kewarganegaraan f on f.id=b.kewarganegaraan
where
id_giatmara in (select c.id_giatmara from admin_users a join staff b on b.id=id_staff join staff_info_pangku_tugas c on c.id_staff=b.id where a.id={$_SESSION['user_id']}) and
(nama_penuh like '%$qkeyword%' or a.no_mykad like '%$qkeyword%' or no_pelatih like '%$qkeyword%')
";

		//echo $sql;
		if ($this->input->post('btn_tetapkan')==="tetapkan")
		{
			//$this->mViewData["res_status_permohonan"] = $this->lpp04->get_v_pelatihan_p6($qkeyword,$qkeyword,$qkeyword);
			//echo q1;
			$this->mViewData["res_status_permohonan"] = $this->db->query($sql)->result();

		}

		// Handling View
		$this->mPageTitle = " Status Pelatih Berdaftar";$this->lang->line('status_permohonan_title', FALSE);

		$this->mViewData["id_giatmara"] = $giatmara_id;
		// $this->mViewData["nama_giatmara"] = $giatmara_nama;
		// $this->mViewData["email_giatmara"] = $giatmara_email;
		// $this->mViewData["telefon_giatmara"] = $giatmara_telefon;
		$this->mViewData["url"] = "status_pelatih";
		$this->render("gspel_pelatih/lpp04/status_pelatih1");

	}
}
