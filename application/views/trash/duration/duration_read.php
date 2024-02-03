<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Duration Read</h2>
        <table class="table">
	    <tr><td>Duration Program Id</td><td><?php echo $duration_program_id; ?></td></tr>
	    <tr><td>Duration Fase</td><td><?php echo $duration_fase_id; ?></td></tr>
	    <tr><td>Duration Start</td><td><?php echo $duration_start; ?></td></tr>
	    <tr><td>Duration Duration</td><td><?php echo $duration_duration; ?></td></tr>
	    <!-- <tr><td>Duration Warna</td><td><?php // echo $duration_warna; ?></td></tr> -->
	    <tr><td></td><td><a href="<?php echo site_url('duration') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>