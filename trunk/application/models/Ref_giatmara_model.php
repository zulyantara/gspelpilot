<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ref_giatmara_model extends CI_Model {

    public $table = 'ref_giatmara';
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

    function get_by_negeri($id) {
        $this->db->where('id_negeri', $id);
        $this->db->order_by('nama_giatmara', $this->order);
        $qry = $this->db->get($this->table);
        return $qry->result();
    }

}
