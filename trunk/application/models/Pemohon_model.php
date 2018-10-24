<?php

class Pemohon_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_peribadi_by_id($id) {
      $qry = $this->db->where('id', $id);
    //   echo $this->db->get_compiled_select("v_permohonan_peribadi");exit;
      $qry = $this->db->get('v_permohonan_peribadi2');
      #echo $this->db->last_query()."<br/>";
      return $qry->result();
    }

    function get_penjaga_by_idpemohon($id) {
      $qry = $this->db->where('id_permohonan_peribadi', $id);
      $qry = $this->db->get('v_maklumat_penjaga');
      #echo $this->db->last_query()."<br/>";
      return $qry->result();
    }

    function get_tinggal_by_idpemohon($id) {
      $qry = $this->db->where('id_permohonan', $id);
      $qry = $this->db->order_by('id', 'desc');
      $qry = $this->db->get('permohonan_tempat_tinggal');
      #echo $this->db->last_query()."<br/>";
      return $qry->result();
    }

    function get_bandar_negeri_by_poskod($poskod) {
      $qry = $this->db->where('poskod', $poskod);
      $qry = $this->db->join('ref_negeri', 'ref_poskod_bandar_negeri.negeri=ref_negeri.id');
      $qry = $this->db->get('ref_poskod_bandar_negeri');
      #echo $this->db->last_query()."<br/>";
      return $qry->result();
    }

    function get_pekerjaan($where = NULL)
    {
        if ($where !== NULL)
        {
            if (is_array($where))
            {
                foreach ($where as $key => $value)
                {
                    $this->db->where($key, $value);
                }
            }
        }
        // echo $this->db->get_compiled_select("ref_pekerjaan");exit;
        return $this->db->get("ref_pekerjaan");
    }
}
