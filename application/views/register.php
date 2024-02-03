<!doctype html>
<html lang="en">

<head>
  <title>JAVIS | Login</title>
  <link rel="icon" href="<?php echo base_url('assets/img/favicon.ico') ?>" type="image/ico" />
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="<?php echo base_url('assets/css/login.css'); ?>">
  <style>
    .divider:after,
    .divider:before {
      content: "";
      flex: 1;
      height: 1px;
      background: #eee;
    }

    .h-custom {
      height: calc(100% - 73px);
    }

    @media (max-width: 450px) {
      .h-custom {
        height: 100%;
      }
    }
  </style>
</head>

<body>

<div class="container position-sticky z-index-sticky top-0">
  <div class="row justify-content-center">
    <div  style="min-height:10vh;"></div>
    <div class="col-md-5 ">
    <div class="card  form-login" style="width: 30rem;background-color:white;opacity:0.95">
    <div class="card-body text-center">
    <img width="70px;" src="<?php echo base_url('assets/img/beacukai.png') ?>" alt=""> <br>
<h5 class="mt-4">Sistem Kamera bea Cukai</h5>
<hr>
<h5 class="mt-4">Daftar Akun</h5>
    </div>
  <div class="card-body">
  <form method="post" action="<?php echo base_url('Users/registerd_action') ?>"> 
  
            <div class="form-outline ">
              <label class="form-label " for="form3Example3">Username</label>
              <input type="text" name="username" id="form3Example3" class="form-control form-control" placeholder="Masukan Username" />
              <label for="varchar"><?php echo form_error('username') ?></label>
            </div>
            
            <div class="form-outline ">
              <label class="form-label " for="form3Example3">Nama Perusahaan</label>
              <input type="text" name="nama" id="form3Example3" class="form-control form-control" placeholder="Masukan Username" />
              <label for="varchar"><?php echo form_error('username') ?></label>
            </div>
            
            <div class="form-outline ">
              <label class="form-label " for="form3Example3">Alamat</label>
              <input type="text" name="adresss" id="form3Example3" class="form-control form-control" placeholder="Masukan Alamat" />
              <label for="varchar"><?php echo form_error('username') ?></label>
            </div>

            <div class="form-outline ">
              <label class="form-label " for="form3Example3">Email</label>
              <input type="email" name="email" id="form3Example3" class="form-control form-control" placeholder="Masukan Email" />
              <label for="varchar"><?php echo form_error('username') ?></label>
            </div>

            <!-- Password input -->
            <div class="form-outline ">
              <label class="form-label " for="form3Example4">Password</label>
              <input type="password" name="password" id="form3Example4" class="form-control form-control" placeholder="Masukan Password" />
              <label for="varchar"><?php echo form_error('password') ?></label>
            </div>

          </div>
          <div class="card-body">
          <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Daftar</button>
          </div>
              <!-- Email input -->
      </form>
    </div>
  </div>
</div>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>