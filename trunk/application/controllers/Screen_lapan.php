<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Screen_lapan extends MY_Controller
{
	private $crud = null;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
		$this->load->library('grocery_CRUD');
    }

    public function index()
    {
					/*
		$crud = new grocery_CRUD();
		$this->crud = $crud;

		$crud->unset_back_to_list();
		$crud->unset_add();
		$crud->unset_delete();
		$crud->unset_list();

		$crud->set_subject('&nbsp;');
		$crud->set_table('permohonan_butir_peribadi');
		$crud->columns('id','pengakuan','pengesahan');

		$crud->required_fields('pengakuan','pengesahan');

		$crud->unset_fields('nama_penuh','no_mykad', 'tarikh_lahir', 'kewarganegaraan', 'umur', 'no_telefon',
			'no_hp', 'alamat', 'poskod', 'emel', 'bangsa', 'etnik', 'agama', 'taraf_perkahwinan', 'kategori_kelulusan',
			'kelulusan', 'matlamat', 'kategori_pemohon', 'no_rujukan_permohonan');

		$id_permohonan = !is_null($this->session->userdata("id_permohonan")) ? $this->session->userdata("id_permohonan"):1;
		$crud->field_type('id', 'hidden', $id_permohonan);
		$crud->field_type('tarikh_hantar', 'hidden', date("Y-m-d"));

		$crud->callback_field('pengesahan',array($this,'callback_pengesahan'));
		$crud->callback_field('pengakuan',array($this,'callback_pengakuan'));

		$state = $crud->getState();
		$state_info = $crud->getStateInfo();

		if ($state == 'edit') {
			$crud->callback_update(array($this,'callback_custom_update'));
		} else if($state == 'update') {
			$crud->callback_after_update(array($this,'callback_custom_after_update'));
		}

		try{
			$output = $crud->render();
		} catch(Exception $e) {
			if($e->getCode() == 14) //The 14 is the code of the "You don't have permissions" error on grocery CRUD.
			{
				redirect(strtolower(__CLASS__).'/'.strtolower(__FUNCTION__).'/edit/'.$id_permohonan);
			}
			else
			{
				show_error($e->getMessage());
			}
		}

		$this->_example_output($output, $crud->getState(), $id_permohonan);
    }

	function callback_pengesahan($value, $primary_key)
	{
		$data = '
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <input id="myCheckBox" type="checkbox" name="pengesahan" value="1" '.(($value=='1')?'checked':'').'/> Saya mengesahkan bahawa semua
                        butiran di dalam ini adalah benar. Jika didapati permohonan ini tidak lengkap atau tidak memenuhi mana-mana keperluan
                        yang dinyatakan, maka permohonan ini akan ditolak dan tidak akan diproses.
                    </div>
                </div>
            </div>
		';
		return $data;
	}

	function callback_pengakuan($value, $primary_key)
	{
		$data = '
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <input id="myCheckBox" type="checkbox" name="pengakuan" value="1" '.(($value=='1')?'checked':'').'/> Akta Kerahasiaan Data
                    </div>
                </div>
            </div>
		';
		return $data;
		*/
	}

	function callback_custom_update($post_array, $primary_key)
	{
		return $this->db->update('permohonan_butir_peribadi',$post_array,array('id' => $primary_key));
	}

	function callback_custom_after_update($post_array,$primary_key)
	{
		$this->crud->set_lang_string('update_success_message',
			'Your data has been successfully stored into the database.<br/>Please wait while you are redirecting to the update page.
			<script>
			window.location = "'.site_url(strtolower(__CLASS__).'/index/edit/'.$primary_key).'";
			</script>
			<div style="display:none">');

		return true;
	}

	function _example_output($output = null, $state, $id_permohonan)
	{
		$this->load->helper('url');
		$output->data['state'] = $state;

		// permohonan_butir_peribadi
		$query = $this->db->query("select no_rujukan_permohonan from permohonan_butir_peribadi where id=".$id_permohonan);
		$row = $query->row_array();
		$output->data['no_rujukan_permohonan'] = $row['no_rujukan_permohonan'];
		$output->data['id_permohonan'] = $id_permohonan;

        $this->load->view('header_gc', $output);
        $this->load->view('screen_lapan/form', $output);
        $this->load->view('footer');
	}

	function generate_pdf($id_permohonan, $stream = true, $template = null)
	{
		$this->load->library('Pdfdom');
		$this->load->model('pelatih_model', "pm");
		$dompdf = new Pdfdom();

		$data["butir_peribadi"] = $this->pm->get_permohonan("a.id=".$id_permohonan);
		$data['butir_peribadi2'] = $this->db->query("select * from permohonan_butir_peribadi where id=?", array($id_permohonan))->row_array();
		$data['penjaga2']=$this->db->query("select * from permohonan_penjaga where id_permohonan=?", array($id_permohonan))->row_array();

		$this->load->view("templates/pdf/cetak_permohonan", $data);//echo "<pre>";print_r($data);exit;
		$html = $this->output->get_output();
		$name = "GSPel_".$data["butir_peribadi"][0]["no_mykad"].".pdf";

		$dompdf->load_html($html);
		$dompdf->set_paper('A4');
		$dompdf->render();
		$dompdf->add_info('Author', 'Author Name');
		$dompdf->add_info('Title', $name);
		$dompdf->stream($name, array("Attachment" => 0));

		// clear buffer supaya pdf dapat digenerate dengan sempurna
		exit(0);

	}
}
