<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">View_group_area <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Group Nama <?php echo form_error('group_nama') ?></label>
            <input type="text" class="form-control" name="group_nama" id="group_nama" placeholder="Group Nama" value="<?php echo $group_nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Group Area Group Id <?php echo form_error('group_area_group_id') ?></label>
            <input type="text" class="form-control" name="group_area_group_id" id="group_area_group_id" placeholder="Group Area Group Id" value="<?php echo $group_area_group_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Group Area Area Id <?php echo form_error('group_area_area_id') ?></label>
            <input type="text" class="form-control" name="group_area_area_id" id="group_area_area_id" placeholder="Group Area Area Id" value="<?php echo $group_area_area_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Area Nama <?php echo form_error('area_nama') ?></label>
            <input type="text" class="form-control" name="area_nama" id="area_nama" placeholder="Area Nama" value="<?php echo $area_nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">User Id <?php echo form_error('user_id') ?></label>
            <input type="text" class="form-control" name="user_id" id="user_id" placeholder="User Id" value="<?php echo $user_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">User Nama <?php echo form_error('user_nama') ?></label>
            <input type="text" class="form-control" name="user_nama" id="user_nama" placeholder="User Nama" value="<?php echo $user_nama; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $sd; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('view_group_area') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>