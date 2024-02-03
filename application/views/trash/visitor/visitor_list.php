<?php $this->load->view('layout/header');?>
        <h3 style="margin-top:0px">Informasi Pengunjung</h3>
         
        <hr>
        <div class="row" style="margin-bottom: 10px">

        	<div class="row ">
        	
        		<div class="col-lg-auto mt-2">
        			<div class="card" style="width: 21rem;">
        				<div class="card-body">
        					<h5 class="card-title text-center"> <b> Total  Pengunjung Bulan Ini </b></h5>
                           
                            <hr>
                            <?php
                             $visitor_this_month = 0;
                            //beginning array of visitor data
                            $visitor_data_this_month = array();
                            //loop through visitor data
                            foreach ($visitor_data as $visitor)
                            {
                                //check if the date is the same as the current date
                                if (date('Y-m', strtotime($visitor->date)) == date('Y-m'))
                                {
                                    //if the date is the same, add the visitor to the array
                                    $visitor_this_month = $visitor_this_month + $visitor->visitor;
                                }
                            }

                                ?>
                          
                           
        					<p style="font-size:50px;" class="card-text text-center">
                               <?= $visitor_this_month ?> <br>
                             
                            </p>
                          
        					
        				</div>
        			</div>
              </div>
              <div class="col-lg-auto mt-2">
                <div class="card" style="width: 21rem;">
        				<div class="card-body">
        					<h5 class="card-title text-center"> <b> Total Seluruh Pengunjung </b></h5>
                            <hr>
                            <?php
                            $total_visitor = 0;
                            foreach ($visitor_data as $visitor)
                            {
                                $total_visitor = $total_visitor + $visitor->visitor;
                            }
                             ?>
        					<p style="font-size:50px;" class="card-text text-center">
                               <?= $total_visitor ?>
                            </p>
        					
        				</div>
        			</div>
              </div>
        </div>
        
        </div>
        <div class="table-responsive text-center">
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Visitor</th>
		<th>Date</th>
		<th>Action</th>
            </tr><?php
            foreach ($visitor_data as $visitor)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $visitor->visitor ?></td>
			<td><?php echo $visitor->date ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('visitor/delete/'.$visitor->id_visitor),'Hapus',' class="btn btn-danger" onclick="javasciprt: return confirm(\'Anda yakin ?\')"'); 
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