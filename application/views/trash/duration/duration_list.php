<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Duration List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('duration/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('duration/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('duration'); ?>" class="btn btn-default">Reset</a>
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
		<th>Duration Program Id</th>
		<th>Duration Fase</th>
		<th>Duration Start</th>
		<th>Duration Duration</th>
		<!-- <th>Duration Warna</th> -->
		<th>Action</th>
            </tr><?php
            foreach ($duration_data as $duration)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $duration->duration_program_id ?></td>
			<td><?php echo $duration->duration_fase_id ?></td>
			<td><?php echo $duration->duration_start ?></td>
			<td><?php echo $duration->duration_duration ?></td>
			<!-- <td><?php // echo $duration->duration_warna ?></td> -->
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('duration/read/'.$duration->duration_id),'Detail'); 
				echo ' | '; 
				echo anchor(site_url('duration/update/'.$duration->duration_id),'Ubah'); 
				echo ' | '; 
				echo anchor(site_url('duration/delete/'.$duration->duration_id),'Hapus','onclick="javasciprt: return confirm(\'Anda yakin ?\')"'); 
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