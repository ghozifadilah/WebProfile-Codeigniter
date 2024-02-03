<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Detectors List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('detectors/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('detectors/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('detectors'); ?>" class="btn btn-default">Reset</a>
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
		<th>Camera Id</th>
		<th>Point A X</th>
		<th>Point A Y</th>
		<th>Point B X</th>
		<th>Point B Y</th>
		<th>Line Order</th>
		<th>Action</th>
            </tr><?php
            foreach ($detectors_data as $detectors)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $detectors->camera_id ?></td>
			<td><?php echo $detectors->point_a_x ?></td>
			<td><?php echo $detectors->point_a_y ?></td>
			<td><?php echo $detectors->point_b_x ?></td>
			<td><?php echo $detectors->point_b_y ?></td>
			<td><?php echo $detectors->line_order ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('detectors/read/'.$detectors->id),'Detail'); 
				echo ' | '; 
				echo anchor(site_url('detectors/update/'.$detectors->id),'Ubah'); 
				echo ' | '; 
				echo anchor(site_url('detectors/delete/'.$detectors->id),'Hapus','onclick="javasciprt: return confirm(\'Anda yakin ?\')"'); 
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