<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Telepon_kontak Read</h2>
        <table class="table">
	    <tr><td>Kontak</td><td><?php echo $kontak; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('telepon_kontak') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>