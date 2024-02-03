<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Pages Read</h2>
        <table class="table">
	    <tr><td>Name</td><td><?php echo $name; ?></td></tr>
	    <tr><td>Url</td><td><?php echo $url; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pages') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>