<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detectors extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detectors_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'detectors/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'detectors/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'detectors/index.html';
            $config['first_url'] = base_url() . 'detectors/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Detectors_model->total_rows($q);
        $detectors = $this->Detectors_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'detectors_data' => $detectors,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('detectors/detectors_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Detectors_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'camera_id' => $row->camera_id,
			'point_a_x' => $row->point_a_x,
			'point_a_y' => $row->point_a_y,
			'point_b_x' => $row->point_b_x,
			'point_b_y' => $row->point_b_y,
			'line_order' => $row->line_order,
	    );
            $this->load->view('detectors/detectors_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detectors'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detectors/create_action'),
	    'id' => set_value('id'),
	    'camera_id' => set_value('camera_id'),
	    'point_a_x' => set_value('point_a_x'),
	    'point_a_y' => set_value('point_a_y'),
	    'point_b_x' => set_value('point_b_x'),
	    'point_b_y' => set_value('point_b_y'),
	    'line_order' => set_value('line_order'),
	);
        $this->load->view('detectors/detectors_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
			'camera_id' => $this->input->post('camera_id',TRUE),
			'point_a_x' => $this->input->post('point_a_x',TRUE),
			'point_a_y' => $this->input->post('point_a_y',TRUE),
			'point_b_x' => $this->input->post('point_b_x',TRUE),
			'point_b_y' => $this->input->post('point_b_y',TRUE),
			'line_order' => $this->input->post('line_order',TRUE),
	    );

            $this->Detectors_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('detectors'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detectors_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detectors/update_action'),
			'id' => set_value('id', $row->id),
			'camera_id' => set_value('camera_id', $row->camera_id),
			'point_a_x' => set_value('point_a_x', $row->point_a_x),
			'point_a_y' => set_value('point_a_y', $row->point_a_y),
			'point_b_x' => set_value('point_b_x', $row->point_b_x),
			'point_b_y' => set_value('point_b_y', $row->point_b_y),
			'line_order' => set_value('line_order', $row->line_order),
	    );
            $this->load->view('detectors/detectors_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detectors'));
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
			'point_a_x' => $this->input->post('point_a_x',TRUE),
			'point_a_y' => $this->input->post('point_a_y',TRUE),
			'point_b_x' => $this->input->post('point_b_x',TRUE),
			'point_b_y' => $this->input->post('point_b_y',TRUE),
			'line_order' => $this->input->post('line_order',TRUE),
	    );

            $this->Detectors_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detectors'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Detectors_model->get_by_id($id);

        if ($row) {
            $this->Detectors_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detectors'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detectors'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('camera_id', 'camera id', 'trim|required');
	$this->form_validation->set_rules('point_a_x', 'point a x', 'trim|required');
	$this->form_validation->set_rules('point_a_y', 'point a y', 'trim|required');
	$this->form_validation->set_rules('point_b_x', 'point b x', 'trim|required');
	$this->form_validation->set_rules('point_b_y', 'point b y', 'trim|required');
	$this->form_validation->set_rules('line_order', 'line order', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Detectors.php */
/* Location: ./application/controllers/Detectors.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-23 03:01:23 */
/* http://harviacode.com */