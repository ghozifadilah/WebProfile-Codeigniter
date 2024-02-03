<div class="modal fade" id="modal-traffic">
	<div class="modal-dialog" style="width:75%">
		<div class="modal-content">
			<div class="modal-header">
				<div class="pull-right">
					<a class="btn btn-default btn-xs" data-toggle="modal" href='#modal-schedule'>
						Setting jadwal
						<i class="fa fa-cog" aria-hidden="true"></i>
					</a>
					<button type="button" class="btn btn-default btn-xs" data-dismiss="modal" aria-hidden="true">
						<i class="fa fa-times" aria-hidden="true"></i>
					</button>
				</div>
				<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
				
				<h4 id="title-modal" class="modal-title"></h4>
			</div>
			<div class="modal-body">
			<div class="row">
					
				</div>

				<div class="row justify-content-center" style="margin-top:1rem;">
					<div class="col-md-8 text-center">
						<h4>Mode</h4>
						<div class="btn-group">
							<button type="button" class="btn btn-default">
								<i class="fa fa-dashboard" aria-hidden="true"></i>
								&ensp;
								Fast
							</button>
							<button type="button" class="btn btn-default active">
								<i class="fa fa-dashboard" aria-hidden="true"></i>
								&ensp;
								Normal
							</button>
							<button type="button" class="btn btn-default">
								<i class="fa fa-dashboard" aria-hidden="true"></i>
								&ensp;
								Slow
							</button>
							<button type="button" class="btn btn-default">
								<i class="fa fa-dashboard" aria-hidden="true"></i>
								&ensp;
								Hold
							</button>
							<button type="button" class="btn btn-default">
								<i class="fa fa-dashboard" aria-hidden="true"></i>
								&ensp;
								Flash
							</button>
						</div>
						<br>
					</div>

					<div class="col-md-4 text-left">
						<h4>Data Traffic</h4>
						<div id="data_traffic" class="data-traffic">
						
						</div>
						<br>
					</div>
				</div>
				
				<div   id="ModalFase_row" class="row">
			 <!--loop -->
						
				
<!-- End loop -->
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="program-timeline" style="height:20vh;"></div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">tutup</button>
			</div>
		</div>
	</div>
</div>