<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getLastInserted()
    {
        $this->db->select_max('id');
        $query = $this->db->get('permohonan_butir_peribadi');
        return  $query->row()->id;
    }

    function savestatusg($id)
    {
        $query = "select min(id_kursus) as id_kursus, nama_kursus from v_giatmara_kursus WHERE id_kluster= ".$id." group by nama_kursus";
        /* $query  ="select min(a.id) as id , a.nama_kursus from ref_kursus a , ref_kluster b  where a.id_kluster = b.kod_kluster  and a.id_kluster='$id' group by a.nama_kursus;"; */
        return $this->db->query($query);
    }

	function savestatus($id)
	{
        $query  ="select distinct min(id_setting_penawaran_kursus) as id , nama_negeri as negeri FROM v_giatmara_kursus where id_kursus='$id' group by negeri ORDER BY 1, 2;";
        return $this->db->query($query);
	}

	function savestatusx($id,$idgiatmara)
	{
        //getNegeri
        $this->db->where('id_setting_penawaran_kursus', $idgiatmara);
        $qry = $this->db->get("v_giatmara_kursus");
        $hasil = $qry->row_array();

        $query  ="select id_setting_penawaran_kursus as id , nama_giatmara as giatmara FROM v_giatmara_kursus where id_kursus='$id' AND id_negeri='$hasil[id_negeri]'";
        return $this->db->query($query);
	}

    function savestatuse($id)
    {
        $query  =" select distinct  nama_giatmara as giatmara  FROM v_giatmara_kursus where id_kursus='$id'  ORDER BY 1;";
        return $this->db->query($query);
    }

    function savestatusb($id)
	{
        $query  ="select a.nama_kluster as kluster,max(b.id) as id, a.id as idkluster from ref_kluster a, settings_tawaran_kursus b, ref_kursus c where a.id=c.id_kluster and c.id=b.id_kursus and b.id_giatmara='$id' and b.status=1 group by kluster,idkluster;";
        #echo $query;
        return $this->db->query($query);
	}

    function savestatusc($id, $id2)
    {
        $query  ="select distinct nama_kluster, nama_kursus, nama_negeri, nama_giatmara , nama_kursus, id_setting_penawaran_kursus, kod_intake FROM v_giatmara_kursus where id_giatmara='$id' and id_kluster='$id2' and status=1 ORDER BY 1, 2, 3, 4;";
        #echo $query;
        return $this->db->query($query);
    }

    function savestatusf()
    {
        $query  ="select distinct nama_kluster, nama_kursus, nama_negeri, nama_giatmara FROM v_giatmara_kursus ORDER BY 1, 2, 3, 4;";
        return $this->db->query($query);
    }

    function senarai()
    {
        $query  ="call proc_giatmara_kursus();";
        return $this->db->query($query);
    }

    function insert($data){
        $result = $this->db->insert('permohonan_kursus',$data);
    }

    // Block Save
    function save_butir_probadi($data, $status)
    {
        // var_dump($data);exit;
        if ($status) {
            // echo $this->db->set($data)->get_compiled_insert("permohonan_butir_peribadi");exit;
            $this->db->replace('permohonan_butir_peribadi', $data);
            $lastid = $this->db->insert_id();
            return $this->db->affected_rows() > 0 ? $lastid : 0;
        } else {
            $this->db->where('id', $data['id']);
            $this->db->update('permohonan_butir_peribadi', $data);
            $lastid = $data['id'];
            return $lastid;
        }
        // echo "query=".$this->db->last_query();exit;
        #return $this->db->affected_rows() > 0 ? $lastid : 0;
    }

    function save_maklumat_am($data)
    {
        $this->db->replace('permohonan_maklumat_am', $data);
        return $this->db->affected_rows() > 0 ? $this->db->insert_id() : 0;
    }

    function save_maklumat_am_2($data)
    {
        //   echo $this->db->set($data)->get_compiled_insert("permohonan_maklumat_am_2");
        $this->db->replace('permohonan_maklumat_am_2', $data);
        return $this->db->affected_rows() > 0 ? $this->db->insert_id() : 0;
    }

    function save_permohonan_kursus($data, $status)
    {
        if ($status) {
            $this->db->replace('permohonan_kursus', $data);
            $lastid = $this->db->insert_id();
            return $this->db->affected_rows() > 0 ? $lastid : 0;
        } else {
            $this->db->where('id', $data['id']);
            $this->db->update('permohonan_kursus', $data);
            $lastid = $data['id'];
            return $lastid;
        }
        #$this->db->replace('permohonan_kursus', $data);
        #echo $this->db->last_query();
        #return $this->db->affected_rows() > 0 ? $this->db->insert_id() : 0;
    }

    function save_permohonan_penjaga($data)
    {
        $this->db->query("delete from permohonan_penjaga where id_permohonan=?", array($data['id_permohonan']));  // echo $this->db->set($data)->get_compiled_update("permohonan_penjaga");exit;
		        // echo $this->db->last_query();

        $this->db->replace('permohonan_penjaga', $data);
        // echo $this->db->last_query();
        return $this->db->affected_rows() > 0 ? $this->db->insert_id() : 0;
    }

    function save_tempat_tinggal($data) {
        $this->db->replace('permohonan_tempat_tinggal', $data);
        //echo $this->db->last_query();
        return $this->db->affected_rows() > 0 ? $this->db->insert_id() : 0;
    }
    // End Block Save

    function cek_nomykad($mykad)
    {
        $this->db->where('no_mykad', $mykad);
        $qry = $this->db->get("trainee_info");
        return $qry->row_array();
    }

    function cek_nomykad_pbp($mykad)
    {
        $this->db->select('permohonan_butir_peribadi.no_mykad, permohonan_butir_peribadi.nama_penuh,permohonan_butir_peribadi.no_rujukan_permohonan');
        $this->db->where('permohonan_butir_peribadi.no_mykad', $mykad);
        $this->db->join("temuduga_tetapan", "permohonan_butir_peribadi.id=temuduga_tetapan.id_pemohon", "left");
        $this->db->join("pelatih", "permohonan_butir_peribadi.id=pelatih.id_permohonan", "left");
        $this->db->join('settings_tawaran_kursus', 'pelatih.id_kursus = settings_tawaran_kursus.id', "left");
        $this->db->join('ref_giatmara', 'settings_tawaran_kursus.id_giatmara = ref_giatmara.id', "left");
        // echo $this->db->get_compiled_select("permohonan_butir_peribadi");
        $qry = $this->db->get("permohonan_butir_peribadi");
        return $qry->row_array();
    }

    function get_row_permohonan($id)
    {
        $this->db->where('id', $id);
        $sql = $this->db->get('permohonan_butir_peribadi');
        return $sql->row();
    }

    function getKadByBP($id)
    {
        $this->db->select('no_mykad, no_rujukan_permohonan');
        $this->db->where('id', $id);
        $sql = $this->db->get('permohonan_butir_peribadi');
        return $sql->row();
    }

    function getKursusByBp($id)
    {
        $this->db->select('id');
        $this->db->where('id_permohonan', $id);
        $sql = $this->db->get('permohonan_kursus');
        #echo $this->db->last_query();
        return $sql->row();
    }

    function getViewKursusByBp($id)
    {
        #$this->db->select('id');
        $this->db->where('id_permohonan_peribadi', $id);
        $sql = $this->db->get('v_kursus_pilihan_dei');
        #echo $this->db->last_query();
        return $sql->row();
    }

    function getMaklumatByBp($id)
    {
        //$this->db->select('id');
        $this->db->where('id_permohonan', $id);
        $sql = $this->db->get('permohonan_maklumat_am');
        #echo $this->db->last_query();
        return $sql->row();
    }

    function getMaklumat2ByBp($id)
    {
        $this->db->where("id_permohonan", $id);
        $qry = $this->db->get("permohonan_maklumat_am_2");
        return $qry->row();
    }

    function getPenjagaByBp($id)
    {
        //$this->db->select('id');
        $this->db->where('id_permohonan_peribadi', $id);
        $sql = $this->db->get('v_maklumat_penjaga');
        #echo $this->db->last_query();
        return $sql->row();
    }

    function getTinggalByBp($id)
    {
        //$this->db->select('id');
        $this->db->where('id_permohonan', $id);
        $sql = $this->db->get('permohonan_tempat_tinggal');
        #echo $this->db->last_query();
        return $sql->row();
    }

    function getTarikhByYear($year) {
        $this->db->where('tahun_pengambilan', $year);
        $sql = $this->db->get('setting_tarikh_permohonan');
        #echo $this->db->last_query();
        return $sql->row();
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * @param $where condition for query
     * @return count of data pelatih
     */
    function count_pelatih($where = FALSE)
    {
        if ($where !== FALSE OR is_null($where))
        {
            if (is_array($where))
            {
                foreach ($where as $key => $value)
                {
                    $this->db->where($where, $value);
                }
            }
            else
            {
                $this->db->where($where);
            }
        }
        $this->db->count_all('permohonan_butir_peribadi');
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * @param $where array
     * @return Row v_admin_users
     */
    function get_v_admin_users($where)
    {
        if (is_array($where))
        {
            foreach ($where as $key => $value)
            {
                $this->db->where($key, $value);
            }
        }
        else
        {
            $this->db->where($where);
        }
        // echo $this->db->get_compiled_select("v_admin_users");exit;
        $qry = $this->db->get('v_admin_users');
        return $qry->row();
    }

    function get_giatmara_kursus($where = NULL)
    {
        if ($where !== NULL)
        {
            foreach ($where as $key => $value)
            {
                $this->db->where($key, $value);
            }
        }
        return $this->db->get('v_giatmara_kursus');
    }
}
