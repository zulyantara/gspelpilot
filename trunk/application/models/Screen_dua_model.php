<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Screen_dua_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function get_data($table)
    {
        $qry = $this->db->get($table);
        return $qry->result();
    }

    function get_poskod($w)
    {

        if ($w !== FALSE)
        {
            foreach ($w as $key => $value)
            {
                $this->db->like($key, $value);
            }
        }
        //$this->db->where('poskod', $w);
        $this->db->select('ref_poskod_bandar_negeri.id as id_poskod,ref_poskod_bandar_negeri.*,ref_negeri.*');
        $this->db->join('ref_negeri', 'ref_poskod_bandar_negeri.negeri = ref_negeri.id');
        $qry = $this->db->get('ref_poskod_bandar_negeri');

        if( !$qry )
        {
            return 0;
        }else{
            return $qry->row();
        }


    }

    function cek_poskod($id){
        $this->db->like('id', "$id");
        $qry = $this->db->get('ref_poskod_bandar_negeri');
        //echo $this->db->last_query();
        return $qry->row();
    }

    function cek_email($email)
    {
        $this->db->like('emel', "$email");
        $qry = $this->db->get('permohonan_butir_peribadi');
        return $qry->num_rows();
    }

    function save($data)
    {
        $this->db->insert('permohonan_butir_peribadi', $data);
        return $this->db->affected_rows();
    }

    function get_row_pbp($where = FALSE)
    {
        if ($where !== FALSE)
        {
            foreach ($where as $key => $value)
            {
                $this->db->where($key, urldecode($value));
            }
        }
        $qry = $this->db->get('permohonan_butir_peribadi');
        //echo $this->db->last_query();
        //die();
        return $qry->row();
    }

    function count_data()
    {
        return $this->db->count_all("permohonan_butir_peribadi");
    }

    function get_last_no_rujuk()
    {
        $this->db->select('no_rujukan_permohonan');
        $this->db->order_by("id", "desc");
        $qry = $this->db->get('permohonan_butir_peribadi');
        return $qry->row();
    }

    function get_butir_peribadi($id)
    {
        $this->db->where('no_mykad', $id);
        // echo $this->db->get_compiled_select("permohonan_butir_peribadi");exit;
        $qry = $this->db->get('permohonan_butir_peribadi');
        return $qry->row_array();
    }

    /**
     * @author Rapelino <ninolooh@gmail.com>
     * @param
     * @return result data poskod
     */
    function get_v_poskod($nilai,$var)
    {

        $this->db->where($var, $nilai);
        $qry = $this->db->get('v_poskod');
        //echo $this->db->last_query();
        return $qry->row();

    }
	
	function get_application_status($where = FALSE)
    {
        if ($where !== FALSE)
        {
            foreach ($where as $key => $value)
            {
                $this->db->where($key, urldecode($value));
            }
        }
        $qry = $this->db->get('permohonan_butir_peribadi');
        //echo $this->db->last_query();
        //die();
        //return $qry->row();
		 return $qry->num_rows();
    }
	
		
		
}
