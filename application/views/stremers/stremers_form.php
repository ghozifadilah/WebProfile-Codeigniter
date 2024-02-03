<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Stremers <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Company Id <?php echo form_error('company_id') ?></label>
          <select class="form-control form-select" name="company_id" id="">
            <option value="">Pilih Perushaan</option>
            <?php 
            foreach ($data_company as $key ) { ?>
                 <option value="<?= $key->id ?>"><?= $key->name ?></option>
           <?php }   ?>
          </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ip <?php echo form_error('ip') ?></label>
            <input type="text" class="form-control" name="ip" id="ip" placeholder="Ip" value="<?php echo $ip; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('stremers') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>