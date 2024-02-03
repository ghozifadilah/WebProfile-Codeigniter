<?php $this->load->view('layout/main-layout/header');?>
<?php $this->load->view('layout/main-layout/navbar');?>


     <!-- ======= Works Section ======= -->
     <section class="section site-portfolio">
      <div class="container">
      <div class="row mb-5 align-items-center">
          <div class="col-md-12 col-lg-6 mb-4 mb-lg-0" data-aos="fade-up">
            <p class="mb-0">Berikut project yang pernah saya kerjakan</p>
          </div>
          <div class="col-md-12 col-lg-6 text-start text-lg-end" data-aos="fade-up" data-aos-delay="100">
            <!-- <div id="filters" class="filters">
              <a href="#" data-filter="*" class="active">All</a>
              <a href="#" data-filter=".web">Web</a>
              <a href="#" data-filter=".design">Design</a>
              <a href="#" data-filter=".branding">Branding</a>
              <a href="#" data-filter=".photography">Photography</a>
            </div> -->
          </div>
        </div>
        <div id="portfolio-grid" class="row no-gutter" data-aos="fade-up" data-aos-delay="200">
        <?php foreach ($portofolio_data as $portofolio)   {  ?>
         <div class="item web col-sm-6 col-md-4 col-lg-4 mb-4">
            <a href="<?php echo base_url("portofolio/detail/$portofolio->id") ?>" class="item-wrap fancybox">
              <div class="work-info">
                <h3><?php echo $portofolio->judul ?></h3>
                <span><?php echo $portofolio->deskripsi ?></span>
              </div>
              <img class="img-fluid" src="<?php echo base_url("$portofolio->image")  ?>">
            </a>
          </div>
          <?php } ?>

      </div>

    </section><!-- End  Works Section -->

      


<?php $this->load->view('layout/main-layout/footer');?>

<!-- End Camera Code -->