<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Javis Teknologi AlBarokah</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="icon" href="<?php echo base_url('assets/img/favicon.ico')?>" type="image/ico" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url('assets/assets/vendor/animate.css/animate.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/assets/vendor/aos/aos.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/assets/vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/assets/vendor/glightbox/css/glightbox.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/assets/vendor/remixicon/remixicon.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/assets/vendor/swiper/swiper-bundle.min.css'); ?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url('assets/assets/css/style.css'); ?>" rel="stylesheet">
</head>

<body>
      <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center  header-transparent ">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo d-flex align-items-center">
        <img src="<?php echo base_url('assets/assets/img/javis.png')?>" alt="javis">
        <h1 class="teks-20"><a href="index.html">&ensp;Javis Teknologi Albarokah</a></h1>
      </div>

      <nav id="navbar" class="navbar navbar-expand-lg">
        <ul>
          <?php if ( $this->uri->segment(1)==""  ) { ?>
            <li><a class="nav-link scrollto active teks-17" href="<?php echo base_url('/')?>">Beranda</a></li>
          <?php }else{ ?>
            <li><a class="nav-link scrollto teks-17" href="<?php echo base_url('/')?>">Beranda</a></li>
          <?php } ?>
          <?php if ( $this->uri->segment(1)=="Produk"  ) { ?>
            <li><a class="nav-link scrollto active teks-17" href="<?php echo base_url('/Produk')?>">Produk</a></li>
          <?php }else{ ?>
            <li><a class="nav-link scrollto teks-17" href="<?php echo base_url('/Produk')?>">Produk</a></li>
          <?php } ?>
          <?php if ( $this->uri->segment(1)=="Karier"  ) { ?>
            <li><a class="nav-link scrollto active teks-17" href="<?php echo base_url('/Karier')?>">Karier</a></li>
          <?php }else{ ?>
            <li><a class="nav-link scrollto teks-17" href="<?php echo base_url('/Karier')?>">Karier</a></li>
          <?php } ?>
          <?php if ( $this->uri->segment(1)=="Kontak"  ) { ?>
            <li><a class="nav-link scrollto active teks-17" href="<?php echo base_url('/Kontak')?>">Kontak</a></li>
          <?php }else{ ?>
            <li><a class="nav-link scrollto teks-17" href="<?php echo base_url('/Kontak')?>">Kontak</a></li>
          <?php } ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle text-dark"></i>
      </nav>
    </div>
  </header><!-- End Header -->