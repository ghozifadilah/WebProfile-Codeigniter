<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Stream_camera_list_companies List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('stream_camera_list_companies/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('stream_camera_list_companies/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('stream_camera_list_companies'); ?>" class="btn btn-default">Reset</a>
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
		<th>Id</th>
		<th>Name</th>
		<th>Url</th>
		<th>Streamer Id</th>
		<th>Company Id</th>
		<th>Streamer Name</th>
		<th>Ip</th>
		<th>Id Companies</th>
		<th>Company Name</th>
		<th>Adresss</th>
		<th>Lat</th>
		<th>Lng</th>
		<th>Action</th>
            </tr><?php
            foreach ($stream_camera_list_companies_data as $stream_camera_list_companies)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $stream_camera_list_companies->id ?></td>
			<td><?php echo $stream_camera_list_companies->name ?></td>
			<td><?php echo $stream_camera_list_companies->url ?></td>
			<td><?php echo $stream_camera_list_companies->streamer_id ?></td>
			<td><?php echo $stream_camera_list_companies->company_id ?></td>
			<td><?php echo $stream_camera_list_companies->streamer_name ?></td>
			<td><?php echo $stream_camera_list_companies->ip ?></td>
			<td><?php echo $stream_camera_list_companies->id_companies ?></td>
			<td><?php echo $stream_camera_list_companies->company_name ?></td>
			<td><?php echo $stream_camera_list_companies->adresss ?></td>
			<td><?php echo $stream_camera_list_companies->lat ?></td>
			<td><?php echo $stream_camera_list_companies->lng ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('stream_camera_list_companies/read/'.$stream_camera_list_companies->),'Detail'); 
				echo ' | '; 
				echo anchor(site_url('stream_camera_list_companies/update/'.$stream_camera_list_companies->),'Ubah'); 
				echo ' | '; 
				echo anchor(site_url('stream_camera_list_companies/delete/'.$stream_camera_list_companies->),'Hapus','onclick="javasciprt: return confirm(\'Anda yakin ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        <?php $this->load->view('layout/footer');?>