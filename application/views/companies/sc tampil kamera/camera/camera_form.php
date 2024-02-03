<?php $this->load->view('layout/header');?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-7 crud_form_css">
	
        <h4 class="poppins_b" style="margin-top:0px"><i class="fa fa-video"></i> <?php echo $button ?>  Data Kamera </h4>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a> <b>Sitemap :</b> </a></li>
            <li class="breadcrumb-item"><a href="<?php echo site_url('traffic')?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?php echo site_url('camera')?>">Daftar Kamera</a></li>
            <li class="breadcrumb-item active" aria-current="page"> <?php echo $button ?> Kamera</li>
        </ol>
        </nav>
        <hr>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group mt-3">
            <label for="int">Traffic Id <?php echo form_error('traffic_id') ?></label>
            <select name="traffic_id" id="traffic_id" class="form-control form-select">
                <option value="">Tidak ada</option>
            <?php $no_urut = 0;  foreach ($data_traffic as $traffic) { ?>
                <option value="<?= $traffic->traffic_id ?>">(ID: <?= $traffic->traffic_id ?>) <?= $traffic->nama_traffic ?></option>
            <?php $no_urut++; } ?>
            </select>
            <!-- <input type="text" class="form-control" name="traffic_id" id="traffic_id" placeholder="Traffic Id" value="<?php echo $traffic_id; ?>" /> -->
        </div>
	    <div class="form-group mt-3">
            <label for="varchar">Nama Kamera<?php echo form_error('camera_name') ?></label>
            <input type="text" class="form-control" name="camera_name" id="camera_name" placeholder="Camera Name" value="<?php echo $camera_name; ?>" />
        </div>
	    <div class="form-group mt-3">
            <label for="Link_RTSP">Link RTSP <?php echo form_error('Link_RTSP') ?></label>
            <input class="form-control" value="<?php echo $Link_RTSP; ?>" rows="3" name="Link_RTSP" id="Link_RTSP" placeholder="Link RTSP"></input>
        </div>
	    <div class="form-group mt-3">
            <label for="varchar">User <?php echo form_error('user') ?></label>
            <input type="text" class="form-control" name="user" id="user" placeholder="User" value="<?php echo $user; ?>" />
        </div>
	    <div class="form-group mt-3">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input  type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
	    <input type="hidden" name="camera_id" value="<?php echo $camera_id; ?>" /> 
        <div class="mt-4">
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            <a href="<?php echo site_url('camera') ?>" class="btn btn-default">Kembali</a>
        </div>
	</form>

    </div>
	</div>
</div>
<?php $this->load->view('layout/footer');?>