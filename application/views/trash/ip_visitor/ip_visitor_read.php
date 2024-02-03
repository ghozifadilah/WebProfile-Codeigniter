<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Ip_visitor Read</h2>
        <table class="table">
	    <tr><td>Ip Address</td><td><?php echo $ip_address; ?></td></tr>
	    <tr><td>Timestamp</td><td><?php echo $timestamp; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('ip_visitor') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>