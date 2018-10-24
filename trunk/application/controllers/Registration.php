<?php
/*
 * Controller: Registration
 * Module: Pelatih
 * Author: bambangpriambodo@gmail.com
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends MY_Controller
{
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

	/*
	 * Method: Index / Welcome
	 * Module: Pelatih
	*/
	public function index()
	{
		@$this->render('welcome_message', 'full_width',$data);
	}

	/*
	 * Method: Semak Maklumat
	 * Module: Pelatih
	*/
	public function semakmaklumat()
	{
		$this->render('registration/semak-maklumat', 'full_width');
	}

	public function closesemakstatus()
	{
		redirect('utama/aplikasi', true);
	}

	public function semakstatus()
	{
		$data['message']="";

		if($this->input->post('idpengenalan')!=''){
		$where["no_mykad"] = $this->input->post('idpengenalan');
		$where["pengesahan"] = '1';
		$where["pengakuan"] =  '2';
		$registered = $this->sdm->get_application_status($where);
		if ($registered>0) {
			$data['message'] = "Permohonan anda telah diterima dan sedang diproses. <br>Anda akan dihubungi oleh Pegawai GIATMARA sekiranya terpilih untuk sesi temuduga.";
		} else{
			$data['message'] = "Permohonan anda tiada dalam rekod. <br>Sila lengkapkan dan hantar borang permohonan sekiranya anda berminat untuk mengikuti program yang ditawarkan.";
		}
		}

		//$this->render('registration/semak-status', 'full_width');
		$this->render_data('registration/semak-status', 'full_width', $data);
	}
	/*
	 * Method: Butir Peribadi
	 * Module: Pelatih
	*/
	public function butirperibadi()
	{
		$noMykad = $this->uri->segment('4');
		if ($noMykad === 'mykad') $noMykad = $this->uri->segment('5');

		$where["no_mykad"] = $noMykad;
		$row_pbp = $this->sdm->get_row_pbp($where);
		$row_pbp2 = $this->db->query("select * from permohonan_butir_peribadi where no_mykad=?", array($noMykad) )->row_array();
		#echo "query=".$this->db->last_query();
		#echo "<pre>";print_r($row_pbp);echo "</pre>";

		@$cek_poskod = $this->sdm->cek_poskod($row_pbp->poskod);
		#echo "<pre>";print_r($cek_poskod);echo "</pre>";
		$data["no_mykad"] = $noMykad;
		$data["cek_poskod"] = $cek_poskod->poskod;
		$data["bandar_poskod"] = $cek_poskod->bandar;
		$data["id_negeri_poskod"] = $cek_poskod->negeri;
		$data["nama_negeri_poskod"] = $cek_poskod->nama_negeri;
		$data["row_pbp"] = $row_pbp;
		$data["row_pbp2"] = $row_pbp2;

		@$data["idBp"] = $row_pbp->id;
		$data["res_kewarganegaraan"] = $this->sdm->get_data("ref_kewarganegaraan");
		$data["res_bangsa"] = $this->sdm->get_data("ref_bangsa");
		$data["res_etnik"] = $this->sdm->get_data("ref_etnik");
		$data["res_agama"] = $this->sdm->get_data("ref_agama");
		$data["res_taraf_perkahwinan"] = $this->sdm->get_data("ref_taraf_perkahwinan");
		$data["res_kelulusan"] = $this->sdm->get_data("ref_kelulusan");
		$data["res_kemahiran"] = $this->sdm->get_data("ref_kemahiran");
		$data["res_kategori_pemohon"] = $this->sdm->get_data("ref_kategori_pemohon");
		$data["res_negeri"] = $this->sdm->get_data("ref_negeri");
		$data["res_negara"] = $this->sdm->get_data("ref_negara");

		$data["ref_kategori_penjaga"] = $this->slm->get_data("ref_kategori_penjaga");
		$data["res_pendapatan"] = $this->slm->get_data("ref_pendapatan");
		$data["ref_hubungan"] = $this->slm->get_data("ref_hubungan");
		$data["ref_year"] = $this->hm->getTarikhByYear(date('Y'));
		$data["nyoba"] = $this->hm->senarai()->result();

		$this->render_data('registration/butir-peribadi', 'full_width', $data);
	}

	/*
	 * Method: Maklumat Am
	 * Module: Pelatih
	*/
	public function maklumat() {
		$noMykad = $this->uri->segment('4');
		if ($noMykad === 'mykad') $noMykad = $this->uri->segment('5');
		$where["no_mykad"] = $noMykad;
		$row_pbp = $this->sdm->get_row_pbp($where);

		if (!count($row_pbp)) {
			redirect('registration', true);
		}

		$row_mam = $this->hm->getMaklumatByBp($row_pbp->id);
		$row_mam_2 = $this->hm->getMaklumat2ByBp($row_pbp->id);
		#echo "<pre>";print_r($row_mam);echo "</pre>";
		@$data['idBp'] = $row_pbp->id;
		@$data['id'] = $row_mam->id;
		@$data["id2"] = $row_mam_2->id;
		@$data['mam'] = $row_mam;
		@$data["mam_2"] = $row_mam_2;
		// echo "<pre>";print_r($row_pbp);echo "</pre>";exit;

		$this->render_data('registration/maklumat-am', 'full_width', $data);
	}

	/*
	 * Method: Kursus Pilihan
	 * Module: Pelatih
	*/
	public function kursus() {
		$noMykad = $this->uri->segment('4');
		if ($noMykad === 'mykad') $noMykad = $this->uri->segment('5');
		$where["no_mykad"] = $noMykad;
		$row_pbp = $this->sdm->get_row_pbp($where);
		if (!count($row_pbp)) {
			//redirect('registration', true);
		}

		$row_mam = $this->hm->getKursusByBp($row_pbp->id);
		$row_kursus = $this->hm->getViewKursusByBp($row_pbp->id);
		#echo "<pre>";print_r($row_kursus);echo "</pre>";
		@$data['idBp'] = $row_pbp->id;
		@$data['id'] = $row_mam->id;
		@$data['kursus'] = $row_kursus;
		#echo "<pre>";print_r($row_pbp);echo "</pre>";

		$data["ref_kluster"] = $this->mmodel->get_data("ref_kluster");
		$data["ref_kursus"] = $this->mmodel->get_data("ref_kursus");
		$data["ref_negeri"] = $this->mmodel->get_data("ref_negeri");
		$data["ref_giatmara"] = $this->mmodel->get_data("ref_giatmara");
		$data["nyoba"] = $this->hm->senarai()->result();
		#echo "<pre>";print_r($row_mam);echo "</pre>";

		$this->render_data('registration/kursus-pilihan', 'full_width', $data);
	}

	/*
	 * Method: Penjaga
	 * Module: Pelatih
	*/
	public function penjaga() {
		$noMykad = $this->uri->segment('4');
		if ($noMykad === 'mykad') $noMykad = $this->uri->segment('5');
		$where["no_mykad"] = $noMykad;
		$row_pbp = $this->sdm->get_row_pbp($where);
		if (!count($row_pbp)) {
			redirect('registration', true);
		}
		$row_mam = $this->hm->getPenjagaByBp($row_pbp->id);
		//echo "<pre>";print_r($row_mam);echo $row_pbp->id;echo "</pre>";exit;
		$row_mamme = $this->db->query("select * from permohonan_penjaga where id_permohonan=?", array($row_pbp->id))->row_array();

		@$data['idBp'] = $row_pbp->id;
		@$data['id'] = $row_mam->id_penjaga;
		@$data['penjaga'] = $row_mam;
		@$data['penjaga2'] = $row_mamme;
		#echo "<pre>";print_r($row_mamme);echo "</pre>";

		$data["res_kewarganegaraan"] = $this->sdm->get_data("ref_kewarganegaraan");
		$data["res_bangsa"] = $this->sdm->get_data("ref_bangsa");
		$data["res_etnik"] = $this->sdm->get_data("ref_etnik");
		$data["res_agama"] = $this->sdm->get_data("ref_agama");
		$data["res_taraf_perkahwinan"] = $this->sdm->get_data("ref_taraf_perkahwinan");
		$data["res_kelulusan"] = $this->sdm->get_data("ref_kelulusan");
		$data["res_kategori_pemohon"] = $this->sdm->get_data("ref_kategori_pemohon");
		$data["res_negeri"] = $this->sdm->get_data("ref_negeri");

		$data["ref_kategori_penjaga"] = $this->slm->get_data("ref_kategori_penjaga");
		$data["res_pendapatan"] = $this->slm->get_data("ref_pendapatan");
		$data["ref_hubungan"] = $this->slm->get_data("ref_hubungan");
		$data["ref_pekerjaan"] = $this->slm->get_data("ref_pekerjaan");

		$this->render_data('registration/maklumat-penjaga', 'full_width', $data);
	}

	/*
	 * Method: Tempat tinggal
	 * Module: Pelatih
	*/
	public function tinggal() {
		$noMykad = $this->uri->segment('4');
		if ($noMykad === 'mykad') $noMykad = $this->uri->segment('5');
		$where["no_mykad"] = $noMykad;
		$row_pbp = $this->sdm->get_row_pbp($where);
		if (!count($row_pbp)) {
			redirect('registration', true);
		}
		$row_mam = $this->hm->getTinggalByBp($row_pbp->id);
		#echo "<pre>";print_r($row_mam);echo "</pre>";
		@$data['idBp'] = $row_pbp->id;
		@$data['id'] = $row_mam->id;
		@$data['row_tinggal'] = $row_mam;
		#echo "<pre>";print_r($row_pbp);echo "</pre>";

		$this->render_data('registration/tempat-tinggal', 'full_width', $data);
	}

	/*
	 * Method: Perakuan
	 * Module: Pelatih
	*/
	public function perakuan() {
		$noMykad = $this->uri->segment('4');
		if ($noMykad === 'mykad') $noMykad = $this->uri->segment('5');
		$where["no_mykad"] = $noMykad;
		$row_pbp = $this->sdm->get_row_pbp($where);
		if (!count($row_pbp)) {
			redirect('registration', true);
		}
		@$data['idBp'] = $row_pbp->id;
		$row_mam = $this->hm->getMaklumatByBp($row_pbp->id);
		$row_kursus = $this->hm->getKursusByBp($row_pbp->id);
		$row_mp = $this->hm->getPenjagaByBp($row_pbp->id);
		$row_tinggal = $this->hm->getTinggalByBp($row_pbp->id);
		@$data['idmam'] = $row_mam->id;
		@$data['idkursus'] = $row_kursus->id;
		@$data['idmp'] = $row_mp->id_penjaga;
		@$data['idtinggal'] = $row_tinggal->id;

		$this->render_data('registration/perakuan', 'full_width', $data);
	}

	/*
	 * Method: Perakuan
	 * Module: Pelatih
	*/
	public function cetak_permohonan() {
		$noMykad = $this->uri->segment('4');
		if ($noMykad === 'mykad') $noMykad = $this->uri->segment('5');
		$where["no_mykad"] = $noMykad;
		$row_pbp = $this->sdm->get_row_pbp($where);
		if (!count($row_pbp)) {
			redirect('registration', true);
		}
		@$data['idBp'] = $row_pbp->id;
		@$data['id_permohonan'] = $row_pbp->id;
		@$data['no_mykad'] = $row_pbp->no_mykad;

		@$data["butir_peribadi"] = $this->sdm->get_butir_peribadi($noMykad);

		$this->render_data('registration/cetak_permohonan', 'full_width', $data);
	}

	### BLOCK ACTION
	/*
	 * Method: Action Butir Peribadi
	 * Module: Pelatih
	*/
	public function simpan_bp()
	{
		$status_insert = 1;
		#var_dump ($this->uri->uri_to_assoc());
		#var_dump($this->input->get());
		#var_dump($this->input->post());exit;

		$is_hantar = $this->uri->segment('4');
		if ($is_hantar === 'email') $is_hantar = $this->uri->segment('5');

		$id_pbp = $this->input->post('idBp');
		if ($id_pbp=="") $id_pbp = 0;
		$nama_penuh = html_escape($this->input->post('bp_nama_penuh'));
		$nama_penuh = strtoupper ($nama_penuh);
		$no_mykad = html_escape($this->input->post('bp_no_mykad'));
		$dt_tarikh_lahir = new DateTime($this->input->post('bp_tarikh_lahir'));
		$tarikh_lahir = $dt_tarikh_lahir->format("Y-m-d");
		$kewarganegaraan = $this->input->post('bp_kewarganegaraan');
		$umur = html_escape($this->input->post('bp_umur'));
		$no_telefon = html_escape($this->input->post('bp_no_telefon'));
		$no_hp = html_escape($this->input->post('bp_no_telefon'));
		$alamat = strtoupper(html_escape($this->input->post('bp_alamat')));
		$poskod = $this->input->post('bp_poskod_id');
		$bandar = $this->input->post('bp_bandar');
		$negeri = $this->input->post('bp_negeri');
		$negara = $this->input->post("bp_negara");
		$email = html_escape($this->input->post('bp_email'));
		$bangsa = $this->input->post('bp_bangsa');
		$etnik = $this->input->post('bp_etnik');
		$agama = $this->input->post('bp_agama');
		$taraf_perkahwinan = $this->input->post('bp_taraf_perkahwinan');
		// $kategori_kelulusan = $this->input->post('bp_kategori_kelulusan');
		$kelulusan = $this->input->post('bp_kelulusan');
		$kemahiran = $this->input->post("bp_kelulusanK");
		// if($kategori_kelulusan == "Kemahiran") $kelulusan = 1;
		$matlamat_selepas_kursus = $this->input->post('bp_matlamat_selepas_kursus');
		$kategori_pemohon = $this->input->post('bp_kategori_pemohon');
		// echo $negeri;exit;
$jantina = $this->input->post('bp_jantina');
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
		if ($id_pbp!="" || $id_pbp!=0) {
			$data_p["id"] = $id_pbp;
			$status_insert = 0;
		}

		// create auto no rujukan permohonan
		// hitung jumlah data di table permohonan_butir_peribadi
		$jml_data_pbp = $this->sdm->count_data();
		// jika lebih dari 0 maka sudah ada isi, maka ambil no_rujukan_permohonan yang terakhir
		if ($jml_data_pbp > 0 )
		{
			$mydata = $this->hm->getKadByBP($id_pbp);
			$my_no_rujukan = $mydata->no_rujukan_permohonan;
			if ($my_no_rujukan) $no_rujukan_permohonan = $my_no_rujukan;
			else {
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
		}
		else
		{
			$no_rujukan_permohonan = date("Ym")."0001";
		}

		$data_p["nama_penuh"] = $nama_penuh;
		$data_p["no_mykad"] = $no_mykad;
		$data_p["tarikh_lahir"] = $tarikh_lahir;
		$data_p["kewarganegaraan"] = $kewarganegaraan;
		$data_p["umur"] = $umur;
		$data_p["no_telefon"] = $no_telefon;
		$data_p["no_hp"] = $no_telefon;
		$data_p["alamat"] = $alamat;
		$data_p["poskod_3"] = $this->input->post('bp_poskod');
		$data_p["bandar_3"] = strtoupper($this->input->post('bp_bandar'));
		$data_p["negeri_3"] = $this->input->post('bp_negeri');
		$data_p["negara"] = $negara;
		$data_p["emel"] = $email;
		$data_p["bangsa"] = $bangsa;
		$data_p["etnik"] = $etnik;
		$data_p["agama"] = $agama;
		$data_p["taraf_perkahwinan"] = $taraf_perkahwinan;
		// $data_p["kategori_kelulusan"] = $kategori_kelulusan;
		$data_p["kelulusan"] = $kelulusan;
		$data_p["kelulusan_kemahiran"] = $kemahiran;
		$data_p["matlamat"] = $matlamat_selepas_kursus;
		$data_p["kategori_pemohon"] = $kategori_pemohon;
		$data_p["pengesahan"] = 0;
		$data_p["pengakuan"] = 2;
		$data_p["no_rujukan_permohonan"] =$no_rujukan_permohonan;
		$data_p["tarikh_hantar"] = date("Y-m-d H:i:s");
		$data_p["jenis_lpp"] = "LPP04";
		$data_p["jantina"] = $jantina;
		$s = $this->hm->save_butir_probadi($data_p, $status_insert);
		// echo $s;exit;

		// send email
		if ($is_hantar != '0') {
			$this->hantarmail($data_p);
			$mykad = $this->hm->getKadByBP($id_pbp);
			$data['mykad'] = $mykad->no_mykad;
			echo json_encode($data);
		} else {
			$mykad = $this->hm->getKadByBP($s);
			$data['mykad'] = $mykad->no_mykad;
			echo json_encode($data);
		}
	}

	/*
	 * Method: Action Maklumat Am
	 * Module: Pelatih
	*/
	public function simpan_mam() {
		$status_insert = 1;
		// var_dump($this->input->post());
		$arr_data = $this->input->post();

		$id = $this->input->post('id');
		$id2 = $this->input->post('id2');
		$id_pbp = $this->input->post('idBp');
		if ($id=="") $id = 0;
		if ($id_pbp=="") $id_pbp = 0;

		if ($id_pbp!="" OR $id_pbp!=0) {
			if (($id!="" || $id!=0)) {
				$data_p["id"] = $id;
				$data_p["id_permohonan"] = $id_pbp;
				$status_insert = 0;
			} else {
				$data_p["id_permohonan"] = $id_pbp;
			}

			foreach ($arr_data['sumber'] as $idx=>$sumber)
			{
				$data_p[$idx] = $sumber;
			}
			$data_p['text_lain'] = html_escape($arr_data['text_lain']);
			#echo "<pre>";print_r($data_p);echo "</pre>";

			$s = $this->hm->save_maklumat_am($data_p, $status_insert);

			if (($id2!="" || $id2!=0)) {
				$data_p2["id"] = $id;
				$data_p2["id_permohonan"] = $id_pbp;
			} else {
				$data_p2["id_permohonan"] = $id_pbp;
			}

			foreach ($arr_data['sumber2'] as $idx2=>$sumber2)
			{
				$data_p2[$idx2] = $sumber2;
			}
			#echo "<pre>";print_r($data_p);echo "</pre>";

			$s = $this->hm->save_maklumat_am_2($data_p2);

			if ($s) {
				$data['status'] = 1;
				$mykad = $this->hm->getKadByBP($id_pbp);
				$data['mykad'] = $mykad->no_mykad;
				echo json_encode($data);
			} else {
				$data['status'] = 0;
				$mykad = $this->hm->getKadByBP($id_pbp);
				$data['mykad'] = $mykad->no_mykad;
				echo json_encode($data);
			}
		} else {
			$data['status'] = 0;
		}
	}

	/*
	 * Method: Action Kursus Pilihan
	 * Module: Pelatih
	*/
	function simpan_kursus()
	{
		$status_insert = 1;

		#var_dump($this->input->post());
		$id = $this->input->post('id');
		$id_pbp = $this->input->post('idBp');
		if ($id=="") { $id = 0; }
		if ($id_pbp=="") { $id_pbp = 0; }

		if ($id_pbp!="" OR $id_pbp!=0) {
			if (($id!="" || $id!=0)) {
				$data_p["id"] = $id;
				$data_p["id_permohonan"] = $id_pbp;
				$status_insert = 0;
			} else {
				$data_p["id_permohonan"] = $id_pbp;
			}

			$data_p['kursus1'] = $this->input->post('kursus1');
			$data_p['kursus2'] = $this->input->post('kursus2');
			$data_p['kursus3'] = $this->input->post('kursus3');
			#echo "<pre>";print_r($data_p);echo "</pre>";

			$s = $this->hm->save_permohonan_kursus($data_p,$status_insert);

			if ($s) {
				$data['status'] = 1;
				$mykad = $this->hm->getKadByBP($id_pbp);
				$data['mykad'] = $mykad->no_mykad;
				echo json_encode($data);
			} else {
				$data['status'] = 0;
				$mykad = $this->hm->getKadByBP($id_pbp);
				$data['mykad'] = $mykad->no_mykad;
				echo json_encode($data);
			}
		} else {
			$data['status'] = 0;
		}
	}

	/*
	 * Method: Action Maklumat Penjaga
	 * Module: Pelatih
	*/
	function simpan_mp()
	{
		//if(isset($_POST)) { echo "<pre>"; print_r($_POST); }

		$status_insert = 1;
		#var_dump($this->input->post());
		$id = $this->input->post('id');
		$id_pbp = $this->input->post('idBp');
		if ($id_pbp=="") $id_pbp = 0;

		if ($id_pbp!="" OR $id_pbp!=0) {
			if (($id!="" || $id!=0)) {
				$data_mp["id"] = $id;
				$data_mp["id_permohonan"] = $id_pbp;
				$status_insert = 0;
			} else {
				$data_mp["id_permohonan"] = $id_pbp;
			}

			#if ($id!="" || $id!=0) $data_mp["id"] = $id;
			#if ($id_pbp!="" || $id_pbp!=0) $data_mp["id_permohonan"] = $id_pbp;

			$maklumat = $this->input->post('maklumat');
			$a_nama_penuh = strtoupper (html_escape($this->input->post('a_nama_penuh')));
			$a_hubungan = ($this->input->post('a_hubungan')!="")?$this->input->post('a_hubungan'):0;
			$a_jenis_pengenalan = $this->input->post('a_jenis_pengenalan');
			$a_mykad = html_escape($this->input->post('a_mykad'));
			$a_kewarganegaraan = ($this->input->post('a_kewarganegaraan')!="")?$this->input->post('a_kewarganegaraan'):0;
			$a_kategori_penjaga = ($this->input->post('a_kategori_penjaga')!="")?$this->input->post('a_kategori_penjaga'):0;
			$a_no_tel = html_escape($this->input->post('a_no_tel'));
			$a_no_hp = html_escape($this->input->post('a_no_hp'));
			$a_agama = ($this->input->post('a_agama')!="")?$this->input->post('a_agama'):0;
			$a_etnik = ($this->input->post('a_etnik')!="")?$this->input->post('a_etnik'):0;
			$a_bangsa = ($this->input->post('a_bangsa')!="")?$this->input->post('a_bangsa'):0;
			$a_alamat = strtoupper (html_escape($this->input->post('a_alamat')));
			$a_poskod = $this->input->post('a_poskod');
			$a_pekerjaan = $this->input->post('a_pekerjaan');
			$a_pendapatan = ($this->input->post('a_pendapatan')!="")?$this->input->post('a_pendapatan'):0;
			$a_majikan = strtoupper (html_escape($this->input->post('a_majikan')));
			$a_no_tel_pejabat = html_escape($this->input->post('a_no_tel_pejabat'));
			$a_samb = html_escape($this->input->post('a_samb'));
			$a_alamat_pejabat = strtoupper (html_escape($this->input->post('a_alamat_pejabat')));
			$a_poskod_pejabat = $this->input->post("a_poskod_pejabat") != "" ? html_escape($this->input->post("a_poskod_pejabat")) : "";
			$a_bandar_pejabat = $this->input->post("a_bandar_pejabat") == "" ? $this->input->post("a_bandar_pejabat") : "";
			$a_negeri_pejabat = $this->input->post("a_negeri_pejabat") == "" ? $this->input->post("a_negeri_pejabat") : "";
			$b_nama_penuh = strtoupper (html_escape($this->input->post('b_nama_penuh')));
			$b_jenis_pengenalan = $this->input->post('b_jenis_pengenalan');
			$b_mykad = html_escape($this->input->post('b_mykad'));
			$b_kewarganegaraan = ($this->input->post('b_kewarganegaraan')!="")?$this->input->post('b_kewarganegaraan'):0;
			$b_kategori_penjaga = ($this->input->post('b_kategori_penjaga')!="")? $this->input->post('b_kategori_penjaga'):0;
			$b_no_tel = html_escape($this->input->post('b_no_tel'));
			$b_no_hp = html_escape($this->input->post('b_no_hp'));
			$b_agama = ($this->input->post('b_agama')!="")?$this->input->post('b_agama'):0;
			$b_etnik = ($this->input->post('b_etnik')!="")?$this->input->post('b_etnik'):0;
			$b_bangsa = ($this->input->post('b_bangsa')!="")?$this->input->post('b_bangsa'):0;
			$b_alamat = strtoupper(html_escape($this->input->post('b_alamat')));
			$b_poskod = $this->input->post('b_poskod');
			$b_pekerjaan = $this->input->post('b_pekerjaan');
			$b_pendapatan = ($this->input->post('b_pendapatan')!="")?$this->input->post('b_pendapatan'):0;
			$b_majikan = strtoupper (html_escape($this->input->post('b_majikan')));
			$b_no_tel_pejabat = html_escape($this->input->post('b_no_tel_pejabat'));
			$b_samb = html_escape($this->input->post('b_samb'));
			$b_alamat_pejabat = strtoupper (html_escape($this->input->post('b_alamat_pejabat')));
			$b_poskod_pejabat = $this->input->post("b_poskod_pejabat") == "" ? html_escape($this->input->post("b_poskod_pejabat")) : "";
			$b_bandar_pejabat = $this->input->post("b_bandar_pejabat") == "" ? $this->input->post("b_bandar_pejabat") : "";
			$b_negeri_pejabat = $this->input->post("b_negeri_pejabat") == "" ? $this->input->post("b_negeri_pejabat") : "";
			$c_nama_penuh = strtoupper (html_escape($this->input->post('c_nama_penuh')));
			$c_jenis_pengenalan = $this->input->post('c_jenis_pengenalan');
			$c_mykad = html_escape($this->input->post('c_mykad'));
			$c_kewarganegaraan = ($this->input->post('c_kewarganegaraan')!="")?$this->input->post('c_kewarganegaraan'):0;
			$c_kategori_penjaga = ($this->input->post('c_kategori_penjaga')!="")? $this->input->post('c_kategori_penjaga'):0;
			$c_no_tel = html_escape($this->input->post('c_no_tel'));
			$c_no_hp = html_escape($this->input->post('c_no_hp'));
			$c_agama = ($this->input->post('c_agama')!="")?$this->input->post('c_agama'):0;
			$c_etnik = ($this->input->post('c_etnik')!="")?$this->input->post('c_etnik'):0;
			$c_bangsa = ($this->input->post('c_bangsa')!="")?$this->input->post('c_bangsa'):0;
			$c_alamat = strtoupper (html_escape($this->input->post('c_alamat')));
			$c_poskod = $this->input->post('c_poskod');
			$c_pekerjaan = $this->input->post('c_pekerjaan');
			$c_pendapatan = ($this->input->post('c_pendapatan')!="")?$this->input->post('c_pendapatan'):0;
			$c_majikan = strtoupper (html_escape($this->input->post('c_majikan')));
			$c_no_tel_pejabat = html_escape($this->input->post('c_no_tel_pejabat'));
			$c_samb = html_escape($this->input->post('c_samb'));
			$c_alamat_pejabat = strtoupper (html_escape($this->input->post('c_alamat_pejabat')));
			$c_poskod_pejabat = $this->input->post("c_poskod_pejabat") == "" ? html_escape($this->input->post("c_poskod_pejabat")) : "";
			$c_bandar_pejabat = $this->input->post("c_bandar_pejabat") == "" ? $this->input->post("c_bandar_pejabat") : "";
			$c_negeri_pejabat = $this->input->post("c_negeri_pejabat") == "" ? $this->input->post("c_negeri_pejabat") : "";

			$data_mp["maklumat"] = $maklumat;
			$data_mp["a_nama_penuh"] = $a_nama_penuh;
			$data_mp["a_hubungan"] = $a_hubungan;
			$data_mp["a_jenis_pengenalan"] = $a_jenis_pengenalan;
			$data_mp["a_mykad"] = urldecode($a_mykad);
			$data_mp["a_kewarganegaraan"] = $a_kewarganegaraan;
			$data_mp["a_kategori_penjaga"] = $a_kategori_penjaga;
			$data_mp["a_no_tel"] = $a_no_tel;
			$data_mp["a_no_hp"] = $a_no_hp;
			$data_mp["a_agama"] = $a_agama;
			$data_mp["a_etnik"] = $a_etnik;
			$data_mp["a_bangsa"] = $a_bangsa;
			$data_mp["a_alamat"] = $a_alamat;
			$data_mp["a_poskod"] = $this->input->post('a_poskod');;//trim($a_poskod);
			$data_mp['a_negeri2']= strtoupper($this->input->post('a_negeri'));
			$data_mp['a_bandar2']= strtoupper($this->input->post('a_bandar'));
			$data_mp["a_pekerjaan"] = $a_pekerjaan;
			$data_mp["a_pendapatan"] = $a_pendapatan;
			$data_mp["a_majikan"] = $a_majikan;
			$data_mp["a_no_tel_pejabat"] = $a_no_tel_pejabat;
			$data_mp["a_samb"] = $a_samb;
			$data_mp["a_alamat_pejabat"] = $a_alamat_pejabat;
			$data_mp["a_alamat_pejabat_poskod"] = $a_poskod_pejabat;
			$data_mp['a_alamat_pejabat_bandar2']=strtoupper($this->input->post('a_bandar_pejabat'));
			$data_mp['a_alamat_pejabat_negeri3']=strtoupper($this->input->post('a_negeri_pejabat'));
			$data_mp["b_nama_penuh"] = $b_nama_penuh;
			$data_mp["b_jenis_pengenalan"] = $b_jenis_pengenalan;
			$data_mp["b_mykad"] = urldecode($b_mykad);
			$data_mp["b_kewarganegaraan"] = $b_kewarganegaraan;
			$data_mp["b_kategori_penjaga"] = $b_kategori_penjaga;
			$data_mp["b_no_tel"] = $b_no_tel;
			$data_mp["b_no_hp"] = $b_no_hp;
			$data_mp["b_agama"] = $b_agama;
			$data_mp["b_etnik"] = $b_etnik;
			$data_mp["b_bangsa"] = $b_bangsa;
			$data_mp["b_alamat"] = $b_alamat;
			$data_mp["b_poskod"] = trim($b_poskod);

			$data_mp['b_negeri2']= strtoupper($this->input->post('b_negeri'));
			$data_mp['b_bandar2']= strtoupper($this->input->post('b_bandar'));



			$data_mp["b_pekerjaan"] = $b_pekerjaan;
			$data_mp["b_pendapatan"] = $b_pendapatan;
			$data_mp["b_majikan"] = $b_majikan;
			$data_mp["b_no_tel_pejabat"] = $b_no_tel_pejabat;
			$data_mp["b_samb"] = $b_samb;
			$data_mp["b_alamat_pejabat"] = $b_alamat_pejabat;
			$data_mp["b_alamat_pejabat_poskod"] = $this->input->post('b_poskod_pejabat');
			$data_mp["b_alamat_pejabat_negeri3"] = $this->input->post('b_negeri_pejabat');
			$data_mp["b_alamat_pejabat_bandar2"] = $this->input->post('b_bandar_pejabat');


			$data_mp["c_nama_penuh"] = $c_nama_penuh;
			$data_mp["c_jenis_pengenalan"] = $c_jenis_pengenalan;
			$data_mp["c_mykad"] = urldecode($c_mykad);
			$data_mp["c_kewarganegaraan"] = $c_kewarganegaraan;
			$data_mp["c_kategori_penjaga"] = $c_kategori_penjaga;
			$data_mp["c_no_tel"] = $c_no_tel;
			$data_mp["c_no_hp"] = $c_no_hp;
			$data_mp["c_agama"] = $c_agama;
			$data_mp["c_etnik"] = $c_etnik;
			$data_mp["c_bangsa"] = $c_bangsa;
			$data_mp["c_alamat"] = $c_alamat;
			$data_mp["c_poskod"] = trim($c_poskod);

			$data_mp['c_negeri3']= strtoupper($this->input->post('c_negeri'));
			$data_mp['c_bandar2']= strtoupper($this->input->post('c_bandar'));

			$data_mp["c_pekerjaan"] = $c_pekerjaan;
			$data_mp["c_pendapatan"] = $c_pendapatan;
			$data_mp["c_majikan"] = $c_majikan;
			$data_mp["c_no_tel_pejabat"] = $c_no_tel_pejabat;
			$data_mp["c_samb"] = $c_samb;
			$data_mp["c_alamat_pejabat"] = $c_alamat_pejabat;

			$data_mp["c_alamat_pejabat_negeri3"] = $this->input->post('c_negeri_pejabat');
			$data_mp["c_alamat_pejabat_bandar2"] = $this->input->post('c_bandar_pejabat');
			$data_mp["c_alamat_pejabat_poskod"] = $this->input->post('c_poskod_pejabat');

			// $data_mp["c_alamat_pejabat_poskod"] = $c_poskod_pejabat;
			//echo "<pre>";print_r($data_mp);echo "</pre>";exit;

			// $s = $this->hm->save_permohonan_penjaga($data_mp, $status_insert);
			if( in_array( $data_mp['a_pekerjaan'] , array( 4, 5, 6))){
				//$data_mp["a_pendapatan"] = null;
				$data_mp["a_majikan"] = null;
				$data_mp["a_no_tel_pejabat"] = null;
				$data_mp["a_alamat_pejabat"] = null;
				$data_mp["a_alamat_pejabat_poskod"] =null;
				$data_mp['a_alamat_pejabat_bandar2']=null;
				$data_mp['a_alamat_pejabat_negeri3']=null;
				$data_mp['a_alamat_pejabat_negeri2']=null;
				$data_mp['a_alamat_pejabat_poskod2']=null;
				$data_mp['a_no_tel_pejabat']=null;        
			}

			if( in_array( $data_mp['b_pekerjaan'] , array( 4, 5, 6))){
				//$data_mp["b_pendapatan"] = null;
				$data_mp["b_majikan"] = null;
				$data_mp["b_no_tel_pejabat"] = null;
				$data_mp["b_alamat_pejabat"] = null;
				$data_mp["b_alamat_pejabat_bandar2"] =null;
				$data_mp['b_alamat_pejabat_negeri3']=null;
				$data_mp['b_alamat_pejabat_poskod']=null;
				//$data_mp['b_bandar2']=null;
				$data_mp['b_alamat_pejabat_negeri3']=null;
				//$data_mp['b_negeri_pejabat']=null;
				//$data_mp['b_negeri_pejabat']=null;
				$data_mp['b_alamat_pejabat_negeri2']=null;
				$data_mp['b_alamat_pejabat_poskod2']=null;
 			}

			if( in_array( $data_mp['c_pekerjaan'] , array( 4, 5, 6))){
				//$data_mp["c_pendapatan"] = null;
				$data_mp["c_majikan"] = null;
				$data_mp["c_alamat_pejabat"] = null;
				$data_mp["c_alamat_pejabat_bandar2"] =null;
				$data_mp['c_alamat_pejabat_negeri2']=null;
				$data_mp['c_alamat_pejabat_negeri3']=null;
				$data_mp['c_no_tel_pejabat']=null;
				$data_mp['c_alamat_pejabat_poskod']=null;
				$data_mp['c_alamat_pejabat_poskod2']=null;
 			}
			
			
			$s = $this->hm->save_permohonan_penjaga($data_mp);
			if ($s) {
				$data['status'] = 1;
				$mykad = $this->hm->getKadByBP($id_pbp);
				$data['mykad'] = $mykad->no_mykad;
				echo json_encode($data);
			} else {
				$data['status'] = 0;
				$mykad = $this->hm->getKadByBP($id_pbp);
				$data['mykad'] = $mykad->no_mykad;
				echo json_encode($data);
			}
		} else {
			$data['status'] = 0;
		}
	}

	/*
	 * Method: Action Tempat Tinggal
	 * Module: Pelatih
	*/
	function simpan_tinggal()
	{
		#var_dump($this->input->post());
		$id_pbp = $this->input->post('idBp');
		if ($id_pbp=="") $id_pbp = 0;

		if ($id_pbp!="" || $id_pbp!=0) $data_p["id_permohonan"] = $id_pbp;
		$data_p['tempat_tinggal'] = $this->input->post('keperluan_tempat');
		$data_p['pengangkutan'] = $this->input->post('keperluan_pengangkut');
		#echo "<pre>";print_r($data_p);echo "</pre>";

		$s = $this->hm->save_tempat_tinggal($data_p);
		if ($s) {
			$data['status'] = 1;
			$mykad = $this->hm->getKadByBP($id_pbp);
			$data['mykad'] = $mykad->no_mykad;
			echo json_encode($data);
		} else {
			$data['status'] = 0;
			$mykad = $this->hm->getKadByBP($id_pbp);
			$data['mykad'] = $mykad->no_mykad;
			echo json_encode($data);
		}
	}

	/*
	 * Method: Action Update butir peribadi
	 * Module: Pelatih
	*/
	public function update_bp() {
		#var_dump($this->input->post());
		$id_pbp = $this->input->post('idBp');
		if ($id_pbp=="") $id_pbp = 0;

		if ($id_pbp!="" || $id_pbp!=0) $data["id"] = $id_pbp;
		$pengakuan_1 = $this->input->post('pengakuan_1');
		$pengakuan_2 = $this->input->post('pengakuan_2');
		$data["pengesahan"] = $pengakuan_1;
		$data["pengakuan"] = $pengakuan_2;
		#echo "<pre>";print_r($data);echo "</pre>";

		$s = $this->hm->save_butir_probadi($data, 0);
		if ($s) {
			$mykad = $this->hm->getKadByBP($id_pbp);
			$data['status'] = 1;
			$data['mykad'] = $mykad->no_mykad;
			echo json_encode($data);
		} else {
			$data['status'] = 0;
			$mykad = $this->hm->getKadByBP($s);
			$data['mykad'] = $mykad->no_mykad;
			echo json_encode($data);
		}

	}
	### END BLOCK ACTION

	### BLOCK AJAX
	function cekkad()
	{
		$mykad = $this->input->post('no_mykad');

		$row_mykad = $this->hm->cek_nomykad($mykad);

		if($row_mykad > 0)
		{
			$data["status"] = "Pelatih"; /*Nino*/
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

				// if ($row_pbp["id_pelatih"] != NULL)
				// {
				// 	$data["status"] = "Permohonan sudah di pelatih";
				// 	$data["giatmara"] = $row_pbp["nama_giatmara"];
				// }
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

	function ajax_poskod()
	{
			$poskod_ket = $this->input->post('poskod_ket');
			$poskod_id = $this->input->post('poskod_id');

			$poskod_ket != "" ? $w["poskod"] = $poskod_ket : "";
			$poskod_id != "" ? $w["id"] = $poskod_id : "";
			// echo $this->db->like(array("poskod"=>$poskod_ket))->get_compiled_select('ref_poskod_bandar_negeri');
			$row = $this->sdm->get_poskod($w);

			@$data["id_poskod"] = $row->id_poskod;
			@$data["bandar"] = $row->bandar;
			@$data["negeri"] = strtoupper($row->nama_negeri);
			echo json_encode($data);
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

	public function ajaxkx($id, $idgiatmara) {
		$query = $this->hm->savestatusx($id, $idgiatmara)->result();
		if ($query) {
			echo json_encode($query);
		}else {
			echo json_last_error_msg();
		}
	}

	public function ajaxng($id) {
		$query = $this->db->where(array("id_negeri"=>$id,"id_type_giatmara"=>1))->order_by("nama_giatmara", "asc")->get('ref_giatmara')->result();
		#echo "query=".$this->db->last_query();
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

	public function ajaxnkr($id, $id2) {
		$query = $this->hm->savestatusc($id, $id2)->result();
		if ($query) {
			echo json_encode($query);
		}else {
			echo json_last_error_msg();
		}
	}
	### END BLOCK AJAX

	### BLOCK PRIVATE
	private function hantarmail ($data_p)
	{
		// send email
		$this->load->library("email");

		$config_email["protocol"] = "smtp";
		$config_email["smtp_host"] = "ssl://smtp.gmail.com";
		$config_email["smtp_port"] = "465";
		$config_email["smtp_user"] = "gspeltest@gmail.com";
		$config_email['smtp_pass'] = "Gsp3lPass!";
		$config_email['charset']   = 'utf-8';
		$config_email['mailtype'] = 'html';
		$config_email["priority"] = 1;
		$config_email["newline"] = "\r\n";
		$this->email->initialize($config_email);

		$this->email->from('gspel@mmsi.co.id', 'Administrator GSPel');
		$this->email->to($email);
		$this->email->subject("Permohonan Pendaftaran Giatmara");
		$this->email->message($this->load->view("registration/notif_email_butir_peribadi", $data_p, TRUE));
		$this->email->send();
		$this->email->print_debugger();
	}
	### END BLOCK PRIVATE
}
