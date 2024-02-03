<div class="modal fade" id="modal-schedule-create">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Traffic Setting</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-2">
						<label for="schedule">
							Nama Preset Jadwal
						</label>
					</div>
					<div class="col-md-10">
						<input id="nama_preset" type="text" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<hr>
						<div class="checkbox">
									<label>
										<input id="setiap_hari"   onchange="select_schedule_ALLday(this);"   type="checkbox" value="1">
										Terapkan ke semua hari
									</label>
								</div>
					</div>
				</div>
				<div class="row">
			
				
					<div class="col-md-12">
						<ul class="nav nav-tabs nav-justified">
							<?php $hari = [
								'senin','selasa','rabu','kamis','jumat','sabtu','minggu'
							]; ?>
							<?php for($h=1;$h<=count($hari);$h++) { ?>
							<li class="<?php echo ($h==1)?'active':'' ?>"><a href="#jadwal_hari_create_<?php echo $h?>" data-toggle="tab"><?php echo $hari[$h-1]?></a></li>
							<?php } ?>
						</ul>
						<div class="tab-content">
							<?php for($h=1;$h<=count($hari);$h++) { ?>
							<div class="tab-pane <?php echo ($h==1)?'active':'' ?>" id="jadwal_hari_create_<?php echo $h?>">
								<br>
								<div class="form-group">
									<label for="">Preset Harian</label>
									<!-- <select name="schedule_day_senin" id="schedule_day_senin" class="form-control">
										<option value="1">jadwal hari 1</option>
										<option value="2">jadwal hari 2</option>
										<option value="3">jadwal hari 3</option>
										<option value="4">jadwal hari 4</option>
										<option value="5">jadwal hari 5</option>
									</select> -->
									
									<div class="input-group">
										<select name="" id="schedule_day_<?php echo $h?>_create" class="form-control schedule_day" required="required" onchange="onchange_select_schedule_day(this)">
											<option value=""></option>
											<option value="1">jadwal harian 1</option>
											<option value="2">jadwal harian 2</option>
											<option value="3">jadwal harian 3</option>
											<option value="4">jadwal harian 4</option>
											<option value="5">jadwal harian 5</option>
										</select>
										<span class="input-group-btn">
											<button type="button" class="btn btn-default" id="btn_edit_schedule_day_<?php echo $h?>_schedule_create">
												<i class="fa fa-edit" aria-hidden="true"></i>
												edit <b>schedule-day</b>
											</button>
											<button type="button" class="btn btn-default" id="btn_new_schedule_day_<?php echo $h?>_schedule_create">
												<i class="fa fa-plus" aria-hidden="true"></i>
												buat jadwal harian baru
											</button>
										</span>
									</div>
								</div>
								
								<br>
								<div class="table-responsive">
									<table class="table table-hover table-striped table-bordered">
										<thead>
											<tr>
												<th rowspan="2">No</th>
												<th colspan="2">waktu mulai</th>
												<th colspan="2">waktu selesai</th>
												<th rowspan="2">Program</th>
												<th rowspan="2">Aksi</th>
											</tr>
											<tr>
												<th>Jam</th>
												<th>Menit</th>
												<th>Jam</th>
												<th>Menit</th>
											</tr>
										</thead>
										<tbody id="tb_schedule_day_<?php echo $h?>_create">
											<?php for($i=1;$i<=0;$i++){ ?>
											<tr>
												<td><?php echo $i ?></td>
												<td><?php echo (integer) (($i-1)*(24/5)) ?></td>
												<td>00</td>
												<td><?php echo (integer) ($i*(24/5)) ?></td>
												<td>00</td>
												<td>
													program <?php echo $i ?>
													<div class="btn-group pull-right">
														<a data-toggle="modal" href='#modal-durasi' class="btn btn-default btn-xs">
															<i class="fa fa-pencil" aria-hidden="true"></i>
														</a>
													</div>
												</td>
												<td>
													<div class="btn-group">
														<button type="button" class="btn btn-default btn-xs">
															<i class="fa fa-pencil" aria-hidden="true"></i>
														</button>
														<button type="button" class="btn btn-default btn-xs">
															<i class="fa fa-times" aria-hidden="true"></i>
														</button>
													</div>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				<button type="button" onclick="save_schedule(this)" class="btn  btn-primary">Simpan</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-schedule-edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Traffic Setting</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-2">
						<label for="schedule">
							Nama Preset Jadwal
						</label>
					</div>
					<div class="col-md-10">
						<input id="edit_Traffic_schedule_id" type="hidden" class="form-control">
						<input id="edit_schedule_id" type="hidden" class="form-control">
						<input id="edit_nama_preset" type="text" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<hr>
						<div class="checkbox">
									<label>
										<!-- <input id="setiap_hari"   onchange="select_schedule_ALLday(this);"   type="checkbox" value="1">
										Terapkan ke semua hari-->
									</label>
								</div>
					</div>
				</div>
				<div class="row">
			
				
					<div class="col-md-12">
						<ul class="nav nav-tabs nav-justified">
							<?php $hari = [
								'senin','selasa','rabu','kamis','jumat','sabtu','minggu'
							]; ?>
							<?php for($h=1;$h<=count($hari);$h++) { ?>
							<li class="<?php echo ($h==1)?'active':'' ?>"><a href="#jadwal_hari_edit_<?php echo $h?>" data-toggle="tab"><?php echo $hari[$h-1]?></a></li>
							<?php } ?>
						</ul>
						<div class="tab-content">
							<?php for($h=1;$h<=count($hari);$h++) { ?>
							<div class="tab-pane <?php echo ($h==1)?'active':'' ?>" id="jadwal_hari_edit_<?php echo $h?>">
								<br>
								<div class="form-group">
									<label for="">Preset Harian</label>
									<!-- <select name="schedule_day_senin" id="schedule_day_senin" class="form-control">
										<option value="1">jadwal hari 1</option>
										<option value="2">jadwal hari 2</option>
										<option value="3">jadwal hari 3</option>
										<option value="4">jadwal hari 4</option>
										<option value="5">jadwal hari 5</option>
									</select> -->
									
									<div class="input-group">
										<select name="" id="schedule_day_<?php echo $h?>_edit" class="form-control schedule_day" required="required" onchange="onchange_select_schedule_day(this)">
											<option value=""></option>
											<option value="1">jadwal harian 1</option>
											<option value="2">jadwal harian 2</option>
											<option value="3">jadwal harian 3</option>
											<option value="4">jadwal harian 4</option>
											<option value="5">jadwal harian 5</option>
										</select>
										<span class="input-group-btn">
											<button type="button" class="btn btn-default" id="btn_edit_schedule_day_<?php echo $h?>_schedule_create">
												<i class="fa fa-edit" aria-hidden="true"></i>
												edit <b>schedule-day</b>
											</button>
											<button type="button" class="btn btn-default" onclick="Modal_create_PresetHarian(this)"  id="btn_new_schedule_day_<?php echo $h?>_schedule_create">
												<i class="fa fa-plus" aria-hidden="true"></i>
												buat jadwal harian baru
											</button>
										</span>
									</div>
								</div>
								
								<br>
								<div class="table-responsive" >
									<table  class="table table-hover table-striped table-bordered">
										<thead>
											<tr>
												<th rowspan="2">No</th>
												<th colspan="2">waktu mulai</th>
												<th colspan="2">waktu selesai</th>
												<th rowspan="2">Program</th>
												<th rowspan="2">Aksi</th>
											</tr>
											<tr>
												<th>Jam</th>
												<th>Menit</th>
												<th>Jam</th>
												<th>Menit</th>
											</tr>
										</thead>
										<tbody class="table-schedule-setting"  id="tb_schedule_day_<?php echo $h?>_edit">
											<?php for($i=1;$i<=0;$i++){ ?>
											<tr>
												<td><?php echo $i ?></td>
												<td><?php echo (integer) (($i-1)*(24/5)) ?></td>
												<td>00</td>
												<td><?php echo (integer) ($i*(24/5)) ?></td>
												<td>00</td>
												<td>
													program <?php echo $i ?>
													<div class="btn-group pull-right">
														<a data-toggle="modal" href='#modal-durasi' class="btn btn-default btn-xs">
															<i class="fa fa-pencil" aria-hidden="true"></i>
														</a>
													</div>
												</td>
												<td>
													<div class="btn-group">
														<button type="button" class="btn btn-default btn-xs">
															<i class="fa fa-pencil" aria-hidden="true"></i>
														</button>
														<button type="button" class="btn btn-default btn-xs">
															<i class="fa fa-times" aria-hidden="true"></i>
														</button>
													</div>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				<button type="button" onclick="save_edit_schedule(this)" class="btn  btn-primary">Simpan</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal Hapus Traffic -->
<div class="modal fade" id="modal-schedule-hapus">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Hapus Data Preset Schedule </h4>
			</div>
			<div class="modal-body">
				<form>
					<input type="hidden" class="form-control" name="hapus_schedule_id" id="hapus_schedule_id" placeholder="hapus_schedule_id Id" value="" />
					<!-- <div class="form-group"> -->
					<h4 id="Notifdelete_traffic" >Apakah anda yakin untuk menghapus data prest schedule ?</h4>
			</div>


			<div class="modal-footer">
			
			<button type="button" class="btn btn-success"    data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-danger" onclick="submit_schedule_hapus(this)" id="btn_save_traffic_edit">HAPUS</button>
				
				</form>
			</div>
		</div>
	</div>
</div>


<!-- end Modal edit jadwal -->