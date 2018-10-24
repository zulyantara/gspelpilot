<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function index()
	{
		$this->load->model("home_model", hm);

		//  get info user login
		$user = $this->ion_auth->user()->row();
		// echo "<pre>";var_dump($user);echo "</pre>";
		$user_staff = $user->id_staff;
		$row_staff = $this->hm->get_v_admin_users(array("id_staff" => $user_staff));
		$giatmara_id = $row_staff->id_giatmara;
		$negeri_id =  $this->db->query("select a.id as userid, id_negeri from admin_users a left join (select distinct id_staff, id_negeri from staff_info_pangku_tugas) b on b.id_staff=a.id_staff where a.id={$_SESSION['user_id']} ")->row()->id_negeri;
		if(!empty($negeri_id)){
			foreach($this->db->query("select id, nama_giatmara from ref_giatmara where id_negeri=$negeri_id")->result_array() as $k=>$i){
				$giatmaras[$i['id']] = $i['nama_giatmara']; 
			}
		}
		$this->mViewData['giatmaras']=$giatmaras;
		if(isset($_GET['id_giatmara'])) $giatmara_id = $this->input->get('id_giatmara');
		$this->mViewData['id_giatmara']=$giatmara_id;


		if ($giatmara_id != NULL)
		{
			$where = "id NOT IN(SELECT id_pelatih FROM pelatih)";
			$this->mViewData["jml_pelatih"] = $this->hm->count_pelatih();

			$this->mViewData['groups'] = $groups =  $this->ion_auth->get_users_groups($data['id'])->row()->name;
			$sql="
			select count(distinct a.id) as onprogress from
			(
			select a.id, a.nama_penuh, kursus1, kursus2, kursus3 , c.id_giatmara as giatmara1, d.id_giatmara as giatmara2, e.id_giatmara as giatmara3
			from   permohonan_butir_peribadi  a join permohonan_kursus b on b.id_permohonan=a.id
			left join settings_tawaran_kursus c on kursus1=c.id
			left join settings_tawaran_kursus d on kursus2=d.id
			left join settings_tawaran_kursus e on kursus3=e.id
			where a.id not in (select id_permohonan from pelatih)
			) as a
			where
			giatmara1=(select c.id_giatmara from admin_users a join staff b on b.id=id_staff join staff_info_pangku_tugas c on c.id_staff=b.id where a.id={$_SESSION['user_id']} limit 1)
			or
			giatmara2=(select c.id_giatmara from admin_users a join staff b on b.id=id_staff join staff_info_pangku_tugas c on c.id_staff=b.id where a.id={$_SESSION['user_id']} limit 1)
			or
			giatmara3=(select c.id_giatmara from admin_users a join staff b on b.id=id_staff join staff_info_pangku_tugas c on c.id_staff=b.id where a.id={$_SESSION['user_id']} limit 1)";
			// echo $sql;
			$onprogress=$this->db->query($sql)->row()->onprogress;
			$this->mViewData['onprogress']=$onprogress;

			$sql="
			select
			count(distinct id_pelatih) as reg
			from
			pelatih a join
			permohonan_butir_peribadi b using(no_mykad)
			where
			a.id_giatmara=
			 (select c.id_giatmara from admin_users a join staff b on b.id=id_staff join staff_info_pangku_tugas c on c.id_staff=b.id where a.id={$_SESSION['user_id']} limit 1)";
			//echo $sql;
			$reg = $this->db->query($sql)->row()->reg;
			$this->mViewData['reg']=$reg;

			$sql_permohonan_k1 = "SELECT
			    COUNT(DISTINCT a.id) AS jml_pk1
			FROM
			    (SELECT
			        a.id,
			            a.nama_penuh,
			            kursus1,
			            kursus2,
			            kursus3,
			            c.id_giatmara AS giatmara1,
			            d.id_giatmara AS giatmara2,
			            e.id_giatmara AS giatmara3
			    FROM
			        permohonan_butir_peribadi a
			    JOIN permohonan_kursus b ON b.id_permohonan = a.id
			    LEFT JOIN settings_tawaran_kursus c ON kursus1 = c.id
			    LEFT JOIN settings_tawaran_kursus d ON kursus2 = d.id
			    LEFT JOIN settings_tawaran_kursus e ON kursus3 = e.id) AS a
			WHERE
			    giatmara1 = (SELECT
			            c.id_giatmara
			        FROM
			            admin_users a
			                JOIN
			            staff b ON b.id = id_staff
			                JOIN
			            staff_info_pangku_tugas c ON c.id_staff = b.id
			        WHERE
			            a.id = {$_SESSION['user_id']}
			        LIMIT 1)
			        OR giatmara2 = (SELECT
			            c.id_giatmara
			        FROM
			            admin_users a
			                JOIN
			            staff b ON b.id = id_staff
			                JOIN
			            staff_info_pangku_tugas c ON c.id_staff = b.id
			        WHERE
			            a.id = {$_SESSION['user_id']}
			        LIMIT 1)
			        OR giatmara3 = (SELECT
			            c.id_giatmara
			        FROM
			            admin_users a
			                JOIN
			            staff b ON b.id = id_staff
			                JOIN
			            staff_info_pangku_tugas c ON c.id_staff = b.id
			        WHERE
			            a.id = {$_SESSION['user_id']}
			        LIMIT 1)";
			$this->mViewData["jml_permohonan_k1"] = $this->db->query($sql_permohonan_k1)->row();

			$sql_permohonan_k2 = "SELECT
			    COUNT(DISTINCT a.id) AS jml_pk2
			FROM
			    (SELECT
			        a.id,
			            a.nama_penuh,
			            kursus1,
			            kursus2,
			            kursus3,
			            c.id_giatmara AS giatmara1,
			            d.id_giatmara AS giatmara2,
			            e.id_giatmara AS giatmara3
			    FROM
			        permohonan_butir_peribadi a
			    JOIN permohonan_kursus b ON b.id_permohonan = a.id
			    LEFT JOIN settings_tawaran_kursus c ON kursus1 = c.id
			    LEFT JOIN settings_tawaran_kursus d ON kursus2 = d.id
			    LEFT JOIN settings_tawaran_kursus e ON kursus3 = e.id
			    WHERE
			        kursus3 IS NOT NULL) AS a
			WHERE
			    giatmara1 = (SELECT
			            c.id_giatmara
			        FROM
			            admin_users a
			                JOIN
			            staff b ON b.id = id_staff
			                JOIN
			            staff_info_pangku_tugas c ON c.id_staff = b.id
			        WHERE
			            a.id = {$_SESSION['user_id']}
			        LIMIT 1)
			        OR giatmara2 = (SELECT
			            c.id_giatmara
			        FROM
			            admin_users a
			                JOIN
			            staff b ON b.id = id_staff
			                JOIN
			            staff_info_pangku_tugas c ON c.id_staff = b.id
			        WHERE
			            a.id = {$_SESSION['user_id']}
			        LIMIT 1)
			        OR giatmara3 = (SELECT
			            c.id_giatmara
			        FROM
			            admin_users a
			                JOIN
			            staff b ON b.id = id_staff
			                JOIN
			            staff_info_pangku_tugas c ON c.id_staff = b.id
			        WHERE
			            a.id = {$_SESSION['user_id']}
			        LIMIT 1)";
			$this->mViewData["jml_permohonan_k2"] = $this->db->query($sql_permohonan_k2)->row();

			$sql_permohonan_k3 = "SELECT
			    COUNT(DISTINCT a.id) AS jml_pk3
			FROM
			    (SELECT
			        a.id,
			            a.nama_penuh,
			            kursus1,
			            kursus2,
			            kursus3,
			            c.id_giatmara AS giatmara1,
			            d.id_giatmara AS giatmara2,
			            e.id_giatmara AS giatmara3
			    FROM
			        permohonan_butir_peribadi a
			    JOIN permohonan_kursus b ON b.id_permohonan = a.id
			    LEFT JOIN settings_tawaran_kursus c ON kursus1 = c.id
			    LEFT JOIN settings_tawaran_kursus d ON kursus2 = d.id
			    LEFT JOIN settings_tawaran_kursus e ON kursus3 = e.id
			    WHERE
			        kursus2 IS NOT NULL) AS a
			WHERE
			    giatmara1 = (SELECT
			            c.id_giatmara
			        FROM
			            admin_users a
			                JOIN
			            staff b ON b.id = id_staff
			                JOIN
			            staff_info_pangku_tugas c ON c.id_staff = b.id
			        WHERE
			            a.id = {$_SESSION['user_id']}
			        LIMIT 1)
			        OR giatmara2 = (SELECT
			            c.id_giatmara
			        FROM
			            admin_users a
			                JOIN
			            staff b ON b.id = id_staff
			                JOIN
			            staff_info_pangku_tugas c ON c.id_staff = b.id
			        WHERE
			            a.id = {$_SESSION['user_id']}
			        LIMIT 1)
			        OR giatmara3 = (SELECT
			            c.id_giatmara
			        FROM
			            admin_users a
			                JOIN
			            staff b ON b.id = id_staff
			                JOIN
			            staff_info_pangku_tugas c ON c.id_staff = b.id
			        WHERE
			            a.id = {$_SESSION['user_id']}
			        LIMIT 1)";
			$this->mViewData["jml_permohonan_k3"] = $this->db->query($sql_permohonan_k3)->row();

			$sql_temuduga_k1 = "SELECT
	    COUNT(DISTINCT a.id) AS jml_ttk1
	FROM
	    (SELECT
	        a.id,
	            a.nama_penuh,
	            kursus1,
	            kursus2,
	            kursus3,
	            c.id_giatmara AS giatmara1,
	            d.id_giatmara AS giatmara2,
	            e.id_giatmara AS giatmara3
	    FROM
	        permohonan_butir_peribadi a
	    JOIN permohonan_kursus b ON b.id_permohonan = a.id
	    LEFT JOIN temuduga_tetapan tt1 ON b.id_permohonan = tt1.id_permohonan
	        AND tt1.id_kursus = b.kursus1
	        AND tt1.jenis_pelatih = 'LPP04'
	    LEFT JOIN settings_tawaran_kursus c ON kursus1 = c.id
	    LEFT JOIN settings_tawaran_kursus d ON kursus2 = d.id
	    LEFT JOIN settings_tawaran_kursus e ON kursus3 = e.id
	    WHERE
	        tt1.keputusan_temuduga IN (1 , 2, 3, 4, 5)
	            AND tt1.tawaran_status IS NULL) AS a
	WHERE
	    giatmara1 = (SELECT
	            c.id_giatmara
	        FROM
	            admin_users a
	                JOIN
	            staff b ON b.id = id_staff
	                JOIN
	            staff_info_pangku_tugas c ON c.id_staff = b.id
	        WHERE
	            a.id = {$_SESSION['user_id']}
	        LIMIT 1)
	        OR giatmara2 = (SELECT
	            c.id_giatmara
	        FROM
	            admin_users a
	                JOIN
	            staff b ON b.id = id_staff
	                JOIN
	            staff_info_pangku_tugas c ON c.id_staff = b.id
	        WHERE
	            a.id = {$_SESSION['user_id']}
	        LIMIT 1)
	        OR giatmara3 = (SELECT
	            c.id_giatmara
	        FROM
	            admin_users a
	                JOIN
	            staff b ON b.id = id_staff
	                JOIN
	            staff_info_pangku_tugas c ON c.id_staff = b.id
	        WHERE
	            a.id = {$_SESSION['user_id']}
	        LIMIT 1)";
			$this->mViewData["jml_temuduga_k1"] = $this->db->query($sql_temuduga_k1)->row();

			$sql_temuduga_k2 = "SELECT
	    COUNT(DISTINCT a.id) AS jml_ttk2
	FROM
	    (SELECT
	        a.id,
	            a.nama_penuh,
	            kursus1,
	            kursus2,
	            kursus3,
	            c.id_giatmara AS giatmara1,
	            d.id_giatmara AS giatmara2,
	            e.id_giatmara AS giatmara3
	    FROM
	        permohonan_butir_peribadi a
	    JOIN permohonan_kursus b ON b.id_permohonan = a.id
	    LEFT JOIN temuduga_tetapan tt1 ON b.id_permohonan = tt1.id_permohonan
	        AND tt1.id_kursus = b.kursus2
	        AND tt1.jenis_pelatih = 'LPP04'
	    LEFT JOIN settings_tawaran_kursus c ON kursus1 = c.id
	    LEFT JOIN settings_tawaran_kursus d ON kursus2 = d.id
	    LEFT JOIN settings_tawaran_kursus e ON kursus3 = e.id
	    WHERE
	        tt1.keputusan_temuduga IN (1 , 2, 3, 4, 5)
	            AND tt1.tawaran_status IS NULL) AS a
	WHERE
	    giatmara1 = (SELECT
	            c.id_giatmara
	        FROM
	            admin_users a
	                JOIN
	            staff b ON b.id = id_staff
	                JOIN
	            staff_info_pangku_tugas c ON c.id_staff = b.id
	        WHERE
	            a.id = {$_SESSION['user_id']}
	        LIMIT 1)
	        OR giatmara2 = (SELECT
	            c.id_giatmara
	        FROM
	            admin_users a
	                JOIN
	            staff b ON b.id = id_staff
	                JOIN
	            staff_info_pangku_tugas c ON c.id_staff = b.id
	        WHERE
	            a.id = {$_SESSION['user_id']}
	        LIMIT 1)
	        OR giatmara3 = (SELECT
	            c.id_giatmara
	        FROM
	            admin_users a
	                JOIN
	            staff b ON b.id = id_staff
	                JOIN
	            staff_info_pangku_tugas c ON c.id_staff = b.id
	        WHERE
	            a.id = {$_SESSION['user_id']}
	        LIMIT 1)";
			$this->mViewData["jml_temuduga_k2"] = $this->db->query($sql_temuduga_k2)->row();

			$sql_temuduga_k3 = "SELECT
	    COUNT(DISTINCT a.id) AS jml_ttk3
	FROM
	    (SELECT
	        a.id,
	            a.nama_penuh,
	            kursus1,
	            kursus2,
	            kursus3,
	            c.id_giatmara AS giatmara1,
	            d.id_giatmara AS giatmara2,
	            e.id_giatmara AS giatmara3
	    FROM
	        permohonan_butir_peribadi a
	    JOIN permohonan_kursus b ON b.id_permohonan = a.id
	    LEFT JOIN temuduga_tetapan tt1 ON b.id_permohonan = tt1.id_permohonan
	        AND tt1.id_kursus = b.kursus3
	        AND tt1.jenis_pelatih = 'LPP04'
	    LEFT JOIN settings_tawaran_kursus c ON kursus1 = c.id
	    LEFT JOIN settings_tawaran_kursus d ON kursus2 = d.id
	    LEFT JOIN settings_tawaran_kursus e ON kursus3 = e.id
	    WHERE
	        tt1.keputusan_temuduga IN (1 , 2, 3, 4, 5)
	            AND tt1.tawaran_status IS NULL) AS a
	WHERE
	    giatmara1 = (SELECT
	            c.id_giatmara
	        FROM
	            admin_users a
	                JOIN
	            staff b ON b.id = id_staff
	                JOIN
	            staff_info_pangku_tugas c ON c.id_staff = b.id
	        WHERE
	            a.id = {$_SESSION['user_id']}
	        LIMIT 1)
	        OR giatmara2 = (SELECT
	            c.id_giatmara
	        FROM
	            admin_users a
	                JOIN
	            staff b ON b.id = id_staff
	                JOIN
	            staff_info_pangku_tugas c ON c.id_staff = b.id
	        WHERE
	            a.id = {$_SESSION['user_id']}
	        LIMIT 1)
	        OR giatmara3 = (SELECT
	            c.id_giatmara
	        FROM
	            admin_users a
	                JOIN
	            staff b ON b.id = id_staff
	                JOIN
	            staff_info_pangku_tugas c ON c.id_staff = b.id
	        WHERE
	            a.id = {$_SESSION['user_id']}
	        LIMIT 1)";
			$this->mViewData["jml_temuduga_k3"] = $this->db->query($sql_temuduga_k3)->row();

			$sql_tawaran_k1 = "SELECT
	    COUNT(DISTINCT a.id) AS jml_tk1
	FROM
	    (SELECT
	        a.id,
	            a.nama_penuh,
	            kursus1,
	            kursus2,
	            kursus3,
	            c.id_giatmara AS giatmara1,
	            d.id_giatmara AS giatmara2,
	            e.id_giatmara AS giatmara3
	    FROM
	        permohonan_butir_peribadi a
	    JOIN permohonan_kursus b ON b.id_permohonan = a.id
	    LEFT JOIN temuduga_tetapan tt1 ON b.id_permohonan = tt1.id_permohonan
	        AND tt1.id_kursus = b.kursus1
	        AND tt1.jenis_pelatih = 'LPP04'
	    LEFT JOIN settings_tawaran_kursus c ON kursus1 = c.id
	    LEFT JOIN settings_tawaran_kursus d ON kursus2 = d.id
	    LEFT JOIN settings_tawaran_kursus e ON kursus3 = e.id
	    WHERE
	        tt1.tawaran_status =1) AS a
	WHERE
	    giatmara1 = (SELECT
	            c.id_giatmara
	        FROM
	            admin_users a
	                JOIN
	            staff b ON b.id = id_staff
	                JOIN
	            staff_info_pangku_tugas c ON c.id_staff = b.id
	        WHERE
	            a.id = {$_SESSION['user_id']}
	        LIMIT 1)
	        OR giatmara2 = (SELECT
	            c.id_giatmara
	        FROM
	            admin_users a
	                JOIN
	            staff b ON b.id = id_staff
	                JOIN
	            staff_info_pangku_tugas c ON c.id_staff = b.id
	        WHERE
	            a.id = {$_SESSION['user_id']}
	        LIMIT 1)
	        OR giatmara3 = (SELECT
	            c.id_giatmara
	        FROM
	            admin_users a
	                JOIN
	            staff b ON b.id = id_staff
	                JOIN
	            staff_info_pangku_tugas c ON c.id_staff = b.id
	        WHERE
	            a.id = {$_SESSION['user_id']}
	        LIMIT 1)";
			$this->mViewData["jml_tawaran_k1"] = $this->db->query($sql_tawaran_k1)->row();

			$sql_tawaran_k2 = "SELECT
	    COUNT(DISTINCT a.id) AS jml_tk2
	FROM
	    (SELECT
	        a.id,
	            a.nama_penuh,
	            kursus1,
	            kursus2,
	            kursus3,
	            c.id_giatmara AS giatmara1,
	            d.id_giatmara AS giatmara2,
	            e.id_giatmara AS giatmara3
	    FROM
	        permohonan_butir_peribadi a
	    JOIN permohonan_kursus b ON b.id_permohonan = a.id
	    LEFT JOIN temuduga_tetapan tt1 ON b.id_permohonan = tt1.id_permohonan
	        AND tt1.id_kursus = b.kursus2
	        AND tt1.jenis_pelatih = 'LPP04'
	    LEFT JOIN settings_tawaran_kursus c ON kursus1 = c.id
	    LEFT JOIN settings_tawaran_kursus d ON kursus2 = d.id
	    LEFT JOIN settings_tawaran_kursus e ON kursus3 = e.id
	    WHERE
	        tt1.tawaran_status =1) AS a
	WHERE
	    giatmara1 = (SELECT
	            c.id_giatmara
	        FROM
	            admin_users a
	                JOIN
	            staff b ON b.id = id_staff
	                JOIN
	            staff_info_pangku_tugas c ON c.id_staff = b.id
	        WHERE
	            a.id = {$_SESSION['user_id']}
	        LIMIT 1)
	        OR giatmara2 = (SELECT
	            c.id_giatmara
	        FROM
	            admin_users a
	                JOIN
	            staff b ON b.id = id_staff
	                JOIN
	            staff_info_pangku_tugas c ON c.id_staff = b.id
	        WHERE
	            a.id = {$_SESSION['user_id']}
	        LIMIT 1)
	        OR giatmara3 = (SELECT
	            c.id_giatmara
	        FROM
	            admin_users a
	                JOIN
	            staff b ON b.id = id_staff
	                JOIN
	            staff_info_pangku_tugas c ON c.id_staff = b.id
	        WHERE
	            a.id = {$_SESSION['user_id']}
	        LIMIT 1)";
			$this->mViewData["jml_tawaran_k2"] = $this->db->query($sql_tawaran_k2)->row();

			$sql_tawaran_k3 = "SELECT
	    COUNT(DISTINCT a.id) AS jml_tk3
	FROM
	    (SELECT
	        a.id,
	            a.nama_penuh,
	            kursus1,
	            kursus2,
	            kursus3,
	            c.id_giatmara AS giatmara1,
	            d.id_giatmara AS giatmara2,
	            e.id_giatmara AS giatmara3
	    FROM
	        permohonan_butir_peribadi a
	    JOIN permohonan_kursus b ON b.id_permohonan = a.id
	    JOIN temuduga_tetapan tt1 ON b.id_permohonan = tt1.id_permohonan
	        AND tt1.id_kursus = b.kursus3
	        AND tt1.jenis_pelatih = 'LPP04'
	    LEFT JOIN settings_tawaran_kursus c ON kursus1 = c.id
	    LEFT JOIN settings_tawaran_kursus d ON kursus2 = d.id
	    LEFT JOIN settings_tawaran_kursus e ON kursus3 = e.id
	    WHERE
	        tt1.tawaran_status =1) AS a
	WHERE
	    giatmara1 = (SELECT
	            c.id_giatmara
	        FROM
	            admin_users a
	                JOIN
	            staff b ON b.id = id_staff
	                JOIN
	            staff_info_pangku_tugas c ON c.id_staff = b.id
	        WHERE
	            a.id = {$_SESSION['user_id']}
	        LIMIT 1)
	        OR giatmara2 = (SELECT
	            c.id_giatmara
	        FROM
	            admin_users a
	                JOIN
	            staff b ON b.id = id_staff
	                JOIN
	            staff_info_pangku_tugas c ON c.id_staff = b.id
	        WHERE
	            a.id = {$_SESSION['user_id']}
	        LIMIT 1)
	        OR giatmara3 = (SELECT
	            c.id_giatmara
	        FROM
	            admin_users a
	                JOIN
	            staff b ON b.id = id_staff
	                JOIN
	            staff_info_pangku_tugas c ON c.id_staff = b.id
	        WHERE
	            a.id = {$_SESSION['user_id']}
	        LIMIT 1)";
			$this->mViewData["jml_tawaran_k3"] = $this->db->query($sql_tawaran_k3)->row();

			$sql_pelatih_k1 = "SELECT
	    COUNT(DISTINCT a.id) AS jml_pk1
	FROM
	    (SELECT
	        a.id,
	            a.nama_penuh,
	            kursus1,
	            kursus2,
	            kursus3,
	            c.id_giatmara AS giatmara1,
	            d.id_giatmara AS giatmara2,
	            e.id_giatmara AS giatmara3
	    FROM
	        permohonan_butir_peribadi a
	    JOIN permohonan_kursus b ON b.id_permohonan = a.id
	    JOIN pelatih p ON b.id_permohonan = p.id_permohonan
	        AND b.kursus1 = p.id_kursus
	        AND p.jenis_pelatih = 'LPP04'
	    LEFT JOIN settings_tawaran_kursus c ON kursus1 = c.id
	    LEFT JOIN settings_tawaran_kursus d ON kursus2 = d.id
	    LEFT JOIN settings_tawaran_kursus e ON kursus3 = e.id
	    WHERE
	        p.status_pelatih =1) AS a
	WHERE
	    giatmara1 = (SELECT
	            c.id_giatmara
	        FROM
	            admin_users a
	                JOIN
	            staff b ON b.id = id_staff
	                JOIN
	            staff_info_pangku_tugas c ON c.id_staff = b.id
	        WHERE
	            a.id = {$_SESSION['user_id']}
	        LIMIT 1)
	        OR giatmara2 = (SELECT
	            c.id_giatmara
	        FROM
	            admin_users a
	                JOIN
	            staff b ON b.id = id_staff
	                JOIN
	            staff_info_pangku_tugas c ON c.id_staff = b.id
	        WHERE
	            a.id = {$_SESSION['user_id']}
	        LIMIT 1)
	        OR giatmara3 = (SELECT
	            c.id_giatmara
	        FROM
	            admin_users a
	                JOIN
	            staff b ON b.id = id_staff
	                JOIN
	            staff_info_pangku_tugas c ON c.id_staff = b.id
	        WHERE
	            a.id = {$_SESSION['user_id']}
	        LIMIT 1)";
			$this->mViewData["jml_pelatih_k1"] = $this->db->query($sql_pelatih_k1)->row();

			$sql_pelatih_k2 = "SELECT
	    COUNT(DISTINCT a.id) AS jml_pk2
	FROM
	    (SELECT
	        a.id,
	            a.nama_penuh,
	            kursus1,
	            kursus2,
	            kursus3,
	            c.id_giatmara AS giatmara1,
	            d.id_giatmara AS giatmara2,
	            e.id_giatmara AS giatmara3
	    FROM
	        permohonan_butir_peribadi a
	    JOIN permohonan_kursus b ON b.id_permohonan = a.id
	    JOIN pelatih p ON b.id_permohonan = p.id_permohonan
	        AND b.kursus2 = p.id_kursus
	        AND p.jenis_pelatih = 'LPP04'
	    LEFT JOIN settings_tawaran_kursus c ON kursus1 = c.id
	    LEFT JOIN settings_tawaran_kursus d ON kursus2 = d.id
	    LEFT JOIN settings_tawaran_kursus e ON kursus3 = e.id
	    WHERE
	        p.status_pelatih =1) AS a
	WHERE
	    giatmara1 = (SELECT
	            c.id_giatmara
	        FROM
	            admin_users a
	                JOIN
	            staff b ON b.id = id_staff
	                JOIN
	            staff_info_pangku_tugas c ON c.id_staff = b.id
	        WHERE
	            a.id = {$_SESSION['user_id']}
	        LIMIT 1)
	        OR giatmara2 = (SELECT
	            c.id_giatmara
	        FROM
	            admin_users a
	                JOIN
	            staff b ON b.id = id_staff
	                JOIN
	            staff_info_pangku_tugas c ON c.id_staff = b.id
	        WHERE
	            a.id = {$_SESSION['user_id']}
	        LIMIT 1)
	        OR giatmara3 = (SELECT
	            c.id_giatmara
	        FROM
	            admin_users a
	                JOIN
	            staff b ON b.id = id_staff
	                JOIN
	            staff_info_pangku_tugas c ON c.id_staff = b.id
	        WHERE
	            a.id = {$_SESSION['user_id']}
	        LIMIT 1)";
			$this->mViewData["jml_pelatih_k2"] = $this->db->query($sql_pelatih_k2)->row();

			$sql_pelatih_k3 = "SELECT
	    COUNT(DISTINCT a.id) AS jml_pk3
	FROM
	    (SELECT
	        a.id,
	            a.nama_penuh,
	            kursus1,
	            kursus2,
	            kursus3,
	            c.id_giatmara AS giatmara1,
	            d.id_giatmara AS giatmara2,
	            e.id_giatmara AS giatmara3
	    FROM
	        permohonan_butir_peribadi a
	    JOIN permohonan_kursus b ON b.id_permohonan = a.id
	    JOIN pelatih p ON b.id_permohonan = p.id_permohonan
	        AND b.kursus3 = p.id_kursus
	        AND p.jenis_pelatih = 'LPP04'
	    LEFT JOIN settings_tawaran_kursus c ON kursus1 = c.id
	    LEFT JOIN settings_tawaran_kursus d ON kursus2 = d.id
	    LEFT JOIN settings_tawaran_kursus e ON kursus3 = e.id
	    WHERE
	        p.status_pelatih =1) AS a
	WHERE
	    giatmara1 = (SELECT
	            c.id_giatmara
	        FROM
	            admin_users a
	                JOIN
	            staff b ON b.id = id_staff
	                JOIN
	            staff_info_pangku_tugas c ON c.id_staff = b.id
	        WHERE
	            a.id = {$_SESSION['user_id']}
	        LIMIT 1)
	        OR giatmara2 = (SELECT
	            c.id_giatmara
	        FROM
	            admin_users a
	                JOIN
	            staff b ON b.id = id_staff
	                JOIN
	            staff_info_pangku_tugas c ON c.id_staff = b.id
	        WHERE
	            a.id = {$_SESSION['user_id']}
	        LIMIT 1)
	        OR giatmara3 = (SELECT
	            c.id_giatmara
	        FROM
	            admin_users a
	                JOIN
	            staff b ON b.id = id_staff
	                JOIN
	            staff_info_pangku_tugas c ON c.id_staff = b.id
	        WHERE
	            a.id = {$_SESSION['user_id']}
	        LIMIT 1)";
			$this->mViewData["jml_pelatih_k3"] = $this->db->query($sql_pelatih_k3)->row();

			$sql_permohonan_ll = "SELECT COUNT(kl.id) as jml FROM kelulusan_lpp09 kl JOIN permohonan_kursus_lpp09 pkl ON kl.id_permohonan = pkl.id_permohonan AND kl.id_permohonan_kursus_lpp09=pkl.id WHERE pkl.kategori_program='LL' AND pkl.id_giatmara = $giatmara_id";
			// echo $sql_permohonan_ll;
			$this->mViewData["jml_permohonan_ll"] = $this->db->query($sql_permohonan_ll)->row();

			$sql_permohonan_rn = "SELECT COUNT(kl.id) as jml FROM kelulusan_lpp09 kl JOIN permohonan_kursus_lpp09 pkl ON kl.id_permohonan = pkl.id_permohonan AND kl.id_permohonan_kursus_lpp09=pkl.id WHERE pkl.kategori_program='RN' AND pkl.id_giatmara = $giatmara_id";
			// echo $sql_permohonan_rn;
			$this->mViewData["jml_permohonan_rn"] = $this->db->query($sql_permohonan_rn)->row();

			$sql_permohonan_pp = "SELECT COUNT(kl.id) as jml FROM kelulusan_lpp09 kl JOIN permohonan_kursus_lpp09 pkl ON kl.id_permohonan = pkl.id_permohonan AND kl.id_permohonan_kursus_lpp09=pkl.id WHERE pkl.kategori_program='PP' AND pkl.id_giatmara = $giatmara_id";
			// echo $sql_permohonan_pp;
			$this->mViewData["jml_permohonan_pp"] = $this->db->query($sql_permohonan_pp)->row();

			$sql_permohonan_pk = "SELECT COUNT(kl.id) as jml FROM kelulusan_lpp09 kl JOIN permohonan_kursus_lpp09 pkl ON kl.id_permohonan = pkl.id_permohonan AND kl.id_permohonan_kursus_lpp09=pkl.id WHERE pkl.kategori_program='PK' AND pkl.id_giatmara = $giatmara_id";
			// echo $sql_permohonan_pk;
			$this->mViewData["jml_permohonan_pk"] = $this->db->query($sql_permohonan_pk)->row();

			$sql_pendaftaran_ll = "SELECT COUNT(kl.id) as jml FROM kelulusan_lpp09 kl JOIN permohonan_kursus_lpp09 pkl ON kl.id_permohonan = pkl.id_permohonan AND kl.id_permohonan_kursus_lpp09=pkl.id WHERE pkl.kategori_program='LL' AND pkl.id_giatmara = $giatmara_id AND kl.status_pendaftaran=5";
			// echo $sql_pendaftaran_ll;
			$this->mViewData["jml_pendaftaran_ll"] = $this->db->query($sql_pendaftaran_ll)->row();

			$sql_pendaftaran_rn = "SELECT COUNT(kl.id) as jml FROM kelulusan_lpp09 kl JOIN permohonan_kursus_lpp09 pkl ON kl.id_permohonan = pkl.id_permohonan AND kl.id_permohonan_kursus_lpp09=pkl.id WHERE pkl.kategori_program='RN' AND pkl.id_giatmara = $giatmara_id AND kl.status_pendaftaran=5";
			// echo $sql_pendaftaran_rn;
			$this->mViewData["jml_pendaftaran_rn"] = $this->db->query($sql_pendaftaran_rn)->row();

			$sql_pendaftaran_pp = "SELECT COUNT(kl.id) as jml FROM kelulusan_lpp09 kl JOIN permohonan_kursus_lpp09 pkl ON kl.id_permohonan = pkl.id_permohonan AND kl.id_permohonan_kursus_lpp09=pkl.id WHERE pkl.kategori_program='PP' AND pkl.id_giatmara = $giatmara_id AND kl.status_pendaftaran=5";
			// echo $sql_pendaftaran_pp;
			$this->mViewData["jml_pendaftaran_pp"] = $this->db->query($sql_pendaftaran_pp)->row();

			$sql_pendaftaran_pk = "SELECT COUNT(kl.id) as jml FROM kelulusan_lpp09 kl JOIN permohonan_kursus_lpp09 pkl ON kl.id_permohonan = pkl.id_permohonan AND kl.id_permohonan_kursus_lpp09=pkl.id WHERE pkl.kategori_program='PK' AND pkl.id_giatmara = $giatmara_id AND kl.status_pendaftaran=5";
			// echo $sql_pendaftaran_pk;
			$this->mViewData["jml_pendaftaran_pk"] = $this->db->query($sql_pendaftaran_pk)->row();

			$wk["id_giatmara"] = $giatmara_id;
			
			$this->db->query("drop table if exists t1;");
$this->db->query("create temporary table t1 as select a.id, nama_kursus, 10 as pendings from settings_tawaran_kursus a join ref_kursus b on
b.id=a.id_kursus where a.id_giatmara=$giatmara_id;");
			$this->db->query("drop table if exists t2;");
			$this->db->query("create temporary table t2 as select id_kursus, count(distinct id_permohonan) as pendings from temuduga_tetapan where jenis_pelatih='LPP04' and keputusan_temuduga in (2,3) group by id_kursus");
			
			$this->mViewData["res_kursus"] = null;//$this->db->query("select concat(t1.nama_kursus,'&nbsp; <b>', coalesce(t2.pendings,'-'),'</b>') as nama_kursus from t1 left join t2 on t2.id_kursus=t1.id ")->result();
			// $this->hm->get_giatmara_kursus($wk)->result();
			$this->db->query("drop table if exists t2;");			
			$this->db->query("drop table if exists t3;");
			$this->db->query("create temporary table t2 as select a.* from  markah_modul a join t1 on t1.id=a.id_kursus where status_isi_markah<2"); 
			$this->db->query("create temporary table t3 as select a.* from  markah_modul_2 a join t1 on t1.id=a.id_kursus where status_isi_markah<2"); 
			$this->db->query("create temporary table t4 as select id_kursus, count(distinct b.id_pelatih) as nn from   markah_modul_2  a join markah_modul_status b on a.id_pelatih=b.id_pelatih  and  b.pengurus_sah is null and b.pengurus is null group by id_kursus");
			$this->mViewData["res_kursus2"] = null;//$this->db->query("select concat(nama_kursus,' <b>', coalesce(nn,'-'),'</b>') as nama_kursus from t1 left join t4 on t1.id=t4.id_kursus ")->result();
			
			//print_r($this->db->query("select * from t3")->result_array());
//ridei was here
$this->db->query("drop table if exists t1;");$this->db->query("drop table if exists t2;");
$this->db->query("create temporary table t1 as select a.id, nama_kursus, 5000 as permohonan, 5000 as temuduga, 5000 as tawaran, 5000 as pendaftaran from settings_tawaran_kursus a join ref_kursus b on

b.id=a.id_kursus where a.id_giatmara=$giatmara_id;");
$this->db->query("update t1 set permohonan=0, temuduga=0, tawaran=0, pendaftaran=0;");
//-- permohonan
$this->db->query("create temporary table t2 as select a.nama_kursus,count(distinct id_permohonan) as permohonan from t1 a left join permohonan_kursus b on b.kursus1=a.id or b.kursus2=a.id or b.kursus3=b.id

group by a.nama_kursus;");
$this->db->query("update t1 join t2 using(nama_kursus) set t1.permohonan=t2.permohonan;");
//-- temuduga
$this->db->query("drop table if exists t2;");
$this->db->query("create temporary table t2 as
select nama_kursus,count(distinct b.id_permohonan) as temuduga from t1 a left join temuduga_tetapan b on b.id_kursus=a.id and keputusan_temuduga <=5 and tawaran_status is null  group by

nama_kursus;");
$this->db->query("update t1 join t2 using(nama_kursus) set t1.temuduga=t2.temuduga;");
//-- tawaran
$this->db->query("drop table if exists t2;");
$this->db->query("create temporary table t2 as
select nama_kursus,count(distinct b.id_permohonan) as tawaran from t1 a left join temuduga_tetapan b on b.id_kursus=a.id and  tawaran_status=1  group by nama_kursus;");
$this->db->query("update t1 join t2 using(nama_kursus) set t1.tawaran=t2.tawaran;");
//-- pendaftaran
$this->db->query("drop table if exists t2;");
$this->db->query("create temporary table t2 as
select nama_kursus,count(distinct id_permohonan) as pendaftaran from t1 a left join pelatih b on b.id_kursus=a.id  group by nama_kursus;");
$this->db->query("update t1 join t2 using(nama_kursus) set t1.pendaftaran=t2.pendaftaran;");
$this->db->query("alter table t1 drop column id;");

	/*	$sql2=explode(';', $sql);
		foreach($sql2 as $sql3)
		{
			$this->db->query($sql3);
		}*/

		$this->mViewData['t1']=null;//$this->db->query("select * from t1")->result_array();


//end of ridei was here
		}

		$this->render('home');
	}
}
