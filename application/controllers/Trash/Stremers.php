<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stremers extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Stremers_model');
        $this->load->model('Companies_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'stremers/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'stremers/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'stremers/index.html';
            $config['first_url'] = base_url() . 'stremers/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Stremers_model->total_rows($q);
        $stremers = $this->Stremers_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'stremers_data' => $stremers,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('stremers/stremers_list', $data);
    }

    public function read($id) 
    {
        if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
        $row = $this->Stremers_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'company_id' => $row->company_id,
			'name' => $row->name,
			'ip' => $row->ip,
	    );
            $this->load->view('stremers/stremers_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stremers'));
        }
    }

    public function create() 
    {
        if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
        $company_list = $this->Companies_model->get_all(); //tambah perushaam

        $data = array(
        'button' => 'Tambah',
        'data_company' => $company_list, //daftar perushaan
        'action' => site_url('stremers/create_action'),
	    'id' => set_value('id'),
	    'company_id' => set_value('company_id'),
	    'name' => set_value('name'),
	    'ip' => set_value('ip'),
	    );

        $this->load->view('stremers/stremers_form', $data);
    }
    
    public function create_action() 
    {
        if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
			'company_id' => $this->input->post('company_id',TRUE),
			'name' => $this->input->post('name',TRUE),
			'ip' => $this->input->post('ip',TRUE),
	    );

            $this->Stremers_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('stremers'));
        }
    }
    
    public function update($id) 
    {
        if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
        $row = $this->Stremers_model->get_by_id($id);
        $company_list = $this->Companies_model->get_all();
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('stremers/update_action'),
			'id' => set_value('id', $row->id),
			'company_id' => set_value('company_id', $row->company_id),
            'data_company' => $company_list, //daftar perushaan
			'name' => set_value('name', $row->name),
			'ip' => set_value('ip', $row->ip),
	    );
            $this->load->view('stremers/stremers_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stremers'));
        }
    }
    
    public function update_action() 
    {
        if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
			'company_id' => $this->input->post('company_id',TRUE),
			'name' => $this->input->post('name',TRUE),
			'ip' => $this->input->post('ip',TRUE),
	    );

            $this->Stremers_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('stremers'));
        }
    }
    
    public function delete($id) 
    {
        if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
        $row = $this->Stremers_model->get_by_id($id);

        if ($row) {
            $this->Stremers_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('stremers'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stremers'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('company_id', 'company id', 'trim|required');
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('ip', 'ip', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Stremers.php */
/* Location: ./application/controllers/Stremers.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-23 03:01:24 */
/* http://harviacode.com */