<?php $this->load->view('layout/header');?>
<h3 style="margin-top:0px"> <i class="fa fa-home"></i> Dashboard</h3>
         
		 <hr>
<div class="row">
	<div class="col-lg-12">
		<h5 class="ms-5">Selamat Datang : <?= $this->session->userdata('username') ?></h5>
    <hr>
    <label for="">Shortcut:</label>
		<div class="row ">
		
    
			<div class="col-lg-4 mt-2">
				<div class="card text-center">
					<div class="card-body">
					 <h3><i class="fa fa-industry"></i></h3>
           <h5> Total Perusahaan</h5>
           <h4> <?= $total_companies ?> </h4>
					</div>
				</div>
			</div>

     <div class="col-lg-4 mt-2">
				<div class="card text-center">
					<div class="card-body">
					 <h3><i class="fa fa-video"></i></h3>
           <h5>Total Camera</h5>
           <h4> <?= $total_camera ?> </h4>
					</div>
				</div>
			</div>


			<div class="col-lg-4 mt-2">
				<div class="card text-center">
					<div class="card-body">
					 <h3><i class="fa fa-users"></i></h3>
           <h5>Total Pengguna</h5>
           <h4> <?= $total_users ?> </h4>
					</div>
				</div>
			</div>


		</div>
	</div>
</div>


<div class="row mt-5">
  <div class="col-lg-12">
    <label for="">Daftar Perushaan:</label>
    <div class="card">
  <div style="height:400px;overflow:auto;" class="card-body">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1;
    foreach ($data_companies as $key ) { ?>
    <tr>
      <th scope="row"><?=$no?></th>
      <td><?= $key->name ?></td>
      <td><?= $key->adresss ?></td>
      <td> <a class="btn btn-primary" href="<?php echo base_url("companies/read/$key->id") ?>"> <i class="fa fa-list"></i> Detail Perushaan</a> </td>
    </tr>
    <?php $no++; } ?>
   
  </tbody>
</table>
  </div>
</div>
  </div>
</div>

<?php $this->load->view('layout/footer');?>

