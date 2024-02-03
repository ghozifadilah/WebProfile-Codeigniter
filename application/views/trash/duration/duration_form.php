<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Duration <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Duration Program Id <?php echo form_error('duration_program_id') ?></label>
            <input type="text" class="form-control" name="duration_program_id" id="duration_program_id" placeholder="Duration Program Id" value="<?php echo $duration_program_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Duration Fase <?php echo form_error('duration_fase_id') ?></label>
            <input type="text" class="form-control" name="duration_fase_id" id="duration_fase_id" placeholder="Duration Fase" value="<?php echo $duration_fase_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Duration Start <?php echo form_error('duration_start') ?></label>
            <input type="text" class="form-control" name="duration_start" id="duration_start" placeholder="Duration Start" value="<?php echo $duration_start; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Duration Duration <?php echo form_error('duration_duration') ?></label>
            <input type="text" class="form-control" name="duration_duration" id="duration_duration" placeholder="Duration Duration" value="<?php echo $duration_duration; ?>" />
        </div>
	    <!-- <div class="form-group">
            <label for="enum">Duration Warna <?php //echo form_error('duration_warna') ?></label>
            <input type="text" class="form-control" name="duration_warna" id="duration_warna" placeholder="Duration Warna" value="<?php //echo $duration_warna; ?>" />
        </div> -->
	    <input type="hidden" name="duration_id" value="<?php echo $duration_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('duration') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>