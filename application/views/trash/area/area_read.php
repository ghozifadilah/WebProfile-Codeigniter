<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Area Read</h2>
        <table class="table">
	    <tr><td>Area Nama</td><td><?php echo $area_nama; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('area') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>