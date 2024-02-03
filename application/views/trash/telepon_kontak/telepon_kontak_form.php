<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px"><?php echo $button ?> : Nomor Telepon </h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nomor Kontak <?php echo form_error('kontak') ?></label>
            <input type="text" class="form-control" name="kontak" id="kontak" placeholder="0821xxxxxx" value="<?php echo $kontak; ?>" />
        </div>
	    <input type="hidden" name="id_telepon" value="<?php echo $id_telepon; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('telepon_kontak') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>