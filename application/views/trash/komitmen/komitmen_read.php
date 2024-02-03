<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Komitmen Read</h2>
        <table class="table">
	    <tr><td>Nama Komitmen</td><td><?php echo $nama_komitmen; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Foto</td><td><?php echo $foto; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('komitmen') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>