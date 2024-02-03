<script>

  var wsUri = "ws://192.168.0.112:8085";
  var output;
get_ip_db();
function get_ip_db(){


  wsUri = "ws://localhost:8085";
  single_Web_service_open();
  
}
 function single_Web_service_open(data) {

   single_websocket = new WebSocket(wsUri);
   console.log(single_websocket);
 
  var data_webservice = data;
  single_websocket.onclose = function(evt) { single_Close_service(evt) };
  single_websocket.onmessage = function(evt) { single_onMessage_Web_service(evt,data_webservice) };
  single_websocket.onerror = function(evt) { single_onError_Web_service(evt) };
  single_websocket.onopen = function(evt) { single_Open_service(evt) };
 
 }
 

  function single_Open_service(evt) {
    // doSend_edit_traffic(data_webservice);
  }

  function single_Close_service(data_webservice)
  {
    //writeToScreen("DISCONNECTED");
  }

  function single_onMessage_Web_service(evt)
  {

    // if (evt.data == 'Camera_data_refresh') {
    //   window.alert('Data kamera telah sinkorn dengan server kamera'); 
    // }

  }
  
  function single_onError_Web_service(evt)
  {
    console.log('error');
    $('#ws_error_notif').html('<i class="fa fa-exclamation-triangle"></i> Tidak dapat terhubung  dengan kamera '); 
  }

  function single_doSend_Web_service(data_webservice)
  {
    single_websocket.send(data_webservice);
  }



</script>