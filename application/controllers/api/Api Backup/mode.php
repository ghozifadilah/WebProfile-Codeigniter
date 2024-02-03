<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;



set_time_limit(0);
date_default_timezone_set('Asia/Jakarta');
setlocale (LC_TIME, 'id_ID');

class mode extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('Mode_model');

      
    }

    //Menampilkan data
   
    function index_get($id=null) {
	    $data = null;
       
        if ($id==null) {
            $data = $this->Mode_model->get_all();
        }else{
        $data = $this->Mode_model->get_by_id($id);
         
        }
      
        $this->response($data, 200);
    }


    function index_post() {
    
        $data = [];

        if($this->post('mode_nama')!=null)
            $data['mode_nama'] = $this->post('mode_nama');

        if($this->post('mode_clock')!=null)
            $data['mode_clock'] = $this->post('mode_clock');

     
       
        $insert = $this->db->insert('mode', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }

    }

    //Update data
	function index_put() {
        $mode_id = $this->put('mode_id');
        $data = [];

    if($this->put('mode_nama')!=null)
        $data['mode_nama'] = $this->put('mode_nama');

    if($this->put('mode_clock')!=null)
        $data['mode_clock'] = $this->put('mode_clock');


      $this->db->where('mode_id', $mode_id);
        $update = $this->db->update('mode', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
	function index_delete() {
        $mode_id = $this->delete('mode_id');
        $data = [];
        $this->db->where('mode_id', $mode_id);
        $delete = $this->db->delete('mode', $data);
        if ($delete) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
	//Hapus data

?>