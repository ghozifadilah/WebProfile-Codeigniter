<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Email_kontak Read</h2>
        <table class="table">
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('email_kontak') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>