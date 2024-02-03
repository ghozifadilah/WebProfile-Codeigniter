<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Produk <?php echo $button ?></h2>
        <form   enctype="multipart/form-data" action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Produk <?php echo form_error('nama_produk') ?></label>
            <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Nama Produk" value="<?php echo $nama_produk; ?>" />
        </div>
	    <div class="form-group">
            <label for="deskripsi_produk">Deskripsi Produk <?php echo form_error('deskripsi_produk') ?></label>
            <textarea class="form-control" rows="3" name="deskripsi_produk" id="deskripsi_produk" placeholder="Deskripsi Produk"><?php echo $deskripsi_produk; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Datasheet <?php echo form_error('datasheet') ?></label>
         
            <div class="row">
        	<div class="col-md-6 col-sm-12">
        		<div style="margin-top:12px;">
        			<label for="varchar">Upload Datasheet</label>
        			<p style="font-size:10px;"> <i> size maksimal 10 MB / File Format PDF </i> </p>
        			<div>
        				<input  id="input_upload_img"
        					style="max-width:300px; text-align:left;" accept=".pdf"
        					class="btn btn-default" type="file" name="pdf_upload_datasheet" />
        			</div>
        			<h5 style="color:red" id="notifikasi_upload"></h5>
        		
        		</div>
        	</div>
        </div>
        
        </div>
	    <div class="form-group">
            <label for="int"> Kategori <?php echo form_error('id_kategori') ?></label>
            <!-- <input type="text" class="form-control" name="id_kategori" id="id_kategori" placeholder="Id Kategori" value="<?php echo $id_kategori; ?>" /> -->
            <select name="id_kategori" class="form-control"  id="id_kategori"> 
                <option value="">-- Pilih Kategori --</option>
                <?php foreach ($kategori as $k) { ?>
                    <option value="<?php echo $k->id_kategori; ?>" <?php if($id_kategori == $k->id_kategori){echo "selected";} ?>><?php echo $k->nama_kategori; ?></option>
                <?php } ?>
            </select>
        </div>
	    <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('produk') ?>" class="btn btn-default">Cancel</a>
	</form>
<?php $this->load->view('layout/footer');?>