<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Camera extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Camera_model');
        $this->load->model('Companies_model');
        $this->load->model('Detectors_model');
        $this->load->model('Stremers_model');
       
        $this->load->library('form_validation');
    }
    public function page_name()
    {
       return $page_name = 'camera';
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
        
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'camera/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'camera/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'camera/index.html';
            $config['first_url'] = base_url() . 'camera/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Camera_model->total_rows($q);
        $camera = $this->Camera_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'camera_data' => $camera,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('camera/camera_list', $data);
    }

    public function camera_detector($id_camera,$companies_id)
    {
        $this->hak_akses();

        $row = $this->Companies_model->get_by_id($companies_id);
        $data_camera= $this->db->query("SELECT * FROM stream_camera_list WHERE id = $id_camera")->result();
        $data_detectors= $this->db->query("SELECT * FROM detectors WHERE camera_id = $id_camera")->result();
       
        $data = array(
			'id' => $row->id,
			'name' => $row->name,
			'adresss' => $row->adresss,
			'lat' => $row->lat,
			'lng' => $row->lng,
			'data_camera' => $data_camera,
			'line_data' => $data_detectors,
	    );
    
        $this->load->view('companies/camera_detector', $data);
    }

    // membuat folder baru
    // public function tes()
    // {
    //     // $tes = base_url('assets/record/Streamer=1-ID=7-record/asdsad');
    //     mkdir('./sdfsdf/', 0777, TRUE);
    //     // echo $tes;
    // }

    public function daftar_list_record($id_camera,$companies_id)
    {
        $this->hak_akses();
        $row = $this->Companies_model->get_by_id($companies_id);
        $data_camera= $this->db->query("SELECT * FROM stream_camera_list WHERE id = $id_camera")->result();
        $data_detectors= $this->db->query("SELECT * FROM detectors WHERE camera_id = $id_camera")->result();
        $data_records= $this->db->query("SELECT * FROM records WHERE camera_id = $id_camera")->result();
        $total_records =  $this->db->query("SELECT *FROM records WHERE camera_id = $id_camera")->num_rows();
        $data = array(
			'id' => $row->id,
			'name' => $row->name,
			'adresss' => $row->adresss,
			'lat' => $row->lat,
			'lng' => $row->lng,
			'data_camera' => $data_camera,
			'data_records' => $data_records,
			'total_records' => $total_records,
	    );
    
        
        $this->load->view('companies/companies_list_record', $data);

    }


    public function get_line()
    {
        $this->hak_akses();
        $id_camera = $this->input->get('camera_id');
        $data_detectors= $this->db->query("SELECT * FROM detectors WHERE camera_id = $id_camera")->result();
        $data = array(
			'line_data' => $data_detectors,
	    );

        echo json_encode($data);

    }

    public function edit_line_save()
    {
        $this->hak_akses();
        $id_camera = $this->input->get('camera_id');
        $line_type = $this->input->get('line_type');
        //line order start
        $point_a_x = $this->input->get('point_a_x');
        $point_a_y = $this->input->get('point_a_y');
        $point_b_x = $this->input->get('point_b_x');
        $point_b_y = $this->input->get('point_b_y');

        $data_detectors = $this->db->query("SELECT * FROM detectors WHERE camera_id = $id_camera and line_order ='$line_type' ")->result();
        
        if ($line_type == 'start') {
            $data = array(
                'camera_id' => $id_camera,
                'point_a_x' => $point_a_x,
                'point_a_y' => $point_a_y,	
                'point_b_x' => $point_b_x,	
                'point_b_y' => $point_b_y,	
                'line_order' => 'start',	
            );
        }

        if ($line_type == 'end') {
            $data = array(
                'camera_id' => $id_camera,
                'point_a_x' => $point_a_x,
                'point_a_y' => $point_a_y,	
                'point_b_x' => $point_b_x,	
                'point_b_y' => $point_b_y,	
                'line_order' => 'end',	
            );
        }



        //update jika data_detector ditemukan
        if ($data_detectors != null) {
            $id_detector = $data_detectors[0]->id;
            $this->Detectors_model->update($id_detector, $data);
            
        }else{
        //insert baru jika data detector tidak ditemukan
        $this->Detectors_model->insert($data);
        }

        $data = array(
            'status' => 'ok',
        );

        echo json_encode($data);
       

    }


    public function read($id) 
    {
        $this->hak_akses();
        $row = $this->Camera_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'streamer_id' => $row->streamer_id,
			'name' => $row->name,
			'url' => $row->url,
	    );
            $this->load->view('camera/camera_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('camera'));
        }
    }

    public function tambah_camera() 
    {
        $this->hak_akses();
        
        $data = array(
            'button' => 'Create',
            'action' => site_url('camera/create_action'),
	    'id' => set_value('id'),
	    'streamer_id' => set_value('streamer_id'),
	    'name' => set_value('name'),
	    'url' => set_value('url'),
	);
        $this->load->view('camera/camera_form', $data);
        
    }

    public function create() 
    {
        $this->hak_akses();
        $data = array(
            'button' => 'Create',
            'action' => site_url('camera/create_action'),
	    'id' => set_value('id'),
	    'streamer_id' => set_value('streamer_id'),
	    'name' => set_value('name'),
	    'url' => set_value('url'),
	);
        $this->load->view('camera/camera_form', $data);
    }
    
    public function create_action() 
    {
        $this->hak_akses();
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
			'streamer_id' => $this->input->post('streamer_id',TRUE),
			'name' => $this->input->post('name',TRUE),
			'url' => $this->input->post('url',TRUE),
	    );

            $this->Camera_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('camera'));
        }
    }
    
    public function update($id,$companies_id) 
    {

        $this->hak_akses();
        $row = $this->Camera_model->get_by_id($id);
        $data_streamer = $this->Stremers_model->get_all($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('camera/update_action'),
                'companies_id' =>$companies_id ,
			'id' => set_value('id', $row->id),
			'streamer_id' => set_value('streamer_id', $row->streamer_id),
			'name' => set_value('name', $row->name),
              'data_streamers' =>  $data_streamer,
			'url' => set_value('url', $row->url),
	    );
            $this->load->view('camera/camera_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('camera'));
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
			'streamer_id' => $this->input->post('streamer_id',TRUE),
			'name' => $this->input->post('name',TRUE),
			'url' => $this->input->post('url',TRUE),
	    );

        $companies_id = $this->input->post('companies_id',TRUE);
            $this->Camera_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url("companies/read/$companies_id"));
        }
    }
    
    public function delete($id) 
    {
        $this->hak_akses();
        $row = $this->Camera_model->get_by_id($id);

        if ($row) {
            $this->Camera_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('camera'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('camera'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('streamer_id', 'streamer id', 'trim|required');
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('url', 'url', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Camera.php */
/* Location: ./application/controllers/Camera.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-23 03:01:23 */
/* http://harviacode.com */