<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;



set_time_limit(0);
date_default_timezone_set('Asia/Jakarta');
setlocale (LC_TIME, 'id_ID'); 

class Schedule_hour extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->Model('Schedule_hour_model');

      
    }

    //Menampilkan data
   
    function index_get($id = NULL) {
        $data = null;
        $test = $id;
        if ($id==null) {
            $data = $this->Schedule_hour_model->get_all();
        }else{
        $data = $this->Schedule_hour_model->get_by_id($id);
         
        }
      
        $this->response($data, 200);
    }


    function index_post() {
    
        $data = [];

        	
        if($this->post('schedule_hour_program_id')!=null)
        $data['schedule_hour_program_id'] = $this->post('schedule_hour_program_id');

        if($this->post('schedule_hour_schedule_day_id')!=null)
        $data['schedule_hour_schedule_day_id'] = $this->post('schedule_hour_schedule_day_id');

        if($this->post('schedule_hour_jam_mulai')!=null)
        $data['schedule_hour_jam_mulai'] = $this->post('schedule_hour_jam_mulai');

        if($this->post('schedule_hour_menit_mulai')!=null)
        $data['schedule_hour_menit_mulai'] = $this->post('schedule_hour_menit_mulai');

        if($this->post('schedule_hour_jam_selesai')!=null)
        $data['schedule_hour_jam_selesai'] = $this->post('schedule_hour_jam_selesai');

        if($this->post('schedule_hour_menit_selesai')!=null)
        $data['schedule_hour_menit_selesai'] = $this->post('schedule_hour_menit_selesai');


       
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
      
           	
        if($this->put('schedule_hour_program_id')!=null)
        $data['schedule_hour_program_id'] = $this->put('schedule_hour_program_id');

        if($this->put('schedule_hour_schedule_day_id')!=null)
        $data['schedule_hour_schedule_day_id'] = $this->put('schedule_hour_schedule_day_id');

        if($this->put('schedule_hour_jam_mulai')!=null)
        $data['schedule_hour_jam_mulai'] = $this->put('schedule_hour_jam_mulai');

        if($this->put('schedule_hour_menit_mulai')!=null)
        $data['schedule_hour_menit_mulai'] = $this->put('schedule_hour_menit_mulai');

        if($this->put('schedule_hour_jam_selesai')!=null)
        $data['schedule_hour_jam_selesai'] = $this->put('schedule_hour_jam_selesai');

        if($this->put('schedule_hour_menit_selesai')!=null)
        $data['schedule_hour_menit_selesai'] = $this->put('schedule_hour_menit_selesai');


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