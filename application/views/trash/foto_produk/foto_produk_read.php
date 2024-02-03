<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Foto_produk Read</h2>
        <table class="table">
	    <tr><td>Foto</td><td><?php echo $foto; ?></td></tr>
	    <tr><td>Id Produk</td><td><?php echo $id_produk; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('foto_produk') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>