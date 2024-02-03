<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

set_time_limit(0);
date_default_timezone_set('Asia/Jakarta');
setlocale (LC_TIME, 'id_ID');

class Template extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('Api_user_model');

        if(!$this->Api_user_model->request_token()){
            $data['error'] = 'token not accepted';
            // $this->response($data, 200);
            echo json_encode($data);
            die();
        }
    }

    //Menampilkan data
    function index_get() {
	    $data = null;
        $this->response($data, 200);
    }

    //Input data
    function index_post() {
        $insert = true;
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
	
	//Update data
	function index_put() {
        $update = true;
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
	
	//Hapus data
	function index_delete() {
        $delete = true;
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>