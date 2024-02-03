<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Jadwal_data Read</h2>
        <table class="table">
	    <tr><td>Id Jadwal Data</td><td><?php echo $id_jadwal_data; ?></td></tr>
	    <tr><td>Id Jadwal WL</td><td><?php echo $id_jadwal_WL; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('jadwal_data') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>