<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Beranda extends CI_Controller
{

    public function __construct()
	{
		parent::__construct();
		// $this->load->model('Visitor_model');
		date_default_timezone_set('Asia/Jakarta');
		// $this->load->model('Setting_model');
	}

    public function index()
    {
		
		if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
		$user_data = $this->session->userdata('user_hak_akses');
		$user_id = $this->session->userdata('id');

	

		if ($user_data == 'admin' ) {
			$data_companies_detail =  $this->db->query("SELECT *from companies ")->result();
			$total_companies =  $this->db->query("SELECT *from companies ")->num_rows();
			$total_camera =  $this->db->query("SELECT *from camera ")->num_rows();
			$total_users =  $this->db->query("SELECT *from users ")->num_rows();
		}else{

			$data_companies =  $this->db->query("SELECT *from user_company where id = $user_id  ")->result();
			$id_companies = $data_companies[0]->company_id;
			$data_companies_detail = $this->db->query("SELECT *from companies where id = $id_companies  ")->result();

			$total_companies =  $this->db->query("SELECT *from user_company where id = $user_id  ")->num_rows();
		
			$total_camera =  $this->db->query("SELECT *from stream_camera_list where company_id = $id_companies  ")->num_rows();
			$total_users = 1;

		}
		
		$data = array(
			'total_companies' => $total_companies,
			'total_camera' => $total_camera,
			'total_users' => $total_users,
			'data_companies' => $data_companies_detail

		);
		
	
		$this->load->view('home',$data);
		// //data kontak
	
    }

  
}


