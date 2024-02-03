<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Log_warning_light <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Warning Light Id <?php echo form_error('warning_light_id') ?></label>
            <input type="text" class="form-control" name="warning_light_id" id="warning_light_id" placeholder="Warning Light Id" value="<?php echo $warning_light_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Log Warning Light Voltage <?php echo form_error('log_warning_light_voltage') ?></label>
            <input type="text" class="form-control" name="log_warning_light_voltage" id="log_warning_light_voltage" placeholder="Log Warning Light Voltage" value="<?php echo $log_warning_light_voltage; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Log Warning Light Arus <?php echo form_error('log_warning_light_Arus') ?></label>
            <input type="text" class="form-control" name="log_warning_light_Arus" id="log_warning_light_Arus" placeholder="Log Warning Light Arus" value="<?php echo $log_warning_light_Arus; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Log Warning Light Status Kecepatan <?php echo form_error('log_warning_light_status_kecepatan') ?></label>
            <input type="text" class="form-control" name="log_warning_light_status_kecepatan" id="log_warning_light_status_kecepatan" placeholder="Log Warning Light Status Kecepatan" value="<?php echo $log_warning_light_status_kecepatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Log Warning Light Status Mode <?php echo form_error('log_warning_light_status_mode') ?></label>
            <input type="text" class="form-control" name="log_warning_light_status_mode" id="log_warning_light_status_mode" placeholder="Log Warning Light Status Mode" value="<?php echo $log_warning_light_status_mode; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Timestamp <?php echo form_error('Timestamp') ?></label>
            <input type="text" class="form-control" name="Timestamp" id="Timestamp" placeholder="Timestamp" value="<?php echo $Timestamp; ?>" />
        </div>
	    <input type="hidden" name="log_warning_light_id" value="<?php echo $log_warning_light_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('log_warning_light') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>