<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;



set_time_limit(0);
date_default_timezone_set('Asia/Jakarta');
setlocale (LC_TIME, 'id_ID'); 

class Serial extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->Model('Serial_model');

      
    }

    //Menampilkan data
   
    function index_get($id = NULL) {
        $data = null;

        if ($id==null) {
            $data = $this->Serial_model->get_all();
        }else{
        $data = $this->Serial_model->get_by_id($id);
         
        }
      
        $this->response($data, 200);
    }


    function index_post() {
    
        $data = [];
        
        	
        if($this->post('serial_traffic_id')!=null)
        $data['serial_traffic_id'] = $this->post('serial_traffic_id');

        if($this->post('serial_key')!=null)
        $data['serial_key'] = $this->post('serial_key');

        if($this->post('serial_active')!=null)
        $data['serial_active'] = $this->post('serial_active');

    
        $insert = $this->db->insert('schedule_hour', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }

    }

    //Update data
	function index_put() {
        $schedule_hour_id = $this->put('schedule_hour_id');
        $data = [];
      
        if($this->put('serial_traffic_id')!=null)
        $data['serial_traffic_id'] = $this->put('serial_traffic_id');

        if($this->put('serial_key')!=null)
        $data['serial_key'] = $this->put('serial_key');

        if($this->put('serial_active')!=null)
        $data['serial_active'] = $this->put('serial_active');


      $this->db->where('schedule_hour_id', $schedule_hour_id);
        $update = $this->db->update('schedule_hour', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
	function index_delete() {
        $schedule_hour_id = $this->delete('schedule_hour_id');
        $data = [];
        $this->db->where('schedule_hour_id', $schedule_hour_id);
        $delete = $this->db->delete('schedule_hour', $data);
        if ($delete) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
	//Hapus data

?>