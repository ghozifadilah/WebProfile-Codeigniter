<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;



set_time_limit(0);
date_default_timezone_set('Asia/Jakarta');
setlocale (LC_TIME, 'id_ID');

class program extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->Model('Program_model');

      
    }

    //Menampilkan data
   
    function index_get($id=null) {
	    $data = null;
       
        if ($id==null) {
            $data = $this->Program_model->get_all();
        }else{
        $data = $this->Program_model->get_by_id($id);
         
        }
      
        $this->response($data, 200);
    }


    function index_post() {
    
        $data = [];

        if($this->post('program_nama')!=null)
            $data['program_nama'] = $this->post('program_nama');

        if($this->post('duration_all_red')!=null)
            $data['duration_all_red'] = $this->post('duration_all_red');

       
        $insert = $this->db->insert('program', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }

    }

    

    //Update data
	function index_put() {
        $program_id = $this->put('program_id');
        $data = [];

    if($this->put('program_nama')!=null)
        $data['program_nama'] = $this->put('program_nama');
 
        if($this->put('duration_all_red')!=null)
        $data['duration_all_red'] = $this->put('duration_all_red');


      $this->db->where('program_id', $program_id);
        $update = $this->db->update('program', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
	function index_delete() {
        $program_id = $this->delete('program_id');
        $data = [];
        $this->db->where('program_id', $program_id);
        $delete = $this->db->delete('program', $data);
        if ($delete) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
	//Hapus data

?>