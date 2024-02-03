<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Records extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Records_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'records/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'records/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'records/index.html';
            $config['first_url'] = base_url() . 'records/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Records_model->total_rows($q);
        $records = $this->Records_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'records_data' => $records,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('records/records_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Records_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'camera_id' => $row->camera_id,
			'file_url' => $row->file_url,
			'duration_sec' => $row->duration_sec,
			'timestamp' => $row->timestamp,
	    );
            $this->load->view('records/records_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('records'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('records/create_action'),
	    'id' => set_value('id'),
	    'camera_id' => set_value('camera_id'),
	    'file_url' => set_value('file_url'),
	    'duration_sec' => set_value('duration_sec'),
	    'timestamp' => set_value('timestamp'),
	);
        $this->load->view('records/records_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
			'camera_id' => $this->input->post('camera_id',TRUE),
			'file_url' => $this->input->post('file_url',TRUE),
			'duration_sec' => $this->input->post('duration_sec',TRUE),
			'timestamp' => $this->input->post('timestamp',TRUE),
	    );

            $this->Records_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('records'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Records_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('records/update_action'),
			'id' => set_value('id', $row->id),
			'camera_id' => set_value('camera_id', $row->camera_id),
			'file_url' => set_value('file_url', $row->file_url),
			'duration_sec' => set_value('duration_sec', $row->duration_sec),
			'timestamp' => set_value('timestamp', $row->timestamp),
	    );
            $this->load->view('records/records_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('records'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
			'camera_id' => $this->input->post('camera_id',TRUE),
			'file_url' => $this->input->post('file_url',TRUE),
			'duration_sec' => $this->input->post('duration_sec',TRUE),
			'timestamp' => $this->input->post('timestamp',TRUE),
	    );

            $this->Records_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('records'));
        }
    }
    
    public function delete() 
    {
        
        $id = $this->input->get('id_record');
        $row = $this->Records_model->get_by_id($id);
        $file_path = $row->file_url;
        unlink("./" . $file_path);
        // $file_path =  
      
        if ($row) {
            $this->Records_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            echo json_encode('ok');
          
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            echo json_encode('false');
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('camera_id', 'camera id', 'trim|required');
	$this->form_validation->set_rules('file_url', 'file url', 'trim|required');
	$this->form_validation->set_rules('duration_sec', 'duration sec', 'trim|required');
	$this->form_validation->set_rules('timestamp', 'timestamp', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Records.php */
/* Location: ./application/controllers/Records.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-23 03:01:24 */
/* http://harviacode.com */