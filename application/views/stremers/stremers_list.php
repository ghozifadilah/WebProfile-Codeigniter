<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Daftar Stremers <i class="fa fa-list"></i> </h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('stremers/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('stremers/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('stremers'); ?>" class="btn btn-default">Reset</a>
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
		<th>Perusahaan</th>
		<th>Name</th>
		<th>Ip</th>
		<th>Action</th>
            </tr><?php
            foreach ($stremers_data as $stremers)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $stremers->company_name ?></td>
			<td><?php echo $stremers->name ?></td>
			<td><?php echo $stremers->ip ?></td>
			<td style="text-align:center" width="250px">
                <a class="btn btn-primary" href="<?php echo site_url('stremers/update/'.$stremers->id); ?>"> Ubah <i class="fa fa-edit"></i> </a>
                <a onclick="delete_user(<?= $stremers->id ?>)" class="btn btn-danger" > Hapus <i class="fa fa-trash"></i> </a>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        </div>
        <div class="row">
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>

        <div id="modal_hapus" class="modal fade" tabindex="-1">
            <div class="modal-dialog ">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-video"></i> Hapus Data Streamer ?  </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                                <h5>Apakah anda Yakin untuk menghapus data Streamers ?</h5>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div id="hapus_perusahaan">
                        
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('layout/footer');?>

          
    

        <script>
            function delete_user(id) {
                $('#modal_hapus').modal('show');
                $('#hapus_perusahaan').html('<a  href="<?php echo base_url('stremers/delete/')?>'+id+'" type="button" class="btn btn-danger">Hapus</a>');
            }
        </script>
