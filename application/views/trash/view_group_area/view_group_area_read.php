<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">View_group_area Read</h2>
        <table class="table">
	    <tr><td>Group Nama</td><td><?php echo $group_nama; ?></td></tr>
	    <tr><td>Group Area Group Id</td><td><?php echo $group_area_group_id; ?></td></tr>
	    <tr><td>Group Area Area Id</td><td><?php echo $group_area_area_id; ?></td></tr>
	    <tr><td>Area Nama</td><td><?php echo $area_nama; ?></td></tr>
	    <tr><td>User Id</td><td><?php echo $user_id; ?></td></tr>
	    <tr><td>User Nama</td><td><?php echo $user_nama; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('view_group_area') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>