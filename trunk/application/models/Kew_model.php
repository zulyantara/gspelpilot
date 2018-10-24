<?php

class Kew_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getBanks($id='')
    {
      if ($id!='') $qry = $this->db->where('id',$id);
      $qry = $this->db->where('flag',1);
      $qry = $this->db->where('status',1);
      $qry = $this->db->get('kew_bank');
      #echo $this->db->last_query();
      return $qry->result();
    }

    public function getPotongan()
    {
      //$qry = $this->db->where('flag',1);
      $qry = $this->db->where('status',1);
      $qry = $this->db->get('kew_potongan');
      #echo $this->db->last_query();
      return $qry->result();
    }

    public function get_kod_kombinasi() {
      $qry = $this->db->where('flag',1);
      $qry = $this->db->where('status',1);
      $qry = $this->db->get('kew_kod_kombinasi');
      #echo $this->db->last_query();
      return $qry->result();
    }

    public function get_kod_kombinasi_by_id($id) {
      $qry = $this->db->select('kew_kod_kombinasi.id, kew_kod_kombinasi.name, kew_kod_kombinasi.code_combination_name');
      $qry = $this->db->select('kew_dana.name as name_dana, kew_dana.code as kod_dana');
      $qry = $this->db->select('kew_program_giatmara.name as name_program, kew_program_giatmara.code as kod_program');
      $qry = $this->db->select('kew_peringkat.name as name_peringkat, kew_peringkat.peringkat_code as kod_peringkat');
      $qry = $this->db->select('kew_negara.IC_NAME as name_negara, kew_negara.IC_UID as kod_negara');
      $qry = $this->db->select('kew_elaun.name as name_elaun, kew_elaun.code as kod_elaun');
      $qry = $this->db->where('kew_kod_kombinasi.flag',1);
      $qry = $this->db->where('kew_kod_kombinasi.status',1);
      $qry = $this->db->where('kew_kod_kombinasi.id',$id);
      $qry = $this->db->join('kew_dana', 'kew_kod_kombinasi.dana_id=kew_dana.id', 'LEFT');
      $qry = $this->db->join('kew_program_giatmara', 'kew_kod_kombinasi.program_id=kew_program_giatmara.id', 'LEFT');
      $qry = $this->db->join('kew_peringkat', 'kew_kod_kombinasi.peringkat_id=kew_peringkat.id', 'LEFT');
      $qry = $this->db->join('kew_negara', 'kew_kod_kombinasi.negara_code=kew_negara.IC_UID', 'LEFT');
      $qry = $this->db->join('kew_elaun', 'kew_kod_kombinasi.elaun_id=kew_elaun.id', 'LEFT');
      $qry = $this->db->get('kew_kod_kombinasi');
      #echo $this->db->last_query();
      return $qry->result();
    }

}
