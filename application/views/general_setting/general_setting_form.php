<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">General_setting <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Record Duration <?php echo form_error('record_duration') ?></label>
            <input type="text" class="form-control" name="record_duration" id="record_duration" placeholder="Record Duration" value="<?php echo $record_duration; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('general_setting') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>