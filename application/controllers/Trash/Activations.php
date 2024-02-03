<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Activations extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Activations_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'activations/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'activations/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'activations/index.html';
            $config['first_url'] = base_url() . 'activations/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Activations_model->total_rows($q);
        $activations = $this->Activations_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'activations_data' => $activations,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('activations/activations_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Activations_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'user_id' => $row->user_id,
			'code' => $row->code,
			'completed' => $row->completed,
			'completed_at' => $row->completed_at,
			'created_at' => $row->created_at,
			'updated_at' => $row->updated_at,
	    );
            $this->load->view('activations/activations_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('activations'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('activations/create_action'),
	    'id' => set_value('id'),
	    'user_id' => set_value('user_id'),
	    'code' => set_value('code'),
	    'completed' => set_value('completed'),
	    'completed_at' => set_value('completed_at'),
	    'created_at' => set_value('created_at'),
	    'updated_at' => set_value('updated_at'),
	);
        $this->load->view('activations/activations_form', $data);
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
			'completed' => $this->input->post('completed',TRUE),
			'completed_at' => $this->input->post('completed_at',TRUE),
			'created_at' => $this->input->post('created_at',TRUE),
			'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Activations_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('activations'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Activations_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('activations/update_action'),
			'id' => set_value('id', $row->id),
			'user_id' => set_value('user_id', $row->user_id),
			'code' => set_value('code', $row->code),
			'completed' => set_value('completed', $row->completed),
			'completed_at' => set_value('completed_at', $row->completed_at),
			'created_at' => set_value('created_at', $row->created_at),
			'updated_at' => set_value('updated_at', $row->updated_at),
	    );
            $this->load->view('activations/activations_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('activations'));
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
			'completed' => $this->input->post('completed',TRUE),
			'completed_at' => $this->input->post('completed_at',TRUE),
			'created_at' => $this->input->post('created_at',TRUE),
			'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Activations_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('activations'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Activations_model->get_by_id($id);

        if ($row) {
            $this->Activations_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('activations'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('activations'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('user_id', 'user id', 'trim|required');
	$this->form_validation->set_rules('code', 'code', 'trim|required');
	$this->form_validation->set_rules('completed', 'completed', 'trim|required');
	$this->form_validation->set_rules('completed_at', 'completed at', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Activations.php */
/* Location: ./application/controllers/Activations.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-23 03:01:23 */
/* http://harviacode.com */