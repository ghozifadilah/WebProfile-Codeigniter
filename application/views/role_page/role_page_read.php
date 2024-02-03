<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Role_page Read</h2>
        <table class="table">
	    <tr><td>Role Id</td><td><?php echo $role_id; ?></td></tr>
	    <tr><td>Page Id</td><td><?php echo $page_id; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('role_page') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>