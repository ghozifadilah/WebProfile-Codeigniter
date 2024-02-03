<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Log Read</h2>
        <table class="table">
	    <tr><td>Log User Id</td><td><?php echo $log_user_id; ?></td></tr>
	    <tr><td>Log Acrtivity</td><td><?php echo $log_activity; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('log') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>