<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_kurikulum extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
		$this->load->model('Kurikulum_model');
		$this->load->model('Konfigurasi_model');
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

	public function aturkluster(){
		$this->mPageTitle = "Pengurusan Kluster ";
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$data['klusterdetail'] = $this->Kurikulum_model->get_kluster()->result();
		$this->load->view('konfigurasi/kluster/index',$data);
	}


	public function editkluster($id){
		$this->load->model('Kurikulum_model');
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$data['klusterdetail'] = $this->Kurikulum_model->edit_kluster($id)->result();
		$this->load->view('konfigurasi/kluster/edit',$data);
	}

	public function updatekluster(){
	$this->load->model('Kurikulum_model');	
	$id = $this->input->post('idkluster');
	$nama = $this->input->post('nama');
	$kode = $this->input->post('kode');
	$date = date('Y-m-d H:i:s');
 
	$data = array(
		'nama_kluster' => $nama,
		'kod_kluster' => $kode,
		'diwujudkan_pada' => $date
	);

	$where = array(
		'id' => $id
	);
 
	$this->db->where($where);
	$this->db->update('ref_kluster',$data);
	
	$data['klusterdetail'] = $this->Kurikulum_model->get_kluster()->result();
	redirect('admin/konfigurasi_kurikulum/aturkluster',$data);
	}

	public function createkluster(){
	$this->load->model('Kurikulum_model');
	$id = $this->uri->segment(4);
	$id2 = urldecode($this->uri->segment(5));
	$id3 = urldecode($this->uri->segment(6));
	$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
	$this->load->view('konfigurasi/kluster/create',$data);
	}

	public function storekluster(){
	
	$id = $this->input->post('idkluster');
	$nama = $this->input->post('nama');
	$kode = $this->input->post('kode');
	$date = date('Y-m-d H:i:s');
 
	$data = array(
		'nama_kluster' => $nama,
		'kod_kluster' => $kode,
		'diwujudkan_pada' => $date
	);

	$this->db->insert('ref_kluster',$data);
	
	$data['klusterdetail'] = $this->Kurikulum_model->get_kluster()->result();
	redirect('admin/konfigurasi_kurikulum/aturkluster',$data);
	}

	
	function padamkluster(){

	$id = $this->uri->segment(4);
	$exists = $this->Konfigurasi_model->filename_exists($id);
	$count = count($exists);

    if ($count <> '') {
    	redirect('admin/Konfigurasi_kurikulum/lihatkluster/'.$id);
        
    } else {
        echo "<script>  if (confirm('Adakah anda pasti untuk memadam kluster ini?') == true) {
    window.location='".site_url("admin/Konfigurasi_kurikulum/delete_kluster/$id")."';
  } else {
    window.location='".site_url("admin/Konfigurasi_kurikulum/aturkluster")."';
  }
  </script>";
    }

	}

function lihatkluster($id){
$data['klusterdetail'] = $this->Konfigurasi_model->get_kluster($id)->result();
$data['klusterdetail2'] = $this->Konfigurasi_model->get_kluster2($id)->result();
$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
$this->load->view('konfigurasi/kluster/peringatan',$data);
}

public function delete_kluster($id){
  $this ->db->where('id', $id);
  $this ->db->delete('ref_kluster');
redirect('admin/Konfigurasi_kurikulum/aturkluster');
}

public function deletelagikluster(){
  $id = $this->uri->segment(4);
  $id2 = urldecode($this->uri->segment(5));
		
  $this ->db-> where('id', $id);
  $this ->db-> delete('ref_kluster');

  $this ->db-> where('id', $id);
  $this ->db-> delete('ref_kursus');

  $this ->db-> where('id_kursus', $id2);
  $this ->db-> delete('settings_tawaran_kursus ');

  $this ->db-> where('id', $id2);
  $this ->db-> delete('ref_modul');
// echo $this->db->last_query();exit();

redirect('admin/Konfigurasi_kurikulum/aturkluster');
}


	public function aturketuakluster(){
		$this->mPageTitle = "Pengurusan Ketua Kluster ";
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$data['klusterdetail'] = $this->Konfigurasi_model->get_list_ketuakluster()->result();
		$this->load->view('konfigurasi/ketuakluster/index',$data);
	}


	public function editketuakluster($id,$id2,$id3,$id4){
		
		$data['iduser'] = $id4;
		$data['idketuakluster'] = $id3;
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$data['kluster'] = $this->Kurikulum_model->edit_kluster($id2)->result();
		$data['users'] = $this->Konfigurasi_model->edit_list_users($id)->result();
		$data['listkluster'] = $this->Kurikulum_model->get_kluster()->result();
		$data['listuser'] = $this->Konfigurasi_model->get_list_users()->result();
		$this->load->view('konfigurasi/ketuakluster/edit',$data);
	}

	public function updateketuakluster(){

		//var_dump($_POST);die();
		$users = $this->input->post('users');
		$kluster = $this->input->post('kluster');
		$id_user = $this->input->post('iduser');
		$id_ketua_kluster = $this->input->post('idketuakluster');
	 
		$data = array(
		'user_id' => $users,
		'kluster_id' => $kluster,
		);

		$data2 = array(
		'user_id' => $users,
		'group_id' => 17,
		);

		$where = array(
			'id' => $id_ketua_kluster
		);

		$where2 = array(
			'id' => $id_user
		);
	 
		$this->db->where($where);
		$this->db->update('ketua_kluster',$data);

		$this->db->where($where2);
		$this->db->update('admin_users_groups',$data2);
		//echo $this->db->last_query();exit();
		
		redirect('admin/konfigurasi_kurikulum/aturketuakluster',$data);
	}

	public function createketuakluster(){

		$data['listkluster'] = $this->Kurikulum_model->get_kluster()->result();
		$data['listuser'] = $this->Konfigurasi_model->get_list_users()->result();
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$this->load->view('konfigurasi/ketuakluster/create',$data);
	
	}

	public function storeketuakluster(){
	//var_dump($_POST);die();
	$users = $this->input->post('users');
	$kluster = $this->input->post('kluster');
	// $date = date('Y-m-d H:i:s');
 
	$data = array(
		'user_id' => $users,
		'kluster_id' => $kluster,
		);

	$data2 = array(
		'user_id' => $users,
		'group_id' => 17,
		);

	$this->db->insert('ketua_kluster',$data);
	$this->db->insert('admin_users_groups',$data2);
	//echo $this->db->last_query();exit();
	redirect('admin/konfigurasi_kurikulum/aturketuakluster');
	}


	public function aturkursus(){
		
		$this->mPageTitle = "Pengurusan Kursus";
		$this->mViewData['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$idUser = $this->ion_auth->user()->row()->id;
		$this->mViewData['ketuakluster'] = $this->Konfigurasi_model->get_data_ketuakluster($idUser)->result();
		$this->mViewData['kluster'] = $this->Kurikulum_model->get_kluster()->result();
		$this->render('konfigurasi/kursus/index');
			
	}

	public function aturkursus2(){
		$this->mPageTitle = "Pengurusan Kursus";
		$id = urldecode($this->uri->segment(4));
		$id2 = urldecode($this->uri->segment(5));
		$id3 = urldecode($this->uri->segment(6));
		if ($id != '') {
		$kursus = $id;
		$status = $id2;
		$kluster = $id3;
		} else {
		$kursus = $this->input->post('kursus');
		$status = $this->input->post('statuskursus');//
		$kluster = $this->input->post('kluster');

		//var_dump($kluster);die();
		} 
		
		$idUser = $this->ion_auth->user()->row()->id;
		
		$data['kursus'] = $kursus;
		$data['statuskursus'] = $status;
		$data['kluster2'] = $kluster;
		
		$data['bilpusat'] = $this->Konfigurasi_model->get_bilpusat($kursus,$kluster)->result();

		$data['klusterpilih'] = $this->Kurikulum_model->get_kluster2($kluster)->result();
		$data['kluster'] = $this->Kurikulum_model->get_kluster()->result();
		$data['kursusdetail'] = $this->Konfigurasi_model->get_senarai_kursus($status,$kluster,$kursus)->result();
		$data['kursusdetail2'] = $this->Konfigurasi_model->get_kursus($status,$kluster,$kursus)->result();
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		// $text = $this->Konfigurasi_model->coba_exists($status,$kluster,$kursus);
		// $count = count($text);

  //  	 if ($count <> '') {
   		$this->load->view('konfigurasi/kursus/index2',$data);	
		// } else {
		// $this->load->view('konfigurasi/kursus/index3',$data);	
		// }
	}


	public function createkursus(){
	$this->load->model('Kurikulum_model');
	$id = urldecode($this->uri->segment(4));
	$id2 = urldecode($this->uri->segment(5));
	$id3 = urldecode($this->uri->segment(6));
	$data["idSeq"] = $id."/".$id2."/".$id3;
	$data['kluster'] = $this->Kurikulum_model->get_kluster()->result();
	$this->load->view('konfigurasi/kursus/create',$data);
	}

	public function storekursus(){
	
	$kluster = $this->input->post('kluster');
	$nama = $this->input->post('nama');
	$sijil = $this->input->post('sijil');
	$latihanpusat = $this->input->post('latihanpusat');
	$jenisstatus = $this->input->post('jenisstatus');
	$tahap = $this->input->post('tahap');
	$kodekursus = $this->input->post('kodekursus');
	$kodeskm = $this->input->post('kodeskm');
	$idSeq = $this->input->post('idSeq');
	$latihanindustri = $this->input->post('latihanindustri');
	//$date = date("d/m/Y");
	$date = date('d-m-Y');

	//var_dump($date);die();
 
	$data = array(
		'id_kluster' => $kluster,
		'status_kursus' => $jenisstatus,
		'kod_kursus' => $kodekursus,
		'nama_kursus' => $nama,
		'jenis_kursus' => $tahap,
		'nama_kursus_sijil' => $sijil,
		'kod_skm' => $kodeskm,
		'tempoh_industri' => $latihanindustri,
		'tempoh_pusat' => $latihanpusat,
		'tarikh_dikuatkuasa' => $date
	);

	$this->db->insert('ref_kursus',$data);
	//echo $this->db->last_query();exit();
	redirect('admin/konfigurasi_kurikulum/aturkursus2/'.$idSeq);
	}


	public function listpusatkursus(){
	$this->load->model('Kurikulum_model');
	$id = urldecode($this->uri->segment(4));
	$id2 = urldecode($this->uri->segment(5));
	$id3 = urldecode($this->uri->segment(6));
	$id4 = urldecode($this->uri->segment(7));

	$kursus = $id;
	$status = $id2;
	$kluster = $id3;

	$data["kursus"] = $kursus;
	$data["status"] = $status;
	$data["kluster"] = $kluster;
	$data['kursuspusat'] = $this->Konfigurasi_model->get_pusat($id,$kluster)->result();
	$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
	$this->load->view('konfigurasi/kursus/list',$data);
	}

	public function editkursus(){
	$kursus = urldecode($this->uri->segment(4));
	$kluster = urldecode($this->uri->segment(5));
	$status = urldecode($this->uri->segment(6));
	$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
	$cekmodul = $this->Konfigurasi_model->coba_exists2($kursus);
	$test = count($cekmodul);

	$data['cek'] = $test;

	$data["kursus"] = $kursus;
	$data["status"] = $status;
	$data["kluster"] = $kluster;

	$data["idSeq"] = $kursus."/".$idkursus."/".$kluster."/".$status."/".$idsetting;
	$data["idSeq2"] = $kursus."/".$status."/".$kluster;
	$data['kursusdetail'] = $this->Konfigurasi_model->edit_kursus($kursus,$kluster)->result();
	$data['kluster'] = $this->Kurikulum_model->get_kluster()->result();
	$this->load->view('konfigurasi/kursus/edit',$data);
	}


	public function editkursus2(){
	$kursus = urldecode($this->uri->segment(4));
	$kluster = urldecode($this->uri->segment(5));
	$status = urldecode($this->uri->segment(6));
	
	$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
	$data["kursus"] = $kursus;
	$data["status"] = $status;
	$data["kluster"] = $kluster;
	
	$data["idSeq"] = $kursus."/".$idkursus."/".$kluster."/".$status;
	$data["idSeq2"] = $kursus."/".$status."/".$kluster;
	$data['kursusdetail'] = $this->Konfigurasi_model->edit_kursus($kursus,$kluster)->result();
	$data['kluster'] = $this->Kurikulum_model->get_kluster()->result();
	$this->load->view('konfigurasi/kursus/edit2',$data);
	}

	public function updatekursus(){
	$this->load->model('Kurikulum_model');	
	$id = $this->input->post('id');
	$idsetting = $this->input->post('idsetting');
	$idSeq = $this->input->post('idSeq');
	$kluster = $this->input->post('kluster');
	$nama = $this->input->post('nama');
	$sijil = $this->input->post('sijil');
	$latihanpusat = $this->input->post('latihanpusat');
	$jenisstatus = $this->input->post('jenisstatus');
	$tahap = $this->input->post('tahap');
	$tahap2 = $this->input->post('tahap2');
	$kodekursus = $this->input->post('kodekursus');
	$kodeskm = $this->input->post('kodeskm');
	$idSeq = $this->input->post('idSeq');
	$latihanindustri = $this->input->post('latihanindustri');
	$date = date('d-m-Y');

	//var_dump($date);die();

	$data = array(
		'id_kluster' => $kluster,
		'status_kursus' => $jenisstatus,
		'kod_kursus' => $kodekursus,
		'nama_kursus' => $nama,
		'jenis_kursus' => $tahap,
		'nama_kursus_sijil' => $sijil,
		'kod_skm' => $kodeskm,
		'tempoh_industri' => $latihanindustri,
		'tempoh_pusat' => $latihanpusat,
		'tarikh_dikuatkuasa' => $date
	);

	$cekmodul = $this->Konfigurasi_model->coba_exists2($id);
	$test = count($cekmodul);

	if ($tahap != $tahap2 AND $test <> '') {
	$cek = $this->Konfigurasi_model->cek_idpelatih($id)->result();
	foreach ($cek as $b) {
	//var_dump($b);die();
	$data2 = array(
		'skgm' => NULL,
		'saegm' => NULL,
		'spgm' => NULL,
		'sklgm' => NULL,
		'smgm' => NULL,
		
	);


	$this->db->where('id_pelatih',$b->id_pelatih);
	$this->db->update('markah_modul_status',$data2);
//	echo  $this->db->last_query();exit();
	}

	$this->db->where('id',$id);
	$this->db->update('ref_kursus',$data);
	redirect('admin/konfigurasi_kurikulum/aturkursus2/'.$idSeq);

	} else {
	$this->db->where('id',$id);
	$this->db->update('ref_kursus',$data);
//	echo  $this->db->last_query();exit();
	redirect('admin/konfigurasi_kurikulum/aturkursus2/'.$idSeq);
	}
		}

	function update_kursus(){

	$id = $this->input->post('id');
	$idSeq = $this->input->post('idSeq');
	$kluster = $this->input->post('kluster');
	$nama = $this->input->post('nama');
	$sijil = $this->input->post('sijil');
	$latihanpusat = $this->input->post('latihanpusat');
	$jenisstatus = $this->input->post('jenisstatus');
	$tahap = $this->input->post('tahap');
	$kodekursus = $this->input->post('kodekursus');
	$kodeskm = $this->input->post('kodeskm');
	$idSeq = $this->input->post('idSeq');
	$latihanindustri = $this->input->post('latihanindustri');
	$date = date("d/m/Y");

	$data = array(
		'id_kluster' => $kluster,
		'status_kursus' => $jenisstatus,
		'kod_kursus' => $kodekursus,
		'nama_kursus' => $nama,
		'jenis_kursus' => $tahap,
		'nama_kursus_sijil' => $sijil,
		'kod_skm' => $kodeskm,
		'tempoh_industri' => $latihanindustri,
		'tempoh_pusat' => $latihanpusat,
		'tarikh_dikuatkuasa' => $date
	);

	$this->db->where('id',$id);
	$this->db->update('ref_kursus',$data);
	//echo  $this->db->last_query();exit();
	redirect('admin/konfigurasi_kurikulum/aturkursus2/'.$idSeq);
	}


	function padamkursus(){
	$id = $this->uri->segment(4);
	$id2 = $this->uri->segment(5);
	$id3 = $this->uri->segment(6);
	$idSeq = $id."/".$id2."/".$id3;
	$data["idSeq"] = $idSeq;
	
	$cekmodul = $this->Konfigurasi_model->coba_exists2($id);
	$test = count($cekmodul);

	if ($test <> '') {
	$data['kursusdetail'] = $this->Konfigurasi_model->get_padamkursus($id)->result();
	$this->load->view('konfigurasi/kursus/peringatan',$data);	
	} else {
	  $this ->db-> where('id', $id);
  	  $this ->db-> delete('ref_kursus');
	redirect('admin/Konfigurasi_kurikulum/aturkursus2/'.$idSeq);
	}
	
	}

	public function deletelagikursus(){
  $id = $this->uri->segment(4);
 		
  $this ->db-> where('id', $idkursus);
  $this ->db-> delete('ref_kursus');

  $this ->db-> where('id_kursus', $idkursus);
  $this ->db-> delete('settings_tawaran_kursus');

  $this ->db-> where('id_kursus', $idkursus);
  $this ->db-> delete('ref_modul');

redirect('admin/Konfigurasi_kurikulum/aturkursus');
}

	function padamkursus2(){
		$idkursus = $this->uri->segment(4);
	$kursus = urldecode($this->uri->segment(5));
	$kluster = urldecode($this->uri->segment(6));
	$status = urldecode($this->uri->segment(7));
				
  $this ->db-> where('id', $idkursus);
  $this ->db-> delete('ref_kursus');
	//echo  $this->db->last_query();exit();
	redirect('admin/Konfigurasi_kurikulum/aturkursus2/'.$kursus."/".$kluster."/".$status);

	}

	public function aturmodul(){
		
		$this->mPageTitle = "Pengurusan Modul";
		$idUser = $this->ion_auth->user()->row()->id;
		$this->mViewData['kluster'] = $this->Kurikulum_model->get_kluster()->result();
		$this->render('konfigurasi/modul/index');
	}

		public function ajaxkursus($id) {
		
		$query = $this->Konfigurasi_model->ajax_kursus($id)->result();

		if ($query) {
			echo json_encode($query);
		}else {
			echo json_last_error_msg();
		}
	}

	public function aturmodul2(){
		
		$id = urldecode($this->uri->segment(4));
		$id2 = urldecode($this->uri->segment(5));
	
		if ($id != '') {
		$kursus = $id;
		$kluster = $id2;
				} else {
		$kursus = $this->input->post('kursus');
		$kluster = $this->input->post('kluster');
		} 

		$data['kursus'] = $kursus;
		$data['kluster2'] = $kluster;

		$data['klusterpilih'] = $this->Kurikulum_model->get_kluster2($kluster)->result();
		$data['kluster'] = $this->Kurikulum_model->get_kluster()->result();
		
		$data['kursuspilih'] = $this->Konfigurasi_model->ajax_kursus2($kursus)->result();
		$data['kursus2'] = $this->Konfigurasi_model->ajax_kursus3()->result();

		$data['moduldetail'] = $this->Konfigurasi_model->get_senarai_modul($kursus)->result();
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
	
		$this->load->view('konfigurasi/modul/index2',$data);	
		
	}

	public function createmodul(){

	$id = urldecode($this->uri->segment(4));
	$id2 = urldecode($this->uri->segment(5));


	$data['kluster'] = $id;
	$data['kursus'] = $id2;
	$data['idkluster'] = $id2;
	$data['idkursus'] = $id;
	
	$data["idSeq"] = $id."/".$id2;
	$data['kluster'] = $this->Kurikulum_model->get_kluster()->result();
	$data['kursus'] = $this->Kurikulum_model->get_kursus2($id)->result();
	$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$this->load->view('konfigurasi/modul/create',$data);
	}


	public function storemodul(){
	
	$idkursus = $this->input->post('kursus');
	$kodemodul = $this->input->post('kodemodul');
	$namamodul = $this->input->post('namamodul');
	$teori = $this->input->post('teori');
	$amali = $this->input->post('amali');
	$jamkredit = $this->input->post('jamkredit');
	$perteori = $this->input->post('peratusanpb');
	$peramali = $this->input->post('peratusanpm');
	$pbteori = $this->input->post('pbteori');
	$pbamali = $this->input->post('pbamali');
	$pmteori = $this->input->post('pmteori');
	$pmamali = $this->input->post('pmamali');

	$kursus = $this->input->post('kursus2');
 	$kluster = $this->input->post('kluster2');

	$kursus2 = $this->input->post('kursus');
 	$kluster2 = $this->input->post('kluster');
 	//var_dump($kursus);die();
	$idSeq = $kursus."/".$kluster;
	$idSeq2 = $kursus2."/".$kluster2;

 	$cek = $this->Konfigurasi_model->coba_exists2($idkursus);
 	$count = count($cek);

	if ($count <> '') {
  echo "<script>  alert('Senarai modul tidak boleh dikemaskini kerana proses pemarkahan sedang berjalan.');
    window.location='".site_url("admin/konfigurasi_kurikulum/aturmodul2/$idSeq2")."';
  
  </script>";
	
    } else {
      $data = array(
		'id_kursus' => $idkursus,
		'kod_modul' => $kodemodul,
		'nama_modul' => $namamodul,
		'teori' => $teori,
		'praktikal' => $amali,
		'jam_kredit' => $jamkredit,
		'pam_peratus' => $peramali,
		'pb_peratus' => $perteori,
		'pb_teori' => $pbteori,
		'pam_teori' => $pmteori,
		'pb_praktikal' => $pbamali,
		'pam_praktikal' => $pmamali
	);

	$this->db->insert('ref_modul',$data);
	redirect('admin/konfigurasi_kurikulum/aturmodul2/'.$idSeq2);
    }

 	}

	public function editmodul(){
	$idkursus = urldecode($this->uri->segment(4));
	$idkluster = urldecode($this->uri->segment(5));
	$idmodul = urldecode($this->uri->segment(6));

	$data["kursus"] = $idkursus;
	$data["kluster"] = $idkluster;
	
	$cek = $this->Konfigurasi_model->cek_modul($idmodul);
 	$count = count($cek);
 	$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
	$data["idSeq"] = $idkursus."/".$idkluster."/".$idmodul;
	$data["count"] = $count;
	
	$data['moduldetail'] = $this->Konfigurasi_model->edit_modul($idmodul)->result();
	$data['kluster'] = $this->Kurikulum_model->get_kluster()->result();
	$this->load->view('konfigurasi/modul/edit',$data);
	}

	function updatemodul(){

	$idkursus = $this->input->post('kursus');
	$idmodul = $this->input->post('idmodul');
	$kodemodul = $this->input->post('kodemodul');
	$namamodul = $this->input->post('namamodul');
	$teori = $this->input->post('teori');
	$amali = $this->input->post('amali');
	$jamkredit = $this->input->post('jamkredit');
	$perteori = $this->input->post('peratusanpb');
	$peramali = $this->input->post('peratusanpm');
	$pbteori = $this->input->post('pbteori');
	$pbamali = $this->input->post('pbamali');
	$pmteori = $this->input->post('pmteori');
	$pmamali = $this->input->post('pmamali');

	$kursus = $this->input->post('kursus');
 	$kluster = $this->input->post('kluster');
 	$idSeq = $this->input->post('idSeq');
 	// $idSeq = $kursus."/".$kluster;

	$data = array(
		'id_kursus' => $idkursus,
		'kod_modul' => $kodemodul,
		'nama_modul' => $namamodul,
		'teori' => $teori,
		'praktikal' => $amali,
		'jam_kredit' => $jamkredit,
		'pam_peratus' => $peramali,
		'pb_peratus' => $perteori,
		'pb_teori' => $pbteori,
		'pam_teori' => $pmteori,
		'pb_praktikal' => $pbamali,
		'pam_praktikal' => $pmamali
	);

	$this->db->where('id_modul',$idmodul);
	$this->db->update('ref_modul',$data);
	//echo  $this->db->last_query();exit();
	redirect('admin/konfigurasi_kurikulum/aturmodul2/'.$idSeq);
	}

	function padammodul(){

	$idkursus = $this->uri->segment(4);
	$kluster = $this->uri->segment(5);
	$idmodul = $this->uri->segment(6);
	$idSeq = $idkursus."/".$kluster."/".$idmodul;

	$data["kursus"] = $idkursus;
	$data["kluster"] = $idkluster;
	$data["idSeq"] = $idSeq;

	$cek = $this->Konfigurasi_model->cek_modul($idmodul);
 	$count = count($cek);

	if ($count <> '') {
    $data['moduldetail'] = $this->Konfigurasi_model->get_padammodul($idmodul)->result();
	$this->load->view('konfigurasi/modul/peringatan',$data);	
        
    } else {
        echo "<script>  if (confirm('Adakah anda pasti untuk memadam kluster ini?') == true) {
    window.location='".site_url("admin/Konfigurasi_kurikulum/delete_modul/$idkursus/$kluster/$idmodul")."';
  } else {
    window.location='".site_url("admin/Konfigurasi_kurikulum/aturkluster2/$idkursus/$kluster")."';
  }
  </script>";
    }

	}

	function delete_modul(){
	$idkursus = $this->uri->segment(4);
	$kluster = $this->uri->segment(5);
	$idmodul = $this->uri->segment(6);

	  $this ->db-> where('id_modul', $idmodul);
  	  $this ->db-> delete('ref_modul');
	redirect('admin/Konfigurasi_kurikulum/aturmodul2/'.$idkursus."/".$kluster);
		}


public function deletelagimodul(){
  $idmodul = $this->uri->segment(4);
  $idkursus = $this->uri->segment(5);
  $idkluster = $this->uri->segment(6);
   $this ->db-> where('id_kursus', $idkursus);
  $this ->db-> delete('settings_tawaran_kursus');

  $this ->db-> where('id_modul', $idmodul);
  $this ->db-> delete('ref_modul');

  $this ->db-> where('id_modul', $idmodul);
  $this ->db-> delete('markah_modul');

redirect('admin/Konfigurasi_kurikulum/aturmodul2'."/".$idkursus."/".$kluster);
}

	public function aturtawaran(){
		$this->mPageTitle = "Pengurusan Tawaran Kursus";
		$idUser = $this->ion_auth->user()->row()->id;

		$this->mViewData['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$this->mViewData['kluster'] = $this->Kurikulum_model->get_kluster()->result();
		$this->mViewData['sesi'] = $this->Kurikulum_model->get_intake()->result();
		$this->render('konfigurasi/setting/indextawaran');
	}

	public function padamtawaran(){
		$kluster=$this->uri->segment(4);
		$kursus=$this->uri->segment(5);
		$intake=$this->uri->segment(6);
		$this ->db->where('id', $this->uri->segment(7));
		$this ->db->delete('settings_tawaran_kursus');
		redirect('admin/Konfigurasi_kurikulum/tambahtawaran'."/".$kluster."/".$kursus."/".$intake);
	}
		
	public function tambahtawaran(){
		$this->mPageTitle = "Pengurusan Tawaran Kursus";
		$idUser = $this->ion_auth->user()->row()->id;
		$kluster=$this->uri->segment(4);
		$kursus=$this->uri->segment(5);
		$intake=$this->uri->segment(6);
		
		if($this->input->post('simpan')){ 
			/*$qryi = "INSERT INTO settings_tawaran_kursus (id_kursus, id_giatmara, id_intake, markah_lulus_modul, status) VALUES (
					'".$kursus."',
					'".$this->input->post('giatmara')."',
					'".$intake."',
					'60','1'
					)";
			$sqli =;*/
			$data['id_kursus']=$kursus;
			$data['id_giatmara']=$this->input->post('giatmara');
			$data['id_intake']=$intake;
			$data['markah_lulus_modul']='60';
			$data['status']='1';
		$where = array(
    		'id_kursus' => $data['id_kursus'],
			'id_intake' => $data['id_intake'],
			'id_giatmara' => $data['id_giatmara'],
    		);
    	$cek = $this->db->get_where('settings_tawaran_kursus',$where)->num_rows();
		//$this->db->cek_idpermohonan("kelulusan_lpp09",$where)->num_rows();
    	if($cek <1)
        {
			$this->Konfigurasi_model->simpan_tawaran_kursus($data);
		}
		}
		
		
  
		$this->mViewData['senaraipusat'] = $this->Konfigurasi_model->get_senarai_setting3($kursus)->result();
		$this->mViewData['bilmodul'] = $this->Konfigurasi_model->get_bilmodul($kursus)->result();
		//$data['klusterpilih'] = $this->Kurikulum_model->get_kluster2($kluster)->result();
		//$data['kluster2'] = $this->Kurikulum_model->get_kluster()->result();
		$this->mViewData['klusterpilih'] = $this->Kurikulum_model->get_kluster2($kluster)->result();
		$this->mViewData['kluster2'] = $this->Kurikulum_model->get_kluster()->result();
		
		$this->mViewData['kursuspilih'] = $this->Konfigurasi_model->ajax_kursus2($kursus)->result();
		$this->mViewData['kursus2'] = $this->Kurikulum_model->get_kursus();

		$this->mViewData['intakepilih'] = $this->Kurikulum_model->get_intake2($intake)->result();
		$this->mViewData['intake2'] = $this->Kurikulum_model->get_intake();
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$this->mViewData['negeri'] = $this->Kurikulum_model->get_negeri()->result();
		
		$this->mViewData['kluster']=$kluster;
		$this->mViewData['kursus']=$kursus;
		$this->mViewData['intake']=$intake;
		$this->render('konfigurasi/setting/indextambah');
		//$this->load->view('konfigurasi/setting/indextambah',$data);	
	}
	
	
	public function aturtawaran2(){
		
		$id = urldecode($this->uri->segment(4));
		$id2 = urldecode($this->uri->segment(5));
		$id3 = urldecode($this->uri->segment(6));
		$id4 = urldecode($this->uri->segment(7));

		if ($id != '') {
		$kluster = $id;
		$kursus = $id2;
		$intake = $id3;
				} else {
		$kluster = $this->input->post('kluster');
		$kursus= $this->input->post('kursus');
		$intake = $this->input->post('intake');
		} 

		$data['kluster'] = $kluster;
		$data['kursus'] = $kursus;
		$data['intake'] = $intake;
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		if($this->input->post('tambah')){ 
		//$this->load->view('konfigurasi/setting/indextambah',$data);
		redirect('admin/Konfigurasi_kurikulum/tambahtawaran'."/".$kluster."/".$kursus."/".$intake);
		}
		
		$data['klusterpilih'] = $this->Kurikulum_model->get_kluster2($kluster)->result();
		$data['kluster'] = $this->Kurikulum_model->get_kluster()->result();
		
		$data['kursuspilih'] = $this->Konfigurasi_model->ajax_kursus2($kursus)->result();
		$data['kursus2'] = $this->Kurikulum_model->get_kursus();

		$data['intakepilih'] = $this->Kurikulum_model->get_intake2($intake)->result();
		$data['intake2'] = $this->Kurikulum_model->get_intake();

		$data['settingdetail'] = $this->Konfigurasi_model->get_senarai_setting($kursus,$intake)->result();
		$data['senaraipusat'] = $this->Konfigurasi_model->get_senarai_setting2($kursus)->result();
		$data['bilmodul'] = $this->Konfigurasi_model->get_bilmodul($kursus)->result();
		$this->load->view('konfigurasi/setting/indextawaran2',$data);	
		
	}


	public function atursesi(){
		$this->mPageTitle = "Pengurusan Sesi ";
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$data['sesidetail'] = $this->Kurikulum_model->get_intake()->result();
		$this->load->view('konfigurasi/sesi/index',$data);
	}


	public function editsesi($id){
		$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$data['sesidetail'] = $this->Kurikulum_model->get_intake2($id)->result();
		$this->load->view('konfigurasi/sesi/edit',$data);
	}

	public function updatesesi(){
	$id = $this->input->post('id');
	$kodesesi = $this->input->post('kodesesi');
	$kodesesipelaporan = $this->input->post('kodesesipelaporan');
	$penerangansesi = $this->input->post('penerangansesi');
	$tarikhmula2 =$this->input->post('tarikhmula');
	$tarikhtamat2 = $this->input->post('tarikhtamat');
	$tarikhmulapermohonan2 = $this->input->post('tarikhmulapermohonan');
	$tarikhtamatpermohonan2 = $this->input->post('tarikhtamatpermohonan');
 	$date = date('Y-m-d H:i:s');
 	$diwujudkanoleh = $this->ion_auth->user()->row()->first_name;
 	$tarikhmula = date("Y-m-d", strtotime($tarikhmula2));
 	$tarikhtamat = date("Y-m-d", strtotime($tarikhtamat2));
 	$tarikhmulapermohonan = date("Y-m-d", strtotime($tarikhmulapermohonan2));
 	$tarikhtamatpermohonan = date("Y-m-d", strtotime($tarikhtamatpermohonan2));

 //	var_dump($diwujudkanoleh);die();

	$data = array(
		'kod_intake' => $kodesesi,
		'nama_intake' => $penerangansesi,
		'kod_intake_pelaporan' => $kodesesipelaporan,
		'tarikh_mula' => $tarikhmula,
		'tarikh_tamat' => $tarikhtamat,
		'tarikh_mula_permohonan' => $tarikhmulapermohonan,
		'tarikh_tamat_permohonan' => $tarikhtamatpermohonan,
		'tarikh_mula' => $tarikhmula,
		'diwujudkan_oleh' => $diwujudkanoleh,
		'tarikh_diwujudkan' => $date,
		'tarikh_tamat' => $tarikhtamat
	);


	$where = array(
		'id' => $id
	);
 
	$this->db->where($where);
	$this->db->update('ref_intake',$data);
	//echo  $this->db->last_query();exit();
	
	$data['sesidetail'] = $this->Kurikulum_model->get_intake()->result();
	redirect('admin/konfigurasi_kurikulum/atursesi',$data);

	}

	public function createsesi(){
	$this->load->model('Kurikulum_model');
	$id = $this->uri->segment(4);
	$id2 = urldecode($this->uri->segment(5));
	$id3 = urldecode($this->uri->segment(6));
	$data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
	$this->load->view('konfigurasi/sesi/create');
	}

	public function storesesi(){
		
	$kodesesi = $this->input->post('kodesesi');
	$kodesesipelaporan = $this->input->post('kodesesipelaporan');
	$penerangansesi = $this->input->post('penerangansesi');
	$tarikhmula2 =$this->input->post('tarikhmula');
	$tarikhtamat2 = $this->input->post('tarikhtamat');
	$tarikhmulapermohonan2 = $this->input->post('tarikhmulapermohonan');
	$tarikhtamatpermohonan2 = $this->input->post('tarikhtamatpermohonan');
 	$date = date('Y-m-d H:i:s');
 	$diwujudkanoleh =  $this->ion_auth->user()->row()->first_name;
 	$tarikhmula = date("Y-m-d", strtotime($tarikhmula2));
 	$tarikhtamat = date("Y-m-d", strtotime($tarikhtamat2));
 	$tarikhmulapermohonan = date("Y-m-d", strtotime($tarikhmulapermohonan2));
 	$tarikhtamatpermohonan = date("Y-m-d", strtotime($tarikhtamatpermohonan2));

 	//var_dump($tarikhmula);die();

	$data = array(
		'kod_intake' => $kodesesi,
		'nama_intake' => $penerangansesi,
		'kod_intake_pelaporan' => $kodesesipelaporan,
		'tarikh_mula' => $tarikhmula,
		'tarikh_tamat' => $tarikhtamat,
		'tarikh_mula_permohonan' => $tarikhmulapermohonan,
		'tarikh_tamat_permohonan' => $tarikhtamatpermohonan,
		'tarikh_mula' => $tarikhmula,
		'diwujudkan_oleh' => $diwujudkanoleh,
		'tarikh_diwujudkan' => $date,
		'tarikh_tamat' => $tarikhtamat
	);



	$this->db->insert('ref_intake',$data);
	//echo  $this->db->last_query();exit();
	
	$data['sesidetail'] = $this->Kurikulum_model->get_intake()->result();
	redirect('admin/konfigurasi_kurikulum/atursesi',$data);
	}

	
	function padamsesi(){

	$id = $this->uri->segment(4);
	//var_dump($id);die();
	
	 $exists = $this->Konfigurasi_model->cek_ref_intake($id);

    $count = count($exists);

 
   // var_dump($count);die();

    if ($count == "") {
    echo "<script>  if (confirm('Adakah anda pasti untuk memadam sesi ini?') == true) {
    window.location='".site_url("admin/Konfigurasi_kurikulum/delete_sesi/$id")."';
  	} else {
    window.location='".site_url("admin/Konfigurasi_kurikulum/atursesi")."';
 	 }
  </script>";
        
    } else {
    $data['sesidetail'] = $this->Konfigurasi_model->get_list_intake($id)->result();
    $data['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
	$this->load->view('konfigurasi/sesi/peringatan',$data);
    }
	}
	
	function delete_sesi(){
	$idintake = $this->uri->segment(4);
	$this->db->where('id', $idintake);
  	$this->db->delete('ref_intake');
	redirect('admin/Konfigurasi_kurikulum/atursesi');
		}

	function deletesetting(){
	$idintake = $this->uri->segment(4);
	$this->db->where('id_intake', $idintake);
  	$this->db->delete('settings_tawaran_kursus');
	redirect('admin/Konfigurasi_kurikulum/atursesi');
		}

	public function ajaxgiatmara($id) {
		
		$query = $this->Konfigurasi_model->ajax_giatmara($id)->result();
		if ($query) {
			echo json_encode($query);
		}else {
			echo json_last_error_msg();
		}
	}


	public function ajaxkursus2($id) {
		
		$query = $this->Konfigurasi_model->ajax_kursus_from_giatmara($id)->result();
		if ($query) {
			echo json_encode($query);
		}else {
			echo json_last_error_msg();
		}
	}

	public function ajaxintake($id) {
		
		$query = $this->Konfigurasi_model->ajax_intake_from_kursus($id)->result();
		if ($query) {
			echo json_encode($query);
		}else {
			echo json_last_error_msg();
		}
	}

}
?>