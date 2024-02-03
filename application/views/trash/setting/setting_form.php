<?php $this->load->view('layout/header'); ?>
<h2 style="margin-top:0px">Setting <?php echo $button ?></h2>
<form action="<?php echo $action; ?>" enctype="multipart/form-data" method="post">
  <div class="form-group">
    <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
  </div>
  <div>
    <input type="hidden" name="id_divisi" value="<?php echo $id_setting; ?>" />
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <div style="margin-top:12px;">
          <label for="varchar">Upload Foto Banner</label>
          <p style="font-size:10px;"> <i> Image size maksimal 2.5 MB / File Format jpeg atau png </i> </p>
          <div>
            <input onchange="pilih_banner()" id="input_upload_img" style="max-width:300px; text-align:left;" accept="image/,.png,.jpeg,.jpg" class="btn btn-default" type="file" name="img_banner" />
          </div>
          <h5 style="color:red" id="notifikasi_upload"></h5>
          <img id="img_banner" style=" border-radius:10px;box-shadow: -1px 7px 5px 0px rgba(0,0,0,0.32);" width="200px" src="<?php echo base_url('assets/img/' . @$banner) ?>" alt="">
        </div>
      </div>
    </div>
  </div>
  <div>
    <input type="hidden" name="id_divisi" value="<?php echo $id_setting; ?>" />
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <div style="margin-top:12px;">
          <label for="varchar">Upload Foto Karier</label>
          <p style="font-size:10px;"> <i> Image size maksimal 2.5 MB / File Format jpeg atau png </i> </p>
          <div>
            <input onchange="pilih_karier()" id="input_upload_img" style="max-width:300px; text-align:left;" accept="image/,.png,.jpeg,.jpg" class="btn btn-default" type="file" name="img_karier" />
          </div>
          <h5 style="color:red" id="notifikasi_upload"></h5>
          <img id="img_karier" style=" border-radius:10px;box-shadow: -1px 7px 5px 0px rgba(0,0,0,0.32);" width="200px" src="<?php echo base_url('assets/img/' . @$karier) ?>" alt="">
        </div>
      </div>
    </div>
  </div>
  <div>
    <input type="hidden" name="id_divisi" value="<?php echo $id_setting; ?>" />
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <div style="margin-top:12px;">
          <label for="varchar">Upload Foto Thumbnail Produk</label>
          <p style="font-size:10px;"> <i> Image size maksimal 2.5 MB / File Format jpeg atau png </i> </p>
          <div>
            <input onchange="pilih_thumbnail_produk()" id="input_upload_img" style="max-width:300px; text-align:left;" accept="image/,.png,.jpeg,.jpg" class="btn btn-default" type="file" name="img_thumbnail_produk" />
          </div>
          <h5 style="color:red" id="notifikasi_upload"></h5>
          <img id="img_thumbnail_produk" style=" border-radius:10px;box-shadow: -1px 7px 5px 0px rgba(0,0,0,0.32);" width="200px" src="<?php echo base_url('assets/img/' . @$thumbnail_produk) ?>" alt="">
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" name="id_setting" value="<?php echo $id_setting; ?>" />
  <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
  <a href="<?php echo site_url('setting') ?>" class="btn btn-default">Cancel</a>
</form>
<?php $this->load->view('layout/footer'); ?>

<script>
  function pilih_banner() {
    temp_img_banner();
    $('#button_gambar_upload_preset').attr('disabled', true);
    $('#reset_gambar_button').show()
  }

  function pilih_karier() {
    temp_img_karier();
    $('#button_gambar_upload_preset').attr('disabled', true);
    $('#reset_gambar_button').show()
  }

  function pilih_thumbnail_produk() {
    temp_img_thumbnail();
    $('#button_gambar_upload_preset').attr('disabled', true);
    $('#reset_gambar_button').show()
  }

  function temp_img_banner() {
    var tmppath = URL.createObjectURL(event.target.files[0]);
    $("#img_banner").fadeIn("fast").attr('src', URL.createObjectURL(event.target.files[0]));
    console.log(tmppath);
  }

  function temp_img_karier() {
    var tmppath = URL.createObjectURL(event.target.files[0]);
    $("#img_karier").fadeIn("fast").attr('src', URL.createObjectURL(event.target.files[0]));
    console.log(tmppath);
  }

  function temp_img_thumbnail() {
    var tmppath = URL.createObjectURL(event.target.files[0]);
    $("#img_thumbnail_produk").fadeIn("fast").attr('src', URL.createObjectURL(event.target.files[0]));
    console.log(tmppath);
  }
</script>