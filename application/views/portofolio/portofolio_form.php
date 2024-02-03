<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Portofolio <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Judul <?php echo form_error('judul') ?></label>
            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tools <?php echo form_error('tools') ?></label>
            <input type="text" class="form-control" name="tools" id="tools" placeholder="Tools" value="<?php echo $tools; ?>" />
        </div>

	    <div class="form-group">
            <label for="kategori">kategori <?php echo form_error('kategori') ?></label>
            <textarea class="form-control" rows="3" name="kategori" id="kategori" placeholder="kategori"><?php echo $kategori; ?></textarea>
        </div>

	    <div class="form-group">
            <label for="deskripsi">Deskripsi <?php echo form_error('deskripsi') ?></label>
            <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="timestamp">Timestamp <?php echo form_error('timestamp') ?></label>
            <input type="text" class="form-control" name="timestamp" id="timestamp" placeholder="Timestamp" value="<?php echo $timestamp; ?>" />
        </div>
	    <div class="form-group">
            <label for="image">Image <?php echo form_error('image') ?></label>
            <textarea class="form-control" rows="3" name="image" id="image" placeholder="Image"><?php echo $image; ?></textarea>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('portofolio') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>