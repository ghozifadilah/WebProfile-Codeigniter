<script>
    
function graph_detector(id_data) {

var id_object = $('#id_object').val();
var start_date = $('#start_date').val();
var start_time = $('#start_time').val();
var end_date = $('#end_date').val();
var end_time = $('#end_time').val();
var minute = $('#minute_diagram').val();


id_data = id_data;
$.ajax({
url: '<?=site_url('Camera_log/log_deteksi/')?>',
type: 'GET',
dataType: 'json',
data: 
{
    id_object: id_object,
    start_date: start_date,
    start_time: start_time,
    end_date: end_date,
    end_time: end_time,
    minute: minute,

},
}).done(function(data) { 
     
    //hitung total object
    counting_object(data);
   

    var date_array = data.date_array;
    var time_array = data.time_array;
    var mobil = data.mobil;
    var bus = data.bus;
    var motor = data.motor;
    var orang = data.orang;
    var sepeda = data.sepeda;
    var truck = data.truck;

    if (id_data == 1) {
        deteksi_mobil(date_array,time_array,mobil,bus,motor,orang,sepeda,truck);

    }
    else if (id_data == 2) {
        deteksi_bus(date_array,time_array,mobil,bus,motor,orang,sepeda,truck);

    }
    else if (id_data == 3) {
        deteksi_motor(date_array,time_array,mobil,bus,motor,orang,sepeda,truck);

    }else if (id_data == 5){
        deteksi_orang(date_array,time_array,mobil,bus,motor,orang,sepeda,truck);

    }else if (id_data == 4){
        deteksi_sepeda(date_array,time_array,mobil,bus,motor,orang,sepeda,truck);

    }else if (id_data == 6){
        deteksi_truck(date_array,time_array,mobil,bus,motor,orang,sepeda,truck);

    }else if (id_data == 7){
        deteksi_all(date_array,time_array,mobil,bus,motor,orang,sepeda,truck);
    }



    
    // var cetak = '<a target="_blank" href="<?=base_url('Log_dc/cetak_dc/')?>'+id_object+'/'+start_date+'/'+end_date+'/'+start_time+'/'+end_time+'/'+minute+'" class="btn btn-primary mt-4 " > <i class="fa fa-print"></i> Print </a>';
    // $('.cetak_print').html(cetak);
});


}

function counting_object(data) {
    var count_mobil = 0;
    var count_bus = 0;
    var count_motor = 0;
    var count_orang = 0;
    var count_sepeda = 0;
    var count_truck = 0;

    for (let cm = 0; cm <  data.mobil.length; cm++) {
        count_mobil = Number(count_mobil) + Number(data.mobil[cm]);
    }
    for (let cm = 0; cm <  data.bus.length; cm++) {
        count_bus = Number(count_bus) + Number(data.bus[cm]);
    }
    for (let cm = 0; cm <  data.motor.length; cm++) {
        count_motor = Number(count_motor) + Number(data.motor[cm]);
    }
    for (let cm = 0; cm <  data.orang.length; cm++) {
        count_orang = Number(count_orang) + Number(data.orang[cm]);
    }
    for (let cm = 0; cm <  data.sepeda.length; cm++) {
        count_sepeda= Number(count_sepeda) + Number(data.sepeda[cm]);
    }
    for (let cm = 0; cm <  data.truck.length; cm++) {
        count_truck= Number(count_truck) + Number(data.truck[cm]);
    }

    $('#car_count').text(count_mobil);
    $('#bus_count').text(count_bus);
    $('#smoto_count').text(count_motor);
    $('#sepeda_count').text(count_sepeda);
    $('#Orang_count').text(count_orang);
    $('#truck_count').text(count_truck);


}


function deteksi_mobil(date_array,time_array,mobil,bus,motor,orang,sepeda,truck) {

$('#container_log').html('');
$('#container_log').html('<h4 class="mt-2 text-center ">Deteksi Mobil</h4><canvas id="log_chart"></canvas>');


const labels = time_array;
const data = {
labels: labels,
datasets: [
    {
    label: 'Mobil',
    data: mobil,
    borderColor: '#98eb34',
    backgroundColor: '#98eb34',
    fill : false,
    },
   
]
};
const config = {
type: 'line',
data: data,
options: {
responsive: true,
title: {
    display: true,
    text: 'Object'
},
animation:{
    duration: 0,
},
tooltips: {
    mode: 'index',
    intersect: false,
},
hover: {
    mode: 'nearest',
    animationDuration: 0,
    intersect: true
},
scales: {
    xAxes: [{
        display: true,
        scaleLabel: {
            display: true,
            labelString: 'Date'
        }
    }],
    yAxes: [{
        display: true,
        scaleLabel: {
            display: true,
            labelString: 'Nilai'
        }
    }]
}
}
};

    new Chart(
    $('#log_chart'),
    config
    );

}

function deteksi_bus(date_array,time_array,mobil,bus,motor,orang,sepeda,truck) {

$('#container_log').html('');
$('#container_log').html('<h4 class="mt-2 text-center ">Deteksi Bus</h4><canvas id="log_chart"></canvas>');


const labels = time_array;
const data = {
labels: labels,
datasets: [
    {
    label: 'Bus',
    data: bus,
    borderColor: '#f59b42',
    backgroundColor: '#f59b42',
    fill : false,
    },
   
]
};
const config = {
type: 'line',
data: data,
options: {
responsive: true,
title: {
    display: true,
    text: 'Object'
},
animation:{
    duration: 0,
},
tooltips: {
    mode: 'index',
    intersect: false,
},
hover: {
    mode: 'nearest',
    animationDuration: 0,
    intersect: true
},
scales: {
    xAxes: [{
        display: true,
        scaleLabel: {
            display: true,
            labelString: 'Date'
        }
    }],
    yAxes: [{
        display: true,
        scaleLabel: {
            display: true,
            labelString: 'Nilai'
        }
    }]
}
}
};

    new Chart(
    $('#log_chart'),
    config
    );

}

function deteksi_motor(date_array,time_array,mobil,bus,motor,orang,sepeda,truck) {

$('#container_log').html('');
$('#container_log').html('<h4 class="mt-2 text-center ">Deteksi Sepeda Motor</h4><canvas id="log_chart"></canvas>');


const labels = time_array;
const data = {
labels: labels,
datasets: [
    {
    label: 'Motor',
    data: motor,
    borderColor: '#42d1f5',
    backgroundColor: '#42d1f5',
    fill : false,
    },
   
]
};
const config = {
type: 'line',
data: data,
options: {
responsive: true,
title: {
    display: true,
    text: 'Object'
},
animation:{
    duration: 0,
},
tooltips: {
    mode: 'index',
    intersect: false,
},
hover: {
    mode: 'nearest',
    animationDuration: 0,
    intersect: true
},
scales: {
    xAxes: [{
        display: true,
        scaleLabel: {
            display: true,
            labelString: 'Date'
        }
    }],
    yAxes: [{
        display: true,
        scaleLabel: {
            display: true,
            labelString: 'Nilai'
        }
    }]
}
}
};

    new Chart(
    $('#log_chart'),
    config
    );

}

function deteksi_orang(date_array,time_array,mobil,bus,motor,orang,sepeda,truck) {

$('#container_log').html('');
$('#container_log').html('<h4 class="mt-2 text-center ">Deteksi Orang</h4><canvas id="log_chart"></canvas>');


const labels = time_array;
const data = {
labels: labels,
datasets: [
    {
    label: 'Orang',
    data: orang,
    borderColor: '#f54842',
    backgroundColor: '#f54842',
    fill : false,
    },
   
]
};
const config = {
type: 'line',
data: data,
options: {
responsive: true,
title: {
    display: true,
    text: 'Object'
},
animation:{
    duration: 0,
},
tooltips: {
    mode: 'index',
    intersect: false,
},
hover: {
    mode: 'nearest',
    animationDuration: 0,
    intersect: true
},
scales: {
    xAxes: [{
        display: true,
        scaleLabel: {
            display: true,
            labelString: 'Date'
        }
    }],
    yAxes: [{
        display: true,
        scaleLabel: {
            display: true,
            labelString: 'Nilai'
        }
    }]
}
}
};

    new Chart(
    $('#log_chart'),
    config
    );

}


function deteksi_sepeda(date_array,time_array,mobil,bus,motor,orang,sepeda,truck) {

$('#container_log').html('');
$('#container_log').html('<h4 class="mt-2 text-center ">Deteksi Sepeda</h4><canvas id="log_chart"></canvas>');


const labels = time_array;
const data = {
labels: labels,
datasets: [
   { label: 'Sepeda',
    data: sepeda,
    borderColor: '#9042f5',
    backgroundColor: '#9042f5',
    fill : false,
    },
   
]
};
const config = {
type: 'line',
data: data,
options: {
responsive: true,
title: {
    display: true,
    text: 'Object'
},
animation:{
    duration: 0,
},
tooltips: {
    mode: 'index',
    intersect: false,
},
hover: {
    mode: 'nearest',
    animationDuration: 0,
    intersect: true
},
scales: {
    xAxes: [{
        display: true,
        scaleLabel: {
            display: true,
            labelString: 'Date'
        }
    }],
    yAxes: [{
        display: true,
        scaleLabel: {
            display: true,
            labelString: 'Nilai'
        }
    }]
}
}
};

    new Chart(
    $('#log_chart'),
    config
    );

}


function deteksi_truck(date_array,time_array,mobil,bus,motor,orang,sepeda,truck) {

$('#container_log').html('');
$('#container_log').html('<h4 class="mt-2 text-center ">Deteksi Truck</h4><canvas id="log_chart"></canvas>');


const labels = time_array;
const data = {
labels: labels,
datasets: [
   { label: 'Truck',
    data: truck,
    borderColor: '#f5427b',
    backgroundColor: '#f5427b',
    fill : false,
    },
   
]
};
const config = {
type: 'line',
data: data,
options: {
responsive: true,
title: {
    display: true,
    text: 'Object'
},
animation:{
    duration: 0,
},
tooltips: {
    mode: 'index',
    intersect: false,
},
hover: {
    mode: 'nearest',
    animationDuration: 0,
    intersect: true
},
scales: {
    xAxes: [{
        display: true,
        scaleLabel: {
            display: true,
            labelString: 'Date'
        }
    }],
    yAxes: [{
        display: true,
        scaleLabel: {
            display: true,
            labelString: 'Nilai'
        }
    }]
}
}
};

    new Chart(
    $('#log_chart'),
    config
    );

}

function deteksi_all(date_array,time_array,mobil,bus,motor,orang,sepeda,truck) {

$('#container_log').html('');
$('#container_log').html('<h4 class="mt-2 text-center ">Total Deteksi</h4><canvas id="log_chart"></canvas>');


const labels = time_array;
const data = {
labels: labels,
datasets: [
    {
    label: 'Truck',
    data: truck,
    borderColor: '#f5427b',
    backgroundColor: '#f5427b',
    fill : false,
    }, {
    label: 'Mobil',
    data: mobil,
    borderColor: '#98eb34',
    backgroundColor: '#98eb34',
    fill : false,
    },
  {
    label: 'Bus',
    data: bus,
    borderColor: '#f59b42',
    backgroundColor: '#f59b42',
    fill : false,
    },
{
    label: 'Motor',
    data: motor,
    borderColor: '#42d1f5',
    backgroundColor: '#42d1f5',
    fill : false,
    },
   {
    label: 'Orang',
    data: orang,
    borderColor: '#f54842',
    backgroundColor: '#f54842',
    fill : false,
    },
  {
    label: 'Sepeda',
    data: sepeda,
    borderColor: '#9042f5',
    backgroundColor: '#9042f5',
    fill : false,
    },

    
    
   
]
};
const config = {
type: 'line',
data: data,
options: {
responsive: true,
title: {
    display: true,
    text: 'Semua Object'
},
animation:{
    duration: 0,
},
tooltips: {
    mode: 'index',
    intersect: false,
},
hover: {
    mode: 'nearest',
    animationDuration: 0,
    intersect: true
},
scales: {
    xAxes: [{
        display: true,
        scaleLabel: {
            display: true,
            labelString: 'Date'
        }
    }],
    yAxes: [{
        display: true,
        scaleLabel: {
            display: true,
            labelString: 'Nilai'
        }
    }]
}
}
};

    new Chart(
    $('#log_chart'),
    config
    );

}



</script>