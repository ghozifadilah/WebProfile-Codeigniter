<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;



set_time_limit(0);
date_default_timezone_set('Asia/Jakarta');
setlocale (LC_TIME, 'id_ID');

class Duration extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('Duration_model');

      
    }

    //Menampilkan data
   

    function index_get($id=null) {
        $data = null;
       
        if ($id==null) {
            $data = $this->Duration_model->get_all();
        }else{
        $data = $this->Duration_model->get_by_id($id);
         
        }
      
        $this->response($data, 200);
    }


    function index_post() {
    
        $data = [];

        if($this->post('duration_program_id')!=null)
            $data['duration_program_id'] = $this->post('duration_program_id');

        if($this->post('duration_fase_id')!=null)
            $data['duration_fase_id'] = $this->post('duration_fase_id');

        if($this->post('duration_start')!=null)
            $data['duration_start'] = $this->post('duration_start');

        if($this->post('duration_yellow')!=null)
            $data['duration_yellow'] = $this->post('duration_yellow');

        if($this->post('duration_fase_id')!=null)
            $data['duration_fase_id'] = $this->post('duration_fase_id');
       
        $insert = $this->db->insert('Duration', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }

    }

    //Update data
	function index_put() {
        $Duration_id = $this->put('Duration_id');
        $data = [];
    if($this->put('duration_program_id')!=null)
         $data['duration_program_id'] = $this->put('duration_program_id');
    if($this->put('duration_fase_id')!=null)
        $data['duration_fase_id'] = $this->put('duration_fase_id');
    if($this->put('duration_start')!=null)
        $data['duration_start'] = $this->put('duration_start');
    if($this->put('duration_yellow')!=null)
        $data['duration_yellow'] = $this->put('duration_yellow');
    if($this->put('duration_fase_id')!=null)
        $data['duration_fase_id'] = $this->put('duration_fase_id');
      
      $this->db->where('Duration_id', $Duration_id);
        $update = $this->db->update('Duration', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
	function index_delete() {
        $Duration_id = $this->delete('Duration_id');
        $data = [];
        $this->db->where('Duration_id', $Duration_id);
        $delete = $this->db->delete('Duration', $data);
        if ($delete) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
	//Hapus data

?>