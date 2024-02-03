<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Foto produk <?php echo $button ?></h2>
        <form  enctype="multipart/form-data" action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <!-- <label for="varchar">Foto <?php echo form_error('foto') ?></label> -->
            <input type="hidden" class="form-control" name="foto" id="foto" placeholder="Foto" value="<?php echo $foto; ?>" />
        </div>
	    <div class="form-group">
            <!-- <label for="int">Id Produk <?php echo form_error('id_produk') ?></label> -->
            <input type="hidden" class="form-control" name="id_produk" id="id_produk" placeholder="Id Produk" value="<?php echo $id_produk; ?>" />
        </div>
	    <input type="hidden" name="id_foto" value="<?php echo $id_foto; ?>" /> 
        <div class="row">
        	<div class="col-md-6 col-sm-12">
        		<div style="margin-top:12px;">
        			<label for="varchar">Upload Foto Produk</label>
        			<p style="font-size:10px;"> <i> Image size maksimal 2.5 MB / File Format jpeg atau png </i> </p>
        			<div>
        				<input onchange="pilih_upload_image()" id="input_upload_img"
        					style="max-width:300px; text-align:left;" accept="image/,.png,.jpeg,.jpg"
        					class="btn btn-default" type="file" name="img_upload_produk_thumb" />
        			</div>
        			<h5 style="color:red" id="notifikasi_upload"></h5>
        			<img id="img_uploaded" style=" border-radius:10px;box-shadow: -1px 7px 5px 0px rgba(0,0,0,0.32);"
        				width="500px" src="<?php echo base_url('public/produk/thumbnail/'.@$foto) ?>" alt="">
        		</div>
        	</div>
        </div>
            <input type="hidden" name="image_simpang_preset" value="" id="image_simpang_preset">
                                <input type="hidden" name="old_image" value="<?php echo @$foto; ?>" /> 
                    <button type="submit" class="btn btn-primary mt-5"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('foto_produk') ?>" class="btn btn-default mt-5">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>


<script>
    



function pilih_upload_image() {
    temp_img_upload();
    $('#button_gambar_upload_preset').attr('disabled', true);
    $('#reset_gambar_button').show()
}


function temp_img_upload() {
  
    var tmppath = URL.createObjectURL(event.target.files[0]);
    $("#img_uploaded").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
    console.log(tmppath);
    // $("#disp_tmp_path").html("Temporary Path(Copy it and try pasting it in browser address bar) --> <strong>["+tmppath+"]</strong>");

}
</script>