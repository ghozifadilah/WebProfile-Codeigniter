<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Email_kontak <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <input type="hidden" name="id_email" value="<?php echo $id_email; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('email_kontak') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>