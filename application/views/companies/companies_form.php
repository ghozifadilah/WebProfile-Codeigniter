<?php $this->load->view('layout/header');?>

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
    <h2 style="margin-top:0px"><i class="fa fa-suitcase"></i> <b><?php echo $button ?>  Perusahaan</b> </h2>
    <hr>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Perusahaan <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nama Perusahaan ..." value="<?php echo $name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('adresss') ?></label>
            <input type="text" class="form-control" name="adresss" id="adresss" placeholder="Alamat ..." value="<?php echo $adresss; ?>" />
        </div>
	   

        
                        <div style="width:650px;" class="form-group mt-3">
                            <label for="int">Pilih Map</label>
                                <div style="display:none;" id="map" style="height:200px"></div>
                                <div style="display:none;" id="map_detail" style="height:200px"></div>
                                <div id="map_traffic_create" style="height:300px"></div>
                        </div>

                            <div class="form-group">
					<label for="">Lokasi</label>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="varchar">Latitude</label>
								<input name="lat" type="text" class="form-control" id="traffic_lat_form"
									onchange="traffic_create_update_marker_input_ModalEdit()" placeholder="Lat" value="<?=@$lat?>" />
							</div>
                            

						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="varchar">Longitude</label>
								<input  name="lng" type="text" class="form-control" id="traffic_lng_form"
									onchange="traffic_create_update_marker_input_ModalEdit()" placeholder="Lng" value="<?=@$lng?>" />
							</div>
						</div>
						


					</div>
				</div>

	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('companies') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div>
</div>

    
<?php $this->load->view('layout/footer');?>

<?php $this->load->view('js/map/map.php');?>
<?php $this->load->view('js/map/create_map.php');?>
<input type="hidden" value="<?= $button ?>" id="form_status">

<script>
    var form_status = $('#form_status').val();
    setTimeout(function() {
    try {

    if (form_status == 'Create') {
        init_traffic_create_map();
    }else{
        init_traffic_edit_map();
    }


    } catch (error) {
        console.log('Tidak bisa terhubung ke server google map');
    }
    
}, 3000);

</script>