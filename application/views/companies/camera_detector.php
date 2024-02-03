<?php $this->load->view('layout/header');?>
<div class="container-fluid p-3">
	<h3>Edit Detector Kamera <i class="fa fa-video"></i></h3>
	<h4 style="margin-top:0px">Nama : <?php echo $data_camera[0]->name; ?> </h4>
	<hr>

	<div id="line_button_group">
      <a onclick="edit_line_start()" type="button" class="btn btn-lg btn-primary">Edit Line Start <i class="fa fa-edit"></i> </a>
      <!-- <a onclick="edit_line_end()" ype="button" class="btn btn-lg btn-primary ms-3">Edit Line End <i class="fa fa-edit"></i> </a> -->
   </div>
   
   <di id="line_editor">

   </div>

	<hr>
	 <br>
	<input type="hidden" id="company_id_input" value="<?php echo $id ?>">
   <input type="hidden" id="id_camera" value="<?php echo $data_camera[0]->id;  ?>">

	<!-- Canvas Line  -->
   <?php 
   $id_cam = $data_camera[0]->id;
   ?>
	<canvas  style="background-image: url(<?php echo base_url("node_js_server/server_ip_camera/cam_id_$id_cam/output.jpg") ?>); background-size: 1000px 720px;"   id="drawContainer" width="1000px"  height="720px" style="border: 1px solid #333"></canvas>
	<hr>


<input type="hidden" id="lat_map" value="<?php echo $lat; ?>">
<input type="hidden" id="lng_map" value="<?php echo $lng; ?>">
<?php $this->load->view('layout/footer');?>


<!-- End Camera Code -->

<script>
   
const canvasEle = document.getElementById('drawContainer');
const context = canvasEle.getContext('2d');



let startPosition = {x: 0, y: 0}; //point a
let lineCoordinates = {x: 0, y: 0}; //point b
let isDrawStart = false;
let isDrawline_start = false;
let isDrawline_end = false;





const get_drawLine = (start_x,start_y,end_x,end_y,color) => {
	console.log('tes',end_y);
   context.beginPath();
   context.moveTo(start_x, start_y);
   context.lineTo(end_x, end_y);
   context.stroke();
   context.lineWidth = 4;
   context.strokeStyle = ""+color+"";
}
get_line();
get_line();

function get_line() {

	var id_camera = $('#id_camera').val();
	$.ajax({
    url: '<?=site_url('Camera/get_line')?>',
    type: 'GET',
    dataType: 'json',
    data: {camera_id: id_camera},
    }).done(function(data) {
		
		for (let i = 0; i < data['line_data'].length; i++) {
			let line_order = data['line_data'][i].line_order;
			let start_x = Number(data['line_data'][i].point_a_x);
			let start_y = Number(data['line_data'][i].point_a_y);
			let end_x = Number(data['line_data'][i].point_b_x);
			let end_y = Number(data['line_data'][i].point_b_y);
			let color = '';
			if (line_order == 'start') {
				color = '#FF0000';
			}
			if (line_order == 'end') {
				color = '#fcad03';
			}

				get_drawLine(start_x,start_y,end_x,end_y,color);
		
		}


	});
}


function edit_line_start(params) {
   isDrawline_start = true;
   $('#line_editor').html('');
   $('#line_editor').html('<a onclick="save_line_start()" type="button" class="btn btn-lg btn-primary ms-3">Save Line Start <i class="fa fa-save"></i> </a> <a onclick="cancel_edit()" type="button" class="btn btn-lg btn-primary ms-3">Cancel  </a>')
   $('#line_button_group').hide();
   $('#line_editor').show();
   clearCanvas();
}


function edit_line_end(params) {
   isDrawline_end = true;
   $('#line_editor').html('');
   $('#line_editor').html('<a onclick="save_line_end()" type="button" class="btn btn-lg btn-primary ms-3">Save Line End <i class="fa fa-save"></i> </a> <a onclick="cancel_edit()" type="button" class="btn btn-lg btn-primary ms-3">Cancel  </a>')
   $('#line_button_group').hide();
   $('#line_editor').show();
   clearCanvas();
}

function cancel_edit(params) {
   isDrawline_start = false;
   isDrawline_end = false;
   $('#line_button_group').show();
   $('#line_editor').hide();
      get_line();
      get_line();

}

function save_line_start() {
   $('#line_button_group').show();
   $('#line_editor').hide();
   isDrawline_start = false;

   let point_a_x = startPosition.x;
   let point_a_y = startPosition.y;
   let point_b_x = lineCoordinates.x;
   let point_b_y = lineCoordinates.y;
   let id_camera = $('#id_camera').val();

   $.ajax({
    url: '<?=site_url('Camera/edit_line_save')?>',
    type: 'GET',
    dataType: 'json',
    data: {
      camera_id: id_camera,
      point_a_x:point_a_x,
      point_a_y:point_a_y,
      point_b_x:point_b_x,
      point_b_y:point_b_y,
      line_type:'start'
   },
    }).done(function(data) {
      get_line();
      get_line();

   });

}

function save_line_end() {
   $('#line_button_group').show();
   $('#line_editor').hide();
   isDrawline_end = false;

   let point_a_x = startPosition.x;
   let point_a_y = startPosition.y;
   let point_b_x = lineCoordinates.x;
   let point_b_y = lineCoordinates.y;
   let id_camera = $('#id_camera').val();

   $.ajax({
    url: '<?=site_url('Camera/edit_line_save')?>',
    type: 'GET',
    dataType: 'json',
    data: {
      camera_id: id_camera,
      point_a_x:point_a_x,
      point_a_y:point_a_y,
      point_b_x:point_b_x,
      point_b_y:point_b_y,
      line_type:'end'
   },
    }).done(function(data) {
      get_line();
      get_line();

   });

}





const getClientOffset = (event) => {
    const {pageX, pageY} = event.touches ? event.touches[0] : event;
    const x = pageX - canvasEle.offsetLeft;
    const y = pageY - canvasEle.offsetTop;

    return {
       x,
       y
    } 
}



const drawLine = () => {
   context.beginPath();
   context.moveTo(startPosition.x, startPosition.y);
   context.lineTo(lineCoordinates.x, lineCoordinates.y);
   context.stroke();
   context.lineWidth = 4;
   
   if(isDrawline_start == true ){
      context.strokeStyle = "#fcad03";
   } else{
      context.strokeStyle = "#FF0000";
   }



}

const mouseDownListener = (event) => {
   startPosition = getClientOffset(event);
   isDrawStart = true;
}

const mouseMoveListener = (event) => {

   if(isDrawline_start == false && isDrawline_end == false ) return;

   if(!isDrawStart) return;
  
  lineCoordinates = getClientOffset(event);
  clearCanvas();
  drawLine();
}

const mouseupListener = (event) => {
  isDrawStart = false;
}

const clearCanvas = () => {
   context.clearRect(0, 0, canvasEle.width, canvasEle.height);
}

canvasEle.addEventListener('mousedown', mouseDownListener);
canvasEle.addEventListener('mousemove', mouseMoveListener);
canvasEle.addEventListener('mouseup', mouseupListener);

canvasEle.addEventListener('touchstart', mouseDownListener);
canvasEle.addEventListener('touchmove', mouseMoveListener);
canvasEle.addEventListener('touchend', mouseupListener);

</script>