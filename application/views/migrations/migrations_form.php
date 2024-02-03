<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Migrations <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Migration <?php echo form_error('migration') ?></label>
            <input type="text" class="form-control" name="migration" id="migration" placeholder="Migration" value="<?php echo $migration; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Batch <?php echo form_error('batch') ?></label>
            <input type="text" class="form-control" name="batch" id="batch" placeholder="Batch" value="<?php echo $batch; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('migrations') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>