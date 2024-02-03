<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Divisi Read</h2>
        <table class="table">
	    <tr><td>Nama Divisi</td><td><?php echo $nama_divisi; ?></td></tr>
	    <tr><td>Icon Divisi</td><td><?php echo $icon_divisi; ?></td></tr>
	    <tr><td>Deskripsi</td><td><?php echo $deskripsi; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('divisi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>