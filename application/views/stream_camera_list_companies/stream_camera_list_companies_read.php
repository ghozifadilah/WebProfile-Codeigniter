<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Stream_camera_list_companies Read</h2>
        <table class="table">
	    <tr><td>Id</td><td><?php echo $id; ?></td></tr>
	    <tr><td>Name</td><td><?php echo $name; ?></td></tr>
	    <tr><td>Url</td><td><?php echo $url; ?></td></tr>
	    <tr><td>Streamer Id</td><td><?php echo $streamer_id; ?></td></tr>
	    <tr><td>Company Id</td><td><?php echo $company_id; ?></td></tr>
	    <tr><td>Streamer Name</td><td><?php echo $streamer_name; ?></td></tr>
	    <tr><td>Ip</td><td><?php echo $ip; ?></td></tr>
	    <tr><td>Id Companies</td><td><?php echo $id_companies; ?></td></tr>
	    <tr><td>Company Name</td><td><?php echo $company_name; ?></td></tr>
	    <tr><td>Adresss</td><td><?php echo $adresss; ?></td></tr>
	    <tr><td>Lat</td><td><?php echo $lat; ?></td></tr>
	    <tr><td>Lng</td><td><?php echo $lng; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('stream_camera_list_companies') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>