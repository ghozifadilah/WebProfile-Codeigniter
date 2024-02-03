<script>
var traffic_create_map = null;
var traffic_create_map_edit = null;
var traffic_create_marker = false;
var traffic_create_marker_edit = false;
var traffic_create_current_marker = null;

// $('#traffic-create-modal').on('shown.bs.modal',function(){
//     init_traffic_create_map();
// });

function init_traffic_create_map() {
    if (traffic_create_map==null) {
        traffic_create_map = new google.maps.Map(document.getElementById('map_traffic_create'), {
            center: {lat: -7.747872, lng: 110.4218147},
            zoom: 15,
            disableDefaultUI: true
        });
    }

    if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			center_pos = {
				lat: position.coords.latitude,
				lng: position.coords.longitude
			};
			traffic_create_map.setCenter(center_pos);
		}, function() {
			// handleLocationError(true, infoWindow, traffic_create_map.getCenter());
			center_pos = {lat: -7.747872, lng: 110.4218147};
			traffic_create_map.setCenter(center_pos);
		});
	} else {
		// Browser doesn't support Geolocation
		center_pos = {lat: -7.747872, lng: 110.4218147};
		traffic_create_map.setCenter(center_pos);
	}

    //Listen for any clicks on the map.
    google.maps.event.addListener(traffic_create_map, 'click', function(event) {                
        //Get the location that the user clicked.
        var clickedLocation = event.latLng;
        //If the marker hasn't been added.
        if(traffic_create_marker === false){
            //Create the marker.
            traffic_create_marker = new google.maps.Marker({
                animation : google.maps.Animation.DROP,
                // icon: '<?php echo base_url('assets/img/icon_pju.png')?>',
                position: clickedLocation,
                map: traffic_create_map,
                draggable: true //make it draggable
            });
            //Listen for drag events!
            google.maps.event.addListener(traffic_create_marker, 'dragend', function(event){
                markerLocationTrafficCreate();
                
            });
        } else{
            //Marker has already been added, so just change its location.
            traffic_create_marker.setPosition(clickedLocation);
        }
        //Get the marker's location.
        markerLocationTrafficCreate();
    });
}



//map untuk modal edit traffic
function init_traffic_edit_map() {


    //get current position
    var traffic_current_map = {traffic_lat:$('#traffic_lat_form').val(), traffic_lng:$('#traffic_lng_form').val()};
    var current_lat = parseFloat(traffic_current_map['traffic_lat']);
    var current_lng = parseFloat(traffic_current_map['traffic_lng']);
    


    traffic_create_map_edit = new google.maps.Map(document.getElementById("map_traffic_create"), {
                    zoom: 18,
                    center: center_pos,
    });
      



    if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			center_pos = {
				lat: current_lat,
				lng: current_lng
			};
			traffic_create_map_edit.setCenter(center_pos);
          
                  
                    
                    traffic_create_marker_edit = new google.maps.Marker({
                    animation : google.maps.Animation.DROP,
                    // icon: '<?php echo base_url('assets/img/icon_pju.png')?>',
                    position: center_pos ,
                    map: traffic_create_map_edit,
                    draggable: true //make it draggable
                });
                google.maps.event.addListener(traffic_create_marker_edit, 'dragend', function(event){
                markerLocationTrafficCreate_ModalEdit();
                
            });
        

     

           
		}, function() {
			// handleLocationError(true, infoWindow, traffic_create_map.getCenter());
			center_pos = {lat: current_lat, lng: current_lng};
			traffic_create_map_edit.setCenter(center_pos);
            
		});

	} else {
		// Browser doesn't support Geolocation
		center_pos = {lat: current_lat, lng: current_lng}
		traffic_create_map_edit.setCenter(center_pos);
        
	}



 //Listen for any clicks on the map.
 google.maps.event.addListener(traffic_create_map_edit, 'click', function(event) {                
        //Get the location that the user clicked.
        var clickedLocation = event.latLng;
        //If the marker hasn't been added.
        if(traffic_create_marker_edit === false){
            //Create the marker.
            traffic_create_marker_edit = new google.maps.Marker({
                animation : google.maps.Animation.DROP,
                // icon: '<?php echo base_url('assets/img/icon_pju.png')?>',
                position: clickedLocation,
                map: traffic_create_map_edit,
                draggable: true //make it draggable
            });
            //Listen for drag events!
            google.maps.event.addListener(traffic_create_marker_edit, 'dragend', function(event){
                markerLocationTrafficCreate_ModalEdit();
                
            });
        } else{
            //Marker has already been added, so just change its location.
            traffic_create_marker_edit.setPosition(clickedLocation);
        }
        //Get the marker's location.

      

        markerLocationTrafficCreate_ModalEdit();
    });


}

//maker location untuk modal Traffic

function markerLocationTrafficCreate_ModalEdit(){
    var currentLocation = traffic_create_marker_edit.getPosition();
    var currentLocation = traffic_create_marker_edit.getPosition();
    document.getElementById('traffic_lat_form').value = currentLocation.lat(); //latitude
    document.getElementById('traffic_lng_form').value = currentLocation.lng(); //longitude
    
}


function traffic_create_update_marker_input_ModalEdit(){
    var lat = document.getElementById('traffic_lat_form').value; //latitude
    var lng = document.getElementById('traffic_lng_form').value; //longitude
    
    if (
        (lat!='')
        &&
        (lng!='')
    ) {
        lat = parseFloat(lat);
        lng = parseFloat(lng);
        var new_marker_location = {
            lat: lat,
            lng: lng
        };
    
        //If the marker hasn't been added.
        if(traffic_create_marker_edit === false){
            //Create the marker.
            traffic_create_marker_edit = new google.maps.Marker({
                animation : google.maps.Animation.DROP,
                // icon: '<?php echo base_url('assets/img/icon_pju.png')?>',
                position: new_marker_location,
                map: traffic_edit_map,
                draggable: true //make it draggable
            });
            //Listen for drag events!
            google.maps.event.addListener(traffic_create_marker_edit, 'dragend', function(event){
                markerLocationTrafficCreate_ModalEdit();
            });
        } else{
            //Marker has already been added, so just change its location.
            traffic_create_marker_edit.setPosition(new_marker_location);
        }
    }
    
}



function markerLocationTrafficCreate(){
    var currentLocation = traffic_create_marker.getPosition();
    var currentLocation = traffic_create_marker.getPosition();
    document.getElementById('traffic_lat_form').value = currentLocation.lat(); //latitude
    document.getElementById('traffic_lng_form').value = currentLocation.lng(); //longitude
    
}

function traffic_create_update_marker_input(){
    var lat = document.getElementById('traffic_lat_form').value; //latitude
    var lng = document.getElementById('traffic_lng_form').value; //longitude
    
    if (
        (lat!='')
        &&
        (lng!='')
    ) {
        lat = parseFloat(lat);
        lng = parseFloat(lng);
        var new_marker_location = {
            lat: lat,
            lng: lng
        };
    
        //If the marker hasn't been added.
        if(traffic_create_marker === false){
            //Create the marker.
            traffic_create_marker = new google.maps.Marker({
                animation : google.maps.Animation.DROP,
                // icon: '<?php echo base_url('assets/img/icon_pju.png')?>',
                position: new_marker_location,
                map: traffic_create_map,
                draggable: true //make it draggable
            });
            //Listen for drag events!
            google.maps.event.addListener(traffic_create_marker, 'dragend', function(event){
                markerLocationTrafficCreate();
            });
        } else{
            //Marker has already been added, so just change its location.
            traffic_create_marker.setPosition(new_marker_location);
        }
    }
    
}

function setMapOnAll(map) {
  for (let i = 0; i < traffic_create_marker_edit.length; i++) {
    traffic_create_marker_edit[i].setMap(traffic_create_marker_edit);
  }
}

// Removes the markers from the map, but keeps them in the array.




</script>