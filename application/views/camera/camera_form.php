<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px"> <i class="fa fa-edit"></i> Camera <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Streamer Id <?php echo form_error('streamer_id') ?></label>
            <select  class="form-control form-select"  name="streamer_id" id="streamer_id">
                <option value="">Pilih</option>
                <?php foreach ($data_streamers as $key ) { ?>
                    
                    <?php if ($streamer_id == $key->id ) { ?>
                             <option selected value="<?= $key->id ?>"><?= $key->name ?></option>
                        <?php }else{ ?>
                            <option value="<?= $key->id ?>"><?= $key->name ?></option>
                    <?php } ?>

                <?php } ?>
            </select>
        
        
        </div>
	    <div class="form-group">
            <label for="int">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Url <?php echo form_error('url') ?></label>
            <input type="text" class="form-control" name="url" id="url" placeholder="Url" value="<?php echo $url; ?>" />
            <input type="hidden" name="companies_id" id="companies_id"  value="<?php echo $companies_id; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url("companies/read/$companies_id") ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>