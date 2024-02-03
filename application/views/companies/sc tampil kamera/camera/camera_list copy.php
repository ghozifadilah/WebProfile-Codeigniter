<?php $this->load->view('layout/header');?>
<!-- Show flashdata cam_id -->

<div class="container-fluid">
    <input type="hidden" id="ip_web_setting" value="<?php echo $data_web_setting[0]->ip_websocket ?>">
    <div class="row justify-content-center">
        <div   class="col-lg-3 col-md-3 col-sm-12 crud_form_css" >
        <h3 class="poppins_b"> <i class="fa fa-list"></i> Daftar Kamera</h3>
        <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active"><a> <b>Sitemap :</b> </a></li>
    <li class="breadcrumb-item"><a href="<?php echo site_url('traffic')?>">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Daftar Kamera</li>
  </ol>
</nav>

        <?php echo anchor(site_url('camera/create'),'<i class="fa fa-plus"> </i> Tambah Kamera', 'class="btn btn-primary"'); ?> 
        <!-- <a onclick="doSend_Web_service('refresh_cam');" class="btn btn-primary"> <i class="fa fa-sync"></i> Sync Kamera </a> -->
         
   <?php if ( $this->session->userdata('cam_id') == null ||  $this->session->userdata('cam_id') == '') { ?>
     <input value="1" type="hidden" id="choose_cam">
    <?php }else{ ?>
      <input value="<?= $this->session->userdata('cam_id') ?>" type="hidden" id="choose_cam">
      <?php } ?>



     
        <hr>
        <div id="panel_data_camera"   class="row ">
          <h5>List Data :</h5>
          <input   id="input_search" oninput="search_data()" class="form form-control" placeholder="Search Camera ... " type="text"> 
            <?php $no_urut = 0;  foreach ($camera_data as $camera) { ?>
                <div id="data_kamera_<?=$no_urut?>" class="col-md-6 reset_search  text-white mt-4">
                	<div style="background-color:#05263e;box-shadow: 2px 10px 11px -7px rgba(0,0,0,0.3);" class="card ">
                		<div  style="overflow:auto;height:150px;" class="card-body">
                			<p  style="font-size:14px;" class="poppins_b"><i class="fa fa-desktop"></i> <?php echo $camera->camera_name; ?> </p>
                            <hr>
                            <div class="text-center">
                                <a  style="background-color:#73c606;color:white;text-align:center;" onclick="data_clicked(<?= $no_urut ?>)" class="btn btn-md poppins_b  mt-2"> Show Camera <i id="icon_camera_<?= $no_urut ?>" class="fa fa-video"></i> </a>
                            </div>
                		    <input  type="hidden" value="<?php echo $camera->camera_name; ?>" id="camera_name_<?php echo $no_urut  ?>">
                            
                        </div>
                        <div></div>
                        <div style="background-color:#06385c ;" class="card-body  ">
                            <a onclick="hapus_camera(<?= $camera->camera_id ?>)" class="btn btn-sm btn-danger float-end ms-2" ><i class="fa fa-trash"></i> Hapus</a>    
                            
                            <a  href="<?php echo base_url("Camera/update/$camera->camera_id") ?>" class="btn btn-sm btn-primary float-end "><i class="fa fa-edit"></i> Edit</a>    
                        </div>
                	</div>
                </div>
            <?php
            $data_nama_camera[$no_urut] = $camera->camera_name;
            $no_urut++; } ?>
            </div>
        </div>
     
        <div id="view_x1" style="background-color:#05263e;overflow:auto; border-radius:12px;display:block;width:1300px;" class="col-md-8 ms-4 ">
        <!-- Panel Canvas Camera -->
        
        <h5 style="font-size:13px;" class="mt-3 text-white poppins_b">Pilih View :</h5>
        <?php if ( $this->session->userdata('cam_id') == 1 ||  $this->session->userdata('cam_id') == '') { ?>
          <button id="btn_v_1" onclick="get_view(1);" disabled class="btn btn-sm btn-danger"> <i class="fa fa-square"></i> Single Cam </button>
           <button id="btn_v_2" onclick="get_view(2);" class="btn btn-sm btn-primary"><i class="fa fa-box"> </i> Multi Cam </button> 
          <?php }else{ ?>
            <button id="btn_v_1" onclick="get_view(1);"  class="btn btn-sm btn-primary"> <i class="fa fa-square"></i>  Single Cam </button>
           <button id="btn_v_2" onclick="get_view(2);" disabled class="btn btn-sm btn-danger"><i class="fa fa-box"> </i> Multi Cam </button> 
       
          <?php } ?>
          <button id="btn_v_2" onclick="location.reload(true)" class="btn btn-sm btn-warning"><i class="fa fa-box"> </i> Reset Cam </button> 
          <hr>
          <p class="text-center" style="color:red" id="ws_error_notif"></p>
        
            <div class="panel panel-default">
              <div class="panel panel-heading">
                
              </div>
                <div class="panel-heading  text-center">
                    <h4 style="color:#fff" class="panel-title poppins_b mt-2">
                        <i class="fa fa-video"></i> Kamera : <span id="video_selected"></span>
                    </h4>
                </div>
            
                <div class="panel-body text-center">
                    <div class="mt-3 embed-responsive embed-responsive-16by9">

                    <?php if ( $this->session->userdata('cam_id') == 1 || $this->session->userdata('cam_id') == ''  ) { ?>
                      <canvas width="1080 "  height="720" style="background-color:black;"  id="canvas_default" class="embed-responsive-item"></canvas>
                      <?php }else{ ?>
                        <canvas width="1080 "  height="720" style="background-color:black;display:none;"  id="canvas_default" class="embed-responsive-item"></canvas>
                        <?php } ?>
                    
                     
                      <?php if ( $this->session->userdata('cam_id') == 2 ) { ?>
                      <div id="canvas_video_multi" style="background-color:#05263e;"  class="row justify-content-center">
                      <?php }else{ ?>
                        <div id="canvas_video_multi" style="background-color:#05263e;display:none;"  class="row justify-content-center">
                      <?php } ?>
                        <div class="col-md-6">
                        <p id="text_multi_1" style="color:white"></p>
                        <canvas width="626" id="canvas_view_1"  height="440" style="background-color:black;"   class="embed-responsive-item canvas"></canvas>
                        </div>
                        <div class="col-md-6">
                        <p id="text_multi_2" style="color:white"></p>
                        <canvas width="626"  id="canvas_view_2" height="440" style="background-color:black;"  class="embed-responsive-item canvas"></canvas>
                        </div>
                        <div class="col-md-6">
                        <p id="text_multi_3" style="color:white"></p>
                        <canvas width="626"  id="canvas_view_3" height="440" style="background-color:black;"   class="embed-responsive-item canvas"></canvas>
                        </div>
                        <div class="col-md-6">
                        <p id="text_multi_4" style="color:white"></p>
                        <canvas width="626"  id="canvas_view_4" height="440" style="background-color:black;"  class="embed-responsive-item canvas"></canvas>
                        </div>   
                      </div>
                        <?php $no_urut = 0;  foreach ($camera_data as $camera) { ?>
                        <div  id="canvas_video_<?= $no_urut ?>">
                            <canvas width="1080 "  height="720" style="background-color:black;display:none;"  id="canvas_<?= $no_urut ?>" class="embed-responsive-item"></canvas>
                        </div>
                        <?php $no_urut++; } ?>
                    </div>
                </div>
            </div>

        </div>

                        </div>
                        </div>

    </div>

    <!-- Modal Deletes -->
<div class="modal fade" id="modal_notif_hapus"  tabindex="-1">
  <div class="modal-dialog  modal-dialog-centered">
    <div style="width:320px;" class="modal-content">
      <div   style="background-image: linear-gradient(to right, #438fc8, #5e93cb, #7397ce, #859bd0, #95a0d1);"  class="modal-header">
        <h5 class="modal-title poppins_b text-white"> <i class="fa fa-trash"></i> Hapus Kamera</h5>
        <input type="hidden" id="id_deleted_camera">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin menghapus data kamera ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <span id="btn_delete_camera">
          <!-- <a type="button" href="<?php echo site_url("traffic/delete/$traffic_id")?>" class="btn btn-danger" > Hapus</a> -->
        </span>
      </div>
    </div>
  </div>
</div>

    <!-- End Modal Delete -->

</div>
<?php $this->load->view('layout/footer');?>
<div id="detec">
    <script src='https://cdn.jsdelivr.net/npm/rtsp-relay@1.6.1/browser/index.js'></script>
</div>
  <script>
  //https://cdn.jsdelivr.net/npm/rtsp-relay@1.6.1/browser/index.js
    var camera_showing= {
      'id':[],
    };
  var last_cam = 999;
  var max_camera = 0;

  //fungsi view camera single view


  function search_data() {
    var input_kamera = $('#input_search').val();
    if (input_kamera == '') {
      $('.reset_search').show();
      return;
    }

    var data_kamera = <?php echo json_encode($data_nama_camera); ?>;

    //jquery filter search
    var filter_kamera = $.grep(data_kamera, function(v) {
      return v.toLowerCase().indexOf(input_kamera.toLowerCase()) > -1;
    });

    //hide data_kamera_i if not in filter_kamera
    for (var i = 0; i < data_kamera.length; i++) {
      if (filter_kamera.indexOf(data_kamera[i]) == -1) {
        $('#data_kamera_' + i).hide();
      } else {
        $('#data_kamera_' + i).show();
      }
    } 
    console.log('filter',filter_kamera);
    

  
  }




  function data_clicked(id) {
    $('#canvas_default').hide();
    var view_data = $('#choose_cam').val();

    if (view_data == 1) {
      changeCamera(id);
    }else{
      multiChangeCamera(id);
      $('#canvas_video_multi').show();
      
    }

  }



function changeCamera(id){
  var ip_camera = $('#ip_web_setting').val();
  var view_data = $('#choose_cam').val();
    if (view_data == 2 ) {
      return;
    }

    var camera_name = $('#camera_name_'+id).val();
    $('#video_selected').text(camera_name);

    $('#icon_camera_'+id+'').css('color','red');
   if (last_cam  == 999) {
       $('#canvas_video').html('');
    last_cam = id;

   }
   
    if(camera_showing.id.includes(id)){
     $('#canvas_'+id+'').show();
     
    }else{

    max_camera++;
    if (max_camera > 4) {
      alert('Maksimal 3 kamera yang dapat ditampilkan');
      return;
    }
   
    camera_showing.id.push(id);
  
    var id_camera = id;
        
    loadPlayer({
        url: 'ws://'+ip_camera+':2000/cam/stream/'+id_camera+'',
        canvas: $('#canvas_'+id+'').get(0),
      });
	}

 
    if(last_cam != id) {
        $('#canvas_'+id+'').show();
        $('#canvas_'+last_cam+'').hide();
    }else{
        $('#canvas_'+last_cam+'').show();
    }
    last_cam = id;

    console.log(camera_showing);
}
    

//fungsi view camera multi view
var multi_camera = 1;
function multiChangeCamera(id) {
  var ip_camera = $('#ip_web_setting').val();
  var view_data = $('#choose_cam').val();
    if (view_data == 1 ) {
      return;
    }

if (multi_camera > 4 ) {
  return;
}


$('#icon_camera_'+id+'').css('color','red');

if(camera_showing.id.includes(id)){  
  return;
}else{
  camera_showing.id.push(id);
  var id_camera = id;
  loadPlayer({
    url: 'ws://'+ip_camera+':2000/cam/mstream/'+id_camera+'',
        canvas: $('#canvas_view_'+multi_camera+'').get(0),
  });

}

var camera_name = $('#camera_name_'+id).val();
$('#text_multi_'+multi_camera+'').text(camera_name);

console.log(camera_name);

  multi_camera++;
}
  


//modal hapus
function hapus_camera(id) {

    $('#btn_delete_camera').html('<a type="button" href="<?php echo base_url("camera/delete/")?>'+id+'" class="btn btn-danger" > Delete</a>')
    $('#modal_notif_hapus').modal('show');
    
}


function get_view(view) {
  console.log(view);
   //change color button into red color
$('#btn_v_'+view).css('background-color','#73c606');

 //disable button
$('#btn_v_1').attr('disabled',true);
$('#btn_v_2').attr('disabled',true);


 
$.ajax({
    url: '<?=site_url('Camera/change_cam')?>',
    type: 'post',
    dataType: 'json',
    data: {
        cam_view : view,
        },
    }).done(function(data) {

      if (data.status == 'ok') {
        location.reload(true);
      }

    });

//remove class btn-primary
// $('#btn_v_'+view).removeClass('btn-primary');
  $('#panel_data_camera').show();
  $('#choose_cam').val(view);
}


  </script>



    <?php $this->load->view('js/websocket/ws_camera.php');?>
