<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class V_kewangan_lpp08_screen3_model extends CI_Model {

    public $table = 'v_kewangan_lpp08_screen3';
    public $id = 'id';
    public $order = 'ASC';

    function __construct() {
        parent::__construct();
    }

    // get all
    function get_all($negeri = null, $giatmara = null, $kursus = null, $sesi = null, $nama = null) {
        $this->db->order_by($this->id, $this->order);

        if (!empty($negeri))
            $this->db->where('id_negeri', $negeri);

        if (!empty($giatmara))
            $this->db->where('id_giatmara', $giatmara);

        if (!empty($kursus))
            $this->db->where('id_kursus', $kursus);

        if (!empty($sesi))
            $this->db->where('id_intake', $sesi);

        if (!empty($nama)) {
            $where = "(nama_penuh like '%$nama%' or no_mykad like '%$nama%' or no_pelatih like '%$nama%')";
            $this->db->where($where); 
        }
        
        return $this->db->get($this->table)->result();
    }

    // get not_jana
    function get_not_jana($negeri = null, $giatmara = null, $kursus = null, $sesi = null, $nama = null) {
        $this->db->order_by($this->id, $this->order);

        $where = "(status_jana IS NULL OR status_jana = 0)";
        $this->db->where($where);
            
        if (!empty($negeri))
            $this->db->where('id_negeri', $negeri);

        if (!empty($giatmara))
            $this->db->where('id_giatmara', $giatmara);

        if (!empty($kursus))
            $this->db->where('id_kursus', $kursus);

        if (!empty($sesi))
            $this->db->where('id_intake', $sesi);

        if (!empty($nama)) {
            $where = "(nama_penuh like '%$nama%' or no_mykad like '%$nama%' or no_pelatih like '%$nama%')";
            $this->db->where($where);    
        }
        
        return $this->db->get($this->table)->result();
    }

    // get not_jana
    function get_jana($negeri = null, $giatmara = null, $kursus = null, $sesi = null, $nama = null) {
        $this->db->order_by($this->id, $this->order);

        $where = "(status_jana = 1)";
        $this->db->where($where);
            
        if (!empty($negeri))
            $this->db->where('id_negeri', $negeri);

        if (!empty($giatmara))
            $this->db->where('id_giatmara', $giatmara);

        if (!empty($kursus))
            $this->db->where('id_kursus', $kursus);

        if (!empty($sesi))
            $this->db->where('id_intake', $sesi);

        if (!empty($nama)) {
            $where = "(nama_penuh like '%$nama%' or no_mykad like '%$nama%' or no_pelatih like '%$nama%')";
            $this->db->where($where);    
        }
        
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

}
