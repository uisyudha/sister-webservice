<?php

$id = $_POST['pegawai_id'];

$URL = "http://172.17.0.2:7887/pegawai/".$id;
$str_data = file_get_contents($URL);
$data = json_decode($str_data, true);

echo json_encode($data[0]);
