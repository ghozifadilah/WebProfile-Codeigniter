<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Mode Read</h2>
        <table class="table">
	    <tr><td>Mode Nama</td><td><?php echo $mode_nama; ?></td></tr>
	    <tr><td>Mode Clock</td><td><?php echo $mode_clock; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('mode') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>