<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;



set_time_limit(0);
date_default_timezone_set('Asia/Jakarta');
setlocale (LC_TIME, 'id_ID'); 

class Traffic extends REST_Controller {
//traffic_id 	traffic_area_id 	traffic_mode_id 	traffic_schedule_id 	traffic_nama 	traffic_lat 	traffic_lng 

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->Model('Traffic_model');

      
    }

    //Menampilkan data
   
    function index_get($id = NULL) {
        $data = null;
      
        if ($id==null) {
            $data = $this->Traffic_model->get_all();
        }else{
        $data = $this->Traffic_model->get_by_id($id);
         
        }
      
        $this->response($data, 200);
    }


    function index_post() {

    
        $data = [];
        
        	
        if($this->post('traffic_area_id')!=null)
        $data['traffic_area_id'] = $this->post('traffic_area_id');

        if($this->post('traffic_mode_id')!=null)
        $data['traffic_mode_id'] = $this->post('traffic_mode_id');

        if($this->post('traffic_schedule_id')!=null)
        $data['traffic_schedule_id'] = $this->post('traffic_schedule_id');

        if($this->post('traffic_nama')!=null)
        $data['traffic_nama'] = $this->post('traffic_nama');

        if($this->post('traffic_lat')!=null)
        $data['traffic_lat'] = $this->post('traffic_lat');

        if($this->post('traffic_lng')!=null)
        $data['traffic_lng'] = $this->post('traffic_lng');

    
        $insert = $this->db->insert('schedule_hour', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }

    }

    //Update data
	function index_put() {
        $traffic_id = $this->put('traffic_id');
        $data = [];
      
        if($this->put('traffic_area_id')!=null)
        $data['traffic_area_id'] = $this->put('traffic_area_id');

        if($this->put('traffic_mode_id')!=null)
        $data['traffic_mode_id'] = $this->put('traffic_mode_id');

        if($this->put('traffic_schedule_id')!=null)
        $data['traffic_schedule_id'] = $this->put('traffic_schedule_id');

        if($this->put('traffic_nama')!=null)
        $data['traffic_nama'] = $this->put('traffic_nama');

        if($this->put('traffic_lat')!=null)
        $data['traffic_lat'] = $this->put('traffic_lat');

        if($this->put('traffic_lng')!=null)
        $data['traffic_lng'] = $this->put('traffic_lng');


      $this->db->where('traffic_id', $traffic_id);
        $update = $this->db->update('schedule_hour', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
	function index_delete() {
        $traffic_id = $this->delete('traffic_id');
        $data = [];
        $this->db->where('traffic_id', $traffic_id);
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