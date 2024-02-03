<?php $this->load->view('layout/header');?>
        <h2 class="mt-5" style="margin-top:0px">Detail Produk <?php echo $nama_produk; ?> </h2>
		
        <table class="table mt-5">
	    <tr><td>Nama Produk</td><td><?php echo $nama_produk; ?></td></tr>
	    <tr><td>Deskripsi Produk</td><td><?php echo $deskripsi_produk; ?></td></tr>
	    <tr><td>Datasheet</td><td><a   target='_blank' class="btn btn-primary" href="<?php echo base_url('public/produk/datasheet/'.$datasheet) ?>">Download Datasheet</a></td></tr>
	    <tr><td>Kategori</td><td><?php echo $id_kategori; ?></td></tr>
		</table>

	<h5>Thumbnail Produk :</h5>
		<a href="<?php echo base_url('foto_produk/create/'.$id_produk) ?>" class="btn btn-primary"> Tambah</a>
		<hr>
		<div class="container">
			<div class="row justify-content-center">
				<?php foreach ($data_thumbnail as $img) { ?>
				<div class="col-lg-4">
					<div class="card" style="width: 18rem;">
						<img src="<?php echo base_url('public/produk/thumbnail/'.$img->foto) ?>" class="card-img-top" alt="...">
						<div class="card-footer text-center">
							<a href="<?php echo base_url('foto_produk/update/'.$img->id_foto) ?>" class="btn btn-primary"> <i class="fa fa-pen"></i> Edit</a>
							<a href="<?php echo base_url('foto_produk/delete/'.$img->id_foto) ?>" class="btn btn-danger"> <i class="fa fa-trash"></i> Hapus</a>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
<?php $this->load->view('layout/footer');?>
<script>
	
</script>