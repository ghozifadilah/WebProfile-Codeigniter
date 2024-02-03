<?php $this->load->view('layout/header');?>
<!-- Show flashdata cam_id -->
<input type="hidden" id="ip_web_setting" value="<?php echo $data_web_setting[0]->ip_websocket ?>">
<div class="container-fluid">
	<div class="row justify-content-center">
<div class="col-lg-3 ">
  <div class="crud_form_css">
  <h4 class="poppins_b"> <i class="fa fa-list"></i> Daftar Kamera</h4>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active"><a> <b>Sitemap :</b> </a></li>
      <li class="breadcrumb-item"><a href="<?php echo site_url('traffic')?>">Beranda</a></li>
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
  <div id="panel_data_camera" class="row ">
    <h5>Daftar Kamera :</h5>
    <input id="input_search" oninput="search_data()" class="form form-control" placeholder="Cari data Kamera ... "
      type="text">
      <div  style="height:852px;overflow:auto;" >
    <?php $no_urut = 0;  foreach ($camera_data as $camera) { ?>
    <div id="data_kamera_<?=$no_urut?>" class="col-md-12 reset_search  text-white mt-4">
      <div style="background-color:#05263e;box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.20);" class="card ">
      
        <div style="overflow:auto;" class="card-body">
        <div style="cursor: pointer;" onclick="data_clicked(<?= $no_urut ?>)" >
        
        <p style="font-size:14px;" class="poppins_b"><i id="icon_camera_<?= $no_urut ?>"
                class="fa fa-video"></i> &nbsp;&nbsp;
            <?php echo $camera->camera_name; ?> </p>
          
            
        </div>  
        
           
          <input type="hidden" value="<?php echo $camera->camera_name; ?>" id="camera_name_<?php echo $no_urut  ?>">
          <a title="Menampilkan Kamera CCTV"  onclick="data_clicked(<?= $no_urut ?>)" class="btn btn-sm btn-outline-warning ms-2 mt-2"> Tampilkan Kamera</i> </a>
          
          <a  title="Menghapus Data Kamera" onclick="hapus_camera(<?= $camera->camera_id ?>)" class="btn btn-sm btn-danger float-end ms-2 mt-2"><i
          class="fa fa-trash"></i> </a>
          
          <a  title="Mengubah Data Kamera" href="<?php echo base_url("Camera/update/$camera->camera_id") ?>"
          class="btn btn-sm btn-primary mt-2 float-end "><i class="fa fa-edit"></i> </a>
        </div>
       
       
   
        <div id="bar_stripe_<?php echo $no_urut ?>" style="background-color:green;height:5px;" class="float-start">
       
         </div>
        
      </div>
    </div>
    <?php
          $data_nama_camera[$no_urut] = $camera->camera_name;
          $no_urut++; } ?>
          </div>
  </div>
  </div>
</div>
     
        <div  class="col-lg-9 ">
         
          <div id="view_x1 " style="background-color:#05263e;overflow:auto;  border-radius:12px;display:block;">
          <div style="background-color:#05263e; width:1300px;height:1100px;" >
         
            <h5 style="font-size:13px;" class="mt-3 ms-3 text-white poppins_b">Pilih Tampilan :</h5>
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
              <p class="text-center" style="color:red" id="ws_error_notif_multi"></p>

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

	</div>

</div>

    <!-- End Modal Delete -->
    <div class="modal fade" id="modal_notif_hapus"  tabindex="-1">
      <div class="modal-dialog  modal-dialog-centered">
        <div style="width:420px;" class="modal-content">
        <div   style="background-color:#06385c;"  class="modal-header">
            <h5 class="modal-title poppins_b text-white"> <i class="fa fa-trash"></i> Hapus Kamera</h5>
            <input type="hidden" id="id_deleted_camera">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Apakah anda yakin menghapus data kamera ?</p>
            <div class="row justify-content-center">
              <div class="col-9 text-center">
                <p>masukan kode sebelum menghapus !</p>
                <input id="hidden_input_number" type="hidden">
                <h3 class="poppins_b" id="Number_delete"> </h3>
                <input oninput="remove_disabled()" id="inputan_number" placeholder="Masukan Kode" type="text"
                  class="input-form text-center">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <span id="btn_delete_camera">
              <!-- <a type="button" href="<?php echo site_url("traffic/delete/$traffic_id")?>" class="btn btn-danger" > Hapus</a> -->
            </span>
          </div>
        </div>
      </div>
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


   if (last_cam  == 999) {
       $('#canvas_video').html('');
    last_cam = id;

   }
   
    if(camera_showing.id.includes(id)){
     $('#canvas_'+id+'').show();
     
    }else{

    max_camera++;
    if (max_camera >= 5 ) {
      alert('Maksimal  Menampilkan 4 Kamera,  muat ulang halaman untuk menampilkan kamera lain');
      return;
    }

      
    $('#icon_camera_'+id+'').css('color','red');
    $('#bar_stripe_'+id+'').css('background-color','red');

   
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
$('#bar_stripe_'+id+'').css('background-color','red');

if(camera_showing.id.includes(id)){  
  return;
}else{
  camera_showing.id.push(id);
  var id_camera = id;
  loadPlayer({
    url: 'ws://'+ip_camera+':2001/cam/mstream/'+id_camera+'',
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

    // $('#btn_delete_camera').html('< type="button"  href="'+id+'" class="btn btn-danger" > Delete</a>')
    $('#id_deleted_camera').val(id);
    $('#btn_delete_camera').html('<button type="button"  href="#" class="btn btn-danger"  disabled > Hapus</button>')
    $('#modal_notif_hapus').modal('show');
    random_number();
}


function random_number(){
    var number_lenght = 4;
    var random_number = Math.random().toString().replace('0.', '');
   //substring to select only 4 characters
        var result = random_number.substring(0, number_lenght);
    $('#Number_delete').text(result);
    $('#hidden_input_number').val(result);
        console.log(result);
  }


  
  function remove_disabled() {
   var number_data =  $('#hidden_input_number').val();
   var number_inputan = $('#inputan_number').val();
  
   var id = $('#id_deleted_camera').val();
    if (number_data == number_inputan) {
        $('#btn_delete_camera').html('<a type="button" href="<?php echo base_url("camera/delete/")?>'+id+'" class="btn btn-danger" > Hapus</a>');
    }else{
        $('#btn_delete_camera').html('<button disabled type="button" href="#" class="btn btn-danger" > Hapus</button>')
    }


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
<?php $this->load->view('js/websocket/ws_camera_multi.php');?>
