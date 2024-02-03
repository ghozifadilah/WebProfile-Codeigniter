<!doctype html>
<html>
    <head>
        <title>Report Warning Light</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
			
			body{
				font-family :Courier ;
			}
            .word-table {
                border:0px solid  !important; 
                border-collapse: collapse !important;
                width: 70%;
            }
            .word-table tr th, .word-table tr td{
                border:0px solid  !important; 
                padding: 5px 10px;
				
            }

			.footer {
			position: fixed;
			left: 0;
			bottom: 0;
			width: 100%;
			color: black;
			}

        </style>
    </head>
    <body>
		<div class="row">
			<div class="col-md-2">
				<img class="pull-right" src="<?php echo base_url('assets/img/logo_javis.png'); ?>" alt="logo-javis" width="50px">
			</div>
			<div class="col-md-10" style="margin-top:-55px">
				<h4 class="">Warning Light Report : <?php echo @$warning_light_sitename; ?> </h4>
				<h5 class="">  Dicetak : <?php echo date("Y/m/d") ?></h5>
				<p>Model : <span style="color:#4e85f2;"><?php echo $warning_light_model; ?></span> </p>
			</div>
		</div>
      <hr>
       <br>
       <br>
		<table class="word-table" style="margin-bottom: 5px; font-size:12px;">

				<tr><td>Serial Number</td><td>:</td><td><?php echo $warning_light_s_n; ?></td></tr>
				<tr><td>Mode</td><td>:</td><td>
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
				<tr><td>Kecepatan</td><td>:</td><td><?php echo @$warning_light_kecepatan; ?>ms</td></tr>
				<tr><td>Tahun</td><td>:</td><td><?php echo @$warning_light_tahun; ?></td></tr>
				<tr><td><hr></td><td>//</td><td><hr></td></tr>
				<tr><td></td><td></td><td></td></tr>
				<tr><td>Tegangan Pengenal</td><td>:</td><td><?php echo  @$warning_light_ils; ?></td></tr>
				<tr><td>IPS/Inggress Protection</td><td>:</td><td><?php echo @$warning_light_tegangan; ?></td></tr>
				<tr><td>ILS/Impact protection</td><td>:</td><td><?php echo @$warning_light_ip; ?></td></tr>
				<tr><td>Pembuat</td><td>:</td><td><?php echo $warning_light_pembuat; ?></td></tr>
				<tr><td><hr></td><td>//</td><td><hr></td></tr>
				<tr><td></td><td></td><td></td></tr>
				<tr><td>Nama Pekerjaan</td><td>:</td><td><?php echo @$warning_light_sitename; ?></td></tr>
				<tr><td>Nama Kontraktor</td><td>:</td><td><?php echo @$proyek_kontraktor; ?></td></tr>
				<tr><td>Pemberi Pekerjaan</td><td>:</td><td><?php echo @$proyek_pemberi_pekerajaan; ?></td></tr>
				<tr><td>Tahun Anggaran</td><td>:</td><td><?php echo @$proyek_anggaran; ?></td></tr>
				<tr><td><hr></td><td>//</td><td><hr></td></tr>
				<tr><td></td><td></td><td></td></tr>
				<tr><td>Map Latitude </td><td>:</td><td><?php echo @$warning_light_lat; ?></td></tr>
				<tr><td>Map Longitude  </td><td>:</td><td><?php echo @$warning_light_lng; ?></td></tr>
				<tr><td>Status Online</td><td>:</td><td>	
				<?php if($warning_light_status_online == 1){ ?> 
					<p style="color:green">Online</p> 
				<?php }else{ ?> 
						<p style="color:red">Offline</p> 
					<?php } ?>
				
			</td></tr>
        </table>
		<div class="footer">
	<img class="pull-left" src="<?php echo base_url('assets/img/logo_javis.png'); ?>" alt="logo-javis" width="50px">
	<p style="font-size:12px;margin-left:12px;margin-top:16px;"><b>PT. Javis Teknologi Albarokah</b><br>
	<span style="font-size:12px;">Jl.Elang Jawa No.12, Kabupaten Sleman,  Daerah Istimewa Yogyakarta 55584</span>
	</p>
	<hr>
	</div>
    </body>

	<footer>

	</footer>
</html>