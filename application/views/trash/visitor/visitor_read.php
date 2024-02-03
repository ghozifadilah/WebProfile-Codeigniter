<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Visitor Read</h2>
        <table class="table">
	    <tr><td>Visitor</td><td><?php echo $visitor; ?></td></tr>
	    <tr><td>Date</td><td><?php echo $date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('visitor') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>