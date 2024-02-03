<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Visitor <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Visitor <?php echo form_error('visitor') ?></label>
            <input type="text" class="form-control" name="visitor" id="visitor" placeholder="Visitor" value="<?php echo $visitor; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Date <?php echo form_error('date') ?></label>
            <input type="text" class="form-control" name="date" id="date" placeholder="Date" value="<?php echo $date; ?>" />
        </div>
	    <input type="hidden" name="id_visitor" value="<?php echo $id_visitor; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('visitor') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>