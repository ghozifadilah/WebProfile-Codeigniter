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
       
        <div class="row" style="margin-bottom: 10px">
            
             <div class="col-md-2">
				<img class="pull-right" src="<?php echo base_url('assets/img/logo_javis.png'); ?>" alt="logo-javis" width="50px">
			</div>
			<div class="col-md-10" style="margin-top:-55px">
				<h4 class="">Log Data Offline :  <?php echo $warning_light_name ?> </h4>
				<h5 class="">  Dicetak : <?php echo date("Y/m/d") ?></h5>
				<p>Model : <span style="color:#4e85f2;"><?php echo $warning_light_model; ?></span> </p>
             </div>
           
        </div>
        <div class="table-responsive">
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		
        <th>Log Waktu Offline</th>
		<th>Log Koneksi Status</th>
            </tr><?php
            $i = 0;
            foreach ($log_koneksi_data as $log_koneksi)
            {
                ?>
                <tr>
                <td width="80px"><?php echo $i = $i+1 ?></td>
                
                <td><?php echo $log_koneksi['log_koneksi_waktu'] ?></td>
                <td><?php if($log_koneksi['log_koneksi_status'] == 1){
                    echo 'onilne';
                    }else{ 
                    echo 'offilne';
                    }  
                ?></td>
            </tr>
                <?php
            }
            ?>
        </table>
        </div>
       
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