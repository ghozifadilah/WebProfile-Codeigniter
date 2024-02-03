<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Group <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Group Nama <?php echo form_error('group_nama') ?></label>
            <input type="text" class="form-control" name="group_nama" id="group_nama" placeholder="Group Nama" value="<?php echo $group_nama; ?>" />
        </div>
	    <input type="hidden" name="group_id" value="<?php echo $group_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('group') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>