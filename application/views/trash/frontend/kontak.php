<?php $this->load->view('frontend/template/header'); ?>
<main style="min-height: 100vh;" id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <ol>
                    <li><a href="#">Home</a></li>
                    <li>Kontak</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->

    <div class="container">
        <div class="col-lg-12">
            <!-- ======= Kontak Section ======= -->
            <section style="padding: 30px;border-radius: 25px;" id="kontak" class="contact">
                <div class="container">
                    <div class="section-title">
                        <p>Kontak Kami</p>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-lg-5">
                            <div>
                                <h5> <b>Alamat</b> </h5>
                                <h6><?php echo $setting_data[0]->alamat ?></h6>
                                <hr>
                            </div>
                            <div class="mt-3">
                                <h5><b>Email</b> <i class="bi bi-envelope"></i> </h5>
                                <?php
                                foreach ($email_data as $email_kontak){?>
                                <h6><?php echo $email_kontak->email ?></h6>
                                <?php }?>
                                <hr>
                            </div>
                            <div class="mt-3">
                                <h5><b>Telepon</b> <i class="bi bi-phone"></i> </h5>
                                <?php
                               foreach ($kontak_data as $telepon_kontak){?>
                                <h6><?php echo $telepon_kontak->kontak ?></h6>
                               <?php }?>

<!-- 
                                <h6>(0274) 4477 267</h6>
                                <h6>0812-1550-1551 </h6> -->
                                <hr>
                            </div>
                        </div>

                        <div class="col-lg-6 mt-5 mt-lg-0">
                            <h5> <b> Peta Lokasi :</b> </h5>
                            <a target='_blank' href="https://www.google.com/maps/place/PT.+Javis+Teknologi/@-7.7479321,110.4207208,17z/data=!3m1!4b1!4m5!3m4!1s0x2e7a597e8a2cee9b:0x22154acc2e2c6ae9!8m2!3d-7.7479395!4d110.4229216"><img style="width: 400px;border-radius: 23px;box-shadow: 10px 10px 22px -2px rgba(0,0,0,0.38);" src="<?php echo base_url('assets/assets/img/map.PNG')?>" class="img-fluid mt-2" alt=""></a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Contact Section -->
        </div>
    </div>

</main>
<!-- End main -->
<?php $this->load->view('frontend/template/footer'); ?>