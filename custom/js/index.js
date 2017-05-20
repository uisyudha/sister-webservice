// global variabel tablePegawai
var tabelPegawai;

$(document).ready(function() {
	tabelPegawai = $("#tabelPegawai").DataTable({
		"ajax": "php_action/retrieve.php",
		"order": []
	});

	$("#addPegawaiModalBtn").on('click', function() {
		// reset the form
		$("#createPegawaiForm")[0].reset();
		// remove the error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".messages").html("");

		// submit form
		$("#createPegawaiForm").unbind('submit').bind('submit', function() {

			$(".text-danger").remove();

			var form = $(this);

			// validation
			var nama = $("#nama").val();
			var nim = $("#nim").val();
			var alamat = $("#alamat").val();
			var gaji = $("#gaji").val();

			if(nama == "") {
				$("#nama").closest('.form-group').addClass('has-error');
				$("#nama").after('<p class="text-danger">Nama harus diisi</p>');
			} else {
				$("#nama").closest('.form-group').removeClass('has-error');
				$("#nama").closest('.form-group').addClass('has-success');
			}

			if(nim == "") {
				$("#nim").closest('.form-group').addClass('has-error');
				$("#nim").after('<p class="text-danger">NIM harus diisi</p>');
			} else {
				$("#nim").closest('.form-group').removeClass('has-error');
				$("#nim").closest('.form-group').addClass('has-success');
			}

			if(alamat == "") {
				$("#alamat").closest('.form-group').addClass('has-error');
				$("#alamat").after('<p class="text-danger">Alamat harus diisi</p>');
			} else {
				$("#alamat").closest('.form-group').removeClass('has-error');
				$("#alamat").closest('.form-group').addClass('has-success');
			}

			if(gaji == "") {
				$("#gaji").closest('.form-group').addClass('has-error');
				$("#gaji").after('<p class="text-danger">Gaji harus diisi</p>');
			} else {
				$("#gaji").closest('.form-group').removeClass('has-error');
				$("#gaji").closest('.form-group').addClass('has-success');
			}

			//Validasi sukses
			if(nama && nim && alamat && gaji) {
				//submi the form to server
				$.ajax({
					url : form.attr('action'),
					type : form.attr('method'),
					data : form.serialize(),
					dataType : 'json',
					success:function(response) {

						// remove the error
						$(".form-group").removeClass('has-error').removeClass('has-success');

						if(response.success == true) {
							$(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
							'</div>');

							// reset the form
							$("#createPegawaiForm")[0].reset();

							// reload the datatables
							tabelPegawai.ajax.reload(null, false);
							// this function is built in function of datatables;

						} else {
							$(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
							'</div>');
						}  // /else
					} // success
				}); // ajax subit
			} /// if


			return false;
		}); // /submit form for create member
	}); // /add modal

});

function deletePegawai(id = null) {
	if(id) {
		// click on remove button
		$("#deleteBtn").unbind('click').bind('click', function() {
			$.ajax({
				url: 'php_action/delete.php',
				type: 'post',
				data: {pegawai_id : id},
				dataType: 'json',
				success:function(response) {
					if(response.success == true) {
						$(".removeMessages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
							'</div>');

						// refresh the table
						tabelPegawai.ajax.reload(null, false);

						// close the modal
						$("#deletePegawaiModal").modal('hide');

					} else {
						$(".removeMessages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
							'</div>');
					}
				}
			});
		}); // click remove btn
	} else {
		alert('Error: Refresh the page again');
	}
}

function editPegawai(id = null) {
	if(id) {

		// remove the error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".edit-messages").html("");

		// remove the id
		$("#pegawai_id").remove();

		// fetch the member data
		$.ajax({
			url: 'php_action/getSelectedPegawai.php',
			type: 'post',
			data: {pegawai_id : id},
			dataType: 'json',
			success:function(response) {
				$("#editNama").val(response.NAMA);
				$("#editNIM").val(response.NIM);
				$("#editAlamat").val(response.ALAMAT);
				$("#editGaji").val(response.GAJI);

				// mmeber id
				$(".editPegawaiModal").append('<input type="hidden" name="pegawai_id" id="pegawai_id" value="'+response.ID+'"/>');

				// here update the member data
				$("#updatePegawaiForm").unbind('submit').bind('submit', function() {
					// remove error messages
					$(".text-danger").remove();

					var form = $(this);

					// validation
					var editNama = $("#editNama").val();
					var editNIM = $("#editNIM").val();
					var editAlamat = $("#editAlamat").val();
					var editGaji = $("#editGaji").val();

					if(editNama == "") {
						$("#editNama").closest('.form-group').addClass('has-error');
						$("#editNama").after('<p class="text-danger">Nama harus diisi</p>');
					} else {
						$("#editNama").closest('.form-group').removeClass('has-error');
						$("#editNama").closest('.form-group').addClass('has-success');
					}

					if(editNIM == "") {
						$("#editNIM").closest('.form-group').addClass('has-error');
						$("#editNIM").after('<p class="text-danger">NIM harus diisi</p>');
					} else {
						$("#editNIM").closest('.form-group').removeClass('has-error');
						$("#editNIM").closest('.form-group').addClass('has-success');
					}

					if(editAlamat == "") {
						$("#editAlamat").closest('.form-group').addClass('has-error');
						$("#editAlamat").after('<p class="text-danger">Alamat harus diisi</p>');
					} else {
						$("#editAlamat").closest('.form-group').removeClass('has-error');
						$("#editAlamat").closest('.form-group').addClass('has-success');
					}

					if(editGaji == "") {
						$("#editGaji").closest('.form-group').addClass('has-error');
						$("#editGaji").after('<p class="text-danger">Gaji harus diisi</p>');
					} else {
						$("#editGaji").closest('.form-group').removeClass('has-error');
						$("#editGaji").closest('.form-group').addClass('has-success');
					}

					//Validasi sukses
					if(editNama && editNIM && editAlamat && editGaji) {
						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
								if(response.success == true) {
									$(".edit-messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
									  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
									  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
									'</div>');

									// reload the datatables
									tabelPegawai.ajax.reload(null, false);
									// this function is built in function of datatables;

									// remove the error
									$(".form-group").removeClass('has-success').removeClass('has-error');
									$(".text-danger").remove();
								} else {
									$(".edit-messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
									  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
									  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
									'</div>')
								}
							} // /success
						}); // /ajax
					} // /if

					return false;
				});

			} // /success
		}); // /fetch selected member info

	} else {
		alert("Error : Refresh the page again");
	}
}
