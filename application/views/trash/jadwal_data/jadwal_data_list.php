<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Jadwal_data List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('jadwal_data/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('jadwal_data/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('jadwal_data'); ?>" class="btn btn-default">Reset</a>
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
		<th>Id Jadwal Data</th>
		<th>Id Jadwal WL</th>
		<th>Action</th>
            </tr><?php
            foreach ($jadwal_data_data as $jadwal_data)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $jadwal_data->id_jadwal_data ?></td>
			<td><?php echo $jadwal_data->id_jadwal_WL ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('jadwal_data/read/'.$jadwal_data->id),'Detail'); 
				echo ' | '; 
				echo anchor(site_url('jadwal_data/update/'.$jadwal_data->id),'Ubah'); 
				echo ' | '; 
				echo anchor(site_url('jadwal_data/delete/'.$jadwal_data->id),'Hapus','onclick="javasciprt: return confirm(\'Anda yakin ?\')"'); 
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