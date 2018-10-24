<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Screen_sembilan_model extends CI_Model
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
    
    function get_kursus($cluster)
    {
        $this->db->where('id_kluster', $cluster);
        $qry = $this->db->get('ref_kursus');
        return $qry->result();
    }
    
    function get_negeri($kursus)
    {
        $this->db->select('*'); // SELECT which columns you want
        $this->db->join('ref_kursus', 'settings_tawaran_kursus.id_kursus = ref_kursus.id', 'join');
        $this->db->join('ref_giatmara', 'settings_tawaran_kursus.id_giatmara = ref_giatmara.id', 'join');
        $this->db->join('ref_negeri', 'ref_giatmara.id_negeri = ref_negeri.id', 'join');
        $this->db->where('id_kursus', $kursus); // CONDITION
        $query = $this->db->get('settings_tawaran_kursus'); // FROM clause
        
        //echo $this->db->last_query();
        //die();
        
        return $query->result();
    }
    
    function get_giatmara($negeri)
    {
        if ($negeri)
        {
            $this->db->where('id_negeri', $negeri);
            $qry = $this->db->get('ref_giatmara');
            return $qry->result();
        }
    }
}
