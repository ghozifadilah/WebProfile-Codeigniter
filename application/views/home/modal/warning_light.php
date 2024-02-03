<!-- Modal tambah Traffic -->
<div class="modal fade" id="warning_light_details">
	<div class="modal-dialog"  style="width:52%">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Details Warning light</h4>
				
			</div>
			<div class="modal-body">
				<input type="hidden" name="" id="warning_light_id_detail">
				<div class="row">

					<div class="col-md-4">
							<div class="card">

								<div class="icon-wl">
									

								</div>
					
									<div class="parent">
										<img class="image1 image_width" src="<?php echo base_url('assets/img/smart_wl/main_wl.png') ?>" alt="" srcset="">
										<img 	id="wl-top" class="image2 image_width" src="<?php echo base_url('assets/img/smart_wl/bg_top.png') ?>" alt="" srcset="">
										<img  	id="wl-bottom" class="image3 image_width " src="<?php echo base_url('assets/img/smart_wl/bg_bottom.png') ?>" alt="" srcset="">
									</div>
									
						
									<div id="status">
										<div class="card-body bg-green">
											<h3 class="card-title text-center"> <b>Online</b> <i class="fa fa-check"></i> </h3>
										</div>
									</div>
							
							
							</div>
							<button onclick="change_mode()" style="margin-top:5px;float:left;" class="btn btn-default"> <i class="fa fa-edit"></i> Ganti Mode / Speed</button>	
							<button id="btn_id_jadwal" onclick="change_jadwal_WL()" style="margin-top:5px;float:left;" class="btn btn-default"> <i class="fa fa-calendar"></i> Jadwal Warning Light</button>	
						
							<div style="margin-left:-16px;">
						
							</div>
					</div>
					<div id="details_WL" style="margin-top:4.2rem;" class="col-md-8">

						<h4>Site Name : <b></b></h4>
						<h4>Tahun : <b></b></h4>
						<h4>Mode : <b></b></h4>
						<h4>Kecepatan : <b> </b> </h4>
					

					</div>

				</div>
		
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>




<!-- Modal tambah Traffic -->
<div class="modal fade" id="warning_Mode_changes">
	<div class="modal-dialog"  style="width:30%">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Ganti Mode</h4>
			</div>
			<div class="modal-body">
				
				<div class="form-group">
					<div class="form-group">
						<label for="varchar">Mode</label>
						<select class="form-control" name="" id="mode_wl_edit">
							<option value="pilih">pilih</option>
							<option value="1">Blinks</option>
							<option value="2">Flip Flop</option>
							<option value="3">Double Flip Flop</option>
							<option value="4">Eco Blink</option>

						</select>
					</div>

					<div class="form-group">
						<label for="varchar">Speed</label>
						<select class="form-control" name="" id="speed_wl_edit">
							<option value="pilih">pilih</option>
							<option value="250">250ms</option>
							<option value="500">500ms</option>
							<option value="1000">1000ms</option>
							<option value="1500">1500ms</option>

						</select>
					</div>

				</div>

		
			</div>
			<div class="modal-footer">
				<button id="submit_button_mode" onclick="mode_changed()" type="button" class="btn btn-primary" > <span id="text_submit_mode"> Ganti </span> </button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>