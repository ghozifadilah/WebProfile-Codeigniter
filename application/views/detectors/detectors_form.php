<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Detectors <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Camera Id <?php echo form_error('camera_id') ?></label>
            <input type="text" class="form-control" name="camera_id" id="camera_id" placeholder="Camera Id" value="<?php echo $camera_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Point A X <?php echo form_error('point_a_x') ?></label>
            <input type="text" class="form-control" name="point_a_x" id="point_a_x" placeholder="Point A X" value="<?php echo $point_a_x; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Point A Y <?php echo form_error('point_a_y') ?></label>
            <input type="text" class="form-control" name="point_a_y" id="point_a_y" placeholder="Point A Y" value="<?php echo $point_a_y; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Point B X <?php echo form_error('point_b_x') ?></label>
            <input type="text" class="form-control" name="point_b_x" id="point_b_x" placeholder="Point B X" value="<?php echo $point_b_x; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Point B Y <?php echo form_error('point_b_y') ?></label>
            <input type="text" class="form-control" name="point_b_y" id="point_b_y" placeholder="Point B Y" value="<?php echo $point_b_y; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Line Order <?php echo form_error('line_order') ?></label>
            <input type="text" class="form-control" name="line_order" id="line_order" placeholder="Line Order" value="<?php echo $line_order; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('detectors') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>