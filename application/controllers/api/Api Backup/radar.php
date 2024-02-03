<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;



set_time_limit(0);
date_default_timezone_set('Asia/Jakarta');
setlocale (LC_TIME, 'id_ID');

class radar extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->Model('Radar_model');

      
    }

    //Menampilkan data
   
    function index_get() {
	    $type=@$_GET['type'];
		if ($type=='a') {
			$id = $this->get('radar_id');
			if ($id == '') {
				$radar = $this->db->get('radar')->result();
			} else {
                $this->db->where('radar_id', $id);
				$radar = $this->db->get('radar')->result();
			}
			$this->response($radar, 200);
        }
        $radar = $this->db->get('radar')->result();
        $this->response($radar, 200);
    }


    function index_post() {
    
        $data = [];

        if($this->post('radar_nama')!=null)
            $data['radar_nama'] = $this->post('radar_nama');

       
        $insert = $this->db->insert('radar', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }

    }

    //Update data
	function index_put() {
        $radar_id = $this->put('radar_id');
        $data = [];

    if($this->post('radar_nama')!=null)
        $data['radar_nama'] = $this->post('radar_nama');


      $this->db->where('radar_id', $radar_id);
        $update = $this->db->update('radar', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
	function index_delete() {
        $radar_id = $this->delete('radar_id');
        $data = [];
        $this->db->where('radar_id', $radar_id);
        $delete = $this->db->delete('radar', $data);
        if ($delete) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
	//Hapus data

?>