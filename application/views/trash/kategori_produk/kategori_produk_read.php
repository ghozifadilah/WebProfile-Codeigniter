<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Kategori_produk Read</h2>
        <table class="table">
	    <tr><td>Nama Kategori</td><td><?php echo $nama_kategori; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kategori_produk') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>