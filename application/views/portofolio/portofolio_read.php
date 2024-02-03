<?php $this->load->view('layout/main-layout/header');?>
<?php $this->load->view('layout/main-layout/navbar');?>

<section class="section">
      <div class="container">
        <div class="row mb-4 align-items-center">
          <div class="col-md-6" data-aos="fade-up">
            <h2><?php echo $judul; ?></h2>
			<p><?php echo $timestamp; ?></p>
          </div>
        </div>
      </div>

      <div class="site-section pb-0">
        <div class="container">
          <div class="row align-items-stretch">
            <div class="col-md-8" data-aos="fade-up">
              <img src="<?php echo base_url("$image")  ?>" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-3 ml-auto" data-aos="fade-up" data-aos-delay="100">
              <div class="sticky-content">
                <h3 class="h3"><?php echo $judul; ?></h3>
                <p class="mb-4"><span class="text-muted"><?php echo($kategori) ?></span></p>
                <input type="hidden" name="" id='tools' value='<?php echo($tools) ?>'>
                <div class="mb-5">
                  <p><?php echo $deskripsi; ?></p>

                </div>

                <h4 class="h4 mb-3">Tools dan Bahasa Pemograman yang dipakai :</h4>
                <ul id='list_tools' class="list-unstyled list-line mb-5">
                  <li>Design</li>
                  <li>HTML5/CSS3</li>
                  <li>CMS</li>
                  <li>Logo</li>
                </ul>

                <!-- <p><a href="#" class="readmore">Demo</a></p> -->
              </div>
            </div>
          </div>
        </div>
    </section>


    
<!-- END Main -->

<?php $this->load->view('layout/main-layout/footer');?>

<!-- End Camera Code -->

<script>

var tools = $('#tools').val();
var list_tools = tools.split(',');
var html_tools = '';

console.log(list_tools);

for (let i = 0; i < list_tools.length; i++) {
  html_tools += '<li>'+list_tools[i]+'</li>'
  
}

$('#list_tools').html(html_tools);

</script>