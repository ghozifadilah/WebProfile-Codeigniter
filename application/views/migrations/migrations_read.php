<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Migrations Read</h2>
        <table class="table">
	    <tr><td>Migration</td><td><?php echo $migration; ?></td></tr>
	    <tr><td>Batch</td><td><?php echo $batch; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('migrations') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>