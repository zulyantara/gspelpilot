<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Screen_sembilan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
								$this->load->library('grocery_CRUD');
        $this->load->model('screen_sembilan_model', "mmodel");
								$this->load->library('session');

    }

    function index()
    {
        $data["ref_kluster"] = $this->mmodel->get_data("ref_kluster");
        $data["ref_kursus"] = $this->mmodel->get_data("ref_kursus");
								$data["ref_negeri"] = $this->mmodel->get_data("ref_negeri");
								$data["ref_giatmara"] = $this->mmodel->get_data("ref_giatmara");


        // $this->load->view('header');
        $this->load->view('screen_sembilan/form', $data);
        // $this->load->view('footer');
    }

    function simpan()
    {
        $btn = $this->input->post('btn_simpan');

        $nama_penuh = $this->input->post('nama_penuh');
        $no_mykad = $this->input->post('no_mykad');

        $data_pbp["nama_penuh"] = $nama_penuh;
        $data_pbp["no_mykad"] = $no_mykad;

        if ($btn === "simpan_seterusnya")
        {
            //$simpan = $this->mmodel->save($data);
												@redirect('screen_lima');

        }
    }

}
