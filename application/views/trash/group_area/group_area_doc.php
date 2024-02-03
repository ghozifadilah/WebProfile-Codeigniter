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
        <h2>Group_area List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Group Area Group Id</th>
		<th>Group Area Area Id</th>
		
            </tr><?php
            foreach ($group_area_data as $group_area)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $group_area->group_area_group_id ?></td>
		      <td><?php echo $group_area->group_area_area_id ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>