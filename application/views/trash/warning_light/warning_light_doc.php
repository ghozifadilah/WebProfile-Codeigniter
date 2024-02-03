<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Warning_light List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Warning Light Area Id</th>
		<th>Warning Light Sitename</th>
		<th>Warning Light Tahun</th>
		<th>Warning Light Mode</th>
		<th>Warning Light Kecepatan</th>
		<th>Warning Light Lat</th>
		<th>Warning Light Lng</th>
		<th>Warning Light Status Online</th>
		
            </tr><?php
            foreach ($warning_light_data as $warning_light)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $warning_light->warning_light_area_id ?></td>
		      <td><?php echo $warning_light->warning_light_sitename ?></td>
		      <td><?php echo $warning_light->warning_light_tahun ?></td>
		      <td><?php echo $warning_light->warning_light_mode ?></td>
		      <td><?php echo $warning_light->warning_light_kecepatan ?></td>
		      <td><?php echo $warning_light->warning_light_lat ?></td>
		      <td><?php echo $warning_light->warning_light_lng ?></td>
		      <td><?php echo $warning_light->warning_light_status_online ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>