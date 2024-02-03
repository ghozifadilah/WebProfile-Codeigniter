<!-- Modal tambah Traffic -->
<div class="modal fade" id="traffic-create-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Buat Data Traffic Baru</h4>
			</div>
			<div class="modal-body">
				<!-- <div class="form-group"> -->
				<!-- <label for="int">Area Id</label> -->
				<input type="hidden" class="form-control" id="traffic_area_id_create" placeholder="Area Id" value="" />
				<!-- </div> -->
				<!-- <div class="form-group"> -->
				<!-- <label for="int">Mode Id</label> -->
				<input type="hidden" class="form-control" id="traffic_mode_id_create" placeholder="Mode Id" value="" />
				<!-- </div> -->
				<div class="form-group">
					<label for="int">Preset Jadwal</label>
					<div class="input-group" style="margin-bottom:12px;">
					<select name="" id="traffic_schedule_id_create" class="form-control traffic_schedule_id"
							required="required" onchange="update_traffic_schedule_edit_btn()">
							<option value=""></option>
						</select>
					</div>

					<div class="input-group">
						<!-- <input type="text" class="form-control" id="exampleInputAmount" placeholder="Search"> -->
						
						<span class="input-group-btn">
							<button type="button" class="btn btn-default" id="btn_edit_schedule_traffic_create">
								<i class="fa fa-edit" aria-hidden="true"></i>
								Edit Jadwal :
							   <b>nama_jadwal</b>
							</button>
							<button type="button" class="btn btn-default" id="btn_delete_schedule_traffic_create">
								<i class="fa fa-trash" aria-hidden="true"></i>
								Hapus:
							   <b>nama_jadwal</b>
							</button>
							<button type="button" class="btn btn-default" onclick="Modal_create_schedule()" id="btn_new_traffic_schedule_create">
								<i class="fa fa-plus" aria-hidden="true"></i>
								buat jadwal baru
							</button>
						</span>
					</div>

				</div>
				<div class="form-group">
					<label for="varchar">Nama</label>
					<input type="text" class="form-control" id="traffic_nama_create" placeholder="Nama" value="" />
				</div>
				<div class="form-group">
					<label for="">Lokasi</label>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="varchar">Latitude</label>
								<input type="text" class="form-control" id="traffic_lat_create"
									onchange="traffic_create_update_marker_input_ModalEdit()" placeholder="Lat" value="" />
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="varchar">Longitude</label>
								<input type="text" class="form-control" id="traffic_lng_create"
									onchange="traffic_create_update_marker_input_ModalEdit()" placeholder="Lng" value="" />
							</div>
						</div>
					</div>
				</div>
				<p>
					silahkan klik lokasi pada peta atau isi form latitude & longitude di atas
				</p>
				<div class="form-group">
					<div id="map_traffic_create" style="height:200px"></div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="simpan_trafic_create(this)"
					id="btn_save_traffic_create">Simpan</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal Edit Traffic -->
<div class="modal fade" id="traffic-edit-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit Traffic</h4>
			</div>
			<div class="modal-body">
				<!-- <div class="form-group"> -->
				<!-- <label for="int">Area Id</label> -->
				<form id="form-edit-traffic">

					<input type="hidden" class="form-control" name="traffic_id" id="traffic_id" placeholder="traffic Id"
						value="" />


					<input type="hidden" class="form-control" name="traffic_area_id" id="traffic_area_id_edit"
						placeholder="Area Id" value="" />
					<!-- </div> -->
					<!-- <div class="form-group"> -->
					<!-- <label for="int">Mode Id</label> -->
					<input type="hidden" class="form-control" name="traffic_mode_id" id="traffic_mode_id_edit"
						placeholder="Mode Id" value="" />

					<!-- </div> -->
					<div class="form-group">
						<label for="int">Preset Jadwal</label>
						<div class="input-group" style="margin-bottom:12px;">
				<!-- <input type="text" class="form-control" id="exampleInputAmount" placeholder="Search"> -->
				<select name="" id="traffic_schedule_id_edit" class="form-control traffic_schedule_id"
								required="required" onchange="edit_update_traffic_schedule_edit_btn()">
								<option value=""></option>
							</select>
					</div>
						<div class="input-group">
							
							<span class="input-group-btn">
								<button type="button"   class="btn btn-default" id="btn_edit_schedule_traffic_edit">
									<i class="fa fa-edit" aria-hidden="true"></i>
									Edit Jadwal <b>nama_jadwal</b>
								</button>
								<!-- <button type="button" class="btn btn-default" id="btn_delete_schedule_traffic_edit" >
								<i class="fa fa-trash" aria-hidden="true"></i>
								Hapus :
							   <b>Delete_jadwal</b>
							  </button>-->
								<button type="button" onclick="Modal_create_schedule()" class="btn btn-default" id="btn_new_traffic_schedule_edit">
									<i class="fa fa-plus" aria-hidden="true"></i>
									buat jadwal baru
								</button>
							</span>
						</div>

					</div>
					<div class="form-group">
						<label for="varchar">Nama</label>
						<input type="text" class="form-control" name="traffic_nama" id="traffic_nama" placeholder="Nama"
							value="" />
					</div>
					<div class="form-group">
						<label for="">Lokasi</label>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="varchar">Latitude</label>
									<input type="text" class="form-control" name="traffic_lat" id="traffic_lat_edit"
										onchange="edit_traffic_create_update_marker_input()" placeholder="Lat"
										value="" />
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="varchar">Longitude</label>
									<input type="text" class="form-control" name="traffic_lng" id="traffic_lng_edit"
										onchange="edit_traffic_create_update_marker_input()" placeholder="Lng"
										value="" />
								</div>
							</div>
						</div>
					</div>
					<p>
						silahkan klik lokasi pada peta atau isi form latitude & longitude di atas
					</p>
					<div class="form-group">
						<div id="map_traffic_edit" style="height:200px"></div>
					</div>

					<div class="form-group">
					
					<button type="button" class="btn btn-default" id="btn_Fase_baru" onclick="modal_kelola_fase(this)">
							<i class="fa fa-edit" aria-hidden="true"></i>
							Kelola Fase
					</button>
					</div>

			</div>
			</form>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="simpan_trafic_update(this)"
					id="btn_save_traffic_edit">Simpan</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal Hapus Traffic -->
<div class="modal fade" id="modal_traffic_delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Hapus Data Traffic</h4>
			</div>
			<div class="modal-body">
				<form>
					<input type="hidden" class="form-control" name="traffic_id" id="hapus_schedule_id" placeholder="traffic Id" value="" />
					<!-- <div class="form-group"> -->
					<h4 id="Notifdelete_traffic" >Apakah anda yakin untuk menghapus data Traffic?</h4>
			</div>


			<div class="modal-footer">
			
			<button type="button" class="btn btn-success"    data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-danger" onclick="submit_traffic_hapus(this)" id="btn_save_traffic_edit">HAPUS</button>
				
				</form>
			</div>
		</div>
	</div>
</div>


<!-- end Modal edit jadwal -->

