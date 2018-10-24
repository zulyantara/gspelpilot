<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gspel_kurikulum extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
		$this->load->model('Kurikulum_model');
		$this->load->database();
		$this->load->library('grocery_CRUD');
		// $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
	}

	public function index()
	{
		$this->load->model('user_model', 'users');
		$this->mViewData['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$this->mViewData['count'] = array(
			'users' => $this->users->count_all(),
		);
		$this->render('home');
	}

// Koding P1
	public function trainer2()
	{
		$this->load->model('Ref_kursus_model');
		$this->load->model('Ref_intake_model');
		
		$this->load->model('user_model', 'users');

		$this->mPageTitle = "Pemarkahan";
		$this->load->model('Kurikulum_model');
		$this->mViewData['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$idUser = $this->ion_auth->user()->row()->id;
		$this->mViewData['user2'] = $this->Kurikulum_model->get_user($idUser)->result();
		#$this->mViewData['user3'] = $this->Kurikulum_model->get_user2($idUser)->result();
		#$this->mViewData['user4'] = $this->Kurikulum_model->get_user3($idUser)->result();
		$this->mViewData['negeri'] = $this->Kurikulum_model->get_negeri()->result();
		$this->mViewData['user3'] = $this->Ref_kursus_model->get_by_user($idUser);;
		$this->mViewData['user4'] = $this->Ref_intake_model->get_by_user($idUser);
		$this->render('gspel_kurikulum/p1/trainer2');
	}

	public function trainer3()
	{
		//$this->load->library('session');
		$this->mPageTitle = "Pemarkahan";
		$this->load->model('Kurikulum_model');
		$this->load->model('Ref_kursus_model');
		$this->load->model('Ref_intake_model');
		#echo "<pre>";print_r($this->input->post());echo "</pre>";

		$id = $this->uri->segment(4);
		$id2 = urldecode($this->uri->segment(5));
		$id3 = urldecode($this->uri->segment(6));
		$id4 = urldecode($this->uri->segment(7));

		$giatmara = $this->input->post('giatmara');
		$kursus = $this->input->post('kursus');
		$jeniskursus = $this->input->post('jeniskursus');
		$intake = $this->input->post('intake');
		$data['negeri'] = $this->Kurikulum_model->get_negeri()->result();

		$data["giatmara"] = $giatmara;
		$data['kursus'] = $kursus;
		$data["jeniskursus"] = $jeniskursus;
		$data["intake"] = $intake;

		$idUser = $this->ion_auth->user()->row()->id;
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$data['user2'] = $this->Kurikulum_model->get_user($idUser)->result();
		#$data['user3a'] = $this->Kurikulum_model->get_user2a($idUser,$kursus)->result();
		$data['user3b'] = $this->Kurikulum_model->get_user2b($idUser ,$kursus )->result();
		#echo "<pre>";print_r($data['user3b']);echo "</pre>";
		$data['user4'] = $this->Kurikulum_model->get_user3($idUser)->result();
		#$data['user4a'] = $this->Kurikulum_model->get_user3a($idUser,$intake)->result();
		#$data['user4b'] = $this->Kurikulum_model->get_user3b($idUser,$intake)->result();

		
		$data['user3a'] = $this->Ref_kursus_model->get_by_user($idUser);
		#echo "<pre>";print_r($data['user3a']);echo "</pre>";
		$data['user4a'] = $this->Ref_intake_model->get_by_user($idUser);

		if ($id=='') {

		$giatmara = $this->input->post('giatmara');
		$kursus = $this->input->post('kursus');
		$jeniskursus = $this->input->post('jeniskursus');
		$intake = $this->input->post('intake');
		$data["jeniskursus"] = $jeniskursus;
		$data["kursus"] = $kursus;
		$data["giatmara"] = $giatmara;
		$data["intake"] = $intake;
		$data['modul'] = $this->Kurikulum_model->get_modul($giatmara,$kursus,$jeniskursus,$intake)->result();
			
		} else {
			if ($id3=="semua") {
				$semua ="";
				$id = $this->uri->segment(4);
				$id2 = urldecode($this->uri->segment(5));
				$id3 = urldecode($this->uri->segment(6));
				$id4 = urldecode($this->uri->segment(7));

				$data["jeniskursus"] = $semua;
				$data["kursus"] = $id;
				$data["giatmara"] = $id2;
				$data["intake"] = $id4;
				
				$data['modul'] = $this->Kurikulum_model->get_modul($id2,$id,$semua,$id4)->result();
					
				 
			} else {
				$id = $this->uri->segment(4);
				$id2 = urldecode($this->uri->segment(5));
				$id3 = urldecode($this->uri->segment(6));
				$id4 = urldecode($this->uri->segment(7));

				//var_dump($id);die();

				$data["jeniskursus"] = $id3;
				$data["kursus"] = $id;
				$data["giatmara"] = $id2;
				$data["intake"] = $id4;
			
				$data['modul'] = $this->Kurikulum_model->get_modul($id2,$id,$id3,$id4)->result();
				
				
			}
		}
		
		$this->load->view('gspel_kurikulum/p1/trainer3',$data);
	}

	

	public function trainer4()
	{
		$this->mPageTitle = "Pemarkahan";
		$this->load->model('Kurikulum_model');
		$id = $this->uri->segment(4);
		$id2 = urldecode($this->uri->segment(5));
		$id3 = urldecode($this->uri->segment(6));
		$id4 = urldecode($this->uri->segment(7));
		$id5 = urldecode($this->uri->segment(8));

		//kembali
		$id6 = urldecode($this->uri->segment(9));
		$id7 = urldecode($this->uri->segment(10));
		$id8 = urldecode($this->uri->segment(11));
		$id9 = urldecode($this->uri->segment(12));
		$id10 = urldecode($this->uri->segment(13));

		//var_dump($id9);die();
		$data["idSeq"] = $id."/".$id2."/".$id3."/".$id4."/".$id5."/".$id6."/".$id7."/".$id8."/".$id9;
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		
		if ($id3=='Q') {
		if ($id10=='') {
			$data["jeniskursus"] = "semua";
		} else {
			$data["jeniskursus"] = $id10;
		}
		$data['kursus'] = $id8;
		$data["giatmara"] = $id7;
		$data["intake"] = $id9;

		} else {

		if ($id9=='') {
			$data["jeniskursus"] = "semua";
		} else {
			$data["jeniskursus"] = $id9;
		}
		$data['kursus'] = $id7;
		$data["giatmara"] = $id6;
		$data["intake"] = $id8;
		}
		
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$data["modul"]= $this->Kurikulum_model->get_modul2($id2,$id,$id4,$id9,$id8)->result();
		$data["moduldetail"]= $this->Kurikulum_model->get_modul_detail($id,$id2,$id3,$id4,$id9,$id8)->result();
		$this->load->view('gspel_kurikulum/p1/trainer4',$data);
	}


	public function savetn4(){
		$this->load->model('Kurikulum_model','km');
		$idSeq = $this->input->post('idSeq');
		$idSeq2 = $this->input->post('idSeq2');
		$no = $this->input->post('no');
		$date = date('Y-m-d H:i:s');
		$pbteori =$_POST['pbteori'];
		$pbamali =$_POST['pbamali'];
		$pmteori =$_POST['pmteori'];
		$pmamali =$_POST['pmamali'];
		$idmodul = $_POST['idmodul'];
		$id_modul = $_POST['id_modul'];
		$idpelatih = $_POST['idpelatih'];
		$idkursus = $_POST['idkursus'];

		$idrefkursu = $_POST['idrefkursus'];
		$idgiatmara = $_POST['idgiatmara'];
		$idintake = $_POST['idintake'];
		$jenispelatih = $_POST['jenispelatih'];

		$pilih = $_POST['pilih'];
		
		
		if ($_POST['action'] == 'simpan') {
			//echo "<pre>";print_r($_POST['pilih']);echo "</pre>";exit();

			if (isset($_POST['pilih'])) {
				//for ($idx=0;$idx<=count($pilih);$idx++) {
				foreach ($pilih as $idx => $value) {
				
					 $data = array(
					 'pb_teori' => $pbteori[$idx],
					 'pb_amali' => $pbamali[$idx],
					 'pam_teori'  => $pmteori[$idx],
					 'pam_amali'  => $pmamali[$idx],
					 'id_pelatih'  => $idpelatih[$idx],
					 'id_modul'  => $id_modul[$idx],
					 'id_kursus'  => $idkursus[$idx],
					 'status_isi_markah' => 1
					 );

				$this->db->where('id',$idmodul[$idx]);
				$this->db->update('markah_modul',$data);
		   		//echo $this->db->last_query();exit();

	 			}

	 			if (empty($idSeq2)) {
	 				redirect('admin/Gspel_kurikulum/trainer4/'.$idSeq);
	 			} else {
	 				redirect('admin/Gspel_kurikulum/trainer6/'.$idSeq2);
	 			}


			}
		}
		else if ($_POST['action'] == 'hantar') {

					foreach ($pilih as $idx => $value) {

					 $data = array(
					 'pb_teori' => $pbteori[$idx],
					 'pb_amali' => $pbamali[$idx],
					 'pam_teori'  => $pmteori[$idx],
					 'pam_amali'  => $pmamali[$idx],
					 'id_pelatih'  => $idpelatih[$idx],
					 'id_modul'  => $id_modul[$idx],
					 'id_kursus'  => $idkursus[$idx],
					 'tarikh_hantar_pengajar' => $date,
					 'status_isi_markah' => 2
					 );

				$this->db->where('id',$idmodul[$idx]);
				$this->db->update('markah_modul',$data);

	 			}
					if (empty($idSeq2)) {
	 				redirect('admin/Gspel_kurikulum/trainer4/'.$idSeq);
	 			} else {
	 				redirect('admin/Gspel_kurikulum/trainer6/'.$idSeq2);
	 			}

		}
		

		else{

	}

	}


	public function trainer5()
	{

		$this->load->model('Kurikulum_model');
		$this->mPageTitle = "Pemarkahan";
		$this->load->model('Kurikulum_model');
		$id = $this->uri->segment(4);
		$id2 = urldecode($this->uri->segment(5));
		$id3 = urldecode($this->uri->segment(6));
		$id4 = urldecode($this->uri->segment(7));
		$id5 = urldecode($this->uri->segment(8));

		$id6 = urldecode($this->uri->segment(9));
		$id7 = urldecode($this->uri->segment(10));
		$id8 = urldecode($this->uri->segment(11));
		$id9 = urldecode($this->uri->segment(12));

		//var_dump($id8);die();
		
		// if ($id3=='Q') {
		// if ($id10=='') {
		// 	$data["jeniskursus"] = "semua";
		// } else {
		// 	$data["jeniskursus"] = $id10;
		// }
		// $data['kursus'] = $id8;
		// $data["giatmara"] = $id7;
		// $data["intake"] = $id9;

		// } else {

		// if ($id8=='') {
		// 	$data["jeniskursus"] = "semua";
		// } else {
		// 	$data["jeniskursus"] = $id8;
		// }
		// $data['kursus'] = $id6;
		// $data["giatmara"] = $id7;
		// $data["intake"] = $id5;
		// }

		$data['kursus'] = $id6;
		$data["giatmara"] = $id5;
		$data["intake"] = $id7;
		$data["jeniskursus"] = $id8;

		//var_dump($id8);die();
		$data["idSeq"] = $id."/".$id2."/".$id3."/".$id4."/".$id5."/".$id6."/".$id7."/".$id8;
		// $data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$data["modul"]= $this->Kurikulum_model->get_p1s4_header($id4, $id8)->result();
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$data["moduldetail"]= $this->Kurikulum_model->get_p1s4_detail($id4,$id8)->result();
		$this->load->view('gspel_kurikulum/p1/trainer5',$data);
	}

	public function trainer6()
	{

		$this->mPageTitle = "Pemarkahan";
		$this->load->model('Kurikulum_model');
		$id = $this->uri->segment(4);
		$id2 = urldecode($this->uri->segment(5));
		$id3 = urldecode($this->uri->segment(6));
		$id4 = urldecode($this->uri->segment(7));
		$id5 = urldecode($this->uri->segment(8));
		$id6 = urldecode($this->uri->segment(9));

		//kembali
		$id7 = urldecode($this->uri->segment(10));
		$id8 = urldecode($this->uri->segment(11));
		$id9 = urldecode($this->uri->segment(12));
		$id10 = urldecode($this->uri->segment(13));

		// 
		//var_dump($id10);die();
		if ($id3=='Q') {
		if ($id10=='') {
			$data["jeniskursus"] = "semua";
		} else {
			$data["jeniskursus"] = $id10;
		}
		$data['kursus'] = $id8;
		$data["giatmara"] = $id7;
		$data["intake"] = $id9;

		} else {

		if ($id10=='') {
			$data["jeniskursus"] = "semua";
		} else {
			$data["jeniskursus"] = $id9;
		}
		$data['kursus'] = $id8;
		$data["giatmara"] = $id7;
		$data["intake"] = $id10;

		}

		$data["idSeq"] = $id."/".$id2."/".$id3."/".$id4."/".$id5."/".$id6."/".$id7."/".$id8."/".$id9."/".$id10;
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		
		if ($id10 == "LPP04" or $id10 == "LPP09" ) {
			// var_dump($id11);die();
			//echo "LPP09";
		$data["modul"]= $this->Kurikulum_model->get_modul2($id2,$id,$id4,$id10,$id9)->result();
		$data["moduldetail"]= $this->Kurikulum_model->get_modul_detail2($id,$id2,$id4,$id6,$id10,$id9)->result();
		} else {
			//echo "L";
		$data["modul"]= $this->Kurikulum_model->get_modul2($id2,$id,$id4,$id9,$id10)->result();
		$data["moduldetail"]= $this->Kurikulum_model->get_modul_detail2($id,$id2,$id4,$id6,$id9,$id10)->result();
		}
		
		
		$this->load->view('gspel_kurikulum/p1/trainer6',$data);
	}

	public function savetn5(){
		$this->load->model('Kurikulum_model','km');
		$idSeq = $this->input->post('idSeq');
		$idSeq2 = $this->input->post('idSeq2');
		$no = $this->input->post('no');
		$date = date('Y-m-d H:i:s');
		$kokuri =$_POST['kokuri'];
		$literasi =$_POST['literasi'];
		$keusahawanan =$_POST['keusahawanan'];
		$puji =$_POST['puji'];
		$industri = $_POST['industri'];
		$kehadiran = $_POST['kehadiran'];
		$id = $_POST['id'];
		$idpelatih = $_POST['idpelatih'];
		$idkursus = $_POST['idkursus'];

		$pilih = $_POST['pilih'];
		if ($_POST['action'] == 'simpan') {

			if (isset($_POST['pilih'])) {
				foreach ($pilih as $idx => $value) {
				
					 $data = array(
					 'kehadiran' => $kehadiran[$idx],
					 'kokurikulum' => $kokuri[$idx],
					 'literasi_komputer'  => $literasi[$idx],
					 'keusahawanan'  => $keusahawanan[$idx],
					 'latihan_industri'  => $industri[$idx],
					 'puji'  => $puji[$idx],
					 'status_isi_markah'  => 1,
					 );

				$this->db->where('id',$id[$idx]);
				$this->db->update('markah_modul_2',$data);
				//echo $this->db->last_query();exit();
	 			}
	 			if (empty($idSeq2)) {
	 				redirect('admin/Gspel_kurikulum/trainer5/'.$idSeq);
	 			} else {
	 				redirect('admin/Gspel_kurikulum/trainer7/'.$idSeq2);
	 			}


			}
		}
		else if ($_POST['action'] == 'hantar') {
					foreach ($pilih as $idx => $value) {

					 $data = array(
					 'kehadiran' => $kehadiran[$idx],
					 'kokurikulum' => $kokuri[$idx],
					 'literasi_komputer'  => $literasi[$idx],
					 'keusahawanan'  => $keusahawanan[$idx],
					 'latihan_industri'  => $industri[$idx],
					 'puji'  => $puji[$idx],
					  'tarikh_hantar_pengajar' => $date,
					 'status_isi_markah'  => 2,
					 );

				$this->db->where('id',$id[$idx]);
				$this->db->update('markah_modul_2',$data);

	 			}
				if (empty($idSeq2)) {
	 				redirect('admin/Gspel_kurikulum/trainer5/'.$idSeq);
	 			} else {
	 				redirect('admin/Gspel_kurikulum/trainer7/'.$idSeq2);
	 			}
		} else{

	}
	}

	public function trainer7()
	{
		$this->load->model('Kurikulum_model');
		$this->mPageTitle = "Pemarkahan";
		$this->load->model('Kurikulum_model');
		$id = $this->uri->segment(4);
		$id2 = urldecode($this->uri->segment(5));
		$id3 = urldecode($this->uri->segment(6));
		$id4 = urldecode($this->uri->segment(7));
		$id5 = urldecode($this->uri->segment(8));
		$id6 = urldecode($this->uri->segment(9));

		//kembali
		$id7 = urldecode($this->uri->segment(10));
		$id8 = urldecode($this->uri->segment(11));
		$id9 = urldecode($this->uri->segment(12));
		$id10 = urldecode($this->uri->segment(13));

		//var_dump($id10);die();

		if ($id3=='Q') {
		if ($id10=='') {
			$data["jeniskursus"] = "semua";
		} else {
			$data["jeniskursus"] = $id10;
		}
		$data['kursus'] = $id8;
		$data["giatmara"] = $id7;
		$data["intake"] = $id9;

		} else {

		if ($id10=='') {
			$data["jeniskursus"] = "semua";
		} else {
			$data["jeniskursus"] = $id9;
		}
		$data['kursus'] = $id8;
		$data["giatmara"] = $id7;
		$data["intake"] = $id10;
		}
		

		$data["idSeq2"] = $id."/".$id2."/".$id3."/".$id4."/".$id5."/".$id6."/".$id7."/".$id8."/".$id9."/".$id10;
		
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
			if ($id10 == "LPP04" or $id10 == "LPP09") {
				$data["modul"]= $this->Kurikulum_model->get_p1s4_header($id5,$id10)->result();
				$data["moduldetail"]= $this->Kurikulum_model->get_p1s4_detail2($id5,$id6,$id10)->result();
			}else{
				$data["modul"]= $this->Kurikulum_model->get_p1s4_header($id5,$id9)->result();
				$data["moduldetail"]= $this->Kurikulum_model->get_p1s4_detail2($id5,$id6,$id9)->result();
			}
		
		$this->load->view('gspel_kurikulum/p1/trainer7',$data);
	}

//Koding P2
	public function approval()
	{
		$this->load->model('Ref_kursus_model');
		$this->load->model('Ref_intake_model');
		
		$this->mPageTitle = "Pengesahan Pengurus";
		$this->load->model('Kurikulum_model');
		$idUser = $this->ion_auth->user()->row()->id;
		$this->mViewData['user2'] = $this->Kurikulum_model->get_user($idUser)->result();
		#$this->mViewData['user3'] = $this->Kurikulum_model->get_user2($idUser)->result();
		$this->mViewData['user3'] = $this->Ref_kursus_model->get_by_user($idUser);;
		#$this->mViewData['user4'] = $this->Kurikulum_model->get_user3($idUser)->result();
		$this->mViewData['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$this->mViewData['user4'] = $this->Ref_intake_model->get_by_user($idUser);
		$this->render('gspel_kurikulum/p2/approval');
	}

	public function approval2()
	{
		$this->mPageTitle = "Pengesahan Pengurus";
		$this->load->model('Kurikulum_model');
		$this->load->model('Ref_kursus_model');
		$this->load->model('Ref_intake_model');
		$idUser = $this->ion_auth->user()->row()->id;

		// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		// 	$giatmara = $this->input->post('giatmara');
		// 	$kursus = $this->input->post('kursus');
		// 	$jeniskursus = $this->input->post('jeniskursus');
		// 	$intake = $this->input->post('intake');
		// } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
		// 	$giatmara = $this->uri->segment(4);
		// 	$kursus = $this->uri->segment(5);
		// 	$jeniskursus  = $this->uri->segment(6);
		// 	$intake  = $this->uri->segment(7);
		// }

		$id = $this->uri->segment(4);
		$id2 = urldecode($this->uri->segment(5));
		$id3 = urldecode($this->uri->segment(6));
		$id4 = urldecode($this->uri->segment(7));


		$giatmara = $this->input->post('giatmara');
		$kursus = $this->input->post('kursus');
		$jeniskursus = $this->input->post('jeniskursus');
		$intake = $this->input->post('intake');

		$data["giatmara"] = $giatmara;
		$data['kursus'] = $kursus;
		$data["jeniskursus"] = $jeniskursus;
		$data["intake"] = $intake;

		$data['user2'] = $this->Kurikulum_model->get_user($idUser)->result();
		#$data['user3a'] = $this->Kurikulum_model->get_user2a($idUser,$kursus)->result();
		$data['user3b'] = $this->Kurikulum_model->get_user2b($idUser ,$kursus )->result();
		$data['user4'] = $this->Kurikulum_model->get_user3($idUser)->result();
		#$data['user4a'] = $this->Kurikulum_model->get_user3a($idUser,$intake)->result();
		$data['user4b'] = $this->Kurikulum_model->get_user3b($idUser,$intake)->result();
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;

		$data['user3a'] = $this->Ref_kursus_model->get_by_user($idUser);;
		$data['user4a'] = $this->Ref_intake_model->get_by_user($idUser);
		
		if ($id=='') {
		$giatmara = $this->input->post('giatmara');
		$kursus = $this->input->post('kursus');
		$jeniskursus = $this->input->post('jeniskursus');
		$intake = $this->input->post('intake');
		$data["jeniskursus"] = $jeniskursus;
		$data["kursus"] = $kursus;
		$data["giatmara"] = $giatmara;
		$data["intake"] = $intake;
		//$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$data['modul'] = $this->Kurikulum_model->get_modul($giatmara,$kursus,$jeniskursus,$intake)->result();
		
		} else {
			if ($id3=="semua") {
				$semua ="";
				$id = $this->uri->segment(4);
				$id2 = urldecode($this->uri->segment(5));
				$id3 = urldecode($this->uri->segment(6));
				$id4 = urldecode($this->uri->segment(7));

				$data["jeniskursus"] = $semua;
				$data["kursus"] = $id;
				$data["giatmara"] = $id2;
				$data["intake"] = $id4;
				
				$data['modul'] = $this->Kurikulum_model->get_modul($id2,$id,$semua,$id4)->result();
				 
			} else {
				$id = $this->uri->segment(4);
				$id2 = urldecode($this->uri->segment(5));
				$id3 = urldecode($this->uri->segment(6));
				$id4 = urldecode($this->uri->segment(7));

				$data["jeniskursus"] = $id3;
				$data["kursus"] = $id;
				$data["giatmara"] = $id2;
				$data["intake"] = $id4;
			
				$data['modul'] = $this->Kurikulum_model->get_modul($id2,$id,$id3,$id4)->result();
				
			}
		}
		
		$this->load->view('gspel_kurikulum/p2/approval2',$data);
	}

	public function approval3()
	{
		$this->mPageTitle = "Pengesahan Pengurus";
		$this->load->model('Kurikulum_model');
		$id = $this->uri->segment(4);
		$id2 = urldecode($this->uri->segment(5));
		$id3 = urldecode($this->uri->segment(6));
		$id4 = urldecode($this->uri->segment(7));
		$id5 = urldecode($this->uri->segment(8));

		//kembali
		$id6 = urldecode($this->uri->segment(9));
		$id7 = urldecode($this->uri->segment(10));
		$id8 = urldecode($this->uri->segment(11));
		$id9 = urldecode($this->uri->segment(12));
		$id10 = urldecode($this->uri->segment(13));

		
		if ($id3=='Q') {
		if ($id10=='') {
			$data["jeniskursus"] = "semua";
		} else {
			$data["jeniskursus"] = $id10;
		}
		$data['kursus'] = $id8;
		$data["giatmara"] = $id7;
		$data["intake"] = $id9;

		} else {

		if ($id9=='') {
			$data["jeniskursus"] = "semua";
		} else {
			$data["jeniskursus"] = $id9;
		}
		$data['kursus'] = $id7;
		$data["giatmara"] = $id6;
		$data["intake"] = $id8;
		}
		
		
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$data["modul"]= $this->Kurikulum_model->get_modul2($id2,$id,$id4,$id9,$id8)->result();
		$data["moduldetail"]= $this->Kurikulum_model->get_modul_detail($id,$id2,$id3,$id4,$id9,$id8)->result();
		// $data["modul"]= $this->Kurikulum_model->get_modul2($id2,$id,$id4)->result();
		// $data["moduldetail"]= $this->Kurikulum_model->get_modul_detail($id,$id2,$id3,$id4,$id9)->result();
		//$data["moduldetail"]= $this->Kurikulum_model->get_modul_detail($id,$id2,$id3,$id4)->result();
		$this->load->view('gspel_kurikulum/p2/approval3',$data);
	}

	public function approval4()
	{
		$this->load->model('Kurikulum_model');
		$this->mPageTitle = "Pengesahan Pengurus";
		$this->load->model('Kurikulum_model');
		$id = $this->uri->segment(4);
		$id2 = urldecode($this->uri->segment(5));
		$id3 = urldecode($this->uri->segment(6));
		$id4 = urldecode($this->uri->segment(7));
		$id5 = urldecode($this->uri->segment(9));
		$id6 = urldecode($this->uri->segment(8));

		//kembali
		$id7 = urldecode($this->uri->segment(10));
		$id8 = urldecode($this->uri->segment(11));
		$id9 = urldecode($this->uri->segment(12));
		$id10 = urldecode($this->uri->segment(13));
		// 
		
		if ($id3=='Q') {
		if ($id10=='') {
			$data["jeniskursus"] = "semua";
		} else {
			$data["jeniskursus"] = $id10;
		}
		$data['kursus'] = $id8;
		$data["giatmara"] = $id7;
		$data["intake"] = $id9;

		} else {

		if ($id10=='') {
			$data["jeniskursus"] = "semua";
		} else {
			$data["jeniskursus"] = $id9;
		}
		$data['kursus'] = $id8;
		$data["giatmara"] = $id7;
		$data["intake"] = $id10;
		}

		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$data['idUser2'] = $this->ion_auth->user()->row()->username;
		//$data["modul"]= $this->Kurikulum_model->get_modul2($id2,$id,$id4)->result();
		// $data["moduldetail"]= $this->Kurikulum_model->get_modul_detail2($id,$id2,$id4,$id5)->result();

		// if ($id10 == "LPP04" or $id10 == "LPP09" ) {
		// 	//echo "LPP09";
		
		// $data["moduldetail"]= $this->Kurikulum_model->get_modul_detail2($id,$id2,$id4,$id6,$id10)->result();
		// } else {
			//echo "L";
		
		// $data["moduldetail"]= $this->Kurikulum_model->get_modul_detail2($id,$id2,$id4,$id6,$id9)->result();
		// }


		//$data["modul"]= $this->Kurikulum_model->get_modul2($id2,$id,$id4,$id9)->result();
		//$data["moduldetail"]= $this->Kurikulum_model->get_modul_detail($id,$id2,$id3,$id4,$id9)->result();
		if ($id10 == "LPP04" or $id10 == "LPP09") {
		$data["modul"]= $this->Kurikulum_model->get_modul2($id2,$id,$id4,$id10,$id9)->result();
		$data["moduldetail"]= $this->Kurikulum_model->get_modul_detail2($id,$id2,$id4,$id5,$id10,$id9)->result();
		} else {
		$data["modul"]= $this->Kurikulum_model->get_modul2($id2,$id,$id4,$id9,$id10)->result();
		$data["moduldetail"]= $this->Kurikulum_model->get_modul_detail2($id,$id2,$id4,$id5,$id9,$id10)->result();
		}
		$this->load->view('gspel_kurikulum/p2/approval4',$data);
	}

		public function approval5()
	{
		$this->load->model('Kurikulum_model');
		$this->mPageTitle = "Pengesahan Pengurus";
		$this->load->model('Kurikulum_model');
		$id = $this->uri->segment(4);
		$id2 = urldecode($this->uri->segment(5));
		$id3 = urldecode($this->uri->segment(6));
		$id4 = urldecode($this->uri->segment(7));
		$id5 = urldecode($this->uri->segment(8));

		$id6 = urldecode($this->uri->segment(9));
		$id7 = urldecode($this->uri->segment(10));
		$id8 = urldecode($this->uri->segment(11));
		$id9 = urldecode($this->uri->segment(12));
		
		// if ($id3=='Q') {
		// if ($id10=='') {
		// 	$data["jeniskursus"] = "semua";
		// } else {
		// 	$data["jeniskursus"] = $id10;
		// }
		// $data['kursus'] = $id8;
		// $data["giatmara"] = $id7;
		// $data["intake"] = $id9;

		// } else {

		// if ($id8=='') {
		// 	$data["jeniskursus"] = "semua";
		// } else {
		// 	$data["jeniskursus"] = $id8;
		// }
		// $data['kursus'] = $id6;
		// $data["giatmara"] = $id7;
		// $data["intake"] = $id5;
		// }

		// $data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		// $data["modul"]= $this->Kurikulum_model->get_p1s4_header($id4)->result();
		// $data["moduldetail"]= $this->Kurikulum_model->get_p1s4_detail($id4,$id8)->result();
		$data['kursus'] = $id6;
		$data["giatmara"] = $id5;
		$data["intake"] = $id7;
		$data["jeniskursus"] = $id8;

		$data["modul"]= $this->Kurikulum_model->get_p1s4_header($id4, $id8)->result();
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$data["moduldetail"]= $this->Kurikulum_model->get_p1s4_detail($id4,$id8)->result();
		$this->load->view('gspel_kurikulum/p2/approval5',$data);
	}

	public function approval6()
	{
		$this->load->model('Kurikulum_model');
		$this->mPageTitle = "Pengesahan Pengurus";
		$this->load->model('Kurikulum_model');
		$id = $this->uri->segment(4);
		$id2 = urldecode($this->uri->segment(5));
		$id3 = urldecode($this->uri->segment(6));
		$id4 = urldecode($this->uri->segment(7));
		$id5 = urldecode($this->uri->segment(8));
		$id6 = urldecode($this->uri->segment(9));

		//kembali
		$id7 = urldecode($this->uri->segment(10));
		$id8 = urldecode($this->uri->segment(11));
		$id9 = urldecode($this->uri->segment(12));
		$id10 = urldecode($this->uri->segment(13));

		if ($id3=='Q') {

		if ($id10=='') {
			$data["jeniskursus"] = "semua";
		} else {
			$data["jeniskursus"] = $id10;
		}
		$data['kursus'] = $id8;
		$data["giatmara"] = $id7;
		$data["intake"] = $id9;

		} else {

		if ($id10=='') {
			$data["jeniskursus"] = "semua";
		} else {
			$data["jeniskursus"] = $id9;
		}

		$data['kursus'] = $id8;
		$data["giatmara"] = $id7;
		$data["intake"] = $id10;
		}
		
		// $data["modul"]= $this->Kurikulum_model->get_p1s4_header($id5)->result();
		// //$data["moduldetail"]= $this->Kurikulum_model->get_p1s4_detail2($id5,$id6)->result();
		// if ($id3=='Q') {
		// 		$data["moduldetail"]= $this->Kurikulum_model->get_p1s4_detail2($id5,$id6,$id10)->result();
		// 	}else{
		// 		$data["moduldetail"]= $this->Kurikulum_model->get_p1s4_detail2($id5,$id6,$id9)->result();
		// 	}
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;

		if ($id10 == "LPP04" or $id10 == "LPP09") {
				$data["modul"]= $this->Kurikulum_model->get_p1s4_header($id5,$id10)->result();
				$data["moduldetail"]= $this->Kurikulum_model->get_p1s4_detail2($id5,$id6,$id10)->result();
			}else{
				$data["modul"]= $this->Kurikulum_model->get_p1s4_header($id5,$id9)->result();
				$data["moduldetail"]= $this->Kurikulum_model->get_p1s4_detail2($id5,$id6,$id9)->result();
			}

		$this->load->view('gspel_kurikulum/p2/approval6',$data);
	}

	public function approval7()
	{
		$this->mPageTitle = "Pengesahan Pengurus";
		$this->load->model('Kurikulum_model');
		$id = $this->uri->segment(4);
		$id2 = urldecode($this->uri->segment(5));
		$id3 = urldecode($this->uri->segment(6));
		$id4 = urldecode($this->uri->segment(7));
		$id5 = urldecode($this->uri->segment(8));
		$id6 = urldecode($this->uri->segment(9));
		$id7 = urldecode($this->uri->segment(10));

		$data["namapenuh"] = $id;
		$data["nomykad"] = $id2;
		$data["nopelatih"] = $id3;
		$data["gcpa"] = $id4;
		$data["kehadiran"] = $id5;
		$data["namakursus"] = $id6;
		$data["idSeq"] = $id."/".$id2;
		$data["idSeq2"]=$id."/".$id2."/".$id3."/".$id4."/".$id5."/".$id6;
		// if ($id3=='Q') {

		if ($id6=='') {
			$data["jeniskursus"] = "semua";
		} else {
			$data["jeniskursus"] = $id6;
		}

		$data['kursus'] = $id4;
		$data["giatmara"] = $id3;
		$data["intake"] = $id5;


		$data["moduldetail"]= $this->Kurikulum_model->get_p2s6($id,$id6)->result();
		$data["namakursus"]= $this->Kurikulum_model->get_p2s6_namakursus($id,$id6)->result();
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;

		if ($id2 =="b") {
			$this->load->view('gspel_kurikulum/p2/approval7',$data);
		} else {
			$this->load->view('gspel_kurikulum/p2/approval7a',$data);
		}

	}

	public function sah1(){
		$this->load->model('Kurikulum_model','km');
		$no = $this->input->post('no');
		$idSeq2 = $this->input->post('idSeq');
		$date = date('Y-m-d H:i:s');
		$date2 = date("d/m/Y", strtotime($date));
		$idpelatih =$_POST['idpelatih'];
		$idsah =$_POST['idsah'];
		$pilih = $_POST['pilih'];
		$saegm =$_POST['saegm'];
		$spgm =$_POST['spgm'];
		$skgm =$_POST['skgm'];
		$sklgm =$_POST['sklgm'];
// 		$smgm =$_POST['smgm'];

// //var_dump($nilaisijil);die();
		if ($_POST['action'] == 'simpan') {

			if (isset($_POST['pilih'])) {
				foreach ($pilih as $idx => $value) {

// 			if ($sijil[$idx] == 'sklgm') {
// 					$nilaisijil[$idx] = 'sklgm';
// 				}else if ($sijil[$idx] == 'spgm') {
// 				$nilaisijil[$idx] = 'spgm';
// 				}else if ($sijil[$idx] == 'skgm') {
// 				$nilaisijil[$idx] = 'skgm';
// 		 	}else if ($sijil[$idx] == 'saegm')  {
// 			$nilaisijil[$idx] = 'saegm';
// 				} else{
// 				$nilaisijil = '';
// 				}
// //var_dump($nilaisijil);die();
					 $data = array(
					 'pengurus' => 4,
					 'pengurus_sah' => $date,
					 'id_pelatih' =>$idpelatih[$idx],
					 'saegm' =>$saegm[$idx],
					'spgm' =>$spgm[$idx],
					'sklgm' =>$sklgm[$idx],
					'skgm' =>$skgm[$idx],
					 );

					  $data2 = array(
					  'status_isi_markah' => 4
					 );

					 if ($idsah!="") {
					  $this->db->where('id',$idsah[$idx]);
					  $this->db->update('markah_modul_status',$data);
					//   echo $this->db->last_query();die();
					 $this->db->where('id_pelatih',$idpelatih[$idx]);
					 $this->db->update('markah_modul',$data2);

					 $this->db->where('id_pelatih',$idpelatih[$idx]);
					 $this->db->update('markah_modul_2',$data2);

					 } else {
					 $this->db->insert('markah_modul_status',$data);
					// echo $this->db->last_query();die();
					 $this->db->where('id_pelatih',$idpelatih[$idx]);
					 $this->db->update('markah_modul',$data2);


					$this->db->where('id_pelatih',$idpelatih[$idx]);
					 $this->db->update('markah_modul_2',$data2);

					 }

	 			}

	 				redirect('admin/Gspel_kurikulum/approval7/'.$idSeq2);

			}
		}

	}

	public function approval8()
	{
		$this->mPageTitle = "Pengesahan Pengurus";
		$this->load->model('Kurikulum_model');
		$id = urldecode($this->uri->segment(4));
		$id2 = urldecode($this->uri->segment(5));
		$id3 = urldecode($this->uri->segment(6));
		$id4 = urldecode($this->uri->segment(7));
		$id5 = urldecode($this->uri->segment(8));
		$id6 = urldecode($this->uri->segment(10));
		$id7 = urldecode($this->uri->segment(9));

		//kembali ke halaman 
		$id8 = urldecode($this->uri->segment(11));
		$id9 = urldecode($this->uri->segment(12));
		$id10 = urldecode($this->uri->segment(13));
		$id11 = urldecode($this->uri->segment(14));
		$id12 = urldecode($this->uri->segment(15));
		$id13 = urldecode($this->uri->segment(16));

		$data["namapenuh"] = $id;
		$data["nomykad"] = $id2;
		$data["nopelatih"] = $id3;
		$data["gcpa"] = $id4;
		$data["kehadiran"] = $id5;
		$data["namakursus"] = $id7;
		$data["idSeq3"] = $id."/".$id2."/".$id3."/".$id4."/".$id5."/".$id7."/".$id6."/".$id8."/".$id9."/".$id10."/".$id11."/".$id12."/".$id13;
		$data["idSeq"] = $id."/".$id2."/".$id3."/".$id4."/".$id5."/".$id7."/".$id6;
		$data["idSeq2"] = $id8."/".$id9."/".$id10."/".$id11."/".$id12."/".$id13;
		$data["baga"]= $this->Kurikulum_model->get_p2s7_baga($id6)->result();
		$data["bagb"]= $this->Kurikulum_model->get_p2s7_bagb($id6)->result();
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$data["modul"]= $this->Kurikulum_model->get_modul3($id10,$id11)->result();
		$this->load->view('gspel_kurikulum/p2/approval8',$data);
	}

	public function kembali1(){
		$this->load->model('Kurikulum_model','km');
		$idSeq = $this->input->post('idSeq');
		$idSeq3 = $this->input->post('idSeq3');
		if ($_POST['action'] == 'simpan') {

			if (isset($_POST['pilih'])) {
			$pilih = $_POST['pilih'];
			$catatan = $_POST['catatan'];
			$idpelatih2 =$_POST['idpelatih'];
			$idmodul =$_POST['id_modul'];

			foreach ($pilih as $r => $value) {

					  $data = array(
					  'catatan_pengurus' => $catatan[$r],
					  'status_isi_markah' => 3
					 );

					  $data3 = array(
					  'pengurus' => NULL,
					  'pengurus_sah' => NULL,
					  'pgn' => NULL,
					  'pgn_sah' => NULL,
					  'ppkl' => NULL,
					  'ppkl_sah' => NULL,
					  'saegm' => NULL,
					  'spgm' => NULL,
					  'smgm' => NULL,
					  'skgm' => NULL,
					  'sklgm' => NULL
					  
					 );

					 $this->db->where('id_modul',$idmodul[$r]);
					 $this->db->where('id_pelatih',$idpelatih2);
					 // echo $this->db->set($data)->get_compiled_update("markah_modul");
					 $this->db->update('markah_modul',$data);



					  $this->db->where('id_pelatih',$idpelatih2);
					 $this->db->update('markah_modul_status',$data3);
					 // echo $this->db->last_query();exit();

	 			}
	 			// exit;
	 				redirect('admin/Gspel_kurikulum/approval8/'.$idSeq3);

			}

				if (isset($_POST['pilih2'])) {
				$idpelatih =$_POST['id_pelatih'];
				$pilih2 = $_POST['pilih2'];
				$catatan2 = $_POST['catatan2'];

				 $data2 = array(
					'catatan_pengurus' => $catatan2,
					 'status_isi_markah' => 3
				 );


					  $data4 = array(
					  'pengurus' => NULL,
					  'pengurus_sah' => NULL,
					  'pgn' => NULL,
					  'pgn_sah' => NULL,
					  'ppkl' => NULL,
					  'ppkl_sah' => NULL,
					  'saegm' => NULL,
					  'spgm' => NULL,
					  'smgm' => NULL,
					  'skgm' => NULL,
					  'sklgm' => NULL
					  
					 );


				$this->db->where('id_pelatih',$idpelatih);
				$this->db->update('markah_modul_2',$data2);

				$this->db->where('id_pelatih',$idpelatih);
				 $this->db->update('markah_modul_status',$data4);
	 			redirect('admin/Gspel_kurikulum/approval8/'.$idSeq3);

			}

			}

		}

	#}


	public function borang2()
	{
		$this->mPageTitle = "Pengesahan Pengurus";
		$this->load->model('Kurikulum_model');
		$id = $this->uri->segment(4);
		$id2 = urldecode($this->uri->segment(5));
		// $id3 = urldecode($this->uri->segment(6));
		// $id4 = urldecode($this->uri->segment(7));
		// $id5 = urldecode($this->uri->segment(8));
		// $id6 = urldecode($this->uri->segment(10));
		// $id7 = urldecode($this->uri->segment(9));
		// $idmodul =  $this->input->post('list');
		// $data["namapenuh"] = $id;
		// $data["nomykad"] = $id2;
		// $data["nopelatih"] = $id3;
		// $data["gcpa"] = $id4;
		// $data["kehadiran"] = $id5;
		$data["giatmara"] = $id2;
		$data["idSeq"] = $id;
		$data["modul"]= $this->Kurikulum_model->get_list_modul($id)->result();
		$data["moduldetail"]= $this->Kurikulum_model->get_list_modul2($idmodul)->result();
		$this->load->view('gspel_kurikulum/p2/borang2',$data);
	}

	public function borang2a()
	{
		$this->mPageTitle = "Pengesahan Pengurus";
		$this->load->model('Kurikulum_model');
		$id = $this->uri->segment(4);
		$id2 = urldecode($this->uri->segment(5));
		$id3 = urldecode($this->uri->segment(6));
		$id4 = urldecode($this->uri->segment(7));
		$id5 = urldecode($this->uri->segment(8));
		$id6 = urldecode($this->uri->segment(10));
		$id7 = urldecode($this->uri->segment(9));
		$idmodul =  $this->input->post('list');
		$coba =  $this->input->post('coba');
		$idUser = $this->ion_auth->user()->row()->id;
		$idlist =  $this->input->post('idSeq');
		$idgiatmara =  $this->input->post('giatmara');

		//var_dump($idgiatmara);die();
		$data["namapenuh"] = $id;
		$data["nomykad"] = $id2;
		$data["nopelatih"] = $id3;
		$data["gcpa"] = $id4;
		$data["kehadiran"] = $id5;

		$data["namakursus"] = $id6;
		$data["idSeq"] = $idlist;
		$data["giatmara"] = $idgiatmara;

		$data["modul"]= $this->Kurikulum_model->get_list_modul($idlist)->result();
		$data["modul2"] = $this->Kurikulum_model->get_modul_nilai($idlist)->result();
		$data["modulheader"]= $this->Kurikulum_model->get_borang2_header($idmodul)->result();
		$data["moduldetail"]= $this->Kurikulum_model->get_list_modul3($idmodul,$idgiatmara)->result();
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$data["trainer1"]= $this->Kurikulum_model->get_borang_trainer1($idgiatmara)->result();

		//$t = $this->Kurikulum_model->get_borang_trainer1($idlist)->result();
		//var_dump($t);die();
		$data["trainer2"]= $this->Kurikulum_model->get_borang_trainer2($idgiatmara)->result();
		$data["pengurus"]= $this->Kurikulum_model->get_borang_pengurus($idgiatmara)->result();
		$this->load->view('gspel_kurikulum/p2/borang2a',$data);
	}


	public function borang3()
	{
		$this->mPageTitle = "Pengesahan Pengurus";
		$this->load->model('Kurikulum_model');
		$id = $this->uri->segment(4);
		$id2 = urldecode($this->uri->segment(5));
		$id3 = urldecode($this->uri->segment(6));
		$id4 = urldecode($this->uri->segment(7));
		$id5 = urldecode($this->uri->segment(8));
		$id6 = urldecode($this->uri->segment(10));
		$id7 = urldecode($this->uri->segment(9));
		$data["idSeq"] = $id."/".$id2."/".$id3."/".$id4;
		$data["trainer1"]= $this->Kurikulum_model->get_borang_trainer1($id2)->result();
		$data["trainer2"]= $this->Kurikulum_model->get_borang_trainer2($id2)->result();
		$data["pengurus"]= $this->Kurikulum_model->get_borang_pengurus($id2)->result();


		//var_dump($id5);die();
		//$t = $this->Kurikulum_model->get_borang_trainer1($id5)->result();
		//var_dump($t);die();

		$data["modul"] = $this->Kurikulum_model->get_modul_nilai($id5)->result();
		$data["modulheader"]= $this->Kurikulum_model->get_borang03_header($id3,$id2,$id5)->result();
		$data["moduldetail"]= $this->Kurikulum_model->get_borang03_detail($id4,$id3,$id2,$id)->result();
		
		$this->load->view('gspel_kurikulum/p2/borang3',$data);
	}


	public function borang4()
	{
		$this->mPageTitle = "Pengesahan Pengurus";
		$this->load->model('Kurikulum_model');
		$idUser = $this->ion_auth->user()->row()->id;
		$id = $this->uri->segment(4);
		$id2 = urldecode($this->uri->segment(5));
		$id3 = urldecode($this->uri->segment(6));
		$id4 = urldecode($this->uri->segment(7));
		$id5 = urldecode($this->uri->segment(8));
		$id6 = urldecode($this->uri->segment(10));
		$id7 = urldecode($this->uri->segment(9));
		$data["idSeq"] = $id."/".$id2."/".$id3."/".$id4;
		$data["trainer1"]= $this->Kurikulum_model->get_borang_trainer1($id3)->result();
		$data["trainer2"]= $this->Kurikulum_model->get_borang_trainer2($id3)->result();
		$data["pengurus"]= $this->Kurikulum_model->get_borang_pengurus($id3)->result();
		$data["modulheader"]= $this->Kurikulum_model->get_borang04_header($id,$id2,$id3)->result();
		$data["datanama"]= $this->Kurikulum_model->get_borang_pengurus($idUser)->result();
		$data["moduldetail"]= $this->Kurikulum_model->get_borang04_detail($id,$id2,$id3)->result();
		$this->load->view('gspel_kurikulum/p2/borang4',$data);
	}


	//Koding P3
	public function pbn()
		{
			$this->mPageTitle = "Pengesahan PGN";
			$this->load->model('Kurikulum_model');
			$idUser = $this->ion_auth->user()->row()->id;
			$this->mViewData['user2'] = $this->Kurikulum_model->get_user($idUser)->result();
			$this->mViewData['user3'] = $this->Kurikulum_model->get_user2($idUser)->result();
			$this->mViewData['user4'] = $this->Kurikulum_model->get_user3($idUser)->result();
			$this->mViewData['user6'] = $this->Kurikulum_model->get_user6($idUser)->result();
			$this->render('gspel_kurikulum/p3/staf');
		}

		public function pbn2()
		{

		$this->mPageTitle = "Pengesahan PGN";
		$this->load->model('Kurikulum_model');
		$idUser = $this->ion_auth->user()->row()->id;

		$id = $this->uri->segment(4);
		$id2 = urldecode($this->uri->segment(5));

		$giatmara = $this->input->post('giatmara');
		$kursus = $this->input->post('kursus');
		$jeniskursus = $this->input->post('jeniskursus');
		$intake = $this->input->post('intake');

		$data["giatmara"] = $giatmara;
		$data['kursus'] = $kursus;
		$data["jeniskursus"] = $jeniskursus;
		$data["intake"] = $intake;

//var_dump($intake);die();
		$data['user2'] = $this->Kurikulum_model->get_user($idUser)->result();
		$data['user3b'] = $this->Kurikulum_model->get_user2b($idUser ,$kursus )->result();
		$data['user4'] = $this->Kurikulum_model->get_user3($idUser)->result();
		$data['user4a'] = $this->Kurikulum_model->get_intake2($intake)->result();
		$data['user4b'] = $this->Kurikulum_model->get_user3b($idUser,$intake)->result();
		$data['user3a'] = $this->Kurikulum_model->get_kursus2($kursus)->result();
		
		$data['user6'] = $this->Kurikulum_model->get_user6($idUser)->result();
		$data['user6a'] = $this->Kurikulum_model->get_giatmara2($giatmara)->result();

		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		if ($id=='') {
		$giatmara = $this->input->post('giatmara');
		$kursus = $this->input->post('kursus');
		$jeniskursus = $this->input->post('jeniskursus');
		$intake = $this->input->post('intake');
		$data["jeniskursus"] = $jeniskursus;
		$data["kursus"] = $kursus;
		$data["giatmara"] = $giatmara;
		$data["intake"] = $intake;
		$data['modul'] = $this->Kurikulum_model->get_modul($giatmara,$kursus,$jeniskursus,$intake)->result();
				
		} else {
			if ($id3=="semua") {
				$semua ="";
				$id = $this->uri->segment(4);
				$id2 = urldecode($this->uri->segment(5));
				$id3 = urldecode($this->uri->segment(6));
				$id4 = urldecode($this->uri->segment(7));

				$data["jeniskursus"] = $semua;
				$data["kursus"] = $id;
				$data["giatmara"] = $id2;
				$data["intake"] = $id4;
				
				$data['modul'] = $this->Kurikulum_model->get_modul($id2,$id,$semua,$id4)->result();
				 
			} else {
				$id = $this->uri->segment(4);
				$id2 = urldecode($this->uri->segment(5));
				$id3 = urldecode($this->uri->segment(6));
				$id4 = urldecode($this->uri->segment(7));

				$data["jeniskursus"] = $id3;
				$data["kursus"] = $id;
				$data["giatmara"] = $id2;
				$data["intake"] = $id4;
			
				$data['modul'] = $this->Kurikulum_model->get_modul($id2,$id,$id3,$id4)->result();
				
			}
		}
		

		$this->load->view('gspel_kurikulum/p3/staf2',$data);
		}


		public function pbn3()
		{
		$this->mPageTitle = "Pengesahan PGN";
		$this->load->model('Kurikulum_model');
		$id = $this->uri->segment(4);
		$id2 = urldecode($this->uri->segment(5));
		$id3 = urldecode($this->uri->segment(6));
		$id4 = urldecode($this->uri->segment(7));
		$id5 = urldecode($this->uri->segment(8));
		//kembali
		$id6 = urldecode($this->uri->segment(9));
		$id7 = urldecode($this->uri->segment(10));
		$id8 = urldecode($this->uri->segment(11));
		$id9 = urldecode($this->uri->segment(12));
		$id10 = urldecode($this->uri->segment(13));
		
		if ($id3=='Q') {
		if ($id10=='') {
			$data["jeniskursus"] = "semua";
		} else {
			$data["jeniskursus"] = $id10;
		}
		$data['kursus'] = $id8;
		$data["giatmara"] = $id7;
		$data["intake"] = $id9;

		} else {

		if ($id9=='') {
			$data["jeniskursus"] = "semua";
		} else {
			$data["jeniskursus"] = $id9;
		}
		$data['kursus'] = $id7;
		$data["giatmara"] = $id6;
		$data["intake"] = $id8;
		}

		// $data["modul"]=  $this->Kurikulum_model->get_modul2($id2,$id,$id4)->result();
		// //$data["moduldetail"]= $this->Kurikulum_model->get_modul_detail($id,$id2,$id3,$id4)->result();
		// $data["moduldetail"]= $this->Kurikulum_model->get_modul_detail($id,$id2,$id3,$id4,$id9)->result();
		// $data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;

		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$data["modul"]= $this->Kurikulum_model->get_modul2($id2,$id,$id4,$id9,$id8)->result();
		$data["moduldetail"]= $this->Kurikulum_model->get_modul_detail($id,$id2,$id3,$id4,$id9,$id8)->result();

		$this->load->view('gspel_kurikulum/p3/staf3',$data);
		}

		public function pbn4()
		{
			$this->mPageTitle = "Pengesahan PGN";
			$this->load->model('Kurikulum_model');
				$id = $this->uri->segment(4);
				$id2 = urldecode($this->uri->segment(5));
				$id3 = urldecode($this->uri->segment(6));
				$id4 = urldecode($this->uri->segment(7));
				$id5 = urldecode($this->uri->segment(9));
				$id6 = urldecode($this->uri->segment(8));
				
				$data['idUser2'] = $this->ion_auth->user()->row()->username;
				//kembali
				$id7 = urldecode($this->uri->segment(10));
				$id8 = urldecode($this->uri->segment(11));
				$id9 = urldecode($this->uri->segment(12));
				$id10 = urldecode($this->uri->segment(13));
				// 
				
				if ($id3=='Q') {
				if ($id10=='') {
					$data["jeniskursus"] = "semua";
				} else {
					$data["jeniskursus"] = $id10;
				}
				$data['kursus'] = $id8;
				$data["giatmara"] = $id7;
				$data["intake"] = $id9;

				} else {

				if ($id10=='') {
					$data["jeniskursus"] = "semua";
				} else {
					$data["jeniskursus"] = $id9;
				}
				$data['kursus'] = $id8;
				$data["giatmara"] = $id7;
				$data["intake"] = $id10;
				}

			$data['idUser2'] = $this->ion_auth->user()->row()->username;
			//$data["modul"]=  $this->Kurikulum_model->get_modul2($id2,$id,$id4)->result();
			//$data["moduldetail"]= $this->Kurikulum_model->get_modul_detail2($id,$id2,$id4,$id5)->result();
			// $data["moduldetail"]= $this->Kurikulum_model->get_modul_detail2($id,$id2,$id4,$id5)->result();
		if ($id3=='Q') {
		$data["modul"]= $this->Kurikulum_model->get_modul2($id2,$id,$id4,$id10,$id9)->result();
		$data["moduldetail"]= $this->Kurikulum_model->get_modul_detail2($id,$id2,$id4,$id5,$id10,$id9)->result();
		} else {
		$data["modul"]= $this->Kurikulum_model->get_modul2($id2,$id,$id4,$id9,$id10)->result();
		$data["moduldetail"]= $this->Kurikulum_model->get_modul_detail2($id,$id2,$id4,$id5,$id9,$id10)->result();
		}
			$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;

			$this->load->view('gspel_kurikulum/p3/staf4',$data);
		}

		public function pbn5()
		{
			$this->mPageTitle = "Pengesahan PGN";
			$this->load->model('user_model', 'users');
			$this->load->model('Kurikulum_model');
			$id = $this->uri->segment(4);
				$id2 = urldecode($this->uri->segment(5));
				$id3 = urldecode($this->uri->segment(6));
				$id4 = urldecode($this->uri->segment(7));
				$id5 = urldecode($this->uri->segment(8));
			

		$id6 = urldecode($this->uri->segment(9));
		$id7 = urldecode($this->uri->segment(10));
		$id8 = urldecode($this->uri->segment(11));
		$id9 = urldecode($this->uri->segment(12));

		
		$data['kursus'] = $id6;
		$data["giatmara"] = $id5;
		$data["intake"] = $id7;
		$data["jeniskursus"] = $id8;

		
		// if ($id3=='Q') {
		// if ($id10=='') {
		// 	$data["jeniskursus"] = "semua";
		// } else {
		// 	$data["jeniskursus"] = $id10;
		// }
		// $data['kursus'] = $id9;
		// $data["giatmara"] = $id7;
		// $data["intake"] = $id8;

		// } else {

		// if ($id8=='') {
		// 	$data["jeniskursus"] = "semua";
		// } else {
		// 	$data["jeniskursus"] = $id8;
		// }
		// $data['kursus'] = $id5;
		// $data["giatmara"] = $id7;
		// $data["intake"] = $id6;
		// }

			
		$data["modul"]= $this->Kurikulum_model->get_p1s4_header($id4, $id8)->result();
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$data["moduldetail"]= $this->Kurikulum_model->get_p1s4_detail($id4,$id8)->result();

			$this->load->view('gspel_kurikulum/p3/staf5',$data);
		}

		public function pbn6()
		{
		$this->mPageTitle = "Pengesahan PGN";
		$this->load->model('Kurikulum_model');
		$id = $this->uri->segment(4);
			$id2 = urldecode($this->uri->segment(5));
			$id3 = urldecode($this->uri->segment(6));
			$id4 = urldecode($this->uri->segment(7));
			$id5 = urldecode($this->uri->segment(8));
			$id6 = urldecode($this->uri->segment(9));
//kembali
		$id7 = urldecode($this->uri->segment(10));
		$id8 = urldecode($this->uri->segment(11));
		$id9 = urldecode($this->uri->segment(12));
		$id10 = urldecode($this->uri->segment(13));

		if ($id3=='Q') {

		if ($id10=='') {
			$data["jeniskursus"] = "semua";
		} else {
			$data["jeniskursus"] = $id10;
		}
		$data['kursus'] = $id8;
		$data["giatmara"] = $id7;
		$data["intake"] = $id9;

		} else {

		if ($id10=='') {
			$data["jeniskursus"] = "semua";
		} else {
			$data["jeniskursus"] = $id9;
		}

		$data['kursus'] = $id8;
		$data["giatmara"] = $id7;
		$data["intake"] = $id10;
		}
		//$data["modul"]= $this->Kurikulum_model->get_p1s4_header($id5)->result();
		//$data["moduldetail"]= $this->Kurikulum_model->get_p1s4_detail2($id5,$id6)->result();
		if ($id10 == "LPP04" or $id10 == "LPP09") {
				$data["modul"]= $this->Kurikulum_model->get_p1s4_header($id5,$id10)->result();
				$data["moduldetail"]= $this->Kurikulum_model->get_p1s4_detail2($id5,$id6,$id10)->result();
			}else{
				$data["modul"]= $this->Kurikulum_model->get_p1s4_header($id5,$id9)->result();
				$data["moduldetail"]= $this->Kurikulum_model->get_p1s4_detail2($id5,$id6,$id9)->result();
			}

		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;

			$this->load->view('gspel_kurikulum/p3/staf6',$data);
		}

	public function pbn7()
	{
		$this->mPageTitle = "Pengesahan PGN";
		$this->load->model('Kurikulum_model');
		$id = $this->uri->segment(4);
		$id2 = urldecode($this->uri->segment(5));
		$id3 = urldecode($this->uri->segment(6));
		$id4 = urldecode($this->uri->segment(7));
		$id5 = urldecode($this->uri->segment(8));
		$id6 = urldecode($this->uri->segment(9));
		$id7 = urldecode($this->uri->segment(10));

		$data["namapenuh"] = $id;
		$data["nomykad"] = $id2;
		$data["nopelatih"] = $id3;
		$data["gcpa"] = $id4;
		$data["kehadiran"] = $id5;
		$data["namakursus"] = $id6;
		$data["idSeq"] = $id."/".$id2;
		$data["idSeq2"]=$id."/".$id2."/".$id3."/".$id4."/".$id5."/".$id6;
		// if ($id3=='Q') {

		//var_dump($id6);die();

		if ($id6=='') {
			$data["jeniskursus"] = "semua";
		} else {
			$data["jeniskursus"] = $id6;
		}

		$data['kursus'] = $id4;
		$data["giatmara"] = $id3;
		$data["intake"] = $id5;

		$data["moduldetail"]= $this->Kurikulum_model->get_p2s6($id,$id6)->result();
		$data["namakursus"]= $this->Kurikulum_model->get_p2s6_namakursus($id,$id6)->result();
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;


		if ($id2 =="b") {
			$this->load->view('gspel_kurikulum/p3/staf7',$data);
		} else {
			$this->load->view('gspel_kurikulum/p3/staf7a',$data);
		}

	}

	public function sah2(){
		$this->load->model('Kurikulum_model','km');
		$no = $this->input->post('no');
		$idSeq2 = $this->input->post('idSeq');
		$date = date('Y-m-d H:i:s');
		$date2 = date("d/m/Y", strtotime($date));
		$idpelatih =$_POST['idpelatih'];
		$idsah =$_POST['idsah'];
		$spgm =$_POST['spgm'];
		$skgm =$_POST['skgm'];
		$saegm =$_POST['saegm'];
		$smgm =$_POST['smgm'];
		$sklgm =$_POST['sklgm'];
		

		$pilih = $_POST['pilih'];
		$catatan = $_POST['catatan'];
		if ($_POST['action'] == 'simpan') {
//var_dump($isispgm);die();
			if (isset($_POST['pilih'])) {
				foreach ($pilih as $idx => $value) {

					 $data = array(
					 'pgn' => 6,
					 'pgn_sah' => $date,
					 'spgm' =>$spgm[$idx],
					 'sklgm' =>$sklgm[$idx],
					 'smgm' =>$smgm[$idx],
					 'skgm' =>$skgm[$idx],
					 'saegm' =>$saegm[$idx],
					 );
//var_dump($data);die();
					  $data2 = array(
					  'status_isi_markah' => 6,
					  'catatan_pgn' =>$catatan[$idx]
					 );

					 if ($idsah!="") {
					  $this->db->where('id',$idsah[$idx]);
					  $this->db->update('markah_modul_status',$data);

					 $this->db->where('id_pelatih',$idpelatih[$idx]);
					 $this->db->update('markah_modul',$data2);

					 $this->db->where('id_pelatih',$idpelatih[$idx]);
					 $this->db->update('markah_modul_2',$data2);

					 } else {
					 $this->db->insert('markah_modul_status',$data);

					 $this->db->where('id_pelatih',$idpelatih[$idx]);
					 $this->db->update('markah_modul',$data2);


					$this->db->where('id_pelatih',$idpelatih[$idx]);
					 $this->db->update('markah_modul_2',$data2);

					 }

	 			}

	 				redirect('admin/Gspel_kurikulum/pbn7/'.$idSeq2);

			}
		}

	}

public function pbn8()
	{
		$this->mPageTitle = "Pengesahan PGN";
		$this->load->model('Kurikulum_model');
		$id = $this->uri->segment(4);
		$id2 = urldecode($this->uri->segment(5));
		$id3 = urldecode($this->uri->segment(6));
		$id4 = urldecode($this->uri->segment(7));
		$id5 = urldecode($this->uri->segment(8));
		$id6 = urldecode($this->uri->segment(10));
		$id7 = urldecode($this->uri->segment(9));

		//kembali ke halaman 
		$id8 = urldecode($this->uri->segment(11));
		$id9 = urldecode($this->uri->segment(12));
		$id10 = urldecode($this->uri->segment(13));
		$id11 = urldecode($this->uri->segment(14));
		$id12 = urldecode($this->uri->segment(15));
		$id13 = urldecode($this->uri->segment(16));

		$data["namapenuh"] = $id;
		$data["nomykad"] = $id2;
		$data["nopelatih"] = $id3;
		$data["gcpa"] = $id4;
		$data["kehadiran"] = $id5;
		$data["namakursus"] = $id7;
		$data["idSeq3"] = $id."/".$id2."/".$id3."/".$id4."/".$id5."/".$id7."/".$id6."/".$id8."/".$id9."/".$id10."/".$id11."/".$id12."/".$id13;
		$data["idSeq"] = $id."/".$id2."/".$id3."/".$id4."/".$id5."/".$id7."/".$id6."/".$id8."/".$id9."/".$id10."/".$id11."/".$id12."/".$id13;
		$data["idSeq2"] = $id8."/".$id9."/".$id10."/".$id11."/".$id12."/".$id13;
		$data["baga"]= $this->Kurikulum_model->get_p2s7_baga($id6)->result();
		$data["bagb"]= $this->Kurikulum_model->get_p2s7_bagb($id6)->result();
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$data["modul"]= $this->Kurikulum_model->get_modul3($id10,$id11)->result();
		$this->load->view('gspel_kurikulum/p3/staf8',$data);
	}


	public function kembali2(){
		$this->load->model('Kurikulum_model','km');
		$idSeq = $this->input->post('idSeq');
		$idSeq3 = $this->input->post('idSeq3');
		if ($_POST['action'] == 'simpan') {

			if (isset($_POST['pilih'])) {
			$pilih = $_POST['pilih'];
			$catatan = $_POST['catatan'];
			$idpelatih2 =$_POST['idpelatih'];
			$idmodul =$_POST['id_modul'];

			foreach ($pilih as $r => $value) {

					  $data = array(
					  'catatan_pgn' => $catatan[$r],
					  'status_isi_markah' => 5
					 );

					    $data3 = array(
					  'pengurus' => NULL,
					  'pengurus_sah' => NULL,
					  'pgn' => NULL,
					  'pgn_sah' => NULL,
					  'ppkl' => NULL,
					  'ppkl_sah' => NULL,
					  'saegm' => NULL,
					  'spgm' => NULL,
					  'smgm' => NULL,
					  'skgm' => NULL,
					  'sklgm' => NULL
					  
					 );

					 $this->db->where('id_modul',$idmodul[$r]);
					 $this->db->where('id_pelatih',$idpelatih2);
					 $this->db->update('markah_modul',$data);

					 $this->db->where('id_pelatih',$idpelatih2);
					 $this->db->update('markah_modul_status',$data3);

	 			}
	 	 				redirect('admin/Gspel_kurikulum/pbn8/'.$idSeq3);

			}

				if (isset($_POST['pilih2'])) {
				$idpelatih =$_POST['id_pelatih'];
				$pilih2 = $_POST['pilih2'];
				$catatan2 = $_POST['catatan2'];
					 $data2 = array(
					  '	catatan_pgn' => $catatan2,
					  'status_isi_markah' => 5
					 );


					  $data4 = array(
					  'pengurus' => NULL,
					  'pengurus_sah' => NULL,
					  'pgn' => NULL,
					  'pgn_sah' => NULL,
					  'ppkl' => NULL,
					  'ppkl_sah' => NULL,
					  'saegm' => NULL,
					  'spgm' => NULL,
					  'smgm' => NULL,
					  'skgm' => NULL,
					  'sklgm' => NULL
					  
					 );

					 $this->db->where('id_pelatih',$idpelatih);
					 $this->db->update('markah_modul_2',$data2);

					 $this->db->where('id_pelatih',$idpelatih);
					 $this->db->update('markah_modul_status',$data4);
	 				redirect('admin/Gspel_kurikulum/pbn8/'.$idSeq3);

				}

			}
		}

		//Koding P4
					public function ppkl()
			{

				$acl_group = $this->ion_auth->get_users_groups($data['id'])->row()->name;

				if ($acl_group == "admin") {
					$this->mPageTitle = "Pengesahan";
				} else {
					$this->mPageTitle = "Pengesahan PBKL";
				}
				
				
				$this->load->model('Kurikulum_model');
				$idUser = $this->ion_auth->user()->row()->id;
				$this->mViewData['user2'] = $this->Kurikulum_model->get_user($idUser)->result();
				$this->mViewData['user3'] = $this->Kurikulum_model->get_user2($idUser)->result();
				$this->mViewData['user4'] = $this->Kurikulum_model->get_user3($idUser)->result();
				$this->mViewData['negeri'] = $this->Kurikulum_model->get_negeri()->result();
				$this->mViewData['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
				$this->render('gspel_kurikulum/p4/ppkl');
			}

			public function ppkl2()
			{
				$this->mPageTitle = "Pengesahan PBKL";
				$this->load->model('Kurikulum_model');
			$idUser = $this->ion_auth->user()->row()->id;

			// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// 	$giatmara = $this->input->post('giatmara');
			// 	$kursus = $this->input->post('kursus');
			// 	$jeniskursus = $this->input->post('jeniskursus');
			// 	$intake = $this->input->post('intake');
			// } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
			// 	$giatmara = $this->uri->segment(4);
			// 	$kursus = $this->uri->segment(5);
			// 	$jeniskursus  = $this->uri->segment(6);
			// 	$intake  = $this->uri->segment(7);
			// }

			$id = $this->uri->segment(4);
		$id2 = urldecode($this->uri->segment(5));
		$id3 = urldecode($this->uri->segment(6));
		$id4 = urldecode($this->uri->segment(7));
		$id5 = urldecode($this->uri->segment(8));
		
		$negeri = $this->input->post('negeri');
		$giatmara = $this->input->post('giatmara');
		$kursus = $this->input->post('kursus');
		$jeniskursus = $this->input->post('jeniskursus');
		$intake = $this->input->post('intake');

		//var_dump($intake);die();
		$data["giatmara"] = $giatmara;
		$data['kursus'] = $kursus;
		$data["jeniskursus"] = $jeniskursus;
		$data["intake"] = $intake;
		$data["negeri"] = $negeri;
		$data['user2'] = $this->Kurikulum_model->get_user($idUser)->result();
		$data['user3b'] = $this->Kurikulum_model->get_user2b($idUser ,$kursus )->result();
		$data['user4'] = $this->Kurikulum_model->get_user3($idUser)->result();
		$data['user4a'] = $this->Kurikulum_model->get_user3a($idUser,$intake)->result();
		$data['user4b'] = $this->Kurikulum_model->get_user3b($idUser,$intake)->result();
		$data['user3a'] = $this->Kurikulum_model->get_user2a($idUser,$kursus)->result();
		$data['user5'] = $this->Kurikulum_model->get_negeri2($negeri)->result();
		$data['user5a'] = $this->Kurikulum_model->get_negeri()->result();
		$data['user6'] = $this->Kurikulum_model->get_user6($idUser)->result();
		$data['user6a'] = $this->Kurikulum_model->get_user6a($idUser,$giatmara)->result();

		if ($id=='') {
		$negeri = $this->input->post('negeri');
		$giatmara = $this->input->post('giatmara');
		$kursus = $this->input->post('kursus');
		$jeniskursus = $this->input->post('jeniskursus');
		$intake = $this->input->post('intake');
		$data["jeniskursus"] = $jeniskursus;
		$data["kursus"] = $kursus;
		$data["giatmara"] = $giatmara;
		$data["intake"] = $intake;
		$data["negeri"] = $negeri;
		$data['modul'] = $this->Kurikulum_model->get_modul($giatmara,$kursus,$jeniskursus,$intake)->result();

		
		} else {
			if ($id3=="semua") {
				$semua ="";
				$id = $this->uri->segment(4);
				$id2 = urldecode($this->uri->segment(5));
				$id3 = urldecode($this->uri->segment(6));
				$id4 = urldecode($this->uri->segment(7));
				$id5 = urldecode($this->uri->segment(8));

				$data["jeniskursus"] = $semua;
				$data["kursus"] = $id;
				$data["giatmara"] = $id2;
				$data["intake"] = $id4;
				$negeri = $id5;
				$data["negeri"] = $id5;
				$data['user5'] = $this->Kurikulum_model->get_negeri2($negeri)->result();
				$data['user5a'] = $this->Kurikulum_model->get_negeri()->result();
				$data['modul'] = $this->Kurikulum_model->get_modul($id2,$id,$semua,$id4)->result();
				

			} else {
				$id = $this->uri->segment(4);
				$id2 = urldecode($this->uri->segment(5));
				$id3 = urldecode($this->uri->segment(6));
				$id4 = urldecode($this->uri->segment(7));
				$id5 = urldecode($this->uri->segment(8));

				$data["jeniskursus"] = $id3;
				$data["kursus"] = $id;
				$data["giatmara"] = $id2;
				$data["intake"] = $id4;
				$negeri = $id5;
				$data["negeri"] = $id5;
				$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
				$data['user5'] = $this->Kurikulum_model->get_negeri2($negeri)->result();
				$data['user5a'] = $this->Kurikulum_model->get_negeri()->result();
				$data['modul'] = $this->Kurikulum_model->get_modul($id2,$id,$id3,$id4)->result();
				
			}
		}

			$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
			$this->load->view('gspel_kurikulum/p4/ppkl2',$data);
			}


			public function ppkl3()
			{
				$this->mPageTitle = "Pengesahan PBKL";
				$this->load->model('Kurikulum_model');
				$id = $this->uri->segment(4);
				$id2 = urldecode($this->uri->segment(5));
				$id3 = urldecode($this->uri->segment(6));
				$id4 = urldecode($this->uri->segment(7));
				$id5 = urldecode($this->uri->segment(8));
				// $giatmara = $this->input->post('giatmara');
				// $kursus = $this->input->post('kursus');
				// $jeniskursus = $this->input->post('jeniskursus');
				// $intake = $this->input->post('intake');
				// $data["jeniskursus"] = $jeniskursus;
				// $data['kursus'] = $kursus;

		//kembali
		$id6 = urldecode($this->uri->segment(9));
		$id7 = urldecode($this->uri->segment(10));
		$id8 = urldecode($this->uri->segment(11));
		$id9 = urldecode($this->uri->segment(12));
		$id10 = urldecode($this->uri->segment(13));
		$id11 = urldecode($this->uri->segment(14));

		
		if ($id3=='Q') {
		if ($id10=='') {
			$data["jeniskursus"] = "semua";
		} else {
			$data["jeniskursus"] = $id10;
		}
		$data['kursus'] = $id8;
		$data["giatmara"] = $id7;
		$data["intake"] = $id9;
		$data["negeri"] = $id11;
		} else {

		if ($id9=='') {
			$data["jeniskursus"] = "semua";
		} else {
			$data["jeniskursus"] = $id9;
		}
		$data['kursus'] = $id7;
		$data["giatmara"] = $id6;
		$data["intake"] = $id8;
		$data["negeri"] = $id10;
		}
		
		$data["modul"]= $this->Kurikulum_model->get_modul2($id2,$id,$id4,$id9,$id8)->result();
		$data["moduldetail"]= $this->Kurikulum_model->get_modul_detail($id,$id2,$id3,$id4,$id9,$id8)->result();
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;

				$this->load->view('gspel_kurikulum/p4/ppkl3',$data);
			}



			public function ppkl4()
			{
				$this->mPageTitle = "Pengesahan PBKL";
				$this->load->model('Kurikulum_model');
				$id = $this->uri->segment(4);
				$id2 = urldecode($this->uri->segment(5));
				$id3 = urldecode($this->uri->segment(6));
				$id4 = urldecode($this->uri->segment(7));
				$id5 = urldecode($this->uri->segment(9));
				$id6 = urldecode($this->uri->segment(8));
				
				$data['idUser2'] = $this->ion_auth->user()->row()->username;
				//kembali
				$id7 = urldecode($this->uri->segment(10));
				$id8 = urldecode($this->uri->segment(11));
				$id9 = urldecode($this->uri->segment(12));
				$id10 = urldecode($this->uri->segment(13));
				$id11 = urldecode($this->uri->segment(14));

				// 
				
				if ($id3=='Q') {
				if ($id10=='') {
					$data["jeniskursus"] = "semua";
				} else {
					$data["jeniskursus"] = $id10;
				}
				$data['kursus'] = $id8;
				$data["giatmara"] = $id7;
				$data["intake"] = $id9;
				$data["negeri"] = $id11;
				} else {

				if ($id10=='') {
					$data["jeniskursus"] = "semua";
				} else {
					$data["jeniskursus"] = $id9;
				}
				$data['kursus'] = $id8;
				$data["giatmara"] = $id7;
				$data["intake"] = $id10;
				$data["negeri"] = $id11;
				}
//var_dump($id6);die();

				//$data["modul"]=  $this->Kurikulum_model->get_modul2($id2,$id,$id4)->result();
			//	$data["moduldetail"]= $this->Kurikulum_model->get_modul_detail2($id,$id2,$id4,$id5)->result();
				if ($id3=='Q') {
		$data["modul"]= $this->Kurikulum_model->get_modul2($id2,$id,$id4,$id10,$id9)->result();
		$data["moduldetail"]= $this->Kurikulum_model->get_modul_detail2($id,$id2,$id4,$id5,$id10,$id9)->result();
		} else {
		$data["modul"]= $this->Kurikulum_model->get_modul2($id2,$id,$id4,$id9,$id10)->result();
		$data["moduldetail"]= $this->Kurikulum_model->get_modul_detail2($id,$id2,$id4,$id5,$id9,$id10)->result();
		}
				$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;

				$this->load->view('gspel_kurikulum/p4/ppkl4',$data);
			}


			public function ppkl5()
			{
				$this->mPageTitle = "Pengesahan PBKL";
				$this->load->model('Kurikulum_model');
				$this->load->helper('url');
				$id = $this->uri->segment(4);
				$id2 = urldecode($this->uri->segment(5));
				$id3 = urldecode($this->uri->segment(6));
				$id4 = urldecode($this->uri->segment(7));
				$id5 = urldecode($this->uri->segment(8));
				$id6 = urldecode($this->uri->segment(9));
		$id7 = urldecode($this->uri->segment(10));
		$id8 = urldecode($this->uri->segment(11));
		$id9 = urldecode($this->uri->segment(12));
		$id10 = urldecode($this->uri->segment(13));
		$id11 = urldecode($this->uri->segment(14));
		
		if ($id3=='Q') {
		if ($id10=='') {
			$data["jeniskursus"] = "semua";
		} else {
			$data["jeniskursus"] = $id10;
		}
		$data['kursus'] = $id8;
		$data["giatmara"] = $id7;
		$data["intake"] = $id9;
		$data["negeri"] = $id11;
		} else {

		if ($id8=='') {
			$data["jeniskursus"] = "semua";
		} else {
			$data["jeniskursus"] = $id8;
		}
		$data['kursus'] = $id6;
		$data["giatmara"] = $id7;
		$data["intake"] = $id5;
		$data["negeri"] = $id9;
		}

		$data["modul"]= $this->Kurikulum_model->get_p1s4_header($id4, $id8)->result();
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$data["moduldetail"]= $this->Kurikulum_model->get_p1s4_detail($id4,$id8)->result();
		
		$this->load->view('gspel_kurikulum/p4/ppkl5',$data);
			}

			public function ppkl6()
		{
			$this->mPageTitle = "Pengesahan PBKL";
			$this->load->model('Kurikulum_model');
			$id = $this->uri->segment(4);
			$id2 = urldecode($this->uri->segment(5));
			$id3 = urldecode($this->uri->segment(6));
			$id4 = urldecode($this->uri->segment(7));
			$id5 = urldecode($this->uri->segment(8));
			$id6 = urldecode($this->uri->segment(9));
//kembali
		$id7 = urldecode($this->uri->segment(10));
		$id8 = urldecode($this->uri->segment(11));
		$id9 = urldecode($this->uri->segment(12));
		$id10 = urldecode($this->uri->segment(13));
		$id11 = urldecode($this->uri->segment(14));

		if ($id3=='Q') {

		if ($id10=='') {
			$data["jeniskursus"] = "semua";
		} else {
			$data["jeniskursus"] = $id10;
		}
		$data['kursus'] = $id8;
		$data["giatmara"] = $id7;
		$data["intake"] = $id9;
		$data["negeri"] = $id11;

		} else {

		if ($id10=='') {
			$data["jeniskursus"] = "semua";
		} else {
			$data["jeniskursus"] = $id9;
		}

		$data['kursus'] = $id8;
		$data["giatmara"] = $id7;
		$data["intake"] = $id10;
		$data["negeri"] = $id11;
		}
		
		//$data["modul"]= $this->Kurikulum_model->get_p1s4_header($id5)->result();
		//$data["moduldetail"]= $this->Kurikulum_model->get_p1s4_detail2($id5,$id6)->result();
		if ($id10 == "LPP04" or $id10 == "LPP09") {
				$data["modul"]= $this->Kurikulum_model->get_p1s4_header($id5,$id10)->result();
				$data["moduldetail"]= $this->Kurikulum_model->get_p1s4_detail2($id5,$id6,$id10)->result();
			}else{
				$data["modul"]= $this->Kurikulum_model->get_p1s4_header($id5,$id9)->result();
				$data["moduldetail"]= $this->Kurikulum_model->get_p1s4_detail2($id5,$id6,$id9)->result();
			}

		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;

			$this->load->view('gspel_kurikulum/p4/ppkl6',$data);
		}



public function ppkl7()
	{
		$this->mPageTitle = "Pengesahan PBKL";
		$this->load->model('Kurikulum_model');
		$id = $this->uri->segment(4);
		$id2 = urldecode($this->uri->segment(5));
		$id3 = urldecode($this->uri->segment(6));
		$id4 = urldecode($this->uri->segment(7));
		$id5 = urldecode($this->uri->segment(8));
		$id6 = urldecode($this->uri->segment(9));
		$id7 = urldecode($this->uri->segment(10));

		$data["namapenuh"] = $id;
		$data["nomykad"] = $id2;
		$data["nopelatih"] = $id3;
		$data["gcpa"] = $id4;
		$data["kehadiran"] = $id5;
		$data["namakursus"] = $id6;
		$data["idSeq"] = $id."/".$id2;
		$data["idSeq2"]=$id."/".$id2."/".$id3."/".$id4."/".$id5."/".$id6."/".$id7;
		// if ($id3=='Q') {

		if ($id6=='') {
			$data["jeniskursus"] = "semua";
		} else {
			$data["jeniskursus"] = $id6;
		}

		$data['kursus'] = $id4;
		$data["giatmara"] = $id3;
		$data["intake"] = $id5;
		$data["negeri"] = $id7;


		$data["moduldetail"]= $this->Kurikulum_model->get_p2s6($id,$id6)->result();
		$data["namakursus"]= $this->Kurikulum_model->get_p2s6_namakursus($id,$id6)->result();
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;


				if ($id2 =="b") {
					$this->load->view('gspel_kurikulum/p4/ppkl7',$data);
					} else {
						$this->load->view('gspel_kurikulum/p4/ppkl7a',$data);
					}

			}

			public function sah3(){
				$this->load->model('Kurikulum_model','km');
				$no = $this->input->post('no');
				$idSeq2 = $this->input->post('idSeq');
				$date = date('Y-m-d H:i:s');
				$date2 = date("d/m/Y", strtotime($date));
				$idpelatih =$_POST['idpelatih'];
				$idsah =$_POST['idsah'];
				$pilih = $_POST['pilih'];
				$catatan = $_POST['catatan'];
				$spgm =$_POST['spgm'];
				$skgm =$_POST['skgm'];
				$saegm =$_POST['saegm'];
				$smgm =$_POST['smgm'];
				$sklgm =$_POST['sklgm'];

				//var_dump($spgm);die();

				if ($_POST['action'] == 'simpan') {

				if (isset($_POST['pilih'])) {
				foreach ($pilih as $idx => $value) {

					 $data = array(
					 'ppkl' => 7,
					 'ppkl_sah' => $date,
					 'id_pelatih' =>$idpelatih[$idx],
					  'spgm' =>$spgm[$idx],
					 'sklgm' =>$sklgm[$idx],
					 'smgm' =>$smgm[$idx],
					 'skgm' =>$skgm[$idx],
					 'saegm' =>$saegm[$idx],
					 );

					  $data2 = array(
					  'status_isi_markah' => 7,
					   'catatan_ppkl' =>$catatan[$idx]
					 );

					   $data3 = array(
					  'status_pelatih' => 4,
					  
					 );


					 if ($idsah!="") {
					  $this->db->where('id',$idsah[$idx]);
					  $this->db->update('markah_modul_status',$data);

					 $this->db->where('id_pelatih',$idpelatih[$idx]);
					 $this->db->update('markah_modul',$data2);

					 $this->db->where('id_pelatih',$idpelatih[$idx]);
					 $this->db->update('markah_modul_2',$data2);

					  $this->db->where('id_pelatih',$idpelatih[$idx]);
					 $this->db->update('pelatih',$data3);

					 } else {
					 $this->db->insert('markah_modul_status',$data);

					 $this->db->where('id_pelatih',$idpelatih[$idx]);
					 $this->db->update('markah_modul',$data2);


					$this->db->where('id_pelatih',$idpelatih[$idx]);
					 $this->db->update('markah_modul_2',$data2);

					  $this->db->where('id_pelatih',$idpelatih[$idx]);
					 $this->db->update('pelatih',$data3);

					 }
			 }

			 redirect('admin/Gspel_kurikulum/ppkl7/'.$idSeq2);
		 }
	 }
 }

public function ppkl8()
	{
		$this->mPageTitle = "Pengesahan PBKL";
		$this->load->model('Kurikulum_model');
		$id = $this->uri->segment(4);
		$id2 = urldecode($this->uri->segment(5));
		$id3 = urldecode($this->uri->segment(6));
		$id4 = urldecode($this->uri->segment(7));
		$id5 = urldecode($this->uri->segment(8));
		$id6 = urldecode($this->uri->segment(10));
		$id7 = urldecode($this->uri->segment(9));

		//kembali ke halaman 
		$id8 = urldecode($this->uri->segment(11));
		$id9 = urldecode($this->uri->segment(12));
		$id10 = urldecode($this->uri->segment(13));
		$id11 = urldecode($this->uri->segment(14));
		$id12 = urldecode($this->uri->segment(15));
		$id13 = urldecode($this->uri->segment(16));

		$data["namapenuh"] = $id;
		$data["nomykad"] = $id2;
		$data["nopelatih"] = $id3;
		$data["gcpa"] = $id4;
		$data["kehadiran"] = $id5;
		$data["namakursus"] = $id7;

		$data["idSeq"] = $id."/".$id2."/".$id3."/".$id4."/".$id5."/".$id7."/".$id6."/".$id8."/".$id9."/".$id10."/".$id11."/".$id12."/".$id13;
		$data["idSeq2"] = $id8."/".$id9."/".$id10."/".$id11."/".$id12."/".$id13;
		$data["idSeq3"] = $id."/".$id2."/".$id3."/".$id4."/".$id5."/".$id7."/".$id6."/".$id8."/".$id9."/".$id10."/".$id11."/".$id12."/".$id13;
		$data["baga"]= $this->Kurikulum_model->get_p2s7_baga($id6)->result();
		$data["bagb"]= $this->Kurikulum_model->get_p2s7_bagb($id6)->result();
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$data["modul"]= $this->Kurikulum_model->get_modul3($id10,$id11)->result();
		$this->load->view('gspel_kurikulum/p4/ppkl8',$data);
	}

	public function kembali3(){
		$this->load->model('Kurikulum_model','km');
		$idSeq = $this->input->post('idSeq');
		$idSeq3 = $this->input->post('idSeq3');
		if ($_POST['action'] == 'simpan') {

			if (isset($_POST['pilih'])) {
			$pilih = $_POST['pilih'];
			$catatan = $_POST['catatan'];
			$idpelatih2 =$_POST['idpelatih'];
			$idmodul =$_POST['id_modul'];

			foreach ($pilih as $r => $value) {

					  $data = array(
					  'catatan_ppkl' => $catatan[$r],
					  'status_isi_markah' => 8
					 );

					     $data3 = array(
					  'pengurus' => NULL,
					  'pengurus_sah' => NULL,
					  'pgn' => NULL,
					  'pgn_sah' => NULL,
					  'ppkl' => NULL,
					  'ppkl_sah' => NULL,
					  'saegm' => NULL,
					  'spgm' => NULL,
					  'smgm' => NULL,
					  'skgm' => NULL,
					  'sklgm' => NULL
					  
					 );

					 $this->db->where('id_modul',$idmodul[$r]);
					 $this->db->where('id_pelatih',$idpelatih2);
					 $this->db->update('markah_modul',$data);

					  $this->db->where('id_pelatih',$idpelatih2);
					  $this->db->update('markah_modul_status',$data3);

	 			}
	 	 				redirect('admin/Gspel_kurikulum/ppkl8/'.$idSeq3);

			}

				if (isset($_POST['pilih2'])) {
				$idpelatih =$_POST['id_pelatih'];
				$pilih2 = $_POST['pilih2'];
				$catatan2 = $_POST['catatan2'];
					 $data2 = array(
					  '	catatan_ppkl' => $catatan2,
					  'status_isi_markah' => 8
					 );

					   $data4 = array(
					  'pengurus' => NULL,
					  'pengurus_sah' => NULL,
					  'pgn' => NULL,
					  'pgn_sah' => NULL,
					  'ppkl' => NULL,
					  'ppkl_sah' => NULL,
					  'saegm' => NULL,
					  'spgm' => NULL,
					  'smgm' => NULL,
					  'skgm' => NULL,
					  'sklgm' => NULL
					  
					 );

					 $this->db->where('id_pelatih',$idpelatih);
					 $this->db->update('markah_modul_2',$data2);

					 $this->db->where('id_pelatih',$idpelatih);
					  $this->db->update('markah_modul_status',$data4);
	 				redirect('admin/Gspel_kurikulum/ppkl8/'.$idSeq3);

		}

	}
}

	// P5
	public function certificate()
	{
		$this->mPageTitle = "Pengeluaran Persijilan";
		$this->load->model('Kurikulum_model');
		$this->load->model('user_model', 'users');
		$idUser = $this->ion_auth->user()->row()->id;
		$this->mViewData['user2'] = $this->Kurikulum_model->get_user($idUser)->result();
		$this->mViewData['user3'] = $this->Kurikulum_model->get_user2($idUser)->result();
		$this->mViewData['user4'] = $this->Kurikulum_model->get_user3($idUser)->result();
		$this->mViewData['user5'] = $this->Kurikulum_model->get_user5($idUser)->result();
		$this->mViewData['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;

		$this->mViewData['negeri'] = $this->Kurikulum_model->get_negeri()->result();
		$this->render('gspel_kurikulum/p5/certificate');
	}

	public function export_sijil()
	{
		$this->mPageTitle = "Pengeluaran Persijilan";
		$this->load->model('Kurikulum_model');

		
		$negeri = $this->input->post('negeri');
		$giatmara = $this->input->post('giatmara');
		$kursus = $this->input->post('kursus');
		$jeniskursus = $this->input->post('jeniskursus');
		$intake = $this->input->post('intake');
		
		$nama = $this->input->post('nama');
		$no_mykad = $this->input->post('no_mykad');
		$ppkl_sah = $this->input->post('ppkl_sah');
		$gcpa = $this->input->post('gcpa');
		$giatmara2 = $this->input->post('giatmara2');
		$kursus2 = $this->input->post('kursus2');
		$sijil = $this->input->post('sijil');

		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$spgm =$this->input->post('spgm');
		$skgm =$this->input->post('skgm');
		$saegm =$this->input->post('saegm');
		$sklgm =$this->input->post('sklgm');

		if ($sijil == 'spgm') {
			$pilih = $spgm;
		} else if ($sijil == 'skgm') {
			$pilih = $skgm;
		} else if ($sijil == 'sklgm') {
			$pilih = $sklgm;
		} else {
			$pilih = $saegm;
		}
	
		$this->db->truncate('export_excel_sijil');
 		foreach ($pilih as $idx => $value) {

 			//print_r($pilih);die();
			  $data2 = array(
			  'no_sijil' =>$sijil.'/'.$ppkl_sah[$idx],
			  'nama' => $nama[$idx],
			   'no_mykad' => $no_mykad[$idx],
			    'jenissijil' => $sijil,
			  'giatmara' =>$giatmara2[$idx],
			  'gcpa' => $gcpa[$idx],
			  'kursus' => $kursus2[$idx],
			      );

			  $ql = $this->db->select('no_mykad')->from('export_excel_sijil')->where('no_mykad',$no_mykad[$idx])->get();

			if( $ql->num_rows() > 0 ) {
				 $this->db->where('no_mykad',$no_mykad[$idx]);
				$this->db->update('export_excel_sijil',$data2);
			} else {
			    $this->db->insert('export_excel_sijil', $data2);
			}
			  //$this->db->truncate('export_excel_sijil');
		
			}

		$data['moduldetail'] =$this->Kurikulum_model->get_p5_detail2();
		$data['title'] = 'Laporan Sijil'; 
		$data['sijil'] = $sijil; 
		
           $this->load->view('gspel_kurikulum/p5/vw_laporan_excel',$data);
	}

	public function certificateb()
	{
		$this->mPageTitle = "Pengeluaran Persijilan";
		$this->load->model('Kurikulum_model');
		$id = urldecode($this->uri->segment(4));
		$id2 = urldecode($this->uri->segment(5));
		$id3 = urldecode($this->uri->segment(6));
		$id4 = urldecode($this->uri->segment(7));
		$id5 = urldecode($this->uri->segment(8));
		$id6 = urldecode($this->uri->segment(9));
		$idUser = $this->ion_auth->user()->row()->id;

		if ($id == '') {
		$negeri = $this->input->post('negeri');
		$giatmara = $this->input->post('giatmara');
		$kursus = $this->input->post('kursus');
		$jeniskursus = $this->input->post('jeniskursus');
		$intake = $this->input->post('intake');

		} else {
		$negeri = $id2;
		$giatmara = $id3;
		$kursus = $id4;
		$jeniskursus = $id5;
		$intake = $id6;

		}

		$data["giatmara"] = $giatmara;
		$data["jeniskursus"] = $jeniskursus;
		$data['kursus'] = $kursus;
		$data['intake'] = $intake;
		$data['negeri'] = $negeri;
		
		$data['user2'] = $this->Kurikulum_model->get_user($idUser)->result();
		$data['user3b'] = $this->Kurikulum_model->get_user2b($idUser ,$kursus )->result();
		$data['user4'] = $this->Kurikulum_model->get_user3($idUser)->result();
		$data['user4a'] = $this->Kurikulum_model->get_user3a($idUser,$intake)->result();
		$data['user4b'] = $this->Kurikulum_model->get_user3b($idUser,$intake)->result();
		$data['user3a'] = $this->Kurikulum_model->get_user2a($idUser,$kursus)->result();
		$data['user5'] = $this->Kurikulum_model->get_negeri2($negeri)->result();
		$data['user5a'] = $this->Kurikulum_model->get_negeri()->result();
		$data['user6'] = $this->Kurikulum_model->get_user6($idUser)->result();
		$data['user6a'] = $this->Kurikulum_model->get_user6a($idUser,$giatmara)->result();
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$data['moduldetail'] = $this->Kurikulum_model->get_p5_detail($negeri,$giatmara,$kursus,$jeniskursus,$intake)->result();
		$data['moduldetail2'] = $this->Kurikulum_model->get_p5_detail2($negeri,$giatmara,$kursus,$jeniskursus,$intake)->result();
		$this->load->view('gspel_kurikulum/p5/certificateb',$data);

	}

	function cek_lpp5a(){
	
		$id = urldecode($this->uri->segment(4));
		$id2 = urldecode($this->uri->segment(5));
		$id3 = urldecode($this->uri->segment(6));
		$id4 = urldecode($this->uri->segment(7));
		$id5 = urldecode($this->uri->segment(8));
		$id6 = urldecode($this->uri->segment(9));

		$data["giatmara"] = $id2;
		$data["jeniskursus"] = $id3;
		$data['kursus'] = $id4;
		$data['intake'] = $id5;
		$data['negeri'] = $id6;
		$idSeq= $id."/".$id2."/".$id3."/".$id4."/".$id5."/".$id7."/".$id6;
		$data['idSeq'] = $idSeq;
			$cek = $this->Kurikulum_model->cek_lpp5a($id);
		 	$count = count($cek);
		//var_dump($count);die();
			if ($count <> '') {
		    $data['lpp5a'] = $this->Kurikulum_model->get_lpp5a($id)->result();
			$this->load->view('gspel_kurikulum/p5/lpp5a',$data);	
		       } else {
			echo "<script>
			alert('Anda tak boleh untuk kemaskini data ini');
			window.location='".site_url("admin/Gspel_kurikulum/certificateb/$idSeq")."'
			</script>";

		    }

	}


	function updatelpp5a(){
	
		
		$idpelatih = $this->input->post('idpelatih');
		$nama = $this->input->post('nama2');
		$idSeq = $this->input->post('idSeq');
			
		 $data2 = array(
					  'nama_baru' =>$nama,
					
					 );

					 $this->db->where('id_pelatih',$idpelatih);
					 $this->db->update('lpp_5a',$data2);
	 				redirect('admin/Gspel_kurikulum/certificateb/'.$idSeq);

	}


	function cek_lpp5b(){
	
		$id = urldecode($this->uri->segment(4));
		$id2 = urldecode($this->uri->segment(5));
		$id3 = urldecode($this->uri->segment(6));
		$id4 = urldecode($this->uri->segment(7));
		$id5 = urldecode($this->uri->segment(8));
		$id6 = urldecode($this->uri->segment(9));

		$data["giatmara"] = $id2;
		$data["jeniskursus"] = $id3;
		$data['kursus'] = $id4;
		$data['intake'] = $id5;
		$data['negeri'] = $id6;
		$idSeq= $id."/".$id2."/".$id3."/".$id4."/".$id5."/".$id7."/".$id6;
		$data['idSeq'] = $idSeq;
			$cek = $this->Kurikulum_model->cek_lpp5b($id);
		 	$count = count($cek);
		//var_dump($count);die();
			if ($count <> '') {
		    $data['lpp5b'] = $this->Kurikulum_model->get_lpp5b($id)->result();
			$this->load->view('gspel_kurikulum/p5/lpp5b',$data);	
		       } else {
			echo "<script>
			alert('Anda tak boleh untuk kemaskini data ini');
			window.location='".site_url("admin/Gspel_kurikulum/certificateb/$idSeq")."'
			</script>";

		    }

	}


	function updatelpp5b(){
		$idpelatih = $this->input->post('idpelatih');
		$mykad = $this->input->post('mykad2');
		$idSeq = $this->input->post('idSeq');
			
		 $data2 = array(
					  'mykad_baru' =>$mykad,
					
					 );

					 $this->db->where('id_pelatih',$idpelatih);
					 $this->db->update('lpp_5b',$data2);
	 				redirect('admin/Gspel_kurikulum/certificateb/'.$idSeq);

	}



	// P6
	public function status()
	{
		$this->mPageTitle = " Status Penghantaran ";
		$this->load->model('Kurikulum_model');
		$this->load->model('user_model', 'users');
		$idUser = $this->ion_auth->user()->row()->id;
		$this->mViewData['user2'] = $this->Kurikulum_model->get_user($idUser)->result();
		$this->mViewData['user3'] = $this->Kurikulum_model->get_user2($idUser)->result();
		$this->mViewData['user4'] = $this->Kurikulum_model->get_user3($idUser)->result();
		$this->mViewData['user5'] = $this->Kurikulum_model->get_user5($idUser)->result();
		$this->mViewData['negeri'] = $this->Kurikulum_model->get_negeri()->result();
			$this->render('gspel_kurikulum/p6/status');
	}

	public function status2()
	{
		$this->mPageTitle = "Status Penghantaran";
		$this->load->model('Kurikulum_model');

		$id = $this->uri->segment(4);
		$id2 = urldecode($this->uri->segment(5));
		$idUser = $this->ion_auth->user()->row()->id;


		$negeri = $this->input->post('negeri');
		$giatmara = $this->input->post('giatmara');
		$kursus = $this->input->post('kursus');
		$jeniskursus = $this->input->post('jeniskursus');
		$intake = $this->input->post('intake');

		$data["giatmara"] = $giatmara;
		$data["jeniskursus"] = $jeniskursus;
		$data['kursus'] = $kursus;
		$data['intake'] = $intake;
		$data['negeri'] = $negeri;
		$data['user2'] = $this->Kurikulum_model->get_user($idUser)->result();
		$data['user3b'] = $this->Kurikulum_model->get_user2b($idUser ,$kursus )->result();
		$data['user4'] = $this->Kurikulum_model->get_user3($idUser)->result();
		$data['user4a'] = $this->Kurikulum_model->get_user3a($idUser,$intake)->result();
		$data['user4b'] = $this->Kurikulum_model->get_user3b($idUser,$intake)->result();
		$data['user3a'] = $this->Kurikulum_model->get_user2a($idUser,$kursus)->result();
		$data['user5'] = $this->Kurikulum_model->get_negeri2($negeri)->result();
		$data['user5a'] = $this->Kurikulum_model->get_negeri()->result();
		$data['user6'] = $this->Kurikulum_model->get_user6($idUser)->result();
		$data['user6a'] = $this->Kurikulum_model->get_user6a($idUser,$giatmara)->result();
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		

		$data['moduldetail'] = $this->Kurikulum_model->get_p6_detail($negeri,$giatmara,$kursus,$jeniskursus,$intake)->result();
		$this->load->view('gspel_kurikulum/p6/status2',$data);
	}

	public function statustrainer()
	{
		$this->load->model('user_model', 'users');
		$this->mPageTitle = "Status Penghantaran";
		$this->load->model('Kurikulum_model');
		$idUser = $this->ion_auth->user()->row()->id;
		$this->mViewData['user2'] = $this->Kurikulum_model->get_user($idUser)->result();
		$this->mViewData['user3'] = $this->Kurikulum_model->get_user2($idUser)->result();
		$this->mViewData['user4'] = $this->Kurikulum_model->get_user3($idUser)->result();
		$this->render('gspel_kurikulum/p6/statustrainer');
	}

	public function statustrainer2()
	{
		$this->mPageTitle = "Status Penghantaran";
		$this->load->model('Kurikulum_model');
		$id = $this->uri->segment(4);
		$id2 = urldecode($this->uri->segment(5));
		$id3 = urldecode($this->uri->segment(6));
		$id4 = urldecode($this->uri->segment(7));

		$giatmara = $this->input->post('giatmara');
		$kursus = $this->input->post('kursus');
		$jeniskursus = $this->input->post('jeniskursus');
		$intake = $this->input->post('intake');

		$data["giatmara"] = $giatmara;
		$data['kursus'] = $kursus;
		$data["jeniskursus"] = $jeniskursus;
		$data["intake"] = $intake;

		$idUser = $this->ion_auth->user()->row()->id;
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$data['user2'] = $this->Kurikulum_model->get_user($idUser)->result();
		$data['user3b'] = $this->Kurikulum_model->get_user2b($idUser ,$kursus )->result();
		$data['user4'] = $this->Kurikulum_model->get_user3($idUser)->result();
		$data['user4a'] = $this->Kurikulum_model->get_user3a($idUser,$intake)->result();
		$data['user4b'] = $this->Kurikulum_model->get_user3b($idUser,$intake)->result();
		$data['user3a'] = $this->Kurikulum_model->get_user2a($idUser,$kursus)->result();
		

		$data['moduldetail'] = $this->Kurikulum_model->get_p6_detail2($giatmara,$kursus,$jeniskursus,$intake)->result();
		$this->load->view('gspel_kurikulum/p6/statustrainer2',$data);
	}

	public function statuspengurus()
	{
		$this->load->model('Ref_kursus_model');
		$this->load->model('Ref_intake_model');
		
		$this->mPageTitle = "Status Penghantaran";
		$this->load->model('Kurikulum_model');
		$idUser = $this->ion_auth->user()->row()->id;
		$this->mViewData['user2'] = $this->Kurikulum_model->get_user($idUser)->result();
		#$this->mViewData['user3'] = $this->Kurikulum_model->get_user2($idUser)->result();
		#$this->mViewData['user3'] = $this->Kurikulum_model->get_user2($idUser)->result();
		$this->mViewData['user3'] = $this->Ref_kursus_model->get_by_user($idUser);;
		$this->mViewData['user4'] = $this->Ref_intake_model->get_by_user($idUser);
		$this->render('gspel_kurikulum/p6/statuspengurus');
	}


public function statuspengurus2()
	{
		$this->mPageTitle = "Status Penghantaran";
		$this->load->model('Kurikulum_model');
		$id = $this->uri->segment(4);
		$id2 = urldecode($this->uri->segment(5));
		$id3 = urldecode($this->uri->segment(6));
		$id4 = urldecode($this->uri->segment(7));

		$giatmara = $this->input->post('giatmara');
		$kursus = $this->input->post('kursus');
		$jeniskursus = $this->input->post('jeniskursus');
		$intake = $this->input->post('intake');

		$data["giatmara"] = $giatmara;
		$data['kursus'] = $kursus;
		$data["jeniskursus"] = $jeniskursus;
		$data["intake"] = $intake;

		$idUser = $this->ion_auth->user()->row()->id;
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$data['user2'] = $this->Kurikulum_model->get_user($idUser)->result();
		$data['user3b'] = $this->Kurikulum_model->get_user2b($idUser ,$kursus )->result();
		$data['user4'] = $this->Kurikulum_model->get_user3($idUser)->result();
		$data['user4a'] = $this->Kurikulum_model->get_user3a($idUser,$intake)->result();
		$data['user4b'] = $this->Kurikulum_model->get_user3b($idUser,$intake)->result();
		$data['user3a'] = $this->Kurikulum_model->get_user2a($idUser,$kursus)->result();
		

		$data['moduldetail'] = $this->Kurikulum_model->get_p6_detail2($giatmara,$kursus,$jeniskursus,$intake)->result();
		$this->load->view('gspel_kurikulum/p6/statuspengurus2',$data);
	}

	public function statuspgn2()
	{
		$this->mPageTitle = "Status Penghantaran";
		$this->load->model('Kurikulum_model');
		$id = $this->uri->segment(4);
		$id2 = urldecode($this->uri->segment(5));

		$giatmara = $this->input->post('giatmara');
		$kursus = $this->input->post('kursus');
		$jeniskursus = $this->input->post('jeniskursus');
		$intake = $this->input->post('intake');

		$data["giatmara"] = $giatmara;
		$data['kursus'] = $kursus;
		$data["jeniskursus"] = $jeniskursus;
		$data["intake"] = $intake;

//var_dump($intake);die();
		$data['user2'] = $this->Kurikulum_model->get_user($idUser)->result();
		$data['user3b'] = $this->Kurikulum_model->get_user2b($idUser ,$kursus )->result();
		$data['user4'] = $this->Kurikulum_model->get_user3($idUser)->result();
		$data['user4a'] = $this->Kurikulum_model->get_intake2($intake)->result();
		$data['user4b'] = $this->Kurikulum_model->get_user3b($idUser,$intake)->result();
		$data['user3a'] = $this->Kurikulum_model->get_kursus2($kursus)->result();
		
		$data['user6'] = $this->Kurikulum_model->get_user6($idUser)->result();
		$data['user6a'] = $this->Kurikulum_model->get_giatmara2($giatmara)->result();

		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		

		$data['moduldetail'] = $this->Kurikulum_model->get_p6_detail2($giatmara,$kursus,$jeniskursus,$intake)->result();
		$this->load->view('gspel_kurikulum/p6/statuspgn2',$data);
	}


	public function statuspgn()
		{
			$this->mPageTitle = "Status Penghantaran";
			$this->load->model('Kurikulum_model');
			$idUser = $this->ion_auth->user()->row()->id;
			$this->mViewData['user2'] = $this->Kurikulum_model->get_user($idUser)->result();
			$this->mViewData['user3'] = $this->Kurikulum_model->get_user2($idUser)->result();
			$this->mViewData['user4'] = $this->Kurikulum_model->get_user3($idUser)->result();
			$this->mViewData['user6'] = $this->Kurikulum_model->get_user6($idUser)->result();
			$this->render('gspel_kurikulum/p6/statuspgn');
		}


	public function ajaxcoba($id) {
		$id3 = $this->uri->segment(4);
		$this->load->model('Kurikulum_model');
		$query = $this->Kurikulum_model->coba($id)->result();

		if ($query) {
			echo json_encode($query);
		}else {
			echo json_last_error_msg();
		}
	}

	public function ajaxcoba2($id) {
		$id3 = $this->uri->segment(4);
		$this->load->model('Kurikulum_model');
		$query = $this->Kurikulum_model->dicoba($id)->result();

		if ($query) {
			echo json_encode($query);
		}else {
			echo json_last_error_msg();
		}
	}

	public function ajaxcoba3($id) {
		$id3 = $this->uri->segment(4);
		$this->load->model('Kurikulum_model');
		$query = $this->Kurikulum_model->dicoba2($id)->result();

		if ($query) {
			echo json_encode($query);
		}else {
			echo json_last_error_msg();
		}
	}

	
	





}
