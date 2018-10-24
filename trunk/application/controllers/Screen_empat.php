<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Screen_empat extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
								$this->load->library('grocery_CRUD');
        $this->load->model('screen_empat_model', "mmodel");
								$this->load->library('session');
    }

    function index()
    {
        $data["ref_kluster"] = $this->mmodel->get_data("ref_kluster");
        $data["ref_kursus"] = $this->mmodel->get_data("ref_kursus");
								$data["ref_negeri"] = $this->mmodel->get_data("ref_negeri");
								$data["ref_giatmara"] = $this->mmodel->get_data("ref_giatmara");

        // $this->load->view('header');
        $this->load->view('screen_empat/form', $data);
        // $this->load->view('footer');
    }

    function simpan()
    {
        $btn = $this->input->post('btn_simpan');

        $mengikut = $this->input->post('mengikut');
        $kluster = $this->input->post('kluster');
								$kursus = $this->input->post('kursus');
								$negeri = $this->input->post('negeri');
								$giatmara = $this->input->post('giatmara');

								$data["kursus1"] = $kursus[0];
								$data["kursus2"] = $kursus[1];
        $data["kursus3"] = $kursus[2];

								$session = $this->session->userdata();
								if(empty($session["id_permohonan"])) $session["id_permohonan"] = 1;
								$data["id_permohonan"] = $session["id_permohonan"];


        if ($btn === "simpan_seterusnya")
        {
            $simpan = $this->mmodel->save($data);
												@redirect('screen_lima');

        }

				}

				function ajax_kursus()
    {
        $id_kluster = $this->input->post('kluster');
								$x = $this->input->post('x');
        $row = $this->mmodel->get_kursus($id_kluster);

								echo '<select class="form-control" name="kursus[]" id="kursus'.$x.'">';
								echo '<option value="">Sila Pilih</option>';
								foreach($row as $data){
												echo '<option value="'.$data->id.'">'.$data->nama_kursus.'</option>';
								}
								echo '</select>';
								exit;
    }

    function ajax_giatmara()
    {
        $id_negeri = $this->input->post('negeri');
								$x = $this->input->post('x');
        $row = $this->mmodel->get_giatmara($id_negeri);

								echo '<select class="form-control" name="giatmara[]" id="giatmara'.$x.'">';
								echo '<option value="">Sila Pilih</option>';
								foreach($row as $data){
												echo '<option value="'.$data->id.'">'.$data->nama_giatmara.'</option>';
								}
								echo '</select>';
								exit;
    }
}
