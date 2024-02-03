<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Warning_light <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Warning Light Area Id <?php echo form_error('warning_light_area_id') ?></label>
            <input type="text" class="form-control" name="warning_light_area_id" id="warning_light_area_id" placeholder="Warning Light Area Id" value="<?php echo $warning_light_area_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Warning Light Sitename <?php echo form_error('warning_light_sitename') ?></label>
            <input type="text" class="form-control" name="warning_light_sitename" id="warning_light_sitename" placeholder="Warning Light Sitename" value="<?php echo $warning_light_sitename; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Warning Light Tahun <?php echo form_error('warning_light_tahun') ?></label>
            <input type="text" class="form-control" name="warning_light_tahun" id="warning_light_tahun" placeholder="Warning Light Tahun" value="<?php echo $warning_light_tahun; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Warning Light Mode <?php echo form_error('warning_light_mode') ?></label>
            <input type="text" class="form-control" name="warning_light_mode" id="warning_light_mode" placeholder="Warning Light Mode" value="<?php echo $warning_light_mode; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Warning Light Kecepatan <?php echo form_error('warning_light_kecepatan') ?></label>
            <input type="text" class="form-control" name="warning_light_kecepatan" id="warning_light_kecepatan" placeholder="Warning Light Kecepatan" value="<?php echo $warning_light_kecepatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Warning Light Lat <?php echo form_error('warning_light_lat') ?></label>
            <input type="text" class="form-control" name="warning_light_lat" id="warning_light_lat" placeholder="Warning Light Lat" value="<?php echo $warning_light_lat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Warning Light Lng <?php echo form_error('warning_light_lng') ?></label>
            <input type="text" class="form-control" name="warning_light_lng" id="warning_light_lng" placeholder="Warning Light Lng" value="<?php echo $warning_light_lng; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Warning Light Status Online <?php echo form_error('warning_light_status_online') ?></label>
            <input type="text" class="form-control" name="warning_light_status_online" id="warning_light_status_online" placeholder="Warning Light Status Online" value="<?php echo $warning_light_status_online; ?>" />
        </div>
	    <input type="hidden" name="warning_light_id" value="<?php echo $warning_light_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('warning_light') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>