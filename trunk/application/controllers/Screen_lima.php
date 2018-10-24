<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Screen_lima extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('grocery_CRUD');
        $this->load->model('screen_lima_model', "slm");
        $this->load->library('session');
    }

    function index() {
        $data["res_kewarganegaraan"] = $this->slm->get_data("ref_kewarganegaraan");
        $data["ref_kategori_penjaga"] = $this->slm->get_data("ref_kategori_penjaga");
        $data["res_agama"] = $this->slm->get_data("ref_agama");
        $data["res_etnik"] = $this->slm->get_data("ref_etnik");
        $data["res_negeri"] = $this->slm->get_data("ref_negeri");
        $data["res_pendapatan"] = $this->slm->get_data("ref_pendapatan");
        $data["ref_hubungan"] = $this->slm->get_data("ref_hubungan");

        // $this->load->view('header');
        $this->load->view('screen_lima/form', $data);
        // $this->load->view('footer');
    }

    function ajax_poskod() {
        $poskod_ket = $this->input->post('poskod_ket');
        $w["poskod"] = $poskod_ket;
        // echo $this->db->like(array("poskod"=>$poskod_ket))->get_compiled_select('ref_poskod_bandar_negeri');
        $row = $this->slm->get_poskod($w);
        @$data["id_poskod"] = $row->id_poskod;
        @$data["bandar"] = $row->bandar;
        @$data["negeri"] = $row->nama_negeri;
        echo json_encode($data);
    }

    function simpan() {
        $maklumat = $this->input->post('maklumat');
        $a_nama_penuh = $this->input->post('a_nama_penuh');
        $a_hubungan = $this->input->post('a_hubungan');
        $a_jenis_pengenalan = $this->input->post('a_jenis_pengenalan');
        $a_mykad = $this->input->post('a_mykad');
        $a_kewarganegaraan = $this->input->post('a_kewarganegaraan');
        $a_kategori_penjaga = $this->input->post('a_kategori_penjaga');
        $a_no_tel = $this->input->post('a_no_tel');
        $a_no_hp = $this->input->post('a_no_hp');
        $a_agama = $this->input->post('a_agama');
        $a_etnik = $this->input->post('a_etnik');
        $a_bangsa = $this->input->post('a_bangsa');
        $a_alamat = $this->input->post('a_alamat');
        $a_poskod = $this->input->post('a_poskod');
        $a_pekerjaan = $this->input->post('a_pekerjaan');
        $a_pendapatan = $this->input->post('a_pendapatan');
        $a_majikan = $this->input->post('a_majikan');
        $a_no_tel_pejabat = $this->input->post('a_no_tel_pejabat');
        $a_samb = $this->input->post('a_samb');
        $a_alamat_pejabat = $this->input->post('a_alamat_pejabat');
        $b_nama_penuh = $this->input->post('b_nama_penuh');
        $b_jenis_pengenalan = $this->input->post('b_jenis_pengenalan');
        $b_mykad = $this->input->post('b_mykad');
        $b_kewarganegaraan = $this->input->post('b_kewarganegaraan');
        $b_kategori_penjaga = $this->input->post('b_kategori_penjaga');
        $b_no_tel = $this->input->post('b_no_tel');
        $b_no_hp = $this->input->post('b_no_hp');
        $b_agama = $this->input->post('b_agama');
        $b_etnik = $this->input->post('b_etnik');
        $b_bangsa = $this->input->post('b_bangsa');
        $b_alamat = $this->input->post('b_alamat');
        $b_poskod = $this->input->post('b_poskod');
        $b_pekerjaan = $this->input->post('b_pekerjaan');
        $b_pendapatan = $this->input->post('b_pendapatan');
        $b_majikan = $this->input->post('b_majikan');
        $b_no_tel_pejabat = $this->input->post('b_no_tel_pejabat');
        $b_samb = $this->input->post('b_samb');
        $b_alamat_pejabat = $this->input->post('b_alamat_pejabat');
        $c_nama_penuh = $this->input->post('c_nama_penuh');
        $c_jenis_pengenalan = $this->input->post('c_jenis_pengenalan');
        $c_mykad = $this->input->post('c_mykad');
        $c_kewarganegaraan = $this->input->post('c_kewarganegaraan');
        $c_kategori_penjaga = $this->input->post('c_kategori_penjaga');
        $c_no_tel = $this->input->post('c_no_tel');
        $c_no_hp = $this->input->post('c_no_hp');
        $c_agama = $this->input->post('c_agama');
        $c_etnik = $this->input->post('c_etnik');
        $c_bangsa = $this->input->post('c_bangsa');
        $c_alamat = $this->input->post('c_alamat');
        $c_poskod = $this->input->post('c_poskod');
        $c_pekerjaan = $this->input->post('c_pekerjaan');
        $c_pendapatan = $this->input->post('c_pendapatan');
        $c_majikan = $this->input->post('c_majikan');
        $c_no_tel_pejabat = $this->input->post('c_no_tel_pejabat');
        $c_samb = $this->input->post('c_samb');
        $c_alamat_pejabat = $this->input->post('c_alamat_pejabat');

        $data["maklumat"] = $maklumat;
        $data["a_nama_penuh"] = $a_nama_penuh;
        $data["a_hubungan"] = $a_hubungan;
        $data["a_jenis_pengenalan"] = $a_jenis_pengenalan;
        $data["a_mykad"] = $a_mykad;
        $data["a_kewarganegaraan"] = $a_kewarganegaraan;
        $data["a_kategori_penjaga"] = $a_kategori_penjaga;
        $data["a_no_tel"] = $a_no_tel;
        $data["a_no_hp"] = $a_no_hp;
        $data["a_agama"] = $a_agama;
        $data["a_etnik"] = $a_etnik;
        $data["a_bangsa"] = $a_bangsa;
        $data["a_alamat"] = $a_alamat;
        $data["a_poskod"] = $a_poskod;
        $data["a_pekerjaan"] = $a_pekerjaan;
        $data["a_pendapatan"] = $a_pendapatan;
        $data["a_majikan"] = $a_majikan;
        $data["a_no_tel_pejabat"] = $a_no_tel_pejabat;
        $data["a_samb"] = $a_samb;
        $data["a_alamat_pejabat"] = $a_alamat_pejabat;
        $data["b_nama_penuh"] = $b_nama_penuh;
        $data["b_jenis_pengenalan"] = $b_jenis_pengenalan;
        $data["b_mykad"] = $b_mykad;
        $data["b_kewarganegaraan"] = $b_kewarganegaraan;
        $data["b_kategori_penjaga"] = $b_kategori_penjaga;
        $data["b_no_tel"] = $b_no_tel;
        $data["b_no_hp"] = $b_no_hp;
        $data["b_agama"] = $b_agama;
        $data["b_etnik"] = $b_etnik;
        $data["b_bangsa"] = $b_bangsa;
        $data["b_alamat"] = $b_alamat;
        $data["b_poskod"] = $b_poskod;
        $data["b_pekerjaan"] = $b_pekerjaan;
        $data["b_pendapatan"] = $b_pendapatan;
        $data["b_majikan"] = $b_majikan;
        $data["b_no_tel_pejabat"] = $b_no_tel_pejabat;
        $data["b_samb"] = $b_samb;
        $data["b_alamat_pejabat"] = $b_alamat_pejabat;
        $data["c_nama_penuh"] = $c_nama_penuh;
        $data["c_jenis_pengenalan"] = $c_jenis_pengenalan;
        $data["c_mykad"] = $c_mykad;
        $data["c_kewarganegaraan"] = $c_kewarganegaraan;
        $data["c_kategori_penjaga"] = $c_kategori_penjaga;
        $data["c_no_tel"] = $c_no_tel;
        $data["c_no_hp"] = $c_no_hp;
        $data["c_agama"] = $c_agama;
        $data["c_etnik"] = $c_etnik;
        $data["c_bangsa"] = $c_bangsa;
        $data["c_alamat"] = $c_alamat;
        $data["c_poskod"] = $c_poskod;
        $data["c_pekerjaan"] = $c_pekerjaan;
        $data["c_pendapatan"] = $c_pendapatan;
        $data["c_majikan"] = $c_majikan;
        $data["c_no_tel_pejabat"] = $c_no_tel_pejabat;
        $data["c_samb"] = $c_samb;
        $data["c_alamat_pejabat"] = $c_alamat_pejabat;

        $session = $this->session->userdata();
        if (empty($session["id_permohonan"]))
            $session["id_permohonan"] = 1;
        $data["id_permohonan"] = $session["id_permohonan"];

        $simpan = $this->slm->save($data);
        @redirect('screen_enam');
    }

}
