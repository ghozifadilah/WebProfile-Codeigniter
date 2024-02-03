<?php $this->load->view('layout/header');?>
<div class="container-fluid p-3">
	<h2 style="margin-top:0px">Detail : <?php echo $name; ?> </h2>
	<input type="hidden" id="company_id_input" value="<?php echo $id ?>">
	<hr>
	<!-- Data Detail Perushaan -->
<div class="row justify-content-center">
	<div class="col-md-6 mt-4">
	<table style="font-size:19px;" class="table mt-5 ">
		<tr><td>Name</td><td><?php echo $name; ?></td></tr>
		<tr><td>Adresss</td><td><?php echo $adresss; ?></td></tr>
		<tr><td>Lat</td><td><?php echo $lat; ?></td></tr>
		<tr><td>Lng</td><td><?php echo $lng; ?></td></tr>
	</table>
	</div>
	<div class="col-md-5 mt-4">
		<p>Peta Lokasi :</p>
		<div  id="map" style="min-height:246px"></div>
	</div>
</div>
<!-- Data Camera -->
<hr>
<div class="row">
	<div class="col-md-12">
	<div class="card">
	<div class="card-body">
	<div class="row">
				<div class="col-auto">
					<a onclick="add_camera()" class="btn btn-primary"> Tambah Kamera <i  class=" fa fa-video"></i> </a>
				</div>
				<div class="col-auto">
					<a href="<?php echo base_url('stremers'); ?>" class="btn btn-primary"> Daftar Streamer  <i class=" fa fa-microchip"></i> </a>
				</div>
				
			</div>
		</div>
		</div>		
	</div>
</div>


<div class="row mt-3 ">
	<!-- List Kamera -->
	<div class="col-md-2 col-sm-12">
		<div style="box-shadow: 0px -8px 10px -2px rgba(0,0,0,0.12) inset;" class="card">
			<div style="height:860px;overflow:auto;"class="card-body">
			<i class="fa fa-list"></i> List Camera
			<hr>	
			
			<!-- LIST -->
			<?php
			$no_urut = 0;
			foreach ($data_camera as $k_camera) { ?>
	<a style="min-width:100%;"  onclick="data_clicked(<?= $no_urut ?>)" class="btn btn-outline-primary mt-2">	<?= $k_camera->name ?>  <i id="icon_camera_<?= $no_urut ?>" class="fa fa-video"></i></a>
	<div class="btn-group mt-2">
							<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle  " data-bs-toggle="dropdown" aria-expanded="false">
							<i class="fa fa-list"></i> Laporan
							</button>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="<?php echo base_url("camera_log/riwayat_deteksi/$k_camera->id") ?>">Laporan Detector </a></li>
							</ul>
						</div>
 						<div class="btn-group mt-2">
							<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle  " data-bs-toggle="dropdown" aria-expanded="false">
							<i class="fa fa-cog"></i>
							</button>

							<input type="hidden" id="camera_id_input_<?=$no_urut?>" value="<?= $k_camera->id ?>">
							<input type="hidden" id="camera_nama_input_<?=$no_urut?>" value="<?= $k_camera->name ?>">
							<input type="hidden" id="camera_ip_input_<?=$no_urut?>" value="<?= $k_camera->ip ?>">
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="<?php echo base_url("camera/camera_detector/$k_camera->id/$id") ?>"><i class="fa fa-microchip"></i> Ubah Detector </a></li>
								<li><a class="dropdown-item" href="<?php echo base_url("camera/update/$k_camera->id/$id") ?>"><i class="fa fa-edit"></i> Ubah Data </a></li>
								<li><a style="cursor: pointer;" class="dropdown-item" onclick="hapus_data(<?= $k_camera->id ?>)" ><i class="fa fa-trash"></i> Hapus  </a></li>
							</ul>
						</div>
					<input type="hidden" id="ip_streamer_<?=$no_urut?>" value="<?= $k_camera->ip ?>">
	<hr>
			
			<?php $no_urut++; } ?>
		<!-- END LIST -->
			</div>
		</div>
	</div>
	  
	<!-- End List Kamera -->
	<div class="col-md-8 col-sm-12">
	<div class="card">
			<div class="card-body">
		    <span id="title_kamera">
				<i class="fa fa-video"></i>
			</span>
			<div id="refresh_button">
			
			</div>
			<hr>
			
			</div>
			
			<div id="canvas_default" style="background-color:black;widht:1080px;height:720px;" class="card-body">
				
			</div>
			<?php 
			$no_urut = 0;
			foreach ($data_camera as $k_camera) { ?>
						 <div  id="canvas_video_<?= $no_urut ?>">
				
                        </div>
			<?php $no_urut++; } ?>
			
		

			<div id="daftar_rekam" class="card-body">
				 <!-- <a class="btn btn-primary" href="http://"> Daftar Rekaman <i class="fa fa-list"></i></a>	 -->
			<hr>
			
 <!-- orang
 sepeda
 mobil 
 motor 
 bis
 truck -->

			</div>
		</div>
	
	</div>
</div>
</div>


<input type="hidden" id="lat_map" value="<?php echo $lat; ?>">
<input type="hidden" id="lng_map" value="<?php echo $lng; ?>">
<?php $this->load->view('layout/footer');?>
<?php $this->load->view('js/map/map.php');?>

<!-- View->companies->js -->
<?php $this->load->view('companies/js/crud_camera.php');?>
<?php $this->load->view('companies/js/ws_camera.php');?>
<!-- View->companies->modal -->
<?php $this->load->view('companies/modal/add_modal.php');?>

<script>
setTimeout(() => {
	map_parse() 
}, 2000);


function hapus_data(id) {
	$('#modal_hapus').modal('show');
	$('#hapus_kamera').html('<a  href="<?php echo base_url('camera/delete/')?>'+id+'" type="button" class="btn btn-danger">Hapus</a>');
}


function map_parse() {
	
	var lat = $('#lat_map').val();
	var lng = $('#lng_map').val();

	let DataTraffic_lat = parseFloat(lat);
	let DataTraffic_lng = parseFloat(lng);


                const companyMapLATLNG = { lat: DataTraffic_lat , lng: DataTraffic_lng };
                const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 18,
                center: companyMapLATLNG,
                });

                new google.maps.Marker({
                animation : google.maps.Animation.DROP,
                position: companyMapLATLNG,
                map,
             
                });

}

</script>

<!-- Begin camera code -->

<div id="detec">
    <script src='https://cdn.jsdelivr.net/npm/rtsp-relay@1.6.1/browser/index.js'></script>
</div>

<script>
var camera_showing= {
'id':[],
};
var last_cam = 999;
var id_cam = 999;
var max_camera = 0;

// fungsi memulai memnampilkan kamera
function data_clicked(id) {
    $('#canvas_default').hide();
	$('#canvas_default').html('');
      changeCamera(id);
}



function changeCamera(id){
  var ip_camera = $('#ip_streamer_'+id+'').val();
  let id_camera_db = $('#camera_id_input_'+id+'').val();
  let kamera_name = $('#camera_nama_input_'+id+'').val();
  console.log('line 170 camera ip ',ip_camera);


    var camera_name = $('#camera_name_'+id).val();
    $('#video_selected').text(camera_name);

		if (last_cam  == 999) {
			$('#canvas_video').html('');
			last_cam = id;
			id_cam = id_camera_db
		}
	
	if(camera_showing.id.includes(id)){
		$('#canvas_'+id+'').show();
		$('#refresh_button').html('<hr><a class="btn btn-primary" onclick="refresh_camera('+id+')" > Reload <i class="fa fa-sync"></i> </a>');
		$('#title_kamera').html('<i class="fa fa-video"></i>' +kamera_name+'');

  	  }else{

			$('#icon_camera_'+id+'').css('color','red');
			$('#bar_stripe_'+id+'').css('background-color','red');
		
			camera_showing.id.push(id);
			
				var id_camera = id;
				let url_ws_camera = 'show_cameraID/'+id+'';
				$('#title_kamera').html('<i class="fa fa-video"></i>' +kamera_name+'')
				single_doSend_Web_service(url_ws_camera)
				$('#canvas_default').show();
				$('#canvas_default').html('<div syle="color:white;margin-left:63px;" class="line"></div><h5 class="text-white mt-4">Memuat Kamera, Silahkan Tunggu ... </h5>');

		setTimeout(() => {
			var html =''
			$('#canvas_default').hide();
			$('#canvas_default').html('');
			$('#refresh_button').html('<hr><a class="btn btn-primary" onclick="refresh_camera('+id+')" > Reload <i class="fa fa-sync"></i> </a>');
		
		 	html += '<div style="margin-top:-12px;"><label style="margin-left:20px;"> <b> Detection : <b></label> <br> <h5 style="margin-left:20px;">  <span id="person_cam_'+id_camera_db+'"> 0 </span> <i class="fa fa-user"></i>  | <span id="bicycle_cam_'+id_camera_db+'"> 0 </span>  <i class="fa fa-bicycle"></i> | <span id="car_cam_'+id_camera_db+'"> 0 </span> <i class="fa fa-car-side"></i> |  <span id="motorcycle_cam_'+id_camera_db+'"> 0 </span> <i class="fa fa-motorcycle"></i> | <span id="bus_cam_'+id_camera_db+'"> 0 </span> <i class="fa fa-bus"></i>  | <span id="truck_cam_'+id_camera_db+'"> 0 </span> <i class="fa fa-truck"></i> | </h5></div>';
			 html += '<video id="canvas_'+id+'"  class="embed-responsive-item video-js " width="1080" height="720" autoplay controls></video>';
			$('#canvas_video_'+id+'').html(html);
			let id_companies = $('#company_id_input').val();
			$('#daftar_rekam').html(' <a class="btn btn-primary" href="<?php echo base_url('camera/daftar_list_record/') ?>'+id_camera_db+'/'+id_companies+'"> Daftar Rekaman <i class="fa fa-list"></i></a>');
			// $('#canvas_video_'+id+'').html('<iframe  id="canvas_'+id+'" width="1080"  style=""  height="720" src="http://localhost:8888/mystream'+id_camera_db+'/" scrolling="no"></iframe>')
			var player1 = videojs('canvas_'+id+'');
			let ip_streamer = $('#camera_ip_input_'+id+'').val();
			player1.qualityPickerPlugin();
			// http://localhost/beacukai_camera/node_js_server/server_ip_camera/cam_id_6/stream_cam_6.m3u8
			//http://localhost/node_js_server/server_ip_camera/cam_id_6/
			// let url = 'http:/localhost/beacukai_camera/node_js_server/server_ip_camera/cam_id_'+id_camera_db+'/stream_cam_'+id_camera_db+'.m3u8';
			let url = 'http://'+ip_streamer+':3080/stream/cam_id_'+id_camera_db+'/stream_cam_'+id_camera_db+'.m3u8';
			player1.src({
				src: url,
				// src: 'http://localhost/beacukai_camera/node_js_server/server_ip_camera/cam_id_'+id_camera_db+'/stream_cam_'+id_camera_db+'.m3u8',
				type: 'application/x-mpegURL'
			});


			// player1.error() 
	
		



		player1.pause();
        player1.load();
        player1.play();

		player1.on('error', function() {
			refresh_camera(id);
		});

		}, 10000);


	}

	//jika camera yang dibuka terakhir tidak sama maka player yang terakhir dibuka akan di hidden
    if(last_cam != id) {
        $('#canvas_video_'+id+'').show();
        $('#canvas_video_'+last_cam+'').hide();
    }else{
        $('#canvas_video_'+last_cam+'').show();
    }
    last_cam = id;
	id_cam = id_camera_db


    // console.log(url_ws_camera);
}

function get_camera_log() {
	if (id_cam == 999) {
		return;
	}
	var camera_id = id_cam;
	var data_detectors = '';
	$.ajax({
    url: '<?=site_url('Camera_log/get_data_detector')?>',
    type: 'GET',
    dataType: 'json',
    data: {camera_id: camera_id},
    }).done(function(data) { 
		
		try { //jika tidak ada cache data detector
			data_detectors = data.data;
			var id_camera = data_detectors[1].replace("camera_id:", "");
		} catch (error) {
			return; 
		}
		
		var person = 0;
		var motorcycle = 0;
		var car = 0;
		var bus = 0;
		var bicycle = 0;
		var truck = 0;
	
	

		for (let i = 0; i < data_detectors.length; i++) {

			if(data_detectors[i].includes('person')){
				person = data_detectors[i].replace("person:", "");
			}
			if(data_detectors[i].includes('motorcycle')){
				motorcycle = data_detectors[i].replace("motorcycle:", "");
			}
			if(data_detectors[i].includes('car')){
				car = data_detectors[i].replace("car:", "");
			}
			if(data_detectors[i].includes('bus')){
				bus = data_detectors[i].replace("bus:", "");
			}
			if(data_detectors[i].includes('truck')){
				truck = data_detectors[i].replace("truck:", "");
			}
			
		}

		$('#bicycle_cam_'+id_camera+'').text(bicycle);
		$('#motorcycle_cam_'+id_camera+'').text(motorcycle);
		$('#car_cam_'+id_camera+'').text(car);
		$('#bus_cam_'+id_camera+'').text(bus);
		$('#truck_cam_'+id_camera+'').text(truck);
		$('#person_cam_'+id_camera+'').text(person);

	});

}
    

function refresh_camera(id) {
  var ip_camera = $('#ip_streamer_'+id+'').val();
  var ip_streamer = $('#camera_ip_input_'+id+'').val();
  console.log('ip_streamer',ip_streamer);
  let id_camera_db = $('#camera_id_input_'+id+'').val();
  let kamera_name = $('#camera_nama_input_'+id+'').val()
  $('#refresh_button').html('');
  $('#canvas_default').hide();
//   $('#canvas_video_'+id+'').html('');
  $('#icon_camera_'+id+'').css('color','red');
			$('#bar_stripe_'+id+'').css('background-color','red');
			camera_showing.id.push(id);
			
				var id_camera = id;
				let url_ws_camera = 'show_cameraID/'+id+'';
				$('#title_kamera').html('<i class="fa fa-video"></i>' +kamera_name+'')
				// single_doSend_Web_service(url_ws_camera)
				$('#canvas_video_'+id+'').hide();
				$('#canvas_default').show();
				$('#canvas_default').html('<div syle="color:white;margin-left:63px;" class="line"></div><h5 class="text-white mt-4">Memuat Kamera, Silahkan Tunggu ... </h5>');

		setTimeout(() => {
			$('#canvas_default').hide();
			$('#canvas_default').html('');
			$('#refresh_button').html('<hr><a class="btn btn-primary" onclick="refresh_camera('+id+')" > Reload <i class="fa fa-sync"></i> </a>');
			// $('#canvas_video_'+id+'').html('<video id="canvas_'+id+'"  class="embed-responsive-item video-js vjs-default-skin" width="640" height="360" autoplay controls></video>');

				var refresh = videojs('canvas_'+id+'');

				refresh.qualityPickerPlugin();
				// http://localhost/beacukai_camera/node_js_server/server_ip_camera/cam_id_6/stream_cam_6.m3u8
				let url = 'http://'+ip_streamer+':3080/stream/cam_id_'+id_camera_db+'/stream_cam_'+id_camera_db+'.m3u8';
				console.log('line  url',url);
				refresh.src({
					src: url,
					// src: 'http://localhost/beacukai_camera/node_js_server/server_ip_camera/cam_id_'+id_camera_db+'/stream_cam_'+id_camera_db+'.m3u8',
					type: 'application/x-mpegURL'
				});

				refresh.pause();
				refresh.load();
				refresh.play();
				$('#canvas_video_'+id+'').show();

		}, 4000);

}

setInterval(() => {
	get_camera_log();
}, 1000);



</script>


<!-- End Camera Code -->