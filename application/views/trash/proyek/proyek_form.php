<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Proyek <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Proyek Pekerjaan <?php echo form_error('proyek_pekerjaan') ?></label>
            <input type="text" class="form-control" name="proyek_pekerjaan" id="proyek_pekerjaan" placeholder="Proyek Pekerjaan" value="<?php echo $proyek_pekerjaan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Proyek Kontraktor <?php echo form_error('proyek_kontraktor') ?></label>
            <input type="text" class="form-control" name="proyek_kontraktor" id="proyek_kontraktor" placeholder="Proyek Kontraktor" value="<?php echo $proyek_kontraktor; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Proyek Pemberi Pekerjaan <?php echo form_error('proyek_pemberi_pekerjaan') ?></label>
            <input type="text" class="form-control" name="proyek_pemberi_pekerjaan" id="proyek_pemberi_pekerjaan" placeholder="Proyek Pemberi Pekerjaan" value="<?php echo $proyek_pemberi_pekerjaan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tahun Anggaran <?php echo form_error('proyek_anggaran') ?></label>
            <input type="text" class="form-control" name="proyek_anggaran" id="proyek_anggaran" placeholder="Proyek Anggaran" value="<?php echo $proyek_anggaran; ?>" />
        </div>
	    <input type="hidden" name="proyek_id" value="<?php echo $proyek_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('proyek') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>