
<!-- Modal Change Jadwal -->
<?php 
$daftar_hari_angka = array(
	'Setiap Hari' => 0,
	'Sen' => 1,
	'Sel' => 2,
	'Rab' => 3,
	'Kam' => 4,
	'Jum' => 5,
	'Sab' => 6,
	'Ming' => 7,
   );
?>
<div class="modal fade" id="jadwal_changes_modal">
	<div class="modal-dialog"  style="width:55%">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Penjadwalan Warning Light</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" id="value_id_wl" value="">
				<div class="form-group">
					<div class="form-group">
						<label for="varchar">Jadwal</label>
                        <span class="input-group-btn">

						<select  class="form-control" name="" id="select_jadwal">
							<option value="pilih">pilih</option>
							<option value="1">Blinks</option>
							<option value="2">Flip Flop</option>
							<option value="3">Double Flip Flop</option>
							<option value="4">Eco Blink</option>
                            
						</select>

                         </span>

                        <span class="input-group-btn">
                            <button onclick="submit_jadwal_wl()" class=" btn btn-default"> <i class="fa fa-plus"></i> Tambah Jadwal</button>
                            <a class=" btn btn-default" href="<?php echo site_url('jadwal_mode') ?>"> <i class="fa fa-file"></i> List Jadwal </a>
	                    </span>
                      
					</div>
                    
                  

					<div class="form-group">
					<table class="table table-reponsive">
                        <thead>
                            <tr>
                                <th> Nama </th>
                                <th> Mode </th>
                                <th> Kecepatan </th>
                                <th> Waktu Mulai </th>
                                <th> Waktu Selesai </th>
                                <th> Hari </th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody id="table-schedule-terjadwal">
                            
                        </tbody>
                    </table>
					</div>

				</div>

		
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>