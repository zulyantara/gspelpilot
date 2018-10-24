<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Screen_empat_model extends CI_Model
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

    function get_kursus($kluster)
    {
        if ($kluster)
        {
            $this->db->where('id_kluster', $kluster)->order_by("nama_kursus", "asc");
            $qry = $this->db->get('ref_kursus');
            return $qry->result();
        }
    }

    function get_giatmara($negeri)
    {
        if ($negeri)
        {
            $this->db->where('id_negeri', $negeri)->order_by("nama_giatmara", "asc");
            $qry = $this->db->get('ref_giatmara');
            return $qry->result();
        }
    }

    function save($data)
    {
        $this->db->insert('permohonan_kursus', $data);
        return $this->db->affected_rows();
    }
}
