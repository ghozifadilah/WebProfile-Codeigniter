<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Log_koneksi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Log Koneksi Warning Light Id <?php echo form_error('log_koneksi_warning_light_id') ?></label>
            <input type="text" class="form-control" name="log_koneksi_warning_light_id" id="log_koneksi_warning_light_id" placeholder="Log Koneksi Warning Light Id" value="<?php echo $log_koneksi_warning_light_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Log Koneksi Status <?php echo form_error('log_koneksi_status') ?></label>
            <input type="text" class="form-control" name="log_koneksi_status" id="log_koneksi_status" placeholder="Log Koneksi Status" value="<?php echo $log_koneksi_status; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Log Koneksi Waktu <?php echo form_error('log_koneksi_waktu') ?></label>
            <input type="text" class="form-control" name="log_koneksi_waktu" id="log_koneksi_waktu" placeholder="Log Koneksi Waktu" value="<?php echo $log_koneksi_waktu; ?>" />
        </div>
	    <input type="hidden" name="log_koneksi_id" value="<?php echo $log_koneksi_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('log_koneksi') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>