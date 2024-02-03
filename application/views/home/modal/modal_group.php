<!-- Modal tambah area -->
<div class="modal fade" id="modal-group">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Buat Group Baru</h4>
			</div>
			<div class="modal-body">

				<div class="form-group">
					<label for="">Nama Group</label>
					<input type="text" class="form-control" id="nama_group" placeholder="Input field">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<button type="button" class="btn btn-primary" onclick="save_group_data(this)">Simpan dan
					lanjutkan</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-group-next">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Buat Group Baru</h4>
			</div>
			<div class="modal-body">

				<div class="form-group">
					<label for="">Nama Group</label>
					<input type="hidden" disable class="form-control" id="id_group_next" placeholder="Input field">
					<input type="text" disable class="form-control" id="nama_group_next" placeholder="Input field">
				</div>

				<div class="form-group">
					<label><b>Data Area :</b></label>
					<p style="color:red;"> <i>*) klik tombol <i class="fa fa-lg fa-times"></i> jika ada area yang tidak
							dipilih</i> </p>

					<div style="height: 250px;overflow-y: scroll; width:90%;" class="area_select">
						<table class="table table-hover text-center">
							<td id="btn_reload"> </td>
							<thead>
								<tr>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody id="table_select_area">
								
							</tbody>

						</table>
						
					</div>
					<button onclick="tambah_group_area()" class="btn btn-default">Tambah Area <i clas="fa fa-plus"></i>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Selesai</button>
				<button id="btn_save_group" type="button" class="btn btn-primary" onclick="save_group_area(this)">Save
					Group Area</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="group-area-edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit Group </h4>
			</div>
			<div class="modal-body">

				<div class="form-group">
					<input type="hidden" disable class="form-control" id="id_group_edit" placeholder="Input field">
				</div>
				<div class="form-group">
					<label for="">Nama Group</label>
					<input type="text" disable class="form-control" id="nama_group_edit" placeholder="Input field">
				</div>

				<div class="form-group">
					<label><b>Data Area :</b></label>
					<p style="color:red;"> <i>*) klik tombol <i class="fa fa-lg fa-times"></i> jika ada area yang tidak
							dipilih</i> </p>
					<p id="saved"> </p>
					<div style="height: 250px;overflow-y: scroll; width:90%;" class="area_select">
						<table class="table table-hover text-center">
							<td id="btn_reload_edit"> </td>
							<thead>
								<tr>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody id="table_select_area_edit">
								<tr>
									<td>
										<h5> <b>Tes</b> </h5>
									</td>
									<td>
										<h4><button class="btn btn-sm btn-danger"> close </button></h4>
									</td>
								</tr>
							</tbody>

						</table>
					</div>
				</div>
				<button onclick="tambah_group_area()" class="btn btn-default">Tambah Area <i clas="fa fa-plus"></i>
				</button>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Selesai</button>
				<button id="btn_save_group_edit" type="button" class="btn btn-primary"
					onclick="save_group_area(this)">Save Group Area</button>
			</div>
		</div>
	</div>
</div>



<!-- Modal Hapus warning_light -->
<div class="modal fade" id="modal_group_delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Hapus Data Group</h4>
			</div>
			<div class="modal-body">
				<form>
					<input type="hidden" class="form-control" name="group_deleted_id" id="group_deleted_id"
						placeholder="warning_light_id" value="" />
					<!-- <div class="form-group"> -->
					<h5 id="Notifdelete_warning_light">Apakah anda yakin untuk menghapus data ini?</h5>
			</div>


			<div class="modal-footer">

				<button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-danger" onclick="submit_hapus_group()"
					id="submit_warning_light_hapus">HAPUS</button>

				</form>
			</div>
		</div>
	</div>
</div>


<!-- Modal Tambah Area -->
<div class="modal fade" id="modal_area_add_group">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data Group</h4>
			</div>
			<div class="modal-body">
				<form>
					
					<!-- <div class="form-group"> -->
					<div class="col-md-12">
						<div class="form-group">
							<label for="varchar">Add Group Area</label>
							<select class="form-control" name="" id="area_add_group">
								<option value="pilih">pilih</option>
							</select>
						</div>

					</div>

			</div>
			<div class="modal-footer">

				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" onclick="add_area_selected()"
					id="submit_warning_light_hapus">Add Area</button>
				</form>
			</div>
		</div>
	</div>
</div>