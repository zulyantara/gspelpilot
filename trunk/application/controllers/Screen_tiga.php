<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Screen_tiga extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
								$this->load->library('grocery_CRUD');
        $this->load->model('screen_tiga_model', "mmodel");
								$this->load->library('session');

    }

    function index()
    {
        $data["res_kewarganegaraan"] = $this->mmodel->get_data("ref_kewarganegaraan");
        $data["res_bangsa"] = $this->mmodel->get_data("ref_bangsa");


        // $this->load->view('header');
        $this->load->view('screen_tiga/form', $data);
        // $this->load->view('footer');
    }

    function simpan()
    {
        $btn = $this->input->post('btn_simpan');

        $sumber = $this->input->post('sumber');
        $text_lain= $this->input->post('text_lain');

								foreach($sumber as $key => $value){
												$data[$key] = $value;
								}

								$session = $this->session->userdata();

								if(empty($session["id_permohonan"])) $session["id_permohonan"] = 1;
								$data["id_permohonan"] = $session["id_permohonan"];
								if(empty($text_lain)) $text_lain = "";
								$data["text_lain"] = $text_lain;

        if ($btn === "simpan_seterusnya")
        {
            $simpan = $this->mmodel->save($data);
												@redirect('screen_empat');

        }
    }

}
