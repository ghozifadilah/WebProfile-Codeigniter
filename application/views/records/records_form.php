<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Records <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Camera Id <?php echo form_error('camera_id') ?></label>
            <input type="text" class="form-control" name="camera_id" id="camera_id" placeholder="Camera Id" value="<?php echo $camera_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">File Url <?php echo form_error('file_url') ?></label>
            <input type="text" class="form-control" name="file_url" id="file_url" placeholder="File Url" value="<?php echo $file_url; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Duration Sec <?php echo form_error('duration_sec') ?></label>
            <input type="text" class="form-control" name="duration_sec" id="duration_sec" placeholder="Duration Sec" value="<?php echo $duration_sec; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Timestamp <?php echo form_error('timestamp') ?></label>
            <input type="text" class="form-control" name="timestamp" id="timestamp" placeholder="Timestamp" value="<?php echo $timestamp; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('records') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>