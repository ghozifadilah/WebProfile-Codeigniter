<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Camera_log Read</h2>
        <table class="table">
	    <tr><td>Detector Id</td><td><?php echo $detector_id; ?></td></tr>
	    <tr><td>Object</td><td><?php echo $object; ?></td></tr>
	    <tr><td>Timestamp</td><td><?php echo $timestamp; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('camera_log') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>