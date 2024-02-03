<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->model('log_model');
	
        $this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta');
	}
	
	
	public function index()
	{	

		$this->load->view('landing_page/view_landing_page');
	}

	public function kontak()
	{
		$this->load->view('kontak/kontak.php');
	}



}


