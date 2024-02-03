<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Produk <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Produk <?php echo form_error('nama_produk') ?></label>
            <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Nama Produk" value="<?php echo $nama_produk; ?>" />
        </div>
	    <div class="form-group">
            <label for="deskripsi_produk">Deskripsi Produk <?php echo form_error('deskripsi_produk') ?></label>
            <textarea class="form-control" rows="3" name="deskripsi_produk" id="deskripsi_produk" placeholder="Deskripsi Produk"><?php echo $deskripsi_produk; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Datasheet <?php echo form_error('datasheet') ?></label>
            <input type="text" class="form-control" name="datasheet" id="datasheet" placeholder="Datasheet" value="<?php echo $datasheet; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Kategori <?php echo form_error('id_kategori') ?></label>
            <input type="text" class="form-control" name="id_kategori" id="id_kategori" placeholder="Id Kategori" value="<?php echo $id_kategori; ?>" />
        </div>
	    <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('produk') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>