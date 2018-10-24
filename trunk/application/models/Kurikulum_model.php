<?php
class Kurikulum_model extends CI_Model{
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');

	}

	function get_data($table)
	{
			$qry = $this->db->get($table);
			return $qry->result();
	}

	function get_user($id)
	{
		 $query  ="select min(c.id) as id,c.nama_giatmara as giatmara from admin_users a,staff_info_pangku_tugas b, ref_giatmara c where a.id_staff=b.id_stafF and b.id_giatmara = c.id and a.id='$id' group by giatmara order by giatmara";
    return $this->db->query($query);
	}

	function get_user2($id)
	{
		 $query  =" select min(b.id) as id, b.nama_kursus as kursus from settings_tawaran_kursus a, ref_kursus b, ref_intake c, ref_giatmara d, admin_users e, staff_info_pangku_tugas f where f.id_staff=e.id_staff  and f.id_giatmara = d.id and d.id = a.id_giatmara and b.id=a.id_kursus  and e.id='$id' group by kursus order by kursus;";


    return $this->db->query($query);
	}

function get_user2a($id,$id2)
	{
		 $query  ="select min(b.id) as id,  b.nama_kursus as kursus from settings_tawaran_kursus a, ref_kursus b, ref_intake c, ref_giatmara d, admin_users e, staff_info_pangku_tugas f where f.id_staff=e.id_staff  and f.id_giatmara = d.id and d.id = a.id_giatmara and b.id=a.id_kursus and e.id='$id' and b.id='$id2'  group by kursus order by kursus;";
    return $this->db->query($query);
	}

	function get_user2b($id,$id2)
	{
		 $query  ="select min(b.id) as id,  b.nama_kursus as kursus from settings_tawaran_kursus a, ref_kursus b, ref_intake c, ref_giatmara d, admin_users e, staff_info_pangku_tugas f where f.id_staff=e.id_staff  and f.id_giatmara = d.id and d.id = a.id_giatmara and b.id=a.id_kursus and e.id='$id' and b.id !='$id2'  group by kursus order by kursus;";
    return $this->db->query($query);
	}

	function get_user3($id)
	{
		 $query  =" select min(c.id) as id,  min(b.nama_kursus) as kursus, c.nama_intake as sesi, d.nama_giatmara as giatmara from settings_tawaran_kursus a, ref_kursus b, ref_intake c, ref_giatmara d, admin_users e, staff_info_pangku_tugas f where b.id = f.id_kursus and c.id = a.id_intake and f.id_giatmara = d.id and f.id_staff=e.id_staff and e.id='$id' group by sesi,giatmara order by giatmara";
    return $this->db->query($query);
	}

	
	function get_user3a($id,$id2)
	{
		 $query  ="select min(c.id) as id,  min(b.nama_kursus) as kursus, c.nama_intake as sesi, d.nama_giatmara as giatmara from settings_tawaran_kursus a, ref_kursus b, ref_intake c, ref_giatmara d, admin_users e, staff_info_pangku_tugas f where b.id = f.id_kursus and c.id = a.id_intake and f.id_giatmara = d.id and f.id_staff=e.id_staff and e.id='$id' and c.id='$id2' group by sesi,giatmara order by giatmara; ";

    return $this->db->query($query);
	}

	function get_user3b($id,$id2)
	{
		 $query  ="select min(c.id) as id,  min(b.nama_kursus) as kursus, c.nama_intake as sesi, d.nama_giatmara as giatmara from settings_tawaran_kursus a, ref_kursus b, ref_intake c, ref_giatmara d, admin_users e, staff_info_pangku_tugas f where b.id = f.id_kursus and c.id = a.id_intake and f.id_giatmara = d.id and f.id_staff=e.id_staff and e.id='$id' and c.id!='$id2' group by sesi,giatmara order by giatmara; ";
    return $this->db->query($query);
	}

	function get_user4($id)
	{
		 $query  ="select min(c.id) as id,  min(b.nama_kursus) as kursus, c.nama_intake as sesi, d.nama_giatmara as giatmara from settings_tawaran_kursus a, ref_kursus b, ref_intake c, ref_giatmara d, admin_users e, staff_info_pangku_tugas f where b.id = f.id_kursus and c.id = a.id_intake and f.id_giatmara = d.id and f.id_staff=e.id_staff and e.id='$id' group by sesi,giatmara order by giatmara; ";
		return $this->db->query($query);
	}

	function get_user5($id)
	{
		 $query  ="select a.nama_negeri, a.id as id from ref_negeri a, admin_users b, staff_info_pangku_tugas c where a.id= c.id_negeri and b.id_staff = c.id_staff and b.id='$id'group by id,a.nama_negeri order by a.nama_negeri; ";
		return $this->db->query($query);
	}


	function get_user5a($id,$negeri)
	{
		 $query  ="select a.nama_negeri, a.id as id from ref_negeri a, admin_users b, staff_info_pangku_tugas c where a.id= c.id_negeri and b.id_staff = c.id_staff and b.id='$id' and a.id=$negeri group by id,a.nama_negeri order by a.nama_negeri; ";
		return $this->db->query($query);
	}


	function get_user5b($id,$negeri)
	{
		 $query  ="select a.nama_negeri, a.id as id from ref_negeri a, admin_users b, staff_info_pangku_tugas c where a.id= c.id_negeri and b.id_staff = c.id_staff and b.id='$id' and a.id!=$negeri  group by id,a.nama_negeri order by a.nama_negeri;";
		return $this->db->query($query);
	}

	function get_user6($id)
	{
		 $query  ="select a.nama_giatmara as giatmara, a.id as id  from ref_giatmara a, staff_info_pangku_tugas b, admin_users c where b.id_negeri = a.id_negeri and c.id_staff = b.id_staff and c.id='$id' and a.id_type_giatmara =1 order by giatmara; ";
		return $this->db->query($query);
	}

	function get_user6a($id,$giatmara)
	{
		 $query  ="select a.nama_giatmara as giatmara, a.id as id  from ref_giatmara a, staff_info_pangku_tugas b, admin_users c where b.id_negeri = a.id_negeri and c.id_staff = b.id_staff and c.id ='$id' and a.id='$giatmara' and a.id_type_giatmara =1 order by giatmara; ";
		return $this->db->query($query);
	}


	function get_modul($giatmara,$kursus,$jeniskursus,$intake)
	{
		$query  ="call proc_pemarkahan_modul_new('$giatmara','$kursus','$jeniskursus','$intake')";
		$this->db->close();$this->db->initialize();
		$qry = $this->db->query($query);
		// echo $this->db->get_compiled_select("v_pelatih_p4_lpp04");
		//echo $this->db->last_query();

		//var_dump($query);die();
		return $qry;
		
		 //$this->db->close();

	}

	function get_modul2($id,$id2,$id3,$id4,$id5)
	{
		 $query  ="select * from v_kurikulum_p1_screen2_header where kod_modul='$id' and id_kursus='$id2' and id_giatmara ='$id3' and jenis_pelatih='$id4' and status=1 AND id_intake ='$id5'";
		  //var_dump($query);die();
		return $this->db->query($query); 
		}

	function get_modul3($id,$id2)
	{
		 $query  ="select * from v_kurikulum_p1_screen2_header where id_kursus='$id' and id_giatmara ='$id2' and status=1 limit 1";
		return $this->db->query($query); }


	function get_modul_detail($idkursus,$idmodul,$idmodul2,$idgiatmara,$jenis,$intake)
	{
		 $query  ="select* from v_kurikulum_p1_screen2_detail where id_ref_kursus='$idkursus' and kod_modul ='$idmodul' and id_modul ='$idmodul2' and id_giatmara ='$idgiatmara'and jenis_pelatih ='$jenis'and id_intake ='$intake'";
		// var_dump($query);die();
		return $this->db->query($query);
	}


	function get_modul_detail2($idkursus,$idmodul,$idgiatmara,$isi,$jenis,$intake)
	{
		 $query  =" select* from v_kurikulum_p1_screen2_detail where id_ref_kursus='$idkursus' and kod_modul ='$idmodul' and id_giatmara ='$idgiatmara' and status_isi_markah='$isi' and jenis_pelatih ='$jenis' and id_intake ='$intake'";
		// var_dump($query);die();
		return $this->db->query($query);
	}


	function insert_modul_detail($pbteori,$pbamali,$pmteori,$pmamali,$date,$pilih)
	{
		 $query  =" update v_kurikulum_p1_screen2_detail set tarikh_hantar_pengajar='$date',pb_teori='$pbteori',pb_amali='$pbamali',pam_teori='$pmteori',pm_amali='$pmamali',
		  where no_mykad='$pilih';";
		return $this->db->query($query);
	}

	
	function update_data($where,$data){
		$this->db->where($where);
		$this->db->update('markah_modul',$data);
	}

	function get_p1s4_header($id3,$id10)
	{
	    $query  ="select * from v_kurikulum_p1_screen4_header where id_kursus='$id3' AND jenis_pelatih ='$id10' limit 1 ";
	   // var_dump($query);die();
		return $this->db->query($query);
	}

	function get_borang2_header($id3)
	{
	    $query  ="select * from v_kurikulum_p1_screen2_header where id_modul='$id3' limit 1 ";
		return $this->db->query($query);
	}

	function get_p1s4_detail($id3,$id4)
	{
	    $query  ="select * from v_kurikulum_p1_screen4_detail where id_kursus='$id3' AND jenis_pelatih='$id4' AND id_markah_modul_2 !=''	";
	    //var_dump($query);die();
		return $this->db->query($query);
	}

	function get_p1s4_detail2($id,$isi,$jenis)
	{
	    $query  ="select * from v_kurikulum_p1_screen4_detail where id_kursus='$id' and status_isi_markah='$isi' AND jenis_pelatih='$jenis' AND id_markah_modul_2 !=''";
		return $this->db->query($query);
	} 

	function get_p2s6($id,$jenis)
	{
	    $query  ="select * from v_kurikulum_p2_screen6 where id_kursus='$id' AND jenis_pelatih='$jenis' ";
		return $this->db->query($query);
	}

	function get_p2s6_namakursus($id,$jenis)
	{
	    $query  ="select * from v_kurikulum_p2_screen6 where id_kursus='$id' AND jenis_pelatih='$jenis' limit 1";
		return $this->db->query($query);
	}

	function get_p2s7_baga($id)
	{
	    $query  ="select * from v_kurikulum_p2_screen7_a where id_pelatih='$id' order by kod_modul";
		return $this->db->query($query);
	}

	function get_p2s7_bagb($id)
	{
	    $query  ="select * from v_kurikulum_p2_screen7_b where id_pelatih='$id'";
		return $this->db->query($query);
	}

	function get_list_modul($id)
	{
	    $query  ="select a.nama_kursus, a.id as id_kursus , b.nama_giatmara,b.id as id_giatmara, c.id as id_set,e.nama_modul as nama_modul,e.kod_modul as kod_modul,e.id_modul as id_modul from ref_kursus a, ref_giatmara b, settings_tawaran_kursus c, ref_modul e where a.id = c.id_kursus and b.id=c.id_giatmara and e.id_kursus=a.id and c.id= '$id';";
		return $this->db->query($query);
	}

	function get_list_modul2($id)
	{
	    $query  ="select * from v_kurikulum_p1_screen2_detail where id_modul='$id'";
		return $this->db->query($query);
	}

	function get_list_modul3($id,$idgiatmara)
	{
	    $query  ="select * from v_kurikulum_p1_screen2_detail where id_modul='$id' AND id_giatmara ='$idgiatmara'";

	   // var_dump($query);die();
		return $this->db->query($query);
	}

	function get_p3s6($id)
	{
	    $query  ="select * from v_kurikulum_p3_screen6 where id_kursus='$id'";
		return $this->db->query($query);
	}

	function get_p3s6_namakursus($id)
	{
	    $query  ="select * from v_kurikulum_p3_screen6 where id_kursus='$id' limit 1";
		return $this->db->query($query);
	}


	function get_p4s6($id)
	{
	    $query  ="select * from v_kurikulum_p4_screen6 where id_kursus='$id' ";
		return $this->db->query($query);
	}

	function get_p4s6_namakursus($id)
	{
	    $query  ="select * from v_kurikulum_p4_screen6 where id_kursus='$id' limit 1";
		return $this->db->query($query);
	}

	function get_borang03_detail($butir,$pelatih,$giatmara,$kursus)
	{
	    $query  ="call proc_borang_03('$butir','$pelatih','$giatmara','$kursus')  ";
		return $this->db->query($query);
	}
	
	function get_borang03_header($pelatih,$giatmara,$kursus)
	{
	    $query  ="select * from v_kursus_terdahulu where id_pelatih='$pelatih' AND id_giatmara='$giatmara' AND id_settings_tawaran_kursus='$kursus';";
	  //  var_dump($query);die();
		return $this->db->query($query);
	}

	function get_borang04_detail($intake,$kursus,$giatmara)
	{
	    $query  ="select * from v_kurikulum_borang04 where id_intake='$intake' AND id_ref_kursus='$kursus' AND id_giatmara='$giatmara';";
		return $this->db->query($query);
	}

	function get_borang_pengurus($id)
	{
	    $query  ="SELECT b.id_giatmara AS id_giatmara, a.nama AS nama , a.no_mykad AS mykad from staff a LEFT JOIN  staff_info_pangku_tugas b ON  a.id = b.id_staff LEFT JOIN settings_tawaran_kursus c ON b.id_giatmara=c.id_giatmara WHERE a.id_jawatan=19 AND b.id_giatmara = '$id' GROUP BY id_giatmara, nama, mykad LIMIT 1 OFFSET 0;";
	    //var_dump($query);die();
		return $this->db->query($query);
	}


	 
	function get_borang_trainer1($id)
	{
	    $query  =" SELECT b.id_giatmara AS id_giatmara, a.nama AS nama , a.no_mykad AS mykad from staff a LEFT JOIN  staff_info_pangku_tugas b ON  a.id = b.id_staff LEFT JOIN settings_tawaran_kursus c ON b.id_giatmara=c.id_giatmara WHERE a.id_jawatan=30 AND b.id_giatmara = '$id' GROUP BY id_giatmara, nama, mykad LIMIT 1 OFFSET 0;";
	   //var_dump($query);die();
		return $this->db->query($query);
	}

	function get_borang_trainer2($id)
	{
	    $query  =" SELECT b.id_giatmara AS id_giatmara, a.nama AS nama , a.no_mykad AS mykad from staff a LEFT JOIN  staff_info_pangku_tugas b ON  a.id = b.id_staff LEFT JOIN settings_tawaran_kursus c ON b.id_giatmara=c.id_giatmara WHERE a.id_jawatan=30 AND b.id_giatmara = '$id' GROUP BY id_giatmara, nama, mykad LIMIT 1 OFFSET 1;";
	    //var_dump($query);die();
		return $this->db->query($query);
	}
	
	
	function get_borang04_header($intake)
	{
	    $query  ="select * from v_kurikulum_p2_screen7_b where id_intake='$intake' limit 1;";
		return $this->db->query($query);
	}

		function get_p6_detail($negeri,$giatmara,$kursus,$jeniskursus,$intake)
	{
	    $query  ="select * from  v_kurikulum_p6_screen1 where id_negeri='$negeri' and id_giatmara='$giatmara' and id_kursus='$kursus' and jenis_pelatih='$jeniskursus' and id_intake='$intake' ;";
	
		return $this->db->query($query);
	}

	function get_p6_detail3($negeri,$giatmara,$kursus,$jeniskursus,$intake)
	{
	    $query  ="select * from  v_kurikulum_p6_screen1 where id_negeri='$negeri' and id_giatmara='$giatmara' and id_kursus='$kursus' and jenis_pelatih='$jeniskursus' and id_intake='$intake' ;";
	
		return $this->db->query($query);
	}


	function get_p6_detail2($giatmara,$kursus,$jeniskursus,$intake)
	{
	    $query  ="select * from  v_kurikulum_p6_screen1 where id_giatmara='$giatmara' and id_kursus='$kursus' and jenis_pelatih='$jeniskursus' and id_intake='$intake' ;";
	   // var_dump($query);die();
	
		return $this->db->query($query);
	}


		function get_p5_detail($negeri,$giatmara,$kursus,$jeniskursus,$intake)
	{
	    	$query  =" select * from copy_v_kurikulum_p5_screen1 where id_negeri='$negeri' and id_giatmara='$giatmara' and id_ref_kursus='$kursus' and jenis_pelatih='$jeniskursus' and id_intake='$intake' ";
	  		return $this->db->query($query);
	}

	function get_p5_detail2()
	{
	    $query  ="select * from export_excel_sijil ;";
		return $this->db->query($query);
	}


	function get_p5_detail3($negeri,$giatmara,$kursus,$jeniskursus,$intake,$mykad2,$sijil)
	{
	    $query  ="select nama_penuh,no_mykad,nama_kursus,nama_intake,jenis_pelatih,nama_giatmara,ppkl_sah,gcpa from  copy_v_kurikulum_p5_screen1 where id_negeri='$negeri' and id_giatmara='$giatmara' and id_ref_kursus='$kursus' and jenis_pelatih='$jeniskursus' and id_intake='$intake' and no_mykad= '$mykad2' and $sijil = 1 group by id_giatmara,nama_giatmara, nama_kursus,nama_penuh,no_pelatih,no_mykad,spgm,saegm,skgm,sklgm,id_negeri,nama_negeri,id_ref_kursus,jenis_pelatih,id_intake,ppkl_sah,gcpa ;";
		return $this->db->query($query);
	}

	function coba($id)
  	{
      $query ="select a.id as id, a.nama_kursus as nama_kursus from ref_kursus a, ref_giatmara b, settings_tawaran_kursus c where a.id = c.id_kursus and b.id = c.id_giatmara and b.id='$id' group by nama_kursus, id ;";
    return $this->db->query($query);
    
      }

    
      	function dicoba($id)
  	{
      $query ="select a.id as id , a.nama_intake as sesi from ref_intake a, ref_kursus b, settings_tawaran_kursus c where a.id=c.id_intake and b.id=c.id_kursus and b.id = '$id' group by sesi,id;";
    	return $this->db->query($query);
    
      }

      function dicoba2($id)
  	{
      $query ="select a.id as id, a.nama_giatmara as nama_giatmara from ref_giatmara a, ref_negeri b where b.id = a.id_negeri  and b.id='$id' and a.id_type_giatmara <> 0 group by nama_giatmara, id ;";
    return $this->db->query($query);
    
      }


	function export_excel(){
        $query = $this->db->query("SELECT * from kurikulum_sijil");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }


    function get_kluster()
	{
	    $query  ="select * from ref_kluster ORDER by id ";
		return $this->db->query($query);
	}

	function get_kluster2($id)
	{
	    $query  ="select * from ref_kluster where id='$id'";
		return $this->db->query($query);
	}

    function get_negeri()
	{
	    $query  ="select * from ref_negeri ";
		return $this->db->query($query);
	}

	function get_negeri2($id)
	{
	    $query  ="select * from ref_negeri where id='$id'";
		return $this->db->query($query);
	}

	  function get_kursus()
	{
	    $query  ="select * from ref_kursus ";
		return $this->db->query($query);
	}

	function get_kursus2($id)
	{
	    $query  ="select * from ref_kursus where id='$id'";
		return $this->db->query($query);
	}

	  function get_intake()
	{
	    $query  ="select * from ref_intake ";
		return $this->db->query($query);
	}

	function get_intake2($id)
	{
	    $query  ="select * from ref_intake where id='$id'";
		return $this->db->query($query);
	}

	function get_giatmara()
	{
	    $query  ="select * from ref_giatmara ";
		return $this->db->query($query);
	}

	function get_giatmara2($id)
	{
	    $query  ="select * from ref_giatmara where id='$id'";
		return $this->db->query($query);
	}



	  function edit_kluster($id)
	{
	    $query  ="select * from ref_kluster where id='$id' ";
		return $this->db->query($query);
	}


	function updatekluster($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	

	function get_modul_nilai($id)
	{
	    $query  ="select b.* from ref_kursus a, ref_modul b, settings_tawaran_kursus c where a.id=c.id_kursus and a.id=b.id_kursus and c.id='$id' limit 1 ";
		return $this->db->query($query);
	}

function cek_lpp5a($pelatih)
{
 
	$this->db->select('*'); 
    $this->db->from('lpp_5a');
    $this->db->where('id_pelatih', $pelatih);
    $this->db->where('status_jana != ',NULL);
     $query = $this->db->get();
    $result = $query->result_array();
    return $result;
}

function get_lpp5a($id)
	{
	    $query  ="select * from lpp_5a where id_pelatih='$id' ";
	   // var_dump($query);die();
		return $this->db->query($query);
	}

function cek_lpp5b($pelatih)
{
    $this->db->select('*'); 
    $this->db->from('lpp_5b');
    $this->db->where('id_pelatih', $pelatih);
    $this->db->where('status_jana != ',NULL);
     $query = $this->db->get();
    $result = $query->result_array();
    return $result;
}

function get_lpp5b($id)
	{
	    $query  ="select * from lpp_5b where id_pelatih='$id' ";
	   // var_dump($query);die();
		return $this->db->query($query);
	}

}
?>
