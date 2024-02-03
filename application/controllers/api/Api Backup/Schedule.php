<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;



set_time_limit(0);
date_default_timezone_set('Asia/Jakarta');
setlocale (LC_TIME, 'id_ID');

class Schedule extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->Model('Schedule_model');

      
    }

    //Menampilkan data
   
    function index_get($id=null) {
	    $data = null;
       
        if ($id==null) {
            $data = $this->Schedule_model->get_all();
        }else{
        $data = $this->Schedule_model->get_by_id($id);
         
        }
      
        $this->response($data, 200);
    }


    function index_post() {
    
        $data = [];

        if($this->post('schedule_name')!=null)
            $data['schedule_name'] = $this->post('schedule_name');

            
        if($this->post('schedule_day_senin')!=null)
        $data['schedule_day_senin'] = $this->post('schedule_day_senin');

        if($this->post('schedule_day_selasa')!=null)
        $data['schedule_day_selasa'] = $this->post('schedule_day_selasa');
        
        if($this->post('schedule_day_rabu')!=null)
        $data['schedule_day_rabu'] = $this->post('schedule_day_rabu');

        if($this->post('schedule_day_kamis')!=null)
        $data['schedule_day_kamis'] = $this->post('schedule_day_kamis');

        if($this->post('schedule_day_jumat')!=null)
        $data['schedule_day_jumat'] = $this->post('schedule_day_jumat');

        if($this->post('schedule_day_sabtu')!=null)
        $data['schedule_day_sabtu'] = $this->post('schedule_day_sabtu');

        if($this->post('schedule_day_minggu')!=null)
        $data['schedule_day_minggu'] = $this->post('schedule_day_minggu');

       
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
      
        if($this->put('schedule_day_senin')!=null)
        $data['schedule_day_senin'] = $this->put('schedule_day_senin');

        if($this->put('schedule_day_selasa')!=null)
        $data['schedule_day_selasa'] = $this->put('schedule_day_selasa');
        
        if($this->put('schedule_day_rabu')!=null)
        $data['schedule_day_rabu'] = $this->put('schedule_day_rabu');

        if($this->put('schedule_day_kamis')!=null)
        $data['schedule_day_kamis'] = $this->put('schedule_day_kamis');

        if($this->put('schedule_day_jumat')!=null)
        $data['schedule_day_jumat'] = $this->put('schedule_day_jumat');

        if($this->put('schedule_day_sabtu')!=null)
        $data['schedule_day_sabtu'] = $this->put('schedule_day_sabtu');

        if($this->put('schedule_day_minggu')!=null)
        $data['schedule_day_minggu'] = $this->put('schedule_day_minggu');

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