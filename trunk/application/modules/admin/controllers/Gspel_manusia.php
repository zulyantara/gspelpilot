<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gspel_manusia extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_builder');
		$this->load->model("Gspel_manusia_model", "gmm");
		$this->load->model("Lpp04_model","lpp04");
	}

	/**
	 * @author Zulyantara <zulyantara@gmail.com>
	 * Last update : toosa
	 */
	public function index()
	{
		$this->mViewData["res_negeri"] = $this->gmm->get_res_negeri();
		$this->mViewData["res_kursus"] = $this->gmm->get_res_kursus();
		$this->mViewData["res_jabatan"] = $this->gmm->get_res_jabatan();
		$this->mViewData["res_jawatan"] = $this->gmm->get_res_jawatan();

		$this->mViewData['groups'] = $this->ion_auth->get_users_groups($data['id'])->row()->name;
		$this->mViewData["prev_page"] = current_url();

		$this->mViewData["res_staff"] = $this->gmm->get_filter_staff($no_mykad,$nama,$gaji,$negeri,$giatmara,$kursus,$jabatan);
		// $this->mViewData["res_staff"] = $this->gmm->get_staff("result",NULL,NULL);

		if ($this->input->post('btn_cari') === "cari")
		{
			$no_mykad = $this->input->post('txt_no_mykad') != "" ? $this->input->post('txt_no_mykad') : NULL;
			$nama = $this->input->post('txt_nama') != "" ? $this->input->post('txt_nama') : NULL;
			$gaji = $this->input->post('txt_gaji') != "" ? $this->input->post('txt_gaji') : NULL;
			$negeri = $this->input->post('opt_negeri') != "" ? $this->input->post('opt_negeri') : NULL;
			$giatmara = $this->input->post('opt_giatmara') != "" ? $this->input->post('opt_giatmara') : NULL;
			$kursus = $this->input->post('opt_kursus') != "" ? $this->input->post('opt_kursus') : NULL;
			$jabatan = $this->input->post('opt_jabatan') != "" ? $this->input->post('opt_jabatan') : NULL;
			$jawatan = $this->input->post('opt_jawatan') != "" ? $this->input->post('opt_jawatan') : NULL;

			$this->mViewData["res_staff"] = $this->gmm->get_filter_staff($no_mykad,$nama,$gaji,$negeri,$giatmara,$kursus,$jabatan);
			// echo '<pre>'; print_r($no_mykad); echo '</pre>';
			// exit;
			// $where=array('nama' => $nama);
			// $this->mViewData["res_staff"] = $this->gmm->get_staff("result",NULL,$where);

		}

		$this->mPageTitle = 'Sumber Manusia';
		$this->render("gspel_manusia/senarai_anggota");
	}

	function ajax_giatmara()
	{
		$id_negeri = $this->input->post('id_negeri');
		$where["id_negeri"] = $id_negeri;
		$where["id_type_giatmara"] = 1;
		$res_giatmara = $this->gmm->get_res_giatmara($where);
		echo "<option value=\"\">Sila Pilih</option>";
		if ($res_giatmara !== FALSE)
		{
			foreach ($res_giatmara as $val)
			{
				?>
				<option value="<?php echo $val->id; ?>"><?php echo "[".$val->kod_giatmara."] ".$val->nama_giatmara; ?></option>
				<?php
			}
		}
	}

	function ajax_giatmara_kursus($id_giatmara)
	{
		//$id_giatmara = $this->input->post('id_giatmara');
		// echo '<pre>'; print_r($id_giatmara); echo '</pre>';
		//$status = $this->input->post('status');
		//$where = array('id_giatmara' => $id_giatmara);
		$where["id_giatmara"] = $id_giatmara;
		$where["status"] = '1';
		// $where["id_giatmara"] = $id_giatmara;
		// $res_giatmara = $this->gmm->get_res_giatmara($where);
		$res_kursus_giatmara = $this->lpp04->get_giatmara_kursus("*",$where,NULL);
		// echo '<pre>'; print_r($res_kursus_giatmara); echo '</pre>';
		// exit;
		echo "<option value=\"\">Sila Pilih</option>";
		if ($res_kursus_giatmara !== FALSE)
		{
			foreach ($res_kursus_giatmara as $val)
			{
				?>
				<option value="<?php echo $val->id_kursus; ?>"><?php echo "[".$val->id_kursus."] ".$val->nama_kursus; ?></option>
				<?php
			}
		}
	}

	public function tugas_per_staff($id)
	// Toosa
	{
		if ($id != NULL)
		{
			$where["id"]=$id;
			$this->mViewData["id"] = $id;
			$url = "gspel_manusia/tugas_per_staff/";
			$this->mViewData["prev_url"] = $url;
			$res_sipt = $this->gmm->get_staff("row", NULL, $where);
			$this->mViewData["res_sipt"] = $res_sipt;

			$this->mViewData["res_negeri"] = $this->gmm->get_res_negeri();
			$this->mViewData["res_giatmara"] = $this->gmm->get_res_giatmara(NULL);
			$this->mViewData["res_kursus"] = $this->gmm->get_res_kursus();
			$this->mViewData["res_jabatan"] = $this->gmm->get_res_jabatan();
			$this->mViewData["res_jawatan"] = $this->gmm->get_res_jawatan();
			$this->mViewData["res_jenis_jawatan"] = $this->gmm->get_res_jenis_jawatan();
			$this->mViewData["res_agama"] = $this->gmm->get_res_agama(NULL);
			$this->mViewData["res_bangsa"] = $this->gmm->get_res_bangsa(NULL);
			$this->mViewData["res_taraf_perkahwinan"] = $this->gmm->get_res_perkahwinan(NULL);

			$this->mViewData["prev_page"] = current_url();

			$this->mViewData["res_staff"] = $this->gmm->get_filter_staff($no_mykad,$nama,$gaji,$negeri,$giatmara,$kursus,$jabatan);


			//$where["id_staff_info_pangku_tugas"] = $id;
			$row_tugas = $this->gmm->get_staff_info_pangku_tugas("result", NULL, array('id_staff' => $id));

			$this->mViewData["row_tugas"] = $row_tugas;
			$jumlah_tugas = count($row_tugas);
			// echo '<pre>'; print_r($jumlah_tugas); echo '</pre>';
			// exit;
			$this->mViewData["jumlah_tugas"] = $jumlah_tugas;
			// echo '<pre>'; print_r($row_tugas); echo '</pre>';exit;
		}

		$this->mPageTitle = 'Sumber Manusia : Pangku Tugas';
		$this->render("gspel_manusia/senarai_pangku_tugas");
	}

	public function tugas()
	{
		if ($this->input->post('btn_cari') === "cari")
		{
			$no_mykad = $this->input->post('txt_no_mykad') != "" ? $this->input->post('txt_no_mykad') : NULL;
			$nama = $this->input->post('txt_nama') != "" ? $this->input->post('txt_nama') : NULL;
			$gaji = $this->input->post('txt_gaji') != "" ? $this->input->post('txt_gaji') : NULL;

			if ($no_mykad !== NULL)
			{
				$like["no_mykad"] = $no_mykad;
			}
			if ($nama !== NULL)
			{
				$like["nama"] = $nama;
			}
			if ($gaji !== NULL)
			{
				$like["no_gaji"] = $gaji;
			}
			$like = NULL;

			$this->mViewData["res_staff"] = $this->gmm->get_staff("result", $like);
		}

		$this->mPageTitle = 'Sumber Manusia';
		$this->render("gspel_manusia/memangku_tugas");
	}

	function pangku_tugas($id_tugas)
	{
		$this->load->helper('form');
		$where = array("id_staff_info_pangku_tugas" => $id_tugas);
		// echo '<pre>'; print_r($where); echo '</pre>';
		// exit;
		$this->mViewData["row_staff"] = $this->gmm->get_staff_info_pangku_tugas("row", NULL, $where);
		// $this->mViewData["prev_url"] = current_url();
		$this->mViewData["prev_url"] = "gspel_manusia/tugas_per_staff";
		//site_url("admin/gspel_manusia/tugas_per_staff/".$val->id_staff
		$this->mViewData["jenis_proses"] = "edit_pangku_tugas";

		$this->mViewData["res_jabatan"] = $this->gmm->get_res_jabatan();
		$this->mViewData["res_jawatan"] = $this->gmm->get_res_jawatan();
		$this->mViewData["res_jenis_jawatan"] = $this->gmm->get_res_jenis_jawatan();
		$this->mViewData["res_negeri"] = $this->gmm->get_res_negeri();
		$this->mViewData["res_giatmara"] = $this->gmm->get_res_giatmara(NULL);
		$this->mViewData["res_kursus"] = $this->gmm->get_res_kursus();

		if ($this->input->post("btn_simpan") === "simpan")
		{

			$tarikh_mula = DateTime::createFromFormat('d-m-Y',$this->input->post('txt_tarikh_mula_tugas'));
			$tarikh_tamat = DateTime::createFromFormat('d-m-Y',$this->input->post('txt_tarikh_tamat_tugas'));

			$data["id"] = $this->input->post('id_tugas');
			$data["id_staff"] = $this->input->post('id_staff');
			$data["id_jabatan"] = $this->input->post('opt_jabatan');
			$data["id_jawatan"] = $this->input->post('opt_jawatan');
			$data["status_jawatan"] = $this->input->post('opt_status_jawatan');
			$data["id_jenis_jawatan"] = $this->input->post('opt_jenis_jawatan');
			$data["id_negeri"] = $this->input->post('opt_negeri');
			$data["id_giatmara"] = $this->input->post('opt_giatmara');
			$data["id_kursus"] = $this->input->post('opt_kursus');
			//$data["tarikh_mula_tugas"] = $this->input->post('txt_tarikh_mula_tugas');
			//$data["tarikh_tamat_tugas"] = $this->input->post('txt_tarikh_tamat_tugas');
			$data["tarikh_mula_tugas"] = $tarikh_mula->format('Y-m-d');
			$data["tarikh_tamat_tugas"] = $tarikh_tamat->format('Y-m-d');

			$data["status"] = $this->input->post('opt_status_pangku_tugas');
			// echo '<pre>'; print_r($data); echo '</pre>';
			// exit;
			$this->gmm->simpan_info_pangku_tugas($data);
		}

		$this->mPageTitle = 'Edit Pangku Tugas';
		$this->render("gspel_manusia/form_edit_pangku_tugas");
		//$this->render("gspel_manusia/form_edit_staff_pangku");
	}

	function simpan_pangku_tugas($id_tugas)
	{
		$this->load->helper('form');
		$where = array("id_staff_info_pangku_tugas" => $id_tugas);
		// echo '<pre>'; print_r($_POST); echo '</pre>';
		// exit;
		$this->mViewData["row_staff"] = $this->gmm->get_staff_info_pangku_tugas("row", NULL, $where);
		// $this->mViewData["prev_url"] = current_url();
		$this->mViewData["prev_url"] = "gspel_manusia/tugas_per_staff";
		//site_url("admin/gspel_manusia/tugas_per_staff/".$val->id_staff
		$this->mViewData["jenis_proses"] = "edit_pangku_tugas";

		$this->mViewData["res_jabatan"] = $this->gmm->get_res_jabatan();
		$this->mViewData["res_jawatan"] = $this->gmm->get_res_jawatan();
		$this->mViewData["res_jenis_jawatan"] = $this->gmm->get_res_jenis_jawatan();
		$this->mViewData["res_negeri"] = $this->gmm->get_res_negeri();
		$this->mViewData["res_giatmara"] = $this->gmm->get_res_giatmara(NULL);
		$this->mViewData["res_kursus"] = $this->gmm->get_res_kursus();

		if ($this->input->post("btn_simpan") === "simpan")
		{
			// print_r($_POST);exit;
			$tarikh_mula = DateTime::createFromFormat('d-m-Y',$_POST['txt_tarikh_mula_tugas']);
			$tarikh_tamat = DateTime::createFromFormat('d-m-Y',$_POST['txt_tarikh_tamat_tugas']);

			$data["id"] = $this->input->post('id_tugas');
			$data["id_staff"] = $this->input->post('id_staff');
			$data["id_jabatan"] = $this->input->post('opt_jabatan');
			$data["id_jawatan"] = $this->input->post('opt_jawatan');
			$data["status_jawatan"] = $this->input->post('opt_status_jawatan');
			$data["id_jenis_jawatan"] = $this->input->post('opt_jenis_jawatan');
			$data["id_negeri"] = $this->input->post('opt_negeri');
			$data["id_giatmara"] = $this->input->post('opt_giatmara');
			$data["id_kursus"] = $this->input->post('opt_kursus');
			//$data["tarikh_mula_tugas"] = $this->input->post('txt_tarikh_mula_tugas');
			//$data["tarikh_tamat_tugas"] = $this->input->post('txt_tarikh_tamat_tugas');
			$data["tarikh_mula_tugas"] = $tarikh_mula->format('Y-m-d');
			$data["tarikh_tamat_tugas"] = $tarikh_tamat->format('Y-m-d');

			$data["status"] = $this->input->post('opt_status_pangku_tugas');

			// echo '<pre>'; print_r($data); echo '</pre>';
			// exit;

			$data["id"] = $_POST['id_tugas'];
			$data["id_staff"] = $_POST['id_staff'];
			$data["id_jabatan"] = $_POST['opt_jabatan'];
			$data["id_jawatan"] = $_POST['opt_jawatan'];
			$data["status_jawatan"] = $_POST['opt_status_jawatan'];
			$data["id_jenis_jawatan"] = $_POST['opt_jenis_jawatan'];
			$data["id_negeri"] = ($this->input->post('opt_negeri') == '') ? NULL : $this->input->post('opt_negeri');
			$data["id_giatmara"] = ($this->input->post('opt_giatmara') == '') ? NULL : $this->input->post('opt_giatmara');
			$data["id_kursus"] = ($this->input->post('opt_kursus') == '') ? NULL : $this->input->post('opt_kursus');
			//$data["tarikh_mula_tugas"] = $this->input->post('txt_tarikh_mula_tugas');
			//$data["tarikh_tamat_tugas"] = $this->input->post('txt_tarikh_tamat_tugas');
			$data["tarikh_mula_tugas"] = $tarikh_mula->format('Y-m-d');
			$data["tarikh_tamat_tugas"] = $tarikh_tamat->format('Y-m-d');

			$data["status"] = $_POST['opt_status_pangku_tugas'];

			$this->gmm->simpan_info_pangku_tugas($data);

			$where_jawatan["id"] = $data["id_jawatan"];
			$res_jawatan = $this->gmm->get_jawatan($where_jawatan)->row();

			$where_au["id_staff"] = $data["id_staff"];
			$res_au = $this->gmm->get_admin_users($where_au)->row();

			$data_aug["group_id"] = $res_jawatan->id_admin_groups;
			$where_aug["user_id"] = $res_au->id;
			$this->gmm->update_admin_groups($where_aug, $data_aug);

			redirect($_SERVER['HTTP_REFERER']);
		}
		//
		// $this->mPageTitle = 'Edit Pangku Tugas';
		// $this->render("gspel_manusia/form_edit_pangku_tugas");
		//$this->render("gspel_manusia/form_edit_staff_pangku");
	}

	function delete_pangku_tugas($id_staff_info_pangku_tugas)
	{
		// echo '<pre>'; print_r($id_staff_info_pangku_tugas); echo '</pre>';
		// exit;
		$this->gmm->delete_pangku_tugas_model($id_staff_info_pangku_tugas);
	}



	function add_pangku_tugas($id_staff)
	// Menambah pangku tugas untuk seorang staf
	{

		$this->load->helper('form');
		$this->load->helper('url');
		$where = array("id_staff" => $id_staff);
		// echo '<pre>'; print_r($where); echo '</pre>';
		// exit;
		$row_staff = $this->gmm->get_staff_info_pangku_tugas("row", NULL, $where);

		if (!$row_staff) {
			$where = array("id" => $id_staff);
			$row_staff = $this->gmm->get_staff("row",NULL,$where);
		}
		// echo '<pre>'; print_r($row_staff); echo '</pre>';
		// exit;
		$this->mViewData["row_staff"] = $row_staff;
		$this->mViewData["prev_url"] = "gspel_manusia/tugas_per_staff";
		$this->mViewData["jenis_proses"] = "add_pangku_tugas";

		$this->mViewData["res_jabatan"] = $this->gmm->get_res_jabatan();
		$this->mViewData["res_jawatan"] = $this->gmm->get_res_jawatan();
		$this->mViewData["res_jenis_jawatan"] = $this->gmm->get_res_jenis_jawatan();
		$this->mViewData["res_negeri"] = $this->gmm->get_res_negeri();
		$this->mViewData["res_giatmara"] = $this->gmm->get_res_giatmara(NULL);
		$this->mViewData["res_kursus"] = $this->gmm->get_res_kursus();

		//echo '<pre>'; print_r($id_staff); echo '</pre>';exit;
		if ($this->input->post("btn_simpan") === "simpan")
		{

			//$data["id"] = $this->input->post('id_tugas');
			$this->mViewData["prev_url"] = "gspel_manusia/tugas_per_staff/".$id_staff;
			$data["id_staff"] = $this->input->post('id_staff');
			$data["id_jabatan"] = $this->input->post('opt_jabatan');
			$data["id_jawatan"] = $this->input->post('opt_jawatan');
			$data["status_jawatan"] = $this->input->post('opt_status_jawatan');
			$data["id_jenis_jawatan"] = $this->input->post('opt_jenis_jawatan');
			$data["id_negeri"] = $this->input->post('opt_negeri');
			$data["id_giatmara"] = $this->input->post('opt_giatmara');
			$data["id_kursus"] = $this->input->post('opt_kursus');
			//$data["tarikh_mula_tugas"] = $this->input->post('txt_tarikh_mula_tugas');
			//$data["tarikh_tamat_tugas"] = $this->input->post('txt_tarikh_tamat_tugas');
			$tarikh_mula = DateTime::createFromFormat('d-m-Y',$this->input->post('txt_tarikh_mula_tugas'));
			$data["tarikh_mula_tugas"] = $tarikh_mula->format('Y-m-d');
			$tarikh_tamat = DateTime::createFromFormat('d-m-Y',$this->input->post('txt_tarikh_tamat_tugas'));
			$data["tarikh_tamat_tugas"] = $tarikh_tamat->format('Y-m-d');

			$data["status"] = $this->input->post('opt_status');

			//$this->gmm->simpan_info_pangku_tugas($data);
			$this->gmm->tambah_info_pangku_tugas($data);


		}

		$this->mPageTitle = 'Tambah Pangku Tugas';
		$this->render("gspel_manusia/form_edit_pangku_tugas");
		//$this->render("gspel_manusia/form_edit_staff_pangku");
	}

	function hapus_info_pangku_tugas($id_staff_info_pangku_tugas)
	{
		if ($id_staff_info_pangku_tugas != NULL)
		{
			$where["id"] = $id_staff_info_pangku_tugas;
			$this->gmm->hapus_info_pangku_tugas($where);
		}
		else
		{
			redirect('gspel_manusia','refresh');
		}
	}

	public function jawatan()
	{
		$this->load->model('user_model', 'users');
		$this->load->library('Grocery_CRUD_MultiSearch');
		$this->mViewData['count'] = array(
			'users' => $this->users->count_all(),
		);

		$crud = $this->generate_crud('ref_jawatan');
		$crud->set_subject('Konfigurasi Jawatan');
		$crud->columns('nama_jawatan','id_admin_groups');

		// cannot display Advanced Search
		//$crud->multisearch = false;

		// cannot change Admin User groups once created
		if ($crud->getState()=='list')
		{
			//$crud->set_relation_n_n('groups', 'admin_users_groups', 'admin_groups', 'user_id', 'group_id', 'name');
		}

		// only webmaster can reset Admin User password
		if ( $this->ion_auth->in_group(array('webmaster', 'admin')) )
		{
			//$crud->add_action('Reset Password', '', $this->mModule.'/panel/admin_user_reset_password', 'fa fa-repeat');
		}

		$this->render_crud();
		$this->mPageTitle = "Pengurusan Jawatan";
		//$this->render('gspel_manusia/jawatan');
	}

	public function jabatan()
	{
		// $this->load->model('user_model', 'users');
		// $this->load->library('Grocery_CRUD_MultiSearch');
		// $this->mViewData['count'] = array(
			// 'users' => $this->users->count_all(),
		// );

		$crud = $this->generate_crud('ref_jabatan');
		$crud->set_subject('Konfigurasi Jabatan');
		$crud->columns('nama_jabatan');

		// cannot display Advanced Search
		//$crud->multisearch = false;

		// cannot change Admin User groups once created
		if ($crud->getState()=='list')
		{
			//$crud->set_relation_n_n('groups', 'admin_users_groups', 'admin_groups', 'user_id', 'group_id', 'name');
		}

		// only webmaster can reset Admin User password
		if ( $this->ion_auth->in_group(array('webmaster', 'admin')) )
		{
			//$crud->add_action('Reset Password', '', $this->mModule.'/panel/admin_user_reset_password', 'fa fa-repeat');
		}

		$this->render_crud();
		$this->mPageTitle = "Pengurusan Jabatan";
		//$this->render('gspel_manusia/jawatan');
	}

	public function gred()
	{
		$crud = $this->generate_crud('ref_gred');
		$crud->columns("id",'nama_gred');

		$this->render_crud();

		$this->mPageTitle = "Pengurusan Gred";
		$this->render('gspel_manusia/gred');
	}

	public function status()
	{
		$crud = $this->generate_crud('ref_status');
		$crud->columns("id",'nama_status');

		$this->render_crud();

		$this->mPageTitle = "Pengurusan Status";
		$this->render('gspel_manusia/status');
	}

	public function jenis_staff()
	{
		$crud = $this->generate_crud('ref_jenis_staf');
		$crud->columns("id",'nama_jenis_staf');

		$this->render_crud();

		$this->mPageTitle = "Pengurusan Jenis Staff";
		$this->render('gspel_manusia/jenis_staff');
	}

	public function staff()
	{
		$crud = $this->generate_crud('staff');
		$crud->columns("id",'nama');

		$this->render_crud();

		$this->mPageTitle = "Pengurusan Staff";
		$this->render('gspel_manusia/staff');
	}

	function delete_staff($id_staff)
	{

		// $where["id"] = $id_staff;
		// echo '<pre>'; print_r($id_staff); echo '</pre>';
		// exit;
		$this->gmm->delete_staff_model($id_staff);
	}

	function edit_staff_info_pangku_tugas($id)
	{
		if ($id != NULL)
		{
			// $where["id_staff_info_pangku_tugas"] =$id;
			$where["id_staff_info_pangku_tugas"] =$id;
				$res_sipt = $this->gmm->get_staff_info_pangku_tugas("row", NULL, $where);
				//echo '<pre>'; print_r($res_sipt); echo '</pre>';
			$this->mViewData["res_sipt"] = $res_sipt;
			$this->mViewData["res_jabatan"] = $this->gmm->get_res_jabatan();
			$this->mViewData["res_jawatan"] = $this->gmm->get_res_jawatan();
			$this->mViewData["res_jenis_jawatan"] = $this->gmm->get_res_jenis_jawatan();
			$this->mViewData["res_negeri"] = $this->gmm->get_res_negeri();
			$this->mViewData["res_giatmara"] = $this->gmm->get_res_giatmara("id_negeri = ". $res_sipt->id_negeri);
			$this->mViewData["res_kursus"] = $this->gmm->get_res_kursus();

			$this->mPageTitle = 'Edit Sumber Manusia';
			$this->render("gspel_manusia/form_edit_staff_pangku");
		}
		elseif ($this->input->post("btn_simpan") === "simpan")
		{
			$data["id"] =$this->input->post('id');
			$data["id_jabatan"] = $this->input->post('opt_jabatan');
			$data["id_jawatan"] = $this->input->post('opt_jawatan');
			$data["status_jawatan"] = $this->input->post('opt_status_jawatan');
			$data["id_jenis_jawatan"] = $this->input->post('opt_jenis_jawatan');
			$data["id_negeri"] = $this->input->post('opt_negeri');
			$data["id_giatmara"] = $this->input->post('opt_giatmara');
			$data["id_kursus"] = $this->input->post('opt_kursus');
			// $data["tarikh_mula_tugas"] = $this->input->post('tarikh_mula_tugas');
			// $data["tarikh_tamat_tugas"] = $this->input->post('tarikh_tamat_tugas');
			$data["status"] = $this->input->post('opt_status');
			//var_dump($data);exit;
			//echo '<pre>'; print_r($data); echo '</pre>';exit;
			$this->gmm->update_staff_info_pangku_tugas($data);
			$this->render("gspel_manusia/senarai_anggota");
		}
		else
		{
			redirect('gspel_manusia','refresh');
		}
	}

	function edit_staff($id = FALSE)
	{
		$this->mViewData["jenis_proses"] = "edit_staff";

		if ($id != FALSE)
		{
			$where["id"] =$id;
			$res_sipt = $this->gmm->get_staff("row", NULL, $where);

			$check_username = $this->gmm->get_staff_admin_users($type,$like,$where);

				//echo '<pre>'; print_r($res_sipt); echo '</pre>';
			$this->mViewData["res_sipt"] = $res_sipt;
			$this->mViewData["res_agama"] = $this->gmm->get_res_agama(NULL);
			$this->mViewData["res_bangsa"] = $this->gmm->get_res_bangsa(NULL);
			$this->mViewData["res_taraf_perkahwinan"] = $this->gmm->get_res_perkahwinan(NULL);
			$this->mViewData["res_jabatan"] = $this->gmm->get_res_jabatan();
			$this->mViewData["res_jawatan"] = $this->gmm->get_res_jawatan();
			$this->mViewData["res_jenis_jawatan"] = $this->gmm->get_res_jenis_jawatan();
			$this->mViewData["res_negeri"] = $this->gmm->get_res_negeri();
			$this->mViewData["res_giatmara"] = $this->gmm->get_res_giatmara("id_negeri = ". $res_sipt->id_negeri);
			$this->mViewData["res_kursus"] = $this->gmm->get_res_kursus();
			$this->mViewData["res_group"] = $this->gmm->get_group()->result();
			$where_group = "user_id = (SELECT id FROM admin_users WHERE id_staff=$id)";
			$this->mViewData["row_admin_users_groups"] = $this->gmm->get_admin_users_groups($where_group)->row();

			$this->mPageTitle = 'Edit Sumber Manusia';
			$this->render("gspel_manusia/form_staff");
		}
		elseif ($this->input->post("btn_simpan") === "simpan")
		{
			$data["id"] =$this->input->post('txt_id');
			$data["nama"] = $this->input->post('txt_nama');
			$data["no_mykad"] = $this->input->post('txt_no_mykad');
			$data["no_gaji"] = $this->input->post('txt_no_gaji');
			$data["no_hp"] = $this->input->post('txt_no_tel');
			$data["emel"] = $this->input->post('txt_email');
			$data["id_agama"] = $this->input->post('opt_agama');
			$data["id_bangsa"] = $this->input->post('opt_bangsa');
			$data["status_perkahwinan"] = $this->input->post('opt_taraf_perkahwinan');
			$data["jantina"] = $this->input->post('opt_jantina');
			$data["alamat"] = $this->input->post('txt_alamat');

			//var_dump($data);exit;
			//echo '<pre>'; print_r($data); echo '</pre>';exit;

			$data_admin_users_groups["group_id"] = $this->input->post('opt_group');
			$where_admin_users_groups = "`user_id` = (SELECT id FROM admin_users WHERE id_staff=".$this->input->post("txt_id").")";
			$this->gmm->update_admin_users_groups($data_admin_users_groups, $where_admin_users_groups);

			$this->gmm->update_staff($data);

			$this->render("gspel_manusia/senarai_anggota");
		}
		else
		{
			redirect('gspel_manusia','refresh');
		}
	}

	function add_staff()
	{
		//$this->load->library('form_validation');
		$this->form_validation->set_rules('txt_nama','Nama','required');
		if($this->form_validation->run() == TRUE){
			//echo "Valid";
		}

		if ($this->input->post("btn_simpan")==="simpan")
		{
			//$data["id"] =$this->input->post('txt_id');
			$nama = $this->input->post('txt_nama');
			$data["nama"] = $nama;
			$mykad = $this->input->post('txt_no_mykad');
			$data["no_mykad"] = $mykad;
			$gaji = $this->input->post('txt_no_gaji');
			$data["no_gaji"] = $gaji;
			$hp = $this->input->post('txt_no_tel');
			$data["no_hp"] = $hp;
			$emel = $this->input->post('txt_email');
			$data["emel"] = $emel;
			$agama = $this->input->post('opt_agama');
			$data["id_agama"] = $agama;
			$bangsa = $this->input->post('opt_bangsa');
			$data["id_bangsa"] = $bangsa;
			$kahwin = $this->input->post('opt_taraf_perkahwinan');
			$data["status_perkahwinan"] = $kahwin;
			$jatina = $this->input->post('opt_jantina');
			$data["jantina"] = $jatina;
			$alamat = $this->input->post('txt_alamat');
			$data["alamat"] = $alamat;


			$data = array(
				'nama' => $nama,
				'no_mykad' => $mykad,
				'no_gaji' => $gaji,
				'no_hp' => $hp,
				'emel' => $emel,
				'id_agama' => $agama,
				'id_bangsa' => $bangsa,
				'status_perkahwinan' => $kahwin,
				'jantina' => $jatina,
				'alamat' => $alamat,
				// 'pb_praktikal' => $pbamali,
				// 'pam_praktikal' => $pmamali
			);

			$this->db->insert('staff',$data);

			$idt = $this->db->insert_id();

			$data2["id_staff"] = $idt;
			$data2["status"] = 1;
			// echo $this->db->set($data2)->get_compiled_insert("staff_info_pangku_tugas");exit;
			$this->db->insert("staff_info_pangku_tugas", $data2);

			$username = $mykad;
			$email = $emel;
			$password = $mykad;
			$additional_data = array(
				'id_staff' => $idt,
				'first_name'	=> $nama,
			);
			$groups = array($this->input->post('opt_group'));
			$this->ion_auth->register($username, $password, $email, $additional_data, $groups);


			redirect('admin/gspel_manusia');

			// var_dump($data);exit;
			//echo '<pre>'; print_r($data); echo '</pre>';exit;
			// $this->load->view("gspel_manusia/form_staff");
			//$this->render("gspel_manusia/senarai_anggota");
			// $this->load->view("gspel_manusia/senarai_anggota");

		} else {
			$this->mViewData["jenis_proses"] = "add_staff";
			$this->mViewData["res_agama"] = $this->gmm->get_res_agama(NULL);
			$this->mViewData["res_bangsa"] = $this->gmm->get_res_bangsa(NULL);
			$this->mViewData["res_taraf_perkahwinan"] = $this->gmm->get_res_perkahwinan(NULL);
			$this->mViewData["res_group"] = $this->gmm->get_group()->result();

			$this->mPageTitle = 'Tambah Sumber Manusia';
			$this->render("gspel_manusia/form_staff");
		}
	}

	function suspend_staff($id_staff,$status)
	{
		if ($id_staff != NULL)
		{
			$this->gmm->suspend_staff($id_staff,$status);
		}
		else
		{
			// $this->gmm->suspend_staff($id_staff,$status);
			redirect($_SERVER['HTTP_REFERER']);
		}

		//redirect('admin/gspel_manusia','refresh');
		redirect($_SERVER['HTTP_REFERER']);
	}

	function reset_tukar_katalaluan($data)
	{
		if ($data != NULL)
		{
		}
		elseif ($this->input->post("btn_katalaluan") === "katalaluan")
		{
			$chk_resetpass =$this->input->post('chk_resetpass');
			//$data ....
			//var_dump($data);exit;
			//echo '<pre>'; print_r($chk_resetpass); echo '</pre>';exit;
			$this->gmm->update_reset_passwd_admin_users($chk_resetpass);
			$this->render("gspel_manusia/senarai_anggota");
		}
		else
		{
			redirect('gspel_manusia','refresh');
		}
	}
}
