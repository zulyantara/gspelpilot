<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lpp_7a_model extends CI_Model {

    public $table = 'lpp_7a';
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

    // get data by id
    function get_by_id_pelatih($id, $where = null) {
        $this->db->where("id_pelatih", $id);
        
        if ($where) {
            $this->db->where($where);            
        }
        
        return $this->db->get($this->table)->result();
//        print_r($this->db->last_query()); exit;
    }

    // insert data
    function insert($data) {
//        print_r($data); exit;
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // update data
    function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
