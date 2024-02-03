<!-- Modal tambah warning_light -->
<div class="modal fade" id="warning_light_create">
	<div class="modal-dialog" style="width:65%">
		<div class="modal-content" >
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Create Data Warning light</h4>
			</div>
			<div class="modal-body">
				<!-- <div class="form-group"> -->
				<!-- <label for="int">Area Id</label> -->
				<input type="hidden" class="form-control" id="warning_light_area_id_create" placeholder="Area Id"
					value="" />
				<!-- </div> -->
				<!-- <div class="form-group"> -->
				<!-- <label for="int">Mode Id</label> -->
				<!-- </div> -->
							<div class="form-group">
								<label for="varchar">Proyek</label>
								<div class="input-group-btn">

									<div class="input-group" style="margin-bottom:12px;">
										<select class="form-control" name="" id="warning_light_proyek">
											<option value="">pilih</option>
										</select>

										<a  class="btn btn-default"
											id="btn_edit_schedule_warning_light_create" 
											href='<?php echo base_url('Proyek')?>'>
											<i class="fa fa-plus" aria-hidden="true"></i>
											Kelola Proyek :
										</a>
									</div>

								</div>
								
							</div>

				<div class="form-group">
					<label for="varchar">Nama Warning Light </label>
					<input type="text" class="form-control" id="warning_light_sitename_create" placeholder="Nama Warning Light..."
						value="" />
				</div>
				<div class="form-group">
					<label for="varchar">Nomor Sim </label>
					<input type="text" class="form-control" id="Nomor_sim_create" placeholder="Nama Warning Light..."
						value="" />
				</div>

				<div class="form-group">
					<label for="varchar">Nomor Sim Card </label>
					<input type="text" class="form-control" id="Nomor_sim" placeholder="Nama Warning Light..."
						value="" />
				</div>

			

				<div class="form-group">
					<label for="varchar">Tahun</label>
					<input type="number" class="form-control" id="warning_light_tahun_create" placeholder="Tahun..."
						value="" />
				</div>
				<div class="form-group">
					<label for="varchar">Mode</label>
					<select class="form-control" name="" id="mode_wl">
						<option value="pilih">pilih</option>
						<option value="1">Blinks</option>
						<option value="2">Flip Flop</option>
						<option value="3">Double Flip Flop</option>
						<option value="4">Echo</option>

					</select>
				</div>

				<div class="form-group">
					<label for="varchar">Speed</label>
					<select class="form-control" name="" id="speed_wl">
						<option value="pilih">pilih</option>
						<option value="250">250ms</option>
						<option value="500">500ms</option>
						<option value="1000">1000ms</option>
						<option value="1500">1500ms</option>

					</select>
				</div>

				<div class="form-group">
					<label for="varchar">Model</label>
					<select class="form-control" name="" id="warning_light_model_create">
						<option value="JC-M.WL.S.1A">JC-M.WL.S.1A</option>
					</select>
				</div>

				<div class="form-group">
					<label for="varchar">Serial Number</label>
					<input type="text" class="form-control" id="warning_light_sn_create" placeholder="Warning light sn..."
						value="" />
				</div>
			

				<div class="form-group">
				<label for="varchar">Tegangan Warning Light</label>
					<select class="form-control" name="" id="warning_light_tegangan_create">
						<option value="pilih">pilih</option>
						<option value="24V DC">24V DC</option>
						<option value="12V DC">12V DC</option>
						<option value="220V AC ">220V AC </option>
					</select>
				</div>



				<div class="form-group">
					<label for="varchar">Pembuat</label>
					<input type="text" class="form-control" id="warning_light_pembuat_create"
						placeholder="Warning light pembuat..." value="" />
				</div>

				<div class="form-group">
					<label for="varchar">Proteksi IP / Inggress Protection</label>
					<input type="text" class="form-control" id="warning_light_ils_create"
						placeholder="Warning light ils..." value="" />
				</div>

				<div class="form-group">
					<label for="varchar">warning light IK / Impact Protection </label>
					<input type="text" class="form-control" id="warning_light_ip_create" placeholder="warning light ip..."
						value="" />
				</div>


				<div class="form-group">
					<label for="">Lokasi</label>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="varchar">Latitude</label>
								<input type="text" class="form-control" id="warning_light_lat_create"
									onchange="warning_light_create_update_marker_input_ModalEdit()" placeholder="Lat"
									value="" />
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="varchar">Longitude</label>
								<input type="text" class="form-control" id="warning_light_lng_create"
									onchange="warning_light_create_update_marker_input_ModalEdit()" placeholder="Lng"
									value="" />
							</div>
						</div>
					</div>
				</div>
				<p>
					silahkan klik lokasi pada peta atau isi form latitude & longitude di atas
				</p>
				<div class="form-group">
					<div id="map_warning_light_create" style="height:200px"></div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="simpan_warning_light_create(this)"
					id="btn_save_warning_light_create">Simpan</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal Edit warning_light -->
<div class="modal fade" id="warning_light-edit-modal">
	<div class="modal-dialog" style="width:65%">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit warning_light</h4>
			</div>
			<div class="modal-body">
				<!-- <div class="form-group"> -->
				<!-- <label for="int">Area Id</label> -->
				<input type="hidden" class="form-control" name="warning_light_id" id="warning_light_id"
						placeholder="warning_light Id..." value="" />

						
				<form id="form-edit-warning_light">
				<?php if($this->session->userdata('user_hak_akses') == 'admin'){ ?>
					<label for="varchar">Id Warning Light</label>
					<input type="number" class="form-control" name="warning_light_id_changed" id="warning_light_id_changed"
						placeholder="warning_light Id..." value="" />
				<?php }  ?>
				
				<?php if($this->session->userdata('user_hak_akses') == 'petugas'){ ?>
					<input type="hidden" class="form-control" name="warning_light_id_changed" id="warning_light_id_changed"
						placeholder="warning_light Id..." value="" />
				<?php }  ?>
				

					<!-- </div> -->
					<div class="form-group">
						<input type="hidden" id="user_a_s" value="<?php echo $this->session->userdata('user_hak_akses')?>">
						<label for="int">Data Area</label>
						<div class="input-group-btn">
							<div class="input-group" style="margin-bottom:12px;">

								<select name="" id="area_warning_light_select"
									class="form-control area_warning_light_select" required="required"
									onchange="update_warning_light_schedule_edit_btn()">
								</select>
							
							<?php if ($this->session->userdata('user_hak_akses') =='admin') { ?>
								<button type="button" class="btn btn-default"
									id="btn_edit_schedule_warning_light_create" data-toggle="modal" href='#modal-area'
									onclick="hide_modal()">
									<i class="fa fa-plus" aria-hidden="true"></i>
									Tambah Area :
								</button>
							<?php }?>
							</div>


							<div class="input-group">
								<!-- <input type="text" class="form-control" id="exampleInputAmount" placeholder="Search"> -->

								<span class="input-group-btn">

								</span>
							</div>

						</div>
						<div>
							<div class="form-group">
								<label for="varchar">Proyek</label>
								<div class="input-group-btn">

									<div class="input-group" style="margin-bottom:12px;">
										<select class="form-control" name="" id="warning_light_proyek_edit">
											<option value="">pilih</option>
										</select>

										<a  class="btn btn-default"
											id="btn_edit_schedule_warning_light_create" 
											href='<?php echo base_url('Proyek')?>'>
											<i class="fa fa-plus" aria-hidden="true"></i>
											Kelola Proyek :
										</a>
									</div>

								</div>
								
							</div>

									<div class="form-group">
										<label for="varchar">Nama Warning Light</label>
										<input type="text" class="form-control" id="warning_light_sitename_edit"
											placeholder="Warning Light Pekerjaan..." value="" />
									</div>
									<div class="form-group">
										<label for="varchar">Tahun</label>
										<input type="text" class="form-control" id="warning_light_tahun_edit"
											placeholder="Tahun..." value="" />
									</div>
									<div class="form-group">
										<label for="varchar">Mode</label>
										<select class="form-control" name="" id="mode_wl_edit">
											<option value="pilih">pilih</option>
											<option value="1">Blinks</option>
											<option value="2">Flip Flop</option>
											<option value="3">Double Flip Flop</option>
											<option value="4">Slowed Blink</option>

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



														
									<div class="form-group">
										<label for="varchar">Model</label>
										<select class="form-control" name="" id="warning_light_model_edit">
											<option value="WL_J_001">WL_J_001</option>
										</select>
									</div>
								
									<div class="form-group">
										<label for="varchar">Serial Number</label>
										<input type="text" class="form-control" id="warning_light_sn_edit"
											placeholder="Serial Number..." value="" />
									</div>

									
														
									<div class="form-group">
									<label for="varchar">Tegangan </label>
										<select class="form-control" name="" id="warning_light_tegangan_edit">
											<option value="pilih">pilih</option>
											<option value="24V DC">24V DC</option>
											<option value="12V DC">12V DC</option>
											<option value="220V AC ">220V AC </option>
										</select>
									</div>



									<div class="form-group">
										<label for="varchar">Pembuat</label>
										<input type="text" class="form-control" id="warning_light_pembuat_edit"
											placeholder="Warning light pembuat..." value="" />
									</div>
									<div class="form-group">
										<label for="varchar">Proteksi Ips/Ingress Protection</label>
										<input type="text" class="form-control" id="warning_light_ils_edit"
											placeholder="Warning light ils..." value="" />
									</div>
									<div class="form-group">
										<label for="varchar">Warning light IK/Impact Protection</label>
										<input type="text" class="form-control" id="warning_light_ip_edit"
											placeholder="warning light ip..." value="" />
									</div>




									<div class="form-group">
										<label for="">Lokasi</label>
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label for="varchar">Latitude</label>
													<input type="text" class="form-control" name="warning_light_lat"
														id="warning_light_lat_edit"
														onchange="edit_warning_light_create_update_marker_input()"
														placeholder="Lat" value="" />
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label for="varchar">Longitude</label>
													<input type="text" class="form-control" name="warning_light_lng"
														id="warning_light_lng_edit"
														onchange="edit_warning_light_create_update_marker_input()"
														placeholder="Lng" value="" />
												</div>
											</div>
										</div>
									</div>
									<p>
										silahkan klik lokasi pada peta atau isi form latitude & longitude di atas
									</p>
									<div class="form-group">
										<div id="map_warning_light_edit" style="height:200px"></div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary"
									onclick="simpan_warning_light_update(this)"
									id="btn_save_warning_light_edit">Simpan</button>
							</div>
						</div>
					</div>
			</div>
	</div>
			<!-- Modal Hapus warning_light -->
			<div class="modal fade" id="modal_warning_light_delete">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Hapus Data warning_light</h4>
						</div>
						<div class="modal-body">
							<form>
								<input type="hidden" class="form-control" name="warning_light_id" id="hapus_schedule_id"
									placeholder="warning_light_id" value="" />
								<!-- <div class="form-group"> -->
								<h5 id="Notifdelete_warning_light">Apakah anda yakin untuk menghapus data warning_light?
								</h5>
						</div>


						<div class="modal-footer">

							<button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-danger" onclick="warning_light_hapus(this)"
								id="submit_warning_light_hapus">HAPUS</button>

							</form>
						</div>
					</div>
				</div>
			</div>

			<script>
				function hide_modal(params) {
					$('#warning_light_details').modal('hide');
					$('#warning_light-edit-modal').modal('hide');
				}
			</script>