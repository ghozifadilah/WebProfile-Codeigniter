<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;



set_time_limit(0);
date_default_timezone_set('Asia/Jakarta');
setlocale (LC_TIME, 'id_ID');

class Camera extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('camera_model');

      
    }

    //Menampilkan data
   

    function index_get($id=null) {
        $data = null;
       
        if ($id==null) {
            $data = $this->camera_model->get_all();
        }else{
        $data = $this->camera_model->get_by_id($id);
         
        }
      
        $this->response($data, 200);
    }


    function index_post() {
      
        $data = [];

        if($this->post('camera_area_id')!=null)
            $data['camera_area_id'] = $this->post('camera_area_id');
        if($this->post('camera_name')!=null)
            $data['camera_name'] = $this->post('camera_name');
        if($this->post('camera_ip')!=null)
            $data['camera_ip'] = $this->post('camera_ip');
        if($this->post('camera_rstp')!=null)
            $data['camera_rstp'] = $this->post('camera_rstp');
        if($this->post('camera_lat')!=null)
            $data['camera_lat'] = $this->post('camera_lat');
        if($this->post('camera_lng')!=null)
            $data['camera_lng'] = $this->post('camera_lng');
    
        $insert = $this->db->insert('camera', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }

    }

    //Update data
	function index_put() {
        $camera_id = $this->put('camera_id');
        $data = [];
    if($this->put('camera_area_id')!=null)
    $data['camera_area_id'] = $this->put('camera_area_id');
    if($this->put('camera_name')!=null)
        $data['camera_name'] = $this->put('camera_name');
    if($this->put('camera_ip')!=null)
        $data['camera_ip'] = $this->put('camera_ip');
    if($this->put('camera_rstp')!=null)
        $data['camera_rstp'] = $this->put('camera_rstp');
    if($this->put('camera_lat')!=null)
        $data['camera_lat'] = $this->put('camera_lat');
    if($this->put('camera_lng')!=null)
        $data['camera_lng'] = $this->put('camera_lng');
      
       $this->db->where('camera_id', $camera_id);
        $update = $this->db->update('camera', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
	function index_delete() {
        $camera_id = $this->delete('camera_id');
        $data = [];
        $this->db->where('camera_id', $camera_id);
        $delete = $this->db->delete('camera', $data);
        if ($delete) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
	//Hapus data

?>