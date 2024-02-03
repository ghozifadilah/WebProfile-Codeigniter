

<!-- Modal Kelola Fase-->
<div class="modal fade" id="modal-fase-kelola">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Kelola Data Fase</h4>
			</div>
			<div class="form-group">
					<button type="button" class="btn btn-default" id="btn_Fase_baru" onclick="modal_fase_create(this)">
							<i class="fa fa-plus" aria-hidden="true"></i>
							Buat Fase baru
					</button>
			</div>
                <div class="modal-body">

                    <table id="kelolaFase" class="table table-bordered">
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
		</div>
	</div>
</div>
<!-- END Modal Kelola Fase-->

<!-- Modal Create Fase-->
<div class="modal fade" id="modal-fase-create">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data Fase</h4>
			</div>

			<div class="modal-body">
				<h5 id="massage-fase" style='color:red;'> </h5>
				<form id="add_fase">
					<div class="form-group">
						<input type="hidden" class="form-control" id="id_fase_traffic" placeholder="Input field">
					</div>
					<div class="form-group">
						<label for="">Fase Nomor</label>
						<input type="number" min="1" max="8" class="form-control" id="nomor_fase"
							placeholder="Input field">
					</div>
					<div class="form-group">
						<label for="">Fase Deskripsi</label>
						<textarea class="form-control" id="deskiripsi_fase" name="deskiripsi_fase" cols="20"
							rows="10"></textarea>

					</div>
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<button type="button" id="simpan-fase" class="btn btn-primary" onclick="save_fase(this)">Simpan</button>
			</div>
		</div>
	</div>
</div>
<!-- END Modal Create Fase-->

<!-- Modal Edit Fase-->
<div class="modal fade" id="modal-fase-edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit Data Fase</h4>
			</div>

			<div class="modal-body">
				<h5 id="massage-fase" style='color:red;'> </h5>
				<form id="add_fase">
					<div class="form-group">
						<input type="hidden" class="form-control" id="id_fase" placeholder="Input field">
					</div>
					<div class="form-group">
						<input type="hidden" class="form-control" id="fase_traffic_id" placeholder="Input field">
					</div>
					<div class="form-group">
						<label for="">Fase Nomor</label>
						<input type="number" min="1" max="8" class="form-control" id="nomor_fase_edit"
							placeholder="Input field">
					</div>
					<div class="form-group">
						<label for="">Fase Deskripsi</label>
						<textarea class="form-control" id="deskiripsi_fase_edit" name="deskiripsi_fase_edit" cols="20"
							rows="10"></textarea>

					</div>
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<button type="button" id="simpan-fase" class="btn btn-primary" onclick="simpan_fase_update(this)">Simpan</button>
			</div>
		</div>
	</div>
</div>
<!-- END Modal Create Fase-->

<!-- Modal Create Fase-->
<div class="modal fade" id="modal-fase-delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit Data Fase</h4>
			</div>

			<div class="modal-body">
			<h5>Apakah anda yakin untuk menghapus data fase ini ?</h5>
				<form id="add_fase">
					<div class="form-group">
						<input type="hidden" class="form-control" id="id_fase" placeholder="Input field">
					</div>
					
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<button type="button" id="simpan-fase" class="btn btn-danger" onclick="hapus_fase(this)">Hapus</button>
			</div>
		</div>
	</div>
</div>
<!-- END Modal Create Fase-->
