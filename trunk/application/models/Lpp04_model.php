<?php

class Lpp04_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_all_negeri()
    {
        $qry = $this->db->get('ref_negeri');
        return $qry->result();
    }

    function get_all_giatmara($id)
    {
        $this->db->where('id_negeri', $id);
        $qry = $this->db->get('ref_giatmara');
        return $qry->result();
    }

    // methode get_giatmara_by_id
    function get_giatmara_by_id($giatmara)
    {
        $this->db->where('id', $giatmara);
        // echo $this->db->get_compiled_select("ref_giatmara");exit;
        $qry = $this->db->get('ref_giatmara');
        return $qry->result();
    }

    function get_all_kewarganegaraan()
    {
        $qry = $this->db->get('ref_kewarganegaraan');
        return $qry->result();
    }

    function get_all_kursus($id, $idintake="")
    {
        $this->db->where('id_giatmara', $id);
        if ($idintake!="") $this->db->where('id_intake', $idintake);
        $this->db->where('status', 1);
        // echo $this->db->get_compiled_select("v_giatmara_kursus");
        $qry = $this->db->get('v_giatmara_kursus');
        #echo $this->db->last_query();
		$qry=$this->db->query("select distinct 	id_kursus,nama_kursus from v_giatmara_kursus where id_giatmara=?", array($id));
        return $qry->result();
    }

    function get_kursus($where)
    {
        foreach ($where as $key => $value)
        {
            $this->db->where($key, $value);
        }

        $qry = $this->db->get('ref_kursus');
        return $qry->result();
    }

    function get_all_intake($giatmara, $kursus)
    {
        $this->db->where('id_kursus', $kursus);
        $this->db->where('id_giatmara', $giatmara);
        $this->db->where('status', 1);
        // echo $this->db->get_compiled_select("v_giatmara_kursus");exit;
        $qry = $this->db->get('v_giatmara_kursus');
        return $qry->result();
    }

    function get_giatmara_kursus($select, $where = NULL, $distinct=NULL)
    {
        $this->db->select($select);
        if ($where !== NULL)
        {
            foreach ($where as $key => $value)
            {
                $this->db->where($key, $value);
            }
        }

        if ($distinct !== NULL)
        {
            $this->db->distinct();
        }
        // echo $this->db->get_compiled_select("v_giatmara_kursus");exit;
        $qry = $this->db->get('v_giatmara_kursus');
        return $qry->result();
    }

    function get_all_senarai_permohonan($negeri, $giatmara, $kursus, $warganegara, $sesi_kemasukan)
    {
        $this->db->where('id_negeri', $negeri);
        $this->db->where('id_giatmara', $giatmara);
        $this->db->where('id_kursus', $kursus);
        $this->db->where('id_kewarganegaraan', $warganegara);
        $this->db->where('id_intake', $sesi_kemasukan);
        $this->db->where('id_temuduga_tetapan IS NULL');
        $this->db->where('keputusan_temuduga IS NULL');
        $this->db->where_in('pengesahan', array(1));
        $this->db->where_in('pengakuan', array(1,2));
        $qry = $this->db->get('v_tetapan_temuduga');
        // echo $this->db->last_query()."<br/>";
        return $qry->result();
    }
	//mmn add
	function getnamapengurus($id){
		$this->db->where('id_jawatan', '19');
		$this->db->where('id_giatmara', $id);
        $qry = $this->db->get('staff');
		//echo $this->db->last_query()."<br/>";
		foreach ($qry->result() as $val)
        {
		$namapengurus = $val->nama;
		}
		return $namapengurus;
	}

	function getidgiatmara($id){
	$idgiatmara='';
		$this->db->where('id', $id);
        $qry = $this->db->get('temuduga_tetapan');
		//echo $this->db->last_query()."<br/>";
		 foreach ($qry->result() as $val)
        {
		$idgiatmara = $val->id_giatmara;
		}
		return $idgiatmara;
	}

    function get_giatmara($id)
    {
        $this->db->where('id', $id);
        $qry = $this->db->get('ref_giatmara');
        return $qry->row();
    }

    function get_giatmara_pangku_tugas($id_staff)
    {
        $this->db->join('ref_giatmara','ref_giatmara.id=staff_info_pangku_tugas.id_giatmara');
        $this->db->select('ref_giatmara.*,staff_info_pangku_tugas.*');
        $this->db->where('id_staff', $id_staff);
        $qry = $this->db->get('staff_info_pangku_tugas');
        return $qry->row();
    }

    function get_id_staff_staff_info_pangku_tugas($giatmara_id)
    {
        $this->db->where('id_giatmara', $giatmara_id);
        $qry = $this->db->get('staff_info_pangku_tugas');
        return $qry->row();
    }

    function get_negeri($id)
    {
        $this->db->where('id', $id);
        // echo $this->db->get_compiled_select("ref_negeri");exit;
        $qry = $this->db->get('ref_negeri');
        return $qry->row();
    }

    // get staff based giatmara
    function get_staff($id)
    {
        $this->db->select("id_staff, nama");
        $this->db->where('id_giatmara', $id);
        $this->db->distinct();
        // echo $this->db->get_compiled_select("v_staff");exit;
        $qry = $this->db->get('v_staff');
        return $qry->result();
    }

    function get_jawatan_by_staff($id)
    {
        $this->db->where('staff.id', $id);
        $this->db->join('ref_jawatan', 'staff.id_jawatan = ref_jawatan.id');
        $qry = $this->db->get('staff');
        return $qry->row();
    }

    function insert_temuduga_tetapan($data)
    {
		$error=0;
		//$this->db->trans_start();
		if(!$this->db->insert('temuduga_tetapan', $data)) $error=1;

        $id_temuduga_tetapan = $this->db->insert_id();

        // insert into table temuduga_tetapan_potongan
        $this->db->where("default_selected",1);
        // echo $this->db->get_compiled_select("kew_potongan");exit;
        $qry = $this->db->get("kew_potongan");
        foreach ($qry->result() as $val)
        {
            $data_ttp["id_temudga_tetapan"] = $id_temuduga_tetapan;
            $data_ttp["id_kew_potongan"] = $val->id;
            // echo $this->db->set($data_ttp)->get_compiled_insert("temuduga_tetapan_potongan");
            if(!$this->db->insert("temuduga_tetapan_potongan", $data_ttp)) $error=1;
        }

        //exit();
		//return $this->db->affected_rows();
		//$this->db->trans_complete();
		/*
		if ($this->db->trans_status() === FALSE)
		{
			return false;// generate an error... or use the log_message() function to log your error
		} else {
			return true;
		}*/
		if($error==1) {
			return false;
		} else {
			return true;
		}
    }

    function get_cetakan_surat_temuduga($negeri, $giatmara, $kursus, $warganegara, $sesi_kemasukan)
    {
        $this->db->where('id_negeri', $negeri);
        $this->db->where('id_giatmara', $giatmara);
        $this->db->where('id_kursus', $kursus);
        $this->db->where('id_kewarganegaraan', $warganegara);
        $this->db->where('id_intake', $sesi_kemasukan);
        $this->db->where('tarikh_temuduga IS NOT NULL');
        // echo $this->db->get_compiled_select("v_tetapan_temuduga");exit;
        $qry = $this->db->get('v_cetakan_surat_temuduga_lpp04');
        #echo $this->db->last_query()."<br/>";
        return $qry->result();
    }

	   function get_cetakan_surat_temuduga_dei($negeri, $giatmara, $kursus, $warganegara, $sesi_kemasukan, $hal=0, $cari="")
    {
		//$hal=2;

        $this->db->where('id_negeri', $negeri);
        $this->db->where('id_giatmara', $giatmara);
        $this->db->where('id_kursus', $kursus);
        $this->db->where('id_kewarganegaraan', $warganegara);
        $this->db->where('id_intake', $sesi_kemasukan);
        $this->db->where('tarikh_temuduga IS NOT NULL');

		if(!empty($cari)){
			$this->db->where("  ( nama_penuh like '%".$cari."%' or no_mykad like '".$cari."' ) ");
		}
        // echo $this->db->get_compiled_select("v_tetapan_temuduga");exit;
		$this->db->limit( 10, $hal);
        $qry = $this->db->get('v_cetakan_surat_temuduga_lpp04');
        #echo $this->db->last_query()."<br/>";
        return $qry->result();
    }


    function get_keputusan_temuduga($negeri, $giatmara, $kursus, $warganegara, $sesi_kemasukan)
    {
        $this->db->where('id_negeri', $negeri);
        $this->db->where('id_giatmara', $giatmara);
        $this->db->where('id_kursus', $kursus);
        $this->db->where('id_kewarganegaraan', $warganegara);
        $this->db->where('id_intake', $sesi_kemasukan);
        // echo $this->db->get_compiled_select("v_keputusan_temuduga");exit;
        $qry = $this->db->get('v_keputusan_temuduga_lpp04');
        return $qry->result();
    }

    function get_gagal_temuduga($negeri, $giatmara, $kursus, $warganegara, $sesi_kemasukan)
    {
        $this->db->where('id_negeri', $negeri);
        $this->db->where('id_giatmara', $giatmara);
        $this->db->where('tukar_kursus', $kursus);
        $this->db->where('id_kewarganegaraan', $warganegara);
        $this->db->where('id_intake', $sesi_kemasukan);
        // echo $this->db->get_compiled_select("v_keputusan_temuduga");exit;
        $qry = $this->db->get('v_gagal_temuduga');
        #echo $this->db->last_query()."<br/>";
        return $qry->result();
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * @param string where1 nama_penuh pelatih
     * @param string where2 no_mykad pelatih
     * @param string where3 no_pelatih pelatih
     * @return array of objects
    **/
    function get_v_pelatihan_p6($where1, $where2, $where3, $id_giatmara)
    {
        //$this->db->where("id_giatmara", $id_giatmara);
        $this->db->group_start();
        $this->db->like("nama_penuh", $where1);
        $this->db->or_like("no_mykad", $where2);
        $this->db->or_like("no_pelatih", $where3);
        $this->db->group_end();
        #echo $this->db->get_compiled_select("v_pelatihan_p6");
        $qry = $this->db->get('v_pelatihan_p6');
        return $qry->result();
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * @param string where array
     * @return array of objects
    **/
    function get_v_pelatihan_p5_screen3($where)
    {
        foreach ($where as $key => $value)
        {
            $this->db->where($key, $value);
        }
        $qry = $this->db->get('v_pelatihan_p5_screen3');
        return $qry->result();
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * @param string where array
     * @return array of objects
    **/
    function get_v_pelatihan_p5_screen5($where)
    {
        foreach ($where as $key => $value)
        {
            $this->db->where($key, $value);
        }
        // echo $this->db->get_compiled_select("v_pelatihan_p5_screen5");exit;
        $qry = $this->db->get('v_pelatihan_p5_screen5');
        return $qry->result();
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * @param string where array
     * @return array of objects
    **/
    function get_v_pelatihan_p5_screen6($where)
    {
        foreach ($where as $key => $value)
        {
            $this->db->where($key, $value);
        }
        $qry = $this->db->get('v_pelatihan_p5_screen6');
        return $qry->result();
    }

    function get_v_permohonan_peribadi($where)
    {
		foreach ($where as $key => $value)
        {
            $this->db->where($key, $value);
        }
        $qry = $this->db->get('v_permohonan_peribadi');
        return $qry->result();
	}

    function update_pengesahan_pendaftaran($data, $where)
    {
        foreach ($where as $key => $value)
        {
            $this->db->where($key, $value);
        }
        // echo $this->db->set($data)->get_compiled_update("temuduga_tetapan");exit;
        $this->db->update('temuduga_tetapan', $data);
    }

    /**
     * @author Rapelino <ninolooh@gmail.com>
     * @param number $negeri array
     * @param number $giatmara array
     * @param number $kursus array
     * @return array of objects
    **/

    function get_v_pelatih_p4($negeri,$giatmara,$kursus,$sesi="")
    {
        // $array = array('id_negeri' => $negeri,
        //                'id_giatmara' => $giatmara,
        //                'id_kursus' => $kursus,
        //                 'pendaftaran_status'=>2);
        $array = array('id_negeri' => $negeri,
                       'id_giatmara' => $giatmara,
                       'id_kursus' => $kursus);
        $this->db->where($array);
        $this->db->where('(tawaran_status IS NULL or tawaran_status=0) AND keputusan_temuduga IN(2,3)');
        // echo $this->db->get_compiled_select("v_pelatih_p4_lpp04");
        $qry = $this->db->get('v_pelatih_p4_lpp04');
        return $qry->result();
    }


    /**
     * @author Rapelino <ninolooh@gmail.com>
     * @param number $idPemohon array
     * @param number $sesi array
     * @param number $kursus array
     * @param number $kelayakan array
     * @param number $tawaran array
     * @return array of objects
    **/
    public function update_temuduga($idPemohon, $sesi, $kursus, $kelayakan, $tawaran, $tgl, $jam)
    {
        if($tawaran){
            #echo $tgl." ".$jam."<br/>";
            $tarikh = DateTime::createFromFormat('d-m-Y',$tgl);
            $masa = new DateTime($jam);
            #echo "<pre>";print_r($idPemohon);echo "</pre>";
            #echo "<pre>";print_r($masa);echo "</pre>";
            foreach($idPemohon as $key => $value){
              if ($kursus[$key]!="") {
			  
				//ridei.karim@gmail.com was here, sunday, 2018-08-12
				$giatx  = $this->db->query("select * from temuduga_tetapan where id=?", array($key))->row()->id_giatmara;
				$kursusx = $this->db->query("select id from settings_tawaran_kursus where id_kursus=? and id_giatmara=? and id_intake=?", 
					array( $kursus[$key], $giatx, $sesi[$key] ) )->row()->id;//				echo $this->db->last_query();die();
			  
                $data = array(
                    'id_kursus' => $kursusx,//$kursus[$key],
                    //'tawaran_sesi'   => $sesi[$key],
                    //'tawaran_kursus' => $kursus[$key],
                    'tawaran_elaun'  => (($kelayakan[$key]!=null)?$kelayakan[$key]:0),
                    'tawaran_status' => $tawaran[$key],
                    'tawaran_tarikh_lapordiri	' => $tarikh->format('Y-m-d'),
                    'tawaran_masa_lapordiri	' => $masa->format('H:i:s'),
                    'tawaran_tarikh_cetak' => date("Y-m-d")
                );
              } else {
                $data = array(
                    'tawaran_sesi'   => $sesi[$key],
                    'tawaran_elaun'  => (($kelayakan[$key]!=null)?$kelayakan[$key]:0),
                    'tawaran_status' => $tawaran[$key],
                    'tawaran_tarikh_lapordiri	' => $tarikh->format('Y-m-d'),
                    'tawaran_masa_lapordiri	' => $masa->format('H:i:s'),
                    'tawaran_tarikh_cetak' => date("Y-m-d")
                );
              }
              #echo "<pre>";print_r($data);echo "</pre>";
              $this->db->where('id', $key);
            //   echo $this->db->set($data)->get_compiled_update("temuduga_tetapan");exit;
              $this->db->update('temuduga_tetapan', $data);
              #echo $this->db->last_query();
              //die();
            }
        }
    }

    /**
     * @author Rapelino <ninolooh@gmail.com>
     * @param number $negeri array
     * @param number $giatmara array
     * @param number $kursus array
     * @return array of objects
    **/

    function get_v_pelatih_p4_screen2($negeri,$giatmara,$kursus,$sesi="")
    {
        $array = array('id_negeri' => $negeri,
                       'id_giatmara' => $giatmara,
                       'id_kursus' => $kursus,
                       'id_intake' => $sesi
                       );
        $this->db->where($array);
        $this->db->where('(tawaran_status IS NOT NULL or tawaran_status=1) AND keputusan_temuduga IN(2,3)');
        $qry = $this->db->get('v_pelatihan_p4');
        return $qry->result();
    }

    /**
    * @author Rapelino <ninolooh@gmail.com>
    * @param number $idPemohon array
    * @param number $tawaran array
    * @return array of objects
    **/
    public function update_temuduga_cetak($idPemohon, $tawaran = NULL)
    {
        if (is_array($idPemohon))
        {
            foreach($idPemohon as $key => $value)
            {
                $status = (@$tawaran[$key] != "") ? 1 : 0;
                $data = array(
                    'tawaran_cetak'   => $status,
                    'tawaran_tarikh_cetak_2' => date('Y-m-d H:i:s',now())
                );
                $this->db->where('id', $key);
                $this->db->update('temuduga_tetapan', $data);
            }
        }
        else
        {
            $data = array(
                'tawaran_cetak'   => 1,
                'tawaran_tarikh_cetak_2' => date('Y-m-d H:i:s',now())
            );
            $this->db->where('id', $idPemohon);
            // echo $this->db->set($data)->get_compiled_update("temuduga_tetapan");exit;
            $this->db->update('temuduga_tetapan', $data);
        }
    }

  /**
   * @author Rapelino <ninolooh@gmail.com>
   * @param number $id array
   * @return array of objects
   **/
   public function update_temuduga_tetapan_cetak($id)
   {
     if(count($id)==1){ //single
       $data = array(
         /*'keputusan_temuduga' => '1',*/
         'cetak'   => 1,
         'tarikh_cetak' => date('Y-m-d H:i:s',now())
       );
       $this->db->where('id', $id);
     //   echo $this->db->set($data)->get_compiled_update('temuduga_tetapan');exit;
       $this->db->update('temuduga_tetapan', $data);
     } else { //multi
       foreach($id as $key => $value){
         if(@$tawaran[$key] != "") $status = 1; else $status = 0;
         $data = array(
           'keputusan_temuduga' => '1',
           'cetak'   => $status,
           'tarikh_cetak' => date('Y-m-d H:i:s',now())
         );

         $this->db->where('id_permohonan', $key);
         $this->db->update('temuduga_tetapan', $data);
       }
     }

   }

  /**
    * @author Rapelino <ninolooh@gmail.com>
    * @param number $id array
    * @return array of objects
    **/
    public function getDataCetakanEmuduga($id) {

    //   $qry = "SELECT *, c.alamat as alamat1 FROM v_cetakan_surat_temuduga a,permohonan_kursus b, permohonan_butir_peribadi c, ref_giatmara d
    //                    WHERE a.id_temuduga_tetapan=$id AND
    //                    a.id_permohonan_kursus = b.id AND
    //                    b.id_permohonan = c.id AND
    //                    a.id_giatmara = d.id
    //           ";
    $qry = "SELECT * FROM v_cetakan_surat_temuduga_lpp04 WHERE id_temuduga_tetapan=".$id;

      $data = $this->db->query($qry);
      $dataArr = $data->result_array();
      return $dataArr;
    }

    public function getRefKeputusanTemuduga() {
      $qry = $this->db->get('ref_keputusan_temuduga');
      #echo $this->db->last_query();
      return $qry->result();
    }



    public function getSesi($idgiatmara) {
        /*
        select ri.id as idintake, ri.nama_intake from ref_intake ri
        left join settings_tawaran_kursus stk on ri.id=stk.id_intake
        where stk.status=1 and stk.id_giatmara=3
        */
        $this->db->select('ref_intake.id as idintake, ref_intake.nama_intake');
        $this->db->join('settings_tawaran_kursus', 'settings_tawaran_kursus.id_intake=ref_intake.id', 'left');
        $this->db->where('settings_tawaran_kursus.status', 1);
        $this->db->where('settings_tawaran_kursus.id_giatmara', $idgiatmara);
        // echo $this->db->get_compiled_select("ref_intake");exit;
        $this->db->distinct();
        $qry = $this->db->get('ref_intake');
        #echo $this->db->last_query();
        return $qry->result();
    }

  public function update_temuduga_kemaskini($tawaran)
    {
      #echo "<pre>";print_r($tawaran);echo "</pre>";
      $data = array(
        'tawaran_status' => 1,
        'tawaran_sesi' => $tawaran['opt_sesi'],
        'tawaran_kursus' => $tawaran['opt_kursus']
      );
      $this->db->where('id', $tawaran['idTetapanTemuduga']);
      $this->db->update('temuduga_tetapan', $data);
      #echo $this->db->last_query();
    }

    function get_cetak_tawaran_kursus($where)
    {
        foreach ($where as $key => $val)
        {
            $this->db->where($key, $val);
        }

        $qry = $this->db->get('v_cetak_tawaran_kursus_lpp04');
        return $qry->row();
    }

    function update_bp($data, $where)
    {
        foreach ($where as $key => $value)
        {
            $this->db->where($key, $value);
        }
        $this->db->update('permohonan_butir_peribadi', $data);
    }

    function get_data_staff($where = FALSE)
    {
      if ($where !== FALSE)
      {
        if (is_array($where))
        {
          foreach ($where as $key => $value)
          {
            $this->db->where($key, $value);
          }
        }
      }
      return $this->db->get("staff");
    }
}
