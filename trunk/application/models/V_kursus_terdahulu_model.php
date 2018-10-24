<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class V_kursus_terdahulu_model extends CI_Model {

    public $table = 'v_kursus_terdahulu';
    public $id = 'id_pelatih';
    public $order = 'ASC';

    function __construct() {
        parent::__construct();
    }

    // get all
    function get_all($giatmara = null, $kursus = null, $jenis = null, $sesi = null, $negeri = null, $nama = null, $where2 = null) {
        $this->db->order_by($this->id, $this->order);

        if (!empty($giatmara))
            $this->db->where('id_giatmara', $giatmara);

        if (!empty($kursus))
            $this->db->where('id_ref_kursus', $kursus);

        if (!empty($jenis))
            $this->db->where('jenis_pelatih', $jenis);

        if (!empty($sesi))
            $this->db->where('id_intake', $sesi);

        if (!empty($negeri))
            $this->db->where('id_negeri', $negeri);

        if (!empty($nama)) {
            $where = "(nama_penuh like '%$nama%' or no_mykad like '%$nama%' or no_pelatih like '%$nama%')";
            $this->db->where($where);    
        }
        
        if (!empty($where2))
            $this->db->where($where2);
        
        return $this->db->get($this->table)->result();
//        print_r($this->db->last_query()); exit;
    }

    // get data by id
    function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

}
