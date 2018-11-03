<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
	public $data;
	public function __construct()
	{
		parent::__construct();

        // set as array
        $this->data = array();

		// load library
        $this->load->library('session');

        // load helper
        $this->load->helper('url');

		// load custom library
        $this->load->library('form_validation');
		$this->load->library('Pesan');
		$this->load->library('Template');

		// load js
        $this->template->add_js('https://www.gstatic.com/charts/loader.js', TRUE);
        $this->template->add_js('https://code.jquery.com/jquery-3.3.1.min.js');
        $this->template->add_js('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', TRUE);
        $this->template->add_js('https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', TRUE);
        $this->template->add_js('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js', TRUE);
        $this->template->add_js('https://unpkg.com/shards-ui@latest/dist/js/shards.min.js', TRUE);
        $this->template->add_js('https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js', TRUE);
        $this->template->add_js(base_url('assets/scripts/extras.1.2.0.min.js'), TRUE);
        $this->template->add_js(base_url('assets/scripts/shards-dashboards.1.2.0.min.js'), TRUE);
        $this->template->add_js('https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js', TRUE);
        $this->template->add_js('https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js', TRUE);
        $this->template->add_js('https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js', TRUE);
        $this->template->add_js(base_url('assets/vendor/select2/js/select2.min.js'));
        $this->template->add_js(base_url('assets/scripts/app/app-file-manager.1.2.0.min.js'), TRUE);
        $this->template->add_js(base_url('assets/scripts/app/app-analytics-overview.1.2.0.min.js'), TRUE);

		// get session data profile
		$session_id = $this->session->userdata('user_id');
	}

 	public function mod_akses($privileges = 'user')
	{
		// code..
	}

	public function mod_menu($privileges = 'user')
	{
		// code ..
	}

	public function get_session_data($name)
	{
		return $this->session->userdata($name);
	}

	public function save_session_data($name, $value)
	{
		return $this->session->set_userdata($name, $value);
	}

	public function get_session_url()
	{
		return $this->session->flashdata('url');
	}

	public function save_session_url($value = '/')
	{
		$text_save = explode('/', $value);
        $text_save_length = count($text_save);
        $hasil = $text_save[$text_save_length - 1];

		if ($hasil == 'save') {
			$value = str_replace('save','', $value);
		}

		return $this->session->set_flashdata('url', $value);
	}


}
?>
