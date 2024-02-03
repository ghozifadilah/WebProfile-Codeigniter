<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px"><?php echo $button ?> Preset Jadwal</h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Jadwal Data <?php echo form_error('id_jadwal_data') ?></label>
            <input type="text" class="form-control" name="id_jadwal_data" id="id_jadwal_data" placeholder="Id Jadwal Data" value="<?php echo $id_jadwal_data; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Jadwal WL <?php echo form_error('id_jadwal_WL') ?></label>
            <input type="text" class="form-control" name="id_jadwal_WL" id="id_jadwal_WL" placeholder="Id Jadwal WL" value="<?php echo $id_jadwal_WL; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jadwal_data') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>