<?php $this->load->view('layout/header');?>
        <h4 style="margin-top:0px">Log Data Offline: <?php echo $warning_light_name ?></h4>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
            <a href="<?php echo base_url('Log_koneksi/export_pdf/'.$warning_light_id) ?>" class="btn btn-default pull-left"> <i class="fa fa-print"></i> Log Koneksi </a>   
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-left">
          
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('log_koneksi/index'); ?>" class="form-inline" method="get">
                
                <div class="input-group">
              
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('log_koneksi'); ?>" class="btn btn-default">Reset</a>
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
		
		<th>Log Koneksi Status</th>
		<th>Log Koneksi Waktu</th>
            </tr><?php
            $i = 0;
            foreach ($log_koneksi_data as $log_koneksi)
            {
                ?>
                <tr>
                <td width="80px"><?php echo $i = $i+1 ?></td>
            
                <td><?php if($log_koneksi['log_koneksi_status'] == 1){
                    echo 'onilne';
                    }else{ 
                    echo 'offilne';
                    }  
                ?></td>
                <td><?php echo $log_koneksi['log_koneksi_waktu'] ?></td>
            </tr>
                <?php
            }
            ?>
        </table>
        </div>
       
        <?php $this->load->view('layout/footer');?>