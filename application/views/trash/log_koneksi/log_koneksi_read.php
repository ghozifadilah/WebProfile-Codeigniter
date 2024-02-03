<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Log_koneksi Read</h2>
        <table class="table">
	    <tr><td>Log Koneksi Warning Light Id</td><td><?php echo $log_koneksi_warning_light_id; ?></td></tr>
	    <tr><td>Log Koneksi Status</td><td><?php echo $log_koneksi_status; ?></td></tr>
	    <tr><td>Log Koneksi Waktu</td><td><?php echo $log_koneksi_waktu; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('log_koneksi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>