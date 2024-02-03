<div class="modal fade" id="modal-schedule-day-create">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Preset Harian</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-2">
						<label for="schedule">
							Nama Preset Harian
						</label>
					</div>
					<div class="col-md-10">
						<input id="nama_preset_day" type="text" class="form-control">
					</div>
					<hr>
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				<button type="button" onclick="save_day_preset(this)" class="btn  btn-primary">Simpan</button>
			</div>
		</div>
	</div>
</div>



<div class="modal fade" id="modal-schedule-day-edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Preset Harian Setting</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-2">
						<label for="schedule">
							Nama Preset Harian
						</label>
					</div>
					<div class="col-md-10">
						<input id="id_preset_edit" type="hidden" class="form-control">
						<input id="id_traffic_preset" type="hidden" class="form-control">
						<input id="id_schedule_preset" type="hidden" class="form-control">
					</div>
					<div class="col-md-10">
						<input id="nama_preset_edit" type="text" class="form-control">
					</div>
					<hr>
				</div>
				<div class="row">
				<div class="col-md-12">
						<h5>Waktu Mulai :</h5>
					</div>
					<div class="col-md-6">
						<label for="schedule">
							Jam
						</label>
						<input id="schedule_jam_start" type="number" class="form-control">
					</div>
					<div class="col-md-6">
						<label for="schedule">
							Menit
						</label>
						<input id="schedule_menit_start" type="number" class="form-control">
					</div>

					<div class="col-md-12">
					<hr>
						<h5>Waktu Selesai :</h5>
					</div>
					<div class="col-md-6">
						<label for="schedule">
							Jam
						</label>
						<input id="schedule_jam_end" type="number" class="form-control">
					</div>
					<div class="col-md-6">
						<label for="schedule">
							Menit
						</label>
						<input id="schedule_menit_end" type="number" class="form-control">
					</div>
				</div>
				<div class="row">
				<hr>
					<div class="col-md-2">
						<label for="schedule">
							Program
						</label>
					</div>
					<div class="input-group col-md-8">
					
						<select name="" onchange="update_program_select(this)" id="program_select" class="form-control program_select"
							required="required" >
							<option value=""></option>
						</select>
						<span class="input-group-btn">
							<button disable id="edit_program"type="button" class="btn btn-default" >
								<i class="fa fa-edit" aria-hidden="true"></i>
								edit <b>Program</b>
							</button>
							<button type="button" id="tambah_program" onclick="modal_program_create()" class="btn btn-default"  >
								<i class="fa fa-plus" aria-hidden="true"></i>
								buat program baru
							</button>
						</span>

					
					</div>
					<div style="margin-top:1.5rem" class="col-md-12">
					<hr>
					<div class="table-responsive">
									<table class="table table-hover table-striped table-bordered">
										<thead>
											<tr>
												<th rowspan="2">No</th>
												<th colspan="2">waktu mulai</th>
												<th colspan="2">waktu selesai</th>
											</tr>
											<tr>
												<th>Jam</th>
												<th>Menit</th>
												<th>Jam</th>
												<th>Menit</th>
											</tr>
										</thead>
										<tbody id="tb_setting_preset_harian">
										
										</tbody>
									</table>
								</div>
					</div>
				</div>

			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				<button type="button" onclick="save_edit_preset(this)" class="btn  btn-primary">Simpan</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modal-schedule-hours-edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Preset Harian Setting</h4>
			</div>
			<div class="modal-body">
				<div class="row">
				<div class="col-md-12">
				<input  type="hidden" id="id_schedule_hour" class="form-control">
				<input  type="hidden" id="id_traffic" class="form-control">
				<input  type="hidden" id="id_schedule" class="form-control">
						<h5>Waktu Mulai :</h5>
					</div>
					<div class="col-md-6">
						<label for="schedule">
							Jam
						</label>
		
						<input id="schedule_jam_start_edit" type="number" class="form-control">
					</div>
					<div class="col-md-6">
						<label for="schedule">
							Menit
						</label>
						<input id="schedule_menit_start_edit" type="number" class="form-control">
					</div>

					<div class="col-md-12">
					<hr>
						<h5>Waktu Selesai :</h5>
					</div>
					<div class="col-md-6">
						<label for="schedule">
							Jam
						</label>
						<input id="schedule_jam_end_edit" type="number" class="form-control">
					</div>
					<div class="col-md-6">
						<label for="schedule">
							Menit
						</label>
						<input id="schedule_menit_end_edit" type="number" class="form-control">
					</div>
				</div>
				<div class="row">
				<hr>
					<div class="col-md-2">
						<label for="schedule">
							Program
						</label>
					</div>
					<div class="col-md-10">
						<select name="" id="program_select_edit" class="form-control program_select"
							required="required" >
							<option value=""></option>
						</select>
					</div>

				</div>

			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				<button type="button" onclick="save_edit_setting_schedule(this)" class="btn  btn-primary">Simpan</button>
			</div>
		</div>
	</div>
</div>



<div class="modal fade" id="modal-schedule-hours-hapus">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Hapus Data  Schedule Hour </h4>
			</div>
			<div class="modal-body">
				<input  type="hidden" id="id_schedule_hour_deleted" class="form-control">
				<input  type="hidden" id="id_schedule_deleted" class="form-control">
				<input  type="hidden" id="id_traffic_deleted" class="form-control">
					<div class="row">
						<div class="col-md-12">
						
						<h4>Apakah anda yakin untuk menghapus data ini ?</h4>				

						</div>
					</div>
				</input>
					

			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				<button type="button" onclick="save_hapus_preset_harian(this)" class="btn  btn-primary">Simpan</button>
			</div>
		</div>
	</div>
</div>

