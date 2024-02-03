<script>
var map;
var map_modal;
var center_pos = null;
function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: -7.747872, lng: 110.4218147},
		zoom: 15
	});

	// Try HTML5 geolocation.
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			center_pos = {
				lat: position.coords.latitude,
				lng: position.coords.longitude
			};
			map.setCenter(center_pos);
		}, function() {
			// handleLocationError(true, infoWindow, map.getCenter());
			center_pos = {lat: -7.747872, lng: 110.4218147};
			map.setCenter(center_pos);
		});
	} else {
		// Browser doesn't support Geolocation
		center_pos = {lat: -7.747872, lng: 110.4218147};
		map.setCenter(center_pos);
	}
}
</script>
<script>
var traffic_list = [];
var marker_traffic_list = [];
var info = null;
function draw_marker_traffic(traffic) {
	var id = parseInt(traffic.traffic_id);
	// var marker_traffic = new google.maps.Marker({
	marker_traffic_list[id] = new google.maps.Marker({
		animation : google.maps.Animation.DROP,
		// icon: '<?php echo base_url('assets/img/icon_controller_pju.png')?>',
		// icon: '<?php echo base_url('assets/img/icon_controller_pju_2.png')?>',
		position:{
			lat: parseFloat(traffic.traffic_gps_lat),
			lng: parseFloat(traffic.traffic_gps_lng)
		},
		map:map,
		title:traffic.traffic_nama
	});
	marker_traffic_list[id].addListener('click',function(){
		map.setZoom(15);
		map.panTo(this.position);
		var info_konten = '';
		info_konten += '';
		info_konten += '<h4>';
		info_konten += 'Traffic Controller - ';
		info_konten += id;
		info_konten += '</h4>';
		// info_konten += '<hr>';
		info_konten += '<input type="hidden" id="traffic_id" value="'+id+'">';
		info_konten += '<table id="traffic_table">';
		// {"itsc-m":"1","f":"MMMKMMMH","cr":"5-40-75-0-5-40-75-0","cg":"0-0-0-1-0-0-0-1","sp":"136-10"}

		info_konten += '<tr>';
		for (let i = 0; i < 8; i++) {
			info_konten += '<td class="text-center">';
			info_konten += '<img src="<?php echo base_url('assets/img/traffic/d.png')?>" height="70px" style="margin:15px">';
			info_konten += '<br>';
			// info_konten += '<br>';
			info_konten += '<b>';
			info_konten += 'Fase ';
			info_konten += i+1;
			info_konten += '</b>';
			info_konten += '</td>';
			if ((i+1)%4==0) {
				info_konten += '</tr>';
				info_konten += '<tr>';
			}
		}
		info_konten += '</tr>';

		info_konten += '</table>';
		if(info==null){
			info = new google.maps.InfoWindow({
				content:info_konten,
				position:this.position
			});
		}else{
			info.setContent(info_konten);
			info.position = this.position;
		}
		info.open(map,marker_traffic_list[id]);
	});
}
function get_traffic(id=null) {
	var url = '<?php echo base_url('traffic/json/')?>';
	if (id!=null) {
		url += id;
	}
	$.ajax({
		url:url,
		success:function(data){
			traffic_list = [];
			for (let i = 0; i < marker_traffic_list.length; i++) {
				const marker = marker_traffic_list[i];
				if(marker!=undefined){
					marker.setMap(null);
				}
			}
			for (let i = 0; i < data.length; i++) {
				const traffic = data[i];
				// console.log(traffic);
				traffic_list.push(traffic);
				draw_marker_traffic(traffic);
			}
		}
	});
}
get_traffic();
</script>
<script>
function setMapStyle(map,style) {
	map.setOptions({styles:style});
}
var rad = function(x) {
  return x * Math.PI / 180;
};
// hitung jarak 2 marker dalam meter
var getDistance = function(p1, p2) {
  var R = 6378137; // Earth’s mean radius in meter
  var dLat = rad(p2.lat() - p1.lat());
  var dLong = rad(p2.lng() - p1.lng());
  var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
    Math.cos(rad(p1.lat())) * Math.cos(rad(p2.lat())) *
    Math.sin(dLong / 2) * Math.sin(dLong / 2);
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
  var d = R * c;
  return d; // returns the distance in meter
};
function smoothZoom (map, max, cnt) {
	if (cnt >= max) {
		return;
	}
	else {
		z = google.maps.event.addListener(map, 'zoom_changed', function(event){
			google.maps.event.removeListener(z);
			smoothZoom(map, max, cnt + 1);
		});
		setTimeout(function(){map.setZoom(cnt)}, 80);
	}
}
</script>
<!-- 
	API KEY akun javis
	AIzaSyAJGxbuldQVV1qodn-Ge3uSqoe7rWRg8vk
	Baru:
	AIzaSyCnTyLMTagAytZaQfW7pcZTFAd1p3NE7Bc
	Baru lagi:
	AIzaSyCnTyLMTagAytZaQfW7pcZTFAd1p3NE7Bc
-->
<!-- bikin map api key : https://developers.google.com/maps/documentation/javascript/get-api-key -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJGxbuldQVV1qodn-Ge3uSqoe7rWRg8vk&callback=initMap"
async defer></script> -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnTyLMTagAytZaQfW7pcZTFAd1p3NE7Bc&callback=initMap" async defer></script>