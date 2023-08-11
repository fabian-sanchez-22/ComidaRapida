<?php 
include_once "../Model/producto.php";

$toppinM = new \modelo\Producto;
$response = $toppinM->readToppins();

echo json_encode($response);
unset($toppinM);
unset($response);