<?php $this->load->view('layout/header');?>
<h2 style="margin-top:0px">Warning Light List</h2>
<div class="row" style="margin-bottom: 10px">
	
	<div class="col-md-4 text-center">
		<div style="margin-top: 8px" id="message">
			<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
		</div>
	</div>
	<div class="col-md-1 text-right">
	</div>
	<div class="col-md-5 pull-right text-right">
                <form action="<?php echo site_url('warning_light/search/'); ?>" class="form-inline" method="get">
				<div class="input-group">
				<span  class="input-group-btn"> 
				<?php if ($this->session->userdata('user_hak_akses') == 'admin') { ?>
					<select style="width:100px" class="form-control" name="filter_area" id="">
						<option selected value="any">Filter  Area</option>
						<?php   foreach (@$list_area as $area){ ?> 
							<option  value="<?php echo  $area->area_id ?>"> <?php echo $area->area_nama ?> </option>
						<?php } ?>
					</select>
					<?php } ?>
				</span>
                        <input  type="text" class="form-control" name="src_sitename" value="">
					
                        <span class="input-group-btn">
								<a href="<?php echo base_url('warning_light') ?>" class="btn btn-default">reset</a>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
    </div>
</div>
<?php $i = 0;
     foreach ($data_area as $area){ ?>
<div class="table-responsive">
    <h4>Area : <?php echo $area->area_nama?> <button type="button" onclick="modal_warning_light_create(<?php echo $area->area_id ?>)" class="btn btn-default btn-sm">
		<i class="fa fa-plus" aria-hidden="true"></i>
		&ensp;
		add Warning light
	</button></h4> 
		
	<table class="table table-bordered" style="margin-bottom: 10px">
		<tr>
			<th>No</th>
			<th>Sitename</th>
			<th>Action</th>
		</tr><?php $start = 0;
            foreach ($data_area[$i]->warning_light as $wl)
            {
            ?>

		<tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $wl->warning_light_sitename ?>
			</td>

			<td style="text-align:center" width="200px">
            <div class="btn-group">
															
			
			<button type="button"  data-id="<?php echo $wl->warning_light_id ?>" 
			onclick="warning_light_edit(<?php echo $wl->warning_light_id ?>)" class="btn btn-default btn-sm">
				<i class="fa fa-pencil" aria-hidden="true"></i>
			</button>

			<button type="button"  data-id="<?php echo $wl->warning_light_id ?>" 
			onclick="detail_warning_light(<?php echo $wl->warning_light_id ?>)" class="btn btn-default btn-sm">
				<i class="fa fa-eye" aria-hidden="true"></i>
			</button>
			
			<button type="button" class="btn btn-default btn-sm"  data-id="<?php echo $wl->warning_light_id ?>" 
			onclick="modal_warning_light_delete(<?php echo $wl->warning_light_id ?>)">
				<i class="fa fa-trash" aria-hidden="true"></i>
			</button>
			
															
														
														</div>
			</td>
		</tr>
		<?php
            }
            ?>
	</table>
</div>
<?php $i++; } ?>

<div class="row">
	<div class="col-md-6">
	</div>

</div>
<?php $this->load->view('layout/footer');?>
<?php 
$this->load->view('home/modal/area'); 

$this->load->view('home/modal/warning_light'); 
$this->load->view('home/modal/warning_light_create'); 
?>

<?php $this->load->view('home/js/map');?>
<?php $this->load->view('home/js/area');?>
<?php $this->load->view('home/js/warning_light_create');?>
<?php $this->load->view('home/js/warning_light_create_map');?>


