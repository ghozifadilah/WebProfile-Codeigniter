<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Rest_user extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('user_model');
        $this->token();
    }

    public function token()
    {
        $token_key = $this->input->get_request_header('X-API-KEY');
        $token = $this->db->where('token_key',$token_key)->get('token')->row();
        if ($token==null){
            $this->output->set_content_type('application/json');
            $this->output->set_status_header(403);
            die(json_encode(['status'=>'invalid token'],JSON_PRETTY_PRINT));
        }
    }

    //Menampilkan data user
    function index_get() {
	    $type=@$_GET['type'];
		if ($type=='a') {
			$id = $this->get('user_id');
			if ($id == '') {
				$user = $this->db->get('user')->result();
			} else {
                $this->db->where('user_id', $id);
				$user = $this->db->get('user')->result();
			}
			$this->response($user, 200);
        }
        $user = $this->db->get('user')->result();
        $this->response($user, 200);
    }

    //Input data kota
    function index_post() {
        $data = [];
        if($this->post('user_username')!=null)
            $data['user_username'] = $this->post('user_username');
        if($this->post('user_password')!=null)
            $data['user_password'] = $this->user_model->encrypt($this->post('user_password'));
        if($this->post('user_nama')!=null)
            $data['user_nama'] = $this->post('user_nama');
        if($this->post('user_email')!=null)
            $data['user_email'] = $this->post('user_email');
        if($this->post('user_hak_akses')!=null)
            $data['user_hak_akses'] = $this->post('user_hak_akses');
        $insert = $this->db->insert('user', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
	
	//Update data kota
	function index_put() {
        $user_id = $this->put('user_id');
        $data = [];
        if($this->put('user_username')!=null)
            $data['user_username'] = $this->put('user_username');
        if($this->put('user_password')!=null)
            $data['user_password'] = $this->user_model->encrypt($this->put('user_password'));
        if($this->put('user_nama')!=null)
            $data['user_nama'] = $this->put('user_nama');
        if($this->put('user_email')!=null)
            $data['user_email'] = $this->put('user_email');
        if($this->put('user_hak_akses')!=null)
            $data['user_hak_akses'] = $this->put('user_hak_akses');
        $this->db->where('user_id', $user_id);
        $update = $this->db->update('user', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
	
	//Hapus data kota
	function index_delete() {
        $user_id = $this->delete('user_id');
        $this->db->where('user_id', $user_id);
        $delete = $this->db->delete('user');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>