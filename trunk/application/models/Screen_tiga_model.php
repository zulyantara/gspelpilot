<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Screen_tiga_model extends CI_Model
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


    function save($data)
    {
        
        $this->db->insert('permohonan_maklumat_am', $data);
        return $this->db->affected_rows();
    }
}
