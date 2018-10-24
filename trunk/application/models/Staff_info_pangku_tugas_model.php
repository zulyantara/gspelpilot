<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Staff_info_pangku_tugas_model extends CI_Model {

    public $table = 'staff_info_pangku_tugas';
    public $id = 'id';
    public $order = 'ASC';

    function __construct() {
        parent::__construct();
    }

    // get all
    function get_all() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_by_staff($id) {
        $this->db->where('id_staff', $id);
        $qry = $this->db->get($this->table);
        
        return $qry->row();
    }

}
