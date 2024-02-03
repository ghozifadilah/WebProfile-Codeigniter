<!-- Modal tambah area -->
<div class="modal fade" id="modal-area">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Buat Area Baru</h4>
            </div>
            <div class="modal-body">
                
                <div class="form-group">
                    <label for="">Nama Area</label>
                    <input type="text" class="form-control" id="area_nama_create" placeholder="Input field">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="save_area(this)">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal edit area -->


<div class="modal fade" id="modal-area-edits">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Area</h4>
            </div>
            <div class="modal-body">
                
                <div class="form-group">
                    <label for="">Nama Area</label>
                    <form id="form-edit-area">
                    <input type="hidden" class="form-control" name="area_id" id="area_id_edit" placeholder="Area Id"  />
                    <input type="text" class="form-control" name="area_nama" id="area_nama_edit" placeholder="Input field" >
                   
                    </form>
                    
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="ubah_area(this)">Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal Hapus area -->
<div class="modal fade" id="modal_notif_hapus">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Hapus Area </h4>
            </div>
            <div class="modal-body">
                
                <div class="form-group">
                        <label for="">Apakah Anda Yakin menghapus data Area ini ?</label>
                        <form id="form-edit-area">
                        <input type="hidden" class="form-control" name="area_id" id="area_id" placeholder="Area Id" value="" />
                      
                        <h5 style="color:red" id="Notifdelete_area" >PERHATIAN : Data Warning light di dalam Area ini akan ikut terhapus !!</h5>

                        </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" onclick="hapus_area(this)">Hapus</button>
                </div>
                </div>
        </div>
    </div>
</div>


 