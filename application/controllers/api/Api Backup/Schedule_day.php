<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;



set_time_limit(0);
date_default_timezone_set('Asia/Jakarta');
setlocale (LC_TIME, 'id_ID');

class Schedule_day extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->Model('Schedule_day_model');

      
    }

    //Menampilkan data
   
    function index_get($id=null) {
        $data = null;
       
        if ($id==null) {
            $data = $this->Schedule_day_model->get_all();
        }else{
        $data = $this->Schedule_day_model->get_by_id($id);
         
        }
      
        $this->response($data, 200);
    }


    function index_post() {
    
        $data = [];

      
            
        if($this->post('schedule_day_name')!=null)
        $data['schedule_day_name'] = $this->post('schedule_day_name');


       
        $insert = $this->db->insert('schedule', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }

    }

    //Update data
	function index_put() {
        $schedule_id = $this->put('schedule_id');
        $data = [];
      
           
        if($this->put('schedule_day_name')!=null)
        $data['schedule_day_name'] = $this->put('schedule_day_name');


      $this->db->where('schedule_id', $schedule_id);
        $update = $this->db->update('schedule', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
	function index_delete() {
        $schedule_id = $this->delete('schedule_id');
        $data = [];
        $this->db->where('schedule_id', $schedule_id);
        $delete = $this->db->delete('schedule', $data);
        if ($delete) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
	//Hapus data

?>