<div class="modal fade" id="modal-durasi">
	<div class="modal-dialog" style="width:75%">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Setting durasi program</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-4">
						<div class="table-responsive"
							style="max-height: 350px; overflow-y: auto; overflow-x: hidden; margin-top:30px;">
							<table class="table table-hover">

								<thead id="data_fase">

								</thead>

							</table>
						</div>
					</div>
					<div class="col-md-8">
						<div class="program-timeline-edit" style="height:20vh;"></div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				<button type="button" class="btn btn-primary">Simpan perubahan</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="add-modal-durasi">
	<div class="modal-dialog" style="width:30%">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Durasi</h4>
				<input id="id_program" type="hidden">
				<input id="id_fase" type="hidden">
				<input id="id_traffic" type="hidden">
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-12">

						<div class="form-group">
							<label for="">Duration Start </label>
							<input size="10" type="text" class="form-control" id="duration_start"
								placeholder="Input duration Start">
						</div>

						<div class="form-group">
							<label for="">Duration Green </label>
							<input size="10" type="text" class="form-control" id="duration_duration"
								placeholder="Input duration Green">
						</div>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<label for="">Duration Yelow </label>
							<input size="10" type="text" class="form-control" id="duration_yellow"
								placeholder="Input duration yellow">
						</div>
						<hr>
					</div>
				</div>






			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				<button type="button" class="btn btn-primary" onclick="save_add_durasi()">Simpan</button>
			</div>
		</div>
	</div>
</div>



<div class="modal fade" id="edit-modal-durasi">
	<div class="modal-dialog" style="width:30%">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit Durasi</h4>
				<input id="id_program_edit" type="hidden">
				<input id="id_fase_edit" type="hidden">
				<input id="id_traffic_edit" type="hidden">
				<input id="id_durasi_edit" type="hidden">
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-12">

						<div class="form-group">
							<label for="">Duration Start </label>
							<input size="10" type="text" class="form-control" id="duration_start_edit"
								placeholder="Input duration Start">
						</div>

						<div class="form-group">
							<label for="">Duration </label>
							<input size="10" type="text" class="form-control" id="duration_duration_edit"
								placeholder="Input duration ">
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-12">
					<div class="form-group">
							<label for="">Duration Yelow </label>
							<input size="10" type="text" class="form-control" id="duration_yellow_edit"
								placeholder="Input duration yellow">
						</div>

					</div>
				</div>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				<button type="button" class="btn btn-primary" onclick="save_edit_durasi()">Simpan</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="delete-modal-durasi">
	<div class="modal-dialog" style="width:30%">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Hapus Durasi</h4>
				<input id="id_durasi_delete" type="hidden">
				<input id="id_program_delete" type="hidden">
				<input id="id_fase_edit_delete" type="hidden">
				<input id="id_traffic_delete" type="hidden">

			</div>
			<div class="modal-body">

				<h4 class="text-center">Apakah anda yakin menghapus data ini ?</h4>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				<button type="button" class="btn btn-primary" onclick="submit_delete_durasi()">Hapus</button>
			</div>
		</div>
	</div>
</div>