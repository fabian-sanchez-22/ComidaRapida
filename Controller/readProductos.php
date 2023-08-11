<?php 
include_once "../Model/producto.php";

$productoM = new \modelo\Producto;
$response = $productoM->read();

echo json_encode($response);
unset($productoM);
unset($response);