<!-- Modal tambah area -->
<div class="modal fade" id="modal-program-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Buat Program Baru</h4>
            </div>
            <div class="modal-body">
                
                <div class="form-group">
                    <label for="">Nama Program</label>
                    <input type="text" class="form-control" id="program_nama_create" placeholder="input Program">
                    <label for="">Input All Red</label>
                    <input type="text" class="form-control" id="all_red_create" placeholder="input All Red">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="save_program(this)">Simpan</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Edit program -->
<div class="modal fade" id="modal-program-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Buat Program Baru</h4>
            </div>
            <div class="modal-body">
         
                <div class="form-group">
                    <label for="">Nama Program</label>
                    <input type="hidden" class="form-control" id="program_edit_id" placeholder="Input field">
                    <input type="text" class="form-control" id="program_nama_edit" placeholder="Input field">
               
                    <label for="">Input All Red</label>
                    <input type="text" class="form-control" id="all_red_edit" placeholder="input All Red">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="save_edit_program(this)">Simpan</button>
            </div>
        </div>
    </div>
</div>