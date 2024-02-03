<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Role_page extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Role_page_model');
        $this->load->model('Pages_model');
        $this->load->library('form_validation');
    }

    public function hak_akses(Type $var = null)
    {
        $role_user_id = $this->session->userdata('role_id');
        $data_roles= $this->db->query("SELECT * FROM role_pages_view where name ='Role_Page' and role_id =$role_user_id ")->result();
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
            $config['base_url'] = base_url() . 'role_page/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'role_page/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'role_page/index.html';
            $config['first_url'] = base_url() . 'role_page/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Role_page_model->total_rows($q);
        $role_page = $this->Role_page_model->get_limit_data($config['per_page'], $start, $q);
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data_roles= $this->db->query("SELECT * FROM roles")->result();


        $pages_roles= $this->db->query("SELECT roles.id as id_roles,role_pages_view.id as id_role_pages,role_pages_view.pages_id,roles.name,role_pages_view.name as name_pages from roles inner join role_pages_view on roles.id = role_pages_view.role_id where role_id ")->result();
        
        $page_all = $this->Pages_model->get_all();
        
        $data_pages = array();

        foreach ($data_roles as $key_pages ) {

            $id = $key_pages->id;
            
            $pages_roles= $this->db->query("SELECT roles.id as id_roles,role_pages_view.id as id_role_pages,role_pages_view.pages_id,roles.name,role_pages_view.name as name_pages from roles inner join role_pages_view on roles.id = role_pages_view.role_id where role_id = $id ")->result();
                
            $data = array(
                'id_roles' => $key_pages->id,
                'roles' =>  $key_pages->name,
                'pages' => $pages_roles,
            );

                $data_pages []= $data;
              
        }
   


        $data = array(
            'role_page_data' => $data_pages,
            'pages' => $role_page,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('role_page/role_page_list', $data);
    }

    public function edit_roles()
    {
        $this->hak_akses();

        $page_id = $this->input->get('id_roles');
        $data_roles= $this->db->query("SELECT * FROM roles  where id = $page_id ")->result();
        $pages_roles= $this->db->query("SELECT roles.id as id_roles,role_pages_view.id as id_role_pages,role_pages_view.pages_id,roles.name,role_pages_view.name as name_pages from roles inner join role_pages_view on roles.id = role_pages_view.role_id where role_id = $page_id ")->result();
        
        $page_all = $this->Pages_model->get_all();
        
        $data_pages = array();

        foreach ($data_roles as $key_pages ) {

            $id = $key_pages->id;
            
            $pages_roles= $this->db->query("SELECT roles.id as id_roles,role_pages_view.id as id_role_pages,role_pages_view.pages_id,roles.name,role_pages_view.name as name_pages from roles inner join role_pages_view on roles.id = role_pages_view.role_id where role_id = $id ")->result();
                
            $data = array(
                'id_roles' => $key_pages->id,
                'roles' =>  $key_pages->name,
                'pages' => $pages_roles,
            );

                $data_pages []= $data;
              
        }

        $data = array(
            'role_page_data' => $data_pages,
            'pages' => $page_all,
        );
   
        echo json_encode($data);

    }

    public function save_pages_roles()
    {
        $this->hak_akses();
    //  $id_pages_roles = $this->input->get('id');
     $roles_id = $this->input->get('id_roles');
     $pages_id = $this->input->get('pages');

     $data = array(
        'role_id' =>  $roles_id,
        'page_id' =>  $pages_id,
    );
    $this->Role_page_model->insert($data);
    $data = array(
        'status' =>  'ok',
    );
    echo json_encode($data);
    }

    public function delete_pages_roles()
    {
        $this->hak_akses();
    //  $id_pages_roles = $this->input->get('id');
        $id = $this->input->get('id');

        $this->Role_page_model->delete($id);
        $data = array(
            'status' =>  'ok',
        );

              echo json_encode($data);
    }

    public function read($id) 
    {
        $this->hak_akses();
        $row = $this->Role_page_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'role_id' => $row->role_id,
			'page_id' => $row->page_id,
	    );
            $this->load->view('role_page/role_page_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('role_page'));
        }
    }

    public function create() 
    {
        $this->hak_akses();
        $data = array(
            'button' => 'Create',
            'action' => site_url('role_page/create_action'),
	    'id' => set_value('id'),
	    'role_id' => set_value('role_id'),
	    'page_id' => set_value('page_id'),
	);
        $this->load->view('role_page/role_page_form', $data);
    }
    

    public function FunctionName(Type $var = null)
    {
        # code...
    }

    public function create_action() 
    {
        $this->hak_akses();
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
			'role_id' => $this->input->post('role_id',TRUE),
			'page_id' => $this->input->post('page_id',TRUE),
	    );

            $this->Role_page_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('role_page'));
        }
    }
    
    public function update($id) 
    {
        $this->hak_akses();
        $row = $this->Role_page_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('role_page/update_action'),
			'id' => set_value('id', $row->id),
			'role_id' => set_value('role_id', $row->role_id),
			'page_id' => set_value('page_id', $row->page_id),
	    );
            $this->load->view('role_page/role_page_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('role_page'));
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
			'role_id' => $this->input->post('role_id',TRUE),
			'page_id' => $this->input->post('page_id',TRUE),
	    );

            $this->Role_page_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('role_page'));
        }
    }
    
    public function delete($id) 
    {
        $this->hak_akses();
        $row = $this->Role_page_model->get_by_id($id);

        if ($row) {
            $this->Role_page_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('role_page'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('role_page'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('role_id', 'role id', 'trim|required');
	$this->form_validation->set_rules('page_id', 'page id', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Role_page.php */
/* Location: ./application/controllers/Role_page.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-23 03:01:24 */
/* http://harviacode.com */