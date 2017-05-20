<?php

if($_POST) {
	//The URL that we want to send a PUT request to.

	$validator = array('success' => false, 'messages' => array());

	$id = $_POST['pegawai_id'];
	$nama = $_POST['editNama'];
	$nim = $_POST['editNIM'];
	$alamat = $_POST['editAlamat'];
	$gaji = $_POST['editGaji'];

	$url = 'http://172.17.0.2:7887/pegawai/'.$id; //Sesuaikan dengan IP dan port webservice
	//Initiate cURL
	$ch = curl_init($url);
	//Use the CURLOPT_PUT option to tell cURL that
	//this is a PUT request.
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
	//We want the result / output returned.
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
	//Our fields.
	$fields = array("nama" => $nama, "nim" => $nim, "alamat" => $alamat, "gaji" => $gaji);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
	//Execute the request.
	$response = curl_exec($ch);

	if($response === "OK") {
		$validator['success'] = true;
		$validator['messages'] = "Update Berhasil";
	} else {
		$validator['success'] = false;
		$validator['messages'] = "Update Gagal";
	}

	echo json_encode($validator);
}
