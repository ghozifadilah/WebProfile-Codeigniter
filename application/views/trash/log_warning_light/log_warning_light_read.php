<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Log_warning_light Read</h2>
        <table class="table">
	    <tr><td>Warning Light Id</td><td><?php echo $warning_light_id; ?></td></tr>
	    <tr><td>Log Warning Light Voltage</td><td><?php echo $log_warning_light_voltage; ?></td></tr>
	    <tr><td>Log Warning Light Arus</td><td><?php echo $log_warning_light_Arus; ?></td></tr>
	    <tr><td>Log Warning Light Status Kecepatan</td><td><?php echo $log_warning_light_status_kecepatan; ?></td></tr>
	    <tr><td>Log Warning Light Status Mode</td><td><?php echo $log_warning_light_status_mode; ?></td></tr>
	    <tr><td>Timestamp</td><td><?php echo $Timestamp; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('log_warning_light') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>