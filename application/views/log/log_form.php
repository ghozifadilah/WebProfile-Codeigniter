<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Log <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Log User Id <?php echo form_error('log_user_id') ?></label>
            <input type="text" class="form-control" name="log_user_id" id="log_user_id" placeholder="Log User Id" value="<?php echo $log_user_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Log Acrtivity <?php echo form_error('log_activity') ?></label>
            <input type="text" class="form-control" name="log_activity" id="log_activity" placeholder="Log Acrtivity" value="<?php echo $log_activity; ?>" />
        </div>
	    <input type="hidden" name="log_id" value="<?php echo $log_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('log') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>