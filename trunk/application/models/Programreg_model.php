<?php
class Programreg_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('kew_model', 'kew');
        $this->load->model('pelatih_model', 'pelatih');
    }

    public function checkSah($id, $intake) {
          $qry = $this->db->select('temuduga_tetapan.id, temuduga_tetapan.id_permohonan');
          $qry = $this->db->where('temuduga_tetapan.id_permohonan',$id);
          $qry = $this->db->where('settings_tawaran_kursus.id_intake',$intake);
          $qry = $this->db->where('temuduga_tetapan.keputusan_temuduga',2);
          $qry = $this->db->where('temuduga_tetapan.tawaran_status',1);
          $qry = $this->db->where('temuduga_tetapan.pendaftaran_status IN (4,5)');
          $qry = $this->db->join('settings_tawaran_kursus', 'settings_tawaran_kursus.id=temuduga_tetapan.tukar_kursus');
          $qry = $this->db->get('temuduga_tetapan');
          #echo $this->db->last_query();
          return $qry->result();
        }

    public function get_by_id_permohonan($id) {
      $qry = $this->db->select('id');
      $qry = $this->db->where('id_permohonan',$id);
      $qry = $this->db->get('temuduga_tetapan');
      #echo $this->db->last_query();
      return $qry->result();
    }

    public function get_by_id($id) {
      $qry = $this->db->where('id',$id);
    //   echo $this->db->get_compiled_select('temuduga_tetapan');exit;
      $qry = $this->db->get('temuduga_tetapan');
      #echo $this->db->last_query();
      return $qry->result();
    }

    public function get_id_kursus_by_idsetting($id) {
      $qry = $this->db->where('id', $id);
      $qry = $this->db->get('settings_tawaran_kursus');
      #echo $this->db->last_query();
      return $qry->result();
    }

    public function get_modul_by_idkursus($idkursus) {
      $qry = $this->db->select('id_kursus, id_modul');
      $qry = $this->db->where('id_kursus', $idkursus);
      $qry = $this->db->get('ref_modul');
      #echo $this->db->last_query();
      return $qry->result();
    }

    public function get_all_seranai_penawaran_kursus_s1($negeri="", $giatmara="", $kursus="", $sesi_kemasukan="", $idtemudugatetapan="")
    {
      if ($negeri!="") $this->db->where('id_negeri', $negeri);
      if ($giatmara!="") $this->db->where('id_giatmara', $giatmara);
      if ($kursus!="") $this->db->where('id_kursus', $kursus);
      #$this->db->where('id_kewarganegaraan', $warganegara);
      if ($sesi_kemasukan!="") $this->db->where('id_intake', $sesi_kemasukan);
      if ($idtemudugatetapan!="") $this->db->where('id_temuduga_tetapan', $idtemudugatetapan);
      if ($negeri!="" || $giatmara!="" || $kursus!="" || $sesi_kemasukan!="" || $idtemudugatetapan!="") {
        if ($idtemudugatetapan!="") {
          $qry = $this->db->select('ref_kluster.nama_kluster');
          $qry = $this->db->join('ref_kursus', 'v_pelatih_p5_screen1_lpp04.id_kursus=ref_kursus.id');
          $qry = $this->db->join('ref_kluster', 'ref_kursus.id_kluster=ref_kluster.id');
        }
        $qry = $this->db->select('v_pelatih_p5_screen1_lpp04.*, kew_bank.name as name_bank');
        #$this->db->where('tindakan', 0, FALSE);
        #$this->db->or_where('tindakan', NULL, FALSE);
        #$this->db->or_where('tindakan', 2, FALSE);
        $qry = $this->db->join('kew_bank', 'v_pelatih_p5_screen1_lpp04.nama_bank=kew_bank.id', 'left');
        $qry = $this->db->join('kew_kod_kombinasi', 'v_pelatih_p5_screen1_lpp04.id_kew_kod_kombinasi=kew_kod_kombinasi.id', 'left');
        // echo $this->db->get_compiled_select("v_pelatih_p5_screen1_lpp04");exit;
        $qry = $this->db->get('v_pelatih_p5_screen1_lpp04');
        #echo $this->db->last_query()."<br/>";
        return $qry->result();
      } else {
        return array();
      }
    }
	
	public function get_all_seranai_penawaran_kursus_s1_dei($negeri="", $giatmara="", $kursus="", $sesi_kemasukan="", $idtemudugatetapan="")
    {
      if ($negeri!="") $this->db->where('id_negeri', $negeri);
      if ($giatmara!="") $this->db->where('id_giatmara', $giatmara);
      if ($kursus!="") $this->db->where('id_kursus', $kursus);
      #$this->db->where('id_kewarganegaraan', $warganegara);
      if ($sesi_kemasukan!="") $this->db->where('id_intake', $sesi_kemasukan);
      if ($idtemudugatetapan!="") $this->db->where('id_temuduga_tetapan', $idtemudugatetapan);
      if ($negeri!="" || $giatmara!="" || $kursus!="" || $sesi_kemasukan!="" || $idtemudugatetapan!="") {
        if ($idtemudugatetapan!="") {
          $qry = $this->db->select('ref_kluster.nama_kluster');
          $qry = $this->db->join('ref_kursus', 'v_pelatih_p5_screen1_lpp04.id_kursus=ref_kursus.id');
          $qry = $this->db->join('ref_kluster', 'ref_kursus.id_kluster=ref_kluster.id');
        }
        $qry = $this->db->select('v_pelatih_p5_screen1_lpp04.*, ref_kluster.id as idkluster,kew_bank.name as name_bank');
        #$this->db->where('tindakan', 0, FALSE);
        #$this->db->or_where('tindakan', NULL, FALSE);
        #$this->db->or_where('tindakan', 2, FALSE);
        $qry = $this->db->join('kew_bank', 'v_pelatih_p5_screen1_lpp04.nama_bank=kew_bank.id', 'left');
        $qry = $this->db->join('kew_kod_kombinasi', 'v_pelatih_p5_screen1_lpp04.id_kew_kod_kombinasi=kew_kod_kombinasi.id', 'left');
        // echo $this->db->get_compiled_select("v_pelatih_p5_screen1_lpp04");exit;
        $qry = $this->db->get('v_pelatih_p5_screen1_lpp04');
        #echo $this->db->last_query()."<br/>";
        return $qry->result();
      } else {
        return array();
      }
    }

    public function get_all_seranai_penawaran_kursus_s3($negeri="", $giatmara="", $kursus="", $sesi_kemasukan="", $idtemudugatetapan="")
    {
      if ($negeri!="") $this->db->where('id_negeri', $negeri);
      if ($giatmara!="") $this->db->where('id_giatmara', $giatmara);
      if ($kursus!="") $this->db->where('id_kursus', $kursus);
      #$this->db->where('id_kewarganegaraan', $warganegara);
      if ($sesi_kemasukan!="") $this->db->where('id_intake', $sesi_kemasukan);
      if ($idtemudugatetapan!="") $this->db->where('id_temuduga_tetapan', $idtemudugatetapan);
      if ($negeri!="" || $giatmara!="" || $kursus!="" || $sesi_kemasukan!="" || $idtemudugatetapan!="") {
        $qry = $this->db->select('v_pelatih_p5_screen3_lpp04.*, kew_bank.name as name_bank');
        #$this->db->where('tindakan', 1, FALSE);
        #$this->db->or_where('tindakan', 3, FALSE);
        $qry = $this->db->join('kew_bank', 'v_pelatih_p5_screen3_lpp04.nama_bank=kew_bank.id', 'left');
        // echo $this->db->get_compiled_select("v_pelatih_p5_screen3_lpp04");exit;
        $qry = $this->db->get('v_pelatih_p5_screen3_lpp04');
        #echo $this->db->last_query();
        return $qry->result();
      } else {
        return array();
      }
    }

    public function get_all_seranai_penawaran_kursus_s4($negeri="", $giatmara="", $kursus="", $sesi_kemasukan="", $idtemudugatetapan="")
    {
      if ($negeri!="") $this->db->where('id_negeri', $negeri);
      if ($giatmara!="") $this->db->where('id_giatmara', $giatmara);
      if ($kursus!="") $this->db->where('id_kursus', $kursus);
      #$this->db->where('id_kewarganegaraan', $warganegara);
      if ($sesi_kemasukan!="") $this->db->where('id_intake', $sesi_kemasukan);
      if ($idtemudugatetapan!="") $this->db->where('id_temuduga_tetapan', $idtemudugatetapan);
      if ($negeri!="" || $giatmara!="" || $kursus!="" || $sesi_kemasukan!="" || $idtemudugatetapan!="") {
        $qry = $this->db->select('v_pelatih_p5_screen5_lpp04.*, kew_bank.name as name_bank');
        #$this->db->where('tindakan', 4, FALSE);
        $qry = $this->db->join('kew_bank', 'v_pelatih_p5_screen5_lpp04.nama_bank=kew_bank.id', 'left');
        // echo $this->db->get_compiled_select("v_pelatih_p5_screen5_lpp04");exit;
        $qry = $this->db->get('v_pelatih_p5_screen5_lpp04');
        #echo $this->db->last_query();
        return $qry->result();
      } else {
        return array();
      }
    }

    public function get_all_seranai_penawaran_kursus_s6($negeri="", $giatmara="", $kursus="", $sesi_kemasukan="", $idtemudugatetapan="")
    {
      if ($negeri!="") $this->db->where('id_negeri', $negeri);
      if ($giatmara!="") $this->db->where('id_giatmara', $giatmara);
      if ($kursus!="") $this->db->where('id_kursus', $kursus);
      #$this->db->where('id_kewarganegaraan', $warganegara);
      if ($sesi_kemasukan!="") $this->db->where('id_intake', $sesi_kemasukan);
    //   if ($idtemudugatetapan!="") $this->db->where('id_temuduga_tetapan', $idtemudugatetapan);
    if ($idtemudugatetapan!="") $this->db->where('id_temuduga_tetapan', $idtemudugatetapan);
      if ($negeri!="" || $giatmara!="" || $kursus!="" || $sesi_kemasukan!="" || $idtemudugatetapan!="") {
        if ($idtemudugatetapan!="") {
          $qry = $this->db->select('ref_kluster.nama_kluster');
          $qry = $this->db->join('ref_kursus', 'v_pelatih_p5_screen6_lpp04.id_kursus=ref_kursus.id');
          $qry = $this->db->join('ref_kluster', 'ref_kursus.id_kluster=ref_kluster.id');
        }
        $qry = $this->db->select('v_pelatih_p5_screen6_lpp04.*, kew_bank.name as name_bank');
        #$this->db->where('tindakan', 4, FALSE);
        $qry = $this->db->join('kew_bank', 'v_pelatih_p5_screen6_lpp04.nama_bank=kew_bank.id', 'left');
        // echo $this->db->get_compiled_select("v_pelatih_p5_screen6_lpp04");exit;
        $qry = $this->db->get('v_pelatih_p5_screen6_lpp04');
        #echo $this->db->last_query();
        return $qry->result();
      } else {
        return array();
      }
    }

    public function get_potongan_by_temuduga_kewpot($idtemuduga, $idkewpotongan='') {
      $qry = $this->db->select('temuduga_tetapan_potongan.id as id_temuduga_potongan');
      $qry = $this->db->select('kew_potongan.id as id_potongan, kew_potongan.name as name_potongan');
      $qry = $this->db->where('id_temudga_tetapan', $idtemuduga);
      if ($idkewpotongan!='') $qry = $this->db->where('id_kew_potongan', $idkewpotongan);
      $qry = $this->db->where('kew_potongan.status',1);
      $qry = $this->db->join('kew_potongan', 'kew_potongan.id=temuduga_tetapan_potongan.id_kew_potongan');
      $qry = $this->db->get('temuduga_tetapan_potongan');
      #echo $this->db->last_query();
      return $qry->result();
    }
	
	//mmn add to get kelayakan elaun
	public function get_kelayakan_elaun($idtemuduga) {
      $qry = $this->db->select('tawaran_elaun');
      $qry = $this->db->where('id', $idtemuduga);
      $qry = $this->db->get('temuduga_tetapan');
      #echo $this->db->last_query();
      return $qry->result();
    }

    public function update_pendaftaran_status($data) {
        $this->db->where('id', $data['id']);
        // echo $this->db->set($data)->get_compiled_update('temuduga_tetapan');
        $this->db->update('temuduga_tetapan', $data);

        $lastid = $data['id'];
        return $lastid;
    }

    public function update_id_kursus_daftar($data) {
        $this->db->where('id_permohonan', $data['id_permohonan']);
        // echo $this->db->set($data)->get_compiled_update('temuduga_tetapan');
        $this->db->update('temuduga_tetapan', $data);

        $lastid = $data['id'];
        return $lastid;
    }

    public function update_temudugatetapan_s1($data) {
        $this->db->trans_start();

        /* SIMPAN BUTIR */
        $data_pbp["id"] = $data["txt_id_permohonan_butir_peribadi"];
        $data_pbp["nama_penuh"] = $data["txt_nama"];
        $data_pbp["no_mykad"] = $data["txt_mykad"];
        $this->db->where("id", $data["txt_id_permohonan_butir_peribadi"]);
        // echo $this->db->set($data_pbp)->get_compiled_update("permohonan_butir_peribadi");exit;
        $this->db->update("permohonan_butir_peribadi", $data_pbp);
        /* END SIMPAN BUTIR PERIBADI */

        $idtemudugatetapan = $data['idtemudugatetapan'];
        $data_1 = array();
        $data_1['tawaran_mula_elaun'] = date('Y-m-d', strtotime($data['tarikh_mula']));
        $data_1['tawaran_tamat_elaun'] = date('Y-m-d', strtotime($data['tarikh_tamat']));
        $data_1['tawaran_nama_bank'] = $data['bank_selector'];
        $data_1['tawaran_no_akaun'] = $data['no_akaun'];
        $data_1['tawaran_cara_bayaran'] = 'autopay';
        $data_1['id_kew_kod_kombinasi'] = $data['kod_selector'];
        /* untuk tukar kursus */
		$giatmara=$this->db->query("select id_giatmara as giatmara from temuduga_tetapan where id=?", array($idtemudugatetapan))->row()->giatmara;
		$idkursusx = $this->db->query("select id from settings_tawaran_kursus where id_kursus=? and id_giatmara=? and id_intake=? limit 1", array($data['opt_kursus'], $giatmara, $data['opt_sesi']))->row()->id;
        $data_1["id_kursus"] = $idkursusx;//$data["opt_kursus"];

        // Temuduga tetapan
        $this->db->where('id', $idtemudugatetapan);
        // echo $this->db->set($data_1)->get_compiled_update("temuduga_tetapan");exit;
        $this->db->update('temuduga_tetapan', $data_1);

        if (count($data['potselector'])) {
            $this->db->where('id_temudga_tetapan', $idtemudugatetapan);
            $this->db->delete('temuduga_tetapan_potongan');

            foreach ($data['potselector'] as $potselector) {
                $data_2 = array();
                #$ck_pot = $this->kew->get_potongan_by_temuduga_kewpot($idtemudugatetapan, $potselector);
                #if (count($ck_pot)>0) {
                #  $data_2['id'] = $ck_pot[0]->id;
                #}
                $data_2['id_temudga_tetapan'] = $idtemudugatetapan;
                $data_2['id_kew_potongan'] = $potselector;
                $this->db->replace('temuduga_tetapan_potongan', $data_2);
            }
        }

        $lastid = $idtemudugatetapan;
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) $lastid = 0;
        return $lastid;
    }

    public function update_pelatih($data) {
      $status = 1;
      $this->db->trans_start();
      // echo "<pre>";print_r($data);echo "</pre>";exit;
      $arr_temudugatetapan = $data['id_temuduga_tetapan'];
      $arr_bp = $data['id_bp'];
      $arr_permohonan = $data['id_permohonan'];
      $arr_nama_peribadi = $data['butir_peribadi_name'];
      $arr_mykad_peribadi = $data['butir_peribadi_mykad'];
      $arr_chk_elaun = $data['chk_elaun'];
      $arr_chk_tindakan = $data['chk_tindakan'];

      $upd_temuduga = array();
    //   echo "<pre>";print_r($arr_chk_elaun);echo "</pre>";exit;
      foreach($arr_temudugatetapan as $idx=>$val) {
        // Temuduga Tetapan
        $id_upd_temuduga = $val;
        if ($arr_chk_elaun[$idx]!="") $upd_temuduga['tawaran_elaun'] = $arr_chk_elaun[$idx];
        if ($arr_chk_tindakan[$idx]!="") $upd_temuduga['pendaftaran_status'] = $arr_chk_tindakan[$idx];
        $this->db->where('id', $id_upd_temuduga);
        // echo $this->db->set($upd_temuduga)->get_compiled_update("temuduga_tetapan");
        $this->db->update('temuduga_tetapan', $upd_temuduga);

        // Butir Peribadi
        $id_upd_bp = $arr_bp[$idx];
        $upd_bp['nama_penuh'] = $arr_nama_peribadi[$idx];
        $upd_bp['no_mykad'] = $arr_mykad_peribadi[$idx];
        $this->db->where('id', $id_upd_bp);
        $this->db->update('permohonan_butir_peribadi', $upd_bp);

        if ($arr_chk_tindakan[$idx]=="" || $arr_chk_tindakan[$idx]==0) {
          # echo "back<br/>"; // Bila tidak sah
          $rs = $this->get_by_id_permohonan($arr_permohonan[$idx]);
          #echo "<pre>";print_r($rs);echo "</pre>";
          if (count($rs)) {
            foreach ($rs as $r) {
              $id_upd_temuduga_2 = $r->id;
              $upd_temuduga_2['id_kursus_sah'] = 0;
              $upd_temuduga_2['pendaftaran_status'] = 0;
              $this->db->where('id', $id_upd_temuduga_2);
              $this->db->update('temuduga_tetapan', $upd_temuduga_2);
            }
          }
        } elseif ($arr_chk_tindakan[$idx]==5){
          # echo "forward<br/>";  // Bila sah
          $rs = $this->get_by_id($val);
        //   echo "<pre>";var_dump($rs);echo "</pre>";
          $rs_pot = $this->get_potongan_by_temuduga_kewpot($val);
        //   echo "<pre>";print_r($rs_pot);echo "</pre>";exit;
          if (count($rs)) {
            // Pelatih
            // $upd_pelatih['id_permohonan'] = $arr_permohonan[$idx];
            // $upd_pelatih['id_permohonan'] = $rs[0]->id;
            $upd_pelatih['id_permohonan'] = $arr_bp[$idx];
            $upd_pelatih['no_pelatih'] = $this->generate_no_pelatih();
            $upd_pelatih['no_mykad'] = $arr_mykad_peribadi[$idx];
            $upd_pelatih['id_giatmara'] = $rs[0]->id_giatmara;
            $upd_pelatih['id_kursus'] = $rs[0]->id_kursus_sah;
            $upd_pelatih['status_pelatih'] = 1;
            $upd_pelatih['kelayakan_elaun'] = $rs[0]->tawaran_elaun;
            $upd_pelatih['nama_bank'] = $rs[0]->tawaran_nama_bank;
            $upd_pelatih['no_akaun'] = $rs[0]->tawaran_no_akaun;
            $upd_pelatih['cara_bayaran'] = $rs[0]->tawaran_cara_bayaran;
            $upd_pelatih['id_kew_kod_kombinasi'] = $rs[0]->id_kew_kod_kombinasi;
            $upd_pelatih['tarikh_mula_kursus'] = $rs[0]->tawaran_mula_elaun;
            $upd_pelatih['tarikh_tamat_kursus'] = $rs[0]->tawaran_tamat_elaun;
            $upd_pelatih["tarikh_daftar"] = date("Y-m-d");
            // echo $this->db->set($upd_pelatih)->get_compiled_insert("pelatih");
            $this->db->insert('pelatih', $upd_pelatih);
            #echo $this->db->last_query()."<br/>";
            $id_insert_pelatih = $this->db->insert_id();

            $data_lpp_04["id_pelatih"] = $id_insert_pelatih;
            // echo $this->db->set($data_lpp_04)->get_compiled_insert("lpp_04");
            $this->db->insert("lpp_04", $data_lpp_04);

            // Pelatih Potongan
            $this->db->where('id_pelatih', $id_insert_pelatih);
            $this->db->delete('pelatih_potongan');

            if (count($rs_pot)) {
              foreach ($rs_pot as $r_pot) {
                $upd_pelatih_pot['id_pelatih'] = $id_insert_pelatih;
                $upd_pelatih_pot['id_kew_potongan'] = $r_pot->id_potongan;
                $this->db->insert('pelatih_potongan', $upd_pelatih_pot);
                #echo $this->db->last_query()."<br/>";
              }
            }

            // Markah modul
            $rs_c = $this->get_id_kursus_by_idsetting($rs[0]->id_kursus_sah);
            $id_kursus = $rs_c[0]->id_kursus;
            $rs_m1 = $this->get_modul_by_idkursus($id_kursus);
            if (count($rs_m1)) {
              foreach ($rs_m1 as $m1) {
                $upd_markahmodul['id_pelatih'] = $id_insert_pelatih;
                $upd_markahmodul['id_kursus'] = $rs[0]->id_kursus_sah; // id setting tawaran kursus
                $upd_markahmodul['id_modul'] = $m1->id_modul;
                // echo $this->db->set($upd_markahmodul)->get_compiled_insert("markah_modul");
                $this->db->insert('markah_modul', $upd_markahmodul);
                #echo $this->db->last_query()."<br/>";
              }
            }

            // Markah modul 2
            $upd_markahmodul2['id_pelatih'] = $id_insert_pelatih;
            $upd_markahmodul2['id_kursus'] = $rs[0]->id_kursus_sah; // id setting tawaran kursus
            // echo $this->db->set($upd_markahmodul2)->get_compiled_insert("markah_modul_2");
            $this->db->insert('markah_modul_2', $upd_markahmodul2);
            #echo $this->db->last_query()."<br/>";

            // Markah modul status
            $upd_markahmodulstatus['id_pelatih'] = $id_insert_pelatih;
            #$upd_markahmodul2['id_kursus'] = $rs[0]->id_kursus_sah; // id setting tawaran kursus
            // echo $this->db->set($upd_markahmodulstatus)->get_compiled_insert("markah_modul_status");
            $this->db->insert('markah_modul_status', $upd_markahmodulstatus);
            #echo $this->db->last_query()."<br/>";
          }
      }
        
		//ridei.karim@gmail.com when tidak
			if($arr_chk_tindakan[$idx]==0){
				$datax['tawaran_sesi']= NULL;;
				$datax['tawaran_kursus']= NULL;
				$datax['tawaran_elaun']= NULL;
				$datax['tawaran_nama_bank']= NULL;
				$datax['tawaran_no_akaun']= NULL;
				$datax['tawaran_cara_bayaran']= NULL;
				$datax['tawaran_status']= NULL;
				$datax['tawaran_tarikh_lapordiri']= NULL;
				$datax['tawaran_masa_lapordiri']= NULL;
				$datax['tawaran_cetak']= NULL;
				$datax['tawaran_tarikh_cetak']= NULL;
				$datax['tawaran_tarikh_cetak_2']= NULL;
				$datax['pendaftaran_status']= 0;
				$datax['id_kursus_daftar']= null;
				$datax['tawaran_mula_elaun']= NULL;
				$datax['tawaran_tamat_elaun']= NULL;
				$datax['id_kew_kod_kombinasi']= NULL;
				$datax['id_kursus_sah']= NULL;
				//$datax['jenis_pelatih']= 'LPP04';
				//$datax['id_pemohon']= 541;
				//$datax['d_permohonan_kursus_lpp09']= NULL;
				//$datax['nomor_surat_tawaran']= NULL;
				$this->db->where('id', $id_upd_temuduga);//here
				$this->db->update('temuduga_tetapan', $datax);		
				//echo $this->db->last_query();exit;
			}
		}
    //   exit;
    // echo $this->db->set($upd_temuduga)->get_compiled_update("temuduga_tetapan");exit;
      #echo "<pre>";print_r($upd_temuduga);echo "</pre>";
      $this->db->trans_complete();
      if ($this->db->trans_status() === FALSE) $status = 0;
    //   echo $status;exit;
      return $status;
    }

    private function generate_no_pelatih($id_pbp=0) {
      // create auto no pelatih
      // hitung jumlah data di table pelatih
      $jml_data_pbp = $this->pelatih->count_data();
      // jika lebih dari 0 maka sudah ada isi, maka ambil no_pelatih yang terakhir
      if ($jml_data_pbp > 0 )
      {
        $mydata = $this->pelatih->getNoPelatih($id_pbp);
        $my_no_pelatih = $mydata->no_pelatih;
        if ($my_no_pelatih) $no_pelatih = $my_no_pelatih;
        else
        {
          $row_pbp_no = $this->pelatih->get_last_no_pelatih();
          $last_no_pelatih = substr($row_pbp_no->no_pelatih,6,4);
          $new_no_pelatih = $last_no_pelatih + 1;
          if (strlen($new_no_pelatih)==4)
          {
            $nrp = $new_no_pelatih;
          }
          elseif (strlen($new_no_pelatih)==3)
          {
            $nrp = "0".$new_no_pelatih;
          }
          elseif (strlen($new_no_pelatih)==2)
          {
            $nrp = "00".$new_no_pelatih;
          }
          elseif (strlen($new_no_pelatih)==1)
          {
            $nrp = "000".$new_no_pelatih;
          }
          $no_pelatih = date("Ym").$nrp;
        }
      }
      else
      {
        $no_pelatih = date("Ym")."0001";
      }
      return $no_pelatih;
    }

    function get_giatmara_kursus($select = "*", $where = FALSE, $distinct = FALSE, $order = FALSE)
    {
        $this->db->select($select);

        if ($order !== FALSE)
        {
            $this->db->order_by($order);
        }

        if ($where !== FALSE)
        {
            foreach ($where as $key => $value)
            {
                $this->db->where($key, $value);
            }
        }

        if ($distinct !== FALSE)
        {
            $this->db->distinct();
        }
        // echo $this->db->get_compiled_select("v_giatmara_kursus");
        $qry = $this->db->get('v_giatmara_kursus');
        return $qry->result();
    }

    function get_giatmara_for_staff($id_staff)
    // mencari giatmara berdasar id_staff
    //Return value array id_giatmara, type giatmara dan Nama Giatmara
    {
      $this->db->where('id_staff', $id_staff);
      $this->db->select('id_staff,id_negeri, nama_negeri, id_giatmara, nama_giatmara, status_info_pangku_tugas');
      //echo $this->db->get_compiled_select("v_staff");exit;
      $query = $this->db->get('v_staff',$where);
      return $query->result_array();
    }
}
