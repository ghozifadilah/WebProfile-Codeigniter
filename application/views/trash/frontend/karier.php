<?php $this->load->view('frontend/template/header');?>
<main style="min-height: 100vh;"  id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <ol>
        <li class="teks-13"><a href="<?php echo base_url('/')?>">Beranda</a></li>
        <li>karier</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<!-- List karier -->
<div class="container">
  <div class="row gy-3">
    <h1 class="font_title teks-20" > <b>Mulai Kariermu Bersama Kami</b>  </h1>
    <img style="width: 100%;" src="<?php echo base_url('assets/img/') . $karier[0]->karier?>" alt="" srcset="">
    <p class="font_keterangan teks-13" >Javis Teknologi dibangun dengan tenaga profesional muda yang memiliki semangat kuat untuk berkembang bersama, berintegritas, berdaya saing maju, dan mampu berkerja sama dalam tim yang solid.</p>
    <hr>
    <div class="col-lg-12">
      <div class="row">

<!-- ======= Services Section ======= -->
<section id="karier" class="services teks">
    <div class="container">

      <div class="section-title" data-aos="zoom-out">
        <p class="teks-20">Kompetensi</p>
      </div>
      <div class="row justify-content-center">
        <?php foreach ($divisi as $karir) { ?>
          <div class="col-lg-4 col-md-6 mt-5">
            <div class="icon-box" data-aos="zoom-in-left">
              <div class="text-center">
            <img style="width: 80px;" src="<?php echo base_url("public/karir/$karir->icon_divisi")?>" alt="" srcset="">
              </div>
              <hr>
              <h4 class="title teks-17"><?= $karir->nama_divisi ?></h4>
              <p class="description teks-13"> <?= $karir->deskripsi ?> </p>
            </div>
          </div>
        <?php } ?>
      </div>

    </div>
  </section> <!-- End Services Section -->
     
<!-- ======= Cta Section ======= -->
<section id="cta" class="cta teks">
    <div class="container">

      <div class="row" data-aos="fade-up">
        <div class="col-lg-12 text-center">
          <p style="color: black !important; font-size: 20px;"> Kirimkan CV terbaik dan lamaran anda ke  </p>
          <a  class="btn btn-lg btn-secondary " style="color: rgb(255, 255, 255) !important; font-size: large;" href="mailto:hrd@javis.co.id"> <i class="fa fa-envelope"></i> &ensp; hrd@javis.co.id</a>
        </div>
       
      </div>

    </div>
  </section>
      </div>
    </div>
  </div>
</div>
</main>
<!-- End #main -->
<?php $this->load->view('frontend/template/footer');?>