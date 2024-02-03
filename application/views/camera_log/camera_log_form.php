<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Camera_log <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Detector Id <?php echo form_error('detector_id') ?></label>
            <input type="text" class="form-control" name="detector_id" id="detector_id" placeholder="Detector Id" value="<?php echo $detector_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Object <?php echo form_error('object') ?></label>
            <input type="text" class="form-control" name="object" id="object" placeholder="Object" value="<?php echo $object; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Timestamp <?php echo form_error('timestamp') ?></label>
            <input type="text" class="form-control" name="timestamp" id="timestamp" placeholder="Timestamp" value="<?php echo $timestamp; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('camera_log') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>