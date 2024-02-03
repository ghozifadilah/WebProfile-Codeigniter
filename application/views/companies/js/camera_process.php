
<script>


function changeCamera(id){
  var ip_camera = 'localhost';
  var view_data = $('#choose_cam').val();


  
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
        
    var player1 = videojs('canvas_'+id+'');

player1.qualityPickerPlugin();


player1.src({
    src: 'http://localhost:8080/beacukai_camera/node_js_server/server_ip_camera/cam_id_6/stream_cam_6.m3u8',
    type: 'application/x-mpegURL'
});



player1.play();


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


</script>

   