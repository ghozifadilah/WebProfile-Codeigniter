<?php $this->load->view('layout/header');?>
<div class="container-fluid p-3">
	<h2 style="margin-top:0px"><i class="fa fa-list"></i> Daftar Rekaman </h2>
	<hr>
	<h5><i class="fa fa-video"></i> Kamera : <?php echo $data_camera[0]->name; ?> </h5>
	<h5><i class="fa fa-database"></i> Jumlah Rekaman : <?= $total_records ?> </h5>
	<input type="hidden" id="company_id_input" value="<?php echo $id ?>">
	<hr>

<!-- Data Camera -->
<div class="row mt-3 ">
	<!-- List Kamera -->
	<div class="col-md-2 col-sm-12">
		<div style="box-shadow: 0px -8px 10px -2px rgba(0,0,0,0.12) inset;" class="card">
			<div style="height:860px;overflow:auto;"class="card-body">
			<i class="fa fa-list"></i> List Rekaman
			<hr>	
			<!-- LIST -->
			<?php
			$no_urut = 0;
			foreach ($data_records as $d_record) { ?>
	<a style="min-width:100%;"  onclick="data_clicked(<?= $no_urut ?>)" class="btn btn-outline-primary mt-2">	<?= $d_record->timestamp ?>  <i id="icon_camera_<?= $no_urut ?>" class="fa fa-video"></i></a>

	<input value="<?= $d_record->id ?>" type="hidden" id="record_id_<?= $no_urut ?>">
	<input value="<?= $d_record->timestamp ?>" type="hidden" id="record_name_<?= $no_urut ?>">
	<hr>
			
			<?php $no_urut++; } ?>
		<!-- END LIST -->
			</div>
		</div>
	</div>
	<!-- End List Kamera -->
	<div class="col-md-8 col-sm-12">
	<div class="card">
		<div  class="card-body">
			<h5> <i class="fa fa-video"></i> Rekaman : <span id="video_selected"></span> </h5>
			<hr>
			<div id="btn_id_delete">
			
			</div>
				<hr>
				<div id="canvas_default" style="background-color:black;widht:1080px;height:720px;" class="card-body">
				
				</div>
				<?php 
				$no_urut = 0;
				foreach ($data_records as $d_record) { ?>
				
					 <div style="display:none;" id="record_file_<?= $no_urut ?>">
					
							<video width="1000" height="720" controls>
								<source src="<?php echo base_url("$d_record->file_url") ?>" >
							</video> 

					</div>
				
				<?php $no_urut++; } ?>
			</div>
			
			
			
		</div>
		
	</div>
</div>
	<!-- Data Detail Perushaan -->
	<!-- <div class="row justify-content-center">
	<div class="col-md-6 ">
	<table style="font-size:19px;" class="table mt-5 ">
		<tr><td>Jumlah Rekaman</td><td> 2 </td></tr>
		<tr><td>Adresss</td><td><?php echo $adresss; ?></td></tr>
	</table>
	</div>
	<div class="col-md-5 mt-4">
	
	</div>
	</div> -->


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



<!-- Begin camera code -->

<div id="detec">
    <script src='https://cdn.jsdelivr.net/npm/rtsp-relay@1.6.1/browser/index.js'></script>
</div>

<script>
var camera_showing= {
'id':[],
};
var last_cam = 999;
var max_camera = 0;

// fungsi memulai memnampilkan kamera
function data_clicked(id) {
    $('#canvas_default').hide();
	$('#canvas_default').html('');
      changeCamera(id);
}



function changeCamera(id){
  var ip_camera = $('#ip_streamer_'+id+'').val();
  let id_camera_db = $('#record_id_'+id+'').val();
  let kamera_name = $('#camera_nama_input_'+id+'').val();



    var camera_name = $('#record_name_'+id+'').val();
	console.log(id);
    $('#video_selected').text(camera_name);
$('#btn_id_delete').html('<a onclick="hapus_data('+id_camera_db+')" class="btn btn-danger">Hapus  <i class="fa fa-trash"></i> </a>');
		if (last_cam  == 999) {
			$('#canvas_video').html('');
			last_cam = id;
		}
	
	if(camera_showing.id.includes(id)){
		$('#canvas_'+id+'').show();
		$('#refresh_button').html('<hr><a class="btn btn-primary" onclick="refresh_camera('+id+')" > Reload <i class="fa fa-sync"></i> </a>');
		$('#title_kamera').html('<i class="fa fa-video"></i>' +kamera_name+'');

  	  }else{

			
		
			camera_showing.id.push(id);
			
				var id_camera = id;
				let url_ws_camera = 'show_cameraID/'+id+'';
				$('#title_kamera').html('<i class="fa fa-video"></i>' +kamera_name+'')
				$('#record_file_'+id+'').show();

	}

	//jika camera yang dibuka terakhir tidak sama maka player yang terakhir dibuka akan di hidden
    if(last_cam != id) {
        $('#record_file_'+id+'').show();
        $('#record_file_'+last_cam+'').hide();
    }else{
        $('#record_file_'+last_cam+'').show();
    }
    last_cam = id;


    // console.log(url_ws_camera);
}
    

function hapus_data(id) {
	$('#modal_hapus_record').modal('show');
	$('#hapus_recording').html('<a onclick="reload_page('+id+')" type="button" class="btn btn-danger">Hapus</a>');
}

function reload_page(id) {
	$.ajax({
    url: '<?=site_url('Records/delete/')?>',
    type: 'GET',
    dataType: 'json',
    data: {
        id_record: id,
    },
    }).done(function(data) { 

	location.reload();
    
    });

}

</script>


<!-- End Camera Code -->