<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Detectors Read</h2>
        <table class="table">
	    <tr><td>Camera Id</td><td><?php echo $camera_id; ?></td></tr>
	    <tr><td>Point A X</td><td><?php echo $point_a_x; ?></td></tr>
	    <tr><td>Point A Y</td><td><?php echo $point_a_y; ?></td></tr>
	    <tr><td>Point B X</td><td><?php echo $point_b_x; ?></td></tr>
	    <tr><td>Point B Y</td><td><?php echo $point_b_y; ?></td></tr>
	    <tr><td>Line Order</td><td><?php echo $line_order; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('detectors') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>