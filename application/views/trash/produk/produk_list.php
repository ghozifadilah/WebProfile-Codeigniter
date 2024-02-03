<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Produk List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('produk/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('produk/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('produk'); ?>" class="btn btn-default">Reset</a>
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
		<th>Nama Produk</th>
		<th>Deskripsi Produk</th>
		<th>Datasheet</th>
		<th>Id Kategori</th>
		<th>Action</th>
            </tr><?php
            foreach ($produk_data as $produk)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $produk->nama_produk ?></td>
			<td><?php echo $produk->deskripsi_produk ?></td>
			<td><?php echo $produk->datasheet ?></td>
			<td><?php echo $produk->id_kategori ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('produk/read/'.$produk->id_produk),'Detail'); 
				echo ' | '; 
				echo anchor(site_url('produk/update/'.$produk->id_produk),'Ubah'); 
				echo ' | '; 
				echo anchor(site_url('produk/delete/'.$produk->id_produk),'Hapus','onclick="javasciprt: return confirm(\'Anda yakin ?\')"'); 
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