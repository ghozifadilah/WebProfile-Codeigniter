<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px"> <i class="fa fa-briefcase"></i> Daftar Perusahaan</h2>
        <div class="row mt-4" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('companies/create'),'Tambah', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('companies/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('companies'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Cari</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Perusahaan</th>
		<th>Alamat</th>
		<th></th>
            </tr><?php
            foreach ($companies_data as $companies)
            {
                ?>
        <tr>
			<td width="60px"><?php echo ++$start ?></td>
			<td width="460px"><?php echo $companies->name ?></td>
			<td><?php echo $companies->adresss ?></td>
			<td style="text-align:center" width="400px">
            <a class="btn btn-primary mt-2" href="<?php echo site_url('companies/read/'.$companies->id)?>">Detail <i class="fa fa-desktop"></i></a>
            <a class="btn btn-primary  mt-2" href="<?php echo site_url('companies/update/'.$companies->id)?>">Ubah <i class="fa fa-edit"></i></a>
            <a onclick="hapus_data(<?=$companies->id?>)" class="btn btn-danger  mt-2" > Hapus <i class="fa fa-trash"> </i> </a>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        </div>
       
        <div id="modal_hapus" class="modal fade" tabindex="-1">
        <div class="modal-dialog ">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-video"></i> Hapus Data Perusahaan ?  </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                            <h5>Apakah anda Yakin untuk menghapus data Perusahaan ?</h5>
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
            function hapus_data(id) {
                $('#modal_hapus').modal('show');
                $('#hapus_perusahaan').html('<a  href="<?php echo base_url('companies/delete/')?>'+id+'" type="button" class="btn btn-danger">Hapus</a>');
            }
        </script>