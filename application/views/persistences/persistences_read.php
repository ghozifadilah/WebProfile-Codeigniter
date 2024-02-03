<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Persistences Read</h2>
        <table class="table">
	    <tr><td>User Id</td><td><?php echo $user_id; ?></td></tr>
	    <tr><td>Code</td><td><?php echo $code; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('persistences') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>