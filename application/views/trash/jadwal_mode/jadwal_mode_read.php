<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Jadwal_mode Read</h2>
        <table class="table">
	    <tr><td>Nama</td><td><?php echo $Nama; ?></td></tr>
	    <tr><td>Mode</td><td><?php echo $Mode; ?></td></tr>
	    <tr><td>Kecepatan</td><td><?php echo $kecepatan; ?></td></tr>
	    <tr><td>Waktu Mulai</td><td><?php echo $waktu_mulai; ?></td></tr>
	    <tr><td>Waktu Selesai</td><td><?php echo $waktu_selesai; ?></td></tr>
	    <tr><td>Harian</td><td><?php echo $Harian; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('jadwal_mode') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>