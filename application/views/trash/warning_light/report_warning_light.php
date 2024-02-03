<?php $this->load->view('layout/header');?>

<div class="row">
	<div class="col-md-4"> 
		
		<div style="margin-left:45px;" class="icon-wl">
							
								<div class="parent">
									<img class="image1 image_width" src="<?php echo base_url('assets/img/smart_wl/main_wl.png') ?>" alt="" srcset="">
									<img 	id="wl-top" class="image2 image_width" src="<?php echo base_url('assets/img/smart_wl/bg_top.png') ?>" alt="" srcset="">
									<img  id="wl-bottom" class="image3 image_width " src="<?php echo base_url('assets/img/smart_wl/bg_bottom.png') ?>" alt="" srcset="">
								</div>



							</div>
							<div id="status">
								<div class="card-body bg-grey">
									<h3 class="card-title text-center"> <b>-</b> <i class=""></i> </h3>
								</div>
							</div>
						
							<a href="<?php echo base_url('warning_light/word_details_WL/'.$warning_light_id) ?>" class="btn btn-default pull-right"> <i class="fa fa-file"></i> Export PDF File </a>
							
							<a href="<?php echo base_url('Log_koneksi/log_koneksi_details/'.$warning_light_id) ?>" class="btn btn-default pull-right"> <i class="fa fa-print"></i> Log Koneksi </a>
						</div>
			<div class="col-md-8">
				<h3 style="margin-top:0px">Smart Warning Light Report Details</h3>
				<table style="margin-top:3rem" class="table table-bordered table-responsive table-hover ">
				<tr><td>Model</td><td><?php echo $warning_light_model; ?></td></tr>
				<tr><td>Serial Number</td><td><?php echo $warning_light_s_n; ?></td></tr>
				<tr><td>Mode</td><td>
					<?php if ($warning_light_mode == 1 ) { ?>
					(id:<?php echo $warning_light_mode ?>) Blink
					<?php } ?>
					<?php if ($warning_light_mode == 2 ) { ?>
					(id:<?php echo $warning_light_mode ?>) Flip Flop
					<?php } ?>
					<?php if ($warning_light_mode == 3 ) { ?>
					(id:<?php echo $warning_light_mode ?>) Double Flip Flop
					<?php } ?>
					<?php if ($warning_light_mode == 4 ) { ?>
					(id:<?php echo $warning_light_mode ?>) Slowed Blink
					<?php } ?>
				</td></tr>
				<tr><td>Kecepatan</td><td><?php echo @$warning_light_kecepatan; ?>ms</td></tr>
				<tr><td>Tahun</td><td><?php echo @$warning_light_tahun; ?></td></tr>
				</table>
			</div>
			
			</div>

<div class="row"  style="margin-top:-25rem">
			<div class="col-md-4"></div>
			<div class="col-md-8">
				<table style="margin-top:1rem" class="table table-bordered table-responsive table-hover ">
				<tr><td>Tegangan Pengenal</td><td><?php echo @$warning_light_tegangan; ?></td></tr>
				<tr><td>Inggress Protection</td><td><?php echo @$warning_light_ip; ?></td></tr>
				<tr><td>Impact protection</td><td><?php echo  @$warning_light_ils; ?></td></tr>
				</table>
			</div>
</div>

<div class="row" style="margin-top:-10rem">
			<div class="col-md-4"></div>
			<div class="col-md-8">
				<table style="margin-top:1rem" class="table table-bordered table-responsive table-hover ">
				<tr><td>Pembuat</td><td><?php echo $warning_light_pembuat; ?></td></tr>
				<tr><td>Nama Pekerjaan</td><td><?php echo @$warning_light_sitename; ?></td></tr>
				<tr><td>Nama Kontraktor</td><td><?php echo @$proyek_kontraktor; ?></td></tr>
				<tr><td>Pemberi Pekerjaan</td><td><?php echo @$proyek_pemberi_pekerajaan; ?></td></tr>
				<tr><td>Tahun Anggaran</td><td><?php echo @$proyek_anggaran; ?></td></tr>
				</table>
			
			</div>
</div>


 <!-- section map  -->
 <input type="hidden" id="wl_id" value="<?php echo @$warning_light_id ?>">
 <input type="hidden" id="wl_lat" value="<?php echo @$warning_light_lat ?>">
 <input type="hidden" id="wl_lng" value="<?php echo @$warning_light_lng ?>">
<div class="row">
			<div class="col-md-12"> 
				<h3>Lokasi :</h3>
				<div id="map_report" style="height:300px"></div>
			</div>
</div>

<?php $this->load->view('layout/footer');?>


<?php $this->load->view('warning_light/js/warning_light_report');?>

