<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->model('Companies_model');
        $this->load->model('roles_model');
        $this->load->library('form_validation');
    }

    
    public function hak_akses(Type $var = null)
    {
        $role_user_id = $this->session->userdata('role_id');
        $data_roles= $this->db->query("SELECT * FROM role_pages_view where name ='Daftar User' and role_id =$role_user_id ")->result();
        if ($data_roles == NULL || $data_roles == '') {
            redirect(site_url(''));
        }
        
    }


    public function index()
    {
        $this->hak_akses();
        if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'users/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'users/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'users/index.html';
            $config['first_url'] = base_url() . 'users/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Users_model->total_rows($q);
        $users = $this->Users_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'users_data' => $users,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // var_dump($users); die;
        $this->load->view('users/users_list', $data);
    }

    public function read($id) 
    {
        $this->hak_akses();
        if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
        $row = $this->Users_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'company_id' => $row->company_id,
			'role_id' => $row->role_id,
			'username' => $row->username,
			'password' => $row->password,
			'email' => $row->email,
	    );
            $this->load->view('users/users_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function create() 
    {
        $this->hak_akses();
        if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
        $data_role = $this->roles_model->get_all();
        $data_company = $this->Companies_model->get_all();
        $data = array(
            'button' => 'Create',
            'role_data' => $data_role,
            'data_company' => $data_company,
            'action' => site_url('users/create_action'),
	    'id' => set_value('id'),
	    'company_id' => set_value('company_id'),
	    'role_id' => set_value('role_id'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'email' => set_value('email'),
	);
        $this->load->view('users/users_form', $data);
    }
    
    public function create_action() 
    {
        $this->hak_akses();
        if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
           
            $password_get = $this->input->post('password');
            $password_get = $this->pass_encrypt($password_get);
            $data = array(
			'company_id' => $this->input->post('company_id',TRUE),
			'role_id' => $this->input->post('role_id',TRUE),
			'username' => $this->input->post('username',TRUE),
			'password' => $password_get,
			'email' => $this->input->post('email',TRUE),
            );

            $this->Users_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('users'));
        }
    }

    public function register()
    {
        
        $this->load->view('register');
    }

    public function registerd_action()
    {

        
        $password_get = $this->input->post('password');
        $password_get = $this->pass_encrypt($password_get);

    
        $data_company = array(
            'name' => $this->input->post('nama',true),
            'adresss' => $this->input->post('adresss',true)
        );
        $this->Companies_model->insert($data_company);
        $insert_id = $this->db->insert_id();

        $data = array(
            'role_id' => 2,
			'username' => $this->input->post('username',TRUE),
			'company_id' => $insert_id,
			'password' => $password_get,
			'email' => $this->input->post('email',TRUE),
        );

    

        $this->Users_model->insert($data);
        redirect(site_url('/login'));
    }
    
    public function update($id) 
    {
        $this->hak_akses();
        if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
        $row = $this->Users_model->get_by_id($id);
        $data_company = $this->Companies_model->get_all();
        $data_role = $this->roles_model->get_all();
        $decry_1 = 'nb0JTiLSbq01wqjzoU';
        $decry_2 = 'sGJmTnSf6Ub8Z89Bc5';


        if ($row) {

            $password = $this->pass_decrypt($row->password,$decry_1,$decry_2);

            $data = array(
                'button' => 'Update',
                'role_data' => $data_role,
                'data_company' => $data_company,
                'action' => site_url('users/update_action'),
			'id' => set_value('id', $row->id),
			'company_id' => set_value('company_id', $row->company_id),
			'role_id' => set_value('role_id', $row->role_id),
			'username' => set_value('username', $row->username),
			'password' => set_value('password', $password),
			'email' => set_value('email', $row->email),
	    );
            $this->load->view('users/users_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }
    
    public function update_action() 
    {
        $this->hak_akses();
        if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $password_get = $this->input->post('password');
            $password_get = $this->pass_encrypt($password_get);

            $data = array(
			'company_id' => $this->input->post('company_id',TRUE),
			'role_id' => $this->input->post('role_id',TRUE),
			'username' => $this->input->post('username',TRUE),
			'password' => $password_get,
			'email' => $this->input->post('email',TRUE),
	    );

            $this->Users_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('users'));
        }
    }

    function pass_encrypt($password){
        
       
        $value="$password";

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 15; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)]; //20 word
        }

        // $key="01234567890123456789012345678901"; // 32 bytes
        $key="83238123982124928412484832193942";
        $iv="1234567890123412"; // 16 bytes
        $encrypted_data = openssl_encrypt($value, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
        $randomString .= $encrypted_data;
        return base64_encode($randomString);
    }
    
    function pass_decrypt($password,$decryp_key_1,$decrypt_key_2){
        if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
        $decry_1 = 'nb0JTiLSbq01wqjzoU';
        $decry_2 = 'sGJmTnSf6Ub8Z89Bc5';

        if ($decryp_key_1 != $decry_1 ) {
            echo '404';
            die;
        }
        if ($decrypt_key_2 != $decry_2 ) {
            echo '404';
            die;
        }


        $password = substr($password,20);
        $value=$password;
        $key="83238123982124928412484832193942";
        $iv="1234567890123412"; // 16 bytes
        $value = base64_decode($value);
        $data = openssl_decrypt($value, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
        return $data;
        // var_dump($data);
    }
    
    public function delete($id) 
    {
        $this->hak_akses();
        if ($this->session->userdata('id') == null) redirect('/login', 'refresh');
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $this->Users_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('users'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('company_id', 'company id', 'trim|required');
	$this->form_validation->set_rules('role_id', 'role id', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-23 03:01:24 */
/* http://harviacode.com */