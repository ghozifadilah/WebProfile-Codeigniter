<?php $this->load->view('layout/header'); ?>
<h2 style="margin-top:0px">Setting Read</h2>
<table class="table">
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td><?php echo $alamat; ?></td>
	</tr>
	<tr>
		<td>Banner</td>
		<td>:</td>
		<td><img width="300px" src="<?php echo base_url("assets/img/$banner") ?>" alt="" srcset=""></td>
	</tr>
	<tr>
		<td>Karier</td>
		<td>:</td>
		<td><img width="300px" src="<?php echo base_url("assets/img/$karier") ?>" alt="" srcset=""></td>
	</tr>
	<tr>
		<td>Thumbnail Produk</td>
		<td>:</td>
		<td><img width="300px" src="<?php echo base_url("assets/img/$thumbnail_produk") ?>" alt="" srcset=""></td>
	</tr>
	<tr>
		<td><a href="<?php echo site_url('setting') ?>" class="btn btn-danger">Cancel</a></td>
	</tr>
</table>
<?php $this->load->view('layout/footer'); ?>