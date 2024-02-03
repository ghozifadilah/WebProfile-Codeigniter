<?php $this->load->view('layout/header'); ?>
<h2 style="margin-top:0px">Setting List</h2>
<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
        <?php
        // echo anchor(site_url('setting/create'),'Create', 'class="btn btn-primary"');
        ?>
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 8px" id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
    <div class="col-md-1 text-right">
    </div>
    <div class="col-md-3 text-right">
        <form action="<?php echo site_url('setting/index'); ?>" class="form-inline" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                <span class="input-group-btn">
                    <?php
                    if ($q <> '') {
                    ?>
                        <a href="<?php echo site_url('setting'); ?>" class="btn btn-default">Reset</a>
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
            <th>Alamat</th>
            <th>Banner</th>
            <th>Karier</th>
            <th>Thumbnail Produk</th>
            <th>Action</th>
        </tr>
        <?php
        foreach ($setting_data as $setting) {
        ?>
            <tr>
                <td width="80px"><?php echo ++$start ?></td>
                <td><?php echo $setting->alamat ?></td>
                <td><img width="80px" src="<?php echo base_url("assets/img/$setting->banner") ?>" alt="" srcset=""></td>
                <td><img width="80px" src="<?php echo base_url("assets/img/$setting->karier") ?>" alt="" srcset=""></td>
                <td><img width="80px" src="<?php echo base_url("assets/img/$setting->thumbnail_produk") ?>" alt="" srcset=""></td>
                <td style="text-align:center" width="200px">
                    <?php
                    echo anchor(site_url('setting/read/' . $setting->id_setting), 'Detail');
                    echo ' | ';
                    echo anchor(site_url('setting/update/' . $setting->id_setting), 'Ubah');
                    // echo ' | '; 
                    // echo anchor(site_url('setting/delete/'.$setting->id_setting),'Hapus','onclick="javasciprt: return confirm(\'Anda yakin ?\')"'); 
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
<?php $this->load->view('layout/footer'); ?>