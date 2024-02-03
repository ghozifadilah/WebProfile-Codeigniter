<script>
var map;
var map_detail;
var center_pos = null;



function initMap() {

	const styledMapType = new google.maps.StyledMapType(
        [
    {
        "featureType": "all",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "weight": "2.00"
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#9c9c9c"
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "color": "#f2f2f2"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "landscape.man_made",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "saturation": -100
            },
            {
                "lightness": 45
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#eeeeee"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#7b7b7b"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "color": "#46bcec"
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#c8d7d4"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#070707"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    }
],
    { name: "Custom Map" }
  );


	map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: -7.747872, lng: 110.4218147},
		zoom: 15,
		mapTypeControlOptions: {
        mapTypeIds: ["roadmap", "satellite", "hybrid", "terrain", "Dark"],
      },
		
    
		//color

	});
	map_detail = new google.maps.Map(document.getElementById('map_detail'), {
		center: {lat: -7.747872, lng: 110.4218147},
		zoom: 15,
		mapTypeControlOptions: {
        mapTypeIds: ["roadmap", "satellite", "hybrid", "terrain", "Dark"],
      },
		
    
		//color

	});

	map.mapTypes.set("Dark", styledMapType);
  map.setMapTypeId("Dark");
  map_detail.mapTypes.set("Dark", styledMapType);
  map_detail.setMapTypeId("Dark");

	

	// Try HTML5 geolocation.
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			center_pos = {
				lat: position.coords.latitude,
				lng: position.coords.longitude
			};
			map.setCenter(center_pos);
			map_detail.setCenter(center_pos);
		}, function() {
			// handleLocationError(true, infoWindow, map.getCenter());
			center_pos = {lat: -7.747872, lng: 110.4218147};
			map.setCenter(center_pos);
			mamap_detailp.setCenter(center_pos);
		});
	} else {
		// Browser doesn't support Geolocation
		center_pos = {lat: -7.747872, lng: 110.4218147};
		map.setCenter(center_pos);
		map_detail.setCenter(center_pos);
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


<!-- <script src="https://maps.googleapis.com/maps/api/staticmap?key=AIzaSyCnTyLMTagAytZaQfW7pcZTFAd1p3NE7Bc&callback=initMap&center=47.6497687174687,-122.3503433227539&zoom=12&format=png&maptype=roadmap&style=element:geometry%7Ccolor:0x242f3e&style=element:labels.text.fill%7Ccolor:0x746855&style=element:labels.text.stroke%7Ccolor:0x242f3e&style=feature:administrative.locality%7Celement:labels.text.fill%7Ccolor:0xd59563&style=feature:poi%7Celement:labels.text.fill%7Ccolor:0xd59563&style=feature:poi.park%7Celement:geometry%7Ccolor:0x263c3f&style=feature:poi.park%7Celement:labels.text.fill%7Ccolor:0x6b9a76&style=feature:road%7Celement:geometry%7Ccolor:0x38414e&style=feature:road%7Celement:geometry.stroke%7Ccolor:0x212a37&style=feature:road%7Celement:labels.text.fill%7Ccolor:0x9ca5b3&style=feature:road.highway%7Celement:geometry%7Ccolor:0x746855&style=feature:road.highway%7Celement:geometry.stroke%7Ccolor:0x1f2835&style=feature:road.highway%7Celement:labels.text.fill%7Ccolor:0xf3d19c&style=feature:transit%7Celement:geometry%7Ccolor:0x2f3948&style=feature:transit.station%7Celement:labels.text.fill%7Ccolor:0xd59563&style=feature:water%7Celement:geometry%7Ccolor:0x17263c&style=feature:water%7Celement:labels.text.fill%7Ccolor:0x515c6d&style=feature:water%7Celement:labels.text.stroke%7Ccolor:0x17263c " async defer></script> -->