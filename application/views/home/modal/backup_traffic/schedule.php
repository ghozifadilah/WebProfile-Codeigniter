<div class="modal fade" id="modal-schedule">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Traffic Setting</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-2"><label for="schedule">Preset Jadwal</label></div>
					<div class="col-md-10">
						<select name="traffic_schedule_id" id="traffic_schedule_id" class="form-control">
							<option value="1">jadwal-1</option>
							<option value="2">jadwal-2</option>
							<option value="3">jadwal-3</option>
							<option value="4">jadwal-4</option>
							<option value="5">jadwal-5</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<ul class="nav nav-tabs nav-justified">
							<li class="active"><a href="#jadwal_hari_1" data-toggle="tab">Senin</a></li>
							<li><a href="#jadwal_hari_2" data-toggle="tab">Selasa</a></li>
							<li><a href="#jadwal_hari_3" data-toggle="tab">Rabu</a></li>
							<li><a href="#jadwal_hari_4" data-toggle="tab">Kamis</a></li>
							<li><a href="#jadwal_hari_5" data-toggle="tab">Jumat</a></li>
							<li><a href="#jadwal_hari_6" data-toggle="tab">Sabtu</a></li>
							<li><a href="#jadwal_hari_7" data-toggle="tab">Minggu</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="jadwal_hari_1">
								<br>
								<div class="form-group">
									<label for="">Preset Harian</label>
									<select name="schedule_day_senin" id="schedule_day_senin" class="form-control">
										<option value="1">jadwal hari 1</option>
										<option value="2">jadwal hari 2</option>
										<option value="3">jadwal hari 3</option>
										<option value="4">jadwal hari 4</option>
										<option value="5">jadwal hari 5</option>
									</select>
								</div>
								<div class="checkbox">
									<label>
										<input id="" onchange="select_schedule_ALLday(this);" type="checkbox" value="1">
										Terapkan ke semua hari
									</label>
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
										<tbody>
											<?php for($i=1;$i<=5;$i++){ ?>
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
							<div class="tab-pane" id="jadwal_hari_2">
								<br>
								<div class="form-group">
									<label for="">Preset Harian</label>
									<select name="schedule_day_selasa" id="schedule_day_selasa" class="form-control">
										<option value="1">jadwal hari 1</option>
										<option value="2">jadwal hari 2</option>
										<option value="3">jadwal hari 3</option>
										<option value="4">jadwal hari 4</option>
										<option value="5">jadwal hari 5</option>
									</select>
								</div>
								<div class="checkbox">
									<label>
										<input id="" type="checkbox" value="">
										Terapkan ke semua hari
									</label>
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
										<tbody>
											<?php for($i=1;$i<=5;$i++){ ?>
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
							<div class="tab-pane" id="jadwal_hari_3">
								<br>
								<div class="form-group">
									<label for="">Preset Harian</label>
									<select name="schedule_day_rabu" id="schedule_day_rabu" class="form-control">
										<option value="1">jadwal hari 1</option>
										<option value="2">jadwal hari 2</option>
										<option value="3">jadwal hari 3</option>
										<option value="4">jadwal hari 4</option>
										<option value="5">jadwal hari 5</option>
									</select>
								</div>
								<div class="checkbox">
									<label>
										<input id="" type="checkbox" value="">
										Terapkan ke semua hari
									</label>
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
										<tbody>
											<?php for($i=1;$i<=5;$i++){ ?>
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
							<div class="tab-pane" id="jadwal_hari_4">
								<br>
								<div class="form-group">
									<label for="">Preset Harian</label>
									<select name="schedule_day_kamis" id="schedule_day_kamis" class="form-control">
										<option value="1">jadwal hari 1</option>
										<option value="2">jadwal hari 2</option>
										<option value="3">jadwal hari 3</option>
										<option value="4">jadwal hari 4</option>
										<option value="5">jadwal hari 5</option>
									</select>
								</div>
								<div class="checkbox">
									<label>
										<input id="" type="checkbox" value="">
										Terapkan ke semua hari
									</label>
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
										<tbody>
											<?php for($i=1;$i<=5;$i++){ ?>
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
							<div class="tab-pane" id="jadwal_hari_5">
								<br>
								<div class="form-group">
									<label for="">Preset Harian</label>
									<select name="schedule_day_jumat" id="schedule_day_jumat" class="form-control">
										<option value="1">jadwal hari 1</option>
										<option value="2">jadwal hari 2</option>
										<option value="3">jadwal hari 3</option>
										<option value="4">jadwal hari 4</option>
										<option value="5">jadwal hari 5</option>
									</select>
								</div>
								<div class="checkbox">
									<label>
										<input id="" type="checkbox" value="">
										Terapkan ke semua hari
									</label>
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
										<tbody>
											<?php for($i=1;$i<=5;$i++){ ?>
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
							<div class="tab-pane" id="jadwal_hari_6">
								<br>
								<div class="form-group">
									<label for="">Preset Harian</label>
									<select name="schedule_day_sabtu" id="schedule_day_sabtu" class="form-control">
										<option value="1">jadwal hari 1</option>
										<option value="2">jadwal hari 2</option>
										<option value="3">jadwal hari 3</option>
										<option value="4">jadwal hari 4</option>
										<option value="5">jadwal hari 5</option>
									</select>
								</div>
								<div class="checkbox">
									<label>
										<input id="" type="checkbox" value="">
										Terapkan ke semua hari
									</label>
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
										<tbody>
											<?php for($i=1;$i<=5;$i++){ ?>
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
							<div class="tab-pane" id="jadwal_hari_7">
								<br>
								<div class="form-group">
									<label for="">Preset Harian</label>
									<select name="schedule_day_minggu" id="schedule_day_minggu" class="form-control">
										<option value="1">jadwal hari 1</option>
										<option value="2">jadwal hari 2</option>
										<option value="3">jadwal hari 3</option>
										<option value="4">jadwal hari 4</option>
										<option value="5">jadwal hari 5</option>
									</select>
								</div>
								<div class="checkbox">
									<label>
										<input id="" type="checkbox" value="">
										Terapkan ke semua hari
									</label>
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
										<tbody>
											<?php for($i=1;$i<=5;$i++){ ?>
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
						</div>
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