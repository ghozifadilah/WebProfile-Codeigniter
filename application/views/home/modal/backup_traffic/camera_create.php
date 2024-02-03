
<!-- Camera Create -->
<div class="modal fade" id="camera-create-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data camera</h4>
			</div>
			<div class="modal-body">
			
				<input type="hidden" class="form-control" id="camera_area_id_create" placeholder="Area Id" value="" />
				
				<div class="form-group">
				
				<div class="form-group">
					<label for="varchar">Camera Nama</label>
					<input type="text" class="form-control" id="camera_nama_create" placeholder="Nama Camera" value="" />
				</div>
				<div class="form-group">
					<label for="varchar">Camera Rstp</label>
					<input type="text" class="form-control" id="camera_rstp_create" placeholder="Camera RSTP" value="" name="camera_rstp" />
				</div>
				<div class="form-group">
					<label for="varchar">Camera IP</label>
					<input type="text" class="form-control"   id="camera_IP_create" placeholder="Camera IP" value="" />
				</div>


				<div class="form-group">
					<label for="">Lokasi</label>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="varchar">Latitude</label>
								<input type="text" class="form-control" id="camera_lat_create"
									onchange="camera_create_update_marker_input_ModalEdit()" placeholder="Lat" value="" />
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="varchar">Longitude</label>
								<input type="text" class="form-control" id="camera_lng_create"
									onchange="camera_create_update_marker_input_ModalEdit()" placeholder="Lng" value="" />
							</div>
						</div>
					</div>
				</div>
				<p>
					silahkan klik lokasi pada peta atau isi form latitude & longitude di atas
				</p>
				<div class="form-group">
					<div id="map_camera_create" style="height:200px"></div>
				</div>
			</div>


			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="submit_camera_create(this)"
					id="btn_save_camera_edit">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<!-- End Camera Create -->



<!-- Camera Create -->
<div class="modal fade" id="camera-edit-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit Data camera</h4>
			</div>
			<div class="modal-body">
			
			
			
            <form id="form-edit-camera">
				<div class="form-group">
				
                <input type="hidden" name="camera_id_edit" class="form-control" id="camera_id_edit" placeholder="Area Id" value="" />
			
            <input type="hidden" name="camera_area_id_edit" class="form-control" id="camera_area_id_edit" placeholder="Area Id" value="" />

				<div class="form-group">
					<label for="varchar">Camera Nama</label>
					<input type="text" name="camera_nama_edit" class="form-control" id="camera_nama_edit" placeholder="Nama Camera" value="" />
				</div>
				<div class="form-group">
					<label for="varchar">Camera Rstp</label>
					<input type="text" name="camera_rstp_edit" class="form-control" id="camera_rstp_edit" placeholder="Camera RSTP" value="" />
				</div>
				<div class="form-group">
					<label for="varchar">Camera IP</label>
					<input type="text" name="camera_IP_edit" class="form-control" id="camera_IP_edit" placeholder="Camera IP" value="" />
				</div>


				<div class="form-group">
					<label for="">Lokasi</label>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="varchar">Latitude</label>
								<input type="text" class="form-control" name="camera_lat_edit" id="camera_lat_edit"
									onchange="camera_create_update_marker_input_ModalEdit()" placeholder="Lat" value="" />
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="varchar">Longitude</label>
								<input type="text" class="form-control" name="camera_lng_edit"  id="camera_lng_edit"
									onchange="camera_create_update_marker_input_ModalEdit()" placeholder="Lng" value="" />
							</div>
						</div>
					</div>
				</div>
				<p>
					silahkan klik lokasi pada peta atau isi form latitude & longitude di atas
				</p>
				<div class="form-group">
					<div id="map_camera_edit" style="height:200px"></div>
				</div>
			</div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="submit_camera_edit(this)"
                        id="btn_save_camera_edit">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<!-- End Camera Create -->


<!-- Modal Hapus area -->
<div class="modal fade" id="camera-hapus-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Hapus Area </h4>
            </div>
            <div class="modal-body">
                
                <div class="form-group">
                        <label for="">Apakah Anda Yakin menghapus data Camera ini ?</label>
                        <form id="form-delete-camera">
                        <input type="hidden" class="form-control" name="camera_id_hapus" 
						id="camera_id_hapus" placeholder="Area Id" value="" />
						
						<h4 id="Notifdelete_camera" >Apakah anda yakin untuk menghapus data Camera ? </h4>
                        </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" onclick="submit_camera_hapus(this)">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</div>
