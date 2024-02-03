<div id="modal_add" class="modal fade" tabindex="-1">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-video"></i> Tambah Kamera  </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <label for="">Daftar Streamer :</label>
                <select class="form-control form-select" name="" id="streamer_select">
                    <option value=""></option>
                </select>
                <label class="mt-3"  for="">Nama Kamera :</label>
                <input id="nama_kamera" type="text" class="form-control form-input" placeholder="Nama Kamera">
                <label   class="mt-3" for="">Kamera Url:</label>
                <textarea id="url_kamera" class="form-control form-input" rows="4" cols="35"></textarea>
             
            </div>
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" onclick="save_camera()" class="btn btn-primary">Tambah Kamera</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


 
<div id="modal_hapus" class="modal fade" tabindex="-1">
        <div class="modal-dialog ">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-video"></i> Hapus Data Kamera ?  </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                            <p>Apakah anda Yakin untuk menghapus data Kamera ?</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div id="hapus_kamera">
                    
                </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
  </div>

<div id="modal_hapus_record" class="modal fade" tabindex="-1">
        <div class="modal-dialog ">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-video"></i> Hapus Data Kamera ?  </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                            <p>Apakah anda Yakin untuk menghapus data Kamera ?</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div id="hapus_recording">
                    
                </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
  </div>