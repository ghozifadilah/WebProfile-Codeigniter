<?php $this->load->view('frontend/template/header'); ?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Produk</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- List Karir -->
    <div class="container">
        <div class="row gy-3">
            <div class="col-lg-12">
                <!-- ======= Produk Section ======= -->
                <section id="produk" class="features">
                    <div class="container">
                        <div class="section-title">
                            <p>Produk Jasa Dan Layanan</p>
                        </div>
                        <?php foreach ($produk as $produk) { ?>
                        <img style="width: 100%;" src="<?php echo base_url("assets/img/$produk->thumbnail_produk")?>" alt="">
                        <?php } ?>
                    </div>
                </section>
            </div>
            <!-- End Features Section -->
        </div>
    </div>
    </div>
</main>
<!-- End #main -->
<?php $this->load->view('frontend/template/footer'); ?>