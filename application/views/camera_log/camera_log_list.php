<?php $this->load->view('layout/header');?>
<div class="container-fluid">
	<div style="background-color:#fff;box-shadow: -4px 10px 5px 0px rgba(0,0,0,0.12);padding:15px;" class="row">
		<h3>Hasil Deteksi <?php echo$data_camera[0]->name; ?> <i class="fa fa-chart-line mt-2"></i></h3>
		<div style="height:2px;width:100%;background-color:#d6d6d6;">
			<!-- Line  -->
		</div>
		<div class="col-md-12 mt-3">
			<div class="row">
				<div class="col-auto">
					<div>
						<label for=""> <b>Tanggal</b> </label>
						<input type="date" id="start_date" value="<?php echo date('Y-m-d') ?>"
							class="form-control lcd_font ">
						<label for="">Jam</label>
						<input type="time" value="<?php echo date('H:i') ?>" id="start_time"
							class="form-control lcd_font ">
					</div>


					<label class="mt-2" for=""> <b>Interval Data</b> </label>
					<select class="form-control" id="minute_diagram">
						<option value="1">1 Menit</option>
						<option value="5">5 Menit</option>
						<option value="10">10 Menit</option>
						<option value="15">15 Menit</option>
						<option value="30">30 Menit</option>
						<option value="60">1 Jam</option>
						<option value="120">2 Jam</option>
						<option value="240">4 Jam</option>
						<option value="480">8 Jam</option>
						<option value="720">12 Jam</option>
						<option value="1440">1 Hari</option>
					</select>
				</div>
				<div class="col-auto">
					<div>
						<label for="">Tanggal</label>
						<input type="date" id="end_date" value="<?php echo date('Y-m-d') ?>"
							class="form-control lcd_font ">
						<label for="">Jam</label>
						<input type="time" value="<?php echo date('H:i') ?>" id="end_time"
							class="form-control lcd_font ">
					</div>
				</div>
			</div>

			<div class="ms-5 mt-2">
				<label for=""> <b>Object</b> </label> <br>
				<a onclick="graph_detector(1)" style="background-color:#98eb34;border-color:#98eb34;color:black;" class="btn btn-md btn-primary mt-1"> Mobil <i class="fa fa-car-side"></i> </a>
				<a onclick="graph_detector(2)" style="background-color:#f59b42;border-color:#f59b42;color:black;" class="btn btn-md  btn-primary mt-1"> Bus <i class="fa fa-bus"></i> </a>
				<a onclick="graph_detector(3)" style="background-color:#42d1f5;border-color:#42d1f5;color:black;" class="btn  btn-md  btn-primary mt-1 ">Sepeda Motor <i class="fa fa-motorcycle"></i> </a>
				<a onclick="graph_detector(4)" style="background-color:#9042f5;border-color:#9042f5;color:black;" class="btn btn-md  btn-primary mt-1"> Sepeda <i class="fa fa-bicycle"></i> </a>
				<a onclick="graph_detector(5)" style="background-color:#f54842;border-color:#f54842;color:black;" class="btn  btn-md btn-primary mt-1"> Orang <i class="fa fa-users"></i> </a>
				<a onclick="graph_detector(6)" style="background-color:#f5427b;border-color:#f5427b;color:black;" class="btn  btn-md btn-primary mt-1"> Truck <i class="fa fa-truck"></i> </a>
				<a onclick="graph_detector(7)" style="background-color:#c2c2c2;border-color:#c2c2c2;color:black;" class="btn  btn-md btn-primary mt-1"> All_Object <i class="fa fa-share"></i> </a>
			</div>
		</div>
		<br>
       

		<br>
		<!-- Tanggal And Time -->
		<div><br></div>
		<!-- End Tanggal And Time -->
		<div style="height:2px;width:100%;background-color:#d6d6d6;">
			<!-- Line  -->
		</div>

        <div class="col-md-12 mt-3">
        <div class="row mt-3 justify-content-center">
                <div class="col-9 ms-2">
                    <div style="min-height:686px;" id="container_log">
                        <canvas id="log_chart"></canvas>
                    </div>
    
                </div>
            </div>
        </div>
        <div style="height:2px;width:100%;background-color:#d6d6d6;">
                <!-- Line  -->
            </div>
            <div class="col-md-12 mt-3">
            <label for=""> <b>Total Deteksi:</b> </label>
            <div class="row">
                <div id="count_car" class="col-md-auto mt-2">
                    <div style="border-color:#98eb34"  class="card">
                        <div style="color:#98eb34;" class="card-body">
                            <h5> <b> Mobil :  <span id="car_count">-</span> <i class="fa fa-car-side"></i></b></h5>
                        </div>
                    </div>
                </div>
                <div id="count_bus" class="col-md-auto mt-2">
                    <div style="border-color:#f59b42"  class="card">
                        <div style="color:#f59b42;" class="card-body">
                            <h5> <b> Bus :  <span id="bus_count">-</span> <i class="fa fa-bus"></i></b></h5>
                        </div>
                    </div>
                </div>
                <div id="count_smotor" class="col-md-auto mt-2">
                    <div style="border-color:#42d1f5"  class="card">
                        <div style="color:#42d1f5;" class="card-body">
                            <h5> <b> Sepeda Motor :  <span id="smoto_count">-</span> <i class="fa fa-motorcycle"></i></b></h5>
                        </div>
                    </div>
                </div>
                <div id="count_sepeda" class="col-md-auto mt-2">
                    <div style="border-color:#9042f5"  class="card">
                        <div style="color:#9042f5;" class="card-body">
                            <h5> <b> Sepeda :  <span id="sepeda_count">-</span> <i class="fa fa-bicycle"></i></b></h5>
                        </div>
                    </div>
                </div>
                <div id="count_Orang" class="col-md-auto mt-2">
                    <div style="border-color:#f54842"  class="card">
                        <div style="color:#f54842;" class="card-body">
                            <h5> <b> Orang :  <span id="Orang_count">-</span> <i class="fa fa-users"></i></b></h5>
                        </div>
                    </div>
                </div>
                <div id="count_truck" class="col-md-auto mt-2">
                    <div style="border-color:#f5427b"  class="card">
                        <div style="color:#f5427b;" class="card-body">
                            <h5> <b> Truck :  <span id="truck_count">-</span> <i class="fa fa-truck"></i></b></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
    <!-- Canvas graph -->

</div>

<br>
<br>
<br>

<?php $this->load->view('layout/footer');?>
<?php $this->load->view('camera_log/js/get_detector_data');?>