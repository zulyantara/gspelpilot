<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class V_elaun_pelatih_model extends CI_Model {

    public $table = 'v_elaun_pelatih';
    public $id = 'id_pelatih';
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

}
