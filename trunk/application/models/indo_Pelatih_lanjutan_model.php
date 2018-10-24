<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Zulyantara <zulyantara@gmail.com>
 * module Pelatih Lanjutan LPP09
 */
class Pelatih_lanjutan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kew_model', 'kew');
        $this->load->model('pelatih_model', 'pelatih');
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * @param $no_mykad
     * @return 1 row from table pelatih or permohonan_butir_peribadi
     */
    function check_no_mykad($no_mykad)
    {
        // Pertama cek no mykad ke table pelatih klo ada lanjut, klo gak ada, cek ke table permohonan_butir_peribadi
        $this->db->where("no_mykad", $no_mykad);
        $qry = $this->db->get('pelatih');
        $row = $qry->row();

        if ($row === NULL)
        {
            $this->db->where("no_mykad", $no_mykad);
            // echo $this->db->get_compiled_select("permohonan_butir_peribadi");exit;
            $qry = $this->db->get('permohonan_butir_peribadi');
            $row = $qry->row();
        }
        return $row;
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * For checking table markah_modul_status
     */
    function check_mms($id)
    {
        $this->db->where('id_pelatih', $id);
        $this->db->where('pgn_sah IS NOT NULL');
        // echo $this->db->get_compiled_select("markah_modul_status");
        $qry = $this->db->get('markah_modul_status');
        return $qry->num_rows();
    }

    function get_giatmara_by_id($id)
    {
        $this->db->where("ref_giatmara.id", $id);
        $this->db->join("ref_giatmara", "settings_tawaran_kursus.id_giatmara = ref_giatmara.id");
        // echo $this->db->get_compiled_select("settings_tawaran_kursus");exit;
        $qry = $this->db->get("settings_tawaran_kursus");
        return $qry->row();
    }

    function check_temuduga_tetapan($no_mykad)
    {
        $this->db->select('tt.*, pbp.*');
        $this->db->where("pbp.no_mykad", $no_mykad);
        $this->db->where("tt.pendaftaran_status", 0);
        $this->db->where('tt.jenis_pelatih', "LPP09");
        $this->db->join("permohonan_butir_peribadi pbp", "tt.id_pemohon=pbp.id");
        // echo $this->db->get_compiled_select("temuduga_tetapan tt");exit;
        $qry = $this->db->get("temuduga_tetapan tt");
        return $qry->row();
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * @param $no_mykad
     * @return result of data pelatih where no_mykad = $no_mykad
     */
    function get_kursus_terdahulu($no_mykad)
    {
        $this->db->where('no_mykad', $no_mykad);
        // $this->db->where('status_pelatih = 4');
        $qry = $this->db->get('v_kursus_terdahulu');
        return $qry->result();
    }

    /**
    * @author Zulyantara <zulyantara@gmail.com>
    * @param $data array key nama field, array value value of field
    * @return
     */
    function insert_maklumat_am($data)
    {
        // echo $this->db->set($data)->get_compiled_insert("permohonan_maklumat_am");exit;
        $this->db->replace('permohonan_maklumat_am', $data);
        //echo $this->db->last_query();
        return $this->db->affected_rows();
    }

    /**
    * @author Rapelino <ninolooh@gmail.com>
    * @param $data array key nama field, array value value of field
    * @return
     */
    function insert_maklumat_am2($data)
    {

        // echo $this->db->set($data)->get_compiled_insert("permohonan_maklumat_am");exit;
        $this->db->replace('permohonan_maklumat_am_2', $data);
        //echo $this->db->last_query();
        return $this->db->affected_rows();
    }

    /**
    * @author Rapelino <ninolooh@gmail.com>
    * @param $data array key nama field, array value value of field
    * @param $id = id permohonan_butir_pribadi
    * @return
     */
    function update_maklumat_am($data,$id)
    {
        $this->db->where('id_permohonan', $id);
        $this->db->update('permohonan_maklumat_am', $data);

        return $this->db->affected_rows();
    }

    /**
    * @author Rapelino <ninolooh@gmail.com>
    * @param $data array key nama field, array value value of field
    * @param $id = id permohonan_butir_pribadi
    * @return
     */
    function update_maklumat_am2($data,$id)
    {
        $this->db->where('id_permohonan', $id);
        $this->db->update('permohonan_maklumat_am_2', $data);

        return $this->db->affected_rows();
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * @return Result data kluster
     * LPP09 P1 Screen 3
     */
    function get_kluster()
    {
        $qry = $this->db->get('ref_kluster');
        return $qry->result();
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * @param $id id_kluster
     * @return result data Kursus by id kluster
     */
    function get_kursus_by_kluster($id)
    {
        $this->db->where('id_kluster', $id);
        $qry = $this->db->get('ref_kursus');
        return $qry->result();
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * @param $id id Kursus
     * @return Result data Negeri by id Kursus
     */
    function get_negeri_by_kursus($id)
    {
        $this->db->select('id_negeri, nama_negeri');
        $this->db->group_by('id_negeri');
        $this->db->where('id_kursus', $id);
        $this->db->distinct();
        // echo $this->db->get_compiled_select("v_giatmara_kursus");exit;
        $qry = $this->db->get('v_giatmara_kursus');
        return $qry->result();
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * @param $id id Negeri
     * @return Result data Giatmara by id Negeri
     */
    function get_giatmara_by_negeri($id)
    {
        $this->db->select('id, nama_giatmara');
        $this->db->where('id_negeri', $id);
        $this->db->where('id_type_giatmara', 1);
        // echo $this->db->get_compiled_select("v_giatmara_kursus");exit;
        $qry = $this->db->get('ref_giatmara');
        return $qry->result();
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * @return Result data negeri
     * LPP09 P1 Screen 3
     */
    function get_negeri()
    {
        $qry = $this->db->get('ref_negeri');
        return $qry->result();
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

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * @param $where array
     * @param $return choose return row or result, default result
     */
    function get_ref_negeri($where = NULL, $return = "result")
    {
        if ($where !== NULL)
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
        }
        // echo $this->db->get_compiled_select('ref_negeri');exit;
        $qry = $this->db->get('ref_negeri');

        if ($return === "result")
        {
            return $qry->result();
        }
        elseif ($return === "row")
        {
            return $qry->row();
        }
    }



    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * @param $where array
     * @param $return choose return row or result, default result
     */
    function get_ref_giatmara($where = NULL, $return = "result")
    {
        if ($where !== NULL)
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
        }
        // echo $this->db->get_compiled_select('ref_giatmara');exit;
        $qry = $this->db->get('ref_giatmara');

        if ($return === "result")
        {
            return $qry->result();
        }
        elseif ($return === "row")
        {
            return $qry->row();
        }
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * @param $where array
     * @param $return choose return row or result, default result
     */
    function get_ref_kursus($where = NULL, $return = "result")
    {
        if ($where !== NULL)
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
        }
        // echo $this->db->get_compiled_select('ref_giatmara');exit;
        $qry = $this->db->get('ref_kursus');

        if ($return === "result")
        {
            return $qry->result();
        }
        elseif ($return === "row")
        {
            return $qry->row();
        }
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * @param $where array
     * @param $return choose return row or result, default result
     * @param $distinct distinct the query
     * @param $select select the field of table
     */
    function get_v_giatmara_kursus($where = NULL, $return = "result", $distinct = NULL, $select="*")
    {
        $this->db->select($select);

        if ($where !== NULL)
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
        }

        if ($distinct === "distinct")
        {
            $this->db->distinct();
        }

        $this->db->where('status', 1);

        // echo $this->db->get_compiled_select('v_giatmara_kursus');
        $qry = $this->db->get('v_giatmara_kursus');

        if ($return === "result")
        {
            return $qry->result();
        }
        elseif ($return === "row")
        {
            return $qry->row();
        }
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * @param $where array
     * @param $return choose return row or result, default result
     */
    function get_ref_kewarganegaraan($where = NULL, $return = "result")
    {
        if ($where !== NULL)
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
        }
        // echo $this->db->get_compiled_select('ref_giatmara');exit;
        $qry = $this->db->get('ref_kewarganegaraan');

        if ($return === "result")
        {
            return $qry->result();
        }
        elseif ($return === "row")
        {
            return $qry->row();
        }
    }

    /**
     * @author Rapelino <ninolo@gmail.com>
     * @param $id = id_permohonan
     * @return 1 row from table permohonan_maklumat_am
     */
    function get_maklumat_am($id)
    {
        $this->db->where('id_permohonan', $id);
        $qry = $this->db->get('permohonan_maklumat_am');
        $row = $qry->row();

        return $row;
    }

    /**
     * @author Rapelino <ninolo@gmail.com>
     * @param $id = id_permohonan
     * @return 1 row from table permohonan_maklumat_am
     */
    function get_maklumat_am2($id)
    {
        $this->db->where('id_permohonan', $id);
        $qry = $this->db->get('permohonan_maklumat_am_2');
        $row = $qry->row();

        return $row;
    }

    /**
     * @author Rapelino <ninolooh@gmail.com>
     * @param $jenis (Kursus, Negeri)
     * @param $a
     * @param $b
     * @param $c
     * @param $d
     * @return Result data Negeri by id Kursus
     */
    function get_id_settings_tawaran_kursus($jenis,$a,$b,$c,$d)
    {
        $this->db->select('id_setting_penawaran_kursus');

        if($jenis =="kursus"){
            $this->db->where('id_kluster', $a);
            $this->db->where('id_kursus', $b);
            $this->db->where('id_negeri', $c);
            $this->db->where('id_giatmara', $d);
        }else{
            $this->db->where('id_negeri', $a);
            $this->db->where('id_giatmara', $b);
            $this->db->where('id_kluster', $c);
            $this->db->where('id_kursus', $d);
        }

        $this->db->where('status', '1');
        // echo $this->db->get_compiled_select("v_giatmara_kursus");exit;
        $qry = $this->db->get('v_giatmara_kursus');
        //echo $this->db->last_query();

        return $qry->row();
    }

    /**
     * @author Rapelino <ninolooh@gmail.com>
     * @param
     * @return result data program pertandingan
     */
    function get_pertandingan()
    {

        $this->db->where('status', '1');
        $qry = $this->db->get('ref_lpp09_program_pertandingan');

        return $qry->result();

    }

    /**
     * @author Rapelino <ninolooh@gmail.com>
     * @param
     * @return result data program Kas
     */
    function get_program_kas()
    {

        $this->db->where('status', '1');
        $qry = $this->db->get('ref_lpp09_program_khas');

        return $qry->result();

    }

    /**
    * @author Rapelino <ninolooh@gmail.com>
    * @param $data array key nama field, array value value of field
    * @return
     */
    function insert_program_pilihan($data)
    {
        // echo $this->db->set($data)->get_compiled_insert("permohonan_kursus_lpp09");exit;
        $this->db->insert('permohonan_kursus_lpp09', $data);
        //echo $this->db->last_query();
        return $this->db->affected_rows();

    }

    /**
    * @author Rapelino <ninolooh@gmail.com>
    * @param $data array key nama field, array value value of field
    * @param $id = id permohonan_butir_pribadi
    * @return
     */
    function update_program_pilihan($data,$id)
    {
        $this->db->where('id_permohonan', $id);
        // echo $this->set($data)->get_compiled_update("permohonan_kursus_lpp09");exit;
        $this->db->update('permohonan_kursus_lpp09', $data);
        //echo $this->db->last_query();
        return $this->db->affected_rows();
    }

    function get_permohonan_kursus_lpp09($id)
    {
        $this->db->where('id_permohonan', $id);
        // echo $this->db->get_compiled_select("permohonan_kursus_lpp09");exit;
        $qry = $this->db->get('permohonan_kursus_lpp09');

        return $qry->row();
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * @param $where
     */
    function get_tetapan_temuduga($where)
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
        $this->db->where('id_temuduga_tetapan IS NULL');
        $this->db->where_in('pengakuan', array(1,2));
        $this->db->where("tawaran_terus", 0);
        $this->db->where("kategori_program", "LL");
        // $this->db->where('jenis_pelatih', "LPP09");
        // echo $this->db->get_compiled_select("v_tetapan_temuduga_lpp09");exit;
        $qry = $this->db->get('v_tetapan_temuduga_lpp09');
        return $qry->result();
    }

    /**
    * @author Rapelino <ninolooh@gmail.com>
    * @param $data array key nama field, array value value of field
    * @param $id = id permohonan_butir_pribadi
    * @return
     */
    function save_butir_probadi($data, $status)
    {
        if ($status) {
            $this->db->replace('permohonan_butir_peribadi', $data);
            $lastid = $this->db->insert_id();
            $this->session->idBpLast = $lastid;
            return $this->db->affected_rows() > 0 ? $lastid : 0;
        } else {
            $this->db->where('id', $data['id']);
            // echo $this->db->set($data)->get_compiled_update("permohonan_butir_peribadi");exit;
            $this->db->update('permohonan_butir_peribadi', $data);
            // echo $this->db->last_query();

            $lastid = $data['id'];
            return $lastid;
        }
    }


    /**
     * @author Rapelino <ninolo@gmail.com>
     * @param $id = id_permohonan
     * @return 1 row from table permohonan_tempat_tinggal
     */
    function get_tempat_tinggal($id)
    {
        $this->db->where('id_permohonan', $id);
        $qry = $this->db->get('permohonan_tempat_tinggal');
        $row = $qry->row();

        return $row;
    }

    /**
     * @author Rapelino <ninolo@gmail.com>
     * @param $id = id_permohonan
     * @return 1 row from table permohonan_tempat_tinggal
     */
    function insert_maklumat_penjaga($data) {
        $this->db->insert('permohonan_penjaga', $data);
        return $this->db->affected_rows();
    }

    /**
    * @author Rapelino <ninolooh@gmail.com>
    * @param $data array key nama field, array value value of field
    * @param $id = id permohonan_butir_pribadi
    * @return
     */
    function update_maklumat_penjaga($data,$id)
    {
        $this->db->where('id_permohonan', $id);
        $this->db->update('permohonan_penjaga', $data);
        //echo $this->db->last_query();
        return $this->db->affected_rows();
    }

    function insert_tempat($data) {
        $this->db->replace('permohonan_tempat_tinggal', $data);
        //echo $this->db->last_query();
        return $this->db->affected_rows() > 0 ? $this->db->insert_id() : 0;
    }

    function update_tempat($data,$id)
    {
        $this->db->where('id_permohonan', $id);
        $this->db->update('permohonan_tempat_tinggal', $data);
        //echo $this->db->last_query();
        return $this->db->affected_rows();
    }

    /*
     * @author Zulyantara <zulyantara@gmail.com>
     * @param $where filternya
     * @return result
     */
    function get_v_cetakan_surat_temuduga_lpp09($where = NULL)
    {
        if ($where !== NULL)
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
        }
        // echo $this->db->get_compiled_select("v_cetakan_surat_temuduga_lpp09");exit;
        $qry = $this->db->get("v_cetakan_surat_temuduga_lpp09");
        return $qry->result();
    }

    function getgiatmara($id)
    {
        $query  ="select * from ref_giatmara where id_negeri='$id' and id_type_giatmara=1";
        return $this->db->query($query);
    }

    function getgiatmara2($id)
    {
        $query  ="select nama_giatmara from ref_giatmara where id='$id' and id_type_giatmara=1";
        // echo $query;exit;
        return $this->db->query($query);
    }

    function getnegeri($id)
    {
        $query  ="select nama_negeri from ref_negeri where id='$id';";
        return $this->db->query($query);
    }

    function cek_idpermohonan($table,$where){
        return $this->db->get_where($table,$where);
    }

    function get_data_kelulusan($negeri,$giatmara)
    {
        // $query  ="select * from v_kelulusan_permohonan_lpp09 where id_negeri='$negeri' AND id_giatmara='$giatmara' AND (status_pengesahan IS NULL OR status_pengesahan=0) OR keputusan_temuduga IN (2,3)";
        $query  ="select * from v_kelulusan_permohonan_lpp09 where id_negeri='$negeri' AND id_giatmara='$giatmara' AND (status_pengesahan IS NULL OR status_pengesahan=0)";
        // echo $query;exit;
        return $this->db->query($query);
    }

    function get_data_kelulusan_2($where = NULL)
    {
        if ($where !== NULL)
        {
            foreach ($where as $key => $value)
            {
                $this->db->where($key, $value);
            }
        }
        // $this->db->where('status_pengesahan !=', 1);
        $this->db->where('status_pengesahan IS NULL');
        $qry = $this->db->get('v_kelulusan_permohonan_lpp09_2');
        return $qry->result();
    }

    function get_data_seluruhnya()
    {
        // $query  ="SELECT DISTINCT(nama_penuh),no_mykad,no_pelatih,no_hp,kategori_program,tawaran_terus,tarikh_mohon,id_negeri,nama_negeri,id_giatmara,id_permohonan, nama_giatmara, nama_kursus, id_permohonan_kursus_lpp09 FROM v_kelulusan_permohonan_lpp09 WHERE (status_pengesahan IS NULL OR status_pengesahan = 0) OR keputusan_temuduga IN (2,3) ORDER BY id_permohonan_kursus_lpp09 DESC";
        $query  ="SELECT DISTINCT(nama_penuh),no_mykad,no_pelatih,no_hp,kategori_program,tawaran_terus,tarikh_mohon,id_negeri,nama_negeri,id_giatmara,id_permohonan, nama_giatmara, nama_kursus, id_permohonan_kursus_lpp09 FROM v_kelulusan_permohonan_lpp09 WHERE (status_pengesahan IS NULL OR status_pengesahan = 0) ORDER BY id_permohonan_kursus_lpp09 DESC";
        // echo $query;
        return $this->db->query($query);
    }

    function get_data_seluruh_4b()
    {
        //  get info user login
        $user = $this->ion_auth->user()->row();
        $user_staff = $user->id_staff;
        $row_staff = $this->plm->get_v_admin_users(array("id_staff" => $user_staff));
        $giatmara_id = $row_staff->id_giatmara;
        $negeri_id = $row_staff->id_negeri;

        $query  ="SELECT * FROM v_coba_screen4b_lpp09 WHERE status_pendaftaran IS NULL AND idgiatmara=".$giatmara_id." ORDER BY id_permohonan_kursus_lpp09 DESC";
        return $this->db->query($query);
    }

    function get_data_4b($negeri,$giatmara,$kategori)
    {
        $query  ="SELECT * FROM v_coba_screen4b_lpp09 WHERE status_pendaftaran IS NULL AND idnegeri='$negeri' AND idgiatmara='$giatmara' AND kategori='$kategori'";
        return $this->db->query($query);
    }

    function cetak_4b()
    {
        $query  ="select a.*,b.name as nama_bank from pelatih_palsu a, kew_bank b where a.bank = b.id;";
        return $this->db->query($query);
    }

    function ref_bank()
    {
        $query  ="select id,name from kew_bank;";
        return $this->db->query($query);
    }

    function ref_bank_2($id)
    {
        $query  ="select name from kew_bank where id='$id';";
        return $this->db->query($query);
    }

    // {
    //     $query  ="select * from ref_giatmara where id_negeri='$id';";
    //     return $this->db->query($query);
    // }

    /*
     * @author Zulyantara <zulyantara@gmail.com>
     * @param $data data yang ingin di-set
     * @param $where kondisi, default NULL
     * @return result array object
     * Time: 26-09-2017 00:12
     */

    function update_cetak_temuduga($data, $where = NULL)
    {
        if ($where !== NULL)
        {
            if (is_array($where))
            {
                foreach($where as $key => $value)
                {
                    $this->db->where($key, $value);
                }
            }
            else
            {
                $this->db->where($where);
            }
        }
        // echo $this->db->set($data)->get_compiled_update("temuduga_tetapan");exit;
        $this->db->update("temuduga_tetapan", $data);
    }

    /**
     * @author Rapelino <ninolo@gmail.com>
     * @param $data
     * @return 1 row from table permohonan_dokumen
     */
    function insert_dokumen($data) {
        // echo $this->db->set($data)->get_compiled_insert("permohonan_dokumen");exit;
        $this->db->insert('permohonan_dokumen', $data);
        //echo $this->db->last_query();
        return $this->db->affected_rows();
    }

    /*
     * @author Zulyantara <zulyantara@gmail.com>
     * @param $where kondisi, default NULL
     * @return row object
     * time: 26-09-2017 00:13
     */
    function get_data_pemohon($where = NULL)
    {
        if ($where !== NULL)
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
        }
        // echo $this->db->get_compiled_select("v_cetakan_surat_temuduga_lpp09");exit;
        $qry = $this->db->get("v_cetakan_surat_temuduga_lpp09");
        return $qry->row();
    }

    /*
     * @author Zulyantara <zulyantara@gmail.com>
     * @param $where filter data, default = NULL
     * @return result obejct
     * time: 26-09-2017 02:20
     */
    function get_keputusan_temuduga_lpp09($where = NULL)
    {
        if ($where !== NULL)
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
        }
        $this->db->where('keputusan_temuduga <= 1');
        // $this->db->where("keputusan_temuduga", 1);
        // echo $this->db->get_compiled_select("v_keputusan_temuduga_lpp09");exit;
        $qry = $this->db->get("v_keputusan_temuduga_lpp09");
        return $qry->result();
    }

    /*
     * @author Zulyantara <zulyantara@gmail.com>
     * @param $where filter data, default = NULL
     * @return result obejct
     * time: 26-09-2017 02:31
     */
    function get_keputusan($where = NULL)
    {
        if ($where !== NULL)
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
        }

        $qry = $this->db->get("ref_keputusan_temuduga");
        return $qry->result();
    }

    /*
     * @author Zulyantara <zulyantara@gmail.com>
     * @param $where filter data, default = NULL
     * @return result obejct
     * time: 26-09-2017 03:09
     */
    function get_settings_tawaran_kursus($where = NULL)
    {
        if ($where !== NULL)
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
        }

        $this->db->select("k.id, k.kod_kursus, k.nama_kursus");
        $this->db->join("ref_kursus k", "k.id = stk.id_kursus");
        // $this->db->where("status_kursus", 1);
        // echo $this->db->get_compiled_select("settings_tawaran_kursus stk");exit;
        $qry = $this->db->get("settings_tawaran_kursus stk");
        return $qry->result();
    }

    /*
     * @author Zulyantara <zulyantara@gmail.com>
     * @param @data field yang ingin diupdate
     * @param $where filter data, default = NULL
     * @return Displays the number of affected rows
     * time: 26-09-2017 04:06
     */
    function update_keputusan_temuduga($data, $where = NULL)
    {
        // var_dump($where);exit;
        if ($where !== NULL)
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
        }
        $dataI['keputusan_temuduga'] = $data["keputusan_temuduga"];
        $dataI['id_kursus'] = $data["id_kursus"];
        $dataI['catatan'] = $data["catatan"];
        $dataI['id_kursus_sah'] = $data["id_kursus_sah"];

        // echo $this->db->set($dataI)->get_compiled_update("temuduga_tetapan");exit;
        $this->db->update("temuduga_tetapan", $dataI);

        if ($data["keputusan_temuduga"] > 1)
        {
            // Cek table kelulusan_lpp09, apakah data sudah ada?
            $this->db->where('id_permohonan', $data["id_permohonan"]);
            $this->db->where('id_permohonan_kursus_lpp09', $data["id_permohonan_kursus_lpp09"]);
            $cek = $this->db->get('kelulusan_lpp09');

            if ($cek->num_rows() > 0)
            {
                $this->db->where('id_permohonan', $data["id_permohonan"]);
                $this->db->where('id_permohonan_kursus_lpp09', $data["id_permohonan_kursus_lpp09"]);
                $dataK["nama_bank"] = $data["nama_bank"];
                $dataK["no_akaun"] = $data["no_akaun"];
                // echo $this->db->set($dataK)->get_compiled_update('kelulusan_lpp09');exit;
                $this->db->update('kelulusan_lpp09', $dataK);
            }
            else
            {
                $dataK["id_permohonan"] = $data["id_permohonan"];
                $dataK["id_permohonan_kursus_lpp09"] = $data["id_permohonan_kursus_lpp09"];
                $dataK["nama_bank"] = $data["nama_bank"];
                $dataK["no_akaun"] = $data["no_akaun"];
                // echo $this->db->set($dataK)->get_compiled_insert('kelulusan_lpp09');
                $this->db->insert('kelulusan_lpp09', $dataK);
            }
        }

        return $this->db->affected_rows();
    }

    /*
     * @author Zulyantara <zulyantara@gmail.com>
     * @param $return pilihan returnnya apakah result atau row
     * @param $where kondisi untuk query, default = NULL
     * @return result object or row data
     */
    function get_gagal_temuduga_lpp09($where = NULL)
    {
        if ($where !== NULL)
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
        }
        /* echo $this->db->get_compiled_select("v_cetakan_surat_temuduga_lpp09");exit; */
        $qry = $this->db->get("v_gagal_temuduga_lpp09");
        return $qry->result();
    }

    /*
     * @author Zulyantara <zulyantara@gmail.com>
     * @param $data pilihan data yang ingin diubah
     * @param $where kondisi untuk query, default = NULL
     */
    function update_temuduga_tetapan($data, $where = NULL)
    {
        if ($where !== NULL)
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
        }
        // echo $this->db->set($data)->get_compiled_update("tetapan_temuduga");exit;
        $qry = $this->db->update("temuduga_tetapan", $data);
        return $this->db->affected_rows();
    }

    /**
     * @author Rapelino <ninolo@gmail.com>
     * @param $id = id_permohonan
     * @return many row from table permohonan_dokumen
     */
    function get_permohonan_dokumen($id)
    {
        $this->db->where('id_permohonan', $id);
        $qry = $this->db->get('permohonan_dokumen');

        $row = $qry->result();

        return $row;
    }

    /*
     * @author Zulyantara <zulyantara@gmail.com>
     * Pelatih Lanjutan LPP09 P4a Screen 1
     * @param $where kondisi untuk query
     * @return result array
     */
    function get_lpp09_p4a($where = NULL, $return = "result")
    {
        if ($where !== NULL)
        {
            if (is_array($where))
            {
                foreach($where as $key=> $val)
                {
                    $this->db->where($key, $val);
                }
            }
            else
            {
                $this->db->where($where);
            }
        }

        $this->db->where('kategori_program', "LL");
        $this->db->where('tawaran_terus IN (1,0)');
        $this->db->where('(status_pendaftaran !=5 OR status_pendaftaran IS NULL)');
        // $this->db->or_where('status_pendaftaran IS NULL');
        $this->db->where('(CASE WHEN tawaran_terus = 1 THEN (CASE WHEN status_pengesahan = 1 THEN TRUE ELSE FALSE END) ELSE TRUE END)');
        // $this->db->or_where('status_pengesahan IS NOT NULL');

        // echo $this->db->get_compiled_select("v_lpp09_p4a_1");exit;
        $qry = $this->db->get("v_lpp09_p4a_1");

        if ($return === "result")
        {
            return $qry->result();
        }
        else
        {
            return $qry->row();
        }
    }

    /*
     * @author Zulyantara <zulyantara@gmail.com>
     * @param $data field dan value yang akan diisi ke table temuduga_tetapan
     * @return number of affected rows
     * Date Time 3-10-2017 20:53
     */
    function insert_temuduga_tetapan($data)
    {
        $this->db->insert("temuduga_tetapan", $data);
        return $this->db->affected_rows();
    }

    /*
     * @author Zulyantara <zulyantara@gmail.com>
     * @param $data field dan value yang akan diupdate
     * @param $where kondisi untuk query
     * @return number row of affacted
     */

    function sahkan_lpp09($data)
    {
        $this->db->trans_start();

        // echo "<pre>";var_dump($data);echo "</pre>";exit;
        $id_permohonan = $data["id_permohonan"];
        $id_kursus = $data["id_kursus"];
        $id_stk = $data["id_stk"];
        $id_temuduga_tetapan = $data["id_temuduga_tetapan"];
        $no_mykad = $data["no_mykad"];
        $id_bank = $data["txt_id_bank"];
        $no_akaun = $data["txt_no_akaun"];
        $cara_bayar = $data["txt_cara_bayar"];
        $id_negeri = $data["txt_id_negeri"];
        $id_giatmara = $data["txt_id_giatmara"];
        $kelayakan_elaun = $data["txt_kelayakan_elaun"];
        $tarikh_mula_kursus = $data["txt_tarikh_mula_kursus"];
        $tarikh_tamat_kursus = $data["txt_tarikh_tamat_kursus"];
        $kew_kod_kombinasi = $data["txt_kew_kod_kombinasi"];
        $layak_elaun = $data["txt_layak_elaun"];
        $status = $data["opt_sah"];
        $chk_tindakan = $data["chk_tindakan"];

        // lakukan simpan/update sesuai checkbox yang checked
        foreach ($chk_tindakan as $key => $val)
        {
            $datakl["status_pendaftaran"] = $status[$val];
            $this->db->where('id_permohonan', $id_permohonan[$val]);
            $this->db->update('kelulusan_lpp09', $datakl);

            $datatt["pendaftaran_status"] = $status[$val];
            $this->db->where('id_permohonan', $id_permohonan[$val]);
            $this->db->where('jenis_pelatih', "LPP09");
            $this->db->update('temuduga_tetapan', $datatt);

            $upd_pelatih['id_permohonan'] = $val;
            $upd_pelatih['no_pelatih'] = $this->generate_no_pelatih();
            $upd_pelatih['no_mykad'] = $no_mykad[$val];
            $upd_pelatih['id_giatmara'] = $id_giatmara[$val];
            $upd_pelatih['id_kursus'] = $id_stk[$val];
            $upd_pelatih['jenis_pelatih'] = "LPP09";
            $upd_pelatih['status_pelatih'] = 1;
            $upd_pelatih['kelayakan_elaun'] = $kelayakan_elaun[$val];
            $upd_pelatih['nama_bank'] = $id_bank[$val];
            $upd_pelatih['no_akaun'] = $no_akaun[$val];
            $upd_pelatih['cara_bayaran'] = $cara_bayaran[$val];
            $upd_pelatih['id_kew_kod_kombinasi'] = $_kew_kod_kombinasi[$val];
            $upd_pelatih['tarikh_mula_kursus'] = date("Y-m-d", strtotime($tarikh_mula_kursus[$val]));
            $upd_pelatih['tarikh_tamat_kursus'] = date("Y-m-d", strtotime($tarikh_tamat_kursus[$val]));
            $upd_pelatih["tarikh_daftar"] = date("Y-m-d");
            // echo $this->db->set($upd_pelatih)->get_compiled_insert("pelatih");
            $this->db->insert('pelatih', $upd_pelatih);
            $id_insert_pelatih = $this->db->insert_id();

            // Markah modul
            $rs_m1 = $this->get_modul_by_idkursus($id_kursus[$val]);
            if (count($rs_m1))
            {
                foreach ($rs_m1 as $m1)
                {
                    $upd_markahmodul['id_pelatih'] = $id_insert_pelatih;
                    $upd_markahmodul['id_kursus'] = $id_stk[$val]; // id setting tawaran kursus
                    $upd_markahmodul['id_modul'] = $m1->id_modul;
                    $upd_markahmodul["pb_teori"] = 0.00;
                    $upd_markahmodul["pb_amali"] = 0.00;
                    $upd_markahmodul["pam_teori"] = 0.00;
                    $upd_markahmodul["pam_amali"] = 0.00;
                    $upd_markahmodul["markah"] = 0.00;
                    // echo $this->db->set($upd_markahmodul)->get_compiled_insert("markah_modul");
                    $this->db->insert('markah_modul', $upd_markahmodul);
                }
            }

            // Markah modul 2
            $upd_markahmodul2['id_pelatih'] = $id_insert_pelatih;
            $upd_markahmodul2['id_kursus'] = $id_stk[$val]; // id setting tawaran kursus
            $upd_markahmodul2["gcpa"] = 0.00;
            $upd_markahmodul2["kokurikulum"] = 0;
            $upd_markahmodul2["literasi_komputer"] = 0;
            $upd_markahmodul2["keusahawanan"] = 0;
            $upd_markahmodul2["puji"] = 0;
            $upd_markahmodul2["kehadiran"] = 0;
            $upd_markahmodul2["latihan_industri"] = 0;
            $upd_markahmodul2["status_isi_markah"] = 0;
            // echo $this->db->set($upd_markahmodul2)->get_compiled_insert("markah_modul_2");
            $this->db->insert('markah_modul_2', $upd_markahmodul2);

            // Markah modul status
            $upd_markahmodulstatus['id_pelatih'] = $id_insert_pelatih;
            #$upd_markahmodul2['id_kursus'] = $rs[0]->id_kursus_sah; // id setting tawaran kursus
            // echo $this->db->set($upd_markahmodulstatus)->get_compiled_insert("markah_modul_status");
            $this->db->insert('markah_modul_status', $upd_markahmodulstatus);

            // lpp_09
            if ($layak_elaun[$val]  != 1)
            {
                $datalpp09["id_pelatih"] = $id_insert_pelatih;
                // echo $this->db->set($datalpp09)->get_compiled_insert("lpp_09");
                $this->db->insert('lpp_09', $datalpp09);
            }
        }
        $this->db->trans_complete();
    }

    /* DPRECATED */
    function sahkan_lpp09_deprecated($data)
    {
        $status = 1;
        $this->db->trans_start();
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $arr_temudugatetapan = $data['id_temuduga_tetapan'];
        // $arr_bp = $data['id_bp'];
        // $arr_permohonan = $data['id_permohonan'];
        // $arr_nama_peribadi = $data['butir_peribadi_name'];
        $arr_mykad_peribadi = $data['no_mykad'];
        // $arr_chk_elaun = $data['opt_elaun'];
        $arr_chk_tindakan = $data['opt_sah'];

        $upd_temuduga = array();
      //   echo "<pre>";print_r($arr_chk_elaun);echo "</pre>";exit;
        foreach($arr_temudugatetapan as $idx=>$val)
        {
            // Temuduga Tetapan
            $id_upd_temuduga = $val;
            if ($arr_chk_elaun[$idx]!="") $upd_temuduga['tawaran_elaun'] = $arr_chk_elaun[$idx];
            if ($arr_chk_tindakan[$idx]!="") $upd_temuduga['pendaftaran_status'] = $arr_chk_tindakan[$idx];
            // $upd_temuduga["tawaran_elaun"] = $chk_elaun[$val];
            $this->db->where('id', $id_upd_temuduga);
            // echo $this->db->set($upd_temuduga)->get_compiled_update("temuduga_tetapan");
            $this->db->update('temuduga_tetapan', $upd_temuduga);

            // Butir Peribadi
            // Bagian ini masih mau dibicarakan lagi
            // $id_upd_bp = $arr_bp[$idx];
            // $upd_bp['nama_penuh'] = $arr_nama_peribadi[$idx];
            // $upd_bp['no_mykad'] = $arr_mykad_peribadi[$idx];
            // $this->db->where('id', $id_upd_bp);
            // $this->db->update('permohonan_butir_peribadi', $upd_bp);

            if ($arr_chk_tindakan[$idx]=="" || $arr_chk_tindakan[$idx]==0)
            {
                # echo "back<br/>"; // Bila tidak sah
                $rs = $this->get_by_id_permohonan($arr_permohonan[$idx]);
                #echo "<pre>";print_r($rs);echo "</pre>";
                if (count($rs))
                {
                    foreach ($rs as $r)
                    {
                        $id_upd_temuduga_2 = $r->id;
                        $upd_temuduga_2['id_kursus_sah'] = 0;
                        $upd_temuduga_2['pendaftaran_status'] = 0;
                        $this->db->where('id', $id_upd_temuduga_2);
                        $this->db->update('temuduga_tetapan', $upd_temuduga_2);
                    }
                }
            }
            elseif ($arr_chk_tindakan[$idx] == 5)
            {
                # echo "forward<br/>";  // Bila sah
                $rs = $this->get_by_id($val);
                // echo "<pre>";var_dump($rs);echo "</pre>";
                $rs_pot = $this->get_potongan_by_temuduga_kewpot($val);
                #echo "<pre>";print_r($rs_pot);echo "</pre>";
                if (count($rs))
                {
                    // Pelatih
              // $upd_pelatih['id_permohonan'] = $arr_permohonan[$idx];
              $upd_pelatih['id_permohonan'] = $rs[0]->id_permohonan;
              $upd_pelatih['no_pelatih'] = $this->generate_no_pelatih();
              $upd_pelatih['no_mykad'] = $arr_mykad_peribadi[$idx];
              $upd_pelatih['id_giatmara'] = $rs[0]->id_giatmara;
            //   $upd_pelatih['id_kursus'] = $rs[0]->id_kursus_sah;
            $upd_pelatih['id_kursus'] = $rs[0]->id_kursus;
              $upd_pelatih['status_pelatih'] = 1;
              $upd_pelatih['kelayakan_elaun'] = $rs[0]->tawaran_elaun;
              $upd_pelatih['nama_bank'] = $rs[0]->tawaran_nama_bank;
              $upd_pelatih['no_akaun'] = $rs[0]->tawaran_no_akaun;
              $upd_pelatih['cara_bayaran'] = $rs[0]->tawaran_cara_bayaran;
              $upd_pelatih['id_kew_kod_kombinasi'] = $rs[0]->id_kew_kod_kombinasi;
              $upd_pelatih['tarikh_mula_kursus'] = $rs[0]->tawaran_mula_elaun;
              $upd_pelatih['tarikh_tamat_kursus'] = $rs[0]->tawaran_tamat_elaun;
              $upd_pelatih['jenis_pelatih'] = "LPP09";
            //   echo $this->db->set($upd_pelatih)->get_compiled_insert("pelatih");exit;
              $this->db->insert('pelatih', $upd_pelatih);
              #echo $this->db->last_query()."<br/>";
              $id_insert_pelatih = $this->db->insert_id();

              // Pelatih Potongan
            //   kata cik maizun ini gak usah
            //   $this->db->where('id_pelatih', $id_insert_pelatih);
            //   $this->db->delete('pelatih_potongan');

              if (count($rs_pot)) {
                foreach ($rs_pot as $r_pot) {
                  $upd_pelatih_pot['id_pelatih'] = $id_insert_pelatih;
                  $upd_pelatih_pot['id_kew_potongan'] = $r_pot->id_potongan;
                  $this->db->insert('pelatih_potongan', $upd_pelatih_pot);
                  #echo $this->db->last_query()."<br/>";
                }
              }

              // Markah modul
              $rs_c = $this->get_id_kursus_by_idsetting($rs[0]->id_kursus_sah);
              $id_kursus = $rs_c[0]->id_kursus;
              $rs_m1 = $this->get_modul_by_idkursus($id_kursus);
              if (count($rs_m1)) {
                foreach ($rs_m1 as $m1) {
                  $upd_markahmodul['id_pelatih'] = $id_insert_pelatih;
                  $upd_markahmodul['id_kursus'] = $rs[0]->id_kursus_sah; // id setting tawaran kursus
                  $upd_markahmodul['id_modul'] = $m1->id_modul;
                  $upd_markahmodul["pb_teori"] = 0.00;
                  $upd_markahmodul["pb_amali"] = 0.00;
                  $upd_markahmodul["pam_teori"] = 0.00;
                  $upd_markahmodul["pam_amali"] = 0.00;
                  $upd_markahmodul["markah"] = 0.00;
                  // echo $this->db->set($upd_markahmodul)->get_compiled_insert("markah_modul");
                  $this->db->insert('markah_modul', $upd_markahmodul);
                  #echo $this->db->last_query()."<br/>";
                }
              }

              // Markah modul 2
              $upd_markahmodul2['id_pelatih'] = $id_insert_pelatih;
              $upd_markahmodul2['id_kursus'] = $rs[0]->id_kursus_sah; // id setting tawaran kursus
              $upd_markahmodul2["gcpa"] = 0.00;
              $upd_markahmodul2["kokurikulum"] = 0;
              $upd_markahmodul2["literasi_komputer"] = 0;
              $upd_markahmodul2["keusahawanan"] = 0;
              $upd_markahmodul2["puji"] = 0;
              $upd_markahmodul2["kehadiran"] = 0;
              $upd_markahmodul2["latihan_industri"] = 0;
              $upd_markahmodul2["status_isi_markah"] = 0;
              // echo $this->db->set($upd_markahmodul2)->get_compiled_insert("markah_modul_2");
              $this->db->insert('markah_modul_2', $upd_markahmodul2);
              #echo $this->db->last_query()."<br/>";

              // Markah modul status
              $upd_markahmodulstatus['id_pelatih'] = $id_insert_pelatih;
              #$upd_markahmodul2['id_kursus'] = $rs[0]->id_kursus_sah; // id setting tawaran kursus
              // echo $this->db->set($upd_markahmodulstatus)->get_compiled_insert("markah_modul_status");
              $this->db->insert('markah_modul_status', $upd_markahmodulstatus);
              #echo $this->db->last_query()."<br/>";
            }
          }
        }
      //   echo $this->db->set($upd_temuduga)->get_compiled_update("temuduga_tetapan");exit;
        #echo "<pre>";print_r($upd_temuduga);echo "</pre>";
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) $status = 0;
        // echo $status;exit;
        return $status;

        // foreach ($where as $key => $val)
        // {
        //     $this->db->where($key, $val);
        // }
        // // echo $this->db->set($data)->get_compiled_update("temuduga_tetapan");
        // $this->db->update("temuduga_tetapan", $data);
        // return $this->db->affected_rows();
    }

    /*
     * @author Zulyantara <zulyantara@gmail.com>
     * @param $where kondisi untuk query
     * @param $return type of return the method
     */
    function get_permohonan_butir_peribadi($where = NULL, $return = "result")
    {
        if ($where !== NULL)
        {
            foreach ($where as $key => $val)
            {
                $this->db->where($key, $val);
            }
        }

        $qry = $this->db->get("permohonan_butir_peribadi");
        if ($return === "result")
        {
            return $qry->result();
        }
        elseif ($return === "row")
        {
            return $qry->row();
        }
    }

    public function get_by_id_permohonan($id)
    {
        $qry = $this->db->select('id');
        $qry = $this->db->where('id_permohonan',$id);
        $qry = $this->db->get('temuduga_tetapan');
        #echo $this->db->last_query();
        return $qry->result();
    }

    public function get_by_id($id)
    {
        $qry = $this->db->where('id',$id);
        // echo $this->db->get_compiled_select('temuduga_tetapan');exit;
        $qry = $this->db->get('temuduga_tetapan');
        #echo $this->db->last_query();
        return $qry->result();
    }

    public function get_potongan_by_temuduga_kewpot($idtemuduga, $idkewpotongan='')
    {
        $qry = $this->db->select('temuduga_tetapan_potongan.id as id_temuduga_potongan');
        $qry = $this->db->select('kew_potongan.id as id_potongan, kew_potongan.name as name_potongan');
        $qry = $this->db->where('id_temudga_tetapan', $idtemuduga);
        if ($idkewpotongan!='') $qry = $this->db->where('id_kew_potongan', $idkewpotongan);
        $qry = $this->db->where('kew_potongan.status',1);
        $qry = $this->db->join('kew_potongan', 'kew_potongan.id=temuduga_tetapan_potongan.id_kew_potongan');
        $qry = $this->db->get('temuduga_tetapan_potongan');
        #echo $this->db->last_query();
        return $qry->result();
    }

    private function generate_no_pelatih($id_pbp=0)
    {
        // create auto no pelatih
        // hitung jumlah data di table pelatih
        $jml_data_pbp = $this->pelatih->count_data();
        // jika lebih dari 0 maka sudah ada isi, maka ambil no_pelatih yang terakhir
        if ($jml_data_pbp > 0 )
        {
            $mydata = $this->pelatih->getNoPelatih($id_pbp);
            $my_no_pelatih = $mydata->no_pelatih;
            if ($my_no_pelatih) {
                $no_pelatih = $my_no_pelatih;
            }
            else
            {
                $row_pbp_no = $this->pelatih->get_last_no_pelatih();
                $last_no_pelatih = substr($row_pbp_no->no_pelatih,6,4);
                $new_no_pelatih = $last_no_pelatih + 1;
                if (strlen($new_no_pelatih)==4)
                {
                $nrp = $new_no_pelatih;
                }
                elseif (strlen($new_no_pelatih)==3)
                {
                $nrp = "0".$new_no_pelatih;
                }
                elseif (strlen($new_no_pelatih)==2)
                {
                $nrp = "00".$new_no_pelatih;
                }
                elseif (strlen($new_no_pelatih)==1)
                {
                $nrp = "000".$new_no_pelatih;
                }
                $no_pelatih = date("Ym").$nrp;
            }
        }
        else
        {
            $no_pelatih = date("Ym")."0001";
        }
        return $no_pelatih;
    }

    public function get_id_kursus_by_idsetting($id)
    {
        $qry = $this->db->where('id', $id);
        $qry = $this->db->get('settings_tawaran_kursus');
        #echo $this->db->last_query();
        return $qry->result();
    }

    public function get_modul_by_idkursus($idkursus)
    {
        $qry = $this->db->select('id_kursus, id_modul');
        $qry = $this->db->where('id_kursus', $idkursus);
        // echo $this->db->get_compiled_select("ref_modul");exit;
        $qry = $this->db->get('ref_modul');
        return $qry->result();
    }

    function update_pendaftaran($data)
    {
        // update ke table permohonan_butir_pribadi
        $this->db->where("id", $data["id"]);
        // echo $this->db->set($data)->get_compiled_update("permohonan_butir_peribadi");exit;
        $this->db->update("permohonan_butir_peribadi", $data);

        $lastid = $data['id'];
        return $lastid;
    }

    function update_kursus_lpp09($data)
    {
        // update ke table  permohonan_kursus_lpp09
        $this->db->where('id_permohonan', $data['id_permohonan']);
        // echo $this->db->set($data)->get_compiled_update("permohonan_kursus_lpp09");exit;
        $this->db->update('permohonan_kursus_lpp09', $data);
        $lastid = $data["id_permohonan"];
        return $lastid;
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * @param $where array kondisi untuk query, default FALSE
     * @return result query
     */
    function get_v_poskod($where = FALSE, $return = "result")
    {
        if ($where !== FALSE && is_array($where))
        {
            foreach ($where as $key => $val)
            {
                $this->db->where($key, $val);
            }
        }

        $qry = $this->db->get("v_poskod");
        if ($return === "result")
        {
            return $qry->result();
        }
        elseif ($return === "row")
        {
            return $qry->row();
        }
    }

    function update_bank($data)
    {
        $this->db->where('id_permohonan', $data["id_permohonan"]);
        // echo $this->db->set($data)->get_compiled_update("kelulusan_lpp09");
        $this->db->update('kelulusan_lpp09', $data);

        $dp["nama_bank"] = $data["nama_bank"];
        $dp["no_akaun"] = $data["no_akaun"];
        $this->db->where("id_permohonan", $data["id_permohonan"]);
        // echo $this->db->set($dp)->get_compiled_update("pelatih");exit;
        $this->db->update("pelatih", $dp);
    }

    function get_cetak_temuduga_lpp09($where = NULL)
    {
        if ($where !== NULL)
        {
            foreach ($where as $k => $v)
            {
                $this->db->where($k, $v);
            }
        }
        // echo $this->db->get_compiled_select("v_cetak_surat_temuduga_lpp09");
        $this->db->distinct();
        $qry = $this->db->get('v_cetak_surat_temuduga_lpp09');
        return $qry->result();
    }

    function get_data_pengesahan($where = NULL, $select = "*")
    {
        $this->db->select($select);
        if ($where !== NULL)
        {
            foreach ($where as $key => $value)
            {
                $this->db->where($key, $value);
            }
        }

        $this->db->join('temuduga_tetapan tt', 'pbp.id = tt.id_permohonan', 'left');
        $this->db->join('pelatih p', "pbp.id = p.id_permohonan AND p.jenis_pelatih='LPP09'", 'left');
        $this->db->join('settings_tawaran_kursus stk', 'tt.id_kursus = stk.id', 'left');
        $this->db->join('ref_kursus k', 'stk.id_kursus = k.id', 'left');
        $this->db->join('permohonan_kursus_lpp09 pkl', 'pbp.id = pkl.id_permohonan', 'left');
        $this->db->join('ref_kluster kls', 'pkl.id_kluster = kls.id', 'left');
        $this->db->join('ref_lpp09_program_pertandingan lpp', 'pkl.id_program_pertandingan = lpp.id', 'left');
        $this->db->join('ref_lpp09_program_khas lpk', 'pkl.id_program_khas = lpk.id', 'left');
        // echo $this->db->get_compiled_select("permohonan_butir_peribadi pbp");exit;
        return $this->db->get('permohonan_butir_peribadi pbp');
    }

    function save_pendaftaran_tawaran_terus($data)
    {
        $this->db->trans_start();

        $chk_tindakan = $data['chk_tindakan'];
        $opt_daftar = $data['opt_daftar'];
        $bank=  $data['txt_bank'];
        $giatmara=  $data['txt_giatmara'];
        $kelayakan_elaun = $data['txt_kelayakan_elaun'];
        $akaun = $data['txt_akaun'];
        $permohonan_kursus_lpp09 = $data['txt_permohonan_kursus_lpp09'];
        $mykad = $data['txt_mykad'];
        $settings_tawaran_kursus = $data['txt_settings_tawaran_kursus'];
        $tarikh_mula_kursus = $data['txt_tarikh_mula_kursus'];
        $tarikh_tamat_kursus = $data['txt_tarikh_tamat_kursus'];
        $tarikh_mohon = $data['txt_tarikh_mohon'];
        $kursus = $data["txt_kursus"];
        // echo "<pre>";var_dump($data);echo "</pre>";exit;

        // looping sebanyak checklist yang terchecklist
        foreach ($chk_tindakan as $k => $v)
        {
            $data_p["id_permohonan"] = $v;
            $data_p["no_pelatih"] = $this->plm->generate_no_pelatih();
            $data_p["no_mykad"] = $mykad[$v];
            $data_p["id_giatmara"] = $giatmara[$v];
            $data_p["jenis_pelatih"] = 'LPP09';
            $data_p["status_pelatih"] = 1;
            $data_p["kelayakan_elaun"] = $kelayakan_elaun[$v] == "" ? 0 : $kelayakan_elaun[$v];
            $data_p["nama_bank"] = $bank[$v];
            $data_p["no_akaun"] = $akaun[$v];
            $data_p["cara_bayaran"] = $kelayakan_elaun[$v] == "" ? "" : "Autopay";
            $data_p["tarikh_mula_kursus"] = $tarikh_mula_kursus[$v];
            $data_p["tarikh_tamat_kursus"] = $tarikh_tamat_kursus[$v];
            $data_p["tarikh_daftar"] = $tarikh_mohon[$v];
            $data_p["id_permohonan_kursus_lpp09"] = $permohonan_kursus_lpp09[$v];
            // echo $this->db->set($data_p)->get_compiled_insert("pelatih");exit;
            $this->db->insert("pelatih", $data_p);
            $id_insert_pelatih = $this->db->insert_id();

            $this->db->where('id_permohonan', $v);
            $this->db->where('id_permohonan_kursus_lpp09', $permohonan_kursus_lpp09[$v]);
            $data_kl9["status_pendaftaran"] = 5;
            // echo $this->db->set($data_kl9)->get_compiled_update("kelulusan_lpp09");exit;
            $this->db->update("kelulusan_lpp09", $data_kl9);

            // Jika kategori program == LL, maka simpan ke table markah modul, markah modul 2, markah modul status
            if ($settings_tawaran_kursus[$v] != 0)
            {
                // simpan ke table markah_modul
                $rs_m1 = $this->get_modul_by_idkursus($kursus[$v]);
                if (count($rs_m1)) {
                    foreach ($rs_m1 as $m1) {
                        $upd_markahmodul['id_pelatih'] = $id_insert_pelatih;
                        $upd_markahmodul['id_kursus'] = $settings_tawaran_kursus[$v]; // id setting tawaran kursus
                        $upd_markahmodul['id_modul'] = $m1->id_modul;
                        // echo $this->db->set($upd_markahmodul)->get_compiled_insert("markah_modul");exit;
                        $this->db->insert('markah_modul', $upd_markahmodul);
                    }
                }

                // Markah modul 2
                $upd_markahmodul2['id_pelatih'] = $id_insert_pelatih;
                $upd_markahmodul2['id_kursus'] = $settings_tawaran_kursus[$v]; // id setting tawaran kursus
                // echo $this->db->set($upd_markahmodul2)->get_compiled_insert("markah_modul_2");
                $this->db->insert('markah_modul_2', $upd_markahmodul2);

                // Markah modul status
                $upd_markahmodulstatus['id_pelatih'] = $id_insert_pelatih;
                // echo $this->db->set($upd_markahmodulstatus)->get_compiled_insert("markah_modul_status");
                $this->db->insert('markah_modul_status', $upd_markahmodulstatus);
            }
        }
        // exit;
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
        {
            return "Ada error pokoknya";
        }
        else
        {
            return "Berhasil";
        }
    }
    
    function get_cetak_tawaran_kursus($where)
    {
        foreach ($where as $key => $val)
        {
            $this->db->where($key, $val);
        }

        $qry = $this->db->get('v_cetak_surat_temuduga_lpp09');
        return $qry->row();
    }
}
