<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Kategori_produk <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Kategori <?php echo form_error('nama_kategori') ?></label>
            <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Nama Kategori" value="<?php echo $nama_kategori; ?>" />
        </div>
	    <input type="hidden" name="id_kategori" value="<?php echo $id_kategori; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kategori_produk') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>