<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;



set_time_limit(0);
date_default_timezone_set('Asia/Jakarta');
setlocale (LC_TIME, 'id_ID');

class log extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('Log_model');

      
    }

    //Menampilkan data
   
    function index_get($id=null) {
        $data = null;
       
        if ($id==null) {
            $data = $this->Log_model->get_all();
        }else{
        $data = $this->Log_model->get_by_id($id);
         
        }
      
        $this->response($data, 200);
    }


    function index_post() {
    
        $data = [];

        if($this->post('log_user_id')!=null)
            $data['log_user_id'] = $this->post('log_user_id');

        if($this->post('log_activity_id ')!=null)
            $data['log_activity_id'] = $this->post('log_activity_id');
      
       if($this->post('log_time')!=null)
            $data['log_time '] = $this->post('log_time');

       
        $insert = $this->db->insert('log', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }

    }

    //Update data
	function index_put() {
        $log_id = $this->put('log_id');
        $data = [];

  
        if($this->put('log_user_id')!=null)
        $data['log_user_id'] = $this->put('log_user_id');

        if($this->put('log_activity_id ')!=null)
            $data['log_activity_id'] = $this->put('log_activity_id');
        
        if($this->put('log_time')!=null)
                $data['log_time '] = $this->put('log_time');

   
      
      $this->db->where('log_id', $log_id);
        $update = $this->db->update('log', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
	function index_delete() {
        $log_id = $this->delete('log_id');
        $data = [];
        $this->db->where('log_id', $log_id);
        $delete = $this->db->delete('log', $data);
        if ($delete) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
	//Hapus data

?>