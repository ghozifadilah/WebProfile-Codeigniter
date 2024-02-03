<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reminders extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Reminders_model');
        $this->load->library('form_validation');
        $page_name = 'camera';
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'reminders/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'reminders/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'reminders/index.html';
            $config['first_url'] = base_url() . 'reminders/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Reminders_model->total_rows($q);
        $reminders = $this->Reminders_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'reminders_data' => $reminders,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('reminders/reminders_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Reminders_model->get_by_id($id);
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
            $this->load->view('reminders/reminders_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('reminders'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('reminders/create_action'),
	    'id' => set_value('id'),
	    'user_id' => set_value('user_id'),
	    'code' => set_value('code'),
	    'completed' => set_value('completed'),
	    'completed_at' => set_value('completed_at'),
	    'created_at' => set_value('created_at'),
	    'updated_at' => set_value('updated_at'),
	);
        $this->load->view('reminders/reminders_form', $data);
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

            $this->Reminders_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('reminders'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Reminders_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('reminders/update_action'),
			'id' => set_value('id', $row->id),
			'user_id' => set_value('user_id', $row->user_id),
			'code' => set_value('code', $row->code),
			'completed' => set_value('completed', $row->completed),
			'completed_at' => set_value('completed_at', $row->completed_at),
			'created_at' => set_value('created_at', $row->created_at),
			'updated_at' => set_value('updated_at', $row->updated_at),
	    );
            $this->load->view('reminders/reminders_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('reminders'));
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

            $this->Reminders_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('reminders'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Reminders_model->get_by_id($id);

        if ($row) {
            $this->Reminders_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('reminders'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('reminders'));
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

/* End of file Reminders.php */
/* Location: ./application/controllers/Reminders.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-23 03:01:24 */
/* http://harviacode.com */