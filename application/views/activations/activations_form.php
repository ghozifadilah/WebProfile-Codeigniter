<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Activations <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">User Id <?php echo form_error('user_id') ?></label>
            <input type="text" class="form-control" name="user_id" id="user_id" placeholder="User Id" value="<?php echo $user_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Code <?php echo form_error('code') ?></label>
            <input type="text" class="form-control" name="code" id="code" placeholder="Code" value="<?php echo $code; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Completed <?php echo form_error('completed') ?></label>
            <input type="text" class="form-control" name="completed" id="completed" placeholder="Completed" value="<?php echo $completed; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Completed At <?php echo form_error('completed_at') ?></label>
            <input type="text" class="form-control" name="completed_at" id="completed_at" placeholder="Completed At" value="<?php echo $completed_at; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Created At <?php echo form_error('created_at') ?></label>
            <input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Updated At <?php echo form_error('updated_at') ?></label>
            <input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="Updated At" value="<?php echo $updated_at; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('activations') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>