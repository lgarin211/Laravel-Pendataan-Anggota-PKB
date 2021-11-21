<!-- Modal -->
<div class="modal fade" id="ArdaAdduser" tabindex="-1" aria-labelledby="ArdaAdduserLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ArdaAdduserLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/adduser" method="POST">
      	@csrf
		<input type="hidden" name="poinadmin" value="adminadd">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h6>Nama Lengkap</h6>
       				<p>
        			<input  required class="form-control" placeholder="Nama..." name="nama" @if(!empty($data->nama)) value="{{$data->nama}}" @endif>
       				</p>
				</div>
				<div class="col-md-12">
					<h6>Email</h6>
       				<p>
        			<input required class="form-control" placeholder="lagus@l.om" name="email" @if(!empty($data->nama)) value="{{$data->nama}}" @endif>
       				</p>
				</div>
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
  	</form>
    </div>
  </div>
</div>
