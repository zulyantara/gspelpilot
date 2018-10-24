<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class V_lpp7a_model extends CI_Model {

    public $table = 'v_lpp7a';
    public $id = 'id';
    public $order = 'ASC';

    function __construct() {
        parent::__construct();
    }

    // get all
    function get_all() {
        $this->db->order_by($this->id, $this->order);        
        return $this->db->get($this->table)->result();
//        print_r($this->db->last_query()); exit;
    }

    // get data by id
    function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id_pelatih($id) {
        $this->db->where('id_pelatih', $id);
        return $this->db->get($this->table)->result();
    }

}
