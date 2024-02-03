<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Mode <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Mode Nama <?php echo form_error('mode_nama') ?></label>
            <input type="text" class="form-control" name="mode_nama" id="mode_nama" placeholder="Mode Nama" value="<?php echo $mode_nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Mode Clock <?php echo form_error('mode_clock') ?></label>
            <input type="text" class="form-control" name="mode_clock" id="mode_clock" placeholder="Mode Clock" value="<?php echo $mode_clock; ?>" />
        </div>
	    <input type="hidden" name="mode_id" value="<?php echo $mode_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mode') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>