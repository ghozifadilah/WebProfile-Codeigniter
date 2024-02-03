<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Stream_camera_list_companies <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id <?php echo form_error('id') ?></label>
            <input type="text" class="form-control" name="id" id="id" placeholder="Id" value="<?php echo $id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Url <?php echo form_error('url') ?></label>
            <input type="text" class="form-control" name="url" id="url" placeholder="Url" value="<?php echo $url; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Streamer Id <?php echo form_error('streamer_id') ?></label>
            <input type="text" class="form-control" name="streamer_id" id="streamer_id" placeholder="Streamer Id" value="<?php echo $streamer_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Company Id <?php echo form_error('company_id') ?></label>
            <input type="text" class="form-control" name="company_id" id="company_id" placeholder="Company Id" value="<?php echo $company_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Streamer Name <?php echo form_error('streamer_name') ?></label>
            <input type="text" class="form-control" name="streamer_name" id="streamer_name" placeholder="Streamer Name" value="<?php echo $streamer_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ip <?php echo form_error('ip') ?></label>
            <input type="text" class="form-control" name="ip" id="ip" placeholder="Ip" value="<?php echo $ip; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Companies <?php echo form_error('id_companies') ?></label>
            <input type="text" class="form-control" name="id_companies" id="id_companies" placeholder="Id Companies" value="<?php echo $id_companies; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Company Name <?php echo form_error('company_name') ?></label>
            <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Company Name" value="<?php echo $company_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Adresss <?php echo form_error('adresss') ?></label>
            <input type="text" class="form-control" name="adresss" id="adresss" placeholder="Adresss" value="<?php echo $adresss; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Lat <?php echo form_error('lat') ?></label>
            <input type="text" class="form-control" name="lat" id="lat" placeholder="Lat" value="<?php echo $lat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Lng <?php echo form_error('lng') ?></label>
            <input type="text" class="form-control" name="lng" id="lng" placeholder="Lng" value="<?php echo $lng; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('stream_camera_list_companies') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>