<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Proyek List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('proyek/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('proyek/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('proyek'); ?>" class="btn btn-default">Reset</a>
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
		<th>Proyek Pekerjaan</th>
		<th>Proyek Kontraktor</th>
		<th>Proyek Pemberi Pekerjaan</th>
		<th>Tahun Anggaran</th>
		<th>Action</th>
            </tr><?php
            foreach ($proyek_data as $proyek)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $proyek->proyek_pekerjaan ?></td>
			<td><?php echo $proyek->proyek_kontraktor ?></td>
			<td><?php echo $proyek->proyek_pemberi_pekerjaan ?></td>
			<td><?php echo $proyek->proyek_anggaran ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('proyek/read/'.$proyek->proyek_id),'Detail'); 
				echo ' | '; 
				echo anchor(site_url('proyek/update/'.$proyek->proyek_id),'Ubah'); 
				echo ' | '; 
				echo anchor(site_url('proyek/delete/'.$proyek->proyek_id),'Hapus','onclick="javasciprt: return confirm(\'Anda yakin ?\')"'); 
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