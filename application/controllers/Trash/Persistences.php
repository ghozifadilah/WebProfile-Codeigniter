<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Persistences extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Persistences_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'persistences/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'persistences/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'persistences/index.html';
            $config['first_url'] = base_url() . 'persistences/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Persistences_model->total_rows($q);
        $persistences = $this->Persistences_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'persistences_data' => $persistences,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('persistences/persistences_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Persistences_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'user_id' => $row->user_id,
			'code' => $row->code,
			'created_at' => $row->created_at,
			'updated_at' => $row->updated_at,
	    );
            $this->load->view('persistences/persistences_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('persistences'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('persistences/create_action'),
	    'id' => set_value('id'),
	    'user_id' => set_value('user_id'),
	    'code' => set_value('code'),
	    'created_at' => set_value('created_at'),
	    'updated_at' => set_value('updated_at'),
	);
        $this->load->view('persistences/persistences_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
			'user_id' => $this->input->post('user_id',TRUE),
			'code' => $this->input->post('code',TRUE),
			'created_at' => $this->input->post('created_at',TRUE),
			'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Persistences_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('persistences'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Persistences_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('persistences/update_action'),
			'id' => set_value('id', $row->id),
			'user_id' => set_value('user_id', $row->user_id),
			'code' => set_value('code', $row->code),
			'created_at' => set_value('created_at', $row->created_at),
			'updated_at' => set_value('updated_at', $row->updated_at),
	    );
            $this->load->view('persistences/persistences_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('persistences'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
			'user_id' => $this->input->post('user_id',TRUE),
			'code' => $this->input->post('code',TRUE),
			'created_at' => $this->input->post('created_at',TRUE),
			'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Persistences_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('persistences'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Persistences_model->get_by_id($id);

        if ($row) {
            $this->Persistences_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('persistences'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('persistences'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('user_id', 'user id', 'trim|required');
	$this->form_validation->set_rules('code', 'code', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Persistences.php */
/* Location: ./application/controllers/Persistences.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-23 03:01:24 */
/* http://harviacode.com */