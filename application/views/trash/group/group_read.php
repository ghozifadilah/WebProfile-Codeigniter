<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Group Read</h2>
        <table class="table">
	    <tr><td>Group Nama</td><td><?php echo $group_nama; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('group') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>