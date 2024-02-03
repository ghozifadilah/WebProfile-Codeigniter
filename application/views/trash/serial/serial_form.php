<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Serial <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Serial Traffic Id <?php echo form_error('serial_traffic_id') ?></label>
            <input type="text" class="form-control" name="serial_traffic_id" id="serial_traffic_id" placeholder="Serial Traffic Id" value="<?php echo $serial_traffic_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Serial Key <?php echo form_error('serial_key') ?></label>
            <input type="text" class="form-control" name="serial_key" id="serial_key" placeholder="Serial Key" value="<?php echo $serial_key; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Serial Active <?php echo form_error('serial_active') ?></label>
            <input type="text" class="form-control" name="serial_active" id="serial_active" placeholder="Serial Active" value="<?php echo $serial_active; ?>" />
        </div>
	    <input type="hidden" name="serial_id" value="<?php echo $serial_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('serial') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>