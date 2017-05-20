<?php

$output = array('success' => false, 'messages' => array());

$id = $_POST['pegawai_id'];

$url = 'http://172.17.0.2:7887/pegawai/'.$id; //Sesuiakan dengan IP dan port webservice
//Initiate cURL
$ch = curl_init($url);
//Use the CURLOPT_PUT option to tell cURL that
//this is a DELETE request.
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
//We want the result / output returned.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//Execute the request.
$response = curl_exec($ch);

if($response === "OK") {
	$output['success'] = true;
	$output['messages'] = 'Berhasil di hapus';
} else {
	$output['success'] = false;
	$output['messages'] = 'Error';
}

echo json_encode($output);
