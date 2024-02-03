<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px"> <?php echo $button ?> Preset Jadwal</h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('Nama') ?></label>
            <input type="text" class="form-control" name="Nama" id="Nama" placeholder="Nama" value="<?php echo $Nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Pilih Mode<?php echo form_error('Mode') ?></label>
          

            <select style="width:300px" class="form-control" name="Mode" id="Mode_select">
                <option value="1">Blink</option>
                <option value="2">Flip Flop</option>
                <option value="3">Double Flip Flop</option>
                <option value="4">Eco Blink</option>
            </select>

        </div>
	    <div class="form-group">
            <label for="int">Kecepatan <?php echo form_error('kecepatan') ?></label>

            <select style="width:300px" class="form-control" name="kecepatan" id="kecepatan_select">
                <option value="250ms">250ms</option>
                <option value="500ms">500ms</option>
                <option value="1000ms">1000ms</option>
                <option value="1500ms">1500ms</option>
            </select>


        </div>    
	    <div class="form-group">
            <label for="int">Pilih Hari <?php echo form_error('kecepatan') ?></label>

            <div class="row">
				<div class="col-md-3">
					<input type="checkbox" name="Hari_1" value="1" id="Hari_1" />
					<label for="Hari_1">Senin</label>
				</div>
				<div class="col-md-3">
					<input type="checkbox" name="Hari_2" value="2" id="Hari_2" />
					<label for="Hari_2">Selasa</label>
				</div>
				<div class="col-md-3">
					<input type="checkbox" name="Hari_3" value="3" id="Hari_3" />
					<label for="Hari_3">Rabu</label>
				</div>
				<div class="col-md-3">
					<input type="checkbox" name="Hari_4" value="4" id="Hari_4" />
					<label for="Hari_4">Kamis</label>
				</div>
				<div class="col-md-3">
					<input type="checkbox" name="Hari_5" value="5" id="Hari_5" />
					<label for="Hari_5">Jumat</label>
				</div>
				<div class="col-md-3">
					<input type="checkbox" name="Hari_6" value="6" id="Hari_6" />
					<label for="Hari_6">Sabtu</label>
				</div>
				<div class="col-md-3">
					<input type="checkbox" name="Hari_7" value="7" id="Hari_7" />
					<label  for="Hari_7">Minggu</label>
				</div>
				<div class="col-md-3">
					<input type="checkbox" name="Hari_0" value="0" id="Hari_0" />
					<label style="color:green"  for="Hari_0">Setiap Hari</label>
				</div>



			</div>


        </div>    
        <div class="form-group">
        <div class="row">
			<div class="col-md-12">
				<!-- <input  type="hidden" id="traffic_id" value="" class="form-control">
				<input  type="hidden" id="id_schedule" value="" class="form-control"> -->
			
						<h5>Waktu Mulai :</h5>
					</div>
					<div class="col-md-6">
						<label for="schedule">
							Jam
						</label>
						<input value="<?php echo substr($waktu_mulai,0,2) ?>" name="mulai_jam" id="schedule_jam_start_edit" type="number" class="form-control">
					</div>
					<div class="col-md-6">
						<label for="schedule">
							Menit
						</label>
						<input value="<?php echo substr($waktu_mulai,3,2) ?>" name="mulai_menit" id="schedule_menit_start_edit" type="number" class="form-control">
					</div>

					<div class="col-md-12">
					<hr>
						<h5>Waktu Selesai :</h5>
					</div>
					<div class="col-md-6">
						<label for="schedule">
							Jam
						</label>
						<input value="<?php echo substr($waktu_selesai,0,2) ?>"  name="selesai_jam" id="schedule_jam_end_edit" type="number" class="form-control">
					</div>
					<div class="col-md-6">
						<label for="schedule">
							Menit
						</label>
						<input value="<?php echo substr($waktu_selesai,3,2) ?>" name="selesai_menit" id="schedule_menit_end_edit" type="number" class="form-control">
					</div>
				</div>
        </div>
	    <input type="hidden" name="id_jadwal" value="<?php echo $id_jadwal; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jadwal_mode') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>
