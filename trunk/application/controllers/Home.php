<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Home extends MY_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->database();
			$this->load->library('grocery_CRUD');
			$this->load->model('screen_dua_model', "sdm");
			$this->load->model('screen_empat_model', "mmodel");
			$this->load->model('screen_lima_model', "slm");
			$this->load->model('home_model', "hm");
			$this->load->library('session');
	}

	public function index()
	{
		#redirect('registration');
		redirect('utama');
	}

	public function index_ori()
	{
		$noMykad = $this->uri->segment('5');

		$where["no_mykad"] = $noMykad;
		$row_pbp = $this->sdm->get_row_pbp($where);

		@$cek_poskod = $this->sdm->cek_poskod($row_pbp->poskod);
		$data["cek_poskod"] = $cek_poskod->poskod;
		$data["bandar_poskod"] = $cek_poskod->bandar;
  	$data["row_pbp"] = $row_pbp;

		@$data["idBp"] = $row_pbp->id;
		$data["res_kewarganegaraan"] = $this->sdm->get_data("ref_kewarganegaraan");
		$data["res_bangsa"] = $this->sdm->get_data("ref_bangsa");
		$data["res_etnik"] = $this->sdm->get_data("ref_etnik");
		$data["res_agama"] = $this->sdm->get_data("ref_agama");
		$data["res_taraf_perkahwinan"] = $this->sdm->get_data("ref_taraf_perkahwinan");
		$data["res_kelulusan"] = $this->sdm->get_data("ref_kelulusan");
		$data["res_kategori_pemohon"] = $this->sdm->get_data("ref_kategori_pemohon");
		$data["res_negeri"] = $this->sdm->get_data("ref_negeri");

		$data["ref_kluster"] = $this->mmodel->get_data("ref_kluster");
		$data["ref_kursus"] = $this->mmodel->get_data("ref_kursus");
		$data["ref_negeri"] = $this->mmodel->get_data("ref_negeri");
		$data["ref_giatmara"] = $this->mmodel->get_data("ref_giatmara");

		$data["ref_kategori_penjaga"] = $this->slm->get_data("ref_kategori_penjaga");
		$data["res_pendapatan"] = $this->slm->get_data("ref_pendapatan");
		$data["ref_hubungan"] = $this->slm->get_data("ref_hubungan");

		$data["nyoba"] = $this->hm->senarai()->result();

		$this->render_data('home', 'full_width',$data);
	}

	public function ajax($id) {
		$query = $this->hm->savestatusg($id)->result();
		if ($query) {
			echo json_encode($query);
		}else {
			echo json_last_error_msg();
		}
	}

	public function ajaxkn($id) {
		$query = $this->hm->savestatus($id)->result();
		if ($query) {
			echo json_encode($query);
		}else {
			echo json_last_error_msg();
		}
	}

	public function ajaxkg($id) {
		$query = $this->hm->savestatuse($id)->result();
		if ($query) {
			echo json_encode($query);
		}else {
			echo json_last_error_msg();
		}
	}

	public function ajaxng($id) {
		$query = $this->db->where("id_negeri",$id)->order_by("nama_giatmara", "asc")->get('ref_giatmara')->result();
		if ($query) {
			echo json_encode($query);
		}else {
			echo json_last_error_msg();
		}
	}

	public function ajaxnk($id) {
		$query = $this->hm->savestatusb($id)->result();
		if ($query) {
			echo json_encode($query);
		}else {
			echo json_last_error_msg();
		}
	}

	public function ajaxnkr($id) {
		$query = $this->hm->savestatusc($id)->result();
		if ($query) {
			echo json_encode($query);
		}else {
			echo json_last_error_msg();
		}
	}

	function savekursusa()
  {
		$id = $this->input->post('city2');
		$id2 = $this->input->post('city4');
		$a = $this->db->where('kursus1')->get('permohonan_kursus')->result();
		$b = $this->db->where('giatmara1')->get('permohonan_kursus')->result();

		$data=array('kursus1'=>$id,'giatmara1'=>$id2);
		$result = $this->hm->insert($data);
		redirect($_SERVER['HTTP_REFERER']);
  }

	public function ajaxklus($id) {
		$query = $this->db->get('ref_kluster')->result();
		if ($query) {
			echo json_encode($query);
		}else {
			echo json_last_error_msg();
		}
	}

	public function ajaxneg($id) {
		$query = $this->db->get('ref_negeri')->result();
		if ($query) {
			echo json_encode($query);
		}else {
			echo json_last_error_msg();
		}
	}

	// Apakah masih digunakan???
	function nyoba()
	{
		$data = array(
		'kursus1' => $_POST['kursus1'],
		'kursus2' => $_POST['kursus2'],
		'kursus3' => $_POST['kursus3'],
		);
		$this->db->insert('permohonan_kursus', $data);
	}

	public function simpan2() {
		// var_dump($this->input->post());exit;
		$nama_penuh = $this->input->post('bp_nama_penuh');
		$no_mykad = $this->input->post('bp_no_mykad');
		$tarikh_lahir = $this->input->post('bp_tarikh_lahir');
		$kewarganegaraan = $this->input->post('bp_kewarganegaraan');
		$umur = $this->input->post('bp_umur');
		$no_telefon = $this->input->post('bp_no_telefon');
		$no_hp = $this->input->post('bp_no_hp');
		$alamat = $this->input->post('bp_alamat');
		$poskod = $this->input->post('bp_poskod_id');
		$bandar = $this->input->post('bp_bandar');
		$negeri = $this->input->post('bp_negeri');
		$email = $this->input->post('bp_email');
		$bangsa = $this->input->post('bp_bangsa');
		$etnik = $this->input->post('bp_etnik');
		$agama = $this->input->post('bp_agama');
		$taraf_perkahwinan = $this->input->post('bp_taraf_perkahwinan');
		$kategori_kelulusan = $this->input->post('bp_kategori_kelulusan');
		$kelulusan = $this->input->post('bp_kelulusan');
		if($kategori_kelulusan == "Kemahiran") $kelulusan = 1;
		$matlamat_selepas_kursus = $this->input->post('bp_matlamat_selepas_kursus');
		$kategori_pemohon = $this->input->post('bp_kategori_pemohon');
		// echo $negeri;exit;

		// create auto no rujukan permohonan
		// hitung jumlah data di table permohonan_butir_peribadi
		$jml_data_pbp = $this->sdm->count_data();
		// jika lebih dari 0 maka sudah ada isi, maka ambil no_rujukan_permohonan yang terakhir
		if ($jml_data_pbp > 0 )
		{
			$row_pbp_no = $this->sdm->get_last_no_rujuk();
			$last_no_rujuk = substr($row_pbp_no->no_rujukan_permohonan,6,4);
			$new_no_rujuk = $last_no_rujuk + 1;
			if (strlen($new_no_rujuk)==4)
			{
				$nrp = $new_no_rujuk;
			}
			elseif (strlen($new_no_rujuk)==3)
			{
				$nrp = "0".$new_no_rujuk;
			}
			elseif (strlen($new_no_rujuk)==2)
			{
				$nrp = "00".$new_no_rujuk;
			}
			elseif (strlen($new_no_rujuk)==1)
			{
				$nrp = "000".$new_no_rujuk;
			}
			$no_rujukan_permohonan = date("Ym").$nrp;
		}
		else
		{
			$no_rujukan_permohonan = date("Ym")."0001";
		}

		if(empty($kelulusan)) $kelulusan = 1;
		$data_p["nama_penuh"] = $nama_penuh;
		$data_p["no_mykad"] = $no_mykad;
		$data_p["tarikh_lahir"] = $tarikh_lahir;
		$data_p["kewarganegaraan"] = $kewarganegaraan;
		$data_p["umur"] = $umur;
		$data_p["no_telefon"] = $no_telefon;
		$data_p["no_hp"] = $no_hp;
		$data_p["alamat"] = $alamat;
		$data_p["poskod"] = $poskod;
		$data_p["emel"] = $email;
		$data_p["bangsa"] = $bangsa;
		$data_p["etnik"] = $etnik;
		$data_p["agama"] = $agama;
		$data_p["taraf_perkahwinan"] = $taraf_perkahwinan;
		$data_p["kategori_kelulusan"] = $kategori_kelulusan;
		$data_p["kelulusan"] = $kelulusan;
		$data_p["matlamat"] = $matlamat_selepas_kursus;
		$data_p["kategori_pemohon"] = 2;
		$data_p["pengesahan"] = 1;
		$data_p["pengakuan"] = 2;
		$data_p["no_rujukan_permohonan"] =$no_rujukan_permohonan;
		$data_p["tarikh_hantar"] = date("Y-m-d");

		$this->hm->save_butir_probadi($data_p);
		// $s = $this->hm->save_butir_probadi($data_p);
		// echo $s;exit;

		// send email
		$this->load->library("email");

		$config_email["protocol"] = "smtp";
		$config_email["smtp_host"] = "ssl://smtp.gmail.com";
		$config_email["smtp_port"] = "465";
		$config_email["smtp_user"] = "gspeltest@gmail.com";
		$config_email['smtp_pass']    = "Gsp3lPass!";
		$config_email['charset']    = 'utf-8';
		$config_email['mailtype'] = 'html';
		$config_email["priority"] = 1;
		$config_email["newline"] = "\r\n";
		$this->email->initialize($config_email);

		$this->email->from('gspel@mmsi.co.id', 'Administrator GSPel');
		$this->email->to($email);
		$this->email->subject("Permohonan Pendaftaran Giatmara");
		$this->email->message($this->load->view("screen_dua/notif_email", $data_p, TRUE));
		$this->email->send();
		$this->email->print_debugger();
	}

	function cek()
	{
		$mykad = $this->input->post('no_mykad');
		$row_mykad = $this->hm->cek_nomykad($mykad);

		if($row_mykad["status"] == "AKTIF")
		{
			$data["status"] = "no_mykad Exist, redirect to P6 - Fill out application form LPP09 ?? <a href='".$this->mBaseUrl."home/index/no_mykad/".$mykad."'>next</a>"; /*Nino*/
		}
		else
		{
			// cek ke table permohonan_butir_peribadi
			$row_pbp = $this->hm->cek_nomykad_pbp($mykad);
			if  ( ! empty($row_pbp))
			{
				// Simpan id permohonan ke session
				$data_sess["id_permohonan"] = $row_pbp["id"];
				$this->session->set_userdata($data_sess);

				if ($row_pbp["tarikh_hantar"] != "")
				{
					$data["status"] = "Permohonan telah dihantar";
				}

				$data["pbp_nama_penuh"] = $row_pbp["nama_penuh"];
				$data["pbp_no_mykad"] = $row_pbp["no_mykad"];
				$data["pbp_no_rujukan_permohonan"] = $row_pbp["no_rujukan_permohonan"];
			}
			else
			{
				$data["status"] = "Next Proses";
			}
		}
		echo json_encode($data);
		exit();
	}

	public function simpan() {
		$btn = $this->input->post('finish');
		$idBp = $this->input->post('idBp'); //jika ada, dipastikan sudah menjadi member

		//Semak Maklumat Pelatih
		$gender = $this->input->post('gender');
		$info_no_mykad = $this->input->post('info_no_mykad');

		$data_semak[] = $gender;
		$data_semak[] = $info_no_mykad;

		//Butir Peribadi
		$nama_penuh = $this->input->post('bp_nama_penuh');
		$no_mykad = $this->input->post('bp_no_mykad');
		$tarikh_lahir = $this->input->post('bp_tarikh_lahir');
		$kewarganegaraan = $this->input->post('bp_kewarganegaraan');
		$umur = $this->input->post('bp_umur');
		$no_telefon = $this->input->post('bp_no_telefon');
		$no_hp = $this->input->post('bp_no_hp');
		$alamat = $this->input->post('bp_alamat');
		$poskod = $this->input->post('bp_poskod_id');
		$bandar = $this->input->post('bp_bandar');
		$negeri = $this->input->post('bp_negeri');
		$email = $this->input->post('bp_email');
		$bangsa = $this->input->post('bp_bangsa');
		$etnik = $this->input->post('bp_etnik');
		$agama = $this->input->post('bp_agama');
		$taraf_perkahwinan = $this->input->post('bp_taraf_perkahwinan');
		$kategori_kelulusan = $this->input->post('bp_kategori_kelulusan');
		$kelulusan = $this->input->post('bp_kelulusan');
		if($kategori_kelulusan == "Kemahiran") $kelulusan = 1;
		$matlamat_selepas_kursus = $this->input->post('bp_matlamat_selepas_kursus');
		$kategori_pemohon = $this->input->post('bp_kategori_pemohon');

		// create auto no rujukan permohonan
		// hitung jumlah data di table permohonan_butir_peribadi
		$jml_data_pbp = $this->sdm->count_data();
		// jika lebih dari 0 maka sudah ada isi, maka ambil no_rujukan_permohonan yang terakhir
		if ($jml_data_pbp > 0 )
		{
			$row_pbp_no = $this->sdm->get_last_no_rujuk();
			$last_no_rujuk = substr($row_pbp_no->no_rujukan_permohonan,6,4);
			$new_no_rujuk = $last_no_rujuk + 1;
			if (strlen($new_no_rujuk)==4)
			{
				$nrp = $new_no_rujuk;
			}
			elseif (strlen($new_no_rujuk)==3)
			{
				$nrp = "0".$new_no_rujuk;
			}
			elseif (strlen($new_no_rujuk)==2)
			{
				$nrp = "00".$new_no_rujuk;
			}
			elseif (strlen($new_no_rujuk)==1)
			{
				$nrp = "000".$new_no_rujuk;
			}
			$no_rujukan_permohonan = date("Ym").$nrp;
		}
		else
		{
			$no_rujukan_permohonan = date("Ym")."0001";
		}

		if(empty($kelulusan)) $kelulusan = 1;

		$lastId = $this->hm->getLastInserted();
		$ID = $lastId + 1;

		$data_p["id"] = $ID;
		$data_p["nama_penuh"] = $nama_penuh;
		$data_p["no_mykad"] = $no_mykad;
		$data_p["tarikh_lahir"] = $tarikh_lahir;
		$data_p["kewarganegaraan"] = $kewarganegaraan;
		$data_p["umur"] = $umur;
		$data_p["no_telefon"] = $no_telefon;
		$data_p["no_hp"] = $no_hp;
		$data_p["alamat"] = $alamat;
		$data_p["poskod"] = $poskod;
		$data_p["emel"] = $email;
		$data_p["bangsa"] = $bangsa;
		$data_p["etnik"] = $etnik;
		$data_p["agama"] = $agama;
		$data_p["taraf_perkahwinan"] = $taraf_perkahwinan;
		$data_p["kategori_kelulusan"] = $kategori_kelulusan;
		$data_p["kelulusan"] = $kelulusan;
		$data_p["matlamat"] = $matlamat_selepas_kursus;
		$data_p["kategori_pemohon"] = 2;
		$data_p["pengesahan"] = 1;
		$data_p["pengakuan"] = 2;
		$data_p["no_rujukan_permohonan"] =$no_rujukan_permohonan;
		$data_p["tarikh_hantar"] = date("Y-m-d");

		//Maklumat Am
		$sumber = $this->input->post('sumber');
		$text_lain= $this->input->post('text_lain');

		foreach($sumber as $key => $value){
						$data_ma[$key] = $value;
		}

		$session = $this->session->userdata();

		if(empty($ID)) $ID = 1; // inputan pertama kali

		if(!empty($idBp)) $ID = $idBp; // jika sudah menjadi member

		$data_ma["id_permohonan"] = $ID;
		if(empty($text_lain)) $text_lain = "";
		$data_ma["text_lain"] = $text_lain;

		//Kursus Pilihan
		$mengikut = $this->input->post('mengikut');
		$kluster = $this->input->post('kluster');
		$kursus1 = $this->input->post('kursus1');
		$kursus2 = $this->input->post('kursus2');
		$kursus3 = $this->input->post('kursus3');
		$negeri = $this->input->post('negeri');
		$giatmara = $this->input->post('giatmara');

		$data_k["id_permohonan"] = $ID;
		$data_k["kursus1"] = $kursus1;
		$data_k["kursus2"] = $kursus2;
		$data_k["kursus3"] = $kursus3;

		//dummy data kursus
		/*
		$data_k["kursus1"] = 1;
		$data_k["kursus2"] = 2;
		$data_k["kursus3"] = 3;
		*/

		//Maklumat Penjaga
		$maklumat = $this->input->post('maklumat');
		$a_nama_penuh = $this->input->post('a_nama_penuh');
		$a_hubungan = $this->input->post('a_hubungan');
		$a_jenis_pengenalan = $this->input->post('a_jenis_pengenalan');
		$a_mykad = $this->input->post('a_mykad');
		$a_kewarganegaraan = $this->input->post('a_kewarganegaraan');
		$a_kategori_penjaga = $this->input->post('a_kategori_penjaga');
		$a_no_tel = $this->input->post('a_no_tel');
		$a_no_hp = $this->input->post('a_no_hp');
		$a_agama = $this->input->post('a_agama');
		$a_etnik = $this->input->post('a_etnik');
		$a_bangsa = $this->input->post('a_bangsa');
		$a_alamat = $this->input->post('a_alamat');
		$a_poskod = $this->input->post('a_poskod');
		$a_pekerjaan = $this->input->post('a_pekerjaan');
		$a_pendapatan = $this->input->post('a_pendapatan');
		$a_majikan = $this->input->post('a_majikan');
		$a_no_tel_pejabat = $this->input->post('a_no_tel_pejabat');
		$a_samb = $this->input->post('a_samb');
		$a_alamat_pejabat = $this->input->post('a_alamat_pejabat');
		$b_nama_penuh = $this->input->post('b_nama_penuh');
		$b_jenis_pengenalan = $this->input->post('b_jenis_pengenalan');
		$b_mykad = $this->input->post('b_mykad');
		$b_kewarganegaraan = $this->input->post('b_kewarganegaraan');
		$b_kategori_penjaga = $this->input->post('b_kategori_penjaga');
		$b_no_tel = $this->input->post('b_no_tel');
		$b_no_hp = $this->input->post('b_no_hp');
		$b_agama = $this->input->post('b_agama');
		$b_etnik = $this->input->post('b_etnik');
		$b_bangsa = $this->input->post('b_bangsa');
		$b_alamat = $this->input->post('b_alamat');
		$b_poskod = $this->input->post('b_poskod');
		$b_pekerjaan = $this->input->post('b_pekerjaan');
		$b_pendapatan = $this->input->post('b_pendapatan');
		$b_majikan = $this->input->post('b_majikan');
		$b_no_tel_pejabat = $this->input->post('b_no_tel_pejabat');
		$b_samb = $this->input->post('b_samb');
		$b_alamat_pejabat = $this->input->post('b_alamat_pejabat');
		$c_nama_penuh = $this->input->post('c_nama_penuh');
		$c_jenis_pengenalan = $this->input->post('c_jenis_pengenalan');
		$c_mykad = $this->input->post('c_mykad');
		$c_kewarganegaraan = $this->input->post('c_kewarganegaraan');
		$c_kategori_penjaga = $this->input->post('c_kategori_penjaga');
		$c_no_tel = $this->input->post('c_no_tel');
		$c_no_hp = $this->input->post('c_no_hp');
		$c_agama = $this->input->post('c_agama');
		$c_etnik = $this->input->post('c_etnik');
		$c_bangsa = $this->input->post('c_bangsa');
		$c_alamat = $this->input->post('c_alamat');
		$c_poskod = $this->input->post('c_poskod');
		$c_pekerjaan = $this->input->post('c_pekerjaan');
		$c_pendapatan = $this->input->post('c_pendapatan');
		$c_majikan = $this->input->post('c_majikan');
		$c_no_tel_pejabat = $this->input->post('c_no_tel_pejabat');
		$c_samb = $this->input->post('c_samb');
		$c_alamat_pejabat = $this->input->post('c_alamat_pejabat');

		$data_mp["id_permohonan"] = $ID;
		$data_mp["maklumat"] = $maklumat;
		$data_mp["a_nama_penuh"] = $a_nama_penuh;
		$data_mp["a_hubungan"] = $a_hubungan;
		$data_mp["a_jenis_pengenalan"] = $a_jenis_pengenalan;
		$data_mp["a_mykad"] = $a_mykad;
		$data_mp["a_kewarganegaraan"] = $a_kewarganegaraan;
		$data_mp["a_kategori_penjaga"] = $a_kategori_penjaga;
		$data_mp["a_no_tel"] = $a_no_tel;
		$data_mp["a_no_hp"] = $a_no_hp;
		$data_mp["a_agama"] = $a_agama;
		$data_mp["a_etnik"] = $a_etnik;
		$data_mp["a_bangsa"] = $a_bangsa;
		$data_mp["a_alamat"] = $a_alamat;
		$data_mp["a_poskod"] = $a_poskod;
		$data_mp["a_pekerjaan"] = $a_pekerjaan;
		$data_mp["a_pendapatan"] = $a_pendapatan;
		$data_mp["a_majikan"] = $a_majikan;
		$data_mp["a_no_tel_pejabat"] = $a_no_tel_pejabat;
		$data_mp["a_samb"] = $a_samb;
		$data_mp["a_alamat_pejabat"] = $a_alamat_pejabat;
		$data_mp["b_nama_penuh"] = $b_nama_penuh;
		$data_mp["b_jenis_pengenalan"] = $b_jenis_pengenalan;
		$data_mp["b_mykad"] = $b_mykad;
		$data_mp["b_kewarganegaraan"] = $b_kewarganegaraan;
		$data_mp["b_kategori_penjaga"] = $b_kategori_penjaga;
		$data_mp["b_no_tel"] = $b_no_tel;
		$data_mp["b_no_hp"] = $b_no_hp;
		$data_mp["b_agama"] = $b_agama;
		$data_mp["b_etnik"] = $b_etnik;
		$data_mp["b_bangsa"] = $b_bangsa;
		$data_mp["b_alamat"] = $b_alamat;
		$data_mp["b_poskod"] = $b_poskod;
		$data_mp["b_pekerjaan"] = $b_pekerjaan;
		$data_mp["b_pendapatan"] = $b_pendapatan;
		$data_mp["b_majikan"] = $b_majikan;
		$data_mp["b_no_tel_pejabat"] = $b_no_tel_pejabat;
		$data_mp["b_samb"] = $b_samb;
		$data_mp["b_alamat_pejabat"] = $b_alamat_pejabat;
		$data_mp["c_nama_penuh"] = $c_nama_penuh;
		$data_mp["c_jenis_pengenalan"] = $c_jenis_pengenalan;
		$data_mp["c_mykad"] = $c_mykad;
		$data_mp["c_kewarganegaraan"] = $c_kewarganegaraan;
		$data_mp["c_kategori_penjaga"] = $c_kategori_penjaga;
		$data_mp["c_no_tel"] = $c_no_tel;
		$data_mp["c_no_hp"] = $c_no_hp;
		$data_mp["c_agama"] = $c_agama;
		$data_mp["c_etnik"] = $c_etnik;
		$data_mp["c_bangsa"] = $c_bangsa;
		$data_mp["c_alamat"] = $c_alamat;
		$data_mp["c_poskod"] = $c_poskod;
		$data_mp["c_pekerjaan"] = $c_pekerjaan;
		$data_mp["c_pendapatan"] = $c_pendapatan;
		$data_mp["c_majikan"] = $c_majikan;
		$data_mp["c_no_tel_pejabat"] = $c_no_tel_pejabat;
		$data_mp["c_samb"] = $c_samb;
		$data_mp["c_alamat_pejabat"] = $c_alamat_pejabat;

		//Tempat Tinggal
		$keperluan_tempat = $this->input->post('keperluan_tempat');
		$keperluan_pengangkut = $this->input->post('keperluan_pengangkut');
		$data_tt["id_permohonan"] = $ID;
		$data_tt["tempat_tinggal"] = $keperluan_tempat;
		$data_tt["pengangkutan"] = $keperluan_pengangkut;

		//Pengakuan
		$pengakuan_1 = $this->input->post('pengakuan_1');
		$pengakuan_2 = $this->input->post('pengakuan_2');
		$data["pengakuan"] = $pengakuan_1;
		//$data["akta_kerahsian"] = $pengakuan_2;

		if ($btn === "Hantar Permohon")
		{
			if(!empty($idBp)){
				// tidak input ke butir_pribadi jika sudah jadi member
			}else{
				$simpan_p = $this->hm->save_butir_probadi($data_p);
			}

			$simpan_ma = $this->hm->save_maklumat_am($data_ma);
			$simpan_k = $this->hm->save_permohonan_kursus($data_k);
			$simpan_mp = $this->hm->save_permohonan_penjaga($data_mp);
			$simpan_tt = $this->hm->save_tempat_tinggal($data_tt);

			if($simpan_p == "Tersimpan" || ($simpan_ma == "Tersimpan"
				&& $simpan_k == "Tersimpan" && $simpan_mp == "Tersimpan"
				&& $simpan_tt == "Tersimpan")){
					@redirect('home/cetak_permohonan/'.$ID);
			}else{
					die("Masih terdapat data yang kosong/tidak benar, harap dilengkapi datanya !!");
			}
		}
	}

	public function cetak_permohonan($id)
	{
		$row_permohonan = $this->hm->get_row_permohonan($id);
		if ( ! empty($row_permohonan))
		{
			$id_permohonan = $row_permohonan->id;
			$nrp = $row_permohonan->no_rujukan_permohonan;
		}

		$data["id_permohonan"] = isset($id_permohonan) ? $id_permohonan : 1;
		$data["no_rujukan_permohonan"] = isset($nrp) ? $nrp : 1;
		$this->render_data('home/cetak_permohonan', 'full_width',$data);
	}
}
