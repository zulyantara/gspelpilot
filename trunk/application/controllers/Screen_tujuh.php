<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Screen_tujuh extends MY_Controller
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
		*/
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
		
		$checkArr = array();
		// permohonan_butir_peribadi
		array_push($checkArr, array('permohonan_butir_peribadi'=>'1'));
		// permohonan_maklumat_am
		$query = $this->db->query("select count(*) as jml from permohonan_maklumat_am where id_permohonan=".$id_permohonan);
		$row = $query->row_array();
		array_push($checkArr, array('permohonan_maklumat_am'=>$row['jml']));
		// permohonan_kursus
		$query = $this->db->query("select count(*) as jml from permohonan_kursus where id_permohonan=".$id_permohonan);
		$row = $query->row_array();
		array_push($checkArr, array('permohonan_kursus'=>$row['jml']));
		// 	permohonan_penjaga
		$query = $this->db->query("select count(*) as jml from 	permohonan_penjaga where id_permohonan=".$id_permohonan);
		$row = $query->row_array();
		array_push($checkArr, array('permohonan_penjaga'=>$row['jml']));
		// 	permohonan_tempat_tinggal
		$query = $this->db->query("select count(*) as jml from 	permohonan_tempat_tinggal where id_permohonan=".$id_permohonan);
		$row = $query->row_array();
		array_push($checkArr, array('permohonan_tempat_tinggal'=>$row['jml']));	
		$output->data['checkArr'] = $checkArr;
		
        $this->load->view('header_gc', $output);
        $this->load->view('screen_tujuh/form', $output);
        $this->load->view('footer');		
	}

}
