<?php $this->load->view('layout/header');?>
<div class="container">
	<div class="row">
		<div class="col-7 crud-css-form">
		<h2 style="margin-top:0px">Camera Read</h2>
        <table class="table">
	    <tr><td>Traffic Id</td><td><?php echo $traffic_id; ?></td></tr>
	    <tr><td>Camera Name</td><td><?php echo $camera_name; ?></td></tr>
	    <tr><td>Link RTSP</td><td><?php echo $Link_RTSP; ?></td></tr>
	    <tr><td>User</td><td><?php echo $user; ?></td></tr>
	    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('camera') ?>" class="btn btn-default">Cancel</a></td></tr>
		</div>
	</div>
</div>
      
	</table>
<?php $this->load->view('layout/footer');?>