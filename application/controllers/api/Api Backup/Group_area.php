<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;



set_time_limit(0);
date_default_timezone_set('Asia/Jakarta');
setlocale (LC_TIME, 'id_ID');

class group_area extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('Group_area_model');

      
    }

    //Menampilkan data
   
    function index_get($id=NULL) {
	    $data = null;
       
        if ($id==null) {
            $data = $this->Group_area_model->get_all();
        }else{
        $data = $this->Group_area_model->get_by_id($id);
         
        }
      
        $this->response($data, 200);
    }


    function index_post() {
    
        $data = [];

        if($this->post('group_area_group_id')!=null)
            $data['group_area_group_id'] = $this->post('group_area_group_id');

        if($this->post('group_area_area_id ')!=null)
            $data['group_area_area_id '] = $this->post('group_area_area_id ');

       
        $insert = $this->db->insert('group_area', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }

    }

    //Update data
	function index_put() {
        $group_area_id = $this->put('group_area_id');
        $data = [];

  
        if($this->put('group_area_group_id')!=null)
            $data['group_area_group_id'] = $this->put('group_area_group_id');

        if($this->put('group_area_area_id ')!=null)
            $data['group_area_area_id '] = $this->put('group_area_area_id ');

   
      
      $this->db->where('group_area_id', $group_area_id);
        $update = $this->db->update('group_area', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
	function index_delete() {
        $group_area_id = $this->delete('group_area_id');
        $data = [];
        $this->db->where('group_area_id', $group_area_id);
        $delete = $this->db->delete('group_area', $data);
        if ($delete) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
	//Hapus data

?>