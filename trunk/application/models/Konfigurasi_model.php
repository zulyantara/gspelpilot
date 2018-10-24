<?php
class Konfigurasi_model extends CI_Model{
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');

	}

function filename_exists($id)
{
    $this->db->select('*'); 
    $this->db->from('v_konfigurasi_kurikulum_p1_screen2_part2');
    $this->db->where('id', $id);
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
}

function get_kluster($id)
	{
		 $query  ="select id,idkursus,giatmara,kursus,intake from v_konfigurasi_kurikulum_p1_screen2_part2 where id='$id' group by id,idkursus,giatmara,kursus,intake";
    return $this->db->query($query);
	}

	function get_kursus($status,$kluster,$kursus)
	{ 
		 $query  ="select b.id as idkursus,status_kursus,kod_kursus,nama_kursus,id_kluster ,jenis_kursus,nama_kursus_sijil ,kod_skm ,tempoh_industri,tempoh_pusat,tarikh_dikuatkuasa ,a.nama_kluster as kluster from ref_kluster a, ref_kursus b where a.id=b.id_kluster and status_kursus='$status' AND id_kluster='$kluster' and (nama_kursus like '%$kursus%' or kod_kursus like '%$kursus%') ";
	    return $this->db->query($query);
	}

function get_kluster2($id)
	{
		 $query  ="select id from v_konfigurasi_kurikulum_p1_screen2_part2 where id='$id' group by id";
    return $this->db->query($query);
	}

	function get_senarai_kursus($status,$kluster)
	{
		 $query  ="select * from v_pengurusan_kursus where status_kursus='$status' AND id_kluster='$kluster' ORDER BY id ;";
		// var_dump($query);exit();
    return $this->db->query($query);
	}


function coba_exists($status,$kluster,$kursus)
{
    $this->db->select('*'); 
    $this->db->from('v_konfigurasi_kurikulum_kursus_screen1');
    $this->db->where('status', $status);
    $this->db->where('idkluster', $kluster);
   	$this->db->like('kursus', $kursus);
    $this->db->or_like('kod_kursus', $kursus);
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
}

function get_pusat($id,$kluster)
	{
	$query  ="select a.kod_giatmara as kod, a.nama_giatmara as pusat , a.id_type_giatmara as id , a.email as emel, a.tel_no as tel from ref_giatmara a, settings_tawaran_kursus b, ref_kursus c, ref_kluster d where a.id=b.id_giatmara and b.id_kursus=c.id and c.id_kluster=d.id and b.id_kursus='$id' and c.id_kluster='$kluster' ;";
    return $this->db->query($query);
	}

function get_bilpusat($id,$kluster)
	{
	$query  =" select count(a.id) as bil_pusat,c.nama_kursus as kursus , d.nama_kluster as kluster, c.id as id from ref_giatmara a, settings_tawaran_kursus b, ref_kursus c, ref_kluster d where a.id=b.id_giatmara and b.id_kursus=c.id and c.id_kluster=d.id AND (c.nama_kursus LIKE '%$id%' or  c.kod_kursus LIKE '%$id%' ) and c.id_kluster='1'  group by kursus, kluster ORDER BY id";
    return $this->db->query($query);
	}

function edit_kursus($id,$kluster)
	{
	$query  ="select a.nama_kluster, a.id as idkluster , b.* from ref_kluster a , ref_kursus b where a.id=b.id_kluster and b.id='$id' and a.id='$kluster';";
    return $this->db->query($query);
	}

function cek_idpelatih($idsetting)
{
 $query  ="select a.id_pelatih from pelatih a , settings_tawaran_kursus b where a.id_kursus=b.id and b.id_kursus='$idsetting';";
    return $this->db->query($query);
}


function get_padamkursus($id)
{
 $query  ="select b.id as idkursus ,b.nama_kursus as kursus,c.nama_giatmara as giatmara , d.nama_intake as intake from settings_tawaran_kursus a, ref_kursus b, ref_giatmara c, ref_intake d where a.id_kursus = b.id and a.id_giatmara=c.id and a.id_intake = d.id AND b.id='$id' group by intake, idkursus, kursus, giatmara ;";
 // var_dump($query);die();
    return $this->db->query($query);
}

function ajax_kursus2($id)
{
 $query  ="select * from ref_kursus where id= '$id' ;";
 //var_dump($query);die();
 return $this->db->query($query);
}

function ajax_kursus3()
{
 $query  ="select * from ref_kursus  ;";
 return $this->db->query($query);
}

function ajax_kursus($id)
{
$query  ="select * from ref_kursus where id_kluster= '$id' ;";
 return $this->db->query($query);
}

function coba_exists2($kursus)
{
    $this->db->select('ref_kursus.id'); 
    $this->db->from('ref_kursus');
    $this->db->join('ref_modul', 'ref_kursus.id = ref_modul.id_kursus');
	$this->db->join('markah_modul', 'ref_modul.id_modul = markah_modul.id_modul');
    $this->db->where('ref_kursus.id', $kursus);
     $query = $this->db->get();
  //  echo $this->db->last_query();exit();
    $result = $query->result_array();
    return $result;
}

function get_senarai_modul($kursus)
	{
	$query  ="select * from ref_modul where id_kursus = '$kursus';";
    return $this->db->query($query);
	}


function edit_modul($modul)
	{
	$query  ="select a.nama_kluster, b.nama_kursus, c.* from ref_kluster a, ref_kursus b, ref_modul c where a.id = b.id_kluster and b.id=c.id_kursus and c.id_modul = '$modul';";
    return $this->db->query($query);
	}


function cek_modul($modul)
	{
	$this->db->select('*'); 
    $this->db->from('markah_modul');
    $this->db->where('id_modul', $modul);
     $query = $this->db->get();
  //  echo $this->db->last_query();exit();
    $result = $query->result_array();
    return $result;
	}


function get_padammodul($id)
{
 $query  ="select b.id as idkursus , b.id_kluster as idkluster ,b.nama_kursus as kursus,c.nama_giatmara as giatmara , d.nama_intake as intake, e.id_modul as idmodul from settings_tawaran_kursus a, ref_kursus b, ref_giatmara c, ref_intake d,ref_modul e where a.id_kursus = b.id and a.id_giatmara=c.id and a.id_intake = d.id AND b.id=e.id_kursus AND e.id_modul='$id' group by idmodul,idkluster, intake, idkursus, kursus, giatmara ;";
 //var_dump($query);die();
    return $this->db->query($query);
}

function ajax_giatmara($id)
{
 $query  ="select * from ref_giatmara where id_negeri='$id' ;";
// var_dump($query);die();
 return $this->db->query($query);
}

function ajax_kursus_from_giatmara($id)
{
 $query  ="select c.id as id, c.nama_kursus as nama_kursus from ref_giatmara a , settings_tawaran_kursus b, ref_kursus c where a.id=b.id_giatmara and c.id=b.id_kursus and a.id='$id' group by id , nama_kursus ;";
// var_dump($query);die();
 return $this->db->query($query);
}

function ajax_intake_from_kursus($id)
{
 $query  ="select c.id as id, c.nama_intake as nama_intake from ref_kursus a , settings_tawaran_kursus b, ref_intake c where a.id=b.id_kursus and c.id=b.id_intake and a.id='$id' group by id,nama_intake ;";
// var_dump($query);die();
 return $this->db->query($query);
}


function get_senarai_setting($kursus,$intake)
	{
	$query  =" select a.nama_kluster as nama_kluster, 
				b.nama_kursus as nama_kursus, 
				b.nama_kursus_sijil as nama_sijil, 
				b.kod_kursus as kod_kursus , 
				b.tempoh_pusat as tempoh_pusat, 
				b.tempoh_industri as tempoh_industri,
				c.status as status,
				e.nama_intake as sesi from ref_kluster a, 
				ref_kursus b, 
				settings_tawaran_kursus c, 
				ref_intake e, 
				ref_giatmara f, 
				ref_negeri g 
				where a.id=b.id_kluster 
				and c.id_kursus=b.id 
				and c.id_intake=e.id 
				and c.id_giatmara = f.id 
				and f.id_negeri = g.id 
				and b.id='$kursus' 
				and e.id='$intake' 
				group by nama_kursus, nama_sijil, kod_kursus, tempoh_pusat, tempoh_industri, status, sesi; ";

	//var_dump($query);die();
    return $this->db->query($query);
	}

function get_bilpusat_setting($id,$kluster)
	{
	$query  ="select count(c.nama_kursus) as bil_pusat from ref_giatmara a, settings_tawaran_kursus b, ref_kursus c, ref_kluster d where a.id=b.id_giatmara and b.id_kursus=c.id and c.id_kluster=d.id and b.id_kursus='$id' and c.id_kluster='$kluster';";
    return $this->db->query($query);
	}
 
function get_senarai_setting2($kursus)
	{
	$query  ="select group_concat(e.nama_giatmara) as nama_giatmara, b.nama_kursus as nama_kursus from ref_kluster a, ref_kursus b, settings_tawaran_kursus c, ref_intake d, ref_giatmara e 
	where a.id=b.id_kluster and c.id_kursus=b.id and c.id_intake=d.id and c.id_giatmara = e.id and  b.id='$kursus';";

    return $this->db->query($query);
	}
	
	function get_senarai_setting3($kursus)
	{
	$query  ="select c.id as stkid, e.nama_giatmara as nama_giatmara, b.nama_kursus as nama_kursus, f.nama_negeri 
			from ref_kluster a, ref_kursus b, settings_tawaran_kursus c, ref_intake d, ref_giatmara e, ref_negeri f
			where a.id=b.id_kluster and c.id_kursus=b.id and c.id_intake=d.id and c.id_giatmara = e.id 
			and f.id=e.id_negeri
			and  b.id='$kursus'
			order by f.nama_negeri, nama_giatmara ASC;";

    return $this->db->query($query);
	}

	function get_bilmodul($kursus)
	{ 
	$query  ="select count(b.id_modul) as bil_modul, a.nama_kursus as nama_kursus from ref_kursus a, ref_modul b where a.id=b.id_kursus and a.id='$kursus';";
    return $this->db->query($query);
	}

	function get_list_intake($id)
	{ 
	$query  ="SELECT a.id as id, a.id_intake as id_intake, b.nama_giatmara as giatmara, c.nama_kursus as kursus FROM settings_tawaran_kursus a LEFT JOIN ref_giatmara b ON a.id_giatmara = b.id LEFT JOIN ref_kursus c ON a.id_kursus=c.id WHERE a.id_intake = $id;";
    return $this->db->query($query);
	}
 

function cek_lpp5a($pelatih)
{
    $this->db->select('*'); 
    $this->db->from('lpp_5a');
    $this->db->where('id_pelatih', $pelatih);
    $this->db->where('status_jana' <> NULL);
     $query = $this->db->get();
    $result = $query->result_array();
    return $result;
}


function cek_lpp5b($pelatih)
{
    $this->db->select('*'); 
    $this->db->from('lpp_5b');
    $this->db->where('id_pelatih', $pelatih);
    $this->db->where('status_jana' <> NULL);
     $query = $this->db->get();
    $result = $query->result_array();
    return $result;
}

 function simpan_tawaran_kursus($data)
    {
		
		$this->db->insert('settings_tawaran_kursus', $data);
		
    }


 function cek_ref_intake($id)
{
    $this->db->select('*'); 
    $this->db->from('settings_tawaran_kursus');
    $this->db->where('id_intake', $id);
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
}

function get_list_ketuakluster()
{ 
	$query  =" SELECT a.id as id_admin, b.kluster_id as id_ketua, d.id as id_group, b.id as id_ketua_kluster, a.username AS username, a.first_name as first_name, c.nama_kluster as nama_kluster FROM admin_users a LEFT JOIN ketua_kluster b ON a.id=b.user_id LEFT JOIN ref_kluster c ON b.kluster_id=c.id LEFT JOIN  admin_users_groups d ON a.id=d.user_id WHERE d.group_id = 17;";

    return $this->db->query($query);
}

function get_data_ketuakluster($id)
{ 
	$query  ="SELECT c.id AS id, c.nama_kluster AS nama_kluster FROM admin_users a LEFT JOIN ketua_kluster b ON a.id=b.user_id LEFT JOIN ref_kluster c ON b.kluster_id = c.id WHERE a.id ='$id';";
    return $this->db->query($query);
}

function get_list_users()
{ 
	$query  =" SELECT * FROM admin_users;";
    return $this->db->query($query);
}


function edit_list_users($id)
{ 
	$query  =" SELECT * FROM admin_users WHERE id='$id';";
    return $this->db->query($query);
}


}
