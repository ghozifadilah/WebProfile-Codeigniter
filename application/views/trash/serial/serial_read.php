<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Serial Read</h2>
        <table class="table">
	    <tr><td>Serial Traffic Id</td><td><?php echo $serial_traffic_id; ?></td></tr>
	    <tr><td>Serial Key</td><td><?php echo $serial_key; ?></td></tr>
	    <tr><td>Serial Active</td><td><?php echo $serial_active; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('serial') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>