<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Preset Jadwal</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <a class="btn btn-primary" href="<?php echo site_url('jadwal_mode/create') ?>"> <i class="fa fa-plus"></i> Tambah Jadwal</a>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('jadwal_mode/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('jadwal_mode'); ?>" class="btn btn-default">Reset</a>
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
		<th>Nama</th>
		<th>Mode</th>
		<th>Kecepatan</th>
		<th>Waktu Mulai</th>
		<th>Waktu Selesai</th>
		<th>Jadwal Hari</th>
		<th></th>
            </tr><?php
            foreach ($jadwal_mode_data as $jadwal_mode)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $jadwal_mode->Nama ?></td>
			<td>
            <?php 
            if ( $jadwal_mode->Mode == '1') {
              echo 'Blink';
            }
            if ( $jadwal_mode->Mode == '2') {
              echo 'Flip Flop';
            }
            if ( $jadwal_mode->Mode == '3') {
              echo 'Double Flip Flop';
            }
            if ( $jadwal_mode->Mode == '4') {
              echo 'Eco Blink';
            }
            ?>

            </td>
<?php 

            $data_hari='';
            if (strpos($jadwal_mode->harian , '1' ) !== false ) {
                $data_hari .= ' Senin,';
            }
            if (strpos($jadwal_mode->harian , '2' ) !== false ) {
                $data_hari .= ' Selasa,';
            }
            if (strpos($jadwal_mode->harian , '3' ) !== false ) {
                $data_hari .= ' Rabu,';
            }
            if (strpos($jadwal_mode->harian , '4' ) !== false ) {
                $data_hari .= ' Kamis,';
            }
            if (strpos($jadwal_mode->harian , '5' ) !== false ) {
                $data_hari .= ' Jumat,';
            }
            if (strpos($jadwal_mode->harian , '6' ) !== false ) {
                $data_hari .= ' Sabtu,';
            }
            if (strpos($jadwal_mode->harian , '7' ) !== false ) {
                $data_hari .= ' Minggu,';
            }
            if (strpos($jadwal_mode->harian , '0' ) !== false ) {
                $data_hari = 'Setiap Hari';
            }



?>
            

			<td><?php echo $jadwal_mode->kecepatan ?>ms</td>
			<td><?php echo $jadwal_mode->waktu_mulai ?></td>
			<td><?php echo $jadwal_mode->waktu_selesai ?></td>
			<td><?php echo $data_hari ?></td>
			<td style="text-align:center" width="200px">
            <a class="btn btn-default" href="<?php echo site_url('jadwal_mode/update/'.$jadwal_mode->id_jadwal) ?>"> <i class="fa fa-edit"></i> Edit Jadwal</a>
            <a style="margin-top:5px;" onclick="confirm('Anda yakin ?')" class="btn btn-default" href="<?php echo site_url('jadwal_mode/delete/'.$jadwal_mode->id_jadwal) ?>"> <i class="fa fa-trash"></i> Hapus Jadwal</a>
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