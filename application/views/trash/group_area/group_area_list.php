<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Group_area List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">

        <button class="btn btn-primary" onclick="add_new_group()" >Tambah Group</button>
                <?php //echo anchor(site_url('group_area/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('group_area/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('group_area'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Group Nama</th>
		<th>Area</th>
		<th>Action</th>
            </tr><?php
            foreach ($group_data as $group_data)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
            
			<td><?php echo $group_data->group_nama ?></td>
			

            <td>
            
            <?php  foreach ($group_area_data as $group_area)
            { 
                $group_data_id = $group_data->group_id;
               
                if ($group_area->group_area_group_id == $group_data->group_id ) {
                
                    echo  $group_area->area_nama," ,";
               
                }else {
                    echo '';
                }
                $group_data_id ='';
            
            } ?>
          
            </td>
			<td style="text-align:center" width="200px">
				<button class="btn btn-primary" onclick="edit_group_area(<?php echo $group_data->group_id ?>)">Ubah</button>
				<button class="btn btn-danger" onclick="modal_hapus_group(<?php echo $group_data->group_id ?>)">Delete</button>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        </div>
        <div class="row">
            <div class="col-md-6">
               
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        <?php $this->load->view('layout/footer');?>

       


<?php
 $this->load->view('home/modal/modal_group'); 
$this->load->view('home/js/group_create');?>