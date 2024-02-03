<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Role_page <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Role Id <?php echo form_error('role_id') ?></label>
            <input type="text" class="form-control" name="role_id" id="role_id" placeholder="Role Id" value="<?php echo $role_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Page Id <?php echo form_error('page_id') ?></label>
            <input type="text" class="form-control" name="page_id" id="page_id" placeholder="Page Id" value="<?php echo $page_id; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('role_page') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>