<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Screen_dua extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
								$this->load->library('grocery_CRUD');
        $this->load->model('screen_dua_model', "sdm");
        $this->load->library('session');
    }

    function index()
    {
        $data["res_kewarganegaraan"] = $this->sdm->get_data("ref_kewarganegaraan");
        $data["res_bangsa"] = $this->sdm->get_data("ref_bangsa");
        $data["res_etnik"] = $this->sdm->get_data("ref_etnik");
        $data["res_agama"] = $this->sdm->get_data("ref_agama");
        $data["res_taraf_perkahwinan"] = $this->sdm->get_data("ref_taraf_perkahwinan");
        $data["res_kelulusan"] = $this->sdm->get_data("ref_kelulusan");
        $data["res_kategori_pemohon"] = $this->sdm->get_data("ref_kategori_pemohon");
        $data["res_negeri"] = $this->sdm->get_data("ref_negeri");

        // $this->load->view('header');
        $this->load->view('screen_dua/form', $data);
        // $this->load->view('footer');
    }

    function simpan()
    {
        $btn = $this->input->post('btn_simpan');

        $nama_penuh = $this->input->post('nama_penuh');
        $no_mykad = $this->input->post('no_mykad');
        $tarikh_lahir = $this->input->post('tarikh_lahir');
        $kewarganegaraan = $this->input->post('kewarganegaraan');
        $umur = $this->input->post('umur');
        $no_telefon = $this->input->post('no_telefon');
        $no_hp = $this->input->post('no_hp');
        $alamat = $this->input->post('alamat');
        $poskod = $this->input->post('poskod');
        $bandar = $this->input->post('bandar');
        $negeri = $this->input->post('negeri');
        $email = $this->input->post('email');
        $bangsa = $this->input->post('bangsa');
        $etnik = $this->input->post('etnik');
        $agama = $this->input->post('agama');
        $taraf_perkahwinan = $this->input->post('taraf_perkahwinan');
        $kategori_kelulusan = $this->input->post('kategori_kelulusan');
        $kelulusan = $this->input->post('kelulusan');
        $matlamat_selepas_kursus = $this->input->post('matlamat_selepas_kursus');
        $kategori_pemohon = $this->input->post('kategori_pemohon');

        // create auto no rujukan permohonan
        // hitung jumlah data di table permohonan_butir_peribadi
        $jml_data_pbp = $this->sdm->count_data();
        // jika lebih dari 0 maka sudah ada isi, maka ambil no_rujukan_permohonan yang terakhir
        if ($jml_data_pbp > 0 )
        {
            $row_pbp_no = $this->sdm->get_last_no_rujuk();
            $last_no_rujuk = substr($row_pbp_no->no_rujukan_permohonan,6,4);
            $new_no_rujuk = $last_no_rujuk + 1;
            if (strlen($new_no_rujuk)==4)
            {
                $nrp = $new_no_rujuk;
            }
            elseif (strlen($new_no_rujuk)==3)
            {
                $nrp = "0".$new_no_rujuk;
            }
            elseif (strlen($new_no_rujuk)==2)
            {
                $nrp = "00".$new_no_rujuk;
            }
            elseif (strlen($new_no_rujuk)==1)
            {
                $nrp = "000".$new_no_rujuk;
            }

            $no_rujukan_permohonan = date("Ym").$nrp;
        }
        else
        {
            $no_rujukan_permohonan = date("Ym")."0001";
        }

        $data_pbp["nama_penuh"] = $nama_penuh;
        $data_pbp["no_mykad"] = $no_mykad;
        $data_pbp["tarikh_lahir"] = $tarikh_lahir;
        $data_pbp["kewarganegaraan"] = $kewarganegaraan;
        $data_pbp["umur"] = $umur;
        $data_pbp["no_telefon"] = $no_telefon;
        $data_pbp["no_hp"] = $no_hp;
        $data_pbp["alamat"] = $alamat;
        $data_pbp["poskod"] = $poskod;
        // $data_pbp["bandar"] = $bandar;
        // $data_pbp["negeri"] = $negeri;
        $data_pbp["emel"] = $email;
        $data_pbp["bangsa"] = $bangsa;
        $data_pbp["etnik"] = $etnik;
        $data_pbp["agama"] = $agama;
        $data_pbp["taraf_perkahwinan"] = $taraf_perkahwinan;
        $data_pbp["kategori_kelulusan"] = $kategori_kelulusan;
        $data_pbp["no_rujukan_permohonan"] =$no_rujukan_permohonan;
        $data_pbp["tarikh_hantar"] = date("Y-m-d");

        if ($btn === "simpan_hantar")
        {
            // simpan data
            // $simpan = $this->sdm->save($data_pbp);
            redirect('screen_dua','refresh');
        }
        elseif ($btn === "simpan_seterusnya")
        {
            $simpan = $this->sdm->save($data_pbp);

            $where["nama_penuh"] = $nama_penuh;
            $where["no_mykad"] = $no_mykad;
            $where["tarikh_lahir"] = $tarikh_lahir;
            $where["kewarganegaraan"] = $kewarganegaraan;
            $where["umur"] = $umur;
            $where["no_telefon"] = $no_telefon;
            $where["no_hp"] = $no_hp;
            $where["alamat"] = $alamat;
            $where["poskod"] = $poskod;
            // $where["bandar"] = $bandar;
            // $where["negeri"] = $negeri;
            $where["emel"] = $email;
            $where["bangsa"] = $bangsa;
            $where["etnik"] = $etnik;
            $where["agama"] = $agama;
            $where["taraf_perkahwinan"] = $taraf_perkahwinan;
            $where["kategori_kelulusan"] = $kategori_kelulusan;
            $row_pbp = $this->sdm->get_row_pbp($where);

            // simpan id permohonan ke session
            $data_sess["id_permohonan"] = $row_pbp->id;
            $this->session->set_userdata($data_sess);

            redirect("screen_tiga");
        }
    }

    function ajax_poskod()
    {
        $poskod_ket = $this->input->post('poskod_ket');
        $poskod_id = $this->input->post('poskod_id');

        $poskod_ket != "" ? $w["poskod"] = $poskod_ket : "";
        $poskod_id != "" ? $w["id"] = $poskod_id : "";
        // echo $this->db->like(array("poskod"=>$poskod_ket))->get_compiled_select('ref_poskod_bandar_negeri');
        $row = $this->sdm->get_poskod($w);
								
        @$data["id_poskod"] = $row->id_poskod;
        @$data["bandar"] = $row->bandar;
        @$data["negeri"] = strtoupper($row->nama_negeri);
        echo json_encode($data);
    }

    function cek()
    {
        $mykad = $this->input->post('no_mykad');
        $row_mykad = $this->sdm->cek_nomykad($mykad);
        if ($row_email == 0)
        {
            echo "Data Mykad Ada";
        }
        else
        {
            echo "Data Mykad Tidak Ada";
        }
    }

    function proses_no_rujuk()
    {
        $btn = $this->input->post('check');
        $no_rujuk = $this->input->post('no_rujuk');
        if ($btn === "check")
        {
            $where["no_rujukan_permohonan"] = $no_rujuk;
            // echo $this->db->where($where)->get_compiled_select("permohonan_butir_peribadi");exit;
            $row_pbp = $this->sdm->get_row_pbp($where);

            $data["res_kewarganegaraan"] = $this->sdm->get_data("ref_kewarganegaraan");
            $data["res_bangsa"] = $this->sdm->get_data("ref_bangsa");
            $data["res_etnik"] = $this->sdm->get_data("ref_etnik");
            $data["res_agama"] = $this->sdm->get_data("ref_agama");
            $data["res_taraf_perkahwinan"] = $this->sdm->get_data("ref_taraf_perkahwinan");
            $data["res_kelulusan"] = $this->sdm->get_data("ref_kelulusan");
            $data["res_kategori_pemohon"] = $this->sdm->get_data("ref_kategori_pemohon");
            $data["res_negeri"] = $this->sdm->get_data("ref_negeri");
            $data["row_pbp"] = $row_pbp;

            $this->load->view('header');
            $this->load->view('screen_dua/form', $data);
            $this->load->view('footer');
        }
        else
        {
            redirect("screen_dua");
        }
    }

    function ajax_krm_email()
    {
        // var_dump($this->input->post());exit;
        $nama_penuh = $this->input->post('nama_penuh');
        $no_mykad = $this->input->post('no_mykad');
        $tarikh_lahir = $this->input->post('tarikh_lahir');
        $kewarganegaraan = $this->input->post('kewarganegaraan');
        $umur = $this->input->post('umur');
        $no_telefon = $this->input->post('no_telefon');
        $no_hp = $this->input->post('no_hp');
        $alamat = $this->input->post('alamat');
        $poskod = $this->input->post('poskod');
        $bandar = $this->input->post('bandar');
        $negeri = $this->input->post('negeri');
        $email = $this->input->post('email');
        $bangsa = $this->input->post('bangsa');
        $etnik = $this->input->post('etnik');
        $agama = $this->input->post('agama');
        $taraf_perkahwinan = $this->input->post('taraf_perkahwinan');
        $kategori_kelulusan = $this->input->post('kategori_kelulusan');
        $kelulusan = $this->input->post('kelulusan');
        $matlamat_selepas_kursus = $this->input->post('matlamat_selepas_kursus');
        $kategori_pemohon = $this->input->post('kategori_pemohon');

        // create auto no rujukan permohonan
        // hitung jumlah data di table permohonan_butir_peribadi
        $jml_data_pbp = $this->sdm->count_data();
        // jika lebih dari 0 maka sudah ada isi, maka ambil no_rujukan_permohonan yang terakhir
        if ($jml_data_pbp > 0 )
        {
            $row_pbp_no = $this->sdm->get_last_no_rujuk();
            $last_no_rujuk = substr($row_pbp_no->no_rujukan_permohonan,6,4);
            $new_no_rujuk = $last_no_rujuk + 1;
            $no_rujukan_permohonan = date("Ym").$new_no_rujuk;
        }
        else
        {
            $no_rujukan_permohonan = date("Ym")."0001";
        }

        $data_pbp["nama_penuh"] = $nama_penuh;
        $data_pbp["no_mykad"] = $no_mykad;
        $data_pbp["tarikh_lahir"] = $tarikh_lahir;
        $data_pbp["kewarganegaraan"] = $kewarganegaraan;
        $data_pbp["umur"] = $umur;
        $data_pbp["no_telefon"] = $no_telefon;
        $data_pbp["no_hp"] = $no_hp;
        $data_pbp["alamat"] = $alamat;
        $data_pbp["poskod"] = $poskod;
        // $data_pbp["bandar"] = $bandar;
        // $data_pbp["negeri"] = $negeri;
        $data_pbp["emel"] = $email;
        $data_pbp["bangsa"] = $bangsa;
        $data_pbp["etnik"] = $etnik;
        $data_pbp["agama"] = $agama;
        $data_pbp["taraf_perkahwinan"] = $taraf_perkahwinan;
        $data_pbp["kategori_kelulusan"] = $kategori_kelulusan;
        $data_pbp["no_rujukan_permohonan"] =$no_rujukan_permohonan;
        $data_pbp["tarikh_hantar"] = date("Y-m-d");

        // simpan data
        $simpan = $this->sdm->save($data_pbp);

        // kirim email
        $this->load->library('email');
        $this->email->from("gspel@giatmara.edu.my", "Admin");
        $this->email->to($email);
        $this->email->subject("Permohonan Kursus");

        $data["nama"] = $nama_penuh;
        $data["no_mykad"] = $no_mykad;
        $data["no_rujukan"] = $no_rujukan_permohonan;
        $this->load->view('screen_dua/notif_email', $data);
        $html = $this->output->get_output();
        echo $html;
    }
}
