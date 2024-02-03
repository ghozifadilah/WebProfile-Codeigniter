<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Records Read</h2>
        <table class="table">
	    <tr><td>Camera Id</td><td><?php echo $camera_id; ?></td></tr>
	    <tr><td>File Url</td><td><?php echo $file_url; ?></td></tr>
	    <tr><td>Duration Sec</td><td><?php echo $duration_sec; ?></td></tr>
	    <tr><td>Timestamp</td><td><?php echo $timestamp; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('records') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>