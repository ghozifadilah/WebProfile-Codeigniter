<?php $this->load->view('layout/main-layout/header');?>
<?php $this->load->view('layout/main-layout/navbar');?>

<!-- Main -->

<div class="container my-5">
      <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3  ">
        <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
          <h1  class="display-4 fw-bold lh-1">> <Span id="example" class="" > </Span></h1>
          <p class="lead">Saya seorang fullstack web developer yang telah memiliki pengalaman dalam membangun berbagai jenis aplikasi web. Selain itu, saya juga memiliki keterampilan dalam desain grafis, seperti membuat layout website, desain logo, dan desain grafis lainnya.</p>
          <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
            <a href='<?php echo base_url('portofolio') ?>' type="button" class="btn btn-outline-primary btn-lg px-4 me-md-2 fw-bold">Portofolio</a>
            <a href='<?php echo base_url('kontak') ?>' type="button" class="btn btn-outline-secondary btn-lg px-4">Kontak</a>
          </div>
        </div>
      
        <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden">
            <!-- <img class="rounded-lg-3" src="/assets/img/img_4.jpg" alt="" width="720"> -->
            <img src="./assets/img/dd.jpg" alt="" srcset="" width="100%x">
        </div>
      </div>
    </div>
    <!-- ======= Works Section ======= -->
   
    <!-- ======= Services Section ======= -->
    <section class="section services ">
      <div class="container">
        <div class="row justify-content-center text-center mb-4">
          <div class="col-5">
            <h3 class="h3 heading mt-5">Skill</h3>
            <p>Saya Memiliki bebrapa skill yaitu</p>
          </div>
        </div>
        <div class="row">

          <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <i class="bi bi-card-checklist"></i>
            <h4 class="h4 mb-2">FrontEnd</h4>
            <p>Front end merupakan salah satu bagian dari website yang menampilkan tampilan untuk para pengguna.</p>
            <ul class="list-unstyled list-line">
              <li>HTML/CSS</li>
              <li>Javascript</li>
              <li>VueJS</li>
              <li>NuxtJS</li>
              <li>ReactJS</li>
              <li>NexttJS</li>
            </ul>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <i class="bi bi-binoculars"></i>
            <h4 class="h4 mb-2">Backend</h4>
            <p>Back end berkomunikasi dengan front end, mengirim dan menerima informasi untuk ditampilkan sebagai halaman sebuah web.</p>
            <ul class="list-unstyled list-line">
              <li>NodeJS</li>
              <li>ExpressJS</li>
              <li>PHP</li>
              <li>CodeIgnter</li>
              <li>Laravel</li>
            </ul>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <i class="bi bi-brightness-high"></i>
            <h4 class="h4 mb-2">Database</h4>
            <p>Menyimpan data yang telah diterima dari backend.</p>
            <ul class="list-unstyled list-line">
              <li>MYSQL</li>
              <li>Redis</li>
              <!-- <li>Fauna DB</li> -->
            </ul>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <i class="bi bi-calendar4-week"></i>
            <h4 class="h4 mb-2">Graphic Design & Video Editing</h4>
            <p>komunikasi menggunakan elemen visual, seperti tipografi, fotografi, serta ilustrasi </p>
            <ul class="list-unstyled list-line">
              <li>Figma</li>
              <li>Adobe XD</li>
              <li>Photoshop</li>
              <li>Adobe Premiere</li>
              <li>After Effect</li>
            </ul>
          </div>
        </div>
      </div>
    </section><!-- End Services Section -->

    
<!-- END Main -->

<?php $this->load->view('layout/main-layout/footer');?>

<!-- End Camera Code -->