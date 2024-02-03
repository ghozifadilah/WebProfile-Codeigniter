<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Camera_log extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Camera_log_model');
        $this->load->library('form_validation');
    }


    public function hak_akses(Type $var = null)
    {
        $role_user_id = $this->session->userdata('role_id');
        $data_roles= $this->db->query("SELECT * FROM role_pages_view where name ='Camera' and role_id =$role_user_id ")->result();
        if ($data_roles == NULL || $data_roles == '') {
            redirect(site_url(''));
        }
        
    }


    public function index()
    {
        $this->hak_akses();
       $id_camera = 6; //id_dummy
        //data camera
        $data_camera =  $this->db->query("SELECT * FROM stream_camera_list WHERE id = $id_camera")->result();
        $data_detectors =  $this->db->query("SELECT * FROM detectors WHERE camera_id = $id_camera")->result();
        //data detector
        $data = array(
            'data_camera' =>    $data_camera,
            'data_detectors' =>    $data_detectors,
        );


        $this->load->view('camera_log/camera_log_list', $data);
    }

    public function riwayat_deteksi($id_camera)
    {
        
        $this->hak_akses();
       $id_camera = $id_camera; //id_dummy
        //data camera
        $data_camera =  $this->db->query("SELECT * FROM stream_camera_list WHERE id = $id_camera")->result();
        $data_detectors =  $this->db->query("SELECT * FROM detectors WHERE camera_id = $id_camera")->result();
        //data detector
        $data = array(
            'data_camera' =>    $data_camera,
            'data_detectors' =>    $data_detectors,
        );


        $this->load->view('camera_log/camera_log_list', $data);
    }

 
    public function get_data_detector()
    {
        $id_camera = $this->input->get('camera_id'); //id traffic
        // $id_camera = 6; //id traffic
        $client = new Predis\Client();

        if ($id_camera == NULL || $id_camera == '') {
            $data = array(
                'status' => 'error',
            );
        
        }else{

            $value = $client->get("camera_log/$id_camera");
            $value = str_replace("{","","$value");
            $value = str_replace("}","","$value");
            $value = str_replace('"',"","$value");
            $value = explode(",",$value);
            // "streamer_id:1"
            // 1	"camera_id:6"
            // 2	"person:3"
            // 3	"car:4"
            // 4	"motorcycle:4"
            // 5	"bus:4"
            // 6	"truck:4"
            $data = array(
                'data' =>  $value,
            );
           echo json_encode($data);
        }
    }


    public function read($id) 
    {
        $this->hak_akses();
        $row = $this->Camera_log_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'detector_id' => $row->detector_id,
			'object' => $row->object,
			'timestamp' => $row->timestamp,
	    );
            $this->load->view('camera_log/camera_log_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('camera_log'));
        }
    }

    public function create() 
    {
        $this->hak_akses();
        $data = array(
            'button' => 'Create',
            'action' => site_url('camera_log/create_action'),
	    'id' => set_value('id'),
	    'detector_id' => set_value('detector_id'),
	    'object' => set_value('object'),
	    'timestamp' => set_value('timestamp'),
	);
        $this->load->view('camera_log/camera_log_form', $data);
    }
    
    public function create_action() 
    {
        $this->hak_akses();
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
			'detector_id' => $this->input->post('detector_id',TRUE),
			'object' => $this->input->post('object',TRUE),
			'timestamp' => $this->input->post('timestamp',TRUE),
	    );

            $this->Camera_log_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('camera_log'));
        }
    }

    public function log_data_kendaraan()
    {
        $this->hak_akses();
       $id_camera = 7;
       //dapatkan data camera dan detector
       $data_camera =  $this->db->query("SELECT * FROM stream_camera_list WHERE id = $id_camera")->result();
       $data_detectors =  $this->db->query("SELECT * FROM detectors WHERE camera_id = $id_camera")->result();
    
      
       var_dump($camera_log); die;
    }


    public function log_deteksi()
    {
        $this->hak_akses();
        $id_camera = 6;
        $id_modul = $this->input->get('id_modul');
        $start_date = $this->input->get('start_date');
        $start_time = $this->input->get('start_time');
        $end_date = $this->input->get('end_date');
        $end_time = $this->input->get('end_time');
        $minute = $this->input->get('minute');
    

          //dapatkan data camera dan detector
          $data_camera =  $this->db->query("SELECT * FROM stream_camera_list WHERE id = $id_camera")->result();
          //   $data_detectors =  $this->db->query("SELECT * FROM detectors WHERE camera_id = $id_camera")->result();
          
          
          
          //change diagram start  01-02-2022 06:40 into 2022-02-01 06:40
          
          //   $Waktu_start = '2022-03-06 00:00';
          //   $Waktu_end ='2022-07-07 00:00';
          $Waktu_start = $start_date . ' ' . $start_time;
          $Waktu_end = $end_date . ' ' . $end_time;
          $data_detectors =  $this->db->query("SELECT * FROM log_deteksi WHERE camera_id = $id_camera and timestamp BETWEEN  '$Waktu_start' AND '$Waktu_end' " )->result();
        //   var_dump($data_detectors);
        
        $minute = $minute; //setengah jam
        
        $time1 = strtotime($Waktu_start);
        $time2 = strtotime($Waktu_end);
        $difference = round(abs($time2 - $time1) / 3600, 2);
        
        // echo $difference;
        $date_array = array();
        $time_array = array();
        
        //object deteksi
        $mobil = array();
        $motor = array();
        $sepeda = array();
        $orang = array();
        $bus = array();
        $truck = array();
        
    
        $time_temp = 0;
        $tanggal_temp = 0;
        foreach ($data_detectors as $key) {

            $Waktu_log = $key->timestamp;
            $tanggal = substr($Waktu_log, 0, 10);
            if ($time_temp == 0) {
                $time_temp = substr($Waktu_log, 11, 5);
            }

            if ($tanggal_temp == 0) {
                $tanggal_temp = '2021-01-01';
            }

            //substing time

            $time = substr($Waktu_log, 11, 5);
            $time1 = strtotime($time_temp);
            $time2 = strtotime($time);
            $difference = round(abs($time1 - $time2) / 60, 2);

            if ($tanggal_temp != $tanggal) {
                $date_array[] = $tanggal;
                $tanggal_temp = $tanggal;

                $time_temp = $time;
                $time_array[] = $tanggal . ' | ' . $time_temp;

                if ($key->object == 'Mobil') {
                    $mobil[] = $key->counter;
                }
                if ($key->object == 'Sepeda') {
                    $sepeda[] = $key->counter;
                }
                if ($key->object == 'Motor') {
                    $motor[] = $key->counter;
                }
                if ($key->object == 'Truck') {
                    $truck[] = $key->counter;
                }
                if ($key->object == 'Orang') {
                    $orang[] = $key->counter;
                }
                if ($key->object == 'Bus') {
                    $bus[] = $key->counter;
                }

    
            }

           
            if ($tanggal_temp == $tanggal && $difference <= $minute) {
            
                $time_temp = $time;
                $time_array[] = $tanggal . ' | ' . $time_temp;

                if ($key->object == 'Mobil') {
                    $end_mobil = end($mobil);
                  
                    $mobil[] = $end_mobil + $key->counter;
                }
                if ($key->object == 'Sepeda') {
                    $sepeda[] = $key->counter;
                }
                if ($key->object == 'Motor') {
                    $motor[] = $key->counter;
                }
                if ($key->object == 'Truck') {
                    $truck[] = $key->counter;
                }
                if ($key->object == 'Orang') {
                    $orang[] = $key->counter;
                }
                if ($key->object == 'Bus') {
                    $bus[] = $key->counter;
                }
           

            }

            if ($tanggal_temp == $tanggal && $difference >= $minute) {
                $time_temp = $time;
                $time_array[] = $tanggal . ' | ' . $time_temp;

                if ($key->object == 'Mobil') {
                    $mobil[] = $key->counter;
                }
                if ($key->object == 'Sepeda') {
                    $sepeda[] = $key->counter;
                }
                if ($key->object == 'Motor') {
                    $motor[] = $key->counter;
                }
                if ($key->object == 'Truck') {
                    $truck[] = $key->counter;
                }
                if ($key->object == 'Orang') {
                    $orang[] = $key->counter;
                }
                if ($key->object == 'Bus') {
                    $bus[] = $key->counter;
                }
           

            }
        }


        $data = array(
            'date_array' => $date_array,
            'time_array' => $time_array,
            'mobil' => $mobil,
            'sepeda' => $sepeda,
            'motor' => $motor,
            'truck' => $truck,
            'orang' => $orang,
            'bus' => $bus,
        );


          echo json_encode($data);


    }
    
    public function update($id) 
    {
        $this->hak_akses();
        $row = $this->Camera_log_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('camera_log/update_action'),
			'id' => set_value('id', $row->id),
			'detector_id' => set_value('detector_id', $row->detector_id),
			'object' => set_value('object', $row->object),
			'timestamp' => set_value('timestamp', $row->timestamp),
	    );
            $this->load->view('camera_log/camera_log_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('camera_log'));
        }
    }
    
    public function update_action() 
    {
        $this->hak_akses();
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
			'detector_id' => $this->input->post('detector_id',TRUE),
			'object' => $this->input->post('object',TRUE),
			'timestamp' => $this->input->post('timestamp',TRUE),
	    );

            $this->Camera_log_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('camera_log'));
        }
    }
    
    public function delete($id) 
    {
        $this->hak_akses();
        $row = $this->Camera_log_model->get_by_id($id);

        if ($row) {
            $this->Camera_log_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('camera_log'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('camera_log'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('detector_id', 'detector id', 'trim|required');
	$this->form_validation->set_rules('object', 'object', 'trim|required');
	$this->form_validation->set_rules('timestamp', 'timestamp', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Camera_log.php */
/* Location: ./application/controllers/Camera_log.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-23 03:01:23 */
/* http://harviacode.com */