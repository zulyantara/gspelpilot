<?php

# catatan Toosa

defined('BASEPATH') OR exit('No direct script access allowed');

class Gspel_kewangan extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_builder');
    }

    public function index() {
        $this->load->model('user_model', 'users');
        $this->mViewData['count'] = array(
            'users' => $this->users->count_all(),
        );
        $this->render('home');
    }

    public function ajax() {
        if (!empty($this->input->post())) {
            $task = $this->input->post('task');
            if ($task == "get_giatmara") {
                $negeri = $this->input->post('negeri') ? $this->input->post('negeri') : 0;

                $this->load->model('Ref_giatmara_model');

                $giatmara = $this->Ref_giatmara_model->get_by_negeri($negeri);

                $select = '<option value=""></option>';
                foreach ($giatmara as $list):
                    $select .= "<option value='" . $list->id . "'>" . $list->nama_giatmara . "</option>";
                endforeach;

                echo $select;
            } elseif ($task == "get_kew_potongan") {
                $id = $this->input->post('id') ? $this->input->post('id') : 0;
//                print_r($id); exit;

                $this->load->model('V_kew_potongan_model');
                $kewPotongan = $this->V_kew_potongan_model->get_by_id($id);

                if ($kewPotongan) {
                    $html = '$(".modal-body #nama").val("' . $kewPotongan->name . '");';
                    $html .= '$(".modal-body #kod").val("' . $kewPotongan->code . '");';
                    $html .= '$(".modal-body #dana").val("' . $kewPotongan->dana . '");';
                    $html .= '$(".modal-body #program").val("' . $kewPotongan->program . '");';
                    $html .= '$(".modal-body #peringkat").val("' . $kewPotongan->peringkat . '");';
                    $html .= '$(".modal-body #kekerapan").val("' . $kewPotongan->deduction_frequency . '");';
                    $html .= '$(".modal-body #jumlah").val("' . $kewPotongan->value_per_unit . '");';
                    $html .= '$(".modal-body #penerangan").val("' . $kewPotongan->description . '");';
                } else {
                    $html = '$(".modal-body #nama").val("");';
                    $html .= '$(".modal-body #kod").val("");';
                    $html .= '$(".modal-body #dana").val("");';
                    $html .= '$(".modal-body #program").val("");';
                    $html .= '$(".modal-body #peringkat").val("");';
                    $html .= '$(".modal-body #kekerapan").val("");';
                    $html .= '$(".modal-body #jumlah").val("");';
                    $html .= '$(".modal-body #penerangan").val("");';
                }
                echo $html;
            }
        }
    }

    public function perubahan_potongan_elaun() {
        $this->load->model('Ref_negeri_model');
        $this->load->model('Ref_giatmara_model');
        $this->load->model('Ref_kursus_model');
        $this->load->model('Ref_intake_model');

        $this->mViewData['refNegeri'] = $this->Ref_negeri_model->get_all();
        $this->mViewData['refKursus'] = $this->Ref_kursus_model->get_all();
        $this->mViewData['refIntake'] = $this->Ref_intake_model->get_all();

        $this->mViewData['isPost'] = 0;

//        print_r(urldecode($this->uri->segment(5)));exit;
        if ((!empty($this->input->post())) || (!empty(urldecode($this->uri->segment(5))))) {
            if (!empty($this->input->post())) {

                if ($_POST['action'] == 'papar') {
                    $this->mViewData['idNegeri'] = $this->input->post('negeri');
                    $this->mViewData['idGiatmara'] = $this->input->post('giatmara');
                    $this->mViewData['idKursus'] = $this->input->post('kursus');
                    $this->mViewData['idIntake'] = $this->input->post('intake');
                    $this->mViewData['nama'] = $this->input->post('nama');
                }
            } elseif (!empty(urldecode($this->uri->segment(5)))) {
                $this->mViewData['idNegeri'] = urldecode($this->uri->segment(5));
                $this->mViewData['idGiatmara'] = urldecode($this->uri->segment(6));
                $this->mViewData['idKursus'] = urldecode($this->uri->segment(7));
                $this->mViewData['idIntake'] = urldecode($this->uri->segment(8));
                $this->mViewData['nama'] = urldecode($this->uri->segment(9));
            }
            $this->mViewData['isPost'] = 1;

            $this->mViewData['namaNegeri'] = $this->Ref_negeri_model->get_by_id($this->mViewData['idNegeri'])->nama_negeri;
            $this->mViewData['namaGiatmara'] = $this->Ref_giatmara_model->get_by_id($this->mViewData['idGiatmara'])->nama_giatmara;
            $this->mViewData['namaKursus'] = $this->Ref_kursus_model->get_by_id($this->mViewData['idKursus'])->nama_kursus;
            $this->mViewData['namaIntake'] = $this->Ref_intake_model->get_by_id($this->mViewData['idIntake'])->nama_intake;

            $this->load->model('V_kursus_terdahulu_model');

            $this->mViewData['data'] = $this->V_kursus_terdahulu_model->get_all($this->mViewData['idGiatmara'], $this->mViewData['idKursus'], NULL, $this->mViewData['idIntake'], $this->mViewData['idNegeri'], $this->mViewData['nama']);
//            print_r($this->mViewData['idGiatmara'] . ', ' . $this->mViewData['idKursus'] . ', ' . $this->mViewData['idIntake'] . ', ' . $this->mViewData['idNegeri'] . ', ' . $this->mViewData['nama']);
//            exit;
        }

        $this->render('gspel_kewangan/lpp7a/perubahan_potongan_elaun');
    }

    public function penjanaan_lpp5a() {
        $this->load->model('Ref_negeri_model');
        $this->load->model('Ref_giatmara_model');
        $this->load->model('Ref_kursus_model');
        $this->load->model('Ref_intake_model');

        $this->mViewData['refNegeri'] = $this->Ref_negeri_model->get_all();
        $this->mViewData['refKursus'] = $this->Ref_kursus_model->get_all();
        $this->mViewData['refIntake'] = $this->Ref_intake_model->get_all();

        $this->mViewData['isPost'] = 0;

        $this->mViewData['idNegeri'] = NULL;
        $this->mViewData['idGiatmara'] = NULL;
        $this->mViewData['idKursus'] = NULL;
        $this->mViewData['idIntake'] = NULL;
        $this->mViewData['nama'] = NULL;

        if (!empty($this->input->post())) {
            $this->mViewData['isPost'] = 1;

            if ($_POST['action'] == 'papar') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara');
                $this->mViewData['idKursus'] = $this->input->post('kursus');
                $this->mViewData['idIntake'] = $this->input->post('intake');
                $this->mViewData['nama'] = $this->input->post('nama');
            } elseif ($_POST['action'] == 'jana') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri2');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara2');
                $this->mViewData['idKursus'] = $this->input->post('kursus2');
                $this->mViewData['idIntake'] = $this->input->post('intake2');
                $this->mViewData['nama'] = $this->input->post('nama2');

                if (isset($_POST['pilih'])) {
                    $this->load->model('Lpp_5a_model');
                    foreach ($_POST['pilih'] as $key => $value) {
                        $idUser = $this->ion_auth->user()->row()->id;
                        $data = array(
                            'status_jana' => 1,
                            'dijana_oleh' => $idUser,
                            'dijana_pada' => date('Y-m-d H:i:s'),
                        );

                        $this->Lpp_5a_model->update($key, $data);
                    }
                }
            }

            $this->mViewData['namaNegeri'] = $this->Ref_negeri_model->get_by_id($this->mViewData['idNegeri'])->nama_negeri;
            $this->mViewData['namaGiatmara'] = $this->Ref_giatmara_model->get_by_id($this->mViewData['idGiatmara'])->nama_giatmara;
            $this->mViewData['namaKursus'] = $this->Ref_kursus_model->get_by_id($this->mViewData['idKursus'])->nama_kursus;
            $this->mViewData['namaIntake'] = $this->Ref_intake_model->get_by_id($this->mViewData['idIntake'])->nama_intake;
        }

        $this->load->model('V_kewangan_lpp5a_screen3_model');

        $this->mViewData['data'] = $this->V_kewangan_lpp5a_screen3_model->get_not_jana($this->mViewData['idNegeri'], $this->mViewData['idGiatmara'], $this->mViewData['idKursus'], $this->mViewData['idIntake'], $this->mViewData['nama']);

        $this->render('gspel_kewangan/lpp5a/penjanaan_lpp5a');
    }

    public function penjanaan_lpp04() {
        $this->load->model('Ref_negeri_model');
        $this->load->model('Ref_giatmara_model');
        $this->load->model('Ref_kursus_model');
        $this->load->model('Ref_intake_model');

        $this->mViewData['refNegeri'] = $this->Ref_negeri_model->get_all();
        $this->mViewData['refKursus'] = $this->Ref_kursus_model->get_all();
        $this->mViewData['refIntake'] = $this->Ref_intake_model->get_all();

        $this->mViewData['isPost'] = 0;

        $this->mViewData['idNegeri'] = NULL;
        $this->mViewData['idGiatmara'] = NULL;
        $this->mViewData['idKursus'] = NULL;
        $this->mViewData['idIntake'] = NULL;
        $this->mViewData['nama'] = NULL;

        if (!empty($this->input->post())) {
            $this->mViewData['isPost'] = 1;

            if ($_POST['action'] == 'papar') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara');
                $this->mViewData['idKursus'] = $this->input->post('kursus');
                $this->mViewData['idIntake'] = $this->input->post('intake');
                $this->mViewData['nama'] = $this->input->post('nama');
            } elseif ($_POST['action'] == 'jana') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri2');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara2');
                $this->mViewData['idKursus'] = $this->input->post('kursus2');
                $this->mViewData['idIntake'] = $this->input->post('intake2');
                $this->mViewData['nama'] = $this->input->post('nama2');

                if (isset($_POST['pilih'])) {
                    $this->load->model('Lpp_04_model');
                    foreach ($_POST['pilih'] as $key => $value) {
                        $idUser = $this->ion_auth->user()->row()->id;
                        $data = array(
                            'status_jana' => 1,
                            'dijana_oleh' => $idUser,
                            'dijana_pada' => date('Y-m-d H:i:s'),
                        );

                        $this->Lpp_04_model->update($key, $data);
                    }
                }
            }

            $this->mViewData['namaNegeri'] = $this->Ref_negeri_model->get_by_id($this->mViewData['idNegeri'])->nama_negeri;
            $this->mViewData['namaGiatmara'] = $this->Ref_giatmara_model->get_by_id($this->mViewData['idGiatmara'])->nama_giatmara;
            $this->mViewData['namaKursus'] = $this->Ref_kursus_model->get_by_id($this->mViewData['idKursus'])->nama_kursus;
            $this->mViewData['namaIntake'] = $this->Ref_intake_model->get_by_id($this->mViewData['idIntake'])->nama_intake;
        }

        $this->load->model('V_kewangan_lpp04_model');

        $this->mViewData['data'] = $this->V_kewangan_lpp04_model->get_not_jana($this->mViewData['idNegeri'], $this->mViewData['idGiatmara'], $this->mViewData['idKursus'], $this->mViewData['idIntake'], $this->mViewData['nama']);

        $this->render('gspel_kewangan/lpp04/penjanaan_lpp04');
    }

    public function hpenjanaan_lpp04() {
        $this->load->model('Ref_negeri_model');
        $this->load->model('Ref_giatmara_model');
        $this->load->model('Ref_kursus_model');
        $this->load->model('Ref_intake_model');

        $this->mViewData['refNegeri'] = $this->Ref_negeri_model->get_all();
        $this->mViewData['refKursus'] = $this->Ref_kursus_model->get_all();
        $this->mViewData['refIntake'] = $this->Ref_intake_model->get_all();

        $this->mViewData['isPost'] = 0;

        if (!empty($this->input->post())) {
            $this->mViewData['isPost'] = 1;

            if ($_POST['action'] == 'papar') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara');
                $this->mViewData['idKursus'] = $this->input->post('kursus');
                $this->mViewData['idIntake'] = $this->input->post('intake');
                $this->mViewData['nama'] = $this->input->post('nama');
            } elseif ($_POST['action'] == 'jana') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri2');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara2');
                $this->mViewData['idKursus'] = $this->input->post('kursus2');
                $this->mViewData['idIntake'] = $this->input->post('intake2');
                $this->mViewData['nama'] = $this->input->post('nama2');

                if (isset($_POST['pilih'])) {
                    $this->load->model('Lpp_04_model');
                    foreach ($_POST['pilih'] as $key => $value) {
                        $idUser = $this->ion_auth->user()->row()->id;
                        $data = array(
                            'status_jana' => 1,
                            'dijana_oleh' => $idUser,
                            'dijana_pada' => date('Y-m-d H:i:s'),
                        );

                        $this->Lpp_04_model->update($key, $data);
                    }
                }
            }

            $this->mViewData['namaNegeri'] = $this->Ref_negeri_model->get_by_id($this->mViewData['idNegeri'])->nama_negeri;
            $this->mViewData['namaGiatmara'] = $this->Ref_giatmara_model->get_by_id($this->mViewData['idGiatmara'])->nama_giatmara;
            $this->mViewData['namaKursus'] = $this->Ref_kursus_model->get_by_id($this->mViewData['idKursus'])->nama_kursus;
            $this->mViewData['namaIntake'] = $this->Ref_intake_model->get_by_id($this->mViewData['idIntake'])->nama_intake;

            $this->load->model('V_kewangan_lpp04_model');

            $this->mViewData['data'] = $this->V_kewangan_lpp04_model->get_jana($this->mViewData['idNegeri'], $this->mViewData['idGiatmara'], $this->mViewData['idKursus'], $this->mViewData['idIntake'], $this->mViewData['nama']);
        }

        $this->render('gspel_kewangan/lpp04/hpenjanaan_lpp04');
    }

    public function hpenjanaan_lpp5a() {
        $this->load->model('Ref_negeri_model');
        $this->load->model('Ref_giatmara_model');
        $this->load->model('Ref_kursus_model');
        $this->load->model('Ref_intake_model');

        $this->mViewData['refNegeri'] = $this->Ref_negeri_model->get_all();
        $this->mViewData['refKursus'] = $this->Ref_kursus_model->get_all();
        $this->mViewData['refIntake'] = $this->Ref_intake_model->get_all();

        $this->mViewData['isPost'] = 0;

        if (!empty($this->input->post())) {
            $this->mViewData['isPost'] = 1;

            if ($_POST['action'] == 'papar') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara');
                $this->mViewData['idKursus'] = $this->input->post('kursus');
                $this->mViewData['idIntake'] = $this->input->post('intake');
                $this->mViewData['nama'] = $this->input->post('nama');
            } elseif ($_POST['action'] == 'jana') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri2');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara2');
                $this->mViewData['idKursus'] = $this->input->post('kursus2');
                $this->mViewData['idIntake'] = $this->input->post('intake2');
                $this->mViewData['nama'] = $this->input->post('nama2');

                if (isset($_POST['pilih'])) {
                    $this->load->model('Lpp_5a_model');
                    foreach ($_POST['pilih'] as $key => $value) {
                        $idUser = $this->ion_auth->user()->row()->id;
                        $data = array(
                            'status_jana' => 1,
                            'dijana_oleh' => $idUser,
                            'dijana_pada' => date('Y-m-d H:i:s'),
                        );

                        $this->Lpp_5a_model->update($key, $data);
                    }
                }
            }

            $this->mViewData['namaNegeri'] = $this->Ref_negeri_model->get_by_id($this->mViewData['idNegeri'])->nama_negeri;
            $this->mViewData['namaGiatmara'] = $this->Ref_giatmara_model->get_by_id($this->mViewData['idGiatmara'])->nama_giatmara;
            $this->mViewData['namaKursus'] = $this->Ref_kursus_model->get_by_id($this->mViewData['idKursus'])->nama_kursus;
            $this->mViewData['namaIntake'] = $this->Ref_intake_model->get_by_id($this->mViewData['idIntake'])->nama_intake;

            $this->load->model('V_kewangan_lpp5a_screen3_model');

            $this->mViewData['data'] = $this->V_kewangan_lpp5a_screen3_model->get_jana($this->mViewData['idNegeri'], $this->mViewData['idGiatmara'], $this->mViewData['idKursus'], $this->mViewData['idIntake'], $this->mViewData['nama']);
        }

        $this->render('gspel_kewangan/lpp5a/hpenjanaan_lpp5a');
    }

    public function penjanaan_lpp08() {
        $this->load->model('Ref_negeri_model');
        $this->load->model('Ref_giatmara_model');
        $this->load->model('Ref_kursus_model');
        $this->load->model('Ref_intake_model');

        $this->mViewData['refNegeri'] = $this->Ref_negeri_model->get_all();
        $this->mViewData['refKursus'] = $this->Ref_kursus_model->get_all();
        $this->mViewData['refIntake'] = $this->Ref_intake_model->get_all();

        $this->mViewData['isPost'] = 0;

        $this->mViewData['idNegeri'] = NULL;
        $this->mViewData['idGiatmara'] = NULL;
        $this->mViewData['idKursus'] = NULL;
        $this->mViewData['idIntake'] = NULL;
        $this->mViewData['nama'] = NULL;

        if (!empty($this->input->post())) {
            $this->mViewData['isPost'] = 1;

            if ($_POST['action'] == 'papar') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara');
                $this->mViewData['idKursus'] = $this->input->post('kursus');
                $this->mViewData['idIntake'] = $this->input->post('intake');
                $this->mViewData['nama'] = $this->input->post('nama');
            } elseif ($_POST['action'] == 'jana') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri2');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara2');
                $this->mViewData['idKursus'] = $this->input->post('kursus2');
                $this->mViewData['idIntake'] = $this->input->post('intake2');
                $this->mViewData['nama'] = $this->input->post('nama2');

                if (isset($_POST['pilih'])) {
                    $this->load->model('Lpp_08_model');
                    foreach ($_POST['pilih'] as $key => $value) {
                        $idUser = $this->ion_auth->user()->row()->id;
                        $data = array(
                            'status_jana' => 1,
                            'dijana_oleh' => $idUser,
                            'dijana_pada' => date('Y-m-d H:i:s'),
                        );

                        $this->Lpp_08_model->update($key, $data);
                    }
                }
            }

            $this->mViewData['namaNegeri'] = $this->Ref_negeri_model->get_by_id($this->mViewData['idNegeri'])->nama_negeri;
            $this->mViewData['namaGiatmara'] = $this->Ref_giatmara_model->get_by_id($this->mViewData['idGiatmara'])->nama_giatmara;
            $this->mViewData['namaKursus'] = $this->Ref_kursus_model->get_by_id($this->mViewData['idKursus'])->nama_kursus;
            $this->mViewData['namaIntake'] = $this->Ref_intake_model->get_by_id($this->mViewData['idIntake'])->nama_intake;
        }

        $this->load->model('V_kewangan_lpp08_screen3_model');

        $this->mViewData['data'] = $this->V_kewangan_lpp08_screen3_model->get_not_jana($this->mViewData['idNegeri'], $this->mViewData['idGiatmara'], $this->mViewData['idKursus'], $this->mViewData['idIntake'], $this->mViewData['nama']);

        $this->render('gspel_kewangan/lpp08/penjanaan_lpp08');
    }

    public function hpenjanaan_lpp08() {
        $this->load->model('Ref_negeri_model');
        $this->load->model('Ref_giatmara_model');
        $this->load->model('Ref_kursus_model');
        $this->load->model('Ref_intake_model');

        $this->mViewData['refNegeri'] = $this->Ref_negeri_model->get_all();
        $this->mViewData['refKursus'] = $this->Ref_kursus_model->get_all();
        $this->mViewData['refIntake'] = $this->Ref_intake_model->get_all();

        $this->mViewData['isPost'] = 0;

        if (!empty($this->input->post())) {
            $this->mViewData['isPost'] = 1;

            if ($_POST['action'] == 'papar') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara');
                $this->mViewData['idKursus'] = $this->input->post('kursus');
                $this->mViewData['idIntake'] = $this->input->post('intake');
                $this->mViewData['nama'] = $this->input->post('nama');
            } elseif ($_POST['action'] == 'jana') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri2');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara2');
                $this->mViewData['idKursus'] = $this->input->post('kursus2');
                $this->mViewData['idIntake'] = $this->input->post('intake2');
                $this->mViewData['nama'] = $this->input->post('nama2');

                if (isset($_POST['pilih'])) {
                    $this->load->model('Lpp_08_model');
                    foreach ($_POST['pilih'] as $key => $value) {
                        $idUser = $this->ion_auth->user()->row()->id;
                        $data = array(
                            'status_jana' => 1,
                            'dijana_oleh' => $idUser,
                            'dijana_pada' => date('Y-m-d H:i:s'),
                        );

                        $this->Lpp_08_model->update($key, $data);
                    }
                }
            }

            $this->mViewData['namaNegeri'] = $this->Ref_negeri_model->get_by_id($this->mViewData['idNegeri'])->nama_negeri;
            $this->mViewData['namaGiatmara'] = $this->Ref_giatmara_model->get_by_id($this->mViewData['idGiatmara'])->nama_giatmara;
            $this->mViewData['namaKursus'] = $this->Ref_kursus_model->get_by_id($this->mViewData['idKursus'])->nama_kursus;
            $this->mViewData['namaIntake'] = $this->Ref_intake_model->get_by_id($this->mViewData['idIntake'])->nama_intake;

            $this->load->model('V_kewangan_lpp08_screen3_model');

            $this->mViewData['data'] = $this->V_kewangan_lpp08_screen3_model->get_jana($this->mViewData['idNegeri'], $this->mViewData['idGiatmara'], $this->mViewData['idKursus'], $this->mViewData['idIntake'], $this->mViewData['nama']);
        }

        $this->render('gspel_kewangan/lpp08/hpenjanaan_lpp08');
    }

    public function penjanaan_lpp10() {
        $this->load->model('Ref_negeri_model');
        $this->load->model('Ref_giatmara_model');
        $this->load->model('Ref_kursus_model');
        $this->load->model('Ref_intake_model');

        $this->mViewData['refNegeri'] = $this->Ref_negeri_model->get_all();
        $this->mViewData['refKursus'] = $this->Ref_kursus_model->get_all();
        $this->mViewData['refIntake'] = $this->Ref_intake_model->get_all();

        $this->mViewData['isPost'] = 0;

        $this->mViewData['idNegeri'] = NULL;
        $this->mViewData['idGiatmara'] = NULL;
        $this->mViewData['idKursus'] = NULL;
        $this->mViewData['idIntake'] = NULL;
        $this->mViewData['nama'] = NULL;

        if (!empty($this->input->post())) {
            $this->mViewData['isPost'] = 1;

            if ($_POST['action'] == 'papar') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara');
                $this->mViewData['idKursus'] = $this->input->post('kursus');
                $this->mViewData['idIntake'] = $this->input->post('intake');
                $this->mViewData['nama'] = $this->input->post('nama');
            } elseif ($_POST['action'] == 'jana') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri2');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara2');
                $this->mViewData['idKursus'] = $this->input->post('kursus2');
                $this->mViewData['idIntake'] = $this->input->post('intake2');
                $this->mViewData['nama'] = $this->input->post('nama2');

                if (isset($_POST['pilih'])) {
                    $this->load->model('Lpp_10_model');
                    foreach ($_POST['pilih'] as $key => $value) {
                        $idUser = $this->ion_auth->user()->row()->id;
                        $data = array(
                            'status_jana' => 1,
                            'dijana_oleh' => $idUser,
                            'dijana_pada' => date('Y-m-d H:i:s'),
                        );

                        $this->Lpp_10_model->update($key, $data);
                    }
                }
            }

            $this->mViewData['namaNegeri'] = $this->Ref_negeri_model->get_by_id($this->mViewData['idNegeri'])->nama_negeri;
            $this->mViewData['namaGiatmara'] = $this->Ref_giatmara_model->get_by_id($this->mViewData['idGiatmara'])->nama_giatmara;
            $this->mViewData['namaKursus'] = $this->Ref_kursus_model->get_by_id($this->mViewData['idKursus'])->nama_kursus;
            $this->mViewData['namaIntake'] = $this->Ref_intake_model->get_by_id($this->mViewData['idIntake'])->nama_intake;
        }

        $this->load->model('V_kewangan_lpp10_screen3_model');

        $this->mViewData['data'] = $this->V_kewangan_lpp10_screen3_model->get_not_jana($this->mViewData['idNegeri'], $this->mViewData['idGiatmara'], $this->mViewData['idKursus'], $this->mViewData['idIntake'], $this->mViewData['nama']);

        $this->render('gspel_kewangan/lpp10/penjanaan_lpp10');
    }

    public function hpenjanaan_lpp10() {
        $this->load->model('Ref_negeri_model');
        $this->load->model('Ref_giatmara_model');
        $this->load->model('Ref_kursus_model');
        $this->load->model('Ref_intake_model');

        $this->mViewData['refNegeri'] = $this->Ref_negeri_model->get_all();
        $this->mViewData['refKursus'] = $this->Ref_kursus_model->get_all();
        $this->mViewData['refIntake'] = $this->Ref_intake_model->get_all();

        $this->mViewData['isPost'] = 0;

        if (!empty($this->input->post())) {
            $this->mViewData['isPost'] = 1;

            if ($_POST['action'] == 'papar') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara');
                $this->mViewData['idKursus'] = $this->input->post('kursus');
                $this->mViewData['idIntake'] = $this->input->post('intake');
                $this->mViewData['nama'] = $this->input->post('nama');
            } elseif ($_POST['action'] == 'jana') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri2');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara2');
                $this->mViewData['idKursus'] = $this->input->post('kursus2');
                $this->mViewData['idIntake'] = $this->input->post('intake2');
                $this->mViewData['nama'] = $this->input->post('nama2');

                if (isset($_POST['pilih'])) {
                    $this->load->model('Lpp_10_model');
                    foreach ($_POST['pilih'] as $key => $value) {
                        $idUser = $this->ion_auth->user()->row()->id;
                        $data = array(
                            'status_jana' => 1,
                            'dijana_oleh' => $idUser,
                            'dijana_pada' => date('Y-m-d H:i:s'),
                        );

                        $this->Lpp_10_model->update($key, $data);
                    }
                }
            }

            $this->mViewData['namaNegeri'] = $this->Ref_negeri_model->get_by_id($this->mViewData['idNegeri'])->nama_negeri;
            $this->mViewData['namaGiatmara'] = $this->Ref_giatmara_model->get_by_id($this->mViewData['idGiatmara'])->nama_giatmara;
            $this->mViewData['namaKursus'] = $this->Ref_kursus_model->get_by_id($this->mViewData['idKursus'])->nama_kursus;
            $this->mViewData['namaIntake'] = $this->Ref_intake_model->get_by_id($this->mViewData['idIntake'])->nama_intake;

            $this->load->model('V_kewangan_lpp10_screen3_model');

            $this->mViewData['data'] = $this->V_kewangan_lpp10_screen3_model->get_jana($this->mViewData['idNegeri'], $this->mViewData['idGiatmara'], $this->mViewData['idKursus'], $this->mViewData['idIntake'], $this->mViewData['nama']);
        }

        $this->render('gspel_kewangan/lpp10/hpenjanaan_lpp10');
    }

    public function penjanaan_lpp5b() {
        $this->load->model('Ref_negeri_model');
        $this->load->model('Ref_giatmara_model');
        $this->load->model('Ref_kursus_model');
        $this->load->model('Ref_intake_model');

        $this->mViewData['refNegeri'] = $this->Ref_negeri_model->get_all();
        $this->mViewData['refKursus'] = $this->Ref_kursus_model->get_all();
        $this->mViewData['refIntake'] = $this->Ref_intake_model->get_all();

        $this->mViewData['isPost'] = 0;

        $this->mViewData['idNegeri'] = NULL;
        $this->mViewData['idGiatmara'] = NULL;
        $this->mViewData['idKursus'] = NULL;
        $this->mViewData['idIntake'] = NULL;
        $this->mViewData['nama'] = NULL;

        if (!empty($this->input->post())) {
            $this->mViewData['isPost'] = 1;

            if ($_POST['action'] == 'papar') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara');
                $this->mViewData['idKursus'] = $this->input->post('kursus');
                $this->mViewData['idIntake'] = $this->input->post('intake');
                $this->mViewData['nama'] = $this->input->post('nama');
            } elseif ($_POST['action'] == 'jana') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri2');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara2');
                $this->mViewData['idKursus'] = $this->input->post('kursus2');
                $this->mViewData['idIntake'] = $this->input->post('intake2');
                $this->mViewData['nama'] = $this->input->post('nama2');

                if (isset($_POST['pilih'])) {
                    $this->load->model('Lpp_5b_model');
                    foreach ($_POST['pilih'] as $key => $value) {
                        $idUser = $this->ion_auth->user()->row()->id;
                        $data = array(
                            'status_jana' => 1,
                            'dijana_oleh' => $idUser,
                            'dijana_pada' => date('Y-m-d H:i:s'),
                        );

                        $this->Lpp_5b_model->update($key, $data);
                    }
                }
            }

            $this->mViewData['namaNegeri'] = $this->Ref_negeri_model->get_by_id($this->mViewData['idNegeri'])->nama_negeri;
            $this->mViewData['namaGiatmara'] = $this->Ref_giatmara_model->get_by_id($this->mViewData['idGiatmara'])->nama_giatmara;
            $this->mViewData['namaKursus'] = $this->Ref_kursus_model->get_by_id($this->mViewData['idKursus'])->nama_kursus;
            $this->mViewData['namaIntake'] = $this->Ref_intake_model->get_by_id($this->mViewData['idIntake'])->nama_intake;
        }

        $this->load->model('V_kewangan_lpp5b_screen3_model');

        $this->mViewData['data'] = $this->V_kewangan_lpp5b_screen3_model->get_not_jana($this->mViewData['idNegeri'], $this->mViewData['idGiatmara'], $this->mViewData['idKursus'], $this->mViewData['idIntake'], $this->mViewData['nama']);

        $this->render('gspel_kewangan/lpp5b/penjanaan_lpp5b');
    }

    public function hpenjanaan_lpp5b() {
        $this->load->model('Ref_negeri_model');
        $this->load->model('Ref_giatmara_model');
        $this->load->model('Ref_kursus_model');
        $this->load->model('Ref_intake_model');

        $this->mViewData['refNegeri'] = $this->Ref_negeri_model->get_all();
        $this->mViewData['refKursus'] = $this->Ref_kursus_model->get_all();
        $this->mViewData['refIntake'] = $this->Ref_intake_model->get_all();

        $this->mViewData['isPost'] = 0;

        if (!empty($this->input->post())) {
            $this->mViewData['isPost'] = 1;

            if ($_POST['action'] == 'papar') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara');
                $this->mViewData['idKursus'] = $this->input->post('kursus');
                $this->mViewData['idIntake'] = $this->input->post('intake');
                $this->mViewData['nama'] = $this->input->post('nama');
            } elseif ($_POST['action'] == 'jana') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri2');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara2');
                $this->mViewData['idKursus'] = $this->input->post('kursus2');
                $this->mViewData['idIntake'] = $this->input->post('intake2');
                $this->mViewData['nama'] = $this->input->post('nama2');

                if (isset($_POST['pilih'])) {
                    $this->load->model('Lpp_5b_model');
                    foreach ($_POST['pilih'] as $key => $value) {
                        $idUser = $this->ion_auth->user()->row()->id;
                        $data = array(
                            'status_jana' => 1,
                            'dijana_oleh' => $idUser,
                            'dijana_pada' => date('Y-m-d H:i:s'),
                        );

                        $this->Lpp_5b_model->update($key, $data);
                    }
                }
            }

            $this->mViewData['namaNegeri'] = $this->Ref_negeri_model->get_by_id($this->mViewData['idNegeri'])->nama_negeri;
            $this->mViewData['namaGiatmara'] = $this->Ref_giatmara_model->get_by_id($this->mViewData['idGiatmara'])->nama_giatmara;
            $this->mViewData['namaKursus'] = $this->Ref_kursus_model->get_by_id($this->mViewData['idKursus'])->nama_kursus;
            $this->mViewData['namaIntake'] = $this->Ref_intake_model->get_by_id($this->mViewData['idIntake'])->nama_intake;

            $this->load->model('V_kewangan_lpp5b_screen3_model');

            $this->mViewData['data'] = $this->V_kewangan_lpp5b_screen3_model->get_jana($this->mViewData['idNegeri'], $this->mViewData['idGiatmara'], $this->mViewData['idKursus'], $this->mViewData['idIntake'], $this->mViewData['nama']);
        }

        $this->render('gspel_kewangan/lpp5b/hpenjanaan_lpp5b');
    }

    public function penjanaan_lpp5d() {
        $this->load->model('Ref_negeri_model');
        $this->load->model('Ref_giatmara_model');
        $this->load->model('Ref_kursus_model');
        $this->load->model('Ref_intake_model');

        $this->mViewData['refNegeri'] = $this->Ref_negeri_model->get_all();
        $this->mViewData['refKursus'] = $this->Ref_kursus_model->get_all();
        $this->mViewData['refIntake'] = $this->Ref_intake_model->get_all();

        $this->mViewData['isPost'] = 0;

        $this->mViewData['idNegeri'] = NULL;
        $this->mViewData['idGiatmara'] = NULL;
        $this->mViewData['idKursus'] = NULL;
        $this->mViewData['idIntake'] = NULL;
        $this->mViewData['nama'] = NULL;

        if (!empty($this->input->post())) {
            $this->mViewData['isPost'] = 1;

            if ($_POST['action'] == 'papar') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara');
                $this->mViewData['idKursus'] = $this->input->post('kursus');
                $this->mViewData['idIntake'] = $this->input->post('intake');
                $this->mViewData['nama'] = $this->input->post('nama');
            } elseif ($_POST['action'] == 'jana') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri2');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara2');
                $this->mViewData['idKursus'] = $this->input->post('kursus2');
                $this->mViewData['idIntake'] = $this->input->post('intake2');
                $this->mViewData['nama'] = $this->input->post('nama2');

                if (isset($_POST['pilih'])) {
                    $this->load->model('Lpp_5d_model');
                    foreach ($_POST['pilih'] as $key => $value) {
                        $idUser = $this->ion_auth->user()->row()->id;
                        $data = array(
                            'status_jana' => 1,
                            'dijana_oleh' => $idUser,
                            'dijana_pada' => date('Y-m-d H:i:s'),
                        );

                        $this->Lpp_5d_model->update($key, $data);
                    }
                }
            }

            $this->mViewData['namaNegeri'] = $this->Ref_negeri_model->get_by_id($this->mViewData['idNegeri'])->nama_negeri;
            $this->mViewData['namaGiatmara'] = $this->Ref_giatmara_model->get_by_id($this->mViewData['idGiatmara'])->nama_giatmara;
            $this->mViewData['namaKursus'] = $this->Ref_kursus_model->get_by_id($this->mViewData['idKursus'])->nama_kursus;
            $this->mViewData['namaIntake'] = $this->Ref_intake_model->get_by_id($this->mViewData['idIntake'])->nama_intake;
        }

        $this->load->model('V_kewangan_lpp5d_screen3_model');

        $this->mViewData['data'] = $this->V_kewangan_lpp5d_screen3_model->get_not_jana($this->mViewData['idNegeri'], $this->mViewData['idGiatmara'], $this->mViewData['idKursus'], $this->mViewData['idIntake'], $this->mViewData['nama']);

        $this->render('gspel_kewangan/lpp5d/penjanaan_lpp5d');
    }

    public function hpenjanaan_lpp5d() {
        $this->load->model('Ref_negeri_model');
        $this->load->model('Ref_giatmara_model');
        $this->load->model('Ref_kursus_model');
        $this->load->model('Ref_intake_model');

        $this->mViewData['refNegeri'] = $this->Ref_negeri_model->get_all();
        $this->mViewData['refKursus'] = $this->Ref_kursus_model->get_all();
        $this->mViewData['refIntake'] = $this->Ref_intake_model->get_all();

        $this->mViewData['isPost'] = 0;

        if (!empty($this->input->post())) {
            $this->mViewData['isPost'] = 1;

            if ($_POST['action'] == 'papar') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara');
                $this->mViewData['idKursus'] = $this->input->post('kursus');
                $this->mViewData['idIntake'] = $this->input->post('intake');
                $this->mViewData['nama'] = $this->input->post('nama');
            } elseif ($_POST['action'] == 'jana') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri2');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara2');
                $this->mViewData['idKursus'] = $this->input->post('kursus2');
                $this->mViewData['idIntake'] = $this->input->post('intake2');
                $this->mViewData['nama'] = $this->input->post('nama2');

                if (isset($_POST['pilih'])) {
                    $this->load->model('Lpp_5d_model');
                    foreach ($_POST['pilih'] as $key => $value) {
                        $idUser = $this->ion_auth->user()->row()->id;
                        $data = array(
                            'status_jana' => 1,
                            'dijana_oleh' => $idUser,
                            'dijana_pada' => date('Y-m-d H:i:s'),
                        );

                        $this->Lpp_5d_model->update($key, $data);
                    }
                }
            }

            $this->mViewData['namaNegeri'] = $this->Ref_negeri_model->get_by_id($this->mViewData['idNegeri'])->nama_negeri;
            $this->mViewData['namaGiatmara'] = $this->Ref_giatmara_model->get_by_id($this->mViewData['idGiatmara'])->nama_giatmara;
            $this->mViewData['namaKursus'] = $this->Ref_kursus_model->get_by_id($this->mViewData['idKursus'])->nama_kursus;
            $this->mViewData['namaIntake'] = $this->Ref_intake_model->get_by_id($this->mViewData['idIntake'])->nama_intake;

            $this->load->model('V_kewangan_lpp5d_screen3_model');

            $this->mViewData['data'] = $this->V_kewangan_lpp5d_screen3_model->get_jana($this->mViewData['idNegeri'], $this->mViewData['idGiatmara'], $this->mViewData['idKursus'], $this->mViewData['idIntake'], $this->mViewData['nama']);
        }

        $this->render('gspel_kewangan/lpp5d/hpenjanaan_lpp5d');
    }

    public function penjanaan_lpp7a() {
        $this->load->model('Ref_negeri_model');
        $this->load->model('Ref_giatmara_model');
        $this->load->model('Ref_kursus_model');
        $this->load->model('Ref_intake_model');

        $this->mViewData['refNegeri'] = $this->Ref_negeri_model->get_all();
        $this->mViewData['refKursus'] = $this->Ref_kursus_model->get_all();
        $this->mViewData['refIntake'] = $this->Ref_intake_model->get_all();

        $this->mViewData['isPost'] = 0;

        $this->mViewData['idNegeri'] = NULL;
        $this->mViewData['idGiatmara'] = NULL;
        $this->mViewData['idKursus'] = NULL;
        $this->mViewData['idIntake'] = NULL;
        $this->mViewData['nama'] = NULL;

        if (!empty($this->input->post())) {
            $this->mViewData['isPost'] = 1;

            if ($_POST['action'] == 'papar') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara');
                $this->mViewData['idKursus'] = $this->input->post('kursus');
                $this->mViewData['idIntake'] = $this->input->post('intake');
                $this->mViewData['nama'] = $this->input->post('nama');
            } elseif ($_POST['action'] == 'jana') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri2');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara2');
                $this->mViewData['idKursus'] = $this->input->post('kursus2');
                $this->mViewData['idIntake'] = $this->input->post('intake2');
                $this->mViewData['nama'] = $this->input->post('nama2');

                if (isset($_POST['pilih'])) {
                    $this->load->model('Lpp_7a_model');
                    foreach ($_POST['pilih'] as $key => $value) {
                        $idUser = $this->ion_auth->user()->row()->id;
                        $data = array(
                            'status_jana' => 1,
                            'dijana_oleh' => $idUser,
                            'dijana_pada' => date('Y-m-d H:i:s'),
                        );

                        $this->Lpp_7a_model->update($key, $data);
                    }
                }
            }

            $this->mViewData['namaNegeri'] = $this->Ref_negeri_model->get_by_id($this->mViewData['idNegeri'])->nama_negeri;
            $this->mViewData['namaGiatmara'] = $this->Ref_giatmara_model->get_by_id($this->mViewData['idGiatmara'])->nama_giatmara;
            $this->mViewData['namaKursus'] = $this->Ref_kursus_model->get_by_id($this->mViewData['idKursus'])->nama_kursus;
            $this->mViewData['namaIntake'] = $this->Ref_intake_model->get_by_id($this->mViewData['idIntake'])->nama_intake;
        }

        $this->load->model('V_kewangan_lpp7a_screen3_model');

        $this->mViewData['data'] = $this->V_kewangan_lpp7a_screen3_model->get_not_jana($this->mViewData['idNegeri'], $this->mViewData['idGiatmara'], $this->mViewData['idKursus'], $this->mViewData['idIntake'], $this->mViewData['nama']);

        $this->render('gspel_kewangan/lpp7a/penjanaan_lpp7a');
    }

    public function hpenjanaan_lpp7a() {
        $this->load->model('Ref_negeri_model');
        $this->load->model('Ref_giatmara_model');
        $this->load->model('Ref_kursus_model');
        $this->load->model('Ref_intake_model');

        $this->mViewData['refNegeri'] = $this->Ref_negeri_model->get_all();
        $this->mViewData['refKursus'] = $this->Ref_kursus_model->get_all();
        $this->mViewData['refIntake'] = $this->Ref_intake_model->get_all();

        $this->mViewData['isPost'] = 0;

        if (!empty($this->input->post())) {
            $this->mViewData['isPost'] = 1;

            if ($_POST['action'] == 'papar') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara');
                $this->mViewData['idKursus'] = $this->input->post('kursus');
                $this->mViewData['idIntake'] = $this->input->post('intake');
                $this->mViewData['nama'] = $this->input->post('nama');
            } elseif ($_POST['action'] == 'jana') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri2');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara2');
                $this->mViewData['idKursus'] = $this->input->post('kursus2');
                $this->mViewData['idIntake'] = $this->input->post('intake2');
                $this->mViewData['nama'] = $this->input->post('nama2');

                if (isset($_POST['pilih'])) {
                    $this->load->model('Lpp_7a_model');
                    foreach ($_POST['pilih'] as $key => $value) {
                        $idUser = $this->ion_auth->user()->row()->id;
                        $data = array(
                            'status_jana' => 1,
                            'dijana_oleh' => $idUser,
                            'dijana_pada' => date('Y-m-d H:i:s'),
                        );

                        $this->Lpp_7a_model->update($key, $data);
                    }
                }
            }

            $this->mViewData['namaNegeri'] = $this->Ref_negeri_model->get_by_id($this->mViewData['idNegeri'])->nama_negeri;
            $this->mViewData['namaGiatmara'] = $this->Ref_giatmara_model->get_by_id($this->mViewData['idGiatmara'])->nama_giatmara;
            $this->mViewData['namaKursus'] = $this->Ref_kursus_model->get_by_id($this->mViewData['idKursus'])->nama_kursus;
            $this->mViewData['namaIntake'] = $this->Ref_intake_model->get_by_id($this->mViewData['idIntake'])->nama_intake;

            $this->load->model('V_kewangan_lpp7a_screen3_model');

            $this->mViewData['data'] = $this->V_kewangan_lpp7a_screen3_model->get_jana($this->mViewData['idNegeri'], $this->mViewData['idGiatmara'], $this->mViewData['idKursus'], $this->mViewData['idIntake'], $this->mViewData['nama']);
        }

        $this->render('gspel_kewangan/lpp7a/hpenjanaan_lpp7a');
    }

    public function penjanaan_lpp06() {
        $this->load->model('Ref_negeri_model');
        $this->load->model('Ref_giatmara_model');
        $this->load->model('Ref_kursus_model');
        $this->load->model('Ref_intake_model');

        $this->mViewData['refNegeri'] = $this->Ref_negeri_model->get_all();
        $this->mViewData['refKursus'] = $this->Ref_kursus_model->get_all();
        $this->mViewData['refIntake'] = $this->Ref_intake_model->get_all();

        $this->mViewData['isPost'] = 0;

        $this->mViewData['idNegeri'] = NULL;
        $this->mViewData['idGiatmara'] = NULL;
        $this->mViewData['idKursus'] = NULL;
        $this->mViewData['idIntake'] = NULL;

        if (!empty($this->input->post())) {
            $this->mViewData['isPost'] = 1;

            if ($_POST['action'] == 'papar') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara');
                $this->mViewData['idKursus'] = $this->input->post('kursus');
                $this->mViewData['idIntake'] = $this->input->post('intake');
            } elseif ($_POST['action'] == 'jana') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri2');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara2');
                $this->mViewData['idKursus'] = $this->input->post('kursus2');
                $this->mViewData['idIntake'] = $this->input->post('intake2');

                if (isset($_POST['pilih'])) {
                    $this->load->model('Lpp_06_model');
                    foreach ($_POST['pilih'] as $key => $value) {
                        $idUser = $this->ion_auth->user()->row()->id;
                        $data = array(
                            'status_jana' => 1,
                            'dijana_oleh' => $idUser,
                            'dijana_pada' => date('Y-m-d H:i:s'),
                        );

                        $this->Lpp_06_model->update($key, $data);
                    }
                }
            }

            $this->mViewData['namaNegeri'] = $this->Ref_negeri_model->get_by_id($this->mViewData['idNegeri'])->nama_negeri;
            $this->mViewData['namaGiatmara'] = $this->Ref_giatmara_model->get_by_id($this->mViewData['idGiatmara'])->nama_giatmara;
            $this->mViewData['namaKursus'] = $this->Ref_kursus_model->get_by_id($this->mViewData['idKursus'])->nama_kursus;
            $this->mViewData['namaIntake'] = $this->Ref_intake_model->get_by_id($this->mViewData['idIntake'])->nama_intake;
        }

        $this->load->model('V_kewangan_lpp06_screen3_model');

        $this->mViewData['data'] = $this->V_kewangan_lpp06_screen3_model->get_not_jana($this->mViewData['idNegeri'], $this->mViewData['idGiatmara'], $this->mViewData['idKursus'], $this->mViewData['idIntake']);

        $this->render('gspel_kewangan/lpp06/penjanaan_lpp06');
    }

    public function hpenjanaan_lpp06() {
        $this->load->model('Ref_negeri_model');
        $this->load->model('Ref_giatmara_model');
        $this->load->model('Ref_kursus_model');
        $this->load->model('Ref_intake_model');

        $this->mViewData['refNegeri'] = $this->Ref_negeri_model->get_all();
        $this->mViewData['refKursus'] = $this->Ref_kursus_model->get_all();
        $this->mViewData['refIntake'] = $this->Ref_intake_model->get_all();

        $this->mViewData['isPost'] = 0;

        if (!empty($this->input->post())) {
            $this->mViewData['isPost'] = 1;

            if ($_POST['action'] == 'papar') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara');
                $this->mViewData['idKursus'] = $this->input->post('kursus');
                $this->mViewData['idIntake'] = $this->input->post('intake');
            } elseif ($_POST['action'] == 'jana') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri2');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara2');
                $this->mViewData['idKursus'] = $this->input->post('kursus2');
                $this->mViewData['idIntake'] = $this->input->post('intake2');

                if (isset($_POST['pilih'])) {
                    $this->load->model('Lpp_06_model');
                    foreach ($_POST['pilih'] as $key => $value) {
                        $idUser = $this->ion_auth->user()->row()->id;
                        $data = array(
                            'status_jana' => 1,
                            'dijana_oleh' => $idUser,
                            'dijana_pada' => date('Y-m-d H:i:s'),
                        );

                        $this->Lpp_06_model->update($key, $data);
                    }
                }
            }

            $this->mViewData['namaNegeri'] = $this->Ref_negeri_model->get_by_id($this->mViewData['idNegeri'])->nama_negeri;
            $this->mViewData['namaGiatmara'] = $this->Ref_giatmara_model->get_by_id($this->mViewData['idGiatmara'])->nama_giatmara;
            $this->mViewData['namaKursus'] = $this->Ref_kursus_model->get_by_id($this->mViewData['idKursus'])->nama_kursus;
            $this->mViewData['namaIntake'] = $this->Ref_intake_model->get_by_id($this->mViewData['idIntake'])->nama_intake;

            $this->load->model('V_kewangan_lpp06_screen3_model');

            $this->mViewData['data'] = $this->V_kewangan_lpp06_screen3_model->get_jana($this->mViewData['idNegeri'], $this->mViewData['idGiatmara'], $this->mViewData['idKursus'], $this->mViewData['idIntake']);
        }

        $this->render('gspel_kewangan/lpp06/hpenjanaan_lpp06');
    }

    public function batal_pelatih() {
        $this->load->model('Ref_kursus_model');
        $this->load->model('Ref_intake_model');
        $this->load->model('Ref_status_pelatih_model');
        $this->load->model('V_kursus_terdahulu_model');
        $this->load->model('V_poskod_model');
        $this->load->model('Ref_kewarganegaraan_model');
        $this->load->model('Ref_taraf_perkahwinan_model');
        $this->load->model('Kew_kod_kombinasi_model');
        $this->load->model('Kew_bank_model');
        $this->load->model('Ref_giatmara_model');
        $idUser = $this->ion_auth->user()->row()->id;

        $this->mViewData['refKursus'] = $this->Ref_kursus_model->get_by_user($idUser);
        $this->mViewData['refIntake'] = $this->Ref_intake_model->get_by_user($idUser);
        $this->mViewData['refPoskod'] = $this->V_poskod_model->get_all();
        $this->mViewData['refKewarganegaraan'] = $this->Ref_kewarganegaraan_model->get_all();
        $this->mViewData['refTarafPerkahwinan'] = $this->Ref_taraf_perkahwinan_model->get_all();
        $this->mViewData['kewKodKombinasi'] = $this->Kew_kod_kombinasi_model->get_all();
        $this->mViewData['kewBank'] = $this->Kew_bank_model->get_all();
        $this->mViewData['refStatusPelatih'] = $this->Ref_status_pelatih_model->get_all();

        $this->mViewData['isPost'] = 0;

        $user = $this->ion_auth->user()->row();
        $user_staff = $user->id_staff;
        $this->load->model('Staff_info_pangku_tugas_model');
        $row_staff = $this->Staff_info_pangku_tugas_model->get_by_staff($user_staff);
        $giatmara_id = $row_staff->id_giatmara;

        $row_giatmara = $this->Ref_giatmara_model->get_by_id($giatmara_id);
        $this->mViewData['nama_giatmara'] = $row_giatmara->nama_giatmara;

        if (!empty($this->input->post())) {
            $this->mViewData['isPost'] = 1;

            $this->mViewData['idKursus'] = $this->input->post('kursus');
            $this->mViewData['katPelatih'] = $this->input->post('jeniskursus');
            $this->mViewData['idIntake'] = $this->input->post('intake');

            $this->mViewData['namaKursus'] = $this->Ref_kursus_model->get_by_id($this->mViewData['idKursus'])->nama_kursus;
            $this->mViewData['namaIntake'] = $this->Ref_intake_model->get_by_id($this->mViewData['idIntake'])->nama_intake;

            $this->mViewData['dataPelatih'] = $this->V_kursus_terdahulu_model->get_all($giatmara_id, $this->mViewData['idKursus'], $this->mViewData['katPelatih'], $this->mViewData['idIntake'], NULL, NULL, "(id_pelatih not in (select a.id_pelatih from lpp_08 a where a.status_jana = 1))");
        }

        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'hantar') {
                $data = array(
                    'id_pelatih' => $this->input->post('id_pelatih'),
                    'status_baru' => $this->input->post('status_baru'),
                    'tarikh_kuatkuasa' => date("Y-m-d", strtotime($this->input->post('tarikh_kuatkuasa'))),
                    'dihantar_oleh' => $idUser,
                    'dihantar_pada' => date('Y-m-d H:i:s'),
                );
                $this->load->model('Lpp_08_model');
                $this->Lpp_08_model->insert($data);
            }
        }

        $this->render('gspel_kewangan/lpp08/batal_pelatih');
    }

    public function tukar_giatmara_kursus() {
        $this->load->model('Ref_kursus_model');
        $this->load->model('Ref_intake_model');
        $this->load->model('Ref_status_pelatih_model');
        $this->load->model('V_kursus_terdahulu_model');
        $this->load->model('V_poskod_model');
        $this->load->model('Ref_kewarganegaraan_model');
        $this->load->model('Ref_taraf_perkahwinan_model');
        $this->load->model('Kew_kod_kombinasi_model');
        $this->load->model('Kew_bank_model');
        $this->load->model('Ref_negeri_model');
        $idUser = $this->ion_auth->user()->row()->id;

        $this->mViewData['refKursus'] = $this->Ref_kursus_model->get_by_user($idUser);
        $this->mViewData['refIntake'] = $this->Ref_intake_model->get_by_user($idUser);
        $this->mViewData['refPoskod'] = $this->V_poskod_model->get_all();
        $this->mViewData['refKewarganegaraan'] = $this->Ref_kewarganegaraan_model->get_all();
        $this->mViewData['refTarafPerkahwinan'] = $this->Ref_taraf_perkahwinan_model->get_all();
        $this->mViewData['kewKodKombinasi'] = $this->Kew_kod_kombinasi_model->get_all();
        $this->mViewData['kewBank'] = $this->Kew_bank_model->get_all();
        $this->mViewData['refStatusPelatih'] = $this->Ref_status_pelatih_model->get_all();
        $this->mViewData['refNegeri'] = $this->Ref_negeri_model->get_all();

        $user = $this->ion_auth->user()->row();
        $user_staff = $user->id_staff;
        $this->load->model('Staff_info_pangku_tugas_model');
        $this->load->model('Ref_giatmara_model');
        $row_staff = $this->Staff_info_pangku_tugas_model->get_by_staff($user_staff);
        $giatmara_id = $row_staff->id_giatmara;

        $row_giatmara = $this->Ref_giatmara_model->get_by_id($giatmara_id);
        $this->mViewData['nama_giatmara'] = $row_giatmara->nama_giatmara;

        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'hantar') {
                $data = array(
                    'id_pelatih' => $this->input->post('id_pelatih'),
                    'kursus_baru' => $this->input->post('kursus_baru'),
                    'kursus_asal' => $this->input->post('kursus'),
                    'dihantar_oleh' => $idUser,
                    'dihantar_pada' => date('Y-m-d H:i:s'),
                );
                $this->load->model('Lpp_10_model');

                if (empty($this->input->post('idlpp10')))
                    $this->Lpp_10_model->insert($data);
                else {
                    $this->Lpp_10_model->update($this->input->post('idlpp10'), $data);
                }
            } elseif ($_POST['action'] == 'pusat') {
                $data = array(
                    'id_pelatih' => $this->input->post('id_pelatih'),
                    'giatmara_baru' => $this->input->post('giatmara_baru'),
                    'giatmara_asal' => $this->input->post('giatmara_asal'),
                    'dihantar_oleh' => $idUser,
                    'dihantar_pada' => date('Y-m-d H:i:s'),
                );
                $this->load->model('Lpp_10_model');

                if (empty($this->input->post('idlpp10')))
                    $this->Lpp_10_model->insert($data);
                else {
                    $this->Lpp_10_model->update($this->input->post('idlpp10'), $data);
                }
            }
        }

        $this->mViewData['isPost'] = 0;

        if (!empty($this->input->post())) {
            $this->mViewData['isPost'] = 1;

            $this->mViewData['idKursus'] = $this->input->post('kursus');
            $this->mViewData['katPelatih'] = $this->input->post('jeniskursus');
            $this->mViewData['idIntake'] = $this->input->post('intake');

            $this->mViewData['namaKursus'] = $this->Ref_kursus_model->get_by_id($this->mViewData['idKursus'])->nama_kursus;
            $this->mViewData['namaIntake'] = $this->Ref_intake_model->get_by_id($this->mViewData['idIntake'])->nama_intake;

            $this->mViewData['dataPelatih'] = $this->V_kursus_terdahulu_model->get_all($giatmara_id, $this->mViewData['idKursus'], $this->mViewData['katPelatih'], $this->mViewData['idIntake']);
        }

        $this->render('gspel_kewangan/lpp10/tukar_giatmara_kursus');
    }

    public function pengurusan_pelatih() {
        $this->load->model('Ref_kursus_model');
        $this->load->model('Ref_intake_model');
        $this->load->model('V_kursus_terdahulu_model');
        $this->load->model('V_poskod_model');
        $this->load->model('Ref_kewarganegaraan_model');
        $this->load->model('Ref_taraf_perkahwinan_model');
        $this->load->model('Kew_kod_kombinasi_model');
        $this->load->model('Kew_bank_model');
        $this->load->model('Ref_giatmara_model');
        $idUser = $this->ion_auth->user()->row()->id;

        $this->mViewData['refKursus'] = $this->Ref_kursus_model->get_by_user($idUser);
        $this->mViewData['refIntake'] = $this->Ref_intake_model->get_by_user($idUser);
        $this->mViewData['refPoskod'] = $this->V_poskod_model->get_all();
        $this->mViewData['refKewarganegaraan'] = $this->Ref_kewarganegaraan_model->get_all();
        $this->mViewData['refTarafPerkahwinan'] = $this->Ref_taraf_perkahwinan_model->get_all();
        $this->mViewData['kewKodKombinasi'] = $this->Kew_kod_kombinasi_model->get_all();
        $this->mViewData['kewBank'] = $this->Kew_bank_model->get_all();

        $this->mViewData['isPost'] = 0;

        $user = $this->ion_auth->user()->row();
        $user_staff = $user->id_staff;
        $this->load->model('Staff_info_pangku_tugas_model');
        $row_staff = $this->Staff_info_pangku_tugas_model->get_by_staff($user_staff);
        $giatmara_id = $row_staff->id_giatmara;

        $row_giatmara = $this->Ref_giatmara_model->get_by_id($giatmara_id);
        $this->mViewData['nama_giatmara'] = $row_giatmara->nama_giatmara;

        if (!empty($this->input->post())) {
            $this->mViewData['isPost'] = 1;

            $this->mViewData['idKursus'] = $this->input->post('kursus');
            $this->mViewData['katPelatih'] = $this->input->post('jeniskursus');
            $this->mViewData['idIntake'] = $this->input->post('intake');

            $this->mViewData['namaKursus'] = $this->Ref_kursus_model->get_by_id($this->mViewData['idKursus'])->nama_kursus;
            $this->mViewData['namaIntake'] = $this->Ref_intake_model->get_by_id($this->mViewData['idIntake'])->nama_intake;


            $this->mViewData['dataPelatih'] = $this->V_kursus_terdahulu_model->get_all($giatmara_id, $this->mViewData['idKursus'], $this->mViewData['katPelatih'], $this->mViewData['idIntake'], NULL, NULL);
        }

        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'hantar') {
                $data = array(
                    'id_pelatih' => $this->input->post('id_pelatih'),
                    'nama_asal' => $this->input->post('nama_asal'),
                    'nama_baru' => $this->input->post('nama_baru'),
                    'dihantar_oleh' => $idUser,
                    'dihantar_pada' => date('Y-m-d H:i:s'),
                );
                $this->load->model('Lpp_5a_model');
                $this->Lpp_5a_model->insert($data);
            } elseif ($_POST['action'] == 'mykad') {
                $data = array(
                    'id_pelatih' => $this->input->post('id_pelatih'),
                    'mykad_asal' => $this->input->post('mykad_asal'),
                    'mykad_baru' => $this->input->post('mykad_baru'),
                    'tarikh_lahir_asal' => $this->input->post('tarikh_lahir_asal'),
                    'tarikh_lahir_baru' => date("Y-m-d", strtotime($this->input->post('tarikh_lahir_baru'))),
                    'umur_asal' => $this->input->post('umur_asal'),
                    'umur_baru' => $this->input->post('umur_baru'),
                    'jantina_asal' => $this->input->post('jantina_asal'),
                    'jantina_baru' => $this->input->post('jantina_baru'),
                    'dihantar_oleh' => $idUser,
                    'dihantar_pada' => date('Y-m-d H:i:s'),
                );
                $this->load->model('Lpp_5b_model');
                $this->Lpp_5b_model->insert($data);
            } elseif ($_POST['action'] == 'lain') {
                $data = array(
                    'id_pelatih' => $this->input->post('id_pelatih'),
                    'alamat_asal' => $this->input->post('alamat_asal'),
                    'alamat_baru' => $this->input->post('alamat_baru'),
                    'poskod_asal' => $this->input->post('poskod_asal'),
                    'poskod_baru' => $this->input->post('poskod_baru'),
                    'kewarganegaraan_asal' => $this->input->post('kewarganegaraan_asal'),
                    'kewarganegaraan_baru' => $this->input->post('kewarganegaraan_baru'),
                    'taraf_perkahwinan_asal' => $this->input->post('taraf_perkahwinan_asal'),
                    'taraf_perkahwinan_baru' => $this->input->post('taraf_perkahwinan_baru'),
                    'no_hp_asal' => $this->input->post('no_hp_asal'),
                    'no_hp_baru' => $this->input->post('no_hp_baru'),
                    'dihantar_oleh' => $idUser,
                    'dihantar_pada' => date('Y-m-d H:i:s'),
                );
                $this->load->model('Lpp_5d_model');
                $this->Lpp_5d_model->insert($data);

                $data = array(
                    'id_kew_kod_kombinasi' => $this->input->post('id_kew_kod_kombinasi'),
                );
                $this->load->model('Pelatih_model');
                $this->Pelatih_model->update($this->input->post('id_pelatih'), $data);
            } elseif ($_POST['action'] == 'bank') {
                $data = array(
                    'id_pelatih' => $this->input->post('id_pelatih'),
//                    'cara_bayaran_asal' => $this->input->post('cara_bayaran_asal'),
//                    'cara_bayaran_baru' => $this->input->post('cara_bayaran_baru'),
                    'nama_bank_asal' => $this->input->post('nama_bank_asal'),
                    'nama_bank_baru' => $this->input->post('nama_bank_baru'),
                    'no_akaun_asal' => $this->input->post('no_akaun_asal'),
                    'no_akaun_baru' => $this->input->post('no_akaun_baru'),
                    'dihantar_oleh' => $idUser,
                    'dihantar_pada' => date('Y-m-d H:i:s'),
                );
                $this->load->model('Lpp_06_model');
                $this->Lpp_06_model->insert($data);
            }
        }

        $this->render('gspel_kewangan/lpp5a/pengurusan_pelatih');
    }

    public function tambah_potongan_pelatih() {
        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'hantar') {
                $idUser = $this->ion_auth->user()->row()->id;
                $idPelatih = $this->input->post('id_pelatih');
                $idNegeri = $this->input->post('id_negeri');
                $idGiatmara = $this->input->post('id_giatmara');
                $idKursus = $this->input->post('id_kursus');
                $idIntake = $this->input->post('id_intake');
                $namaPelatih = $this->input->post('nama_pelatih');

                $data = array(
                    'id_pelatih' => $idPelatih,
                    'id_kew_potongan' => $this->input->post('id_kew_potongan'),
                    'tarikh_mula' => date("Y-m-d", strtotime($this->input->post('tarikh_mula'))),
                    'tarikh_tamat' => date("Y-m-d", strtotime($this->input->post('tarikh_tamat'))),
                    'dihantar_oleh' => $idUser,
                    'dihantar_pada' => date('Y-m-d H:i:s'),
                );
                $this->load->model('Lpp_7a_model');
                $this->Lpp_7a_model->insert($data);

                $this->mViewData['idPelatih'] = $this->input->post('id_pelatih');

                redirect(site_url("admin/gspel_kewangan/potongan_pelatih/$idPelatih/$idNegeri/$idGiatmara/$idKursus/$idIntake/$namaPelatih/"));
            }
        }
    }

    public function potongan_pelatih() {
        $this->mViewData['idPelatih'] = $this->uri->segment(4);
        $this->mViewData['idNegeri'] = urldecode($this->uri->segment(5));
        $this->mViewData['idGiatmara'] = urldecode($this->uri->segment(6));
        $this->mViewData['idKursus'] = urldecode($this->uri->segment(7));
        $this->mViewData['idIntake'] = urldecode($this->uri->segment(8));
        $this->mViewData['namaPelatih'] = urldecode($this->uri->segment(9));

        $this->load->model('V_kursus_terdahulu_model');
        $this->load->model('V_elaun_pelatih_model');
        $this->load->model('V_pelatih_potongan_model');
        $this->load->model('V_lpp7a_model');
        $this->load->model('V_kew_potongan_model');

        $this->mViewData['dataPelatih'] = $this->V_kursus_terdahulu_model->get_by_id($this->mViewData['idPelatih']);
        $this->mViewData['dataElaun'] = $this->V_elaun_pelatih_model->get_by_id($this->mViewData['idPelatih']);
        $this->mViewData['dataPotongan'] = $this->V_pelatih_potongan_model->get_by_id_pelatih($this->mViewData['idPelatih']);
        $this->mViewData['dataLpp7a'] = $this->V_lpp7a_model->get_by_id_pelatih($this->mViewData['idPelatih']);
        $this->mViewData['dataKewPotongan'] = $this->V_kew_potongan_model->get_all();

//        print_r($this->mViewData['dataKewPotongan']);
//        exit;

        $this->render('gspel_kewangan/lpp7a/potongan_pelatih');
    }

    public function penukaran_nama_pelatih() {
        $this->mViewData['idPelatih'] = $this->uri->segment(4);
        $this->mViewData['idKursus'] = $this->uri->segment(5);
        $this->mViewData['katPelatih'] = urldecode($this->uri->segment(6));
        $this->mViewData['idIntake'] = $this->uri->segment(7);
        $this->mViewData['namaAsal'] = urldecode($this->uri->segment(8));

        $this->render('gspel_kewangan/lpp5a/penukaran_nama_pelatih');
    }

    public function test() {
        $this->mPageTitle = "Test";
        $this->render('gspel_pelatih/test');
    }

    function detailprofil($id)
    {
        if ($id != "")
        {
            $this->load->model("V_kewangan_lpp04_model", "kewangan_lpp04");

            $where["id_pelatih"] = $id;
            $res_detail_profile = $this->kewangan_lpp04->get_detail_profile("row",$where);
            $this->mViewData["res_detail_profile"] = $res_detail_profile;

            $where_pp["id_pelatih"] = $res_detail_profile->id_pelatih;
            $res_pelatih_potongan = $this->kewangan_lpp04->get_pelatih_potongan($where_pp);
            $this->mViewData["res_pelatih_potongan"] = $res_pelatih_potongan;

            $this->mPageTitle = "Penjanaan LPP04";
            $this->render('gspel_kewangan/lpp04/detailprofil');
        }
        else
        {
            redirect("admin/Gspel_kewangan/penjanaan_lpp04");
        }
    }

    public function penjanaan_lpp09() {
        $this->load->model('Ref_negeri_model');
        $this->load->model('Ref_giatmara_model');
        $this->load->model('Ref_kursus_model');
        $this->load->model('Ref_intake_model');

        $this->mViewData['refNegeri'] = $this->Ref_negeri_model->get_all();
        $this->mViewData['refKursus'] = $this->Ref_kursus_model->get_all();
        $this->mViewData['refIntake'] = $this->Ref_intake_model->get_all();

        $this->mViewData['isPost'] = 0;

        $this->mViewData['idNegeri'] = NULL;
        $this->mViewData['idGiatmara'] = NULL;
        $this->mViewData['idKursus'] = NULL;
        $this->mViewData['idIntake'] = NULL;
        $this->mViewData['nama'] = NULL;

        if (!empty($this->input->post())) {
            $this->mViewData['isPost'] = 1;

            if ($_POST['action'] == 'papar') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara');
                $this->mViewData['idKursus'] = $this->input->post('kursus');
                $this->mViewData['idIntake'] = $this->input->post('intake');
                $this->mViewData['nama'] = $this->input->post('nama');
            } elseif ($_POST['action'] == 'jana') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri2');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara2');
                $this->mViewData['idKursus'] = $this->input->post('kursus2');
                $this->mViewData['idIntake'] = $this->input->post('intake2');
                $this->mViewData['nama'] = $this->input->post('nama2');

                if (isset($_POST['pilih'])) {
                    $this->load->model('Lpp_04_model');
                    // echo "<pre>";var_dump($this->input->post());echo "</pre>";exit;
                    foreach ($_POST['pilih'] as $key => $value) {
                        $idUser = $this->ion_auth->user()->row()->id;
                        $data = array(
                            'status_jana' => 1,
                            'dijana_oleh' => $idUser,
                            'dijana_pada' => date('Y-m-d H:i:s'),
                        );
                        $this->db->where('id', $key);
                        // echo $this->db->set($data)->get_compiled_update("lpp_09");
                        $this->db->update('lpp_09', $data);

                        // $this->Lpp_04_model->update($key, $data);
                    }
                }
            }

            $this->mViewData['namaNegeri'] = $this->Ref_negeri_model->get_by_id($this->mViewData['idNegeri'])->nama_negeri;
            $this->mViewData['namaGiatmara'] = $this->Ref_giatmara_model->get_by_id($this->mViewData['idGiatmara'])->nama_giatmara;
            $this->mViewData['namaKursus'] = $this->Ref_kursus_model->get_by_id($this->mViewData['idKursus'])->nama_kursus;
            $this->mViewData['namaIntake'] = $this->Ref_intake_model->get_by_id($this->mViewData['idIntake'])->nama_intake;
        }

        $this->load->model('V_kewangan_lpp04_model');

        $this->mViewData['data'] = $this->V_kewangan_lpp04_model->get_not_jana_lpp09($this->mViewData['idNegeri'], $this->mViewData['idGiatmara'], $this->mViewData['idKursus'], $this->mViewData['idIntake'], $this->mViewData['nama']);

        $this->render('gspel_kewangan/lpp09/penjanaan_lpp09');
    }

    public function hpenjanaan_lpp09() {
        $this->load->model('Ref_negeri_model');
        $this->load->model('Ref_giatmara_model');
        $this->load->model('Ref_kursus_model');
        $this->load->model('Ref_intake_model');

        $this->mViewData['refNegeri'] = $this->Ref_negeri_model->get_all();
        $this->mViewData['refKursus'] = $this->Ref_kursus_model->get_all();
        $this->mViewData['refIntake'] = $this->Ref_intake_model->get_all();

        $this->mViewData['isPost'] = 0;

        if (!empty($this->input->post())) {
            $this->mViewData['isPost'] = 1;

            if ($_POST['action'] == 'papar') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara');
                $this->mViewData['idKursus'] = $this->input->post('kursus');
                $this->mViewData['idIntake'] = $this->input->post('intake');
                $this->mViewData['nama'] = $this->input->post('nama');
            } elseif ($_POST['action'] == 'jana') {
                $this->mViewData['idNegeri'] = $this->input->post('negeri2');
                $this->mViewData['idGiatmara'] = $this->input->post('giatmara2');
                $this->mViewData['idKursus'] = $this->input->post('kursus2');
                $this->mViewData['idIntake'] = $this->input->post('intake2');
                $this->mViewData['nama'] = $this->input->post('nama2');

                if (isset($_POST['pilih'])) {
                    $this->load->model('Lpp_04_model');
                    foreach ($_POST['pilih'] as $key => $value) {
                        $idUser = $this->ion_auth->user()->row()->id;
                        $data = array(
                            'status_jana' => 1,
                            'dijana_oleh' => $idUser,
                            'dijana_pada' => date('Y-m-d H:i:s'),
                        );
                        $this->db->update('lpp_09', $data);
                        // $this->Lpp_04_model->update($key, $data);
                    }
                }
            }

            $this->mViewData['namaNegeri'] = $this->Ref_negeri_model->get_by_id($this->mViewData['idNegeri'])->nama_negeri;
            $this->mViewData['namaGiatmara'] = $this->Ref_giatmara_model->get_by_id($this->mViewData['idGiatmara'])->nama_giatmara;
            $this->mViewData['namaKursus'] = $this->Ref_kursus_model->get_by_id($this->mViewData['idKursus'])->nama_kursus;
            $this->mViewData['namaIntake'] = $this->Ref_intake_model->get_by_id($this->mViewData['idIntake'])->nama_intake;

            $this->load->model('V_kewangan_lpp04_model');

            $this->mViewData['data'] = $this->V_kewangan_lpp04_model->get_jana_lpp09($this->mViewData['idNegeri'], $this->mViewData['idGiatmara'], $this->mViewData['idKursus'], $this->mViewData['idIntake'], $this->mViewData['nama']);
        }

        $this->render('gspel_kewangan/lpp09/hpenjanaan_lpp09');
    }
}
