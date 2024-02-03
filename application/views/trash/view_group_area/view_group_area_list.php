<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">View_group_area List</h2>
        <div class="row" style="margin-bottom: 10px">
        <?php 
	if ($data_buku['count'] > 0) {
		$no = 0 + $offset;
		foreach ($data_group['object'] as $data_group) {
			$no++;
?>
<tr>
	<td><?=$no?></td>
	<td><?=$data_group->group_nama?></td>
	<td><?=$data_group->area_nama?></td>
	<td><
	<td>
		<a href="#" class="edit-data text-primary" data-id="<?=$data_group->group_area_group_id?>">
			<i class="material-icons">edit</i>
		</a>
		<a href="#" class="hapus-data text-danger" data-id="<?=$data_group->group_area_group_id?>">
			<i class="material-icons">delete</i>
		</a>
	</td>
</tr>
<?php
		}
	}
?>
        </div>
        <?php $this->load->view('layout/footer');?>