<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">General_setting Read</h2>
        <table class="table">
	    <tr><td>Record Duration</td><td><?php echo $record_duration; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('general_setting') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>