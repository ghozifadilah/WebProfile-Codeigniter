<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Area <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Area Nama <?php echo form_error('area_nama') ?></label>
            <input type="text" class="form-control" name="area_nama" id="area_nama" placeholder="Area Nama" value="<?php echo $area_nama; ?>" />
        </div>
	    <input type="hidden" name="area_id" value="<?php echo $area_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('area') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>