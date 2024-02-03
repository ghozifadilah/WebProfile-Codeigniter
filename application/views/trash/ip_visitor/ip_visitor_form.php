<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Ip_visitor <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Ip Address <?php echo form_error('ip_address') ?></label>
            <input type="text" class="form-control" name="ip_address" id="ip_address" placeholder="Ip Address" value="<?php echo $ip_address; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Timestamp <?php echo form_error('timestamp') ?></label>
            <input type="text" class="form-control" name="timestamp" id="timestamp" placeholder="Timestamp" value="<?php echo $timestamp; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('ip_visitor') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>