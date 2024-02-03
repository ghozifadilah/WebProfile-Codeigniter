<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Produk Read</h2>
        <table class="table">
	    <tr><td>Nama Produk</td><td><?php echo $nama_produk; ?></td></tr>
	    <tr><td>Deskripsi Produk</td><td><?php echo $deskripsi_produk; ?></td></tr>
	    <tr><td>Datasheet</td><td><?php echo $datasheet; ?></td></tr>
	    <tr><td>Id Kategori</td><td><?php echo $id_kategori; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('produk') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>