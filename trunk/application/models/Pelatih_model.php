<?php

class Pelatih_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function count_data() {
        return $this->db->count_all("pelatih");
    }

    function getNoPelatih($id = 0) {
        $this->db->select('no_mykad, no_pelatih');
        $this->db->where('id_pelatih', $id);
        $sql = $this->db->get('pelatih');
        #echo $this->db->last_query()."<br/>";
        return $sql->row();
    }

    function get_last_no_pelatih() {
        $this->db->select('no_pelatih');
        $this->db->order_by("id_pelatih", "desc");
        $this->db->limit(1);
        $qry = $this->db->get('pelatih');
        #echo $this->db->last_query()."<br/>";
        return $qry->row();
    }

    // update data
    function update($id, $data) {
        $this->db->where('id_pelatih', $id);
        $this->db->update('pelatih', $data);
    }

    function get_permohonan($where)
    {
        $this->db->select('a.*, b.*, c.*, d.*, e.*');
        // if (is_array($where))
        // {
        //     foreach ($where as $key => $value)
        //     {
        //         $this->db->where($key, $value);
        //     }
        // }
        // else
        // {
            $this->db->where($where);
        // }
        $this->db->join('v_permohonan_kursus_baru b', 'a.id = b.id_permohonan', 'left');
        $this->db->join('v_permohonan_penjaga c', 'a.id = c.id_permohonan', 'left');
        $this->db->join('permohonan_maklumat_am d', 'a.id = d.id_permohonan', 'left');
        $this->db->join('permohonan_tempat_tinggal e', 'a.id = e.id_permohonan', 'left');
        //echo $this->db->get_compiled_select("v_permohonan_peribadi a");exit;
        $qry = $this->db->get('v_permohonan_peribadi2 a');
        // $qry = $this->db->get('permohonan_butir_peribadi a');

        return $qry->result_array();
    }

    function get_kursus_lpp09($id)
    {
        $this->db->select('*');
        $this->db->where('id_permohonan',$id);

        $this->db->join('settings_tawaran_kursus b', 'a.id_settings_tawaran_kursus = b.id', 'join');
        $this->db->join('v_giatmara_kursus c', 'b.id_kursus = c.id_kursus AND b.id_giatmara = c.id_giatmara', 'join');
        $qry = $this->db->get('permohonan_kursus_lpp09 a');
        //echo $this->db->last_query();
        //die();
        return $qry->row();
    }

}
