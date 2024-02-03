<?php $this->load->view('layout/header');?>
<?php $show_frekuensi = true; ?>
<h4 style="margin-left:80px;">Riwayat Konsumsi Daya</h4>
    <form style="margin-top:40px;" action="" method="GET" role="form">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-1"><label for="">Kontroller</label></div>
            <div class="col-md-3">
                <div class="form-group">
                    <select class="form-control" name="warning_light_id" id="warning_light_id" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach($data_warning_light as $k) { ?>
                        <?php 
                            $text = ''; 
                            if (($k->warning_light_sitename!=null)&&($k->warning_light_sitename!='')) {
                                $text.= $k->warning_light_sitename;
                            }else{
                                $text.= "kontroller PJU";
                            }
                            $text.= " (id: ";
                            $text.= $k->warning_light_id;
                            $text.= ")";
                        ?>
                        <option <?php echo ($k->warning_light_id==@$_GET['warning_light_id'])?'selected':'' ?> value="<?php echo $k->warning_light_id ?>"><?php echo $text ?></option>
                        <?php } ?>
                    </select>
                    
                </div>
            </div>
            <div class="col-md-2">
       
            </div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-1"><label for="">Bulan</label></div>
            <div class="col-md-3">
                <div class="form-group">
                    <select name="bulan" id="bulan" class="form-control">
                        <option value="1" <?php echo (@$_GET['bulan']==1)?'selected':(!isset($_GET['bulan'])&&date('m')==1)?'selected':'' ?>>Januari</option>
                        <option value="2" <?php echo (@$_GET['bulan']==2)?'selected':(!isset($_GET['bulan'])&&date('m')==2)?'selected':'' ?>>Februari</option>
                        <option value="3" <?php echo (@$_GET['bulan']==3)?'selected':(!isset($_GET['bulan'])&&date('m')==3)?'selected':'' ?>>Maret</option>
                        <option value="4" <?php echo (@$_GET['bulan']==4)?'selected':(!isset($_GET['bulan'])&&date('m')==4)?'selected':'' ?>>April</option>
                        <option value="5" <?php echo (@$_GET['bulan']==5)?'selected':(!isset($_GET['bulan'])&&date('m')==5)?'selected':'' ?>>Mei</option>
                        <option value="6" <?php echo (@$_GET['bulan']==6)?'selected':(!isset($_GET['bulan'])&&date('m')==6)?'selected':'' ?>>Juni</option>
                        <option value="7" <?php echo (@$_GET['bulan']==7)?'selected':(!isset($_GET['bulan'])&&date('m')==7)?'selected':'' ?>>Juli</option>
                        <option value="8" <?php echo (@$_GET['bulan']==8)?'selected':(!isset($_GET['bulan'])&&date('m')==8)?'selected':'' ?>>Agustus</option>
                        <option value="9" <?php echo (@$_GET['bulan']==9)?'selected':(!isset($_GET['bulan'])&&date('m')==9)?'selected':'' ?>>Sepetember</option>
                        <option value="10" <?php echo (@$_GET['bulan']==10)?'selected':(!isset($_GET['bulan'])&&date('m')==10)?'selected':'' ?>>Oktober</option>
                        <option value="11" <?php echo (@$_GET['bulan']==11)?'selected':(!isset($_GET['bulan'])&&date('m')==11)?'selected':'' ?>>November</option>
                        <option value="12" <?php echo (@$_GET['bulan']==12)?'selected':(!isset($_GET['bulan'])&&date('m')==12)?'selected':'' ?>>Desember</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-1"><label for="">Tahun</label></div>
            <div class="col-md-3">
                <div class="form-group">
                    <select name="tahun" id="tahun" class="form-control">
                        <?php foreach ($years_log as $opt) : ?>
						<option value="<?php echo $opt ?>" <?php echo (@$_GET['tahun']==$opt)?'selected':(!isset($_GET['tahun'])&&date('Y')==$opt)?'selected':'' ?>><?php echo $opt ?></option>
						<?php endforeach; ?>
                    </select>
                </div>
            </div>
            
            <div class="col-md-3">
         </div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-1"><label for="">Waktu</label></div>
            <div class="col-md-3">
                <div class="form-group">
                <select name="frekuensi" id="frekuensi" class="form-control">
                                <option value="24" <?php echo ((@$_GET['frekuensi']==24) || (@$_GET['frekuensi']==null))?'selected':'' ?>>per 24 jam</option>
                                <option value="12" <?php echo (@$_GET['frekuensi']==12)?'selected':'' ?>>per 12 jam</option>
                                <option value="6" <?php echo (@$_GET['frekuensi']==6)?'selected':'' ?>>per 6 jam</option>
                                <option value="1" <?php echo (@$_GET['frekuensi']==1)?'selected':'' ?>>per 1 jam</option>
                                <option value="0" <?php echo ((@$_GET['frekuensi']==0) && (@$_GET['frekuensi']!=null))?'selected':'' ?>>lengkap</option>
                 </select>
                </div>
            </div>
            <div class="col-md-2">
            <button type="submit" class="btn btn-primary">Tampilkan</button>
            </div>
        </div>
    </form>
    <div style="margin-top:3rem;" class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 text-center">
                <!-- <button class="btn btn-sm btn-default" onclick="update()"> <i class="fa fa-server"></i> Semua Data</button>
                <button class="btn btn-sm btn-default" onclick="update('voltage')"> <i class="fa fa-bolt"></i> Data voltage</button>
                <button class="btn btn-sm btn-default" onclick="update('arus')"> <i class="fa fa-bolt"></i> Data arus</button>    -->
        </div>
    </div>

<!--export excel data dan jpg grafik-->

<?php 
$url_excel  = base_url('Log_warning_light/excel/'.@$_GET['warning_light_id']);
if (isset($_GET['bulan'])) {
    $url_excel .= '/'.$_GET['bulan'];
}
if (isset($_GET['tahun'])) {
    $url_excel .= '/'.$_GET['tahun'];
}
if (isset($_GET['frekuensi'])) {
    if (!isset($_GET['bulan'])) {
        $url_excel .= '/null';
    }
    if (!isset($_GET['tahun'])) {
        $url_excel .= '/null';
    }
    $url_excel .= '/'.$_GET['frekuensi'];
}

if(
        (isset($_GET['warning_light_id']) && (@$_GET['warning_light_id']!=null)) &&
        (isset($_GET['bulan'])) &&
        (isset($_GET['tahun'])) &&
        (isset($_GET['frekuensi']))
    ){ ?>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 text-center">
            <br>
            <a href="<?php echo $url_excel ?>" class="btn btn-sm btn-success" target="_blank">
                <i class="fa fa-table" aria-hidden="true"></i>
                download excel
            </a>
            <a href="#" class="btn btn-sm btn-primary" id="dl" download="diagram .png" target="_blank">
                <i class="fa fa-download" aria-hidden="true"></i>
                download diagram
            </a>
            <br>
        </div>
    </div>
    <?php } ?>
<!-- End export data excel-->


    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <canvas id="diagram" width="100%" height="50px"></canvas>
        </div>
    </div>

<?php $this->load->view('layout/footer');?>
<?php
$url_data_json  = base_url('Log_warning_light/data_json/'.@$_GET['warning_light_id']);
if (isset($_GET['bulan'])) {
    $url_data_json .= '/'.$_GET['bulan'];
}
if (isset($_GET['tahun'])) {
    $url_data_json .= '/'.$_GET['tahun'];
}
if (isset($_GET['frekuensi'])) {
    if (!isset($_GET['bulan'])) {
        $url_data_json .= '/null';
    }
    if (!isset($_GET['tahun'])) {
        $url_data_json .= '/null';
    }
    $url_data_json .= '/'.$_GET['frekuensi'];
}
?>
<script>
//global variable
var data_json_url = '<?php echo $url_data_json ?>';

var data = null;
var waktu = [];
var voltage = [];
var arus = [];
var watt = [];

var current_view = "all";
var ctx = document.getElementById('diagram').getContext('2d');

var config = {
    type: 'line',
    data: {
        labels: [],
        datasets: []
    },
    options: {
        responsive: true,
        title: {
            display: true,
            text: 'Data KWh Meter'
        },
        tooltips: {
            mode: 'index',
            intersect: false,
        },
        hover: {
            mode: 'nearest',
            intersect: true
        },
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Waktu'
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

//fungsi-fungsi penting
function pushDataset(data,label,newColor) {
    var newDataset = {
        label: label,
        backgroundColor: newColor,
        borderColor: newColor,
        data: data,
        fill: false
    };

    window.config.data.datasets.push(newDataset);
}

function show(key=null) {
    window.config.data.datasets=[];
    if (key==null || key=='all') {
        window.current_view = 'all';
        pushDataset(window.voltage,'voltage','rgba(54, 162, 235, 0.8)');
        pushDataset(window.arus,'arus','rgba(54, 162, 235, 0.8)');
    
      
    } else {
        var color = 'rgba(54, 162, 235, 0.8)';
        switch (key) {
            case 'voltage':
                color = 'rgba(255, 99, 132, 0.8)';
                window.current_view = 'voltage';
                break;
            case 'arus':
                color = 'rgba(54, 162, 235, 0.8)';
                window.current_view = 'arus';
                break;
            case 'watt':
                color = 'rgba(255, 206, 86, 0.8)';
                window.current_view = 'watt';
                break;
            
            default:
                break;
        }
        pushDataset(window[key],key,color);
    }            
    window.myLine.update();
}

function update(key) {
    // var judul = document.getElementById('judul');
    // var textJudulAsli = judul.innerText;
    // judul.innerText = textJudulAsli + ' (memperbarui...)';
    window.config.data.datasets=[];
    if (key==null || key=='all') {
        $.ajax({
            // url:'data.json',
            url:data_json_url,
            success:function(data){
                console.log(data);
                window.waktu = [];
                window.voltage = [];
                window.arus = [];
                window.watt = [];
              
                window.data = data;
                for(i=0;i<data.length;i++){
                    window.waktu.push(data[i]["waktu"]);
                    window.voltage.push(parseFloat(data[i]["voltage"]));
                    window.arus.push(parseFloat(data[i]["arus"]));
                    window.watt.push(parseFloat(data[i]["watt"]));
               
                }

                window.config.data.labels = window.waktu;
                pushDataset(window.voltage,'voltage','rgba(255, 99, 132, 0.8)');
                pushDataset(window.arus,'arus','rgba(54, 162, 235, 0.8)');
                pushDataset(window.watt,'watt','rgba(255, 206, 86, 0.8)');
              
                window.myLine.update();
                // judul.innerText = textJudulAsli;
            }
        });
    } else {
        $.ajax({
            // url:'data.json',
            url:data_json_url,
            success:function(data){
                console.log(data);
                window.waktu = [];
                window[key]=[];
                window.data = data;
                for(i=0;i<data.length;i++){
                    window.waktu.push(data[i]["waktu"]);
                    window[key].push(parseFloat(data[i][key]));
                }

                window.config.data.labels = window.waktu;
                var color = 'rgba(54, 162, 235, 0.8)';
                switch (key) {
                    case 'voltage':
                        color = 'rgba(255, 99, 132, 0.8)';
                        window.current_view = 'voltage';
                        break;
                    case 'arus':
                        color = 'rgba(54, 162, 235, 0.8)';
                        window.current_view = 'arus';
                        break;
                    case 'watt':
                        color = 'rgba(255, 206, 86, 0.8)';
                        window.current_view = 'watt';
                        break;
                    case 'kwh_total':
                        color = 'rgba(75, 192, 192, 0.8)';
                        window.current_view = 'kwh_total';
                        break;
                    case 'kwh_export':
                        color = 'rgba(153, 102, 255, 0.8)';
                        window.current_view = 'kwh_export';
                        break;
                    case 'kwh_import':
                        color = 'rgba(255, 159, 64, 0.8)';
                        window.current_view = 'kwh_import';
                        break;
                    default:
                        break;
                }
                if (key=='kwh_total') {
                    window.kwh_total = [];
                    window.data = data;
                    for(i=0;i<data.length;i++){
                        if (window.kwh_total[i-1] > parseFloat(data[i]["kwh_total"])) {
                            window.kwh_total.push(window.kwh_total[i-1]);
                        } else {
                            window.kwh_total.push(parseFloat(data[i]["kwh_total"]));
                        }
                    }
                }
                pushDataset(window[key],key,color);
                window.myLine.update();
                // judul.innerText = textJudulAsli;
            }
        });
    }
}

//ambil data.json
$.ajax({
    // url:'data.json',
    url:data_json_url,
    success:function(data){
        console.log(data);
        window.data = data;
        for(i=0;i<data.length;i++){
            window.waktu.push(data[i]["waktu"]);
            window.voltage.push(parseFloat(data[i]["voltage"]));
            window.arus.push(parseFloat(data[i]["arus"]));
            window.watt.push(parseFloat(data[i]["watt"]));
        
        }

        window.config.data.labels = window.waktu;
        pushDataset(window.voltage,'voltage','rgba(255, 99, 132, 0.8)');
        pushDataset(window.arus,'arus','rgba(54, 162, 235, 0.8)');
        pushDataset(window.watt,'watt','rgba(255, 206, 86, 0.8)');
      
        window.myLine = new Chart(ctx, config);
    }
});

// auto update
var detik = 1000;
var menit = 60 * detik;
var sepuluh_menit = 10 * menit;
setInterval(() => {
    update(window.current_view);
}, menit);
</script>

<script>
function dlCanvas() {
    var temp_canvas = document.getElementById('diagram')
    var dt = temp_canvas.toDataURL('image/png');
    /* Change MIME type to trick the browser to downlaod the file instead of displaying it */
    dt = dt.replace(/^data:image\/[^;]*/, 'data:application/octet-stream');

    /* In addition to <a>'s "download" attribute, you can define HTTP-style headers */
    dt = dt.replace(/^data:application\/octet-stream/, 'data:application/octet-stream;headers=Content-Disposition%3A%20attachment%3B%20filename=Canvas.png');

    this.href = dt;
};
document.getElementById("dl").addEventListener('click', dlCanvas, false);
</script>