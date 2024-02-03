<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Group_area <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Group Area Group Id <?php echo form_error('group_area_group_id') ?></label>
            <input type="text" class="form-control" name="group_area_group_id" id="group_area_group_id" placeholder="Group Area Group Id" value="<?php echo $group_area_group_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Group Area Area Id <?php echo form_error('group_area_area_id') ?></label>
            <input type="text" class="form-control" name="group_area_area_id" id="group_area_area_id" placeholder="Group Area Area Id" value="<?php echo $group_area_area_id; ?>" />
        </div>
	    <input type="hidden" name="group_area_id" value="<?php echo $group_area_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('group_area') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>