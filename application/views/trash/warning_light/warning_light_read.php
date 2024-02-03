<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Warning_light Read</h2>
        <table class="table">
	    <tr><td>Warning Light Area Id</td><td><?php echo $warning_light_area_id; ?></td></tr>
	    <tr><td>Warning Light Sitename</td><td><?php echo $warning_light_sitename; ?></td></tr>
	    <tr><td>Warning Light Tahun</td><td><?php echo $warning_light_tahun; ?></td></tr>
	    <tr><td>Warning Light Mode</td><td><?php echo $warning_light_mode; ?></td></tr>
	    <tr><td>Warning Light Kecepatan</td><td><?php echo $warning_light_kecepatan; ?></td></tr>
	    <tr><td>Warning Light Lat</td><td><?php echo $warning_light_lat; ?></td></tr>
	    <tr><td>Warning Light Lng</td><td><?php echo $warning_light_lng; ?></td></tr>
	    <tr><td>Warning Light Status Online</td><td><?php echo $warning_light_status_online; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('warning_light') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>