<?php $this->load->view('layout/header');?>

<div class="container-fluid">
    <div class="row mt-5">
        <h3 class="ms-4"> <i class="fa fa-list"></i> Pengaturan Akses Halaman</h3>
    </div>
    <hr>
    <div class="row">

    <?php foreach ($role_page_data as $key ) { ?>

        <div class="col-auto">
        
            <div style="width:240px;"  class="card">
            <div style="height:300px;overflow:auto;" class="card-body">
                <label for=""><b>Hak Akses :</b></label>
                <h5 class="card-title">  <b><?= $key['roles'] ?></b> </h5>
                <hr>
                <label for=""><b> <i class="fa fa-list"></i> Halaman :</b></label>
                <ul class="list-group list-group-flush">
                    <?php foreach ($key['pages'] as $pages) { ?>
                        <li class="list-group-item">  <?= $pages->name_pages ?> </li>
                    <?php  } ?>
                   
                    </ul>
            </div>
            <div class="card-footer">
                <a onclick="edit_akses(<?= $key['id_roles'] ?>)" class="btn btn-primary"> <i class="fa fa-edit"></i> Edit</a>
            </div>
            </div>

        </div>
        <?php  } ?>
        


    </div>
</div>


<div id="edit_akses" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Pages</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="list_pages">
          <label for=""><b> Hak Akses :</b></label>
         <h5 id="roles_title"></h5>
         <hr>
         <button onclick="add_pages_modal()" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Tambah</button><br>
      
         <hr>
         <label for=""> <b>Daftar Halaman</b> </label>
          <div>
            <table class="table">
              <thead>
                <tr>
                  <th>Pages</th>
                  <th></th>
                </tr>
              </thead>
              <tbody id="daftar_user_table">
                <tr>
                  <td>Daftar User</td>
                  <td> <button class=" btn btn-sm btn-danger ">X</button> </td>
                </tr>
              </tbody>
            </table>
          </div>
        <div>

        </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<div id="list_pages_add" class="modal fade" tabindex="-1">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">List Pages</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <Select class="form-control" id="pages_list">
          <option value="">All Pages</option>
        </Select>
      </div>
      <div class="modal-footer">
        <button onclick="save_pages()" type="button" class="btn btn-success" data-bs-dismiss="modal">Simpan</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>


<?php $this->load->view('layout/footer');?>


<script>
var id_roles_global ='';
function edit_akses(id_roles) {
  id_roles_global = id_roles;
  $('#daftar_user_table').html('');
    var id_roles = id_roles;
    $.ajax({
    url: '<?=site_url('Role_page/edit_roles')?>',
    type: 'GET',
    dataType: 'json',
    data: {id_roles: id_roles},
    }).done(function(data) { 

      console.log(data);
      var data_pages ='';
      for (let pg = 0; pg < data['pages'].length; pg++) {
        data_pages += '<option id="opt_pages_'+data['pages'][pg].id+'" value="'+data['pages'][pg].id+'">'+data['pages'][pg].name+'</option>'
      }
      $('#pages_list').html(data_pages);

      $('#roles_title').text(data['role_page_data'][0].roles);
      var roles_pages = data['role_page_data'][0].pages;
      var html_list_pages ='';
      for (let rp = 0; rp < roles_pages.length; rp++) {
      
        html_list_pages += '<tr><td>'+roles_pages[rp].name_pages+'</td> <td> <button onclick="delete_pages('+roles_pages[rp].id_role_pages+')" class="btn btn-sm btn-danger ">X</button> </td></tr>';
      $('#opt_pages_'+roles_pages[rp].pages_id+'').hide();
        console.log(roles_pages[rp]);
      }

      $('#daftar_user_table').html(html_list_pages);
      $('#edit_akses').modal('show');
      
    
    });

}

function add_pages_modal() {
  $('#list_pages_add').modal('show');
}

function save_pages() {
  var pages = $('#pages_list').val();
console.log('pages:',pages);
console.log('id_roles_global:',id_roles_global);

  $.ajax({
    url: '<?=site_url('Role_page/save_pages_roles')?>',
    type: 'GET',
    dataType: 'json',
    data: {
      id_roles: id_roles_global,
      pages: pages,
    },
    }).done(function(data) { 
      edit_akses(id_roles_global);
    });
}

function delete_pages(id) {
  console.log(id);
  $.ajax({
    url: '<?=site_url('Role_page/delete_pages_roles')?>',
    type: 'GET',
    dataType: 'json',
    data: {
      id: id,
    },
    }).done(function(data) { 
      edit_akses(id_roles_global);
    });


}

</script>