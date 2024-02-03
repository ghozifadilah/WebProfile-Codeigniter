<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Companies extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Companies_model');
        $this->load->model('Camera_model');
        $this->load->library('form_validation');
    }

    public function hak_akses(Type $var = null)
    {
        $role_user_id = $this->session->userdata('role_id');
        $data_roles= $this->db->query("SELECT * FROM role_pages_view where name ='Perusahaan' and role_id =$role_user_id ")->result();
        if ($data_roles == NULL || $data_roles == '') {
            redirect(site_url(''));
        }
        
    }



    public function index()
    {
        $this->hak_akses();

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'companies/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'companies/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'companies/index.html';
            $config['first_url'] = base_url() . 'companies/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Companies_model->total_rows($q);
        $companies = $this->Companies_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'companies_data' => $companies,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('companies/companies_list', $data);
    }

    public function read($id) 
    {
        $this->hak_akses();
        $row = $this->Companies_model->get_by_id($id);
        $id_data = $row->id;
        @$id_camera= $this->db->query("SELECT * FROM stream_camera_list WHERE company_id = $id_data order by id desc ")->result();


        if ($row) {
            $data = array(
			'id' => $row->id,
			'name' => $row->name,
			'adresss' => $row->adresss,
			'lat' => $row->lat,
			'lng' => $row->lng,
			'data_camera' => @$id_camera,
	    );
        
            $this->load->view('companies/companies_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('companies'));
        }
    }

    public function streamer_company()
    {
        $this->hak_akses();
    //    get streamer by id
    $id =  $this->input->get('id_company');
    $data_traffic = $this->db->query("SELECT * FROM stremers WHERE company_id = $id ")->result();
    
    echo json_encode($data_traffic);

    }

    public function save_camera()
    {
        $this->hak_akses();

        $id_company =  $this->input->post('id_company');
  
        $data = array(
			'streamer_id' =>  $this->input->post('streamer_select'),
			'name' =>$this->input->post('nama_kamera'),
			'url' => $this->input->post('url_kamera'),
	    );

            $this->Camera_model->insert($data);

            $data = array(
                'status' => "OK",
            );
            echo json_encode($data);


    }

    public function create() 
    {
        $this->hak_akses();
        $data = array(
            'button' => 'Create',
            'action' => site_url('companies/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'adresss' => set_value('adresss'),
	    'lat' => set_value('lat'),
	    'lng' => set_value('lng'),
	);
        $this->load->view('companies/companies_form', $data);
    }
    
    public function create_action() 
    {
        $this->hak_akses();
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
			'name' => $this->input->post('name',TRUE),
			'adresss' => $this->input->post('adresss',TRUE),
			'lat' => $this->input->post('lat',TRUE),
			'lng' => $this->input->post('lng',TRUE),
	    );

            $this->Companies_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('companies'));
        }
    }
    
    public function update($id) 
    {
        $this->hak_akses();
        $row = $this->Companies_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('companies/update_action'),
			'id' => set_value('id', $row->id),
			'name' => set_value('name', $row->name),
			'adresss' => set_value('adresss', $row->adresss),
			'lat' => set_value('lat', $row->lat),
			'lng' => set_value('lng', $row->lng),
	    );
            $this->load->view('companies/companies_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('companies'));
        }
    }
    
    public function update_action() 
    {
        $this->hak_akses();
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
			'name' => $this->input->post('name',TRUE),
			'adresss' => $this->input->post('adresss',TRUE),
			'lat' => $this->input->post('lat',TRUE),
			'lng' => $this->input->post('lng',TRUE),
	    );

            $this->Companies_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('companies'));
        }
    }
    
    public function delete($id) 
    {
        $this->hak_akses();
        $row = $this->Companies_model->get_by_id($id);

        if ($row) {
            $this->Companies_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('companies'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('companies'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('adresss', 'adresss', 'trim|required');
	$this->form_validation->set_rules('lat', 'lat', 'trim|required');
	$this->form_validation->set_rules('lng', 'lng', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Companies.php */
/* Location: ./application/controllers/Companies.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-23 03:01:23 */
/* http://harviacode.com */