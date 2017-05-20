<?php

$output = array('data' => array());

$URL = "http://172.17.0.2:7887/pegawai";
$str_data = file_get_contents($URL);
$data = json_decode($str_data, true);

$arrlength = count($data);
$x = 1;
for($i = 0; $i < $arrlength; $i++)
{
	$actionButton = '
	    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editPegawaiModal" onclick="editPegawai('.$data[$i]['ID'].')"><span class="glyphicon glyphicon-edit">Edit</span></button>
		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletePegawaiModal" onclick="deletePegawai('.$data[$i]['ID'].')"><span class="glyphicon glyphicon-trash">Hapus</span></button>
	';

	$output['data'][] = array(
		$x,
		$data[$i]['NAMA'],
		$data[$i]['NIM'],
		$data[$i]['ALAMAT'],
		$data[$i]['GAJI'],
		$actionButton
	);

	$x++;
}

echo json_encode($output);
