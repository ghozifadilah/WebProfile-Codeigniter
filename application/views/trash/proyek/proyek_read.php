<?php $this->load->view('layout/header');?>
        <h2 style="margin-top:0px">Proyek Read</h2>
        <table class="table">
	    <tr><td>Proyek Pekerjaan</td><td><?php echo $proyek_pekerjaan; ?></td></tr>
	    <tr><td>Proyek Kontraktor</td><td><?php echo $proyek_kontraktor; ?></td></tr>
	    <tr><td>Proyek Pemberi Pekerjaan</td><td><?php echo $proyek_pemberi_pekerjaan; ?></td></tr>
	    <tr><td>Tahun Anggaran</td><td><?php echo $proyek_anggaran; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('proyek') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<?php $this->load->view('layout/footer');?>