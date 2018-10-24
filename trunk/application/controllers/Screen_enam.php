<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Screen_enam extends MY_Controller
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

    	# check first if data exist
		$crud->unset_back_to_list();
		$crud->unset_delete();
		$crud->unset_list();

		$crud->set_subject('&nbsp;');
		$crud->set_table('permohonan_tempat_tinggal');
		$crud->columns('id','tempat_tinggal','pengangkutan');

		$crud->required_fields('tempat_tinggal','pengangkutan');

		$id_permohonan = !is_null($this->session->userdata("id_permohonan")) ? $this->session->userdata("id_permohonan"):1;
		$crud->field_type('id_permohonan', 'hidden', $id_permohonan);

		$crud->callback_field('tempat_tinggal',array($this,'callback_tempat_tinggal'));
		$crud->callback_field('pengangkutan',array($this,'callback_pengangkutan'));

		$state = $crud->getState();
		$state_info = $crud->getStateInfo();
		#echo "State = ".$state."<br/>";
		#echo "<pre>";print_r($state_info);echo "</pre>";

		if ($state == 'add') {
			# check if data with $id_permohonan exists
			$query = $this->db->query("select id from permohonan_tempat_tinggal where id_permohonan=".$id_permohonan);
    		$row = $query->row_array();

			# if exists, redirect
			if (count($row)) {
				redirect(strtolower(__CLASS__).'/'.strtolower(__FUNCTION__).'/edit/'.$row['id']);
			}

			$crud->callback_insert(array($this,'callback_custom_insert'));
		} else if($state == 'insert') {
			$crud->callback_after_insert(array($this,'callback_custom_after_insert'));
		} else if($state == 'edit') {
			$crud->callback_update(array($this,'callback_custom_update'));
		} else if($state == 'update') {
			$crud->callback_after_update(array($this,'callback_custom_after_update'));
		}

		try{
			$output = $crud->render();
		} catch(Exception $e) {
			if($e->getCode() == 14) //The 14 is the code of the "You don't have permissions" error on grocery CRUD.
			{
				redirect(strtolower(__CLASS__).'/'.strtolower(__FUNCTION__).'/add');
			}
			else
			{
				show_error($e->getMessage());
			}
		}

		$this->_example_output($output, $state);
    }

	function callback_tempat_tinggal($value, $primary_key)
	{
		$data = '
            <div class="row">
                <div class="col-6">
					<input type="radio" name="tempat_tinggal" value="1" '.(($value=='1')?'checked':'').'/> Atas Urusan Sendiri
                </div>
                <div class="col-6">
					<input type="radio" name="tempat_tinggal" value="2" '.(($value=='2')?'checked':'').'/> Perlukan Tempat Tinggal
                </div>
            </div>
		';
		return $data;
		*/
	}

	function callback_pengangkutan($value, $primary_key)
	{
		$data = '
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <input type="radio" name="pengangkutan" value="0" '.(($value=='0')?'checked':'').'/> Ada Kenderaan Sendiri
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <input type="radio" name="pengangkutan" value="1" '.(($value=='1')?'checked':'').'/> Tiada Kenderaan
                    </div>
                </div>
            </div>
		';
		return $data;
	}

	function callback_custom_insert($post_array)
	{
		return $this->db->replace('permohonan_tempat_tinggal', $post_array);
	}

	function callback_custom_after_insert($post_array,$primary_key)
	{
		#$insert_id = $this->db->insert_id();
		$this->crud->set_lang_string('insert_success_message',
			'Your data has been successfully stored into the database.<br/>Please wait while you are redirecting to the update page.
			<script>
			window.location = "'.site_url(strtolower(__CLASS__).'/index/edit/'.$primary_key).'";
			</script>
			<div style="display:none">');

		return true;
	}

	function callback_custom_update($post_array, $primary_key)
	{
		return $this->db->update('permohonan_tempat_tinggal',$post_array,array('id' => $primary_key));
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

	function _example_output($output = null, $state)
	{
		$this->load->helper('url');
		$output->data['state'] = $state;

        $this->load->view('header_gc', $output);
        $this->load->view('screen_enam/form', $output);
        $this->load->view('footer');
	}

}
