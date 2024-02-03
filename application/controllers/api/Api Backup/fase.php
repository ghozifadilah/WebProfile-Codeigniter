<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;



set_time_limit(0);
date_default_timezone_set('Asia/Jakarta');
setlocale (LC_TIME, 'id_ID');

class fase extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('Fase_model');

      
    }

    //Menampilkan data
   

    function index_get($id=null) {
	    $data = null;
       
        if ($id==null) {
            $data = $this->Fase_model->get_all();
        }else{
        $data = $this->Fase_model->get_by_id($id);
         
        }
      
        $this->response($data, 200);
    }


    function index_post() {
    
        $data = [];

        if($this->post('fase_traffic_id')!=null)
            $data['fase_traffic_id'] = $this->post('fase_traffic_id');

        if($this->post('fase_nomor')!=null)
            $data['fase_nomor'] = $this->post('fase_nomor');

        if($this->post('fase_deskripsi')!=null)
            $data['fase_deskripsi'] = $this->post('fase_deskripsi');
       
       
        $insert = $this->db->insert('fase', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }

    }

    //Update data
	function index_put() {
        $fase_id = $this->put('fase_id');
        $data = [];

    if($this->put('fase_traffic_id')!=null)
    $data['fase_traffic_id'] = $this->put('fase_traffic_id');

    if($this->put('fase_nomor')!=null)
        $data['fase_nomor'] = $this->put('fase_nomor');

    if($this->put('fase_deskripsi')!=null)
        $data['fase_deskripsi'] = $this->put('fase_deskripsi');
   
      
      $this->db->where('fase_id', $fase_id);
        $update = $this->db->update('fase', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
	function index_delete() {
        $fase_id = $this->delete('fase_id');
        $data = [];
        $this->db->where('fase_id', $fase_id);
        $delete = $this->db->delete('fase', $data);
        if ($delete) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
	//Hapus data

?>