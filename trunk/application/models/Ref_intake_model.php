<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ref_intake_model extends CI_Model {

    public $table = 'ref_intake';
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

    function get_by_user($id) {
        $this->db->select($this->table . '.*');
        $this->db->group_by($this->table . '.id, ' . $this->table . '.kod_intake, ' . $this->table . '.nama_intake, ' . $this->table . '.tarikh_mula, ' . $this->table . '.tarikh_tamat');
        $this->db->order_by($this->id, $this->order);
        $this->db->where('admin_users.id', $id);
        $this->db->join('settings_tawaran_kursus', 'settings_tawaran_kursus.id_intake = ' . $this->table . '.id');
        $this->db->join("staff_info_pangku_tugas", "`settings_tawaran_kursus`.`id_giatmara` = `staff_info_pangku_tugas`.`id_giatmara`");
        $this->db->join('admin_users', '`staff_info_pangku_tugas`.`id_staff` = `admin_users`.`id_staff`');
        // echo $this->db->get_compiled_select($this->table);exit;
        $qry = $this->db->get($this->table);
        return $qry->result();
    }

}
