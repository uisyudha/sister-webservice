<?php

//if form is submitted
if($_POST) {

	$validator = array('success' => false, 'messages' => array());

	$nama = $_POST['nama'];
	$nim = $_POST['nim'];
	$alamat = $_POST['alamat'];
	$gaji = $_POST['gaji'];

	$url = 'http://172.17.0.2:7887/pegawai'; //Sesuaikan dengan IP dan port webservice yang berjalan
	//Initiate cURL
	$ch = curl_init($url);
	//Use the CURLOPT_POST option to tell cURL that
	//this is a PUT request.
	curl_setopt($ch, CURLOPT_POST, true);
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
		$validator['messages'] = "Berhasil ditambahkan";
	} else {
		$validator['success'] = false;
		$validator['messages'] = "Error";
	}

	echo json_encode($validator);
}
