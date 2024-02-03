<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Stremers Read</h2>
        <table class="table">
	    <tr><td>Company Id</td><td><?php echo $company_id; ?></td></tr>
	    <tr><td>Name</td><td><?php echo $name; ?></td></tr>
	    <tr><td>Ip</td><td><?php echo $ip; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('stremers') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>