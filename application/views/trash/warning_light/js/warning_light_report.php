<script>

function Online_status () {  

  var id = $('#wl_id').val();
  $.ajax({
    url: '<?=base_url('Warning_light/ajax_get_warning_light/')?>',
    type: 'GET',
    dataType: 'json',
    data: {id: id}
 
  }) .done(function(data) {
    let html_status = '';
     if (data.warning_light_status_online == 1) {
      html_status = '	<div class="card-body bg-green"><h3 class="card-title text-center"> <b>Online</b> <i class="fa fa-check"></i> </h3></div>' 
      $('#status').html(html_status);
      //console.log('online');
      return;
     }

     html_status = '	<div class="card-body bg-red"><h3 class="card-title text-center"> <b>Offline</b> <i class="fa fa-window-close"></i> </h3></div>' 
      $('#status').html(html_status);
      //console.log('offline');
  });
}


var detik = 1000;
var menit = 60 * detik;
var sepuluh_menit = 10 * menit;
setInterval(() => {
    // update();
    initMap(window.current_view);
    Online_status(window.current_view);
}, sepuluh_menit);




initMap();
function initMap() {
  var id = $('#wl_id').val();
  console.log(id);
  $.ajax({
    url: '<?=site_url('warning_light/ajax_get_warning_light')?>',
    type: 'GET',
    dataType: 'json',
    data: {id: id},
    })

.done(function(data) {
    //status online begin
    let html_status = '';
    if (data.warning_light_status_online == 1 ) {
      html_status = '	<div class="card-body bg-green"><h3 class="card-title text-center"> <b>Online</b> <i class="fa fa-check"></i> </h3></div>' 
      $('#status').html(html_status);
    }else{
      html_status = '	<div class="card-body bg-red"><h3 class="card-title text-center"> <b>Offline</b> <i class="fa fa-window-close"></i> </h3></div>' 
      $('#status').html(html_status);
    }
    //mode begin

    if (data.warning_light_mode == 1) {
        mode = 'Blinks';
        $("#wl-top").removeClass();
        $("#wl-bottom").removeClass();

        $( "#wl-top" ).addClass( 'image2 image_width wl-top blinks_'+data.warning_light_kecepatan+'ms' );
        $( "#wl-bottom" ).addClass( 'image3 image_width wl-bottom blinks_'+data.warning_light_kecepatan+'ms' );
    }
    if (data.warning_light_mode == 2) {
        mode = 'Flip flop';
        $("#wl-top").removeClass();
        $("#wl-bottom").removeClass();

        $( "#wl-top" ).addClass( 'image2 image_width wl-top flipflop_top_'+data.warning_light_kecepatan+'ms' );
        $( "#wl-bottom" ).addClass( 'image3 image_width wl-bottom flipflop_bottom_'+data.warning_light_kecepatan+'ms' );
    }
    if (data.warning_light_mode == 3) {
        mode = 'Double Flip Flop';
        $("#wl-top").removeClass();
        $("#wl-bottom").removeClass();

        $( "#wl-top" ).addClass( 'image2 image_width flip_flop2_top_main_'+data.warning_light_kecepatan+'ms' );
        $( "#wl-bottom" ).addClass( 'image3 image_width flipflop2_bottom_'+data.warning_light_kecepatan+'ms' );
    }

    if (data.warning_light_mode == 4) {
        mode = 'Slowed Blink';
        $("#wl-top").removeClass();
        $("#wl-bottom").removeClass();
        
        $( "#wl-top" ).addClass( 'image2 image_width wl-bottom slowed_blinks_'+data.warning_light_kecepatan+'ms' );
        $( "#wl-bottom" ).addClass( 'image3 image_width wl-bottom slowed_blinks_'+data.warning_light_kecepatan+'ms' );
    }


  //map begin
  let Datawarning_light_lat = parseFloat(data.warning_light_lat);
  let Datawarning_light_lng = parseFloat(data.warning_light_lng);
  
  const warning_lightLatLng = { lat: Datawarning_light_lat , lng: Datawarning_light_lng };
  const map = new google.maps.Map(document.getElementById("map_report"), {
    zoom: 18,
    center: warning_lightLatLng,
  });
  
  var map_icon = '';
   if (data.warning_light_status_online == 0) {
             map_icon = '<?php echo base_url('assets/img/WL-Offline.png')?>';
        }else{
             map_icon = '<?php echo base_url('assets/img/WL-Online.png')?>';
        }

  new google.maps.Marker({
    animation : google.maps.Animation.DROP,
    position: warning_lightLatLng,
    map,
    icon: map_icon

  });



});
}

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnTyLMTagAytZaQfW7pcZTFAd1p3NE7Bc&callback=initMap" async defer></script>