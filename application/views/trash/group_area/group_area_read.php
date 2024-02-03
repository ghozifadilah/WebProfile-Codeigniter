<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Group_area Read</h2>
        <table class="table">
	    <tr><td>Group Area Group Id</td><td><?php echo $group_area_group_id; ?></td></tr>
	    <tr><td>Group Area Area Id</td><td><?php echo $group_area_area_id; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('group_area') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>