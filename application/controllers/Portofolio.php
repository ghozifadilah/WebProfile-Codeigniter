<?php

// TODO Tambah kategori pada tabel portofolio


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Portofolio extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Portofolio_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        
        if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'portofolio/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'portofolio/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'portofolio/index.html';
            $config['first_url'] = base_url() . 'portofolio/index.html';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Portofolio_model->total_rows($q);
        $portofolio = $this->Portofolio_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'portofolio_data' => $portofolio,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('portofolio/portofolio_list', $data);
    }



    public function portofolio_list()
    {
        
        if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'portofolio/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'portofolio/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'portofolio/index.html';
            $config['first_url'] = base_url() . 'portofolio/index.html';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Portofolio_model->total_rows($q);
        $portofolio = $this->Portofolio_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'portofolio_data' => $portofolio,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('portofolio/portofolio_list', $data);
    }


    public function list()
    {
     
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'portofolio/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'portofolio/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'portofolio/index.html';
            $config['first_url'] = base_url() . 'portofolio/index.html';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Portofolio_model->total_rows($q);
        $portofolio = $this->Portofolio_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'portofolio_data' => $portofolio,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('portofolio/portofolio_main_list.php', $data);
    }


    public function detail($id) 
    {
        $row = $this->Portofolio_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'judul' => $row->judul,
			'tools' => $row->tools,
			'deskripsi' => $row->deskripsi,
			'timestamp' => $row->timestamp,
            'kategori' => $row->kategori,
			'image' => $row->image,
	    );
            $this->load->view('portofolio/portofolio_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('portofolio'));
        }
    }

    public function create() 
    {
        if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
        $data = array(
            'button' => 'Create',
            'action' => site_url('portofolio/create_action'),
	    'id' => set_value('id'),
	    'judul' => set_value('judul'),
	    'tools' => set_value('tools'),
	    'deskripsi' => set_value('deskripsi'),
	    'timestamp' => set_value('timestamp'),
        'kategori' => set_value('kategori'),
	    'image' => set_value('image'),
	);
        $this->load->view('portofolio/portofolio_form', $data);
    }
    
    public function create_action() 
    {
        if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
			'judul' => $this->input->post('judul',TRUE),
			'tools' => $this->input->post('tools',TRUE),
			'deskripsi' => $this->input->post('deskripsi',TRUE),
			'timestamp' => $this->input->post('timestamp',TRUE),
            'kategori' =>  $this->input->post('kategori',TRUE),
			'image' => $this->input->post('image',TRUE),
	    );

            $this->Portofolio_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('portofolio'));
        }
    }
    
    public function update($id) 
    {
        if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
        $row = $this->Portofolio_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('portofolio/update_action'),
			'id' => set_value('id', $row->id),
			'judul' => set_value('judul', $row->judul),
			'tools' => set_value('tools', $row->tools),
			'deskripsi' => set_value('deskripsi', $row->deskripsi),
			'timestamp' => set_value('timestamp', $row->timestamp),
            'kategori' => set_value('kategori', $row->kategori),
			'image' => set_value('image', $row->image),
	    );
            $this->load->view('portofolio/portofolio_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('portofolio'));
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
			'judul' => $this->input->post('judul',TRUE),
			'tools' => $this->input->post('tools',TRUE),
			'deskripsi' => $this->input->post('deskripsi',TRUE),
			'timestamp' => $this->input->post('timestamp',TRUE),
            'kategori' => $this->input->post('kategori',TRUE),
			'image' => $this->input->post('image',TRUE),
	    );

            $this->Portofolio_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('portofolio'));
        }
    }
    
    public function delete($id) 
    {
        if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
        $row = $this->Portofolio_model->get_by_id($id);

        if ($row) {
            $this->Portofolio_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('portofolio'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('portofolio'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('tools', 'tools', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	$this->form_validation->set_rules('timestamp', 'timestamp', 'trim|required');
	$this->form_validation->set_rules('image', 'image', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
