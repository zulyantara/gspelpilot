<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Screen_lima_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_data($table) {
        $qry = $this->db->get($table);
        return $qry->result();
    }

    function get_data2($table) {
        $this->db->where("status", 1);
        $qry = $this->db->get($table);
        return $qry->result();
    }

    function save($data) {
        $this->db->insert('permohonan_penjaga', $data);
        return $this->db->affected_rows();
    }

    function count_data() {
        return $this->db->count_all("permohonan_penjaga");
    }

    function get_poskod($w) {
        if ($w !== FALSE) {
            foreach ($w as $key => $value) {
                $this->db->like($key, $value);
            }
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
    }

    /*Author : Rapelino (ninolooh@gmail.com)
     *
     **/
    function get_row_mp($where=FALSE){
        if ($where !== FALSE)
        {
            foreach ($where as $key => $value)
            {
                $this->db->where($key, $value);
            }
        }
        $qry = $this->db->get('permohonan_butir_peribadi');
        $result = $qry->row();

        if ($result !== NULL)
        {
		//echo "==".'SELECT * FROM permohonan_penjaga WHERE id_permohonan='.$result->id; exit();
            $query = $this->db->query('SELECT * FROM permohonan_penjaga WHERE id_permohonan='.$result->id);
            $row = $query->row();
        }

        return $row;
    }
}
