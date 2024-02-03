<script>
function add_camera() {

    var id_company = $('#company_id_input').val();
    $.ajax({
    url: '<?=site_url('Companies/streamer_company')?>',
    type: 'GET',
    dataType: 'json',
    data: {id_company: id_company},
    }).done(function(data) { 

        console.log(data);
        var data_select = '';
        data_select += '<option value="0">Pilih</option>';
        for (let i = 0; i < data.length; i++) {
        
            data_select += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
            
        }

        $('#streamer_select').html(data_select);
    
    });
    
    $('#modal_add').modal('show');
}


function save_camera() {
    
    var id_company = $('#company_id_input').val();
    var streamer_select = $('#streamer_select').val();
    var nama_kamera = $('#nama_kamera').val();
    var url_kamera = $('#url_kamera').val();

    if (streamer_select == '' ) {
        console.log('ada streamer_select kosong');
        return;
    }
    if (nama_kamera == '' ) {
        console.log('ada nama_kamera kosong');
        return;
    }
    if (url_kamera == '' ) {
        console.log('ada url_kamera kosong');
        return;
    }


 
    $.ajax({
    url: '<?=site_url('Companies/save_camera')?>',
    type: 'POST',
    dataType: 'json',
    data: {
        id_company: id_company,
        streamer_select: streamer_select,
        nama_kamera: nama_kamera,
        url_kamera: url_kamera,
    },
    }).done(function(data) { 


        data_select += '<option value="0">Pilih</option>';
        for (let i = 0; i < data.length; i++) {
        
            data_select += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
            
        }

        $('#streamer_select').html(data_select);
    
    });


}



</script>