<!DOCTYPE html>
<html>
<head>
	<title>PEGAWAI</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<!-- datatables css -->
	<link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<center><h1 class="page-header">PEGAWAI</h1> </center>

				<div class="removeMessages"></div>

				<button class="btn btn-default pull pull-right" data-toggle="modal" data-target="#addPegawai" id="addPegawaiModalBtn">
					<span class="glyphicon glyphicon-plus-sign"></span>	Tambah Pegawai
				</button>

				<br /> <br /> <br />
				<!--Datatable-->
				<table class="table" id="tabelPegawai">
					<thead>
						<tr>
							<th width="40">No</th>
							<th>Nama</th>
							<th width="150">NIM</th>
							<th>Alamat</th>
							<th>Gaji</th>
							<th width="150">Aksi</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>

	<!-- add modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="addPegawai">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span> Tambah Pegawai</h4>
				</div>

				<form class="form-horizontal" action="php_action/create.php" method="POST" id="createPegawaiForm">
					<div class="modal-body">
						<div class="messages"></div> <!--notifikasi pesan -->
						<div class="form-group">
							<label for="nama" class="col-sm-2 control-label">Nama</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
							</div>
						</div>
						<div class="form-group">
							<label for="nim" class="col-sm-2 control-label">NIM</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="nim" name="nim" placeholder="NIM">
							</div>
						</div>
						<div class="form-group">
							<label for="alamat" class="col-sm-2 control-label">Alamat</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
							</div>
						</div>
						<div class="form-group">
							<label for="gaji" class="col-sm-2 control-label">Gaji</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="gaji" name="gaji" placeholder="Gaji">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /add modal -->

	<!-- delete modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="deletePegawaiModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Delete Pegawai</h4>
				</div>
				<div class="modal-body">
					<p>Yakin mau menghapus ?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-danger" id="deleteBtn">Ya</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /remove modal -->

	<!-- edit modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="editPegawaiModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Edit Pegawai</h4>
				</div>

				<form class="form-horizontal" action="php_action/update.php" method="POST" id="updatePegawaiForm">
					<div class="modal-body">
						<div class="edit-messages"></div>
						<div class="form-group"> <!--/addclass has-error -->
							<label for="editName" class="col-sm-2 control-label">Nama</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="editNama" name="editNama" placeholder="Nama">
							</div>
						</div>
						<div class="form-group">
							<label for="editNIM" class="col-sm-2 control-label">NIM</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="editNIM" name="editNIM" placeholder="Address">
							</div>
						</div>
						<div class="form-group">
							<label for="editAlamat" class="col-sm-2 control-label">Alamat</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="editAlamat" name="editAlamat" placeholder="Alamat">
							</div>
						</div>
						<div class="form-group">
							<label for="editGaji" class="col-sm-2 control-label">Gaji</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="editGaji" name="editGaji" placeholder="Gaji">
							</div>
						</div>
					</div>
					<div class="modal-footer editPegawaiModal">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /edit modal -->

	<!-- jquery plugin -->
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<!-- bootstrap js -->
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<!-- datatables js -->
	<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
	<!-- include custom index.js -->
	<script type="text/javascript" src="custom/js/index.js"></script>
</body>
</html>
