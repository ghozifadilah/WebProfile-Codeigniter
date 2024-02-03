<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stream_camera_list_companies extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Stream_camera_list_companies_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'stream_camera_list_companies/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'stream_camera_list_companies/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'stream_camera_list_companies/index.html';
            $config['first_url'] = base_url() . 'stream_camera_list_companies/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Stream_camera_list_companies_model->total_rows($q);
        $stream_camera_list_companies = $this->Stream_camera_list_companies_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'stream_camera_list_companies_data' => $stream_camera_list_companies,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('stream_camera_list_companies/stream_camera_list_companies_list', $data);
    }

    public function read($id) 
    {
        if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
        $row = $this->Stream_camera_list_companies_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'name' => $row->name,
			'url' => $row->url,
			'streamer_id' => $row->streamer_id,
			'company_id' => $row->company_id,
			'streamer_name' => $row->streamer_name,
			'ip' => $row->ip,
			'id_companies' => $row->id_companies,
			'company_name' => $row->company_name,
			'adresss' => $row->adresss,
			'lat' => $row->lat,
			'lng' => $row->lng,
	    );
            $this->load->view('stream_camera_list_companies/stream_camera_list_companies_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stream_camera_list_companies'));
        }
    }

    public function create() 
    {
        if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
        $data = array(
            'button' => 'Create',
            'action' => site_url('stream_camera_list_companies/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'url' => set_value('url'),
	    'streamer_id' => set_value('streamer_id'),
	    'company_id' => set_value('company_id'),
	    'streamer_name' => set_value('streamer_name'),
	    'ip' => set_value('ip'),
	    'id_companies' => set_value('id_companies'),
	    'company_name' => set_value('company_name'),
	    'adresss' => set_value('adresss'),
	    'lat' => set_value('lat'),
	    'lng' => set_value('lng'),
	);
        $this->load->view('stream_camera_list_companies/stream_camera_list_companies_form', $data);
    }
    
    public function create_action() 
    {
        if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
			'id' => $this->input->post('id',TRUE),
			'name' => $this->input->post('name',TRUE),
			'url' => $this->input->post('url',TRUE),
			'streamer_id' => $this->input->post('streamer_id',TRUE),
			'company_id' => $this->input->post('company_id',TRUE),
			'streamer_name' => $this->input->post('streamer_name',TRUE),
			'ip' => $this->input->post('ip',TRUE),
			'id_companies' => $this->input->post('id_companies',TRUE),
			'company_name' => $this->input->post('company_name',TRUE),
			'adresss' => $this->input->post('adresss',TRUE),
			'lat' => $this->input->post('lat',TRUE),
			'lng' => $this->input->post('lng',TRUE),
	    );

            $this->Stream_camera_list_companies_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('stream_camera_list_companies'));
        }
    }
    
    public function update($id) 
    {
        if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
        $row = $this->Stream_camera_list_companies_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('stream_camera_list_companies/update_action'),
			'id' => set_value('id', $row->id),
			'name' => set_value('name', $row->name),
			'url' => set_value('url', $row->url),
			'streamer_id' => set_value('streamer_id', $row->streamer_id),
			'company_id' => set_value('company_id', $row->company_id),
			'streamer_name' => set_value('streamer_name', $row->streamer_name),
			'ip' => set_value('ip', $row->ip),
			'id_companies' => set_value('id_companies', $row->id_companies),
			'company_name' => set_value('company_name', $row->company_name),
			'adresss' => set_value('adresss', $row->adresss),
			'lat' => set_value('lat', $row->lat),
			'lng' => set_value('lng', $row->lng),
	    );
            $this->load->view('stream_camera_list_companies/stream_camera_list_companies_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stream_camera_list_companies'));
        }
    }
    
    public function update_action() 
    {
        if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
			'id' => $this->input->post('id',TRUE),
			'name' => $this->input->post('name',TRUE),
			'url' => $this->input->post('url',TRUE),
			'streamer_id' => $this->input->post('streamer_id',TRUE),
			'company_id' => $this->input->post('company_id',TRUE),
			'streamer_name' => $this->input->post('streamer_name',TRUE),
			'ip' => $this->input->post('ip',TRUE),
			'id_companies' => $this->input->post('id_companies',TRUE),
			'company_name' => $this->input->post('company_name',TRUE),
			'adresss' => $this->input->post('adresss',TRUE),
			'lat' => $this->input->post('lat',TRUE),
			'lng' => $this->input->post('lng',TRUE),
	    );

            $this->Stream_camera_list_companies_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('stream_camera_list_companies'));
        }
    }
    
    public function delete($id) 
    {
        if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
        $row = $this->Stream_camera_list_companies_model->get_by_id($id);

        if ($row) {
            $this->Stream_camera_list_companies_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('stream_camera_list_companies'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stream_camera_list_companies'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id', 'id', 'trim|required');
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('url', 'url', 'trim|required');
	$this->form_validation->set_rules('streamer_id', 'streamer id', 'trim|required');
	$this->form_validation->set_rules('company_id', 'company id', 'trim|required');
	$this->form_validation->set_rules('streamer_name', 'streamer name', 'trim|required');
	$this->form_validation->set_rules('ip', 'ip', 'trim|required');
	$this->form_validation->set_rules('id_companies', 'id companies', 'trim|required');
	$this->form_validation->set_rules('company_name', 'company name', 'trim|required');
	$this->form_validation->set_rules('adresss', 'adresss', 'trim|required');
	$this->form_validation->set_rules('lat', 'lat', 'trim|required');
	$this->form_validation->set_rules('lng', 'lng', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Stream_camera_list_companies.php */
/* Location: ./application/controllers/Stream_camera_list_companies.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-08 17:18:35 */
/* http://harviacode.com */