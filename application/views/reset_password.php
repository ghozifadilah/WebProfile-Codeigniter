<!doctype html>
<html lang="en">
  <head>
    <title>JAVIS | Smart PJU</title>
    <link rel="icon" href="<?php echo base_url('assets/img/favicon.ico')?>" type="image/ico" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/login.css');?>">
  </head>
  <body>
    <div class="body"></div>
    <div class="grad"></div>
    <div class="container">
        <div class="row bungkus">
            <div class="col-md-3"></div>
            <div class="col-md-3 judul">
                <div>Produk <span>Smart PJU</span></div>
            </div>
            <form method="post" class="col-md-3 login" action="<?php echo base_url('welcome/aksi_reset_password')?>">
                <p>Hai <?php echo @$user_nama ?>, silahkan ubah password anda disini</p>
                <input type="password" placeholder="password" name="password" value="<?php echo @$password?>" required><br>
                <label for="varchar"><?php echo form_error('password') ?></label>
                <input type="password" placeholder="konfirmasi password" name="repassword" value="<?php echo @$repassword?>" required><br>
                <label for="varchar"><?php echo form_error('repassword') ?></label>
                <input type="hidden" name="user_id" value="<?php echo @$user_id ?>">
                <input type="submit" value="Ubah Password"><br>
                Belum punya akun? <a href="<?php echo base_url('welcome/register')?>">daftar di sini</a>
            </form>
        </div>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </body>
</html>